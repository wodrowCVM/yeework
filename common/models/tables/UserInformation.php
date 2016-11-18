<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%user_information}}".
 *
 * @property integer $user_id
 * @property string $avatar
 * @property string $nickname
 * @property integer $sex
 * @property integer $birthday
 * @property string $main_page
 * @property string $telephone
 * @property string $mobilephone
 * @property string $qq
 * @property string $country
 * @property integer $area_id
 * @property string $address
 * @property string $company
 * @property string $personalized_signature
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class UserInformation extends \yii\db\ActiveRecord
{
    const SEX_UNKNOW = 0;
    const SEX_MALE = 1;
    const SEX_FEMALE = 2;

    public static function getSex()
    {
        return [
            self::SEX_UNKNOW=>'未知',
            self::SEX_MALE => '男',
            self::SEX_FEMALE => '女',
        ];
    }

    public static function tableName()
    {
        return '{{%user_information}}';
    }

    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'sex', 'birthday', 'area_id', 'created_at', 'updated_at'], 'integer'],
            [['avatar', 'main_page', 'qq', 'country', 'address', 'company', 'personalized_signature'], 'string', 'max' => 255],
            [['nickname'], 'string', 'max' => 16],
            [['telephone'], 'string', 'max' => 13],
            [['mobilephone'], 'string', 'max' => 11],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('common', 'User ID'),
            'avatar' => Yii::t('common', 'Avatar'),
            'nickname' => Yii::t('common', 'Nickname'),
            'sex' => Yii::t('common', 'Sex'),
            'birthday' => Yii::t('common', 'Birthday'),
            'main_page' => Yii::t('common', 'Main Page'),
            'telephone' => Yii::t('common', 'Telephone'),
            'mobilephone' => Yii::t('common', 'Mobilephone'),
            'qq' => Yii::t('common', 'QQ'),
            'country' => Yii::t('common', 'Country'),
            'area_id' => Yii::t('common', 'Area ID'),
            'address' => Yii::t('common', 'Address'),
            'company' => Yii::t('common', 'Company'),
            'personalized_signature' => Yii::t('common', 'Personalized Signature'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
