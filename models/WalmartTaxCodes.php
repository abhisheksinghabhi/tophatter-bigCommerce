<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_tax_codes".
 *
 * @property integer $id
 * @property integer $tax_code
 * @property string $cat_desc
 * @property string $sub_cat_desc
 */
class WalmartTaxCodes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_tax_codes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax_code', 'cat_desc', 'sub_cat_desc'], 'required'],
            [['tax_code'], 'integer'],
            [['cat_desc', 'sub_cat_desc'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tax_code' => 'Tax Codes',
            'cat_desc' => 'Tax Category Description',
            'sub_cat_desc' => 'Sub Category',
        ];
    }
}
