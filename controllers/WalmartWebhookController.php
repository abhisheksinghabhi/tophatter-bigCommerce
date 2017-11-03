<?php
namespace frontend\modules\walmart\controllers;

use common\models\User;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\Jetapimerchant;
use frontend\modules\walmart\components\Jetappdetails;
use frontend\modules\walmart\components\Jetproductinfo;
use frontend\modules\walmart\components\Sendmail;
use frontend\modules\walmart\components\Generator;
use frontend\modules\walmart\components\BigcommerceClientHelper;
use frontend\modules\walmart\models\JetConfig;
use frontend\modules\walmart\models\JetOrderImportError;
use frontend\modules\walmart\models\WalmartShopDetails;
use frontend\modules\walmart\models\WalmartExtensionDetail;
use Yii;
use yii\web\Controller;
use frontend\modules\walmart\components\Walmartapi;

class WalmartWebhookController extends Controller
{
	public function beforeAction($action)
	{
		Yii::$app->controller->enableCsrfValidation = false;				
		return true;
	}

	public function actionProductupdate()
	{
		$productColection = Yii::$app->request->post();
		if(isset($productColection['product']))
		{
			$product=json_decode($productColection['product'],true);
			if(isset($product['shopName']))
			{
				$shopName = $product['shopName'];
				$merchant_id = $product['merchant_id'];
				$bigcom=new BigcommerceClientHelper($product['api_key'],$product['token'],$product['storehash']);
				$syncConfigJson = Data::getConfigValue($merchant_id,'sync-fields');
				if($syncConfigJson)
				{
					$checkConfig = true;
					$syncFields = json_decode($syncConfigJson,true);
				}
				else
				{
					$sync_fields = [
						    'sku' => '1',
						    'title' => '1',
						    'image' => '1',
						    'inventory' => '1',
						    'weight' => '1',
						    'price' => '1',
						    'upc' => '1',
						    'description' => '1',
						    'variant_options' => '1',
						];
					$syncFields['sync-fields']=$sync_fields;
				}
				Jetproductinfo::updateDetails($product,$syncFields,$merchant_id,$bigcom,true);
			}
			else
			{
				Data::createLog("Product Update error wrong post");
			}
		}
		else
		{
			Data::createLog("Product Update error wrong post");
		}
	}
	
	public function actionCurlprocessforproductinventory()
	{
		$data = $_POST;
		
		$connection = Yii::$app->getDb();
		if(isset($data['shopName']) && isset($data['data']['inventory']['product_id']))
		{
			$file_dir = \Yii::getAlias('@webroot').'/var/walmart/product/simple-inventory/'.$data['shopName'].'/'.date('d-m-Y');
    		if (!file_exists($file_dir)){
    			mkdir($file_dir,0775, true);
    		} 	
    		
    		$filenameOrig="";
    		$filenameOrig=$file_dir.'/'.$data['data']['id'].'.log';
    		$fileOrig="";
    		$fileOrig=fopen($filenameOrig,'w+');
    		fwrite($fileOrig,"\n".date('d-m-Y H:i:s')."\n".json_encode($data));
    		fclose($fileOrig);
    		
    		$query="SELECT * FROM `user` WHERE username='".$data['shopName']."' LIMIT 0,1";
    		
    		$userCollection=Data::sqlRecords($query,"one","select");
    		
    		if (isset($userCollection['id'])){
    			$merchant_id = $userCollection['id'];
    		}
    		else {
    			return false;
    		}
    		
    		$prodExist=array();
    		$prodExist=Data::sqlRecords("SELECT * FROM `jet_product` WHERE bigproduct_id='".$data['data']['inventory']['product_id']."'AND merchant_id='".$merchant_id."' LIMIT 0,1","one","select");
    		
    		$prodExistonWalmart=Data::sqlRecords("SELECT * FROM `walmart_product` WHERE product_id='".$data['data']['inventory']['product_id']."'AND merchant_id='".$merchant_id."' LIMIT 0,1","one","select");
    		
    		$productOnWalmart=false;
    		if ($prodExistonWalmart['status']!='Not Uploaded')
    		{
    			$productOnWalmart=true;
    		}
    		
    		if($prodExist)
    		{
    			$product_sku=$prodExist['sku'];
    			$product_qty = $data['data']['inventory']['value'];
    		
    			$filenameOrig="";
    			$filenameOrig=$file_dir.'/'.$data['data']['inventory']['product_id'].'inventory.log';
    			$fileOrig="";
    			$fileOrig=fopen($filenameOrig,'w+');
    			fwrite($fileOrig,"\n".date('d-m-Y H:i:s')."\n".json_encode($data));
    			fclose($fileOrig);
    		
    			$sql = "UPDATE `jet_product` SET `qty`='".$product_qty."' where merchant_id='".$merchant_id."' and bigproduct_id='".$data['data']['inventory']['product_id']."'";
    			 
    			Data::sqlRecords($sql,null,'update');
    			 
    			if ($productOnWalmart) {
    				
    				$product=Data::sqlRecords('select jet.bigproduct_id,sku,type,qty,fulfillment_lag_time from `walmart_product` wal INNER JOIN `jet_product` jet ON jet.bigproduct_id=wal.product_id where wal.status!="Not Uploaded" and wal.merchant_id="'.$merchant_id.'" and jet.merchant_id="'.$merchant_id.'" and wal.product_id="'.$data['data']['inventory']['product_id'].'"',"all","select");
                    		
    				$filenameOrig="";
    				$filenameOrig=$file_dir.'/'.$data['data']['inventory']['product_id'].'inventory1.log';
    				$fileOrig="";
    				$fileOrig=fopen($filenameOrig,'w+');
    				fwrite($fileOrig,"\n".date('d-m-Y H:i:s')."\n".json_encode($product));
    				fclose($fileOrig);
    				$walConfig = Data::sqlRecords("SELECT `consumer_id`,`secret_key`,`consumer_channel_type_id` FROM `walmart_configuration` WHERE merchant_id='".$merchant_id."'", 'one');
    				
    				if($walConfig)
    				{
    					$product=json_decode($product);
    					
    					$filenameOrig="";
    					$filenameOrig=$file_dir.'/'.$data['data']['inventory']['product_id'].'inventory2.log';
    					$fileOrig="";
    					$fileOrig=fopen($filenameOrig,'w+');
    					fwrite($fileOrig,"\n".date('d-m-Y H:i:s')."\n".json_encode($product));
    					fclose($fileOrig);
    					
    					
    					define("CONSUMER_CHANNEL_TYPE_ID",'7b2c8dab-c79c-4cee-97fb-0ac399e17ade');
    						
    					$updateFeed = new Walmartapi($walConfig['consumer_id'], $walConfig['secret_key'], CONSUMER_CHANNEL_TYPE_ID);
    					$feed_data = $updateFeed->updateInventoryOnWalmart($product,'product');
    				}
    			}
    			unset($model);
    			unset($sql);
    			 
    		}
    		else {
    			foreach ($product as $prod){
    				$filenameOrig="";
    				$filenameOrig=$file_dir.'/'.$data['data']['inventory']['product_id'].'create.log';
    				$fileOrig="";
    				$fileOrig=fopen($filenameOrig,'w+');
    				fwrite($fileOrig,"\n".date('d-m-Y H:i:s')."\n".json_encode($product));
    				fclose($fileOrig);
    				Jetproductinfo::saveNewRecords($prod,$merchant_id,$connection,$token,$userCollection['store_hash'],true);
    			}
    		}
		}
	}
	
	/**
	 * Inventory Update Action
	 */
	public function actionInventoryupdate()
	{

		$data = Yii::$app->request->post();
		if(is_array($data) && count($data)>0){
			$first_index_data = current($data);
	        $merchant_id = $first_index_data['merchant_id'];
	        $logFIle = 'product/inventoryupdate/'.$merchant_id.'/'.time();
			Data::createLog('Update Inventory Data: '.json_encode($data),$logFIle,'a');
			
	        $config = Data::getConfiguration($merchant_id);
	        $obj = new Walmartapi($config['consumer_id'],$config['secret_key'],'7b2c8dab-c79c-4cee-97fb-0ac399e17ade');
	        foreach ($data as $key => $value) {
	        	$id = Data::getProductId($value['sku'],$merchant_id);
	        	$fulfillment_lag_time = Data::getFulfillmentlagtime($id,$merchant_id);
		        $value['fulfillment_lag_time'] = $fulfillment_lag_time;
	        	$inventoryArray = [];
		      	$inventoryArray = [
	            'wm:inventory' => [
	                '_attribute' => [
	                    'xmlns:wm' => "http://walmart.com/",
	                ],
	                '_value' => [
	                ]
	                ]
	            ];
		        $keys = 1;
		        $this->prepareInventoryData($inventoryArray,$value);
		        if (!file_exists(\Yii::getAlias('@webroot') . '/var/walmart/inventoryxml/' . $merchant_id . '/updateinventory')) {
		            mkdir(\Yii::getAlias('@webroot') . '/var/walmart/inventoryxml/' . $merchant_id . '/updateinventory', 0775, true);
		        }
		        $file = Yii::getAlias('@webroot') . '/var/walmart/inventoryxml/' . $merchant_id . '/updateinventory/MPProduct-' . time() . '.xml';
		        
		        $xml = new Generator();
		        $xml->arrayToXml($inventoryArray)->save($file);
		        
		        $response = $obj->postRequest(Walmartapi::GET_FEEDS_INVENTORY_SUB_URL, ['file' => $file]);
		        
		       /* $response = $obj->putRequest(Walmartapi::GET_FEEDS_INVENTORY_SUB_URL, ['file' => $file]);*/
		        //$responseArray = Walmartapi::xmlToArray($response);
	        }
		}
		else
		{
			Data::createLog("Product Inventory error wrong post");
		}

	}
	/**
	 * Price Update Action
	 */
	public function actionPriceupdate()
	{
		$data = Yii::$app->request->post();
		if(is_array($data) && count($data)>0){
			$first_index_data = current($data);
	        $merchant_id = $first_index_data['merchant_id'];
	        $currency = Data::getConfiguration($merchant_id);
	        $logFIle = 'product/priceupdate/'.$merchant_id.'/'.time();
			Data::createLog('Update Price Data: '.json_encode($data),$logFIle,'a');
	        $config = Data::getConfiguration($merchant_id);
	        $obj = new Walmartapi($config['consumer_id'],$config['secret_key']);
	        foreach ($data as $key => $value) 
	        {
                //walmart product price
                $type = Data::getProductType($key,$merchant_id);
                if($type)
                {
                	if($type=='simple')
                	{
                		$price = Data::getWalmartPrice($value['product_id'], $merchant_id);
		                /*if (isset($price['product_price']) && !empty($price)) {
		                    $value['price'] = WalmartRepricing::getProductPrice($price['product_price'], 'simple', $value['product_id'], $merchant_id);

		                }
		                else{
		                	$value['price'] = WalmartRepricing::getProductPrice($value['price'], 'simple', $value['product_id'], $merchant_id);
		                }*/
                	}
                	else
                	{
                		$price = Data::getWalmartPrice($key, $merchant_id);
		                /*if (isset($price['product_price']) && !empty($price)) {
		                    $value['price'] = WalmartRepricing::getProductPrice($price['product_price'], 'simple', $key, $merchant_id);

		                }
		                else{
		                	$value['price'] = WalmartRepricing::getProductPrice($value['price'], 'simple', $key, $merchant_id);
		                }*/
                	}
		        	$priceArray = [];
			        $priceArray = [
			            'PriceFeed' => [
			                '_attribute' => [
			                    'xmlns:gmp' => "http://walmart.com/",
			                ],
			                '_value' => [
			                    0 => [
			                        'PriceHeader' => [
			                            'version' => '1.5',
			                        ],
			                    ],
			                ]
			            ]
			        ];
			        $keys = 1;
			        $priceArray['PriceFeed']['_value'][$keys] = [
		            'Price' => [
		                    'itemIdentifier' => [
		                        'sku' => $value['sku']
		                    ],
		                    'pricingList' => [
		                        'pricing' => [
		                            'currentPrice' => [
		                                'value' => [
		                                    '_attribute' => [
		                                        'currency' => $currency['currency'],
		                                        'amount' => $value['price']
		                                    ],
		                                    '_value' => [

		                                    ]
		                                ]
		                            ],
		                            'currentPriceType' => 'BASE',
		                            'comparisonPrice' => [
		                                'value' => [
		                                    '_attribute' => [
		                                        'currency' => $currency['currency'],
		                                        'amount' => $value['price']
		                                    ],
		                                    '_value' => [

		                                    ]
		                                ]
		                            ],
		                        ]
		                    ]
		                ]
		            ];
			        if (!file_exists(\Yii::getAlias('@webroot') . '/var/product/xml/' . $merchant_id . '/updatePrice')) {
			            mkdir(\Yii::getAlias('@webroot') . '/var/product/xml/' . $merchant_id . '/updatePrice', 0775, true);
			        }
			        $file = Yii::getAlias('@webroot') . '/var/product/xml/' . $merchant_id . '/updatePrice/MPProduct-' . time() . '.xml';
			        $xml = new Generator();
			        $xml->arrayToXml($inventoryArray)->save($file);
			        $response = $obj->postRequest(Walmartapi::GET_FEEDS_PRICE_SUB_URL, ['file' => $file]);
			        $responseArray = Walmartapi::xmlToArray($response,true);
                }
                else{
                	Data::createLog("Product type not set for product id '".$value['product_id']."' error wrong post");
                }
	        }
		}
		else
		{
			Data::createLog("Product updatePrice error wrong post");
		}
	}
	/*Pre inventory xml data for single product*/

    public function prepareInventoryData(&$inventoryArray,$product=[])
    {
         $inventoryArray['wm:inventory']['_value'] = [
                    'wm:sku' => $product['sku'],
                    'wm:quantity' => [
                        'wm:unit' => 'EACH',
                        'wm:amount' => $product['inventory'],
                    ],
                    'wm:fulfillmentLagTime' => (isset($product['fulfillment_lag_time']) && $product['fulfillment_lag_time']) ? $product['fulfillment_lag_time'] : '1',
            ];
            return $inventoryArray;
    }

    	/**
	 * Process Product Delete Webhook
	 */

	public function actionProductdelete(){

		$data = Yii::$app->request->post();
		if(is_array($data) && count($data)>0)
		{
			$logFIle = 'product/delete/'.$data['merchant_id'].'/'.time();
			Data::createLog('Requested Data: '.json_encode($data),$logFIle,'a');
			$config = Data::getConfiguration($data['merchant_id']);
	        $obj = new Walmartapi($config['consumer_id'],$config['secret_key']);
			if(isset($data['archiveSku']) && $data['archiveSku'])
			{
				foreach ($data['archiveSku'] as $key => $value) {
					$obj->retireProduct($value);
				}
			}
			else
			{
				Data::createLog("Product Detete error wrong post");
			}
		}
		else
		{
			Data::createLog("Product Detete error wrong post");
		}

	}

	/* 
	 * function for creating log 
	 */
	public function createExceptionLog($functionName,$msg,$shopName = 'common')
    {
        $dir = \Yii::getAlias('@webroot').'/var/exceptions/'.$functionName.'/'.$shopName;
        if (!file_exists($dir)){
            mkdir($dir,0775, true);
        }
        try
        {
            throw new Exception($msg);
        }catch(Exception $e){
            $filenameOrig = $dir.'/'.time().'.txt';
            $handle = fopen($filenameOrig,'a');
            $msg = date('d-m-Y H:i:s')."\n".$msg."\n".$e->getTraceAsString();
            fwrite($handle,$msg);
            fclose($handle);
            $this->sendEmail($filenameOrig,$msg);   
        }
        
    }

    public function actionIsinstall()
	{
		try
		{
			$appinstall= new BigcommerceClientHelper(WALMART_APP_KEY,"","");
			$signedRequest = $_GET['signed_payload'];
			$signedrequest = $appinstall->verifySignedRequest($signedRequest);

			$query = "SELECT * FROM `user` WHERE store_hash='".$signedrequest['store_hash']."' LIMIT 0,1";	
			$proresult = Data::sqlRecords($query,"one","select");
			$shop = $proresult['username'];

			if($proresult) 
			{
				$walmartShopDetails = WalmartShopDetails::find()->where(['shop_url'=>$shop])->one();

				if($walmartShopDetails)
				{
					$shopUrl = $walmartShopDetails->shop_url;
					$token = $walmartShopDetails->token;

					//$install_status = Data::isAppInstalled($shopUrl, $token);
					//if(!$install_status) {
						$email_id = $walmartShopDetails->email;
						$walmartShopDetails->status = 0;
						$walmartShopDetails->save(false);
						//Sendmail::uninstallmail($email_id);
						$extensionModel = WalmartExtensionDetail::find()->where(['merchant_id'=>$walmartShopDetails->merchant_id])->one();
						if($extensionModel){
							$extensionModel->app_status="uninstall";
							$extensionModel->uninstall_date=date('Y-m-d H:i:s');
							$extensionModel->save(false);
						}
					//}

					fwrite($myfile, "\nToken : ".$token);
				}

				fwrite($myfile, "\nShop : ".$shop);
			}

			/*$shop = $proresult['username'];		
			$storeData=Data::sqlRecords("SELECT id,email FROM `jet_shop_details` WHERE `shop_url`='".$shop."' LIMIT 0,1","one","select");
			if(isset($storeData['id']))
			{
				Data::sqlRecords("UPDATE `jet_shop_details` SET install_status=0,uninstall_date='".date('Y-m-d H:i:s')."' WHERE shop_url='".$shop."'");
				if($storeData['email'])
					Sendmail::uninstallmail($storeData['email']);
			}*/
			
		}
		catch(Exception $e)
		{
			$this->createExceptionLog('actionIsinstall',$e->getMessage(),$shopName);
			exit(0);
		}
	}

}
?>