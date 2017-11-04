<?php
namespace frontend\modules\tophatter\controllers;
use Yii;
use yii\web\Controller;
use frontend\modules\jet\models\JetCronSchedule;
use frontend\modules\jet\models\JetExtensionDetail;
use frontend\modules\jet\components\Jetappdetails;
use frontend\modules\jet\components\Jetapimerchant;
use frontend\modules\jet\components\Jetproductinfo;
use frontend\modules\jet\components\Sendmail;
use frontend\modules\jet\components\BigcommerceClientHelper;
use frontend\modules\jet\components\Data;
use frontend\modules\jet\components\Mail;
use frontend\modules\jet\components\Orderdata;
use frontend\modules\jet\controllers\JetorderimporterrorController;
use frontend\modules\tophatter\controllers\TophatterorderdetailController;
use frontend\modules\tophatter\models\TophatterCronSchedule;
use frontend\modules\tophatter\components\Tophatterappdetails;


/**
* Test controller
*/
class TophattercronController extends Controller 
{

  public function actionRemovefailedorders()
  {     
    $cron_array = $cronData = [];  
    $cronData = JetCronSchedule::find()->where(['cron_name'=>'remove_failed_order'])->one();
    if($cronData && $cronData['cron_data']!="")
    {
        $cron_array = json_decode($cronData['cron_data'],true);
    }
    else
    {
        $cron_array = Jetappdetails::getConfig();
    }
    if (!empty($cron_array)) 
    {
      foreach ($cron_array as $key => $value11) 
      {
        $failedOrders = [];
        $merchant_id = $key;
        /*
          if ($merchant_id !=14) {
            continue;
          }
        */
        $fullfilment_node_id = $value11['fullfilment_node_id'];
        $api_host = "https://merchant-api.jet.com/api";
        $api_user = $value11['api_user'];
        $api_password = $value11['api_password'];
        $jetHelper = new Jetapimerchant($api_host,$api_user,$api_password);

        $failedOrders = Data::sqlRecords("SELECT `merchant_order_id`,`reference_order_id` FROM `jet_order_import_error` WHERE `merchant_id`='".$merchant_id."'  ","all","select");
        
        foreach ($failedOrders as $key => $value) 
        { 
          $path = Yii::getAlias('@webroot').'/var/jet/order/'.$merchant_id.'/'.$value['reference_order_id'];
          if(!file_exists($path)){
              mkdir($path,0775, true);
          }
          $handle=fopen($path.'/ordercancel.log','a+');

          $orderdata = array();
          $orderdata = $jetHelper->CGetRequest('/orders/withoutShipmentDetail/'.$value['merchant_order_id'],$merchant_id);
          fwrite($handle,PHP_EOL." ORDER RESPONSE DATA FOR MERCHANT_ORDER_ID =>".$value['merchant_order_id'].PHP_EOL.$orderdata.PHP_EOL);
          $orderdata = json_decode($orderdata,true);
          
          if ( ($orderdata['status']=="complete") || ($orderdata['status']=="acknowledged") ) 
          {
            $removeQuery = "DELETE FROM `jet_order_import_error` WHERE `merchant_id`='".$merchant_id."' AND `merchant_order_id`='".$value['merchant_order_id']."' ";
            fwrite($handle,PHP_EOL." ORDER ALREADY ACKNOWLEDGED/COMPLETED ON JET (REMOVING FROM FAILED ORDER TABLE-> QUERY) ".PHP_EOL.$removeQuery.PHP_EOL);
            Data::sqlRecords($removeQuery,null,"update");
          }
          elseif (isset($orderdata['order_ready_date']))              
          {
            $cancelOrderCheck = array();
            $cancelOrderCheck = Data::sqlRecords("SELECT value FROM `jet_config` WHERE `merchant_id`='{$merchant_id}' and `data`='cancel_order'",'one','select');
            if ($cancelOrderCheck['value']!='Yes') 
            {
              return;
            }
            else
            {
              $datetime1 = new \DateTime($orderdata['order_ready_date']);
              $datetime2 = new \DateTime(date("Y-m-d\TH:i:s\Z"));
              $difference = $datetime1->diff($datetime2);
              fwrite($handle,PHP_EOL." DATE INTERVAL  ".PHP_EOL.json_encode($difference).PHP_EOL);
              if ( (($difference->y)>0) || (($difference->m)>0) || (($difference->d)>0) || (($difference->h)>2) ) 
              {
                $postData = ['jetHelper'=>$jetHelper,'merchant_id'=>$merchant_id,'merchant_order_id'=>$orderdata['merchant_order_id'],'reference_order_id'=>$orderdata['reference_order_id']];
                fwrite($handle,PHP_EOL." CANCELLING THE READY STATE ORDERS(MORE THAN 2 HOURS)=>DATA  ".PHP_EOL.json_encode($postData).PHP_EOL);
                $obj = new JetorderimporterrorController(Yii::$app->controller->id,'');
                $obj->actionCancel($postData);  
              }
            }            
          }
          fclose($handle);
        }
      } 
    }   
  }    
  
  public function actionTophatterorder()
  {
    ob_start ();
    $obj = new TophatterorderdetailController(Yii::$app->controller->id,'');
    $cron_array = array();
    $connection = Yii::$app->getDb();
    $cronData = TophatterCronSchedule::find()->where(['cron_name'=>'fetch_order'])->one();
    if($cronData && $cronData['cron_data'] != ""){
      $cron_array = json_decode($cronData['cron_data'],true);
    }
    else
    {
      $cron_array = Tophatterappdetails::getConfig();
    }
    $processedMerchantCount = 0;
    $size = 40;
    
    $status_array['total_count'] = count($cron_array);
    $error_array = array();
    if(is_array($cron_array) && count($cron_array)>0)
    {
      foreach($cron_array as $k=>$Config)
      {
        try
        {
            $Config['merchant_id'] = $k;
            $obj->actionCreate($Config);
           
            unset($cron_array[$k]);
        }
        catch (Exception $e)
        {
          //$OrderError["error"][]=$e->getMessage();
          Data::createLog("order fetch exception ".$e->getTraceAsString(),'tophatterOrderCron/exception.log','a',true);
          unset($cron_array[$k]);
          continue;
        }
        $processedMerchantCount++;
      if($processedMerchantCount==$size)
        break;
      }
      
    }

    if(count($cron_array)==0)
      $cronData->cron_data="";
    else
      $cronData->cron_data=json_encode($cron_array);

    $cronData->save(false);
    print_r($status_array);
    unset($cronData);
    unset($status_array);
    $html = ob_get_clean();
    
  }
  
  public function actionSyncorder()
  {
    $query="";
    $countSync = 0;
    try
    {
      $jetOrderData = [];
      
      $query="SELECT `merchant_id`,`merchant_order_id`,`order_data`,`username`,`auth_key`,`store_hash`  FROM `jet_order_detail` INNER JOIN `user` ON `jet_order_detail`.`merchant_id`=  `user`.`id`  WHERE jet_order_detail.`status` ='acknowledged' AND (bigcommerce_order_id IS NULL OR bigcommerce_order_id='')";
      
      
      $jetOrderData = Data::sqlRecords($query,'all','select');
      
      if(!empty($jetOrderData) && count($jetOrderData)>0)
      {
        foreach ($jetOrderData as $order_value)
        {
          $result = $error_array = $configSetting = [];
          $merchant_id = $token = $shopname = $storehash = "";

          $merchant_id = $order_value['merchant_id']; 
          $token=$order_value['auth_key'];
          $shopname = $order_value['username'];
          $storehash = $order_value['store_hash'];
          
          
          $configSetting = Jetproductinfo::getConfigSettings($merchant_id);
          $bigcom = new BigcommerceClientHelper(JET_APP_KEY, $token, $storehash);
          
          $result = json_decode($order_value['order_data'],true);  
          
          Orderdata::syncJetOrder($bigcom,$configSetting,$result,$merchant_id,$countOrder);
        }
      }          
    }
    catch (Exception $e)
    {
      Yii::$app->session->setFlash('error', "Exception:".$e->getMessage());
    }  
  }

  public function actionShiporder($cron=false)
  {
    date_default_timezone_set("Asia/Kolkata");
    $flag = 0;        
    $query = "";
    $orderAckCollection = [];
      
    if(!$cron)
    {
      $merchant_id = Yii::$app->user->identity->id;

      $query = "select `jet_order_detail`.`id`,`jet_order_detail`.`merchant_id`,`reference_order_id`,`merchant_order_id`,`bigcommerce_order_id`,`username`,`auth_key`,`store_hash`,`api_user`,`api_password`,`fullfilment_node_id`,`order_data`,`install_status` from `jet_order_detail` inner join `user` on jet_order_detail.merchant_id=user.id inner join `jet_configuration` on jet_configuration.merchant_id=user.id inner join `jet_shop_details` on `jet_shop_details`.merchant_id=user.id where (jet_order_detail.status='acknowledged' or jet_order_detail.status='inprogress') and jet_order_detail.bigcommerce_order_id !='' AND `jet_shop_details`.`install_status`!=0 and jet_order_detail.merchant_id='".$merchant_id."'";
    }
    else
    {
      $query = "select `jet_order_detail`.`id`,`jet_order_detail`.`merchant_id`,`reference_order_id`,`merchant_order_id`,`bigcommerce_order_id`,`username`,`auth_key`,`store_hash`,`api_user`,`api_password`,`fullfilment_node_id`,`order_data`,`install_status` from `jet_order_detail` inner join `user` on jet_order_detail.merchant_id=user.id inner join `jet_configuration` on jet_configuration.merchant_id=user.id inner join `jet_shop_details` on `jet_shop_details`.merchant_id=user.id where (jet_order_detail.status='acknowledged' or jet_order_detail.status='inprogress') and jet_order_detail.bigcommerce_order_id !='' AND `jet_shop_details`.`install_status`!=0";
    }
      
    $orderAckCollection = Data::sqlRecords($query, "all", "select");
    if (!empty($orderAckCollection) && is_array($orderAckCollection)) 
    {
      foreach ($orderAckCollection as $key => $value) 
      {                
        if (!empty($value) && is_array($value) && isset($value['bigcommerce_order_id'])) 
        {
          $merchant_id = $value['merchant_id'];
          $shopname = $value['username'];
          $token = $value['auth_key'];
          $storehash = $value['store_hash'];

          $Jet_api_user = $value['api_user'];
          $Jet_api_password = $value['api_password'];
          $configSetting = Jetproductinfo::getConfigSettings($merchant_id);
          $bigcom = new BigcommerceClientHelper(JET_APP_KEY, $token, $storehash);  
          $jetHelper = new Jetapimerchant("https://merchant-api.jet.com/api", $Jet_api_user, $Jet_api_password); 
          Orderdata::shipJetOrder($bigcom,$jetHelper,$configSetting,$value,$merchant_id,$countShip);
        }// Check bigcommerce_order_id exist
      } // foreach  close  (All data collection)
    }
    
    if(!$cron)
    {
      if($countShip>0)
        Yii::$app->session->setFlash('success',$countShip. "Order(s) successfully fulfilled on jet");
      else
        Yii::$app->session->setFlash('success',"All orders are already completed on jet");
      return $this->redirect(Yii::getAlias('@webjeturl').'/jetorderdetail/index');
    }
  }// Get Shipment function close

  public function actionFetchackorder($cron=false)
  {   
    if (!$cron) 
    {      
      $merchant_id = Yii::$app->user->identity->id;
      $configDetails = [];
      $configDetails = Data::getjetConfiguration($merchant_id);  
      if(!empty($configDetails))
      {
        try
        {
          $jetHelper = new Jetapimerchant('https://merchant-api.jet.com/api',$configDetails['api_user'],$configDetails['api_password']);

          $countOrder=0;
          $orderdata="";
          $response=[];
          $orderdata = $jetHelper->CGetRequest('/orders/acknowledged',$merchant_id);
          $response  = json_decode($orderdata,True);
          if(isset($response['order_urls']) && count($response['order_urls']) > 0)
          {
            foreach($response['order_urls'] as $jetorderurl)
            {
              $result1 = $result = "";
              $result1 = $jetHelper->CGetRequest($jetorderurl,$merchant_id);
              $result = json_decode($result,true);
              
              if(sizeof($result) > 0 && isset($result['merchant_order_id']))
              {
                $resultdata = [];
                
                $merchantOrderid = $result['merchant_order_id'];
                $reference_order_id = $result['reference_order_id'];

                $queryObj="";
                $query="SELECT `merchant_order_id` FROM `jet_order_detail` WHERE merchant_id='".$merchant_id."' AND merchant_order_id='".$merchantOrderid."'";
                $resultdata = Data::sqlRecords($query,'one','select');
                
                if(!$resultdata)
                {
                  $OrderItemData=[];
                  $autoReject = false;
                  $i = $ikey = 0;
                  foreach ($result['order_items'] as $key=>$value)
                  {                 
                    $OrderItemData['sku'][]=$value['merchant_sku'];
                    $OrderItemData['order_item_id'][]=$value['order_item_id'];
                  }
                  
                  if(isset($result['order_items']) && count($result['order_items'])>0)
                  {                 
                    if(isset($ackData['errors'])){
                      $countOrder++;
                      $queryObj="";
                      $query='INSERT INTO `jet_order_detail`
                                (
                                  `merchant_id`,
                                  `merchant_order_id`,
                                  `order_data`,
                                  `reference_order_id`,
                                  `status`,
                                  `merchant_sku`,
                                  `order_item_id`,
                                  `deliver_by`
                                )
                              VALUES(
                                  "'.$merchant_id.'",
                                  "'.$result['merchant_order_id'].'",
                                "'.addslashes($result1).'",
                                "'.$result['reference_order_id'].'",
                                "acknowledged",
                                  "'.implode(',',$OrderItemData['sku']).'",
                                  "'.implode(',',$OrderItemData['order_item_id']).'",
                                  "'.$result['order_detail']['request_delivery_by'].'"
                                )';
                      Data::sqlRecords($query,null,'insert');
                    }
                  }
                  unset($response,$result,$resultdata,$ackData);
                }                 
              }
            }         
          }

          if ($countOrder>0)
            Yii::$app->session->setFlash('success',$countOrder. "Order(s) has been successfully fetched in app");
          else 
            Yii::$app->session->setFlash('success'," There is no Order in acknowledged state on jet");
          return $this->redirect(Yii::getAlias('@webjeturl').'/jetorderdetail/index');
        }
        catch (Exception $e)
        {
          Yii::$app->session->setFlash('error', "Exception:".$e->getMessage());
          return $this->redirect(['index']);
        }
      }
    }        
  }

  public function actionUpdaterefundstatus()
  {
    $cronData=$status="";
    $cron_array=$status_array=[];
    $cronData=JetCronSchedule::find()->where(['cron_name'=>'retund_status'])->one();
    if($cronData && $cronData['cron_data']!=""){
      $cron_array=json_decode($cronData['cron_data'],true);
    }
    else
    {
      $cron_array = Jetappdetails::getConfig();
    }    
    $countArr=0;
    $status_array['total_count']=count($cron_array);
    foreach($cron_array as $key=>$jetConfig)
    {
      try
      {
        $merchant_id=$key;
        $count=0;
        $fullfillmentnodeid=$api_host=$api_user=$api_password=$jetHelper="";
        $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
        $api_host=$jetConfig['api_host'];
        $api_user=$jetConfig['api_user'];
        $api_password=$jetConfig['api_password'];
        $jetHelper = new Jetapimerchant($api_host,$api_user,$api_password);
        $countArr++;
        unset($cron_array[$key]);
        $result= [];
        $query="SELECT `refund_id` FROM `jet_refund` WHERE merchant_id='".$merchant_id."' AND refund_status='created'";
        $result = Data::sqlRecords($query,'all','select');
        
        if(!empty($result))
        {
          foreach($result as $res)
          {
            $refundid=$responsedata=$data="";
            $refundid=$res['refund_id'];
            
            $data=$jetHelper->CGetRequest('/refunds/state/'.$refundid,$merchant_id,$status);
            if($data==false)
              continue;
            $responsedata=json_decode($data,true);
            if( ($status== 200) && isset($responsedata['refund_status']) && $responsedata['refund_status']!='created')
            {
              $count++;
              
              $updateResult="";
              $query="UPDATE `jet_refund` SET refund_status='".addslashes($responsedata['refund_status'])."' where refund_id='".$refundid."'";
              Data::sqlRecords($query,null,'update');
            }
          }     
        }
        $status_array[$merchant_id]=$count;
        if($countArr>=20)
          break;
      }
      catch(Exception $e)
      {
        if(array_key_exists($key,$cron_array)){
          unset($cron_array[$key]);
        }
        $status_array[$merchant_id]['error']=$e->getMessage();
        continue;
      }
    }
    if(count($cron_array)==0)
      $cronData->cron_data="";
    else
      $cronData->cron_data=json_encode($cron_array);
    $cronData->save(false);
  } 
  public function actionCreatejetreturn()
  {

    $cronData="";
    $cron_array=$status_array=[];
    $cronData=JetCronSchedule::find()->where(['cron_name'=>'fetch_return'])->one();
    if($cronData && trim($cronData['cron_data'])!=""){
      $cron_array=json_decode($cronData['cron_data'],true);
    }
    else
    {
      $cron_array = Jetappdetails::getConfig();      
    }
   
    $countArr=0;
    $status_array['total_count']=count($cron_array);
    foreach($cron_array as $key=>$jetConfig)
    {
      try
      {
        $count=0;
        $merchant_id=$api_host=$api_user=$api_password=$jetHelper=$fullfillmentnodeid="";
        $merchant_id=$key;
                
        $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
        $api_host=$jetConfig['api_host'];
        $api_user=$jetConfig['api_user'];
        $api_password=$jetConfig['api_password'];
        $jetHelper = new Jetapimerchant($api_host,$api_user,$api_password);
        $countArr++;
        unset($cron_array[$key]);
        $data="";
        $response="";
        $data = $jetHelper->CGetRequest('/returns/created',$merchant_id);
        if($data==false)
          continue;
        $response  = json_decode($data);
        $response=$response->return_urls;
        $count=0;
        if(!empty($response) && count($response)>0)
        {
          foreach($response as $res)
          {
            $arr=$resultdata=[];
            $arr=explode("/",$res);
            $returnid="";
            $returnid=$arr[3];
            
            $query="SELECT `returnid` FROM `jet_return` WHERE merchant_id='".$merchant_id."' AND returnid='".$returnid."'";
            $resultdata = Data::sqlRecords($query,'one','select');
            
            if(empty($resultdata))
            {
              $returndetails="";
              $returndetails = $jetHelper->CGetRequest(rawurlencode($res),$merchant_id);
              if($returndetails)
              {
                $return = $order = [];
                $return = json_decode($returndetails,true);
                $return['timestamp']=date('d-m-Y H:i:s');
                
                $query="SELECT `merchant_order_id` FROM `jet_order_detail` WHERE merchant_id='".$merchant_id."' AND merchant_order_id='".$return['merchant_order_id']."'";
                $order = Data::sqlRecords($query,'one','select');
                if(!empty($order))
                {
                  $count++;
                  $query='INSERT INTO `jet_return`
                            (
                              `returnid`,
                              `order_reference_id`,
                              `merchant_id`,
                              `status`,
                              `return_data`
                            )
                          VALUES(
                              "'.$returnid.'",
                              "'.$return['reference_order_id'].'",
                              "'.$merchant_id.'",
                              "created",
                            "'.addslashes(json_encode($return)).'"
                            )';
                  Data::sqlRecords($query,null,'insert');
                }
                else
                  continue;
              }
            }
          }
        }
        $status_array[$merchant_id]=$count;
        if($countArr>=20)
          break;
      }
      catch(Exception $e)
      {
        if(array_key_exists($key,$cron_array)){
          unset($cron_array[$key]);
        }
        $status_array[$merchant_id]['error']=$e->getMessage();
        continue;
      }
    }
    if(count($cron_array)==0)
      $cronData->cron_data="";
    else
      $cronData->cron_data=json_encode($cron_array);
    $cronData->save(false);
  }

  public function actionUpdatejetproductstatus()
  {        
    $cronData="";
    $cron_array=$status_array=[];
    $cronData=JetCronSchedule::find()->where(['cron_name'=>'product_status'])->one();
    if($cronData && trim($cronData['cron_data'])!=""){
      $cron_array=json_decode($cronData['cron_data'],true);
    }
    else
    {
      $cron_array = Jetappdetails::getConfig();      
    }
    $count=0;
    $status_array['total_count']=count($cron_array);
    foreach($cron_array as $key=>$jetConfig)
    {
      $count++;
      $value_array=array();
      $return_count=0;
      $ids_array=array();
      
      $jetHelper="";
      $merchant_id=$key;
      $value_array['merchant_id']=$merchant_id;
      $fullfillmentnodeid=$jetConfig['fullfilment_node_id'];
      $api_user=$jetConfig['api_user'];
      $api_password=$jetConfig['api_password'];
      $jetHelper = new Jetapimerchant("https://merchant-api.jet.com/api",$api_user,$api_password);
      
      if(isset($collection['ids']) && $collection['ids'] > 0)
      {
        $response = $status = "";
        $updateCount = 0;
        $checkUploadedCount = $resArray = [];
        $checkUploadedCount = json_decode($this->jetHelper->CGetRequest('/portal/merchantskus?from=0&size=1',$merchant_id),true);  

        $response =$this->jetHelper->CGetRequest('/portal/merchantskus?from=0&size='.$checkUploadedCount['total'],$merchant_id,$status);
        $resArray=json_decode($response,true);                  
        if(is_array($resArray) && count($resArray)>0 && $status==200)
        {
          foreach($resArray['merchant_skus'] as $value)
          {
            if (isset($value['status'])) 
            {
              $updateCount++;
              Data::sqlRecords('UPDATE jet_product set status="'.$value['status'].'" WHERE sku="'.addslashes($value['merchant_sku']).'" AND merchant_id="'.$merchant_id.'"',null,'update');
              Data::sqlRecords('UPDATE jet_product_variants set status="'.$value['status'].'" WHERE option_sku="'.addslashes($value['merchant_sku']).'" AND merchant_id="'.$merchant_id.'"',null,'update');
            }                    
          } 
          if($updateCount>0)
            echo $merchant_id."->".$updateCount."<br>";          
        }
      }
      unset($cron_array[$key]);
      if($count>=100){
        break;
      }
    }
    if(count($cron_array)==0)
      $cronData->cron_data="";
    else
      $cronData->cron_data=json_encode($cron_array);
    $cronData->save(false);
    
    $status_array['remaining_array']=count($cron_array);   
    die;
  }

  public function actionUpdateProductOnJet()
  {
    try
    {
      $message="";
      $productUpdate=Data::sqlRecords('SELECT product_id,temp.merchant_id,fullfilment_node_id,api_user,api_password FROM `jet_product_tmp` as temp LEFT JOIN `jet_configuration` as config ON temp.merchant_id=config.merchant_id ORDER BY temp.id  ASC LIMIT 0,500','all','select');
      
      $fullfillmentnodeid = '';
      if(is_array($productUpdate) && count($productUpdate)>0)
      {  
        foreach($productUpdate as $value)
        {
          $merchant_id = $value['merchant_id'];
          $userdata=Data::sqlRecords('SELECT * from `user` WHERE `id`="'.$merchant_id.'"','one','select');
          if(isset($userdata['auth_key']) && isset($userdata['store_hash']))
          {
            $token=$userdata['auth_key'];
            $storehash=$userdata['store_hash'];
            $bigcom = new BigcommerceClientHelper('twagyxrn27mxjav4k99fbke4w5lyme7',$token,$storehash);
          }
          $path=\Yii::getAlias('@webroot').'/var/jet/product/update/'.$merchant_id.'/';
          if (!file_exists($path))
          {
            mkdir($path,0775, true);
          }
          $filename=$path.'/'.$value['product_id'].'.log';
          $file=fopen($filename,'w');
          fwrite($file,PHP_EOL.date('d-m-Y H:i:s')." Product Update".PHP_EOL);
          $jetHelper="";
          $fullfillmentnodeid = '';
          if($value['api_user'] && $value['api_password'])
          {
            $check='\n product config set';
            fwrite($file,PHP_EOL.$check);
            $fullfillmentnodeid = $value['fullfilment_node_id'];
            $jetHelper = new Jetapimerchant(API_HOST,$value['api_user'],$value['api_password']);
          }
          $customData = JetProductInfo::getConfigSettings($merchant_id);
          $customPrice = (isset($customData['fixed_price']) && $customData['fixed_price']=='yes')?$customData['fixed_price']:"";
          $newCustomPrice = (isset($customData['set_price_amount']) && $customData['set_price_amount'])?$customData['set_price_amount']:"";
          $import_status = (isset($customData['import_status']) && $customData['import_status'])?$customData['import_status']:"";

          Data::checkInstalledApp($merchant_id,$type=false,$installData);
          $onTophatter=isset($installData['tophatter'])?true:false;
        
          $query='SELECT bigproduct_id,title,sku,type,product_type,description,image,qty,weight,price,attr_ids,jet_attributes,brand,upc,jet_browse_node FROM `jet_product` WHERE `bigproduct_id`="'.$value['product_id'].'" AND `merchant_id`="'.$merchant_id.'" LIMIT 0,1';
          $result=Data::sqlRecords($query,"one","select");
          
          $data = $bigcom->call('GET', 'catalog/products/'.$value['product_id'].'?include=variants,images');
          $data = $data['data'];
          if(isset($result['bigproduct_id'])) 
          {
            //$count++;
            if(is_array($data) && count($data)>0)
                Jetproductinfo::productUpdateData($result,$data,$jetHelper,$token,$storehash,$fullfillmentnodeid,$merchant_id,$file,$customPrice,$newCustomPrice,$onTophatter,$import_status);
          }
          else
          {
              //add new product
              $message= "add new product with product id: ".$value['product_id'].PHP_EOL;
              fwrite($file, $message);
              $customData = JetProductInfo::getConfigSettings($merchant_id);
              $import_status = (isset($customData['import_status']) && $customData['import_status'])?$customData['import_status']:""; 
              Jetproductinfo::saveNewRecords($data, $merchant_id,$token,$storehash, $import_status);
          }
          Data::sqlRecords('DELETE FROM `jet_product_tmp` where id="'.$value['product_id'].'"');
          fclose($file);
          //$resultValues[$merchant_id]=$check;
        }
      }
      unset($productUpdate,$result,$data,$jetHelper,$customPrice,$jetConfig,$customData);
       
    }
    catch(Exception $e)
    {
        //echo $e->getMessage();die;
        $path=\Yii::getAlias('@webroot').'/var/jet/product/update/Exception';
        if (!file_exists($path)){
            mkdir($path,0775, true);
        }
        $file="";
        $filename=$path.'/Error.log';
        $file=fopen($filename,'a+');
        fwrite($file,"\n".date('d-m-Y H:i:s')."Exception Error:\n".$e->getMessage());
        fclose($file);
    }
  }
}