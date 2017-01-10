<?php

namespace common\models\tables\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%brand}}".
 *
 * @property string $id
 * @property string $name
 * @property string $chinese_name
 * @property string $english_name
 * @property string $logo
 * @property string $describe
 * @property string $home_link
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property integer $sort
 * @property string $created_by
 * @property string $updated_by
 */
class Brand extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'logo', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['describe'], 'string'],
            [['created_at', 'updated_at', 'status', 'sort', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['chinese_name', 'english_name', 'logo', 'home_link'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%brand}}';
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
            'name' => Yii::t('app', 'Name'),
            'chinese_name' => Yii::t('app', 'Chinese Name'),
            'english_name' => Yii::t('app', 'English Name'),
            'logo' => Yii::t('app', 'Logo'),
            'describe' => Yii::t('app', 'Describe'),
            'home_link' => Yii::t('app', 'Home Link'),
            'status' => Yii::t('app', 'Status'),
            'sort' => Yii::t('app', 'Sort'),
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
