<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $password_reset_token
 * @property string $auth_key
 * @property string $verification_key
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username', 'email', 'password', 'password_reset_token', 'auth_key', 'verification_key'], 'string', 'max' => 255],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already taken.'],
            ['email','unique', 'targetClass' => '\app\models\User', 'message'=> 'This email has already taken'],
            [['created_at', 'updated_at'], 'integer'],
            // ['password', 'validatePassword'] 
        ];
    }

    public function behaviors()
    {
        return[
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'verification_key' => 'Verification Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null){
        return static::findOne(['auth_key'=> $token]);
    }

    public static function findByUsername($username){
        return static::findOne(['username'=> $username]);
    }

    public function getAuthKey(){
        return $this->auth_key;
    }

    public function getId(){
        return $this->id;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function validateAuthKey($authKey){
        return $this->auth_key === $authKey;
    }

    public function setPassword($password){
        $this->password = Yii::$app->security->generatePasswordHash( $password );
    }

    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken(){
        $this->password_reset_token = Yii::$app->security->generateRandomString() .'_'. time();
    }

    public function generateEmailVerificationToken(){
        $this->verification_key = Yii::$app->security->generateRandomString() .'_'. time();
    }
}
