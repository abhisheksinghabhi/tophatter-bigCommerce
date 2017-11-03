<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_product_feed".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $feed_id
 * @property string $product_ids
 * @property string $created_at
 * @property string $status
 */
class WalmartProductFeed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_product_feed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'feed_id', 'product_ids', 'status'], 'required'],
            [['merchant_id'], 'integer'],
            [['created_at'], 'safe'],
            [['feed_id', 'product_ids', 'status'], 'string', 'max' => 255]
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
            'feed_id' => 'Feed ID',
            'product_ids' => 'Product Ids',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }
}
