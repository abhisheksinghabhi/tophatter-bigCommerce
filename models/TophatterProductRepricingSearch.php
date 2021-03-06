<?php

namespace frontend\modules\tophatter\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\tophatter\models\TophatterProduct;
use frontend\modules\tophatter\models\JetProduct;

/**
 * tophatterProductRepricingSearch represents the model behind the search form about `frontend\models\tophatterProduct`.
 */
class TophatterProductRepricingSearch extends TophatterProduct
{
    /**
     * @inheritdoc
     */
    public $title;
    public $sku;
    public $qty;
    public $price;
    public $brand;
    public $upc;
    public $status;
    public $type;
    public $email;
    public $repricing_status;
    public $buybox;
    public $min_price;
    public $max_price;

    public function rules()
    {
        return [
            [['id', 'product_id', 'merchant_id'], 'integer'],
            [['tophatter_attributes', 'type', 'category', 'status', 'error', 'tax_code', 'title', 'sku', 'qty', 'price', 'brand', 'upc', 'product_type','option_status','option_variants_count','repricing_status','buybox','min_price','max_price'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $pageSize = isset($params['per-page']) ? intval($params['per-page']) : 50;
        $query = TophatterProduct::find()->select(['`tophatter_product`.*, count(`tophatter_product_variants`.`product_id`) as `option_variants_count`, GROUP_CONCAT(`tophatter_product_variants`.`status`) as `option_status`'])->where(['tophatter_product.merchant_id' => MERCHANT_ID])->andWhere(['!=', 'tophatter_product.category', '']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pageSize],
            'sort' => ['attributes' => ['product_id', 'title', 'sku', 'qty', 'price', 'product_type', 'upc', 'type', 'status','repricing_status','min_price','buybox']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $subQuery = (new \yii\db\Query())->select('id,bigproduct_id,product_type,title,sku,qty,price,upc,type,brand')->from('jet_product')->where('merchant_id=' . MERCHANT_ID);
        $query->innerJoin(['jet_product' => $subQuery], 'jet_product.bigproduct_id = tophatter_product.product_id');

        $query->andFilterWhere([
            'id' => $this->id,
            'tophatter_product.product_id' => $this->product_id,
        ]);

        if ($this->status == 'other') {
            $allStatus = ['PUBLISHED', 'UNPUBLISHED', 'STAGE', 'Not Uploaded', 'Item Processing'];

            $subQuery = (new \yii\db\Query())->select('product_id,status')->from('tophatter_product_variants')->where('merchant_id=' . MERCHANT_ID);
            $query->leftJoin(['tophatter_product_variants' => $subQuery], 'tophatter_product_variants.product_id = tophatter_product.product_id');

            $query->andWhere("(tophatter_product.status NOT IN ('" . implode("','", $allStatus) . "') OR (jet_product.type='simple' AND tophatter_product.status IS NULL)) OR (tophatter_product_variants.status NOT IN ('" . implode("','", $allStatus) . "') OR (jet_product.type='variants' AND tophatter_product_variants.status IS NULL))");
        } elseif ($this->status != '') {

            $subQuery = (new \yii\db\Query())->select('product_id,status')->from('tophatter_product_variants')->where('merchant_id=' . MERCHANT_ID);
            $query->leftJoin(['tophatter_product_variants' => $subQuery], 'tophatter_product_variants.product_id = tophatter_product.product_id');

            $query->andWhere("(tophatter_product.status LIKE '" . $this->status . "') OR (tophatter_product_variants.status LIKE '" . $this->status . "')");
        }else{
            //by shivam
            $subQuery = (new \yii\db\Query())->select('product_id,status')->from('tophatter_product_variants')->where('merchant_id=' . MERCHANT_ID);
            $query->leftJoin(['tophatter_product_variants' => $subQuery], 'tophatter_product_variants.product_id = tophatter_product.product_id');

            // end by shivam
        }

        $subQuery = (new \yii\db\Query())->select('product_id,min_price,max_price,your_price,buybox,best_prices,repricing_status')->from('tophatter_product_repricing')->where('merchant_id=' . MERCHANT_ID);
        $query->leftJoin(['tophatter_product_repricing' => $subQuery], 'tophatter_product.product_id = tophatter_product_repricing.product_id');

        /*******Added by sanjeev starts*******/
        /*if($this->price_from != '' and $this->price_to != ''){
               $query->andWhere("(jet_product_details.update_price between '" . $this->price_from . "' and '".$this->price_to."') OR (jet_product_details.update_price IS NULL AND jet_product.price between '" . $this->price_from . "' and '".$this->price_to."')");
        }elseif($this->price_to != ''){
            $query->andWhere("(jet_product_details.update_price <= '" . $this->price_to . "') OR (jet_product_details.update_price IS NULL AND jet_product.price <= '" . $this->price_to . "')");
        }elseif($this->price_from != ''){
            $query->andWhere("(jet_product_details.update_price >= '" . $this->price_from . "') OR (jet_product_details.update_price IS NULL AND jet_product.price >= '" . $this->price_from . "')");
        }*/
        /*******Added by sanjeev ends*******/
        /*$query->andWhere('product_title LIKE "%' . $this->title . '%" ' .
            'OR jet_product.title LIKE "%' . $this->title . '%"');*/
        $query->andWhere('product_title LIKE "%' . $this->title . '%" ' . ' OR ( product_title IS NULL AND jet_product.title LIKE "%' . $this->title . '%")');


        $query->andFilterWhere(['like', 'tophatter_attributes', $this->tophatter_attributes])
            ->andFilterWhere(['like', 'category', $this->category])
            //->andFilterWhere(['=', 'tophatter_product.status', $this->status])
            ->andFilterWhere(['like', 'error', $this->error])
            ->andFilterWhere(['like', 'tax_code', $this->tax_code])
            /*->andFilterWhere(['like', 'product_title', $this->product_title])
            ->andFilterWhere(['like', 'product_price', $this->product_price])*/
            ->andFilterWhere(['like', 'jet_product.product_type', $this->product_type]);

//        $query->andFilterWhere(['like', 'jet_product.title', $this->title])
        $query->andFilterWhere(['like', 'jet_product.sku', $this->sku])
            ->andFilterWhere(['=', 'jet_product.qty', $this->qty])
            //->andFilterWhere(['like', 'jet_product.price', $this->price])
            ->andFilterWhere(['like', 'jet_product.upc', $this->upc])
            ->andFilterWhere(['like', 'jet_product.type', $this->type])
            ->andFilterWhere(['like', 'registration.email', $this->email])
            ->andFilterWhere(['like', 'jet_product.brand', $this->brand]);

        $query->andFilterWhere(['=', 'tophatter_product_repricing.repricing_status', $this->repricing_status])
              ->andFilterWhere(['=', 'tophatter_product_repricing.buybox', $this->buybox])
              ->andFilterWhere(['=', 'tophatter_product_repricing.min_price', $this->min_price])
              ->andFilterWhere(['=', 'tophatter_product_repricing.max_price', $this->max_price]);

        $query->groupBy(['tophatter_product.product_id']);
//        var_dump($query->prepare(Yii::$app->db->queryBuilder)->createCommand()->rawSql);die();
//        print_r($dataProvider->getModels());die;
        return $dataProvider;
    }
}
