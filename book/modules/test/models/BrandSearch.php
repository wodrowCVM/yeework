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
            [['id', 'updated_at', 'status', 'sort', 'created_by', 'updated_by'], 'integer'],
            [['created_at'], 'string'],
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
        $query = Brand::find()->alias('b');
        $query = $query->joinWith("createdUser AS c_u", true, 'LEFT JOIN');
        $query = $query->joinWith("updatedUser AS u_u", true, 'LEFT JOIN');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,//如果不定义，默认为20
            ],
//            'sort' => ['attributes' => ['id']],//如果定义，则只能按照id来排序，否则所有字段都可以
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'b.id' => $this->id,
            'b.updated_at' => $this->updated_at,
            'b.status' => $this->status,
            'b.sort' => $this->sort,
            'b.created_by' => $this->created_by,
            'b.updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'b.name', $this->name])
            ->andFilterWhere(['like', 'b.chinese_name', $this->chinese_name])
            ->andFilterWhere(['like', 'b.english_name', $this->english_name])
            ->andFilterWhere(['like', 'b.logo', $this->logo])
            ->andFilterWhere(['like', 'b.describe', $this->describe])
            ->andFilterWhere(['like', 'b.home_link', $this->home_link]);

        if ( ! is_null($this->created_at) && strpos($this->created_at, ' - ') !== false ) {
            list($start_date, $end_date) = explode(' - ', $this->created_at);
            $query->andFilterWhere(['between', 'b.created_at', strtotime($start_date), strtotime($end_date.' 23:59:59')]);
//            $this->created_at = null;
        }

        return $dataProvider;
    }
}
