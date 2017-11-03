<?php
namespace frontend\modules\walmart\controllers;

use Yii;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\AttributeMap;
use frontend\modules\walmart\models\WalmartAttributeMap;

use frontend\modules\walmart\components\ShopifyClientHelper;
use frontend\modules\walmart\components\Walmartapi;

use yii\data\Pagination;

class WalmartAttributemapController extends WalmartmainController
{
    public function actionIndex()
    {
        $attributes = [];
        $shopify_product_types = AttributeMap::getShopifyProductTypes();

        foreach ($shopify_product_types as $type_arr) 
        {

            $product_type = $type_arr['product_type'];
            $WalmartCategoryId = $type_arr['category_id'];

            $category_path = $type_arr['category_path'];

            $parent = explode(',',$category_path);

            $walmartAttributes = [];
            if(!is_null($WalmartCategoryId)) {
                $walmartAttributes = AttributeMap::getWalmartCategoryAttributes($WalmartCategoryId,$parent[0])?:[];
            }

            $shopifyAttributes = AttributeMap::getShopifyProductAttributes($product_type);

            $mapped_values = AttributeMap::getAttributeMapValues($product_type);

            $attributes[$product_type] = [
                                            'product_type' => $product_type,
                                            'walmart_attributes' => $walmartAttributes,
                                            'shopify_attributes' => $shopifyAttributes,
                                            'mapped_values' => $mapped_values,
                                            'walmart_category_id' => $WalmartCategoryId
                                        ];
        }
        
      $pagination = new Pagination(['totalCount' =>count($attributes), 'pageSize'=>30]);

      
        return $this->render('index',['attributes'=>$attributes, 'pagination' => $pagination]);
    }

    public function actionSave()
    {
        $data = Yii::$app->request->post();
        //print_r($data);die;
        if($data && isset($data['walmart']))
        {
            $merchant_id = MERCHANT_ID;
            $insert_value = [];
            foreach($data['walmart'] as $key => $value)
            {
                $shopifyProductType = addslashes($key);
                foreach ($value as $walmart_attr => $value) {
                    $walmartAttrCode = $walmart_attr;
                    $attrValueType = '';
                    $attrValue = '';
                    if(is_array($value)) {
                        if(count($value) > 1) {
                            unset($value['text']);
                            $attrValueType = WalmartAttributeMap::VALUE_TYPE_SHOPIFY;
                            $attrValue = implode(',', $value);
                        } elseif(count($value) == 1) {
                            if(isset($value['text'])) {
                                $attrValueType = WalmartAttributeMap::VALUE_TYPE_TEXT;
                                $attrValue = $value['text'];
                            } else {
                                $attrValueType = WalmartAttributeMap::VALUE_TYPE_SHOPIFY;
                                $attrValue = reset($value);
                            }
                        }
                    }
                    elseif ($value != '') {
                        $attrValueType = WalmartAttributeMap::VALUE_TYPE_WALMART;
                        $attrValue = $value;
                    }

                    if($attrValueType != '' && $attrValue != '')
                    {
                        $insert_value[] = "(".$merchant_id.",'".$shopifyProductType."','".addslashes($walmartAttrCode)."','".addslashes($attrValueType)."','".addslashes($attrValue)."')";
                    }
                }
            }
            if(count($insert_value)) {
                //remove attr map from session
                AttributeMap::unsetAttrMapSession(MERCHANT_ID);

                $delete = "DELETE FROM `walmart_attribute_map` WHERE `merchant_id`=".$merchant_id;
                Data::sqlRecords($delete, null, 'delete');

                $query = "INSERT INTO `walmart_attribute_map`(`merchant_id`, `shopify_product_type`, `walmart_attribute_code`, `attribute_value_type`, `attribute_value`) VALUES ".implode(',', $insert_value);
                Data::sqlRecords($query, null, 'insert');

                Yii::$app->session->setFlash('success', "Attributes Have been Mapped Successfully!!");
            }
        }
        return $this->redirect(['index']);
    }

    /*public function actionUpdateattribute()
    {
        $shop = Yii::$app->user->identity->username;
        $sc = new ShopifyClientHelper($shop, TOKEN, WALMART_APP_KEY, WALMART_APP_SECRET);
        $countProducts = $sc->call('GET', '/admin/products/count.json');
        $pages = ceil($countProducts/250);
        $simpleProducts = [];
        for($index=0; $index < $pages; $index++) {
            $products = $sc->call('GET', '/admin/products.json', array('published_status'=>'published','limit'=>250,'page'=>$index));
            foreach ($products as $product) 
            {
                if(count($product['variants']) == 1)
                {
                    $attr_ids = Data::getOptionValuesForSimpleProduct($product);
                    $simpleProducts[$product['id']] = $attr_ids;
                    $query = "UPDATE `jet_product` SET `attr_ids`= '".$attr_ids."' WHERE `id`=".$product['id'];
                    Data::sqlRecords($query, null, 'update');
                }
            }
        }
        print_r($simpleProducts);
    }*/
}
