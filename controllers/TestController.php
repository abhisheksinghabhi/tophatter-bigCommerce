<?php
namespace frontend\modules\tophatter\controllers;
use Yii;
use yii\web\Controller;
use frontend\modules\tophatter\components\Data;

class TestController extends Controller
{
public function actionUpdateupc()
    {
        $data = file_get_contents(Yii::getAlias('@webroot').'/var/202.csv');
        $rows = explode("\n",$data);
        $csvArray = array();
        foreach($rows as $row) {
            $csvArray[] = str_getcsv($row);
        }
               foreach ($csvArray as $csvArraykey => $csvArrayvalue) {
                                if($csvArraykey==0){
                                    continue;
                                }
                                else{
                                    if(isset($csvArrayvalue[0]) && !empty($csvArrayvalue[0])){
                                            $selectquery = "SELECT `additional_info` FROM `jet_product` WHERE `sku`='".$csvArrayvalue[1]."' AND `merchant_id`='202'";
                                            $modelU = Data::sqlRecords($selectquery, "one", "select");
                                            $modelU['additional_info']='{"upc_code":null,"brand":"Eat My Tackle","mpn":""}';
                                            $jsonData = json_decode($modelU['additional_info'],true);
                                            foreach ($jsonData as $key => $value) {
                                                if(isset($csvArrayvalue[14]) && !empty($csvArrayvalue[14])){
                                                   if($key=='upc_code'){
                                                    $jsonData[$key]=$csvArrayvalue[14];
                                                   }
                                                }
                                            }
                                            $real_Data = json_encode($jsonData);
                                            $query = "UPDATE `jet_product`  SET `upc`='" .$csvArrayvalue[14]."',`additional_info`='".$real_Data."' WHERE `sku`='".$csvArrayvalue[1]."' AND `merchant_id`='202'";
                                            Data::sqlRecords($query, null, "update");
                                        }
                                    }
                                }
                            
        print_r("ok done");die;
    }

}
