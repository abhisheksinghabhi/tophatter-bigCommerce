<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 28/3/17
 * Time: 5:07 PM
 */
namespace frontend\modules\walmart\controllers;

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
use frontend\modules\walmart\models\WalmartProduct as WalmartProductModel;

class UpdatecsvController extends WalmartmainController
{
    protected $walmartHelper;

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }

        return $this->render('index');
    }

    public function actionExport()
    {
        $postData = Yii::$app->request->post();

        $merchant_id = Yii::$app->user->identity->id;
        

        if (!file_exists(\Yii::getAlias('@webroot') . '/var/csv_export/product/whole-product' . $merchant_id)) {
            mkdir(\Yii::getAlias('@webroot') . '/var/csv_export/product/whole-product' . $merchant_id, 0775, true);
        }
        $base_path = \Yii::getAlias('@webroot') . '/var/csv_export/product/whole-product' . $merchant_id . '/product.csv';
        $file = fopen($base_path, "w");

        $headers = array('Id', 'Sku', 'Type', 'Title', 'Fullfilment_Lag_Time', 'Sku_Override', 'Product_Id_Override', 'Short_Description', 'Self_Description', 'Description', 'Product_taxcode');

        $row = array();

        foreach ($headers as $header) {
            $row[] = $header;
        }
        fputcsv($file, $row);

        $productdata = array();
        $i = 0;
        $model = Data::sqlRecords("SELECT * FROM  `jet_product` INNER JOIN `walmart_product` ON `jet_product`.`bigproduct_id`=`walmart_product`.`product_id` WHERE `walmart_product`.`merchant_id`='".$merchant_id."' and `jet_product`.`merchant_id`='".$merchant_id."' and `walmart_product`.`status`='".$postData['export']."'","all","select");

        foreach ($model as $value) {
            
            if ($value['sku'] == "") {
                continue;
            }
            $productdata[$i]['title'] = $value['title'];

            if (!empty($value['product_title'])) {
                $productdata[$i]['title'] = $value['product_title'];
            }
            $productdata[$i]['fulfilment_lag_time'] = $value['fulfillment_lag_time'];
            $productdata[$i]['sku_override'] = $value['sku_override'];
            $productdata[$i]['product_id_override'] = $value['product_id_override'];
            $productdata[$i]['tax_code'] = $value['tax_code'];

            if (!empty($value['long_description'])) {
                $productdata[$i]['long_description'] = $value['long_description'];
            } else {
                $productdata[$i]['long_description'] = $value['description'];
            }

            if (!empty($value['short_description'])) {
                $productdata[$i]['short_description'] = $value['short_description'];
            } else {
                $short_description = Data::trimString($value['description'], 800);

                $productdata[$i]['short_description'] = $short_description;
            }

            if (!empty($value['self_description'])) {
                $productdata[$i]['self_description'] = $value['self_description'];
            } else {
                $productdata[$i]['self_description'] = $value['title'];
            }

            /*if ($value['type'] == "simple") {*/
            $productdata[$i]['id'] = $value['id'];
            $productdata[$i]['sku'] = $value['sku'];
            $productdata[$i]['type'] = "No Variants";

            /*} else {
                continue;
            }*/
            $i++;
        }

        foreach ($productdata as $v) {

            $row = array();
            $row[] = $v['id'];
            $row[] = $v['sku'];
            $row[] = $v['type'];
            $row[] = $v['title'];
            $row[] = $v['fulfilment_lag_time'];
            $row[] = $v['sku_override'];
            $row[] = $v['product_id_override'];
            $row[] = $v['short_description'];
            $row[] = $v['self_description'];
            $row[] = $v['long_description'];
            $row[] = $v['tax_code'];

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

            if (!file_exists(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id)) {
                mkdir(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id, 0775, true);
            }

            $target = Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id . '/' . $newname . '-' . time();
            $row = 0;
            $flag = false;
            $row1 = 0;
            if (!file_exists($target)) {
                move_uploaded_file($_FILES['csvfile']['tmp_name'], $target);
            }

            $selectedProducts = array();
            $import_errors = array();
            if (($handle = fopen($target, "r"))) {

                $row = 0;
                while (($data = fgetcsv($handle, 90000, ",")) !== FALSE) {
                    if ($row == 0 && (trim($data[0]) != 'Id' || trim($data[1]) != 'Sku' || trim($data[2]) != 'Type'/* || trim($data[3]) != 'Title' || trim($data[4]) != 'Fullfilment_Lag_Time' || trim($data[5]) != 'Sku_Override' || trim($data[6]) != 'Product_Id_Override' || trim($data[7]) != 'Short_Description' || trim($data[8]) != 'Self_Description' || trim($data[9]) != 'Description' || trim($data[10]) != 'Product_taxcode'*/)) {
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
                    $pro_title = trim($data[3]);
                    $pro_fulfillment_lag_time = trim($data[4]);
                    $pro_price_sku_override = trim($data[5]);
                    $pro_price_product_id_override = trim($data[6]);
                    $pro_short_description = trim($data[7]);
                    $pro_self_description = trim($data[8]);
                    $pro_long_description = trim($data[9]);
                    $pro_taxcode = trim($data[10]);

                    if ($pro_id == '' || $pro_sku == '' || $pro_type == '' || $pro_title == '' || $pro_fulfillment_lag_time == '' || $pro_short_description == '' || $pro_self_description == '' || $pro_long_description == '' /*|| $pro_taxcode == ''*/) {
                        $import_errors[$row] = 'Row ' . $row . ' : Invalid data.';
                        continue;
                    }

                    if (!is_numeric($pro_id) || !is_numeric($pro_fulfillment_lag_time) /*|| !is_numeric($pro_taxcode)*/) {
                        $import_errors[$row] = 'Row ' . $row . ' : Invalid product_id / product data.';
                        continue;
                    }

                    $productData = array();
                    $productData['id'] = $pro_id;
                    $productData['sku'] = $pro_sku;
                    $productData['type'] = $pro_type;
                    $productData['title'] = addslashes($pro_title);
                    $productData['fulfillment_lag_time'] = $pro_fulfillment_lag_time;
                    $productData['price_sku_override'] = $pro_price_sku_override;
                    $productData['price_product_id_override'] = $pro_price_product_id_override;
                    $productData['short_description'] = addslashes($pro_short_description);
                    $productData['self_description'] = addslashes($pro_self_description);
                    $productData['long_description'] = addslashes($pro_long_description);
                    $productData['tax_code'] = $pro_taxcode;
                    //$productData['upc'] = $pro_upc;

                    $productData['currency'] = CURRENCY;

                    $selectedProducts[] = $productData;
                }

                if (count($selectedProducts)) {

                    $session = Yii::$app->session;

                    $size_of_request = 10;//Number of products to be uploaded at once(in single feed)
                    $pages = (int)(ceil(count($selectedProducts) / $size_of_request));

                    return $this->render('ajaxbulkupdate', [
                        'totalcount' => count($selectedProducts),
                        'pages' => $pages,
                        'products' => json_encode($selectedProducts)
                    ]);

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

    public function actionReadcsv23658()
    {
         
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }

        $connection = Yii::$app->getDb();
        $merchant_id = Yii::$app->user->identity->id;
        
        if (isset($_FILES['csvfile']['name'])) {
            //var_dump($_FILES);die;
            $mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv', 'text/comma-separated-values','application/octet-stream');
            
            if (!in_array($_FILES['csvfile']['type'], $mimes)) {
                Yii::$app->session->setFlash('error', "CSV File type Changed, Please import only CSV file");
                return $this->redirect(['index']);
            }

            $newname = $_FILES['csvfile']['name'];

            if (!file_exists(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id)) {
                mkdir(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id, 0775, true);
            }

            $target = Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id . '/' . $newname . '-' . time();
            $row = 0;
            $flag = false;
            $row1 = 0;
            if (!file_exists($target)) {
                move_uploaded_file($_FILES['csvfile']['tmp_name'], $target);
            }

            $selectedProducts = array();
            $import_errors = array();
            if (($handle = fopen($target, "r"))) {

                $row = 0;
                while (($data = fgetcsv($handle, 90000, ",")) !== FALSE) {

                   // print_r($data);die;

                    /*if ($row == 0 && (trim($data[1]) != 'Sku' || trim($data[3]) != 'Update MPN' || trim($data[4]) != 'Update Brand')) {
                        $flag = true;
                        break;
                    }*/
                    $num = count($data);
                    $row++;
                    if ($row == 1)
                        continue;

                    $sku = trim($data[0]);
                    $price=trim($data[4]);
                    
                   /* $mpn=trim($data[3]);
                    $brand=trim($data[4]);*/
                    
                    
                    //$tax_code = trim($data[1]);
                    //$ean = $data[8];
                    //$upc = $data[1];
                    //$gtin = $data[11];



                    /*if ($sku == ''  || $tax_code == '') {
                        $import_errors[$row] = 'Row ' . $row . ' : Invalid data.';
                        continue;
                    }*/

                   /*if (!is_numeric($upc) || addslashes($sku) ) {
                        $import_errors[$row] = 'Row ' . $row . ' : Invalid product_id / product data.';
                        continue;
                    }*/


                    //$upc=$gtin;
                    /*if(!$upc){
                        $upc=$ean;
                    }*/

                    $productData = array();
                    
                    /*$productData['mpn'] = addslashes($mpn);
                    $productData['brand'] = addslashes($brand);*/
                     $productData['price'] =str_replace('$', '', $price);
                     
                     
                    $productData['sku'] = addslashes($sku);
                    //$productData['tax_code'] = $tax_code;
                    
                    //$productData['ean'] = $ean;

                    $selectedProducts[] = $productData;

                    //unset($upc);
                    //unset($ean);
                    //unset($gtin);
                }

              // print_r($selectedProducts);die;
                if (count($selectedProducts)) {
                    
                    $session = Yii::$app->session;
                    $c=0;
                    $connection = Yii::$app->getDb();
                    
                    foreach ($selectedProducts as $key => $value) {

                        $product=Data::sqlRecords("select * from jet_product where sku='".addslashes($value['sku'])."' and merchant_id='".$merchant_id."'","one","select");

                       // $value['upc']=str_replace('-', '', $value['upc']);

                        if($product){
                             $query="UPDATE `jet_product` SET price='".$value['price']."' WHERE sku='".addslashes($value['sku'])."' AND merchant_id=".$merchant_id;  
                             $model = $connection->createCommand($query)->execute();

                             
                             $query="UPDATE `walmart_product` SET product_price='".$value['price']."' WHERE product_id='".$product['bigproduct_id']."' AND merchant_id=".$merchant_id;  
                             $model = $connection->createCommand($query)->execute();

                             $c++;
                         
                        }
                        else{
                              $query1="UPDATE `jet_product_variants` SET option_price='".$value['price']."' WHERE option_sku='".addslashes($value['sku'])."' AND merchant_id=".$merchant_id;  
                                $model = $connection->createCommand($query1)->execute();

                        }
                        
                      
                        /*else{

                            echo "del/";
                             $delprod="DELETE FROM `jet_product` WHERE sku='".$value['sku']."'AND merchant_id='".$merchant_id."'";
                            $model = $connection->createCommand($delprod)->execute(); 
                        }*/
                    }
                    
echo $c;die;
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
        //return $this->redirect(['index']);
    } 

     public function actionReadcsv3333()
    {
         
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }

        $connection = Yii::$app->getDb();
        $merchant_id = Yii::$app->user->identity->id;
        
        if (isset($_FILES['csvfile']['name'])) {
            //var_dump($_FILES);die;
            $mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv', 'text/comma-separated-values','application/octet-stream');
            
            if (!in_array($_FILES['csvfile']['type'], $mimes)) {
                Yii::$app->session->setFlash('error', "CSV File type Changed, Please import only CSV file");
                return $this->redirect(['index']);
            }

            $newname = $_FILES['csvfile']['name'];

            if (!file_exists(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id)) {
                mkdir(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id, 0775, true);
            }

            $target = Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id . '/' . $newname . '-' . time();
            $row = 0;
            $flag = false;
            $row1 = 0;
            if (!file_exists($target)) {
                move_uploaded_file($_FILES['csvfile']['tmp_name'], $target);
            }

            $selectedProducts = array();
            $import_errors = array();
            if (($handle = fopen($target, "r"))) {

                $row = 0;
                while (($data = fgetcsv($handle, 90000, ",")) !== FALSE) {


                    if ($row == 0 && (trim($data[2]) != 'Item' || trim($data[6]) != 'Quantity On Hand' )) {
                        $flag = true;
                        break;
                    }

                    $num = count($data);
                    $row++;
                    if ($row == 1)
                        continue;

                   /* if($data[4]=='')
                        continue;*/

                   // $sku = trim($data[0]);
                   
                   $item=$data[2];


                    $item_array=explode(':', $item);

                    if(count($item_array)==2){
                        $sku=$item_array[1];

                    }
                    else if(count($item_array)==3){
                        $sku=$item_array[2];
                    }
                    else if(count($item_array)==4){
                        $sku=$item_array[3];
                    }
                    
                    $Quantity_On_Hand=$data[6];
                   
                    //$price = $data[1];

                    if(strpos($Quantity_On_Hand,',')){
                        $Quantity_On_Hand=str_replace(',', '', $Quantity_On_Hand);
                    }



                    if ($sku == '') {
                      
                        continue;
                    }

                   /*if (!is_numeric($upc) || addslashes($sku) ) {
                        $import_errors[$row] = 'Row ' . $row . ' : Invalid product_id / product data.';
                        continue;
                    }*/

                    /*if(!$upc){
                        $upc=$ean;
                    }*/

                    $productData = array();
                    $productData['sku'] = addslashes($sku);
                    $productData['qty'] = $Quantity_On_Hand;
                    //$productData['ean'] = $ean;

                    $selectedProducts[] = $productData;

                    unset($upc);
                    unset($ean);
                    unset($gtin);
                }

                if (count($selectedProducts)) {

                   //print_r($selectedProducts);die;

                    $session = Yii::$app->session;
                    $c=0;
                    $connection = Yii::$app->getDb();

                    //print_r($selectedProducts);die;

                    foreach ($selectedProducts as $key => $value) {

                        $product=Data::sqlRecords("select * from jet_product where sku='".addslashes($value['sku'])."' and merchant_id='".$merchant_id."'","one","select");
                    
                        if($product){

                             $query="UPDATE `jet_product` SET qty='".$value['qty']."' WHERE sku='".addslashes($value['sku'])."' AND merchant_id=".$merchant_id;  
                             $model = $connection->createCommand($query)->execute();
                             /*$query="UPDATE `walmart_product` SET product_price='".$value['price']."' WHERE product_id='".$product['bigproduct_id']."' AND merchant_id=".$merchant_id;  
                             $model = $connection->createCommand($query)->execute();

                             $query = "UPDATE `newegg_product` SET product_price='" . $value['price']."' WHERE product_id='" . addslashes($product['bigproduct_id']) . "' AND merchant_id=" . $merchant_id;
                             $model = $connection->createCommand($query)->execute();*/

                             $c++;
                         
                        }

                    }
                    //die("shdjkhkdfklj");
                    
echo $c;die;
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
        //return $this->redirect(['index']);
    } 

    public function actionReadcsvamit()
    {
        
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        $connection = Yii::$app->getDb();

        $merchant_id = Yii::$app->user->identity->id;
        
        if (isset($_FILES['csvfile']['name'])) {
            //var_dump($_FILES);die;
            $mimes = array('-application/excel', 'text/plain', 'text/csv', 'text/tsv', 'text/comma-separated-values','application/octet-stream');
            
           
           
            $newname = $_FILES['csvfile']['name'];

            if (!file_exists(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id)) {
                mkdir(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id, 0775, true);
            }

            $target = Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id . '/' . $newname . '-' . time();
            $row = 0;
            $flag = false;
            $row1 = 0;
            if (!file_exists($target)) {
                move_uploaded_file($_FILES['csvfile']['tmp_name'], $target);
            }

            $selectedProducts = array();
            $import_errors = array();
            if (($handle = fopen($target, "r"))) {

                $row = 0;
                $data1=102955;
                $c=10237;
                while (($data = fgetcsv($handle, 90000, ",")) !== FALSE){

                    /*if ($row == 0 && (trim($data[1]) != 'parent_sku' || trim($data[2]) != 'name' || trim($data[9]) != 'category_name'  || trim($data[12])!='upc' || trim($data[7])!='price' || trim($data[4])!='brand' || trim($data[3])!='description' || trim($data[16]) != 'Weight' || trim($data[32]) != 'product_image_1')) {
                        $flag = true;
                        break;
                    }*/

                    if ($row == 0 && ((trim($data[1]) != 'parent_sku') && ($data[27]!='variation_1'))){
                        $flag = true;
                        break;
                    }

                    $num = count($data);
                    $row++;
                    if ($row == 1)
                        continue;

                    if($data[1]=='' && $data[27]!='')
                        continue;

                    else if($data[1]=='' && $data[27]=='')
                        $skuvariant=trim($data[0]);

                    else if($data[1]!='' && $data[27]!='')
                        $skuvariant=trim($data[0]);


                    $description=trim($data[3]);

                    //$Short_description=trim($data[25]);

                    $upc= $data[12];

                    $Brand= trim($data[4]);

                    $price = $data[7];

                    $title= trim($data[2]);

                    $Category_id= trim($data[9]);

                    $tax_code = '2040274';

                    $Weight= trim($data[16]);

                   // $skuvariant=trim($data[0]);

                    $Image= trim($data[32]);

                  

                   
                    $productData = array();
                    $productData['description'] = addslashes($description);
                    //$productData['Short_description'] = addslashes($Short_description);
                    $productData['upc'] = $upc;
                    $productData['sku'] = addslashes($skuvariant);
                    $productData['Brand'] = addslashes($Brand);
                
                    $productData['Category_id'] = addslashes($Category_id);
                    //$productData['Weight'] = addslashes($Weight);
                    $productData['title'] = addslashes($title);
                    $productData['Image'] = addslashes($Image);
                  
                    $productData['price'] = $price;
                   
                   


                    //$productData['price_amount'] = $price_amount;

                    //$productData['upc'] = $pro_upc;
                    
                    $product['id']=$data1;
                    $product['name']= $productData['title'];
                    $product['sku']= $productData['sku'];
                    $product['description']=$productData['description'];
                    $product['price']=$productData['price'];
                    $product['sale_price']=$productData['price'];
                    $product['categories'][0]= $productData['Category_id'];
                    $product['brand_id']=$productData['Brand'];
                    $product['inventory_level']=0;
                    $product['upc']=$productData['upc'];

                    

                    $variants['id']=$c;
                    $variants['product_id']=$product['id'];
                    $variants['sku']=$product['sku'];
                    $variants['sku_id']=0;
                    $variants['price']=$productData['price'];
                    $variants['calculated_price']=0;
                    //$variants['weight']=$productData['Weight'];
                    $variants['width']=0;
                    $variants['height']=1;
                    $variants['depth']=0;
                    $variants['is_free_shipping']=0;
                    $variants['fixed_cost_shipping_price']=0;
                    $variants['calculated_weight']=0;
                    $variants['purchasing_disabled']=0;
                    $variants['purchasing_disabled_message']=0;
                    $variants['image_url']=trim($productData['Image']);
                    $variants['cost_price']=0;
                    $variants['upc']=$productData['upc'];
                    $variants['mpn']=0;
                    //$variants['gtin']=$productData['gtin'];
                    $variants['inventory_level']=0;
                    $variants['inventory_warning_level']=0;
                    $variants['bin_picking_number']=0;
                    $variants['option_values']=0;

                    $product['variants'][0]=$variants;

                    //echo $product['id'].'/';

                    $product1=Data::sqlRecords("select bigproduct_id from jet_product where merchant_id='".$merchant_id."' and bigproduct_id='".$variants['product_id']."' and sku='".$product['sku']."'","one","select");

                    $data1++;
                    $c++;

                   // $selectedProducts[]=$product;
                    if($product1){
                        continue;
                    }
                    else{

                        //print_r($product);die;
 //echo $skuvariant;die;
                        Jetproductinfo::saveNewRecords($product, $merchant_id, $connection,false,$this->bigcom);
                    }
                }
die("dsfds");
                 if (count($selectedProducts)) {

                    $session = Yii::$app->session;

                    $size_of_request = 10;//Number of products to be uploaded at once(in single feed)
                    $pages = (int)(ceil(count($selectedProducts) / $size_of_request));

                    return $this->render('ajaxbulkupdate', [
                        'totalcount' => count($selectedProducts),
                        'pages' => $pages,
                        'products' => json_encode($selectedProducts)
                    ]);

                } 
                else {
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
    }


    public function actionBatchupdate12()
    {

        $session = Yii::$app->session;
        $products = Yii::$app->request->post();

        $when_title = '';
        $when_fulfillment_lag_time = '';
        $when_skuoverride = '';
        $when_product_id_override = '';
        $when_short_description = '';
        $when_self_description = '';
        $when_long_description = '';
        $when_taxcode = '';
        $when_barcode = '';
        $invalid_taxcode=[];
        $id = [];
        $option_id = [];
        foreach ($products['products'] as $product) {
            if((empty($product['tax_code']) || strlen($product['tax_code']) == 7))
            {
                if ($product['type'] == 'No Variants') {
                    $id[] = $product['id'];
                    $when_title .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['title'] . '"';
                    $when_fulfillment_lag_time .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['fulfillment_lag_time'] . '"';
                    $when_skuoverride .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['price_sku_override'] . '"';
                    $when_product_id_override .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['price_product_id_override'] . '"';
                    $when_short_description .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['short_description'] . '"';
                    $when_self_description .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['self_description'] . '"';
                    $when_long_description .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['long_description'] . '"';
                    $when_taxcode .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['tax_code'] . '"';

                }
            }else {
                $invalid_taxcode[] = $product['sku'];
            }

        }
        $ids = implode(',', $id);
        try {
            $query = "UPDATE `walmart_product` SET 
                                    `product_title` = CASE `id` 
                                   " . $when_title . "
                                END, 
                                    `fulfillment_lag_time` = CASE `id`
                                    " . $when_fulfillment_lag_time . " 
                                END, 
                                    `sku_override` = CASE `id`
                                    " . $when_skuoverride . " 
                                END, 
                                    `product_id_override` = CASE `id`
                                    " . $when_product_id_override . " 
                                END, 
                                    `short_description` = CASE `id`
                                    " . $when_short_description . " 
                                END, 
                                    `self_description` = CASE `id`
                                    " . $when_self_description . " 
                                END, 
                                    `long_description` = CASE `id`
                                    " . $when_long_description . " 
                                END, 
                                    `tax_code` = CASE `id`
                                    " . $when_taxcode . " 
                                END
                                WHERE id IN (" . $ids . ")";

            Data::sqlRecords($query, null, 'update');

            $return_msg['success']['message'] = "Product(s) information successfully updated";
            $return_msg['success']['count'] = count($id);
        } catch (Exception $e) {
            $return_msg['error'] = $e->getMessage();
        }

        if (count($invalid_taxcode) > 0) {
            $return_msg['error'] = json_encode($invalid_taxcode);
        }
        return json_encode($return_msg);
    }

    public function actionBatchupdate()
    {

        $session = Yii::$app->session;
        $products = Yii::$app->request->post();
        
        /*$connection = Yii::$app->getDb();
        $merchant_id = Yii::$app->user->identity->id;
        foreach ($products as $key => $value) {
            Jetproductinfo::saveNewRecords($value, $merchant_id, $connection,false,$this->bigcom);
        }
        $return_msg['success']['message'] = "Product(s) information successfully updated";*/
        $when_title = '';
        $when_fulfillment_lag_time = '';
        $when_skuoverride = '';
        $when_product_id_override = '';
        $when_short_description = '';
        $when_self_description = '';
        $when_long_description = '';
        $when_taxcode = '';
        $when_barcode = '';
        $invalid_taxcode=[];
        $id = [];
        $option_id = [];
        foreach ($products['products'] as $product) {
            if((empty($product['tax_code']) || strlen($product['tax_code']) == 7))
            {
                if ($product['type'] == 'No Variants') {
                    $id[] = $product['id'];
                    $when_title .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['title'] . '"';
                    $when_fulfillment_lag_time .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['fulfillment_lag_time'] . '"';
                    $when_skuoverride .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['price_sku_override'] . '"';
                    $when_product_id_override .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['price_product_id_override'] . '"';
                    $when_short_description .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['short_description'] . '"';
                    $when_self_description .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['self_description'] . '"';
                    $when_long_description .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['long_description'] . '"';
                    $when_taxcode .= ' WHEN ' . $product['id'] . ' THEN ' . '"' . $product['tax_code'] . '"';

                }
            }else {
                $invalid_taxcode[] = $product['sku'];
            }

        }
        $ids = implode(',', $id);
        try {
            $query = "UPDATE `walmart_product` SET 
                                    `product_title` = CASE `id` 
                                   " . $when_title . "
                                END, 
                                    `fulfillment_lag_time` = CASE `id`
                                    " . $when_fulfillment_lag_time . " 
                                END, 
                                    `sku_override` = CASE `id`
                                    " . $when_skuoverride . " 
                                END, 
                                    `product_id_override` = CASE `id`
                                    " . $when_product_id_override . " 
                                END, 
                                    `short_description` = CASE `id`
                                    " . $when_short_description . " 
                                END, 
                                    `self_description` = CASE `id`
                                    " . $when_self_description . " 
                                END, 
                                    `long_description` = CASE `id`
                                    " . $when_long_description . " 
                                END, 
                                    `tax_code` = CASE `id`
                                    " . $when_taxcode . " 
                                END
                                WHERE id IN (" . $ids . ")";

            Data::sqlRecords($query, null, 'update');

            $return_msg['success']['message'] = "Product(s) information successfully updated";
            $return_msg['success']['count'] = count($id);
        } catch (Exception $e) {
            $return_msg['error'] = $e->getMessage();
        }

        if (count($invalid_taxcode) > 0) {
            $return_msg['error'] = json_encode($invalid_taxcode);
        }
        return json_encode($return_msg);
    }

    public function actionIndexRetire()
    {
        
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }

        return $this->render('index-retire');
    }

    public function actionExportretireproduct()
    {
        ini_set('memory_limit','2048M');
        $merchant_id = Yii::$app->user->identity->id;

        if (!file_exists(\Yii::getAlias('@webroot') . '/var/csv_export/product/retire/' . $merchant_id)) {
            mkdir(\Yii::getAlias('@webroot') . '/var/csv_export/product/retire/' . $merchant_id, 0775, true);
        }
        $base_path = \Yii::getAlias('@webroot') . '/var/csv_export/product/retire/' . $merchant_id . '/retire-product.csv';
        $file = fopen($base_path, "w");

        $headers = array('Sku', 'Type');

        $row = array();
        foreach ($headers as $header) {
            $row[] = $header;
        }
        fputcsv($file, $row);

        $productdata = array();
        $i = 0;

        $model = Data::sqlRecords("SELECT * FROM  `jet_product` INNER JOIN `walmart_product` ON `jet_product`.`bigproduct_id`=`walmart_product`.`product_id` WHERE `walmart_product`.`merchant_id`='".$merchant_id."' AND `walmart_product`.`status` = 'PUBLISHED'", 'all');

        //print_r($model);die();
        if (empty($model)) {

            Yii::$app->session->setFlash('error', "Your Products are not PUBLISHED on walmart....");
        
            return $this->redirect(['index-retire']);
        }
        foreach ($model as $value) {
            if ($value['sku'] == "") {
                continue;
            }
               
            if ($value['type'] == "simple") {
                $productdata[$i]['sku'] = $value['sku'];
                $productdata[$i]['type'] = "No Variants";
                $i++;
            } else {
                $optionResult = [];
                /*$query = "SELECT option_id,option_title,option_sku,option_qty,option_unique_id,option_price,asin,option_mpn FROM `jet_product_variants` WHERE product_id='" . $value['product_id'] . "' order by option_sku='" . addslashes($value['sku']) . "' desc";
                $optionResult = Data::sqlRecords($query);*/
                $optionResult = Data::sqlRecords("SELECT * FROM `jet_product_variants` INNER JOIN `walmart_product_variants`  ON `jet_product_variants`.`option_id`=`walmart_product_variants`.`option_id` WHERE `walmart_product_variants`.`merchant_id`='" . $merchant_id . "' AND `walmart_product_variants`.`product_id`='" . $value['product_id'] . "'", 'all');


                 //print_r($value['sku']);die();
                if (is_array($optionResult) && count($optionResult) > 0) {
                    foreach ($optionResult as $key => $val) {
                        if ($val['option_sku'] == "")
                            continue;
                        if ($value['sku'] == $val['option_sku']) {
                            $productdata[$i]['type'] = "Parent";
                        } else {
                            $productdata[$i]['type'] = "Variants";
                        }
                        $productdata[$i]['sku'] = $val['option_sku'];
                        $i++;

                    }
                }
            }
        }
        foreach ($productdata as $v) {

            $row = array();
            $row[] = $v['sku'];
            $row[] = $v['type'];

            fputcsv($file, $row);
        }
        fclose($file);
        $encode = "\xEF\xBB\xBF"; // UTF-8 BOM
        $content = $encode . file_get_contents($base_path);
        return \Yii::$app->response->sendFile($base_path);
    }

    public function actionReadretirecsv()
    {
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }

        $merchant_id = Yii::$app->user->identity->id;

        if (isset($_FILES['csvfile']['name'])) {
            //var_dump($_FILES);die;
            $mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv', 'text/comma-separated-values');
            if (!in_array($_FILES['csvfile']['type'], $mimes)) {
                Yii::$app->session->setFlash('error', "CSV File type Changed, Please import only CSV file");
                return $this->redirect(['index']);
            }

            $newname = $_FILES['csvfile']['name'];

            if (!file_exists(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id)) {
                mkdir(Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id, 0775, true);
            }

            $target = Yii::getAlias('@webroot') . '/var/csv_import/product/' . date('d-m-Y') . '/' . $merchant_id . '/' . $newname . '-' . time();
            $row = 0;
            $flag = false;
            $row1 = 0;
            if (!file_exists($target)) {
                move_uploaded_file($_FILES['csvfile']['tmp_name'], $target);
            }

            $selectedProducts = array();
            $import_errors = array();
            if (($handle = fopen($target, "r"))) {
                $status = WalmartProductModel::PRODUCT_STATUS_UPLOADED;
                /*$allpublishedSku = WalmartProduct::getAllProductSku($merchant_id);*/
                /*$allpublishedSku = WalmartProduct::getAllProductSku($merchant_id,$status);*/

                $row = 0;
                while (($data = fgetcsv($handle, 90000, ",")) !== FALSE) {
                    if ($row == 0 && (trim($data[0]) != 'Sku' || trim($data[1]) != 'Type')) {
                        $flag = true;
                        break;
                    }
                    $num = count($data);
                    $row++;
                    if ($row == 1)
                        continue;

                    $pro_sku = trim($data[0]);
                    $pro_type = trim($data[1]);

                    if ($pro_sku == '' || $pro_type == '') {
                        $import_errors[$row] = 'Row ' . $row . ' : Invalid data.';
                        continue;
                    }

                    /*if(!in_array($pro_sku,$allpublishedSku)) {
                        $import_errors[$row] = 'Row '.$row.' : '.'Sku => "'.$pro_sku.'" is invalid/not published on walmart.';
                        continue;
                    }*/

                    $productData = array();
                    $productData['sku'] = $pro_sku;
                    $productData['type'] = $pro_type;

                    $productData['currency'] = CURRENCY;

                    $selectedProducts[] = $productData;
                }
                if (count($selectedProducts)) {

                    $session = Yii::$app->session;

                    $size_of_request = 5;//Number of products to be uploaded at once(in single feed)
                    $pages = (int)(ceil(count($selectedProducts) / $size_of_request));


                    //Increase Array Indexes By 1
                    //$selectedProducts = array_combine(range(1, count($selectedProducts)), array_values($selectedProducts));

                    //$session->set('selected_products', $selectedProducts);

                    return $this->render('bulkretire', [
                        'totalcount' => count($selectedProducts),
                        'pages' => $pages,
                        'products' => json_encode($selectedProducts)
                    ]);

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

    public function actionRetireproduct()
    {

        $session = Yii::$app->session;
        $skus = Yii::$app->request->post();

        $errors = [];
        $success = [];
        foreach ($skus['products'] as $sku) {

            $retireProduct = new Walmartapi(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);
            $feed_data = $retireProduct->retireProduct($sku['sku']);


            if (isset($feed_data['ItemRetireResponse'])) {
                $success[] = '<b>' . $feed_data['ItemRetireResponse']['sku'] . ' : </b>' . $feed_data['ItemRetireResponse']['message'];
            } elseif (isset($feed_data['errors']['error'])) {
                if (isset($feed_data['errors']['error']['code']) && $feed_data['errors']['error']['code'] == "CONTENT_NOT_FOUND.GMP_ITEM_INGESTOR_API" && $feed_data['errors']['error']['field'] == "sku") {
                    $errors[] = $sku['sku'] . ' : Product not Uploaded on Walmart.';
                } else {
                    $errors[] = $sku['sku'] . ' : ' . $feed_data['errors']['error']['description'];
                }
            } else {
                $errors[] = $sku['sku'] . ' : Sku not retired';
            }
        }

        if (count($errors)) {
            $return_msg['error'] = /*implode('<br/>', $errors);*/
                json_encode($errors);

            //$return_msg['success']['count'] = count($errors);
        }
        if (count($success)) {
            $return_msg['success']['message'] = implode('<br/>', $success);
            $return_msg['success']['count'] = count($success);
        }

        return json_encode($return_msg);
    }

}