<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/12 0012
 * Time: 10:35
 */

namespace book\modules\test\models;


use book\models\User;

class Brand extends \book\models\Brand
{
    public function getCreatedUser()
    {
        return $this->hasOne(User::className(), ['id'=>'created_by']);
    }

    public function getUpdatedUser()
    {
        return $this->hasOne(User::className(), ['id'=>'updated_by']);
    }
}