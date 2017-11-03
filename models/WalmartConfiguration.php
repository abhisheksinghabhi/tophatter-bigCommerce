<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_configuration".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $consumer_id
 * @property string $secret_key
 * @property string $consumer_channel_type_id
 * @property string $skype_id
 */
class WalmartConfiguration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_configuration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'consumer_id', 'secret_key', 'consumer_channel_type_id'], 'required'],
            [['merchant_id'], 'integer'],
            [['consumer_id', 'secret_key', 'consumer_channel_type_id'], 'string'],
            [['skype_id'], 'string', 'max' => 200]
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
            'consumer_id' => 'Consumer ID',
            'secret_key' => 'Secret Key',
            'consumer_channel_type_id' => 'Consumer Channel Type ID',
            'skype_id' => 'Skype ID',
        ];
    }
}
