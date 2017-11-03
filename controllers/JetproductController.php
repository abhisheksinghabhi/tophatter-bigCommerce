<?php

namespace frontend\controllers;

use Yii;
use app\models\JetProduct;
use app\models\JetProductVariants;
use frontend\models\JetProductSearch;
use app\models\ProductVariantUpload;
use app\models\JetAttributes;
use app\models\JetAttributeValue;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\components\BigcommerceClientHelper;
use frontend\components\BigcommerceApiCallLimitParam;
use common\models\User;
use frontend\components\Bigcommerceinfo;
use app\models\JetConfiguration;
use app\models\JetFileinfo;
use app\models\JetCategoryMap;
use app\models\InsertProduct;
use app\models\JetCategory;
use frontend\models\JetConfig;
use frontend\components\Jetapi;
use frontend\components\Jetapimerchant;
use frontend\components\Jetappdetails;
use frontend\components\Jetproductinfo;
use frontend\components\Bigcomapi;
use frontend\components\Data;
/**
 * JetproductController implements the CRUD actions for JetProduct model.
 */
class JetproductController extends JetmainController
{
 public $enableCsrfValidation = false;
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

     public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        else
        {
            if(!isset($connection))
            $connection=Yii::$app->getDb();
            $merchant_id=Yii::$app->user->identity->id;
            $modelU="";
            $productPopup=0;
            $UpdateRows=array();
            $countUpdate=0;
            $queryObj="";
            $queryObj = $connection->createCommand("SELECT `id` FROM `insert_product` WHERE merchant_id='".$merchant_id."'");
            $modelU = $queryObj->queryOne();

            $UpdateRows = $connection->createCommand("SELECT `product_id` FROM `jet_product_tmp` WHERE merchant_id='".$merchant_id."'")->queryAll();
            if(is_array($UpdateRows) && count($UpdateRows)>0){
                $countUpdate=count($UpdateRows);
            }
            //$modelU=InsertProduct::find()->where(['merchant_id'=>$merchant_id])->one();
            if(!$modelU){
                $countUpload=0;
                $merchant_id= \Yii::$app->user->identity->id;
                
                $shopname = \Yii::$app->user->identity->username;
                
                $session = Yii::$app->session;
                $session->open();
                
                
                //$countUpload=$sc->call('GET', 'https://www.mygreenoutdoors.com/api/v2/products/count.json', array('published_status'=>'published'));
                $count = $connection->createCommand("SELECT count(*) as 'count' FROM `jet_product` where merchant_id='".$merchant_id."'");
                $count = $count->queryOne();
                $bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);
                $resource='catalog/products';
                $countUpload=$bigcom->get($resource);
                
                
                $countUpload=$countUpload['meta']['pagination']['total'];
                if($count['count']<=0)
                {    
                    $countUpload=$countUpload;
                }
                else{
                    $countUpload=$countUpload-$count['count'];
                }

                $productPopup=1;
            }
      
            $searchModel = new JetProductSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $setCustomPrice=array();
            $setCustomPrice=Data::sqlRecords('SELECT `data`,`value` from `jet_config` where merchant_id="'.$merchant_id.'" AND data="set_price_amount"  ','one','select');
            
            $newCustomPrice='';
            if (is_array($setCustomPrice) && isset($setCustomPrice['value']))
            {
                $newCustomPrice=$setCustomPrice['value'];
            }

           
            $updatePriceType="";
            $updatePriceValue=0;

             if($newCustomPrice !='')
            {
                $customPricearr=array();
                $customPricearr = explode('-',$newCustomPrice);
                $updatePriceType = $customPricearr[0];
                $updatePriceValue = $customPricearr[1];
                unset($customPricearr);
            }

            $showDynamicPrice = Data::sqlRecords("SELECT `value`  FROM `jet_config` WHERE `merchant_id` ='{$merchant_id}'  AND `data` LIKE 'dynamic_repricing'",'one','select');

            if (!empty($showDynamicPrice) && isset($showDynamicPrice['value'])) 
            {
                $priceDynamic = $showDynamicPrice['value'];    
            }

            $setnumber_of_product_per_page=array();
            $setnumber_of_product_per_page=Data::sqlRecords("SELECT `value`  FROM `jet_config` WHERE `merchant_id` ='{$merchant_id}'  AND `data` LIKE 'set_product_number'",'one','select');
            if (is_array($setnumber_of_product_per_page) && isset($setnumber_of_product_per_page['value']))
            {
                $number_of_product_per_page=$setnumber_of_product_per_page['value'];
            }
            
            if($number_of_product_per_page)
            {
                //echo $number_of_product_per_page;die;
                $dataProvider->pagination->pageSize=$number_of_product_per_page;           
            }
            unset($number_of_product_per_page);          
            


//check product status available for purchase
            $query="SELECT COUNT(*) id FROM `jet_product` WHERE merchant_id='".MERCHANT_ID."' and status='Available for Purchase'";
            $avail_for_sale=false;
            $afpCollection=Data::sqlRecords($query,'all','select');
            if(isset($afpCollection[0]['id']) && $afpCollection[0]['id']){
                $avail_for_sale=true;
            }

            if($productPopup)
            {
                return $this->render('index', [
                    'productPopup'=>$productPopup,
                    'countUpload'=>$countUpload,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'countUpdate' => $countUpdate,
                    'updatePriceType'=>$updatePriceType,
                    'updatePriceValue'=>$updatePriceValue,
                ]);
            }else{
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'countUpdate' => $countUpdate,
                    'updatePriceType'=>$updatePriceType,
                    'updatePriceValue'=>$updatePriceValue,
                    'popup'=>$ispopup,
                    'skudata'=> $skuData,
                    'producttypedata'=>$producttypeData,
                    'priceDynamic'=>$priceDynamic,
                    'avail_for_sale'=>$avail_for_sale
                ]);
            }
        }
    }
    
     public function actionBulk()
    {
        $action=Yii::$app->request->post('action');
      
        $selection=(array)Yii::$app->request->post('selection');

        if(count($selection)==0){
            Yii::$app->session->setFlash('error', "No Product selected...");
            return $this->redirect(['index']);
        }

        $connection = Yii::$app->getDb();
        $merchant_id = Yii::$app->user->identity->id;
        $jetConfig="";
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `fullfilment_node_id`,`api_user`,`api_password` FROM `jet_configuration` WHERE merchant_id='".$merchant_id."'");
        $jetConfig = $queryObj->queryOne();
        $jetConfigarray=array();
        if($jetConfig){
            $jetConfigarray=array(
                    'fulfillment_node_id'=>$jetConfig['fullfilment_node_id'],
                    'api_host'=>"https://merchant-api.jet.com/api",
                    'api_user'=>$jetConfig['api_user'],
                    'api_password'=>$jetConfig['api_password']
            );
             
        }else{
            Yii::$app->session->setFlash('error', "Please fill the jet configurable before enable all api's");
            return $this->redirect(Yii::$app->getUrlManager()->getBaseUrl().'/jetconfiguration/index',302);
        }
        unset($jetConfig);
       
        if($action=='batch-upload'){
            $session ="";
            $session = Yii::$app->session;
            if(!is_object($session)){
                Yii::$app->session->setFlash('error', "Can't initialize Session.Product(s) upload cancelled.");
                return $this->redirect(['index']);
            }
            $session->set('productforbatchupload', $selection);
            $session->set('jetconfig', serialize($jetConfigarray));
            $session->set('merchant_id',$merchant_id);

            // Custom Price Upload on Jet
            $newCustomPrice='';
            $setCustomPrice=array();
            $setCustomPrice=$connection->createCommand('SELECT `data`,`value` from `jet_config` where merchant_id="'.$merchant_id.'" AND data="set_price_amount"  ')->queryOne();
        
            if (is_array($setCustomPrice) && isset($setCustomPrice['value']))
            {
                $newCustomPrice=$setCustomPrice['value'];
            }
            
            $updatePriceType="";
            $updatePriceValue=0;
            if($newCustomPrice)
            {
                $customPricearr=array();
                $customPricearr = explode('-',$newCustomPrice);
                $updatePriceType = $customPricearr[0];
                $updatePriceValue = $customPricearr[1];             
            }
            unset($customPricearr);           
            unset($newCustomPrice);
            
            $session->set('priceType', serialize($updatePriceType));
            $session->set('priceValue', serialize($updatePriceValue));
             
            // (End)Custom Price Upload on Jet
            
            $session->close();

            //unset($selection);
            //unset($jetConfigarray);
            return $this->render('batchupload', [
                    'totalcount' => count($selection),
            ]);
        }
        else if($action=='archieved-batch'){
           
            $productAll ="";
            $queryObj="";
            $query="SELECT `id`,`sku`,`status` FROM `jet_product` WHERE id IN(".implode(',',$selection).")";
            $queryObj = $connection->createCommand($query);
            $productAll = $queryObj->queryAll();
            $session ="";
            $session = Yii::$app->session;
            if(!is_object($session)){
                Yii::$app->session->setFlash('error', "Can't initialize Session.Product(s) unarchive cancelled.");
                return $this->redirect(['index']);
            }
            $session->set('productAll', serialize($productAll));
            $session->set('jetconfig', serialize($jetConfigarray));
            $session->close();
            unset($productAll);
            unset($jetConfigarray);
            
            return $this->render('batcharchieved', [
                    'totalcount' => count($selection),
                ]);
        }
        
        else if($action=='batch-update'){
        	 
        	$productAll ="";
        	$queryObj="";
        	$query="SELECT `id`,`sku`,`status` FROM `jet_product` WHERE id IN(".implode(',',$selection).")";
        	$queryObj = $connection->createCommand($query);
        	$productAll = $queryObj->queryAll();
        	$session ="";
        	$session = Yii::$app->session;
        	if(!is_object($session)){
        		Yii::$app->session->setFlash('error', "Can't initialize Session.Product(s) unarchive cancelled.");
        		return $this->redirect(['index']);
        	}
        	$session->set('updateproductAll', serialize($productAll));
        	$session->set('jetconfig', serialize($jetConfigarray));
        	$session->close();
        	unset($productAll);
        	unset($jetConfigarray);
        
        	return $this->render('batchupdate', [
        			'totalcount' => count($selection),
        			]);
        }

        else {
            $productAll ="";
            $queryObj="";
            $query="SELECT `id`,`sku`,`status`,`qty` FROM `jet_product` WHERE id IN(".implode(',',$selection).")";
            $queryObj = $connection->createCommand($query);
            $productAll = $queryObj->queryAll();
            $session ="";
            $session = Yii::$app->session;
            if(!is_object($session)){
                Yii::$app->session->setFlash('error', "Can't initialize Session.Product(s) unarchive cancelled.");
                return $this->redirect(['index']);
            }
            $session->set('productAll', serialize($productAll));
            $session->set('jetconfig', serialize($jetConfigarray));
            $session->close();
            unset($productAll);
            unset($jetConfigarray);
            return $this->render('batchunarchieved', [
                    'totalcount' => count($selection),
                ]);
        }
    }

	public function actionImageupload($pid){
	
		//die("ghggfh");
	    $SKU_Image_Array=array();
	    $merchant_id = Yii::$app->user->identity->id;
	    $connection=Yii::$app->getDb();
	    $queryObj = $connection->createCommand("SELECT `fullfilment_node_id`,`api_user`,`api_password` FROM `jet_configuration` WHERE merchant_id='".$merchant_id."'");
        $jetConfig = $queryObj->queryOne();
        if($jetConfig){
        	$fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
            $api_host="https://merchant-api.jet.com/api";
            $api_user=$jetConfig['api_user'];
            $api_password=$jetConfig['api_password'];
        }
	    $jetHelper = new Jetapi($api_host,$api_user,$api_password);
	    
	    $queryObj = $connection->createCommand("SELECT `id`,`bigproduct_id`,`title`,`sku`,`parent_category`,`jet_variant_images` FROM `jet_product` WHERE id='".$pid."' and merchant_id='".$merchant_id."'");
	    $product = (object)$queryObj->queryOne();
	    
	    
	    //echo $product->sku;
	    
	    $images=array();
	    $images[]=$product->image;
	    
	    if($product->parent_category && $product->jet_variant_images== NULL){
	    	$swatch_image=explode(',',$product->parent_category);
	    }
	    else{
	    	$swatch_image=explode(',',$product->jet_variant_images);
	    }
	    
	    // $swatch_image=$product->jet_variant_images;
	    //$swatch_image=explode(',',$swatch_image);
	    //print_r($swatch_image);
	    foreach ($swatch_image as $s_image){
	    	$images[]=$s_image;
	    }
	    //print_r($images);die("fghgfh");
	    
	    foreach($images as $key=>$value){
	    	if($value=="")
	    		continue;
	    	if(Jetproductinfo::checkRemoteFile($value)==true){
	    		$kmain=$key;
	    		$SKU_Array['main_image_url']=$value;
	    		break;
	    	}
	    }
	    if(count($images)>1)
	    {
	    	$i=1;
	    	foreach($images as $key=>$value)
	    	{
	    		if($key==$kmain)
	    			continue;
	    		if($i>8)
	    			break;
	    		if($value!='' && Jetproductinfo::checkRemoteFile($value)==true){
	    			$SKU_Array['alternate_images'][]= array(
	    					'image_slot_id'=>(int)$i,
	    					'image_url'=> $value
	    			);
	    			$i++;
	    		}
	    	}
	    }
	    
	    //print_r($SKU_Array);die("Ghg");
	    unset($images);
	    
	    
	   $response = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($product->sku).'/image',json_encode($SKU_Array));
	        
	   return $response;
	     
	}
	public function actionPriceupload(){
		$SKU_Price_Array=array();
		$merchant_id = Yii::$app->user->identity->id;
		$connection=Yii::$app->getDb();
		$queryObj = $connection->createCommand("SELECT `fullfilment_node_id`,`api_user`,`api_password` FROM `jet_configuration` WHERE merchant_id='".$merchant_id."'");
		$jetConfig = $queryObj->queryOne();
		if($jetConfig){
			$fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
			$api_host="https://merchant-api.jet.com/api";
			$api_user=$jetConfig['api_user'];
			$api_password=$jetConfig['api_password'];
		}
		$jetHelper = new Jetapi($api_host,$api_user,$api_password);
		// and sku BETWEEN 37760 AND 58214
		$query="SELECT * FROM `jet_product` WHERE merchant_id='".$merchant_id."' and id between 1 and 10500";
		$queryObj = $connection->createCommand($query);
		$resultdata = $queryObj->queryAll();
		foreach ($resultdata as $key => $value) {
			$sku= $value['sku'];
			$price=$value['price'];
			$price=(float)$price+($price*(11/100));
			$SKU_Price_Array['price']=(float)$price;
                        $node['fulfillment_node_id']=$fullfillmentnodeid;
		        $node['fulfillment_node_price']=(float)$price;
		         
                        $SKU_Price_Array['fulfillment_nodes']=$node; //price
			$updateQuery="UPDATE `jet_product` SET `update_price`='".$price."' WHERE merchant_id='".$merchant_id."' and sku='".$sku."'";
			$updated = $connection->createCommand($updateQuery)->execute();

			//$response=$jetHelper->CPutRequest('merchant-skus/10157/price',json_encode($SKU_Price_Array));
			$response = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/price',json_encode($SKU_Price_Array));
			unset($price);
			unset($SKU_Price_Array);
			//$responseArray=json_decode($response,true);
		}
	}
	
    /**SYNC INVENTORY */
	public function actionSyncbigcomproduct()
	{
		$session = $connection = "";
        $session = Yii::$app->session;
        
        $merchant_id = MERCHANT_ID;
        $countProducts = $pages = 0;
        $bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);

        $resource='catalog/products?include=variants,images&limit=100';
        $countUpload=$bigcom->get($resource);
        
        $countProducts=$countUpload['meta']['pagination']['total'];
        $pages=$countUpload['meta']['pagination']['total_pages'];
        
        if(!is_object($session)){
            Yii::$app->session->setFlash('error', "Can't initialize Session.Product(s) upload cancelled.");
            return $this->redirect(['index']);
        }

        if(API_USER)
        {
            $fullfillmentnodeid=FULLFILMENT_NODE_ID;            
            $jetHelper = new Jetapimerchant(API_HOST,API_USER,API_PASSWORD);
            $responseToken ="";
            $responseToken = $jetHelper->JrequestTokenCurl();
            if($responseToken==false){
                Yii::$app->session->setFlash('error', "Jet Api is not working properly, please try again later");
                return $this->redirect(['index']);
            }
        }
        $configSetting = Jetproductinfo::getConfigSettings($merchant_id, $connection);
        $session->set('product_page',$pages);
        $session->set('configSetting',$configSetting);
        $session->set('bigcom_object', serialize($sc));
        $session->set('jetHelper',serialize($jetHelper));
        
        return $this->render('syncprod', [
                'totalcount' => $countProducts,
                'pages'=>$pages
        ]);
        
	}

    public function actionBigcomprodsync()
    {
        $connection = "";
        $session = Yii::$app->session;
        $index=Yii::$app->request->post('index');
        $countUpload=Yii::$app->request->post('count');
        $returnArr = $products = array();
        $jProduct=0;
        try
        {
            $pages=0; 
            $bigcom = $merchant_id = $jetHelper = $fullfillmentnodeid = "";
            $pages=$session->get('product_page');
            $bigcom=unserialize($session->get('bigcom_object'));            
            $configSetting=$session->get('configSetting');
            $fullfillmentnodeid= FULLFILMENT_NODE_ID;
            $jetHelper=unserialize($session->get('jetHelper'));
                        
            $merchant_id=MERCHANT_ID;
           
            $dir = Yii::getAlias('@webroot').'/var/product/inventorysync/'.$merchant_id.'/'.date('d-m-Y');
            if(!file_exists($dir))
            {
                mkdir($dir,0775, true);
            }
            $base_path=$dir.'/'.time().'.log';
            $file = fopen($base_path,"a+");
            
            if(!is_object($bigcom)){
                $bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);
            }
            // Get all products
            $limit=250;
            $resource='catalog/products?include=variants,images&limit=100';
            $products= $bigcom->get($resource); 
            
            if($products && is_array($products))
            {
                foreach ($products['data'] as $value)
                {
                    $jProduct++;
                    $weight = $product_qty = 0;
                    $unit = $product_sku = $response = "";
                    $product_id=$value['id'];
                    $productsaleprice = Data::sqlRecords("SELECT `data`,`value` FROM `jet_config` WHERE merchant_id='".$merchant_id."'","one","select");
                    
                    if($productsaleprice['value']=='Yes')
                    {
                        $product_price=$value['sale_price'];               
                    }
                    else{
                        $product_price=$value['price']; 
                    }                    
                    $barcode=$value['upc'];
                    $product_sku=$value['sku'];
                    if($product_sku=="")
                    {
                        continue;
                    }
                    $product_qty=$value['inventory_level'];

                    if(isset($value['images']))
                    $images = $value['images'];
                    $product_primary_images=$value['images'];
                    
                    if(count($product_primary_images)>0){
                    
                        foreach ($product_primary_images as $key => $image) {
                    
                            if($image['is_thumbnail']==1){
                                $product_images=$image['url_zoom'];
                            }
                        }
                    }

                    if(count($value['variants'])>1)
                    {
                        foreach($value['variants'] as $value1)
                        {
                            $result = $optionmodel = $model_prod = array();
                            fwrite($file,PHP_EOL." VARIANT PRODUCTS SYNC ".PHP_EOL);
                            $option_id=$value1['id'];
                            $option_sku=$value1['sku'];
                            $option_price = 0;
                            $option_price = (float)$value1['price'];

                            if(!$option_price){
                                $option_price=$value1['calculated_price'];
                            }
                            $option_qty=$value1['inventory_level'];
                            $option_barcode=$value1['upc'];
                            $option_image_url='';
                            $option_image_url = "";
                             foreach ($images as $value2){
                                if(isset($value['image_url']) && $value2['url_standard'] == $value['image_url']){
                                    $option_image_url=$value2['url_standard'];
                                }
                             }

                            $result = Data::sqlRecords("SELECT `option_id`,`product_id`,`option_sku`  FROM `jet_product_variants` WHERE option_id='".$option_id."' and merchant_id='".$merchant_id."'","one","select");
                            if(!empty($result))
                            {
                                if(!isset($configSetting['fixed_price']) || (isset($configSetting['fixed_price']) && $configSetting['fixed_price']=='no')) 
                                { 
                                    $sql="UPDATE `jet_product_variants` SET `option_qty`='".$option_qty."',`option_price`='".$option_price."',`option_unique_id`='".addslashes($option_barcode)."',`option_image`='".addslashes($option_image_url)."' WHERE `option_id`='".$result['option_id']."' AND `merchant_id`='".$merchant_id."' ";
                                }else{
                                    $sql="UPDATE `jet_product_variants` SET `option_qty`='".$option_qty."',`option_unique_id`='".addslashes($option_barcode)."',`option_image`='".addslashes($option_image_url)."' WHERE `option_id`='".$result['option_id']."' AND `merchant_id`='".$merchant_id."' ";
                                }   
                                Data::sqlRecords($sql,null,"update");
                                
                                $get_sql="SELECT `bigproduct_id`,`sku` FROM `jet_product`  WHERE `bigproduct_id`='".$result['product_id']."' AND `merchant_id`='".$merchant_id."' AND `status`!='Not Uploaded' ";
                                $model_prod = Data::sqlRecords($get_sql,"one","select");
                                if (!empty($model_prod))
                                {                                    
                                    $response = Jetproductinfo::updateQtyOnJet($result['option_sku'],$option_qty,$jetHelper,$fullfillmentnodeid,$merchant_id);  
                                    fwrite($file,PHP_EOL." UPDATEING QYANTITY ON JET FOR VARIANT SKU => ".$result['option_sku'].PHP_EOL."RESPONSE FROM JET => ".$response.PHP_EOL);
                                    if(!isset($configSetting['fixed_price']) || (isset($configSetting['fixed_price']) && $configSetting['fixed_price']=='no')) 
                                    {
                                        fwrite($file,PHP_EOL." UPDATE PRICE ON JET FOR VARIANT SKU => ".$result['option_sku'].PHP_EOL);
                                        $price = Jetproductinfo::getPriceToBeUpdatedOnJet($merchant_id, $option_price, $configSetting, $connection);
                                        Jetproductinfo::updatePriceOnJet($result['option_sku'],$price,$jetHelper,$fullfillmentnodeid,$merchant_id);
                                    }                               
                                }
                                unset($sql);unset($model);unset($get_sql);unset($model_prod);
                            }
                        }                        
                    }

                    $result=array();
                    $result = Data::sqlRecords("SELECT `bigproduct_id`,`sku` FROM `jet_product` WHERE bigproduct_id='".$product_id."' AND merchant_id='".$merchant_id."'","one","select");
                    if(!empty($result))
                    {            
                        if(!isset($configSetting['fixed_price']) || (isset($configSetting['fixed_price']) && $configSetting['fixed_price']=='no')) 
                        {
                            $sql="UPDATE `jet_product` SET `qty`='".$product_qty."',price='".$product_price."',`upc`='".addslashes($barcode)."',`image`='".addslashes($product_images)."' WHERE `bigproduct_id`='".$product_id."' AND `merchant_id`='".$merchant_id."' ";                             
                        }else{
                            $sql="UPDATE `jet_product` SET `qty`='".$product_qty."',`upc`='".addslashes($barcode)."' ,`image`='".addslashes($product_images)."'WHERE `bigproduct_id`='".$product_id."' AND `merchant_id`='".$merchant_id."' ";
                        }
                        Data::sqlRecords($sql,null,"update");
                        
                        $get_sql="SELECT `bigproduct_id`,`sku` FROM `jet_product`  WHERE `bigproduct_id`='".$result['bigproduct_id']."' AND `merchant_id`='".$merchant_id."' AND `status`!='Not Uploaded' ";
                        $model_prod = Data::sqlRecords($get_sql,"one","select");
                        if (!empty($model_prod))
                        {        
                            fwrite($file,PHP_EOL." UPDATEING QYANTITY ON JET FOR SIMPLE SKU => ".$model_prod['sku'].PHP_EOL);                       
                            $response = Jetproductinfo::updateQtyOnJet($model_prod['sku'],$product_qty,$jetHelper,$fullfillmentnodeid,$merchant_id);
                            fwrite($file,PHP_EOL." UPDATEING QYANTITY ON JET FOR SIMPLE SKU => ".$model_prod['sku'].PHP_EOL."RESPONSE FROM JET => ".$response.PHP_EOL);
                            if(!isset($configSetting['fixed_price']) || (isset($configSetting['fixed_price']) && $configSetting['fixed_price']=='no')) 
                            {
                                $price = Jetproductinfo::getPriceToBeUpdatedOnJet($merchant_id, $product_price, $configSetting, $connection);
                                Jetproductinfo::updatePriceOnJet($model_prod['sku'],$price,$jetHelper,$fullfillmentnodeid,$merchant_id);
                            }                                                                   
                        }                                                           
                        unset($sql);unset($model);unset($get_sql);unset($model_prod);
                    }                    
                }
            }
        }        
        catch (Exception $e)
        {
            fwrite($file,PHP_EOL." Exception => ".json_encode($e->getMessage()).PHP_EOL);                       
            return $returnArr['error']=$e->getMessage();
        }
        $returnArr['success']['count']=$jProduct;
        fclose($file);        
        return json_encode($returnArr);            
    }


	/*public function actionBigcomprodsync(){
        $connection = "";
        $session = Yii::$app->session;
        $index=Yii::$app->request->post('index');
        $countUpload=Yii::$app->request->post('count');
        $returnArr = $products = array();
        $jProduct=0;
	 
        try
        {
            $merchant_id=\Yii::$app->user->identity->id;
            Yii::$app->session->setFlash ( 'contactFormSubmitted' );
            $merchant_id=$shopname = \Yii::$app->user->identity->id;
            $shopname = \Yii::$app->user->identity->username;
            $token = \Yii::$app->user->identity->auth_key;
            $session = Yii::$app->session;
            $session->open();
             
            $store_hash = \Yii::$app->user->identity->store_hash;
            $bigcommercemodel=Bigcommerceinfo::getShipifyinfo();
           	$client_id = $bigcommercemodel[0]['client_id'];
            $bigcom = new BigcommerceClientHelper($client_id,$token,$store_hash);
            if($index==0){
             		$resource='catalog/products?include=variants,images&limit=50';
            }
            else{
                 $resource='catalog/products?include=variants,images&limit=50&page='.$index.'';
             	
            }
             
            $pages="";$sc="";$merchant_id="";
            $session ="";
            $session = Yii::$app->session;
            if(!isset($connection)){
                $connection=Yii::$app->getDb();
            }
            $pages=$session->get('product_page');
            $sc=unserialize($session->get('bigcom_object'));
            $merchant_id=$session->get('merchant_id');
            $configSetting=$session->get('configSetting');
            $fullfillmentnodeid=unserialize($session->get('fullfillmentnodeid'));
            $jetHelper=unserialize($session->get('jetHelper'));
            if(!$merchant_id){
                $merchant_id=Yii::$app->user->identity->id;
                $shopname=Yii::$app->user->identity->username;
                $token=Yii::$app->user->identity->auth_key;
            }
            
            if($index==0)
            {
                $jProductTotal=0;
                $not_skuTotal=0;
            }
               
            $product= $bigcom->get($resource); 

            //print_r($product);die;
            $count=0;
            $product_qty=0;
            $attr_id="";
            $attributes_val="";
            $brand="";
            $product_sku="";
            $product_type="";
            $jProduct=0;
            $not_sku=0;
            $jProductTotal="";
            $not_skuTotal="";
            if($product['data'])
            {
                foreach ($product['data'] as $value) 
                {
                    $brand_id=$value['brand_id'];
                 	$brand='/brands/'.$brand_id;
                 	$bigproduct_id=$value['id'];
                 	$product_title=$value['name'];
                 	$product_sku=$value['sku'];
	                
                    /** BRAND NAME */
                   /* $brand=$bigcom->getData($brand);
                    
                    $brandname='';
                    if(array_key_exists('name',$brand))
                    {
                        $brandname=$brand['name'];
                    }    
                 	
                    
                    $option=$bigcom->get('catalog/products/'.$bigproduct_id.'/options');
        
                    $variants=$value['option_set_id'];
                    
                    $product_primary_images=$value['images'];
                    
                    if(count($product_primary_images)>0){
                    
                    	foreach ($product_primary_images as $key => $image) {
                    
                    		if($image['is_thumbnail']==1){
                    			$product_images=$image['url_zoom'];
                    		}
                    	}
                    }
                                
                    $product_price=$value['price'];
                    $product_des=$value['description'];
                    $product_qty=$value['inventory_level'];
                    $product_weight=$value['weight'];
                    $mpn=$value['bin_picking_number'];

                    $jProduct++;
                    $variantProduct=$value['variants'];
                    
                    /**sales price*/
                 /*    $productsaleprice=$connection->createCommand('SELECT `data`,`value` from `jet_config` where merchant_id="'.$merchant_id.'" AND data="sale_price"  ')->queryOne();
                      if($productsaleprice['value']=='yes'){
                    $product_price=$value['sale_price'];
                      }
                    
                    
                    
                    if(count($value['variants'])>0){
                    
                    	$optionValues=$variantProduct[0]['option_values'];
                    	foreach ($optionValues as $option){
                    		$id=$option['option_id'];
                    		$display_name=$option['option_display_name'];
                    		$arr1[]=array($id=>$display_name);
                    
                    	}
                    
                    	if(isset($arr1)){
                    		foreach ($arr1 as $array) {
                    			foreach ($array as $key => $opvalue) {
                    				$a1[$key]=$opvalue;
                    			}
                    		}
                    	}
                    	else{
                    		$a1='';
                    	}
                    	$array_opt=$a1;
                    
                    	unset($a1);
                    	unset($arr1);
                    }
                    
                    $product_sku=$value['variants'][0]['sku'];
                   
                    if(count($value['variants'])>1){
                    	
                		foreach ($variantProduct as $variant_product){
                		
                    		$id=$variant_product['id'];
                    		$product_id=$variant_product['product_id'];
                    		$option_sku=$variant_product['sku'];
                    		$option_image_url=$variant_product['image_url'];
                    		$option_price=$variant_product['cost_price'];
                    		
                    		if(!$option_price){
                    			$option_price=$variant_product['calculated_price'];
                    		}
                    		$option_qty=$variant_product['inventory_level'];
                    		$option_barcode=$variant_product['upc'];
                    		$option_set=$variant_product['option_values'];
                    		
                    		
                    		$optionmodel = $connection->createCommand("SELECT * FROM `jet_product_variants` WHERE merchant_id='".$merchant_id."' and option_sku='".$option_sku."'");
                    		$result = $optionmodel->queryOne();
                    		if($result){
                    			$sql="UPDATE `jet_product_variants` SET `option_qty`='".$option_qty."',`option_unique_id`='".addslashes($option_barcode)."' WHERE `option_sku`='".$option_sku."' AND `merchant_id`='".$merchant_id."' ";
                    			$model = $connection->createCommand($sql)->execute();
                    			
                    			$get_sql="SELECT `id`,`sku` FROM `jet_product`  WHERE `bigproduct_id`='".$result['product_id']."' AND `merchant_id`='".$merchant_id."' AND `status`!='Not Uploaded' ";
                    			$model_prod = $connection->createCommand($get_sql)->queryOne();
                    			if ($model_prod)
                    			{
                    				Jetproductinfo::updateQtyOnJet($option_sku,$option_qty,$jetHelper,$fullfillmentnodeid,$merchant_id);
                    				if(!isset($configSetting['fixed_price']) || (isset($configSetting['fixed_price']) && $configSetting['fixed_price']=='no'))
                    				{
                    					$price = Jetproductinfo::getPriceToBeUpdatedOnJet($merchant_id, $option_price, $configSetting, $connection);
                    					Jetproductinfo::updatePriceOnJet($result['option_sku'],$price,$jetHelper,$fullfillmentnodeid,$merchant_id);
                    				} 
                    			}
                    			unset($sql);unset($model);unset($get_sql);unset($model_prod);
                    		} 		
            	        }
                    }

                    $category_id=$value['categories'][0];
                    
                    $category_name='categories/'.$category_id.'';
                    
                    $category_name= $bigcom->get1($category_name);
                     
                    $product_type=$category_name['name'];
                    
                    //echo $product_type;die;
                    $barcode=$value['upc'];
                    $asin="";
                    $upc="";
                    if(strlen(trim($barcode))==10){
                    	$asin=$barcode;
                    }
                	else if(strlen(trim($barcode))>10) {
                		$upc=$barcode;
                	}

                    $imagArr=array();
                    $variantArr=array();

                    $connection = Yii::$app->getDb();

                    $result="";$productmodel="";
                    $productmodel = $connection->createCommand("SELECT `bigproduct_id`,`sku` FROM `jet_product` WHERE bigproduct_id='".$bigproduct_id."' and sku='".$product_sku."' and merchant_id='".$merchant_id."' ");
                    $result = $productmodel->queryOne();
                    if($result)
                    {
                        $sql="UPDATE `jet_product` SET `qty`='".$product_qty."',`price`='".$product_price."',`image`='".addslashes($product_images)."',`asin`='".$asin."',`upc`='".$upc."',`brand`='".addslashes($brandname)."',`description`='".addslashes($product_des)."' WHERE `bigproduct_id`='".$bigproduct_id."' AND `merchant_id`='".$merchant_id."'and `sku`='".$product_sku."'";
            	          
                       $model = $connection->createCommand($sql)->execute();
                    
                    	$get_sql="SELECT `bigproduct_id`,`sku` FROM `jet_product`  WHERE `bigproduct_id`='".$bigproduct_id."' AND `merchant_id`='".$merchant_id."' AND `status`!='Not Uploaded' ";
                    	$model_prod = $connection->createCommand($get_sql)->queryOne();
                    	if ($model_prod)
                    	{
                    		Jetproductinfo::updateQtyOnJet($model_prod['sku'],$product_qty,$jetHelper,$fullfillmentnodeid,$merchant_id);
                    		if(!isset($configSetting['fixed_price']) || (isset($configSetting['fixed_price']) && $configSetting['fixed_price']=='no'))
                    		{
                    			$price = Jetproductinfo::getPriceToBeUpdatedOnJet($merchant_id, $product_price, $configSetting, $connection);
                    			Jetproductinfo::updatePriceOnJet($model_prod['sku'],$price,$jetHelper,$fullfillmentnodeid,$merchant_id);
                    		}
                    	}
            	       unset($sql);unset($model);unset($get_sql);unset($model_prod);
                    }                 
			         unset($array_opt);         
                }
            }
            $jProductTotal+=$jProduct;
            $not_skuTotal+=$not_sku;
                   
        }  
        catch (ShopifyApiException $e)
        {
            return $returnArr['error']=$e->getMessage();
            //return $e->getMessage();
        }
        catch (ShopifyCurlException $e)
        {
            return $returnArr['error']=$e->getMessage();
            //return $e->getMessage();
        }
        $returnArr['success']['count']=$jProduct;
        if($not_sku>0)
            $returnArr['success']['not_sku']=$not_sku;
            //$returnArr['not_sku']=$not_sku;
        return json_encode($returnArr);
        //} 
    }*/
	
    public static function priceChange($price,$priceType,$changePrice){
        $updatePrice=0;

        if($priceType=="percentageAmount"){
                $updatePrice=(float)($price+($changePrice/100)*($price));
                $updatePrice = number_format($updatePrice, 2, '.', '');
            }
            elseif($priceType=="fixedAmount"){
                $updatePrice=(float)($price + $changePrice);
                $updatePrice = number_format($updatePrice, 2, '.', '');
            }
            return $updatePrice;
    }

    public function actionStartbatchupload()
    {
        $index=Yii::$app->request->post('index');
        if($index==''){
        	$index=0;
        }
        $return_msg['success']="";
        $return_msg['error']="";
        $session = Yii::$app->session;
        $merchant_id ="";
        $fullfillmentnodeid="";
        $api_host="";
        $api_user="";
        $api_password="";
       
        $jetconfig=array();
        if(!isset($connection)){
            $connection=Yii::$app->getDb();
        }
        if(isset($sesson['merchant_id']))
            $merchant_id = $sesson['merchant_id'];
        else
        $merchant_id = Yii::$app->user->identity->id;
        $productforbatchupload=array();
        $productforbatchupload=$session->get('productforbatchupload');
        
        
        $jetconfig=unserialize($session->get('jetconfig'));

        $priceType='';$priceValue=0;
        $priceType=unserialize($session->get('priceType'));
        $priceValue=unserialize($session->get('priceValue'));


        if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        if(is_array($jetconfig) && count($jetconfig)>0 && $jetconfig['api_host']!=""){
           $queryObj = $connection->createCommand("SELECT `fullfilment_node_id`,`api_user`,`api_password` FROM `jet_configuration` WHERE merchant_id='".$merchant_id."'");
           $jetConfig = $queryObj->queryOne();
            if($jetConfig){
            	$fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
                $api_host="https://merchant-api.jet.com/api";
                $api_user=$jetConfig['api_user'];
                $api_password=$jetConfig['api_password'];
            }
        }
       
        if($api_host!=""){
            $jetConfig="";
            $queryObj="";
            $queryObj = $connection->createCommand("SELECT `fullfilment_node_id`,`api_user`,`api_password` FROM `jet_configuration` WHERE merchant_id='".$merchant_id."'");
            $jetConfig = $queryObj->queryOne();
            if($jetConfig){
                    $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
                    $api_host="https://merchant-api.jet.com/api";
                    $api_user=$jetConfig['api_user'];
                    $api_password=$jetConfig['api_password'];
            }
        }
        unset($jetconfig);
        $jetHelper = new Jetapi($api_host,$api_user,$api_password);
        $resultDes="";
        $result=array(); //mersku // basic info
        $node=array();
        $inventory=array();
        $price=array();
        $count=0;
        $message='';
        $uploadErrors=array();
        $responseOption=array();
        //$variation=array();
        //$relationship = array();
        //$uploadIds=array();
        //$uploadFinal=array();
        //$skuExist=array();
        /* ------------------upload data preparation start-----------------*/
        $SKU_Array= array();
        $unique=array();
        $variationCount=0;
        $Attribute_arr = array();
        $Attribute_array = array();
        $_uniquedata=array();
        $pid=0;

        $pid=trim($productforbatchupload[$index]);
        // if((count($productforbatchupload)-1)==$index)
        // {
        //     $session->remove('productforbatchupload');
        //     $session->remove('jetconfig');
        // }
        //$product = JetProduct::findOne((int)$pid);
        $product="";
        $queryObj="";

        $queryObj = $queryObj = $connection->createCommand("SELECT `id`,`bigproduct_id`,`title`,`sku`,`type`,`product_type`,`image`,`qty`,`weight`,`price`,`vendor`,`description`,`jet_browse_node`,`additional_info`,`update_price`,`jet_attributes`,`ASIN`,`upc`,`brand`,`jet_variant_images`,`parent_category` FROM `jet_product` WHERE id='".$pid."' and merchant_id='".$merchant_id."' LIMIT 0,1");
        $product = (object)$queryObj->queryOne();
        $not_exists_flag=false;
        //if category has no attributes---start
        $errordisplay="";
        $fullfillment_node_id=$product->jet_browse_node;
       // $not_exists_flag=Jetproductinfo::checkCategoryAttributeNotExists($product->fulfillment_node,$merchant_id);
        $not_exists_flag=Jetproductinfo::checkCategoryAttributeNotExists($fullfillment_node_id,$merchant_id);
        
        $carray=array();
        $carray=Jetproductinfo::checkBeforeDataPrepare($product,$merchant_id,$connection);

        if(!$carray['success'])
        {
            if($carray['error'] && is_array($carray['error']))
            {
                $uploadErrors=array();
                $isCkeckUpc=false;
               
                foreach($carray['error'] as $ckey=>$cvalue)
                {
                    if(is_array($cvalue)){
                        foreach($cvalue as $ck=>$cv){
                            $uploadErrors[$ckey][]=$cv;
                        }
                    }else{
                        $uploadErrors[$ckey][]=$cvalue;
                        //$errordisplay.=$cvalue.'<br>';
                        if($ckey=="brand_error")
                            $errordisplay.=$cvalue."<br>";
                        if($ckey=="node_id_error")
                            $errordisplay.=$cvalue."<br>";
                        if($ckey=="image_error")
                            $errordisplay.=$cvalue."<br>";
                        if($ckey=="sku_error")
                            $errordisplay.=$cvalue."<br>";
                        if($ckey=="upc")
                        {   
                            $isCkeckUpc=true;
                            $errordisplay.=$cvalue."<br>";
                            $errormsg="Invalid UPC Code";
                        }
                        if($ckey=="price_error")
                            $errordisplay.=$cvalue."<br>";
                        if($ckey=="qty_error")
                            $errordisplay.=$cvalue."<br>";
                        /* if($ckey=="upc_error_info")
                         $errordisplay.=$cvalue."<br>"; */
                        if($ckey=="mpn_error")
                            $errordisplay.=$cvalue."<br>";
                        if($ckey=="asin_error_info" && $isCkeckUpc==false)
                            $errordisplay.=$cvalue."<br>";
                    } 
                }

                //print_R($uploadErrors);die;
               
                if(count($uploadErrors)>0)
                {
                    $message.="<b>There are following information that are incomplete/wrong for given product(s):</b><ul>";
                    if(isset($uploadErrors['price']) && count($uploadErrors['price'])>0){
                        
                        $message.="<li><span class='required_label'>Wrong Price</span>
                                        <ul>
                                            <li>".implode(', ',$uploadErrors['price'])."</li>
                                        </ul>
                                    </li>";
                    }   
                    if(isset($uploadErrors['qty']) && count($uploadErrors['qty'])>0)
                    {
                        $message.="<li><span class='required_label'>Wrong Quantity : Quantity must be greater than 0</span>
                                        <ul>
                                            <li><span class='required_values'>".implode(', ',$uploadErrors['qty'])."</span></li>
                                        </ul>
                                  </li>";
                    }   
                    if(isset($uploadErrors['upc']) && count($uploadErrors['upc'])>0)
                    {   
                        $message.="<li><span class='required_label'>Product must require Unique Code either Barcode(UPC,GTIN-14,ISBN-10,ISBN-13) Or ASIN.Barcode or ASIN must be unique for each product and their variants.</span>
                                        <ul>
                                            <li><span class='required_values'>".implode(', ',$uploadErrors['upc'])."</span></li>
                                        </ul>
                                    </li>";
                    }
                    if(isset($uploadErrors['mpn']) && count($uploadErrors['mpn'])>0)
                    {   
                        $message.="<li><span class='required_label'>Invalid MPN.Length must be atmost 50.</span>
                                        <ul>
                                            <li><span class='required_values'>".implode(', ',$uploadErrors['mpn'])."</span></li>
                                        </ul>
                                    </li>";
                    }
                    if(isset($uploadErrors['node_id']) && count($uploadErrors['node_id'])>0)
                    {   
                        $message.="<li>
                                       <span class='required_label'>Missing Jet Browse Node</span>
                                       <ul>
                                            <li><span class='required_values'>".implode(', ',$uploadErrors['node_id'])."</span></li>
                                        </ul>
                                  </li>";
                    }
                        
                    if(isset($uploadErrors['brand']) && count($uploadErrors['brand'])>0)
                    {
                        $message.="<li><span class='required_label'>Missing Brand</span></li>
                                        <ul>
                                            <li><span class='required_values'>".implode(', ',$uploadErrors['brand'])."</span></li>
                                        </ul>
                                    </li>";
                    }
                        
                    if(isset($uploadErrors['image']) && count($uploadErrors['image'])>0)
                    {
                        $message.="<li><span class='required_label'>Product must have atleast one valid image</span>
                                        <ul>
                                            <li><span class='required_values'>".implode(', ',$uploadErrors['image'])."</span></li>
                                        </ul>
                                    </li>";
                    }
                    $message.="</ul>";
                    $return_msg['error']=$message;
                   
                    if($errormsg!="")
                    {
                        $sql="UPDATE `jet_product` SET  error='' where id='".$pid."'";
                        $model = $connection->createCommand($sql)->execute();
                        //$product->error=$errordisplay;
                        //$product->save(false);
                    }
                    
                    unset($uploadErrors);
                    unset($errordisplay);
                    unset($product);
                    return json_encode($return_msg);    
                }
            }
        }
        
        $asin=$product->ASIN;

    	$upc_ref=$product->upc;

        $additional_data= json_decode($product->additional_info,true); 
        $upc =trim($additional_data['upc_code']);
        
        if($merchant_id==317)
        {
        	$mpn=$product->sku;
        }
        else{
        	$mpn=$product->mpn;
        }
     
        if(trim($additional_data['brand'])){
       		$brand=trim($additional_data['brand']);
        }
        else{
       		$brand=$product->brand;
        }
        
        $attribute=$product->jet_attributes;
        $Attribute_arr=json_decode($attribute);
       
        $is_variation =false;
        $_uniquedata =array();
        $sku=$product->sku;
        //$sku=$product->id;
        $name=$product->title;
        $SKU_Array['product_title']=$name;
        $categoryid =$product->jet_browse_node;
        $nodeid= (int)$categoryid;
        
        $SKU_Array['jet_browse_node_id']=$nodeid;
        
        
        $type="";
       // $type=JetProductInfo::checkUpcType($upc);

        if($upc){
        	
        	$type=JetProductInfo::checkUpcType($upc);
        	$_uniquedata=array("type"=>$type,"value"=>$upc);
        	$unique['standard_product_code']=$_uniquedata['value'];
        	$unique['standard_product_code_type']=$_uniquedata['type'];
        	$SKU_Array['standard_product_codes'][]=$unique;
        }
        else if($upc_ref){
        	
        	$type=JetProductInfo::checkUpcType($upc_ref);
        	$_uniquedata=array("type"=>$type,"value"=>$upc_ref);
        	$unique['standard_product_code']=$_uniquedata['value'];
        	$unique['standard_product_code_type']=$_uniquedata['type'];
        	$SKU_Array['standard_product_codes'][]=$unique;
        }

        if($asin)
        {
		
            $SKU_Array['ASIN']=$asin;
        }
 
        $SKU_Array['manufacturer']=$brand;
         if($mpn!=null && strlen($mpn)<=50){
             $SKU_Array['mfr_part_number']=$mpn;
         }
        $SKU_Array['multipack_quantity']= 1;
        $SKU_Array['brand']=$brand;
        $description="";
        $description=$product->description;
        
        if(strlen($description)>2000)
            $description=$jetHelper->trimString($description, 2000);
        $SKU_Array['product_description']=$description;
        //send images
        $parentmainImage="";$kmain=0;
        $images=array();
        $images[]=$product->image;
        
        if($product->parent_category && $product->jet_variant_images== NULL){
        	$swatch_image=explode(',',$product->parent_category);
        }
        else{
        	$swatch_image=explode(',',$product->jet_variant_images);
        }
        
       // $swatch_image=$product->jet_variant_images;
        //$swatch_image=explode(',',$swatch_image);
        //print_r($swatch_image);
        foreach ($swatch_image as $s_image){
        	$images[]=$s_image;
        }
        //print_r($images);die("fghgfh");
        
        foreach($images as $key=>$value){
            if($value=="")
                continue;
            if(Jetproductinfo::checkRemoteFile($value)==true){
                $kmain=$key;
                $SKU_Array['main_image_url']=$value;
                break;
            }
        }
        if(count($images)>1)
        {
            $i=1;
            foreach($images as $key=>$value)
            {
                if($key==$kmain)
                    continue;
                if($i>8)
                    break;
                if($value!='' && Jetproductinfo::checkRemoteFile($value)==true){
                    $SKU_Array['alternate_images'][]= array(
                            'image_slot_id'=>(int)$i,
                            'image_url'=> $value
                    );
                    $i++;
                }
            }
        }   
        unset($images);  

        
        //print_r($SKU_Array);die("hgh");
  		$attr_val=$Attribute_arr;
        if(count($Attribute_arr)>0 && $attr_val!=0)
        {
            
            if($product->type=='simple')
            {
                $uploadErrors=array();
                foreach ($Attribute_arr as $key =>$arr)
                {
                	
                    // get value of type text/dropdown
                    if($arr[0]!='')
                    {
                        $Attribute_array[] = array(
                                                        'attribute_id'=>(int)$key,
                                                        'attribute_value'=>$arr[0]
                                             );
                    }
                    // get value of text type with unit
                    elseif(count($arr)==2)
                    {
                        $resultAttr = $connection->createCommand("SELECT * FROM `jet_attribute_value` WHERE attribute_id='".$key."'")->queryOne();
                        if(isset($resultAttr['units']) && $resultAttr['units'])
                        {
                            $unitArray=explode(',',$resultAttr['units']);
                            if ($arr[1]!='' && in_array($arr[1], $unitArray))
                            {
                                $Attribute_array[] = array(
                                                                'attribute_id'=>(int)$key,
                                                                'attribute_value'=>$arr[0],
                                                                'attribute_value_unit'=>$arr[1]
                                                            );
                            }
                            else
                            {
                                $uploadErrors['units'][]="Product ".$product->sku." must be attribute units: ".$resultAttr['units'];
                                continue;
                            }
                        }
                     } 
                }
                unset($Attribute_arr);
                if(count($uploadErrors)>0){
                        $errordisplay="";
                        $message="";
                        $message.="<b>There are following information that are incomplete/wrong for given product(s):</b><ul>";
                        if(isset($uploadErrors['units']) && count($uploadErrors['units'])>0)
                        {   
                            $message.="<li><span class='required_label'>Wrong attribute unit for Parent or Variant Options</span>
                                            <ul>
                                                <li><span class='required_values'>".implode(', ',$uploadErrors['units'])."</span></li>
                                            </ul>
                                        </li>";
                        }
                        $message.="</ul>";
                        $return_msg['error']=$message;
                        $sql="UPDATE `jet_product` SET  error='Invalid Jet Attribute Unit' where id='".$pid."'";
                        $model = $connection->createCommand($sql)->execute();
                        //$product->error="Invalid Jet Attribute Unit";
                        //$product->save(false);
                        unset($uploadErrors);
                        unset($product);
                        return json_encode($return_msg);
                }
            }
            else
            {
            	
                $errordisplay="";
                $uploadErrors=array();
                $responseOption=Jetproductinfo::createoption($product,$carray,$jetHelper,$fullfillmentnodeid,$merchant_id,$collection);

                print_r($responseOption);die("gfdf");
                $responseA=array();
                $vresult='';
                $vresponse=array();
                
                if(isset($responseOption['errors']))
                {   
                    $uploadErrors['variation_upload'][$product->id]=$responseOption['errors'];
                    $errordisplay.="Variants Upload Error: ".$responseOption['errors'].'<br>';
                    unset($responseOption['errors']);
                }
                if(isset($responseOption['children_skus']) && count($responseOption['children_skus'])>=1)
                {
                    //print_r($responseOption);die;
                    $path=\Yii::getAlias('@webroot').'/var/productUpload/'.$merchant_id.'/'.date('d-m-Y').'/variant/'.$product->sku.'<=>'.$sku;
                    if(!file_exists($path)){
                        mkdir($path,0775, true);
                    }
                    $filenameOrig=$path.'/variation.txt';
                    //$filenameOrig="";
                    $fileOrig="";
                    $fileOrig=fopen($filenameOrig,'a+');
                    fwrite($fileOrig,"\n".date('d-m-Y H:i:s')."\n".json_encode($responseOption));
                    fclose($fileOrig);
                    //file log
                    
                    $responseA=$jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/variation',json_encode($responseOption));

                    //print_r($responseA);die("ghfgh");
                    //print_r($responseA['errors']);
                    if(isset($responseA['errors'])){
                        //die("sasdas");
                        $errordisplay.=$responseA['errors'].'<br>';
                        $uploadErrors['variation'][]=$sku." : ".$responseA['errors'];
                    }
                    else
                    {
                        //die("1233");
                        
                        $vresult=$jetHelper->CGetRequest('/merchant-skus/'.rawurlencode($sku));

                        //print_r($vresult);die("fgfgfg");
                        $vresponse=json_decode($vresult,true);
                        if(count($vresponse)>0 && isset($vresponse['variation_refinements'])){
                            $variationCount++;
                        }
                    }
                }
                unset($responseA);
                unset($vresult);
                unset($vresponse);
                unset($responseOption);
                if(count($uploadErrors)>0){
                    $message="";
                    $message.="<b>There are following information that are incomplete/wrong for given product(s):</b><ul>";
                    if(isset($uploadErrors['variation']) && count($uploadErrors['variation'])>0)
                    {   
                        $message.="<li><span class='required_label'>Error in Variantion Product(s)</span>
                                        <ul>
                                            <li><span class='required_values'>".implode(', ',$uploadErrors['variation'])."</span></li>
                                        </ul>
                                    </li>";
                    }
                    if(isset($uploadErrors['variation_upload']) && count($uploadErrors['variation_upload'])>0){
                        $message.="<li><span class='required_label'>Some Variant Product(s) Not uploaded.</span><ul>";
                        foreach($uploadErrors['variation_upload'] as $key=>$value){
                            //$result="";
                            //$result=JetProduct::findOne($key);
                            $message.="<li><a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a> => <span class='required_values'>".$value."</span></li>";
                        }
                        $message.="</ul></li>";
                    }   
                    $message.="</ul>";
                    $return_msg['error']=$message;
                    if($errordisplay!="") 
                    {
                        $sql="UPDATE `jet_product` SET  error='' where id='".$pid."'";
                        $model = $connection->createCommand($sql)->execute();
                        //$product->error=$errordisplay;
                        //$product->save(false);
                    }
                    unset($uploadErrors);
                    unset($product);
                    return json_encode($return_msg);
                }
            }
        }
       /* else{
        	
            if($product->type=='simple'){
                $errordisplay.="Please!assign attribute value to Jet Attributes ";
                if($errordisplay!="")
                {
                    $sql="UPDATE `jet_product` SET  error='' where id='".$pid."'";
                    $model = $connection->createCommand($sql)->execute();
                    
                }
                $message.=$errordisplay;
                $return_msg['error']=$message;
                return json_encode($return_msg);


            }
            else{
                $errordisplay.="Variants Upload Error: Please Map BigCommerce attribute to jet attributes. ";
                if($errordisplay!="")
                {
                    $sql="UPDATE `jet_product` SET  error='' where id='".$pid."'";
                    $model = $connection->createCommand($sql)->execute();
                    
                }
                $message.=$errordisplay;
                $return_msg['error']=$message;
                return json_encode($return_msg);
            }
        	
        
        }*/
             
        if(!empty($SKU_Array))
        { 
            //print_r($Attribute_array);die;
            if(count($Attribute_array)>0)
            $SKU_Array['attributes_node_specific'] = $Attribute_array; // add attributes details
            
           //print_r($SKU_Array);die;
            
            $result[$sku]= $SKU_Array; // add merchant sku
            unset($SKU_Array);
            unset($Attribute_array);
            $qty=0;
            $qty=$product->qty;
            $resultQty='';
		    $node['fulfillment_node_id']=$fullfillmentnodeid;

            $newPriceValue=$product->price;
            // change new price
            $option_price_new=0;


            if($priceType !='' && $priceValue!=0)
            {
                $updatePrice=0;
                $updatePrice=self::priceChange($newPriceValue,$priceType,$priceValue);
                if($updatePrice!=0)
                    $newPriceValue = $updatePrice;
            }

			if($merchant_id==162){
	            $price[$sku]['price']=(float)$newPriceValue;
	            $node['fulfillment_node_price']=(float)$newPriceValue;
			}
			else{
			     $price[$sku]['price']=(float)$newPriceValue;
            	$node['fulfillment_node_price']=(float)$newPriceValue;
			}
            $price[$sku]['fulfillment_nodes'][]=$node; //price
            // Add inventory
            //$qty= $product->qty;
            $node1['fulfillment_node_id']=$fullfillmentnodeid;
            $node1['quantity']=(int)$qty;
            $inventory[$sku]['fulfillment_nodes'][]=$node1; // inventory
            
        }
        /*---------------------upload data preparation ends------------------*/
        /*-----------------direct upload code starts-----------------------------*/
        if(!empty($result) && count($result)>0){
          
            $uploaded_flag=false;
            $responseArray="";
            $response = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku),json_encode($result[$sku]));
            $responseArray=json_decode($response,true);
            unset($result);
            if($responseArray=="")
            {
                $responsePrice="";
                $responsePrice = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/price',json_encode($price[$sku]));
                $responsePrice=json_decode($responsePrice,true);
                unset($node);
                unset($price);

                if($responsePrice=="")
                {
                    $errordisplay="";
                    $responseInventory="";
                    $response = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/inventory',json_encode($inventory[$sku]));
                    $responseInventory = json_decode($response,true);
                    unset($node1);
                    unset($inventory);

                    if(isset($responseInventory['errors'])){
                       
                        $message="";
                        $message.="<b>There are following information are incomplete/wrong for given product:</b><ul>";
                        $message.="<li><span class='required_label'>Product with sku :"."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." not uploaded due to error in Inventory information.</span>
                                    <ul>
                                        <li><span class='required_values'>Error from Jet : ".json_encode($responseInventory['errors'])." </span></li>
                                    </ul>
                                </li>";
                        $message.="</ul>";
                        $return_msg['error']=$message;
                        $sql="UPDATE `jet_product` SET  error='' where id='".$pid."'";
                        $model = $connection->createCommand($sql)->execute();
                        //$product->error=json_encode($responseInventory['errors']);
                        //$product->save(false);
                        unset($product);
                        return json_encode($return_msg);
                    }
                    $uploaded_flag=true;
                }
                elseif(isset($responsePrice['errors']))
                {
                    
                    $errordisplay="";
                    $message="";
                    $message.="<b>There are following information that are incomplete/wrong for given product:</b><ul>";
                    $message.="<li><span class='required_label'>Product with sku :"."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." not uploaded due to error in Price information.</span>
                                    <ul>
                                        <li><span class='required_values'>Error from Jet : ".json_encode($responsePrice['errors'])." </span></li>
                                    </ul>
                                </li>";
                    $message.="</ul>";
                    $return_msg['error']=$message;
                    $sql="UPDATE `jet_product` SET  error='' where id='".$pid."'";
                    $model = $connection->createCommand($sql)->execute();
                    //$product->error=json_encode($responsePrice['errors']);
                    //$product->save(false);
                    unset($responsePrice);
                    unset($product);
                    return json_encode($return_msg);
                }
            }

            elseif(isset($responseArray['errors']))
            {
               
                $errordisplay="";
                $message="";
                $message.="<b>There are following information that are incomplete/wrong for given product:</b><ul>";
                $message.="<li><span class='required_label'>Product with sku :"."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." not uploaded due to error in information.</span>
                                    <ul>
                                        <li><span class='required_values'>Error from Jet : ".json_encode($responseArray['errors'])." </span></li>
                                    </ul>
                                </li>";
                $message.="</ul>";
                $return_msg['error']=$message;
                $sql="UPDATE `jet_product` SET  error='There are following information that are incomplete/wrong' where id='".$pid."'";
                $model = $connection->createCommand($sql)->execute();
                //$product->error=json_encode($responseArray['errors']);
                //$product->save(false);
                unset($product);
                return json_encode($return_msg);
            }
            if($uploaded_flag){
               
                $uploadErrors=array();
                $result="";
                $response="";
                $uploadCount=0;
               
                $result=$jetHelper->CGetRequest('/merchant-skus/'.rawurlencode($sku));
                $response=json_decode($result,true);

                if($response && !(isset($response['errors']))){
                    $uploadCount++;
                    //$product->status=$response['status'];
                    //$product->error="";
                    //$product->save(false);
                    $sql="UPDATE `jet_product` SET  error='',status='Under Jet Review' where id='".$pid."'";
                    $model = $connection->createCommand($sql)->execute();
                    
                    $return_msg['success']="Product with sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." successfully uploaded.";
                   
                    unset($product);
                    return json_encode($return_msg);
                }
                elseif($response!="" && isset($response['errors']))
                {
                   
                    $message="";
                    $message.="<b>There are following information that are incomplete/wrong for given product:</b><ul>";
                    $message.="<li><span class='required_label'>Product with sku :"."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"."</span>
                                        <ul>
                                            <li><span class='required_values'>Error from Jet : ".json_encode($response['errors'])." </span></li>
                                        </ul>
                                    </li>";
                    $message.="</ul>";
                    $return_msg['error']=$message;
                    unset($product);
                    return json_encode($return_msg);
                }
                
            }
        }
            
        /*-----------------direct upload code ends-----------------------------*/
    }

    /**
     * Displays a single JetProduct model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

         
    }

    /**
     * Creates a new JetProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JetProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
     public function actionSave()
    {
        $data=Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JetProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    
	public function actionUpdateajax($id)
    {
    	if (Yii::$app->user->isGuest) {
    		return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
    	}
    	if(!isset($connection)){
    		$connection=Yii::$app->getDb();
    	}
    	$model = $this->findModel($id);
    	$data=array();
    	$sku=$model->sku;
    	$merchant_id = $model->merchant_id;
    	
    	//print_r(Yii::$app->request->post());die;
		if ($model->load(Yii::$app->request->post()))
    	{
    		$product_barcode="";
    		$product_sku="";
    		$product_id="";
    		$product_upc="";
    		$product_asin="";
    		$product_mpn="";
    		$product_vendor="";
    		$return_status=[];
    		if(array_key_exists('barcode_type', $_POST['JetProduct'])){
    			$product_barcode=$_POST['JetProduct']['barcode_type'];
    		}
    		$product_id=$model->id;
    		$product_sku=$_POST['JetProduct']['sku'];
    
    		$result = (object)$connection->createCommand("SELECT additional_info,bigproduct_id FROM `jet_product` WHERE id='".$id."'")->queryOne();
    		$additional=json_decode($result->additional_info);
    
            $product_upc=trim($_POST['JetProduct']['upc']);
            $product_mpn=trim($_POST['JetProduct']['MPN']);
            $product_vendor=trim($_POST['JetProduct']['brand']);
    		
    
    		//$additional_info1=json_encode($additional_info1);
    
    		if($product_vendor==""){
    			$return_status['error']="Brand is required field.";
    			return json_encode($return_status);
    		}
    		if($product_barcode==""){
    			$product_barcode=Jetproductinfo::checkUpcType($product_upc);
    		}
    		$product_asin=trim($_POST['JetProduct']['ASIN']);
    			//$product_collection=array();
    		if(Yii::$app->request->post('product-type')=='variants')
    		{
    				$jet_attr=array();
    				$options=array();
    				$new_options=array();
    				$pro_attr=array();
    				$attributes_of_jet=array();
    				$other_vari_opt=array();
    				if(Yii::$app->request->post('jet_attributes')){
    					$jet_attributes=Yii::$app->request->post('jet_attributes');
    				}
    				if(Yii::$app->request->post('attributes_of_jet')){
    					$attributes_of_jet=Yii::$app->request->post('attributes_of_jet');
    				}
    				if(Yii::$app->request->post('jet_varients_opt'))
    				{
    					$product_error=[];
    					$other_vari_opt=Yii::$app->request->post('jet_varients_opt');
    					$er_msg="";
    					$chek_flag=false;
    					if(is_array($other_vari_opt) && count($other_vari_opt)>0){
    						 
    						foreach($other_vari_opt as $k_opt_id=>$v_opt){
    							$opt_upc="";
    							$opt_asin="";
    							$opt_mpn="";
    							$option_sku="";
    							$er_msg1="";
    							$opt_upc=trim($v_opt['upc']);
    							$opt_asin=trim($v_opt['asin']);
    							$opt_mpn=trim($v_opt['mpn']);
    							$option_sku=$v_opt['optionsku'];
    							$opt_barcode="";
    							 
    							 
    							/*-------newly added on 1 April starts------------*/
    							if($opt_barcode==""){
    								$opt_barcode=Jetproductinfo::checkUpcType($opt_upc);
    							}
    							$upc_success_flag=true;
    							$mpn_success_flag=true;
    							$invalid_asin=false;
    							$invalid_upc=false;
    							$invalid_mpn=false;
    							$upc_error_msg="";
    							$asin_success_flag=true;
    							$asin_error_msg="";
    							if(strlen($opt_upc)>0){
    								list($upc_success_flag,$upc_error_msg)=Jetproductinfo::checkProductOptionBarcodeOnUpdate($other_vari_opt,$v_opt,$k_opt_id,$opt_barcode,$product_barcode,$product_upc,$product_id,$product_sku,$connection);
    							}
    							if(strlen($opt_asin)>0){
    								list($asin_success_flag,$asin_error_msg)=Jetproductinfo::checkProductOptionAsinOnUpdate($other_vari_opt,$v_opt,$k_opt_id,$product_asin,$product_id,$product_sku,$connection);
    							}
    							if(strlen($opt_mpn)>0){
    								list($mpn_success_flag,$mpn_error_msg)=Jetproductinfo::checkProductOptionMpnOnUpdate($other_vari_opt,$v_opt,$k_opt_id,$product_mpn,$product_id,$product_sku,$connection);
    							}
    							if($opt_upc=="" || !is_numeric($opt_upc) || (is_numeric($opt_upc) && !$opt_barcode) || (is_numeric($opt_upc) && $opt_barcode && !$upc_success_flag))
    							{
    								$invalid_upc=true;
    							}
    							if($opt_asin=="" || (strlen($opt_asin)>0 && strlen($opt_asin)!=10) || (strlen($opt_asin)==10 && !ctype_alnum ($opt_asin)) || (strlen($opt_asin)==10 && ctype_alnum ($opt_asin) && !$asin_success_flag))
    							{
    								$invalid_asin=true;
    							}
    							if($opt_mpn=="" || strlen($opt_mpn)>50 || (strlen($opt_mpn)<=50 && !$mpn_success_flag)){
    								//$product_error['invalid_mpn'][]=$option_sku;
    								//$chek_flag=true;
    								$invalid_mpn=true;
    							}
    							 
    							if($invalid_upc && $invalid_asin && $invalid_mpn){
    								$chek_flag=true;
    								$product_error['invalid_asin'][]=$option_sku;
    							}
    						}
    					}
    					 
    					/*if(count($product_error)>0){
    						$error="";
    						/* if(isset($product_error['invalid_mpn']) && count($product_error['invalid_mpn'])>0){
    						 $error.="invalid MPN: ".implode(', ',$product_error['invalid_mpn'])."<br>";
    						} */
    						/*if(isset($product_error['invalid_asin']) && count($product_error['invalid_asin'])>0){
    							$error.="Invalid/Missing Barcode or ASIN or MPN for sku(s): ".implode(', ',$product_error['invalid_asin'])."<br>";
    						}*/
    					//	$return_status['error']=$error;
    						//var_Dump($error);die;
    					/*	unset($error);
    						unset($product_error);
    						return json_encode($return_status);
    					}*/
    				}
    				else
    				{
    					$upc_success_flag=false;
    					$asin_success_flag=false;
    					$mpn_success_flag=false;
    					$invalid_upc=false;
    					$invalid_asin=false;
    					$invalid_mpn=false;
    					$chek_flag=false;
    					$er_msg="";
    					$type="";
    					$type=Jetproductinfo::checkUpcType($product_upc);
    					if(strlen($product_upc)>0){
    						$upc_success_flag=Jetproductinfo::checkUpcVariantSimple($product_upc,$product_id,$product_sku,$connection);
    					}
    					if(strlen($product_asin)>0){
    						$asin_success_flag=Jetproductinfo::checkAsinVariantSimple($product_asin,$product_id,$product_sku,$connection);
    					}
    					if(strlen($product_mpn)>0){
    						$mpn_success_flag=Jetproductinfo::checkMpnVariantSimple($product_mpn,$product_id,$product_sku,$connection);
    					}
    					if($product_upc=="" || !is_numeric($product_upc) || (is_numeric($product_upc) && $type="") || (is_numeric($product_upc) && $type && $upc_success_flag))
    					{
    						$invalid_upc=true;
    					}
    					if($product_asin=="" || (strlen($product_asin)>0 && strlen($product_asin)!=10) || (strlen($product_asin)==10 && !ctype_alnum ($product_asin)) || (strlen($product_asin)==10 && ctype_alnum ($product_asin) && $asin_success_flag))
    					{
    						$invalid_asin=true;
    					}
    					if($product_mpn=="" || strlen($product_mpn)>50 || (strlen($product_mpn)<=50 && $mpn_success_flag)){
    						//$er_msg.="Invalid MPN <br>";
    						//$chek_flag=true;
    						$invalid_mpn=true;
    					}
    					if($invalid_upc && $invalid_asin && $invalid_mpn){
    						$chek_flag=true;
    						$er_msg.="Invalid/Missing Barcode or ASIN or MPN, must be unique"."<br>";
    					}
    					if($chek_flag){
    						$return_status['error']=$er_msg;
    						return json_encode($return_status);
    					}
    					/*-------------check asin and upc for variant-simple here ends----------*/
    				}
    				
    				if($jet_attributes)
    				{
    					if($jet_attr=Yii::$app->request->post('jet_attributes')){
    						foreach ($jet_attr as $jet){
    							$jet_attr_name=$jet['jet_attr_name'];
    							$jet_attr_id=$jet['jet_attr_id'];
    							$arr[]=array($jet_attr_name=>$jet_attr_id);
    						}
    						if(isset($arr)){
    							foreach ($arr as $array) {
    								foreach ($array as $key => $opvalue) {
    									$pro_attr[$key]=$opvalue;
    								}
    							}
    						}
    						else{
    							$pro_attr='';
    						}
    					}
    					//print_r($a);die("hkhj");
    				}
    				
    				$jet_attr=$options;
    				//$connection = Yii::$app->getDb();
    				$product_id='';
    				$product_id=trim($id);
    				if(is_array($jet_attr) && count($jet_attr)>0){
    					$opt_count=0;
    					foreach($jet_attr as $opt_key=>$option_value){
    						$option_id="";
    						$option_id=trim($opt_key);
    						$options_save="";
    				
    						$options_save=json_encode($option_value,JSON_UNESCAPED_UNICODE);//json_encode($option_value);
    				
    						//$opt_price="";
    						//$opt_qty="";
    						$opt_upc="";
    						$opt_asin="";
    						$opt_mpn="";
    						$opt_sku="";
    						if(is_array($other_vari_opt) && count($other_vari_opt)>0){
    							//$opt_price=$other_vari_opt[$option_id]['price'];
    							//$opt_qty=$other_vari_opt[$option_id]['qty'];
    							$opt_upc=$other_vari_opt[$option_id]['upc'];
    							$opt_asin=$other_vari_opt[$option_id]['asin'];
    							$opt_mpn=$other_vari_opt[$option_id]['mpn'];
    							$opt_sku=$other_vari_opt[$option_id]['optionsku'];
    						}
    						$sql="";
    						$model2 ="";
    						$model2 = $connection->createCommand("SELECT * from `jet_product_variants` WHERE option_sku='".$opt_sku."'")->queryOne();
    						//$model2 = JetProductVariants::findOne($option_id);
    						if($model2)
    						{
    							$new_variant_option_1="";
    							$new_variant_option_2="";
    							$new_variant_option_3="";
    							if(is_array($new_options[trim($opt_key)]) && count($new_options[trim($opt_key)])>0)
    							{
    								$v_opt_count=1;
    								foreach($new_options[trim($opt_key)] as $opts_k=>$opts_v){
    									if($v_opt_count==1){
    										$new_variant_option_1=$opts_v;
    									}
    									if($v_opt_count==2){
    										$new_variant_option_2=$opts_v;
    									}
    									if($v_opt_count==3){
    										$new_variant_option_3=$opts_v;
    									}
    									$v_opt_count++;
    								}
    							}
    				
    							$sql="UPDATE `jet_product_variants` SET
                                                variant_option1='".addslashes($new_variant_option_1)."',
                                                variant_option2='".addslashes($new_variant_option_2)."',
                                                variant_option3='".addslashes($new_variant_option_3)."',
                                                jet_option_attributes='".addslashes($options_save)."',
                                                option_unique_id='".trim($opt_upc)."',
                                                option_mpn='".trim($opt_mpn)."',
                                                asin='".trim($opt_asin)."'
                                                where option_sku='".$opt_sku."'";
    				
    							/* $sql='UPDATE `jet_product_variants` SET
    							 new_variant_option_1="'.$new_variant_option_1.'",
    							new_variant_option_2="'.$new_variant_option_2.'",
    							new_variant_option_3="'.$new_variant_option_3.'",
    							jet_option_attributes="'.$options_save.'",
    							option_unique_id="'.trim($opt_upc).'",
    							option_mpn="'.trim($opt_mpn).'",
    							asin="'.trim($opt_asin).'"
    							where option_id="'.$option_id.'"'; */
    				
    							$connection->createCommand($sql)->execute();
    						}
    				
    					if($opt_sku==$product_sku){
                            //if(trim($opt_upc)!=""){
                                $model->upc=trim($opt_upc);
                            //}
                            //if(trim($opt_asin)!=""){
                                $model->ASIN=trim($opt_asin);
                            //}
                            //if(trim($opt_mpn)!=""){
                                $model->mpn=trim($opt_mpn);
                            //}
                                $model->vendor=trim($product_vendor);
                        }
                        $opt_count++;
                    }
    				
    			}else{
    							if(is_array($other_vari_opt) && count($other_vari_opt)>0){
    								$opt_count=0;
    								foreach($other_vari_opt as $opt_id=>$v_arr){
    									$model2 ="";
    									$option_id="";
    									$option_id=trim($opt_id);
    									$opt_sku=$other_vari_opt[$option_id]['optionsku'];
    									//$opt_price="";
    									//$opt_qty="";
    									$opt_upc="";
    									$opt_asin="";
    									$opt_mpn="";
    									//$opt_price=$other_vari_opt[$option_id]['price'];
    									//$opt_qty=$other_vari_opt[$option_id]['qty'];
    									$opt_upc=$other_vari_opt[$option_id]['upc'];
    									$opt_asin=$other_vari_opt[$option_id]['asin'];
    									$opt_mpn=$other_vari_opt[$option_id]['mpn'];
    									if($opt_sku==$product_sku){
    										
    										$model->upc=trim($opt_upc);
    										//}
    										//if(trim($opt_asin)!=""){
    										$model->ASIN=trim($opt_asin);
    										//}
    										//if(trim($opt_mpn)!=""){
    										$model->mpn=trim($opt_mpn);
    										$model->brand=addslashes($product_vendor);
    										$model->additional_info=($additional_info1);
    										
    										//}
    										}
    										
    										$sql="";
    										$model2 ="";
    										$model2 = $connection->createCommand("SELECT * from `jet_product_variants` WHERE option_sku='".$opt_sku."' and merchant_id='".$merchant_id."' and option_id='".$opt_id."'")->queryOne();
    										if($model2 !==""){
    											
    											$sql="";
    											$sql="UPDATE `jet_product_variants` SET
                                                    option_unique_id='".trim($opt_upc)."',
                                                    asin='".trim($opt_asin)."',
                                                    option_mpn='".trim($opt_mpn)."'
                                                    where option_sku='".$opt_sku."'";
    											$connection->createCommand($sql)->execute();
    											 
    										}
    										$opt_count++;
    										}
    										}
    									}
    									unset($model2);
    									unset($sql);
    									unset($options_save);
    									if(count($pro_attr)==0)
    										$model->jet_attributes='';
    									else
    										$model->jet_attributes=json_encode($pro_attr);
    									$model->save(false);
    									unset($jet_attributes);
    									unset($other_vari_opt);
    									unset($attributes_of_jet);
    								}
    								else
    								{
    									/*-------------check asin and upc for simple here----------*/
    									$upc_success_flag=false;
    									$asin_success_flag=false;
    									$mpn_success_flag=false;
    									$chek_flag=false;
    									$invalid_upc=false;
    									$invalid_asin=false;
    									$invalid_mpn=false;
    									$er_msg="";
    									$type="";
    									$product_upc=trim($product_upc);
    									$product_asin=trim($product_asin);
    									$type=Jetproductinfo::checkUpcType($product_upc);
										
    									/*if(strlen($product_upc)>0){
    										$upc_success_flag=Jetproductinfo::checkUpcSimple($product_upc,$product_id,$connection);
    									}*/
    									if(strlen($product_asin)>0){
    										$asin_success_flag=Jetproductinfo::checkAsinSimple($product_asin,$product_id,$connection);
    									}
    									if(strlen($product_mpn)>0){
    										$mpn_success_flag=Jetproductinfo::checkMpnSimple($product_mpn,$product_id,$connection);
    									}
										
    									if($product_upc=="" || !is_numeric($product_upc) || (is_numeric($product_upc) && !$type) || (is_numeric($product_upc) && $type && $upc_success_flag))
    									{
    										// echo "duplicate upc";
    										$invalid_upc=true;
    									}
    									if($product_asin=="" || (strlen($product_asin)>0 && strlen($product_asin)!=10) || (strlen($product_asin)==10 && !ctype_alnum ($product_asin)) || (strlen($product_asin)==10 && ctype_alnum ($product_asin) && $asin_success_flag))
    									{
    										// echo "duplicate asin";
    										$invalid_asin=true;
    									}
    									if($product_mpn=="" || strlen($product_mpn)>50 || (strlen($product_mpn)<=50 && $mpn_success_flag)){
    										//$er_msg.="invalid MPN <br>";
    										//$chek_flag=true;
    										$invalid_mpn=true;
    									}
    									if($invalid_upc && $invalid_asin && $invalid_mpn){
    										$chek_flag=true;
    										//echo "duplicate upc/asin";
    										$er_msg.="Invalid/Missing Barcode or ASIN or MPN, please fill unique UPC or ASIN or MPN"."<br>";
    									}
    									//echo $er_msg;die;
    									if($chek_flag){
    										$return_status['error']=$er_msg;
    										return json_encode($return_status);
    									}
    
    									$model->upc=trim($product_upc);
    									//}
    									//if(trim($opt_asin)!=""){
    									$model->ASIN=trim($product_asin);
    									//}
    									//if(trim($opt_mpn)!=""){
    									$model->mpn=trim($product_mpn);
    									$model->barcode_type=trim($type);
    									$model->brand=addslashes($product_vendor);
    									//$model->additional_info=($additional_info1);
    									/*-------------check asin and upc for simple here ends----------*/
    									if(Yii::$app->request->post('jet_attributes1')){
    										$jet_attributes1=Yii::$app->request->post('jet_attributes1');
    									}
    
    
    									$jet_attr=array();
    									if($jet_attributes1){
    										foreach($jet_attributes1 as $key=>$value){
    											if(count($value)==1 && $value[0]!=''){
    												$jet_attr[$key]=array(0=>$value[0]);
    											}elseif(count($value)==2 && $value[0]!='' && $value[1]!=''){
    												$jet_attr[$key]=array(0=>$value[0],1=>$value[1]);
    											}
    										}
    									}
    									if(count($jet_attr)==0)
    										$model->jet_attributes='';
    									else
    										$model->jet_attributes=json_encode($jet_attr);
    									 
    									$model->save(false);
    									unset($jet_attr);
    									 
    									}
    									$return_status['success']="Product information has been saved successfully..";
    									return json_encode($return_status);
    									//return $this->redirect(['view', 'id' => $model->id]);
    									}
    									else{
    										//not post successfully
    									}
    									 
    									$connection->close();
    								
    
    								
    }
    
    
    public function actionEditdata()
    {
        $this->layout="main2";
        $id=trim(Yii::$app->request->post('id'));
        $merchant_id=trim(Yii::$app->request->post('merchant_id'));
        ini_set('memory_limit', '1024M');
        $connection=Yii::$app->getDb();
        $model = $this->findModel($id);
        
        
        /* code by himanshu start */
        $session = Yii::$app->session;
        $productData = [
                        'model'=>$model,
                        'connection'=>$connection,
                        'merchant_id'=>$merchant_id
                        ];
        $session_key = 'product'.$id;
        $session->set($session_key, $productData);
        //$session->close();
        /* code by himanshu end */

        $html = $this->render('editdata',
                            [
                                'id'=>$id,
                                'model'=>$model,
                                'connection'=>$connection,
                                /*'merchantCategory'=>$merchantCategory,
                                'attributes'=>$attributes*/
                            ],
                            true);
        $connection->close();
        return $html;
    }
    
    
    /**
     * Deletes an existing JetProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JetProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JetProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JetProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionProductstatus()
    {
        $collection="";
        $fullfillmentnodeid="";
        $api_host="";
        $api_user="";
        $api_password="";
        $jetHelper="";
        $merchant_id=Yii::$app->user->identity->id;
        $connection=Yii::$app->getDb();
        $jetConfig="";
        $jetConfig=$connection->createCommand('SELECT `fullfilment_node_id`,`api_user`,`api_password` from `jet_configuration` where merchant_id="'.$merchant_id.'"')->queryOne();
        if($jetConfig)
        {
            $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
            $api_host="https://merchant-api.jet.com/api";
            $api_user=$jetConfig['api_user'];
            $api_password=$jetConfig['api_password'];
            $jetHelper = new Jetapimerchant($api_host,$api_user,$api_password);
            $responseToken ="";
            $responseToken = $jetHelper->JrequestTokenCurl();
            
            if($responseToken==false){
                Yii::$app->session->setFlash('error', "Jet api credentials are wrong.Please enter correct api details.");
                return $this->redirect(['index']);
            }
        }
        else
        {
            Yii::$app->session->setFlash('error', "Please enter correct api details.");
            return $this->redirect(['index']);
            //exit(0);
        }
        unset($jetConfig);
        $collection=array();
        $modelMerchantPro="";
        $collection=$connection->createCommand('select `id` from jet_product where merchant_id="'.$merchant_id.'"')->queryAll();
        /* var_dump($collection);
        echo "<hr>";
        echo count($collection);
        echo "<hr>"; */
        if(is_array($collection) && count($collection)>0){
            $response="";
            $resArray=array();
            $newcount=count($collection)+100;
            $response =$jetHelper->CGetRequest('/portal/merchantskus?from=0&size='.$newcount,$merchant_id);
            $resArray=json_decode($response,true);
            /* echo count($collection);
            echo "<hr><pre>";
            print_r($resArray);
            die; */
            if($resArray && !isset($resArray['errors']))
            {
                foreach($resArray['merchant_skus'] as $value)
                {
                    $connection->createCommand('UPDATE jet_product set status="'.$value['status'].'" where sku="'.$value['merchant_sku'].'" and merchant_id="'.$merchant_id.'"')->execute();
                }
                Yii::$app->session->setFlash('success', "Product status(s) are updated successfully..");
            }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

  
    public function actionStartbatcharchieved(){
        $merchant_id ="";
        $merchant_id = \Yii::$app->user->identity->id;
        $message="";
        $index=Yii::$app->request->post('index');
     	if($index==''){
            $index=0;
        }
        $return_msg['success']="";
        $return_msg['error']="";
        $fullfillmentnodeid="";
        $api_host="";
        $api_user="";
        $api_password="";
        $jetconfig=array();
        $productAll=array();
        $session = Yii::$app->session;
        $productAll=array();
        $jetconfig=array();
        $productAll=unserialize($session->get('productAll'));
        $jetconfig=unserialize($session->get('jetconfig'));
        if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        if(is_array($jetconfig) && count($jetconfig)>0 && $jetconfig['api_host']!=""){
           $queryObj = $connection->createCommand("SELECT `fullfilment_node_id`,`api_user`,`api_password` FROM `jet_configuration` WHERE merchant_id='".$merchant_id."'");
           $jetConfig = $queryObj->queryOne();
            if($jetConfig){
                    $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
                    $api_host="https://merchant-api.jet.com/api";
                    $api_user=$jetConfig['api_user'];
                    $api_password=$jetConfig['api_password'];
            }
        }
        unset($jetconfig);
        $merchant_id ="";
        $merchant_id = \Yii::$app->user->identity->id;
        //$model = new JetConfiguration();
        if($api_host!=""){
            $jetConfig="";
            $queryObj="";
            $queryObj = $connection->createCommand("SELECT `fullfilment_node_id`,`api_user`,`api_password` FROM `jet_configuration` WHERE merchant_id='".$merchant_id."'");
            $jetConfig = $queryObj->queryOne();
            if($jetConfig){
                    $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
                    $api_host="https://merchant-api.jet.com/api";
                    $api_user=$jetConfig['api_user'];
                    $api_password=$jetConfig['api_password'];
            }
        }
        
        $pid=0;
        $productLoad="";
        $productLoad=$productAll[$index];
       
        if((count($productAll)-1)==$index)
        {
            $session->remove('productAll');
            $session->remove('jetconfig');
            unset($productAll);
        }
    
        if(is_array($productLoad)){
                $sku=$productLoad['sku'];
                $status=$productLoad['status'];
                $id1=$productLoad['id'];
                $data=array();
                $data['is_archived']=true;
                $jetHelper = new Jetapi($api_host,$api_user,$api_password);
                $result=$jetHelper->CGetRequest('/merchant-skus/'.rawurlencode($sku));
                $response=json_decode($result,true);
                $status="";
                $saveArchive=false;
            
                if($response && !isset($response['errors']))
                {
                        if(isset($response['is_archived']) && $response['is_archived']==true)
                        {
                            if($status!='Archived')
                            {   
                                $status="Archived";
                                $saveArchive=true;
                            }
                        }
                        else
                        {
                            $archiveResponse=array();
                            $data1=$jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/status/archive',json_encode($data));
                            $archiveResponse=json_decode($data1,true);
                            if(isset($archiveResponse['errors'])){
                                $return_msg['error']="Product sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." not archived.Error from Jet : ".json_encode($archiveResponse['errors']);
                                return json_encode($return_msg);
                            }
                            unset($archiveResponse);
                            $result_f="";
                            $result_f=$jetHelper->CGetRequest('/merchant-skus/'.rawurlencode($sku));
                            $response_f=json_decode($result_f,true);
                            if($response_f && !isset($response_f['errors']))
                            {
                                if(isset($response_f['is_archived']) && $response_f['is_archived']==true)
                                {
                                    $status="Archived";
                                    $saveArchive=true;
                                }   
                            }
                        }
                        if($saveArchive){
                            //update status
                            $sql="UPDATE `jet_product` SET  status='".$status."' where id='".$id1."'";
                            $model = $connection->createCommand($sql)->execute();
                            $return_msg['success']="Product with sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." is successfully archived on jet.";
                            return json_encode($return_msg);
                        }else{
                            $return_msg['error']="Product sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." not archived.Error from Jet : ".$response_f['errors'];
                            return json_encode($return_msg);
                        }
                }else{
                        $return_msg['error']="Product sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." is not uploaded on jet.";
                        return json_encode($return_msg);
                }
        }else{
            $return_msg['error']="Product not Found.";
            return json_encode($return_msg);
        }
        return json_encode($return_msg);
    }


    public function actionStartbatchunarchieved(){

        $merchant_id ="";
        $merchant_id = Yii::$app->user->identity->id;
        $message="";
        $index=Yii::$app->request->post('index');
     	if($index==''){
            $index=0;
        }
        $return_msg['success']="";
        $return_msg['error']="";
        $fullfillmentnodeid="";
        $api_host="";
        $api_user="";
        $api_password="";
        $session = Yii::$app->session;
        $jetconfig=array();
        $productAll=array();
        $productAll=unserialize($session->get('productAll'));
        $jetconfig=unserialize($session->get('jetconfig'));
        if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        if(is_array($jetconfig) && count($jetconfig)>0 && $jetconfig['api_host']!=""){
          $queryObj = $connection->createCommand("SELECT `fullfilment_node_id`,`api_user`,`api_password` FROM `jet_configuration` WHERE merchant_id='".$merchant_id."'");
            $jetConfig = $queryObj->queryOne();
            if($jetConfig){
                    $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
                    $api_host="https://merchant-api.jet.com/api";
                    $api_user=$jetConfig['api_user'];
                    $api_password=$jetConfig['api_password'];
            }
        }
        unset($jetconfig);
      
        if($api_host!=""){
            $jetConfig="";
            $queryObj="";
            $queryObj = $connection->createCommand("SELECT `fullfilment_node_id`,`api_user`,`api_password` FROM `jet_configuration` WHERE merchant_id='".$merchant_id."'");
            $jetConfig = $queryObj->queryOne();
            if($jetConfig){
                    $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
                    $api_host="https://merchant-api.jet.com/api";
                    $api_user=$jetConfig['api_user'];
                    $api_password=$jetConfig['api_password'];
            }
        }
        $pid=0;
        $productLoad="";
        $productLoad=$productAll[$index];
        if((count($productAll)-1)==$index)
        {
            $session->remove('productAll');
            $session->remove('jetconfig');
            unset($productAll);
        }
        if(is_array($productLoad))
        {
            $sku=$productLoad['sku'];
            $qty=$productLoad['qty'];
            $id1=$productLoad['id'];
            $status=$productLoad['status'];
            
            $resultQty='';
            $data['is_archived']=false;
            $node1['fulfillment_node_id']=$fullfillmentnodeid;
            $node1['quantity']=(int)$qty;
            $inventory['fulfillment_nodes'][]=$node1;
            $jetHelper = new Jetapi($api_host,$api_user,$api_password);
            $result0=$jetHelper->CGetRequest('/merchant-skus/'.rawurlencode($sku));
            $response0=json_decode($result0,true);
            if($response0=="")
            {
                $return_msg['error']="Product with sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." is not uploaded on jet.";
                return json_encode($return_msg);
            }
            $data1=$jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/status/archive',json_encode($data));
            $inventry=$jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/inventory',json_encode($inventory));
            $result=$jetHelper->CGetRequest('/merchant-skus/'.rawurlencode($sku));
            $response=json_decode($result,true);
            if(isset($response['is_archived']) && $response['is_archived']==false)
            {
             
                    $sql="UPDATE `jet_product` SET  status='".$status."' where id='".$id1."'";
                    $model = $connection->createCommand($sql)->execute();
                    $return_msg['success']="Product with sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." is successfully unarchived on jet.";
                    return json_encode($return_msg);
                    //$productLoad->setData('jet_product_status','Processing')->save();
            }else{
                    $return_msg['error']="Product with sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$sku."</a>"." is not unarchived on jet.";
                    return json_encode($return_msg);
            }
        }else{
            $return_msg['error']="Product not Found.";
            return json_encode($return_msg);
        }
                    
        return json_encode($return_msg);
    }

 	public function actionBatchimport()
    {
        $connection = Yii::$app->getDb();
        $countProducts=0;$pages=0;
        
        $merchant_id=$shopname = \Yii::$app->user->identity->id;           
        $bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);
        
        $resource='catalog/products';
        
        $countUpload=$bigcom->get($resource);

        $countProducts=$countUpload['meta']['pagination']['total'];
        $pages=$countUpload['meta']['pagination']['total_pages'];
        
        $session ="";
        $session = Yii::$app->session;
        if(!is_object($session)){
            Yii::$app->session->setFlash('error', "Can't initialize Session.Product(s) upload cancelled.");
            return $this->redirect(['index']);
        }
        $session->set('product_page',$pages);
        $session->set('merchant_id',$merchant_id);
        $session->close();
        unset($jetConfigarray);
        return $this->render('batchimport', [
                'totalcount' => $countProducts,
                'pages'=>$pages
        ]);
    }
    
    /**ACTION TO IMPORT PRODUCT*/
    public function actionBatchimportproduct()
    {
        $index=Yii::$app->request->post('index');
    	if(!$index){
    	   $index=0;
    	}
	 
        $countUpload=Yii::$app->request->post('count');
        try
        {
            Yii::$app->session->setFlash ( 'contactFormSubmitted' );
            $merchant_id=\Yii::$app->user->identity->id;
           
            $bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);
           
            $resource='catalog/products?include=variants,images&limit=50&page='.$index.'';
         
            $pages="";$sc="";$merchant_id="";
            $session ="";
            $session = Yii::$app->session;
            
            $connection=Yii::$app->getDb();
            
            $pages=$session->get('product_page');
            
            if(!$merchant_id){
                $merchant_id=Yii::$app->user->identity->id;
                $shopname=Yii::$app->user->identity->username;
                $token=Yii::$app->user->identity->auth_key;
            }
            
            if($index==0)
            {
                $jProductTotal=0;
                $not_skuTotal=0;
            }
            
	       /**GET REQUEST TO FETCH STORE PRODUCTS*/

            $products= $bigcom->get($resource); 
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
                        $noSkuFlag = 1;
                        $notSku ++;
                        continue;
                        //break;
                    }
                    
                    if(!$noSkuFlag){
                        $readyCount ++;
                        Jetproductinfo::saveNewRecords1($prod, $merchant_id, $connection, true);
                    }
                    
                }
            }
            
            if($index==$pages-1){
                $inserted="";
                $result="";
                $inserted = $connection->createCommand("SELECT `merchant_id` FROM `insert_product` WHERE merchant_id='".$merchant_id."'");
                $result = $inserted->queryOne();
                $count = $connection->createCommand("SELECT count(*) as 'count' FROM `jet_product` where merchant_id='".$merchant_id."'");
                $count = $count->queryOne();

                /**insert data into insert products*/
                if(!$result){
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
                                    "'.$jProductTotal.'",
                                    "'.$count['count'].'",
                                    "'.$not_skuTotal.'",
                                    "inserted"  
                                )';
                    $queryObj = $connection->createCommand($query)->execute();
                }else{
                    $updateQuery="UPDATE `insert_product` SET `product_count`='".$jProductTotal."' ,`total_product`='".$count['count']."', `not_sku`='".$not_skuTotal."' WHERE merchant_id='".$merchant_id."'";
                    $updated = $connection->createCommand($updateQuery)->execute();
                }   
            }
        }
        catch (BigcomApiException $e){
            return $returnArr['error'] = $e->getMessage();
        }
        catch (BigcomApiException $e){
            return $returnArr['error'] = $e->getMessage();
        }
        $returnArr['success']['count'] = $readyCount;
        $returnArr['success']['not_sku'] = $notSku;
        $returnArr['success']['not_type'] = $notType;
        $connection->close();
        return json_encode($returnArr);
    }
    public function actionGetjetdata()
	{
		$this->layout="main2";
		$sku=trim(Yii::$app->request->post('id'));
		$merchant_id=Yii::$app->request->post('merchant_id');
		$jetHelper="";
		if(!isset($connection))
		$connection=Yii::$app->getDb();
		$jetConfig=$connection->createCommand('SELECT `fullfilment_node_id`,`api_user`,`api_password` from `jet_configuration` where merchant_id="'.$merchant_id.'"')->queryOne();
		
		if($jetConfig){
			$fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
			$api_host="https://merchant-api.jet.com/api";
			$api_user=$jetConfig['api_user'];
			$api_password=$jetConfig['api_password'];
			$jetHelper = new Jetapimerchant($api_host,$api_user,$api_password);
			$responseToken ="";
			$responseToken = $jetHelper->JrequestTokenCurl();
			if($responseToken==false){
				return "Api Details are incorrect";
			}
			
			$result="";
			$response=array();
			$result=$jetHelper->CGetRequest('/merchant-skus/'.rawurlencode($sku),$merchant_id);
			$response=json_decode($result,true);
			
			if($response && !isset($response['errors']))
				$html=$this->render('viewJet',array('data'=>$response),true);
			else
				return "Error From Jet:".json_encode($response);
			return $html;
			unset($jetConfig);
			unset($jetHelper);
		}
		else
		{
			return "Api Details are incorrect";
		}
	}

  public function actionErrorjet()
	{

		$this->layout="main2";
		$sku=trim(Yii::$app->request->post('id'));
		$merchant_id=Yii::$app->request->post('merchant_id');

		$errorData=array();
		$connection=Yii::$app->getDb();
		$errorData=$connection->createCommand('SELECT `title`,`error` from `jet_product` where merchant_id="'.$merchant_id.'" AND `id`="'.$sku.'"')->queryOne();
		
 		//echo "<pre>";
 		//print_r($errorData);
 		//die;
			$html=$this->render('errorjet',array('data'=>$errorData),true);
			return $html;	
			
			$connection->close();
	}
	
	public function actionChangevariantimage(){
		
		$merchant_id=$shopname = \Yii::$app->user->identity->id;
		$this->layout="main2";
		$product_id='';
		$connection=Yii::$app->getDb();
		$product_id=Yii::$app->request->post('product_id');
		$collection=array();
		
		//echo $product_id;
		//$sql="SELECT product_id,option_id, option_image,option_sku from jet_product_variants  where product_id=".$product_id;
		
		$sql="SELECT id,merchant_id,bigproduct_id, image,sku,parent_category,jet_variant_images from jet_product  where id='".$product_id."' and merchant_id='".$merchant_id."'";
		$collection=$connection->createCommand($sql)->queryAll();
		 
		//print_r($collection);die;
		$html=$this->render('changevariantimage',array('collection'=>$collection),true);
		return $html;
		unset($connection);
	}
	
    /**ADD NEW STORE PRODUCT TO THE APP*/

	public function actionAddproduct()
    {
		
    	//die("THIS ACTION IS UNDER DEVELOPMENT");

        $connection = Yii::$app->getDb();
		$merchant_id=$shopname = \Yii::$app->user->identity->id;
        $token = \Yii::$app->user->identity->auth_key;
        $session = Yii::$app->session;
        $session->open();
        $bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);
		
       	$result = Data::sqlRecords("SELECT `id`,`product_id`,`data`,`created_at` FROM `jet_product_tmp` WHERE merchant_id='".$merchant_id."'" , "all","select");
       	
		// $resource='catalog/products/4294';
		// $product= $bigcom->get($resource);
		// print_r($product);die("fgdfg");
		
		$count=0;
		$product_qty=0;
		$attr_id="";
		$attributes_val="";
		$brand="";
		$product_sku="";
		$product_type="";
		$jProduct=0;
		$not_sku=0;
		
        foreach ($result as $key => $value) 
        {
            $product_id=$value['product_id'];
            
            $resource='catalog/products/'.$product_id.'?include=variants,images';
            $product = $bigcom->get($resource);
    		if($product['data'])
    		{
               Jetproductinfo::saveNewRecords1($product, $merchant_id, $connection, true);
               $sql="DELETE FROM `jet_product_tmp` WHERE `merchant_id`='".$merchant_id."' AND `product_id`='".$product_id."'";
                $model = $connection->createCommand($sql)->execute(); 
            }
        }
        return $this->redirect(['index']);
    }


    public function actionUpdateajax1($id)
    {
    	if (Yii::$app->user->isGuest) {
    		return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
    	}
    	if(!isset($connection)){
    		$connection=Yii::$app->getDb();
    	}
    	$model = $this->findModel($id);
    	$data=array();
    	$sku=$model->sku;
    	$merchant_id = $model->merchant_id;
    	 
    	if ($model->load(Yii::$app->request->post()))
    	{
    		/*-------------------newly added on 1 April starts----------------------------------*/
    		$product_barcode="";
    		$product_sku="";
    		$product_id="";
    		$product_upc="";
    		$product_asin="";
    		$product_mpn="";
    		$product_vendor="";
    		$return_status=[];
    		if(array_key_exists('barcode_type', $_POST['JetProduct'])){
    			$product_barcode=$_POST['JetProduct']['barcode_type'];
    		}
    		$product_id=$model->id;
    		$product_sku=$_POST['JetProduct']['sku'];
    		$product_upc=trim($_POST['JetProduct']['upc']);
    		$product_mpn=trim($_POST['JetProduct']['mpn']);
    		$product_vendor=trim($_POST['JetProduct']['brand']);
    		if($product_vendor==""){
    			$return_status['error']="Brand is required field.";
    			return json_encode($return_status);
    		}
    	}
    	
    	$connection->close();
    }

    public function actionAddcustomproduct1ac(){
    	//die("THIS ACTION IS UNDER DEVELOPMENT");
    	
    	$connection = Yii::$app->getDb();
    	$merchant_id=$shopname = \Yii::$app->user->identity->id;
    	$shopname = \Yii::$app->user->identity->username;
    	$token = \Yii::$app->user->identity->auth_key;
    	$session = Yii::$app->session;
    	$session->open();
    	
    	$store_hash = \Yii::$app->user->identity->store_hash;
    	$bigcommercemodel=Bigcommerceinfo::getShipifyinfo();
    	$client_id = $bigcommercemodel[0]['client_id'];
    	$bigcom = new BigcommerceClientHelper($client_id,$token,$store_hash);
    	
    	//$inserted = $connection->createCommand("SELECT * FROM `jet_product_tmp` WHERE merchant_id='".$merchant_id."' and data='created'");
    	//$result = $inserted->queryAll();
    	
    	// $resource='catalog/products/4294';
    	// $product= $bigcom->get($resource);
    	// print_r($product);die("fgdfg");
    	
    	$count=0;
    	$product_qty=0;
    	$attr_id="";
    	$attributes_val="";
    	$brand="";
    	$product_sku="";
    	$product_type="";
    	$jProduct=0;
    	$not_sku=0;
    	$bigproduct_id= $id=$_GET['id'];
    	
//     	$inserted = $connection->createCommand("SELECT * FROM `jet_product` WHERE merchant_id='".$merchant_id."'");
//     	$result = $inserted->queryAll();
//     	foreach ($result as $r){
//     		$inserted = $connection->createCommand("SELECT * FROM `jet_product` WHERE merchant_id='".$merchant_id."' and sku='".$r['sku']."'");
//     		$result1 = $inserted->queryAll();
    		
//     		if(count($result1)>1){
//     			foreach ($result1 as $r1){
// 	    			$sql="DELETE FROM `jet_product` WHERE merchant_id='226' and sku='".$r1['sku']."' and id='".$r1['id']."'";
// 	    			$model = $connection->createCommand($sql)->execute();
// 	    			break;
//     			}
//     		}
    		
//     	}
//     	die("fgfd");
    		
    	//echo $r['bigproduct_id'];die;
    	//oreach ($result as $key => $value) {
    	//$product_id=$value['product_id'];
    	$resource='catalog/products/'.$id.'?include=variants,images';
    	$product= $bigcom->get($resource);
    	
    	print_r($product);die;
    	
    	if($product->data)
    	{
    		$bigproduct_id=$product->data->id;
    		$brand_id=$product->data->brand_id;
    		$brand='/brands/'.$brand_id;
    		$brand=$bigcom->getData($brand);
    		$brand=$brand->name;
    		//echo $brand;
    		$product_title=$product->data->name;
    		$product_sku=$product->data->sku;
    	
    		$option=$bigcom->get('catalog/products/'.$bigproduct_id.'/options');
    	
     		if(count($option->data)>0){
     			foreach ($option->data as $opt_key=>$opt_value){
     				$id=$opt_value->id;
     				$display_name=$opt_value->display_name;
     				$arr1[]=array($id=>$display_name);
     			}
     		}
    	
     		if(isset($arr1)){
     			foreach ($arr1 as $array) {
     				foreach ($array as $key => $opvalue) {
     					$a1[$key]=$opvalue;
     				}
     			}
     		}
     		else{
     			$a1='';
     		}
     		$array_opt=$a1;
    	
//     		print_r($array_opt);
     		unset($a1);
     		unset($arr1);
    		 
    	
    		$variants=$product->data->option_set_id;
    		$product_images=$product->data->variants[0]->image_url;
    		$product_price=$product->data->price;
    		$product_des=$product->data->description;
    		$product_qty=$product->data->inventory_level;
    		$product_weight=$product->data->weight;
    		$productsaleprice=$product->data->sale_price;
    		$mpn=$product->data->bin_picking_number;
    	
    		$variantProduct=$product->data->variants;
    	
    		$product_primary_images=$product->data->images;
    		
    		if(count($product_primary_images)>0){
    		
    			foreach ($product_primary_images as $key => $image) {
    		
    				if($image->is_thumbnail==1){
    					$product_images=$image->url_zoom;
    				}
    			}
    		}
			
    		if(count($variantProduct)>0){
    			
    			$optionValues=$variantProduct[0]->option_values;
    			foreach ($optionValues as $option){
    				$id=$option->option_id;
    				$display_name=$option->option_display_name;
    				$arr1[]=array($id=>$display_name);
    				
    			}
    			
    			if(isset($arr1)){
    				foreach ($arr1 as $array) {
    					foreach ($array as $key => $opvalue) {
    						$a1[$key]=$opvalue;
    					}
    				}
    			}
    			else{
    				$a1='';
    			}
    			$array_opt=$a1;
    			 
    			//print_r($array_opt);die;
    			unset($a1);
    			unset($arr1);
    		}
    		
    		if(count($variantProduct)>0){
    	
    			$variantProduct=$product->data->variants;
    	
    			foreach ($variantProduct as $variant_product){
    	
    				$id=$variant_product->id;
    				$product_id=$variant_product->product_id;
    				$option_sku=$variant_product->sku;
    				$option_image_url=$variant_product->image_url;
    				$option_price=$variant_product->cost_price;
    	
    				if(!$option_price){
    					$option_price=$variant_product->calculated_price;
    				}
    				$option_qty=$variant_product->inventory_level;
    				$option_barcode=$variant_product->upc;
    				$option_set=$variant_product->option_values;
    	
    				foreach ($option_set as $option){
    	
    					$arr[]=array($option->option_display_name=>$option->label);
    				}
    	
    	
    				if(isset($arr)){
    					foreach ($arr as $array) {
    						foreach ($array as $key => $opvalue) {
    							$a[$key]=$opvalue;
    							$option_title=$opvalue;
    						}
    					}
    				}
    				else{
    					$a='';
    				}
    	
    				$array_var_opt=json_encode($a);
    	
    				unset($a);
    				unset($arr);
    	
    				$optionmodel = $connection->createCommand("SELECT * FROM `jet_product_variants` WHERE merchant_id='".$merchant_id."' and option_sku='".$option_sku."'");
    				$result = $optionmodel->queryOne();
     				if(!$result){
                     			if($merchant_id==222){
                     				if($option_qty){
 	                    				$sql="INSERT INTO `jet_product_variants`(`option_id`,`product_id`,`merchant_id`,`option_title`,`option_sku`,`option_image`,`option_price`,`option_qty`,`option_unique_id`,`jet_option_attributes`,`barcode_type`)
 		                                VALUES('".$id."','".$product_id."','".$merchant_id."','".addslashes($option_title)."','".addslashes($option_sku)."','".addslashes($option_image_url)."','".$option_price."','".$option_qty."','".addslashes($option_barcode)."','".addslashes($array_var_opt)."','".$type."') ON DUPLICATE KEY UPDATE `option_id`='".$id."'";
 	                    				$model = $connection->createCommand($sql)->execute();
                     				}
                     			}
                     			else{
 	                    			$sql="INSERT INTO `jet_product_variants`(`option_id`,`product_id`,`merchant_id`,`option_title`,`option_sku`,`option_image`,`option_price`,`option_qty`,`option_unique_id`,`jet_option_attributes`,`barcode_type`) 
 	                                VALUES('".$id."','".$product_id."','".$merchant_id."','".addslashes($option_title)."','".addslashes($option_sku)."','".addslashes($option_image_url)."','".$option_price."','".$option_qty."','".addslashes($option_barcode)."','".addslashes($array_var_opt)."','".$type."')
 	                                ON DUPLICATE KEY UPDATE `option_id`='".$id."'";
 	                                $model = $connection->createCommand($sql)->execute();
                     			}
                     		}
     				else{
     					$sql="UPDATE `jet_product_variants` SET `jet_option_attributes`='". $array_var_opt."' ,`option_unique_id`='".addslashes($option_barcode)."' ,`option_title`='".$option_title."' where merchant_id='".$merchant_id."' and option_sku='".$option_sku."'";
     					$model = $connection->createCommand($sql)->execute();
     				}
    				unset($array_var_opt);
    			}
    		}
    	
    	
    	
    	
    	
    		/** get product type*/
    		$category_id=$product->data->categories[0];
    	
    		$category_name='categories/'.$category_id.'';
    	
    		$category_name= $bigcom->get1($category_name);
    		 
    		$product_type=$category_name->name;
    	
    		//echo $product_type;die;
    		//$product_price=$value['variants'][0]['price'];
    		$barcode=$product->data->upc;
    	
    		if(strlen($barcode)==12){$upc=$barcode;}
    		else if (strlen($barcode)==10){$asin=$barcode;}
    	
    		//$upc=$value->upc;
    		$imagArr=array();
    		$variantArr=array();
    		 
//     		if($product_sku=="")
//     			continue;
    		if($array_opt)
    			$additional_info=array('upc_code'=>$barcode,'brand'=>addslashes($brand),'mpn'=>$mpn,'bigcom_attr'=>$array_opt);
    	
    		else
    			$additional_info=array('upc_code'=>$barcode,'brand'=>addslashes($brand),'mpn'=>$mpn);
    	        
                $additional_info=json_encode($additional_info);
    	
    	
            $countProducts = $connection->createCommand("SELECT * FROM `jet_product` WHERE merchant_id='".$merchant_id."' and bigproduct_id='".$bigproduct_id."'");
    		$count = $countProducts->queryOne();
    		if(!$count){
    			if(count($variantProduct)>1)
    			{
    				$sql="INSERT INTO `jet_product` (`merchant_id`,`bigproduct_id`,`title`,`sku`,`type`,`description`,`image`,`price`,`qty`,`attr_ids`,`status`,`vendor`,`product_type`,`weight`,`additional_info`,`ASIN`)
                    VALUES ('".$merchant_id."','".$bigproduct_id."','".addslashes($product_title)."','".addslashes($product_sku)."','variants','".addslashes($product_des)."','".addslashes($product_images)."','".$product_price."','".$product_qty."','','Not Uploaded','','".$product_type."','".$product_weight."','".$additional_info."','".$asin."')";
    				$model = $connection->createCommand($sql)->execute();
    			}
    			else if(count($variantProduct)==1)
    			{
    				//                  $sql="INSERT INTO `jet_product` (`merchant_id`,`bigproduct_id`,`title`,`sku`,`type`)
    				//                  VALUES ('".$merchant_id."','".$bigproduct_id."','".addslashes($product_title)."','".addslashes($product_sku)."','simple')";
    				//                  $model = $connection->createCommand($sql)->execute();
    	
    				$sql="INSERT INTO `jet_product` (`merchant_id`,`bigproduct_id`,`title`,`sku`,`type`,`product_type`,`image`,`qty`,`weight`,`price`,`status`,`description`)
                    VALUES ('".$merchant_id."','".$bigproduct_id."','".addslashes($product_title)."','".addslashes($product_sku)."','simple','".addslashes($product_type)."','".addslashes($product_images)."','".$product_qty."','".$product_weight."','".$product_price."','Not Uploaded','".addslashes($product_des)."')";
    	                    		$model = $connection->createCommand($sql)->execute();
    			}
    	
    			$product_tmp="UPDATE `jet_product_tmp` SET data='created' where merchant_id='".$merchant_id."' and product_id='".$bigproduct_id."'";
                $model = $connection->createCommand($product_tmp)->execute();
    	
    				Yii::$app->session->setFlash('success', "NEW product added successfully!!.");
    		}
    		else{
    	
    		$sql="UPDATE `jet_product` SET image='".$product_images."',additional_info='".$additional_info."' where merchant_id='".$merchant_id."' and bigproduct_id='".$bigproduct_id."'";
    		$model = $connection->createCommand($sql)->execute();
    		}
    		unset($array_opt);
        }
    	//}
    	//}
    				//eturn $this->redirect(['index']);
    	
    	
    	
    	
    				//eturn $this->redirect(['index']);
    	
    	
    	
    	
    	
//     	$connection = Yii::$app->getDb();
//     	$merchant_id=$shopname = \Yii::$app->user->identity->id;
    	
    	
//     	$inserted = $connection->createCommand("SELECT * FROM `jet_product` WHERE merchant_id='".$merchant_id."' and id between 79729 AND 182127");
//     	$result = $inserted->queryAll();
        
//     	//print_r($result);die;
    	
//     	foreach ($result as $v){
//     		$inserted = $connection->createCommand("SELECT * FROM `jet_product` WHERE merchant_id='".$merchant_id."' and sku='".$v['sku']."'");
//     		$result = $inserted->queryAll();
//     		$c=count($result);
//     		if($c==2){
//     			echo "gfg";
//     			foreach ($result as $r){
	    			
	    			
// 	    			$sql="DELETE FROM `jet_product` WHERE merchant_id='".$merchant_id."' and sku='".$r['sku']."'";
// 	    			$model = $connection->createCommand($sql)->execute();
// 	    			break;
//     			}
//     		}
//     	}
    	
    	
    	
    	//}
    	
    	
    	
   //eturn $this->redirect(['index']);
    }
    
    public function actionAddvariantimage($id){
    	
    	$connection = Yii::$app->getDb();
    	$merchant_id=$shopname = \Yii::$app->user->identity->id;
    	$shopname = \Yii::$app->user->identity->username;
    	$token = \Yii::$app->user->identity->auth_key;
    	$session = Yii::$app->session;
    	$session->open();
    	
    	$store_hash = \Yii::$app->user->identity->store_hash;
    	$bigcommercemodel=Bigcommerceinfo::getShipifyinfo();
    	$client_id = $bigcommercemodel[0]['client_id'];
    	$bigcom = new BigcommerceClientHelper($client_id,$token,$store_hash);
    	
    	
    	$resource='catalog/products/'.$id.'?include=variants,images';
    	$product= $bigcom->get($resource);
    	 
    	$product_primary_images=$product->data->images;
    	return $product_primary_images;
    	//print_r($product_primary_images);die("ghfdh");
    	
    	//$result=WalmartProduct::find()->where(['merchant_id'=>$merchant_id])->one();
    	 
    	//$products = $sc->call('GET', '/admin/products.json', array('published_status'=>'published','limit'=>250,'page'=>$index));
    	 
//     	$products= $bigcom->get($resource);
//     	$image=$products->images->resource;
//     	$images=$bigcom->getData($image);
//     	return $images;
    }
    
    public function actionSavevariantimage()
    {
    	// die("Cvbbcvbcbc");
    	 
    	$merchant_id=$shopname = \Yii::$app->user->identity->id;
    
    	//print_r(Yii::$app->request->isPost());die("Fdgdf");
    	if (Yii::$app->request->isPost) {
    		$files=[];
    		$id=Yii::$app->request->post('id');
    		$images=[];
    		$images=Yii::$app->request->post('image');
    
    		$model_variant="";$model_simple='';
    		//$model_variant=JetProductVariants::find()->select('option_id,option_image')->where(["option_id"=>$id , "merchant_id"=>$merchant_id])->one();
    		//$model_simple=JetProduct::find()->select('image')->where(["bigproduct_id"=>$id , "merchant_id"=>$merchant_id])->one();
    
    		$arrImage=[];
    		$finalimges=[];
    		$imageNameArr=[];
    		if(!file_exists(\Yii::getAlias('@webroot').'/upload/images/'.$merchant_id.'/'.$id)){
    			mkdir(\Yii::getAlias('@webroot').'/upload/images/'.$merchant_id.'/'.$id,0775, true);
    		}
    		$basPath=Yii::getAlias('@webroot').'/upload/images/'.$merchant_id.'/'.$id;
    		if(is_array($images) && count($images)>0){
    			//     			foreach ($images as $key => $value)
    				//     			{
    				//     				$imageNameArr[$value]='upload/images/'.$merchant_id.'/'.$id.'/'.$key;
    				//     			}
    				//     			$imageModel='';
    				//     			$imageModel=UploadedFile::getInstancesByName('files');
    				//     			if(is_array($imageModel) && count($imageModel))
    					//     			{
    					//     				foreach ($imageModel as $key => $value)
    						//     				{
    						//     					$url=[];
    						//     					$url=pathinfo($value->name);
    						//     					$value->saveAs($basPath.'/'.$url['basename']);
    						//     				}
    						//     			}
    						//     			ksort($imageNameArr);
    						//     			$finalimges=array_values($imageNameArr);
    
    						foreach ($images as $k=>$img){
    								
    							$finalimges[]=$img;
    						}
    						 
    						//$model_variant->option_image=implode(",",$finalimges);
    						//$model_variant->save(false);
    						//if ($model_simple !=''){
    						$updateImg="UPDATE  `jet_product` SET `jet_variant_images`='".implode(",",$finalimges)."'  where  id='".$id."' and merchant_id='".$merchant_id."'";
    						$collection=Yii::$app->getDb()->createCommand($updateImg)->execute();
    						
    						self::actionImageupload($id);
    						//}
    						return "image updated successfully";
    			}
    		}
    	}
    	
    	public function actionStartbatchupdate()
    	{
    		$merchant_id ="";
    		$merchant_id = \Yii::$app->user->identity->id;
    		$message="";
    		$index=Yii::$app->request->post('index');
    		if($index==''){
    			$index=0;
    		}
    		$return_msg['success']="";
    		$return_msg['error']="";
    		
    		$productAll=array();
    		$session = Yii::$app->session;
    		$productAll=array();
    		$jetconfig=array();
    		$productAll=unserialize($session->get('updateproductAll'));
    		$jetconfig=unserialize($session->get('jetconfig'));
            $fullfillmentnodeid=$jetconfig['fulfillment_node_id'];
            $api_host="https://merchant-api.jet.com/api";
            $api_user=$jetconfig['api_user'];
            $api_password=$jetconfig['api_password'];
            $jetHelper = new Jetapimerchant($api_host,$api_user,$api_password);
    		if(!isset($connection)){
    			$connection = Yii::$app->getDb();
    		}
    		
    		$merchant_id ="";
    		$merchant_id = \Yii::$app->user->identity->id;
    		
    		//$model = new JetConfiguration();
    		$configSetting = Jetproductinfo::getConfigSettings($merchant_id, $connection);
    		$pid=0;
    		$productLoad="";
    		$productLoad=$productAll[$index];
    		$prodExist=array();			
    		$prodExist=$connection->createCommand("SELECT * FROM `jet_product` WHERE sku='".$productLoad['sku']."'AND merchant_id='".$merchant_id."'")->queryOne();
    		if($prodExist)
    		{
    			$bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);
    			$resource='catalog/products/'.$prodExist['bigproduct_id'].'?include=variants,images';
    			$product= $bigcom->get($resource);
                if($product['status']==404)
                {
                    if($prodExist['status']!="Not Uploaded")
                    {
                        $message=Jetproductinfo::archiveProductOnJet($prodExist['sku'],$jetHelper,$merchant_id);
                    }
                    $delprod="DELETE FROM `jet_product` WHERE bigproduct_id='".$prodExist['bigproduct_id']."'AND merchant_id='".$merchant_id."'";
                    $model = $connection->createCommand($delprod)->execute();
                    $return_msg['error']="Product sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$product_sku."</a>"." is not available on bigcommerce.";
                    return json_encode($return_msg);
                }
    			$product_qty=0;
    			$product_sku="";
    			
    			
    			if($product['data'])
    			{
    				$value = $product['data'];
    				 
    				$bigproduct_id = $value['id'];
    				$product_sku = $value['sku'];
    				$variants = $value['option_set_id'];
    				 
    				$product_title=$value['name'];
    				 
    				$brand_id=$value['brand_id'];
    				$brand='/brands/'.$brand_id;
    				/** BRAND NAME */
                    $brand=$bigcom->getData($brand);
                    
                    $brandname='';
                    if(array_key_exists('name',$brand))
                     {
                         $brandname=$brand['name'];
                     }

                     $product_price = (float)$value['variants'][0]['price'];
    				 
    				/**sales price*/
                    $productsaleprice=$connection->createCommand('SELECT `data`,`value` from `jet_config` where merchant_id="'.$merchant_id.'" AND data="sale_price"  ')->queryOne();
                    if($productsaleprice['value']=='yes'){
                        $product_price=$data['sale_price'];
                     }
    					
    				$product_qty = $value['inventory_level'];
    				$mpn = $value['bin_picking_number'];
    				 
    				if($value['variants'][0]['sku']==""){
                    return;
                    }
                    if(isset($value['images']))
                        $images = $value['images'];
                    $product_id = $value['id'];

                    $imagArr = array();
                    if(is_array($images) && count($images)){
                        foreach ($images as $valImg)
                        {
                            $imagArr[]=$valImg['url_zoom'];
                        }
                        $product_images = implode(',',$imagArr);
                    }

                    $product_primary_images=$value['images'];
                        /**THUMBNAIL IMAGE */
                    if(count($product_primary_images)>0){

                        foreach ($product_primary_images as $key => $image) {

                            if($image['is_thumbnail']==1){
                                $product_images=$image['url_zoom'];
                            }
                        }
                    }

                    $variantProduct=$value['variants'];
                    if(count($value['variants'])>0){
                        $optionValues=$variantProduct[0]['option_values'];
                        foreach ($optionValues as $option){
                            $id=$option['option_id'];
                            $display_name=$option['option_display_name'];
                            $arr1[]=array($id=>$display_name);
                    
                        }
                         
                        if(isset($arr1)){
                            foreach ($arr1 as $array) {
                                foreach ($array as $key => $opvalue) {
                                    $a1[$key]=$opvalue;
                                }
                            }
                        }
                        else{
                            $a1='';
                        }
                        $array_opt=$a1;
                    
                        unset($a1);
                        unset($arr1);
                    }
    				 
    				$product_des=$value['description'];
    				$product_weight=$value['weight'];
    				 
    				$variantProduct=$value['variants'];
    				 
    				 
    				 
    				if(count($variantProduct)>1)
    				{
    					foreach ($variantProduct as $variant_product)
    					{
    						$id=$variant_product['id'];
    						$product_id=$variant_product['product_id'];
    						$option_sku=$variant_product['sku'];
    						$option_price=$variant_product['price'];
    						 
    						if(!$option_price){
    							$option_price=$variant_product['calculated_price'];
    						}
    						$option_qty=$variant_product['inventory_level'];
    						$option_barcode=$variant_product['upc'];
    						$optionmodel = $connection->createCommand("SELECT * FROM `jet_product_variants` WHERE merchant_id='".$merchant_id."' and option_sku='".$option_sku."'");
    						$result = $optionmodel->queryOne();
    						if($result){
    			
    							if(!isset($configSetting['fixed_price']) || (isset($configSetting['fixed_price']) && $configSetting['fixed_price']=='no'))
    							{
    								$sql="UPDATE `jet_product_variants` SET option_unique_id='".addslashes($option_barcode)."' ,option_qty='".$option_qty."',`option_price`=".$option_price." where merchant_id='".$merchant_id."' and option_sku='".$option_sku."'";
    			
    							}
    							else
    							{
    								$sql="UPDATE `jet_product_variants` SET option_unique_id='".addslashes($option_barcode)."' ,option_qty='".$option_qty."' where merchant_id='".$merchant_id."' and option_sku='".$option_sku."'";
    			
    							}
    							$model = $connection->createCommand($sql)->execute();
                                Jetproductinfo::updateQtyOnJet($option_sku,$option_qty,$jetHelper,$fullfillmentnodeid,$merchant_id);
    							unset($sql);unset($model);
    						}
    					}
    				}
    				 
    				$category_id=$value['categories'][0];
    				 
    				$category_name='categories/'.$category_id.'';
    				 
    				$category_name= $bigcom->get1($category_name);
    			
    				$product_type=$category_name['name'];
    				 
    				$asin='';
                    $upc='';
                    /** GET BARCODE/ASIN */
                    $barcode=$value['variants'][0]['upc'];
                   
                    if(strlen(trim($barcode))==10)
                        $asin=$barcode;
                    else if(strlen(trim($barcode))>10)
                        $upc=$barcode;
    				 
                     
                     $productmodel = $connection->createCommand("SELECT * FROM `jet_product` WHERE bigproduct_id='".$bigproduct_id."' and sku='".$product_sku."' and merchant_id='".$merchant_id."' ");
                    $result = $productmodel->queryOne();
                    if($result)
                    {
                        if($result['status']!="Not Uploaded")
                        {
                            $inv=array();
                            $inventory=array();
                            $inv['fulfillment_node_id']=$fullfillmentnodeid;
                            $inv['quantity']=(int)$product_qty;
                            $inventory['fulfillment_nodes'][]=$inv;
                            $responseInventory="";
                            $response = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($product_sku).'/inventory',json_encode($inventory),$merchant_id);
                            $responseInventory = json_decode($response,true);
                            print_r($responseinventry);
                            if(isset($responseInventory['errors'])){
                            $message.=  "Not on Jet";
                                //return $sku."=>".$responseInventory['errors'];
                            }
                            $message.= "On jet";
                        }
        				if(!isset($configSetting['fixed_price']) || (isset($configSetting['fixed_price']) && $configSetting['fixed_price']=='no'))
                        {
                            
                          $sql = "UPDATE `jet_product` SET `bigproduct_id`='".$bigproduct_id."',`title`='".addslashes($product_title)."',`sku`='".addslashes($product_sku)."',`product_type`='".addslashes($product_type)."',`image`='".$product_images."',`qty`='".$product_qty."',`weight`='".$product_weight."',`description`='".addslashes($product_des)."',`brand`='".addslashes($brandname)."',`ASIN`='".$asin."',`upc`='".$upc."',`price`='".$product_price."',`bigcom_attr`='".addslashes(json_encode($array_opt))."' where merchant_id='".$merchant_id."' and sku='".$product_sku."'";         
                        }
                        else{
                           $sql = "UPDATE `jet_product` SET `bigproduct_id`='".$bigproduct_id."',`title`='".addslashes($product_title)."',`sku`='".addslashes($product_sku)."',`product_type`='".addslashes($product_type)."',`image`='".$product_images."',`qty`='".$product_qty."',`weight`='".$product_weight."',`description`='".addslashes($product_des)."',`brand`='".addslashes($brandname)."',`ASIN`='".$asin."',`upc`='".$upc."',`bigcom_attr`='".addslashes(json_encode($array_opt))."' where merchant_id='".$merchant_id."' and sku='".$product_sku."'";    
                        }
    						
    				    $model = $connection->createCommand($sql)->execute();
                    }
                   
                    
    				unset($sql);unset($model);
    				$return_msg['success']="Product with sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$product_sku."</a>"." is successfully updated on app.";
    				return json_encode($return_msg);
    				 
    			}
    		}
    		else{
    			$return_msg['error']="Product sku : "."<a href='".Yii::$app->request->baseUrl.'/jetproduct/update?id='.$pid."' target='_blank'>".$product_sku."</a>"." is not updated on app.";
    			return json_encode($return_msg);
    		}
    	}

    public function actionRenderCategoryTab()
    {
        $this->layout="main2";

        $session = Yii::$app->session;

        $html = '';

        $id = Yii::$app->request->post('id');
        if($id)
        {
            $session_key = 'product'.$id;
            $product = $session[$session_key];
            
            if(is_array($product))
            {
                $model = $product['model'];
                $connection = $product['connection'];
                $merchant_id = $product['merchant_id'];

                $attributes=[];
                if(API_USER)
                {
                    $fullfillmentnodeid=FULLFILMENT_NODE_ID;
                    $api_host=API_HOST;
                    $api_user=API_USER;
                    $api_password=API_PASSWORD;
                    $jetHelper = new Jetapimerchant($api_host,$api_user,$api_password);
                    $response = $jetHelper->CGetRequest('/taxonomy/nodes/'.$model->jet_browse_node.'/attributes',$merchant_id);
                    $attributes=json_decode($response,true);
                   
                }

                $merchantCategory = $connection->createCommand("SELECT `title`,`parent_title`,`root_title` FROM `jet_category` WHERE category_id='".$model->jet_browse_node."'")->queryOne();

                $html = $this->render('category_tab2',[
                                'model' => $model,
                                'connection'=>$connection,
                                'merchantCategory'=>$merchantCategory,
                                'attributes'=>$attributes
                            ]);
            }
        }
        //$session->close();
        return json_encode(['html'=>$html]);
    }

    /*  Dynamic price start */
    public function actionDynamicprice()
    {
        $this->layout="main2";
        $product_id = trim(Yii::$app->request->post('id'));
        $product_type = trim(Yii::$app->request->post('type'));
        $product_title = trim(Yii::$app->request->post('title'));
        $merchant_id = MERCHANT_ID;
        if ($product_type=='simple') 
        {
            $sql = "SELECT `sku`,`price`,`bigproduct_id` FROM `jet_product` WHERE merchant_id='{$merchant_id}' AND id='{$product_id}' ";
        }else if ($product_type=='variants') 
        {
            $sql = "SELECT `option_sku`,`option_price`,`option_id` FROM `jet_product` inner join `jet_product_variants` on `jet_product`.`bigproduct_id` = `jet_product_variants`.`product_id` WHERE `jet_product`.`merchant_id` ='{$merchant_id}' AND `jet_product`.`bigproduct_id`='{$product_id}' ";
        }

        $details = Data::sqlRecords($sql,'all','select');
        if (!empty($details)) 
        {
            $html = $this->render(
                'dynamicpricing',
                [
                    'id'=>$product_id,
                    'product_title'=>$product_title,
                    'type'=>$product_type,
                    'model'=>$details,
                ],
                true
            );
        }else{
            $html = "No records found";
        }                
        return $html;
    }

    public function actionGetskudetails()
    {
        $this->layout="main2";
        $sku = trim(Yii::$app->request->post('sku'));
        $jetHelper = new Jetapimerchant(API_HOST,API_USER,API_PASSWORD);
        $rawDetails = $jetHelper->CGetRequest('/merchant-skus/'.$sku.'/salesdata',MERCHANT_ID);
        $rawDetails = json_decode($rawDetails,true);
        $html = $this->render(
            'skudetails',
            [                    
                'details'=>$rawDetails,
            ],
            true
        );                       
        return $html;
    }   

    public function actionUpdatedynamicprice($id)
    {
        $merchant_id = MERCHANT_ID;
        $details = Yii::$app->request->post();
        $return_status = array();
        if ($details) 
        {            
            foreach ($details['sku'] as $key => $value) 
            {
                $min_price = trim($value['sku_min_price']);
                $current_price = trim($value['sku_current_price']);
                $max_price = trim($value['sku_max_price']);
                $bid_price = trim($value['sku_bid_price']);                
                /*if (($min_price>$current_price) || ($max_price<$current_price) ) 
                {
                    $return_status['error']=" Please Enter valid price (Min price must be less than current Price and Max price must be greater than current price)";
                    return json_encode($return_status);
                }*/
                Data::saveDynamicPricevalue($merchant_id,$id,$key,$min_price,$current_price,$max_price,$bid_price);                
            }                           
        }
        $return_status['success']="Product Repricing Data Saved successfully...";
        return json_encode($return_status);
    }
    /*  Dynamic price end */

    public function actionUpc()
    {
         $merchant_id = MERCHANT_ID;
        $connection=Yii::$app->getDb();
        $sql = "SELECT `upc`,`sku` FROM `jet_product` WHERE LENGTH(upc) = 11 AND `merchant_id`='319'";
        $details = Data::sqlRecords($sql,'all','select');
        foreach ($details as $key => $value) {
          $upc = "0".$value['upc'];
           $sql1 = "UPDATE `jet_product` SET `upc`='".$upc."' where merchant_id='319' and sku='".$value['sku']."'";
           $model = $connection->createCommand($sql1)->execute();
           unset($upc); 
        }
       
    }

    public function actionPricefile()
    {
        $merchant_id = MERCHANT_ID;
        $bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);
        $sql = "SELECT `qty`,`sku`,`price`,`bigproduct_id` FROM `jet_product` WHERE `merchant_id`='".$merchant_id."'";

        $details = Data::sqlRecords($sql,'all','select');
        foreach($details as $value)
        {
            $sku = $value['sku'];
            $resource='catalog/products/'.$value['bigproduct_id'].'?include=variants,images';
            $product= $bigcom->get($resource);
            $finalprice = $product['data']['sale_price'];
            $price[$sku]['price']=(float)$finalprice;
            $node['fulfillment_node_id']=FULLFILMENT_NODE_ID;
            $node['fulfillment_node_price']=(float)$finalprice;
            $price[$sku]['fulfillment_nodes'][]=$node;
            unset ($finalprice);
        }

        $pricePath = $this->createJsonFile( "Price", $price);

        $filename = explode("/", $pricePath);
        $filename = array_reverse($filename);
        $pricePath = $pricePath.".gz";
        $jetHelper = new Jetapimerchant(API_HOST,API_USER,API_PASSWORD);
        $response = $jetHelper->CGetRequest('/files/uploadToken',MERCHANT_ID);
        $data = json_decode($response,true);

        $response1 = $jetHelper->uploadFile($pricePath,$data['url']);
        $postFields='{"url":"'.$data['url'].'","file_type":"Price","file_name":"'.$filename[0].'"}';
        $responseinventry = $jetHelper->CPostRequest('/files/uploaded',$postFields,MERCHANT_ID);
                            
        $pricedata=json_decode($responseinventry);
            
        print_r($pricedata);die;
    }

    public function actionInventoryfile()
    {
        $merchant_id = MERCHANT_ID;
        $bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);
        $sql = "SELECT `qty`,`sku`,`price`,`bigproduct_id` FROM `jet_product` WHERE `merchant_id`='".$merchant_id."' AND `status`='Unauthorized'";

        $details = Data::sqlRecords($sql,'all','select');
        foreach($details as $value)
        {
            /*$resource='catalog/products/'.$value['bigproduct_id'].'?include=variants,images';
            $product= $bigcom->get($resource);
            $quantity=0;
            if($product['status']==404)
            {
                $quantity='0';
            }
            else{
                $quantity = $product['data']['inventory_level'];
            }*/
           /* if($value['qty']==0)
            {
                $qty = -1;
            }
            else{
                $qty = +1;
            }*/
            
            $node1['fulfillment_node_id']=FULLFILMENT_NODE_ID;
            $node1['quantity']=(int)$value['qty'];
            $inventory[$value['sku']]['fulfillment_nodes'][]=$node1;
           
        }
        $inventoryPath = $this->createJsonFile( "Inventory", $inventory);

        $filename = explode("/", $inventoryPath);
        $filename = array_reverse($filename);
        $inventoryPath = $inventoryPath.".gz";
        $jetHelper = new Jetapimerchant(API_HOST,API_USER,API_PASSWORD);
        $response = $jetHelper->CGetRequest('/files/uploadToken',MERCHANT_ID);
        $data = json_decode($response,true);

        $response1 = $jetHelper->uploadFile($inventoryPath,$data['url']);
        $postFields='{"url":"'.$data['url'].'","file_type":"Inventory","file_name":"'.$filename[0].'"}';
        $responseinventry = $jetHelper->CPostRequest('/files/uploaded',$postFields,MERCHANT_ID);
                            
        $invetrydata=json_decode($responseinventry);
            
        print_r($invetrydata);die;
            
    }

    public function createJsonFile($type, $data){
            $t=time();

            $finalskujson= json_encode($data);         
            $newJsondata = $finalskujson;
            $file_path = Yii::getAlias('@webroot').'/var/product/295/';
            if(!file_exists($file_path)){
                mkdir($file_path,0775, true);
            }
            $file_type = $type;
            $file_name=$type.$t.".json";
            $handle=fopen($file_path.'/'.$file_name,'a');
            fwrite($handle, $newJsondata);
            fclose($handle);
            
            $dest = $this->gzCompressFile($file_path.$file_name,9);
            
            return $file_path.$file_name;
    }

    public function gzCompressFile($source, $level = 9){
        $dest = $source . '.gz';
        $mode = 'wb' . $level;
        $error = false;
        if ($fp_out = gzopen($dest, $mode)) {
        if ($fp_in = fopen($source,'rb')) {
        while (!feof($fp_in))
            gzwrite($fp_out, fread($fp_in, 1024 * 512));
                fclose($fp_in);
            } else {
                $error = true;
            }
                gzclose($fp_out);
            } else {
                $error = true;
            }
        if ($error)
            return false;
        else
            return $dest;
        }

        public function actionTesting()
    {

            $connection = Yii::$app->getDb();
            
            $countProducts=0;$pages=0;
            
            //$countProducts=$sc->call('GET', 'https://www.mygreenoutdoors.com/api/v2/products/count');
            $merchant_id=$shopname = \Yii::$app->user->identity->id;
            $session = Yii::$app->session;
            $session->open();
               
            $bigcom = new BigcommerceClientHelper(JET_APP_KEY,TOKEN,STOREHASH);
            $resource='catalog/products?include=variants,images&inventory_level=0&limit=250';        
            $countUpload=$bigcom->get($resource);
            $countProducts=$countUpload['meta']['pagination']['total'];         
            $pages=$countUpload['meta']['pagination']['total_pages'];           
            $session ="";
            $session = Yii::$app->session;
            if(!is_object($session)){
                Yii::$app->session->setFlash('error', "Can't initialize Session.Product(s) upload cancelled.");
                return $this->redirect(['index']);
            }
            $session->set('product_page',$pages);
            $session->set('bigcom_object', serialize($bigcom));
            $session->set('merchant_id',$merchant_id);
            $session->close();
            unset($jetConfigarray);
            return $this->render('productupdate', [
                    'totalcount' => $countProducts,
                    'pages'=>$pages
            ]);
        
        }

    public function actionProductupdating()
    {
        $index=Yii::$app->request->post('index');
        $countUpload=Yii::$app->request->post('count');
        try
        {
            $session = Yii::$app->session;
            if(!isset($connection)){
                $connection=Yii::$app->getDb();
            }

          /*  $store_hash = \Yii::$app->user->identity->store_hash;
            $bigcommercemodel=Bigcommerceinfo::getShipifyinfo();
            $client_id = $bigcommercemodel[0]['client_id'];
            $bigcom = new BigcommerceClientHelper($client_id,$token,$store_hash);*/
            $pages=$session->get('product_page');
            $bigcom=unserialize($session->get('bigcom_object'));
            $merchant_id=$session->get('merchant_id');
            if(!$merchant_id){
               $merchant_id = MERCHANT_ID;
               $shopname=SHOP;
               $token=TOKEN;
            }
            if($index==1)
            {
                $jProductTotal=0;
                $not_skuTotal=0;
            }

            $resource='catalog/products?include=variants,images&inventory_level=0&limit=50&page='.$index.'';
            $product = $bigcom->get($resource);
            if($product['data'])
            {
                foreach ($product['data'] as $value) 
                {
                    
                    $bigproduct_id=$value['id'];

                    
                    $product_qty=$value['inventory_level'];
                    
                    $product_sku=$value['variants'][0]['sku'];
                    
                    
                   
                    if($product_sku=="")
                        continue;
                    
                    $connection = Yii::$app->getDb();
                    
                    $countProducts = $connection->createCommand("SELECT * FROM `jet_product` WHERE merchant_id='".$merchant_id."' and bigproduct_id='".$bigproduct_id."' and status!='Not Uploaded'");
                    $count = $countProducts->queryOne();
                    
                    if($count)
                    {
                        $sql="UPDATE `jet_product` SET qty='". $product_qty."' where merchant_id='".$merchant_id."' and bigproduct_id='".$bigproduct_id."' and sku='".addslashes($product_sku)."'";
                            $model = $connection->createCommand($sql)->execute();
                        $jetConfig=array();$jetHelper='';$jetHelperFlag=false;
                    $jetConfig=$connection->createCommand('SELECT `fullfilment_node_id`,`api_user`,`api_password` from `jet_configuration` where merchant_id="'.$merchant_id.'"')->queryOne();
                    if($jetConfig)
                    {
                        $jetHelperFlag = true;
                        $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
                        $api_host="https://merchant-api.jet.com/api";
                        $api_user=$jetConfig['api_user'];
                        $api_password=$jetConfig['api_password'];
                        $jetHelper = new Jetapimerchant($api_host,$api_user,$api_password);
                        $responseToken ="";
                        $responseToken = $jetHelper->JrequestTokenCurl();
                        if($responseToken==false){
                            $jetHelperFlag = false;
                            //return "Api Details are incorrect";
                        }
                    }
                            
                    $message= Jetproductinfo::updateQtyOnJet($product_sku,$product_qty,$jetHelper,$fullfillmentnodeid,$merchant_id);

                    }
             
                    $jProductTotal+=$jProduct;
                    $not_skuTotal+=$not_sku;
                    unset($result);
                    unset($product);
                }
            
            }
        }
        catch (ShopifyCurlException $e)
        {
            return $returnArr['error']=$e->getMessage();
        }

        return json_encode($message);
    }
    
}
