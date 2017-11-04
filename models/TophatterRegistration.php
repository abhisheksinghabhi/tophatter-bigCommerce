<?php

namespace frontend\modules\tophatter\models;

use Yii;

/**
 * This is the model class for table "tophatter_registration".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $name
 * @property string $legal_company_name
 * @property string $store_name
 * @property string $shipping_source
 * @property string $other_shipping_source
 * @property string $mobile
 * @property string $email
 * @property string $annual_revenue
 * @property string $reference
 * @property string $agreement
 * @property string $other_reference
 * @property string $website
 * @property string $amazon_seller_url
 * @property integer $product_count
 * @property string $company_address
 * @property string $country
 * @property string $have_valid_tax
 * @property string $selling_on_tophatter
 * @property string $selling_on_tophatter_source
 * @property string $other_selling_source
 * @property string $contact_to_tophatter
 * @property string $approved_by_tophatter
 * @property string $usa_warehouse
 * @property string $products_type_or_category
 */
class TophatterRegistration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tophatter_registration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['merchant_id', 'name', 'legal_company_name', 'store_name', 'mobile', 'email', 'annual_revenue', 'website', 'amazon_seller_url', 'position_in_company', 'shipping_source', 'product_count', 'company_address', 'country', 'products_type_or_category', 'selling_on_tophatter', 'reference', 'agreement'], 'required'],
            [['merchant_id', 'product_count'], 'integer'],

            [['product_count'], 'integer', 'min' => 0, 'max' => 1000000,'message' => '"{value}" is invalid {attribute}. Only Positive Numbers are allowed.'],
            [['company_address', 'other_reference'], 'string'],
            [['name', 'legal_company_name', 'store_name', 'email', 'website', 'amazon_seller_url', 'shipping_source', 'other_shipping_source', 'products_type_or_category', 'other_selling_source', 'reference'], 'string', 'max' => 255],
            //[['mobile'], 'string', 'max' => 15],
            [['annual_revenue', 'position_in_company'], 'string', 'max' => 200],
            [['country', 'selling_on_tophatter_source'], 'string', 'max' => 50],
            [['have_valid_tax', 'usa_warehouse', 'selling_on_tophatter', 'contact_to_tophatter', 'approved_by_tophatter', 'agreement'], 'string', 'max' => 10],

            [['mobile'], 'number','message' => '"{value}" is invalid {attribute}. Only Numbers are allowed.'],
            [['merchant_id'], 'unique'],
            [['email'],'email','message'=>'Please enter a valid {attribute}.'],
            ['website', 'url'],
            ['agreement', 'required', 'requiredValue' => 1, 'message' => 'You must agree to the terms and conditions.'],
            ['other_reference', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->reference == 'Other';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#tophatterregistration-reference').val() == 'Other';
            }"],
            ['have_valid_tax', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->country == 'Other';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#tophatterregistration-country').val() === 'Other';
            }"],
            ['usa_warehouse', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->country == 'Other';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#tophatterregistration-country').val() === 'Other';
            }"],
            ['selling_on_tophatter_source', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_tophatter == 'yes';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#tophatterregistration-selling_on_tophatter').val() === 'yes';
            }"],
            ['other_selling_source', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_tophatter_source == 'yes';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#tophatterregistration-selling_on_tophatter_source').val() === 'yes';
            }"],
            ['contact_to_tophatter', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_tophatter == 'no';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#tophatterregistration-selling_on_tophatter').val() === 'no';
            }"],
            ['approved_by_tophatter', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_tophatter == 'no';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#tophatterregistration-selling_on_tophatter').val() === 'no';
            }"],
            ['other_selling_source', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_tophatter_source == 'other';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#tophatterregistration-selling_on_tophatter_source').val() === 'other';
            }"]
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
            'name' => 'Name',
            'legal_company_name' => 'Legal Company Name',
            'store_name' => 'Store Name',
            'shipping_source' => 'Shipping Source',
            'other_shipping_source' => 'Other Shipping Source',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'annual_revenue' => 'Annual Revenue',
            'reference' => 'Reference',
            'agreement' => 'Agreement',
            'other_reference' => 'Other Reference',
            'website' => 'Website',
            'amazon_seller_url' => 'Amazon Seller Url',
            'position_in_company' => 'Job Title/Position in Company',
            'product_count' => 'Product Count',
            'company_address' => 'Company Address',
            'country' => 'Country',
            'have_valid_tax' => 'Have Valid Tax',
            'selling_on_tophatter' => 'Selling On Tophatter',
            'selling_on_tophatter_source' => 'Selling On Tophatter Source',
            'other_selling_source' => 'Other Selling Source',
            'contact_to_tophatter' => 'Contact To Tophatter',
            'approved_by_tophatter' => 'Approved By Tophatter',
            'usa_warehouse' => 'Usa Warehouse',
            'products_type_or_category' => 'Products Type Or Category',
        ];
    }
}
