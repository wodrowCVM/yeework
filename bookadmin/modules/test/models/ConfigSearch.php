<?php

namespace bookadmin\modules\test\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use bookadmin\modules\test\models\Config;

/**
 * ConfigSearch represents the model behind the search form about `bookadmin\modules\test\models\Config`.
 */
class ConfigSearch extends Config
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'value', 'note'], 'safe'],
            [['type', 'created_at', 'updated_at', 'status'], 'integer'],
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
        $query = Config::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
