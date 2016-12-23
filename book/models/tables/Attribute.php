<?php

namespace book\models\tables;

use Yii;

/**
 * This is the model class for table "{{%attribute}}".
 *
 * @property integer $id
 * @property string $identity
 * @property string $name
 * @property string $title
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $show_type
 */
class Attribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attribute}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identity', 'name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'status', 'show_type'], 'integer'],
            [['identity', 'name', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'identity' => Yii::t('app', '属性唯一标志'),
            'name' => Yii::t('app', '属性名'),
            'title' => Yii::t('app', 'Title'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'show_type' => Yii::t('app', '展示样式'),
        ];
    }
}
