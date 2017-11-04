<?php

namespace frontend\modules\tophatter\models;

use Yii;

/**
 * This is the model class for table "app_status".
 *
 * @property integer $id
 * @property string $shop
 * @property integer $status
 */
class AppStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tophatterapp_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shop', 'status'], 'required'],
            [['id','merchant_id', 'status'], 'integer'],
            [['shop'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        	'merchant_id'=>'Merchant_ID',
            'shop' => 'Shop',
            'status' => 'Status',
        ];
    }
}
