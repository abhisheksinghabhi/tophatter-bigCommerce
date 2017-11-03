<?php 
namespace frontend\modules\walmart\components;

use Yii;
use yii\base\Component;
use frontend\modules\walmart\models\WalmartAttributeMap;
 
class Category extends Component
{
    public $_product = null;
    public $_productArray = null;
    public $_merchantId = null;
    public $_variantArray = null;

    const KEY_PREFIX = 'attr_key';

    public function __construct($merchantId, $product, $productArray, $variantArray=null)
    {
        $this->_product = $product;
        $this->_productArray = $productArray;
        $this->_merchantId = $merchantId;
        $this->_variantArray = $variantArray;
    }

    /**
     * Get attributes which should not be in common required attributes.
     * so that it should not add in common attributes section in product form.
     * 
     * @return array
     */
    public static function getSystemAttributes()
    {
        return ['shortDescription', 'brand', 'mainImageUrl', 'productSecondaryImageURL', 'variantGroupId', 'variantAttributeNames', 'isPrimaryVariant'];
    }

    /**
     * Prepare Category Data for the product that is going to be uploaded.
     *
     * @param array &$additionalProductAttributes //set additional product attributes in this variable.
     * @return array
     */
    public function prepareCategoryData(&$additionalProductAttributes)
    {
        $categoryData = [];

        $parentCategory = trim($this->_productArray['parent_category']);
        $childCategory = trim($this->_productArray['category']);

        if($parentCategory == '' || $childCategory == '') {
            return ['status' => false, 'error' => "Please Map Category."];
        }
        
        $attributes = $this->getSubCategoryAttributes($parentCategory, $childCategory);


        $attributeValues = $this->prepareAttributeValues();

        if((is_array($attributes) && count($attributes)) && (is_array($attributeValues) && count($attributeValues)))
        {
            foreach ($attributeValues as $code => $attributeValue) 
            {
                if(strpos($code, AttributeMap::ATTRIBUTE_PATH_SEPERATOR) !== false)
                {
                    $codes = explode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $code);

                    $lastNode = count($codes)-1;

                   /**
                    * In case of "swatchImages->swatchImage->swatchVariantAttribute" valueIndex => "swatchVariantAttribute"
                    */
                    $valueIndex = $codes[$lastNode];

                   

                   /**
                    * In case of "swatchImages->swatchImage->swatchVariantAttribute" mainIndex => "swatchImages"
                    */
                    $mainIndex = $codes[0];
                    
                }
                else
                {
                    $valueIndex = $mainIndex = $code;
                }



                if(isset($attributes[$mainIndex])) 
                {
                    $attribute = $attributes[$mainIndex];
                    $formattedAttrValue = self::getFormattedAttributeValue($attribute, $attributeValue, $valueIndex);

                    
                    $categoryData = array_merge_recursive($categoryData, $formattedAttrValue);
                }
                else
                {
                    $additionalProductAttributes[$code] = $attributeValue;
                }
            }
        }


        self::removeKeywords($categoryData, self::KEY_PREFIX);
        
        $validate = self::validateCategoryData($parentCategory, $childCategory, $categoryData);
        if(!$validate['status']) {
            $error = isset($validate['error']) ? $validate['error'] : 'Required Category Attributes not filled.';
            return ['status' => false, 'error' => $error];
        }

        return [ $parentCategory => [ $childCategory => $categoryData ] ];
    }

    /**
     * Get attributes for the given category.
     *
     * @param string $parentCategory
     * @param boolean $addSubCategoryIndex
     *        Set this to 'true' if you want to get sub-category wise attributes 
     *        and 'false' if you want all attributes to be grouped together
     * @return array
     */
    public static function getCategoryAttributes($parentCategory, $addSubCategoryIndex=true)
    {

        //$dir = Yii::getAlias('@webroot') . '/frontend/modules/walmart/components/Attributes/' . $parentCategory;
        $dir = __DIR__ . '/Attributes/' . $parentCategory;
        $filePath = $dir . '.php';

        $attributes = [];

        if (file_exists($filePath)) {
            $attributes = require $filePath;

            if($addSubCategoryIndex) {
                return $attributes;
            } else {
                $allSubCategoryAttributes = [];
                foreach ($attributes as $subCategory => $subCategoryAttributes) {
                    $allSubCategoryAttributes = array_merge($allSubCategoryAttributes, $subCategoryAttributes);
                }
                return $allSubCategoryAttributes;
            }
        }
        return $attributes;
    }

    /**
     * Get attributes for the given pair of category and sub-category.
     *
     * @param string $parentCategory
     * @param string $childCategory
     * @param boolean $requiredOnly
     *        Set this to 'true' if you want to only required attributes
     *        and 'false' if you want all attributes
     * @return array
     */
    public static function getSubCategoryAttributes($parentCategory, $childCategory, $requiredOnly=false)
    {
        $attributes = self::getCategoryAttributes($parentCategory);
        //print_R($attributes);die;

        if(!$requiredOnly) {
            return isset($attributes[$childCategory])?$attributes[$childCategory]:[];
        } else {
            $requiredAttrs = [];
            if(isset($attributes[$childCategory]))
            {
                $systemAttributes = self::getSystemAttributes();
                foreach ($attributes[$childCategory] as $key=>$attribute) {
                    if(isset($attribute['requiredLevel']) && $attribute['requiredLevel'] == 'Required' && !in_array($key, $systemAttributes)) {
                        $requiredAttrs[$key] = $attribute;
                    }
                }
            }


            return $requiredAttrs;
        }
    }

    /**
     * Get variant attributes for the given category.
     *
     * @param string $parentCategory
     * @return array
     */
    public static function getCategoryVariantAttributes($parentCategory)
    {
        $variantAttributes = [];

        $attributes = self::getCategoryAttributes($parentCategory);

        if(count($attributes))
        {
            $attribute = current($attributes);

            if(isset($attribute['variantAttributeNames']['child'][0]['optionValues']))
            {
                $variantAttributes = $attribute['variantAttributeNames']['child'][0]['optionValues'];
            }
        }
        
        return $variantAttributes;
    }

    /**
     * Prepare all mapped attribute values for the product that is going to be uploaded.
     *
     * @return array
     */
    public function prepareAttributeValues()
    {
        $productArray = $this->_productArray;

        /*$attributeValues = json_decode('{"shortDescription":"test description","brand":"Test Brand","mainImageUrl":"http://www.test.com/image.jpg", "colorCategory->colorCategoryValue":"Blue", "swatchImages->swatchImage->swatchVariantAttribute":["color","size"], "swatchImages->swatchImage->swatchImageUrl":["color image url", "size image url"]}', true);*/

        /**
         * Mapping of shopify options with walmart attributes at product level
         * For Example : {"Title":["color->colorValue"]}
         */

        //print_r($productArray);die;

        $walmart_attributes = [];
        if ($productArray['walmart_attributes'] != '') {
            $walmart_attributes = $productArray['walmart_attributes'];
            $walmart_attributes = self::getDecodedWalmartAttributes($walmart_attributes);
        }

        /**
         * All Required walmart attribute values
         * For Example : {"shirtSize":"30","color->colorValue":"Blue"} OR 
         *               {"carats->unit":"Carat","chainLength->unit":"Inches","gender":"Women","jewelryStyle":"Fashion"}
         */
        $common_attributes = [];
        if (trim($productArray['common_attributes'])) {
            $common_attributes = json_decode($productArray['common_attributes'], true);
        }

        $variation_information = [];
        $variantAttributesName = [];
        $walmart_optional_attributes = [];

        $attributeValues = [];

        $basicRequiredAttributes['shortDescription'] = '<![CDATA[' . $this->_product['description'] . ']]>';
        $basicRequiredAttributes['brand'] = $this->_product['brand'];
        $basicRequiredAttributes['mainImageUrl'] = $this->_product['images'][0];
        $basicRequiredAttributes['productSecondaryImageURL'] = self::prepareSecondaryImageUrls($this->_product['images']);

        if($productArray['type'] == 'simple')
        {
            /**
             * All Optional walmart attribute values
             * For Example : {"swatchImages->swatchImage->swatchImageUrl":"image url", "swatchImages->swatchImage->swatchVariantAttribute":"Attribute Name"} OR 
             *               {"swatchImages->swatchImage->swatchVariantAttribute":["color","size"], "swatchImages->swatchImage->swatchImageUrl":["color image url", "size image url"]}
             */
            if (trim($productArray['walmart_optional_attributes'])) {
                $walmart_optional_attributes = json_decode($productArray['walmart_optional_attributes'], true);
            }

            /**
             * value of column `attr_ids` in `jet_product` table is of form {"Size":"s","Color":"black"} for simple products
             * and for variants {"9992728017":"Color"}
             */
            $shopifyOptionValues = json_decode($productArray['bigcom_attr'], true) ?: [];
        }
        else
        {
            $variantArray = $this->_variantArray;


            /**
             * All Optional walmart attribute values of variant
             * For Example : {"swatchImages->swatchImage->swatchImageUrl":"image url", "swatchImages->swatchImage->swatchVariantAttribute":"Attribute Name"} OR 
             *               {"swatchImages->swatchImage->swatchVariantAttribute":["color","size"], "swatchImages->swatchImage->swatchImageUrl":["color image url", "size image url"]}
             */
            if (trim($variantArray['walmart_optional_attributes'])) {
                $walmart_optional_attributes = json_decode($variantArray['walmart_optional_attributes'], true);
            }

            $attr_ids = $productArray['bigcom_attr'];


            $shopify_options = json_decode(stripslashes($attr_ids), true) ? : [];

            //$shopify_options=array('0'=>'Size');
            $options = [
                        'variant_option1' => $variantArray['variant_option1'],
                        'variant_option2' => $variantArray['variant_option2'],
                        'variant_option3' => $variantArray['variant_option3'],
                        ];
            $shopifyOptionValues = self::getOptionValuesForVariants($shopify_options, $options);

           


            /**
             * Check Shopify Options are mapped with which walmart attributes
             * and those walmart attributes will be variant attributes
             */
            foreach ($shopify_options as $shopifyOption) 
            {
                if(in_array($shopifyOption, $walmart_attributes)) {
                    $key = array_search($shopifyOption, $walmart_attributes);
                    $key = Walmartapi::explodeAttributes($key);
                    $variantAttributesName[$shopifyOption] = $key[0];
                }
            }
        }



        $attrMapValues = AttributeMap::getAttributeMapValues($productArray['product_type']);

    
        if(count($attrMapValues))
        {

            foreach ($attrMapValues as $walAttrCode => $walAttrValue) 
            {
                /**
                 * override global attribute mapping with product level attribute mapping
                 * when walmart attribute is mapped with shopify option
                 */
                if ($walAttrValue['type'] == WalmartAttributeMap::VALUE_TYPE_SHOPIFY) 
                {

                    if(isset($walmart_attributes[$walAttrCode])) {
                        if (isset($shopifyOptionValues[$walmart_attributes[$walAttrCode]])) {
                            $attributeValues[$walAttrCode] = $shopifyOptionValues[$walmart_attributes[$walAttrCode]];
                        }
                    } 
                    else { 
                        /**
                         * IF from attribute mapping panel, wal attr is mapped with multiple shopify options then
                         * We will find that shopify option which belongs to current product 
                         * and set its value in corresponding wal attr.
                         * If multiple options of same product are mapped with one wal attr then we will set
                         * value of first option (in sequence) in wal attr.
                         */                
                        $mappedShopifyOptions = explode(',', $walAttrValue['value']);

                        $availableShopifyOptions = array_keys($shopifyOptionValues);

                        
                        $option = array_intersect($availableShopifyOptions, $mappedShopifyOptions);

                       
                        if(count($option))
                        {
                            $option = current($option);
                            if (isset($shopifyOptionValues[$option])) {
                                $attributeValues[$walAttrCode] = $shopifyOptionValues[$option];

                                //will be used for variant products only.
                                if(!isset($variantAttributesName[$option])) {
                                    $code = Walmartapi::explodeAttributes($walAttrCode);
                                    $variantAttributesName[$option] = $code[0];
                                }
                            }
                        }
                    }
                } 
                elseif ($walAttrValue['type'] == WalmartAttributeMap::VALUE_TYPE_TEXT ||
                    $walAttrValue['type'] == WalmartAttributeMap::VALUE_TYPE_WALMART
                ) {
                    $attributeValues[$walAttrCode] = $walAttrValue['value'];
                }

                
            }
        }
        else
        {
            foreach ($walmart_attributes as $wal_attr => $shopify_option) {
                if(isset($shopifyOptionValues[$shopify_option])) {
                    $attributeValues[$wal_attr] = $shopifyOptionValues[$shopify_option];
                }
            }
        }
        
       

        /**
         * Prepare Variation Options for variant products
         */
        if($productArray['type'] == 'variants')
        {
            if ($variantArray['option_sku'] == $productArray['sku']) {
                $variation_information['isPrimaryVariant'] = 'Yes';
            }

            $variation_information['variantAttributeNames->variantAttributeName'] = array_values($variantAttributesName);
            $variation_information['variantGroupId'] = $this->_product['variantGroupId'];
        }

        /**
         * override global common attribute mapping values with product level values
         */

        //print_r($attributeValues);die;
        $attributeValues = array_merge(
            $attributeValues,
            $walmart_optional_attributes,
            $variation_information,
            $common_attributes,
            $basicRequiredAttributes
        );

        //print_r($attributeValues);die;
        return $attributeValues;
    }

    /**
     * Decode Product Level Attribute Mapping 
     * For Example : Input = {"Title":["color->colorValue"]}
     *               Output = ['color->colorValue' => 'Title']
     *
     * @param string $walmart_attributes encoded attribute mapping data
     * @return []
     */
    public static function getDecodedWalmartAttributes($walmart_attributes)
    {
        $encodedAttributes = [];
        if($walmart_attributes != '')
        {
            $mapping = json_decode($walmart_attributes, true);
            foreach ($mapping as $shopifyOptionName => $walmartAttributeCode) {
                $walmartAttributeCode = current($walmartAttributeCode);
                $encodedAttributes[$walmartAttributeCode] = $shopifyOptionName;
            }
        }
        return $encodedAttributes;
    }

    /**
     * get the shopify option values for product variants
     *
     * @param string $shopify For Example : {"9552583560":"Color", "9743452424":"Size"}
     * @param array $options For Example : ['variant_option1'=>'Blue', 'variant_option2'=>'Small', 'variant_option3'=>'']
     * @return [], For Example : ["Color"=>"Blue", "Size"=>"Small"]
     */
    public static function getOptionValuesForVariants($shopify_options, $option_values)
    {
        $values = [];
        if(count($shopify_options) && count($option_values))
        {
            $key = 1;
            foreach ($shopify_options as $attr) {
                $values[$attr] = $option_values['variant_option'.($key++)];
            }
        }
        return $values;
    }

    /**
     * Get attribute code for the given structure of attribute
     * 
     * @param array $attribute structure of the attribute
     * @return array of codes
     */
    public static function getAttributeCode($attribute)
    {
        $attributeCode = [];

        $name = $attribute['name'];
        if(isset($attribute['child']))
        {
            $childen = $attribute['child'];
            if(isset($childen[0])) {
                foreach ($childen as $child) {
                    $attrCodes = self::getAttributeCode($child);
                    foreach ($attrCodes as $attrCode) {
                        $attributeCode[] = $name . AttributeMap::ATTRIBUTE_PATH_SEPERATOR . $attrCode;
                    }
                }
            } 
            /*else {
                $attrCodes = self::getAttributeCode($childen);
                foreach ($attrCodes as $attrCode) {
                    $attributeCode[] = $name . AttributeMap::ATTRIBUTE_PATH_SEPERATOR . $attrCode;
                }
            }*/
        }
        else {
            $attributeCode[] = $name;
        }

        return $attributeCode;
    }

    /**
     * Get attribute options for the given structure of attribute
     * 
     * @param array $attribute structure of the attribute
     * @return array of option values
     */
    public static function getAttributeOptions($attribute, $parent=null)
    {
        $attributeOptions = [];

        $name = $attribute['name'];
        if(!isset($attribute['optionValues']))
        {
            if(isset($attribute['child']))
            {
                $childen = $attribute['child'];
                foreach ($childen as $child) 
                {
                    $childName = $child['name'];
                    $param = is_null($parent)?$name:$parent.'->'.$name;
                    $attrOptions = self::getAttributeOptions($child, $param);
                    if(count($attrOptions)) {
                        $attributeOptions = array_merge($attributeOptions, $attrOptions);
                    }
                }
            }
        }
        else 
        {
            if(is_null($parent))
                $attributeOptions[$name] = $attribute['optionValues'];
            else
                $attributeOptions[$parent.'->'.$name] = $attribute['optionValues'];
        }

        return $attributeOptions;
    }

    /**
     * Get formatted value of attribute for the category data
     * 
     * @param array $attribute structure of the attribute.
     * @param array|string $value value of the attribute.
     * @param string $valueIndex name of index in which value needs to be added.
     * @return array
     */
    public static function getFormattedAttributeValue($attribute, $value, $valueIndex)
    {

        $formattedValue = [];

        $name = $attribute['name'];
        if(isset($attribute['child']))
        {
            $childen = $attribute['child'];
            foreach ($childen as $child) 
            {
                $childName = $child['name'];
                $maxOccurance = $child['maxOccurs'];
                if($maxOccurance == 'unbounded' || (is_numeric($maxOccurance) && intval($maxOccurance) > 1)) 
                {
                    if(isset($child['child']))
                    {
                        $grandChildren = $child['child'];
                        foreach ($grandChildren as $key => $grandChild) 
                        {
                            $grandChildName = $grandChild['name'];
                            if($grandChildName == $valueIndex) {
                                if(is_array($value) && count($value)) {
                                    $formattedValue[$name]['_attribute'] = [];
                                    $i = 0;
                                    foreach ($value as $_value) {
                                        $index = self::KEY_PREFIX.$i;
                                        $formattedValue[$name]['_value'][$index][$childName][$grandChildName] = $_value;
                                        $i++;
                                    }
                                } else {
                                    $formattedValue[$name][$childName][$grandChildName] = $value;
                                }
                            }
                        }
                    }
                    else
                    {
                        if($childName == $valueIndex) {
                            if(is_array($value) && count($value)) {
                                $formattedValue[$name]['_attribute'] = [];
                                $i = 0;
                                foreach ($value as $_value) {
                                    $index = self::KEY_PREFIX.$i;
                                    $formattedValue[$name]['_value'][$index][$childName] = $_value;
                                    $i++;
                                }
                            } else {
                                $formattedValue[$name][$childName] = $value;
                            }
                        }
                    }
                }
                else
                {
                    if($childName == $valueIndex) {
                        $formattedValue[$name][$childName] = $value;
                    }
                }
            }
        }
        else
        {
            //if($valueIndex == $name) {
                $formattedValue[$name] = $value;
            //}
        }
        //print_r($formattedValue);die;

        return $formattedValue;
    }

    /**
     * Remove some specific keywords or string from the array keys.
     * 
     * @param array &$array array from which keywords/strings to be removed.
     * @param string $keyword string to be removed from keys.
     * @return void
     */
    public static function removeKeywords(&$array, $keyword)
    {
        foreach ($array as $key => $value) {
            if(strpos($key, $keyword) !== false) {
                $newKey = str_replace($keyword, '', $key);
                $array[$newKey] = $value;
                unset($array[$key]);
            } else {
                $newKey = $key;
            }

            if(is_array($value)) {
                self::removeKeywords($value, $keyword);
                $array[$newKey] = $value;
            }
        }
    }

    /**
     * Prepare Product SecondaryImageURLs
     * 
     * @param array $productImages
     * @return string|[]
     */
    public static function prepareSecondaryImageUrls($productImages)
    {

        
        if (count($productImages) > 0) {
            $secondaryImageUrls = [
                '_attribute' => [],
            ];
            $count = 0;
            foreach ($productImages as $key => $image) {
                /**
                 * Minimum occurance of productSecondaryImageURLValue is 1 so in case no additional images, base image will be added
                 */
                if ($key == 0 && count($productImages) > 1)
                    continue;

                $secondaryImageUrls['_value'][$count++] = ['productSecondaryImageURLValue' => $image];
            }
            return $secondaryImageUrls;
        }
        return [];
    }

    /**
     * Validate required category attributes.
     *
     * @param string $categoryId
     * @param string $subCategoryId
     * @param array $preparedCategoryData
     * @return array
     */
    public static function validateCategoryData($categoryId, $subCategoryId, $preparedCategoryData)
    {
        $requiredAttributes = self::getSubCategoryAttributes($categoryId, $subCategoryId, true);

        foreach ($requiredAttributes as $code=>$attributeStructure) 
        {
            if(!isset($preparedCategoryData[$code])) {
                return ['status' => false, 'error' => $code." is Required Attribute."];
                break;
            }
        }

        return ['status' => true];
    }
}