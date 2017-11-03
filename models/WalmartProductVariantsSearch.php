<?php

namespace frontend\modules\walmart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\walmart\models\WalmartProductVariants;

/**
 * WalmartProductVariantsSearch represents the model behind the search form about `frontend\modules\integration\models\WalmartProductVariants`.
 */
class WalmartProductVariantsSearch extends WalmartProductVariants
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'option_id', 'product_id', 'merchant_id'], 'integer'],
            [['walmart_option_attributes', 'new_variant_option_1', 'new_variant_option_2', 'new_variant_option_3'], 'safe'],
            [['min_price'], 'number'],
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
        $query = WalmartProductVariants::find();

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
            'option_id' => $this->option_id,
            'product_id' => $this->product_id,
            'merchant_id' => $this->merchant_id,
            'min_price' => $this->min_price,
        ]);

        $query->andFilterWhere(['like', 'walmart_option_attributes', $this->walmart_option_attributes])
            ->andFilterWhere(['like', 'new_variant_option_1', $this->new_variant_option_1])
            ->andFilterWhere(['like', 'new_variant_option_2', $this->new_variant_option_2])
            ->andFilterWhere(['like', 'new_variant_option_3', $this->new_variant_option_3]);

        return $dataProvider;
    }
}
