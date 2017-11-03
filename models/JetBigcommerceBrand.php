<?php

namespace frontend\modules\walmart\models;
use Yii;

/**
 * This is the model class for table "jet_bigcommerce_brand".
 *
 * @property integer $id
 * @property integer $brand_id
 * @property integer $name
 * @property integer $merchant_id
 */
class JetBigcommerceBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jet_bigcommerce_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_id', 'name', 'merchant_id'], 'required'],
            [['brand_id', 'name', 'merchant_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'name' => 'Name',
            'merchant_id' => 'Merchant ID',
        ];
    }
}