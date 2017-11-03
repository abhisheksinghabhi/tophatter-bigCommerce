<?php
namespace frontend\modules\walmart\controllers;
use Yii;
use frontend\modules\walmart\models\WalmartExtensionDetail;
use frontend\modules\walmart\models\WalmartShopDetails;
use common\models\LoginForm;
use common\models\User;
use frontend\modules\walmart\models\AppStatus;
use frontend\modules\walmart\components\Jetappdetails;
use frontend\modules\walmart\components\Sendmail;
use frontend\modules\walmart\components\Signature;
use frontend\modules\walmart\components\Walmartapi;
use frontend\modules\walmart\components\BigcommerceClientHelper;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\Walmartappdetails;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use frontend\modules\walmart\models\WalmartConfiguration;
use frontend\modules\walmart\components\Dashboard;
use frontend\modules\walmart\components\Installation;
/**
 * Site controller
 */
class SiteController extends Controller
{
    const MARKETPLACE = 'walmart';
    const STATUS = 'pending';
    const NO_OF_REQUEST = 1;
    const PENDING = 'pending';
    /**
     * @inheritdoc
     */
    protected $shop;
    protected $token;
    protected $connection;
    protected $merchant_id;
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                         'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /* 'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ], */
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $this->layout = 'main';
        if (isset(Yii::$app->controller->module->module->requestedRoute) && Yii::$app->controller->module->module->requestedRoute =='walmart/site/guide') 
        {
            Yii::$app->view->registerMetaTag([
              'name' => 'keywords',
              'content' => 'start to sell on Walmart, how to sell on WalMart, sell in Walmart marketplace, sell BigCommerce products on Walmart marketplace, sell with Walmart, Walmart BigCommerce API integration'
              
            ],"keywords");

            Yii::$app->view->registerMetaTag([
              'name' => 'description',
              'content' => 'Easily configure BigCommerce Walmart API Integration app and Sell products on Walmart marketplace with CedCommerce comprehensive user guide document. '
              
            ],"description");

            Yii::$app->view->registerMetaTag([
              'name' => 'og:title',
              'content' => 'How to sell on Walmart marketplace - Documentation'
              
            ],"og:title");
        }
        elseif (isset(Yii::$app->controller->module->module->requestedRoute) && Yii::$app->controller->module->module->requestedRoute =='walmart/site/pricing') 
        {
            Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Good, Better, Best Save more with Standard Business and Pro Plan of Cedcommerce BigCommerce Walmart Marketplace API Integration, Start selling on walmart.com'
                    
            ],"main_index"); //this will now replace the default one.
            Yii::$app->view->registerMetaTag([
              'name' => 'keywords',
              'content' => 'BigCommerce Walmart Integration pricing listing, BigCommerce Walmart Integration, Walmart BigCommerce Integration,Walmart BigCommerce API Integration, Sell on Walmart Marketplace, sell your BigCommerce products on Walmart marketplace'
              
            ],"keywords");
        }
        else
        {    
            Yii::$app->view->registerMetaTag([
              'name' => 'title',
              'content' => 'Walmart BigCommerce API integration Pricing - CedCommerce'
              
            ],"title");

            Yii::$app->view->registerMetaTag([
              'name' => 'keywords',
              'content' => 'Walmart BigCommerce API Integration, sell BigCommerce products on Walmart marketplace, Walmart Marketplace API Integration, Sell on Walmart Marketplace'
              
            ],"keywords");

            Yii::$app->view->registerMetaTag([
              'name' => 'description',
              'content' => 'BigCommerce Walmart integration app, Connects your store with Walmart to upload products, manage inventory, order fulfillment, return and refund management .'
              
            ],"description");

            Yii::$app->view->registerMetaTag([
              'name' => 'og:title',
              'content' => 'Sell BigCommerce Products on Walmart Marketplace - CedCommerce'
              
            ],"og:title");
            Yii::$app->view->registerMetaTag([
              'name' => 'og:type',
              'content' => 'article'
              
            ],"og:type");
            Yii::$app->view->registerMetaTag([
              'name' => 'og:image',
              'content' => 'https://shopify.cedcommerce.com/walmart/images/walmart_shopify_large.jpg'
              
            ],"og:image");
            Yii::$app->view->registerMetaTag([
              'name' => 'og:url',
              'content' => 'https://shopify.cedcommerce.com/integration/walmart/'
            ],"og:url");

            Yii::$app->view->registerMetaTag([
              'name' => 'og:description',
              'content' => 'BigCommerce - Walmart.com integration app, connect your store with walmart to import products, manage inventory, order fulfillment, return and refund management with third party application.'
            ],"og:description");

            Yii::$app->view->registerMetaTag([
              'name' => 'twitter:card',
              'content' => 'summary'
            ],"twitter:card");

            Yii::$app->view->registerMetaTag([
              'name' => 'twitter:title',
              'content' => 'BigCommerce - Walmart.com Integration | CedCommerce'
            ],"twitter:title");

            Yii::$app->view->registerMetaTag([
              'name' => 'twitter:description',
              'content' => 'BigCommerce - Walmart.com integration app, connect your store with walmart to import products, manage inventory, order fulfillment, return and refund management with third party application.'
            ],"twitter:description");

            Yii::$app->view->registerMetaTag([
              'name' => 'twitter:image',
              'content' => 'https://shopify.cedcommerce.com/walmart/images/walmart_shopify_large.jpg'
            ],"twitter:image");

            Yii::$app->view->registerMetaTag([
              'name' => 'twitter:url',
              'content' => 'https://bigcommerce.cedcommerce.com/integration/walmart/'
            ],"twitter:url");

        }
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionGuide()
    {
        return $this->render('guide');
    }
    public function actionSchedulecall()
    {
        $this->layout = "main2";

        $html = $this->render('schedulecall');
        return $html;
    }

    public function actionNeedhelp(){
        $this->layout="main2";
        $html=$this->render('needhelp');
        return $html;       
    }
    public function actionClientFeedback()
    {
        $getRequest = Yii::$app->request->post();
        $merchant_id = Yii::$app->user->identity->id;
        $client_record = Data::sqlRecords("SELECT * FROM `walmart_registration` WHERE `merchant_id`='".$merchant_id."'",'one');
        if(isset($client_record['email']) && !empty($client_record['email']) && isset($client_record['fname']) && !empty($client_record['fname'])  && isset($getRequest['description']) && !empty($getRequest['description']) && isset($getRequest['type']) && !empty($getRequest['type']) ){
            if(isset($client_record['lname']) && !empty($client_record['lname'])){
                 $name = $client_record['fname'].' '.$client_record['lname'];
            }
            else{
                $name = $client_record['fname'];
            }
            $data['name'] = $name;
            $data['feedback_type'] = $getRequest['type'];
            $data['description'] = $getRequest['description'];
            $data['email'] = $client_record['email'];
            $data['type'] = $getRequest['type'];
            $this->email($data);
            $validateData = ['success' =>true ,'message' =>'feedback send successfully'];
            return BaseJson::encode($validateData);
        }
        else{
            $validateData = ['error' =>true ,'message' =>'Something Went Wrong Please try after some time '];
            return BaseJson::encode($validateData);
        }

    }
    /**
     * @email to shopify@cedcommerce.com
     */
    public  function email($data)
    {
        $mer_email= 'feedback@cedcommerce.com';
        $subject='Feedback for  Walmart App: '.$data['type'];
        $etx_mer="";
        $headers_mer = "MIME-Version: 1.0" . chr(10);
        $headers_mer .= "Content-type:text/html;charset=iso-8859-1" . chr(10);
        $headers_mer .= 'From: '.$data['email'].'' . chr(10);
        $etx_mer .=$data['description'];
        mail($mer_email,$subject, $etx_mer, $headers_mer);
    }

    public function actionRequestcall()
    {

        if (isset($_POST['number']) && is_numeric($_POST['number']) && !empty($_POST['number']) && !empty($_POST['date']) && !empty($_POST['format'] && !empty($_POST['time']))) {
            $preffered_date = $_POST['date'];
            $number = $_POST['number'];
        } else {
            $response = ['error' => true, 'message' => 'Invalid / Wrong phone number'];
            return json_encode($response);
        }
        $merchant_id = Yii::$app->user->identity->id;
        $date = date("Y-m-d H:i:s", time());
        $shop_detail = Data::getWalmartShopDetails($merchant_id);
        $preffered_time = $_POST['time'] . $_POST['format'];

        $call_record = Data::sqlRecords("SELECT * FROM `call_schedule` WHERE `merchant_id`= '".$merchant_id."' AND `marketplace`='".self::MARKETPLACE."' AND `number`= '".$number."'",'one');
        if(!empty($call_record) && $call_record['number'] == $number){

            $call_record['no_of_request'] = $call_record['no_of_request'] + 1;
            $query = "UPDATE `call_schedule` SET `no_of_request`='".$call_record['no_of_request']."',`status` = '".self::PENDING."',`preferred_date`='".$preffered_date."',`preferred_timeslot`='".$preffered_time."'";
            Data::sqlRecords($query,null,'update');
        }else{
            $query = "INSERT INTO `call_schedule` (`merchant_id`,`number`, `shop_url`,`marketplace`,`status`,`time`,`no_of_request`,`preferred_date`,`time_zone`,`preferred_timeslot`) VALUES ('" . $merchant_id . "','" . $number . "','" . $shop_detail['shop_url'] . "','" . self::MARKETPLACE . "','" . self::STATUS . "','" . $date . "','".self::NO_OF_REQUEST."','".$preffered_date."','UTC','".$preffered_time."')";

            Data::sqlRecords($query,null,'insert');
        }

        $response = ['success' => true, 'message' => 'Successfully submit'];

        return json_encode($response);
    }

    
    /*
    * this login action for Login from Admin
    */
    public function actionManagerlogin(){
       $merchant_id = isset($_GET['ext']) ? $_GET['ext'] :false;
       if($merchant_id){
            $result="";
            $session ="";
            $session = Yii::$app->session;
            $session->remove('walmart_installed');
            $session->remove('walmart_appstatus');
            $session->remove('walmart_configured');
            $session->remove('walmart_validateapp');
            $session->remove('walmart_dashboard');
            $session->remove('walmart_extension');
            $session->close();
            $result=User::findOne($merchant_id);
            if($result){
                $model = new LoginForm();
                $model->login($result->username);
                return $this->redirect(['index']);
            }
       }
       return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionIndex()
    {
        $session = Yii::$app->session;
        $connection = Yii::$app->getDb();

        // Setting local timezone
        date_default_timezone_set('Asia/Kolkata');

        //save session id of user in user table
        if (!\Yii::$app->user->isGuest) 
        {
            
            if(!defined('MERCHANT_ID') || Yii::$app->user->identity->id != MERCHANT_ID)
            {
                $merchant_id = Yii::$app->user->identity->id;
                $shopDetails = Data::getWalmartShopDetails($merchant_id);
                $token = isset($shopDetails['token'])?$shopDetails['token']:'';
                $email = isset($shopDetails['email'])?$shopDetails['email']:'';
                $currency= isset($shopDetails['currency'])?$shopDetails['currency']:'USD';
                define("MERCHANT_ID", $merchant_id);
                define("SHOP", Yii::$app->user->identity->username);
                define("STOREHASH", Yii::$app->user->identity->store_hash);
                define("TOKEN", $token);
                define("CURRENCY", $currency);
                define("EMAIL", $email);
                
                $bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,TOKEN,STOREHASH);
                $response=Data::getBigcommerceShopDetails($bigcom);


                if (!isset($response['errors'])) {
                	$session->set('shop_details', $response);
                }

                $walmartConfig=[];
                $walmartConfig = Data::sqlRecords("SELECT `consumer_id`,`secret_key`,`consumer_channel_type_id` FROM `walmart_configuration` WHERE merchant_id='".MERCHANT_ID."'", 'one');
                if($walmartConfig) {
                    define("CONSUMER_CHANNEL_TYPE_ID", $walmartConfig['consumer_channel_type_id']);
                    define("API_USER", $walmartConfig['consumer_id']);
                    define("API_PASSWORD", $walmartConfig['secret_key']);
                }
            }

            $shopname=Yii::$app->user->identity->username;
            //$extensionDetails=Data::WalmartExtensionDetails($this->getConnection(),MERCHANT_ID,$shopname);


            $id = MERCHANT_ID;
            $username = SHOP;
            $token = TOKEN;
            $storehash = STOREHASH;

            $obj = new Walmartappdetails();
            if($obj->appstatus($username) == false)
            {
                $this->redirect('https://www.bigcommerce.com/apps/walmart-marketplace-integration/');
            }         


            //check Configuration Pop-up condition.
            $ispopup = "";
            $flagConfig = true;
            if(Walmartappdetails::isValidateapp($id)=="expire")
            {
                return $this->redirect(['paymentplan']);
            }
            //get shop name
            $queryString = '';
            $shop = Yii::$app->request->get('shop',false);
            if($shop)
                $queryString = '?shop='.$shop;
            //Code By Himanshu Start
            Installation::completeInstallationForOldMerchants(MERCHANT_ID);
            $installation = Installation::isInstallationComplete(MERCHANT_ID);
            if($installation) {
                if($installation['status'] == Installation::INSTALLATION_STATUS_PENDING) {
                    $step = $installation['step'];
                    //$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/jet-install/index?step='.$step,302);
                    $this->redirect(Data::getUrl('walmart-install/index'.$queryString));
                    return false;
                }
            } else {
                $step = Installation::getFirstStep();
                //$this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/jet-install/index?step='.$step,302);
                $this->redirect(Data::getUrl('walmart-install/index'.$queryString));
                return false;
            }
            //Code By Himanshu End
            $model = new LoginForm();
            return $this->render('index',['model' => $model]);            
        }
        else
        {

            $model = new LoginForm(); 
                return $this->render('index-new',[
                    'model' => $model,
                    ]);
        }   
    }

    public function actionLogin()
    {
   
        //$connection = Yii::$app->getDb();
        $model = new LoginForm(); 
        
        if($model->load(Yii::$app->request->post()))
        {

            $domain_name=trim($_POST['LoginForm']['username']);
            if(preg_match('/http/',$domain_name))
            {
                $domain_url = preg_replace("(^https?://)", "", $domain_name );//removes http from domain_name
                $domain_url=rtrim($domain_url, "/"); // Removes / from last
            }
            else
            {
                $domain_url=$domain_name;
            }
            
            $shop=isset($domain_url) ? $domain_url : $_GET['shop'];
    
            // get the URL to the current page
            $pageURL = 'http';
            if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")
            {
                $pageURL .= "s";
            }
            $pageURL .= "://";
             
            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            }
            if($shop){
                $urlshop=array();
                $urlshop=parse_url($pageURL);
                //print_R($urlshop);
                $pageURL=$urlshop['scheme']."://".$urlshop['host'].$urlshop['path'];
                $pageURL = rtrim($pageURL, "/");
                //echo $pageURL;die;
            }
            $bigcomClient = new BigcommerceClientHelper(WALMART_APP_KEY,"","");
            $url=parse_url($bigcomClient->getAuthorizeUrl($shop, $pageURL));
            if($url['host'])
            {
                header("Location: " . $bigcomClient->getAuthorizeUrl($shop, $pageURL));
                exit;
            }
            else
            {
                return $this->render('index-new', [
                        'model' => $model,
                        ]);
            }
        }
        elseif(!empty($_GET["code"]))
        {

            $bigcomClient = new BigcommerceClientHelper(WALMART_APP_KEY,"","");
            $tokenUrl = "https://login.bigcommerce.com/oauth2/token";
            $params = array(
                    "client_id" => WALMART_APP_KEY,
                    "client_secret" =>WALMART_APP_SECRET,
                    "redirect_uri" => Yii::getAlias('@weburl')."/site/login",
                    "grant_type" => "authorization_code",
                    "code" => $_GET["code"],
                    "scope" => $_REQUEST["scope"],
                    "context" => $_GET["context"],
            );
            $userdata = $bigcomClient->postToken($tokenUrl,$params);
            $token=$storehash=$email="";
            if(isset($userdata['context'])){
                $getstore = explode("/",$userdata['context']);
                $token = $userdata['access_token'];
                $storehash=$getstore[1];
                $email= $userdata['user']['email'];
            }
            if ($token != '')
            {
                //echo $storehash."--<br>";
                $bigcomClient = new BigcommerceClientHelper(WALMART_APP_KEY,$token,$storehash);
                $checkdetails = $bigcomClient->call1('GET','store');
                //var_dump($checkdetails);die("cvbvbcvb");
                $name = $checkdetails['name'];
                $domain_name=trim($checkdetails['domain']);
                $currency = $checkdetails['currency'];
                if(preg_match('/http/',$domain_name))
                {
                    $domain_url = preg_replace("(^https?://)", "", $domain_name );//removes http from domain_name
                    $domain_url=rtrim($domain_url, "/"); // Removes / from last
                }
                else{
                    $domain_url=$domain_name;
                }
                $shop = $domain_url;
                
                //create a webhooks
                Data::createNewWebhook($bigcomClient,$shop,$storehash);
            
                $userModel = new User();
                $result = $userModel->find()->where(['username' => $shop])->one();
                $merchant_id = '';
                $response = '';

                // entry in User table 
                if(!$result)
                {
                    //save data in `user` table
                    $userModel->username = $shop;
                    $userModel->auth_key = '';
                    $userModel->store_hash=$storehash;
                    $userModel->shop_name= addslashes($name);
                    $userModel->email = $email;
                    $userModel->save(false);
                    $merchant_id = $userModel->id;
                }
                else 
                {
                    $merchant_id = $result['id'];
                }
                $walmartShopDetailModel = new WalmartShopDetails();
                $walmartShopDetail = $walmartShopDetailModel->find()->where(['shop_url' => $shop])->one();
                if(!$walmartShopDetail)
                {
                    //save data in `walmart_shop_details` table
                    $walmartShopDetailModel->merchant_id = $merchant_id;
                    $walmartShopDetailModel->shop_url = $shop;
                    $walmartShopDetailModel->shop_name = addslashes($name);
                    $walmartShopDetailModel->email = $email;
                    $walmartShopDetailModel->token = $token;
                    $walmartShopDetailModel->currency = $currency;
                    $walmartShopDetailModel->status = 1;
                    $walmartShopDetailModel->save(false);
                }
                elseif($walmartShopDetail->token != $token || $walmartShopDetail->status == '0')
                {
                    $walmartShopDetail->status = 1;
                    $walmartShopDetail->token = $token;
                    $walmartShopDetail->save(false);
                }

                $extensionDetail = WalmartExtensionDetail::find()->select('id')->where(['merchant_id' => $merchant_id])->one();
                if (is_null($extensionDetail)) {
                    $extensionDetailModel = new WalmartExtensionDetail();
                    $extensionDetailModel->merchant_id = $merchant_id;
                    $extensionDetailModel->install_date = date('Y-m-d H:i:s');
                    $extensionDetailModel->date = date('Y-m-d H:i:s');
                    $extensionDetailModel->expire_date = date('Y-m-d H:i:s', strtotime('+7 days', strtotime(date('Y-m-d H:i:s'))));
                    $extensionDetailModel->status = "Not Purchase";
                    $extensionDetailModel->app_status = "install";
                    $extensionDetailModel->save(false);
                    //Sending Mail to clients , when app installed
                    /*if(defined(EMAIL))
                        Yii::$app->Sendmail->installmail(EMAIL);*/
                } elseif ($extensionDetail->app_status != "install") {
                    $extensionDetail->app_status = "install";
                    $extensionDetail->save(false);
                }

                if(isset($result['id']) && !empty($result['id'])){
                    $merchant_id = $result['id'];
                    $emailConfigCheck="SELECT * FROM `walmart_config` WHERE data LIKE'email/%' and `merchant_id`='".$merchant_id."'";
                    $emailConfigCheckdata = Data::sqlRecords($emailConfigCheck,"all");
                    $query="SELECT * FROM `email_template`";
                    $email = Data::sqlRecords($query,"all");
                    if(empty($emailConfigCheckdata)){
                
                        $query="SELECT * FROM `email_template`";
                        $email = Data::sqlRecords($query,"all");
                        foreach ($email as $key => $value) {
                            $emailConfiguration['email/'.$value['template_title']] = isset($value["template_title"])?1:0;
                        }
                        if(!empty($emailConfiguration)){
                            foreach ($emailConfiguration as $key => $value)
                            {
                                Data::saveConfigValue($merchant_id, $key, $value);
                            }
                        }
                    }
                    else
                    {
                        foreach ($emailConfigCheckdata as $key1 => $value1) {
                            foreach ($email as $key => $value) {
                                $emailTitle = str_replace('email/', '',$value1['data']);
                                if(trim($value["template_title"])==trim($emailTitle)){
                                    $emailConfiguration['email/'.$emailTitle] =0;
                                    break;
                
                                }
                                else{
                                    $emailConfiguration['email/'.$emailTitle] =1;
                
                                }
                
                            }
                             
                
                
                        }
                        if(!empty($emailConfiguration)){
                            foreach ($emailConfiguration as $key => $value)
                            {
                                 
                                if($value=='1'){
                                    Data::saveConfigValue($merchant_id, $key, $value);
                                }
                            }
                
                        }
                    }
                }
                
                if($shop)
                {
                    $model->login($shop);
                }
                return $this->redirect(['index']);
            } 
        }      
        elseif(!empty($_GET["signed_payload"]))
        {
            $bigcomClient= new BigcommerceClientHelper(WALMART_APP_KEY,"","");
            $connection = Yii::$app->getDb();
            $signedRequest = $_GET['signed_payload'];
            $signedrequest = $bigcomClient->verifySignedRequest($signedRequest);
            //$countProducts = "UPDATE  `user` set store_hash='".$signedrequest['store_hash']."' WHERE username='".$signedrequest['user']['email']."'";
            $queryObj = $connection->createCommand("SELECT store_hash,username FROM `user` WHERE store_hash='".$signedrequest['store_hash']."'");
            $count = $queryObj->queryOne();
            if($count){
                $model->login($count['username']);
                return $this->redirect(['index']);
            }
        
        }
        else{
            return $this->render('index', [
                    'model' => $model,
                    ]);
        }
    
    
    }
    public function actionPaymentplan()
    {
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        return $this->render('paymentplan');
        $connection->close();
         
    }
    public function actionCheckpayment()
    {
        if(!isset($token) || !isset($shop)){
            $merchant_id=Yii::$app->user->identity->id;
            $shop=Yii::$app->user->identity->username;
            $shopDetails = Data::getWalmartShopDetails($merchant_id);
            $token = isset($shopDetails['token'])?$shopDetails['token']:'';
            $connection = Yii::$app->getDb();
        }
        $isPayment=false;
        $sc = new ShopifyClientHelper($shop, $token, WALMART_APP_KEY, WALMART_APP_SECRET);

        if(isset($_GET['charge_id']) && isset($_GET['plan']) && $_GET['plan']==1)
        {
            $response="";
            $response=$sc->call('GET','/admin/application_charges/'.$_GET['charge_id'].'.json');
            if(isset($response['id']) && $response['status']=="accepted")
            {
                $isPayment=true;
                $response=array();
                $response=$sc->call('POST','/admin/application_charges/'.$_GET['charge_id'].'/activate.json',$response);
                if(is_array($response) && count($response)>0)
                {
                    $recurring="";
                    $recurring=$connection->createCommand('select `id` from `walmart_recurring_payment` where id="'.$_GET['charge_id'].'"')->queryAll();
                    if(!$recurring)
                    {
                        $created_at=date('Y-m-d H:i:s',strtotime($response['created_at']));
                        $updated_at=date('Y-m-d H:i:s',strtotime($response['updated_at']));
                        $response['timestamp']=date('d-m-Y H:i:s');
                        $query="insert into `walmart_recurring_payment`
                                (id,merchant_id,billing_on,activated_on,status,recurring_data,plan_type)
                                values('".$_GET['charge_id']."','".$merchant_id."','".$created_at."','".$updated_at."','".$response['status']."','".json_encode($response)."','".$response['name']."')";
                        $connection->createCommand($query)->execute();
                        //change data-time and status in walmart-extension-details
                        $expire_date=date('Y-m-d H:i:s',strtotime('+3 months', strtotime($updated_at)));
                        $query="UPDATE walmart_extension_detail SET date='".$updated_at."',expire_date='".$expire_date."' ,status='Purchased' where merchant_id='".$merchant_id."'";
                        $connection->createCommand($query)->execute();
                    }
                    Yii::$app->session->setFlash('success',"Thank you for choosing ".$response['name']);
                }
            }
            else
            {
                return $this->redirect(['paymentplan']);
            }
        }
        elseif(isset($_GET['charge_id']) && isset($_GET['plan']) && $_GET['plan']==2)
        {
            $response="";
            $response=$sc->call('GET','/admin/application_charges/'.$_GET['charge_id'].'.json');
            if(isset($response['id']) && $response['status']=="accepted")
            {
                $isPayment=true;
                $response=array();
                $response=$sc->call('POST','/admin/application_charges/'.$_GET['charge_id'].'/activate.json',$response);
                if(is_array($response) && count($response)>0)
                {
                    $recurring="";
                    $recurring=$connection->createCommand('select `id` from `walmart_recurring_payment` where id="'.$_GET['charge_id'].'"')->queryAll();
                    if(!$recurring)
                    {
                        $created_at=date('Y-m-d H:i:s',strtotime($response['created_at']));
                        $updated_at=date('Y-m-d H:i:s',strtotime($response['updated_at']));
                        $response['timestamp']=date('d-m-Y H:i:s');
                        $query="insert into `walmart_recurring_payment`
                                (id,merchant_id,billing_on,activated_on,status,recurring_data,plan_type)
                                values('".$_GET['charge_id']."','".$merchant_id."','".$created_at."','".$updated_at."','".$response['status']."','".json_encode($response)."','".$response['name']."')";
                        $connection->createCommand($query)->execute();
                        //change data-time and status in walmart-extension-details
                        $expire_date=date('Y-m-d H:i:s',strtotime('+6 months', strtotime($updated_at)));
                        $query="UPDATE walmart_extension_detail SET date='".$updated_at."',expire_date='".$expire_date."' ,status='Purchased' where merchant_id='".$merchant_id."'";
                        $connection->createCommand($query)->execute();
                    }
                    Yii::$app->session->setFlash('success',"Thank you for choosing ".$response['name']);
                }
            }
            else
            {
                return $this->redirect(['paymentplan']);
            }
        }
        elseif(isset($_GET['charge_id']) && isset($_GET['plan']) && $_GET['plan']==3)
        {
            $response="";
            $response=$sc->call('GET','/admin/application_charges/'.$_GET['charge_id'].'.json');
            if(isset($response['id']) && $response['status']=="accepted")
            {
                $isPayment=true;
                $response=array();
                $response=$sc->call('POST','/admin/application_charges/'.$_GET['charge_id'].'/activate.json',$response);
                if(is_array($response) && count($response)>0)
                {
                    $recurring="";
                    //echo $expire_date=date('Y-m-d H:i:s',strtotime('+1 year', strtotime(date('Y-m-d H:i:s',strtotime($response['updated_at'])))));
                    //die("XCvcv");

                    $recurring=$connection->createCommand('select `id` from `walmart_recurring_payment` where id="'.$_GET['charge_id'].'"')->queryAll();
                    if(!$recurring)
                    {
                        $created_at=date('Y-m-d H:i:s',strtotime($response['created_at']));
                        $updated_at=date('Y-m-d H:i:s',strtotime($response['updated_at']));
                        $response['timestamp']=date('d-m-Y H:i:s');
                        $query="insert into `walmart_recurring_payment`
                                (id,merchant_id,billing_on,activated_on,status,recurring_data,plan_type)
                                values('".$_GET['charge_id']."','".$merchant_id."','".$created_at."','".$updated_at."','".$response['status']."','".json_encode($response)."','".$response['name']."')";
                        $connection->createCommand($query)->execute();
                        //change data-time and status in jet-extension-details
                        $expire_date=date('Y-m-d H:i:s',strtotime('+1 year', strtotime($updated_at)));
                        $query="UPDATE walmart_extension_detail SET date='".$updated_at."',expire_date='".$expire_date."' ,status='Purchased' where merchant_id='".$merchant_id."'";
                        $connection->createCommand($query)->execute();
                    }
                    Yii::$app->session->setFlash('success',"Thank you for choosing ".$response['name']);
                }
            }
            else
            {
                return $this->redirect(['paymentplan']);
            }
        }
        return $this->redirect(['index']);
    }
    public function actionPricing()
    {
        return $this->render('pricing');
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionError()
    {
        //die('ghfhfh');
        $exception = Yii::$app->errorHandler->exception;
        $error=Yii::$app->errorHandler->error;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception, 'error'=>$error]);
        }
    }
    public function goHome()
    {
        $url = \yii\helpers\Url::toRoute(['/walmart/site/index']);
        return $this->redirect($url);
    }
    
    public function getConnection()
    {

        $username = 'root';
        $password = '';
    
        $connection = new \yii\db\Connection([

    
                'dsn' => 'mysql:host=127.0.0.1;dbname=cedcom5_Mx42Qt',
                'username' => $username,
                'password' => $password,
                //'charset' => 'utf8',
                ]);
        //$connection->open();
        return $connection;
    
    }
    
    public function actionFeedback()
    {
    	if (Yii::$app->user->isGuest) {
    		return $this->redirect(['index']);
    	}
    	$this->layout = "main2";
    
    	$html = $this->render('feedbackform');
    	return $html;
    }
}
