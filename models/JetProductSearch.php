<?php

namespace frontend\modules\walmart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\walmart\models\JetProduct;

/**
 * JetProductSearch represents the model behind the search form about `app\models\JetProduct`.
 */
class JetProductSearch extends JetProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id', 'qty'], 'integer'],
            [['title', 'sku', 'type', 'product_type', 'image', 'brand', 'status', 'error'], 'safe'],
            [['weight', 'price'], 'number'],
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

        $merchant_id=\Yii::$app->user->identity->id;
        $query = JetProduct::find()->where(['merchant_id'=>$merchant_id]);

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
            'qty' => $this->qty,
            'weight' => $this->weight,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'error', $this->error]);

        return $dataProvider;
    }
}
