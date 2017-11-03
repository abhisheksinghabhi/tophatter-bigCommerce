<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_order_detail".
 *
 * @property string $id
 * @property integer $merchant_id
 * @property string $order_data
 * @property string $shipment_data
 * @property string $reference_order_id
 */
class WalmartOrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_order_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id', 'order_data', 'reference_order_id'], 'required'],
            [['merchant_id'], 'integer'],
            [['order_data','sku', 'shipment_data'], 'string'],
            [['id', 'reference_order_id'], 'string', 'max' => 255]
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
            'sku'=>'Product Sku',
            'order_data' => 'Order Data',
            'shipment_data' => 'Shipment Data',
            'reference_order_id' => 'Merchant Order',
        ];
    }
}
