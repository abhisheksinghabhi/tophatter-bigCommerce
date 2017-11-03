<?php

namespace frontend\modules\walmart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\walmart\models\WalmartOrderDetail;

/**
 * WalmartOrderDetailsSearch represents the model behind the search form about `frontend\modules\walmart\models\WalmartOrderDetails`.
 */
class WalmartOrderDetailSearch extends WalmartOrderDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id', 'bigcommerce_order_id'], 'integer'],
            [['order_total', 'sku', 'purchase_order_id', 'order_data', 'shipment_data', 'status','created_at'], 'safe'],
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
        $query = WalmartOrderDetail::find()->where(['merchant_id' => MERCHANT_ID]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['purchase_order_id'=>SORT_DESC]]
        ]);

        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['created_at'=>SORT_DESC]]
        ]);



        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'merchant_id' => $this->merchant_id,
            'bigcommerce_order_id' => $this->bigcommerce_order_id,
        ]);

        $query->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'order_total', $this->order_total])
            ->andFilterWhere(['like', 'purchase_order_id', $this->purchase_order_id])
            ->andFilterWhere(['like', 'order_data', $this->order_data])
            ->andFilterWhere(['like', 'shipment_data', $this->shipment_data])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_at', $this->created_at]);

        return $dataProvider;
    }
}
