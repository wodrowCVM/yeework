<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property string $id
 * @property string $shop_id
 * @property string $name
 * @property string $brand_id
 * @property string $title
 * @property string $code
 * @property string $cover
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property string $attribute_ids_str
 * @property integer $is_virtual
 * @property string $location_area
 * @property string $location_info
 * @property string $created_by
 * @property string $updated_by
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
            [['shop_id', 'name', 'code', 'created_at', 'updated_at', 'location_area', 'location_info', 'created_by', 'updated_by'], 'required'],
            [['shop_id', 'brand_id', 'created_at', 'updated_at', 'status', 'is_virtual', 'location_area', 'created_by', 'updated_by'], 'integer'],
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
            'shop_id' => Yii::t('app', 'Shop ID'),
            'name' => Yii::t('app', 'Name'),
            'brand_id' => Yii::t('app', 'Brand ID'),
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
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
