<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%goods_attribute}}".
 *
 * @property string $id
 * @property string $goods_id
 * @property string $attribute_id
 */
class GoodsAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_attribute}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'attribute_id'], 'required'],
            [['goods_id', 'attribute_id'], 'integer'],
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
            'attribute_id' => Yii::t('app', 'Attribute ID'),
        ];
    }
}
