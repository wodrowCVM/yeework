<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/23/16
 * Time: 5:29 PM
 */

namespace book\modules\shop\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class GoodsSearch extends Goods
{
    public function rules()
    {
        return [
            [['id', 'shop_id', 'brand_id', 'created_at', 'updated_at', 'status', 'is_virtual', 'location_area'], 'integer'],
            [['name', 'title', 'code', 'cover', 'attribute_ids_str', 'location_info'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Goods::find()->where(['created_user_id'=>\Yii::$app->user->identity->id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'shop_id' => $this->shop_id,
            'brand_id' => $this->brand_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'is_virtual' => $this->is_virtual,
            'location_area' => $this->location_area,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'attribute_ids_str', $this->attribute_ids_str])
            ->andFilterWhere(['like', 'location_info', $this->location_info]);
        return $dataProvider;
    }
}