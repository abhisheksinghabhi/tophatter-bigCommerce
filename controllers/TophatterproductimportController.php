<?php
namespace frontend\modules\tophatter\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use frontend\modules\tophatter\components\Data;
use frontend\modules\tophatter\components\BigcommerceClientHelper;
use frontend\modules\tophatter\components\Jetproductinfo;

class TophatterproductimportController extends Controller
{

    protected $bigcom, $tophatterHelper;
    const MAX_CUSTOM_PRODUCT_IMPORT_PER_REQUEST = 50;   
    protected $connection;

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
        Yii::$app->request->enableCsrfValidation = false;
        $merchant_id = Yii::$app->user->identity->id;
        $shopDetails = Data::getTophatterShopDetails($merchant_id);
        $shop = Yii::$app->user->identity->username;
        $store_hash=Yii::$app->user->identity->store_hash;
        $token = isset($shopDetails['token'])?$shopDetails['token']:'';
        define("MERCHANT_ID", $merchant_id);
        define("SHOP", $shop);
        define("TOKEN", $token);
        define("STOREHASH",$store_hash);
        $this->bigcom = new BigcommerceClientHelper(TOPHATTER_APP_KEY,$token,STOREHASH);

        return parent::beforeAction($action);
    }
    /**
     * Lists all JetProduct models.
     * @return mixed
     */
    
    public function actionImport()
    {
        //$this->layout = 'main2';
        return $this->render('import');
    }

    /*public function actionGettotaldetails(){
        $result = [];
        $merchantId = isset($_REQUEST['merchant_id'])?$_REQUEST['merchant_id']:"";
        $select = isset($_REQUEST['select'])?$_REQUEST['select']:"";
        $allowedSelectValues = ['any', 'published'];
        if($merchantId && in_array($select, $allowedSelectValues)){

            $shopDetails = Data::getWalmartShopDetails($merchantId);

            $connection = Yii::$app->getDb();
            define("MERCHANT_ID",Yii::$app->user->identity->id);
            define("SHOP",Yii::$app->user->identity->username);
            define("TOKEN",isset($shopDetails['token'])?$shopDetails['token']:'');
            define("STOREHASH",Yii::$app->user->identity->store_hash);
            $merchant_id = MERCHANT_ID?:$merchantId;
            $shopname = SHOP;
            $token = TOKEN;
            $countProducts = 0;
            $pages = 0;
            $index = 1;
            $nonSkuCount = 0;
            $nonProductType = 0;
            //$shopifymodel=Shopifyinfo::getShipifyinfo();
            
            $bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,TOKEN,STOREHASH);
            if($select=='any')
            {
                $resource='catalog/products?include=variants,images&limit=250';
            }
            else
            {
                $resource='catalog/products?include=variants,images&is_visible=1&limit=250';
            }
            
            $productdata=$bigcom->get($resource);

            $countProducts=$productdata['meta']['pagination']['total'];
            $pages=$productdata['meta']['pagination']['total_pages'];

            while($index <= $pages) {
                $products = "";
                $resource1 = $resource.'&page='.$index.'';
                $products = $bigcom->get($resource1);
                if(isset($products['errors'])){
                    $result['err'] = $products['errors'];
                    return json_encode($result);
                }
               foreach($products['data'] as $prod) {
                    if($prod['categories'][0] == ''){
                        $nonProductType ++;
                        continue;
                    }
                    if($prod['sku']=="") {
                            $nonSkuCount ++;
                            break;
                        }
                   
                }
                $index ++;
            }
            $result ['total'] = $countProducts;    
            $result ['non_sku'] = $nonSkuCount;    
            $result ['ready'] = $countProducts - ($nonSkuCount + $nonProductType); 
            $result ['non_type'] = $nonProductType;
            $result ['csrf'] = Yii::$app->request->getCsrfToken();
            $inserted="";
            $resultSQL = array();
            $inserted = $connection->createCommand("SELECT `merchant_id` FROM `insert_product` WHERE merchant_id='".$merchant_id."'");
            $resultSQL = $inserted->queryOne();
            if(empty($resultSQL))
            {
                   $queryObj = "";
                   $query = 'INSERT INTO `insert_product`
                                (
                                    `merchant_id`,
                                    `product_count`,
                                    `not_sku`,
                                    `status`,
                                    `total_product`
                                )
                                VALUES(
                                    "'.$merchant_id.'",
                                    "'.($countProducts - $nonSkuCount).'",
                                    "'.$nonSkuCount.'",
                                    "inserted",
                                    "'.$countProducts.'"
                                )';
                    $queryObj = $connection->createCommand($query)->execute();
            }else{
                    $updateQuery = "UPDATE `insert_product` SET `product_count`='".($countProducts - $nonSkuCount)."' ,`total_product`='".$countProducts."', `not_sku`='".$nonSkuCount."' WHERE merchant_id='".$merchant_id."'";
                    $updated = $connection->createCommand($updateQuery)->execute();
            } 
        }
        return json_encode($result);
    }
    public function interchangeArray($a , $b){
        if ($a["position"] == $b["position"]) {
            return 0;
        }
        return ($a["position"] < $b["position"]) ? -1 : 1;
    }
    
    public function actionBatchimport()
    {
        $index = Yii::$app->request->post('index');
        $select = Yii::$app->request->post('select');
        $merchant_id = Yii::$app->request->post('merchant_id');
        $shopDetails = Data::getWalmartShopDetails($merchant_id);
        try
        {
            $sc = "";
            $connection = Yii::$app->getDb();
            define("MERCHANT_ID",Yii::$app->user->identity->id);
            define("SHOP",Yii::$app->user->identity->username);
            define("TOKEN",isset($shopDetails['token'])?$shopDetails['token']:'');
            define("STOREHASH",Yii::$app->user->identity->store_hash);
            $shopname = SHOP;
            $token = TOKEN;

            $bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,TOKEN,STOREHASH);  
            $resource='catalog/products?include=variants,images&is_visible=1&limit=250&page='.$index.'';
            $products=$bigcom->get($resource);

            $readyCount = 0;
            $notSku = 0;
            $notType = 0;
            if($products){
                foreach ($products['data'] as $prod){
                    $noSkuFlag = 0;
                    if($prod['categories'][0]==''){
                        $notType ++;
                        continue;
                    }
                    if($prod['sku']=="") {
                        if($prod['variants'][0]['sku']==""){
                            $noSkuFlag = 1;
                            $notSku ++;
                            continue;
                        }
                        //break;
                    }
                    
                    
                    if(!$noSkuFlag){
                        $readyCount ++;
                        //Jetproductinfo::saveNewRecords1($prod, $merchant_id, $connection,TOKEN,STOREHASH,true);
                    } 
                }

                    $queryObj="";
                    $query='INSERT INTO `insert_product`
                                (
                                    `merchant_id`,
                                    `product_count`,
                                    `total_product`,
                                    `not_sku`,
                                    `status`
                                )
                                VALUES(
                                    "'.$merchant_id.'",
                                    "'.$readyCount.'",
                                    "'.$readyCount.'",
                                    "'.$notSku.'",
                                    "inserted"  
                                )';
                    $queryObj = $connection->createCommand($query)->execute();

            }
          
        }
        catch (ShopifyApiException $e){
            return $returnArr['error'] = $e->getMessage();
        }
        catch (ShopifyCurlException $e){
            return $returnArr['error'] = $e->getMessage();
        }
        $returnArr['success']['count'] = $readyCount;
        $returnArr['success']['not_sku'] = $notSku;
        $returnArr['success']['not_type'] = $notType;
        $connection->close();
        return json_encode($returnArr);
    }
    */
    public function actionGettotaldetails()
    {
        $result = [];
        $session = Yii::$app->session;
        $merchantId = isset($_REQUEST['merchant_id'])?$_REQUEST['merchant_id']:"";
        $non_sku_total = isset($_REQUEST['non_sku_total'])?$_REQUEST['non_sku_total']:0;
        $non_type_total = isset($_REQUEST['non_type_total'])?$_REQUEST['non_type_total']:0;
        $select = isset($_REQUEST['select'])?$_REQUEST['select']:"";
        $limit = isset($_REQUEST['limit'])?$_REQUEST['limit']:250;
        $page = isset($_REQUEST['page'])?$_REQUEST['page']:0;
        $select = $select=='custom'?'any':$select;
        $allowedSelectValues = ['any', 'published'];
        if($merchantId && in_array($select, $allowedSelectValues))
        {
            $shopDetails = Data::getTophatterShopDetails($merchantId);

            $connection = Yii::$app->getDb();
            if(!defined('MERCHANT_ID'))
                define("MERCHANT_ID",Yii::$app->user->identity->id);
            if(!defined('SHOP'))
                define("SHOP",Yii::$app->user->identity->username);
            if(!defined('TOKEN'))
                define("TOKEN",isset($shopDetails['token'])?$shopDetails['token']:'');
            $merchant_id = MERCHANT_ID?:$merchantId;
            $shopname = SHOP;
            $token = TOKEN;
            $countProducts = 0;
            $pages = 0;
            $index = 1;
            $nonSkuCount = 0;
            $nonProductType = 0;
            $currentTotalProd = 0;
            $prod_count = 0;
            $sameSku ="";
            $notSku ="";
            $notProductType="";
            $sameSkuArray=[];
            if(isset($session[$merchant_id.'samesku'])){
                $sameSkuArray=$session[$merchant_id.'samesku'];
            }
           /* if (file_exists(\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id.'/sku.txt')) {
                $sameSkuArray=json_decode(file_get_contents(\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id.'/sku.txt'),true);
            }*/
            $notSkuArray=[];
            $notProductTypeArray=[];
            //$shopifymodel=Shopifyinfo::getShipifyinfo();
            //$sc = new ShopifyClientHelper($shopname, $token, WALMART_APP_KEY, WALMART_APP_SECRET);
            $resource="";
            if($select=='any')
            {
                //$resource="catalog/products?include_fields=''&limit=250";
                 $productdata=$this->bigcom->call('GET', 'catalog/products?include=variants,images&limit=250'); 

            }
            else
            {
                //"catalog/products?include_fields='is_visible'&limit=250"
               // $resource="catalog/products?include_fields='is_visible'&limit=250";
                $productdata = $this->bigcom->call('GET', 'catalog/products?include=variants,images&is_visible=1&limit=250');

            }

            //$bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,TOKEN,STOREHASH);
         
           
            if(isset($productdata['errors'])){
                $result['err'] = $productdata['errors'];
                return json_encode($result);
            }
            
            $countProducts=$productdata['meta']['pagination']['total'];
            $pages=$productdata['meta']['pagination']['total_pages'];
            //get categories and branch from product api start
            $categories=$this->bigcom->call('GET', 'catalog/categories?limit=250');
            $brands=$this->bigcom->call('GET', 'catalog/brands?limit=250');
            $categories=isset($categories['data'])?$categories['data']:"";
            $brands=isset($brands['data'])?$brands['data']:"";
            Yii::$app->cache->set("categories", $categories, 3600);
            Yii::$app->cache->set("brands", $brands, 3600);
            //get categories and branch from product api end

            $productData = [];
            //$pages = ceil($countProducts/$limit);
            if($page<=$pages)
            {//while($index <= $pages) {
                $products = "";
                if($select=='any')
                {
                    $resource='catalog/products?include_fields=categories,name&include=variants&limit=250&page='.$page;
                }
                else
                {
                    $resource='catalog/products?include_fields=categories,name&include=variants&is_visible=1&limit=250&page='.$page;
                }
                $products = $this->bigcom->call('GET', $resource);
                if(isset($products['errors'])){
                    $result['err'] = $products['errors'];
                    return json_encode($result);
                }
                $currentTotalProd = count($products['data']);
                foreach($products['data'] as $prod) 
                {
                    if(trim($prod['categories'][0]) == ''){
                        $notProductType .= ','.$prod['id'];
                        $nonProductType ++;
                        continue;
                    }
                    $fg = true;
                    //$prod['variants'] = $varientArray;
                    foreach($prod['variants'] as $variant) 
                    {
                        if(trim($variant['sku'])=="") 
                        {
                            $nonSkuCount ++;
                            $notSku .= ','.$prod['id'];
                            $fg = false;
                            //break;
                        }
                        if(empty($sameSkuArray))
                        {
                            $skuKey = Data::getKey($variant['sku']);
                            $sameSkuArray[$skuKey]='1';
                        }
                        else
                        {
                            if(isset($sameSkuArray[$variant['sku']])){
                                $sameSku .= ','.$prod['id'];
                                $fg = false;
                                break;
                            }
                            else{
                                $skuKey = Data::getKey($variant['sku']);
                                $sameSkuArray[$skuKey]='1';
                            }
                        }

                        $prod_count++;
                    }
                    if(!$fg){
                        continue;
                    }
                    $productData[$prod['id']] = $prod;
                }
                //$index ++;
            }
            //var_dump($sameSku);

            if($prod_count > Data::TOTAL_PRODUCT_LIMIT)
            {
                $result['err'] = 'You have '.$prod_count. ' product(s) including variants which is beyond the limit. Contact us at <a target="_blank" href="mailto:bigcommerce@cedcommerce.com">shopify@cedcommerce.com</a> for importing your products.';
                return json_encode($result);
            }

            $result ['total'] = $countProducts;    
            $result ['non_sku'] = $nonSkuCount;    
            $result ['ready'] = $currentTotalProd - ($nonSkuCount + $nonProductType); 
            $result ['non_type'] = $nonProductType;
            $result ['csrf'] = Yii::$app->request->getCsrfToken();
            $result ['products'] = $productData;
            $non_sku_total += $nonSkuCount;
            $non_type_total += $nonProductType;
            //$merchant_id=Yii::$app->user->identity->id;
            if (!file_exists(\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id)) {
                mkdir(\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id,0775, true);
            }
            $base_path=\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id.'/samesku.txt';
            $file = fopen($base_path,"a");
            fwrite($file,$sameSku);
            fclose($file);
            $base_path=\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id.'/notsku.txt';
            $file = fopen($base_path,"a");
            fwrite($file,$notSku);
            fclose($file);
            $base_path=\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id.'/notProductType.txt';
            $file = fopen($base_path,"a");
            fwrite($file,$notProductType);
            fclose($file);
            if(count($sameSkuArray)>0){
                $session[$merchant_id.'samesku']=$sameSkuArray;
            }
            if($page==$pages){
                $inserted="";
                $resultSQL = array();
                $inserted = $connection->createCommand("SELECT `merchant_id` FROM `insert_product` WHERE merchant_id='".$merchant_id."'");
                $resultSQL = $inserted->queryOne();
                if(empty($resultSQL))
                {
                       $queryObj = "";
                       $query = 'INSERT INTO `insert_product`
                                    (
                                        `merchant_id`,
                                        `product_count`,
                                        `not_sku`,
                                        `status`,
                                        `total_product`
                                    )
                                    VALUES(
                                        "'.$merchant_id.'",
                                        "'.($countProducts - ($non_sku_total+$non_type_total)).'",
                                        "'.($non_sku_total+$non_type_total).'",
                                        "inserted",
                                        "'.$countProducts.'"
                                    )';
                        Data::sqlRecords($query);
                }
                else
                {
                    $updateQuery = "UPDATE `insert_product` SET `product_count`='".($countProducts - ($non_sku_total+$non_type_total))."' ,`total_product`='".$countProducts."', `not_sku`='".($non_sku_total+$non_type_total)."' WHERE merchant_id='".$merchant_id."'";
                    Data::sqlRecords($updateQuery);
                } 

            }
            
        }
        return json_encode($result);
    }
    
    public function interchangeArray($a , $b){
        if ($a["position"] == $b["position"]) {
            return 0;
        }
        return ($a["position"] < $b["position"]) ? -1 : 1;
    }
    
    public function actionBatchimport()
    {
        $session = Yii::$app->session;
        $sameSkuArray = [];
        $custom_sku = Yii::$app->request->post('customsku');
        $create_custom = Yii::$app->request->post('create_custom');

        $index = Yii::$app->request->post('index');
        //$index=1;
        $select = Yii::$app->request->post('select');
        $merchant_id = Yii::$app->request->post('merchant_id');
        //$merchant_id=MERCHANT_ID;
        if(isset($session[$merchant_id.'batchsamesku'])){
            $sameSkuArray=$session[$merchant_id.'batchsamesku'];
        }
        $limit = isset($_REQUEST['limit'])?$_REQUEST['limit']:250;
        $shopDetails = Data::getTophatterShopDetails($merchant_id);
        try
        {
            $sc = "";
            $connection = Yii::$app->getDb();
            if(!defined("MERCHANT_ID"))
                define("MERCHANT_ID",Yii::$app->user->identity->id);
            /*if(!defined("SHOP"))
                define("SHOP",Yii::$app->user->identity->username);
            if(!defined("TOKEN"))
                define("TOKEN",isset($shopDetails['token'])?$shopDetails['token']:'');
            $shopname = SHOP;
            $token = TOKEN;
            */
            //$sc = new ShopifyClientHelper($shopname, $token, WALMART_APP_KEY, WALMART_APP_SECRET);
            if($select=='any')
            {
                $resource='catalog/products?include_fields=name,description,sale_price,price,sku,upc,categories,inventory_level,brand_id&include=variants,images&limit=250&page='.$index;
            }
            else
            {
                $resource='catalog/products?include_fields=name,description,sale_price,price,sku,upc,categories,inventory_level,brand_id&include=variants,images&is_visible=1&limit=250&page='.$index;
            }

            //$resource='catalog/products?sort=id,categories&include=variants&is_visible=1&limit=250&pages='.$page;
            $products = $this->bigcom->call('GET', $resource);

            Data::saveConfigValue($merchant_id,'import_product_option',$select);
            if(isset($products['errors'])){
                $returnArr['error'] = $products['errors'];
                return json_encode($returnArr);
            }
            $readyCount = 0;
            $notSku = 0;
            $notType = 0;
            $sameskucount = 0;
            if($products){
                foreach ($products['data'] as $prod){
                    $noSkuFlag = 0;
                    if(trim($prod['categories'][0])==''){
                        $notType ++;
                        continue;
                    }
                    $value = $prod;
                    foreach($value['variants'] as $key => $variant) {
                        if(empty($sameSkuArray)){
                            $skuKey = Data::getKey($variant['sku']);
                            $sameSkuArray[$skuKey]='1';
                        }
                        else{
                            if(isset($sameSkuArray[$variant['sku']])){
                                if($create_custom=='false'){
                                    $noSkuFlag = 1;
                                    $sameskucount ++;
                                    break;
                                }
                               else{
                                $value['variants'][$key]['sku']=Data::getCustomsku($variant['id']);
                                if($custom_sku=='true'){
                                    self::CreateSkuOnShopify($variant['id']);
                                }
                               }
                            }
                            else
                            {
                                $skuKey = Data::getKey($variant['sku']);
                                $sameSkuArray[$skuKey]='1';
                            }
                        }
                    }
                    if(!$noSkuFlag)
                    {
                        $readyCount ++;
                        Jetproductinfo::saveNewRecords($value, $merchant_id, $connection,$select,$this->bigcom);
                    }
                    
                }
            }
        }
        catch (Exception $e){
            return $returnArr['error'] = $e->getMessage();
        }
        
        $returnArr['success']['count'] = $readyCount;
        $returnArr['success']['not_sku'] = $notSku;
        $returnArr['success']['not_type'] = $notType;
        $returnArr['success']['sameskucount'] = $sameskucount;
        if(count($sameSkuArray)>0){
            $session[$merchant_id.'batchsamesku']=$sameSkuArray;
        }
        $connection->close();
        return json_encode($returnArr);
    }

    public function actionCustomImport()
    {
        $productIds = Yii::$app->request->post('product_ids',false);
        $page = Yii::$app->request->post('page', false);
        if($productIds && $page!==false)
        {
            try
            {
                $merchant_id = Yii::$app->user->identity->id;
                $connection = false;
                $max = self::MAX_CUSTOM_PRODUCT_IMPORT_PER_REQUEST;
                $ids = array_chunk($productIds, $max);

                $readyCount = 0;
                $notSku = 0;
                $notType = 0;
                //foreach ($ids as $id) 
                if(isset($ids[$page]))
                {
                    $id =  $ids[$page];
                    foreach ($id as $val) 
                    {
                        # code...
                        //$product_ids = implode(',', $id);
                        $prod = $this->bigcom->call('GET', 'catalog/products/'.$val.'?include_fields=name,is_visible,description,sale_price,price,sku,upc,categories,inventory_level,brand_id&include=variants,images');
                        if(isset($prod['errors'])){
                            $returnArr['error'] = $prod['errors'];
                            return json_encode($returnArr);
                        }
                        if(isset($prod['data']) && count($prod['data'])>0)
                        {
                            $readyCount ++;
                            //return not sku count and product type
                            Jetproductinfo::saveNewRecords($prod['data'], $merchant_id, $connection,false,$this->bigcom);
                        }
                    }
                }
            }
            catch (Exception $e){
                return $returnArr['error'] = $e->getMessage();
            }
            $returnArr['success']['count'] = $readyCount;
            $returnArr['success']['not_sku'] = $notSku;
            $returnArr['success']['not_type'] = $notType;
            
            return json_encode($returnArr);
        }
        else
        {
            return json_encode(['error'=>'No product selected for import.']);
        }
    }
     /**
     * unlink file 
     * @return boolean
     */
    public function actionFileexist()
    {
        $merchant_id=Yii::$app->user->identity->id;
        $session = Yii::$app->session;
        if(isset($session[$merchant_id.'samesku'])){
            unset($session[$merchant_id.'samesku']);
        }
        if(isset($session[$merchant_id.'batchsamesku'])){
            unset($session[$merchant_id.'batchsamesku']);
        }
        if (file_exists(\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id.'/samesku.txt')) {
                    $files = glob(\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id.'/*'); // get all file names
                    foreach($files as $file){ // iterate files
                      if(is_file($file))
                        unlink($file); // delete file
                    }
                }
        return false;

    }
    /**
     * get importproduct.txt file content
     * @return string data
    */
    public function actionGetfilecontent()
    {
         $merchant_id=Yii::$app->user->identity->id;
        if (file_exists(\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id.'/samesku.txt')) {
            return file_get_contents(\Yii::getAlias('@webroot').'/var/importproduct/'.$merchant_id.'/samesku.txt');
        }
        return false;

    }
}
