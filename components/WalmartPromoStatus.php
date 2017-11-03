<?php 
namespace frontend\modules\walmart\components;

use Yii;
use yii\base\Component;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\models\WalmartProduct;
use frontend\modules\walmart\components\Walmartapi;


class WalmartPromoStatus extends component
{
	const PROMOTIONAL_PRICE_STATUS_PENDING = 'PENDING';
	const PROMOTIONAL_PRICE_STATUS_PROCESSING = 'PROCESSING';
	const PROMOTIONAL_PRICE_STATUS_OK = 'OK';
	
	public static function getPromoStatus($productIds)
	{
		try{
			$result = [];
			if(is_array($productIds)){
				$productIds = implode(',', $productIds);
			}
			$productIds = trim($productIds);
			if(!isset($productIds) || empty($productIds)){
				return false;
			}
			$promos = [];
			$connection = Yii::$app->getDb();
			$query = "";
	        $query = $connection->createCommand("SELECT `sku`,`option_id`,`product_id` FROM `walmart_promotional_price` WHERE `product_id` IN(".$productIds.") GROUP BY `sku`");
	        $promos = $query->queryAll();
	        $url = "v3/promo/sku/";
	        $wal = new Walmartapi(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);
	        if(count($promos)==0){
	        	return "No promos available.";
	        }

	        $uploaded_ids = [];
	        foreach ($promos as $promo) {
	        	if (trim($promo ['sku']) == "") {
	        		continue;
	        	}
	        	$pricingList = [];
	        	$status = "";
	        	$response = "";
	        	$responseArray = [];
	        	$promoUrl = '';
	        	$promoUrl = $url . (string)trim($promo ['sku']);
	        	$response = $wal->getRequest($promoUrl);
	        	$count = 0;
	        	$error = 0;
	        	if(Walmartapi::is_json($response)){
		                $responseArray = json_decode($response,true);
		        }else{
		            $response = $wal->replaceNs($response);
		            $responseArray = Walmartapi::xmlToArray($response);
		        }

		        if( count($responseArray) > 0 ){
		        		if(isset($responseArray['errors']['error']))
		        		{
		        			//response : array(1) { ["errors"]=> array(1) { ["error"]=> array(8) { ["code"]=> string(28) "UNAUTHORIZED.GMP_GATEWAY_API" ["field"]=> string(12) "UNAUTHORIZED" ["description"]=> string(12) "Unauthorized" ["info"]=> string(12) "Unauthorized" ["severity"]=> string(5) "ERROR" ["category"]=> string(4) "DATA" ["causes"]=> NULL ["errorIdentifiers"]=> NULL } } } 
		        			//Invalid Api Key
		        			$error = 1;
		        		}
		        		elseif(isset($responseArray['ServiceResponse']['status']) && $responseArray['ServiceResponse']['status']=='NOT_FOUND'){
		            		//response :: array(1) { ["ServiceResponse"]=> array(3) { ["status"]=> string(9) "NOT_FOUND" ["errors"]=> NULL ["header"]=> array(1) { ["headerAttributes"]=> NULL } } } 
		            		//Product Not Found Error
		            		$error = 1;
		            	}
		        		elseif(isset($responseArray['ServiceResponse']['errors']) && !empty($responseArray['ServiceResponse']['errors'])){
		            		$error = 1;
		            	}
		            	else
		            	{
		            		$merchant_id = MERCHANT_ID;
		            		$status = $responseArray ['ServiceResponse']['status'];
		            		$pricingList = $responseArray['ServiceResponse']['payload']['_value']['pricingList']['_value']['pricing'];
		            		if(isset($pricingList['_attribute']))
		            		{
		            			$row = 0;
			            		$attributes = [];
			            		$attributes = $pricingList ['_attribute'];

			            		$product_id = $promo['product_id'];
			            		$option_id = $promo['option_id'];
			            		$sku = addslashes($promo['sku']);
			            		$effectiveDate = trim($attributes['effectiveDate']);
			            		$expirationDate = trim($attributes['expirationDate']);

			            		$currentPriceType = trim($pricingList['_value']['currentPriceType']);
		            			$original_price = trim($pricingList['_value']['comparisonPrice']['value']['_attribute']['amount']);
		            			$special_price = trim($pricingList['_value']['currentPrice']['value']['_attribute']['amount']);
		            			$walmart_status = $status;
		            			$walmart_promo_id = trim($attributes['promoId']);

			            		$exist = self::isExist($sku, $product_id, $option_id, $effectiveDate, $expirationDate);

			            		if(!$exist || (floatval($original_price)==floatval($exist['original_price']) && floatval($special_price)==floatval($exist['special_price'])))
			            		{
			            			$query = "INSERT INTO `walmart_promotional_price`(`merchant_id`, `product_id`, `option_id`, `sku`, `effective_date`, `expiration_date`, `current_price_type`, `original_price`, `special_price`, `walmart_status`, `walmart_promo_id`) VALUES ('{$merchant_id}', '{$product_id}', '{$option_id}', '{$sku}', '{$effectiveDate}', '{$expirationDate}','{$currentPriceType}','{$original_price}','{$special_price}','{$walmart_status}','{$walmart_promo_id}')";
			            		}
			            		else
			            		{
				            		/*$query = "UPDATE `walmart_promotional_price` SET `walmart_promo_id`= '".trim($attributes['promoId'])."', `walmart_status` = '".trim($status)."' WHERE `sku`='".$promo ['sku']."' AND `product_id`='".$promo ['product_id']."' AND `option_id`='".$promo ['option_id']."' AND `effective_date`='".trim($attributes['effectiveDate'])."' AND `expiration_date`= '".trim($attributes['expirationDate'])."'";*/
				            		$uploaded_ids[] = $exist['id'];
				            		$query = "UPDATE `walmart_promotional_price` SET `walmart_promo_id`= '".trim($attributes['promoId'])."', `walmart_status` = '".trim($status)."' WHERE `id`='{$exist['id']}'";
			            		}
			            		$row = $connection->createCommand($query)->execute();
			            		$count ++;

			            		//Delete Promo Rules
			            		self::deletePromoRules($promo ['sku'],MERCHANT_ID);

			            		//change Promo Rule status
			            		self::changePromoRuleStatus($promo ['sku'],MERCHANT_ID);
		            		}
		            		else
		            		{
		            			foreach($pricingList as $pricing){
			            			$row = 0;
			            			$attributes = [];
			            			$attributes = $pricing ['_attribute'];

			            			$product_id = $promo['product_id'];
				            		$option_id = $promo['option_id'];
				            		$sku = addslashes($promo['sku']);
				            		$effectiveDate = trim($attributes['effectiveDate']);
				            		$expirationDate = trim($attributes['expirationDate']);

				            		$currentPriceType = trim($pricing['_value']['currentPriceType']);
			            			$original_price = trim($pricing['_value']['comparisonPrice']['value']['_attribute']['amount']);
			            			$special_price = trim($pricing['_value']['currentPrice']['value']['_attribute']['amount']);
			            			$walmart_status = $status;
			            			$walmart_promo_id = trim($attributes['promoId']);

			            			$exist = self::isExist($sku, $product_id, $option_id, $effectiveDate, $expirationDate);
			            			
			            			if(!$exist || (floatval($original_price)==floatval($exist['original_price']) && floatval($special_price)==floatval($exist['special_price'])))
				            		{
				            			$query = "INSERT INTO `walmart_promotional_price`(`merchant_id`, `product_id`, `option_id`, `sku`, `effective_date`, `expiration_date`, `current_price_type`, `original_price`, `special_price`, `walmart_status`, `walmart_promo_id`) VALUES ('{$merchant_id}', '{$product_id}', '{$option_id}', '{$sku}', '{$effectiveDate}', '{$expirationDate}','{$currentPriceType}','{$original_price}','{$special_price}','{$walmart_status}','{$walmart_promo_id}')";
				            		}
				            		else
				            		{
				            			/*$query = "UPDATE `walmart_promotional_price` SET `walmart_promo_id`= '".trim($attributes['promoId'])."', `walmart_status` = '".trim($status)."' WHERE `sku`='".$promo ['sku']."' AND `product_id`='".$promo ['product_id']."' AND `option_id`='".$promo ['option_id']."' AND `effective_date`='".trim($attributes['effectiveDate'])."' AND `expiration_date`= '".trim($attributes['expirationDate'])."'";*/
				            			$uploaded_ids[] = $exist['id'];
				            			$query = "UPDATE `walmart_promotional_price` SET `walmart_promo_id`= '".trim($attributes['promoId'])."', `walmart_status` = '".trim($status)."' WHERE `id`='{$exist['id']}'";
				            		}
			            			$row = $connection->createCommand($query)->execute();
			            			$count ++;
							    }

							    //Delete Promo Rules
							    self::deletePromoRules($promo ['sku'],MERCHANT_ID);

							    //change Promo Rule status
			            		self::changePromoRuleStatus($promo ['sku'],MERCHANT_ID);
		            		}
		            		
		            	}
		        }
		        if($count > 0) {
		        	$result [$promo['product_id']] [$promo['sku']] ['success'] = $count;
		        }
		        if($error){
		        	$result [$promo['product_id']] [$promo['sku']] ['error'] = $error;
		        }
		        
	        }
	        
	        if(count($uploaded_ids)) {
	        	$query = "UPDATE `walmart_promotional_price` SET `walmart_promo_id`= '', `walmart_status` = '".self::PROMOTIONAL_PRICE_STATUS_PENDING."', `to_delete`=0 WHERE `merchant_id`=".MERCHANT_ID." AND `id` NOT IN (".implode(',', $uploaded_ids).")";
	        	Data::sqlRecords($query, null, 'update');
	        }

	        return $result;
		}catch(Exception $e) {
			return $result['exception'] = $e->getMessage();
		}
	}
	public static function deletePromoRules($productSku, $merchant_id)
	{
		$query = "DELETE FROM `walmart_promotional_price` WHERE `sku`='{$productSku}' AND `merchant_id`='{$merchant_id}' AND `to_delete`=1 AND `walmart_status`='{self::PROMOTIONAL_PRICE_STATUS_PROCESSING}'";

		Data::sqlRecords($query, null, 'delete');
	}

	public static function changePromoRuleStatus($productSku, $merchant_id)
	{
		$query = "UPDATE `walmart_promotional_price` SET `walmart_status`='{self::PROMOTIONAL_PRICE_STATUS_PENDING}' WHERE `sku`='{$productSku}' AND `merchant_id`='{$merchant_id}' AND `walmart_status`='{self::PROMOTIONAL_PRICE_STATUS_PROCESSING}'";

		Data::sqlRecords($query, null, 'update');
	}

	public static function promotionRulesExist($productSku, $merchant_id)
	{
		$query = "SELECT COUNT(*) as `promo` FROM `walmart_promotional_price` WHERE `sku` LIKE '{$productSku}' AND `merchant_id`='{$merchant_id}'";

		$result = Data::sqlRecords($query, 'one', 'select');
		if($result['promo'])
			return true;
		else
			return false;
	}

}
?>