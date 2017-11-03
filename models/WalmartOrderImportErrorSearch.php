<?php

namespace frontend\modules\walmart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\walmart\models\WalmartOrderImportError;

/**
 * WalmartOrderImportErrorSearch represents the model behind the search form about `frontend\modules\integration\models\WalmartOrderImportError`.
 */
class WalmartOrderImportErrorSearch extends WalmartOrderImportError
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'purchase_order_id', 'merchant_id'], 'integer'],
            [['reason', 'created_at'], 'safe'],
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
        $query = WalmartOrderImportError::find()->where(['merchant_id' => MERCHANT_ID]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'purchase_order_id' => $this->purchase_order_id,
            'merchant_id' => $this->merchant_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
