<?php
namespace frontend\modules\tophatter\controllers;

use Yii;
use frontend\modules\tophatter\models\TophatterCategoryMap;
use frontend\modules\tophatter\models\TophatterCategory;
use frontend\modules\tophatter\components\Jetcategorytree;
use frontend\modules\tophatter\components\Data;

class CategorymapController extends TophattermainController
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        } else {
            $merchant_id = MERCHANT_ID;
            $blank = '';
            $model = TophatterCategoryMap::find()->where(['merchant_id' => $merchant_id])->andWhere(['!=', 'product_type', $blank])->all();
//            $data = WalmartCategory::find()->select('id,category_id,title,parent_id,level')->all();
            $category_tree = array();
            $category_detail = array();
            $rootCategory = \frontend\modules\tophatter\components\TophatterCategory::getrootcategory();
//            list($category_tree, $category_detail) = Jetcategorytree::createCategoryTreeArray($data);

            list($category_tree, $category_detail) = \frontend\modules\tophatter\components\TophatterCategory::getcategorytree();
//        print_r($category_tree);
//        print_r($category_detail);
//        die;
            //if($merchant_id==14){
            return $this->render('index', ['model' => $model, 'category_tree' => $category_tree, 'category_detail' => $category_detail, 'rootCategory' => $rootCategory]);
            // }
            //return $this->render('index',['model'=>$model,'data'=>$data]);
        }
    }

    public function actionSave()
    {
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        if (!isset($connection)) {
            $connection = Yii::$app->getDb();
        }
        $merchant_id = MERCHANT_ID;

       
        $data = Yii::$app->request->post();
    
        if ($data && isset($data['type'])) {

            foreach ($data['type'] as $key => $value) {
                $category_path = "";
                $category_id = "";
                $key = stripslashes($key);

                //code by himanshu
                if (strlen($value['taxcode']) == 7 && is_numeric($value['taxcode'])) {
                    $taxcode = $value['taxcode'];
                } else {
                    $taxcode = '';
                }
                unset($value['taxcode']);
                //end

                if (is_array($value) && count($value) > 0 && $value[0] != "") {

                    $category_path=implode(',',$value);
                    $category_path=rtrim($category_path,',');
                    $category_id=end($value);
                    if($category_id=="Other")
                        $category_id=$value[0];
                    $model="";
                    $sql='UPDATE `tophatter_category_map` SET  category_id="'.trim($category_id).'",category_path="'.trim($category_path).'", tax_code="'.$taxcode.'" where merchant_id="'.$merchant_id.'" and product_type="'.addslashes($key).'"';
                    $model = $connection->createCommand($sql)->execute();
                    $product="";
                    //$sql='UPDATE `walmart_product` SET  category="'.trim($category_id).'" where merchant_id="'.$merchant_id.'" and product_type="'.$key.'"';
                    $parent_category = $value[0];
                   // echo  $parent_category;die;
                    $sql="UPDATE `tophatter_product` `wp` INNER JOIN (SELECT * FROM `jet_product` where `merchant_id`='".$merchant_id."') as `jp` ON `jp`.`bigproduct_id` = `wp`.`product_id` SET  `wp`.`category`='".trim($category_id)."', `wp`.`parent_category`='".$parent_category."'  where `wp`.`merchant_id`='".$merchant_id."' AND `jp`.`product_type`='".addslashes($key)."'";
                    $product = $connection->createCommand($sql)->execute();
                }
                else{
                    $model="";
                    $sql='UPDATE `tophatter_category_map` SET  category_id="",category_path="",tax_code="'.$taxcode.'" where merchant_id="'.$merchant_id.'" and product_type="'.addslashes($key).'"';

                    $model = $connection->createCommand($sql)->execute();
                    $product = "";
                    //$sql='UPDATE `walmart_product` SET  category="" where merchant_id="'.$merchant_id.'" and product_type="'.$key.'"';
                    $sql="UPDATE `tophatter_product` `wp` INNER JOIN (SELECT * FROM `jet_product` where `merchant_id`='".$merchant_id."') as `jp` ON `jp`.`bigproduct_id` = `wp`.`product_id` SET  `wp`.`category`='', `wp`.`parent_category`='' where `wp`.`merchant_id`='".$merchant_id."' AND `jp`.`product_type`='".addslashes($key)."'";

                    $product = $connection->createCommand($sql)->execute();
                    continue;
                }
            }
            unset($data);
            Yii::$app->session->setFlash('success', "Tophatter Categories are mapped successfully with Product Type");
        }
        unset($connection);
        return $this->redirect(['index']);
        //return $this->redirect(Yii::$app->request->referrer);
        //return $this->redirect('/jetproduct/index',302);
    }

    public function actionGetcategory()
    {
        $msg["html"] = "";
        $msg['error'] = "";
        try {
            $html = "";
            $id = Yii::$app->request->post('id');
            $level = Yii::$app->request->post('level');
            $level = (int)$level;
            $level_1 = $level + 1;
            $path_str = Yii::$app->request->post('path_str');
            $type = Yii::$app->request->post('type');
            $category_path = array();
            if (trim($path_str) != "") {
                $category_path = explode(',', $path_str);
            }
            $type = trim($type);
            $path_str = '"' . trim($path_str) . '"';
            $type_str = '"' . $type . '"';
            $result = "";
            $result = JetCategory::find()->where(['parent_id' => $id, 'level' => $level])->all();
            if (count($result) > 0) {
                $html .= "<select name='type[" . $type . "][]' class='form-control'  onchange='selectChild(this," . $level_1 . "," . $path_str . "," . $type_str . ")'>";
                foreach ($result as $value) {
                    if (count($category_path) > $level && $category_path[$level] == trim($value->category_id)) {
                        $html .= "<option selected='selected' value='" . $value->category_id . "'>" . $value->title . "</option>";
                    } else {
                        $html .= "<option value='" . $value->category_id . "'>" . $value->title . "</option>";
                    }

                }
                $html .= "<select>";

            }
            $msg["html"] = $html;

        } catch (Exception $e) {
            $msg['error'] = $e->getMessage();
        }
        return json_encode($msg);
    }

    public function actionGetattrvalues()
    {
        $connection = Yii::$app->getDb();
        $path = file_get_contents('/opt/lampp/htdocs/tophatter_attributes_simple_type.json');
        $categoryAttr = [];
        $categoryAttr = json_decode($path, true);
        //var_dump($categoryAttr);die;
        $categoryModel = [];
        $categoryModel = $connection->createCommand('select category_id,attributes,tophatter_attributes from tophatter_category where 1')->queryAll();
        $dataValues = [];
        foreach ($categoryModel as $val) {
            $attr = [];
            $attr = json_decode($val['attributes'], true);
            $notreqattr = [];
            $notreqattr = explode(',', $val['tophatter_attributes']);
            if (is_array($notreqattr) && count($notreqattr) > 0) {
                $attrVal = [];
                foreach ($notreqattr as $v2) {
                    $value = '';
                    foreach ($categoryAttr as $key => $value) {
                        $arrAttr = explode('/', $key);
                        if ($arrAttr[0] == $v2 && $value['tophatter_attribute_enum']) {
                            $attrVal[] = [$arrAttr[0] => $value['tophatter_attribute_enum']];
                            break;
                        }
                    }
                }
                if (count($attrVal) > 0) {
                    echo $val['category_id'] . '----' . json_encode($attrVal) . "<br>";
                    $connection->createCommand('update `tophatter_category` set `tophatter_attribute_values`="' . addslashes(json_encode($attrVal)) . '" where category_id="' . $val['category_id'] . '"')->execute();
                    unset($attrVal);
                }
            }
            if (is_array($attr) && count($attr) > 0) {
                //var_dump($attr);echo "<hr>";
                $attrVal = [];
                foreach ($attr as $k1 => $v1) {
                    if (is_array($v1)) {
                        foreach ($v1 as $k => $v) {

                            $value = '';
                            foreach ($categoryAttr as $key => $value) {
                                $arrAttr = explode('/', $key);
                                if ($arrAttr[0] == $k && $value['tophatter_attribute_enum']) {
                                    $attrVal[] = [$arrAttr[0] => $value['tophatter_attribute_enum']];
                                    //$connection->createCommand('update `walmart_category` set `attribute_values`="'.$value['walmart_attribute_enum'].'"')->execute();
                                    //$attrVal[$arrAttr[0]]=$value['walmart_attribute_enum'];
                                    //echo $val['category_id']."<br>";
                                    break;
                                }
                            }
                            //$dataValues[] = $k;
                            break;
                        }
                    } else {
                        foreach ($categoryAttr as $key => $value) {
                            $arrAttr = explode('/', $key);
                            if ($arrAttr[0] == $v1 && $value['tophatter_attribute_enum']) {
                                $attrVal[] = [$arrAttr[0] => $value['tophatter_attribute_enum']];
                                //$connection->createCommand('update `walmart_category` set `attribute_values`="'.$value['walmart_attribute_enum'].'"')->execute();
                                //$attrVal[$arrAttr[0]]=$value['walmart_attribute_enum'];
                                //echo $val['category_id']."<br>";
                                break;
                            }
                        }
                        //$dataValues[] = $v1;
                    }

                }
                if (count($attrVal) > 0) {
                    //var_dump($attr);echo '<br>'.$val['category_id'].'---'.json_encode($attrVal)."<hr>";
                    // $connection->createCommand('update `walmart_category` set `attribute_values`="'.addslashes(json_encode($attrVal)).'" where category_id="'.$val['category_id'].'"')->execute();
                    unset($attrVal);
                }
            }
        }
        $attrVal = [];
        foreach ($categoryAttr as $key => $value) {
            $arrAttr = explode('/', $key);
            if (in_array($arrAttr[0], $dataValues) && $value['tophatter_attribute_enum']) {
                $attrVal[$arrAttr[0]] = $value['tophatter_attribute_enum'];
            }
        }
    }

    public function actionCreatetophattercategory()
    {
        $str = file_get_contents(\Yii::getAlias('@webroot') . '/var/TophatterCategories.2.json');
        $catData = json_decode($str, true);
        //var_dump($catData);die;
        foreach ($catData as $key1 => $val1) {
            $model = new TophatterCategory();
            $attr = array();
            $cal = array();
            $model->id = $key1;
            $model->category_id = $val1['cat_id'];
            $model->title = $val1['name'];
            $model->parent_id = $val1['parent_cat_id'];
            $model->level = $val1['level'];

            $cal = explode(',', $val1['tophatter_required_attributes']);
            $i = 0;
            if (count($cal) > 11) {
                for ($i = 12; $i < count($cal); $i++) {
                    if (!in_array($cal[$i], $attr)) {
                        $attr[] = $cal[$i];
                    }
                }
                $j = 0;
                $newarr = array();
                for ($j = 0; $j < count($attr); $j++) {
                    $exp = array();
                    $exp = explode('/', $attr[$j]);
                    if (count($exp) > 1) {
                        $newarr[] = [$exp[0] => [
                            "1" => $exp[0],
                            "2" => $exp[1],
                        ],];

                    } else {
                        $newarr[] = $attr[$j];
                    }
                }
                if (is_array($newarr) && count($newarr) > 0)
                    $model->attributes = json_encode($newarr);
            } else {
                $model->attributes = '';
            }
            $model->tophatter_attributes = $val1['tophatter_attributes'];
            $model->save(FALSE);
        }
    }

    public function actionUpdatetophattercategory()
    {
        $str = file_get_contents(\Yii::getAlias('@webroot') . '/var/tophatter_categoryold.json');
        $catValueData = json_decode($str, true);
        if (is_array($catValueData) && count($catValueData) > 0) {
            foreach ($catValueData as $value) {
                $query = "update `tophatter_category` set attribute_values='" . addslashes($value['attribute_values']) . "',tophatter_attribute_values='" . addslashes($value['tophatter_attribute_values']) . "' where category_id='" . $value['category_id'] . "'";
                Data::sqlRecords($query, null, 'update');
            }
        }
    }
}

