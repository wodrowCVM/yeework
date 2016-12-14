<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/14/16
 * Time: 12:55 PM
 */

namespace bookadmin\models\forms;



use bookadmin\models\User;
use yii\base\Model;

class Login extends Model
{
    public $email;
    public $password;
    public $verifyCode;
    public $rememberMe = true;

    private $_user;

    public function attributeLabels()
    {
        return [
            'email' => \Yii::t('app', 'Email'),
            'password' => \Yii::t('app', 'Password'),
            'rememberMe' => \Yii::t('app', 'Remember Me'),
        ];
    }

    public function rules()
    {
        return [
            // email and password are both required
            [['email', 'password'], 'required'],
            ['email', 'email'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return \Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }
        return $this->_user;
    }
}