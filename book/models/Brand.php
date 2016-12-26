<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/24/16
 * Time: 4:20 PM
 */

namespace book\models;


class Brand extends \book\models\tables\Brand
{
    const STATUS_ACTIVE = 10;
    const STATUS_IN_REVIEW = 9;

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
            [['name', 'logo', 'created_user_id', 'status'], 'required'],
            [['describe'], 'string'],
            [['created_user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['name', 'chinese_name', 'english_name', 'logo', 'home_link'], 'string', 'max' => 255],
        ];
    }

    public static function getBrandSelect()
    {
        $data = [];
        $brands = self::find()->select(['id', 'name'])->asArray()->limit(10)->all();
        foreach ($brands as $k => $v){
            $data[$v['id']] = $v['name'];
        }
        return $data;
    }
}