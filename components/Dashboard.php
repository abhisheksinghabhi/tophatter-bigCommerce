<?php 
namespace frontend\modules\walmart\components;

use Yii;
use yii\base\Component;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\models\WalmartProduct;
use frontend\modules\walmart\models\WalmartOrderDetail;

class Dashboard extends Component
{

    /**
     * Prepare Dashboard data
     *
     * @param $merchantId 
     * @return array
     */
    public static function getDashboardInfo($merchantId=null,$session)
    {
        $dashboard = array('reviewProduct'=>'', 'availableProduct'=>'', 'readytoshipOrders'=>'', 'total'=>'');
        
        if(is_null($merchantId) && !defined('MERCHANT_ID')){
            return $dashboard;
        }
        elseif(is_null($merchantId) && defined('MERCHANT_ID'))
            $merchantId = MERCHANT_ID;

        if(!isset($session['walmart_dashboard']))
        {
            try
            {
                $live_products_query = "SELECT COUNT(*) as `live_products` FROM `walmart_product` LEFT JOIN `walmart_product_variants` ON `walmart_product`.`product_id`=`walmart_product_variants`.`product_id` WHERE `walmart_product`.`merchant_id`=".$merchantId." AND `walmart_product`.`status`='".WalmartProduct::PRODUCT_STATUS_UPLOADED."' AND `walmart_product_variants`.`status`='".WalmartProduct::PRODUCT_STATUS_UPLOADED."'";
                $availableProduct = Data::sqlRecords($live_products_query, 'one');

                $completedOrders = Data::sqlRecords("SELECT COUNT(*) as `total_orders` FROM `walmart_order_details` WHERE `status`='".WalmartOrderDetail::ORDER_STATUS_COMPLETED."' AND `merchant_id`=$merchantId", 'one');
                
                $readytoshipOrders = Data::sqlRecords("SELECT COUNT(*) as `ready` FROM `walmart_order_details` WHERE `status` = '".WalmartOrderDetail::ORDER_STATUS_ACKNOWLEDGED."' AND `merchant_id`=$merchantId", 'one');
                
                $result = Data::sqlRecords("SELECT `order_total` FROM `walmart_order_details` WHERE `status` = '".WalmartOrderDetail::ORDER_STATUS_COMPLETED."' AND `merchant_id`=$merchantId", 'all');
                    
                $total = 0;
                if(is_array($result) && count($result)>0)
                {
                    foreach ($result as $val)
                    {   
                        if(isset($val['order_total'])) {
                            $total += floatval($val['order_total']);
                        }                           
                    }
                }                           
            }
            catch(Exception $e) // an exception is raised if a query fails
            {
            
            }


            $dashboard['totalOrders'] = $completedOrders['total_orders'];
            $dashboard['availableProduct'] = $availableProduct['live_products'];
            $dashboard['readytoshipOrders'] = $readytoshipOrders['ready'];
            $dashboard['total'] = $total;
            
            
            //print_r($dashboard);die;
            $session->set('walmart_dashboard', $dashboard);
        }
        else
        {
            $dashboard = $session['walmart_dashboard'];
        }
        return $dashboard;
    }

    /**
     * Prepare Order detail Graph data
     *
     * @param $merchantId 
     * @return array
     */
    public static function prepareOrderGraphData($merchantId=null)
    {
        $finalSkuArr = array();

        if(is_null($merchantId) && !defined('MERCHANT_ID'))
            return $finalSkuArr;
        elseif(is_null($merchantId) && defined('MERCHANT_ID'))
            $merchantId = MERCHANT_ID;

        //if ($id==14) {
        $distinct_sku = Data::sqlRecords("SELECT `sku`  FROM `walmart_order_details` WHERE `status` LIKE '".WalmartOrderDetail::ORDER_STATUS_COMPLETED."' AND `merchant_id` = $merchantId", 'all');
        if ($distinct_sku)
        {
            foreach ($distinct_sku as $sku_key=>$sku_count)
            {
                if (count(explode(",", $sku_count['sku'])) >1)
                {
                    $expl=explode(",", $sku_count['sku']);
                                
                    foreach ($expl as $sku)
                    {
                        if(array_key_exists($sku, $finalSkuArr)){
                            $finalSkuArr[$sku] += 1;
                        } else {
                            $finalSkuArr[$sku] = 1;
                        }
                    }
                } else {
                    if(array_key_exists($sku_count['sku'],$finalSkuArr)){
                        $finalSkuArr[$sku_count['sku']]+=1;
                    } else {
                                $finalSkuArr[$sku_count['sku']]=1;
                    }
                }
            }
            arsort($finalSkuArr);
        }         
        //}
        return $finalSkuArr;
    }

    /**
     * Prepare Product detail Graph data
     *
     * @param $merchantId 
     * @return array
     */
    public static function prepareProductGraphData($merchantId=null)
    {
        $donut_chart_data = array('all_prod'=>'', 'simple_prod_with_stnd_code'=>'',
            'variants_prod_with_stnd_code'=>'', 'not_sku'=>'', 'missing_UPC_ASIN_MPN'=>'');

        if(is_null($merchantId) && !defined('MERCHANT_ID'))
            return $donut_chart_data;
        elseif(is_null($merchantId) && defined('MERCHANT_ID'))
            $merchantId = MERCHANT_ID;
  
        $all_prod = Data::sqlRecords("SELECT COUNT(*) as `all_product` FROM `walmart_product` WHERE `merchant_id`=$merchantId", 'one');
            
        $simple_prod_with_stnd_code = Data::sqlRecords("SELECT COUNT(*) as `simple_pro` FROM `walmart_product` WHERE `status` LIKE '".WalmartProduct::PRODUCT_STATUS_NOT_UPLOADED."' AND `product_type`='simple' AND `merchant_id`=$merchantId", 'one');
            
        $variants_prod_with_stnd_code = Data::sqlRecords("SELECT COUNT(*) as `variant_pro` FROM `walmart_product` WHERE `status` LIKE '".WalmartProduct::PRODUCT_STATUS_NOT_UPLOADED."' AND `product_type`='variants' AND `merchant_id`=$merchantId", 'one');
                        
        $donut_chart_data['all_prod'] = $all_prod['all_product'];
        //$donut_chart_data['mapped_prod'] = $mapped_prod;
        $donut_chart_data['simple_prod_with_stnd_code'] = $simple_prod_with_stnd_code['simple_pro'];
        $donut_chart_data['variants_prod_with_stnd_code'] = $variants_prod_with_stnd_code['variant_pro'];
        
        return $donut_chart_data;
    }
}
?>