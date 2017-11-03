<?php
namespace frontend\modules\walmart\controllers;
use Yii;
use yii\web\Controller;
use frontend\modules\walmart\components\Walmartapi;
use frontend\modules\walmart\components\Data;

class WebhookupdateController extends Controller
{
	public function beforeAction($action)
	{
		if ($this->action->id == 'productupdate') {
			Yii::$app->controller->enableCsrfValidation = false;
		}
		if ($this->action->id == 'createshipment') {
			Yii::$app->controller->enableCsrfValidation = false;
		}
		return true;
	}
	/**
	 * Update Inventory/price On Walmart
	 * @param [sku,price,merchant_id,type] 
	 * @return string
	 */
	public function actionProductupdate()
	{
		if($_POST)
		{	
			try
			{
				
				$product=$_POST;
				$merchant_id = $product['merchant_id'];
				$path='productupdate/'.$merchant_id.'/'.Data::getKey($product['sku']).'.log';
				$walmartConfig=[];
			    $walmartConfig = Data::sqlRecords("SELECT `consumer_id`,`secret_key`,`consumer_channel_type_id` FROM `walmart_configuration` WHERE merchant_id='".$product['merchant_id']."'",'one','select');
			    $merchant_id=$product['merchant_id'];
			    if(is_array($walmartConfig) && count($walmartConfig)>0)
			    {
			    	Data::createLog("walmart_configuration available: ".PHP_EOL,$path);
			        //$walmartHelper = new Walmartapi($walmartConfig['consumer_id'],$walmartConfig['secret_key'],$walmartConfig['consumer_channel_type_id']);
			       // define("MERCHANT_ID", $merchant_id);
			        if(isset($product['type']) && $product['type']=="price")
			        {
			        	//update custom price on walmart
			        	$updatePrice = Data::getCustomPrice($product['price'],$merchant_id);
			        	if($updatePrice)
			        		$product['price']=$updatePrice;
			        	//change price log
			        	//$path='productupdate/price/'.$merchant_id.'/'.Data::getKey($product['sku']).'.log';
			        	//Data::createLog("price data: ".json_encode($product).PHP_EOL,$path);
			        	$shopDetails = Data::getWalmartShopDetails(MERCHANT_ID);
			            $product['currency'] = isset($shopDetails['currency'])?$shopDetails['currency']:'USD';

			            //define("CURRENCY", $currency);
			            //$walmartHelper->updatePriceOnWalmart($product,"webhook");
			        }
			        elseif(isset($product['type']) && $product['type']=="inventory")
			        {
			        	//change price log
			        	//$path='productupdate/inventory/'.$merchant_id.'/'.Data::getKey($product['sku']).'.log';
			        	//Data::createLog("inventory data: ".json_encode($product).PHP_EOL,$path);
			        	//$walmartHelper->updateInventoryOnWalmart($product,"webhook");

			        }
			        //save product update log
			        $productExist=Data::sqlRecords("SELECT id FROM walmart_price_inventory_log WHERE merchant_id='".$product['merchant_id']."' and sku='".$product['sku']."' LIMIT 0,1",'one','select');
			        if(is_array($productExist) && count($productExist)>0)
			        {

			        	$query="UPDATE walmart_price_inventory_log SET type='".$product['type']."',data='".addslashes(json_encode($product))."' WHERE merchant_id='".$product['merchant_id']."' and sku='".$product['sku']."'";
			        	Data::createLog("product update data: ".$query.PHP_EOL,$path);
			        	//echo "<br>"."update".$query;
			        	Data::sqlRecords($query,null,'update');
			        }
			        else
			        {
			        	$query="INSERT INTO `walmart_price_inventory_log`(`merchant_id`,`type`,`data`,`sku`) VALUES('{$product['merchant_id']}','{$product['type']}','".addslashes(json_encode($product))."','{$product['sku']}')";
			        	//echo "<br>"."insert".$query;
			        	Data::createLog("product insert data: ".$query.PHP_EOL,$path);
			        	Data::sqlRecords($query,null,'insert');
			        }
			    }
			}
			catch(Exception $e)
			{
				Data::createLog("productupdate error ".json_decode($_POST),'productupdate/exception.log','a',true);
			}
	    }
	    else
		{
			Data::createLog("product update error");
		}
	}
	/**
	 * Update fulfillment On Walmart
	 * @param  []
	 * @return string
	 */
	public function actionCreateshipment()
	{
		if($_POST && isset($_POST['id']))
		{
			$shop=isset($_POST['shopName'])?$_POST['shopName']:"NA";
			$path='shipment/'.$shop.'/'.Data::getKey($_POST['id']).'log';
			try
			{	
				//create shipment data
			    Data::createLog("order shipment in walmart".PHP_EOL.json_encode($_POST),$path);
				$objController=Yii::$app->createController('walmart/walmartorderdetail');
				$objController[0]->actionCurlprocessfororder();
			}
			catch(Exception $e)
			{
				Data::createLog("order shipment error ".json_decode($_POST),$path,'a',true);
			}
			
		}
		else
		{
			Data::createLog("order shipment error wrong post");
		}
	}

}