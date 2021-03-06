<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/10 0010
 * Time: 17:21
 */

namespace common\models;


use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class Goods extends \common\models\tables\Goods
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
            ],
        ];
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id'=>'brand_id']);
    }

    const IS_VIRTUAL_FALSE = 0;
    const IS_VIRTUAL_TURE = 1;

    const STATUS_ACTIVE = 10;

    public static function getIsVirtualSelect()
    {
        return [
            self::IS_VIRTUAL_FALSE=>'不是虚拟产品',
            self::IS_VIRTUAL_TURE=>'是虚拟产品',
        ];
    }

    public static function getStatusSelect()
    {
        return [
            self::STATUS_ACTIVE=>'上架中',
        ];
    }

    public static function createCode()
    {
        $x = time()."_".\Yii::$app->user->identity->id."_";
        $y = sha1($x);
        return $y;
    }
}