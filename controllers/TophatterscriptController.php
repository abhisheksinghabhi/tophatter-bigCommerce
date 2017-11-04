<?php
namespace frontend\modules\tophatter\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use frontend\modules\tophatter\components\Data;
use frontend\modules\tophatter\models\TophatterProduct;
use frontend\modules\tophatter\components\Jetappdetails;
use frontend\modules\tophatter\components\Tophatterapi;
use frontend\modules\tophatter\components\TophatterCategory;
use frontend\modules\tophatter\components\TophatterRepricing;
use frontend\modules\tophatter\components\BigcommerceClientHelper;
use frontend\modules\tophatter\components\Jetproductinfo;

class TophatterscriptController extends TophattermainController
{
	const MAX_SHORT_DESCRIPTION = 1000;
	const MAX_SHELF_DESCRIPTION = 1000;
	const MAX_LONG_DESCRIPTION = 4000;

	public function actionDeleteproduct()
    {
    	$product_ids = Yii::$app->request->post('product_id',false);

    	$retire = Yii::$app->request->post('retire');

    	if(!is_array($product_ids))
    		$product_ids = explode(',', $product_ids);

		if($product_ids && count($product_ids))
		{
			$merchant_id = MERCHANT_ID;

            try {
            	$tophatterApi = new Tophatterapi(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);

            	$errors = [];

            	foreach ($product_ids as $product_id) {

            		$productData = TophatterRepricing::getProductData($product_id);

            		
            		if($productData && isset($productData['type']))
            		{
            			if($productData['type'] == 'simple')
            			{
            				$deleteProductFlag = false;
            				if($retire && $productData['status'] != TophatterProduct::PRODUCT_STATUS_NOT_UPLOADED)
            				{
            					$sku = $productData['sku'];
	            				$feed_data = [];
	            				$feed_data = $tophatterApi->retireProduct($sku);

			                    if(isset($feed_data['ItemRetireResponse']))
			                    {
			                        $deleteProductFlag = true;
			                    }
			                    elseif (isset($feed_data['errors']['error']))
			                    {
			                        if(isset($feed_data['errors']['error']['code']) && $feed_data['errors']['error']['code'] == "CONTENT_NOT_FOUND.GMP_ITEM_INGESTOR_API" && $feed_data['errors']['error']['field'] == "sku")
			                        {
			                            $errors[$sku][] = $sku.' : Product not Uploaded on Tophatter.';
			                        }
			                        else
			                        {
			                            $errors[$sku][] = $sku.' : '.$feed_data['errors']['error']['description'];
			                        }
			                    } 
		                	} 
		                	else 
		                	{
		                		$deleteProductFlag = true;
		                	}

		                	if($deleteProductFlag) {
            					$deleteQuery = "DELETE FROM `jet_product` WHERE `bigproduct_id`='{$product_id}'";
	    						Data::sqlRecords($deleteQuery, null, 'delete');
	    						Yii::$app->session->setFlash('success', 'Product has been Deleted.');
            				}
            			}
            			elseif($productData['type'] == 'variants')
            			{
            				$productVariants = TophatterRepricing::getProductVariants($product_id);
            				if($productVariants)
            				{
						if($retire)
            					{
            						$variantErr = [];
            						$deleteProductFlag2 = true;
	            					foreach ($productVariants as $variant) {
	            						$sku = $variant['option_sku'];

	            						if($variant['status']!=TophatterProduct::PRODUCT_STATUS_NOT_UPLOADED)
	            						{
		            						$feed_data = [];
		            						$feed_data = $tophatterApi->retireProduct($sku);

						    		   if(isset($feed_data['ItemRetireResponse']))
						                    {
						                        continue;
						                    }
						                    elseif (isset($feed_data['errors']['error']))
						                    {
						                        if(isset($feed_data['errors']['error']['code']) && $feed_data['errors']['error']['code'] == "CONTENT_NOT_FOUND.GMP_ITEM_INGESTOR_API" && $feed_data['errors']['error']['field'] == "sku")
						                        {
						                        	//product not uploaded, so it can not be retired.
						                            continue;
						                        }
						                        else
						                        {
						                            $variantErr[] = $sku.' : '.$feed_data['errors']['error']['description'];
						                            $deleteProductFlag2 = false;
						                            break;
						                        }
						                    }
					                	}
	            					}

	            					if(count($variantErr)) {
	            						$errors[$productData['sku']] = implode(',', pieces);
	            					}
	            					elseif($deleteProductFlag2)
	            					{
		            					self::deleteProduct(['id'=>$product_id],true);

            							$deleteQuery = "DELETE FROM `jet_product` WHERE `bigproduct_id`='{$product_id}'";
	    							Data::sqlRecords($deleteQuery, null, 'delete');
	    							Yii::$app->session->setFlash('success', 'Product has been Deleted.');
            						}
            					}
            					else
            					{
            						self::deleteProduct(['id'=>$product_id],true);

            						$deleteQuery = "DELETE FROM `jet_product` WHERE `bigproduct_id`='{$product_id}'";
	    							Data::sqlRecords($deleteQuery, null, 'delete');
	    							Yii::$app->session->setFlash('success', 'Product has been Deleted.');
            					}
            				}
            				else
            				{
            					$errors[$productData['sku']] = "no variants found for this product.";
            				}
            			}
            		}
            	}
            	if(count($errors))
            		return json_encode(['error'=>true, 'message'=>implode(',', $errors)]);
            	else
            		return json_encode(['success'=>true, 'message'=>"Product(s) Deleted Successfully!!"]);
    		} catch(Exception $e) {
    			return json_encode(['error'=>true, 'message'=>"Error : ".$e->getMessage()]);
    		}
		}
		else
		{
			return json_encode(['error'=>true, 'message'=>"No product selected for delete."]);
		}
    }

	public function actionBigcomproductsync()
    {
        $product_ids = Yii::$app->request->post('product_id',false);
 
        parse_str(Yii::$app->request->post('sync_fields'),$sync);

		if($product_ids && strlen($product_ids) && count($sync['sync-fields']))
		{
            $merchant_id = MERCHANT_ID;
            $shopname = SHOP;
            $token = TOKEN;
            $jProduct = 0;
            try 
    		{
				
	            if($this->bigcom)
	                $this->bigcom = new BigcommerceClientHelper(TOPHATTER_APP_KEY,TOKEN,STOREHASH);
	            
	            $limit = 250;
	            $import_option = Data::getConfigValue($merchant_id, 'import_product_option');

	            $resource='catalog/products/'.$product_ids.'?include_fields=name,categories,brand_id,description,sale_price,inventory_level&include=variants';
	            
	            $products = $this->bigcom->call('GET', $resource);

	            if(isset($products['errors']))
	            {
	                $returnArr['error'] = $products['errors'];
	                return json_encode($returnArr);
	            }
	            if (isset($products['data'])) 
	            {
	               $response = Jetproductinfo::updateDetails($products['data'],$sync,$merchant_id,$this->bigcom,false);
	               
	               if($response){
	            		return json_encode(['success'=>true, 'message'=>'Product Synced Successfully!!']);
	            	}
	            	else{
	            		return json_encode(['success'=>true, 'message'=>'No Change in Product!!']);
	            	}
	              // Yii::$app->session->setFlash('success', "No product selected for sync");
        		   //return Url::toRoute('walmartproduct/index');
	             
	            } 
	            else 
	            {
	                /*return json_encode(['error'=>true, 'message'=>"Product doesn't exist on Shopify."]);*/
	                $returnArr = ['error' => true, 'message' => "Product doesn't exist on BigCommerce."];
	                //Yii::$app->session->setFlash('success', "No product selected for sync");
        			//return Url::toRoute('walmartproduct/index');
	            }

	           
			} catch (Exception $e)
			{
				return json_encode(['error'=>true, 'message'=>"Error : ".$e->getMessage()]);
			}
        }
        else 
        {
        	return json_encode(['error'=>true, 'message'=>"No product selected for sync."]);
        	//Yii::$app->session->setFlash('success', "No product selected for sync");
        	//return Url::toRoute('walmartproduct/index');
        }
    }

    public static function getImage($images, $image_id)
    {
    	if(count($images))
    	{
    		foreach ($images as $image) {
    			if($image['id'] == $image_id) {
    				return $image;
    			}
    		}
    	}
    	return ['src'=>''];
    }

    public static function getImplodedImages($images)
    {
    	$img_arr = [];
    	if(count($images))
    	{
    		foreach ($images as $image) {
    			$img_arr[] = $image['src']; 
    		}
    	}
    	return implode(',', $img_arr);
    }

    public static function deleteProduct($product,$all=false)
    {
    	if(is_array($product) && count($product))
    	{
    		$product_id = $product['id'];

    		if($all)
    		{
    			$deleteQuery = "DELETE FROM `jet_product_variants` WHERE `product_id`='{$product_id}'";
	    		return Data::sqlRecords($deleteQuery, null, 'delete');
    		}
    		elseif(!$all)
    		{
	    		$variants = Data::sqlRecords("SELECT `option_id` FROM `jet_product_variants` WHERE `product_id`='{$product_id}'", 'all', 'select');

	    		if($variants)
	    		{
	    			$current_variants = [];
	    			foreach ($variants as $variant) {
	    				$current_variants[] = $variant['option_id'];
	    			}

	    			$new_variants = [];
	    			foreach ($product['variants'] as $value) {
	    				$new_variants[] = $value['id'];
	    			}

	    			$productsToDelete = array_diff($current_variants, $new_variants);

	    			if(count($productsToDelete)) {
	    				$deleteQuery = "DELETE FROM `jet_product_variants` WHERE `option_id` IN (".implode(',', $productsToDelete).")";
	    				return Data::sqlRecords($deleteQuery, null, 'delete');
	    			}
	    		}
    		}
    	}
    	return false;
    }

    /**
	 *	Import products,product_types from jet_product,jet_product_variants tables
	 */
	public function actionIndex()
    {
    	$merchant_id = '';

    	$query = "SELECT `product_id` FROM `tophatter_product`";

    	if($merchant_id != '')
    		$query .=  " WHERE merchant_id=".$merchant_id;

		$tophatter_data  = Data::sqlRecords($query, "all", "select");

		$tophatter_skus = '';
		if($tophatter_data && is_array($tophatter_data) && count($tophatter_data))
		{
			foreach ($tophatter_data as $key=>$_tophatter) {
				$tophatter_skus .= $_tophatter['product_id'];
				if(isset($tophatter_data[$key+1]))
					$tophatter_skus .= ',';
			}
		}

		$query = "SELECT * FROM `jet_product`";
		if($tophatter_skus != '')
		{
			$query .= " WHERE `id` NOT IN (".$tophatter_skus.")";

			if($merchant_id != '')
    			$query .=  " AND merchant_id=".$merchant_id;
    	}
    	else
    	{
    		if($merchant_id != '')
    			$query .=  " WHERE merchant_id=".$merchant_id;
    	}

		$jet_data  = Data::sqlRecords($query, "all", "select");
		if($jet_data && is_array($jet_data) && count($jet_data))
		{
			$insert_data = [];
			foreach ($jet_data as $jet_product) {
				$value_str = "(";
				$value_str .= $jet_product['id'].",";//product_id
				$value_str .= $jet_product['merchant_id'].",";//merchant_id
				$value_str .= "'".addslashes($jet_product['product_type'])."',";//product_type
				$value_str .= "'',";//category
				$value_str .= "'',";//tax_code
				//$value_str .= $jet_product[''].',';//min_price
				$value_str .= "'".addslashes(self::getData($jet_product['description'], self::MAX_SHORT_DESCRIPTION))."',";//short_description
				$value_str .= "'".addslashes(self::getData($jet_product['title'],self::MAX_SHELF_DESCRIPTION))."',";//self_description
				$value_str .= "'Not Uploaded'";//status
				$value_str .= ")";
				$insert_data[] = $value_str;

				echo "Inserted product id : ".$jet_product['id']."<br>";

				//save product variants
				if($jet_product['type'] == 'variants')
					self::ImportVariants($jet_product['id'], $jet_product['merchant_id']);

				//save product_type
				self::InsertProductType($jet_product['product_type'], $jet_product['merchant_id']);

				echo "<br>---------------------********************----------------------<br>";
			}

			$query = "INSERT INTO `tophatter_product`(`product_id`, `merchant_id`, `product_type`, `category`, `tax_code`, `short_description`, `self_description`, `status`) VALUES ".implode(',', $insert_data);
			Data::sqlRecords($query, null, "insert");
		}
		else
		{
			echo "No Products to Import!!";
		}
    }

	public static function ImportVariants($product_id,$merchant_id)
	{
		$tophatter_query = "SELECT `option_id` FROM `tophatter_product_variants` WHERE `product_id`=".$product_id." AND `merchant_id`=".$merchant_id;
		$tophatter_product_variants = Data::sqlRecords($tophatter_query, "all", "select");

		$option_ids = '';
		if($tophatter_product_variants && is_array($tophatter_product_variants))
		{
			foreach ($tophatter_product_variants as $key=>$product_variants) {
				$option_ids .= $product_variants['option_id'];
				if(isset($tophatter_product_variants[$key+1]))
					$option_ids .= ',';
			}
		}

		$query = "SELECT * FROM `jet_product_variants` WHERE `product_id`=".$product_id;
		if($option_ids != '')
			$query .= " AND `option_id` NOT IN (".$option_ids.")";

		$jet_variants  = Data::sqlRecords($query, "all", "select");
		if($jet_variants && is_array($jet_variants))
		{
			$insert_data = [];
			foreach ($jet_variants as $variant) {
				$value_str = "(";
				$value_str .= $variant['option_id'].",";//option_id
				$value_str .= $variant['product_id'].",";//product_id
				$value_str .= $variant['merchant_id'].",";//merchant_id
				$value_str .= "'".addslashes($variant['variant_option1'])."',";//new_variant_option_1
				$value_str .= "'".addslashes($variant['variant_option2'])."',";//new_variant_option_2
				$value_str .= "'".addslashes($variant['variant_option3'])."',";//new_variant_option_3
				$value_str .= "'Not Uploaded'";//status
				$value_str .= ")";
				$insert_data[] = $value_str;

				echo "Inserted product variants id : ".$variant['option_id']."<br>";
			}

			$query = "INSERT INTO `tophatter_product_variants`(`option_id`, `product_id`, `merchant_id`, `new_variant_option_1`, `new_variant_option_2`, `new_variant_option_3`, `status`) VALUES ".implode(',', $insert_data);
			Data::sqlRecords($query, null, "insert");
		}
	}

	public static function InsertProductType($product_type, $merchant_id)
	{
		$query = "SELECT * FROM `tophatter_category_map` WHERE `merchant_id` = ".$merchant_id." AND `product_type` LIKE '".$product_type."' LIMIT 0,1";

		$data = Data::sqlRecords($query, "one", "select");

		if(!$data)
		{
			$query = "INSERT INTO `tophatter_category_map`(`merchant_id`, `product_type`) VALUES (".$merchant_id.",'".addslashes($product_type)."')";
			Data::sqlRecords($query, null, "insert");

			echo "Inserted product type : ".$product_type."<br>";
		}
	}

	public static function getData($string, $length)
	{
		if(strlen($string) > $length)
		{
			$string = substr($string, 0, $length);
		}
		return $string;
	}

	/**
	 *	Create Webhooks
	 */
	public function actionCreatewebhooks()
	{
		$sc = new BigcommerceClientHelper(SHOP, TOKEN, TOPHATTER_APP_KEY, TOPHATTER_APP_SECRET);
		Data::createWebhooks($sc);
	}

	/**
	 *	Import Products from Shopify
	 */
	public function actionImportproducts()
	{
		/*$sc = new BigcommerceClientHelper(SHOP, TOKEN, WALMART_APP_KEY, WALMART_APP_SECRET);
		$countUpload=0;
		$countUpload=$sc->call('GET', '/admin/products/count.json', array('published_status'=>'published'));*/
	}

	public function actionTest()
	{
		$category = 'Jewelry';
		var_dump(TophatterCategory::getCategoryVariantAttributes($category));
	}

}
