<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_installation".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $status
 * @property string $step
 */
class WalmartInstallation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_installation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'status', 'step'], 'required'],
            [['merchant_id'], 'integer'],
            [['status'], 'string', 'max' => 100],
            [['step'], 'string', 'max' => 11]
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
            'status' => 'Status',
            'step' => 'Step',
        ];
    }
}
