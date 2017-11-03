<?php 
namespace frontend\modules\walmart\models;

use \yii\base\Model;

class ArrayGridSearch extends Model
{
	public $sku;
	public $product_name;
	public $product_category;
	public $price;
	public $publish_status;
	public $inventory_count;
	public $upc;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'product_name', 'product_category', 'price', 'publish_status', 'inventory_count', 'upc'], 'safe']
        ];
    }
} 