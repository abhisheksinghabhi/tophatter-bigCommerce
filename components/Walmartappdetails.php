<?php 
namespace frontend\modules\walmart\components;

use Yii;
use yii\base\Component;
use common\models\User;
use frontend\modules\walmart\models\AppStatus;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\models\WalmartExtensionDetail as Detail;

class Walmartappdetails extends Component
{	
	public static function isValidateapp($merchant_id)
	{
        try
        {
	        $expdate="";
	        $query="";
	        $model="";
	        $queryObj="";
	        $query = "Select merchant_id,expire_date,status FROM `walmart_extension_detail` WHERE merchant_id='".$merchant_id."'";
	    	$model = Data::sqlRecords($query, 'one');
			if($model)
	        {
	        	$expdate=strtotime($model['expire_date']);
	        	if(time()>$expdate)
	        	{
	        		if($model['status']==Detail::STATUS_PURCHASED)
	        		{
			        	$sql="UPDATE `walmart_extension_detail` SET status='".Detail::STATUS_LICENSE_EXPIRED."' where merchant_id='".$merchant_id."'";
			        	$result = Data::sqlRecords($sql, null, 'update');
	        		}
	        		elseif($model['status']==Detail::STATUS_NOT_PURCHASED)
	        		{
	        			$sql="UPDATE `walmart_extension_detail` SET status='".Detail::STATUS_TRIAL_EXPIRED."' where merchant_id='".$merchant_id."'";
	        			$result = Data::sqlRecords($sql, null, 'update');
	        			return "not purchase";
	        		}
	        		return "expire";
	        	}
	        }
        }
        catch(Exception $e)
   		{
        	return "";
        }   	 
	}

	public static function appstatus($shop,$connection=null){
		$query="";
		$model="";
		$queryObj="";
		$query = "SELECT `status` FROM `walmart_shop_details` WHERE `shop_url`='".$shop."'";

		if($connection){
			$queryObj = $connection->createCommand($query);
			$model = $queryObj->queryOne();
		} else {
			$model = Data::sqlRecords($query, 'one');
		}
		if(!$model || ($model && $model['status']==0)){
				return false;
		}
		return true;
	}

	public function autologin()
	{
		$merchant_id= \Yii::$app->user->identity->id;
		$url="";
		$shop="";
		$model="";
		$model1="";
		if(isset($_SERVER['HTTP_REFERER']))
		{
			$url=parse_url($_SERVER['HTTP_REFERER']);
			if(isset($url['host']) && $url['host']!="shopify.cedcommerce.com")
			{
				$shop=$url['host'];
				$model=User::find()->where(['username'=>$shop])->one();
				if($model)
				{
					return $shop;
				}
			}
		}
		//}
	}

	/*public static function appstatus1($id){
		$model="";
		$usermodel="";
		$usermodel=User::findOne($id);
		$model=AppStatus::find()->where(["shop"=>$usermodel->username])->one();
		if($model){
			if($model->status==0)
				return false;
		}
		return true;
	}*/

	public static function getConfig($connection=null) 
	{
		$cron_array = array();
		$query="SELECT shop.merchant_id, consumer_id, secret_key, consumer_channel_type_id, shop_url, token, email FROM `walmart_configuration` config INNER JOIN `walmart_shop_details` shop ON (shop.merchant_id = config.merchant_id)";
		$model = Data::sqlRecords($query, 'all');
		foreach($model as $Config)
		{
			$shop = $Config['shop_url'];
			$returnStatus = self::appstatus($shop);
			$isValidate = self::isValidateapp($Config['merchant_id']);

			$Storehashquery="SELECT * FROM `user` where `id`='".$Config['merchant_id']."'";
			$Storehash = Data::sqlRecords($Storehashquery, 'one');
            $Config['store_hash']=$Storehash['store_hash'];


			if(!$returnStatus || $isValidate=="expire" || $isValidate=="not purchase")
				continue;
			$cron_array[$Config['merchant_id']]= $Config;
		}
		return $cron_array;
	}

	public static function isAppConfigured($merchant_id)
	{
		if(!is_numeric($merchant_id) || is_null($merchant_id))
			return false;

		$query="SELECT `consumer_id` FROM `walmart_configuration` WHERE `merchant_id`=$merchant_id";
		$model = Data::sqlRecords($query, 'one');
		if($model)
			return true;
		else
			return false;
	}

	public static function validateApiCredentials($consumer_id, $secret_key )
	{
		$session = Yii::$app->session;

		if($consumer_id == '' || $secret_key == '')
			return false;

		if(!isset($session['walmart_configured'])) {

			$walmartAPi = new Walmartapi($consumer_id, $secret_key);
			$itemsResult = $walmartAPi->getItems();
	        if(isset($itemsResult['ns2:errors'])) {
	        	/*if(isset($itemsResult['ns2:errors']['ns2:error']['ns2:code']) && 
	            	$itemsResult['ns2:errors']['ns2:error']['ns2:code']=='UNAUTHORIZED.GMP_GATEWAY_API')
	                {*/
	                	return false;
					//}
			}
			$session->set('walmart_configured', true);
			return true;
		} else {
			return true;
		}
	}

	public static function authoriseAppDetails($merchant_id, $shop)
	{
		$session = Yii::$app->session;

		$return = array('status' => true, 'message' => '');

		if(!isset($session['walmart_installed'])) {
			if(self::appstatus($shop))
				$session->set('walmart_installed', true);
			else {
				$msg = 'Please install app to continue walmart integration for your shop store';
				$return['status'] = false;
				$return['message'] = $msg;
			}
		}
		
		if(!isset($session['walmart_validateapp'])) {
			$isValidate = self::isValidateapp($merchant_id);

			if($isValidate == 'expire') {
				$msg = 'We would like to inform you that your app subscription has been expired. ';
				$msg .= 'Please renew the subscription to use the app services.';
				$return['status'] = false;
				$return['message'] = $msg;
				$return['purchase_status'] = 'license_expired';
			}
			elseif($isValidate == 'not purchase') {
				$msg = 'We would like to inform you that your app trial period has been expired. ';
				$msg .= 'Please choose Payment plan to continue using app services';
				$return['status'] = false;
				$return['message'] = $msg;
				$return['purchase_status'] = 'trial_expired';
			}
			else
				$session->set('walmart_validateapp', true);
		}
		
		return $return;
	}
}
?>