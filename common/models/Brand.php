<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/10 0010
 * Time: 17:27
 */

namespace common\models;


class Brand extends \common\models\tables\Brand
{
    const STATUS_ACTIVE = 10; // 正常
    const STATUS_IN_REVIEW = 9; // 审核

    const SORT_DEFAULT = 10;

    public static function getStatus()
    {
        return [
            self::STATUS_ACTIVE=>'正常',
            self::STATUS_IN_REVIEW=>'审核',
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

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'name' => '品牌名',
        ]);
    }
}