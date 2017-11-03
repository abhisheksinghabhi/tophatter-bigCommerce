<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_registration".
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
 * @property string $selling_on_walmart
 * @property string $selling_on_walmart_source
 * @property string $other_selling_source
 * @property string $contact_to_walmart
 * @property string $approved_by_walmart
 * @property string $usa_warehouse
 * @property string $products_type_or_category
 */
class WalmartRegistration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_registration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['merchant_id', 'name', 'legal_company_name', 'store_name', 'mobile', 'email', 'annual_revenue', 'website', 'amazon_seller_url', 'position_in_company', 'shipping_source', 'product_count', 'company_address', 'country', 'products_type_or_category', 'selling_on_walmart', 'reference', 'agreement'], 'required'],
            [['merchant_id', 'product_count'], 'integer'],

            [['product_count'], 'integer', 'min' => 0, 'max' => 1000000,'message' => '"{value}" is invalid {attribute}. Only Positive Numbers are allowed.'],
            [['company_address', 'other_reference'], 'string'],
            [['name', 'legal_company_name', 'store_name', 'email', 'website', 'amazon_seller_url', 'shipping_source', 'other_shipping_source', 'products_type_or_category', 'other_selling_source', 'reference'], 'string', 'max' => 255],
            //[['mobile'], 'string', 'max' => 15],
            [['annual_revenue', 'position_in_company'], 'string', 'max' => 200],
            [['country', 'selling_on_walmart_source'], 'string', 'max' => 50],
            [['have_valid_tax', 'usa_warehouse', 'selling_on_walmart', 'contact_to_walmart', 'approved_by_walmart', 'agreement'], 'string', 'max' => 10],

            [['mobile'], 'number','message' => '"{value}" is invalid {attribute}. Only Numbers are allowed.'],
            [['merchant_id'], 'unique'],
            [['email'],'email','message'=>'Please enter a valid {attribute}.'],
            ['website', 'url'],
            ['agreement', 'required', 'requiredValue' => 1, 'message' => 'You must agree to the terms and conditions.'],
            ['other_reference', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->reference == 'Other';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#walmartregistration-reference').val() == 'Other';
            }"],
            ['have_valid_tax', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->country == 'Other';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#walmartregistration-country').val() === 'Other';
            }"],
            ['usa_warehouse', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->country == 'Other';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#walmartregistration-country').val() === 'Other';
            }"],
            ['selling_on_walmart_source', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_walmart == 'yes';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#walmartregistration-selling_on_walmart').val() === 'yes';
            }"],
            ['other_selling_source', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_walmart_source == 'yes';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#walmartregistration-selling_on_walmart_source').val() === 'yes';
            }"],
            ['contact_to_walmart', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_walmart == 'no';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#walmartregistration-selling_on_walmart').val() === 'no';
            }"],
            ['approved_by_walmart', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_walmart == 'no';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#walmartregistration-selling_on_walmart').val() === 'no';
            }"],
            ['other_selling_source', 'required', 'message' => 'This field cannot be blank.', 'when' => function ($model) {
                return $model->selling_on_walmart_source == 'other';
            }, 'whenClient' => "function (attribute, value) {
                    return $('#walmartregistration-selling_on_walmart_source').val() === 'other';
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
            'selling_on_walmart' => 'Selling On Walmart',
            'selling_on_walmart_source' => 'Selling On Walmart Source',
            'other_selling_source' => 'Other Selling Source',
            'contact_to_walmart' => 'Contact To Walmart',
            'approved_by_walmart' => 'Approved By Walmart',
            'usa_warehouse' => 'Usa Warehouse',
            'products_type_or_category' => 'Products Type Or Category',
        ];
    }
}
