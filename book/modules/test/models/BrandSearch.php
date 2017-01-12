<?php

namespace book\modules\test\models;

use book\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use book\modules\test\models\Brand;

/**
 * BrandSearch represents the model behind the search form about `book\modules\test\models\Brand`.
 */
class BrandSearch extends Brand
{
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'status', 'sort', 'created_by', 'updated_by'], 'integer'],
            [['name', 'chinese_name', 'english_name', 'logo', 'describe', 'home_link'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Brand::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'sort' => $this->sort,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'chinese_name', $this->chinese_name])
            ->andFilterWhere(['like', 'english_name', $this->english_name])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'describe', $this->describe])
            ->andFilterWhere(['like', 'home_link', $this->home_link]);

        return $dataProvider;
    }
}
