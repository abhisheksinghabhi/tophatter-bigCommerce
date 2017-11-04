<?php

namespace frontend\modules\tophatter\models;

use Yii;

/**
 * This is the model class for table "walmart_attribute_map".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $shopify_product_type
 * @property string $walmart_attribute_code
 * @property string $attribute_value_type
 * @property string $attribute_value
 *
 * @property User $merchant
 */
class TophatterAttributeMap extends \yii\db\ActiveRecord
{
    const VALUE_TYPE_SHOPIFY = 'map_with_shopify_option';
    const VALUE_TYPE_TOPHATTER = 'predefined_tophatter_attribute_value';
    const VALUE_TYPE_TEXT = 'text';
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tophatter_attribute_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'shopify_product_type', 'tophatter_attribute_code', 'attribute_value_type', 'attribute_value'], 'required'],
            [['merchant_id'], 'integer'],
            [['shopify_product_type', 'attribute_value'], 'string', 'max' => 255],
            [['tophatter_attribute_code'], 'string', 'max' => 100],
            [['attribute_value_type'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_id' => 'Merchant ID',
            'shopify_product_type' => 'Shopify Product Type',
            'walmart_attribute_code' => 'Tophatter Attribute Code',
            'attribute_value_type' => 'Attribute Value Type',
            'attribute_value' => 'Attribute Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchant()
    {
        return $this->hasOne(User::className(), ['id' => 'merchant_id']);
    }
}
