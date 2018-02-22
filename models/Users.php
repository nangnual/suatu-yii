<?php

namespace app\models;

use Yii;
use \yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $rememberMe = true;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    
    public static function makePassword($password)
    {
        $tempPass = md5(trim($password));
        $finalPass = sha1($tempPass.substr($tempPass, 4,10));
        return $finalPass;
    }

       /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return Users::find()->where(['id' => $id])->one();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = Users::find()->where(['username' => $username])->one();

        if(null != $user){
            return $user;
        }

        return null;
    }
    /**
     * Finds user by email
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        $user = Users::find()->where(['email' => $email])->one();

        if(null != $user){
            return $user;
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return true;
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

     public function getPesertaTests(){
         return $this->hasMany(PesertaTest::className(), ['id_user' => 'id']);
     }

     public function login($user, $password, $isAdmin)
     {
        $eksis = '';
         if($isAdmin){
            $eksis = self::find()->where([
                'email' => $this->email,
                'password' => $password,
            ])->one();
         }else {
            $eksis = PesertaTest::find()->where([
                'id_user' => $this->id,
                'password' => $password
            ])->one();
         }
         if(null != $eksis || '' != $eksis){
            return true;
         }
         return false;
     }
}
