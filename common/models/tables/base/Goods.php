<?php

namespace common\models\tables\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%goods}}".
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
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'name', 'code', 'created_at', 'updated_at', 'location_area', 'location_info', 'created_by', 'updated_by'], 'required'],
            [['shop_id', 'brand_id', 'created_at', 'updated_at', 'status', 'is_virtual', 'location_area', 'created_by', 'updated_by'], 'integer'],
            [['name', 'title', 'code', 'cover', 'attribute_ids_str', 'location_info'], 'string', 'max' => 255]
        ];
    }
    
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
            'status' => Yii::t('app', 'Status'),
            'attribute_ids_str' => Yii::t('app', '属性id字符串'),
            'is_virtual' => Yii::t('app', '是否虚拟产品'),
            'location_area' => Yii::t('app', '所在地'),
            'location_info' => Yii::t('app', '所在地详细'),
        ];
    }

/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }
}
