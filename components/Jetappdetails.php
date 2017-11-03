<?php 
namespace frontend\modules\walmart\components;

use Yii;
use yii\base\Component;
use common\models\User;
use frontend\modules\walmart\models\AppStatus;
use frontend\modules\walmart\components\Jetproductinfo;

class Jetappdetails extends component{
	
	public static function isValidateapp($merchant_id,$connection)
	{
        try
        {
	        $expdate="";
	        $query="";
	        $model="";
	        $queryObj="";
	        $query = "Select merchant_id,expire_date,status FROM `jet_extension_detail` WHERE merchant_id='".$merchant_id."'";
	        $queryObj = $connection->createCommand($query);
	        $model = $queryObj->queryOne();
	       	// $model=JetExtensionDetail::find()->where(['merchant_id'=>$merchant_id])->one();
	       	//var_dump($model);die;
			if($model)
	        {
	        	$expdate=strtotime($model['expire_date']);
	        	if(time()>$expdate)
	        	{
	        		if($model['status']=="Trial Expired")
	        		{
	        			return "not purchase";
	        		}
	        		elseif($model['status']=="License Expired")
	        		{
	        			return "expire";
	        		}
			        elseif($model['status']=="Not Purchase")
			        {
			        	$sql="";
			        	$result="";
			        	$sql="UPDATE `jet_extension_detail` SET status='Trial Expired' where merchant_id='".$merchant_id."'";
			        	$result = $connection->createCommand($sql)->execute();
	        			//$model->status="Trial Expired";
	        			//$model->save(false);
	        			return "not purchase";
			        }
			      	elseif($model['status']=="Purchased")
			      	{
			      		$sql="";
			      		$result="";
			      		$sql="UPDATE `jet_extension_detail` SET status='License Expired' where merchant_id='".$merchant_id."'";
			      		$result = $connection->createCommand($sql)->execute();
	      				//$model->status="License Expired";
	      				//$model->save(false);
	      				return "expire";
			      	}
	        	}
	        }
        }
        catch(Exception $e)
   		{
        	//exit(0);
        	return "";
        }   	 
	}

	public static function appstatus($shop,$connection){
		$query="";
		$model="";
		$queryObj="";
		$query = "Select status from app_status where shop='".$shop."'";
		$queryObj = $connection->createCommand($query);
		$model = $queryObj->queryOne();
		if($model){
			if($model['status']==0)
				return false;
		}
		return true;
	}

	public static function getConnection()
	{
		$username = 'cedcom5_Mx42Qt';
		$password = 'VW-88yVH0]ws';
		try
		{
			$connection = new \yii\db\Connection([
		
					'dsn' => 'mysql:host=127.0.0.1;dbname=cedcom5_Mx42Qt',
					'username' => $username,
					'password' => $password,
					//'charset' => 'utf8',
					]);
			//$connection->open();
			return $connection;
		}
		catch(\yii\db\Exception $e){
			return "connection failed";
		}
	
	}
	public function autologin()
	{
		//if (\Yii::$app->user->isGuest){
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
	public static function appstatus1($id){
		$model="";
		$usermodel="";
		$usermodel=User::findOne($id);
		$model=AppStatus::find()->where(["shop"=>$usermodel->username])->one();
		if($model){
			if($model->status==0)
				return false;
		}
		return true;
	}
	public static function customPrice($pricevalue,$jetHelper,$connection,$merchant_id)
	{
		$model="";
		if(!isset($merchant_id)){
			$merchant_id= Yii::$app->user->identity->id;
		}
		if(!isset($connection)){
			$connection=Yii::$app->getDb();
		}
		//$model=JetProduct::find()->where(['merchant_id'=>$merchant_id])->all();
		$model=array();
		$model=$connection->createCommand('select id,price,type,sku from `jet_product` where merchant_id="'.$merchant_id.'"')->queryAll();
		$message="";
		if(is_array($model) && count($model)>0)
		{
			foreach($model as $value)
			{
				$price=0;
				if($value['type']=="variants")
				{
					$price=(float)($value['price']+($pricevalue/100)*($value['price']));
					$connection->createCommand('update `jet_product` set price="'.$price.'" where id="'.$value['id'].'"')->execute();
					$vmodel=array();
					$vmodel=$connection->createCommand('select option_id,option_price,option_sku from `jet_product_variants` where product_id="'.$value['id'].'"')->queryAll();
					if(is_array($vmodel) && count($vmodel))
					{
						foreach($vmodel as $val)
						{
							$vprice=0;
							$vprice=(float)($val['option_price']+($pricevalue/100)*($val['option_price']));
							$connection->createCommand('update `jet_product_variants` set option_price="'.$vprice.'" where option_id="'.$val['option_id'].'"')->execute();
							$message.= Jetproductinfo::updatePriceOnJet($val['option_sku'],$vprice,$jetHelper,$fullfillmentnodeid,$merchant_id);
						}
					}
				}
				else
				{
					$price=(float)($value['price']+($pricevalue/100)*($value['price']));
					$connection->createCommand('update `jet_product` set price="'.$price.'" where id="'.$value['id'].'"')->execute();
					$message.= Jetproductinfo::updatePriceOnJet($value['sku'],$price,$jetHelper,$fullfillmentnodeid,$merchant_id);
				}
			}
		}	
	}
	
	public static function checkMapping($id,$connection)
	{
		if(!isset($connection)){
			$connection=Yii::$app->getDb();
		}
		$result=array();
		$checkPro=array();
		$checkPro=$connection->createCommand("SELECT `id` from `jet_product` where merchant_id='".$id."'")->queryOne();
		if(is_array($checkPro) && count($checkPro)>0){
			$result=$connection->createCommand("SELECT `id` from `jet_category_map` where merchant_id='".$id."' and `category_id`!=0")->queryOne();
		}
		if(!$checkPro){
			unset($checkPro);
			unset($result);
			return "product";
		}elseif(!$result){
			unset($checkPro);
			unset($result);
			return "category";
		}
	}
	/*public static function checkProduct($id,$connection)
	{
		if(!isset($connection)){
			$connection=Yii::$app->getDb();
		}
		$checkPro=array();
		$checkPro=$connection->createCommand("SELECT `id` from `jet_product` where merchant_id='".$id."'")->queryOne();
		if(is_array($checkPro) && count($checkPro)>0){
			unset($checkPro);
			return true;
		}
		unset($checkPro);
		return false;
	}*/
	public static function convertWeight($weight="",$unit=""){
		$newWeight=0;
		if($unit=='kg'){
			$newWeight = (float)($weight*2.2046226218);
			return $newWeight;
		}
		if($unit=='g'){
			$newWeight = (float)($weight*0.0022046226218);
			return $newWeight;
		}
		if($unit=='oz'){
			$newWeight = (float)($weight/16);
			return $newWeight;
		}
		if($unit=='lb'){
			return $weight;
		}
		else{
			return "";
		}
	}
	public static function getConfig($connection){
		$model="";
		$queryObj="";
		$query="SELECT merchant_id, fullfilment_node_id, api_host, api_user, api_password, username, auth_key FROM `jet_configuration` config INNER JOIN `user` user_m ON (user_m.id = config.merchant_id)";
		$queryObj = $connection->createCommand($query);
		$model = $queryObj->queryAll();
		foreach($model as $jetConfig)
		{
			//check if app install or not
			/* if($jetConfig['merchant_id']!=14){
				continue;
			} */
			$shop="";
			$userModel="";
			$modelApp="";
			$returnStatus=false;
			$isValidate="";
			$shop = $jetConfig['username'];
			$modelApp = new Jetappdetails();
			$returnStatus = $modelApp->appstatus($shop,$connection);
			$isValidate=$modelApp->isValidateapp($jetConfig['merchant_id'],$connection);
			if($returnStatus==false || $isValidate=="expire" || $isValidate=="not purchase")
			{
				continue;
			}
			$cron_array[$jetConfig['merchant_id']]['fullfilment_node_id']=$jetConfig['fullfilment_node_id'];
			$cron_array[$jetConfig['merchant_id']]['api_host']=$jetConfig['api_host'];
			$cron_array[$jetConfig['merchant_id']]['api_user']=$jetConfig['api_user'];
			$cron_array[$jetConfig['merchant_id']]['api_password']=$jetConfig['api_password'];
			$cron_array[$jetConfig['merchant_id']]['merchant_email']=$jetConfig['merchant_email'];
		}
		unset($model);
		unset($modelApp);
		return $cron_array;
	}
}
?>