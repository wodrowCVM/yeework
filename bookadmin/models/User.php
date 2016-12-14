<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/14/16
 * Time: 11:18 AM
 */

namespace bookadmin\models;


use yii\web\IdentityInterface;

class User extends \bookadmin\models\tables\User implements IdentityInterface
{
    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token'=>$token]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email'=>$email]);
    }

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
}