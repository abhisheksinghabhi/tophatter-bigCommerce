<?php

namespace frontend\modules\tophatter\models;

use Yii;

/**
 * This is the model class for table "jet_product".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property integer $bigproduct_id
 * @property string $title
 * @property string $sku
 * @property string $type
 * @property string $product_type
 * @property string $image
 * @property integer $qty
 * @property double $weight
 * @property double $price
 * @property string $attr_ids
 * @property string $brand
 * @property string $status
 * @property string $error
 * @property string $description
 * @property integer $jet_browse_node
 * @property string $jet_attributes
 * @property string $ASIN
 * @property string $upc
 * @property string $barcode_type
 * @property string $mpn
 * @property string $brand
 * @property string $bigcom_attr
 * @property string $additional_info
 * @property string $parent_category
 * @property string $jet_variant_images
 * @property string $updated_at
 * @property double $comparision_price
 * @property string $additional_images
 *
 * @property User $merchant
 * @property WalmartProductRepricing[] $walmartProductRepricings
 * @property WalmartPromotionalPrice[] $walmartPromotionalPrices
 */
class JetProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jet_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'additional_images'], 'required'],
            [['merchant_id', 'bigproduct_id', 'qty', 'jet_browse_node'], 'integer'],

            [['title', 'image', 'error', 'description', 'jet_attributes', 'brand', 'bigcom_attr', 'additional_info'], 'string'],

            [['weight', 'price', 'comparision_price'], 'number'],
            [['updated_at'], 'safe'],
            [['sku', 'type', 'product_type', 'status', 'ASIN', 'upc', 'barcode_type', 'mpn'], 'string', 'max' => 255]

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
            'bigproduct_id' => 'Bigproduct ID',
            'title' => 'Title',
            'sku' => 'Sku',
            'type' => 'Type',
            'product_type' => 'Product Type',
            'image' => 'Image',
            'qty' => 'Qty',
            'weight' => 'Weight',
            'price' => 'Price',
            'status' => 'Status',
            'error' => 'Error',
            'description' => 'Description',
            'jet_browse_node' => 'Jet Browse Node',
            'jet_attributes' => 'Jet Attributes',
            'ASIN' => 'Asin',
            'upc' => 'Upc',
            'barcode_type' => 'Barcode Type',
            'mpn' => 'Mpn',
            'brand' => 'Brand',
            'bigcom_attr' => 'Bigcom Attr',
            'updated_at' => 'Updated At',
            'comparision_price' => 'Comparision Price',
            'additional_images' => 'Additional Images',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchant()
    {
        return $this->hasOne(User::className(), ['id' => 'merchant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTophatterProductRepricings()
    {
        return $this->hasMany(WalmartProductRepricing::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTophatterPromotionalPrices()
    {
        return $this->hasMany(WalmartPromotionalPrice::className(), ['product_id' => 'id']);
    }
}
