<?php

namespace frontend\modules\tophatter\models;

use Yii;

/**
 * This is the model class for table "walmart_category_map".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $product_type
 * @property string $category_id
 * @property string $category_name
 * @property string $category_path
 * @property string $tax_code
 * @property integer $product_type_id
 */
class TophatterCategoryMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tophatter_category_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'product_type_id'], 'required'],
            [['merchant_id', 'product_type_id'], 'integer'],
            [['category_path'], 'string'],
            [['product_type', 'category_id', 'category_name', 'tax_code'], 'string', 'max' => 255]
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
            'product_type' => 'Product Type',
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'category_path' => 'Category Path',
            'tax_code' => 'Tax Code',
            'product_type_id' => 'Product Type ID',
        ];
    }
}
