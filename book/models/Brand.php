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