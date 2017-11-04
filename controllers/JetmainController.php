<?php 
namespace frontend\modules\tophatter\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\tophatter\components\Jetappdetails;

class JetmainController extends Controller
{
    protected $connection;
    
	public function beforeAction($action)
	{
		/* $merchant_id = Yii::$app->user->identity->id;
		$shop=Yii::$app->user->identity->username;
		$connection = Yii::$app->getDb();
		$session ="";
		$session = Yii::$app->session; */
	    if(!Yii::$app->user->isGuest)
	    {
	        $connection = Yii::$app->getDb();
    		/*if(!isset($session['installed']))
    		{
    			if(isset($session['appstatus']) && $session['appstatus']==false)
    			{
    				$msg='Please install app to continue jet integration for your shop store';
    				Yii::$app->session->setFlash('error',$msg);
    				$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/site/logout',302);
    				return false;
			}*/
    		if(!defined('MERCHANT_ID') || Yii::$app->user->identity->id!=MERCHANT_ID)
    		{
    		    define("MERCHANT_ID",Yii::$app->user->identity->id);
    		    define("SHOP","https://".Yii::$app->user->identity->username);
    		    define("TOKEN",Yii::$app->user->identity->auth_key);
    		    $jetConfig=[];
    		    $queryObj="";
    		    $queryObj = $connection->createCommand("SELECT `consumer_channel_type_id`,`api_user`,`api_password`,`merchant_email` FROM `tophatter_configuration` WHERE merchant_id='".MERCHANT_ID."'");
    		    $jetConfig = $queryObj->queryOne();
    		    if($jetConfig)
    		    {
    		        define("CONSUMER_CHANNEL_TYPE_ID",$jetConfig['consumer_channel_type_id']);
    		        define("API_USER",$jetConfig['api_user']);
    		        define("API_PASSWORD",$jetConfig['api_password']);
    		        define("EMAIL",$jetConfig['merchant_email']);
    		    }
    		}
	    }	
			/* if(Jetappdetails::appstatus($shop,$connection)==false)
			{
				//$session->set('appstatus',true);
				$msg='Please install app to continue jet integration for your shop store';
				Yii::$app->session->setFlash('error',$msg);
				$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/site/logout',302);
				return false;
			} */
			/*else
			{
				$session->set('installed',true);
			}
		}*/
/*		if(!isset($session['configured']))
    	{
			if((isset($session['validateapp']) && $session['validateapp']=="expire"))
			{
				Yii::$app->session->setFlash('error', "We would like to inform you that your app subscription has been expired. Please renew the subscription to use the app services. You can renew services by using following <a href=http://cedcommerce.com/shopify-extensions/jet-shopify-integration target=_blank>link</a>");
				$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/site/index',302);
				return false;
			}
			elseif((isset($session['validateapp']) && $session['validateapp']=="not purchase"))
			{
				$msg='We would like to inform you that your app trial period has been expired,If you purchase app then create license from your customer account page from cedcommerce Or <br>Purchase jet-shopify app from <a href=http://cedcommerce.com/shopify-extensions/jet-shopify-integration target=_blank>CedCommerce</a> and can review on <a href='.Yii::$app->request->baseUrl.'/pricing target=_blank>pricing page</a>';
				Yii::$app->session->setFlash('error',$msg);
				$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/site/index',302);
				return false;
			}
			else*/
			/* if(Jetappdetails::isValidateapp($merchant_id,$connection)=="expire")
			{
				//$session->set('validateapp',Jetappdetails::isValidateapp($merchant_id,$connection));
				Yii::$app->session->setFlash('error', "We would like to inform you that your app subscription has been expired. Please renew the subscription to use the app services. You can renew services by using following <a href=http://cedcommerce.com/shopify-extensions/jet-shopify-integration target=_blank>link</a>");
				$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/site/index',302);
				return false;
			}
			elseif(Jetappdetails::isValidateapp($merchant_id,$connection)=="not purchase")
			{
				//$session->set('validateapp',Jetappdetails::isValidateapp($merchant_id,$connection));
				$msg='We would like to inform you that your app trial period has been expired,If you purchase app then create license from your customer account page from cedcommerce Or <br>Purchase jet-shopify app from <a href=http://cedcommerce.com/shopify-extensions/jet-shopify-integration target=_blank>CedCommerce</a> and can review on <a href='.Yii::$app->request->baseUrl.'/pricing target=_blank>pricing page</a>';
				Yii::$app->session->setFlash('error',$msg);
				$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/site/index',302);
				return false;
			}
			elseif(Jetappdetails::checkConfiguration($merchant_id,$connection)==false)
			{
				$msg='Please activate jet api(s) to start integration with jet';
				Yii::$app->session->setFlash('error',$msg);
				$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/site/index',302);
				return false;
			} */
			/*else{
				$session->set('configured',true);
			}
    	}	*/
    	/*if(!isset($session['mapped']))
    	{
			if(isset($session['category_mapped'])){
				if(Yii::$app->controller->id!='categorymap')
				{
					$msg='Please map shopify product type with jet category';
					Yii::$app->session->setFlash('error',$msg);
					$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/categorymap/index',302);
					return false;
				}
			}
			else*/
			/* if(Jetappdetails::checkMapping($merchant_id,$connection)=="product")
			{
				//$session->set('category_mapped',false);
				if(Yii::$app->controller->id!='jetproduct')
				{
					$msg='Please import product then map product type';
					Yii::$app->session->setFlash('error',$msg);
					$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/jetproduct/index',302);
					return false;
				}
			}
			elseif(Jetappdetails::checkMapping($merchant_id,$connection)=="category")
			{
				//$session->set('category_mapped',false);
				if(Yii::$app->controller->id!='categorymap')
				{
					$msg='Please map shopify product type with jet category';
					Yii::$app->session->setFlash('error',$msg);
					$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/categorymap/index',302);
					return false;
				}
			} */
			/*else{
				$session->set('mapped',true);
			}
    	}*/
		return true;
	}
}
?>
