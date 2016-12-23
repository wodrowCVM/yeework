<?php

namespace book\models\tables;

use Yii;

/**
 * This is the model class for table "{{%brand}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $chinese_name
 * @property string $english_name
 * @property string $logo
 * @property string $describe
 * @property string $home_link
 * @property integer $created_user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%brand}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'logo', 'created_user_id', 'created_at', 'updated_at'], 'required'],
            [['describe'], 'string'],
            [['created_user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['name', 'chinese_name', 'english_name', 'logo', 'home_link'], 'string', 'max' => 255],
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
            'chinese_name' => Yii::t('app', 'Chinese Name'),
            'english_name' => Yii::t('app', 'English Name'),
            'logo' => Yii::t('app', 'Logo'),
            'describe' => Yii::t('app', 'Describe'),
            'home_link' => Yii::t('app', 'Home Link'),
            'created_user_id' => Yii::t('app', 'Created User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
