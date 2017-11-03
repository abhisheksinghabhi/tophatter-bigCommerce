<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_order_details".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $bigcommerce_order_name
 * @property string $sku
 * @property integer $bigcommerce_order_id
 * @property string $purchase_order_id
 * @property string $order_data
 * @property string $shipment_data
 * @property string $status
 */
class WalmartOrderDetail extends \yii\db\ActiveRecord
{
    const ORDER_STATUS_ACKNOWLEDGED = 'acknowledged';
    const ORDER_STATUS_COMPLETED = 'completed';

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
            [['merchant_id', 'sku', 'bigcommerce_order_id', 'purchase_order_id', 'order_data', 'shipment_data', 'status'], 'required'],
            [['merchant_id', 'bigcommerce_order_id'], 'integer'],
            [['order_data', 'shipment_data'], 'string'],
            //[['bigcommerce_order_name'], 'string', 'max' => 50],
            [['sku'], 'string', 'max' => 255],
            [['purchase_order_id'], 'string', 'max' => 30],
            [['status'], 'string', 'max' => 20]
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
            //'bigcommerce_order_name' => 'Order Name(Bigcommerce)',
            'sku' => 'Product Sku',
            'bigcommerce_order_id' => 'Bigcommerce Order ID',
            'purchase_order_id' => 'Purchase Order ID',
            'order_data' => 'Order Data',
            'shipment_data' => 'Shipment Data',
            'status' => 'Status',
        ];
    }
}
