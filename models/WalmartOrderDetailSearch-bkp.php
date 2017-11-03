<?php

namespace frontend\modules\walmart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\walmart\models\WalmartOrderDetail;

/**
 * WalmartOrderDetailSearch represents the model behind the search form about `frontend\modules\integration\models\WalmartOrderDetail`.
 */
class WalmartOrderDetailSearch extends WalmartOrderDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_data', 'shipment_data', 'reference_order_id'], 'safe'],
            [['merchant_id'], 'integer'],
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
        $query = WalmartOrderDetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'merchant_id' => $this->merchant_id,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'order_data', $this->order_data])
            ->andFilterWhere(['like', 'shipment_data', $this->shipment_data])
            ->andFilterWhere(['like', 'reference_order_id', $this->reference_order_id]);

        return $dataProvider;
    }
}
