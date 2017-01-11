<?php

namespace book\modules\test\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use book\modules\test\models\Shop;

/**
 * ShopSearch represents the model behind the search form about `book\modules\test\models\Shop`.
 */
class ShopSearch extends Shop
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'type', 'status', 'class', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Shop::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'type' => $this->type,
            'status' => $this->status,
            'class' => $this->class,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
