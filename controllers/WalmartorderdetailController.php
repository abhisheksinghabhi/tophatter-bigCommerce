<?php
namespace frontend\modules\walmart\controllers;

use Yii;
use frontend\modules\walmart\models\WalmartOrderDetail;
use frontend\modules\walmart\models\WalmartOrderDetailSearch;
use frontend\modules\walmart\components\Data;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\walmart\components\Walmartapi;
use common\models\User;
use frontend\modules\walmart\components\Mail;
use frontend\modules\walmart\components\Bigcomapi;
use frontend\modules\walmart\components\Dashboard\OrderInfo;
use frontend\modules\walmart\components\BigcommerceClientHelper;
use frontend\modules\walmart\models\WalmartOrderImportError;

/**
 * WalmartorderdetailController implements the CRUD actions for WalmartOrderDetail model.
 */
class WalmartorderdetailController extends WalmartmainController
{
    protected $connection;
    protected $walmartHelper;
    protected $bigcom;
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

    /**
     * Lists all WalmartOrderDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        $searchModel = new WalmartOrderDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $connection = Yii::$app->getDb();
        $merchant_id=Yii::$app->user->identity->id;
        $resultdata=array();
        $queryObj="";
        $query="SELECT `bigcommerce_order_id` FROM `walmart_order_details` WHERE merchant_id='".$merchant_id."' AND status='acknowledged' AND bigcommerce_order_id=''";
        $queryObj = $connection->createCommand($query);
        $resultdata = $queryObj->queryAll();
        $countOrders=0;
        $countOrders=count($resultdata);
        unset($resultdata);
        return $this->render('index', [
            'countOrders'=>$countOrders,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    /**
     * function for getting walmart api connection
     */
    public function beforeAction($action){
    	 
    	if(parent::beforeAction($action)){
    		$this->walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
    		return true;
    	}
    }


    public function actionCancelOrder($config=false){
    
    	$merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
    	if (!$config && Yii::$app->user->isGuest) {
    		return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
    	}
    	if($config){
    		$this->walmartHelper = new Walmartapi($config['consumer_id'],$config['secret_key'],$config['consumer_channel_type_id']);
    	}
    	$data = Yii::$app->request->queryParams;


    	if($data['pid']){
    
    		$lineNumbers = [];
    		$connection = Yii::$app->getDb();
    		$query="SELECT * FROM `walmart_order_details` WHERE purchase_order_id='".$data['pid']."'";
    		$order = $connection->createCommand($query)->queryOne();

    		if($merchant_id==$order['merchant_id']){
    			$orderData = json_decode($order['order_data'],true);
    			//print_r($orderData);
    			if(isset($orderData['orderLines']['orderLine']))
    			{
    				$items = isset($orderData['orderLines']['orderLine'][0])?$orderData['orderLines']['orderLine']:[$orderData['orderLines']['orderLine']];
    				foreach($items as $item){
    					if (isset($item['lineNumber'])) {
    						$lineNumbers[]=$item['lineNumber'];
    					}
    					elseif(isset($item[0]['lineNumber'])){
    						$lineNumbers[]=$item[0]['lineNumber'];
    					}
    				}
    			}
    			$dataShip = ['shipments'=>[['cancel_items'=>[['lineNumber'=>implode(',',$lineNumbers)]]]]];
    			$directory = \Yii::getAlias('@webroot').'/var/order/'.$merchant_id.'/'.$data['pid'].'/';
    			if (!file_exists($directory)){
    				mkdir($directory,0775, true);
    			}
    			$handle = fopen($directory.'/cancel.log','a');
    			fwrite($handle,'Cancel SHIP DATA : '.print_r($dataShip,true).PHP_EOL.PHP_EOL);
    			$response = $this->walmartHelper->rejectOrder($data['pid'],$dataShip);
    			if(isset($response['errors'])){
    				if(isset($response['errors']['error']))
    					Yii::$app->session->setFlash('error', $response['errors']['error']['description']);
    				else
    					Yii::$app->session->setFlash('error', 'Order Can\'t be cancelled.');
    			}
    			else
    			{
    				$query="UPDATE `walmart_order_details` SET status='canceled' WHERE purchase_order_id='".$data['pid']."'";
    				$order = $connection->createCommand($query)->execute();
    				Yii::$app->session->setFlash('success', 'Order has been refunded.');
    			}
    			//var_dump($response);
    			fwrite($handle,'RESPONSE:'.print_r($response,true));
    			fclose($handle);
    			return $this->redirect(['index']);
    			//die;
    		}else
    		{
    			Yii::$app->session->setFlash('error', 'You are not authorized to cancel this order.');
    			die('You are not authorized to cancel this order');
    		}
    	}
    }



	/**
     * render shipment item refund form
     * @return mixed
     */
    public function actionRefundData()
    {
        $this->layout = 'main2';
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        $id=trim(Yii::$app->request->post('id'));
        $connection = Yii::$app->getDb();
        $query="SELECT * FROM `walmart_order_details` WHERE id='".$id."'";
        $queryObj = $connection->createCommand($query);

        $orderData = $queryObj->queryOne();

        $purchase_order_id=$orderData['purchase_order_id'];


        if($purchase_order_id){
            $this->walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
            $orderData = $this->walmartHelper->getOrder($purchase_order_id);

            //$orderData = json_decode($orderdata1,true);

        }

        //print_r($orderData);

        return $this->render('refunddata', [
            'orderData' => $orderData,
        ],true);
    }

    
    public function actionRefundItems()
    {
        $merchant_id= Yii::$app->user->identity->id;
        $data = Yii::$app->request->post();

        
        $directory = \Yii::getAlias('@webroot').'/var/order/'.$merchant_id.'/'.$data['purchaseOrderId'];
        if (!file_exists($directory)){
            mkdir($directory,0775, true);
        }

        $handle = fopen($directory.'/refund.log','a');
        fwrite($handle,'Requested refund Data : '.PHP_EOL.json_encode($data).PHP_EOL.PHP_EOL);

        $connection = Yii::$app->getDb();
        if(isset($data['selectedlineNumber']) && count($data['selectedlineNumber']))
        {
            foreach($data['lineNumber'] as $number => $item)
            {
                if(!in_array($number, $data['selectedlineNumber']))
                    continue;

                $orderData = [];
                $orderData['lineNumber'] = $number;
                $orderData['refundComments'] = empty($data['refundComments'])?'Refund this Order.':$data['refundComments'];
                $orderData['refundReason'] = $data['refundReason'];
                $orderData['charges'] = $item;

                if(is_array($data['includeShipping']) && in_array($number, $data['includeShipping']))
                    $orderData['includeShipping'] = 1;
                else
                    $orderData['includeShipping'] = 0;
                
                fwrite($handle,'Prepared refund Data : '.PHP_EOL.json_encode($orderData).PHP_EOL.PHP_EOL);
                $result = $this->walmartHelper->refundOrder($data['purchaseOrderId'],$orderData);
                fwrite($handle,'refundResponse from walmart : '.PHP_EOL.json_encode($result).PHP_EOL.PHP_EOL);
               
                if(isset($result['ns4:errors'])){
                    fwrite($handle,'Prepared xml Data : '.PHP_EOL.$this->walmartHelper->requestedXml.PHP_EOL.PHP_EOL);
                    if(isset($result['ns4:errors']['ns4:error']))
                        Yii::$app->session->setFlash('error', $result['ns4:errors']['ns4:error']['ns4:description']);
                }
                else
                {
                    $query="UPDATE `walmart_order_details` SET status='refunded' WHERE purchase_order_id='".$data['purchaseOrderId']."'";
                    $order = $connection->createCommand($query)->execute();
                    Yii::$app->session->setFlash('success', 'Order has been refunded.');
                }
            }
        }
        else
        {
            Yii::$app->session->setFlash('error', 'No LineItems Selected for Refund.');
        }

        return $this->redirect(['index']);
    }

    
    public function actionUpdateorderstatus($config = false){
    	
        $merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
    	$connection = Yii::$app->getDb();

        //echo $merchant_id;
    	
    	$query="SELECT `purchase_order_id` FROM `walmart_order_details` WHERE `status`!='shipped' AND `merchant_id`='".$merchant_id."'";
    	$queryObj = $connection->createCommand($query);
    	
    	$resultdata = $queryObj->queryAll();

    	foreach($resultdata as $orderresultdata){
    		
    		$PurchaseOrderId=$orderresultdata['purchase_order_id'];
    		//echo $PurchaseOrderId;
    		$this->walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);

            if($config){
                $this->walmartHelper = new Walmartapi($config['consumer_id'],$config['secret_key'],$config['consumer_channel_type_id']);
            }

    		$orderdata = $this->walmartHelper->getOrder($PurchaseOrderId);

    		$responseOrders=json_decode($orderdata,true);

            //print_r($responseOrders);
           	
            $shipment_data=$this->getShippingItems($responseOrders['order']['orderLines']['orderLine']);


    		$status=$responseOrders['order']['orderLines']['orderLine'][0]['orderLineStatuses']['orderLineStatus'][0]['status'];
    	
        
    		$updateQuery="UPDATE `walmart_order_details` SET `status`='".lcfirst($status)."',`shipment_data`='".addslashes(json_encode($shipment_data))."'  WHERE merchant_id='".$merchant_id."' and purchase_order_id='".$PurchaseOrderId."'";
    		$updated = $connection->createCommand($updateQuery)->execute();
    	}
    	if($config){
    	    return true;
    	}
    	else{
    	   Yii::$app->session->setFlash('success', "Updated Order Status!!");
           return $this->redirect(['index']);
    	}
        
    }

    public function actionVieworderdetails()
    {
        $this->layout="main2";
        if(Yii::$app->user->isGuest) {
            return Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }        
        $PurchaseOrderId = "";
        $PurchaseOrderId = $_POST['purchase_order_id'];    
                         
        $response = ""; 
        $responseOrders = array();
        $this->walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
        $orderdata = $this->walmartHelper->getOrder($PurchaseOrderId);

        //$response = $this->walmartHelper->getRequestorder('v3/orders/'.$PurchaseOrderId);         
        $responseOrders=json_decode($orderdata,true);  
        /*if(isset($responseOrders['errors']))
        {
            return "Order not found in walmart";
        }*/
        $html=$this->render('view', [
                //'model' => $responseOrders['list']['elements']['order'][0],
                'model' => $responseOrders['order'],
        ],true);
        return $html;        
    }

    public function actionAckorder($config = false,$test = false){
        $merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
        if (!$config && Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        $connection = Yii::$app->getDb();
        $query="";
        $model="";
        $queryObj="";
        $count = 0;
        $isError=false;
        $countOrder=0;

        if(defined('CONSUMER_CHANNEL_TYPE_ID')||$config)//foreach($model as $k=>$jetConfig)
        {
            try{ 
                    $countOrder=0;
                    $orderdata="";
                    $response=array();
                    $prev_date = date('Y-m-d', strtotime(date('Y-m-d') .' -2 month'));
                    if($config){
                        $this->walmartHelper = new Walmartapi($config['consumer_id'],$config['secret_key'],$config['consumer_channel_type_id']);
                    }
                    $orderdata = $this->walmartHelper->getOrders(['status'=>'Acknowledged','limit'=>'100','createdStartDate'=>$prev_date],Walmartapi::GET_ORDERS_SUB_URL,$test);
                    
                    /*if($_SERVER['REMOTE_ADDR'] == '182.72.248.90'){
                        print_r($orderdata);
                    }*/
                    if($orderdata==false)
                    {
                        if($config){
                            echo "No Order in Created State";
                            return;
                        }
                        else
                        {
                            Yii::$app->session->setFlash('error', "No Order in Created State");
                            return $this->redirect(['index']);
                        }
                    }
                   
                    $response  = $orderdata;
                    if(isset($response['errors']['error']['info'])){
                        if(isset($response['errors']['error']['info']) && strpos($response['errors']['error']['info'], 'Requested content could not be found.'
                            )!==false){

                            $isError='No Orders found in created state.';
                        }
                        else
                            $isError=json_encode($response['errors']);
                    }
                    else if(isset($response['errors']['error'][0]['info'])){
                        if(isset($response['errors']['error'][0]['info']) && strpos($response['errors']['error'][0]['info'], 'Requested content could not be found'
                            )!==false){

                            $isError='No Order found in created state.';
                        }
                        else
                            $isError=json_encode($response['errors']);
                    }
                    $orders = isset($response['elements']['order'])?$response['elements']['order']:array();
                    if(count($orders) > 0)
                    {
                        foreach($orders as $order)
                        {
                            $directory = \Yii::getAlias('@webroot').'/var/walmart/order/'.$merchant_id.'/'.$order['purchaseOrderId'];
                            if (!file_exists($directory)){
                                mkdir($directory,0775, true);
                            }

                            $handle=fopen($directory.'/fetch.log','a');
                            fwrite($handle,'Requested Order Data From Walmart : '.PHP_EOL.json_encode($order).PHP_EOL.PHP_EOL);

                            $order_ack=array();
                            $order_ack['acknowledgement_status'] = "accepted";
                            $merchantOrderid="";
                            $purchaseOrderId = $order['purchaseOrderId'];
                            $resultdata="";
                            $skus = array();
                            $queryObj="";
                            $query="SELECT `purchase_order_id` FROM `walmart_order_details` WHERE merchant_id='".$merchant_id."' AND purchase_order_id='".$purchaseOrderId."'";
                            $queryObj = $connection->createCommand($query);

                            $resultdata = $queryObj->queryOne();
                            if(!$resultdata)
                            {
                                $OrderItemData=array();
                                $autoReject = false;
                                $i=0;
                                $ikey=0;
                                foreach ($this->getItems($order['orderLines']['orderLine']) as $key=>$value)
                                {

                                    $collection="";
                                    $queryObj="";
                                    $query="SELECT sku,qty FROM `jet_product` WHERE merchant_id='".$merchant_id."' AND sku='".$value['item']['sku']."'";
                                    $queryObj = $connection->createCommand($query);
                                    $collection = $queryObj->queryOne();
                                    if($collection=="")
                                    {
                                        $collectionOption="";
                                        $queryObj="";
                                        $query="SELECT option_sku,option_qty FROM `jet_product_variants` WHERE merchant_id='".$merchant_id."' AND option_sku='".$value['item']['sku']."'";
                                        $queryObj = $connection->createCommand($query);
                                        $collectionOption = $queryObj->queryOne();
                                        
                                        if($collectionOption=="")
                                        {
                                            $error_array[]=array(
                                                    'purchase_order_id'=>$order['purchaseOrderId'],
                                                    'reference_order_id'=>$order['purchaseOrderId'],
                                                    'merchant_id'=>$merchant_id,
                                                    'reason'=>'Order Rejetcted-Product sku: '.$value['item']['sku'].' not available in BigCommerce',
                                                    'created_at'=>date("d-m-Y H:i:s"),
                                            );
                                            $count++;
                                            $autoReject=true;
                                            continue;
                                        }
                                        elseif($collectionOption && $value['qty']>$collectionOption['option_qty'])
                                        {
                                            $autoReject=true;
                                            $count++;
                                            $error_array[]=array(
                                                    'purchase_order_id'=>$order['purchaseOrderId'],
                                                    'reference_order_id'=>$order['purchaseOrderId'],
                                                    'merchant_id'=>$merchant_id,
                                                    'reason'=>'Order Rejetcted-Requested Order quantity is not available for product Option sku: '.$value['item']['sku'],
                                                    'created_at'=>date("d-m-Y H:i:s"),
                                            );
                                            continue;
                                        }
                                    }
                                    elseif($collection && $value['qty']>$collection['qty'])
                                    {
                                        $count++;
                                        $autoReject=true;
                                        $error_array[]=array(
                                                'purchase_order_id'=>$order['purchaseOrderId'],
                                                'reference_order_id'=>$order['purchaseOrderId'],
                                                'merchant_id'=>$merchant_id,
                                                'reason'=>'Order Rejetcted-Requested Order quantity is not available for product sku: '.$value['item']['sku'],
                                                'created_at'=>date("d-m-Y H:i:s"),
                                        );
                                        continue;
                                    }
                                    //send acknowledge request if auto-acknowledge order
                                    $OrderItemData['sku'][]=$value['item']['sku'];
                                    $skus[] = $value['item']['sku'];
                                    $OrderItemData['order_item_id'][]=$value['lineNumber'];
                                    $order_ack['order_items'][] = array(
                                            'order_item_acknowledgement_status'=>'fulfillable',
                                            'order_item_id' =>$value['lineNumber']
                                    );
                                }

                                if($autoReject){
                                    $message.="Item Level Error\n";
                                    continue;
                                }
                          
                                if(isset($order_ack['order_items']) && count($order_ack['order_items'])>0)
                                {
                                    $skus = implode(',',$skus);
                                    $ackData=array();
                                    $ackResponse="";
                                   
                                    fwrite($handle,'Acknowlegde Response From Walmart : '.PHP_EOL.json_encode($ackResponse).PHP_EOL.PHP_EOL);
                                    
                                    $countOrder++;
                                    $status='acknowledged';
                                    $message.="Order created on app and Ack\n";
                                    $queryObj="";

                                    $shippingData = isset($order['orderLines'])?$order['orderLines']:array();

                                    $query='INSERT INTO `walmart_order_details`
                                                (
                                                    `merchant_id`,
                                                    `sku`,
                                                    `purchase_order_id`,
                                                    `order_data`,
                                                    `shipment_data`,
                                                    `status`
                                                )
                                                VALUES(
                                                    "'.$merchant_id.'",
                                                    "'.$skus.'",
                                                    "'.$order['purchaseOrderId'].'",
                                                    "'.addslashes(json_encode($order)).'",
                                                    "'.addslashes(json_encode($this->getShippingItems($order['orderLines']['orderLine']))).'",
                                                    "'.$status.'"
                                                )';
                                    $queryObj = $connection->createCommand($query)->execute();
                                   
                                     
                                }
                            }
                            else
                            {
                                continue;
                            }
                        }
                        
                        unset($order_ack);
                        unset($ackData);
                        unset($itemArray);
                        unset($OrderItemData);
                        unset($collection);
                        unset($collectionOption);
                        unset($result);
                        if($message!=''){
                            $fileOrig=fopen($directory.'/fetch-error.log','a');
                            fwrite($fileOrig,$message);
                            fclose($fileOrig);
                        }
                        
                        fclose($handle);
                        unset($message);
                    }
                    unset($response);

            }
            catch (Exception $e)
            {
                Yii::$app->session->setFlash('error', "Exception:".$e->getMessage());
                return $this->redirect(['index']);
            }
        }

        if($count>0){
         if($config){
                echo "There is error for some orders.Please <a href='https://bigcommerce.cedcommerce.com/integration/walmart/walmartorderimporterror/index'>click</a> to check failed order errors.";
                return;
            }
            Yii::$app->session->setFlash('error',"There is error for some orders.Please <a href=".Yii::$app->request->getBaseUrl()."/walmart/walmartorderimporterror/index>click</a> to check failed order errors.");
        
        }
        if($countOrder==0 && $count==0){
            if($config){
                echo "Walmart Api Error: ".$isError;
                return;
            }
            Yii::$app->session->setFlash('error',"No Order in Created State");
        }
        elseif($isError)
        {
            if($config){
                echo "Walmart Api Error: ".$isError;
                return;
            }
            Yii::$app->session->setFlash('error',"Walmart Api Error: ".$isError);
        }
        if($countOrder>0){
            if($config){
                die( $countOrder." Orders created successfully in BigCommerce");
                return;
            }
            Yii::$app->session->setFlash('success', $countOrder." Orders created successfully in BigCommerce");
        }
        if($config){
            echo 'done';
            return;
        }
        return $this->redirect(['index']);
    }
  
    /**
     * Creates a new JetOrderDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate($config = false,$test = false)
    {
        $merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
        if (!$config && Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        $connection = Yii::$app->getDb();
        $query="";
        $model="";
        $queryObj="";
        $count = 0;
        $isError=false;
        $countOrder=0;
        
        if(defined('CONSUMER_CHANNEL_TYPE_ID')||$config)//foreach($model as $k=>$jetConfig)
        {
            try
                { 
                    $countOrder=0;
                    $orderdata="";
                    $response=array();
                    $prev_date = date('Y-m-d', strtotime(date('Y-m-d') .' -2 month'));
                    if($config){
                        $this->walmartHelper = new Walmartapi($config['consumer_id'],$config['secret_key'],$config['consumer_channel_type_id']);
                    }
                    $orderdata = $this->walmartHelper->getOrders(['status'=>'Created','limit'=>'100','createdStartDate'=>$prev_date],Walmartapi::GET_ORDERS_SUB_URL,$test);
					
                   // print_r($orderdata);die;
                    /*if($_SERVER['REMOTE_ADDR'] == '182.72.248.90'){
                        print_r($orderdata);
                    }*/
                    if($orderdata==false)
                    {
                        if($config){
                            echo "No Order in Created State";
                            return; 
                        }
                        else
                        {
                            Yii::$app->session->setFlash('error', "No Order in Created State");
                            return $this->redirect(['index']);
                        }
                    }
                   
                    $response  = $orderdata;
                    if(isset($response['errors']['error']['info'])){
                        if(isset($response['errors']['error']['info']) && strpos($response['errors']['error']['info'], 'Requested content could not be found.'
                            )!==false){

                            $isError='No Orders found in created state.';
                        }
                        else
                            $isError=json_encode($response['errors']);
                    }
                    else if(isset($response['errors']['error'][0]['info'])){
                        if(isset($response['errors']['error'][0]['info']) && strpos($response['errors']['error'][0]['info'], 'Requested content could not be found'
                            )!==false){

                            $isError='No Order found in created state.';
                        }
                        else
                            $isError=json_encode($response['errors']);
                    }
                    $orders = isset($response['elements']['order'])?$response['elements']['order']:array();
                    if(count($orders) > 0)
                    {
                        foreach($orders as $order)
                        {
                            $directory = \Yii::getAlias('@webroot').'/var/walmart/order/'.$merchant_id.'/'.$order['purchaseOrderId'];
                            if (!file_exists($directory)){
                                mkdir($directory,0775, true);
                            }

                            $handle=fopen($directory.'/fetch.log','a');
                            fwrite($handle,'Requested Order Data From Walmart : '.PHP_EOL.json_encode($order).PHP_EOL.PHP_EOL);

                            $order_ack=array();
                            $order_ack['acknowledgement_status'] = "accepted";
                            $merchantOrderid="";
                            $purchaseOrderId = $order['purchaseOrderId'];
                            $resultdata="";
                            $skus = array();
                            $queryObj="";
                            $query="SELECT `purchase_order_id` FROM `walmart_order_details` WHERE merchant_id='".$merchant_id."' AND purchase_order_id='".$purchaseOrderId."'";
                            $queryObj = $connection->createCommand($query);

                            $resultdata = $queryObj->queryOne();
                            if(!$resultdata)
                            {
                                $OrderItemData=array();
                                $autoReject = false;
                                $i=0;
                                $ikey=0;
                                foreach ($this->getItems($order['orderLines']['orderLine']) as $key=>$value)
                                {
                                    $collection="";
                                    $queryObj="";
                                    $query="SELECT sku,qty FROM `jet_product` WHERE merchant_id='".$merchant_id."' AND sku='".$value['item']['sku']."'";
                                    $queryObj = $connection->createCommand($query);
                                    $collection = $queryObj->queryOne();
                                    if($collection=="")
                                    {
                                        $collectionOption="";
                                        $queryObj="";
                                        $query="SELECT option_sku,option_qty FROM `jet_product_variants` WHERE merchant_id='".$merchant_id."' AND option_sku='".$value['item']['sku']."'";
                                        $queryObj = $connection->createCommand($query);
                                        $collectionOption = $queryObj->queryOne();
                                        
                                        if($collectionOption=="")
                                        {
                                            $error_array[]=array(
                                                    'purchase_order_id'=>$order['purchaseOrderId'],
                                                    'reference_order_id'=>$order['purchaseOrderId'],
                                                    'merchant_id'=>$merchant_id,
                                                    'reason'=>'Order Rejetcted-Product sku: '.$value['item']['sku'].' not available in BigCommerce',
                                                    'created_at'=>date("d-m-Y H:i:s"),
                                            );
                                            $count++;
                                            $autoReject=true;
                                            continue;
                                        }
                                        elseif($collectionOption && $value['qty']>$collectionOption['option_qty'])
                                        {
                                            $autoReject=true;
                                            $count++;
                                            $error_array[]=array(
                                                    'purchase_order_id'=>$order['purchaseOrderId'],
                                                    'reference_order_id'=>$order['purchaseOrderId'],
                                                    'merchant_id'=>$merchant_id,
                                                    'reason'=>'Order Rejetcted-Requested Order quantity is not available for product Option sku: '.$value['item']['sku'],
                                                    'created_at'=>date("d-m-Y H:i:s"),
                                            );
                                            continue;
                                        }
                                    }
                                    elseif($collection && $value['qty']>$collection['qty'])
                                    {
                                        $count++;
                                        $autoReject=true;
                                        $error_array[]=array(
                                                'purchase_order_id'=>$order['purchaseOrderId'],
                                                'reference_order_id'=>$order['purchaseOrderId'],
                                                'merchant_id'=>$merchant_id,
                                                'reason'=>'Order Rejetcted-Requested Order quantity is not available for product sku: '.$value['item']['sku'],
                                                'created_at'=>date("d-m-Y H:i:s"),
                                        );
                                        continue;
                                    }
                                    //send acknowledge request if auto-acknowledge order
                                    $OrderItemData['sku'][]=$value['item']['sku'];
                                    $skus[] = $value['item']['sku'];
                                    $OrderItemData['order_item_id'][]=$value['lineNumber'];
                                    $order_ack['order_items'][] = array(
                                            'order_item_acknowledgement_status'=>'fulfillable',
                                            'order_item_id' =>$value['lineNumber']
                                    );
                                }

                                if($autoReject){
                                    $message.="Item Level Error\n";
                                    continue;
                                }
                          
                                if(isset($order_ack['order_items']) && count($order_ack['order_items'])>0)
                                {
                                    $skus = implode(',',$skus);
                                    $ackData=array();
                                    $ackResponse="";


                                    $ackResponse=$this->walmartHelper->acknowledgeOrder($order['purchaseOrderId']);


                                    fwrite($handle,'Acknowlegde Response From Walmart : '.PHP_EOL.json_encode($ackResponse).PHP_EOL.PHP_EOL);

                                    if(isset($ackResponse['purchaseOrderId'])){
                                        $countOrder++;
                                        $status='acknowledged';
                                        $message.="Order created on app and Ack\n";
                                        $queryObj="";

                                        $shippingData = isset($order['orderLines'])?$order['orderLines']:array();

                                        $query='INSERT INTO `walmart_order_details`
                                                    (
                                                        `merchant_id`,
                                                        `sku`,
                                                        `purchase_order_id`,
                                                        `order_data`,
                                                        `shipment_data`,
                                                        `status`
                                                    )
                                                    VALUES(
                                                        "'.$merchant_id.'",
                                                        "'.$skus.'",
                                                        "'.$order['purchaseOrderId'].'",
                                                        "'.addslashes(json_encode($order)).'",
                                                        "'.addslashes(json_encode($this->getShippingItems($order['orderLines']['orderLine']))).'",
                                                        "'.$status.'"
                                                    )';
                                        $queryObj = $connection->createCommand($query)->execute();
                                        $sql_email = 'SELECT email FROM walmart_shop_details where merchant_id='.$merchant_id;
                                        $model_email = Data::sqlRecords($sql_email,"one","select");
                                        $email = $model_email['email'];
                                        $mailData = ['sender' => 'bigcommerce@cedcommerce.com',
                                                    'reciever' => $email,
                                                    'email' => $email,
                                                    'subject' => 'You have an order from Walmart.com',
                                                    'bcc' => 'stephenjones@cedcommerce.com,barryallen@cedcommerce.com,hanumantpandey@cedcoss.com',
                                                    'reference_order_id' => $order['purchaseOrderId'],
                                                    'merchant_order_id' => $order['purchaseOrderId'],
                                                    'product_sku' => $skus
                                                    ];

                                        if($merchant_id == 501)
                                        {
                                            $mailData = ['sender' => 'bigcommerce@cedcommerce.com',
                                                    'reciever' => $email,
                                                    'email' => 'info@liload.com','staceyr@rmlsite.com',
                                                    'subject' => 'You have an order from Walmart.com',
                                                    'bcc' => 'stephenjones@cedcommerce.com,barryallen@cedcommerce.com,hanumantpandey@cedcoss.com',
                                                    'reference_order_id' => $order['purchaseOrderId'],
                                                    'merchant_order_id' => $order['purchaseOrderId'],
                                                    'product_sku' => $skus
                                                    ];
                                        }            
                                        $mailer = new Mail($mailData,'email/order.html','php',true);
                                        $mailer->sendMail();
                                     }else{
                                        $message.="Order Not Acknowlegde\n";
                                        $error_array[]=array(
                                                'purchase_order_id'=>$order['purchaseOrderId'],
                                                'merchant_id'=>$merchant_id,
                                                'reason'=>isset($ackResponse['errors'])?$ackResponse['errors']:'Unable to acknowledge',
                                                'created_at'=>date("d-m-Y H:i:s"),
                                        );
                                        $count++;

                                        $handle=fopen($directory.'/ordernotfetch.log','a');
                                        fwrite($handle,'Order Not Fetch Mail: '.PHP_EOL.json_encode($error_array).PHP_EOL.PHP_EOL);
                                        
                                        $sql_email = 'SELECT email FROM walmart_shop_details where merchant_id='.$merchant_id;
                                        $model_email = Data::sqlRecords($sql_email,"one","select");
                                        $email = $model_email['email'];
                                        $mailData = ['sender' => 'bigcommerce@cedcommerce.com',
                                        'reciever' => '',
                                        'email' => $email,
                                        'subject' => 'You have an order from Walmart.com under failed order',
                                        'bcc' => 'stephenjones@cedcommerce.com',
                                        'reference_order_id' => $order['purchaseOrderId'],
                                        'merchant_order_id' => $order['purchaseOrderId'],
                                        'product_sku' => $skus,
                                        'message'=>isset($ackResponse['errors'])?$ackResponse['errors']:'Unable to acknowledge'
                                        ];
                                        $mailer = new Mail($mailData,'email/orderRejectMail.html','php',true);

                                        $fieldname = 'email/orderRejectMail';
                                        $value = Data::getConfigValue($merchant_id,$fieldname);

                                        if($value==1)
                                        	$mailer->sendMail();

                                        continue;
                                    }
                                }
                            }
                            else
                            {
                                continue;
                            }
                        }
                        
                        unset($order_ack);
                        unset($ackData);
                        unset($itemArray);
                        unset($OrderItemData);
                        unset($collection);
                        unset($collectionOption);
                        unset($result);
                        if($message!=''){
                            $fileOrig=fopen($directory.'/fetch-error.log','a');
                            fwrite($fileOrig,$message);
                            fclose($fileOrig);
                        }
                        
                        fclose($handle);
                        unset($message);
                    }
                    unset($response);
                }
                catch (Exception $e)
                {
                    Yii::$app->session->setFlash('error', "Exception:".$e->getMessage());
                    return $this->redirect(['index']);
                }
        }
        //create order import error
        $errorCount=0;
        if($count>0 && count($error_array)>0){
            $errorFlag=false;
            $message1="";
            foreach ($error_array as $order_error){
                $result="";
                $orderErrorModel = $connection->createCommand("SELECT * FROM `walmart_order_import_error` WHERE purchase_order_id='".$order_error['purchase_order_id']."'");
                $result = $orderErrorModel->queryOne();
                if($result)
                {
                    $count=0;
                    continue;
                }else{
    
                    $sql='INSERT INTO `walmart_order_import_error`(`purchase_order_id`,`merchant_id`,`reason`)
                            VALUES("'.$order_error['purchase_order_id'].'","'.$order_error['merchant_id'].'","'.$order_error['reason'].'")';
                    try{
                        $errorCount++;
                        $model = $connection->createCommand($sql)->execute();
                    }catch(Exception $e){
                        $message1.='Invalid query: ' . $e->getMessage() . "\n";
                    }
                }
            }
        }

            OrderInfo::removeFailedOrders($merchant_id);
        
        
        if($count>0){
         if($config){
                echo "There is error for some orders.Please <a href='https://bigcommerce.cedcommerce.com/integration/walmart/walmartorderimporterror/index'>click</a> to check failed order errors.";
                return;
            }
            Yii::$app->session->setFlash('error',"There is error for some orders.Please <a href=".Yii::$app->request->getBaseUrl()."/walmart/walmartorderimporterror/index>click</a> to check failed order errors.");
        
        }
        if($countOrder==0 && $count==0){
        	if($config){
        		echo "Walmart Api Error: ".$isError;
        		return;
        	}
            Yii::$app->session->setFlash('error',"No Order in Created State");
        }
        elseif($isError)
        {
        	if($config){
        		echo "Walmart Api Error: ".$isError;
        		return;
        	}
        	Yii::$app->session->setFlash('error',"Walmart Api Error: ".$isError);
        }
        if($countOrder>0){
         	if($config){
                die( $countOrder." Orders created successfully in BigCommerce");
                return;
            }
            Yii::$app->session->setFlash('success', $countOrder." Orders created successfully in BigCommerce");
        }
        if($config){
        	echo 'done';
        	return;
        }
        return $this->redirect(['index']);
    }

    /**
     * function gor getting items with all calculated details
     */
    public function getItems($data){
    	$items = array();
        if(!isset($data[0])){
            $data = [$data];
        }
        foreach($data as $item){
            $sku = $item['item']['sku'];
            $key = Data::getKey($sku);

            if(isset($items[$key])){
                $items[$key]['qty'] += 1; 
                /*$items[$key]['price'] += $this->getPrice($item['charges']['charge']);*/
                //$items[$key]['shipping'] += $this->getShipping($item['charges']['charge']);
                /*$items[$key]['tax'] += $this->getTax($item['charges']['charge']);*/
                $items[$key]['total'] += $this->getTotal($item['charges']['charge']) + $items[$key]['tax'];
            }
            else
            {
                $items[$key] = $item;
                $items[$key]['qty'] = 1; 
                $items[$key]['price'] = $this->getPrice($item['charges']['charge']);
                $items[$key]['shipping'] = $this->getShipping($item['charges']['charge']);
                $items[$key]['tax'] = $this->getTax($item['charges']['charge']);
                $items[$key]['total'] = $this->getTotal($item['charges']['charge']) + $items[$key]['tax'];
            }
        }
        return $items;
    }

    /**
     * function for getting shipping data
     */
    public function getShippingItems($data){

        $items = array();
        if(!isset($data[0])){
            $data = [$data];
        }
        foreach($data as $item){
            $sku = $item['item']['sku'];
            $key = Data::getKey($sku);
            $status = isset($item['orderLineStatuses']['orderLineStatus']['status'])?$item['orderLineStatuses']['orderLineStatus']['status']:'';
            $items[$key][$item['lineNumber']] = array('lineNumber'=>$item['lineNumber'],'status'=>$status,'sku'=>$sku);
            
        }
       //echo json_encode($items);die;
        return $items;
    }

    /**
     * function for getting total shipping amount of item
     */
    public function getShipping($data){
        $price = 0;
        foreach($data as $priceDetails){
            if($priceDetails['chargeType']=='SHIPPING' && $priceDetails['chargeName']=='Shipping')
            {
                $price += $priceDetails['chargeAmount']['amount'];
            }
        }
        return $price;
    }

    /**
     * function for getting total product price of item
     */
    public function getPrice($data){
        $price = 0;
        foreach($data as $priceDetails){
            if($priceDetails['chargeType']=='PRODUCT' && $priceDetails['chargeName']=='ItemPrice')
            {
                $price += $priceDetails['chargeAmount']['amount'];
            }
        }
        return $price;
    }

    /**
     * function for getting total tax price of item
     */
    public function getTax($data){
    	if(!isset($data[0])){
    		$data = [$data];
    	}
    	
        $price = 0;
        foreach($data as $priceDetails){
            if(isset($priceDetails['tax']))
            {
                $price += (float)$priceDetails['tax'];
            }
        }
        return $price;
    }

    /**
     * function for getting total price of item
     */
    public function getTotal($data){
    	if(!isset($data[0])){
    		$data = [$data];
    	}
        $price = 0;
        foreach($data as $priceDetails){
                $price += (float)$priceDetails['chargeAmount']['amount'];
        }
        return $price;
    }
    public function actionSyncorder($config = false)
    {
        $merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
        $connection = Yii::$app->getDb();
        
        $fieldname = 'ordersync';
        $value = Data::getConfigValue($merchant_id,$fieldname);
         
        if($value == 'no'){
        	//echo "not sync";
        	if($config)
        		return;
        	else{
        		Yii::$app->session->setFlash('error', "Order Sync is disabled!!");
        		return $this->redirect(['index']);
        	}
        	 
        }
        
        $model="";
        $queryObj="";
        
        if(defined('CONSUMER_CHANNEL_TYPE_ID')||$config)
        {
            try
            {
                $countOrder=0;
                $token="";
                $shopname="";
                $token = $config ? $config['token']: TOKEN;
                $shopname = $config ? $config['store_hash']: SHOP;
                $bigcommerceError="";
                $resultdata=array();
                $queryObj="";
                $query="SELECT `purchase_order_id`,`order_data` FROM `walmart_order_details` WHERE `merchant_id`='".$merchant_id."' AND (status='acknowledged' OR status='Partially Acknowledged') AND (bigcommerce_order_id IS NULL OR bigcommerce_order_id='')";

                $queryObj = $connection->createCommand($query);
                $resultdata = $queryObj->queryAll();
               
                //$sc = new ShopifyClientHelper($shopname, $token, WALMART_APP_KEY, WALMART_APP_SECRET);
                $resource='orders';
                if($config)
                    $this->bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,$token,$shopname);
                if(count($resultdata)>0)
                {
                    foreach($resultdata as $val)
                    {
                        $Orderarray=array();
                        $itemArray=array();
                        $OrderTotal=0;
                        $autoReject = false;
                        $ikey=0;
                        $result=array();
                        $order=json_decode($val['order_data'],true);
                      
                        if(count($order)>0)
                        {


                            foreach ($this->getItems($order['orderLines']['orderLine']) as $key=>$value)
                            {

                                $collection="";
                                $queryObj="";
                                $query="SELECT bigproduct_id,sku,qty,title FROM `jet_product` WHERE merchant_id='".$merchant_id."' AND sku='".$value['item']['sku']."' and type='simple'";
                                $queryObj = $connection->createCommand($query);
                                $collection = $queryObj->queryOne();
                                if($collection=="")
                                {
                                    $collectionOption="";
                                    $queryObj="";
                                    $query="SELECT option_id,product_id,option_sku,option_qty FROM `jet_product_variants` WHERE merchant_id='".$merchant_id."' AND option_sku='".$value['item']['sku']."'";
                                    $queryObj = $connection->createCommand($query);
                                    $collectionOption = $queryObj->queryOne();
                                    
                                    //print_r($collectionOption);die;
                                    if($collectionOption=="")
                                    {
                                        continue;
                                    }
                                    elseif($collectionOption && $value['qty']>$collectionOption['option_qty'])
                                    {
                                        continue;
                                    }
                                    else
                                    {
                                    	$bigproductid = $collectionOption['product_id'];
                                    	//echo $bigproductid;
                                    	//$resource1 = 'products/'.$bigproductid.'/options';
                                    	$resource1 = 'products/'.$bigproductid.'/skus?sku='.$collectionOption['option_sku'];
                                    	if($config)
                                    		$result1 =  $this->bigcom->get1($resource1,$config);
                                    	else 
                                    		$result1 = $this->bigcom->get1($resource1);
                                    	
                                    	$options=$result1;
                                    
                                    }
                                }
                                elseif($collection && $value['qty']>$collection['qty'])
                                {
                                    continue;
                                }
                                else
                                {
                                    $bigproductid = $collection['bigproduct_id'];
                                }

                                if(!empty($options))
                                {
                                    $itemArray[$ikey]['product_id']= $bigproductid;
                                    //$itemArray[$ikey]['title']=$value['item']['productName'];
                                    $itemArray[$ikey]['quantity']= $value['qty'];
                                    foreach($options as $values)
                                    {
                                        foreach($values['options'] as $val1)
                                        {
                                            $itemArray[$ikey]['product_options'][]= array(
                                                "id"=> $val1['product_option_id'],
                                                "value"=> $val1['option_value_id'], 
                                            );
                                        }
                                    }
                                }
                                
                                else {
                                    $productdata = $this->bigcom->call('GET', 'catalog/products/'.$bigproductid.'?include=variants');

                                    $itemArray[$ikey]['product_id']= $bigproductid;
                                    $itemArray[$ikey]['quantity']=$value['qty'];
                                    
                                     /*$itemArray[$ikey]['product_options'][]= array(
	                                                "id"=> 299,
	                                                "value"=> 168,
	                                        );*/

                                    if(is_array($productdata['data']['variants'][0]['option_values'])){
	                                    foreach($productdata['data']['variants'][0]['option_values'] as $val1)
	                                    {
	                                     $itemArray[$ikey]['product_options'][]= array(
	                                                "id"=> $val1['option_id'],
	                                                "value"=> $val1['id'],
	                                        );
	                                    }
                                    }
                                }
                                 
                                $qty=0;
                                $Totalprice=0;
                                $qty=$value['qty'];
                                $shippingcost += $value['shipping'];
                                $Totalprice = $value['total'];
                                $OrderTotal += $Totalprice;
                                unset($options);
                                $ikey++;
                
                            }
                        }
                
                        $customer_Info="";
                      
                        if(isset($order['shippingInfo']))
                        {
                            $customer_Info = $order['shippingInfo']['postalAddress']['name'];
                            $customer_Info=str_replace(' ', '_', $customer_Info);
                            //print_r($customer_Info);die;
                            $customer_Info = explode('__', $customer_Info);
                            //print_r($customer_Info);
                            if(!isset($customer_Info[1]))
                                $customer_Info[1] = $customer_Info[0];
                        }
                        else
                        {
                            $customer_Info=$result['buyer']['name'];
                            $customer_Info = explode(" ", $customer_Info);
                            
                            if(!isset($customer_Info[1]))
                                $customer_Info[1] = $customer_Info[0];
                        }   
                        $first_name="";
                        $last_name="";
                        $email="";
                        
                        //print_r($customer_Info);die("dfgdf");
                        $first_name=$customer_Info[0];
                        $last_name=$customer_Info[1];
                        $email=$order['customerEmailId'];
                        
                        //first address
                        $first_addr="";$second_addr="";
                        
                        $first_addr=$order['shippingInfo']['postalAddress']['address1'];
                        $second_addr=$order['shippingInfo']['postalAddress']['address2'];
                       

                        $phone_number="";
                        if(isset($order['shippingInfo']['phone']) && $order['shippingInfo']['phone']){
                            $phone_number=$order['shippingInfo']['phone'];
                        }
                        $billing_addr=[];
                        $shipping_addr=[];
                        
                        if(!empty($phone_number))
                        {
                            $billing_addr=array(
                                "first_name" => $first_name,
                                "last_name" => $last_name,
                                "company" => "",
                                "street_1" => $first_addr,
                                "street_2" => $second_addr?$second_addr:'',
                                "city" => $order['shippingInfo']['postalAddress']['city'],
                                "state" => $order['shippingInfo']['postalAddress']['state'],
                                "zip" => $order['shippingInfo']['postalAddress']['postalCode'],
                                "country" => "United States",
                                "country_iso2" => "US",
                                "phone" => $phone_number,
                                "email" => $email,
                            );
                            $shipping_addr= array(
                                "first_name" =>$first_name,
                                "last_name" =>  $last_name,
                                "company" => "",
                                "street_1" => $first_addr,
                                "street_2" => $second_addr?$second_addr:'',
                                "city" => $order['shippingInfo']['postalAddress']['city'],
                                "state" => $order['shippingInfo']['postalAddress']['state'],
                                "zip" => $order['shippingInfo']['postalAddress']['postalCode'],
                                "country" => "United States",
                                "country_iso2" => "US",
                                "phone" => $phone_number,
                                "email" => $email,
                            );
                        }
                        else
                        {
                            $phone_number = time();
                            $billing_addr=array(
                                "first_name" => $first_name,
                                "last_name" => $last_name,
                                "company" => "",
                                "street_1" => $first_addr,
                                "street_2" => $second_addr?$second_addr:'',
                                "city" => $order['shippingInfo']['postalAddress']['city'],
                                "state" => $order['shippingInfo']['postalAddress']['state'],
                                "zip" => $order['shippingInfo']['postalAddress']['postalCode'],
                                "country" => "United States",
                                "country_iso2" => "US",
                                "phone" => $phone_number,
                                "email" => $email,
                            );
                            $shipping_addr= [array(
                                "first_name" =>$first_name,
                                "last_name" =>  $last_name,
                                "company" => "",
                                "street_1" => $first_addr,
                                "street_2" => $second_addr?$second_addr:'',
                                "city" => $order['shippingInfo']['postalAddress']['city'],
                                "state" => $order['shippingInfo']['postalAddress']['state'],
                                "zip" => $order['shippingInfo']['postalAddress']['postalCode'],
                                "country" => "United States",
                                "country_iso2" => "US",
                                "phone" => $phone_number,
                                "email" => $email,
                            )];
                        }
                        
                        if(count($itemArray)>0)
                        {
                            $Orderarray = array(
                                    "products" =>$itemArray,
                                    "customer_id" => "0",
                                    "status_id"=> 11,
                                    "subtotal_ex_tax"=>$OrderTotal,
                                    "subtotal_inc_tax"=>$OrderTotal,
                                    "base_shipping_cost"=>$shippingcost,
                                    "shipping_cost_ex_tax"=>$shippingcost,
                                    "shipping_cost_inc_tax"=>$shippingcost,
                                    "total_ex_tax" =>$OrderTotal,
                                    "total_inc_tax" =>$OrderTotal, 
                                    "staff_notes" =>"Walmart Integration",                   		
                                    "billing_address" => $billing_addr,
                                    "shipping_addresses" =>[array(
                                            "first_name" =>$first_name,
                                            "last_name" =>  $last_name,
                                            "company" => "",
                                            "street_1" => $first_addr,
                                            "street_2" => $second_addr?$second_addr:'',
                                            "city" => $order['shippingInfo']['postalAddress']['city'],
                                            "state" => $order['shippingInfo']['postalAddress']['state'],
                                            "zip" => $order['shippingInfo']['postalAddress']['postalCode'],
                                            "country" => "United States",
                                            "country_iso2" => "US",
                                            "phone" => $phone_number,
                                            "email" => $email,
                                    )],
                                    "external_source" => "POS"
                            
                            );
                            

                            $response=array();
                            
                            //print_r($Orderarray);

                            $response = $this->bigcom->call1("POST",$resource,$Orderarray);
                            
                           

                           if($response!='')
                           {
	                            if($response[0]['status']!=400)
	                            {
	                                //send request for order acknowledge
	                                $bigorderid=$response['id'];
	                                    
	                                $queryObj="";
	                                
	                                if($bigorderid){
		                                $query="UPDATE `walmart_order_details` SET bigcommerce_order_id='".$response['id']."'
		                                                    where merchant_id='".$merchant_id."' AND purchase_order_id='".$order['purchaseOrderId']."'";
		
		                                $countOrder++;
		                                $queryObj = $connection->createCommand($query)->execute();
	                                }
	                                else{
	                                	$bigcommerceError.=$order['purchaseOrderId']."=> Error: Product not found \n";
	                                }
	                                  
	                            }
	                            else
	                            {
	                                foreach($response as $res)
	                                {
	                                
	                                    $response2 = $res['status'];
	                                    $message = $res['message'];
	                                
	                                }
	                               $bigcommerceError.=$val['merchant_order_id']."=> Error: ".json_encode($message)."\n";
	                            }
                           }
                           else{
                               
                               $query="UPDATE `walmart_order_details` SET bigcommerce_order_id='404'
		                                                    where merchant_id='".$merchant_id."' AND purchase_order_id='".$order['purchaseOrderId']."'";
		
		                                $countOrder++;
		                                $queryObj = $connection->createCommand($query)->execute();
                           }

                           
                        }
                        elseif(count($order)>0)
                        {
                            $bigcommerceError.=$order['purchaseOrderId']."=> Error: Product not found or Please check inventory of ordered product!!\n";
                        }
                    }

                    $fieldname = 'email/order-error';
                    $value = Data::getConfigValue($merchant_id,$fieldname);

                    if($merchant_id==226 && $value==1 && $bigcommerceError){
                        if($bigcommerceError){
                            $sql_email = 'SELECT email FROM walmart_shop_details where merchant_id='.$merchant_id;
                                $model_email = Data::sqlRecords($sql_email,"one","select");
                                $email =$model_email['email'];
                                $mailData = ['sender' => 'bigcommerce@cedcommerce.com',
                                'reciever' => $email,
                                'email' => $email,
                                'subject' => 'Order Syncing error',
                                'bcc' => 'stephenjones@cedcommerce.com',
                                'reference_order_id' => $order['purchaseOrderId'],
                                'merchant_order_id' => $order['purchaseOrderId'],
                                'product_sku' => $skus,
                                'message'=>$bigcommerceError
                                ];
                                $mailer = new Mail($mailData,'email/ordersyncerror.html','php',true);
                                $mailer->sendMail();
                        }
                    }
                }
                //print_R($bigcommerceError);die;
                if($bigcommerceError){
                    if($config)
                        echo $bigcommerceError;
                    else
                    Yii::$app->session->setFlash('error', "Order(s) not created in bigcommerce:\n".$bigcommerceError);
                }
                if($bigcommerceError){
                    if($config)
                        echo $bigcommerceError;
                    else
                        Yii::$app->session->setFlash('error', "Order(s) not created in bigcommerce:\n".$bigcommerceError);
                }
                unset($Orderarray);
                unset($itemArray);
                unset($result);
                unset($response);
                unset($lineArray);
                unset($resultdata);
            }
            catch (Exception $e)
            {
                if($config)
                    echo ($e->getMessage());
                else
                    Yii::$app->session->setFlash('error', "Exception:".$e->getMessage());
           
            }
        }
        if($countOrder>0){
            if($config)
                echo ($countOrder." Order Created in BigCommerce..");
            else
                Yii::$app->session->setFlash('success', $countOrder." Order Created in BigCommerce...");
     
        }
        if($config)
        	return;
        return $this->redirect(['index']);
    }
    /**
     * Displays a single WalmartOrderDetail model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WalmartOrderDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*
    public function actionCreate()
    {
        $model = new WalmartOrderDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    */
    /**
     * Updates an existing WalmartOrderDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WalmartOrderDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WalmartOrderDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return WalmartOrderDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WalmartOrderDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCurlhookprocessfororder(){

        $data = $_POST;
        $merchant_id = $data['merchant_id']?$data['merchant_id']:'';
        //$merchant_id=422;

        $connection = Yii::$app->getDb();
    
        $address1="";
        $city="";
        $state="";
        $zip="";
        $address2="";
        $orderData="";
        $flag=false;
        $modelUser="";
        $jetOrderdata="";
        $shipdatetime="";
        $request_shipping_carrier="";
        $logMessage="";
        $errorMessage="";
        $shiptime="";
        $tno=0;
        
        $orderData = WalmartOrderDetail::find()->where(['merchant_id'=>$merchant_id,'status'=>'acknowledged','bigcommerce_order_id'=>$data['data']['orderId']])->one();


        if($orderData)
        {     

                $directory = \Yii::getAlias('@webroot').'/var/order/'.$merchant_id.'/'.date('d-m-Y').'/'.$orderData->purchase_order_id;
                
                if (!file_exists($directory)){
                        mkdir($directory,0775, true);
                }
                
                $handle=fopen($directory.'/shipment.log','a');
                fwrite($handle,'Requested Shipment Data From BigCommerce : '.PHP_EOL.json_encode($orderData).PHP_EOL.PHP_EOL);
        
                $jetConfig=[];
                $jetConfig = Data::sqlRecords("SELECT `consumer_id`,`secret_key`,`consumer_channel_type_id` FROM `walmart_configuration` WHERE merchant_id='".$merchant_id."'", 'one');
               
               
                /*if($jetConfig)
                {
                  
                    define("CONSUMER_CHANNEL_TYPE_ID",$jetConfig['consumer_channel_type_id']);
                    define("API_USER",);
                    define("API_PASSWORD",);
                    
                }else{
                        return false;
                }*/
                $filename="";
                $filename1="";
                $file="";
                $file1="";
                $shopname="";
                $token="";
        
                if (!file_exists(\Yii::getAlias('@webroot').'/var/shipment-log-final/'.date('d-m-Y'))){
                        mkdir(\Yii::getAlias('@webroot').'/var/shipment-log-final/'.date('d-m-Y'),0775, true);
                }
        
                $errorMessage.=$shopname."[".date('d-m-Y H:i:s')."]\n";
                
                $this->walmartHelper = new Walmartapi($jetConfig['consumer_id'],$jetConfig['secret_key'],$jetConfig['consumer_channel_type_id']);
               
                if($orderData->status=="acknowledged")
                {
                    fwrite($handle,'Order Status in DB : '.$orderData->status.PHP_EOL);
                    $errorMessage.="Enter under acknowledged \n";
                    //fwrite($file1, $errorMessage);
                    try
                    {
                        $customerModel="";
                        $merchantDetails = Data::sqlRecords("SELECT `data`,`value` FROM `walmart_config` WHERE merchant_id='".$merchant_id."'", 'all');
        
                        $merchantData = array();
                        foreach($merchantDetails as $row){
                                $merchantData[$row['data']] = $row['value'];
                        }
                             
                        unset($merchantDetails);
                        $data['timestamp']=date("d-m-Y H:i:s");
                              
                        $flagCarr=false;
                        $merchant_order_id="";
                        $token = $data["token"];
                        $shopname = $data["store_hash"];

                        $merchant_order_id=$orderData->purchase_order_id;
                        $id=$orderData->id;
                        $walmartOrderData=json_decode($orderData->order_data,true);
                              
                        $ship1 = 'orders/'.$orderData->bigcommerce_order_id.'/shipments';
                        
                        $bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,$token,$shopname);
                        $shipresult = $bigcom->call1('GET',$ship1);
                        
                        
                        if(($shipresult[0]['tracking_number']) && isset($shipresult[0]['items'])){
                            
                            if($shipresult[0]['tracking_carrier'])
                            {
                                $request_shipping_carrier=$shipresult[0]['tracking_carrier'];
                            }
                            else{
                                $request_shipping_carrier = 'UPS';
                            }

                            $tracking_number=$shipresult[0]['tracking_number'];
                            $response=array();
                            $response=$shipresult[0]['items'];
                            $shipment_id=$shipresult[0]['id'];

                            $offset_end="";
                            $offset_end = $this->getStandardOffsetUTC();
                            if(empty($offset_end) || trim($offset_end)=='')
                                    $offset = '.0000000-00:00';
                            else
                                    $offset = '.0000000'.trim($offset_end);
                            $dt = new \DateTime($shipresult[0]['date_created']);
                            $shiptime="";
                            $shipdatetime="";
                            $expected_delivery_date="";
                            $shiptime=$dt->format('Y-m-d H:i:s');
                            $shipdatetime=strtotime($dt->format('Y-m-d H:i:s'));
                            $expected_delivery_date = date("Y-m-d", $shipdatetime) . 'T' . date("H:i:s", $shipdatetime).$offset;
        
                            $resultAdd="";
                            $resultAdd2="";
                            $Resultcity="";
                            $Resultstate="";
                            $Resultzip="";
                            $trackingUrl = '';
                            $resultAdd=$merchantData['first_address']?:'';
        
        
                            $resultAdd2=$merchantData['second_address']?:'';
        
        
                            $Resultcity=$merchantData['city']?:'';
        
        
                            $Resultstate=$merchantData['state']?:'';
        
        
                            $Resultzip=$merchantData['zipcode']?:'';
        
        
                            if($address1!='' || $city!='' || $state!='' || $zip!='')
                            {
                                $flag=true;
                                $array_return = array('address1'=>$address1,
                                            'address2'=>$address2,
                                            'city'=>$city,
                                            'state'=>$state,
                                            'zip_code'=>$zip
                                );
                            }
                            $shipment_arr=array();
                            $bigcommerce_shipment_data=array();
        
                            $prodsku = explode(',',$orderData->sku);
                            $i=0;

                            foreach($response as $key=>$value)
                            {
                                $product="";
                                $updateInventory=array();
                                $resquest_cancel=0;
                                $cancel_qunt=0;
                                $updateQty=0;
                                     
                                if($flag)
                                {
                                    $RMA_number = "";
                                    $days_to_return = 30;
                                    $shipment_arr[]= array('shipment_item_id'=>$shipment_id,
                                                'merchant_sku'=>$prodsku[$i],
                                                'response_shipment_sku_quantity'=>(int)$value['quantity'],
                                                'response_shipment_cancel_qty'=>(int)$cancel_qunt,
                                                'RMA_number'=>$RMA_number,
                                                'days_to_return'=>(int)$days_to_return,
                                                'return_location'=>$array_return
                                        );
                                }
                                else
                                {
                                    $shipment_arr[]= array('shipment_item_id'=>$shipment_id,
                                                'merchant_sku'=>$prodsku[$i],
                                                'response_shipment_sku_quantity'=>(int)$value['quantity'],
                                                'response_shipment_cancel_qty'=>(int)$cancel_qunt
                                        );
                                }
                                $bigcommerce_shipment_data[]=implode(',',array(0=>$prodsku[$i],1=>$value['quantity'],2=>'fullfilled'));
                                $i++;
                            }
                            //print_r($orderData->shipment_data);die;
                            $data_ship=array();
                            
                            if($zip=="")
                                $zip=85705;
                            if($flagCarr)
                            {
                                $data_ship['shipments'][]=array (
                                        'purchase_order_id' => $orderData->purchase_order_id,
                                        'shipment_tracking_number' => $tracking_number,
                                        'shipment_tracking_url' => $trackingUrl,
                                        'response_shipment_date'=>$expected_delivery_date,
                                        'response_shipment_method'=>'Standard',
                                        'expected_delivery_date'=>$expected_delivery_date,
                                        'ship_from_zip_code'=>$zip,
                                        'carrier_pick_up_date'=>$expected_delivery_date,
                                        'carrier'=>'UPS',
                                        'shipment_items'=>$this->getShipmentItems($shipment_arr,$orderData->shipment_data)
                                );
                            }
                            else{
                                $data_ship['shipments'][]=array (
                                        'purchase_order_id' => $orderData->purchase_order_id,
                                        'shipment_tracking_number' => $tracking_number,
                                        'shipment_tracking_url' => $trackingUrl,
                                        'response_shipment_date'=>$expected_delivery_date,
                                        'response_shipment_method'=>'Standard',
                                        'expected_delivery_date'=>$expected_delivery_date,
                                        'ship_from_zip_code'=>$zip,
                                        'carrier_pick_up_date'=>$expected_delivery_date,
                                        'carrier'=>'UPS',
                                        'shipment_items'=>$this->getShipmentItems($shipment_arr,$orderData->shipment_data)
                                );
                            }

                            $walmartData="";
                               
                            if($data_ship)
                            {
                                fwrite($handle,"Sending prepared shipment data on walmart : ".PHP_EOL.json_encode($data_ship).PHP_EOL.PHP_EOL);
    
                                $walmartData=$this->walmartHelper->shipOrder($data_ship);
    
                                $handle_data=fopen($directory.'/shipment_data.log','a');
                                fwrite($handle_data,'Walmart shipment response : '.$walmartData.PHP_EOL);
    
                                $walmartData = str_replace('ns3:','',$walmartData);
                                $walmartData = str_replace('ns4:','',$walmartData);
    
                                fwrite($handle,'Walmart shipment response : '.$walmartData.PHP_EOL);
    
    
                                $responseArray=array();
                                $responseArray=json_decode($walmartData,true);
    
                                //echo MERCHANT_ID;
                                
                                if(!isset($responseArray['errors']))
                                {
                                    
                                    $responseArray = $responseArray['order'];
                                    $walmartOrderData['orderLines']['orderLine'] = isset($responseArray['orderLines']['orderLine'][0])?$responseArray['orderLines']['orderLine']:$responseArray['orderLines']['orderLine'];
                                    //print_r($walmartOrderData['orderLines']['orderLine']);die;
                                    
                                    fwrite($handle,'calling getShippedItemsProcessedData: '.PHP_EOL);
                                    $processedData = $this->getShippedItemsProcessedData($walmartOrderData['orderLines']['orderLine']);
                                    fwrite($handle,'getShippedItemsProcessedData Response: '.print_r($processedData,true).PHP_EOL);
                                    $price = $processedData['price'];
                                    $status = $processedData['status'];
                                    $orderData1 = addslashes(json_encode($walmartOrderData));
                                    fwrite($handle,'calling getShippingItems: '.PHP_EOL);
                                    $shipmentData = addslashes(json_encode($this->getShippingItems($responseArray['orderLines']['orderLine'])));
                                    fwrite($handle,'after getShippingItems shipmentData: '.print_r($shipmentData,true).PHP_EOL);
                                    $errorMessage.="shipment data send to walmart \n";
                                    //fwrite($file1, $errorMessage);
                                    $query="UPDATE `walmart_order_details` SET  order_data='".$orderData1 ."',shipment_data='".$shipmentData."',status='{$status}',order_total='{$price}'
                                    where merchant_id='".$orderData->merchant_id."' AND purchase_order_id='".$orderData->purchase_order_id."'";
    
                                    $connection->createCommand($query)->execute();
                                    $errorMessage.="shipment created\n";
                                    
                                    if($config)
                                        echo "Shipment is created successfully for order id:".$result['merchant_order_id'];
                                    else {
                                        Yii::$app->session->setFlash('success', "Shipment is created successfully!!");
                                        return $this->redirect(['index']);
                                    }
                                    
                                    $fieldname = 'email/Shipping';
                                    $value = Data::getConfigValue($merchant_id,$fieldname);
                                    
                                    //if($value==1){
	                                    $sql_email = 'SELECT email FROM walmart_shop_details where merchant_id='.$merchant_id;
	                                    $model_email = Data::sqlRecords($sql_email,"one","select");
	                                    $email = $model_email['email'];
	                                    $mailData = ['sender' => 'bigcommerce@cedcommerce.com',
	                                    'reciever' => 'stephenjones@cedcommerce.com',
	                                    'email' => 'stephenjones@cedcommerce.com',
	                                    'subject' => 'Walmart Order Shipped successfully',
	                                    'bcc' => 'stephenjones@cedcommerce.com',
	                                    'reference_order_id' => $orderData->purchase_order_id,
	                                    'merchant_order_id' => $orderData->purchase_order_id,
	                                    'product_sku' => $email
	                                    ];
	                                    $mailer = new Mail($mailData,'email/shippedOrderMail.html','php',true);
	                                    $mailer->sendMail();
                                   // }
                                    
                                }
                                else{
                                    //fwrite($file1, $errorMessage);
                                    fwrite($handle,"Reqeusted Xml : ".PHP_EOL.$helper->requestedXml.PHP_EOL.PHP_EOL);
                                    //fwrite($handle,'shipment not created for order.'.PHP_EOL);
                                    fwrite($handle,'shipment not created for order. Saving errror msg'.PHP_EOL);
                                   
                                    if(!$mannual){
                                        if($orderData->ship_request==''){
                                            $ship_request = [];
                                        }
                                        else
                                        {
                                            $ship_request = json_decode($orderData->ship_request);
                                        }
                                        $ship_request[] = $data;
                                        $ship_request = addslashes(json_encode($ship_request));
                                        $query="UPDATE `walmart_order_details` SET ship_request='{$ship_request}'
                                                where merchant_id='".$orderData->merchant_id."' AND purchase_order_id='".$orderData->purchase_order_id."'";
                                        $connection->createCommand($query)->execute();
                                    }
                                    fwrite($handle,' Saving errror msg'.PHP_EOL);


                                    $orderData->save(false);
                                    $ordererrorMdoel = "";
                                        $ordererrorMdoel = new WalmartOrderImportError();
                                        $ordererrorMdoel->purchase_order_id=$orderData->purchase_order_id;
                                        $ordererrorMdoel->reason="Order Not fulfilled on Walmart.\nError:".json_encode($responseArray['errors']);
                                        //$ordererrorMdoel->created_at=date("d-m-Y H:i:s");
                                        $ordererrorMdoel->merchant_id=$merchant_id;
                                        $ordererrorMdoel->save(false);
                                        
                                        if($config)
                                            echo "order id:".$result['merchant_order_id']."Not ready to ship!!";
                                        else{
                                            Yii::$app->session->setFlash('error', "Not ready to ship having!!".$responseArray['errors']['error']['description']);
                                            return $this->redirect(['index']);
                                        }
    
                                    }
                                    
                                }
                            }
                        }
                        
                        catch (ShopifyApiException $e)
                        {
                            $errorMessage.=$shopname."[".date('d-m-Y H:i:s')."]\n"."Error in bigcommerce api".$e->getMessage()."\n";
                                    fwrite($handle, $errorMessage);
                            fclose($handle);
                            //return;
                        }
                        catch (ShopifyCurlException $e)
                        {
                            $errorMessage.=$shopname."[".date('d-m-Y H:i:s')."]\n"."Error in bigcommerce api".$e->getMessage()."\n";
                            fwrite($handle, $errorMessage);
                            fclose($handle);
                            //return;
                        }
                        catch(Exception $e){
                            $errorMessage.=$shopname."[".date('d-m-Y H:i:s')."]\n"."Error exception".$e->getMessage()."\n";
                            fwrite($handle, $errorMessage);
                                    fclose($handle);
                                            //return;
                        }
                    }
                fclose($handle);
                //return;
            }
             //return $this->redirect(['index']);
    }

    public function actionCurlprocessfororder($config=false){
    	
    	$merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
    	
    	$connection = Yii::$app->getDb();
    
    	$address1="";
    	$city="";
    	$state="";
    	$zip="";
    	$address2="";
    	$orderData="";
    	$flag=false;
    	$modelUser="";
    	$jetOrderdata="";
    	$shipdatetime="";
    	$request_shipping_carrier="";
    	$logMessage="";
    	$errorMessage="";
    	$shiptime="";
    	$tno=0;
    	
    	$orderData1 = WalmartOrderDetail::find()->where(['merchant_id'=>$merchant_id,'status'=>'acknowledged'])->all();

    	if($orderData1)
    	{
	    	foreach ($orderData1 as $orderData){
	    			
	    		
	    		$directory = \Yii::getAlias('@webroot').'/var/order/'.$merchant_id.'/'.date('d-m-Y').'/'.$orderData->purchase_order_id;
	    		
	    		if (!file_exists($directory)){
	    				mkdir($directory,0775, true);
	    		}
	    		
	    		$handle=fopen($directory.'/shipment.log','a');
	    		fwrite($handle,'Requested Shipment Data From BigCommerce : '.PHP_EOL.json_encode($orderData1).PHP_EOL.PHP_EOL);
	    
	    		$jetConfig=[];
	    		$jetConfig = Data::sqlRecords("SELECT `consumer_id`,`secret_key`,`consumer_channel_type_id` FROM `walmart_configuration` WHERE merchant_id='".$merchant_id."'", 'one');
	    		if($jetConfig)
	    		{
                    if(!CONSUMER_CHANNEL_TYPE_ID){
    	    			define("CONSUMER_CHANNEL_TYPE_ID",$jetConfig['consumer_channel_type_id']);
    	    			define("API_USER",$jetConfig['consumer_id']);
    	    			define("API_PASSWORD",$jetConfig['secret_key']);
                    }
	    		}else{
	    				return false;
	    		}
	    		$filename="";
	    		$filename1="";
	    		$file="";
	    		$file1="";
	    		$modelUser="";
	    		$token="";
	    		$shopname="";
	    		$shopifymodel="";
	    		$jetConfig="";
	    		$email="";
	    		$fullfillmentnodeid="";
	    
	    		if (!file_exists(\Yii::getAlias('@webroot').'/var/shipment-log-final/'.date('d-m-Y'))){
	    				mkdir(\Yii::getAlias('@webroot').'/var/shipment-log-final/'.date('d-m-Y'),0775, true);
	    		}
	    
	    		$errorMessage.=$shopname."[".date('d-m-Y H:i:s')."]\n";
	    		
	    		
	    		$this->walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
	    		if($config){
	    			$this->walmartHelper = new Walmartapi($config['consumer_id'],$config['secret_key'],$config['consumer_channel_type_id']);
	    		}
	    
	    		if($orderData->status=="acknowledged" || $orderData->status=='inprogress')
	    		{
	    			fwrite($handle,'Order Status in DB : '.$orderData->status.PHP_EOL);
	    			$errorMessage.="Enter under acknowledged \n";
	    			//fwrite($file1, $errorMessage);
	    			try
	    			{
	    				$customerModel="";
	    				$merchantDetails = Data::sqlRecords("SELECT `data`,`value` FROM `walmart_config` WHERE merchant_id='".$merchant_id."'", 'all');
	    
	    				$merchantData = array();
	    				foreach($merchantDetails as $row){
	    						$merchantData[$row['data']] = $row['value'];
	    				}
	    					 
	    				unset($merchantDetails);
	    				$data['timestamp']=date("d-m-Y H:i:s");
	    					 
	    				//$orderData->save(false);
	    				$flagCarr=false;
	    				$merchant_order_id="";
	                    $token = $config ? $config['token']: TOKEN;
	                    $shopname = $config ? $config['store_hash']: SHOP;
	    				//$request_shipping_carrier="";
	    				$merchant_order_id=$orderData->purchase_order_id;
	    				$id=$orderData->id;
	    				$walmartOrderData=json_decode($orderData->order_data,true);
	    
	    				
    					if($config)
                            $bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,$token,$shopname);
                        else
                            $bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,TOKEN,STOREHASH);
	    				
	    			
	    				//echo $orderData->bigcommerce_order_id;
	    				
	    				$ship1 = 'orders/'.$orderData->bigcommerce_order_id.'/shipments';
	    				
	    				
	    				if($config)
	    					$shipresult = $bigcom->get1($ship1,$config);
	    				else 
	    					$shipresult = $bigcom->get1($ship1);

                        //print_r($shipresult);die;
	    				
	    				//if($shipresult){

	    				if(($shipresult[0]['tracking_number']) && isset($shipresult[0]['items'])){
	    					
	    					if($shipresult[0]['tracking_carrier']=='usps' || $shipresult[0]['shipping_provider']=='usps')
	    					{
	    						$request_shipping_carrier=$shipresult[0]['tracking_carrier']?strtoupper($shipresult[0]['tracking_carrier']):strtoupper($shipresult[0]['shipping_provider']);
	    					}
	    					else if($shipresult[0]['tracking_carrier']=='fedex'){

                                $request_shipping_carrier=strtoupper($shipresult[0]['tracking_carrier']);
                            }
	    					else{
	    						$request_shipping_carrier = 'UPS';
	    					}
	    					$tracking_number=$shipresult[0]['tracking_number'];
	    					$response=array();
	    					$response=$shipresult[0]['items'];
	    					$shipment_id=$shipresult[0]['id'];
	    					$offset_end="";
	    					$offset_end = $this->getStandardOffsetUTC();
	    					if(empty($offset_end) || trim($offset_end)=='')
	    							$offset = '.0000000-00:00';
	    					else
	    							$offset = '.0000000'.trim($offset_end);
	    					$dt = new \DateTime($shipresult[0]['date_created']);

	    					$shiptime="";
	    					$shipdatetime="";
	    					$expected_delivery_date="";
	    					$shiptime=$dt->format('Y-m-d H:i:s');
	    					$shipdatetime=strtotime($dt->format('Y-m-d H:i:s'));

	    					$expected_delivery_date = date("Y-m-d", $shipdatetime) . 'T' . date("H:i:s", $shipdatetime).$offset;
	    
	    					$resultAdd="";
	    					$resultAdd2="";
	    					$Resultcity="";
	    					$Resultstate="";
	    					$Resultzip="";
	    					$trackingUrl = '';
	    					$resultAdd=$merchantData['first_address']?:'';
	    
	    
	    					$resultAdd2=$merchantData['second_address']?:'';
	    
	    
	    					$Resultcity=$merchantData['city']?:'';
	    
	    
	    					$Resultstate=$merchantData['state']?:'';
	    
	    
	    					$Resultzip=$merchantData['zipcode']?:'';
	    
	    
	    					if($address1!='' || $city!='' || $state!='' || $zip!='')
	    					{
	    						$flag=true;
	    						$array_return = array('address1'=>$address1,
	    									'address2'=>$address2,
	    									'city'=>$city,
	    									'state'=>$state,
	    									'zip_code'=>$zip
	    						);
	    					}
	    					
	    					$shipment_arr=array();
	    					$bigcommerce_shipment_data=array();
	    
	    					$prodsku = explode(',',$orderData->sku);
	    					$i=0;
	    					foreach($response as $key=>$value)
	    					{
	    						$product="";
	    						$updateInventory=array();
	    						$resquest_cancel=0;
	    						$cancel_qunt=0;
	    						$updateQty=0;
	    							 
	    						if($flag)
	    						{
	    							$RMA_number = "";
	    							$days_to_return = 30;
	    							$shipment_arr[]= array('shipment_item_id'=>$shipment_id,
	    										'merchant_sku'=>$prodsku[$i],
	    										'response_shipment_sku_quantity'=>(int)$value->quantity,
	    										'response_shipment_cancel_qty'=>(int)$cancel_qunt,
	    										'RMA_number'=>$RMA_number,
	    										'days_to_return'=>(int)$days_to_return,
	    										'return_location'=>$array_return
	    								);
	    						}
	    						else
	    						{
	    							$shipment_arr[]= array('shipment_item_id'=>$shipment_id,
	    										'merchant_sku'=>$prodsku[$i],
	    										'response_shipment_sku_quantity'=>(int)$value->quantity,
	    										'response_shipment_cancel_qty'=>(int)$cancel_qunt
	    								);
	    						}
	    							$bigcommerce_shipment_data[]=implode(',',array(0=>$prodsku[$i],1=>$value->quantity,2=>'fullfilled'));
	    						$i++;
	    					}
	    					//print_r($orderData->shipment_data);
							$data_ship=array();
							
							if($zip=="")
								$zip=85705;
							if($flagCarr)
							{
								$data_ship['shipments'][]=array (
										'purchase_order_id' => $orderData->purchase_order_id,
										'shipment_tracking_number' => $tracking_number,
										'shipment_tracking_url' => $trackingUrl,
										'response_shipment_date'=>$expected_delivery_date,
										'response_shipment_method'=>'Standard',
										'expected_delivery_date'=>$expected_delivery_date,
										'ship_from_zip_code'=>$zip,
										'carrier_pick_up_date'=>$expected_delivery_date,
										'carrier'=>$request_shipping_carrier,
										'shipment_items'=>$this->getShipmentItems($shipment_arr,$orderData->shipment_data)
								);
							}
							else{
								$data_ship['shipments'][]=array (
										'purchase_order_id' => $orderData->purchase_order_id,
										'shipment_tracking_number' => $tracking_number,
										'shipment_tracking_url' => $trackingUrl,
										'response_shipment_date'=>$expected_delivery_date,
										'response_shipment_method'=>'Standard',
										'expected_delivery_date'=>$expected_delivery_date,
										'ship_from_zip_code'=>$zip,
										'carrier_pick_up_date'=>$expected_delivery_date,
										'carrier'=>$request_shipping_carrier,
										'shipment_items'=>$this->getShipmentItems($shipment_arr,$orderData->shipment_data)
								);
							}
	    						$walmartData="";
	    						//print_r($data_ship);
							if($data_ship)
							{
								fwrite($handle,"Sending prepared shipment data on walmart : ".PHP_EOL.json_encode($data_ship).PHP_EOL.PHP_EOL);
	
                                $orderdata = $this->walmartHelper->getOrder($orderData->purchase_order_id);

                                $responseOrders=json_decode($orderdata,true);

                                $status=$responseOrders['order']['orderLines']['orderLine'][0]['orderLineStatuses']['orderLineStatus'][0]['status'];

                                if($status=='Shipped'){
                                    $updateQuery="UPDATE `walmart_order_details` SET `status`='".lcfirst($status)."'  WHERE merchant_id='".$merchant_id."' and purchase_order_id='".$orderData->purchase_order_id."'";
                                    $updated = $connection->createCommand($updateQuery)->execute();

                                    continue;
                                }


								$walmartData=$this->walmartHelper->shipOrder($data_ship);
	
	    						//if(0)
	    							//$walmartData = $this->getShipingResponseData();
	
								//if($data['email']=='satyaprakash@cedcoss.com')
									//$walmartData = $this->getShipingResponseData($data,$orderData,false);
	
	
	                            $handle_data=fopen($directory.'/shipment_data.log','a');
								fwrite($handle_data,'Walmart shipment response : '.$walmartData.PHP_EOL);
	
								$walmartData = str_replace('ns3:','',$walmartData);
								$walmartData = str_replace('ns4:','',$walmartData);
	
	                            fwrite($handle,'Walmart shipment response : '.$walmartData.PHP_EOL);
	
	
								$responseArray=array();
								$responseArray=json_decode($walmartData,true);
	
								/*echo $merchant_id;
								print_r($responseArray);die("dfgFDG");*/
								
								if(!isset($responseArray['errors']))
								{
									
									$responseArray = $responseArray['order'];
									$walmartOrderData['orderLines']['orderLine'] = isset($responseArray['orderLines']['orderLine'][0])?$responseArray['orderLines']['orderLine']:$responseArray['orderLines']['orderLine'];
									//print_r($walmartOrderData['orderLines']['orderLine']);die;
									
									fwrite($handle,'calling getShippedItemsProcessedData: '.PHP_EOL);
									$processedData = $this->getShippedItemsProcessedData($walmartOrderData['orderLines']['orderLine']);
									fwrite($handle,'getShippedItemsProcessedData Response: '.print_r($processedData,true).PHP_EOL);
									$price = $processedData['price'];
									$status = $processedData['status'];
									$orderData1 = addslashes(json_encode($walmartOrderData));
									fwrite($handle,'calling getShippingItems: '.PHP_EOL);
									$shipmentData = addslashes(json_encode($this->getShippingItems($responseArray['orderLines']['orderLine'])));
									fwrite($handle,'after getShippingItems shipmentData: '.print_r($shipmentData,true).PHP_EOL);
									$errorMessage.="shipment data send to walmart \n";
									//fwrite($file1, $errorMessage);
									$query="UPDATE `walmart_order_details` SET  order_data='".$orderData1 ."',shipment_data='".$shipmentData."',status='{$status}',order_total='{$price}'
									where merchant_id='".$orderData->merchant_id."' AND purchase_order_id='".$orderData->purchase_order_id."'";
	
									$connection->createCommand($query)->execute();
									$errorMessage.="shipment created\n";
									
									if($config)
										echo "Shipment is created successfully for order id:".$result['merchant_order_id'];
									else {
										Yii::$app->session->setFlash('success', "Shipment is created successfully!!");
	                                    
	                                }
	                                
	                                
	                                $sql_email = 'SELECT email FROM walmart_shop_details where merchant_id='.$merchant_id;
	                                $model_email = Data::sqlRecords($sql_email,"one","select");
	                                $email = $model_email['email'];
	                                $mailData = ['sender' => 'bigcommerce@cedcommerce.com',
	                                'reciever' => 'stephenjones@cedcommerce.com',
	                                'email' => 'stephenjones@cedcommerce.com',
	                                'subject' => 'Walmart Order Shipped successfully',
	                                'bcc' => 'amitcs1005@gmail.com,stephenjones@cedcommerce.com,barryallen@cedcommerce.com',
	                                'reference_order_id' => $orderData->purchase_order_id,
	                                'merchant_order_id' => $orderData->purchase_order_id,
	                                'product_sku' => $prodsku
	                                ];
	                                $mailer = new Mail($mailData,'email/shippedOrderMail.html','php',true);
	                                $mailer->sendMail();
									
									
								}
								else{
									//fwrite($file1, $errorMessage);
                                    fwrite($handle,"Reqeusted Xml : ".PHP_EOL.$helper->requestedXml.PHP_EOL.PHP_EOL);
                                    //fwrite($handle,'shipment not created for order.'.PHP_EOL);
									fwrite($handle,'shipment not created for order. Saving errror msg'.PHP_EOL);
	                               
                                    if(!$mannual){
                                        if($orderData->ship_request==''){
                                            $ship_request = [];
                                        }
                                        else
                                        {
                                            $ship_request = json_decode($orderData->ship_request);
                                        }
                                        $ship_request[] = $data;
                                        $ship_request = addslashes(json_encode($ship_request));
                                        $query="UPDATE `walmart_order_details` SET ship_request='{$ship_request}'
                                                where merchant_id='".$orderData->merchant_id."' AND purchase_order_id='".$orderData->purchase_order_id."'";
                                        $connection->createCommand($query)->execute();
                                    }
                                    fwrite($handle,' Saving errror msg'.PHP_EOL);


									$orderData->save(false);
									$ordererrorMdoel = "";
										$ordererrorMdoel = new WalmartOrderImportError();
										$ordererrorMdoel->purchase_order_id=$orderData->purchase_order_id;
										$ordererrorMdoel->reason="Order Not fulfilled on Walmart.\nError:".json_encode($responseArray['errors']);
										//$ordererrorMdoel->created_at=date("d-m-Y H:i:s");
										$ordererrorMdoel->merchant_id=$merchant_id;
										$ordererrorMdoel->save(false);
										
										if($config)
											echo "order id:".$result['merchant_order_id']."Not ready to ship!!";
										else{
											Yii::$app->session->setFlash('error', "Not ready to ship having!!".$responseArray['errors']['error']['description']);
											return $this->redirect(['index']);
										}
	
									}
									
								}
	    					}
	    					else{
	    						if(!$config)
	    						{
	    							$tno++;
	    							$untrackedorder[]=$orderData->bigcommerce_order_id;
	    							continue;
// 	    							Yii::$app->session->setFlash('error', "Tracking number Not found!!");
// 	    							return $this->redirect(['index']);
	    						}
	    					}
	    				}
	    				
						catch (ShopifyApiException $e)
						{
							$errorMessage.=$shopname."[".date('d-m-Y H:i:s')."]\n"."Error in bigcommerce api".$e->getMessage()."\n";
									fwrite($handle, $errorMessage);
							fclose($handle);
							//return;
						}
						catch (ShopifyCurlException $e)
						{
							$errorMessage.=$shopname."[".date('d-m-Y H:i:s')."]\n"."Error in bigcommerce api".$e->getMessage()."\n";
							fwrite($handle, $errorMessage);
							fclose($handle);
							//return;
						}
						catch(Exception $e){
							$errorMessage.=$shopname."[".date('d-m-Y H:i:s')."]\n"."Error exception".$e->getMessage()."\n";
							fwrite($handle, $errorMessage);
									fclose($handle);
											//return;
						}
	    			}
	    		}
	    			if($config)
	    				return;
	    			else{
	    			    if(!$tno)
                            Yii::$app->session->setFlash('success', "Shipment Updated to walmart panel!!");
                    
	    			    else
	    					Yii::$app->session->setFlash('error', "Tracking number Not found!!".json_encode($untrackedorder)."");
	    				
	    			}
				fclose($handle);
				//return;
			}
		else{
			if($config)
				return;
			else
				Yii::$app->session->setFlash('error', "No order ready to ship!!!!");
		}	
		return $this->redirect(['index']);
    }
    
    
    public function getShippedItemsProcessedData($data){
    	//print_r($data);
    	$price = 0;
    	if(!isset($data[0])){
    		$data = [$data];
    	}
    	$orderStatus = 'shipped';

    	foreach($data as $item){
    		$status = isset($item['orderLineStatuses']['orderLineStatus']['status'])?$item['orderLineStatuses']['orderLineStatus']['status']:$item['orderLineStatuses']['orderLineStatus'][0]['status'];
    		if($status=='Shipped')
    			$price += $this->getTotal($item['charges']['charge'])+$this->getTax($item['charges']['charge']);
    		if($status == 'Created'){
    			$orderStatus = 'inprogress';
    		}
    	}
    	//echo $orderStatus;die;
    	//echo $price;die("dfgdf");
    	return ['price'=>$price,'status'=>$orderStatus];
    }
    

    /*public function actionCheckstatus()
    {

    	$query = "SELECT * FROM `walmart_order_details` WHERE `status` = 'shipped' AND `merchant_id`=".MERCHANT_ID;
    	$result = Data::sqlRecords($query, 'all');
    	
    	$total = 0;
    	if(is_array($result) && count($result)>0)
    	{
    		foreach ($result as $val)
    		{
    			if($val['purchase_order_id'])
    			{
    				$this->walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
    				$orderdata = $this->walmartHelper->getOrder($val['purchase_order_id']);
    				$shipdata = json_decode($orderdata,true);
    				$total=$shipmentData['list']['elements']['order'][0]['orderLines']['orderLine'][0]['charges']['charge'];
    				foreach($total as $tval){
    					$total+=$tval['chargeAmount']['amount'];
    				}
    				//$total += $val['order_total'];
    			}
    		}
    		echo $total;die("fgf");
    	}
       // if($_GET['id']){
            $this->walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
            $orderdata = $this->walmartHelper->getOrder($_GET['id']);
            $shipdata = json_decode($orderdata,true);
            print_r($shipdata);die;
       // }
        
    }*/
    
    /**
     * function for getting shipiing items with lineNumber
     * 
     * @return  array
     */

    public function getShipmentItems($items,$shipmentData){ 
    	
    	$shipmentData = json_decode($shipmentData,true);
    	//print_r($items);

        $itemsToShip = array();
       
        foreach($items as $item){
        	//print_r($item);
        	$sku= $item['merchant_sku'];
        	$sku=Data::getKey($sku);
        	
        	//echo $sku;
        	//if(count($shipmentData[$sku])>0){
    		foreach ($shipmentData[$sku] as $sku1){
    			$item['response_shipment_sku_quantity'] = 1;
                $item['lineNumber'] = $sku1['lineNumber'];
                $itemsToShip[] = $item;
    		}
        	//}
        }
       //print_r($itemsToShip);die;
        return $itemsToShip;
    }
    
    public function actionViewProgressShipment()
    {
        $query = "select `walmart_order_details`.`id`,`walmart_order_details`.`merchant_id`,`purchase_order_id`,`username`,`auth_key`,`consumer_id`,`secret_key`,`consumer_channel_type_id` FROM `walmart_order_details` inner join `user` ON `walmart_order_details`.`merchant_id`=`user`.`id`inner join `walmart_configuration` ON `walmart_order_details`.`merchant_id`=`walmart_configuration`.`merchant_id` WHERE `walmart_order_details`.`status`='acknowledged' order by `walmart_order_details`.`id` desc";

        $orderAckCollection = Data::sqlRecords($query, "all", "select");
        //print_r($orderAckCollection);die();
      
        if (!empty($orderAckCollection) && is_array($orderAckCollection)) 
        {
            $j=0;
            foreach ($orderAckCollection as $key => $value) 
            {               
                $shopname = $value['username'];
                $token = $value['auth_key'];
                $shopify_order_id = $value['shopify_order_id'];

                $response=array();
                   
                $this->walmartHelper = new Walmartapi($value['consumer_id'],$value['secret_key'],$value['consumer_channel_type_id']);
                $ackResponse = $this->walmartHelper->acknowledgeOrder($value['purchase_order_id']);

                echo $j . "Total Orders acknowledhged on Walmart :: " . $$ackResponse;

                $j++;

               /* if ($j==301) {
                   print_r($j);die('hddh');
                }*/
            }
        }
    }
    public function getStandardOffsetUTC()
    {
        $timezone="";
        $timezone = date_default_timezone_get();
        if($timezone == 'UTC') {
            return '';
        } else {
            $timezone = new \DateTimeZone($timezone);
            $transitions="";
            $transitions = array_slice($timezone->getTransitions(), -3, null, true);
    
            foreach (array_reverse($transitions, true) as $transition)
            {
                if (isset($transition['isdst']) && $transition['isdst'] == 1)
                {
                    continue;
                }
                return sprintf('%+03d:%02u', $transition['offset'] / 3600, abs($transition['offset']) % 3600 / 60);
            }
            return false;
        }
    }
    public function getTestData(){
        $data = '{"id":4410628300,"email":"developer.cedcoss@gmail.com","closed_at":null,"created_at":"2016-10-02T07:43:28-04:00","updated_at":"2016-10-03T01:57:58-04:00","number":335,"note":"Jet-Integration(jet.com)","token":"541678658081271f47d088ef22b24031","gateway":"","test":false,"total_price":"96.98","subtotal_price":"96.98","total_weight":0,"total_tax":"0.00","taxes_included":false,"currency":"AUD","financial_status":"paid","confirmed":true,"total_discounts":"0.00","total_line_items_price":"96.98","cart_token":null,"buyer_accepts_marketing":false,"name":"#1351","referring_site":null,"landing_site":null,"cancelled_at":null,"cancel_reason":null,"total_price_usd":"74.27","checkout_token":null,"reference":null,"user_id":null,"location_id":null,"source_identifier":null,"source_url":null,"processed_at":"2016-10-02T07:43:28-04:00","device_id":null,"browser_ip":null,"landing_site_ref":null,"order_number":1335,"discount_codes":[],"note_attributes":[],"payment_gateway_names":[],"processing_method":"","checkout_id":null,"source_name":"1435898","fulfillment_status":"fulfilled","tax_lines":[],"tags":"jet.com","contact_email":"developer.cedcoss@gmail.com","order_status_url":null,"line_items":[{"id":8752612172,"variant_id":21487410118,"title":"Men\'snow","quantity":1,"price":"96.98","grams":0,"sku":"QSKIT","variant_title":null,"vendor":"Fashion Apparel ","fulfillment_service":"manual","product_id":6797978630,"requires_shipping":true,"taxable":true,"gift_card":false,"name":"Men\'snow","variant_inventory_management":"shopify","properties":[],"product_exists":true,"fulfillable_quantity":0,"total_discount":"0.00","fulfillment_status":"fulfilled","tax_lines":[]}],"shipping_lines":[],"billing_address":{"first_name":"Aubrie","address1":"214 13th St. West","phone":"7012282350","city":"Bottineau","zip":"58318","province":"North Dakota","country":"United States","last_name":"Miller","address2":null,"company":null,"latitude":48.8187816,"longitude":-100.4481544,"name":"Aubrie Miller","country_code":"US","province_code":"ND"},"shipping_address":{"first_name":"Aubrie","address1":"214 13th St. West","phone":"7012282350","city":"Bottineau","zip":"58318","province":"North Dakota","country":"United States","last_name":"Miller","address2":null,"company":null,"latitude":48.8187816,"longitude":-100.4481544,"name":"Aubrie Miller","country_code":"US","province_code":"ND"},"fulfillments":[{"id":3655051468,"order_id":4403230156,"status":"success","created_at":"2016-10-03T01:57:58-04:00","service":"manual","updated_at":"2016-10-03T01:57:58-04:00","tracking_company":"FedEx","shipment_status":null,"tracking_number":"351313135512","tracking_numbers":["351313135512"],"tracking_url":"http:\/\/www.fedex.com\/Tracking?tracknumbers=351313135512\u0026action=track","tracking_urls":["http:\/\/www.fedex.com\/Tracking?tracknumbers=351313135512\u0026action=track"],"receipt":{},"line_items":[{"id":8752612172,"variant_id":21487410118,"title":"Men\'snow","quantity":1,"price":"96.98","grams":0,"sku":"QSKIT","variant_title":null,"vendor":"Fashion Apparel ","fulfillment_service":"manual","product_id":6797978630,"requires_shipping":true,"taxable":true,"gift_card":false,"name":"Men\'snow","variant_inventory_management":"shopify","properties":[],"product_exists":true,"fulfillable_quantity":0,"total_discount":"0.00","fulfillment_status":"fulfilled","tax_lines":[]}]}],"refunds":[],"customer":{"id":1478295363,"email":"developer.cedcoss@gmail.com","accepts_marketing":false,"created_at":"2015-09-30T02:36:43-04:00","updated_at":"2016-10-02T07:43:28-04:00","first_name":"Aubrie","last_name":"Miller","orders_count":5,"state":"disabled","total_spent":"0.00","last_order_id":4403230156,"note":null,"verified_email":true,"multipass_identifier":null,"tax_exempt":false,"tags":"password page, prospect","last_order_name":"#1335","default_address":{"id":5105599244,"first_name":"Aubrie","last_name":"Miller","company":null,"address1":"214 13th St. West","address2":null,"city":"Bottineau","province":"North Dakota","country":"United States","zip":"58318","phone":"7012282350","name":"Aubrie Miller","province_code":"ND","country_code":"US","country_name":"United States","default":true}}}';
        return json_decode($data,true);
    }
    
    public function getShipingResponseData($data=false,$order=false,$test = true){
    	if($test){
    		$data1 = '{"order":{"purchaseOrderId":"3576798843216","customerOrderId":"5621663399206","customerEmailId":"mparthasarathy@walmartlabs.com","orderDate":"2016-10-18T06:45:05.000Z","shippingInfo":{"phone":"6505151012","estimatedDeliveryDate":"2016-11-02T06:00:00.000Z","estimatedShipDate":"2016-10-19T06:00:00.000Z","methodCode":"Standard","postalAddress":{"name":"DonotShip WalmartTestOrder","address1":"860 West California Ave","address2":"Cube 860.2.127 ","city":"Sunnyvale","state":"CA","postalCode":"94086","country":"USA","addressType":"RESIDENTIAL"}},"orderLines":{"orderLine":{"lineNumber":"1","item":{"productName":"Toms Classics Round Toe Canvas Loafer","sku":"78370"},"charges":{"charge":{"chargeType":"PRODUCT","chargeName":"ItemPrice","chargeAmount":{"currency":"USD","amount":"58.00"}}},"orderLineQuantity":{"unitOfMeasurement":"EACH","amount":"1"},"statusDate":"2016-10-18T08:03:30.000Z","orderLineStatuses":{"orderLineStatus":{"status":"Shipped","statusQuantity":{"unitOfMeasurement":"EACH","amount":"1"},"trackingInfo":{"shipDateTime":"2016-10-03T00:57:58.000Z","carrierName":{"carrier":"FedEx"},"methodCode":"Standard","trackingNumber":"351313135512","trackingURL":"http:\/\/www.fedex.com\/Tracking?tracknumbers=351313135512&action=track"}}}}}}}';
    		return $data1;
    	}
    }
    
    public function getDataarray(){
    	return 	$data=Array (
    			"shipments" => Array (
    					0 => Array (
    							"purchase_order_id" => 4577379477484,
    							"shipment_tracking_number" => 9400111699000583015217,
    							"shipment_tracking_url" => '',
    							"response_shipment_date" => '2016-12-15T19:24:24.0000000-08:00',
    							"response_shipment_method" =>'Standard',
    							"expected_delivery_date" => '2016-12-15T19:24:24.0000000-08:00',
    							"ship_from_zip_code" => 85705,
    							"carrier_pick_up_date" =>'2016-12-15T19:24:24.0000000-08:00',
    							"carrier" => UPS,
    							"shipment_items" => Array (
    									0 => Array (
    											"shipment_item_id" => 7187
    											,"merchant_sku" => 'CHARGE2-ROXANNACHARM-GLD'
    											,"response_shipment_sku_quantity" => 1
    											,"response_shipment_cancel_qty" => 0
    											,"lineNumber" => 1
    									),
    									1 => Array (
    											"shipment_item_id" => 7187 ,
    											"merchant_sku" => 'ALTA-CROSSCHARM-SILV' ,
    											"response_shipment_sku_quantity" => 1,
    											"response_shipment_cancel_qty" => 0,
    											"lineNumber" => 2
    									),
    									2 => Array (
    											"shipment_item_id" => 7187 ,
    											"merchant_sku" => 'CHARGE2-BRIANNA-GOLD',
    											"response_shipment_sku_quantity" => 1,
    											"response_shipment_cancel_qty" => 0
    											,"lineNumber" => 3
    									) ,
    									3 => Array (
    											"shipment_item_id" => 7187,
    											"merchant_sku" => ALTA-ROXANNACHARM-GLD ,
    											"response_shipment_sku_quantity" => 1 ,
    											"response_shipment_cancel_qty" => 0 ,
    											"lineNumber" => 4
    									)
    							)
    					)
    			)
    	) ;
    }

    
}
