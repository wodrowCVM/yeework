<?php

namespace book\models\tables;

use Yii;

/**
 * This is the model class for table "{{%sku}}".
 *
 * @property integer $id
 * @property integer $goods_id
 * @property string $price
 * @property integer $stock
 * @property string $name
 * @property string $parameter
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $code
 * @property string $art_no
 */
class Sku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sku}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'created_at', 'updated_at', 'code'], 'required'],
            [['goods_id', 'stock', 'created_at', 'updated_at', 'status'], 'integer'],
            [['price'], 'number'],
            [['parameter'], 'string'],
            [['name', 'art_no'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 40],
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
            'price' => Yii::t('app', 'Price'),
            'stock' => Yii::t('app', '库存'),
            'name' => Yii::t('app', 'Name'),
            'parameter' => Yii::t('app', '参数'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'code' => Yii::t('app', '货号'),
            'art_no' => Yii::t('app', '货号'),
        ];
    }
}
