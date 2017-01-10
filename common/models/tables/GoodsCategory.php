<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%goods_category}}".
 *
 * @property string $id
 * @property string $goods_id
 * @property string $category_id
 */
class GoodsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'category_id'], 'required'],
            [['goods_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'goods_id' => Yii::t('app', 'Goods ID'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }
}
