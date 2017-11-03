<?php
namespace frontend\modules\walmart\controllers;

use Yii;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\AttributeMap;
use frontend\modules\walmart\models\WalmartAttributeMap;

use frontend\modules\walmart\components\BigcommerceClientHelper;
use frontend\modules\walmart\components\Walmartapi;

class WalmartCarriersMapController extends WalmartmainController
{
    public function actionIndex()
    {
        $merchant_id = MERCHANT_ID;
        $query = "SELECT value FROM `walmart_config` WHERE `merchant_id`={$merchant_id} AND data='shipping_mappings' ";
        $result = Data::sqlRecords($query, null, 'select');
        
        $shipping_mappings = '';
        if(count($result)==0)
        {
            $shipping_mappings = [];
        }
        else
        {
            $shipping_mappings = json_decode($result[0]['value'],true);
        }
        $carriers = ['UPS','USPS','FedEx','Airborne','OnTrac'];
        
        return $this->render('index',['mappings'=>$shipping_mappings,'carriers'=>$carriers]);
    }

    public function actionSave()
    {
        $data = Yii::$app->request->post();
        
        $result = [];
        $merchant_id = MERCHANT_ID;
        if (!empty($data['carrier']['shopify'][0])) {

               foreach($data['carrier']['shopify'] as $key=>$value){
                if (!is_null($value)) {
                    $result[$this->getKey($value)] = ['shopify'=>$value,'walmart'=>$data['carrier']['walmart'][$key]];
                }
                
            }
            

            
            $result = addslashes(json_encode($result));
            $query = "SELECT value FROM `walmart_config` WHERE `merchant_id`={$merchant_id} AND data='shipping_mappings' ";
            $result1 = Data::sqlRecords($query, null, 'select');
            if(count($result1)==0)
            {
                $query = "INSERT INTO `walmart_config`(`merchant_id`,`data`,`value`) VALUES('{$merchant_id}','shipping_mappings','{$result}') ";
                Data::sqlRecords($query, null, 'insert');
            }
            else
            {
                $query = "UPDATE `walmart_config` SET `value`='{$result}' WHERE `merchant_id`={$merchant_id} AND data='shipping_mappings' ";
                Data::sqlRecords($query, null, 'update');
            }
            Yii::$app->session->setFlash('success', "successfully mapped carrier !");
            return $this->redirect(['index']);
        }
        else{
              $query = "DELETE FROM `walmart_config` WHERE `merchant_id`={$merchant_id} AND data='shipping_mappings' ";
                Data::sqlRecords($query, null, 'delete');
            Yii::$app->session->setFlash('error', "Please map carrier atleast one carrier !");
                return $this->redirect(['index']);
        }
    }

    public function getKey($value){
        return trim(str_replace(' ','',$value));
    }

}

