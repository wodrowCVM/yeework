<?php

namespace common\models\tables\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%sku}}".
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
    use \mootensai\relation\RelationTrait;

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
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sku}}';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
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
            'status' => Yii::t('app', 'Status'),
            'code' => Yii::t('app', '货号'),
            'art_no' => Yii::t('app', '货号'),
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
