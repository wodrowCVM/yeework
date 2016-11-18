<?php

namespace common\models\tables;


/**
 * This is the model class for table "{{%area}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pid
 * @property string $code
 * @property integer $level
 * @property string $typename
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%area}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'level'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['code'], 'string', 'max' => 5],
            [['typename'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'pid' => Yii::t('app', 'Pid'),
            'code' => Yii::t('app', 'Code'),
            'level' => Yii::t('app', 'Level'),
            'typename' => Yii::t('app', 'Typename'),
        ];
    }
}
