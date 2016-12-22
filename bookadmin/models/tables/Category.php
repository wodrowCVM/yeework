<?php

namespace bookadmin\models\tables;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $lvl
 * @property string $name
 * @property string $icon
 * @property integer $icon_type
 * @property integer $active
 * @property integer $selected
 * @property integer $disabled
 * @property integer $readonly
 * @property integer $visible
 * @property integer $collapsed
 * @property integer $movable_u
 * @property integer $movable_d
 * @property integer $movable_l
 * @property integer $movable_r
 * @property integer $removable
 * @property integer $removable_all
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['root', 'lft', 'rgt', 'lvl', 'icon_type', 'active', 'selected', 'disabled', 'readonly', 'visible', 'collapsed', 'movable_u', 'movable_d', 'movable_l', 'movable_r', 'removable', 'removable_all'], 'integer'],
            [['lft', 'rgt', 'lvl', 'name'], 'required'],
//            [['name'], 'string', 'max' => 60],
            [['icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Unique tree node identifier'),
            'root' => Yii::t('app', 'Tree root identifier'),
            'lft' => Yii::t('app', 'Nested set left property'),
            'rgt' => Yii::t('app', 'Nested set right property'),
            'lvl' => Yii::t('app', 'Nested set level / depth'),
            'name' => Yii::t('app', 'The tree node name / label'),
            'icon' => Yii::t('app', 'The icon to use for the node'),
            'icon_type' => Yii::t('app', 'Icon Type: 1 = CSS Class, 2 = Raw Markup'),
            'active' => Yii::t('app', 'Whether the node is active (will be set to false on deletion)'),
            'selected' => Yii::t('app', 'Whether the node is selected/checked by default'),
            'disabled' => Yii::t('app', 'Whether the node is enabled'),
            'readonly' => Yii::t('app', 'Whether the node is read only (unlike disabled - will allow toolbar actions)'),
            'visible' => Yii::t('app', 'Whether the node is visible'),
            'collapsed' => Yii::t('app', 'Whether the node is collapsed by default'),
            'movable_u' => Yii::t('app', 'Whether the node is movable one position up'),
            'movable_d' => Yii::t('app', 'Whether the node is movable one position down'),
            'movable_l' => Yii::t('app', 'Whether the node is movable to the left (from sibling to parent)'),
            'movable_r' => Yii::t('app', 'Whether the node is movable to the right (from sibling to child)'),
            'removable' => Yii::t('app', 'Whether the node is removable (any children below will be moved as siblings before deletion)'),
            'removable_all' => Yii::t('app', 'Whether the node is removable along with descendants'),
        ];
    }
}
