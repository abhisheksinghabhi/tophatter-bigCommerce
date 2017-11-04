<?php

namespace frontend\modules\tophatter\models;

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
 * @property string $order_total
 * @property string $status
 * @property string $ship_request
 * @property string $created_at
 */
class TophatterOrderDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tophatter_order_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'sku', 'purchase_order_id', 'shipment_data', 'status'], 'required'],
            [['merchant_id', 'bigcommerce_order_id'], 'integer'],
            [['order_data', 'shipment_data', 'ship_request'], 'string'],
            [['order_total'], 'number'],
            [['created_at'], 'safe'],
            [['bigcommerce_order_name'], 'string', 'max' => 50],
            [['sku', 'purchase_order_id'], 'string', 'max' => 255],
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
            'bigcommerce_order_name' => 'Bigcommerce Order Name',
            'sku' => 'Sku',
            'bigcommerce_order_id' => 'Bigcommerce Order ID',
            'purchase_order_id' => 'Purchase Order ID',
            'order_data' => 'Order Data',
            'shipment_data' => 'Shipment Data',
            'order_total' => 'Order Total',
            'status' => 'Status',
            'ship_request' => 'Ship Request',
            'created_at' => 'Created At',
        ];
    }
}
