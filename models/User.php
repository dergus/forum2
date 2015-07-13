<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;
use yii\db\Expression;
use yii\helpers\HtmlPurifier;
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
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    public $day;
    public $month;
    public $year;
    public $password;
    public $password_repeat;
    public $captcha;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => function(){return date("Y-m-d H:i:s");},
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required','on'=>'signup'],
            ['name', 'unique', 'message' => 'This username has already been taken.'],
            ['name', 'string', 'min' => 2, 'max' => 32,'skipOnEmpty'=>FALSE],
            
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required','on'=>'signup'],
            ['email', 'email','skipOnEmpty'=>FALSE],
            ['email', 'unique', 'message' => 'This email address has already been taken.'],
            
            [['day','month','year'],'required','on'=>'signup'],
            [['day','month','year'],'integer','skipOnEmpty'=>FALSE],
            
            ['password', 'required','on'=>'signup'],
            ['password', 'string', 'min' => 6],
            
            ['password_repeat', 'required','on'=>'signup'],
            ['password_repeat', 'string', 'min' => 6],
            
            ['password','compare'],
            
            
            ['birthdate','filter','filter'=>function()
        {
                    return $this->year."-".$this->month."-".$this->day;
            
        }   ],
            ['birthdate','date','format'=>"yyyy-MM-dd"],
            ['birthdate','required','on'=>'signup'],
             
            ['about','string','length'=>[3,300]],
            ['about','default','value'=>NULL],
            ['about','filter','filter'=>  function($text)
            {
                    return HtmlPurifier::process($text);
            }],
            
            ['sex','required','on'=>'signup'],
            ['sex','in','range'=>[0,1]],
            
            ['captcha','captcha','captchaAction'=>'site/captcha','on'=>'signup'],
            ['rank','in','range'=>[1,2,3,4]]
        
        ];
    }

    public function scenarios(){

        return array_merge(parent::scenarios(),[

            'usertime'=>['last_visit','total_time']

            ]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
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
        return static::findOne(['name' => $username, 'status' => self::STATUS_ACTIVE]);
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
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public function getRankLabels(){
        return [
            1=>"Creator",
            2=>"Administrator",
            3=>"Moderator",
            4=>"User"
        ];
    }

    
    public function getDayVal(){
        return date('d', strtotime($this->birthdate));
    }
    public function getMonthVal(){
        return date('n', strtotime($this->birthdate));
    }
    public function getYearVal(){
        return date('Y', strtotime($this->birthdate));
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
    public function setPassword()
    {
        $this->password_hash=Yii::$app->security->generatePasswordHash($this->password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
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

//    public function attributeLabels()
//    {
//        return [
//            'id' => Yii::t('user', 'ID'),
//            'username' => Yii::t('user', 'Username'),
//            'email' => Yii::t('user', 'E-mail'),
//            'status' => Yii::t('user', 'Status'),
//            'created_at' => Yii::t('user', 'Created At'),
//        ];
//    }

    public function getStatusLabel()
    {
        $statuses = $this->getStatuses();
        return ArrayHelper::getValue($statuses, $this->status);
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_DELETED => Yii::t('user', 'Delete'),
            self::STATUS_ACTIVE  => Yii::t('user', 'Active'),
        ];
    }
    
    public  function getTotalTime(){
                return gmdate("H:i:s", $this->total_time);
               }

    public function getUserRank(){
     if($this->rank==4){
                     return 'User';
                 }elseif ($this->rank==3) {
                     return 'Moderator'; 
                 }elseif ($this->rank==2) {
                     return 'Administrator';
                }elseif ($this->rank==1) {
                    return 'Creator';
                }
                 
                
}
    public function getUserSex(){
        return $this->sex==0?'female':'male';
    }

    public function beforeSave($insert) {
    if (parent::beforeSave($insert)) {
        if($this->password)
        $this->password_hash=Yii::$app->security->generatePasswordHash($this->password);
        if($this->isNewRecord){
        $this->generateAuthKey();
        $this->rank=4;
        }
        
        
        return true;
    } else {
        return TRUE;
    }
       
    }
    
    

}