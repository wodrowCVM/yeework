<?php

namespace common\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%wodrow_message}}".
 *
 * @property string $id
 * @property string $qq
 * @property string $msg
 * @property integer $created_at
 * @property integer $updated_at
 */
class WodrowMessage extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wodrow_message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qq', 'msg'], 'required'],
            [['qq', 'created_at', 'updated_at'], 'integer'],
            [['msg'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'qq' => Yii::t('common', 'qq'),
            'msg' => Yii::t('common', 'msg'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
