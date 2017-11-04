<?php
namespace frontend\modules\tophatter\controllers;

use Yii;
use frontend\modules\tophatter\components\Data;
use frontend\modules\tophatter\components\AttributeMap;
use frontend\modules\tophatter\models\TophatterAttributeMap;

use frontend\modules\tophatter\components\ShopifyClientHelper;
use frontend\modules\tophatter\components\Tophatterapi;

use yii\data\Pagination;

class TophatterAttributemapController extends TophattermainController
{
    public function actionIndex()
    {
        $attributes = [];
        $shopify_product_types = AttributeMap::getShopifyProductTypes();

        foreach ($shopify_product_types as $type_arr) 
        {

            $product_type = $type_arr['product_type'];
            $tophatterCategoryId = $type_arr['category_id'];

            $category_path = $type_arr['category_path'];

            $parent = explode(',',$category_path);

            $tophatterAttributes = [];
            if(!is_null($TophatterCategoryId)) {
                $tophatterAttributes = AttributeMap::getTophatterCategoryAttributes($TophatterCategoryId,$parent[0])?:[];
            }

            $shopifyAttributes = AttributeMap::getShopifyProductAttributes($product_type);

            $mapped_values = AttributeMap::getAttributeMapValues($product_type);

            $attributes[$product_type] = [
                                            'product_type' => $product_type,
                                            'tophatter_attributes' => $tophatterAttributes,
                                            'shopify_attributes' => $shopifyAttributes,
                                            'mapped_values' => $mapped_values,
                                            'tophatter_category_id' => $TophatterCategoryId
                                        ];
        }
        
      $pagination = new Pagination(['totalCount' =>count($attributes), 'pageSize'=>30]);

      
        return $this->render('index',['attributes'=>$attributes, 'pagination' => $pagination]);
    }

    public function actionSave()
    {
        $data = Yii::$app->request->post();
        //print_r($data);die;
        if($data && isset($data['tophatter']))
        {
            $merchant_id = MERCHANT_ID;
            $insert_value = [];
            foreach($data['tophatter'] as $key => $value)
            {
                $shopifyProductType = addslashes($key);
                foreach ($value as $tophatter_attr => $value) {
                    $tophatterAttrCode = $tophatter_attr;
                    $attrValueType = '';
                    $attrValue = '';
                    if(is_array($value)) {
                        if(count($value) > 1) {
                            unset($value['text']);
                            $attrValueType = TophatterAttributeMap::VALUE_TYPE_SHOPIFY;
                            $attrValue = implode(',', $value);
                        } elseif(count($value) == 1) {
                            if(isset($value['text'])) {
                                $attrValueType = TophatterAttributeMap::VALUE_TYPE_TEXT;
                                $attrValue = $value['text'];
                            } else {
                                $attrValueType = TophatterAttributeMap::VALUE_TYPE_SHOPIFY;
                                $attrValue = reset($value);
                            }
                        }
                    }
                    elseif ($value != '') {
                        $attrValueType = TophatterAttributeMap::VALUE_TYPE_TOPHATTER;
                        $attrValue = $value;
                    }

                    if($attrValueType != '' && $attrValue != '')
                    {
                        $insert_value[] = "(".$merchant_id.",'".$shopifyProductType."','".addslashes($tophatterAttrCode)."','".addslashes($attrValueType)."','".addslashes($attrValue)."')";
                    }
                }
            }
            if(count($insert_value)) {
                //remove attr map from session
                AttributeMap::unsetAttrMapSession(MERCHANT_ID);

                $delete = "DELETE FROM `tophatter_attribute_map` WHERE `merchant_id`=".$merchant_id;
                Data::sqlRecords($delete, null, 'delete');

                $query = "INSERT INTO `tophatter_attribute_map`(`merchant_id`, `shopify_product_type`, `tophatter_attribute_code`, `attribute_value_type`, `attribute_value`) VALUES ".implode(',', $insert_value);
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
