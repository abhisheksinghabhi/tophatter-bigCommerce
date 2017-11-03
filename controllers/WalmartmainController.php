<?php 
namespace frontend\modules\walmart\controllers;

use frontend\modules\walmart\components\Walmartappdetails;
use Yii;
use yii\web\Controller;
use frontend\modules\walmart\components\Walmartapi;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\Installation;
use frontend\modules\walmart\components\BigcommerceClientHelper;


class WalmartmainController extends Controller
{
    protected $bigcom;
    protected $walmartHelper;
    public function beforeAction($action)
    {
        $session = Yii::$app->session;
        $this->layout = 'main';
        if(!Yii::$app->user->isGuest)
        {
            if(!defined('MERCHANT_ID') || Yii::$app->user->identity->id!=MERCHANT_ID)
            {
                $merchant_id = Yii::$app->user->identity->id;
                $shopDetails = Data::getWalmartShopDetails($merchant_id);
               // print_r($shopDetails);die("fghfg");
                $token = isset($shopDetails['token'])?$shopDetails['token']:'';
                $email = isset($shopDetails['email'])?$shopDetails['email']:'';
                $currency= isset($shopDetails['currency'])?$shopDetails['currency']:'USD';
                $shop = Yii::$app->user->identity->username;
                $store_hash=isset($shopDetails['store_hash'])?$shopDetails['store_hash']:Yii::$app->user->identity->store_hash;

                define("MERCHANT_ID", $merchant_id);
                define("SHOP", $shop);
                define("TOKEN", $token);
                define("CURRENCY", $currency);
                define("STOREHASH",$store_hash);
                $walmartConfig=[];
                $walmartConfig = Data::sqlRecords("SELECT `consumer_id`,`secret_key`,`consumer_channel_type_id` FROM `walmart_configuration` WHERE merchant_id='".MERCHANT_ID."'", 'one');
                if($walmartConfig)
                {
                    define("CONSUMER_CHANNEL_TYPE_ID",'7b2c8dab-c79c-4cee-97fb-0ac399e17ade');
                    define("API_USER",$walmartConfig['consumer_id']);
                    define("API_PASSWORD",$walmartConfig['secret_key']);
                    define("EMAIL",$email);
                    $this->walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
                }
            } 
            $this->bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,TOKEN,STOREHASH);


            $auth = Walmartappdetails::authoriseAppDetails($merchant_id, $shop);

            if(isset($auth['status']) && !$auth['status'])
            {
                if(!Walmartappdetails::appstatus($shop))
                    $this->redirect('https://www.bigcommerce.com/apps/walmart-marketplace-integration/');
                elseif(isset($auth['purchase_status']) && 
                    ($auth['purchase_status']=='license_expired' || $auth['purchase_status']=='trial_expired')) {
                    $url = yii::$app->request->baseUrl.'/walmart-marketplace/paymentplan';
                    return $this->redirect($url);
                }
                else {
                    Yii::$app->session->setFlash('error', $auth['message']);
                    $this->redirect(Data::getUrl('site/logout'));
                    return false;
                }
            }
            //Code By Himanshu Start
            if(Yii::$app->controller->id != 'walmart-install' && Yii::$app->controller->id != 'walmarttaxcodes')
            {
                Installation::completeInstallationForOldMerchants(MERCHANT_ID);
                
                $installation = Installation::isInstallationComplete(MERCHANT_ID);
                if($installation) {
                    if($installation['status'] == Installation::INSTALLATION_STATUS_PENDING) {
                        $step = $installation['step'];
                        //$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/jet-install/index?step='.$step,302);
                        $this->redirect(Data::getUrl('walmart-install/index'),302);
                        return false;
                    }
                } else {
                    $step = Installation::getFirstStep();
                    //$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/jet-install/index?step='.$step,302);
                    $this->redirect(Data::getUrl('walmart-install/index'),302);
                    return false;
                }

                if(!Walmartappdetails::isAppConfigured($merchant_id) &&
                Yii::$app->controller->id != 'walmartconfiguration')
                {
                    $msg='Please activate walmart api(s) to start integration with Walmart';
                    Yii::$app->session->setFlash('error', $msg);
                    $this->redirect(Data::getUrl('site/index'));
                    return false;
                }
            }
            //Code By Himanshu End

            return true;
        }
        else
        {
            if($_SERVER['SERVER_NAME'] =='bigcommerce.cedcommerce.com'){
                $unsuscribe = $_SERVER['QUERY_STRING'];
                Yii::$app->session->set('redirect_url', $unsuscribe);
                $this->redirect(Data::getUrl('site/index')); 
                return false;
            }
            $this->redirect(Data::getUrl('site/index')); 
            return false;
        }
    }
}
?>
