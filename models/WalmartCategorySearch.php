<?php

namespace frontend\modules\walmart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\walmart\models\WalmartCategory;

/**
 * WalmartCategorySearch represents the model behind the search form about `frontend\modules\integration\models\WalmartCategory`.
 */
class WalmartCategorySearch extends WalmartCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id', 'level'], 'integer'],
            [['category_id', 'title', 'parent_id', 'attributes', 'attribute_values', 'walmart_attributes', 'walmart_attribute_values', 'attributes_order'], 'safe'],
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
        $query = WalmartCategory::find();

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
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'parent_id', $this->parent_id])
            ->andFilterWhere(['like', 'attributes', $this->attributes])
            ->andFilterWhere(['like', 'attribute_values', $this->attribute_values])
            ->andFilterWhere(['like', 'walmart_attributes', $this->walmart_attributes])
            ->andFilterWhere(['like', 'walmart_attribute_values', $this->walmart_attribute_values])
            ->andFilterWhere(['like', 'attributes_order', $this->attributes_order]);

        return $dataProvider;
    }
}
