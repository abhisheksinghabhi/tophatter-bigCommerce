<?php

namespace frontend\modules\walmart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\walmart\models\WalmartTaxCodes;

/**
 * WalmartTaxCodesSearch represents the model behind the search form about `frontend\modules\integration\models\WalmartTaxCodes`.
 */
class WalmartTaxCodesSearch extends WalmartTaxCodes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tax_code'], 'integer'],
            [['cat_desc', 'sub_cat_desc'], 'safe'],
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
        $query = WalmartTaxCodes::find();

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
            'tax_code' => $this->tax_code,
        ]);

        $query->andFilterWhere(['like', 'cat_desc', $this->cat_desc])
            ->andFilterWhere(['like', 'sub_cat_desc', $this->sub_cat_desc]);

        return $dataProvider;
    }
}
