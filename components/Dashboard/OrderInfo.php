<?php 
namespace frontend\modules\tophatter\components\Dashboard;

use Yii;
use yii\base\Component;
use frontend\components\Data;

class OrderInfo extends Component
{
    /**
     * To Get Complete Orders Count
     * @param string $merchant_id
     * @return int
     */
    public static function getCompletedOrdersCount($merchantId)
    {
        if(is_numeric($merchantId)) {
            $result = [];
            $total = 0;
            $query = "SELECT COUNT(*) FROM `tophatter_order_details` WHERE `status` = 'shipped' AND `merchant_id` ={$merchantId}";
            $result = Data::sqlRecords($query, 'all');
            $total = is_array($result)?$result[0]["COUNT(*)"]:0;
            return $total; 
        }         
    }
    
    /**
     * To Get Acknowledged Orders Count
     * @param string $merchant_id
     * @return int
     */
    public static function getAcknowledgedOrdersCount($merchantId)
    {
       if(is_numeric($merchantId)) {
            $result = [];
            $total = 0;
            $query = "SELECT COUNT(*) FROM `tophatter_order_details` WHERE `status` = 'acknowledged' AND `merchant_id` ={$merchantId}";
            $result = Data::sqlRecords($query, 'all');
            $total = is_array($result)?$result[0]["COUNT(*)"]:0;
            return $total;
        }        
    }

    /**
     * To Get Cancelled Orders Count
     * @param string $merchant_id
     * @return int
     */
    public static function getCancelledOrdersCount($merchantId)
    {
         if(is_numeric($merchantId)) {
            $result = [];
            $total = 0;
            $query = "SELECT COUNT(*) FROM `tophatter_order_details` WHERE `status` = 'canceled' AND `merchant_id` ={$merchantId}";
            $result = Data::sqlRecords($query, 'all');
            $total = is_array($result)?$result[0]["COUNT(*)"]:0;
            return $total;
        }     
    }

    /**
     * To Get Cancelled Orders Count
     * @param string $merchant_id
     * @return int
     */
    public static function getTotalOrdersCount($merchantId)
    {
        if(is_numeric($merchantId)) {
            $result = [];
            $total = 0;
            $query = "SELECT COUNT(*) FROM `tophatter_order_details` WHERE `merchant_id` ={$merchantId}";
            $result = Data::sqlRecords($query, 'all');
            $total = is_array($result)?$result[0]["COUNT(*)"]:0;
            return $total;
        }      
    }

    /**
     * To Get Cancelled Orders Count
     * @param string $merchant_id
     * @return int
     */
    public static function getFailedOrdersCount($merchantId)
    {
        if(is_numeric($merchantId)) {
            $result = [];
            $total = 0;
            $query = "SELECT COUNT(*) FROM `tophatter_order_import_error` WHERE `merchant_id` ={$merchantId}";
            $result = Data::sqlRecords($query, 'all');
            $total = is_array($result)?$result[0]["COUNT(*)"]:0;
            return $total;
        }      
    }


    public static function removeFailedOrders($merchant_id)
    {
        
        $failedOrders = array();
        $failedOrdersList = [];
        $orderExistList = [];
        $failedOrders = Data::sqlRecords("SELECT `purchase_order_id` FROM `tophatter_order_import_error` WHERE `merchant_id`='".$merchant_id."'   ","all","select");
        if(is_array($failedOrders) && count($failedOrders)>0){
            $failedOrdersList = array_column($failedOrders, 'purchase_order_id');
        }
        if(count($failedOrdersList)>0){
            $orderExist = array();
            $orderExist = Data::sqlRecords("SELECT `purchase_order_id` FROM `tophatter_order_details` WHERE `merchant_id`='".$merchant_id."' AND `purchase_order_id` IN('".implode("' , '", $failedOrdersList)."') ","all","select");
            if(is_array($orderExist) && count($orderExist)>0){
                $orderExistList = array_column($orderExist, 'purchase_order_id');
                if(count($orderExistList)>0){
                    Data::sqlRecords("DELETE FROM `tophatter_order_import_error` WHERE `merchant_id`='".$merchant_id."' AND `purchase_order_id` IN('".implode("' , '", $orderExistList)."') ",null,"update");
                }
            }
            
        }
    }
   
}
