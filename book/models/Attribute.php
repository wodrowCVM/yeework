<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/7 0007
 * Time: 15:12
 */

namespace book\models;


class Attribute extends \book\models\tables\Attribute
{
    public function behaviors()
    {
        return [
            'timestrap' => [
                'class' => \yii\behaviors\TimestampBehavior::className()
            ],
        ];
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at', 'status', 'show_type'], 'integer'],
            [['name', 'title'], 'string', 'max' => 255],
        ];
    }
}