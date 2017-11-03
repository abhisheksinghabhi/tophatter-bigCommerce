<?php 
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\JetConfiguration;
use app\models\AppStatus;
use frontend\models\JetConfig;
use frontend\models\JetTestApi;
use common\models\JetExtensionDetail;
use frontend\components\Jetappdetails;
use frontend\components\Jetapimerchant;

class ApienableController extends Controller
{
	public function actionEnabletestapi()
	{
		if (Yii::$app->user->isGuest) {
			return "Please login to enable jet api(s)";
		}
		else
		{
			$api_user="";
			$api_password="";
			$fullfillmentnodeid="";
			$merchant="";
			$merchant_id=$shopname = \Yii::$app->user->identity->id;
			$api_user=Yii::$app->getRequest()->getQueryParam('username');
			//$api_user="3B1C8F1323EAEE249739ED97967AB1380AE0F76A";
			$api_password=Yii::$app->getRequest()->getQueryParam('password');
			//$api_password="+VvgylgBIvM+FpFSbzvOIcjkk5WTBRJyFclsh3+vyRQL";
			$fullfillmentnodeid=Yii::$app->getRequest()->getQueryParam('fulfillment');
			//$fullfillmentnodeid="5c45383e4a48457faff18dc2cf60";
			$merchant=Yii::$app->getRequest()->getQueryParam('merchant');
			
			if($api_user=="" || $api_password=="" || $fullfillmentnodeid==""){
				return "Please enter valid api credentials";
			}
			$jetHelper = new Jetapimerchant("https://merchant-api.jet.com/api",$api_user,$api_password);
			$responseToken ="";
			$responseToken = $jetHelper->JrequestTokenCurl();
			if($responseToken==false){
				return "Api User or Secret key is wrong.Please enter valid sandbox api key";
			}
			//get all information if setup or not
			/* $response=$jetHelper->CGetRequest('/portal/merchantsetupstatus/');
			var_dump(json_Decode($response,true));echo "<hr>"; */
			
			//get return iformation as well as fulfillment node is setup or not
		/* 	$response="";
			$response=$jetHelper->CGetRequest('/portal/returnssetup/');
			var_dump(json_Decode($response,true));echo "<hr>"; */
			
			//enable product api
			$error=array();
			$productsku=array();
			$sku='test_product';
			$id="12345678";
			$productsku["product_title"]="Cedcommerce Test Product";
			$productsku["jet_browse_node_id"]=4000188;
			$productsku["brand"]="Cedcommerce";
			$upcinfo["standard_product_code"]="719236005030";
			$upcinfo["standard_product_code_type"]="UPC";
			$productsku["standard_product_codes"][]=$upcinfo;
			$productsku["multipack_quantity"]= 1;
			$description="";
			$description="Test Product is used to enable product api";
			$productsku['product_description']=$description;
			$productsku['main_image_url'] = Yii::$app->request->baseUrl.'/images/Product_Lg_Type.jpg';
			$responseArray="";
			$response = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku),json_encode($productsku),$merchant_id);
			$responseArray=json_decode($response,true);
			if($responseArray=="")
			{
				$price=array();
				$price['price']=38.00;
				$priceinfo['fulfillment_node_id']=$fullfillmentnodeid;
				$priceinfo['fulfillment_node_price']=38.00;
				$price['fulfillment_nodes'][]=$priceinfo;
				$responsePrice="";
				$responsePrice = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/price',json_encode($price),$merchant_id);
				$responsePrice=json_decode($responsePrice,true);
				if($responsePrice=="")
				{
					$inv=array();
					$inventory=array();
					$inv['fulfillment_node_id']=$fullfillmentnodeid;
					$qty=20;
					$inv['quantity']=$qty;
					$inventory['fulfillment_nodes'][]=$inv;
					$responseInventory="";
					$response = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/inventory',json_encode($inventory),$merchant_id);
					$responseInventory = json_decode($response,true);
					if(isset($responseInventory['errors'])){
						return "Error: ".json_encode($responseInventory['errors']);
						//$error['inventory']="Error in Inventory Data:".json_encode($responseInventory['errors']);
					}
				}
				elseif(isset($responsePrice['errors']))
				{
					return "Error: ".json_encode($responsePrice['errors']);
					//$error['price']="Error in Price Data:".json_encode($responsePrice['errors']);					
				}
			}
			elseif(isset($responseArray['errors']))
			{
				return "Error: ".json_encode($responseArray['errors']);
				//$error['sku']="Error in Sku Data:".json_encode($responseArray['errors']);
			}
			$responseSkuData="";
			$responseSkuData = $jetHelper->CGetRequest('/merchant-skus/'.rawurlencode($sku),$merchant_id);
			$responseSkuDataArr = json_decode($responseSkuData,true);
			if($responseSkuDataArr && !(isset($responseSkuDataArr['errors'])))
			{
				//Enable cancel api
				$order=array();
				$order['fulfillment_node']=$fullfillmentnodeid;
				$order['items']=array(array('sku'=>$sku,'order_quantity'=>0,'order_cancel_quantity'=>1));
				$response="";
				$response=$jetHelper->CPostRequest('/orders/generate/1',json_encode($order),$merchant_id);
				$response=json_decode($response,true);
				if(isset($response['order_urls']) && count($response['order_urls']) > 0)
				{
					$responseData="";
					//$sku="";
					$qty=0;
					$cancel=0;
					$carrier="";
					$deliver="";
					$responsearr=array();
					$responseData=$jetHelper->CGetRequest($response['order_urls'][0],$merchant_id);
					$responsearr = json_decode($responseData,true);
					//var_dump($responsearr);echo "orderdata<hr>";
					$item_sku=$responsearr['order_items'][0]['merchant_sku'];
					$carrier=$responsearr['order_detail']['request_shipping_carrier'];
					$qty=$responsearr['order_items'][0]['request_order_quantity'];
					$cancel=$responsearr['order_items'][0]['request_order_cancel_qty'];
					$deliver = $responsearr['order_detail']['request_delivery_by'];
					if($deliver){
						$time=explode('.', $deliver);
						$deliver=$time[0].'.0000000-07:00';
					}
					$t=time();
					$data_ship=array();
					$data_ship['shipments'][]=array (
							"alt_shipment_id"=> time()."96",
							'shipment_tracking_number'=>time().'5454',
							'response_shipment_date'=>$deliver,
							'response_shipment_method'=>'',
							'expected_delivery_date'=>$deliver,
							'ship_from_zip_code'=>'84047',
							'carrier_pick_up_date'=>$deliver,
							'carrier'=>$carrier,
							'shipment_items'=>array(
									array(
											'shipment_item_id'=>time().'-123',
											'merchant_sku'=>$item_sku,
											'response_shipment_sku_quantity'=>$qty,
											'response_shipment_cancel_qty'=>$cancel,
											'RMA_number'=>'abcedef',
											'days_to_return'=>30,
											'return_location'=>array('address1'=>'6909 South State Street','address2'=>'Suite C',
													'city'=>'Midvale','state'=>'UT',
													'zip_code'=>'84047'
											)
									)
							)
						);
					//var_dump($data_ship);echo "order cancel<hr>";
					$data=$jetHelper->CPutRequest('/orders/'.$responsearr['merchant_order_id'].'/shipped',json_encode($data_ship),$merchant_id);
					//var_dump($data);echo "<hr>";
				}
				
				//create order by api and acknowledge and shipped				
				$order=array();
				$order['fulfillment_node']=$fullfillmentnodeid;
				$order['items']=array(array('sku'=>$sku,'order_quantity'=>1,'order_cancel_quantity'=>0));
				$response="";
				$response=$jetHelper->CPostRequest('/orders/generate/1',json_encode($order),$merchant_id);
				$response=json_decode($response,true);
				//var_dump($response);echo "<hr>";
				if(isset($response['order_urls']) && count($response['order_urls']) > 0)
				{
					$responseData="";
					$responsearr=array();
					$responseData=$jetHelper->CGetRequest($response['order_urls'][0],$merchant_id);
					$responsearr = json_decode($responseData,true);
					//var_Dump($responsearr);echo "order ack<hr>";
					if(count($responsearr) > 0 && isset($responsearr['merchant_order_id'])){
						$order_ack=array();
						$order_ack['acknowledgement_status'] = "accepted";
						$order_ack['order_items'][] = array(
								'order_item_acknowledgement_status'=>'fulfillable',
								'order_item_id' =>$responsearr['order_items'][0]['order_item_id']
						);
						$ackResponse="";
						$ackResponse=$jetHelper->CPutRequest('/orders/'.$responsearr['merchant_order_id'].'/acknowledge',json_encode($order_ack),$merchant_id);
						$ackData="";
						$ackData=json_decode($ackResponse,true);
						if($ackData==""){
							//ship order data
							$deliver="";
							$request_shipping_carrier="";
							$deliver = $responsearr['order_detail']['request_delivery_by'];
							$request_shipping_carrier= $responsearr['order_detail']['request_shipping_carrier'];
							if($deliver)
							{
								$time=explode('.', $deliver);
								$deliver=$time[0].'.0000000-07:00';
							}
							$shipment_arr=array();
							$shipment_arr[]= array(
									'shipment_item_id'=>time().'-123',
									'merchant_sku'=>'test_product',
									'response_shipment_sku_quantity'=>1,
									'response_shipment_cancel_qty'=>0,
									'RMA_number'=>"abcdef",
	    							'days_to_return'=>30,
	    							'return_location'=>array('address1'=>'6909 South State Street',
	                                                                        'address2'=>'Suite C',
	                                                                        'city'=>'Midvale',
	                                                                        'state'=>'UT','zip_code'=>'84047'
	                                                           )
							);
							$data_ship=array();
							$data_ship['shipments'][]=array	(
									"alt_shipment_id"=> time()."96",
									'shipment_tracking_number'=>time().'5454',
									'response_shipment_date'=>$deliver,
									'response_shipment_method'=>'',
									'expected_delivery_date'=>$deliver,
									'ship_from_zip_code'=>"12345",
									'carrier_pick_up_date'=>$deliver,
									'carrier'=>$request_shipping_carrier,
									'shipment_items'=>$shipment_arr
							);
							//var_Dump($data_ship);echo "shipped<hr>";
							$data=$jetHelper->CPutRequest('/orders/'.$responsearr['merchant_order_id'].'/shipped',json_encode($data_ship),$merchant_id);
							$data= json_decode($data,true);
							//var_Dump($data);echo "<hr>";
						}
					}
				}
		
				//create return
				
				$order_id=$responsearr['merchant_order_id'];
				//$order_id="9a7ef3150135491e8c9046d02f8a3d7a";
				$return="";
				$returnarr=array();
				$return=$jetHelper->CGetRequest('/returns/generate/'.$order_id,$merchant_id);
				$returnarr = json_decode($return,true);
				if(isset($returnarr['url']) && count($returnarr)>0)
				{
					$testurlarray=explode("/",$returnarr['url']);
					$returnid=$testurlarray[3];
					//echo $returnid;echo "<hr>";
					$resturnData="";
					$refund="";
					$item_id="";
					$shipping="";
					$principal=0;
					$resturnData = json_decode($jetHelper->CGetRequest($returnarr['url'],$merchant_id),true);
					$item_id=$resturnData['return_merchant_SKUs'][0]['order_item_id'];
					$refund=$resturnData['return_merchant_SKUs'][0]['return_quantity'];
					$refund=$resturnData['return_merchant_SKUs'][0]['return_quantity'];
					$feedback="item damaged";
					$status=true;
					$shipping=(int)$resturnData['return_merchant_SKUs'][0]['requested_refund_amount']['shipping_cost'];
					$s_tax=0;
					$tax=0;
					$principal=(int)$resturnData['return_merchant_SKUs'][0]['requested_refund_amount']['principal'];
					$data_ship=array();
					$data_ship['merchant_order_id']=$order_id;
					$data_ship['items'][]=array(
							'order_item_id'=>$item_id,
							'total_quantity_returned'=>$refund,
							'order_return_refund_qty'=>$refund,
							'return_refund_feedback'=>$feedback,
							'refund_amount'=>array(
									'principal'=>$principal,
									'tax'=>$tax,
									'shipping_cost'=>$shipping,
									'shipping_tax'=>$s_tax
							)
						);
					$data_ship['agree_to_return_charge']=$status;
					//echo json_encode($data_ship);echo "return<hr>";
					$data=$jetHelper->CPutRequest('/returns/'.$returnid.'/complete',json_encode($data_ship),$merchant_id);
				}
				$modelApi="";
				$resultApi="";
				$resultApi=JetTestApi::find()->where(['merchant_id'=>$merchant_id])->one();
				if($resultApi=="")
				{
					$modelApi=new JetTestApi();
					$modelApi->merchant_id = $merchant_id;
					$modelApi->user = $api_user;
					$modelApi->secret = $api_password;
					$modelApi->merchant = $merchant;
					$modelApi->fulfillment_node = $fullfillmentnodeid;
					$modelApi->save(false);
				}
				return "enabled";
			}
			else
			{
				if(count($error)>0){
					return implode('\n',$error);
				}
			}
		}	
	}
	public function actionGetuser(){
		$result=AppStatus::find()->where(['status'=>1])->all();
		foreach ($result as $value){
			echo $value['shop'];
			echo "<br>";
		}
	}
	public function actionSaveliveapi()
	{
		if (Yii::$app->user->isGuest) {
			return "Please login to enable jet api(s)";
		}
		else
		{
			$merchant_id="";
			$api_user="";
			$api_password="";
			$merchant="";
			$fullfillmentnodeid="";
			$merchant_id=$shopname = \Yii::$app->user->identity->id;
			$api_user=Yii::$app->getRequest()->getQueryParam('username');
			$api_password=Yii::$app->getRequest()->getQueryParam('password');
			$merchant=Yii::$app->getRequest()->getQueryParam('merchant');
			$fullfillmentnodeid=Yii::$app->getRequest()->getQueryParam('fulfillment');
			//$api_user="3B1C8F1323EAEE249739ED97967AB1380AE0F76A";
			//$api_password="+VvgylgBIvM+FpFSbzvOIcjkk5WTBRJyFclsh3+vyRQL";
			//$fullfillmentnodeid="5c45383e4a48457faff18dc2cf60ae14";
			//$merchant="f0451564cc1d42998ee3e370a32a3f63";
			$result="";
			if($api_user=="" || $api_password=="" || $merchant=="" || $fullfillmentnodeid==""){
				return "Please enter valid api credentials";
			}
			//check either api are test api(s);
			$resultApi="";
			$resultApi=JetTestApi::find()->where(['merchant_id'=>$merchant_id])->one();
			if($resultApi){
				if($resultApi->user==$api_user || $resultApi->secret==$api_password){
					return "Entered Api User or Secret key belong to sandbox api(s).Please enter valid live api credentials.";
				}
			}
			$jetHelper="";
			$jetHelper = new Jetapimerchant("https://merchant-api.jet.com/api",$api_user,$api_password);
			$responseToken ="";
			$responseToken = $jetHelper->JrequestTokenCurl();
			if($responseToken==false){
				return "Api User or Secret key is invalid.Please enter valid live api credentials.";
			}
			//check fulfillmentnode details
			$email="";
			$address1="";
			$address2="";
			$city="";
			$state="";
			$zipcode="";	
			$resFulfillmentInfo="";$resFulfillmentInfoarr=array();
			$resFulfillmentInfo = $jetHelper->CGetRequest('/fulfillmentnodesbymerchantid/',$merchant_id);
			$resFulfillmentInfoarr = json_decode($resFulfillmentInfo,true);
			//var_dump($resFulfillmentInfoarr);
			if(count($resFulfillmentInfoarr)>0 && !(isset($resFulfillmentInfoarr['errors']))){
				foreach($resFulfillmentInfoarr as $value){
					if($value['FulfillmentNodeId']==$fullfillmentnodeid){
						//$email = $value[''];
						$address1=$value['Address1'];
						$address2=$value['Address2'];
						$city=$value['City'];
						$state=$value['State'];
						$zipcode=$value['ZipCode'];
						break;
					}
				}
			}
			//save return address
			$model1=new JetConfig();
			//$data = JetConfiguration::find()->where(['merchant_id'=>$merchant_id])->one();
			$firstaddress="";$secondaddress="";$cityModel="";$stateModel="";$zipcodeModel="";
	        $firstaddress=$model1->find()->where(['merchant_id' => $merchant_id, 'data'=>'first_address'])->one();
	        $secondaddress=$model1->find()->where(['merchant_id' => $merchant_id, 'data'=>'second_address'])->one();
	        $cityModel=$model1->find()->where(['merchant_id' => $merchant_id, 'data'=>'city'])->one();
	        $stateModel=$model1->find()->where(['merchant_id' => $merchant_id, 'data'=>'state'])->one();
	        $zipcodeModel=$model1->find()->where(['merchant_id' => $merchant_id, 'data'=>'zipcode'])->one();
	        if($address1!="" && $city!="" && $state!="" && $zipcode!="")
	        {
	        	if($firstaddress)
	        	{
	        		$firstaddress->value=$address1;
	        		$firstaddress->save(false);
	        	}	
	        	else{
	        		$model=new JetConfig();
	        		$model->merchant_id=$merchant_id;
	        		$model->data="first_address";
	        		$model->value=$address1;
	        		$model->save();
	        	}
	        	if($secondaddress)
	        	{
	        		$secondaddress->value=$address2;
	        		$secondaddress->save(false);
	        	}
	        	else{
	        		$model=new JetConfig();
	        		$model->merchant_id=$merchant_id;
	        		$model->data="second_address";
	        		$model->value=$address2;
	        		$model->save();
	        	}
	        	if($cityModel)
	        	{
	        		$cityModel->value=$city;
	        		$cityModel->save(false);
	        	}
	        	else{
	        		$model=new JetConfig();
	        		$model->merchant_id=$merchant_id;
	        		$model->data="city";
	        		$model->value=$city;
	        		$model->save();
	        	}
	        	if($stateModel)
	        	{
	        		$stateModel->value=$state;
	        		$stateModel->save(false);
	        	}
	        	else{
	        		$model=new JetConfig();
	        		$model->merchant_id=$merchant_id;
	        		$model->data="state";
	        		$model->value=$state;
	        		$model->save();
	        	}
	        	if($zipcodeModel)
	        	{
	        		$zipcodeModel->value=$zipcode;
	        		$zipcodeModel->save(false);
	        	}
	        	else{
	        		$model=new JetConfig();
	        		$model->merchant_id=$merchant_id;
	        		$model->data="zipcode";
	        		$model->value=$zipcode;
	        		$model->save();
	        	}
	        }
			//get email_id of shop owner
			$extenModel="";
	        $extenModel=JetExtensionDetail::find()->where(['merchant_id'=>$merchant_id])->one();
	        if($extenModel){
	        	$email = $extenModel->email;
	        }
			$result=JetConfiguration::find()->where(['merchant_id'=>$merchant_id])->one();
			if($result==""){
				$model="";
				$model=new JetConfiguration();
				$model->api_host="https://merchant-api.jet.com/api";
				$model->api_user=$api_user;
				$model->merchant_id=$merchant_id;
				$model->api_password=$api_password;
				$model->merchant=$merchant;
				$model->fullfilment_node_id=$fullfillmentnodeid;
				$model->merchant_email = $email;
				$model->jet_token = json_encode($responseToken);
				$model->save(false);
			}else{
				$result->api_user=$api_user;
				$result->api_password=$api_password;
				$result->merchant=$merchant;
				$result->fullfilment_node_id=$fullfillmentnodeid;
				$result->merchant_email = $email;
				$result->jet_token = json_encode($responseToken);
				$result->save(false);
			}
			return "enabled";
		}	
	}
}
?>