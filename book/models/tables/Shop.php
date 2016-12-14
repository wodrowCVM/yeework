<?php

namespace book\models\tables;

use Yii;

/**
 * This is the model class for table "{{%shop}}".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $status
 * @property string $class
 * @property string $created_at
 * @property string $updated_at
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'type', 'status', 'class'], 'required'],
            [['user_id', 'type', 'status', 'class', ], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', '店铺名称'),
            'description' => Yii::t('app', 'Description'),
            'type' => Yii::t('app', '店铺类型'),
            'status' => Yii::t('app', '状态'),
            'class' => Yii::t('app', '等级'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
