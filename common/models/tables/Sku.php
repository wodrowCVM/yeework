<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%sku}}".
 *
 * @property string $id
 * @property string $goods_id
 * @property string $price
 * @property string $stock
 * @property string $name
 * @property string $parameter
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property string $code
 * @property string $art_no
 * @property string $created_by
 * @property string $updated_by
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
            [['goods_id', 'created_at', 'updated_at', 'code', 'created_by', 'updated_by'], 'required'],
            [['goods_id', 'stock', 'created_at', 'updated_at', 'status', 'created_by', 'updated_by'], 'integer'],
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
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
