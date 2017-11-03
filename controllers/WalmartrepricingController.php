<?php
namespace frontend\modules\walmart\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\WalmartProduct;
use frontend\modules\walmart\components\WalmartRepricing;
use frontend\modules\walmart\models\WalmartProductRepricingSearch;
use frontend\modules\walmart\models\WalmartProductRepricing;
use frontend\modules\walmart\components\Walmartapi;
use frontend\modules\walmart\components\Xml\Parser;
use frontend\modules\walmart\components\Generator;

class WalmartrepricingController extends WalmartmainController
{
    const GET_FEEDS_PRICE_SUB_URL = 'v3/feeds?feedType=price';
    /**
     * Number of products to be synced in a request
    */
    public static $_size_of_request = 100;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (Yii::$app->user->isGuest) {
                return \Yii::$app->getResponse()->redirect(Data::getUrl('site/login'));
            } else {
                return true;
            }
        }
    }

    /**
     * Lists all WalmartProducts.
     * @return mixed
     */
    public function actionIndex()
    {
        $merchant_id = Yii::$app->user->identity->id;

        $searchModel = new WalmartProductRepricingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView()
    {
        $productIds = Yii::$app->request->post('selection',false);
      /*  $productIds = explode(',','5575699655,5575799751,8424113095,8424142407,8424144583,8424146311,8424152583,8424206343,8424208327,8424209735,8424211719,8424214023,8424216007,8424218119,8424219911,8424221447,8424223367,8424225287,8424227399');*/
        
    
        if($productIds && count($productIds))
        {
            $return_error = [];
            $merchant_id = Yii::$app->user->identity->id;

            foreach ($productIds as $key => $value) {
                $query = "SELECT * from `walmart_product_repricing` WHERE merchant_id='".$merchant_id."' AND product_id='".$value."'";
                $validate = Data::sqlRecords($query,'one','select');
                $sku = Data::getProductSku($value);
                if(empty($validate)){
                    $return_error['error'][]= $sku;
                }
            }
            if(isset($return_error['error'])){
                Yii::$app->session->setFlash('error', "<div class='error_reprice'> These Product(s) ".json_encode($return_error['error'])." are not available for repricing Please sync these product(s) with walmart </div>");
                return \Yii::$app->getResponse()->redirect(Data::getUrl('walmartrepricing/index'));
            }
           // $WalmartRepricing = new WalmartRepricing(API_USER,API_PASSWORD);
            //$csvFilePath = $WalmartRepricing->downloadBuyBoxReport($merchant_id);
          /*  if($csvFilePath)
            {*/
                return $this->render('view', [
                    'productIds' => $productIds,
                    /*'csvFilePath' => $csvFilePath,*/
                ]);
          /*  }
            else
            {*/
                /*Yii::$app->session->setFlash('error','Something went wrong.');
            }*/
        }
        else
        {
            Yii::$app->session->setFlash('error','No Products Selected.');
        }
        return \Yii::$app->getResponse()->redirect(Data::getUrl('walmartrepricing/index'));
    }

    

    public function actionSyncbuybox()
    {
        $merchant_id = Yii::$app->user->identity->id;

        $WalmartRepricing = new WalmartRepricing(API_USER,API_PASSWORD);
        $csvFilePath = $WalmartRepricing->downloadBuyBoxReport($merchant_id);
        if($csvFilePath)
        {
            if(file_exists($csvFilePath))
            {
                $buyBoxCount = WalmartRepricing::getRowsInCsv($csvFilePath);
                if($buyBoxCount)
                {
                    $size_of_request = self::$_size_of_request;
                    $pages = (int)(ceil($buyBoxCount / $size_of_request));
                    return $this->render('sync_buybox', [
                        'total_products' => $buyBoxCount,
                        'pages' => $pages,
                        'csvFilePath' => $csvFilePath
                    ]);
                }
                else
                {
                    Yii::$app->session->setFlash('error','No data found in buybox report.');
                }
            }
            
        }
        else
        {
            Yii::$app->session->setFlash('error','Buybox report not found.');
        }
        return \Yii::$app->getResponse()->redirect(Data::getUrl('walmartrepricing/index'));
    }

    public function actionSavebuyboxdata()
    {
        $session = Yii::$app->session;

        $index = Yii::$app->request->post('index',false);
        if($index !== false)
        {
            $isLastPage = Yii::$app->request->post('isLast');

            $merchant_id = Yii::$app->user->identity->id;
            $csvFilePath = Yii::$app->request->post('csvFilePath',false);

            if($csvFilePath)
            {
                $size_of_request = self::$_size_of_request;

                $errorSku = [];
                $successSku = [];

                $sessionKey = 'all_product_sku_'.$merchant_id;


                if(!isset($session[$sessionKey])) {
                    $allProductSku = WalmartProduct::getAllProductSku($merchant_id);
                    $session->set($sessionKey, $allProductSku);
                }
                else {
                    $allProductSku = $session[$sessionKey];
                }

                foreach ($allProductSku as  $value) {
                    $allProductSku1[]=$value['sku'];
                }
               
                $buyBoxData = WalmartRepricing::readBuyboxCsv($csvFilePath,$size_of_request,$index);

                foreach ($buyBoxData as $sku => $data) 
                {
                   
                    if(in_array($sku, $allProductSku1))
                    {

                        $productIds = WalmartRepricing::getProductIdsBySku($sku,$merchant_id);
                        if($productIds)
                        {
                            $buybox = 0;
                            if(isset($data['issellerbuyboxwinner']) && $data['issellerbuyboxwinner'] == 'YES') {
                                $buybox = 1;
                            }

                            $your_price = [];
                            if(isset($data['seller_item_price'])) {
                                $your_price['price'] = $data['seller_item_price'];
                            }
                            if(isset($data['seller_ship_price'])) {
                                $your_price['ship'] = $data['seller_ship_price'];
                            }
                            $your_price = json_encode($your_price);


                            $best_prices = [];
                            if(isset($data['buybox_item_price'])) {
                                $best_prices[] = [
                                                    'buybox_item_price' => $data['buybox_item_price'],
                                                    'buybox_ship_price' => $data['buybox_ship_price'],
                                                    'buybox_seller_id' => $data['buybox_seller_id']
                                                 ];
                            }
                            if(isset($data['offer2_item_price'])) {
                                $best_prices[] = [
                                                    'offer2_item_price' => $data['offer2_item_price'],
                                                    'offer2_ship_price' => $data['offer2_ship_price'],
                                                    'offer2_seller_id' => $data['offer2_seller_id'],
                                                 ];
                            }
                            if(isset($data['offer3_item_price'])) {
                                $best_prices[] = [
                                                    'offer3_item_price' => $data['offer3_item_price'],
                                                    'offer3_ship_price' => $data['offer3_ship_price'],
                                                    'offer3_seller_id' => $data['offer3_seller_id'],
                                                 ];
                            }
                            if(isset($data['offer4_item_price'])) {
                                $best_prices[] = [
                                                    'offer4_item_price' => $data['offer4_item_price'],
                                                    'offer4_ship_price' => $data['offer4_ship_price'],
                                                    'offer4_seller_id' => $data['offer4_seller_id'],
                                                 ];
                            }
                            $best_prices = json_encode($best_prices);

                            if(!$exist=WalmartRepricing::isExist($sku, $merchant_id))
                            {
                                $insertQuery = "INSERT INTO `walmart_product_repricing`(`merchant_id`, `product_id`, `option_id`, `sku`, `your_price`, `buybox`, `best_prices`) VALUES ({$merchant_id}, {$productIds['product_id']}, {$productIds['variant_id']}, '{$sku}', '{$your_price}', '{$buybox}', '{$best_prices}')";
                                Data::sqlRecords($insertQuery, null, "insert");
                            }
                            else
                            {
                                $updateQuery = "UPDATE `walmart_product_repricing` SET `your_price`='{$your_price}',`buybox`='{$buybox}',`best_prices`='{$best_prices}' WHERE `id` = '{$exist['id']}'";
                                Data::sqlRecords($updateQuery, null, "update");
                            }
                            $successSku[$sku] = 'Successfully Synced.';
                        }
                        else
                        {
                            $errorSku[$sku] = 'Sku not found in our records.';
                        }
                    }
                    else
                    {
                        
                        $errorSku[$sku] = 'Sku not found in our app (walmart itemid : '.$data['item_id'].').';
                    }
                
                }

                if($isLastPage)
                {
                    unset($session[$sessionKey]);
                }

                $return = [];
                if(count($successSku))
                {
                    $return['success'] = true;
                    $return['success_count'] = count($successSku);
                }

                if(count($errorSku))
                {
                    $return['error'] = implode(', ',array_keys($errorSku));
                    $return['error_object'] = $errorSku;
                    $return['error_count'] = count($errorSku);
                }
                return json_encode($return);
            }
            else
            {
                return json_encode(['error'=>'Buybox Report Not found.']);
            }
        }
        else
        {
            return json_encode(['error'=>'Undefined Index']);
        }
    }
    /*
    * Cron Reprice Process Action
    * @return []
    */
    public function actionCronPriceUpdate($product){
            if(count($product)>0){
                $data = self::prepareData($product);
            }
    }

    public function actionSave()
    {
        $return_error = [];
        $return = [];
        $merchant_id = Yii::$app->user->identity->id;
        if(isset($_POST['data']) && !empty($_POST['data'])){
            foreach ($_POST['data']as $key => $value) {
                if(isset($value['variant']) && !empty($value['variant'])){
                    foreach ($value['variant'] as $vkey => $variant) {
                        if((isset($variant['min_price']) && !empty($variant['min_price'])) || (isset($variant['max_price']) && !empty($variant['max_price']))){
                            $sku = Data::getProductSku($value['product_id']);
                            if(empty($variant['min_price'])){
                                $return_error[$sku]='min_price not set ';
                                continue;
                            }
                            if(empty($variant['max_price'])){
                                 $return_error[$sku]='max_price not set ';
                                continue;
                            }
                            if($variant['min_price']>$variant['max_price']){
                                $return_error[$sku]='min_ price must be less than max price '.$sku;
                                continue;
                            }
                            if(intval($variant['min_price'])<='0.00'){
                                $return_error[$sku]='min_ price must be greater than 0.00 price ';
                                continue;
                            }
                            if(($variant['max_price'])<='0.00'){
                                $return_error[$sku]='max_ price must be greater than 0.00 price ';
                                continue;
                            }
                            $updateQuery = "UPDATE `walmart_product_repricing` SET `min_price`='".$variant['min_price']."',`max_price`='".$variant['max_price']."',`repricing_status`='".$variant['enable_repricing']."' WHERE `merchant_id`='".$merchant_id."' AND `product_id`='".$value['product_id']."' AND `option_id`='".$variant['option_id']."'";
                            Data::sqlRecords($updateQuery,null,'update');
                        }
                        else{
                            $deleteQuery = "Delete FROM `walmart_product_repricing`  WHERE `merchant_id`='".$merchant_id."' AND `product_id`='".$value['product_id']."' AND `option_id`='".$variant['option_id']."'";
                            Data::sqlRecords($deleteQuery,null,'delete');
                        }
                    }
                }
                else{
                    if((isset($value['min_price']) && !empty($value['min_price'])) || (isset($value['max_price']) && !empty($value['max_price']))){
                        $sku = Data::getProductSku($value['product_id']);

                            if(empty($value['min_price'])){
                                $return_error[$sku]='min_price not set ';
                                continue;
                            }
                            if(empty($value['max_price'])){
                                 $return_error[$sku]='max_price not set ';
                                continue;
                            }
                            if($value['min_price']>$value['max_price']){
                                $return_error[$sku]='min_ price must be less than max price ';
                                continue;
                            }
                            if(intval($value['min_price'])<='0.00'){
                                $return_error[$sku]='min_ price must be greater than 0.00 price ';
                                continue;
                            }
                            if(($value['max_price'])<='0.00'){
                                $return_error[$sku]='max_ price must be greater than 0.00 price ';
                                continue;
                            }
                            $updateQuery = "UPDATE `walmart_product_repricing` SET `min_price`='".$value['min_price']."',`max_price`='".$value['max_price']."',`repricing_status`='".$value['enable_repricing']."' WHERE `merchant_id`='".$merchant_id."' AND `product_id`='".$value['product_id']."'";
                            Data::sqlRecords($updateQuery,null,'update');
                        }
                        else{
                            $deleteQuery = "Delete FROM `walmart_product_repricing`  WHERE `merchant_id`='".$merchant_id."' AND `product_id`='".$value['product_id']."'";
                            Data::sqlRecords($deleteQuery,null,'delete');
                        }
                }
            }
            if(!empty($return_error)){
                $return['error']=$return_error;
            }
            else{
                $return['success']='Product Save Successfully';
            }
            return json_encode($return);
        }

    }

    public static function prepareData($products){
        $merchantArray = [];
        $priceArray = [];
        $timeStamp = (string)time();
        foreach ($products as $key => $value) {
                $merchant_id = $value['merchant_id'];
                $config = Data::getConfiguration($merchant_id);
                if(isset($merchantArray[$merchant_id]['count'])){
                    $merchantArray[$merchant_id]['count']++;
                }
                else{
                    $merchantArray[$merchant_id]['count'] = 1;
                }
                $minPrice = floatval($value['min_price']);
                $maxPrice = floatval($value['max_price']);
                $price_data = json_decode($value['your_price'],true);
                $orignal_price = $price_data['price'];
                $best_price_data = json_decode($value['best_prices'],true);
                $price = WalmartRepricing::calculateBestPrice($orignal_price,$best_price_data[0]['buybox_item_price'],$minPrice,$maxPrice);
                $priceArray= [
                    'Price' => [
                        'itemIdentifier' => [
                            'sku' => $value['sku']
                        ],
                        'pricingList' => [
                            'pricing' => [
                                'currentPrice' => [
                                    'value' => [
                                        '_attribute' => [
                                            'currency' => $config['currency'],
                                            'amount' => $price
                                        ],
                                        '_value' => [

                                        ]
                                    ]
                                ],
                                'currentPriceType' => 'BASE',
                                'comparisonPrice' => [
                                    'value' => [
                                        '_attribute' => [
                                            'currency' => $config['currency'],
                                            'amount' => $price
                                        ],
                                        '_value' => [

                                        ]
                                    ]
                                ],
                            ]
                        ]
                    ]
                ];
        
            if(isset($merchantArray[$merchant_id]['count'])){
                if($merchantArray[$merchant_id]['count']==10000){
                        self::postPricedata($priceArray,$merchant_id,$config);
                        unset($merchantArray[$merchant_id]);
                }
            }
            $merchantArray[$merchant_id]['product'][]=$priceArray; 
        }
        foreach ($merchantArray as $mkey => $mvalue) {
            if(isset($mvalue['count'])){
                self::postPricedata($mvalue['product'],$merchant_id);
            }
            
        }
    }

    /*
    * Post Data 10000 product at a time
    */
    public static function postPricedata($priceArray,$merchant_id,$config=null){
            $priceData = [
                'PriceFeed' => [
                    '_attribute' => [
                        'xmlns:gmp' => "http://walmart.com/",
                    ],
                ]
            ];
           
            $valData= [
                        0 => [
                            'PriceHeader' => [
                                'version' => '1.5',
                            ],
                        ],
                    ];
            $array = array_merge($valData,$priceArray);
            $priceData['PriceFeed']['_value']=$array;
            if(is_null($config)){
                $config = Data::getConfiguration($merchant_id);
            }
            $checkFeedStatus = Data::checkFeedStatus($merchant_id);
            $count = 0;
            if(isset($checkFeedStatus['notsave'])){
                $insert = "INSERT INTO `walmart_cron_feed`(`merchant_id`, `last_feed_time`,`feed_count`) VALUES ('".$merchant_id."','".date("Y-m-d H:i:s")."','1')";
                Data::sqlRecords($insert,null,'insert');
                $path = 'walmart/productpricing/pricefeed/' . date('d-m-Y') . '/' . $merchant_id . '/cron/repricing';
                $dir = \Yii::getAlias('@webroot') . '/var/' . $path;
                if (!file_exists($dir)) {
                    mkdir($dir, 0775, true);
                }
                $customGenerator = new Generator();
                $file = $dir . '/MPProduct-' . time() . '.xml';
                $customGenerator->arrayToXml($priceData)->save($file);
                $obj = new Walmartapi($config['consumer_id'],$config['secret_key']);
                $response = $obj->postRequest(self::GET_FEEDS_PRICE_SUB_URL, ['file' => $file]);
                $responseArray = Walmartapi::xmlToArray($response);
            }
            if(isset($checkFeedStatus['success'])){
                $data = Data::isSendPriceFeed($merchant_id);
                $count= $data['feed_count']+1;
                $update = "UPDATE `walmart_cron_feed` SET `last_feed_time`='".date("Y-m-d H:i:s")."',`feed_count`='".$count."' WHERE `merchant_id`='".$merchant_id."'";
                Data::sqlRecords($update,null,'update');
                $path = 'walmart/productpricing/pricefeed/' . date('d-m-Y') . '/' . $merchant_id . '/cron/repricing';
                $dir = \Yii::getAlias('@webroot') . '/var/' . $path;
                if (!file_exists($dir)) {
                    mkdir($dir, 0775, true);
                }
                $customGenerator = new Generator();
                $file = $dir . '/MPProduct-' . time() . '.xml';
                $customGenerator->arrayToXml($priceData)->save($file);
                $obj = new Walmartapi($config['consumer_id'],$config['secret_key']);
                $response = $obj->postRequest(self::GET_FEEDS_PRICE_SUB_URL, ['file' => $file]);
                $responseArray = Walmartapi::xmlToArray($response);
            }
            if(isset($checkFeedStatus['limit_cross'])){
                if(!file_exists(\Yii::getAlias('@webroot').'/var/walmart/productpricing/'.$merchant_id)){
                     mkdir(\Yii::getAlias('@webroot').'/var/walmart/productpricing/'.$merchant_id,0775, true);
                }
                $base_path=\Yii::getAlias('@webroot').'/var/walmart/productpricing/'.$merchant_id.'/'.date("Y-m-d H:i:s").'.txt';
                    $file = fopen($base_path,"a");
                    fwrite($file,json_encode($priceData));
                    fclose($file);

            }
    }


}
