<?php
namespace common\models\tables;

use Yii;
use common\Tools;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property integer $is_admin
 * @property string $email_validate_code
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public static function getStatus()
    {
        return [
            self::STATUS_DELETED=>'删除',
            self::STATUS_ACTIVE=>'启用',
        ];
    }

    const IS_ADMIN_FALSE = 0;
    const IS_ADMIN_NORMAL = 1;
    const IS_ADMIN_SUPER = 2;

    public static function getAdmin()
    {
        return [
            self::IS_ADMIN_FALSE=>'不是管理员',
            self::IS_ADMIN_NORMAL=>'正常管理员',
            self::IS_ADMIN_SUPER=>'超级管理员',
        ];
    }

    const EMAIL_ENABLE = '';

    const BEFORE_LOGIN = 'before_login';
    const AFTER_LOGIN = 'after_login';
    const BEFORE_JOIN = 'before_join';
    const AFTER_JOIN = 'after_join';

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getUserInformation()
    {
        return $this->hasOne(UserInformation::className(), ['user_id' => 'id']);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'username' => Yii::t('common', 'Username'),
            'auth_key' => Yii::t('common', 'Auth Key'),
            'password_hash' => Yii::t('common', 'Password Hash'),
            'password_reset_token' => Yii::t('common', 'Password Reset Token'),
            'email' => Yii::t('common', 'Email'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'is_admin' => Yii::t('common', 'Is Admin'),
            'email_validate_code' => Yii::t('common', 'Email Validate Code'),
        ];
    }

    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['status', 'created_at', 'updated_at', 'is_admin'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key', 'email_validate_code'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
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

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generateEmailKey()
    {
        $this->email_validate_code = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->on(self::BEFORE_JOIN, [$this, 'addSuperUser']);
            $this->trigger(self::BEFORE_JOIN);
            return true;
        } else {
            return false;
        }
    }

    public function addSuperUser()
    {
        if(in_array($this->username, Yii::$app->params['superUsers'])){
            $this->is_admin = self::IS_ADMIN_SUPER;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert){
            $this->on(self::AFTER_JOIN, [$this, 'addUserInformation'], $insert);
        }
        $this->trigger(self::AFTER_JOIN);
        parent::afterSave($insert, $changedAttributes);
    }

    public function addUserInformation($insert)
    {
        if ($this->id&&$insert) {
            $time = time();
//            $ip = isset(Yii::$app->request->userIP) ? Yii::$app->request->userIP : '127.0.0.1';
            $userInfo = Yii::createObject([
                'class' => UserInformation::className(),
                'user_id' => $this->id,
                'nickname'=>$this->username,
                'created_at' => $time,
                'updated_at' => $time,
            ]);
            $userInfo->save();
        }
    }
}
