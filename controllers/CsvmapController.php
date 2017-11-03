<?php
namespace frontend\modules\walmart\controllers;

use frontend\modules\walmart\components\AttributeMap;
use Yii;
use yii\base\Exception;
use yii\web\Response;
use yii\web\UploadedFile;
use frontend\modules\walmart\models\JetProduct;
use frontend\modules\walmart\models\JetProductVariants;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\Walmartapi;
use frontend\modules\walmart\components\Jetproductinfo;
use frontend\modules\walmart\components\WalmartProduct;

class CsvmapController extends WalmartmainController
{
    protected $walmartHelper;

    const DEFAULT_VALUE = 'Please_Fill';

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }

        return $this->render('index');
    }

    public function actionExport()
    {
        $merchant_id = Yii::$app->user->identity->id;

        if (!file_exists(\Yii::getAlias('@webroot') . '/var/csv_export/' . $merchant_id)) {
            mkdir(\Yii::getAlias('@webroot') . '/var/csv_export/' . $merchant_id, 0775, true);
        }
        $base_path = \Yii::getAlias('@webroot') . '/var/csv_export/' . $merchant_id . '/attribute.csv';
        $file = fopen($base_path, "w");

        $headers = array('Id', 'Sku', 'Type', 'Category', 'Attribute_Mapping');

        $row = array();
        foreach ($headers as $header) {
            $row[] = $header;
        }
        fputcsv($file, $row);

        $productdata = array();
        $i = 0;

        $model = JetProduct::find()->select('id,sku,type')->where(['merchant_id' => $merchant_id])->all();
        foreach ($model as $value) {

            $product_category = Data::sqlRecords("SELECT `category`,`common_attributes` FROM `walmart_product` WHERE `merchant_id`='" . $merchant_id . "' AND `product_id`='" . $value->id . "'", 'one');

            if (empty($product_category['category'])) {
                continue;
            }

            $attribute_mapping = Data::sqlRecords("SELECT `attributes` FROM `walmart_category` WHERE `category_id` = '" . $product_category['category'] . "'", 'one');

            if (empty($attribute_mapping['attributes'])) {
                continue;
            } elseif ($product_category['common_attributes'] && !empty($product_category['common_attributes'])) {

                $attr_code = json_decode($product_category['common_attributes'], true);
            } else {
                $attr = json_decode($attribute_mapping['attributes'], true);
                $attr_code = [];

                foreach ($attr as $item) {
                    if (is_array($item)) {
                        foreach ($item as $key => $sub_attr) {
                            $keys = implode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $sub_attr);

                            $attr_code[$keys] = self::DEFAULT_VALUE;
                        }
                    } else {
                        $attr_code[$item] = self::DEFAULT_VALUE;
                    }
                }


            }

            if ($value->sku == "") {
                continue;
            }
            /*if($value->type=="simple")
            {*/

            $productdata[$i]['id'] = $value->id;
            $productdata[$i]['sku'] = $value->sku;
            $productdata[$i]['type'] = $value->type;
            $productdata[$i]['category'] = $product_category['category'];
            $productdata[$i]['attributes'] = json_encode($attr_code);
            $i++;

        }
        foreach ($productdata as $v) {
            $row = array();
            $row[] = $v['id'];
            $row[] = $v['sku'];
            $row[] = $v['type'];
            $row[] = $v['category'];
            $row[] = $v['attributes'];

            fputcsv($file, $row);
        }
        fclose($file);
        $encode = "\xEF\xBB\xBF"; // UTF-8 BOM
        $content = $encode . file_get_contents($base_path);
        return \Yii::$app->response->sendFile($base_path);
    }

    public function actionReadcsv()
    {
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        $merchant_id = Yii::$app->user->identity->id;

        if (isset($_FILES['csvfile']['name'])) {
            //var_dump($_FILES);die;
            $mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv', 'text/comma-separated-values','application/octet-stream');
            if (!in_array($_FILES['csvfile']['type'], $mimes)) {
                Yii::$app->session->setFlash('error', "CSV File type Changed, Please import only CSV file");
                return $this->redirect(['index']);
            }

            $newname = $_FILES['csvfile']['name'];

            if (!file_exists(Yii::getAlias('@webroot') . '/var/csv_import/' . date('d-m-Y') . '/' . $merchant_id)) {
                mkdir(Yii::getAlias('@webroot') . '/var/csv_import/' . date('d-m-Y') . '/' . $merchant_id, 0775, true);
            }

            $target = Yii::getAlias('@webroot') . '/var/csv_import/' . date('d-m-Y') . '/' . $merchant_id . '/' . $newname . '-' . time();
            $row = 0;
            $flag = false;
            $row1 = 0;
            if (!file_exists($target)) {
                move_uploaded_file($_FILES['csvfile']['tmp_name'], $target);
            }

            $selectedProducts = array();
            $import_errors = array();
            if (($handle = fopen($target, "r"))) {
                //$allpublishedSku = WalmartProduct::getAllProductSku($merchant_id);
                $row = 0;
                while (($data = fgetcsv($handle, 90000, ",")) !== FALSE) {
                    if ($row == 0 && (trim($data[0]) != 'Id' || trim($data[1]) != 'Sku' || trim($data[2]) != 'Type' || trim($data[3]) != 'Category' || trim($data[4]) != 'Attribute_Mapping')) {
                        $flag = true;
                        break;
                    }
                    $num = count($data);
                    $row++;
                    if ($row == 1)
                        continue;

                    $pro_id = trim($data[0]);
                    $pro_sku = trim($data[1]);
                    $pro_type = trim($data[2]);
//                    $pro_price = trim($data[3]);
                    $pro_category = trim($data[3]);
                    $pro_attribute_map = trim($data[4]);

                    if ($pro_id == '' || $pro_sku == '' || $pro_type == '' || $pro_category == '' || $pro_attribute_map == '') {
                        $import_errors[$row] = 'Row ' . $row . ' : Invalid data.';
                        continue;
                    }

                    if (!is_numeric($pro_id)) {
                        $import_errors[$row] = 'Row ' . $row . ' : Invalid product_id / price.';
                        continue;
                    }

                    /*if (!in_array($pro_sku, $allpublishedSku)) {
                        $import_errors[$row] = 'Row ' . $row . ' : ' . 'Sku => "' . $pro_sku . '" is invalid/not published on walmart.';
                        continue;
                    }*/

                    $productData = array();
                    $productData['id'] = $pro_id;
                    $productData['sku'] = $pro_sku;
                    $productData['type'] = $pro_type;
                    $productData['category'] = $pro_category;
                    $productData['attribute_map'] = $pro_attribute_map;
                    $productData['currency'] = CURRENCY;

                    $selectedProducts[] = $productData;
                }

                if (count($selectedProducts)) {
                    $walmartConfig = Data::sqlRecords("SELECT `consumer_id`,`secret_key` FROM `walmart_configuration` WHERE merchant_id='" . $merchant_id . "'", 'one');
                    if ($walmartConfig) {
                        $this->walmartHelper = new WalmartProduct($walmartConfig['consumer_id'], $walmartConfig['secret_key']);

                        /*$priceUploadCountPerRequest = 1000;
                        $selectedProducts = array_chunk($selectedProducts, $priceUploadCountPerRequest);*/

                        $size_of_request = 10;//Number of products to be uploaded at once(in single feed)
                        $pages = (int)(ceil(count($selectedProducts) / $size_of_request));


                        return $this->render('updateattributemap', [
                            'totalcount' => count($selectedProducts),
                            'pages' => $pages,
                            'products' => json_encode($selectedProducts)
                        ]);


                    } else {
                        Yii::$app->session->setFlash('warning', "Please enter walmartapi...");
                    }

                    if (count($import_errors)) {
                        Yii::$app->session->setFlash('error', implode('<br>', $import_errors));
                    }
                } else {
                    if (count($import_errors)) {
                        Yii::$app->session->setFlash('error', implode('<br>', $import_errors));
                    } else {
                        Yii::$app->session->setFlash('error', "Please Upload Csv file....");
                    }
                }
            } else {
                Yii::$app->session->setFlash('error', "File not found....");
            }
        } else {
            Yii::$app->session->setFlash('error', "Please Upload Csv file....");
        }
        return $this->redirect(['index']);
    }

    public function actionUdpateattributemap()
    {
        $products = Yii::$app->request->post();
        $valid_product = [];
        $invalid_product = [];
        $when_attribute = '';
        $walmart_attribute ='';
        $sid = [];
        $vid = [];
        $errors =[];


        if (is_array($products) && count($products) > 0) {
            foreach ($products['products'] as $product) {
               /*if (empty($product['attribute_map']) || empty($product['id']) || empty($product['sku']) || empty($product['type']) || empty($product['category'])) {

                    continue;
                }*/

                $attribute_value = '';
                $attribute = json_decode($product['attribute_map'], true);

                if(empty($attribute) || empty($product['id'])){

                    continue;
                }

                $flag = false;
                foreach ($attribute as $key => $value) {
                    if ($value != self::DEFAULT_VALUE && !empty($value)) {
                        $attribute_value = $product['attribute_map'];

                        if($product['type'] == 'simple'){
                            $sid[] = $product['id'];

                            $walmart_attribute .= " WHEN " . $product['id'] . " THEN " . "'" . $attribute_value . "'";

                            $simple_ids = implode(',', $sid);

                        }else{
                            $vid[] = $product['id'];

                            $when_attribute .= " WHEN " . $product['id'] . " THEN " . "'" . $attribute_value . "'";

                            $variant_ids = implode(',', $vid);
                        }

                        //$ids = implode(',', $id);
                    }else{
                        /*$return_msg['error'] = 'Invalid Attribute Value';*/
                        $errors[] = $product['sku'] . ' : Invalid Attribute Value';
                        $flag = true;
                        break;
                    }
                }
                if($flag)
                {
                    continue;
                }

                //$when_attribute .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['attribute_map'] . '"';
            }
            /*$ids = implode(',', $id);*/


            if(isset($simple_ids) && !empty($simple_ids)){
                try {
                    if(!empty($walmart_attribute)){
                        $query1 = "UPDATE `walmart_product` SET 
                                `walmart_attributes` = CASE `product_id` 
                                   " . $walmart_attribute . "
                                END
                                WHERE product_id IN (" . $simple_ids . ")";

                        Data::sqlRecords($query1, null, 'update');

                    }

                } catch (Exception $e) {
                    $errors= $e->getMessage();
                }
            }/*else{
                $errors[] = count($products) . ' Product(s) Not Updated due to Invalid Attribute Value';
            }*/
            if(isset($variant_ids) && !empty($variant_ids)){
                try {

                    if(!empty($when_attribute)){
                        $query = "UPDATE `walmart_product` SET 
                                    `common_attributes` = CASE `product_id` 
                                   " . $when_attribute . "
                                END
                                WHERE product_id IN (" . $variant_ids . ")";

                        Data::sqlRecords($query, null, 'update');
                    }

                } catch (Exception $e) {
                    $errors = $e->getMessage();
                }
            }/*else{
                $errors[] = count($products) . ' Product(s) Not Updated due to Invalid Attribute Value';
            }*/
            $return_msg['success']['message'] = "Product(s) information successfully updated";
            $return_msg['success']['count'] = count($sid)+count($vid);
        }
        if (count($errors)) {
            $return_msg['error'] = /*implode('<br/>', $errors);*/json_encode($errors);
            //$return_msg['success']['count'] = count($errors);
        }
        return json_encode($return_msg);
    }
}

