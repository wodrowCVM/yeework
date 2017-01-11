<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%brand}}".
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
            [['name', 'logo', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['describe'], 'string'],
            [['created_at', 'updated_at', 'status', 'sort', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['chinese_name', 'english_name', 'logo', 'home_link'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'sort' => Yii::t('app', 'Sort'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
