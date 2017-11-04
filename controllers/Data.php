<?php 
namespace frontend\modules\tophatter\components;

use Yii;
use yii\base\Component;
use frontend\modules\tophatter\components\BigcommerceClientHelper;
use yii\helpers\Url;
use frontend\modules\tophatter\models\TophatterExtensionDetail;

class Data extends component
{
	const MAX_LENGTH_BRAND = 4000;
    const MAX_LENGTH_NAME = 200;
    const MAX_LENGTH_SKU = 255;
    const MAX_LENGTH_LONG_DESCRIPTION = 4000;
    const FEED_MARGIN = 5;
    const TOTAL_PRODUCT_LIMIT = 20000;
    
    public static function sqlRecords($query,$type=null,$queryType=null)
    {
        $connection=Yii::$app->getDb();
        $response=[];
        if($queryType=="update" || $queryType=="delete" || $queryType=="insert" || ($queryType==null && $type==null)) {
            $response = $connection->createCommand($query)->execute();
        }
        elseif($type=='one'){
            $response=$connection->createCommand($query)->queryOne();
        }
        else{
            $response=$connection->createCommand($query)->queryAll();
        }
        unset($connection);
        return $response;
    }

    public static function getTophatterShopDetails($merchant_id)
    {      
        $shopDetails = array();
        if(is_numeric($merchant_id)) {
            $shopDetails = self::sqlRecords("SELECT `token`,`currency`,`tophatter_shop`.`email`,`tophatter_shop`.`shop_name`,`shop_url`,`store_hash` FROM `user` LEFT JOIN `tophatter_shop_details` as `tophatter_shop` ON `user`.`id`= `tophatter_shop`.`merchant_id` WHERE `user`.`id`=".$merchant_id." LIMIT 0,1", 'one');
        }
        return $shopDetails;
    }

    public static function getUrl($path)
    {
        $url = Url::toRoute(['/tophatter/'.$path]);
        return $url;
    }

    
    public static function createNewWebhook($bigcom,$shop,$storehash)
    {

        $webhook_topics = 
                [
                    "store/product/created"=>"productcreate",
                    "store/sku/created"=>"productcreate",
                    "store/product/updated"=>"productupdate",
                    "store/sku/updated"=>"productupdate",
                    "store/product/deleted"=>"productdelete",
                    "store/sku/deleted"=>"productdelete",
                    "store/product/inventory/updated"=>"inventoryupdate",
                    "store/sku/inventory/updated"=>"inventoryupdate",
                    "store/product/inventory/order/updated"=>"inventoryupdate",
                    "store/sku/inventory/order/updated"=>"inventoryupdate",
                    "store/shipment/created"=>"createshipment",
                    "store/app/uninstalled"=>"isinstall",
                ];
        
        $otherWebhooks = self::getOtherAppsWebhooks($shop,$storehash);
        $response = $bigcom->call1('GET','hooks');
        // print_r($response);die("d");
        if(count($response)>0 && !isset($response['errors']))
        {
            foreach ($webhook_topics as $key => $val_url)
            {
                $url=Yii::$app->getUrlManager()->createAbsoluteUrl('bigcommercewebhook/'.$val_url, 'https');
                if($val_url=="isinstall")
                    $url=Yii::getAlias("@weburl")."/tophatter-webhook/".$val_url;
                //$url="https://a81da6e1.ngrok.io/bigcommercewebhook/".$val_url;
                $continueFlag = false;
                if (is_array($response) || is_object($response))
                {
                    foreach ($response as $k=>$value)
                    {
                        if(isset($value['scope']) && ($value['scope']==$key || in_array($value['scope'], $otherWebhooks))) 
                        {
                            $continueFlag = true;
                            unset($response[$k]);
                            break;
                        }
                    }
                }
                if(!$continueFlag)
                {
                    $charge = ['scope'=>$key, 'destination'=>$url];
                    $bigcom->call1('POST','hooks', $charge);
                }
            }
        }
        else
        {
            foreach ($webhook_topics as $key => $val_url)
            {
                $url=Yii::$app->getUrlManager()->createAbsoluteUrl('bigcommercewebhook/'.$val_url, 'https');
                //$url="https://a81da6e1.ngrok.io/bigcommercewebhook/".$val_url;
                if(!in_array($key, $otherWebhooks))
                {
                    $charge = ['scope'=>$key, 'destination'=>$url];
                    $bigcom->call1('POST','hooks', $charge);
                }
            }
        }
    }

    public static function getOtherAppsWebhooks($shop,$storehash)
    {
        
        $query = "SELECT `auth_key` FROM `user` WHERE `username`='".$shop."' LIMIT 0,1";
        $results = Data::sqlRecords($query, 'one');
        $webhooks = [];
        if(isset($results['auth_key']))
        {
            $token = $results['auth_key'];
            $jet_app_key = JET_APP_KEY;
            try 
            {
                $bigcomClient = new BigcommerceClientHelper($jet_app_key,$token,$storehash);
                $response=$bigcomClient->call1('GET','hooks');
                if(count($response)>0 && !isset($response['errors']))
                {
                    foreach ($response as $k=>$value)
                    {
                        if(isset($value['scope']) && $value['scope']) {
                            $webhooks[] = $value['scope'];
                        }
                    }
                }
            }
            catch(Exception $e) {
                $e->getMessage();
            }
        }
        return $webhooks;
    }

    public static function saveConfigValue($merchant_id, $field_name, $field_value)
    {
        $query = "SELECT `data`,`value` FROM  `tophatter_config` WHERE `merchant_id`='".$merchant_id."' AND `data`='".$field_name."'";
        if (empty(self::sqlRecords($query,"one"))) {
            self::sqlRecords("INSERT INTO `tophatter_config` (`data`,`value`,`merchant_id`) values('".$field_name."','".$field_value."','".$merchant_id."')", null, "insert");
        } else {
            self::sqlRecords("UPDATE `tophatter_config` SET `value`='".$field_value."' where `merchant_id`='".$merchant_id."' AND `data`='".$field_name."'", null, "update");
        }
    }

    public static function importTophatterProduct($merchant_id)
    {
        $productColl=[];
        $query="select bigproduct_id,product_type,type,title,description from jet_product where merchant_id='".$merchant_id."'";
        $productColl=self::sqlRecords($query,'all','select');
       
        if(is_array($productColl) && count($productColl)>0)
        {
            $queryProduct="INSERT INTO `tophatter_product` (`product_id`,`merchant_id`,`product_type`,`status`,`self_description`,`short_description`)VALUES";
            $queryVariant="INSERT INTO `tophatter_product_variants` (`product_id`,`merchant_id`,`option_id`)VALUES";
            foreach ($productColl as $value) 
            {
                $queryProduct.="('".$value['bigproduct_id']."','".$merchant_id."','".addslashes($value['product_type'])."','Not Uploaded','".addslashes($value['title'])."','".addslashes($value['description'])."'),";
                if($value['type']=="variants")
                {
                    $query="select option_id from jet_product_variants where product_id='".$value['bigproduct_id']."'";
                    $productVarColl=[];
                    $productVarColl=self::sqlRecords($query,'all','select');
                    foreach ($productVarColl as $val) 
                    {
                        
                        $queryVariant.="('".$value['bigproduct_id']."','".$merchant_id."','".$val['option_id']."'),";
                    }
                }
            }
            $queryProduct=rtrim($queryProduct,',');
            $queryVariant=rtrim($queryVariant,',');
            self::sqlRecords($queryProduct,null,'insert');
            self::sqlRecords($queryVariant,null,'insert');
            //insert product type
            $productTypeColl=[];
            $query="select id from `tophatter_category_map` where merchant_id='".$merchant_id."'";
            $productTypeColl= self::sqlRecords($query,"all",'select');
            if(!$productTypeColl)
            {
                $jetproductTypeColl=[];
                $query="select product_type from `jet_category_map` where merchant_id='".$merchant_id."'";
                $jetproductTypeColl= self::sqlRecords($query,"all",'select');
                if(is_array($jetproductTypeColl) && count($jetproductTypeColl)>0)
                {
                    $queryProType="INSERT INTO `tophatter_category_map` (`product_type`,`merchant_id`)VALUES";
                    foreach ($jetproductTypeColl as $v) 
                    {
                        $queryProType.="('".addslashes($v['product_type'])."','".$merchant_id."'),";
                    }
                    $queryProType=rtrim($queryProType,',');
                    self::sqlRecords($queryProType,null,'insert');
                }
            }
        }
    }
	
    /**
     * Get Product Tax code
     * @param [] $product
     * @return string | bool
     */
    public static function GetTaxCode($product, $merchant_id)
    {
    	$tax_code = '';
    	$productType = '';
    	if(is_array($product)) {
    		$tax_code = $product['tax_code'];
    		//$productType = $product['product_type'];
    		$productType = str_replace("'", "''", $product['product_type']);
    	}
    	else {
    		$tax_code = $product->tax_code;
    		//$productType = $product->product_type;
    		$productType = str_replace("'", "''", $product->product_type);
    	}
    
    	if(!$tax_code) {
    		$query = "SELECT `tax_code` FROM `tophatter_category_map` WHERE `product_type`='".$productType."' AND `merchant_id`=".$merchant_id." LIMIT 0,1";
    		$result = Data::sqlRecords($query, 'one');
    		if($result && (isset($result['tax_code']))) {
    			return $result['tax_code'];
    		}
    		else {
    			$query = "SELECT `value` FROM `tophatter_config` WHERE `data`='tax_code' AND `merchant_id`=".$merchant_id." LIMIT 0,1";
    			$result = Data::sqlRecords($query, 'one');
    			if($result && (isset($result['value']))) {
    				return $result['value'];
    			}
    		}
    	} else {
    		if(!is_numeric($tax_code))
    			return false;
    		else
    			return $tax_code;
    	}
    	return false;
    }
    
    public function getBigcommerceShopDetails($sc)
    {
        $response = $sc->call1('GET','store');
        return $response;
    }
    
    public static function getCustomPrice($price,$merchant_id)
    {
        $tophatterPriceConfig = Data::sqlRecords("SELECT `value` FROM `tophatter_config` WHERE merchant_id='".$merchant_id."' && data='custom_price'", 'one');
        
        if(isset($tophatterPriceConfig['value']) && $tophatterPriceConfig['value'])
        {
            $pricData=explode('-',$tophatterPriceConfig['value']);
           
            if(is_array($pricData) && count($pricData)>0)
            {
                if($pricData[1]=="fixed")
                    return Data::priceChange($price,$pricData[0],$pricData[1],$pricData[2]);
                else
                    return Data::priceChange($price,$pricData[0],$pricData[1],$pricData[2]);
            }
        }
        return "";
    }
    
    public static function trimString($str, $maxLen)
    {
    	if (strlen($str) > $maxLen && $maxLen > 1)
    	{
    		preg_match("#^.{1,".$maxLen."}\.#s", $str, $matches);
    		return $matches[0];
    	}
    	else
    	{
    		return $str;
    	}
    }
    
    public static function getKey($string){
    	return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }
    

    public static function getBrand($brand)
    {
    	$brandMaxLength = self::MAX_LENGTH_BRAND;
    	$brand = htmlspecialchars($brand);
    	if(strlen($brand) > $brandMaxLength)
    	{
    		$brand = substr($brand, 0, $brandMaxLength);
    	}
    	return $brand;
    }
    
    public static function priceChange($price,$pricelevel,$priceType,$pricetag)
    {
    	
        $updatePrice = 0;
        
        if($pricelevel=='increase'){
        	if($priceType == "percent")
        		$updatePrice = (float)($price + ($pricetag / 100) * ($price));
        	elseif ($priceType == "fixed")
        		$updatePrice = (float)($price + $pricetag);
        }
        else{
        	if ($priceType == "percent")
        		$updatePrice = (float)($price - ($pricetag / 100) * ($price));
        	elseif ($priceType == "fixed")
        		$updatePrice = (float)($price - $pricetag);
        }
        //echo $updatePrice;die;
        return $updatePrice;
    }

    /*Get Product Type From varient Id in walmart*/
    public static function getProductType($unique_id,$merchant_id)
    {
         $query = "SELECT `type` FROM `jet_product` WHERE `merchant_id`='".$merchant_id."' and `variant_id`='".$unique_id."' LIMIT 0,1";
        $data = self::sqlRecords($query,'one','select');
        
        if(isset($data['type']) && !empty($data['type'])) {
            return $data['type'];
        } else {
            return false;
        }
    }
    
    public static function createLog($message,$path='tophatter-common.log',$mode='a',$sendMail=false)
    {
        $file_path=Yii::getAlias('@webroot').'/var/'.$path;
        $dir = dirname($file_path);
        if (!file_exists($dir)){
            mkdir($dir,0775, true);
        }
        $fileOrig=fopen($file_path,$mode);
        fwrite($fileOrig,"\n".date('d-m-Y H:i:s')."\n".$message);
        fclose($fileOrig); 
        if($sendMail){
            self::sendEmail($file_path,$message);
        }
    }

    /**
     * function for sending mail with attachment
     */
    public static function sendEmail($file,$msg,$email = 'krishnagupta@cedcoss.com')
    {
       try
       {
            $name = 'Tophatter BigCommerce Cedcommerce';
        
            $EmailTo = $email.',stephenjones@cedcommerce.com';
            $EmailFrom = $email;
            $EmailSubject = "Tophatter BigCommerce Cedcommerce Exception Log" ;
            $from ='Tophatter BigCommerce Cedcommerce';
            $message = $msg;
            $separator = md5(time());

            // carriage return type (we use a PHP end of line constant)
            $eol = PHP_EOL;

            // attachment name
            $filename = 'exception';//store that zip file in ur root directory
            $attachment = chunk_split(base64_encode(file_get_contents($file)));

            // main header
            $headers  = "From: ".$from.$eol;
            $headers .= "MIME-Version: 1.0".$eol; 
            $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

            // no more headers after this, we start the body! //

            $body = "--".$separator.$eol;
            $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol.$eol;
            $body .= $message.$eol;

            // message
            $body .= "--".$separator.$eol;
            /*  $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
            $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
            $body .= $message.$eol; */

            // attachment
            $body .= "--".$separator.$eol;
            $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
            $body .= "Content-Transfer-Encoding: base64".$eol;
            $body .= "Content-Disposition: attachment".$eol.$eol;
            $body .= $attachment.$eol;
            $body .= "--".$separator."--";

            // send message
            if (mail($EmailTo, $EmailSubject, $body, $headers)) {
                $mail_sent = true;
            } else {
                $mail_sent = false;
            }
        }
        catch(Exception $e)
        {
            
        }
    }

    public static function getConfigValue($merchant_id, $field_name='all')
    {
    	if($field_name != 'all')
    	{
    		$query = "SELECT `data`,`value` FROM  `tophatter_config` WHERE `merchant_id`='".$merchant_id."' AND `data` LIKE '".$field_name."'";
    		$result = self::sqlRecords($query, "one");
    		if (!empty($result))
    		{
    			return $result['value'];
    		}
    	}
    	else
    	{
    		$query = "SELECT `data`,`value` FROM  `tophatter_config` WHERE `merchant_id`='".$merchant_id."'";
    		$result = self::sqlRecords($query, "all");
    		if (empty($result))
    		{
    			$config = [];
    			foreach ($result as $value) {
    				$config[$value['data']] = $value['value'];
    			}
    			return $config;
    		}
    	}
    	return false;
    }

     /**
     * Get Option Values Simple Product
     */
    public function getOptionValuesForSimpleProduct($product)
    {
        $options = [];
        if(is_array($product) && isset($product['variants']))
        {
            $variant = reset($product['variants']);
            if(isset($product['options'])) {
                foreach ($product['options'] as $value) {
                    if($value['name'] != 'Title') {
                        $options[$value['name']] = $variant['option'.$value['position']];
                    }
                }
            }
        }
        
        if(count($options))
            return json_encode($options);
        else
            return '';
    }

    public function formatTime($date)
    {
        $date_create = date_create_from_format('Y-m-d H:i:s', $date);
        if($date_create){
            $timeStamp = $date_create->getTimestamp();
            $utcTime = date('Y-m-d\TH:i:s',$timeStamp).substr((string)microtime(), 1, 4).'Z';
            return $utcTime;
        } else {
            return false;
        }
    }

    public function formatUTCTime($date)
    {
        $date_create = date_create_from_format('Y-m-d H:i:s', $date);
        if($date_create){
            $timeStamp = $date_create->getTimestamp();
            $utcTime = gmdate('Y-m-d\TH:i:s',$timeStamp).substr((string)microtime(), 1, 4).'Z';
            return $utcTime;
        } else {
            return false;
        }
    }  

    public static function getAttributevalue($merchant_id, $tophatter_attribute_code, $shopify_product_type)
    {
        $attr_value = self::sqlRecords("SELECT * FROM `tophatter_attribute_map` WHERE `merchant_id` = '" . $merchant_id . "' AND `tophatter_attribute_code`='" . $tophatter_attribute_code . "' AND `shopify_product_type`='".addslashes($shopify_product_type)."'", 'one');

        return $attr_value;
    }

    /**
     * get errored product info on bigcommerce
     * @return string
    */
    public static function getCustomsku($product_id)
    {
        $custom_sku = 'ced-'.$product_id;
        return $custom_sku;
    }

    /*Get Product sku using product Id */
    public static function getProductSku($product_id){

        $product_sku = Data::sqlRecords('SELECT `sku` as `sku` FROM `jet_product` WHERE `merchant_id`="'.MERCHANT_ID.'" AND `bigproduct_id` = "'.$product_id .'"','one');
        if(empty($product_sku)){
            $product_sku = Data::sqlRecords('SELECT `option_sku` as `sku` FROM `jet_product_variants` WHERE `merchant_id`="'.MERCHANT_ID.'" AND `product_id` = "'.$product_id .'"','one');
        }
        return $product_sku['sku'];
    }

    /*Get Product id using product sku */
    public static function getProductId($product_sku,$merchant_id=false){
        if(!$merchant_id)
            $merchant_id=MERCHANT_ID;
        $product_sku = Data::sqlRecords('SELECT `bigproduct_id` as `id` FROM `jet_product` WHERE `merchant_id`="'.$merchant_id.'" AND `sku` = "'.$product_sku .'"','one');
        if(empty($product_sku)){
            $product_sku = Data::sqlRecords('SELECT `option_id` as `id` FROM `jet_product_variants` WHERE `merchant_id`="'.$merchant_id.'" AND `option_sku` = "'.$product_sku .'"','one');
        }
        return $product_sku['id'];
    }
    
    public static function getWamartattributecode($merchant_id, $tophatter_attribute_value, $shopify_product_type)
    {
    	$attr_value = self::sqlRecords("SELECT * FROM `tophatter_attribute_map` WHERE `merchant_id` = '" . $merchant_id . "' AND `attribute_value`='" . addslashes($tophatter_attribute_value) . "' AND `shopify_product_type`='".addslashes($shopify_product_type)."'", 'one');
    
    	return $attr_value;
    }

    /*Get Product id using product sku */
    public static function getFulfillmentlagtime($product_id,$merchant_id){
        $product_sku = Data::sqlRecords('SELECT `fulfillment_lag_time`  FROM `tophatter_product` WHERE `merchant_id`="'.$merchant_id.'" AND `product_id` = "'.$product_id .'"','one');
        return $product_sku;
    }
    
    public static function sendCurlRequest($data=[],$url="")
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $data ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_TIMEOUT,1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public static function deleteAllWebhooks($bigcom,$shop,$storehash)
    {
        $webhookresponse=$bigcom->call1("GET","hooks");  
        if(is_array($webhookresponse) && count($webhookresponse)>0)
        {
            foreach ($webhookresponse as $key => $value) 
            {
                $bigcom->call1("DELETE","hooks/".$value['id']);
            }
        }
        //delete webhooks on jet.com
       /* $query = "SELECT `auth_key` FROM `user` WHERE `username`='".$shop."' LIMIT 0,1";
        $results = Data::sqlRecords($query, 'one');
        $webhooks = [];
        if(isset($results['auth_key']))
        {
            $token = $results['auth_key'];
            $jet_app_key = JET_APP_KEY;
            try 
            {
                $bigcomClient = new BigcommerceClientHelper($jet_app_key,$token,$storehash);
                $response=$bigcomClient->call1('GET','hooks');
                if(is_array($response) && count($response) && !isset($response['errors']))
                {
                    foreach ($response as $val) 
                    {
                        $bigcomClient->call1("DELETE","hooks/".$val['id']);
                    }
                }
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }*/        
    }

    public function TophatterExtensionDetails($connection,$merchant_id,$shopname)
    {
       
        $connection->open();
        $query = "Select * from ced_extupgrade_license_item where domain_name like '%".$shopname."%'";
        $command=$connection->createCommand($query);
        $links = $command->queryAll();

        $futureDate="";

        print_r($links);die;
       
        foreach($links as $link)
        {
            if($link['product_id']==612)
            {
                if($link['order_id']!="")
                {
                    
                    $startDate=$link['created_at'];
                    
                    $futureDate=date('Y-m-d H:i:s', strtotime('+365 days', strtotime($startDate)));
                    //get customer information
                    $query1 = "Select * from customer_entity where entity_id = '".$link['customer_id']."'";
                    $command=$connection->createCommand($query1);
                    $link_data = $command->queryAll();

                    $model1=TophatterExtensionDetail::find()->where(['merchant_id'=>$merchant_id])->one();
                    if($model1)
                    {
                        if($model1->order_id==""){
                            $model1->order_id=$link['order_id'];
                            $model1->date=$startDate;
                            $model1->expire_date=$futureDate;
                            $model1->merchant_id= $merchant_id;
                            $model1->status="Purchased";
                            $model1->save(false);
                        }
                    }
                }
            }
        }
    }

    public static function getTophatterTitle($productId, $merchant_id)
    {

        $tophattertitle = '';
        $tophattertitle = Data::sqlRecords("SELECT `product_title` FROM `tophatter_product` WHERE `merchant_id` ='" . $merchant_id . "' && `product_id` ='" . $productId . "'", 'one');
        return $tophattertitle;

    }

     public static function getTophatterPrice($productId, $merchant_id)
    {

        $tophatterprice = Data::sqlRecords("SELECT `product_price` FROM `tophatter_product` WHERE `merchant_id` ='" . $merchant_id . "' && `product_id` ='" . $productId . "'", 'one');
        if (empty($tophatterprice)) {
            $tophatterprice = Data::sqlRecords("SELECT `option_prices` FROM `tophatter_product_variants` WHERE `merchant_id` ='" . $merchant_id . "' && `option_id` ='" . $productId . "'", 'one');
        }
        return $tophatterprice;

    }

    public static function getName($name)
    {
        $nameMaxLength = self::MAX_LENGTH_NAME;
        $name = htmlspecialchars($name);
        if (strlen($name) > $nameMaxLength) {
            $name = substr($name, 0, $nameMaxLength);
        }
        return $name;
    }

     /**
     * @param $barcode
     * @return bool
     */
    public static function validateUpc($barcode)
    {
       
        if (preg_match('/[^0-9]/', $barcode)) {
            // is not numeric
            return false;
        }
        // pad with zeros to lengthen to 14 digits
        switch (strlen($barcode)) {
            case 8:
                $barcode = "000000" . $barcode;
                break;
            case 12:
                $barcode = "00" . $barcode;
                break;
            case 13:
                $barcode = "0" . $barcode;
                break;
            case 14:
                break;
            default:
                // wrong number of digits
                return false;
        }
        // calculate check digit
        
        $a = '';
        $a[0] = (int)($barcode[0]) * 3;
        $a[1] = (int)($barcode[1]);
        $a[2] = (int)($barcode[2]) * 3;
        $a[3] = (int)($barcode[3]);
        $a[4] = (int)($barcode[4]) * 3;
        $a[5] = (int)($barcode[5]);
        $a[6] = (int)($barcode[6]) * 3;
        $a[7] = (int)($barcode[7]);
        $a[8] = (int)($barcode[8]) * 3;
        $a[9] = (int)($barcode[9]);
        $a[10] = (int)($barcode[10]) * 3;
        $a[11] = (int)($barcode[11]);
        $a[12] = (int)($barcode[12]) * 3;
        $sum = $a[0] + $a[1] + $a[2] + $a[3] + $a[4] + $a[5] + $a[6] + $a[7] + $a[8] + $a[9] + $a[10] + $a[11] + $a[12];
        $check = (10 - ($sum % 10)) % 10;
        // evaluate check digit
        $last = (int)($barcode[13]);

       
        return $check == $last;
    }
    
    /**
    * Check feed send count are remaining or not
    */
    public static function getConfiguration($merchant_id)
    {
        $query = "SELECT `wsd`.`currency`,`wc`.`consumer_id`,`wc`.`secret_key` FROM `tophatter_configuration` wc INNER JOIN `tophatter_shop_details` wsd ON `wsd`.`merchant_id`=`wc`.`merchant_id` WHERE `wc`.`merchant_id`='".$merchant_id."'";
        $getConfiguration = self::sqlRecords($query,'one','select');
        return $getConfiguration;
    }

      /* 
     * function for creating log 
     */
    public function createExceptionLog($functionName,$msg,$shopName = 'common')
    {
        $dir = \Yii::getAlias('@webroot').'/var/tophatter/exceptions/'.$functionName.'/'.$shopName;
        if (!file_exists($dir)){
            mkdir($dir,0775, true);
        }
        try
        {
            throw new \Exception($msg);
        }catch(\yii\db\Exception $e){
            $filenameOrig = $dir.'/'.time().'.txt';
            $handle = fopen($filenameOrig,'a');
            $msg = date('d-m-Y H:i:s')."\n".$msg."\n".$e->getTraceAsString();
            fwrite($handle,$msg);
            fclose($handle);
            //$this->sendEmail($filenameOrig,$msg);   
        }
    }

    public function deleteduplicateProducts(){

        $query="SELECT product_id FROM tophatter_product where merchant_id='".MERCHANT_ID."' GROUP BY product_id HAVING COUNT(*) > 1 ";
        $data=self::sqlRecords($query,'all','select');

        print_r($data);die;

        foreach ($data as $key => $value) {
            $query1="SELECT product_id FROM tophatter_product where merchant_id='".MERCHANT_ID."' and product_id='".$value['product_id']."' GROUP BY product_id HAVING COUNT(*) > 1 ";
            $data1=self::sqlRecords($query1,'all','select');

            if(count($data1)>1){

            }

        }

    }


}
?>
