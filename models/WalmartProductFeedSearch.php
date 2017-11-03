<?php

namespace frontend\modules\walmart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\walmart\models\WalmartProductFeed;

/**
 * WalmartProductFeedSearch represents the model behind the search form about `frontend\modules\integration\models\WalmartProductFeed`.
 */
class WalmartProductFeedSearch extends WalmartProductFeed
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id'], 'integer'],
            [['feed_id', 'product_ids', 'created_at', 'status'], 'safe'],
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
    	$merchant_id =MERCHANT_ID;
        $query = WalmartProductFeed::find()->andFilterWhere(['merchant_id'=>$merchant_id]);

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
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'feed_id', $this->feed_id])
            ->andFilterWhere(['like', 'product_ids', $this->product_ids])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
