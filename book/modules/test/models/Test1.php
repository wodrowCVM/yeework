<?php

namespace book\modules\test\models;

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
            [['name', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['pid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'password_hash'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'pid' => 'Pid',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
