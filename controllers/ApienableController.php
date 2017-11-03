<?php 
namespace frontend\modules\walmart\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\walmart\models\WalmartConfiguration;
use frontend\modules\walmart\models\AppStatus;
use frontend\modules\walmart\models\WalmartExtensionDetail;
use frontend\modules\walmart\components\Walmartapi;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\Walmartappdetails;

class ApienableController extends Controller
{
	public function actionGetuser() {
		$result = AppStatus::find()->where(['status'=>1])->all();
		foreach ($result as $value) {
			echo $value['shop'];
			echo "<br>";
		}
	}
	
	/*// Help Section start
	public function actionNeedhelp(){
		$full_Name=Yii::$app->getRequest()->getQueryParam('name');
		$mail_from=Yii::$app->getRequest()->getQueryParam('from');
		$mail_storename=Yii::$app->getRequest()->getQueryParam('storename');
		$mail_subject=Yii::$app->getRequest()->getQueryParam('subject');
		$mail_query=Yii::$app->getRequest()->getQueryParam('query');
	
	
		$modelQuery=new JetMerchantsHelp();
		$modelQuery->merchant_name = $full_Name;
		$modelQuery->merchant_email_id = $mail_from;
		$modelQuery->merchant_store_name = $mail_storename;
		$modelQuery->subject = $mail_subject;
		$modelQuery->query = $mail_query;
		$modelQuery->save(false);
	}*/

	// Help Section end
	public function actionSaveliveapi()
	{
		if (Yii::$app->user->isGuest) {
			return "Please login to enable Walmart api(s)";
		}
		else
		{
			$merchant_id = \Yii::$app->user->identity->id;
			$consumer_id = Yii::$app->getRequest()->getQueryParam('consumerId');
			$secret_key = Yii::$app->getRequest()->getQueryParam('secretKey');
			$channel_type_id = Yii::$app->getRequest()->getQueryParam('channelTypeId');
			$skype_id = Yii::$app->getRequest()->getQueryParam('skypeId');
			if($consumer_id=="" || $secret_key=="") {
				return "Please enter valid api credentials";
			}
			
			if(!Walmartappdetails::validateApiCredentials($consumer_id, $secret_key, $channel_type_id))
			{
					return "Api credentials are invalid. Please enter valid api credentials.";
			}

			//Check if Details are already used by some other merchant
			$data = Data::sqlRecords("SELECT `merchant_id` FROM `walmart_configuration` WHERE `consumer_id`='".$consumer_id."'", 'one');
			if($data && isset($data['merchant_id']) && $data['merchant_id'] != $merchant_id) {
				return "Api credentials are already in use.";
	        }

			$result = WalmartConfiguration::find()->where(['merchant_id'=>$merchant_id])->one();
			if(is_null($result)) {
				$model = new WalmartConfiguration();
				$model->merchant_id = $merchant_id;
				$model->consumer_id = $consumer_id;
				$model->secret_key = $secret_key;
				$model->consumer_channel_type_id = $channel_type_id;
				$model->skype_id = $skype_id;
				$model->save(false);
			}else{
				$model->consumer_id = $consumer_id;
				$model->secret_key = $secret_key;
				$model->consumer_channel_type_id = $channel_type_id;
				$model->skype_id = $skype_id;
				$result->save(false);
			}
			return "enabled";
		}	
	}
}
?>
