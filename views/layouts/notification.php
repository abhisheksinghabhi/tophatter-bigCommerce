<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\bootstrap\ActiveForm;
use yii\widgets\Menu;
use frontend\components\Jetnotificationscom;
?>

<?php $merchant_id="";?>
<?php $merchant_id=Yii::$app->user->identity->id;?>
<?php if($merchant_id !=""){?>
    <style type="text/css">
        .order-notofications {//padding: 10px;
          background: none repeat scroll 0 0 #f8f8f8;
          border-radius: 3px;
          box-shadow: 1px 0 5px 4px #eeeeee;
          margin-bottom: 15px;
          padding-bottom: 4px;
            padding-left: 8px;
            padding-top: 4px;
        }
        .order-notofications .span-notification:before {
          background: none repeat scroll 0 0 #ce553c;
          border-radius: 100%;
          color: #fff;
          content: "!";
          display: inline-block;
          font-size: 11px;
          font-weight: bold;
          height: 14px;
          margin-right: 5px;
          padding: 0;
          text-align: center;
          width: 14px;
        }
        .order-notofications .span-notification{
          color: #333;
          display: inline-block;
          font-size: 12px;
          margin-bottom: 2px;
          margin-right: 0;
          padding: 5px 0;
          position: relative;
          width: 49%;
        }
        .order-notofications .span-notification a {
          color: #f1785f;
          margin-left: 10px;
        }
    </style>
    <?php $order_ready_count=0;?>
    <?php $order_ready_count=Jetnotificationscom::getCount($merchant_id,"order-ready");?>
    <?php $order_ready_count=(int)$order_ready_count;?>
    <?php $order_ack_count=0;?>
    <?php $order_ack_count=Jetnotificationscom::getCount($merchant_id,"order-ack");?>
    <?php $order_ack_count=(int)$order_ack_count;?>
    <?php $order_error_count=0;?>
    <?php $order_error_count=Jetnotificationscom::getCount($merchant_id,"order-error");?>
    <?php $order_error_count=(int)$order_error_count;?>
    <?php $product_upload_count=0;?>
    <?php $product_upload_count=Jetnotificationscom::getCount($merchant_id,"product-upload");?>
    <?php $product_upload_count=(int)$product_upload_count;?>
    <?php $under_review_count=0;?>
    <?php $under_review_count=Jetnotificationscom::getCount($merchant_id,"product-under-jet-review");?>
    <?php $under_review_count=(int)$under_review_count;?>
    <?php $missing_listing_count=0;?>
    <?php $missing_listing_count=Jetnotificationscom::getCount($merchant_id,"product-missing-listing-data");?>
    <?php $missing_listing_count=(int)$missing_listing_count;?>
    <?php $available_purchase_count=0;?>
    <?php $available_purchase_count=Jetnotificationscom::getCount($merchant_id,"available-for-purchase");?>
    <?php $available_purchase_count=(int)$available_purchase_count;?>
    <?php $unauthorised_count=0;?>
    <?php $unauthorised_count=Jetnotificationscom::getCount($merchant_id,"product-unauthorized");?>
    <?php $unauthorised_count=(int)$unauthorised_count;?>
    <?php $excluded_count=0;?>
    <?php $excluded_count=Jetnotificationscom::getCount($merchant_id,"product-excluded");?>
    <?php $excluded_count=(int)$excluded_count;?>
    <?php $rejected_files_count=0;?>
    <?php $rejected_files_count=Jetnotificationscom::getCount($merchant_id,"rejected-files");?>
    <?php $rejected_files_count=(int)$rejected_files_count;?>

    <?php if($rejected_files_count >0 || $excluded_count >0 || $unauthorised_count >0 ||  $available_purchase_count >0 || $missing_listing_count > 0 || $under_review_count >0 || $product_upload_count >0 || $order_error_count > 0 || $order_ack_count > 0 || $order_ready_count > 0){?>
        <div class="notifications">
           <div class="order-notofications">
                
                <?php if($order_ready_count>0){?>
                    <?php $arrayParams =array();?>
                    <?php $params = array();?>
                    <?php $url="";?>
                    <?php $arrayParams = ['code' => 'order-ready'];?>
                    <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                    <?php $url=Yii::$app->urlManager->createUrl($params);?>
                    <span class="span-notification order-ready"><?=$order_ready_count?> Order(s) are in Ready State.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>
                
                <?php if($order_ack_count>0){?>
                    <?php $arrayParams =array();?>
                    <?php $params = array();?>
                    <?php $url="";?>
                    <?php $arrayParams = ['code' => 'order-ack'];?>
                    <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                    <?php $url=Yii::$app->urlManager->createUrl($params);?>
                    <span class="span-notification order-ack"><?=$order_ack_count?> Order(s) are in Acknowledge State & Ready to Ship.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>

            
                <?php if($order_error_count>0){?>
                    <?php $arrayParams =array();?>
                    <?php $params = array();?>
                    <?php $url="";?>
                    <?php $arrayParams = ['code' => 'order-error'];?>
                    <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                    <?php $url=Yii::$app->urlManager->createUrl($params);?>
                    <span class="span-notification order-error"><?=$order_error_count?> Order(s) are in Error State.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>
            
                    
                <?php if($product_upload_count>0){?>
                        <?php $arrayParams =array();?>
                        <?php $params = array();?>
                        <?php $url="";?>
                        <?php $arrayParams = ['code' => 'product-upload'];?>
                        <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                        <?php $url=Yii::$app->urlManager->createUrl($params);?>
                        <span class="span-notification product-upload"><?=$product_upload_count?> Product(s) are uploaded to Jet.com.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>
                    
                <?php if($under_review_count>0){?>
                        <?php $arrayParams =array();?>
                        <?php $params = array();?>
                        <?php $url="";?>
                        <?php $arrayParams = ['code' => 'product-under-jet-review'];?>
                        <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                        <?php $url=Yii::$app->urlManager->createUrl($params);?>
                        <span class="span-notification product-under-jet-review"><?=$under_review_count?> Products(s) having status Under Jet Review.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>
                    
                <?php if($missing_listing_count>0){?>
                        <?php $arrayParams =array();?>
                        <?php $params = array();?>
                        <?php $url="";?>
                        <?php $arrayParams = ['code' => 'product-missing-listing-data'];?>
                        <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                        <?php $url=Yii::$app->urlManager->createUrl($params);?>
                        <span class="span-notification product-missing-listing-data"><?=$missing_listing_count?> Products(s) having status Missing Listing Data.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>
                    
                <?php if($available_purchase_count>0){?>
                        <?php $arrayParams =array();?>
                        <?php $params = array();?>
                        <?php $url="";?>
                        <?php $arrayParams = ['code' => 'available-for-purchase'];?>
                        <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                        <?php $url=Yii::$app->urlManager->createUrl($params);?>
                        <span class="span-notification available-for-purchase"><?=$available_purchase_count?> Products(s) having status Available for Purchase.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>
                    
                <?php if($unauthorised_count>0){?>
                        <?php $arrayParams =array();?>
                        <?php $params = array();?>
                        <?php $url="";?>
                        <?php $arrayParams = ['code' => 'product-unauthorized'];?>
                        <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                        <?php $url=Yii::$app->urlManager->createUrl($params);?>
                        <span class="span-notification product-unauthorized"><?=$unauthorised_count?> Products(s) having status Unauthorized.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>
                    
                <?php if($excluded_count>0){?>
                        <?php $arrayParams =array();?>
                        <?php $params = array();?>
                        <?php $url="";?>
                        <?php $arrayParams = ['code' => 'product-excluded'];?>
                        <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                        <?php $url=Yii::$app->urlManager->createUrl($params);?>
                        <span class="span-notification product-excluded"><?=$excluded_count?> Products(s) having status Excluded.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>
                    
                <?php if($rejected_files_count>0){?>
                        <?php $arrayParams =array();?>
                        <?php $params = array();?>
                        <?php $url="";?>
                        <?php $arrayParams = ['code' => 'rejected-files'];?>
                        <?php $params = array_merge(["jetcatattribute/notificationredirect"], $arrayParams);?>
                        <?php $url=Yii::$app->urlManager->createUrl($params);?>
                        <span class="span-notification rejected-files"><?=$rejected_files_count?> File(s) are Rejected.<a href="<?=$url?>" target="_blank">Review</a></span>
                <?php }?>
            </div>
        </div>
    <?php }?>
<?php }?>
