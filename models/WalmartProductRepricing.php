<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_product_repricing".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property integer $product_id
 * @property integer $option_id
 * @property string $sku
 * @property string $min_price
 * @property string $max_price
 * @property string $your_price
 * @property integer $buybox
 * @property string $best_prices
 * @property integer $repricing_status
 */
class WalmartProductRepricing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_product_repricing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'product_id', 'sku', 'min_price', 'max_price', 'your_price', 'best_prices'], 'required'],
            [['merchant_id', 'product_id', 'option_id', 'buybox', 'repricing_status'], 'integer'],
            [['min_price', 'max_price'], 'number'],
            [['your_price', 'best_prices'], 'string'],
            [['sku'], 'string', 'max' => 200]
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
            'product_id' => 'Product ID',
            'option_id' => 'Option ID',
            'sku' => 'Sku',
            'min_price' => 'Min Price',
            'max_price' => 'Max Price',
            'your_price' => 'Your Price',
            'buybox' => 'Buybox',
            'best_prices' => 'Best Prices',
            'repricing_status' => 'Repricing Status',
        ];
    }
}
