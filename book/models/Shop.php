<?php

namespace book\models;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/12 0012
 * Time: 19:11
 */
class Shop extends \book\models\tables\Shop
{
    const TYPE_PERSOPN = 10;
    const TYPE_COMPANY = 11;
    const TYPE_SCHOOL = 12;

    const STATUS_ACTIVE = 10;

    const CLASS_DEFALUT = 10;

    public static function getType()
    {
        return [
            self::TYPE_PERSOPN=>'个人',
            self::TYPE_COMPANY=>'公司',
            self::TYPE_SCHOOL=>'学校',
        ];
    }

    public static function getStatus()
    {
        return [
            self::STATUS_ACTIVE=>'正常',
        ];
    }

    public static function getClass()
    {
        return [
            self::CLASS_DEFALUT=>'默认',
        ];
    }
}