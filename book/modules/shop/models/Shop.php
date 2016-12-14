<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/12 0012
 * Time: 19:37
 */
namespace book\modules\shop\models;
use yii\behaviors\TimestampBehavior;

class Shop extends \book\models\Shop
{
    public function behaviors()
    {
        return [
            [
                'class'=>TimestampBehavior::className(),
            ],
        ];
    }

    public function beforeValidate()
    {
        if(parent::beforeValidate()){
            $this->user_id = \Yii::$app->user->getId();
            return true;
        }else{
            return false;
        }
    }
}