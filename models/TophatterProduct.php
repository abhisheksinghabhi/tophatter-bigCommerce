<?php

namespace frontend\modules\tophatter\models;

use Yii;
use frontend\modules\tophatter\models\JetProduct;
use frontend\modules\tophatter\models\TophatterProductVariants;

/**
 * This is the model class for table "walmart_product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $merchant_id
 * @property string $walmart_attributes
 * @property string $product_type
 * @property string $category
 * @property string $error
 * @property string $tax_code
 * @property double $min_price
 * @property string $short_description
 * @property string $self_description
 *
 * @property User $merchant
 * @property JetProduct $product
 */
class TophatterProduct extends \yii\db\ActiveRecord
{
    const PRODUCT_STATUS_UPLOADED = 'PUBLISHED';
    const PRODUCT_STATUS_UNPUBLISHED = 'UNPUBLISHED';
    const PRODUCT_STATUS_STAGE = 'STAGE';
    const PRODUCT_STATUS_NOT_UPLOADED = 'Not Uploaded';
    const PRODUCT_STATUS_PROCESSING = 'Items Processing';
    const PRODUCT_STATUS_PARTIAL_UPLOADED = 'PARTIAL UPLOADED';
    const PRODUCT_STATUS_DELETE = 'DELETED';
    
    public $option_status,$option_variants_count;
    public $price_from;
    public $price_to;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tophatter_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'merchant_id', 'product_type'], 'required'],
            [['product_id', 'merchant_id'], 'integer'],
            [['tophatter_attributes', 'error', 'short_description', 'self_description'], 'string'],
            [['min_price'], 'number'],
            [['product_type', 'category', 'tax_code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'merchant_id' => 'Merchant ID',
            'tophatter_attributes' => 'Tophatter Attributes',
            'product_type' => 'Product Type',
            'category' => 'Category',
            'error' => 'Error',
            'tax_code' => 'Tax Code',
            'min_price' => 'Min Price',
            'short_description' => 'Short Description',
            'self_description' => 'Self Description',
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
    public function getJet_product()
    {
        return $this->hasOne(JetProduct::className(), ['bigproduct_id' => 'product_id','merchant_id'=>'merchant_id']);
    }

    public function getTophatter_product_variants()
    {
        return $this->hasMany(TophatterProductVariants::className(), ['product_id' => 'product_id','merchant_id'=>'merchant_id']);
    }

    public function getTophatter_product_repricing()
    {
        return $this->hasMany(TophatterProductRepricing::className(), ['product_id' => 'product_id']);
    }
}
