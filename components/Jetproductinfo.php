<?php 
namespace frontend\modules\tophatter\components;

use Yii;
use yii\base\Component;
use frontend\modules\tophatter\components\Jetappdetails;
use frontend\modules\tophatter\models\JetBigcommerceBrand;
use frontend\modules\tophatter\models\JetBigcommerceCategory;
use frontend\modules\tophatter\models\TophatterProduct as TophatterProductModel;

class Jetproductinfo extends component
{
	const PRODUCT_STATUS_NOT_UPLOADED="Not Uploaded";
    /*Product Upadte using configuration*/
      // Update Product details
    public static function updateDetails($value=[],$sync=[],$merchant_id,$bigcom,$webhook = false)
    {
        try
        {
           
            $archiveSKU = [];  
            $product_id = $value['id'];

            $count=0;
            $response=[];

            if($value['categories'][0]=="")
            {
                //save product info in product_import_error table
                self::insertImportErrorProduct($value['id'],$value['name'],'product_type',$merchant_id);
                $response['error']="product_type";
                return $response;
            }
            else
            {
            	$category_id=$bigcom->call('GET','catalog/categories/'.$value['categories'][0]);
            	$categoryname=$category_id['data']['name'];
                $categoryname=preg_replace('/\s+/', '', $categoryname);
            }
            

            $brandname="";
            $brandId=$value['brand_id'];

            if($brandId)
       		{
       			$brand_id=$bigcom->call('GET','catalog/brands/'.$brandId);
            	$brandname=$brand_id['data']['name'];
       		}
            //check if product is not exits in database
            $result = Data::sqlRecords("SELECT title,sku,type,ASIN,description,variant_id,image,qty,price,weight,bigcom_attr,upc,jet_browse_node,status,product_type FROM `jet_product` WHERE merchant_id='".$merchant_id."' AND bigproduct_id='".$product_id."' LIMIT 0,1", "one", "select");
            $resultDetails = Data::sqlRecords("SELECT product_title,long_description,product_price FROM `tophatter_product` WHERE product_id='".$product_id."' LIMIT 0,1", "one", "select");
            
            if (!$result)
            {
                $import_option = Data::getConfigValue($merchant_id,'import_product_option');
                self::saveNewRecords($value, $merchant_id, $connection = false,$import_option,$bigcom);
                $count++;
                return $count;
            }
            //$vendor = addslashes($value['vendor']);
            //$product_type = isset($value['product_type'])?$value['product_type']:"";
            $title = addslashes($value['name']);
            $description = addslashes(utf8_encode(preg_replace("/<script.*?\/script>/", "", $value['description'])? : $value['description']));
            $attr_ids="";
            $product_weight = 0.00;
            $status = self::PRODUCT_STATUS_NOT_UPLOADED;
            $isTitleChanged=false;
            $isImageChanged=false;
            $isDescriptionChanged=false;
            $isVariantAttributeChanged=false;
            $updateTitleDetails=false;
            $updateDescriptionDetails=false;
            $updatePriceDetails=false;
   
            if($result['title'] != $title && isset($sync['sync-fields']['title'])){
                $isTitleChanged=true;
            }
            if($result['description'] != $description && isset($sync['sync-fields']['description']))
            {         

                $isDescriptionChanged=true;              
            }

            /* save variants start */
            $variants = $value['variants'];
            $skus=[];
            $inventoryData=[];
            $priceData=[];
            $updateChanges=false;
            $skus=[];
            $variant_ids=[];
            if (is_array($variants))
            {
            	$optionAttr=false;
                foreach ($variants as $variant)
                {
                    $updateProduct = $updateProductDetails = $updateProductVariant = $updateTophatterProductVariant = "";
                    /*if($variant['sku'] == "" || !self::validateSku($variant['sku'],$product_id,$merchant_id) || in_array($variant['sku'], $skus))
                    {
                        continue;
                    }*/
                    
                    $skus[] = $variant['sku'];
                    $variant_ids[]=$variant['id'];
                    $option_id = $variant['id'];
                    $option_sku = addslashes($variant['sku']);
                    $option_image = '';
                    $option_weight = $option_price = 0.00;
                    $option_price = (float)$variant['price'];
                    if(!$option_price)
                    	$option_price = (float)$variant['calculated_price'];

                    $sale_price = Data::getConfigValue($merchant_id,'sale_price');
                    if($sale_price==1){
                        if($value['sale_price']){
                            $option_price=$value['sale_price'];
                        }
                    }

                    $parent_option_qty=($variant['inventory_level']==0 && $value['inventory_level']>0)?$value['inventory_level']:$variant['inventory_level'];
           			$option_qty=$variant['inventory_level'];
                    $option_weight=isset($variant['weight'])?$variant['weight']:$variant['calculated_weight'];

                    $option_image = addslashes($variant['image_url']);
                    $option_set=$variant['option_values'];
                    $option_title = isset($option_set[0]['label'])?$option_set[0]['label']:'';
					$option_option2 = isset($option_set[1]['label'])?$option_set[1]['label']:'';
					$option_option3 = isset($option_set[2]['label'])?$option_set[2]['label']:'';
					if($option_option2){
						$option_title.=' / '.$option_option2;
					}

					if($option_option3){
						$option_title.=' / '.$option_option3;
					}

					$option_title=addslashes($option_title);
                    $barcode=strlen($variant['upc'])!=10 && $variant['upc']!='' ?$variant['upc']:$variant['gtin'];
             		//$barcode=$variant['upc']?$variant['upc']:$variant['gtin'];

                    //$asin=strlen($barcode)==10 && ctype_alnum ($barcode)?$barcode:"";
                    $option_barcode=self::validateBarcode($barcode)?$barcode:"";

                    $variant_option1 = isset($option_set[0]['label'])?addslashes($option_set[0]['label']):'';
					$variant_option2 = isset($option_set[1]['label'])?addslashes($option_set[1]['label']):'';
					$variant_option3 = isset($option_set[2]['label'])?addslashes($option_set[2]['label']):'';
					$attr_id="";

					if(!$optionAttr && count($option_set)>0)
                    {
                    	$optionAttr=true;
                    	$arr_option_list=[];
                    	foreach ($option_set as $option_val) 
                    	{
                    		$arr_option_list[$option_val['option_id']]=$option_val['option_display_name'];
                    	}
                    	$attr_id=json_encode($arr_option_list);
                    }

                    //save data in `jet_product_variants`
                    $resulVar = Data::sqlRecords("SELECT option_title,option_sku,option_image,option_qty,option_weight,option_price,option_unique_id,asin,variant_option1,variant_option2,variant_option3 FROM `jet_product_variants` WHERE merchant_id='".$merchant_id."' AND option_id='".$option_id."' LIMIT 0,1", "one", "select");
                    $walresult = Data::sqlRecords("SELECT * FROM `tophatter_product_variants` WHERE  merchant_id='".$merchant_id."' AND option_id='".$option_id."' LIMIT 0,1", 'one', 'select');

                    $isVariantExist=false;
                    $isMainProduct=false;
                    
                    if (!$resulVar)
                    {
                        if(count($variants)>1)
                        {
                            $sql = "INSERT INTO `jet_product_variants`(`option_id`, `product_id`, `merchant_id`, `option_title`, `option_sku`,`option_image`, `option_qty`, `option_weight`, `option_price`, `option_unique_id`,`variant_option1`, `variant_option2`, `variant_option3`, `asin`) VALUES ({$option_id},{$product_id},{$merchant_id},'{$option_title}','{$option_sku}','".$option_image."','{$option_qty}','".(float)$option_weight."','".(float)$option_price."','{$option_barcode}','{$variant_option1}','{$variant_option2}','{$variant_option3}','')";
                            Data::sqlRecords($sql, null, "insert");
                            $updateChanges=true;

                            $tophatterresulVar = Data::sqlRecords("SELECT option_id FROM `tophatter_product_variants` WHERE merchant_id='".$merchant_id."' AND option_id='".$option_id."' LIMIT 0,1", "one", "select");

                            if(!$tophatterresulVar){
                                $sql1 = "INSERT INTO `tophatter_product_variants`(
                                                    `option_id`,`product_id`,`merchant_id`,`status`,`new_variant_option_1`,`new_variant_option_2`,`new_variant_option_3`
                                        )

                                        VALUES('".$option_id."','".$product_id."','".$merchant_id."','".self::PRODUCT_STATUS_NOT_UPLOADED."','".addslashes($variant_option1)."','".addslashes($variant_option2)."','".addslashes($variant_option3)."')";
                                Data::sqlRecords($sql1, null, "insert");
                            }
                        }
                        
                        $isMainProduct=true;
                        if($result['sku'] != $option_sku && isset($sync['sync-fields']['sku']))
                        {    
                            $archiveSKU[]=$result['sku'];

                            if($result['variant_id']==$option_id){
                                $updateProduct.= "`sku`='".$option_sku."',"; 
                                /*if(count($variants)==1){

                                     $updateProduct.= "`sku`='".$value['sku']."',";    
                                }
                                else{
                                     $updateProduct.= "`sku`='".$option_sku."',";    
                                }*/
                            }
                           
                            $updateProduct.= "`status`='".self::PRODUCT_STATUS_NOT_UPLOADED."',";    
                            
                        }             
                        if($result['qty'] != $option_qty && isset($sync['sync-fields']['inventory']))
                        {  
                            if($result['variant_id']==$option_id){            
                                $inventoryData[$option_id] =["inventory"=> (int)$option_qty,"sku"=>$option_sku,"merchant_id"=>$merchant_id];
                                $updateProduct.= "`qty`='".(int)$option_qty."',";
                            }      
                        }

                        if(isset($sync['sync-fields']['parent_inventory']))
                        {   
                            if($result['variant_id']==$option_id){            
                                $inventoryData[$option_id] =["inventory"=> (int)$parent_option_qty,"sku"=>$option_sku,"merchant_id"=>$merchant_id];
                                $updateProduct.= "`qty`='".(int)$option_qty."',";
                            }      
                        }

                        if(round($result['weight'],2) != round($option_weight,2) && isset($sync['sync-fields']['weight']))
                        {
                            if($result['variant_id']==$option_id){
                                $updateProduct.= "`weight`='".(float)$option_weight."',";   
                            } 
                        }
                        if($result['price'] != $option_price && isset($sync['sync-fields']['price']))
                        {
                            if(MERCHANT_ID!=434){
                                if($result['variant_id']==$option_id){
                                	$isRepricingEnabled=false;
                                    //$isRepricingEnabled = tophatterRepricing::isRepricingEnabled($option_sku);
                                    if(!$isRepricingEnabled){ 
                                        $priceData[$option_id] =["product_id"=>$product_id,"price"=> (float)$option_price,"sku"=>$option_sku,"merchant_id"=>$merchant_id];
                                    }
                                    $sale_price = Data::getConfigValue($merchant_id,'sale_price');
                                   
                                    if(count($variants)==1){
                                        $updateProduct.= "`price`='".(float)$value['price']."',"; 
                                    }
                                    else{
                                         $updateProduct.= "`price`='".(float)$option_price."',"; 
                                    }
                                    
                                }
                            }
                           
                            /*if(isset($resultDetails['product_price']) && $resultDetails['product_price'])*/
                                $updateProductDetails.= "`product_price`='".(float)$option_price."',";  
                        }
                        if(($option_barcode || $value['upc'])&& $result['upc'] != $option_barcode && isset($sync['sync-fields']['upc']))
                        {
                            if(MERCHANT_ID!=434){
                                if($result['variant_id']==$option_id){
                                     if(count($variants)==1)
                                        $updateProduct.= "`upc`='".$value['upc']."',";  
                                     else
                                        $updateProduct.= "`upc`='".$option_barcode."',"; 
                                }   
                            }
                        }
                        if($result['image'] != $option_image && isset($sync['sync-fields']['image']))
                        {
                            
                            if($result['variant_id']==$option_id){
                                if($isMainProduct)
                                {
                                    if(!$option_image){
                                        foreach ($value['images'] as $key => $val) {
                                           if($val['is_thumbnail']==1){
                                                 $option_image=$val['url_zoom'];
                                           }
                                        }
                                    }
                                    $updateProduct.= "`image`='".$option_image."',";    
                                }
                                else{
                                    $updateProduct.= "`image`='".$option_image."',";    
                                }
                            }
                        }
                    }
                    else
                    {
                        if($result['variant_id']==$option_id)
                        {
                            $isMainProduct=true;
                        }
                        /*if($resulVar['option_sku'] != $option_sku && isset($sync['sync-fields']['sku']))
                        {    
                            $archiveSKU[]=$result['sku'];
                            if($isMainProduct){
                                $updateProduct.= "`sku`='".$option_sku."',";    
                                $updateProduct.= "`status`='".self::PRODUCT_STATUS_NOT_UPLOADED."',"; 
                                $updateProductDetails.= "`status`='".self::PRODUCT_STATUS_NOT_UPLOADED."',";   
                            }
                            $updateProductVariant.= "`option_sku`='".$option_sku."',";
                            $updateProductVariant.= "`status`='".self::PRODUCT_STATUS_NOT_UPLOADED."',";  
                            $updatetophatterProductVariant.= "`status`='".self::PRODUCT_STATUS_NOT_UPLOADED."',"; 
                        }  */            
                        if($resulVar['option_qty'] != $option_qty && isset($sync['sync-fields']['inventory']))
                        {               
                            $inventoryData[$option_id] =["inventory"=> (int)$option_qty,"sku"=>$option_sku,"merchant_id"=>$merchant_id];
                            if($isMainProduct)
                                $updateProduct.= "`qty`='".(int)$option_qty."',";    
                            $updateProductVariant.= "`option_qty`='".(int)$option_qty."',";   
                        }

                        if(isset($sync['sync-fields']['parent_inventory']))
                        {   
                                     
                            $inventoryData[$option_id] =["inventory"=> (int)$parent_option_qty,"sku"=>$option_sku,"merchant_id"=>$merchant_id];
                            $updateProduct.= "`qty`='".(int)$option_qty."',";
                                 
                        }

                        if(round($resulVar['option_weight'],2) != round($option_weight,2) && isset($sync['sync-fields']['weight']))
                        {
                            if($isMainProduct)
                                $updateProduct.= "`weight`='".(float)$option_weight."',";    
                            $updateProductVariant.= "`option_weight`='".(float)$option_weight."',"; 
                        }
                        if($resulVar['option_price'] != $option_price && isset($sync['sync-fields']['price']))
                        {
                        	$isRepricingEnabled=false;
                            //$isRepricingEnabled = tophatterRepricing::isRepricingEnabled($option_sku);
                            if(!$isRepricingEnabled){
                                $priceData[$option_id] =["product_id"=>$product_id,"price"=> (float)$option_price,"sku"=>$option_sku,"merchant_id"=>$merchant_id];
                            }
                            if($isMainProduct)
                            {
                                $sale_price = Data::getConfigValue($merchant_id,'sale_price');
                                if($sale_price==1){
                                    if($value['sale_price']){
                                        $option_price=$value['sale_price'];
                                    }
                                }
                                $updateProduct.= "`price`='".(float)$option_price."',";   
                                /*if(isset($resultDetails['product_price']) && $resultDetails['product_price'])*/
                                    $updateProductDetails.= "`product_price`='".(float)$option_price."',";  
                            }
                            $updateProductVariant.= "`option_price`='".(float)$option_price."',";
                           /* if($walresult['option_prices'])*/
                                $updateTophatterProductVariant.= "`option_prices`='".(float)$option_price."',"; 
                            
                        }
                        if($option_barcode && $resulVar['option_unique_id'] != $option_barcode && isset($sync['sync-fields']['upc']))
                        {
                            if($isMainProduct)
                                $updateProduct.= "`upc`='".$option_barcode."',";    
                            $updateProductVariant.= "`option_unique_id`='".$option_barcode."',"; 
                        }

                        if($resulVar['option_title'] != $option_title && isset($sync['sync-fields']['title']))
                        {
                            $updateProductVariant.= "`option_title`='".$option_title."',"; 
                        }

                        if($resulVar['option_image'] != $option_image && isset($sync['sync-fields']['image']))
                        {
                        	if($isMainProduct)
                            {
                                if(!$option_image){
                                    foreach ($value['images'] as $key => $val) {
                                       if($val['is_thumbnail']==1){
                                             $option_image=$val['url_zoom'];
                                       }
                                    }
                                }
                            	$updateProduct.= "`image`='".$option_image."',";    
                            }
                            $updateProductVariant.= "`option_image`='".$option_image."',";
                        }
                        if($resulVar['variant_option1'] != $variant_option1 && isset($sync['sync-fields']['variant_options']))
                        {
                            $updateProductVariant.= "`variant_option1`='".$variant_option1."',";
                            $updateTophatterProductVariant.= "`new_variant_option_1`='".$variant_option1."',";
                        }
                        if($resulVar['variant_option2'] != $variant_option2 && isset($sync['sync-fields']['variant_options']))
                        {
                            $updateProductVariant.= "`variant_option2`='".$variant_option2."',";
                            $updateTophatterProductVariant.= "`new_variant_option_2`='".$variant_option2."',";
                        }
                        if($resulVar['variant_option3'] != $variant_option3 && isset($sync['sync-fields']['variant_options']))
                        {
                            $updateProductVariant.= "`variant_option3`='".$variant_option3."',";
                            $updateTophatterProductVariant.= "`new_variant_option_3`='".$variant_option3."',";
                        }
                    }
                    

                    if($isMainProduct)
                    {
                        if($isTitleChanged)
                        {
                            /*$updateProduct.= "`title`='".$title."',";
                            if(isset($resultDetails['product_title']) && $resultDetails['product_title'])*/
                                $updateProductDetails.= "`product_title`='".$title."',";
                        }
                        if($isDescriptionChanged)
                        {     
                            $updateProduct.= "`description`='".$description."',";   
                            if(isset($resultDetails['long_description']) && $resultDetails['long_description'])
                                $updateProductDetails.= "`long_description`='".$description."',";            
                        }  

                    
                        $category_check=Data::sqlRecords("select * from tophatter_category_map where product_type='".addslashes($categoryname)."' and merchant_id='".$merchant_id."'","one","select");
                        
                       
                        if(!$category_check){
                            $c_check = "INSERT INTO `tophatter_category_map`(
                                                `merchant_id`,`product_type`
                                    )
                                    VALUES('".$merchant_id."','".addslashes($categoryname)."')";
                           Data::sqlRecords($c_check, null, "insert");

                           $updateProduct.= "`product_type`='".addslashes($categoryname)."',"; 

                           $query="UPDATE `tophatter_product` SET product_type='".$categoryname."',category='' WHERE product_id=".$product_id." AND merchant_id=".$merchant_id;
                         
                           Data::sqlRecords($query);
   
                        }
                        else{
                            $updateProduct.= "`product_type`='".addslashes($categoryname)."',"; 

                            $query="UPDATE `tophatter_product` SET product_type='".addslashes($categoryname)."',category='".addslashes($category_check['category_id'])."' WHERE  merchant_id=".$merchant_id." AND product_id=".$product_id;
                         
                            Data::sqlRecords($query);
                        }

                        //$updateProduct.= "`product_type`='".addslashes($categoryname)."',"; 

                        $updateProduct.="`brand`='".addslashes($brandname)."',";
                        //$updateProduct.="`sku`='".addslashes($option_sku)."',";

                        

                       // $updateProduct.= "`upc`='".$option_barcode."',";    


                       /* if($isImageChanged)
                        {
                            $updateProduct.= "`image`='".addslashes($image)."',";    
                        }
                        if($isVariantAttributeChanged)
                        {
                            $updateProduct.= "`bigcom_attr`='".addslashes($attr_id)."',";    
                        }*/
                    }    
                    /*else
	                {
	                	$archiveSKU=self::addNewVariants($value,$product_id,$merchant_id,$bigcom);
	                }*/
	                //delete old variants
	                if(is_array($variant_ids) && count($variant_ids)>1)
	                {
	                	$archiveSKU=self::extraDeleteVariants($product_id,$variant_ids,$merchant_id);
	                }
                   
                    if($updateProduct)
                    {
                        //echo "<br>updateProduct".$updateProduct;
                        $updateChanges=true;
                        $updateProduct=rtrim($updateProduct,',');
                        //echo $updateProduct;
                        $query="UPDATE `jet_product` SET ".$updateProduct." WHERE bigproduct_id=".$product_id." AND merchant_id=".$merchant_id;
                        //echo $query."<hr>";
                        Data::sqlRecords($query);
                    }
                    if($updateProductDetails)
                    {
                        //echo "<br>updateProductDetails".$updateProductDetails;
                        $updateChanges=true;
                        $updateProductDetails=rtrim($updateProductDetails,',');
                        $query="UPDATE `tophatter_product` SET ".$updateProductDetails." WHERE product_id=".$product_id." AND merchant_id=".$merchant_id;
                        //echo $query."<hr>";
                        Data::sqlRecords($query);
                    }
                    if($updateProductVariant)
                    {
                        //echo "<br>updateProductVariant".$updateProductVariant;
                        $updateChanges=true;
                        $updateProductVariant=rtrim($updateProductVariant,',');
                        $query="UPDATE `jet_product_variants` SET ".$updateProductVariant." WHERE option_id=".$option_id." AND merchant_id=".$merchant_id;
                        //echo $query."<hr>";
                        Data::sqlRecords($query);
                    }
                    if($updateTophatterProductVariant)
                    {
                        //echo "<br>updateProductVariant".$updateProductVariant;
                        $updateChanges=true;
                        $updateTophatterProductVariant=rtrim($updateTophatterProductVariant,',');
                        $query="UPDATE `tophatter_product_variants` SET ".$updateTophatterProductVariant." WHERE option_id=".$option_id." AND merchant_id=".$merchant_id;
                        //echo $query."<hr>";
                        Data::sqlRecords($query);
                    }
                    
                }
            }
            //check update changes
            if($updateChanges)
                $count++;
            //check product simple/variants 
            if(is_array($skus) && count($skus)>0)
            {
                if(count($skus)==1 && $result['type']=="variants")
                {
                    Data::sqlRecords("UPDATE `jet_product` SET type='simple' WHERE bigproduct_id=".$product_id." AND merchant_id=".$merchant_id);
                }
                elseif(count($skus)>1 && $result['type']=="simple")
                {
                    Data::sqlRecords("UPDATE `jet_product` SET type='variants' WHERE bigproduct_id=".$product_id." AND merchant_id=".$merchant_id);
                }
            }
            if(is_array($inventoryData) && count($inventoryData)>0)
            {
                //update inventory on jet (done)
                $url = Yii::getAlias('@webjeturl')."/jetwebhook/curlprocessforinventoryupdate?maintenanceprocess=1";
                Data::sendCurlRequest($inventoryData,$url);
                //update inventory on tophatter
                $url = Yii::getAlias('@weburl')."/tophatter-webhook/inventoryupdate?maintenanceprocess=1";
                Data::sendCurlRequest($inventoryData,$url);

            }
            if(is_array($priceData) && count($priceData)>0)
            {
                //update price on jet (done)
                $url = Yii::getAlias('@webjeturl')."/jetwebhook/curlprocessforpriceupdate?maintenanceprocess=1";
                Data::sendCurlRequest($priceData,$url);
                //update price on tophatter
                if($webhook){
                    $url = Yii::getAlias('@weburl')."/tophatter-webhook/priceupdate?maintenanceprocess=1";
                    Data::sendCurlRequest($priceData,$url);
                }
            }
            if(is_array($archiveSKU) && count($archiveSKU)>0)
            {
                //send curl request to archive/retire on jet/tophatter (done)
            	$archive_data=['archiveSku'=>$archiveSKU,'merchant_id'=>$merchant_id];
                if($webhook){
                    $url = Yii::getAlias('@weburl')."/tophatter-webhook/productdelete?maintenanceprocess=1";
                    Data::sendCurlRequest($archive_data,$url);
                }
                $url = Yii::getAlias('@webjeturl')."/jetwebhook/curlprocessfordelete?maintenanceprocess=1";
                Data::sendCurlRequest($archive_data,$url);
            }
            return $count;
        }
        catch(\yii\db\Exception $e)
        {
            Data::createExceptionLog('actionCurlproductcreate',$e->getMessage(),$merchant_id);
            exit(0);
        }
        catch(Exception $e)
        {
            Data::createExceptionLog('actionCurlproductcreate',$e->getMessage(),$merchant_id);
            exit(0);
        }
    }
    
    public static function checkBeforeDataPrepare($product="",$merchant_id="",$connection="")
    {
        $carray=array();
        $carray['success']=false;
        $carray['error']="";
        $Errors=array();
        $cflag=0;
       
        if($merchant_id && $product && trim($product->type))
        {
            if(trim($product->type)=="simple")
            {
                $upc="";
                $asin="";
                $price="";
                $qty="";
                $nodeid="";
                $upc_err=false;
                $mpn_err=false;
                $brand="";
                $sku="";
                $image="";
                $qty=trim($product->qty);
                $image=trim($product->image);
                $countImage=0;
                $imageArr=array();
                $ImageFlag=false;
                $imageArr=explode(',',$image);
                //If all images all broken
                if($image!="" && count($imageArr)>0){
                    foreach ($imageArr as $value){
                        if(self::checkRemoteFile($value)==false)
                            $countImage++;
                    }
                    if(count($imageArr)==$countImage)
                        $ImageFlag=true;
                }
                $price=trim($product->price);
                $upc = trim($product->upc);
                $asin = trim($product->ASIN);
                $mpn = trim($product->mpn);
                $brand=trim($product->vendor);
                $nodeid = $product->fulfillment_node;
                $sku=$product->sku;
                if($sku==''){
                	$Errors['sku_error']="Missing Product Sku,";
                    $Errors['sku']=$product->sku;
                    $cflag++;
                }
                if($upc=='' && $asin=='' && $mpn==''){
                	$Errors['upc_error']="Missing Barcode or ASIN or MPN, ";
                    $Errors['upc']=$product->sku;
                    $cflag++;
                }
                if($brand==''){
                	$Errors['brand_error']="Missing brand,";
                    $Errors['brand']=$product->sku;
                    $cflag++;
                }
                if($nodeid==''){
                	$Errors['node_id_error']="Missing Jet Browse Node,";
                    $Errors['node_id']=$product->sku;
                    $cflag++;
                }
                if($image=='' || $ImageFlag){
                	$Errors['image_error']="Missing or Invalid Image,";
                    $Errors['image']=$product->sku;
                    $cflag++;
                }
                if(($price<=0 || ($price && !is_numeric($price))) || trim($price)==""){
                	$Errors['price_error']="Invalid Price,";
                    $Errors['price']=$product->sku;
                    $cflag++;
                }
                if(($qty && !is_numeric($qty))||trim($qty)==""||($qty<=0 && is_numeric($qty))){
                	$Errors['qty_error']="Invalid Qauntity,";
                    $Errors['qty']=$product->sku;
                    $cflag++;
                }
                //check upc type
                $type="";
                $existUpc=false;
                $existAsin=false;
                $asinFlag=false;
                $existMpn=false;
                //check upc is unique
                
                $type=self::checkUpcType($upc);
                if($type!="")
                    $existUpc=self::checkUpcSimple($upc,$product->id,$connection);
                //check ASIN is unique
                $existAsin=self::checkAsinSimple($asin,$product->id,$connection);
                $existMpn=self::checkMpnSimple($mpn,$product->id,$connection);
                if($upc=="" || (strlen($upc)>0 && $type=="") || (strlen($upc)>0 && $existUpc)){
                	//$Errors['upc_error_info']="Duplicate or Invalid Barcode,";
                    $Errors['upc']=$product->sku;
                    $upc_err=true;
                    //$cflag++;
                }
                
                if(($upc_err && $asin=="") || ($upc_err && strlen($asin)!=10) || ($upc_err && strlen($asin)==10 && !ctype_alnum ($asin)) || ($upc_err && strlen($asin)==10 && ctype_alnum ($asin) && $existAsin)){
                	//$Errors['asin_error_info']="Duplicate or Invalid ASIN,";
                	$Errors['upc']=$product->sku;
                    //$cflag++;
                }
                if($mpn=="" || strlen($mpn)>50 || (strlen($mpn)>50 && $existMpn)){
                    //$Errors['mpn_error']="Invalid Mpn,";
                    $mpn_err=true;
                    $Errors['upc']=$product->sku;
                    //$cflag++;
                }
                if($asin=="" || strlen($asin)!=10 || (strlen($asin)==10 && !ctype_alnum ($asin)) || (strlen($asin)==10 && ctype_alnum ($asin) && $existAsin))
                {
                	$asinFlag=true;
                }
                if(!$asinFlag){
                	$carray['asin_simp']=true;
                }
                if(!$upc_err){
                	$carray['upc_simp']=true;
                }
                if(!$mpn_err){
                    $carray['mpn_simp']=true;
                }
                if($asinFlag && $upc_err && $mpn_err){
                	$Errors['asin_error_info']="Invalid/Missing Barcode or ASIN or MPN, ";
                    $cflag++;
                }
            }
            elseif(trim($product->type)=="variants")
            {
                $brand="";
                $nodeid = "";
                $par_qty=0;
                $par_price="";
                $image="";
                $countImage=0;
                $image=trim($product->image);
                $imageArr=array();
                $ImageFlag=false;
                $imageArr=explode(',',$image);
                //If all images all broken
                if($image!="" && count($imageArr)>0){
                    foreach ($imageArr as $value){
                        if(self::checkRemoteFile($value)==false)
                            $countImage++;
                    }
                    if(count($imageArr)==$countImage)
                        $ImageFlag=true;
                }
                $par_qty=trim($product->qty);
                if($par_qty=="")$par_qty=0;
                $par_price=trim($product->price);
                $c_par_price=false;
                $c_par_qty=false;
                if($par_price<=0 || (trim($par_price) && !is_numeric($par_price)) || trim($par_price)==""){
                    $c_par_price=false;
                }else{
                    $c_par_price=true;
                }
                if((trim($par_qty)<=0 || !is_numeric($par_qty))){
                    $c_par_qty=false;
                }else{
                    $c_par_qty=true;
                }
                $brand=trim($product->vendor);
                if($brand==''){
                	$Errors['brand_error']="Missing brand,";
                    $Errors['brand']=$product->sku;
                    $cflag++;
                }
                $nodeid = $product->fulfillment_node;
                if($nodeid=='')
                {
                	$Errors['node_id_error']="Missing Jet Browse Node,";
                    $Errors['node_id']=$product->sku;
                    $cflag++;
                }
                if($image=="" || $ImageFlag)
                {
                	$Errors['image_error']="Missing or Invalid Image,";
                    $Errors['image']=$product->sku;
                    $cflag++;
                }
                $options=array();
                $queryObj="";
                $queryObj = $connection->createCommand("SELECT `option_id`,`option_sku`,`option_qty`,`option_price`,`option_unique_id`,`asin`,`option_mpn` FROM `jet_product_variants` WHERE product_id='".$product->id."'");
                $options = $queryObj->queryAll();
                //$options=JetProductVariants::find()->where(['merchant_id'=>$merchant_id,'product_id'=>$product->id])->all();
                if(is_array($options) && count($options)>0)
                {
                    foreach($options as $pro)
                    {
                        $upc="";
                        $asin="";
                        $price="";
                        $qty=0;
                        $nodeid="";
                        $opt_sku="";
                        $upc_err=false;
                        $mpn_err=false;
                        $opt_sku=trim($pro['option_sku']);
                        $qty=trim($pro['option_qty']);
                        if($qty=="")$qty=0;
                        $price=trim($pro['option_price']);
                        $upc = trim($pro['option_unique_id']);
                        $asin = trim($pro['asin']);
                        $mpn = trim($pro['option_mpn']);
                        if($opt_sku==""){
                        	$Errors['sku_error_var'][]=$opt_sku;
                        	$Errors['upc']=$product->sku;//$product->sku;//"variant : ".$opt_sku." of product : ".
                        	$cflag++;
                        }
                        if($upc=='' && $asin=='' && $mpn==''){
                        	//$Errors['upc_error']="Missing Variants Barcode Or ASIN";
                        	$Errors['upc_error_var'][]=$opt_sku;
                            $Errors['upc']=$product->sku;//$product->sku;//"variant : ".$opt_sku." of product : ".
                            $cflag++;
                        }
                        if(trim($price) && !is_numeric($price)){
                        	//$Errors['price_error']="Invalid Variants Price";
                        	$Errors['price_error_var'][]=$opt_sku;
                            $Errors['price']=$product->sku;//$product->sku; //"variant : ".$opt_sku." of product : ".
                            $cflag++;
                        }
                        if((!$c_par_price && trim($price)=="") || (!$c_par_price && trim($price)<=0)){
                        	//$Errors['price_error']="Invalid Variants Price";
                        	$Errors['price_error_var'][]=$opt_sku;
                            $Errors['price']=$product->sku;//$product->sku;   //"variant : ".$opt_sku." of product : ".
                            $cflag++;
                        }
                        if(trim($qty)<=0 && !is_numeric($qty)){
                        	$Errors['qty_error_var'][]=$opt_sku;
                        	//$Errors['qty_error']="Invalid Variants Quantity";
                            $Errors['qty']=$product->sku;//$product->sku; //"variant : ".$opt_sku." of product : ".
                            $cflag++;
                        }
                        if(!$c_par_qty && trim($qty)<=0){
                        	$Errors['qty_error_var'][]=$opt_sku;
                        	//$Errors['price_error']="Invalid Variants Price";
                            $Errors['qty']=$product->sku;//$product->sku;//"variant : ".$opt_sku." of product : ".
                            $cflag++;
                        }
                        //check upc type
                        $type="";
                        $existUpc=false;
                        $existAsin=false;
                        $asinFlag=false;
                        $existMpn=false;
                        //check upc is unique
                        $type=self::checkUpcType($upc);
                        $productasparent=0;
                        if($product->sku==$pro['option_sku']){
                            $productasparent=1;
                        }
                        if($type!="")
                            $existUpc=self::checkUpcVariants($upc,$product->id,$pro['option_id'],$productasparent,$connection);
                        //check ASIN is unique
                        $existAsin=self::checkAsinVariants($asin,$product->id,$pro['option_id'],$productasparent,$connection);
                        $existMpn=self::checkMpnVariants($mpn,$product->id,$pro['option_id'],$productasparent,$connection);
                        if($upc=="" || (strlen($upc)>0 && $type=="") || (strlen($upc)>0 && $existUpc)){
                        	//$Errors['upc_error_info']="Duplicate or Invalid Variants Barcode";
                        	//$Errors['upc_error_info_var'][]=$opt_sku;
                        	$Errors['upc']=$product->sku;//$product->sku;//"variant : ".$opt_sku." of product : ".
                            $upc_err=true;
                            //$cflag++;
                        }
                        if($mpn=="" || strlen($mpn)>50 || (strlen($mpn)>50 && $existMpn)){
                        	//$Errors['mpn_error']="Invalid Variants Mpn";
                        	//$Errors['mpn_error_var'][]=$opt_sku;
                            $mpn_err=true;
                            $Errors['upc']=$product->sku;//$product->sku;//"variant : ".$opt_sku." of product : ".
                            //$cflag++;
                            
                        }
                        if(($upc_err && $asin=="") || ($upc_err && strlen($asin)!=10) || ($upc_err && strlen($asin)==10 && !ctype_alnum ($asin)) || ($upc_err && strlen($asin)==10 && ctype_alnum ($asin) && $existAsin)){
                        	//$Errors['asin_error_info']="Duplicate or Invalid Variants ASIN";
                        	//$Errors['asin_error_info_var'][]=$opt_sku;
                        	$Errors['upc']=$product->sku;//$product->sku;//"variant : ".$opt_sku." of product : ".
                            //$cflag++;
                            $asinFlag=true;
                        }
                        if($asin=="" || strlen($asin)!=10 || (strlen($asin)==10 && !ctype_alnum ($asin)) || (strlen($asin)==10 && ctype_alnum ($asin) && $existAsin))
		                {

		                	$asinFlag=true;
		                }
		                if(!$asinFlag){
		                	$carray[$opt_sku]['asin_var']=true;
		                }
		                if(!$upc_err){
		                	$carray[$opt_sku]['upc_var']=true;
		                }
		                if(!$mpn_err){
		                    $carray[$opt_sku]['mpn_var']=true;
		                }
		                if($asinFlag && $upc_err && $mpn_err){
		                	$Errors['asin_error_info_var'][]=$opt_sku;
                            $cflag++;
		                }
                        /*if(!$asinFlag){
                        	$carray[$opt_sku]['asin_var']=true;
                        }
                        if(!$upcFlag){
                        	$carray[$opt_sku]['upc_var']=true;
                        }
                        if($asinFlag && $upcFlag){
                        	$Errors['asin_error_info_var'][]=$opt_sku;
                            $cflag++;
                        }*/
                        $attr_ids="";
                        $jet_mapped="";
                        $attr_ids_arr=array();
                        $jet_mapped_arr=array();
                        $attr_ids=$product->attr_ids;
                        $jet_mapped=$product->jet_attributes;
                        if($attr_ids !=""){
                            $attr_ids_arr=json_decode($attr_ids,true);
                        }
                        if($jet_mapped !=""){
                            $jet_mapped_arr=json_decode($jet_mapped,true);
                        }
                        $acflag=0;
                        if(is_array($attr_ids_arr) && count($attr_ids_arr)>0){
                            if(is_array($jet_mapped_arr) && count($jet_mapped_arr)>0){
                                foreach($attr_ids_arr as $k_a=>$v_a){
                                    if(array_key_exists(trim($v_a),$jet_mapped_arr) && $jet_mapped_arr[$v_a]!=""){
                                        $acflag++;
                                    }
                                }
                                if($acflag==0){
                                	//$Errors['attribute_mapping_error']="Map Variant Options with Jet Attributes";
                                	$Errors['attribute_mapping_error'][]=$opt_sku;
                                    $Errors['attribute_mapping']=$product->sku;//$product->sku;//"variant : ".$opt_sku." of product : ".
                                    $cflag++;
                                }
                            }else{
                            	//$Errors['attribute_mapping_error']="";
                            	$Errors['attribute_mapping_error'][]=$opt_sku;
                                $Errors['attribute_mapping']=$product->sku;//$product->sku;//"variant : ".$opt_sku." of product : ".
                                $cflag++;
                            }
                        }
    
                    }
                }
                 
            }
        }
        if($cflag==0){
            $carray['success']=true;
        }
        $carray['error']=$Errors;
        return $carray;
    }
    public static function getEligibleVariants($product="",$merchant_id="",$options){
            $eligibleVariants=array();
            if(is_array($options) && count($options)>0){
                    $i=0;
                    foreach($options as $val){
                            $attribute="";
                            $option_id="";
                            $option_id=trim($val['option_id']);
                            $attribute=trim($val['jet_option_attributes']);
                            if($i==0){
                                $eligibleVariants[$option_id]=$attribute;
                            }else{
                                if(!in_array($attribute,$eligibleVariants)){
                                    $eligibleVariants[$option_id]=$attribute;
                                }
                            }
                            $i++;
                    }
            }
            return $eligibleVariants;
    }
    public static function checkproductnoattr($product,$merchant_id,$connection)
    {
        $carray=array();
        $carray['success']=false;
        $carray['error']="";
        $Errors=array();
        $cflag=0;
        
        if($product)
        {
            $upc="";
            $asin="";
            $price="";
            $qty="";
            $nodeid="";
            $upc_err=false;
            $mpn_err=false;
            $brand="";
            $sku="";
            $qty=trim($product->qty);
            $price=trim($product->price);
            $upc = trim($product->upc);
            $asin = trim($product->ASIN);
            $mpn = trim($product->mpn);
            $brand=trim($product->vendor);
            $nodeid = $product->fulfillment_node;
            $sku=$product->sku;
            $countImage=0;
            $image=trim($product->image);
            $imageArr=array();
            $ImageFlag=false;
            $imageArr=explode(',',$image);
            //If all images all broken
            if($image!="" && count($imageArr)>0){
                foreach ($imageArr as $value){
                    if(self::checkRemoteFile($value)==false)
                        $countImage++;
                }
                if(count($imageArr)==$countImage)
                    $ImageFlag=true;
            }
       		if($sku==''){
       			$Errors['sku_error']="Missing Product Sku,";
       			$Errors['sku']=$product->sku;
       			$cflag++;
       		}
       		if($upc=='' && $asin=='' && $mpn==''){
       			$Errors['upc_error']="Missing Barcode or ASIN or MPN,";
       			$Errors['upc']=$product->sku;
       			$cflag++;
       		}
       		if($brand==''){
       			$Errors['brand_error']="Missing brand,";
       			$Errors['brand']=$product->sku;
       			$cflag++;
       		}
       		if($nodeid==''){
       			$Errors['node_id_error']="Missing Jet Browse Node,";
       			$Errors['node_id']=$product->sku;
       			$cflag++;
       		}
       		if($image=='' || $ImageFlag){
       			$Errors['image_error']="Missing or Invalid Image,";
       			$Errors['image']=$product->sku;
       			$cflag++;
       		}
       		if(($price<=0 || ($price && !is_numeric($price))) || trim($price)==""){
       			$Errors['price_error']="Invalid Price,";
       			$Errors['price']=$product->sku;
       			$cflag++;
       		}
       		if(($qty && !is_numeric($qty))||trim($qty)==""||($qty<=0 && is_numeric($qty))){
       			$Errors['qty_error']="Invalid Qauntity,";
       			$Errors['qty']=$product->sku;
       			$cflag++;
       		}  	
            //check upc type
            $type="";
            $existUpc=false;
            $existAsin=false;
            $upcFlag=false;
            $asinFlag=false;
            $existMpn=false;
            //check upc is unique
            $type=self::checkUpcType($upc);
            if($type!="")
                $existUpc=self::checkUpcVariantSimple($upc,$product->id,$sku,$connection);
            //check ASIN is unique
            $existAsin=self::checkAsinVariantSimple($asin,$product->id,$sku,$connection);
            $existMpn=self::checkMpnVariantSimple($mpn,$product->id,$sku,$connection);
            if($upc=="" || (strlen($upc)>0 && $type=="") || (strlen($upc)>0 && $existUpc)){
            	//$Errors['upc_error_info']="Duplicate or Invalid Barcode,";
                $Errors['upc']=$product->sku;
                $upc_err=true;
                $upcFlag=true;
                //$cflag++;
            }
            if($mpn=="" || strlen($mpn)>50 || (strlen($mpn)>50 && $existMpn)){
            	//$Errors['mpn_error']="Invalid Mpn,";
                $mpn_err=true;
                $Errors['upc']=$product->sku;
                //$cflag++;
            }
            if(($upc_err && $asin=="") || ($upc_err && strlen($asin)!=10) || ($upc_err && strlen($asin)==10 && !ctype_alnum ($asin)) || ($upc_err && strlen($asin)==10 && ctype_alnum ($asin) && $existAsin)){
            	//$Errors['asin_error_info']="Duplicate or Invalid ASIN,";
            	$Errors['upc']=$product->sku;
                $asinFlag=true;
                //$cflag++;
            }
            if($asin=="" || strlen($asin)!=10 || (strlen($asin)==10 && !ctype_alnum ($asin)) || (strlen($asin)==10 && ctype_alnum ($asin) && $existAsin))
            {
            	$asinFlag=true;
            }
            if(!$asinFlag){
            	$carray['asin_simp']=true;
            }
            if(!$upc_err){
            	$carray['upc_simp']=true;
            }
            if(!$mpn_err){
                $carray['mpn_simp']=true;
            }
            if($asinFlag && $upc_err && $mpn_err){
            	$Errors['asin_error_info']="Duplicate/Invalid Barcode or ASIN,";
                $cflag++;
            }
            /*if(!$asinFlag){
            	$carray['asin_simp']=true;
            }
            if(!$upcFlag){
            	$carray['upc_simp']=true;
            }
            if($asinFlag && $upcFlag){
            	$Errors['asin_error_info']="Duplicate/Invalid Barcode or ASIN,";
                $cflag++;
            }   */
        }  
        if($cflag==0){
            $carray['success']=true;
        }       
        $carray['error']=$Errors;
        return $carray;
    }
    /* public static function checkCategoryAttributeNotExists($category_id="",$merchant_id="")
    {
    	$category_id=trim($category_id);
    	$merchant_id=trim($merchant_id);
    	try{
    		if($category_id && $merchant_id){
    			$connection = Yii::$app->getDb();
    			$merchantCategory = $connection->createCommand("SELECT `jet_attributes` FROM `jet_category` WHERE category_id='".$category_id."'");// AND merchant_id='".$merchant_id."'
    			$result = $merchantCategory->queryOne();
    			if($result['jet_attributes'])
    				return false;
    		}
    		return true;
    	}catch(Exception $e){
    		return true;
    	}
    	 
    } */
	public static function checkCategoryAttributeNotExists($category_id="",$jetHelper=[],$merchant_id="")
	{
	    $response="";
	    $response = $jetHelper->CGetRequest('/taxonomy/nodes/'.$category_id.'/attributes');
	    $attributes=[];
	    $attributes=json_decode($response,true);
	    if($attributes && count($attributes)>0 && isset($attributes['attributes'])){
	        return false;
	    }
	    return true;
	}
    public static function getLeafCategoryId($jetBrowsenode="",$categoryModel="")
    {
    	$result="";
    	$result=$categoryModel->find()->where(['category_id'=>$jetBrowsenode])->one();
    	if($result){
    		if($result->level==1){
    			$resultLeafId="";
    			$resultLeafId=$categoryModel->find()->where(['parent_id'=>$jetBrowsenode,'level'=>2])->one();
    			if($resultLeafId){
    				return $resultLeafId->category_id;
    			}
    		}elseif($result->level==0){
    			$resultRLeafId="";
    			$resultRLeafId=$categoryModel->find()->where(['root_id'=>$jetBrowsenode,'level'=>2])->one();
    			if($resultRLeafId){
    				return $resultRLeafId->category_id;
    			}
    		}
    	}
    	return false;
    }
    public static function checkRemoteFile($url)
    {
    	$headers = get_headers($url);
    	if(substr($headers[0], 9, 3) == '200') {
    		return true;
    	}else{
    		return false;
    	}
    }
    public static function productUpdateData($result,$data,$jetHelper,$fullfillmentnodeid,$merchant_id,$file,$customPrice="",$connection)
    {
    	//$connection=Yii::$app->getDb();
    	$result1_rows=array();
    	$updateInfo=array();
    	$variants_ids=array();
    	$new_variants_ids=array();
    	$availble_variants=array();
    	$archiveSkus=array();
    	$updateProduct=array();
    	$value=$data;
    	//change custom price
   		/*  	
   		if($customPrice){
    		$priceType="";
    		$changePrice=0;
    		$customPricearr=array();
    		$customPricearr = explode('-',$customPrice);
    		$priceType = $customPricearr[0];
    		$changePrice = $customPricearr[1];
    		unset($customPricearr);
    	} */
    	$product_id=$value['id'];
    	$product_title=$value['title'];
    	$vendor=$value['vendor'];
    	$brand=$value['vendor'];
    	$product_type=$value['product_type'];
    	$product_des=$value['body_html'];
    	$product_des=strip_tags($product_des);
    	$variants=$value['variants'];
    	$images=$value['images'];
    	$product_price=$value['variants'][0]['price'];
    	/* if($priceType && $changePrice!=0){
    		$updatePrice=0;
    		$updatePrice=self::priceChange($product_price,$priceType,$changePrice);
    		if($updatePrice!=0)
    			$product_price = $updatePrice;
    	} */
    	$barcode=$value['variants'][0]['barcode'];
    	$weight=0;$unit="";
	    $weight=$value['variants'][0]['weight'];
	    $unit=$value['variants'][0]['weight_unit'];
	    $message="";
	    $message.="\nProduct_id: ".$product_id."\n";
	    
	    if($weight>0)
	    {
	    	$weight=(float)Jetappdetails::convertWeight($weight,$unit);
	    }					
    	$imagArr=array();
    	$product_images="";
    	$variantArr=array();
    	$simpleflag=false;
    	$OldImages=array();
    	$imageChange=false;
    	$OldImages=explode(',',$result->image);
    	if(is_array($images))
    	{
	    	foreach ($images as $valImg)
	    	{
	    		if(!in_array($valImg['src'],$OldImages)){
	    			$imageChange=true;
	    		}
	    		$imagArr[]=$valImg['src'];
	    	}
	    	$product_images=implode(',',$imagArr);
    	}
    	/* if($product_id==4211751366){
    		var_dump($imageChange);
    	echo "<br>".$product_images;} */
    	unset($OldImages);
    	$product_sku="";
    	$product_sku=$value['variants'][0]['sku'];
    	$product_qty=$value['variants'][0]['inventory_quantity'];
    	$variant_id=$value['variants'][0]['id'];
    	if(trim($product_sku)==""){
    		return;
    	}
    	if(count($variants)==1){
    		$simpleflag=true;
    	}
    	if(count($variants)>1)
    	{
    		$options=$value['options'];
    		$attrId=array();
    		$attrValue=array();
    		$attFlag=false;
    		$attrValue=json_decode($result->attr_ids,true);
    		foreach($options as $key=>$val){
    			$attrname=$val['name'];
    			if(is_array($attrValue) && !in_array($attrname, $attrValue))
    			{
    				$attFlag=true;
    			}
    			$attrId[$val['id']]=$val['name'];
    			foreach ($val['values'] as $k => $v) {
    				$option_value[$attrname][$k]=$v;
    			}
    		}
    		if($attFlag){
    			$message.= "wrong attr\n";
    			//update product option label
    			$updateProduct['attr_ids']=json_encode($attrId);
    			//$result->attr_ids=json_encode($attrId);
    			//function to delete/archive product variants create new and update attr_id on parent product
    			$message.=Jetproductinfo::addNewVariants($product_id,$product_sku,$data,$jetHelper,$merchant_id,$connection);
    			return;
    		}
    		$changeParentTitle=false;
    		$changeParentDes=false;
    		$changeParentCat=false;
    		foreach($variants as $value1)
    		{
    			$option_sku="";
    			$option_title="";
    			$option_image_id="";
    			$option_price="";
    			$option_qty="";
    			$option_barcode="";
    			$option_variant1="";
    			$option_variant2="";
    			$option_variant3="";
    			$flagChange=false;
    			$flagskuChange=false;
    			$vskuChangeData=array();
    			$option_weight=0;$option_unit="";
    			$option_weight=$value1['weight'];
    			$option_unit=$value1['weight_unit'];
    			if($option_weight>0)
    			{
    				$option_weight=(float)Jetappdetails::convertWeight($option_weight,$option_unit);
    			}
    			$variantArr[]=$value1['id'];
    			$option_id=$value1['id'];
    			$variants_ids[]=trim($option_id);
    			$option_title=$value1['title'];
    			$option_sku=$value1['sku'];
    			$option_image_id=$value1['image_id'];
    			$option_price=$value1['price'];
    			/* if($priceType && $changePrice!=0){
    				$updatePrice=0;
    				$updatePrice=self::priceChange($option_price,$priceType,$changePrice);
    				if($updatePrice!=0)
    					$option_price = $updatePrice;
    			} */
    			$option_qty=$value1['inventory_quantity'];
    			$option_variant1=$value1['option1'];
    			$option_variant2=$value1['option2'];
    			$option_variant3=$value1['option3'];
    			$option_barcode=$value1['barcode'];
    			$option_image_url='';
    			$vresult="";
    			$vupdateProduct=array();
    			$imageFlag=false;
    			$vresult=(object)$connection->createCommand('SELECT option_id,option_title,option_sku,jet_option_attributes,option_image,option_qty,option_weight,option_price,option_unique_id,variant_option1,variant_option2,variant_option3,vendor from `jet_product_variants` where option_id="'.$option_id.'"')->queryOne();
    			if(is_array($images))
    			{
	    			foreach ($images as $value2){
	    				if($value2['id']== $option_image_id){
	    					$option_image_url=$value2['src'];
	    					$imageFlag=true;
	    					break;
	    				}
	    			}
    			}
    			if(is_object($vresult) && isset($vresult->option_id))
    			{
    				if($result->type=="simple"){
    					$updateProduct['type']="variants";
    					$updateProduct['attr_ids']=json_encode($attrId);
    					//$result->type="variants";
    				}
    				if($option_sku!="" && $vresult->option_sku!=$option_sku)
    				{
    					if($result->sku==$vresult->option_sku || $result->variant_id==$vresult->option_id)
    					{   $message.= "add new sku:-".$product_sku."\n";
    						//delete product as well as all variants and add new product and archive and upload product with new relation
    						$message.=Jetproductinfo::addNewVariants($product_id,$product_sku,$data,$jetHelper,$merchant_id,$connection);
    						return;
    					}
    					else{
    						//archive variant option and add new variantion with updated children skus
    						$message.= "update variant sku:-".$option_sku."\n";
    						$archiveSkus[]=$vresult->option_sku;
    						$flagskuChange=true;
    						//$vresult->option_sku=$option_sku;
    						$vupdateProduct['option_sku']=$option_sku;
    					}
    				}
    				if($option_title!="" && $vresult->option_title!=$option_title)
    				{	
    					//$vresult->option_title=$option_title;
    					$vupdateProduct['option_title']=$option_title;
    					if($option_sku!=$product_sku)
    					{
    						$message.= "update child var title :-".$option_sku."\n";
    						$flagChange=true;
    						$vskuChangeData['title']=$product_title.'-'.$option_title;
    					}
    				}
    				if($product_title!="" && $product_title!=$result->title)
    				{
    					$changeParentTitle=true;
    					$updateProduct['title']=$product_title;
    					//$result->title=$product_title;
    				}
    				if($changeParentTitle){
    					$message.= "update parent var title :-".$option_sku."\n";
    					$flagChange=true;
    					if($option_sku==$product_sku)
    					{
    						$vskuChangeData['title']=$product_title;
    					}
    					else
    					{
    						$vskuChangeData['title']=$product_title.'-'.$option_title;
    					}
    				}
    				$result->description=strip_tags($result->description);
    				if($result->description!=$product_des)
    				{
    					$changeParentDes=true;
    					$updateProduct['description']=$product_des;
    					//$result->description=$product_des;
    				}
    				if($changeParentDes){
    					$flagChange=true;
    					$message.= "change sku var des:-".$product_sku."\n";
    					$vskuChangeData['description']=$product_des;
    				}
    				if($result->product_type!=$product_type && !$changeParentCat){
    					//$result->product_type = $product_type;
    					$updateProduct['product_type']=$product_type;
    					$modelmap=array();
    					$modelmap=$connection->createCommand('SELECT category_id from `jet_category_map` where merchant_id="'.$merchant_id.'" and product_type="'.addslashes($product_type).'"')->queryOne();
    					//$modelmap = JetCategoryMap::find()->where(['merchant_id'=>$merchant_id,'product_type'=>$product_type])->one();
    					if(is_array($modelmap) && count($modelmap)>0){
    						if($modelmap['category_id']!=$result->fulfillment_node){
    							$message.="change product category in\n";
    							$updateProduct['fulfillment_node']=$modelmap['category_id'];
    							//$result->fulfillment_node = $modelmap['category_id'];
    							$changeParentCat=true;
    						}
    					}else{
    						//insert new product-type
    						$sql='INSERT INTO `jet_category_map`(`merchant_id`,`product_type`)VALUES("'.$merchant_id.'","'.addslashes($product_type).'")';
    						$connection->createCommand($sql)->execute();
    					}
    					unset($modelmap);
    				}
    				if($changeParentCat){
    					$flagChange=true;
    					$message.= "change variant category data\n".$product_sku."\n";
    					$vskuChangeData['category']=$modelmap['category_id'];
    				}
    				if($option_barcode!="" && $vresult->option_unique_id!=$option_barcode)
    				{
    					$message.= "update option barcode :-".$option_sku."\n";
    					$flagChange=true;
    					$vskuChangeData['barcode']=$option_barcode;
    					$vskuChangeData['barcode_as_parent']=0;
    					//$vresult->option_unique_id=$option_barcode;
    					$vupdateProduct['option_unique_id']=$option_barcode;
    					if($option_sku==$product_sku)
    					{
    						$updateProduct['upc']=$option_barcode;
    						//$result->upc=$option_barcode;
    						$vskuChangeData['barcode_as_parent']=1;
    					}	
    				}
    				if($option_image_url!="" && $imageFlag==true && $vresult->option_image!=$option_image_url)
    				{
    					$message.= "update option image :-".$option_sku."\n";
    					//$vresult->option_image=$option_image_url;
    					$vupdateProduct['option_image']=$option_image_url;
    					if($option_sku==$product_sku)
    					{
    						$updateProduct['image']=$product_images;
    						//$result->image=$product_images;
    					}
    					$message.=Jetproductinfo::UpdateImageOnJet($option_sku,$product_images,$option_image_url,$jetHelper,$merhcant_id);
    				}
    				elseif(($option_image_url=="" || $vresult->option_image==$option_image_url) && $imageChange)
    				{
    					if($option_sku==$product_sku)
    					{
    						$updateProduct['image']=$product_images;
    						//$result->image=$product_images;
    					}
    					$message.=Jetproductinfo::UpdateImageOnJet($option_sku,$product_images,$option_image_url,$jetHelper,$merhcant_id);
    				}
    				if($vresult->option_qty!=$option_qty && $flagskuChange==false)
    				{
    					$message.= "update option qty :-".$option_sku."\n";
    					//$vresult->option_qty=$option_qty;
    					$vupdateProduct['option_qty']=$option_qty;
    					if($option_sku==$product_sku)
    					{
    						$updateProduct['qty']=$option_qty;
    						//$result->qty=$option_qty;
    					}
    					if($option_qty>0)
    					{
    						$message.=Jetproductinfo::updateQtyOnJet($option_sku,$option_qty,$jetHelper,$fullfillmentnodeid,$merchant_id);
    					}
    					//add function to change qty on jet.com
    				}
    				if($vresult->vendor!=$vendor)
    				{
    					$message.= "update option vendor :-".$option_sku."\n";
    					$flagChange=true;
    					$vskuChangeData['vendor']=$vendor;
    					if($option_sku==$product_sku)
    					{
    						$updateProduct['vendor']=$vendor;
    						//$result->vendor=$vendor;
    					}
    					//$vresult->vendor=$vendor;
    					$vupdateProduct['vendor']=$vendor;
    				}
    				if(!$customPrice && $vresult->option_price!=$option_price && $flagskuChange==false)
    				{
    					$message.= "update option price :-".$option_sku."\n";
    					//$vresult->option_price=(float)$option_price;
    					$vupdateProduct['option_price']=(float)$option_price;
    					if($option_sku==$product_sku)
    					{
    						$updateProduct['price']=(float)$option_price;
    						//$result->price=(float)$option_price;
    					}
    					//add function to change price on jet.com
    					$message.=Jetproductinfo::updatePriceOnJet($option_sku,(float)$option_price,$jetHelper,$fullfillmentnodeid,$merchant_id);
    				}
    				
    				if($vresult->option_weight!=round($option_weight,2) && $flagskuChange==false)
    				{
    					$message.= "update option weight :-".$option_sku."\n";
    					$flagChange=true;
    					$vskuChangeData['weight']=$option_weight;
    					//$vresult->option_weight=$option_weight;
    					$vupdateProduct['option_weight']=$option_weight;
    					if($option_sku==$product_sku)
    					{
    						$updateProduct['weight']=$option_weight;
    						//$result->weight=$option_weight;
    					}
    				}
    				if($option_variant1!="" && $vresult->variant_option1!=$option_variant1)
    				{ 
    					$message.= "update option variant1 in :-".$option_sku."\n";
    					$attributes=array();
    					$flagChange=true;
    					if($vresult->jet_option_attributes)
    					{
    						
	    					$attributes=json_decode($vresult->jet_option_attributes,true);
	    					if (count($attributes)>1)
	    					{
		    					foreach ($attributes as $key=>$attr_val){
		    						if(in_array($vresult->variant_option1,$attributes)){
		    							$attr_val=$option_variant1;
		    							$message.= "update option variant1 change:-".$option_sku."\n";
		    							$vskuChangeData['variant_option'][$key]=$option_variant1;
		    							break;
		    						}
		    					}
    						}
	    					//$vupdateProduct['jet_option_attributes']=json_encode($attributes);
	    					//$vresult->jet_option_attributes=json_encode($attributes);
	    				}
	    				$vupdateProduct['variant_option1']=$option_variant1;
    					//$vresult->variant_option1=$option_variant1;
    				}
    				if($option_variant2!="" && $vresult->variant_option2!=$option_variant2)
    				{   
    					$message.= "update option variant2 :-".$option_sku."\n";
    					$attributes=array();
    					$flagChange=true;
    					if($vresult->jet_option_attributes)
    					{
	    					$attributes=json_decode($vresult->jet_option_attributes,true);
	    					/* if ($merchant_id==7){
	    						echo "<pre>";
	    						print_r($attributes);;
	    						die;
	    					} */
	    					if (count($attributes)>1)
	    					{
		    					foreach ($attributes as $key=>$attr_val)
		    					{
		    						if(in_array($vresult->variant_option2,$attributes))
		    						{
		    							$attr_val=$option_variant2;
		    							$vskuChangeData['variant_option'][$key]=$option_variant2;
		    							break;
		    						}
		    					}
	    					}
	    					//$vupdateProduct['jet_option_attributes']=json_encode($attributes);
	    					//$vupdateProduct['jet_option_attributes']=json_encode($attributes);
    					}
    					$vupdateProduct['variant_option2']=$option_variant2;
    					//$vresult->variant_option2=$option_variant2;
    				}
    				if($option_variant3!="" && $vresult->variant_option3!=$option_variant3)
    				{ 
    					$message.= "update option variant3 :-".$option_sku."\n";
    					$attributes=array();
    					$flagChange=true;
    					if($vresult->jet_option_attributes)
    					{
	    					$attributes=json_decode($vresult->jet_option_attributes,true);
	    					foreach ($attributes as $key=>$attr_val){
	    						if($vresult->variant_option3==$attr_val){
	    							$attributes[$key]=$option_variant3;
	    							$vskuChangeData['variant_option'][$key]=$option_variant3;
	    							break;
	    						}
	    					}
	    					//$vupdateProduct['jet_option_attributes']=json_encode($attributes);
	    					//$vresult->jet_option_attributes=json_encode($attributes);
	    				}
	    				$vupdateProduct['variant_option3']=$option_variant3;
    					//$vresult->variant_option3=$option_variant3;
    				}
    				if($flagChange==true && $flagskuChange==false){
    					$message.= "change sku variant data request:-".$option_sku."\n";
    					$message.=Jetproductinfo::updateSkudataOnJet($option_sku,$product_id,$option_id,$vskuChangeData,"variants",$jetHelper,$merchant_id);
    					//var_Dump($updateInfo);die;
    				}
    				if(is_array($vupdateProduct) && count($vupdateProduct)>0){
    					$i=count($vupdateProduct);
    					$j=1;
    					$query='UPDATE `jet_product_variants` SET ';
    					foreach($vupdateProduct as $key=>$val){
    						if($i==$j)
    							$query.='`'.$key.'`="'.addslashes($val).'"';
    						else
    							$query.='`'.$key.'`="'.addslashes($val).'",';
    						$j++;
    					}
    					$query.=' where option_id="'.$option_id.'"';
    					//echo $query;die("chala");
    					$connection->createCommand($query)->execute();
    					unset($j);
    					unset($i);
    				}
    				//$vresult->save(false);
    			}
    			else
    			{
    				$sql='INSERT INTO `jet_product_variants`(
	    						`option_id`,`product_id`,
	    						`merchant_id`,`option_title`,
	    						`option_sku`,`option_image`,
	    						`option_price`,`option_qty`,
	    						`variant_option1`,`variant_option2`,
	    						`variant_option3`,`vendor`,
	    						`option_unique_id`,`option_weight`
    						)VALUES(
	    						"'.$option_id.'","'.$product_id.'",
	    						"'.$merchant_id.'","'.addslashes($option_title).'",
	    						"'.$option_sku.'","'.addslashes($option_image_url).'",
	    						"'.(float)$option_price.'","'.(int)$option_qty.'",
	    						"'.addslashes($option_variant1).'","'.addslashes($option_variant2).'",
	    						"'.addslashes($option_variant3).'","'.addslashes($vendor).'",
	    						"'.$option_barcode.'","'.$option_weight.'"
    						)';
    				$connection->createCommand($sql)->execute();
    				//function to add new variants option and upload on jet.com as well as change variation
    			}
    		}
    	}
    	//delete variants if not exist in shopify
    	$availble_variants=array();
    	$vallresult=array();
    	$vallresult=$connection->createCommand('SELECT `option_id` from `jet_product_variants` where product_id="'.$product_id.'"')->queryAll();
    	//$vallresult=JetProductVariants::find()->where(['merchant_id'=>$merchant_id,'product_id'=>$product_id])->all();
    	if(is_array($vallresult) && count($vallresult)>0){
    		foreach($vallresult as $res){
    			$availble_variants[]=trim($res['option_id']);
    		}
    	}
    	unset($vallresult);
    	$resulting_arr=array();
    	$resulting_arr = array_diff($availble_variants, $variants_ids);
    	unset($availble_variants);
    	if(is_array($resulting_arr) && count($resulting_arr)>0){
    		foreach($resulting_arr as $val)
    		{
    			$delresult=array();
    			//if deleted variant is parent
    			$delresult=$connection->createCommand('SELECT `option_sku` from `jet_product_variants` where option_id="'.$val.'"')->queryOne();
    			//$delresult=JetProductVariants::find()->select('option_sku')->where(['option_id'=>$val])->one();
    			if(is_array($delresult) && count($delresult)>0){
    				//die("del child");
    				if($delresult['option_sku']==$result->sku){
    					$message.= $delresult['option_sku']."----delgfdg child";
    					//delete all data from product as well variants and send new variantion
    					$message.=Jetproductinfo::addNewVariants($product_id,$product_sku,$data,$jetHelper,$merchant_id,$connection);
    					return;
    				}
    				else
    				{   
    					$message.= $delresult['option_sku']."---------deldfdfdfdf child";
    					$connection->createCommand('DELETE FROM `jet_product_variants` WHERE option_id="'.$val.'"')->execute();
    					//$delresult->delete();
    					//archive skus and change variantion
    					$archiveSkus[]=$result->sku;
    					
    				}
    			}	
    		}
    	}
    	unset($delresult);
    	unset($resulting_arr);
    	//change product information
    	$skuChangeData=array();
    	$flagSim=false;
    	$flagSimImage=false;
    	$flagSimPrice=false;
    	$flagSimQty=false;
    	$flagsimpleskuChange=false;
    	if($product_sku=="" && $result->sku!="" && $simpleflag==true)
    	{
    		//product not exist in shopify and archive on jet
    		$message.= "change simple sku value is null:-".$product_sku."\n";
    		$flagsimpleskuChange=true;
    		$archiveSkus[]=$result->sku;
    	}
    	if($product_sku!="" && $simpleflag==true && $result->sku!=$product_sku)
    	{
    		//product exist but sku change for simple and upload new simple product 
    		$message.= "change simple sku value:-".$product_sku."\n";
    		$flagsimpleskuChange=true;
    		$archiveSkus[]=$result->sku;
    		$updateProduct['sku']=$product_sku;
    		//$result->sku=$product_sku;
    	}
    	if($product_title!="" && $product_title!=$result->title && $simpleflag==true)
    	{
    		$message.= "change simple sku title:-".$product_sku."\n";
    		$flagSim=true;
    		$skuChangeData['title']=$product_title;
    		$updateProduct['title']=$product_title;
    		//$result->title=$product_title;
    	}
    	if($result->vendor!=$vendor && $simpleflag==true)
    	{
    		$message.= "change simple sku vendor:-".$product_sku."\n";
    		$flagSim=true;
    		$skuChangeData['brand']=$vendor;
    		$updateProduct['vendor']=$vendor;
    		//$result->vendor=$vendor;
    		//$result->brand=$vendor;
    	}
    	$result->description=strip_tags($result->description);
    	if($result->description!=$product_des && $simpleflag==true)
    	{
    		$message.= "change simple sku des:-".$product_sku."\n";
    		$flagSim=true;
    		$skuChangeData['description']=$product_des;
    		$updateProduct['description']=$product_des;
    		//$result->description=$product_des;
    	}
    	if($result->weight!=round($weight,2) && $simpleflag==true)
    	{
    		$message.= "change simple sku wight:-".$product_sku."\n";
    		$flagSim=true;
    		$skuChangeData['weight']=$weight;
    		$updateProduct['weight']=$weight;
    		//$result->weight=$weight;
    	}
    	if($result->upc!=$barcode && $simpleflag==true)
    	{
    		$message.= "change simple sku upc:-".$product_sku."\n";
    		$flagSim=true;
    		$skuChangeData['barcode']=$barcode;
    		$updateProduct['upc']=$barcode;
    		//$result->upc=$barcode;
    	}
    	if($result->product_type!=$product_type && $simpleflag==true)
    	{
    		//$result->product_type = $product_type;
    		$updateProduct['product_type']=$product_type;
    		$modelmap="";
    		$modelmap=array();
    		$modelmap=$connection->createCommand('SELECT category_id from `jet_category_map` where merchant_id="'.$merchant_id.'" and product_type="'.addslashes($product_type).'"')->queryOne();
    		//$modelmap = JetCategoryMap::find()->where(['merchant_id'=>$merchant_id,'product_type'=>$product_type])->one();
    		if(is_array($modelmap) && count($modelmap)>0){
    			if($modelmap['category_id']!=$result->fulfillment_node){
    				$message.="change product category in\n";
    				$updateProduct['fulfillment_node']=$modelmap['category_id'];
    				//$result->fulfillment_node = $modelmap['category_id'];
    				$changeParentCat=true;
    			}
    		}else{
    			//insert new product-type
    			$sql='INSERT INTO `jet_category_map`(`merchant_id`,`product_type`)VALUES("'.$merchant_id.'","'.addslashes($product_type).'")';
    			$connection->createCommand($sql)->execute();
    		}
    		unset($modelmap);
    	}
    	if($imageChange==true && $simpleflag==true)
    	{
    		$message.= "change sku simple image:-".$product_sku."\n";
    		$updateProduct['image']=$product_images;
    		//$result->image=$product_images;
    		$message.=Jetproductinfo::UpdateImageOnJet($product_sku,$product_images,$imagArr[0],$jetHelper,$merchant_id);
    	}
    	if(!$customPrice && $result->price!=$product_price && $simpleflag==true && $flagsimpleskuChange==false)
    	{
    		//send price information
    		$message.= "change simple sku price:-".$product_sku."\n";
    		$updateProduct['price']=$product_price;
    		//$result->price=$product_price;
    		$message.= Jetproductinfo::updatePriceOnJet($product_sku,$product_price,$jetHelper,$fullfillmentnodeid,$merchant_id);
    	}
    	if($result->qty!=$product_qty && $simpleflag==true && $flagsimpleskuChange==false)
    	{//echo "hello";
    		//send price information
    		$message.= "change simple sku qty:-".$product_sku."\n";
    		//$result->qty=$product_qty;
    		$updateProduct['qty']=$product_qty;
    		if($product_qty>0)
    			$message.=Jetproductinfo::updateQtyOnJet($product_sku,$product_qty,$jetHelper,$fullfillmentnodeid,$merchant_id);
    	}
    	
    	if($simpleflag==true && $result->type=="variants")
    	{
    		$updateProduct['type']="simple";
    		$updateProduct['attr_ids']="";
    		$updateProduct['jet_attributes']="";
    		//$result->type="simple";
    	}
    	if($simpleflag==true && $flagSim==true && $flagsimpleskuChange==false)
    	{
    		//update simple product sku information
    		$message.= "update sku simple data request:-".$product_sku."\n";
    		$message.=Jetproductinfo::updateSkudataOnJet($product_sku,$product_id,"",$skuChangeData,"simple",$jetHelper,$merchant_id);
    	}
    	//archive prouducts
    	$message.=Jetproductinfo::archiveProductOnJet($archiveSkus,$jetHelper,$merchant_id);
    	if(is_array($updateProduct) && count($updateProduct)>0)
    	{
    		$i=count($updateProduct);
    		$j=1;
    		$query='UPDATE `jet_product` SET ';
    		foreach($updateProduct as $k=>$v){
    			if($j==$i)
    				$query.='`'.$k.'`="'.addslashes($v).'"';
    			else
    				$query.='`'.$k.'`="'.addslashes($v).'",';
    			$j++;
    		}
    		$query.=' where id="'.$product_id.'"';
    		unset($j);
    		unset($i);
    		$connection->createCommand($query)->execute();
    	}
    	unset($archiveSkus);
    	unset($skuChangeData);
    	unset($updateProduct);
    	//$result->save(false);
    	fwrite($file, $message);
    }
    public static function updateSkudataOnJet($sku,$product_id,$option_id,$changeData,$type,$jetHelper,$merchant_id)
    {
    	$message="";
    	$resultJet="";
    	$connection=Yii::$app->getDb();
    	$resultJet=self::checkSkuOnJet($sku,$jetHelper,$merchant_id);
    	if($resultJet==false){
    		return;
    	}
    	$response=array();
    	$response=json_decode($resultJet,true);
    	$SKU_Array= array();
    	$unique=array();
    	$isUploadDes=false;
    	$isUploadTitle=false;
    	$isUploadVendor=false;
    	$isUploadWeight=false;
    	$isUploadbarcode=false;
    	$isUploadVariant1=false;
    	$isUploadVariant2=false;
    	$isUploadVariant3=false;
    	$isUpload=false;
    	$Attribute_arr = array();
    	$Attribute_array = array();
    	$SKU_Array['product_title']=$response['product_title'];
    	$SKU_Array['jet_browse_node_id']=$response['jet_browse_node_id'];
    	$SKU_Array['multipack_quantity']=$response['multipack_quantity'];
    	$SKU_Array['brand']=$response['brand'];
    	$response['product_description']=strip_tags($response['product_description']);
    	$SKU_Array['product_description']=$response['product_description'];
    	$SKU_Array['main_image_url']=$response['main_image_url'];
    	$SKU_Array['alternate_images']=$response['alternate_images'];
    	if(isset($response['ASIN']))
    		$SKU_Array['ASIN']=$response['ASIN'];
    	if(isset($response['standard_product_codes']))
    		$SKU_Array['standard_product_codes']=$response['standard_product_codes'];
    	
    	$SKU_Array['attributes_node_specific']=$response['attributes_node_specific'];
    	$SKU_Array['manufacturer']=$response['brand'];
    	$SKU_Array['mfr_part_number']=$sku;
    	 
    	if($type=="variants"){
    		if(is_array($changeData)){
    			if(array_key_exists("title",$changeData)){
    				$message.= "update sku variants title parent fun in: ".$changeData['title']."\n";
    				$isUpload=true;
    				$SKU_Array['product_title']=addslashes($changeData['title']);
    			}
    			if(array_key_exists("description",$changeData)){
    				$message.= "update sku variants desc fun in: \n";
    				$isUpload=true;
    				$description="";
    				$description=$changeData['description'];
    				$description=strip_tags($description);
    				if(strlen($description)>2000)
    					$description=$jetHelper->trimString($description, 2000);
    				$SKU_Array['product_description']=addslashes($description);
    			}
    			if(array_key_exists("vendor",$changeData)){
    				$message.= "update sku variants vendor fun in \n";
    				$isUpload=true;
    				$SKU_Array['brand']=$changeData['vendor'];
    				$SKU_Array['manufacturer']=$changeData['vendor'];
    			}
    			if(array_key_exists("weight",$changeData)){
    				$message.= "update sku variants weight fun in"."\n";
    				$isUpload=true;
    				$SKU_Array['shipping_weight_pounds']=(float)$changeData['weight'];
    			}
    			/* if(array_key_exists("category",$changeData)){
    				$message.= "update sku variants category fun in"."\n";
    				$isUpload=true;
    				$SKU_Array['jet_browse_node_id']=(int)$changeData['category'];
    			} */
    			if(array_key_exists("barcode",$changeData)){
    				$barcode=$changeData['barcode'];
    				$type="";
    				$type=self::checkUpcType($barcode);
    				if($type!="" && self::checkUpcVariants($barcode,$product_id,$option_id,$changeData['barcode_as_parent'],$connection)==false)
    				{
    					$message.= "update sku variants barcode fun in"."\n";
    					$isUpload=true;
    					$SKU_Array['standard_product_codes'][]=array('standard_product_code'=>$barcode,'standard_product_code_type'=>$type);
    				}
    			}
    			if(array_key_exists("variant_option",$changeData)){
    				//var_dump($changeData['variant_option']);
    				foreach($response['attributes_node_specific'] as $key=>$value)
    				{
    					if(array_key_exists($value['attribute_id'],$changeData['variant_option']) && $value['attribute_value']!=$changeData['variant_option'][$value['attribute_id']]){
    						$message.= "update sku variants option fun in"."\n";
    						$isUpload=true;
    						$response['attributes_node_specific'][$key]['attribute_value']=$changeData['variant_option'][$value['attribute_id']];
    					}
    				}
    				$SKU_Array['attributes_node_specific']=$response['attributes_node_specific'];
    			}
    		}
    	}
    	else
    	{
    		if(is_array($changeData)){
    			if(array_key_exists("title",$changeData)){
    				$message.= "update sku simple title fun in"."\n";
    				$isUpload=true;
    				$SKU_Array['product_title']=$changeData['title'];
    			}
    			if(array_key_exists("vendor",$changeData)){
    				$message.= "update sku simple vendor fun in"."\n";
    				$isUpload=true;
    				$SKU_Array['brand']=$changeData['vendor'];
    				$SKU_Array['manufacturer']=$changeData['vendor'];
    			}
    			if(array_key_exists("weight",$changeData)){
    				$message.= "update sku simple weight fun in"."\n";
    				$isUpload=true;
    				$SKU_Array['shipping_weight_pounds']=$changeData['weight'];
    			}
    			/* if(array_key_exists("category",$changeData)){
    				$message.= "update sku simple category fun in"."\n";
    				$isUpload=true;
    				$SKU_Array['jet_browse_node_id']=(int)$changeData['category'];
    			} */
    			if(array_key_exists("barcode",$changeData)){
    				$barcode=$changeData['barcode'];
    				$type="";
    				$type=self::checkUpcType($barcode);
    
    				if($type!="" && self::checkUpcSimple($barcode,$product_id,$collection))
    				{
    					$message.= "update sku simple upc fun in"."\n";
    					$isUpload=true;
    					$SKU_Array['standard_product_codes'][]=array('standard_product_code'=>$barcode,'standard_product_code_type'=>$type);
    				}
    			}
    			if(array_key_exists("description",$changeData)){
    				$description=$changeData['description'];
    				$description=strip_tags($description);
    				if(strlen($description)>2000)
    					$description=$jetHelper->trimString($description, 2000);
    				$message.= "update sku simple des fun in"."\n";
    				$isUpload=true;
    				$SKU_Array['product_description']=addslashes($description);
    			}
    		}
    	}
    	
    	if($isUpload==true){
    		$newResponse="";
    		$newResponsearr=array();
    		$message.= "change Sku Data:\n".json_encode($SKU_Array);
    		$newResponse=$jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku),json_encode($SKU_Array),$merchant_id);
    		$newResponsearr=json_decode($newResponse,true);
    		if(isset($newResponsearr['errors'])){
    			$message.= "update sku variants error fun in"."\n";
    			$message.= $sku.' : '.$newResponsearr['errors'].'\n';
    		}
    	}
    	//var_dump($SKU_Array);
    	$message.= "\n<!----------------------updateSkudataOnJet function End------------------------------>\n";
    	return $message;
    }
    public static function updatePriceOnJet($sku,$price,$jetHelper,$fullfillmentnodeid,$merchant_id)
    {
    	$message="";
    	if(self::checkSkuOnJet($sku,$jetHelper,$merchant_id)==false){
    		return;
    	}
    	$message.= "update sku price fun in"."\n";
    	$priceArray=array();
    	$priceinfo=array();
    	$priceArray['price']=(float)$price;
    	$priceinfo['fulfillment_node_id']=$fullfillmentnodeid;
    	$priceinfo['fulfillment_node_price']=(float)$price;
    	$priceArray['fulfillment_nodes'][]=$priceinfo;
    	$responsePrice="";
    	$responsePrice = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/price',json_encode($priceArray),$merchant_id);
    	$responsePrice=json_decode($responsePrice,true);
    	if(isset($responsePrice['errors']))
    	{
    		$message.= '\n'.json_encode($priceArray)."--price upload error--".$responsePrice['errors'];
    		//return $sku."=>".$responsePrice['errors'];
    	}
    	$message.= "\n<!----------------------updatePriceOnJet function End------------------------------>\n";
    	return $message;
    }
    public static function updateQtyOnJet($sku,$qty,$jetHelper,$fullfillmentnodeid,$merchant_id)
    {//echo "hello qty";
    	$message="";
    	$message.=  "update sku qty fun in"."\n";
    	if(self::checkSkuOnJet($sku,$jetHelper,$merchant_id)==false){
    	return;
    	}
	    $inv=array();
	    $inventory=array();
	    $inv['fulfillment_node_id']=$fullfillmentnodeid;
	    $inv['quantity']=(int)$qty;
	    $inventory['fulfillment_nodes'][]=$inv;
	    $responseInventory="";
	    $response = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/inventory',json_encode($inventory),$merchant_id);
	    $responseInventory = json_decode($response,true);
	    if(isset($responseInventory['errors'])){
	    	$message.=  '\n'.json_encode($inventory)."--qty upload error--".$responseInventory['errors'];
	    	//return $sku."=>".$responseInventory['errors'];
	    }
	     $message.= "\n<!----------------------updateQtyOnJet function End------------------------------>\n";
	     return $message;
    }
    public static function UpdateImageOnJet($sku,$images,$image="",$jetHelper,$merchant_id)
    {//echo "hello image";
    	$message="";
    	if(self::checkSkuOnJet($sku,$jetHelper,$merchant_id)==false){
    		return;
   	 	}
	    $product_images=array();
	    $product_images=explode(',',$images);
	    $Imagesupdate=array();
	    $i=1;
	    //if main image is broken
	    $keyMain=0;
	    if($image && self::checkRemoteFile($image)==false){
	    	foreach ($product_images as $key=>$value){
	    		if($value!="" && self::checkRemoteFile($value)==true){
	    			$Imagesupdate['main_image_url']=$value;
	    			$keyMain=$key;
	    			break;
	    		}
	    	}
	    }
	    else
	    	$Imagesupdate['main_image_url']=$image;
	     
	    //alternate images
	    foreach ($product_images as $key=>$value){
	    	if($value!="" && self::checkRemoteFile($value)==true){
	    		if($keyMain==$key)
	    			continue;
	    		if($i==8)
	    			break;
	    		$Imagesupdate['alternate_images'][]=array('image_slot_id'=>$i,'image_url'=>$value);
	    		$i++;
	    	}
	    }
	    //send updated images on jet
	    if($Imagesupdate)
	    {
	    	$message.=  "update sku image fun in"."\n";
	    	$responseImages="";$response="";
	    	$response = $jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/image',json_encode($Imagesupdate),$merchant_id);
	    	$responseImages = json_decode($response,true);
	    	if(isset($responseImages['errors'])){
	    		$message.= $sku."=>".$responseImages['errors'].'\n';
	    	}
	    }
	    $message.= "\n<!----------------------UpdateImageOnJet function End------------------------------>\n";
	    return $message;
    }
    public static function archiveProductOnJet($skus,$jetHelper,$merchant_id)
    {
    	$message="";
    	if(is_array($skus) && count($skus)>0)
    	{
    		foreach ($skus as $sku)
    		{
    			$message.= "update sku archive fun in"."\n";
    			$newResponse="";
    			$newResponsearr=array();
    			$newResponse=$jetHelper->CPutRequest('/merchant-skus/'.rawurlencode($sku).'/status/archive',json_encode(array("is_archived"=>true)),$merchant_id);
    			$newResponsearr=json_decode($newResponse,true);
    			if(isset($newResponsearr['errors'])){
    				$error['archive'][]='\n'.$sku.' : '.$newResponsearr;
    			}
    		}
    	}
    	if(isset($error['archive']))
    		$message.= implode(', ',$error['archive'])."\n";
    	$message.= "\n<!----------------------archiveProductOnJet function End------------------------------>\n";
    	return $message;
    }
    public static function addNewVariants($data,$product_id,$merchant_id,$bigcom=false)
    {
    	$archiveSkus=array();
		$modelProVar = Data::sqlRecords('SELECT `option_sku` from `jet_product_variants` where product_id="'.$product_id.'"','all','select');
    	if(is_array($modelProVar) && count($modelProVar)>0)
    	{
    		foreach($modelProVar as $value)
    		{
    			$archiveSkus[]=$value['option_sku'];
    		}
    	}
    	Data::sqlRecords('DELETE FROM `jet_product` WHERE merchant_id="'.$merchant_id.'" AND  bigproduct_id="'.$product_id.'"');
    	Data::sqlRecords('DELETE FROM `jet_product_variants` WHERE merchant_id="'.$merchant_id.'" AND  product_id="'.$product_id.'"');
    	Data::sqlRecords('DELETE FROM `tophatter_product` WHERE merchant_id="'.$merchant_id.'" AND  product_id="'.$product_id.'"');
    	Data::sqlRecords('DELETE FROM `tophatter_product_variants` WHERE merchant_id="'.$merchant_id.'" AND  product_id="'.$product_id.'"');
    	$import_status = Data::getConfigValue($merchant_id,'import_product_option');
    	self::saveNewRecords($data, $merchant_id, $connection = false,$import_status,$bigcom);
    	return $archiveSkus;
    }

    public static function checkSkuOnJet($sku,$jetHelper,$merchant_id)
    {
    	$response="";
    	$response = $jetHelper->CGetRequest('/merchant-skus/'.rawurlencode($sku),$merchant_id);
    	$responsearray=array();
    	$responsearray=json_decode($response,true);
    	if($responsearray && !isset($responsearray['errors']))
    		return $response;
    	else
    		return false;
    }
    public static function saveNewRecords($data, $merchant_id, $connection = false,$import_option=null,$bigcom=null)
    {

        try
        {
            $response = [];                     
            if(isset($data['id']))
            {

            	//if get tophatter shop token and storehash
            	if(!$bigcom)
            	{
            		$shopDetails = Data::getTophatterShopDetails($merchant_id);
            		$store_hash=isset($shopDetails['store_hash'])?$shopDetails['store_hash']:"";
        			$token = isset($shopDetails['token'])?$shopDetails['token']:'';	
	    			$bigcom = new BigcommerceClientHelper(TOPHATTER_APP_KEY,$token,$store_hash);
            	}
                $product_images = "";
                $product_id=$data['id'];


                $images = [];
                if(is_null($import_option)){
                    $import_option = Data::getConfigValue($merchant_id,'import_product_option');
                }


                if($import_option == 'published')
                {
                    if (isset($data['is_visible']) && $data['is_visible']==0) 
                    {                        
                        self::insertImportErrorProduct($data['id'],$data['name'],'hidden_product',$merchant_id);
                        $response['error']="hidden_product";
                        return $response;
                    }
                }
                

                 if($data['categories'][0]=="")
                 {
                     //save product info in product_import_error table
                     self::insertImportErrorProduct($data['id'],$data['name'],'product_type',$merchant_id);
                     $response['error']="product_type";
                     return $response;
                 }

                 
                
                /**get category from api call*/
		        $category_id=$data['categories'][0];
		        $product_type="";


		        $categories = Data::sqlRecords("SELECT * FROM `jet_bigcommerce_category` WHERE c_id='".$category_id."' AND merchant_id='".$merchant_id."' LIMIT 0,1","one","select");
                
                $product_type=$categories['name'];

                $product_type='No Category';
              
	    		if(isset($categories['data']) && count($categories['data'])>0)
	    		{
	    			foreach($categories['data'] as $cat)
	    			{
	    				if($cat['id']==$category_id)
	    				{
	    					$product_type = $cat['name'];
	    				}
	    			}
	    		}
	    		
	    		if(empty($product_type) ||$product_type=='No Category')
	    		{
	    			$category=$bigcom->call('GET', 'catalog/categories/tree');

                    //print_r($category);
   					Jetproductinfo::saveBigcomcategory($category,$merchant_id);
	    			$categories = Data::sqlRecords("SELECT * FROM `jet_bigcommerce_category` WHERE c_id='".$category_id."' AND merchant_id='".$merchant_id."' LIMIT 0,1","one","select");
                
                	$product_type=$categories['name'];
	    		}

                if(!$product_type){
                    $category_id=$bigcom->call('GET','catalog/categories/'.$data['categories'][0]);
                    $product_type=$category_id['data']['name'];
                    
                }

               // $product_type=$category_id;

	    		$product_type=preg_replace('/\s+/', '', $product_type);

	    		$description = utf8_encode(preg_replace("/<script.*?\/script>/", "", $data['description']));



                $brandname="";
		        $brand_id=$data['brand_id'];

		        $brand = Data::sqlRecords("SELECT * FROM `jet_bigcommerce_brand` WHERE brand_id='".$brand_id."' AND merchant_id='".$merchant_id."' LIMIT 0,1","one","select");
                
                $brandname=$brand['name'];

                if(empty($brandname) ||$brandname=='')
                {
                    Jetproductinfo::savebigcombrand($merchant_id,$bigcom);
                    $brand = Data::sqlRecords("SELECT * FROM `jet_bigcommerce_brand` WHERE brand_id='".$brand_id."' AND merchant_id='".$merchant_id."' LIMIT 0,1","one","select");
                
                    $brandname=$brand['name'];
                }

               // $brandname=$brand_id;

                $countVariants=0;
                $skus=[];
                $variantData=[];
                /*if(count($data['variants'])>1)
                {*/
                $optionAttr=false;	
                $attr_id="";


                foreach ($data['variants'] as $value)
                {
                	
                    if($value['sku'] == "")
                    {
                        continue;
                    }
                   
                    $skus[] = $value['sku'];
                    $option_weight = $option_price = 0.00;
                    $option_price = (float)$value['price'];
                    if(!$option_price)
                    	$option_price = (float)$value['calculated_price'];

                    //$inventory=($value['inventory_level']==0 && $data['inventory_level']>0)?$data['inventory_level']:$value['inventory_level'];
           			
                    $inventory=$value['inventory_level'];

                    $option_weight=isset($value['weight'])?$value['weight']:$value['calculated_weight'];
                    //if(!$value['weight'])
                        //$option_weight =(float)Jetappdetails::convertWeight($value['weight'],$value['weight_unit']);

                    $option_image_url = $value['image_url'];

                    $option_set=$value['option_values'];
                    $option_title = isset($option_set[0]['label'])?$option_set[0]['label']:'';
					$option_option2 = isset($option_set[1]['label'])?$option_set[1]['label']:'';
					$option_option3 = isset($option_set[2]['label'])?$option_set[2]['label']:'';
                    
					if($option_option2){
						$option_title.='/ '.$option_option2;
					}
					if($option_option3){
						$option_title.=' / '.$option_option3;
					}

					if($option_title){
						$option_title=$data['name'];
					}

                   
             		$barcode=strlen($value['upc'])!=10 && $value['upc']!='' ?$value['upc']:$value['gtin'];
                    //$asin=strlen($barcode)==10 && ctype_alnum ($barcode)?$barcode:"";
                    $barcode=self::validateBarcode($barcode)?$barcode:"";

                    $variant_option1 = isset($option_set[0]['label'])?$option_set[0]['label']:'';
					$variant_option2 = isset($option_set[1]['label'])?$option_set[1]['label']:'';
					$variant_option3 = isset($option_set[2]['label'])?$option_set[2]['label']:'';

                    $variantData[$value['id']]['product_id']=$value['product_id'];
                    $variantData[$value['id']]['title']=addslashes($option_title);
                    $variantData[$value['id']]['sku']=addslashes($value['sku']);
                    $variantData[$value['id']]['image']=addslashes($option_image_url);
                    $variantData[$value['id']]['price']=(float)$option_price;
                    $variantData[$value['id']]['qty']=(int)$inventory;
                    $variantData[$value['id']]['variant_option1']=addslashes($variant_option1);
                    $variantData[$value['id']]['variant_option2']=addslashes($variant_option2);
                    $variantData[$value['id']]['variant_option3']=addslashes($variant_option3);
                    $variantData[$value['id']]['barcode']=$barcode;
                    $variantData[$value['id']]['asin']='';
                    $variantData[$value['id']]['weight']=(float)$option_weight;

                    if(!$optionAttr && count($option_set)>0)
                    {
                    	$optionAttr=true;
                    	$arr_option_list=[];
                    	foreach ($option_set as $option_val) 
                    	{
                    		$arr_option_list[$option_val['option_id']]=$option_val['option_display_name'];
                    	}
                    	$attr_id=json_encode($arr_option_list);
                    }
                    $countVariants++  ;
                    
                }
                
                //check product if all product having no skus and skip product to create
                if($countVariants==0)
                {
                    self::insertImportErrorProduct($data['id'],$data['name'],'sku',$merchant_id);
                    $response['error']="sku";
                    return $response;
                }
                $type="variants";
                if($countVariants==1){
                    $type="simple";
                }

                $val1=array();
                if(is_array($variantData) && count($variantData)>0)
                {
                    $i=0;
                    foreach ($variantData as $key => $val) 
                    {
                        //save data in jet_product 

                        if($i==0)
                        {
                        	$sale_price = Data::getConfigValue($merchant_id,'sale_price');
                        	if($sale_price==1){
                        		if($data['sale_price']){
                        			$val['price']=$data['sale_price'];
                        		}
                        	}

                            foreach ($data['images'] as $value) {
                               if($value['is_thumbnail']==1){
                                     $val['image']=$value['url_zoom'];
                               }
                               $val1[]=$value['url_zoom'];
                            }

                            if($val1)
                                $val1=implode(',', $val1);
                                
                                
                                
                            if(count($data['variants'])==1){
                               // $val['sku']=$data['sku'];
                                $val['barcode']=$data['upc'];
                            }
                            
                            


                            if($merchant_id==352 || $merchant_id==427){
                                $val['sku']=$data['sku'];
                            }
                            
                        
                            if($merchant_id==427){
                                $val['price']=$data['price'];
                                $val['weight']=$data['weight'];
                            }

                            

                            $proResult = Data::sqlRecords("SELECT `id` FROM `jet_product` WHERE merchant_id='".$merchant_id."' AND bigproduct_id='".$val['product_id']."'  LIMIT 0,1","one","select");
                           
                            if(!$proResult)
                            {
                                $response['success']=true;
                                $sql='INSERT INTO `jet_product`
                                    (
                                        `bigproduct_id`,`merchant_id`,
                                        `title`,`sku`,
                                        `type`,`description`,
                                        `image`,`price`,
                                        `qty`,`bigcom_attr`,
                                        `upc`,`status`,
                                        `brand`,`variant_id`,
                                        `product_type`,`weight`,`ASIN`,`additional_images`
                                    )
                                    VALUES
                                    (
                                        "'.$product_id.'","'.$merchant_id.'",
                                        "'.addslashes($data['name']).'","'.$val['sku'].'",
                                        "'.$type.'","'.addslashes($description).'",
                                        "'.$val['image'].'","'.$val['price'].'",
                                        "'.$val['qty'].'","'.addslashes($attr_id).'",
                                        "'.$val['barcode'].'","Not Uploaded",
                                        "'.addslashes($brandname).'","'.$key.'",
                                        "'.addslashes($product_type).'","'.$val['weight'].'","'.$val['asin'].'","'.$val1.'"
                                    )';  
                                Data::sqlRecords($sql,null,'insert');
                            }
                            
                            //save in `tophatter_product` table
                            $walresult = Data::sqlRecords("SELECT `product_id` FROM `tophatter_product` WHERE  merchant_id='".$merchant_id."' AND product_id='".$val['product_id']."' LIMIT 0,1","one","select");
                            if(!$walresult)
                            {
                                $sql = "INSERT INTO `tophatter_product` (`product_id`,`merchant_id`,`status`,`product_type`) VALUES ('".$product_id."','".$merchant_id."','".self::PRODUCT_STATUS_NOT_UPLOADED."','".addslashes($product_type)."')";
                                Data::sqlRecords($sql);
                            }
                        }
                        $i++;
                        if($countVariants>1)
                        {
                            //save data in jet_product_variants
                            $proVarresult = Data::sqlRecords("SELECT `option_id` FROM `jet_product_variants` WHERE option_id='".$key."' AND merchant_id='".$merchant_id."' LIMIT 0,1","one","select");
                            if(!$proVarresult)
                            {
                                $sql = 'INSERT INTO `jet_product_variants`(
                                    `option_id`,`product_id`,
                                    `merchant_id`,`option_title`,
                                    `option_sku`,`option_image`,
                                    `option_price`,`option_qty`,
                                    `variant_option1`,`variant_option2`,
                                    `variant_option3`,
                                    `option_unique_id`,`option_weight`,`status`,`asin`
                                )VALUES(
                                    "'.$key.'","'.$product_id.'",
                                    "'.$merchant_id.'","'.$val['title'].'",
                                    "'.$val['sku'].'","'.$val['image'].'",
                                    "'.$val['price'].'","'.$val['qty'].'",
                                    "'.$val['variant_option1'].'","'.$val['variant_option2'].'",
                                    "'.$val['variant_option3'].'",
                                    "'.$val['barcode'].'","'.$val['weight'].'","Not Uploaded","'.$val['asin'].'"
                                )';
                                Data::sqlRecords($sql);

                            }
                            //Insert Data Into `tophatter_product_variants`
                            $walresult = Data::sqlRecords("SELECT `option_id` FROM `tophatter_product_variants` WHERE option_id='".$key."' AND merchant_id='".$merchant_id."' LIMIT 0,1","one","select");
                            if(!$walresult)
                            {
                                $sql = "INSERT INTO `tophatter_product_variants`(
                                        `option_id`,`product_id`,`merchant_id`,`status`,`new_variant_option_1`,`new_variant_option_2`,`new_variant_option_3`
                                        )

                                        VALUES('".$key."','".$product_id."','".$merchant_id."','".self::PRODUCT_STATUS_NOT_UPLOADED."','".$val['variant_option1']."','".$val['variant_option2']."','".$val['variant_option3']."')";
                                Data::sqlRecords($sql);
                            }
                        }   
                    }
                   
                    if($product_type)
                    {
                        //add product type in jet
                        $modelmap="";
                        $query="";
                        $queryObj="";
                        $query='SELECT * FROM `jet_category_map` where merchant_id="'.$merchant_id.'" AND product_type="'.addslashes($product_type).'" LIMIT 0,1';
                        $modelmap = Data::sqlRecords($query,"one","select");

                        if($modelmap)
                        {
                            $updateResult="";
                            if(isset($modelmap['category_id'])){
                                $query='UPDATE `jet_product` SET jet_browse_node="'.$modelmap['category_id'].'" WHERE bigproduct_id="'.$data['id'].'" AND merchant_id="'.$merchant_id.'"';

                                Data::sqlRecords($query,null,'update');
                            }
                        }
                        else
                        {
                            $queryObj="";
                            $query='INSERT INTO `jet_category_map`(`merchant_id`,`product_type`)VALUES("'.$merchant_id.'","'.addslashes($product_type).'")';
                            Data::sqlRecords($query);
                        }
                        //add product type in tophatter
                        $query = 'SELECT * FROM `tophatter_category_map` where merchant_id="'.$merchant_id.'" AND product_type="'.addslashes($product_type).'" LIMIT 0,1';
                        $walmodelmap = Data::sqlRecords($query,"one","select");

                        if($walmodelmap)
                        {
                            //tophatter new product
                            $updateResult="";
                            if($walmodelmap['category_id']){
                                $query='UPDATE `tophatter_product` SET category="'.$walmodelmap['category_id'].'" where product_id="'.$product_id.'" AND merchant_id="'.$merchant_id.'"';
                                Data::sqlRecords($query);
                            }
                        }
                        else
                        {
                            //tophatter category map
                            $queryObj="";
                            $query='INSERT INTO `tophatter_category_map`(`merchant_id`,`product_type`)VALUES("'.$merchant_id.'","'.addslashes($product_type).'")';
                            Data::sqlRecords($query);
                        }
                    }
                }
                //delete if product successfully saved but exit in product import error
                $checkExistProduct=Data::sqlRecords("SELECT `id` FROM `jet_product` WHERE bigproduct_id='".$data['id']."' AND merchant_id='".$merchant_id."' LIMIT 0,1","one","select");
                if(isset($checkExistProduct['id']))
                {
                    $query="DELETE FROM `product_import_error` WHERE merchant_id='".$merchant_id."' AND id='".$checkExistProduct['id']."'";
                    Data::sqlRecords($query,null,'delete');
                }
            }
            unset($data,$images,$imagArr,$attrId,$options,$result);
            return $response;
        }
        catch(\yii\db\Exception $e)
        {
            Data::createLog($e->getMessage(),'exception/'.$merchant_id,'a',true,true);
            exit(0);
        }
        catch(Exception $e)
        {
            Data::createLog($e->getMessage(),'exception/'.$merchant_id,'a',true,true);
            exit(0);
        }
    }

    public static function checkProductOptionBarcodeOnUpdate($option_array=array(),$variant_array=array(),$variant_id="",$barcode_type="",$product_barcode="",$product_upc="",$product_id="",$product_sku="",$connection=array())
    {
    		//$collection=Yii::$app->getDb();
            $return_array=array();
            $return_array['success']=true;
            $return_array['error_msg']="";
            $variant_upc="";
            $variant_sku="";
            $err_msg="";
            $variant_upc=trim($variant_array['upc']);
            $variant_sku=trim($variant_array['optionsku']);
            $match_skus_array=array();
            $matched_flag=false;
            $db_matched_flag=false;
            $parent_matched_flag=false;
            $variant_as_parent=0;
            if($variant_sku==trim($product_sku)){
                $variant_as_parent=1;
            }
            foreach($option_array as $option_id=>$option_attributes){
                if(trim($option_attributes['optionsku'])!=$variant_sku){
                    if($variant_upc==trim($option_attributes['upc'])/* && trim($option_attributes['barcode_type'])==trim($barcode_type)*/){
                        $match_skus_array[]=trim($option_attributes['optionsku']);
                        $matched_flag=true;
                    }
                }
            }
            if($variant_as_parent!=1 && $product_upc==$variant_upc && $product_barcode==$barcode_type){
                $matched_flag=true;
                $parent_matched_flag=true;
            }
            if(!$matched_flag){
                $matched_flag=$db_matched_flag=self::checkUpcVariants($variant_upc,$product_id,$variant_id,$variant_as_parent,$connection);
            }
            if($matched_flag){
                    if(count($match_skus_array)>0){
                            $err_msg="Entered Barcode matched with Option Sku(s) : ".implode(' , ',$match_skus_array);
                    }
                    if($parent_matched_flag){
                        if($err_msg==""){
                            $err_msg="Entered Barcode matched with its Main Product";
                        }else{
                            $err_msg .=" & with its Main Product";
                        }
                    }
                    if($db_matched_flag){
                        $err_msg="Entered Barcode already exists";
                    }
                    $err_msg.=".Please enter unique Barcode.";
                    $return_array['success']=false;
                    $return_array['error_msg']=$err_msg;
            }

            return array($return_array['success'],$return_array['error_msg']);
    }

    public static function checkProductOptionAsinOnUpdate($option_array=array(),$variant_array=array(),$variant_id="",$product_asin="",$product_id="",$product_sku="",$product_collection=array(),$variant_collection=array())
    {
    		$collection=Yii::$app->getDb();
            $return_array=array();
            $return_array['success']=true;
            $return_array['error_msg']="";
            $variant_asin="";
            $variant_sku="";
            $err_msg="";
            $variant_asin=trim($variant_array['asin']);
            $variant_sku=trim($variant_array['optionsku']);
            $match_skus_array=array();
            $matched_flag=false;
            $db_matched_flag=false;
            $parent_matched_flag=false;
            $variant_as_parent=0;
            if($variant_sku==trim($product_sku)){
                $variant_as_parent=1;
            }
            foreach($option_array as $option_id=>$option_attributes){
                if(trim($option_attributes['optionsku'])!=$variant_sku){
                    if($variant_asin==trim($option_attributes['asin'])){
                        $match_skus_array[]=trim($option_attributes['optionsku']);
                        $matched_flag=true;
                    }
                }
            }
            if($variant_as_parent!=1 && $product_asin==$variant_asin){
                $matched_flag=true;
                $parent_matched_flag=true;
            }
            if(!$matched_flag){
                $matched_flag=$db_matched_flag=self::checkAsinVariants($variant_asin,$product_id,$variant_id,$variant_as_parent,$collection);
            }
            if($matched_flag){
                    if(count($match_skus_array)>0){
                            $err_msg="Entered ASIN matched with Option Sku(s) : ".implode(' , ',$match_skus_array);
                    }
                    if($parent_matched_flag){
                        if($err_msg==""){
                            $err_msg="Entered ASIN matched with its Main Product";
                        }else{
                            $err_msg .=" & with its Main Product";
                        }
                    }
                    if($db_matched_flag){
                        $err_msg="Entered ASIN already exists";
                    }
                    $err_msg.=".Please enter unique ASIN.";
                    $return_array['success']=false;
                    $return_array['error_msg']=$err_msg;
            }
            return array($return_array['success'],$return_array['error_msg']);
    } 
    public static function checkProductOptionMpnOnUpdate($option_array=array(),$variant_array=array(),$variant_id="",$product_mpn="",$product_id="",$product_sku="",$product_collection=array(),$variant_collection=array())
    {
        $collection=Yii::$app->getDb();
        $return_array=array();
        $return_array['success']=true;
        $return_array['error_msg']="";
        $variant_mpn="";
        $variant_sku="";
        $err_msg="";
        $variant_mpn=trim($variant_array['mpn']);
        $variant_sku=trim($variant_array['optionsku']);
        $match_skus_array=array();
        $matched_flag=false;
        $db_matched_flag=false;
        $parent_matched_flag=false;
        $variant_as_parent=0;
        if($variant_sku==trim($product_sku)){
            $variant_as_parent=1;
        }
        foreach($option_array as $option_id=>$option_attributes){
            if(trim($option_attributes['optionsku'])!=$variant_sku){
                if($variant_mpn==trim($option_attributes['mpn'])){
                    $match_skus_array[]=trim($option_attributes['optionsku']);
                    $matched_flag=true;
                }
            }
        }
        if($variant_as_parent!=1 && $product_mpn==$variant_mpn){
            $matched_flag=true;
            $parent_matched_flag=true;
        }
        if(!$matched_flag){
            $matched_flag=$db_matched_flag=self::checkAsinVariants($variant_mpn,$product_id,$variant_id,$variant_as_parent,$collection);
        }
        if($matched_flag){
            if(count($match_skus_array)>0){
                $err_msg="Entered MPN matched with Option Sku(s) : ".implode(' , ',$match_skus_array);
            }
            if($parent_matched_flag){
                if($err_msg==""){
                    $err_msg="Entered MPN matched with its Main Product";
                }else{
                    $err_msg .=" & with its Main Product";
                }
            }
            if($db_matched_flag){
                $err_msg="Entered MPN already exists";
            }
            $err_msg.=".Please enter unique MPN.";
            $return_array['success']=false;
            $return_array['error_msg']=$err_msg;
        }
        return array($return_array['success'],$return_array['error_msg']);
    }
    public static function checkUpcType($product_upc){
        if(is_numeric($product_upc))
        {
            if(strlen($product_upc)==12)
                return "UPC";
            elseif(strlen($product_upc)==10 && !ctype_alnum ($product_upc))
                return "ISBN";
            elseif(strlen($product_upc)==13)
                return "ISBN";
            elseif(strlen($product_upc)==14)
                return "GTIN";
        }
        return "";
    }
    public static function checkUpcSimple($product_upc="",$product_id="",$connection=array())
    {
    	
    	if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        $merchant_id = \Yii::$app->user->identity->id;
       
        $product_upc=trim($product_upc);
        $main_product_count=0;
        $main_products=array();
        $variant=array();
        $variant_count=0;
        $queryObj="";
      
        $query='SELECT upc FROM `jet_product` where merchant_id="'.$merchant_id.'" AND  bigproduct_id="'.$product_id.'"' ;
        $queryObj = $connection->createCommand($query);
        $modelmap = $queryObj->queryOne();
    
        $upc=$modelmap['upc'];
        
        if($upc==$product_upc){
       
        $query="SELECT `id` FROM `jet_product` WHERE merchant_id='".$merchant_id."'  AND bigproduct_id='".$product_id."'";
        $queryObj = $connection->createCommand($query);
        $main_products = $queryObj->queryAll();
        $main_product_count=count($main_products);
        unset($main_products);
        }
        else{
        $main_product_count=0;
        }
        $queryObj="";
        $query="SELECT `option_id` FROM `jet_product_variants` WHERE option_unique_id='".$product_upc."'";
        $queryObj = $connection->createCommand($query);
        $variant = $queryObj->queryAll();
        $variant_count= count($variant);
        unset($variant);
        
    
        if($main_product_count){
        return false;
        }
        else{
        if($main_product_count > 0 || $variant_count > 0){
        
                return true;
        }}
       
        return false;
    }
    public static function checkUpcVariantSimple($product_upc="",$product_id="",$product_sku="",$connection=array())
    {
    	if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        $connection = Yii::$app->getDb();
        $product_upc=trim($product_upc);
        $main_product_count=0;
        $main_products=array();
        $variant=array();
        $variant_count=0;
        $queryObj="";
        $query="SELECT `id` FROM `jet_product` WHERE `upc`='".$product_upc."' AND `id`<>'".$product_id."'";
        $queryObj = $connection->createCommand($query);

        $query='SELECT additional_info FROM `jet_product` where merchant_id="'.$merchant_id.'" AND  bigproduct_id="'.$product_id.'"' ;
        $queryObj = $connection->createCommand($query);
        $modelmap = $queryObj->queryOne();
    
        $upc=json_decode($modelmap['additional_info'])->upc_code;
        
        if($upc==$product_upc){
       
        $query="SELECT `id` FROM `jet_product` WHERE merchant_id='".$merchant_id."'  AND bigproduct_id='".$product_id."'";
        $queryObj = $connection->createCommand($query);
        $main_products = $queryObj->queryAll();
        $main_product_count=count($main_products);
        unset($main_products);
        }
        else{
        $main_product_count=0;}

        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `option_id` FROM `jet_product_variants` WHERE option_sku <> '".$product_sku."' AND option_unique_id='".$product_upc."'");
        $variant = $queryObj->queryAll();
        $variant_count= count($variant);
        unset($variant);
        
        if($main_product_count){
        return false;
        }
        else{
        if($main_product_count > 0 || $variant_count > 0){
        
                return true;
        }}
        return false;
    }
    public static function checkUpcVariants($product_upc="",$product_id="",$variant_id="",$variant_as_parent=0,$connection=array())
    {
    	if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        $merchant_id=MERCHANT_ID;
        $variant_count=0;
        $main_product_count=0;
        $main_products=array();
        $variant=array();
        
        
        $query='SELECT upc FROM `jet_product` where merchant_id="'.$merchant_id.'" AND  bigproduct_id="'.$product_id.'"' ;
        $queryObj = $connection->createCommand($query);
        $modelmap = $queryObj->queryOne();
        
        $upc=$modelmap['upc'];
        
        if($upc==$product_upc){
        	if($variant_as_parent){
        		$queryObj="";
        		$queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE  merchant_id='".$merchant_id."' AND id <> '".$product_id."'");
        		$main_products = $queryObj->queryAll();
        	}else{
        		$queryObj="";
        		$queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE merchant_id='".$merchant_id."'");
        		$main_products = $queryObj->queryAll();
        	}
        	
        	$main_product_count=count($main_products);
        	unset($main_products);
        }
        else{
        	
        	$main_product_count='';
        	
        }
        
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `option_id` FROM `jet_product_variants` WHERE option_unique_id='".trim($product_upc)."' and option_id <>'".$variant_id."'");
        $variant = $queryObj->queryAll();
        $variant_count= count($variant);
        unset($variant);
    	if($main_product_count){
        return false;
        }
        else{
        if($main_product_count > 0 || $variant_count > 0){
        
                return true;
        }}
        return false;
    }

    public static function checkAsinSimple($product_asin="",$product_id="",$connection=array())
    {
    	if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        $product_asin=trim($product_asin);
        $main_product_count=0;
        $main_products=array();
        $variant=array();
        $variant_count=0;
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE ASIN='".$product_asin."' AND id <> '".$product_id."'");
        $main_products = $queryObj->queryAll();
        $main_product_count=count($main_products);
        unset($main_products);
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `option_id` FROM `jet_product_variants` WHERE asin='".$product_asin."'");
        $variant = $queryObj->queryAll();
        $variant_count= count($variant);
        unset($variant);
        if($main_product_count > 0 || $variant_count > 0){
            //$msg['success']=true;
            return true;
        }
        return false;
    }
    public static function checkAsinVariantSimple($product_asin="",$product_id="",$product_sku="",$connection=array())
    {
    	if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        $product_asin=trim($product_asin);
        $main_product_count=0;
        $main_products=array();
        $variant=array();
        $variant_count=0;
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE ASIN='".$product_asin."' AND id <> '".$product_id."'");
        $main_products = $queryObj->queryAll();
        $main_product_count=count($main_products);
        unset($main_products);
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `option_id` FROM `jet_product_variants` WHERE option_sku <> '".$product_sku."' AND asin='".$product_asin."'");
        $variant = $queryObj->queryAll();
        $variant_count= count($variant);
        unset($variant);
        if($main_product_count > 0 || $variant_count > 0){
            //$msg['success']=true;
            return true;
        }
        return false;
    }
    public static function checkAsinVariants($product_asin="",$product_id="",$variant_id="",$variant_as_parent=0,$connection=array())
    {
    	if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
    	$product_asin=trim($product_asin);
        $variant_count=0;
        $main_product_count=0;
        $main_products=array();
        $variant=array();
        if($variant_as_parent){
        	$queryObj="";
        	$queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE ASIN='".trim($product_asin)."' AND id <> '".$product_id."'");
        	$main_products = $queryObj->queryAll();
        }else{
        	$queryObj="";
        	$queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE ASIN='".trim($product_asin)."'");
        	$main_products = $queryObj->queryAll();
        }
        $main_product_count=count($main_products);
        unset($main_products);
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `option_id` FROM `jet_product_variants` WHERE asin='".trim($product_asin)."' and option_id <> '".$variant_id."'");
        $variant = $queryObj->queryAll();
        $variant_count= count($variant);
        unset($variant);
  		if($variant_count>0 || $main_product_count>0){
            //$msg['success']=true;
            return true;
        }
        return false;
    }
    public static function checkMpnSimple($product_mpn="",$product_id="",$connection=array())
    {
        if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        $product_mpn=trim($product_mpn);
        $main_product_count=0;
        $main_products=array();
        $variant=array();
        $variant_count=0;
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE mpn='".$product_mpn."' AND id <> '".$product_id."'");
        $main_products = $queryObj->queryAll();
        $main_product_count=count($main_products);
        unset($main_products);
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `option_id` FROM `jet_product_variants` WHERE option_mpn='".$product_mpn."'");
        $variant = $queryObj->queryAll();
        $variant_count= count($variant);
        unset($variant);
        if($main_product_count > 0 || $variant_count > 0){
            //$msg['success']=true;
            return true;
        }
        return false;
    }
    public static function checkMpnVariantSimple($product_mpn="",$product_id="",$product_sku="",$connection=array())
    {
        if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        $product_mpn=trim($product_mpn);
        $main_product_count=0;
        $main_products=array();
        $variant=array();
        $variant_count=0;
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE mpn='".$product_mpn."' AND id <> '".$product_id."'");
        $main_products = $queryObj->queryAll();
        $main_product_count=count($main_products);
        unset($main_products);
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `option_id` FROM `jet_product_variants` WHERE option_sku <> '".$product_sku."' AND option_mpn='".$product_mpn."'");
        $variant = $queryObj->queryAll();
        $variant_count= count($variant);
        unset($variant);
        if($main_product_count > 0 || $variant_count > 0){
            //$msg['success']=true;
            return true;
        }
        return false;
    }
    public static function checkMpnVariants($product_mpn="",$product_id="",$variant_id="",$variant_as_parent=0,$connection=array())
    {
        if(!isset($connection)){
            $connection = Yii::$app->getDb();
        }
        $product_mpn=trim($product_mpn);
        $variant_count=0;
        $main_product_count=0;
        $main_products=array();
        $variant=array();
        if($variant_as_parent){
            $queryObj="";
            $queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE mpn='".trim($product_mpn)."' AND id <> '".$product_id."'");
            $main_products = $queryObj->queryAll();
        }else{
            $queryObj="";
            $queryObj = $connection->createCommand("SELECT `id` FROM `jet_product` WHERE mpn='".trim($product_mpn)."'");
            $main_products = $queryObj->queryAll();
        }
        $main_product_count=count($main_products);
        unset($main_products);
        $queryObj="";
        $queryObj = $connection->createCommand("SELECT `option_id` FROM `jet_product_variants` WHERE option_mpn='".trim($product_mpn)."' and option_id <> '".$variant_id."'");
        $variant = $queryObj->queryAll();
        $variant_count= count($variant);
        unset($variant);
      		if($variant_count>0 || $main_product_count>0){
      		    //$msg['success']=true;
      		    return true;
      		}
      		return false;
    }

    public static function validateSku($sku, $productId, $merchant_id=null) {
        if(is_null($merchant_id))
            $merchant_id = Yii::$app->user->identity->id;

        $query = "SELECT `result`.* FROM (SELECT `sku` , `bigproduct_id` AS `product_id` , `variant_id` AS `option_id` ,`merchant_id`, `type` FROM `jet_product` WHERE `merchant_id`='{$merchant_id}' AND `sku`='{$sku}' UNION SELECT `option_sku` AS `sku` , `product_id` , `option_id`, `merchant_id`, 'variants' AS `type` FROM `jet_product_variants` WHERE `merchant_id`='{$merchant_id}' AND `option_sku`='{$sku}') as `result`";
        $result = Data::sqlRecords($query, 'one', 'select');
        if($result) {
            if($result['product_id']==$productId || $result['option_id']==$productId) {
                return true;
            }
            return false;
        }
        else
            return true;
    }

    public static function priceChange($price,$priceType,$changePrice)
    {
    	$updatePrice=0;
    	if($priceType=="increase")
    		$updatePrice=(float)($price+($changePrice/100)*($price));
    	elseif($priceType=="decrease")
    		$updatePrice=(float)($price-($changePrice/100)*($price));
    	return $updatePrice;
    }

    public static function validateBarcode($barcode)
    {
        $upcLen = strlen($barcode);
        if($barcode!="" && is_numeric($barcode) && ($upcLen==12 || $upcLen==10 || $upcLen==13 || $upcLen==14)){
            return true;
        }
        return false;
    }

    public static function insertImportErrorProduct($id,$title,$type,$merchant_id)
    {
        $checkExistProduct=Data::sqlRecords("SELECT `id` FROM `product_import_error` WHERE merchant_id='".$merchant_id."' AND id='".$id."' LIMIT 0,1","one","select");
        if(!$checkExistProduct)
        {
            $query="INSERT INTO `product_import_error`(`id`, `merchant_id`, `missing_value`, `title`) VALUES ('".$id."','".$merchant_id."','".$type."','".addslashes($title)."')";
            Data::sqlRecords($query,"","insert");
        }
    }

    /**
      * Validate Product Barcode
      * 
      * @param $optionId
      * @return void
      */
    public static function validateProductBarcode($barcode, $variant_id, $merchant_id=null)
    {

        if(is_null($merchant_id))
            $merchant_id = Yii::$app->user->identity->id;


        $query = "SELECT `merged_data`.* FROM ((SELECT `variant_id` FROM `tophatter_product` INNER JOIN `jet_product` ON `tophatter_product`.`product_id`=`jet_product`.`bigproduct_id` WHERE `tophatter_product`.`merchant_id`=".$merchant_id." AND `jet_product`.`merchant_id`=".$merchant_id." AND `jet_product`.`type`='simple' AND `jet_product`.upc='{$barcode}') UNION (SELECT `tophatter_product_variants`.`option_id` AS `variant_id` FROM `tophatter_product_variants`  INNER JOIN `jet_product_variants` ON `tophatter_product_variants`.`option_id`=`jet_product_variants`.`option_id` WHERE `tophatter_product_variants`.`merchant_id`=".$merchant_id." AND `jet_product_variants`.option_unique_id='{$barcode}')) as `merged_data`";

        $result = Data::sqlRecords($query, 'all', 'select');


        if($result) {
            if(count($result)>1) {
                return false;
            } elseif($result[0]['variant_id'] == $variant_id) {
                return true;
            } else {
                return false;
            }
        }
        else
            return true;
    }
    public static function savebigcombrand($merchant_id="",$bigcom){
        
        $brand=$bigcom->call('GET', 'catalog/brands?limit=250');
        $pages=$brand['meta']['pagination']['total_pages'];
        $connection = Yii::$app->getDb();
        $i=1;
        if($i<=$pages){
            $brand=$bigcom->call('GET', 'catalog/brands?limit=250&page='.$i);

            if($brand['data']){
                foreach ($brand['data'] as $brand1) {
                    //print_r($brand1);die;
                    //echo $brand1['name'];die;
                    $model=JetBigcommerceBrand::find()->where(['merchant_id'=>$merchant_id])->andWhere(['name'=>addslashes($brand1['name'])])->one();
                        
                    if(!$model){
                        $sql="INSERT INTO `jet_bigcommerce_brand` (`merchant_id`,`brand_id`,`name`) VALUES ('".$merchant_id."','".$brand1['id']."','".addslashes($brand1['name'])."')";
                        $model1 = $connection->createCommand($sql)->execute();
                    }
                }
            }
            $i++;
        }
    }

    public static function saveBigcomcategory($category,$merchant_id=""){
//die("dklfjjdd");

        $connection = Yii::$app->getDb();
        if($category){
            foreach ($category['data'] as $value) {
                $product_type=$value['name'];
                $product_type=preg_replace('/\s+/', '', $product_type);
                //$product_type = preg_replace('/[^A-Za-z0-9]/', "", $product_type);
                $model=JetBigcommerceCategory::find()->where(['merchant_id'=>$merchant_id])->andWhere(['name'=>addslashes($product_type)])->one();
                if(!$model){
                    $sql="INSERT INTO `jet_bigcommerce_category` (`merchant_id`,`c_id`,`parent_id`,`name`) VALUES ('".$merchant_id."','".$value['id']."','".$value['parent_id']."','".addslashes($product_type)."')";
                    $model1 = $connection->createCommand($sql)->execute();
                }

                    $children=$value['children'];

                    

                    if(count($children)>0){
                        foreach ($children as $child) {
                            $product_type=$child['name'];
                            $product_type=preg_replace('/\s+/', '', $product_type);
                           // $product_type = preg_replace('/[^A-Za-z0-9]/', "", $product_type);
                            $model=JetBigcommerceCategory::find()->where(['merchant_id'=>$merchant_id])->andWhere(['name'=>addslashes($product_type)])->one();
                            if(!$model){
                                $sql="INSERT INTO `jet_bigcommerce_category` (`merchant_id`,`c_id`,`parent_id`,`name`) VALUES ('".$merchant_id."','".$child['id']."','".$child['parent_id']."','".addslashes($product_type)."')";
                                $model1 = $connection->createCommand($sql)->execute();
                            }

                            $subChild=$child['children'];

                            if(count($subChild)>0){
                                    foreach ($subChild as $subchildval) {
                                        $product_type=$subchildval['name'];
                                        $product_type=preg_replace('/\s+/', '', $product_type);
                                       // $product_type = preg_replace('/[^A-Za-z0-9]/', "", $product_type);
                                        $model=JetBigcommerceCategory::find()->where(['merchant_id'=>$merchant_id])->andWhere(['name'=>addslashes($product_type)])->one();
                                        if(!$model){
                                            $sql="INSERT INTO `jet_bigcommerce_category` (`merchant_id`,`c_id`,`parent_id`,`name`) VALUES ('".$merchant_id."','".$subchildval['id']."','".$subchildval['parent_id']."','".addslashes($product_type)."')";
                                            $model1 = $connection->createCommand($sql)->execute();
                                        }

                                    $sub2Child=$subchildval['children'];

                                    
                                    if(count($sub2Child)>0){
                                        foreach ($sub2Child as $sub2childval) {
                                        $product_type=$sub2childval['name'];
                                            $product_type=preg_replace('/\s+/', '', $product_type);
                                           // $product_type = preg_replace('/[^A-Za-z0-9]/', "", $product_type);
                                            $model=JetBigcommerceCategory::find()->where(['merchant_id'=>$merchant_id])->andWhere(['name'=>addslashes($product_type)])->one();
                                            if(!$model){
                                                $sql="INSERT INTO `jet_bigcommerce_category` (`merchant_id`,`c_id`,`parent_id`,`name`) VALUES ('".$merchant_id."','".$sub2childval['id']."','".$sub2childval['parent_id']."','".addslashes($product_type)."')";
                                                $model1 = $connection->createCommand($sql)->execute();
                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
            }
        }
    }
    public static function extraDeleteVariants($id,$variant_ids,$merchant_id=false)
	{
		$archiveSKU=[];
		$variantIds=Data::sqlRecords("SELECT option_id,option_sku FROM `jet_product_variants` WHERE merchant_id=".$merchant_id." AND product_id=".$id,"all","select");
		if(is_array($variantIds) && count($variantIds)>0)
		{
			foreach ($variantIds as $value) 
			{
				if(!in_array($value['option_id'], $variant_ids))
				{
					$archiveSKU[]=$value['option_sku'];
					Data::sqlRecords("DELETE FROM `jet_product_variants` WHERE merchant_id=".$merchant_id." AND option_id=".$value['option_id']);
					Data::sqlRecords("DELETE FROM `tophatter_product_variants` WHERE merchant_id=".$merchant_id." AND option_id=".$value['option_id']);
				}
			}
		}
		return $archiveSKU;
	}

     /**
      * Change the status of Product Variants to 'Item Processing'
      * When feed send to tophatter
      * 
      * @param $optionId
      * @return void
      */
    public static function chnageUploadingProductStatus($optionId)
    {
        /*$query = 'UPDATE `tophatter_product` `wp` INNER JOIN `tophatter_product_variants` `wpv` on `wp`.`product_id`=`wpv`.`product_id` SET `wp`';*/
        $status = TophatterProductModel::PRODUCT_STATUS_PROCESSING;
        $query = "UPDATE `tophatter_product_variants` `wpv` SET `wpv`.`status`='{$status}' WHERE `wpv`.`option_id`='{$optionId}'";
        Data::sqlRecords($query, null, 'update');
    }

}
?>
