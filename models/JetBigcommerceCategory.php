<?php

namespace frontend\modules\tophatter\models;

use Yii;

/**
 * This is the model class for table "jet_bigcommerce_category".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property integer $c_id
 * @property integer $parent_id
 * @property string $name
 */
class JetBigcommerceCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jet_bigcommerce_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'c_id', 'parent_id', 'name'], 'required'],
            [['merchant_id', 'c_id', 'parent_id'], 'integer'],
            [['name'], 'string']
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
            'c_id' => 'C ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
        ];
    }
}