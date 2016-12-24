<?php

namespace book\models;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "{{%goods}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $name
 * @property integer $brand_id
 * @property string $title
 * @property string $code
 * @property string $cover
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $attribute_ids_str
 * @property integer $is_virtual
 * @property integer $location_area
 * @property string $location_info
 */
class Goods extends \book\models\tables\Goods
{
    public function behaviors()
    {
        return [
            'timestramp'=>[
                'class'=>TimestampBehavior::className(),
            ]
        ];
    }

    public function rules()
    {
        return [
            [['shop_id', 'brand_id', 'name', 'code', 'location_area', 'location_info'], 'required'],
            [['shop_id', 'brand_id', 'created_at', 'updated_at', 'status', 'is_virtual', 'location_area'], 'integer'],
            [['name', 'title', 'code', 'cover', 'attribute_ids_str', 'location_info'], 'string', 'max' => 255],
        ];
    }
}
