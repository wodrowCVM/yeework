<?php

namespace book\models\tables;

use Yii;

/**
 * This is the model class for table "{{%sku_attribute}}".
 *
 * @property integer $id
 * @property integer $sku_id
 * @property integer $attribute_id
 * @property string $attribute_value
 * @property integer $show_type
 */
class SkuAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sku_attribute}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku_id', 'attribute_id'], 'required'],
            [['sku_id', 'attribute_id', 'show_type'], 'integer'],
            [['attribute_value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sku_id' => Yii::t('app', 'Sku ID'),
            'attribute_id' => Yii::t('app', 'Attribute ID'),
            'attribute_value' => Yii::t('app', 'Attribute Value'),
            'show_type' => Yii::t('app', '显示样式'),
        ];
    }
}
