<?php

namespace book\modules\test\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use book\modules\test\models\TestSells;

/**
 * TestSellsSearch represents the model behind the search form about `book\modules\test\models\TestSells`.
 */
class TestSellsSearch extends TestSells
{
    public $order_count;
    public $order_total;
    public $order_amount;

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'order_count' => '订单总数',
            'order_total' => '订单商品数',
            'order_amount' => '订单总价',
        ]); // TODO: Change the autogenerated stub
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'order_count', 'order_total', 'order_amount'], 'safe'],
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
        $query = self::find()->alias('s')
            ->joinWith('orders as o')
            ->select([
                's.*',
                "COUNT(o.id) AS order_count",
                "SUM(o.total) AS order_total",
                "SUM(o.price*o.total) AS order_amount",
            ])
            ->groupBy('o.test_sells_id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes = array_merge($dataProvider->sort->attributes, [
            'order_count' => [
                'asc' => ["order_count" => SORT_ASC],
                'desc' => ["order_count" => SORT_DESC],
            ],
            'order_total' => [
                'asc' => ["order_total" => SORT_ASC],
                'desc' => ["order_total" => SORT_DESC],
            ],
            'order_amount' => [
                'asc' => ["order_amount" => SORT_ASC],
                'desc' => ["order_amount" => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            's.id' => $this->id,
        ])
            ->andFilterWhere(['like', 's.name', $this->name])
            ->andFilterHaving([
                'order_count' => $this->order_count,
                'order_total' => $this->order_total,
                'order_amount' => $this->order_amount,
            ]);

        return $dataProvider;
    }
}
