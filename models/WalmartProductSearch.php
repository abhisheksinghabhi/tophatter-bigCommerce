<?php

namespace frontend\modules\walmart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\walmart\models\WalmartProduct;
use frontend\modules\walmart\models\JetProduct;

/**
 * WalmartProductSearch represents the model behind the search form about `frontend\models\WalmartProduct`.
 */
class WalmartProductSearch extends WalmartProduct
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

    public function rules()
    {
        return [
            [['id', 'product_id', 'merchant_id'], 'integer'],
            [['walmart_attributes', 'type', 'category', 'status', 'error', 'tax_code', 'title', 'sku', 'qty', 'price', 'brand', 'upc', 'product_type', 'option_status', 'option_variants_count', 'price_from', 'price_to'], 'safe'],
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

    public function getClassName()
    {
        return 'WalmartProductSearch';
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
        $query = WalmartProduct::find()->select(['`walmart_product`.*, count(DISTINCT `walmart_product_variants`.`option_id`) as `option_variants_count`, GROUP_CONCAT(`walmart_product_variants`.`status`) as `option_status`'])->where(['walmart_product.merchant_id' => MERCHANT_ID])->andWhere(['!=', 'walmart_product.category', ''])->andWhere(['<>','walmart_product.status', 'DELETED']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pageSize],
            'sort' => ['attributes' => ['product_id', 'title', 'sku', 'qty', 'price', 'product_type', 'upc', 'type', 'status','brand']]
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

        //$query->innerJoinWith(['jet_product']);
        $subQuery = (new \yii\db\Query())->select('bigproduct_id,product_type,title,sku,qty,price,upc,updated_at,type,brand')->from('jet_product')->where('merchant_id=' . MERCHANT_ID);
        $query->innerJoin(['jet_product' => $subQuery], 'jet_product.bigproduct_id = walmart_product.product_id');

        $query->andFilterWhere([
            'bigproduct_id' => $this->id,
            'walmart_product.product_id' => $this->product_id,
            //'walmart_product.merchant_id' => $this->merchant_id,
        ]);

        /*$dataProvider->sort->attributes['jet_product'] = [
            'asc' => ['jet_product.title' => SORT_ASC],
            'desc' => ['jet_product.title' => SORT_DESC],
        ];*/
        $subQuery = (new \yii\db\Query())->select('product_id,option_id,status')->from('walmart_product_variants')->where('merchant_id=' . MERCHANT_ID);
        $query->leftJoin(['walmart_product_variants' => $subQuery], 'walmart_product_variants.product_id = walmart_product.product_id');

        $subQuery1 = (new \yii\db\Query())->select('option_id,product_id,option_sku,option_unique_id')->from('jet_product_variants')->where('merchant_id=' . MERCHANT_ID);
        $query->leftJoin(['jet_product_variants' => $subQuery1], 'jet_product_variants.option_id = walmart_product_variants.option_id');

        if ($this->sku != '') {
            //by shivam



            /*$subQuery1 = (new \yii\db\Query())->select('option_id,product_id,option_sku,option_unique_id')->from('jet_product_variants')->where('merchant_id=' . MERCHANT_ID);
            $query->leftJoin(['jet_product_variants' => $subQuery1], 'jet_product_variants.option_id = walmart_product_variants.option_id');*/

            $query->andWhere("(jet_product.sku LIKE '" . $this->sku . "') OR (jet_product_variants.option_sku LIKE '" . $this->sku . "')");

            //end by shivam
        }

        if ($this->upc != '') {
            //by shivam



            /*$subQuery1 = (new \yii\db\Query())->select('option_id,product_id,option_sku,option_unique_id')->from('jet_product_variants')->where('merchant_id=' . MERCHANT_ID);
            $query->leftJoin(['jet_product_variants' => $subQuery1], 'jet_product_variants.option_id = walmart_product_variants.option_id');*/

            $query->andWhere("(jet_product.upc LIKE '" . $this->upc . "') OR (jet_product_variants.option_unique_id LIKE '" . $this->upc . "')");

            //end by shivam
        }

        if ($this->status == 'other') {
            $allStatus = ['PUBLISHED', 'UNPUBLISHED', 'STAGE', 'Not Uploaded', 'Item Processing'];

            //$query->joinWith(['walmart_product_variants']);
            /*$query->andFilterWhere(['not in', 'walmart_product.status', $allStatus])
                  ->orFilterWhere(['not in', 'walmart_product_variants.status', $allStatus]);*/
            //$query->andWhere("(walmart_product.status NOT IN ('".implode("','", $allStatus)."')) OR (walmart_product_variants.status NOT IN ('".implode("','", $allStatus)."'))"); 

            $query->andWhere("(walmart_product.status NOT IN ('" . implode("','", $allStatus) . "') OR (jet_product.type='simple' AND walmart_product.status IS NULL)) OR (walmart_product_variants.status NOT IN ('" . implode("','", $allStatus) . "') OR (jet_product.type='variants' AND walmart_product_variants.status IS NULL))");
        } elseif ($this->status != '') {
            //$query->joinWith(['walmart_product_variants']);
            /*$query->andFilterWhere(['like', 'walmart_product.status', $this->status])
                  ->orFilterWhere(['like', 'walmart_product_variants.status', $this->status]);*/
            //$query->andWhere("(walmart_product.status LIKE '".$this->status."') OR (walmart_product_variants.status LIKE '".$this->status."')");

            $query->andWhere("(walmart_product.status LIKE '" . $this->status . "') OR (walmart_product_variants.status LIKE '" . $this->status . "')");
        }
        
        // Inventory Filter
        if (isset($_GET['low']))
            $query->andFilterWhere(['<', 'jet_product.qty', trim($_GET['low'])]);
            else
                $query->andFilterWhere(['jet_product.qty' => $this->qty]);

        /*******Added by sanjeev starts*******/
        if ($this->price_from != '' and $this->price_to != '') {
            $query->andWhere("(walmart_product.product_price between '" . $this->price_from . "' and '" . $this->price_to . "') OR (walmart_product.product_price IS NULL AND jet_product.price between '" . $this->price_from . "' and '" . $this->price_to . "')");
        } elseif ($this->price_to != '') {
            $query->andWhere("(walmart_product.product_price <= '" . $this->price_to . "') OR (walmart_product.product_price IS NULL AND jet_product.price <= '" . $this->price_to . "')");
        } elseif ($this->price_from != '') {
            $query->andWhere("(walmart_product.product_price >= '" . $this->price_from . "') OR (walmart_product.product_price IS NULL AND jet_product.price >= '" . $this->price_from . "')");
        }
        /*******Added by sanjeev ends*******/
        /*$query->andWhere('product_title LIKE "%' . $this->title . '%" ' .
            'OR jet_product.title LIKE "%' . $this->title . '%"');*/
        $query->andWhere('product_title LIKE "%' . addslashes($this->title) . '%" ' . ' OR ( product_title IS NULL AND jet_product.title LIKE "%' . addslashes($this->title) . '%")');


        $query->andFilterWhere(['like', 'walmart_attributes', $this->walmart_attributes])
            ->andFilterWhere(['like', 'category', $this->category])
            //->andFilterWhere(['=', 'walmart_product.status', $this->status])
            ->andFilterWhere(['like', 'error', $this->error])
            ->andFilterWhere(['like', 'tax_code', $this->tax_code])
            /*->andFilterWhere(['like', 'product_title', $this->product_title])
            ->andFilterWhere(['like', 'product_price', $this->product_price])*/
            ->andFilterWhere(['like', 'jet_product.product_type', $this->product_type]);

//        $query->andFilterWhere(['like', 'jet_product.title', $this->title])
//        $query->andFilterWhere(['like', 'jet_product.sku', $this->sku])
        $query->andFilterWhere(['=', 'jet_product.qty', $this->qty])
            //->andFilterWhere(['like', 'jet_product.price', $this->price])
            //->andFilterWhere(['like', 'jet_product.upc', $this->upc])
            ->andFilterWhere(['like', 'jet_product.type', $this->type])
            ->andFilterWhere(['like', 'registration.email', $this->email])
            //->andFilterWhere(['>=','jet_product.updated_at',$this->updated_at])
            //->andFilterWhere(['<=','jet_product.updated_at',$this->updated_at2])
            ->andFilterWhere(['like', 'jet_product.brand', $this->brand]);

        $query->groupBy(['walmart_product.product_id']);
//        var_dump($query->prepare(Yii::$app->db->queryBuilder)->createCommand()->rawSql);die();
//        print_r($dataProvider->getModels());die;
//        print_r($dataProvider);die;
        return $dataProvider;
    }
}