<?php 
namespace frontend\modules\walmart\components\Dashboard;

use Yii;
use yii\base\Component;
use frontend\modules\walmart\components\Data;

class Stockinfo extends Component
{
	/**
     * To check if product inventory is low
     * @param string $merchant_id
     * @return bool
     */
    public static function getInventoryUpdatesInfo($merchantId)
    {
    	if(is_numeric($merchantId)){
    		$result = [];
    		$output = [
    					'title'=>[],
    					'minQty'=>5,
    					'count'=>0
					];
    		$query = "SELECT `value` FROM `walmart_config` WHERE `data` = 'inventory' AND `merchant_id` ={$merchantId}";
            $result = Data::sqlRecords($query, 'one');
            $minQty = is_array($result) && isset($result['value'])?$result['value']:5;
            $result = [];
    		$query = "SELECT `title` FROM `jet_product` WHERE `qty` < '{$minQty}' AND `merchant_id` ='{$merchantId}' order by `id` desc";
            $result = Data::sqlRecords($query, 'all');
            $countRows = count($result)>0?count($result):0;
            $titleArray = count($result)>0?array_column($result, 'title'):[];
            $titleArray = array_slice($titleArray, 0, 5, true);
            $output = [
    					'title' => $titleArray,
    					'minQty' => $minQty,
    					'count' => $countRows,
					];
            return $output;
        }
    }
}