<?php

namespace book\models\tables;

use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $name
 * @property integer $brand_id
 * @property string $title
 * @property string $code
 * @property string $cover
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $attribute_ids_str
 * @property integer $is_virtual
 * @property integer $location_area
 * @property string $location_info
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'brand_id', 'name', 'code', 'created_at', 'updated_at', 'location_area', 'location_info'], 'required'],
            [['shop_id', 'brand_id', 'created_at', 'updated_at', 'status', 'is_virtual', 'location_area'], 'integer'],
            [['name', 'title', 'code', 'cover', 'attribute_ids_str', 'location_info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shop_id' => Yii::t('app', '商店'),
            'name' => Yii::t('app', 'Name'),
            'brand_id' => Yii::t('app', '品牌'),
            'title' => Yii::t('app', 'Title'),
            'code' => Yii::t('app', '货号'),
            'cover' => Yii::t('app', 'Cover'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'attribute_ids_str' => Yii::t('app', '属性id字符串'),
            'is_virtual' => Yii::t('app', '是否虚拟产品'),
            'location_area' => Yii::t('app', '所在地'),
            'location_info' => Yii::t('app', '所在地详细'),
        ];
    }
}
