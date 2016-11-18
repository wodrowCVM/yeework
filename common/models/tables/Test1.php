<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%test1}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $auth_key
 * @property string $password_hash
 * @property integer $pid
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Test1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%test1}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'unique'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['auth_key', 'string', 'max' => 32],

            ['password_hash', 'string', 'max' => 255],

            ['pid', 'integer'],
            ['pid', 'required'],

            ['status', 'required'],
            ['status', 'integer'],

            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'auth_key' => Yii::t('common', 'Auth Key'),
            'password_hash' => Yii::t('common', 'Password Hash'),
            'pid' => Yii::t('common', 'Pid'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
