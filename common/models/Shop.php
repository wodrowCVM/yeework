<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/10 0010
 * Time: 17:23
 */

namespace common\models;


class Shop extends \common\models\tables\Shop
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

    /**
     * 获取用户的可选店铺
     * @param int $user_id
     * @return mixed
     */
    public static function getUserSelectShop($user_id = 0)
    {
        if ($user_id == 0){
            $user_id = \Yii::$app->user->identity->id;
        }
        $shops = self::find()->where(['user_id'=>$user_id, 'status'=>self::STATUS_ACTIVE])->asArray()->all();
        foreach ($shops as $k => $v){
            $data[$v['id']] = $v['name']." (id:".$v['id'].")";
        }
        return $data;
    }
}