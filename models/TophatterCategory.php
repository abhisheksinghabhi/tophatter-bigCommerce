<?php

namespace frontend\modules\tophatter\models;

use Yii;

/**
 * This is the model class for table "walmart_category".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $category_id
 * @property string $title
 * @property string $parent_id
 * @property integer $level
 * @property string $attributes
 * @property string $attribute_values
 * @property string $walmart_attributes
 * @property string $walmart_attribute_values
 * @property string $attributes_order
 */
class TophatterCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tophatter_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'category_id', 'title', 'parent_id', 'level', 'attributes', 'tophatter_attributes'], 'required'],
            [['merchant_id', 'level'], 'integer'],
            [['attributes', 'attribute_values', 'tophatter_attributes', 'tophatter_attribute_values', 'attributes_order'], 'string'],
            [['category_id', 'title', 'parent_id'], 'string', 'max' => 255]
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
            'category_id' => 'Category ID',
            'title' => 'Title',
            'parent_id' => 'Parent ID',
            'level' => 'Level',
            'attributes' => 'Attributes',
            'attribute_values' => 'Attribute Values',
            'tophatter_attributes' => 'Tophatter Attributes',
            'tophatter_attribute_values' => 'Tophatter Attribute Values',
            'attributes_order' => 'Attributes Order',
        ];
    }
}
