<?php

namespace frontend\modules\tophatter\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\tophatter\models\TophatterCategoryMap;

/**
 * WalmartCategoryMapSearch represents the model behind the search form about `frontend\modules\integration\models\WalmartCategoryMap`.
 */
class TophatterCategoryMapSearch extends TophatterCategoryMap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id'], 'integer'],
            [['product_type', 'category_id', 'category_name', 'category_path', 'tax_code'], 'safe'],
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
        $query = TophatterCategoryMap::find();

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
            'id' => $this->id,
            'merchant_id' => $this->merchant_id,
        ]);

        $query->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'category_path', $this->category_path])
            ->andFilterWhere(['like', 'tax_code', $this->tax_code]);

        return $dataProvider;
    }
}
