<?php

namespace book\modules\test\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use book\modules\test\models\Brand;

/**
 * Brand1Search represents the model behind the search form about `book\modules\test\models\Brand`.
 */
class Brand1Search extends Brand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'status', 'sort', 'created_by', 'updated_by'], 'integer'],
            [['name', 'chinese_name', 'english_name', 'logo', 'describe', 'home_link'], 'safe'],
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
        $query = Brand::find();

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
