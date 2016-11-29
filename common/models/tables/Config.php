<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property string $key
 * @property string $value
 * @property integer $type
 * @property string $note
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class Config extends \yii\db\ActiveRecord
{
    const TYPE_BOOL = 10;
    const TYPE_NUMBER = 11;
    const TYPE_STRING = 12;
    const TYPE_ARRAY = 13;

    const STATUS_DEFAULT = 10;
    const STATUS_DELETE = 0;

    public static function getType()
    {
        return [
            self::TYPE_BOOL=>'bool',
            self::TYPE_NUMBER=>'numberl',
            self::TYPE_STRING=>'string',
            self::TYPE_ARRAY=>'array',
        ];
    }

    public static function getStatus()
    {
        return [
            self::STATUS_DEFAULT=>'默认',
            self::STATUS_DELETE=>'删除',
        ];
    }

    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'type', 'created_at', 'updated_at', 'status'], 'required'],
            [['type', 'created_at', 'updated_at', 'status'], 'integer'],
            [['note'], 'string'],
            [['key', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'type' => Yii::t('app', 'Type'),
            'note' => Yii::t('app', 'Note'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}