<?php
namespace frontend\modules\walmart\components;

use Yii;
use yii\base\Component;
use frontend\modules\walmart\models\WalmartProduct;
use frontend\modules\walmart\components\Signature;
use frontend\modules\walmart\components\Generator;
use frontend\modules\walmart\components\Xml\Parser;
use frontend\modules\walmart\components\Jetproductinfo;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\models\WalmartAttributeMap;
use yii\base\Response;
use frontend\modules\walmart\components\AttributeMap;
use frontend\modules\walmart\components\WalmartCategory;
use frontend\modules\walmart\components\BigcommerceClientHelper;
use frontend\modules\walmart\models\WalmartExtensionDetail;

class Walmartapi extends component
{
    const GET_ORDERS_SUB_URL = 'v3/orders';
    const GET_ORDERS_RELEASED_SUB_URL = 'v3/orders/released';
    const GET_ITEMS_SUB_URL = 'v2/items';
    const GET_FEEDS_SUB_URL = 'v2/feeds'; 
    const GET_FEEDS_ITEMS_SUB_URL = 'v2/feeds?feedType=item';
    const GET_FEEDS_INVENTORY_SUB_URL = 'v2/feeds?feedType=inventory';
    const GET_FEEDS_PRICE_SUB_URL = 'v2/feeds?feedType=price';
    const GET_INVENTORY_SUB_URL = 'v2/inventory';
    const GET_REPORTS_SUB_URL = 'v2/getReport';
    const UPDATE_PRICE_SUB_URL = 'v2/prices';
    const UPDATE_BULK_PROMOTIONAL_PRICE_SUB_URL = 'v2/feeds?feedType=promo';
    const UPDATE_PROMOTIONAL_PRICE_SUB_URL = 'v3/price?promo=true';
    
    public $apiUrl;
    public $apiConsumerId;
    public $apiConsumerChannelId;
    public $apiPrivateKey;
    public $apiSignature;
    public $requestedXml = '';
    //public $attributes;

    public function __construct($apiConsumerId="",$apiPrivateKey="",$apiConsumerChannelId="") 
    {
        $this->apiUrl = "https://marketplace.walmartapis.com/";
        $this->apiConsumerId = $apiConsumerId;
        $this->apiPrivateKey = $apiPrivateKey;
        $this->apiConsumerChannelId = $apiConsumerChannelId;
        $this->apiSignature = new Signature();
        //$this->attributes = new Attributes();
        //$this->xml = new Generator();
    }

    public function postRequest($url, $params)
    {
        
        $signature = $this->apiSignature->getSignature($url,'POST',$this->apiConsumerId,$this->apiPrivateKey);
        $url =  $this->apiUrl . $url;
        $body='';
        if (isset($params['file'])) {
            $body['file'] = new \CurlFile($params['file'], 'application/xml');
        } elseif (isset($params['data'])) {
            $body = $params['data'];
        }
        
        $headers = [];
        $headers[] = "WM_SVC.NAME: Walmart Marketplace";
        $headers[] = "WM_QOS.CORRELATION_ID: " . base64_encode(\phpseclib\Crypt\Random::string(16));
        $headers[] = "WM_SEC.TIMESTAMP: " . $this->apiSignature->timestamp;
        $headers[] = "WM_SEC.AUTH_SIGNATURE: " . $signature;
        $headers[] = "WM_CONSUMER.ID: " .  $this->apiConsumerId;
        $headers[] = "WM_CONSUMER.CHANNEL.TYPE: 7b2c8dab-c79c-4cee-97fb-0ac399e17ade";
        if (isset($params['file']) && !empty($params['file'])) {
            $headers[] = "Content-Type: multipart/form-data;";
        } elseif (isset($params['data']) && !empty($params['data'])) {
            $headers[] = "Content-Type: application/xml";
        } else {
            $headers[] = "Content-Type: application/json";
        }
        $headers[] = "Accept: application/xml";
        /*if (isset($params['headers']) && !empty($params['headers'])) {
            $headers[] = $params['headers'];
        }else{
            $headers[] = "WM_CONSUMER.CHANNEL.TYPE: " . $this->apiConsumerChannelId;
        }*/
        $headers[] = "HOST: marketplace.walmartapis.com";

        $ch = curl_init($url);
        if($body)
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        }
        else
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS,NULL);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        //curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($server_output, 0, $header_size);
        $response = substr($server_output, $header_size);
        //print_r($response);die("dfd");
        curl_close ($ch);

        return $response;
   
    }

    /**
     * Post Request on https://marketplace.walmartapis.com/
     * @param string $url
     * @param string|[] $params
     * @return string
     */
    public function getRequest($url, $params = [])
    {
       $signature = $this->apiSignature->getSignature($url,'GET',$this->apiConsumerId,$this->apiPrivateKey);
       $url = $this->apiUrl . $url;

       $headers = [];
       $headers[] = "WM_SVC.NAME: Walmart Marketplace";
       $headers[] = "WM_QOS.CORRELATION_ID: " . base64_encode(\phpseclib\Crypt\Random::string(16));
       $headers[] = "WM_SEC.TIMESTAMP: " . $this->apiSignature->timestamp;
       $headers[] = "WM_SEC.AUTH_SIGNATURE: " . $signature;
       $headers[] = "WM_CONSUMER.ID: " .  $this->apiConsumerId;
       $headers[] = "WM_CONSUMER.CHANNEL.TYPE: 7b2c8dab-c79c-4cee-97fb-0ac399e17ade";
       $headers[] = "Content-Type: application/json";
       $headers[] = "Accept: application/xml";
       /*if (isset($params['headers']) && !empty($params['headers'])) {
           $headers[] = $params['headers'];
       }else{
           $headers[] = "WM_CONSUMER.CHANNEL.TYPE: " . $this->apiConsumerChannelId;
       }*/
       $headers[] = "HOST: marketplace.walmartapis.com";

       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_HEADER, 1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

       $server_output = curl_exec ($ch);
       $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
       $header = substr($server_output, 0, $header_size);
       $response = substr($server_output, $header_size);
       curl_close ($ch);

       return $response;
    }

    /**
     * Get a Order
     * @param string $purchaseOrderId
     * @param string $subUrl
     * @return array|string
     */
    public function getOrder($purchaseOrderId, $subUrl = self::GET_ORDERS_SUB_URL )
    {
        $response = $this->getRequest($subUrl . '?purchaseOrderId=' . $purchaseOrderId);
        return $response;
    }


    /**
     * Get Orders
     * @param string|[] $params - date in yy-mm-dd
     * @param string $subUrl
     * @return string
     * @link  https://developer.walmartapis.com/#get-all-orders
     */
    public function getOrders($params = ['createdStartDate' => '2016-01-01'], $subUrl = self::GET_ORDERS_SUB_URL,$test = false)
    {
        if (count($params) > 0) {
            $count = 0;
            foreach ($params as $param => $value) {
                if ($count == 0) {
                    $subUrl .= '?' . $param . '=' . $value;
                } else {
                    $subUrl .= '&' . $param . '=' . $value;
                }
                $count += 1;
            }
        }
        //return $this->getTestOrder();
            if($test)
            return ($this->getTestOrder());
            $response = $this->getRequest($subUrl,
            ['headers' => 'WM_CONSUMER.CHANNEL.TYPE: ' . $this->apiConsumerChannelId]);
           
//        return $response;
        try
        {
            if(self::is_json($response))
            {
                $response = json_decode($response,true);
                 
                return isset($response['list'])?$response['list']:$response;
                //return json_decode($response,true);
            }
            else
            {
                
                $response = $this->replaceNs($response);
                $response = self::xmlToArray($response);

                return isset($response['list'])?$response['list']:$response;
            }


            //return $response;
        }
        catch(Exception $e)
        {
            
            return '';
        }

    }

    public function replaceNs($response){
        $response = str_replace('ns1:','',$response);
        $response = str_replace('ns2:','',$response);
        $response = str_replace('ns3:','',$response);
        $response = str_replace('ns4:','',$response);
        $response = str_replace('ns5:','',$response);
        return $response;

    }
    /**
     * Get Reports
     * @param string|[] $params
     * @param string $subUrl
     * @return string compressed csv file
     * @link https://developer.walmartapis.com/#get-report
     */
    public function getReports($params = [], $subUrl = self::GET_REPORTS_SUB_URL)
    {
        if (!isset($params['type']) || empty($params['type'])) {
            $params['type'] = 'item';
        }
        $queryString = empty($params) ? '' : '?' . http_build_query($params);
        $response = $this->getRequest($subUrl . $queryString);
        //csv file in response
        return $response;
    }
    /**
     * Get Item
     * @param string $sku
     * @param string $subUrl
     * @return []
     * @link https://developer.walmartapis.com/#get-an-item
     */
    public function getItem($sku, $returnField = null, $subUrl = self::GET_ITEMS_SUB_URL )
    {
        $response = $this->getRequest($subUrl . '?sku=' . $sku);
        try {
            $response = json_decode($response,true);
            if ($returnField && !isset($response['error'])) {
                return $response['MPItemView'][0]['publishedStatus'];
            }
            return $response;
        }
        catch(Exception $e){
            return false;
        }
    }

    /**
     * Get Items
     * @param string|[] $params
     * @param string $subUrl
     * @return string
     * @link https://developer.walmartapis.com/#get-all-items
     */
    public function getItems($params = [], $subUrl = self::GET_ITEMS_SUB_URL)
    {
        if (!isset($params['limit']) || empty($params['limit'])) 
        {
            $params['limit'] = '20';

        }
        $queryString = empty($params) ? '' : '?' . http_build_query($params);
       
        $response=$this->getRequest($subUrl . $queryString);
        //var_dump($response);
        if(self::is_json($response))
        {
            return json_decode($response,true);
        }
        else
        {
            return self::xmlToArray($response);
        }
        //return $response;
    }

    /**
     * Get Inventory
     * @param string $sku
     * @param string $subUrl
     * @return string
     * @link https://developer.walmartapis.com/#get-inventory-for-an-item
     */
    public function getInventory($sku, $subUrl = self::GET_INVENTORY_SUB_URL)
    {
        $response = $this->getRequest($subUrl . '?sku=' . $sku);
        return json_decode($response,true);
    }

    /**
     * Get Feeds
     * @param null $feedId
     * @param string $subUrl
     * @return string
     * @link https://developer.walmartapis.com/#feeds
     */
    public function getFeeds($feedId = null, $subUrl = self::GET_FEEDS_SUB_URL)
    {
        if ($feedId != null) 
        {

            $response = json_decode($this->getRequest($subUrl . '?feedId=' . $feedId),true);
            //print_r($response);die;
            return $response;
        }
        $response = json_decode($this->getRequest($subUrl),true);
        //print_r($response);die;
        return $response;

    }
    /**
     * To Convert Escaped Characters in XML to HTML chars
     * @param string $path
     * @return bool
     */
    public static function unEscapeData($path)
    {
        if (file_exists($path)) 
        {
           $handle = fopen($path, "r");
           $contents = fread($handle, filesize($path));
           $data = htmlspecialchars_decode($contents);
           fclose($handle);
           $fileOrig=fopen($path,'w');
           fwrite($fileOrig, $data);
           fclose($fileOrig);
        }
        return false;
    }
    /**
     * Create Product on Walmart
     * @param string|[] $ids
     * @return bool
     */
    
    public function createProductOnWalmart($ids,$walmartHelper,$merchant_id,$connection)
    {
    	
        $timeStamp = (string)time();
        $productToUpload = [
            'MPItemFeed' => [
                '_attribute' => [
                    'xmlns' => 'http://walmart.com/',
                    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
                    'xsi:schemaLocation' => 'http://walmart.com/ MPItem.xsd',
                ],
                '_value' => [
                    0 => [
                        'MPItemFeedHeader' => [
                        'version' => '2.1',
                        'requestId' => $timeStamp,
                        'requestBatchId' => $timeStamp,
                        ],
                    ]
                
                ],
            ]
        ];
        if (count($ids) > 0 )
        {
            $error=[];
            $key = 1;
            $k=0;
            $uploadProductIds=[];
            $successXmlCreate=0;
            foreach ($ids as $id)
            {
            	
                $query='select product_id,title,sku,type,wal.product_type,wal.status,description,image,parent_category,qty,price,weight,additional_info,brand,walmart_attributes,category,tax_code,short_description,self_description,common_attributes,attr_ids,upc,sku_override,product_id_override from `walmart_product` wal INNER JOIN `jet_product` jet ON jet.bigproduct_id=wal.product_id where wal.product_id="'.$id.'" and jet.merchant_id="'.$merchant_id.'" and wal.merchant_id="'.$merchant_id.'" LIMIT 1';
                $productArray = Data::sqlRecords($query,"one","select");
                
               
                $validateResponse=[];
                $validateResponse = self::validateProduct($productArray, $connection);

                
                if(isset($validateResponse['error'])){
                    
                    $error[$productArray['sku']] = $validateResponse['error'];
                    continue;
                }
                else
                {
                    $uploadProductIds[]=$id;
                    $image="";
                    $image=trim($productArray['image']);
                    $image1=trim($productArray['parent_category']);
                    $imageArr=[];
                    $imageArr=explode(',',$image);
                    
                    $imageArr1=explode(',',$image1);
                   
                   	if($merchant_id==226){
	                    foreach($imageArr1 as $key=>$value){
	                    	if($value=="")
	                    		continue;
	                    
	        
	                    		$imageArr[]=$value;
	                    		
	                    }
                   }
                    //trim product description more than 4000 characters
                    $description=$productArray['description'];
                    
                    if($productArray['short_description'])
                    	$description=$productArray['short_description'];

                    
                    if(strlen($description)>4000)
                        $description = Data::trimString($description,3500);

                    $short_description = Data::trimString($description,800);
                    if($productArray['type']=="simple")
                    {
                        //update custom price on walmart
                        
                        $updatePrice = Data::getCustomPrice($productArray['price'],$merchant_id);
                        if($updatePrice)
                            $productArray['price']=round($updatePrice, 2);

                        $upc= json_decode($productArray['additional_info']);
                        $upc=$upc->upc_code;

                        if($merchant_id==311)
                        {
                            $upc = "CUSTOM";
                        }

                        if(!$upc){
                            $upc=trim($productArray['upc']);
                        }
                        if($merchant_id==345)
                        {
                            $upc = '0'.$productArray['upc'];
                        }

                        $type = Jetproductinfo::checkUpcType($upc);
                        if($merchant_id==311)
                        {
                            $type = "GTIN";
                        }

                        $bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,TOKEN,STOREHASH);
                        $price= $bigcom->getbuybox($upc);

                        $priceValue=$price['items'][0]['salePrice'];

                        //echo $productArray['price'].'/';
                        //echo $priceValue.'/';
                        if($merchant_id==162){
                            if($productArray['price']>$priceValue){
                                $productArray['price']=$priceValue-(0.01);
                            }
                        }

                        //echo $productArray['price'];die;

                        $requiredCategoryAttributes = AttributeMap::getWalmartCategoryAttributes($productArray['category']);
                        
                        $walmart_attributes = [];
                        if($productArray['walmart_attributes']!='')
                            $walmart_attributes = $productArray['walmart_attributes'];
                        else {
                             $simpleProductOptions = json_decode($productArray['attr_ids'], true)?:[];
                            if($productArray['category'] != '')
                            {
                                if($requiredCategoryAttributes) 
                                {
                                    $requiredWalAttrValues = [];
                                    $attrMapValues = AttributeMap::getAttributeMapValues($productArray['product_type']);
                                    foreach ($attrMapValues as $walAttrCode => $walAttrValue) 
                                    {
                                        if($walAttrValue['type'] == WalmartAttributeMap::VALUE_TYPE_SHOPIFY) {
                                            $shopifyOptionNames = explode(',', $walAttrValue['value']);
                                            foreach ($shopifyOptionNames as $shopifyOptionName) {
                                                if(isset($simpleProductOptions[$shopifyOptionName])) {
                                                    $requiredWalAttrValues[$walAttrCode] = $walAttrValue['value'];
                                                    break;
                                                }
                                            }
                                        }
                                        elseif($walAttrValue['type'] == WalmartAttributeMap::VALUE_TYPE_TEXT || 
                                            $walAttrValue['type'] == WalmartAttributeMap::VALUE_TYPE_WALMART) {
                                            $requiredWalAttrValues[$walAttrCode] = $walAttrValue['value'];
                                        }
                                    }

                                    /*foreach ($requiredCategoryAttributes['attributes'] as $k => $value) 
                                    {
                                        if(!isset($requiredWalAttrValues[$k]) && in_array($k, $requiredCategoryAttributes['required_attrs']))
                                            $error[$productArray['sku']][] = "Attribute Value for '".$k."' is missing.";
                                    }*/

                                    $walmart_attributes = json_encode($requiredWalAttrValues);
                                }
                            }
                        }
                        if(isset($error[$productArray['sku']]) && count($error[$productArray['sku']])>0)
                            continue;

                        $Catdata = [];
                        //Check if Required Attributes are available in the Uploading Category
                        if($requiredCategoryAttributes && count($requiredCategoryAttributes['attributes']))
                        {
                            $brand= addslashes($productArray['brand']);
                            $Catdata = self::getCategoryArray($productArray['sku'],null,$productArray['category'],$walmart_attributes,null,$brand,$productArray['type'],$connection,$productArray['common_attributes'],$variantGroupId);
                            if(count($requiredCategoryAttributes['required_attrs']) && (!is_array($Catdata) || (is_array($Catdata) && (!isset($Catdata['category_id']) || !isset($Catdata['attributes']))))) {
                                $error[$productArray['sku']] = "Please Fill the Required Attributes for Product having sku :'".$productArray['sku']."'";
                                continue;
                            }
                        }
                        //print_r($Catdata);die;

                        $uploadType = 'MPItem';
                        //echo $validateResponse['success'][$productArray['sku']];
                        /*if($validateResponse['success'][$productArray['sku']]!='not_uploaded')
                        {
                            $uploadType = 'MPItemUpdate';
                        }*/
                        
                        //if($productArray['self_description'])
                        //$productArray['title']=$productArray['self_description'];
                        //echo $productArray['title'];die("fgdf");

                        if(!is_array($Catdata) || (is_array($Catdata) && !count($Catdata)))
                        {
                            if(!is_null($catCollection['parent_id']) && $catCollection['parent_id'] != '0') {
                                $Catdata['category_id'] = $catCollection['parent_id'];
                                $Catdata['attributes'] = ['brand' => $brand, $productArray['category']=>[]];
                            } else {
                                $Catdata['category_id'] = $productArray['category'];
                                $Catdata['attributes'] = ['brand' => $brand];
                            }
                        }

                        if(count($Catdata))
                        {
                            $productData =[
                                    'sku' => $productArray['sku'],
                                    'Product' => [
                                        'productName' => htmlspecialchars($productArray['title']),
                                        'longDescription' => '<![CDATA['.addslashes($description).']]>',
                                        'shelfDescription' => '<![CDATA[<div><p>'.addslashes($productArray['self_description']).'</p></div>]]>',
                                        'shortDescription' => '<![CDATA[<div></div>]]>',
                                        'mainImage' => [
                                            'mainImageUrl' => $imageArr[0],
                                            'altText' => htmlspecialchars($productArray['title']),
                                        ],
                                        'additionalAssets' => self::prepareAdditionalAssets($imageArr),
                                        'productIdentifiers' =>
                                        [
                                            'productIdentifier' =>
                                            [
                                                'productIdType' =>$type,
                                                'productId' =>(string)$upc,
                                            ]
                                        ],
                                         'productTaxCode' => Data::GetTaxCode($productArray,MERCHANT_ID),//$productArray['tax_code'],
                                    ]
                                ];

                                if($productArray['sku_override'] || $productArray['product_id_override'])
                                {
                                    $override = self::getSkuAndIdOverride($productArray['sku_override'],$productArray['product_id_override']);
                                    $productData['Product'][$override['key']] = $override['value'];
                                }

                                $productData['Product'][$Catdata['category_id']] = $Catdata['attributes'];
                    
                                $productData['price']  = [
                                    'currency' => "USD",
                                    'amount' => (string)$productArray['price']
                                ];
                                $productData['shippingWeight'] = [
                                    'value' => (string)$productArray['weight'],
                                    'unit' => 'LB'
                                ];
                                
                                $removeFreeShipping = Data::getConfigValue($merchant_id,'remove_free_shipping');

                                if($removeFreeShipping) {
                                    $freeShippingTag = self::removeFreeShippingData();
                                    $productData[$freeShippingTag['key']] = $freeShippingTag['value'];
                                }
                                $productToUpload['MPItemFeed']['_value'][$key][$uploadType] = $productData;
                        }
                        $key += 1;
                    }
                    else
                    {
                        //echo $description."///////";
                        //echo $productArray['self_description'];die;
                        $productVarArray = [];
                        $duplicateSkus = [];
                        $requiredCategoryAttributes = AttributeMap::getWalmartCategoryAttributes($productArray['category']);

                        $query = 'SELECT jet.option_id,option_title,option_sku,wal.walmart_option_attributes,option_image,option_qty,option_price,option_weight,option_unique_id FROM `walmart_product_variants` wal INNER JOIN `jet_product_variants` jet ON jet.option_id=wal.option_id WHERE wal.product_id="'.$id.'" and jet.product_id="'.$id.'" and wal.merchant_id="'.MERCHANT_ID.'"';
                      
                        //$query = 'SELECT jet.option_id,option_title,option_sku,wal.walmart_option_attributes,option_image,option_qty,option_price,option_weight,option_unique_id FROM `walmart_product_variants` wal INNER JOIN `jet_product_variants` jet ON jet.option_id=wal.option_id WHERE wal.product_id="'.$id.'" and wal.merchant_id="'.MERCHANT_ID.'" and jet.merchant_id="'.MERCHANT_ID.'" and jet.option_qty!=0';
                        $productVarArray = Data::sqlRecords($query,"all","select");
                        //print_r($productVarArray);die;

                        foreach($productVarArray as $value)
                        {
                            // if(MERCHANT_ID==294)
                            // 	$optionTitle=htmlspecialchars($value['option_title']);
                            // else 
                            $optionTitle=htmlspecialchars($productArray['title'].'~'.$value['option_title']);
                           
                            if($value['option_price'])
                                $value['option_price']=$value['option_price'];
                            else
                        	   $value['option_price']= $productArray['price'];
                            $updatePrice = Data::getCustomPrice($value['option_price'],$merchant_id);
                            if($updatePrice)
                                $value['option_price']=$updatePrice;
                 
                            if(in_array($value['option_sku'],$duplicateSkus))
                                continue;
                            else
                                $duplicateSkus[] = $value['option_sku'];

                            $Catdata=[];
                            $isParent=0;
                            if($value['option_sku']==$productArray['sku'])
                                $isParent=1;


                            $mappedData = [];
                            if($productArray['walmart_attributes']=='')
                            {
                                $mappedData = AttributeMap::getMappedWalmartAttributes($productArray['product_type'],$value['option_id'],$merchant_id);
                                
                                
                                $productArray['walmart_attributes'] = $mappedData['mapped_attributes'];
                            }
                            if($value['walmart_option_attributes']=='')
                            {
                                if(!count($mappedData))
                                    $mappedData = AttributeMap::getMappedWalmartAttributes($productArray['product_type'],$value['option_id'],$merchant_id);

                                $value['walmart_option_attributes'] = $mappedData['attribute_values'];
                            }
                            if($productArray['common_attributes']=='')
                            {
                                if(!count($mappedData))
                                    $mappedData = AttributeMap::getMappedWalmartAttributes($productArray['product_type'],$value['option_id'],$merchant_id);

                                $productArray['common_attributes'] = $mappedData['common_attributes'];
                            }

                            $Catdata = [];
                           // $requiredCategoryAttributes = AttributeMap::getWalmartCategoryAttributes($productArray['category']);
                            //print_r($requiredCategoryAttributes);die;
                            if(count($requiredCategoryAttributes['attributes']))
                            {
                            	 $brand= addslashes($productArray['brand']);
                                
                                $Catdata = self::getCategoryArray($productArray['sku'], $isParent, $productArray['category'], $productArray['walmart_attributes'], $value['walmart_option_attributes'], $brand, $productArray['type'], $connection, $productArray['common_attributes'],$productArray['product_id']);
                                if(count($requiredCategoryAttributes['required_attrs']) && (!is_array($Catdata) || (is_array($Catdata) && (!isset($Catdata['category_id']) || !isset($Catdata['attributes']))))) {
                                    $error[$productArray['sku']] = "Please Fill the Required Attributes for Product having sku :'".$productArray['sku']."'";
                                    continue;
                                }
                            }

                            //print_r($Catdata);die("fdgd");
                            
                            if ($Catdata['attributes']['variantAttributeNames']['_value'][0]['variantAttributeName']=='flavor') {
                                if($Catdata['additional_attributes']['flavor']){
                                    $catValue=$Catdata['additional_attributes']['flavor'];
                                }
                            }
                            
                            $type = Jetproductinfo::checkUpcType($value['option_unique_id']);

                            if($merchant_id==311)
                            {
                                $type = "GTIN";
                            }
                            
                            $uploadType = 'MPItem';

                            $product_id = $value['option_unique_id'];

                            if($merchant_id==311)
                            {
                                $product_id = "CUSTOM";
                            }

                           
                            //print_r($validateResponse['success'][$value['option_sku']]);
                            /*if($validateResponse['success'][$value['option_sku']]!='not_uploaded')
                       		{	
                                $uploadType = 'MPItemUpdate';
                            }*/
                            
                            if(count($Catdata))
                            {
                                $productData =  [
                                    'sku' => $value['option_sku'],
                                    'Product' => [
                                        'productName' => addslashes($optionTitle),
                                        'longDescription' => '<![CDATA['.addslashes($description).']]>',
                                        'shelfDescription' => '<![CDATA[<div><p>'.addslashes($productArray['self_description']).'</p></div>]]>',
                                        'shortDescription' => '<![CDATA[<div></div>]]>',
                                        'mainImage' => [
                                            'mainImageUrl' => $imageArr[0],
                                            'altText' => htmlspecialchars($product['shelfDescription']),
                                        ],
                                        'additionalAssets' => self::prepareAdditionalAssets($imageArr),
                                        'productIdentifiers' =>
                                        [
                                            'productIdentifier' =>
                                            [
                                                'productIdType' =>$type,
                                                'productId' =>(string)$product_id,
                                            ]
                                        ],
                                         'productTaxCode' => Data::GetTaxCode($productArray,MERCHANT_ID),//$productArray['tax_code'],
                                    ]
                                ];

                                if($productArray['sku_override'] || $productArray['product_id_override'])
                                {
                                    $override = self::getSkuAndIdOverride($productArray['sku_override'],$productArray['product_id_override']);
                                    $productData['Product'][$override['key']] = $override['value'];
                                }

                                if(isset($Catdata['additional_attributes']) && count($Catdata['additional_attributes']))
                                {
                                    $additionalAttrs = $Catdata['additional_attributes'];
                                    $count = 0;
                                    if(!isset($productData['Product']['additionalProductAttributes'])) {
                                        $productData['Product']['additionalProductAttributes']['_attribute'] = [];
                                    } else {
                                        $count = count($productData['Product']['additionalProductAttributes']['_value']);
                                    }
                                    $data = self::getAdditionalProductAttrsData($additionalAttrs,$count);
                                    foreach ($data as $_data) {
                                        $productData['Product']['additionalProductAttributes']['_value'][] = $_data;   
                                    }
                                }

                                $productData['Product'][$Catdata['category_id']] = $Catdata['attributes'];
                    
                                $productData['price']  = [
                                    'currency' => "USD",
                                    'amount' => (string)$value['option_price']
                                ];
                                $productData['shippingWeight'] = [
                                    'value' => (string)$productArray['weight'],
                                    'unit' => 'LB'
                                ];
                                
                                $removeFreeShipping = Data::getConfigValue($merchant_id,'remove_free_shipping');
                                if($removeFreeShipping) {
                                    $freeShippingTag = self::removeFreeShippingData();
                                    $productData[$freeShippingTag['key']] = $freeShippingTag['value'];
                                }

                                $productToUpload['MPItemFeed']['_value'][$key][$uploadType] = $productData;
                            	
                            }
                            $key += 1;
                        }
                    }
                    $successXmlCreate++;
                }
            }
            if($successXmlCreate>0)
            {
                //print_r($productToUpload);die("before product upload");
                if(!file_exists(\Yii::getAlias('@webroot').'/var/product/xml/'.MERCHANT_ID)){
                    mkdir(\Yii::getAlias('@webroot').'/var/product/xml/'.MERCHANT_ID,0775, true);
                }
                $file=Yii::getAlias('@webroot').'/var/product/xml/'.MERCHANT_ID.'/MPProduct-'.time().'.xml';

                //echo $file;die;

                $xml = new Generator();
                $xml->arrayToXml($productToUpload)->save($file);
                self::unEscapeData($file);

                $response = $this->postRequest(self::GET_FEEDS_ITEMS_SUB_URL, ['file' => $file]);
                $response = str_replace('ns2:', "", $response);

                $responseArray = [];
                $responseArray = self::xmlToArray($response);
               // print_r($responseArray);die;

                if(isset($responseArray['FeedAcknowledgement']))
                {
                    $result = [];
                    $feedId = isset($responseArray['FeedAcknowledgement']['feedId'])?$responseArray['FeedAcknowledgement']['feedId']:'';
                    if($feedId != '') {
                        $result = $this->getFeeds($feedId);
                        if(isset($results['results'][0],$results['results'][0]['itemsSucceeded']) && $results['results'][0]['itemsSucceeded']==1) {
                            return ['uploadIds'=>$uploadProductIds,'feedId'=>$feedId, 'erroredSkus'=>$error, 'feed_file'=>$file];
                        }
                        return ['uploadIds'=>$uploadProductIds, 'feedId'=>$feedId, 'erroredSkus'=>$error, 'feed_file'=>$file];
                    }
                }
                elseif($responseArray['errors'])
                {
                    $error['feedError']=$responseArray['errors'];
                }
            }
            if(count($error)>0){
                return ['errors'=>$error];
            }
        }
    }
     /**
     * Prepare Product Data for Upload
     * @param $merchant_id string
     * @param $product []
     * @param $imageArr []
     * @param $tax_code string
     * @param $Catdata []
     * @param $requiredCategoryAttributes []
     * @return []
     */
     public static function prepareProductData($merchant_id, $product, $imageArr, $tax_code, $Catdata, $requiredCategoryAttributes)
    {
        if ($product['identifier_type'] == '')
            $product['identifier_type'] = "UPC";

        if ($merchant_id == 869) 
        {
            $product['upc'] = 'CUSTOM';
            $product['identifier_type'] = 'UPC';

        } 
        else 
        {
            $skipCategory = ['Jewelry', 'Rings'];

            if (!in_array($product['category'], $skipCategory)) 
            {
                $upc = trim($product['upc']);
                $flag = true;
                if ($upc == "")
                {
                    $message = "Missing barcode.";
                    $flag = false;
                } 
                else 
                {
                    $type = Jetproductinfo::checkUpcType($upc);
                    if($type == "")
                    {
                        $message = "Invalid barcode type.";
                        $flag = false;
                    }
                    else
                    {
                        $validUpc = Jetproductinfo::validateProductBarcode($upc, $product['variant_id'], $merchant_id);
                        if(!$validUpc) 
                        {
                            $message = "Duplicate barcode.";
                            $flag = false;
                        }
                        else
                        {
                            if(!Data::validateUpc($product['upc']))
                            {
                                $message = "Invalid barcode.";
                                $flag = false;
                            }
                        }
                    }
                }

                if ($flag) {
                    $upc_length = strlen($product['upc']);

                    if ($upc_length < 12) {

                        $zero_length = 12 - $upc_length;

                        for ($i = 0; $i < $zero_length; $i++) {
                            $product['upc'] = '0' . $product['upc'];
                        }
                        $product['identifier_type'] = "UPC";
                    } elseif ($upc_length == 13) {
                        $product['upc'] = '0' . $product['upc'];
                        $product['identifier_type'] = "GTIN";
                    }

                } else {
                    $originalmessage='';
                    $message = "Invalid barcode.";
                    return ['error' => true, 'message' => $message ,'originalmessage' => $originalmessage];
                }
            }
        }

        $productData = [
            'sku' => $product['sku'],
            'Product' => [
                'productName' => '<![CDATA[' . $product['name'] . ']]>',
                'longDescription' => '<![CDATA[' . $product['description'] . ']]>',
                'shelfDescription' => '<![CDATA[<div><p>' . $product['shelfDescription'] . '</p></div>]]>',
                'shortDescription' => '<![CDATA[<div></div>]]>',
                'mainImage' => [
                    'mainImageUrl' => $imageArr[0],
                    'altText' => substr(htmlspecialchars($product['shelfDescription']),0,149),
                ],
                'additionalAssets' => self::prepareAdditionalAssets($imageArr),
                'productIdentifiers' => [
                    'productIdentifier' => [
                        'productIdType' => $product['identifier_type'],
                        'productId' => $product['upc'],
                    ]
                ],
                'productTaxCode' => $tax_code
            ]
        ];

        if ($product['sku_override'] || $product['id_override']) {
            $override = self::getSkuAndIdOverride($product['sku_override'], $product['id_override']);
            $productData['Product'][$override['key']] = $override['value'];
        }
        // add shipping exception 

        //new changes
        if (isset($Catdata['additional_attributes']) && count($Catdata['additional_attributes'])) {
            $additionalAttrs = $Catdata['additional_attributes'];
            $count = 0;
            if (!isset($productData['Product']['additionalProductAttributes'])) {
                $productData['Product']['additionalProductAttributes']['_attribute'] = [];
            } else {
                $count = count($productData['Product']['additionalProductAttributes']['_value']);
            }
            $data = self::getAdditionalProductAttrsData($additionalAttrs, $count);
            foreach ($data as $_data) {
                $productData['Product']['additionalProductAttributes']['_value'][] = $_data;
            }
        }
        //end

        $productData['Product'][$Catdata['category_id']] = $Catdata['attributes'];

        $productData['price'] = [
            'currency' => "USD",
            'amount' => $product['price']
        ];
        $productData['shippingWeight'] = [
            'value' => $product['weight'],
            'unit' => 'LB'
        ];

        $removeFreeShipping = Data::getConfigValue($merchant_id, 'remove_free_shipping');
        if ($removeFreeShipping) {
            if(!empty($product['shipping_exceptions']) && $product['shipping_exceptions']!="[]"){
                $shipping_exception = self::addShippingException($product['shipping_exceptions'],$removeFreeShipping);
                $productData['shippingOverrides']=$shipping_exception;
            }
            else{
                $freeShippingTag = self::removeFreeShippingData();
                $productData[$freeShippingTag['key']] = $freeShippingTag['value'];
            }
        }else{
            if(!empty($product['shipping_exceptions']) && $product['shipping_exceptions']!="[]"){
                $shipping_exception = self::addShippingException($product['shipping_exceptions'],$removeFreeShipping);
                $productData['shippingOverrides']=$shipping_exception;
            }
        }
        $category_id = $product['category'];

        $validateData = WalmartProductValidate::checkProductBeforeUpload($productData, $product, $requiredCategoryAttributes);
        // by shivam
        $validate = WalmartProductValidate::validateProductXml($productData);

        if (isset($validateData['status']) && $validateData['status'] && isset($validate['status']) && $validate['status']) {
            return ['success' => true, 'data' => $productData];
        } else {
            $originalmessage = '';
            $message = "Required Category Attributes are Missing.";
            if (isset($validateData['message'])) {
                $message = $validateData['message'];

            } elseif (isset($validate['message'])) {
                $originalmessage = $validate['message'];
                $message = "Rejected by Walmart because there was a glitch on walmart's end. Please contact us.";
            }
            return ['error' => true, 'message' => $message, 'originalmessage' => $originalmessage];
        }
    }

    /**
     * validate product
     * @param [] $product
     * @return bool
     */    
    public static function validateProduct($product,$connection)
    {
        //print_r($product);die;
        $price=$product['price'];
        $qty=$product['qty'];
        $errorArr=[];
        $validatedProduct=[];
        $validatedPro=[];

        $brand=$product['additional_info'];
        $brand=json_decode($brand)->brand;
        if(!$brand){
            $brand=$product['brand'];
        }
        
        
        /*if(!$product['short_description'] || strlen($product['short_description'])>1000)
        {
            $errorArr[]="shortDescription must be maximum of 1000 characters in length";
        }
        if(!$product['self_description'] || strlen($product['self_description'])>1000)
        {
            $errorArr[]="self_description must be maximum of 1000 characters in length";
        }*/
        if(!$product['title'] && strlen($product['title'])>100)
        {
            $errorArr[]="Product title must be maximum of 100 characters in length";
        }
        if(!$product['description'])
        {
            $errorArr[]="Product description is required";
        }
        if(!$brand)
        {
            $errorArr[]="Missing brand";
        }
        if(!Data::GetTaxCode($product,MERCHANT_ID)) {
            $errorArr[]="Missing/Invalid product tax code";
        }
        if(!$product['category']){
            $errorArr[]="Missing category";
        }
        $image="";
        $image=trim($product['image']);
        $countImage=0;
        $imageArr=[];
        $ImageFlag=false;
        $imageArr=explode(',',$image);
        if($image!="" && count($imageArr)>0)
        {
            foreach ($imageArr as $value){
                if(self::checkRemoteFile($value)==false)
                    $countImage++;
            }
            if(count($imageArr)==$countImage)
                $ImageFlag=true;
        }
        if($image=='' || $ImageFlag){
            $errorArr[]="Missing or Invalid Image,";
        }
        
        $isexistAttr=false;
        /*$isexistAttr = self::checkAttributes($product['category'],$connection);
        if($isexistAttr && !$product['walmart_attributes']){
            $errorArr[]="Missing walmart attributes";
        }*/
        //check if walmart attributes exist
        if(!self::checkAttributes($product, $connection, $isexistAttr)) 
        {

            $errorArr[] = "Missing walmart attributes";
        }
        $upc='';
        $upc= json_decode($product['additional_info']);
        $upc=$upc->upc_code;
        if(!$upc){
            $upc=$product['upc'];
        }

        if($product['type']=="simple")
        {
            
            if(($price<=0 || ($price && !is_numeric($price))) || trim($price)==""){
                $errorArr[]="Missing/invalid price";
            }
            /*if(($qty && !is_numeric($qty))||trim($qty)==""||($qty<=0 && is_numeric($qty))){
                $errorArr[]="Missing/invalid inventory";
            }*/
            $type="";
           
            $type=Jetproductinfo::checkUpcType($upc);

            $existUpc=false;
            if(!$type)
               $existUpc=Jetproductinfo::checkUpcSimple($upc,$product['bigproduct_id'],$connection);
            if($upc=="" || (strlen($upc)>0 && $type=="") || (strlen($upc)>0 && $existUpc))
            {
                $errorArr[]="Missing/invalid barcode";
            }
            $walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
            //$validatedPro[$product['sku']] = $walmartHelper->getItem($product['sku'], 'publishedStatus');
            if($product['status']==WalmartProduct::PRODUCT_STATUS_NOT_UPLOADED)
                $validatedPro[$product['sku']] = "not_uploaded";
            else
                $validatedPro[$product['sku']] = "";
            if(is_array($errorArr) && count($errorArr)>0)
                $errorSkus[$product['sku']]=$errorArr;
        }
        else
        {
            $par_qty=0;
            $par_price="";
            $par_qty=trim($product['qty']);
            if($par_qty=="")
                $par_qty=0;
            $par_price=trim($product['price']);
            $c_par_price=false;
            $c_par_qty=false;
            if($par_price<=0 || (trim($par_price) && !is_numeric($par_price)) || trim($par_price)=="")
            {
                $c_par_price=false;
            }
            else
            {
                $c_par_price=true;
            }
            if((trim($par_qty)<=0 || !is_numeric($par_qty)))
            {
                $c_par_qty=false;
            }
            else
            {
                $c_par_qty=true;
            }
            //check if walmart attributes not available for category
          /*  if(!$isexistAttr)
            {
                if(($price<=0 || ($price && !is_numeric($price))) || trim($price)==""){
                    $errorArr[]="Missing/invalid price";
                }
                if(($qty && !is_numeric($qty))||trim($qty)==""||($qty<=0 && is_numeric($qty))){
                    $errorArr[]="Missing/invalid inventory";
                }
               //product variant as simple
                $type="";

                $upc= json_decode($productArray['additional_info']);           
                $type=Jetproductinfo::checkUpcType($upc->upc_code);
                if($type!="")
                    $existUpc=Jetproductinfo::checkUpcSimple($upc->upc_code,$product['bigproduct_id'],$connection);
                if($product['status']==WalmartProduct::PRODUCT_STATUS_NOT_UPLOADED)
                    $validatedPro[$product['sku']] = "not_uploaded";
                else
                    $validatedPro[$product['sku']] = "";
            }*/
           // else
            //{
            	//print_r($product);die;
                $productVarArray=[];
                $query='select wal.option_id,option_sku,option_image,option_qty,option_price,option_unique_id,wal.status from `jet_product_variants` jet INNER JOIN `walmart_product_variants` wal ON jet.product_id=wal.product_id where jet.product_id="'.$product['product_id'].'"';
                $productVarArray = Data::sqlRecords($query,"all","select");
                foreach ($productVarArray as $pro)
                {
                    $upc="";
                    $price="";
                    $qty=0;
                    $opt_sku="";
                    $opt_sku=trim($pro['option_sku']);
                    $qty=trim($pro['option_qty']);
                    if($qty=="")
                        $qty=0;
                    $price=trim($pro['option_price']);
                    $upc = trim($pro['option_unique_id']);
                    
                    /*if(!$c_par_qty && trim($qty)<=0){
                        $errorArr[]="Missing/invalid inventory for variants sku: ".$pro['option_sku'];
                    }*/
                    //check upc type
                    $type="";
                    $existUpc=false;
                    $type=Jetproductinfo::checkUpcType($upc);
                    $productasparent=0;
                    if($product['sku']==$pro['option_sku']){
                        $productasparent=1;
                    }
                    if($type!="")
                        $existUpc=Jetproductinfo::checkUpcVariants($upc,$product['product_id'],$pro['option_id'],$productasparent,$connection);
                    if($upc=="" || (strlen($upc)>0 && $type=="") || (strlen($upc)>0 && $existUpc))
                    {
                        //$errorArr[]="Missing/invalid barcode for variants sku: ".$pro['option_sku'];
                    }
                    $walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
                    if(is_null($pro['status']))
                        $validatedPro[$pro['option_sku']] = "not_uploaded";
                    else
                        $validatedPro[$pro['option_sku']] = "";
                }
          //  }
        }
        if(count($errorArr)>0){
            $validatedProduct['error']=$errorArr;
        }
        if(count($validatedPro)>0){
            $validatedProduct['success']=$validatedPro;
        }
        unset($imageArr);
        unset($connection);
        unset($validatedPro);
        return $validatedProduct;
    }

    /**
     * check required category attributes On Walmart
     * @param string|[] $category_id
     * @return bool
     */
    public static function checkAttributes($product, $connection=array(),&$isattrexist)
    {
        $category_id = $product['category'];
        $catCollection = [];
        $query = 'select attributes from `walmart_category` where category_id="'.$category_id.'" LIMIT 1';
        $catCollection = Data::sqlRecords($query, "one", "select");
        if(isset($catCollection['attributes']) && $catCollection['attributes'])
        {
            $isattrexist = true;
            if($product['walmart_attributes'] != '') {
                return true;
            } else {
                return AttributeMap::isProductTypeAttributeMapped($product['product_type']);
            }
        }
        else 
        {
            $isattrexist = false;
            return true;
        }
        return false;
    }

     /**
     * get category attributes and parent id On Walmart
     * @param string|[] $category_id
     * @return bool
     */
    public static function getCategoryArray($sku=NULL,$isParent=NULL,$category_id=NULL,$mappedattributes=NULL,$mappedVarAttr=NULL,$brand=NULL,$type=NULL,$connection,$commonAttributeValues='',$variantGroupId)
    {
        $attr_mapped = [];
        $attr_mapped = json_decode($mappedattributes, true);
        
        //print_r($attr_mapped);die;
        $attrArray = [];
        $mappedVar = [];
        $parArray = [];
        $data = '';

        //check if selected `category_id` exist on walmart or not
        $catCollection = [];
        $query = "SELECT `parent_id` FROM `walmart_category` WHERE `category_id`='".$category_id."' LIMIT 0,1";
        $catCollection = Data::sqlRecords($query,"one","select");
        if($catCollection)
        {
            $attrList = [];

            //code by himanshu
            $commonAttr = [];
            if($commonAttributeValues != '' && strlen($commonAttributeValues))
                $commonAttr = json_decode($commonAttributeValues, true);
            
            foreach ($commonAttr as $commonAttrKey => $commonAttrValue) {
                $attr_mapped[$commonAttrKey] = [$commonAttrValue];
            }
            $attr_mapped['brand'] = [$brand];
            //end

            //get walmart required attributes
            if(is_array($attr_mapped) && count($attr_mapped)>0)
            {
                $isvar = false;
                //$attr_mapped['brand'] = [$brand];
                
                //print_r($attr_mapped);die;
                
                $attrValues = [];
                foreach ($attr_mapped as $attr_key=>$attr_value)
                {
                    if($type == "variants")
                    {
                        $isvar = true;
                        $mappedVar = json_decode($mappedVarAttr,true)?:[];
                        //if($attr_key!='brand' && $attr_key!='gender' && $attr_key!='shoeCategory')
                        if($attr_key!='brand' && !in_array($attr_key, array_keys($commonAttr)))
                        {
                        	//die("dfds");
                        	//print_r($attr_value);die;
                            $attr = self::explodeAttributes($attr_value[0]);
                            $attrValues[] = $attr[0];
                        }

                        if(isset($attr_value[0]) && array_key_exists($attr_value[0], $mappedVar)) {
                            $attrList[$attr_value[0]] = $mappedVar[$attr_value[0]];
                        } else {
                            $attrList[$attr_key] = $attr_value[0];
                        }
                        
                    }
                    else
                    {
                        if(is_array($attr_value))
                            $attrList[$attr_key] = $attr_value[0];
                        else
                            $attrList[$attr_key] = $attr_value;
                    }
                }
                if($isvar)
                {
                    $attrList['variantAttributeNames'] = $attrValues;
                }
                //print_r($attrList);die;
                //new changes
                $additionalAttrs = $attrList;
                //end
//print_r($additionalAttrs);
                if(!is_null($catCollection['parent_id']) && $catCollection['parent_id'] != '0')
                {
                    if(is_array(WalmartCategory::getCategoryOrder($catCollection['parent_id'])) && count(WalmartCategory::getCategoryOrder($catCollection['parent_id']))>0)
                    {
                        $parentAttrList = $attrList;
                        foreach(WalmartCategory::getCategoryOrder($catCollection['parent_id']) as $value)
                        {
                            $attributeArray=[];
                            $attributeArray = explode("/", $value);
                            
                            /*if(is_array($attributeArray) && count($attributeArray)>0 && array_key_exists($attributeArray[0], $attrList))
                            {
                                $parArray = array_merge_recursive($parArray, self::generateArray($attributeArray,$attrList[$attributeArray[0]],$isParent,$type,$sku,$variantGroupId));
                            }*/
                            if(is_array($attributeArray) && count($attributeArray)>0)
                            {
                            	
                                foreach ($parentAttrList as $attrListKey => $attrListValue) 
                                {
                                    $array_diff = array_diff($attributeArray, self::explodeAttributes($attrListKey));
                                    if(count($array_diff) == 0 || ($attrListKey == 'variantAttributeNames' && in_array('variantAttributeNames',$attributeArray))) {
                                        $parArray = array_merge_recursive($parArray, self::generateArray($attributeArray,$attrListValue,$isParent,$type,$sku,$variantGroupId));
                                        unset($parentAttrList[$attrListKey]);
                                        unset($additionalAttrs[$attrListKey]);
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
                if(is_array(WalmartCategory::getCategoryOrder($category_id)) && count(WalmartCategory::getCategoryOrder($category_id))>0)
                {
                    $AttrList = $attrList;
                    
                    foreach (WalmartCategory::getCategoryOrder($category_id) as $value)
                    {
                    	//print_r($value);die;
                        $attributeArray=[];
                        $attributeArray = explode("/", $value);

                        /*if(is_array($attributeArray) && count($attributeArray)>0 && array_key_exists($attributeArray[0], $attrList))
                        {
                            $attrArray = array_merge_recursive($attrArray, self::generateArray($attributeArray,$attrList[$attributeArray[0]],$isParent,$type,$sku,$variantGroupId));
                        }*/
                        if(is_array($attributeArray) && count($attributeArray)>0)
                        {
                        	
                            foreach ($AttrList as $AttrListKey => $AttrListValue)
                            {
                                $array_diff = array_diff($attributeArray, self::explodeAttributes($AttrListKey));
                                
                                //print_r($array_diff);
                                //if($AttrListKey!='variantAttributeNames' && $AttrListKey!='brand')
                                		//$attrArray[$AttrListKey]=$AttrListValue;
                                if(count($array_diff) == 0 || ($AttrListKey == 'variantAttributeNames' && in_array('variantAttributeNames',$attributeArray))) {
                                    $attrArray = array_merge_recursive($attrArray, self::generateArray($attributeArray,$AttrListValue,$isParent,$type,$sku,$variantGroupId));
                                    //print_r($attrArray);die;
                                    unset($AttrList[$AttrListKey]);
                                    unset($additionalAttrs[$AttrListKey]);
                                    break;
                                }
                            }
                        }
                    }
                }

                
                $data['additional_attributes'] = $additionalAttrs;
                
                
                unset($additionalAttrs);
                unset($AttrList);
                unset($parentAttrList);
                //end

            }
            if(!is_null($catCollection['parent_id']) && $catCollection['parent_id']!='0')
            {  
                if(is_array($parArray) && count($parArray)>0)
                {
                    $parArray[$category_id]=$attrArray;
                    $data['category_id']=$catCollection['parent_id'];
                    $data['attributes']=$parArray;
                }
            }
            else
            {   

                $data['category_id']=$category_id;
                $data['attributes']=$attrArray;
            }
        }
        
        //print_r($data);die;
        return $data;   
    }
    
    /**
     * To Explode Attributes of the form 'color->colorValue' to array('color','colorValue')
     *
     * @param string $attribute
     * @return array
     */
    public static function explodeAttributes($attribute)
    {
    	
    	$delimeter = AttributeMap::ATTRIBUTE_PATH_SEPERATOR;
    	$attributes = [];
    	if(strpos($attribute, $delimeter) !== false)
    	{
    		$attribute = explode($delimeter, $attribute);
    		foreach ($attribute as $value) {
    			$attributes[] = trim($value);
    		}
    	}
    	else
    	{
    		$attributes = [$attribute];
    	}
    	
    	//print_r($attributes);die;
    	return $attributes;
    
    	/*$delimeter1 = '(';
    	 $delimeter2 = ')';
    
    	$attributes = [];
    	if(strpos($attribute, $delimeter1) !== false && strpos($attribute, $delimeter2) !== false)
    	{
    	$attribute = explode($delimeter1, $attribute);
    	foreach ($attribute as $value) {
    	$attributes[] = str_replace($delimeter2, '', $value);
    	}
    	}
    	else
    	{
    	$attributes = [$attribute];
    	}
    	return $attributes;*/
    }
	public function generateArray($attributeArray = [], $value = null,$isParent=null,$type=null,$sku=null,$variantGroupId)
    {
        try 
        {
            $returnArray=[];
            if (count($attributeArray) == 1) 
            {
                $returnArray = [
                $attributeArray[0] => $value,
                ];
                return $returnArray;   
            }
            if (count($attributeArray) == 2) 
            {
                if (is_array($value)) 
                {
                    $returnArray[$attributeArray[0]]['_attribute'] = [];
                    foreach ($value as $key => $val) 
                    {
                        $returnArray[$attributeArray[0]]['_value'][$key][$attributeArray[1]] = $val;
                    }
                    //echo $type.'=='.$attributeArray[0]."<br>";
                    if($attributeArray[0]=='variantAttributeNames' && $type=='variants')
                    {
                        $returnArray['variantGroupId'] = $variantGroupId;
                        if($isParent==1)
                            $returnArray['isPrimaryVariant']="true";
                    }
                }
                else
                {
                    $returnArray = [
                        $attributeArray[0] =>
                        [
                            $attributeArray[1] => $value,
                        ]
                    ];
                }
                return $returnArray;
            }
            if (count($attributeArray) == 3) 
            {
                $returnArray = [$attributeArray[0] => 
                [
                    $attributeArray[1] => 
                        [
                        $attributeArray[2] => $value,
                        ],
                    ]
                ];
                return $returnArray;
            }
            return false;
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
    /**
     * Update Inventory On Walmart
     * @param string|[] $ids
     * @return bool
     */
    public function updateInventoryOnWalmart($product,$datafrom)
    {
    	//print_r($product);die("fdgf");
        $inventoryArray = [
            'InventoryFeed' => [
                '_attribute' => [
                    'xmlns' => "http://walmart.com/",
                ],
                '_value' => [
                    0 => ['InventoryHeader' => [
                        'version' => '1.4',
                    ],
                    ],
                ]
            ]
        ];
        $timeStamp = (string)time();
        $isInvFeed=0;
        $key = 0;
        
        if($datafrom=="product")
        {
        	self::updateinventoryonapp($product);
        	
            if (is_array($product) && count($product)>0)
            {
                
                foreach($product as $pro)
                {
                    //check product available on walmart
                    $response = $this->getItem($pro['sku']);
                    if(is_array($response) && count($response)){
                        self::saveStatus($pro['id'],$response);
                    }
                    $isInvFeed++;
                    if ($pro['type'] == 'variants') 
                    {
                        $varProducts=[];
                        $query="select option_sku,option_qty from `jet_product_variants` where product_id='".$pro['bigproduct_id']."' and merchant_id='".MERCHANT_ID."'";
                        $varProducts = Data::sqlRecords($query,"all","select");
                        foreach ($varProducts as $value) 
                        {
                            $key += 1;
                            $inventoryArray['InventoryFeed']['_value'][$key] = [
                                'inventory' => [
                                    'sku' => $value['option_sku'],
                                    'quantity' => [
                                        'unit' => 'EACH',
                                        'amount' =>  $value['option_qty'],
                                    ],
                                     'fulfillmentLagTime' => isset($pro['fulfillment_lag_time'])?$pro['fulfillment_lag_time']:'1',
                                ]
                            ];
                        }
                    } 
                    else 
                    {
                        $key += 1;
                        $inventoryArray['InventoryFeed']['_value'][$key] = [
                            'inventory' => [
                                'sku' =>  $pro['sku'],
                                'quantity' => [
                                    'unit' => 'EACH',
                                    'amount' =>  $pro['qty'],
                                ],
                                 'fulfillmentLagTime' => isset($pro['fulfillment_lag_time'])?$pro['fulfillment_lag_time']:'1',
                            ]
                        ];
                    }
                }    
            }
        }
        elseif($datafrom=="webhook")
        {
            $key += 1;
            $isInvFeed++;
            $inventoryArray['InventoryFeed']['_value'][$key] = [
                'inventory' => [
                    'sku' => $product['sku'],
                    'quantity' => [
                        'unit' => 'EACH',
                        'amount' =>  $product['qty'],
                    ],
                     'fulfillmentLagTime' => isset($pro['fulfillment_lag_time'])?$pro['fulfillment_lag_time']:'1',
                ]
            ];
        }
        if($isInvFeed>0)
        {
            //print_r($inventoryArray);die("dfds");
            if(!file_exists(\Yii::getAlias('@webroot').'/var/product/xml/'.MERCHANT_ID.'/inventory')){
                mkdir(\Yii::getAlias('@webroot').'/var/product/xml/'.MERCHANT_ID.'/inventory',0775, true);
            }
            $file=Yii::getAlias('@webroot').'/var/product/xml/'.MERCHANT_ID.'/inventory/MPProduct-'.time().'.xml';
            $xml=new Generator();
            $xml->arrayToXml($inventoryArray)->save($file);
            $response = $this->postRequest(self::GET_FEEDS_INVENTORY_SUB_URL, ['file' => $file]);
            $responseArray =  self::xmlToArray($response);
            //print_r($responseArray);die("dfdf");
            if(isset($responseArray['FeedAcknowledgement']))
            {
                $result=[];
                $result = $this->getFeeds($responseArray['FeedAcknowledgement']['feedId']);
                //print_r($result);
                if(isset($results['results'][0],$results['results'][0]['itemsSucceeded']) && $results['results'][0]['itemsSucceeded']==1)
                {
                    return ['feedId'=>$responseArray['FeedAcknowledgement']['feedId']];
                }
                //return ['feedId'=>$responseArray['FeedAcknowledgement']['feedId']];
            }
            elseif(isset($responseArray['errors']))
            {
                return ['errors' => $responseArray['errors']];
            }
            //return $responseArray;
        }
    }
    
       /**
     * Update Price On Walmart
     * @param string|[] $ids
     * @return bool
     */
    public function updatePriceOnWalmart($product = [],$datafrom=null)
    {
    	
    	//print_r($product);die;
        $timeStamp = (string)time();
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
        $isPriceFeed=0;
        $key = 0;
        if($datafrom=="product")
        {
            //self::updatepriceonapp($product);
            if (is_array($product) && count($product)>0) 
            {
                foreach($product as $pro)
                {
                    $isPriceFeed++;
                    if ($pro['type'] == 'variants') 
                    {
                        $varProducts=[];
                        $query="select option_sku,option_price from `jet_product_variants` where product_id='".$pro['bigproduct_id']."'and merchant_id='".MERCHANT_ID."'";
                        $varProducts = Data::sqlRecords($query,"all","select");
                        foreach ($varProducts as $value) 
                        {
                            $key += 1;
                            //update custom price on walmart
                            if($value['option_price']==0 || $value['option_price']=='')
                             $value['option_price']=$pro['price'];
                            
                            $updatePrice = Data::getCustomPrice($value['option_price'],MERCHANT_ID);
                            if($updatePrice)
                                $value['option_price']=round($updatePrice, 2);
                            
                            if(MERCHANT_ID==294){
                            	$update_price=$pro['update_price'];
                            }
                            else{
                            	$update_price=$value['option_price'];
                            }

                            $priceArray['PriceFeed']['_value'][$key] = [
                                'Price' => [
                                    'itemIdentifier' => [
                                        'sku' => $value['option_sku']
                                    ],
                                    'pricingList' => [
                                        'pricing' => [
                                            'currentPrice' => [
                                                'value' => [
                                                    '_attribute' => [
                                                        'currency' => CURRENCY,
                                                        'amount' => $update_price
                                                    ],
                                                    '_value' => [

                                                    ]
                                                ]
                                            ],
                                            'currentPriceType' => 'BASE',
                                            'comparisonPrice' => [
                                                'value' => [
                                                    '_attribute' => [
                                                        'currency' => CURRENCY,
                                                        'amount' => $value['option_price']
                                                    ],
                                                    '_value' => [

                                                    ]
                                                ]
                                            ],
                                        ]
                                    ]
                                ]
                            ];
                        }
                    } 
                    else 
                    {
                        //update custom price on walmart
                    	
                        $updatePrice = Data::getCustomPrice($pro['price'],MERCHANT_ID);
                        
                        if($updatePrice)
                            $pro['price']=round($updatePrice, 2);
                        
                        if(MERCHANT_ID==294){
                        	$update_price=$pro['update_price'];
                        }
                        else{
                        	$update_price=$pro['price'];
                        }

                        $key += 1;
                        $priceArray['PriceFeed']['_value'][$key] = [
                            'Price' => [
                                'itemIdentifier' => [
                                    'sku' => $pro['sku']
                                ],
                                'pricingList' => [
                                    'pricing' => [
                                        'currentPrice' => [
                                            'value' => [
                                                '_attribute' => [
                                                    'currency' => CURRENCY,
                                                    'amount' => $update_price
                                                ],
                                                '_value' => [

                                                ]
                                            ]
                                        ],
                                        'currentPriceType' => 'BASE',
                                        'comparisonPrice' => [
                                            'value' => [
                                                '_attribute' => [
                                                    'currency' => CURRENCY,
                                                    'amount' => $pro['price']
                                                ],
                                                '_value' => [

                                                ]
                                            ]
                                        ],
                                    ]
                                ]
                            ]
                        ];
                    }
                }    
            }
        }
        elseif($datafrom=="webhook")
        {
            $key += 1;
            $isPriceFeed++;
            $priceArray['PriceFeed']['_value'][$key] = [
                            'Price' => [
                                'itemIdentifier' => [
                                    'sku' => $product['sku']
                                ],
                                'pricingList' => [
                                    'pricing' => [
                                        'currentPrice' => [
                                            'value' => [
                                                '_attribute' => [
                                                    'currency' => CURRENCY,
                                                    'amount' => $product['price']
                                                ],
                                                '_value' => [

                                                ]
                                            ]
                                        ],
                                        'currentPriceType' => 'BASE',
                                        'comparisonPrice' => [
                                            'value' => [
                                                '_attribute' => [
                                                    'currency' => CURRENCY,
                                                    'amount' => $product['price']
                                                ],
                                                '_value' => [

                                                ]
                                            ]
                                        ],
                                    ]
                                ]
                            ]
                        ];
        }
        if($isPriceFeed>0)
        {
            //print_r($priceArray);die("gfdg");
            if(!file_exists(\Yii::getAlias('@webroot').'/var/product/xml/'.MERCHANT_ID.'/price')){
                mkdir(\Yii::getAlias('@webroot').'/var/product/xml/'.MERCHANT_ID.'/price',0775, true);
            }
            $file=Yii::getAlias('@webroot').'/var/product/xml/'.MERCHANT_ID.'/price/MPProduct-'.time().'.xml';
            $xml=new Generator();

            $xml->arrayToXml($priceArray)->save($file);
            $response = $this->postRequest(self::GET_FEEDS_PRICE_SUB_URL, ['file' => $file]);
            $responseArray =  self::xmlToArray($response);

            //print_r($responseArray);die;
            if(isset($responseArray['FeedAcknowledgement']))
            {
                $result = $this->getFeeds($responseArray['FeedAcknowledgement']['feedId']);
                if(isset($results['results'][0],$results['results'][0]['itemsSucceeded']) && $results['results'][0]['itemsSucceeded']==1)
                {
                    return ['feedId'=>$responseArray['FeedAcknowledgement']['feedId']];
                }
                //return ['feedId'=>$responseArray['FeedAcknowledgement']['feedId']];
            }
            elseif(isset($responseArray['errors']))
            {
                return ['errors'=>$responseArray['errors']];
            }
            //return $responseArray;
        }
    }
    
    public static function checkRemoteFile($url)
    {
        stream_context_set_default( [
            'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            ],
        ]);
        $headers = get_headers($url);
        if(substr($headers[0], 9, 3) == '200') {
            return true;
        }else{
            return false;
        }
    }
    
    //delete the element
    public function deleteRequest($url, $params = [])
    {
        $signature = $this->apiSignature->getSignature($url, 'DELETE', $this->apiConsumerId, $this->apiPrivateKey);
        $url = $this->apiUrl . $url;

        $headers = [];
        $headers[] = "WM_SVC.NAME: Walmart Marketplace";
        $headers[] = "WM_QOS.CORRELATION_ID: " . base64_encode(\phpseclib\Crypt\Random::string(16));
        $headers[] = "WM_SEC.TIMESTAMP: " . $this->apiSignature->timestamp;
        $headers[] = "WM_SEC.AUTH_SIGNATURE: " . $signature;
        $headers[] = "WM_CONSUMER.ID: " . $this->apiConsumerId;
        //$headers[] = "Content-Type: application/json";
        $headers[] = "Accept: application/xml";
        $headers[] = "WM_CONSUMER.CHANNEL.TYPE: 7b2c8dab-c79c-4cee-97fb-0ac399e17ade";

        /*if (isset($params['headers']) && !empty($params['headers'])) {
            $headers[] = $params['headers'];
        }*/
        $headers[] = "HOST: marketplace.walmartapis.com";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($server_output, 0, $header_size);
        $response = substr($server_output, $header_size);
        curl_close($ch);

        return $response;
    }
    
    //acknowledge order
    public function acknowledgeOrder($purchaseOrderId , $subUrl = self::GET_ORDERS_SUB_URL)
    {
        $response = $this->postRequest($subUrl.'/'.$purchaseOrderId.'/acknowledge',
            [
            'headers' => 'WM_CONSUMER.CHANNEL.TYPE: ' . $this->apiConsumerChannelId,
            ]
        );
        try {
            
            $response = json_decode((string)$response,true);
            return isset($response['order'])?$response['order']:$response;
        }
        catch(\Exception $e){
           //echo $e->getMessage();die;
            return false;
        }
    
    }
    
    //ship order
    public function shipOrder($postData = null, $subUrl = self::GET_ORDERS_SUB_URL)
    { 
    	$purchaseOrderId = $postData['shipments'][0]['purchase_order_id'];
        //echo $purchaseOrderId;
        $shipArray = [
        'ns2:orderShipment' => [
        '_attribute' => [
        'xmlns:ns2' => "http://walmart.com/mp/v3/orders",
        'xmlns:ns3' => "http://walmart.com/",
        ],
        '_value' => [
        'ns2:orderLines' => [
        '_attribute' => [
        ],
        '_value' => [
    
        ]
        ],
        ]
        ]
        ];
        $url = 'www.fedex.com';
        if (isset($postData['shipments'][0]['shipment_tracking_url'])) {
            $url = $postData['shipments'][0]['shipment_tracking_url'];
        }
        foreach ($postData['shipments'] as $key => $values) {
            if (!isset($values['shipment_items']) || count($values['shipment_items'])==0) {
                continue;
            }
            foreach ($values['shipment_items'] as $value) {
                $lineNumber = $value['lineNumber'];

                 if(strtolower($postData['shipments'][0]['carrier']) == 'other'){
                    $carrier = [
                                 'ns2:otherCarrier' => 'other'
                             ];
                }else{
                    $carrier = [
                                 'ns2:carrier' => $postData['shipments'][0]['carrier']
                                 ];
                }


                $shipArray['ns2:orderShipment'][ '_value']['ns2:orderLines']['_value'][] =
                ['ns2:orderLine' => [
                'ns2:lineNumber' => $lineNumber,
                'ns2:orderLineStatuses' => [
                'ns2:orderLineStatus' => [
                'ns2:status' => 'Shipped',
                'ns2:statusQuantity' => [
                'ns2:unitOfMeasurement' => 'Each',
                'ns2:amount' => '1'//(string)$value['response_shipment_sku_quantity']
                ],
                'ns2:trackingInfo' => [
                'ns2:shipDateTime' => $postData['shipments'][0]['carrier_pick_up_date'],
                'ns2:carrierName' => $carrier,
                'ns2:methodCode' => $postData['shipments'][0]['response_shipment_method'],
                'ns2:trackingNumber' => $postData['shipments'][0]['shipment_tracking_number'],
                'ns2:trackingURL' => $url
                ]
                ]
                ]
                ]
                ];
                
            }
    
        }


        
        $customGenerator = new Generator();

        $customGenerator->arrayToXml($shipArray);

        $str = preg_replace
        ('/(\<\?xml\ version\=\"1\.0\"\?\>)/', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>',
            $customGenerator->__toString());
        $params['data'] = $str;

        $this->requestedXml = $str;
        //$this->createFile($str, ['type' => 'string', 'name' => 'OrderShip']);
        $params['headers'] = 'WM_CONSUMER.CHANNEL.TYPE:7b2c8dab-c79c-4cee-97fb-0ac399e17ade';
        $response = $this->postRequest($subUrl.'/'.$purchaseOrderId.'/shipping',
            $params);
        try{
            $parser = new Parser();
            $response = str_replace('ns:2', '', $response);
            $data = $parser->loadXML($response)->xmlToArray();
            //print_r($data);die;

            return json_encode($data);
        }
        catch(\Exception $e){
            //echo $e->getMessage();die;
            /*$this->_logger->debug('Walmart : shipOrder : Response: '.$response);
            return false;*/
           //print_r($data);die;

             return ['errors'=>[$e->getMessage()]];
        }
    }
    
   /**
     * Reject Order
     * @param string $purchaseOrderId
     * @param string $dataship
     * @param string $subUrl
     * @return string
     * @link  https://developer.walmartapis.com/#cancelling-order-lines
     */
    
    public function rejectOrder($purchaseOrderId , $dataship , $subUrl = self::GET_ORDERS_SUB_URL)
    {
        $cancelArray = [
        'ns2:orderCancellation' => [
        '_attribute' => [
        'xmlns:ns2' => "http://walmart.com/mp/v3/orders",
        'xmlns:ns3' => "http://walmart.com/",
        ],
        '_value' => [
        'ns2:orderLines' => []
        ]
        ]
        ];
    
        $counter = 0;
        foreach ($dataship['shipments'] as $values)
        {
            if (!isset($values['cancel_items'])) {
                echo 'OHH';
                continue;
            }
            foreach ($values['cancel_items'] as $value) 
            {
                $lineNumbers =  explode(',', $value['lineNumber']);
                $cancelArray['ns2:orderCancellation']['_value']['ns2:orderLines']['_attribute'] = [];
                foreach ($lineNumbers as $lineNumber) 
                {
                    $cancelArray['ns2:orderCancellation']['_value']['ns2:orderLines']
                    ['_value'][$counter]['ns2:orderLine']['ns2:lineNumber'] = (string)$lineNumber;
                    $cancelArray['ns2:orderCancellation']['_value']['ns2:orderLines']
                    ['_value'][$counter]['ns2:orderLine']['ns2:orderLineStatuses'] = [
                    'ns2:orderLineStatus' => [
                    'ns2:status' => 'Cancelled',
                    'ns2:cancellationReason' => 'CANCEL_BY_SELLER',
                    'ns2:statusQuantity' => [
                    'ns2:unitOfMeasurement' => 'EACH',
                    'ns2:amount' => '1'
                        ]
                        ]
                        ];
                    $counter++;
                }
            }
    
        }
        $customGenerator = new Generator();
        $customGenerator->arrayToXml($cancelArray);
        $str = preg_replace('/(\<\?xml\ version\=\"1\.0\"\?\>)/', '<?xml version="1.0" encoding="UTF-8" ?>',
            $customGenerator->__toString());

        $params['data'] = $str;
        $params['headers'] = 'WM_CONSUMER.CHANNEL.TYPE: ' . $this->apiConsumerChannelId;
        //$this->createFile($str, ['type' => 'string', 'name' => 'CancelOrder']);
        $response = $this->postRequest($subUrl.'/'.$purchaseOrderId.'/cancel',
            $params);

        try{
            $parser = new Parser();
            $response = str_replace('ns2:', '', $response);
            $response = str_replace('ns3:', '', $response);
            $response = str_replace('ns4:', '', $response);
            $data = $parser->loadXML($response)->xmlToArray();
            return $data;
        }
        catch(\Exception $e){
            //$this->_logger->debug('Reject Order : NO JSON Response . Response Was :- '.$response);
            return false;
        }
    }
    
    /**
     * Refund Order
     * @param string $purchaseOrderId
     * @param string $orderData
     * @param string $subUrl
     * @return string
     * @link  https://developer.walmartapis.com/#cancelling-order-lines
     */
    public function refundOrder($purchaseOrderId , $orderData , $subUrl = self::GET_ORDERS_SUB_URL)
    {

        $refundData = [
        'ns2:orderRefund' => [
        '_attribute' => [
        'xmlns:ns2' => "http://walmart.com/mp/v3/orders",
        'xmlns:ns3' => "http://walmart.com/",
        ],
        '_value' => [
        'ns2:purchaseOrderId' => $purchaseOrderId,
        'ns2:orderLines' => [
        'ns2:orderLine' =>[
        'ns2:lineNumber' => $orderData['lineNumber'],
        'ns2:refunds' => [
        'ns2:refund' => [
        'ns2:refundComments' => $orderData['refundComments'],
        'ns2:refundCharges' => [
        '_attribute' => [],
        '_value' =>[
            0 => [
            'ns2:refundCharge' => [
            'ns2:refundReason' => $orderData['refundReason'],
            'ns2:charge' => [
            'ns2:chargeType' => 'Product',
            'ns2:chargeName' => 'Item Price',
            'ns2:chargeAmount' => [
            'ns2:currency' => 'USD',
            'ns2:amount' => $orderData['amount']
                ],
                'ns2:tax' => [
                'ns2:taxName' => 'Item Price Tax',
                'ns2:taxAmount' => [
                'ns2:currency' => 'USD',
                'ns2:amount' => $orderData['taxAmount']
                ]
                ]
                ]
                    ]
                    ],
                    1 =>[
                    'ns2:refundCharge' => [
                        'ns2:refundReason' => $orderData['refunReasonShipping'],
                            'ns2:charge' => [
                            'ns2:chargeType' => 'Product',
                            'ns2:chargeName' => 'Item Price',
                            'ns2:chargeAmount' => [
                            'ns2:currency' => 'USD',
        'ns2:amount' => $orderData['shipping']
        ],
        'ns2:tax' => [
        'ns2:taxName' => 'Item Price Tax',
        'ns2:taxAmount' => [
        'ns2:currency' => 'USD',
            'ns2:amount' => $orderData['shippingTax']
            ]
            ]
                ]
                ]
                ]
                ]
    
                ]
                ]
                    ]
                        ]
                        ],
                        ]
                        ]
                        ];
                        $customGenerator = new Generator();
                        $customGenerator->arrayToXml($refundData);
                        $str = preg_replace('/(\<\?xml\ version\=\"1\.0\"\?\>)/', '<?xml version="1.0" encoding="UTF-8" ?>',
                            $customGenerator->__toString());
                            $params['data'] = $str;
                            $params['headers'] = 'WM_CONSUMER.CHANNEL.TYPE: ' . $this->apiConsumerChannelId;
                            //$this->createFile($str, ['type' => 'string', 'name' => 'RefundOrder']);
                            $response = $this->postRequest($subUrl.'/'.$purchaseOrderId.'/refund',
                                $params);
        try{
            $parser = new Parser();
            $response = str_replace('ns:2', '', $response);
            $response = str_replace('ns:4', '', $response);
            $response = $parser->loadXML($response)->xmlToArray();
            return $response;
    }
    catch(\Exception $e){
            $this->_logger->debug('Refund Order : NO JSON Response . Response Was :- '.$response);
        return false;
        }
    }

    /**
     * @return array
     */
    public function refundreasonOptionArr()
    {
        return [
        [
        'value' => '', 'label' => __('Please Select an Option')
        ],
        [
        'value' => 'BillingError', 'label' =>  __('BillingError')
        ],
        [
        'value' => 'TaxExemptCustomer', 'label' =>  __('TaxExemptCustomer')
        ],
        [
        'value' => 'ItemNotAsAdvertised', 'label' =>  __('ItemNotAsAdvertised')
        ],
        [
        'value' =>'IncorrectItemReceived', 'label' =>  __('IncorrectItemReceived')
        ],
        [
        'value' => 'CancelledYetShipped', 'label' =>  __('CancelledYetShipped')
        ],
        [
        'value' => 'ItemNotReceivedByCustomer', 'label' =>  __('ItemNotReceivedByCustomer')
        ],
        [
        'value' => 'IncorrectShippingPrice', 'label' =>  __('IncorrectShippingPrice')
        ],
        [
        'value' => 'DamagedItem', 'label' =>  __('DamagedItem')
        ],
        [
        'value' => 'DefectiveItem', 'label' =>  __('DefectiveItem')
        ],
        [
        'value' => 'CustomerChangedMind', 'label' =>  __('CustomerChangedMind')
        ],
        [
        'value' => 'CustomerReceivedItemLate', 'label' =>  __('CustomerReceivedItemLate')
        ],
        [
        'value' => 'Missing Parts / Instructions', 'label' =>  __('Missing Parts / Instructions')
        ],
        [
        'value' => 'Finance -> Goodwill', 'label' =>  __('Finance -> Goodwill')
        ],
        [
        'value' => 'Finance -> Rollback', 'label' =>  __('Finance -> Rollback')
        ]
        ];
    }
    /**
    *
    * convert xml response to array
    * @param $xml
    */
    public static function xmlToArray($xml)
    {
        $parser=new Parser();
        $data = $parser->loadXML($xml)->xmlToArray();
        $data = self::replaceString($data);
        return $data;
    }
    
    /**
     * save product status(s) for uploaded
     * products of products
     * @param Response
     * @param id
     */
    public static function saveStatus($id,$response)
    {
        if(is_array($response) && count($response)>0 && isset($response['MPItemView'][0],$response['MPItemView'][0]['publishedStatus'])){
            //update product status
            $query="update `walmart_product` set status='".$response['MPItemView'][0]['publishedStatus']."' where product_id='".$id."'";
            Data::sqlRecords($query,null,"update");
        }
    }
    public static function deleteFeed($feedId)
    {
        if($query)
        {
            $query="delete from `walmart_product_feed` where feedId='".$feedId."'";
            Data::sqlRecords($query,null,"delete");
        }
    }
    public static function is_json($string) 
    {
        try
        {
            $data = json_decode($string); 
            return (json_last_error() == JSON_ERROR_NONE) ? : FALSE;   
        }
        catch(Exception $e)
        {
            return false;
        }
    }
    
    
    public function viewFeed($feedId = null, $subUrl = self::GET_FEEDS_SUB_URL)
    {
    	$response="";
    	if ($feedId != null)
    	{
    		$response = json_decode($this->getRequest($subUrl . '/' . $feedId.'?includeDetails='.json_encode(true)),true);
    
    	}
    	return $response;
    }
    
    public static function isValidateVariant($category)
    {
        switch ($category) 
        {
            case 'Animal':
                return ['color','size','count','flavor','scent','assembledProductLength','assembledProductWidth','assembledProductHeight'];
                 break;
            case 'ArtAndCraft':
                return ['color','shape','material','finish','scent','size','assembledProductLength','assembledProductWidth','assembledProductHeight'];
                 break;
            case 'Baby':
                return ['color','finish','babyClothingSize','shoeSize','size','pattern','count','scent','flavor'];
                 break;
            case 'CarriersAndAccessories':
                return ['color','clothingSize','pattern','material','inseam','waistSize','neckSize','hatSize','pantySize','sockSize','count','braSize'];
                 break;
            case 'Clothing':
                return ['color','clothingSize','pattern','material','inseam','waistSize','neckSize','hatSize','pantySize','pantySize','sockSize','count','braSize'];
                break;
            case 'Electronics':
                return ['color','screenSize','resolution','ramMemory','hardDriveCapacity','connections','connections','cableLength','digitalFileFormat','physicalMediaFormat','platform','edition'];
                 break;
            case 'FoodAndBeverage':
                return ['flavor','size'];
                 break;
            case 'Footwear':
                return ['color','pattern','material','shoeWidth','shoeSize','heelHeight'];
                 break;
            case 'Furniture':
                return ['color','material','bedSize','finish','pattern'];
                 break;
            case 'GardenAndPatio':
                return ['color','material','finish','pattern','assembledProductLength','assembledProductWidth','assembledProductHeight'];
                 break;
            case 'HealthAndBeauty':
                return ['color','size','count','scent','flavor','shape'];
                 break;
            case 'Home':
                return ['color','size','capacity','pattern','homeDecorStyle','assembledProductLength','assembledProductWidth','assembledProductHeight','bedSize','material','scent','count'];
                 break;
            case 'Jewelry':
                return ['metal','size','ringSize','color','karats','carats','gemstone','birthstone','chainLength'];
                 break;
            case 'Media':
                return ['bookFormat','physicalMediaFormat','edition'];
                 break;
            case 'MusicalInstrument':
                return ['color','pattern','material','finish','audioPowerOutput'];
                 break;
            case 'OccasionAndSeasonal':
                return ['color','clothingSize','pattern','material','count','theme','occasion'];
                 break;
            case 'Office':
                return ['color','paperSize','material','count','numberOfSheets','envelopeSize'];
                 break;
            case 'Other':
                return ['count','size','scent','color','finish','capacity'];
                 break;
            case 'Photography':
                return ['color','material','focalLength','displayResolution'];
                 break;
            case 'SportAndRecreation':
                return ['color','size','assembledProductWeight','material','shoeSize','clothingSize','sportsTeam','sportsLeague'];
                 break;
            case 'ToolsAndHardware':
                return ['color','finish','grade','count','volts','amps','watts','workingLoadLimit','gallonsPerMinute','size','assembledProductLength','assembledProductWidth','assembledProductHeight'];
                 break;
            case 'Toys':
                return ['color','size','count','flavor'];
                 break;
            case 'Vehicle':
                return ['color','finish','vehicleYear','engineModel','vehicleMake','vehicleModel'];
                 break;
            case 'Watches':
                return ['color','material','watchBandMaterial','plating','watchStyle'];
                 break;
            default:
                return [];
                break;
        }
    }
     /**
     * Prepare Additional Assets
     * @param Object $productImages
     * @return string|[]
     */
    public function prepareAdditionalAssets($productImages)
    {
        if (count($productImages)>1) 
        {
            $additionalAssets = [
                '_attribute' => [],
            ];
            $count = 0;
            foreach ($productImages as $key=>$image) 
            {
                if($key!=0)
                {
	                $additionalAssets['_value'][$count] = [
	                    'additionalAsset' => [
	                        'assetUrl' =>  $image,
	                    ],
	                ];
	                $count += 1;
                }
            }
            return $additionalAssets;
        }
        return [];
    }


    public function getTestOrder(){
        
        $timestamp = time();
        $data = [
            'elements' => [
                    'order' => 
                        [
                            '0' => 
                                [
                                    'purchaseOrderId' => $timestamp,
                                    'customerOrderId' => $timestamp,
                                    'customerEmailId' => 'amitpandey@cedcoss.com',
                                    'orderDate' => '1478225612000',
                                    'shippingInfo' => [
                                            'phone' => '7618068991',
                                            'estimatedDeliveryDate' => $timestamp,
                                            'estimatedShipDate' => $timestamp,
                                            'methodCode' => 'Standard',
                                            'postalAddress' => 
                                                [
                                                    'name' => 'Test',
                                                    'address1' => '15 Brown ave Ext',
                                                    'address2' => '',
                                                    'city' => 'STAFFORD SPRINGS',
                                                    'state' => 'CT',
                                                    'postalCode' => '06076',
                                                    'country' => 'USA',
                                                    'addressType' => 'RESIDENTIAL'
                                                ]

                                        ],

                                    'orderLines' => [
                                        
                                            'orderLine' => $this->getProducts(),

                                        ]

                                ]

                        ]

                ]

        ];

        //print_r($data);die;
        return $data;
    }

    public function getProducts(){
        $products = [];

        $query = "SELECT * FROM `jet_product` WHERE `merchant_id`=202 and sku='BLUSOFT' LIMIT 0,5";
        $productCollection = Data::sqlRecords($query,"all","select");
        
        $count = 1;
        foreach($productCollection as $product){
            $products[] = [
                                                            'lineNumber' => $count++,
                                                            'item' => [
                                                                    'productName' => $product['title'],
                                                                    'sku' => $product['sku'],
                                                                ],

                                                            'charges' => [
                                                                    'charge' => [
                                                                            '0' => [
                                                                                    'chargeType' => 'PRODUCT',
                                                                                    'chargeName' => 'ItemPrice',
                                                                                    'chargeAmount' => [
                                                                                            'currency' => 'USD',
                                                                                            'amount' => $product['price']
                                                                                        ],

                                                                                    
                                                                                ]

                                                                        ]

                                                                ],

                                                            'orderLineQuantity' => [
                                                                    'unitOfMeasurement' => 'EACH',
                                                                    'amount' => 1
                                                                ],

                                                            'statusDate' => '1478226601000', 
                                                            'orderLineStatuses' => [
                                                                    'orderLineStatus' => [
                                                                            '0' => [
                                                                                    'status' => 'Acknowledged',
                                                                                    'statusQuantity' => [
                                                                                            'unitOfMeasurement' => 'EACH',
                                                                                            'amount' => 1
                                                                                        ],

                                                                                    'cancellationReason' => '',
                                                                                    'trackingInfo' => '',
                                                                                ],

                                                                        ],

                                                                ],

                                                            'refund' => '',
                                                        ];

                
        }
        
        return $products;
        /*
               Array
                                                        (
                                                            'lineNumber' = 1
                                                            'item' = Array
                                                                (
                                                                    'productName' = 'Timberland 6 IN Boot Youth US 6.5 Black Boot',
                                                                    'sku' = '80044',
                                                                )

                                                            'charges' = Array
                                                                (
                                                                    'charge' = Array
                                                                        (
                                                                            '0' = Array
                                                                                (
                                                                                    'chargeType' = 'PRODUCT',
                                                                                    'chargeName' = 'ItemPrice',
                                                                                    'chargeAmount' = Array
                                                                                        (
                                                                                            'currency' = 'USD',
                                                                                            'amount' = '109.99'
                                                                                        )

                                                                                    'tax' = ''
                                                                                )

                                                                        )

                                                                )

                                                            'orderLineQuantity' = Array
                                                                (
                                                                    'unitOfMeasurement' = 'EACH',
                                                                    'amount' = 1
                                                                )

                                                            'statusDate' = '1478226601000', 
                                                            'orderLineStatuses' = Array
                                                                (
                                                                    'orderLineStatus' = Array
                                                                        (
                                                                            '0' = Array
                                                                                (
                                                                                    'status' = 'Acknowledged',
                                                                                    'statusQuantity' = Array
                                                                                        (
                                                                                            'unitOfMeasurement' = 'EACH',
                                                                                            'amount' = 1
                                                                                        )

                                                                                    'cancellationReason' = '',
                                                                                    'trackingInfo' = '',
                                                                                )

                                                                        )

                                                                )

                                                            'refund' = '',
                                                        )
        */
    }
    public static function replaceString($data=[])
    {
        if(is_array($data))
        {
            $string=json_encode($data);
            $string=preg_replace('/(ns\d:)+/','',$string);
            $data=json_decode($string,true);
            return $data;
        }
    }
    
    public function updateinventoryonapp($product){
    	
    	$bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,TOKEN,STOREHASH);
    	$connection=Yii::$app->getDb();
    	$merchant_id = MERCHANT_ID;
    	
    	foreach ($product as $up_app){
    		
    		//echo $up_app['bigproduct_id'];
    		$resource='catalog/products/'.$up_app['bigproduct_id'].'?include=variants,images';
    		$products= $bigcom->get($resource);
    		
		    $products=$products['data'];
    		if($products){
    			
    			//$skuData='products/'.$up_app['bigproduct_id'].'/skus';
    			
    			$sku=$products['variants'];
                
    			if($sku){
	    			foreach ($sku as $sku_up){
	    				$query='UPDATE `jet_product_variants` SET option_qty="'.$sku_up['inventory_level'].'" where product_id="'.$up_app['bigproduct_id'].'" and `merchant_id`="'.$merchant_id.'" and `option_sku`="'.$sku_up['sku'].'"';
	    				$updateResult = $connection->createCommand($query)->execute();
	    			}
    			}
    			//echo $products->inventory_level;
    			
    			$query='UPDATE `jet_product` SET qty="'.$products['inventory_level'].'" where  bigproduct_id="'.$up_app['bigproduct_id'].'" and `merchant_id`="'.$merchant_id.'"';
                $updateResult = $connection->createCommand($query)->execute();
    		}
    	}
    	return 1;
    }

     public function updatepriceonapp($product){
        
        
        $bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,TOKEN,STOREHASH);
        $connection=Yii::$app->getDb();
        $merchant_id = MERCHANT_ID;
        
        
        foreach ($product as $up_app){
            $resource='catalog/products/'.$up_app['bigproduct_id'];
            $products= $bigcom->get($resource);
            $products=$products->data;
            
            if($products){
                //echo $products->inventory_level;
                if($merchant_id==202){
                    $query='UPDATE `jet_product` SET price="'.$products->sale_price.'" where  bigproduct_id="'.$up_app['bigproduct_id'].'" and `merchant_id`="'.$merchant_id.'"';
                    $updateResult = $connection->createCommand($query)->execute();
                }
                else{    
                    $query='UPDATE `jet_product` SET price="'.$products->price.'" where  bigproduct_id="'.$up_app['bigproduct_id'].'" and `merchant_id`="'.$merchant_id.'"';
                    $updateResult = $connection->createCommand($query)->execute();
                }
            }
        }
        return 1;
    }
    public function getItemstatus($sku, $returnField = null, $subUrl = self::GET_ITEMS_SUB_URL)
    {
    	$response = $this->getRequest($subUrl . '/' . $sku);
    	try {
    		$response = json_decode($response,true);
    		if ($returnField && !isset($response['error'])) {
    			return $response['MPItemView'][0]['publishedStatus'];
    		}
    		return $response;
    	}
    	catch(Exception $e){
    		return false;
    	}
    }

    public static function getAdditionalProductAttrsData($additionalAttrs,$key=0)
    {
        $additionalAttrData = [];
        foreach ($additionalAttrs as $additionalAttrKey=>$additionalAttrVal)
        {
            $additionalAttrData[$key]['additionalProductAttribute']['productAttributeName'] = $additionalAttrKey;
            $additionalAttrData[$key]['additionalProductAttribute']['productAttributeValue'] = $additionalAttrVal;
            $key++;
        }
        return $additionalAttrData;
    }
    
    /**
     * remove free shipping from product
     *
     * @return []
     */
    public static function removeFreeShippingData()
    {
    	$shipRegions = ['STREET_48_STATES','PO_BOX_48_STATES','STREET_AK_AND_HI','PO_BOX_AK_AND_HI',
    	'PO_BOX_US_PROTECTORATES','STREET_US_PROTECTORATES'];
    	foreach ($shipRegions as $shipRegionkey=>$shipRegion) {
    		$freeShippingTag['value']['_attribute'] = [];
    		$freeShippingTag['value']['_value'][$shipRegionkey]['shippingOverride']['isShippingAllowed'] = 'false';
    		$freeShippingTag['value']['_value'][$shipRegionkey]['shippingOverride']['shipRegion'] = $shipRegion;
    		$freeShippingTag['value']['_value'][$shipRegionkey]['shippingOverride']['shipMethod'] = 'VALUE';
    		$freeShippingTag['value']['_value'][$shipRegionkey]['shippingOverride']['shipPrice'] = '0.0';
    	}
    	$freeShippingTag['key'] = 'shippingOverrides';
    
    	return $freeShippingTag;
    }
 
     public function retireProduct($sku = null, $subUrl = self::GET_ITEMS_SUB_URL)
    {
        $response = "";
        if ($sku != null) {
            $response = $this->deleteRequest($subUrl . '/' . $sku);

            $response = str_replace('ns2:', "", $response);

            $responseArray = [];
            $responseArray = self::xmlToArray($response);

            return $responseArray;
        }
        return $response;

    }


    public static function getSkuAndIdOverride($sku_override,$id_override)
    {
        $overrides = ['product_id_override','sku_override'];
        $key = 0;
        $overrideTag = [];
        foreach ($overrides as $override_type)
        {
            if(($id_override && $override_type=='product_id_override') || 
                ($sku_override && $override_type=='sku_override'))
            {
                $overrideTag['value']['_attribute'] = [];
                $overrideTag['value']['_value'][$key]['additionalProductAttribute']['productAttributeName'] = $override_type;
                $overrideTag['value']['_value'][$key]['additionalProductAttribute']['productAttributeValue'] = 'true';
                $key++;
            }
        }
        $overrideTag['key'] = 'additionalProductAttributes';

        return $overrideTag;
    }

    /**
     * Update Bulk Promotional Price On Walmart
     * @param string|[] $productIds (comma seperated string of Ids OR array of Ids)
     * @return bool
     */
    public function updateBulkPromotionalPriceOnWalmart($productIds)
    {
        $flag = false;
        $merchant_id = MERCHANT_ID;

        if(is_array($productIds)) {
            $productIds = implode(',', $productIds);
        }

        $query = 'SELECT * FROM `walmart_promotional_price` WHERE `merchant_id`='.$merchant_id.' AND `product_id` IN ('.$productIds.')';
        $result = Data::sqlRecords($query, 'all');

        $promoData = [];
        if($result)
        {
            foreach ($result as $_result) {
                $promoData[$_result['sku']][] = $_result;
            }
        }

        $promoPriceArray = [
            'PriceFeed' => [
                '_attribute' => [
                    'xmlns' => "http://walmart.com/",
                ],
                '_value' => [
                    0 => [
                        'PriceHeader' => [
                            'version' => '1.5.1',
                            //'feedDate' => '2016-04-18T11:46:32.483-07:00'
                        ]
                    ]
                ]
            ]
        ];
        if(count($promoData))
        {
            $PriceIndex = 1;
            foreach ($promoData as $sku => $data) 
            {
                $promoPriceArray['PriceFeed']['_value'][$PriceIndex] = [
                                        'Price' => [
                                            '_attribute' => [],
                                            '_value' => [
                                                'itemIdentifier' => [
                                                    '_attribute' => [],
                                                    '_value' => [
                                                        'sku' => (string)$sku
                                                    ]
                                                ],
                                                'pricingList' => [
                                                    '_attribute' => [
                                                        'replaceAll' => 'false'
                                                    ],
                                                    '_value' =>  []
                                                ]
                                            ]
                                        ]
                                    ];

                $pricingList = [];

                foreach ($data as $key => $value) 
                {
                    $processMode = "UPSERT";
                    if($value['to_delete'])
                        $processMode = "DELETE";

                    $pricingList[$key] = [
                                            'pricing' => [
                                                '_attribute' => [
                                                    'effectiveDate' => $value['effective_date'],
                                                    'expirationDate' => $value['expiration_date'],
                                                    'processMode' => $processMode
                                                ],
                                                '_value' => [
                                                    'currentPrice' => [
                                                        '_attribute' => [],
                                                        '_value' => [
                                                            'value' => [
                                                                '_attribute' => [
                                                                    'amount' => $value['special_price']
                                                                ],
                                                                '_value' => []
                                                            ]
                                                        ]
                                                    ],
                                                    'currentPriceType' => [
                                                        '_attribute' => [],
                                                        '_value' => $value['current_price_type']
                                                    ],
                                                    'comparisonPrice' => [
                                                        '_attribute' => [],
                                                        '_value' => [
                                                            'value' => [
                                                                '_attribute' => [
                                                                    'amount' => $value['original_price']
                                                                ],
                                                                '_value' => []
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ];
                }

                if(count($pricingList)) {
                    if(!$flag)
                        $flag = true;

                    $promoPriceArray['PriceFeed']['_value'][$PriceIndex]['Price']['_value']['pricingList']['_value'] = $pricingList;
                } else {
                    unset($promoPriceArray['PriceFeed']['_value'][$PriceIndex]);
                }
                $PriceIndex++;
            }
        }
        
        if($flag)
        {
            if(!file_exists(\Yii::getAlias('@webroot').'/var/product/bulkpromoprice/xml/'.MERCHANT_ID)) {
                mkdir(\Yii::getAlias('@webroot').'/var/product/bulkpromoprice/xml/'.MERCHANT_ID,0775, true);
            }

            $fileName = 'PromoPrice-'.time().'.xml';
            $file = Yii::getAlias('@webroot').'/var/product/bulkpromoprice/xml/'.MERCHANT_ID.'/'.$fileName;
            $xml = new Generator();
            $xml->arrayToXml($promoPriceArray)->save($file);

            $response = $this->postRequest(self::UPDATE_BULK_PROMOTIONAL_PRICE_SUB_URL, ['file' => $file]);
            $responseArray =  self::xmlToArray($response);
            
            if(isset($responseArray['FeedAcknowledgement']['feedId']))
            {
                $result = ['success'=>true, 'message'=>'Successfully Updated!!', 'feedId'=>$responseArray['FeedAcknowledgement']['feedId']];
            }
            elseif(isset($responseArray['errors']['error']))
            {
                if(isset($responseArray['errors']['error']['code']) && $responseArray['errors']['error']['code'] == 'UNAUTHORIZED.GMP_GATEWAY_API')
                $result = ['error'=>true, 'message'=>'Invalid Api Details.'];
            }
        }
        else
        {
            $result = ['error'=>true, 'message'=>'No Promotional Price Found in Selected Products.'];
        }
        return $result;
    }

    

    /**
     * Update Promotional Price On Walmart
     * @param string|[] $productIds (comma seperated string of Ids OR array of Ids)
     * @return bool
     */
    public function updatePromotionalPriceOnWalmart($productIds)
    {
        $merchant_id = MERCHANT_ID;

        if(is_array($productIds)) {
            $productIds = implode(',', $productIds);
        }

        $query = 'SELECT * FROM `walmart_promotional_price` WHERE `merchant_id`='.$merchant_id.' AND `product_id` IN ('.$productIds.')';
        $result = Data::sqlRecords($query, 'all');

        if($result)
        {
            $promoData = [];
            foreach ($result as $_result) {
                $promoData[$_result['sku']][] = $_result;
            }
        }

        $promoPriceArray = [];
        if(count($promoData))
        {
            $PriceIndex = 0;
            foreach ($promoData as $sku => $data) 
            {
                $promoPriceArray = [
                                        'Price' => [
                                            '_attribute' => [
                                                'xmlns:' => "http://walmart.com/",
                                            ],
                                            '_value' => [
                                                'itemIdentifier' => [
                                                    '_attribute' => [],
                                                    '_value' => [
                                                        'sku' => (string)$sku
                                                    ]
                                                ],
                                                'pricingList' => [
                                                    '_attribute' => [],
                                                    '_value' =>  []
                                                ]
                                            ]
                                        ]
                                    ];

                $pricingList = [];

                foreach ($data as $key => $value) 
                {
                    $processMode = "UPSERT";
                    if($value['to_delete'])
                        $processMode = "DELETE";

                    $pricingList[$key] = [
                                            'pricing' => [
                                                '_attribute' => [
                                                    'effectiveDate' => $value['effective_date'],
                                                    'expirationDate' => $value['expiration_date'],
                                                    'processMode' => $processMode
                                                ],
                                                '_value' => [
                                                    'currentPrice' => [
                                                        '_attribute' => [],
                                                        '_value' => [
                                                            'value' => [
                                                                '_attribute' => [
                                                                    'amount' => $value['special_price']
                                                                ],
                                                                '_value' => []
                                                            ]
                                                        ]
                                                    ],
                                                    'currentPriceType' => [
                                                        '_attribute' => [],
                                                        '_value' => $value['current_price_type']
                                                    ],
                                                    'comparisonPrice' => [
                                                        '_attribute' => [],
                                                        '_value' => [
                                                            'value' => [
                                                                '_attribute' => [
                                                                    'amount' => $value['original_price']
                                                                ],
                                                                '_value' => []
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ];
                }

                $promoPriceArray['Price']['_value']['pricingList']['_value'] = $pricingList;

                if(count($pricingList))
                {
                    if(!file_exists(\Yii::getAlias('@webroot').'/var/product/promoprice/xml/'.MERCHANT_ID)) {
                        mkdir(\Yii::getAlias('@webroot').'/var/product/promoprice/xml/'.MERCHANT_ID,0775, true);
                    }

                    $fileName = $sku.'.xml';
                    $file = Yii::getAlias('@webroot').'/var/product/promoprice/xml/'.MERCHANT_ID.'/'.$fileName;
                    $xml = new Generator();
                    $xml->arrayToXml($promoPriceArray)->save($file);


                    $response = $this->putRequest(self::UPDATE_PROMOTIONAL_PRICE_SUB_URL, ['file' => $file]);
                    $responseArray =  self::xmlToArray($response);
                    
                    var_dump($responseArray);//remove
                    print_r($responseArray);//remove

                    if(isset($responseArray['FeedAcknowledgement']['feedId']))
                    {
                        $result = ['success'=>true, 'message'=>'Successfully Updated!!', 'feedId'=>$responseArray['FeedAcknowledgement']['feedId']];
                    }
                    elseif(isset($responseArray['errors']['error']))
                    {
                        if(isset($responseArray['errors']['error']['code']) && $responseArray['errors']['error']['code'] == 'UNAUTHORIZED.GMP_GATEWAY_API')
                        $result = ['error'=>true, 'message'=>'Unauthorized'];
                    }
                }
            }
        }
        die('updatePromotionalPriceOnWalmart');//remove
    }

   public function underTrial($merchant_id){
        $trialdetail=WalmartExtensionDetail::find()->where(['merchant_id'=>$merchant_id])->one();
        $status=$trialdetail->status;
        $app_status=$trialdetail->app_status;

        if($status=='Not Purchase' && $app_status=='install' && $merchant_id!=345 && $merchant_id!=333){
            $totalproduct=WalmartProduct::find()->where(['merchant_id'=>$merchant_id])->all();
            $totalproduct=count($totalproduct);


            $percentproduct=$totalproduct*(10/100);
            $trialdetail=WalmartProduct::find()->where(['merchant_id'=>$merchant_id])->andFilterWhere(['or',
            ['like','status','PUBLISHED'],
            ['like','status','Items Processing']])->all();

            /**total uploaded product*/
            $product=count($trialdetail);

            if($product<$percentproduct){
                $data=array('not_purchase','1');
                return $data;
            }
            else{
                $data=array('not_purchase','0');
                return $data;
            }
        }
        else{
            return "purchase";
        }
    }

    public function updateWalmartinventory($product = [])
    {
        $merchant_id = MERCHANT_ID;
        $inventoryArray = [
            'InventoryFeed' => [
                '_attribute' => [
                    'xmlns' => "http://walmart.com/",
                ],
                '_value' => [
                    0 => ['InventoryHeader' => [
                        'version' => '1.4',
                    ],
                    ],
                ]
            ]
        ];
        $timeStamp = (string)time();
        $isInvFeed = 0;
        $key = 0;
        if (is_array($product) && count($product) > 0) {
            //check product available on walmart
            $response = $this->getItem($product['sku']);
            if (is_array($response) && count($response)) {
                self::saveStatus($product['id'], $response);
            }
            $isInvFeed++;

            $key += 1;
            $inventoryArray['InventoryFeed']['_value'][$key] = [
                'inventory' => [
                    'sku' => $product['sku'],
                    'quantity' => [
                        'unit' => 'EACH',
                        'amount' => $product['qty'],
                    ],
                    'fulfillmentLagTime' => isset($product['fulfillment_lag_time']) ? $product['fulfillment_lag_time'] : '1',
                ]
            ];
        }

        if (count($product) > 0 && $isInvFeed > 0) {

            if (!file_exists(\Yii::getAlias('@webroot') . '/var/product/xml/' . MERCHANT_ID . '/updateinventory')) {
                mkdir(\Yii::getAlias('@webroot') . '/var/product/xml/' . MERCHANT_ID . '/updateinventory', 0775, true);
            }
            $file = Yii::getAlias('@webroot') . '/var/product/xml/' . MERCHANT_ID . '/updateinventory/MPProduct-' . time() . '.xml';
            $xml = new Generator();
            $xml->arrayToXml($inventoryArray)->save($file);

            $response = $this->postRequest(self::GET_FEEDS_INVENTORY_SUB_URL, ['file' => $file]);
            $responseArray = self::xmlToArray($response);
            
            if (isset($responseArray['FeedAcknowledgement'])) {

                $result = $this->getInventory($product['sku']);

                if (isset($result['quantity']['amount']) && $result['quantity']['amount'] == $product['qty']) {
                    return ['success' => true, 'message' => 'successfully updated'];
                } elseif (isset($result['error'][0]['description']) && $result['error'][0]['description']) {
                    return ['errors' => $result['error'][0]['description']];
                } else {
                    return ['errors' => 'something went wrong'];
                }

            } elseif (isset($responseArray['errors'])) {
                return ['errors' => $responseArray['errors']];
            }
            
            //print_r($responseArray);die;
            //return $responseArray;
        }
    }
    
    public function updateWalmartprice($product = [])
    {
    	$timeStamp = (string)time();
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
    	$isPriceFeed = 0;
    	$key = 0;
    
    	if (is_array($product) && count($product) > 0) {
    
    		$isPriceFeed++;
    
    		$key += 1;
    		$priceArray['PriceFeed']['_value'][$key] = [
    		'Price' => [
    		'itemIdentifier' => [
    		'sku' => $product['sku']
    		],
    		'pricingList' => [
    		'pricing' => [
    		'currentPrice' => [
    		'value' => [
    		'_attribute' => [
    		'currency' => CURRENCY,
    		'amount' => $product['price']
    		],
    		'_value' => [
    
    		]
    		]
    		],
    		'currentPriceType' => 'BASE',
    		'comparisonPrice' => [
    		'value' => [
    		'_attribute' => [
    		'currency' => CURRENCY,
    		'amount' => $product['price']
    		],
    		'_value' => [
    
    		]
    		]
    		],
    		]
    		]
    		]
    		];
    
    	}
    	if ($isPriceFeed > 0) {
    		if (!file_exists(\Yii::getAlias('@webroot') . '/var/product/xml/' . MERCHANT_ID . '/updateprice')) {
    			mkdir(\Yii::getAlias('@webroot') . '/var/product/xml/' . MERCHANT_ID . '/updateprice', 0775, true);
    		}
    		$file = Yii::getAlias('@webroot') . '/var/product/xml/' . MERCHANT_ID . '/updateprice/MPProduct-' . time() . '.xml';
    		$xml = new Generator();
    
    		$xml->arrayToXml($priceArray)->save($file);
    		$response = $this->postRequest(self::GET_FEEDS_PRICE_SUB_URL, ['file' => $file]);
    		$responseArray = self::xmlToArray($response);
    		if (isset($responseArray['FeedAcknowledgement'])) {
    
    			/*$result = $this->getItem($product['sku']);
    			 if (isset($result['MPItemView'][0]['price']['amount']) && $result['MPItemView'][0]['price']['amount'] == $product['price']) {
    			return ['success' => true, 'message' => 'successfully updated'];
    			} elseif (isset($result['error'][0]['description']) && $result['error'][0]['description']) {
    			return ['errors' => $result['error'][0]['description']];
    			} else {
    			return ['errors' => 'something went wrong'];
    			}*/
    			return ['success' => true, 'message' => 'Price Feeds is successfully submitted on walmart'];
    
    
    		} elseif (isset($responseArray['errors'])) {
    			return ['errors' => $responseArray['errors']];
    		}
    		//return $responseArray;
    	}
    }
    
}
