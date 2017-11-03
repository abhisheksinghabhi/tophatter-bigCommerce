<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_order_import_error".
 *
 * @property integer $id
 * @property integer $purchase_order_id
 * @property integer $merchant_id
 * @property string $reason
 * @property string $created_at
 */
class WalmartOrderImportError extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_order_import_error';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchase_order_id', 'merchant_id', 'reason'], 'required'],
            [['purchase_order_id', 'merchant_id'], 'integer'],
            [['reason'], 'string'],
            [['created_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purchase_order_id' => 'Purchase Order ID',
            'merchant_id' => 'Merchant ID',
            'reason' => 'Reason',
            'created_at' => 'Created At',
        ];
    }
}
