<?php 
namespace frontend\modules\walmart\components;

use Yii;
use yii\base\Component;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\models\WalmartAttributeMap;

class AttributeMap extends Component
{
	const ATTRIBUTE_PATH_SEPERATOR = '->';
    /**
     * Get Shopify Product Types
     *
     * @param int|null $merchant_id
     * @return array
     */
    public static function getShopifyProductTypes($merchant_id=null)
    {
        if(is_null($merchant_id))
            $merchant_id = MERCHANT_ID;

        $query = "SELECT `product_type`,`category_id` FROM `walmart_category_map` WHERE `category_id`!='' AND `merchant_id`=".$merchant_id;
        $records = Data::sqlRecords($query, 'all');
        if($records)
            return $records;
        else
            return [];
    }

    /**
     * Get Walmart Category Attributes
     *
     * @param string $category_id
     * @return array|bool
     */
    /*public static function getWalmartCategoryAttributes($category_id)
    {
    	//echo $category_id;
        $session = Yii::$app->session;
        
        $index = self::getCatAttributeSessionIdx($category_id);
        //echo $index;
        // if(isset($session[$index]))
        // {
            //die("ghj");
        	//echo $category_id;die("dfds");
            $query = 'SELECT `title`,`parent_id`,`attributes`,`attribute_values`,`walmart_attributes`,`walmart_attribute_values` FROM `walmart_category` WHERE `category_id`="'.$category_id.'" LIMIT 0,1';
            $records = Data::sqlRecords($query, 'one');
            
            
            if($records)
            {
                $attributes = [];
                $required = [];
                if($records['attributes'] != '') {
                    $_attributes = json_decode($records['attributes'], true);

                    foreach ($_attributes as $_value) {
                        if(is_array($_value)) {
                            $key = key($_value);

                            $attr_id = $key;
                            $sub_attr = reset($_value);
                            if(is_array($sub_attr)) {
                                foreach ($sub_attr as $wal_attr_code) {
                                    if($wal_attr_code != $key){
                                        $attr_id .= self::ATTRIBUTE_PATH_SEPERATOR.$wal_attr_code;
                                    }
                                }
                            }
                            $attributes[$attr_id] = $_value[$key];
                            $required[] = $attr_id;
                        }
                        else {
                            $attributes[$_value] = $_value;
                            $required[] = $_value;
                        }
                    }
                }
                $categoryId = $category_id;
                if($records['parent_id'] != '0')
                    $categoryId = $records['parent_id'];

                $attrs = Walmartapi::isValidateVariant($categoryId);
                
                //print_r($attrs);die;
                $k1=0;

                if($records['walmart_attributes'] != '') {
                    $optionalAttrs = explode(',', $records['walmart_attributes']);
                    foreach ($optionalAttrs as $optionalAttr) {
                        $key = trim(str_replace('/', '->', $optionalAttr));
                       // if(!isset($attributes[$key]))
                       // {
                            $subAttr = explode('/', $optionalAttr);
                            if(count($attrs)>$k1){
                            $query = 'SELECT `walmart_attribute_name` FROM `walmart_confattributes` WHERE `walmart_attribute_name`="'.$attrs[$k1].'" LIMIT 0,1';
                            $records_data = Data::sqlRecords($query, 'one');
                            if($records_data){
                            	$attributes[$records_data['walmart_attribute_name']] = $records_data['walmart_attribute_name'];
                            }
                            
                            if(in_array($subAttr[0], $attrs))
                            {
                                if(count($subAttr) == 1)
                                    $attributes[$key] = $subAttr[0];
                                else
                                    $attributes[$key] = $subAttr;
                                
                            }
                        }
//                             else{
//                             	$attributes[$attrs[$k1]] = $attrs[$k1];
//                             }
                       // }
                        
                        $k1++;
                    }

                    //print_r($attributes);die;
                   // $attributes[$attrs[$k1]] = $attrs[$k1];
                    
                }
 
                
                $attribute_values = [];
                if($records['attribute_values'] != '') {
                    $_attributeValues = json_decode($records['attribute_values'], true);

                    foreach ($_attributeValues as $_attrValue) {
                        if(is_array($_attrValue)) {
                            $key = key($_attrValue);
                            $attribute_values[$key] = $_attrValue[$key];
                        }
                        else {
                            $attribute_values[$_attrValue] = $_attrValue;
                        }
                    }
                }
                if($records['walmart_attribute_values'] != '') {
                    $_attributeValues = json_decode($records['walmart_attribute_values'], true);
                    foreach ($_attributeValues as $_attrValue) {
                        if(is_array($_attrValue)) {
                            $key = key($_attrValue);
                            $attribute_values[$key] = $_attrValue[$key];
                        }
                        else {
                            $attribute_values[$_attrValue] = $_attrValue;
                        }
                    }
                }

                if($records['parent_id'])
                {
                    $parentAttributes = self::getWalmartCategoryAttributes($records['parent_id']);
                    if($parentAttributes)
                    {
                        $attributes = array_merge($attributes, $parentAttributes['attributes']);
                        $attribute_values = array_merge($attribute_values, $parentAttributes['attribute_values']);
                    }
                }

                self::addUnitAttributeValues($attribute_values);

                $data = ['attributes'=>$attributes, 'attribute_values'=>$attribute_values, 'required_attrs'=>$required, 'parent_id'=>$records['parent_id']];
                
                $session->set($index, $data);
                $session->close();

                return $data;
            }
            return false;
        // }
        // else
        // {
        //     return $session[$index];
        // }
    }*/


 public static function getWalmartCategoryAttributes1($category_id)
    {
        $session = Yii::$app->session;
        
        $index = self::getCatAttributeSessionIdx($category_id);
        if(!isset($session[$index]))
        {
            $query = 'SELECT `title`,`parent_id`,`attributes`,`attribute_values`,`walmart_attributes`,`walmart_attribute_values` FROM `walmart_category` WHERE `category_id`="'.$category_id.'" LIMIT 0,1';
            $records = Data::sqlRecords($query, 'one');
            
            if($records)
            {
                $attributes = [];
                $required = [];
                if($records['attributes'] != '') {
                    $_attributes = json_decode($records['attributes'], true);

                    foreach ($_attributes as $_value) {
                        if(is_array($_value)) {
                            $key = key($_value);

                            $attr_id = $key;
                            $sub_attr = reset($_value);
                            if(is_array($sub_attr)) {
                                foreach ($sub_attr as $wal_attr_code) {
                                    if($wal_attr_code != $key){
                                        $attr_id .= self::ATTRIBUTE_PATH_SEPERATOR.$wal_attr_code;
                                    }
                                }
                            }
                            $attributes[$attr_id] = $_value[$key];
                            $required[] = $attr_id;
                        }
                        else {
                            $attributes[$_value] = $_value;
                            $required[] = $_value;
                        }
                    }
                }
                $categoryId = $category_id;
                if($records['parent_id'] != '0')
                    $categoryId = $records['parent_id'];

                $attrs = Walmartapi::isValidateVariant($categoryId);

                if($records['walmart_attributes'] != '') {
                    $optionalAttrs = explode(',', $records['walmart_attributes']);
                    foreach ($optionalAttrs as $optionalAttr) {
                        $key = trim(str_replace('/', '->', $optionalAttr));
                        if(!isset($attributes[$key]))
                        {
                            $subAttr = explode('/', $optionalAttr);
                            if(in_array($subAttr[0], $attrs))
                            {
                                if(count($subAttr) == 1)
                                    $attributes[$key] = $subAttr[0];
                                else
                                    $attributes[$key] = $subAttr;
                            }
                        }
                    }
                }

                $attribute_values = [];
                if($records['attribute_values'] != '') {
                    $_attributeValues = json_decode($records['attribute_values'], true);

                    foreach ($_attributeValues as $_attrValue) {
                        if(is_array($_attrValue)) {
                            $key = key($_attrValue);
                            $attribute_values[$key] = $_attrValue[$key];
                        }
                        else {
                            $attribute_values[$_attrValue] = $_attrValue;
                        }
                    }
                }
                if($records['walmart_attribute_values'] != '') {
                    $_attributeValues = json_decode($records['walmart_attribute_values'], true);
                    foreach ($_attributeValues as $_attrValue) {
                        if(is_array($_attrValue)) {
                            $key = key($_attrValue);
                            $attribute_values[$key] = $_attrValue[$key];
                        }
                        else {
                            $attribute_values[$_attrValue] = $_attrValue;
                        }
                    }
                }

                if($records['parent_id'])
                {
                    $parentAttributes = self::getWalmartCategoryAttributes($records['parent_id']);
                    if($parentAttributes)
                    {
                        $attributes = array_merge($attributes, $parentAttributes['attributes']);
                        $attribute_values = array_merge($attribute_values, $parentAttributes['attribute_values']);
                    }
                }

                self::addUnitAttributeValues($attribute_values);

                $data = ['attributes'=>$attributes, 'attribute_values'=>$attribute_values, 'required_attrs'=>$required, 'parent_id'=>$records['parent_id']];
                
                $session->set($index, $data);
                $session->close();

                return $data;
            }
            return false;
        }
        else
        {
            return $session[$index];
        }
    }

     public static function getWalmartCategoryAttributes($category_id, $parent_id)
    {
        /*$session = Yii::$app->session;

        $index = self::getCatAttributeSessionIdx($category_id);
        if (!isset($session[$index])) {*/
        //new changes
        $required = [];
        $attribute_code = [];
        $attribute_options = [];
        $variant_attributes=[];

        $requiredsubCategoryAttributes = Category::getSubCategoryAttributes($parent_id, $category_id, true);

        foreach ($requiredsubCategoryAttributes as $value) {
            $attribute_codes = Category::getAttributeCode($value);

            foreach ($attribute_codes as $item)
            {
                $attribute_code[$item] = $item;
            }


            $required[] = $value['name'];


            $attributeOptions = Category::getAttributeOptions($value);

            $attribute_options = array_merge($attribute_options,$attributeOptions);
        }

        $categoryVariantAttributes = Category::getCategoryVariantAttributes($parent_id);

        $subCategoryAttributes = Category::getCategoryAttributes($parent_id, false);

        foreach ($categoryVariantAttributes as $key => $values) {
            if (array_key_exists($values, $subCategoryAttributes)) {

                $attribute_codes = Category::getAttributeCode($subCategoryAttributes[$values]);

                foreach ($attribute_codes as $item)
                {
                    $attribute_code[$item] = $item;
                    $variant_attributes[$item] = $item;
                }

                $attributeOptions = Category::getAttributeOptions($subCategoryAttributes[$values]);

                $attribute_options = array_merge($attribute_options,$attributeOptions);

            }

        }


        /*if(is_array($attribute_options))
        {
            foreach ($attribute_options as $key => $value)
            {
                $attribute_options[$key] = implode(',',$value);
            }
        }*/

        $data = ['attributes' => $attribute_code, 'attribute_values' => $attribute_options, 'variant_attributes'=>$variant_attributes,'required_attrs' => $required, 'parent_id' => $parent_id];

        /*$session->set($index, $data);
        $session->close();*/

        return $data;

        /*} else {
            unset($session[$index]);
            return $session[$index];
        }*/
    }

    
    /**
     * Add Attribute Values For Unit Type Attributes
     *
     * @param &$attributeValues
     */
     private function addUnitAttributeValues(&$attributeValues)
    {
        $unitAttrValues = [
                    'chainLength->unit'=>'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
                    'pantSize->waistSize->unit'=>'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
                    'waistSize->unit'=>'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
                    'screenSize->unit'=>'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
                    'ramMemory->unit'=>'Terabytes,Kibibytes,Mebibytes,Gibibytes,Kilobytes,Gigabytes,Tebibytes,Megabyte',
                    'hardDriveCapacity->unit'=>'Terabytes,Kibibytes,Mebibytes,Gibibytes,Kilobytes,Gigabytes,Tebibytes,Megabyte',
                    'cableLength->unit'=>'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
                    'heelHeight->unit'=>'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
                    'carats->unit'=>'Carat',
                    'focalLength->unit'=>'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
                    'displayResolution->unit'=>'Dots Per Square Inch,Pixels Per Inch,Volumetric Pixels,Megapixels,Resolution Element,Surface Element,Dots Per Inch,Texels',
                    'volts->unit'=>'Volts',
                    'amps->unit'=>'Amps',
                    'gallonsPerMinute->unit'=>'',
                    'minimumWeight->unit'=>'Kilograms Per Meter,Kilograms,Milligrams,Ounces,Pounds,Grams,Carat',
                    'maximumWeight->unit'=>'Kilograms Per Meter,Kilograms,Milligrams,Ounces,Pounds,Grams,Carat'
                    ];

        $attributeValues = array_merge($attributeValues,$unitAttrValues);
    }
    
    public static function getCatAttributeSessionIdx($category_id)
    {
    	$index = 'walmart_cat_attributes_for_'.addslashes($category_id);
    	return $index;
    }
    /**
     * Get Shopify Product Attributes
     *
     * @param string $product_type
     * @param int|null $merchant_id
     * @return array
     */
    public static function getShopifyProductAttributes($product_type, $merchant_id=null)
    {
        if(is_null($merchant_id))
            $merchant_id = MERCHANT_ID;

        $query = 'SELECT `bigcom_attr` FROM `jet_product` WHERE `product_type`="'.$product_type.'" AND `merchant_id`='.$merchant_id;
        
        $records = Data::sqlRecords($query, 'all');
        
        
        $bigcommerce_attributes = [];
        if($records)
        {
            foreach ($records as $value) {

                // if($value['attr_ids'] != '') {
                    $attr_ids = json_decode($value['bigcom_attr']);
                    if($attr_ids){
                        foreach ($attr_ids as $option_id => $attr_id) {
                            if(!in_array($attr_id, $bigcommerce_attributes))
                                $bigcommerce_attributes[] = $attr_id;
                        }

                    }
               // }
            }
        }
        
        //print_r($shopify_attributes);
        return $bigcommerce_attributes;
    }

    /**
     * get Saved Values of Attribute Mapping
     *
     * @param string $product_type
     * @param int|null $merchant_id
     * @return array
     */
    public static function getAttributeMapValues($product_type, $merchant_id=null)
    {
        if(is_null($merchant_id))
            $merchant_id = MERCHANT_ID;

        $query = 'SELECT `walmart_attribute_code`,`attribute_value_type`,`attribute_value` FROM `walmart_attribute_map` WHERE `shopify_product_type`="'.$product_type.'" AND `merchant_id`='.$merchant_id;
        
        $records = Data::sqlRecords($query, 'all');

        $mapped_values = [];
        if($records)
        {
            foreach ($records as $value) {
                if($value['attribute_value'] != '') {
                    $mapped_values[$value['walmart_attribute_code']] = ['type'=>$value['attribute_value_type'], 'value'=>$value['attribute_value']];
                }
            }
        }
        return $mapped_values;
    }

    /**
     * Get all Mappings for Shopify Attributes
     *
     * @param string $product_type
     * @param int|null $merchant_id
     * @return array
     */
    public static function getMappedWalmartAttributes($shopify_product_type, $option_id, $merchant_id=null)
    {
        $mapped_attributes = [];
        $attribute_values = [];
        $common_attributes = [];

        $attributeMapValues = self::getAttributeMapValues($shopify_product_type);
        //print_r($attributeMapValues);die;
        foreach ($attributeMapValues as $walAttrCode => $walAttrValue) {
            if($walAttrValue['type'] == WalmartAttributeMap::VALUE_TYPE_SHOPIFY) {
                $mapped_attributes[$walAttrCode] = $walAttrValue['value'];
            }
            elseif($walAttrValue['type'] == WalmartAttributeMap::VALUE_TYPE_TEXT || 
                $walAttrValue['type'] == WalmartAttributeMap::VALUE_TYPE_WALMART) {
                $common_attributes[$walAttrCode] = $walAttrValue['value'];
            }
        }

        $shopify_attribute_map = [];
        $productOptionValues = self::getOptionValuesForProduct($option_id,$merchant_id);
        foreach ($productOptionValues as $key => $value) {
            foreach ($mapped_attributes as $wal_attr => $map_value) {
                if(in_array($key, explode(',', $map_value))) {
                    $shopify_attribute_map[$key] = [$wal_attr];
                    $attribute_values[$wal_attr] = $value;
                }
            }
        }

        if(count($shopify_attribute_map))
            $shopify_attribute_map = json_encode($shopify_attribute_map);
        else
            $shopify_attribute_map = '';

        if(count($attribute_values))
            $attribute_values = json_encode($attribute_values);
        else
            $attribute_values = '';

        if(count($common_attributes))
            $common_attributes = json_encode($common_attributes);
        else
            $common_attributes = '';

        return [
                    'mapped_attributes' => $shopify_attribute_map, 
                    'attribute_values' => $attribute_values, 
                    'common_attributes' => $common_attributes
                ];
    }

    /**
     * Get Shopify Option Values for Product
     *
     * @param int $product_option_id
     * @return array
     */
    public static function getOptionValuesForProduct($product_option_id,$merchant_id)
    {


        $query = 'SELECT `product_id` FROM `jet_product_variants` WHERE `option_id`="'.$product_option_id.'" ';
        
        $records = Data::sqlRecords($query, 'one');
        
        // $query = "SELECT `jp`.`additional_info`,`jpv`.`variant_option1`,`jpv`.`variant_option2`,`jpv`.`variant_option3` FROM `jet_product_variants` `jpv` INNER JOIN `jet_product` `jp` ON `jp`.`bigproduct_id`=`jpv`.`product_id` WHERE  `jpv`.`option_id`=".$product_option_id."  LIMIT 0,1";

        // $records = Data::sqlRecords($query, 'one');

        $query = 'SELECT `bigcom_attr` FROM `jet_product` WHERE `bigproduct_id`="'. $records['product_id'].'" and `merchant_id`="'.$merchant_id.'"';
        
        $records = Data::sqlRecords($query, 'one');


        $attributes=$records['bigcom_attr'];

        $values = [];
        if($records)
        {
            $bigcommerce_attributes = $attributes;
            
            if($bigcommerce_attributes){
	            if(is_array($bigcommerce_attributes))
	                $bigcommerce_attributes = array_values($bigcommerce_attributes);
				//print_r($shopify_attributes);die;
	            foreach ($bigcommerce_attributes as $key=>$attr) {
	                    $values[$attr] = $records['variant_option'.($key+1)];
	            }
            }
        }
        //print_r($values);die;
        return $values;
    }

    /**
     * To check if attributes are mapped for the given shopify product type
     *
     * @param int $product_option_id
     * @return array
     */
    public static function isProductTypeAttributeMapped($product_type)
    {
        $query = 'SELECT `id` FROM `walmart_attribute_map` WHERE `shopify_product_type`="'.$product_type.'" LIMIT 0,1';

        $records = Data::sqlRecords($query, 'one');

        if($records)
            return true;
        else
            return false;
    }

    public static function unsetAttrMapSession()
    {
        $session = Yii::$app->session;
        $main_index = self::getAttrMapSessionMainIdx(MERCHANT_ID);
        $session->remove($main_index);
        $session->close();
    }

    public static function getAttrMapSessionMainIdx($merchant_id)
    {
        $index = 'walmart_attribute_map_'.$merchant_id;
        return $index;
    }

}
