<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_config".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $data
 * @property string $value
 */
class WalmartConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'data', 'value'], 'required'],
            [['merchant_id'], 'integer'],
            [['data', 'value'], 'string']
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
            'data' => 'Data',
            'value' => 'Value',
        ];
    }
}
