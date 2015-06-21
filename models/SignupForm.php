<?php
namespace app\models;

use yii\base\Model;
use yii\helpers\HtmlPurifier;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $day;
    public $month;
    public $year;
    public $birthdate;
    public $sex;
    public $about;
    public $password_repeat;
    public $captcha;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            
            [['day','month','year'],'required'],
            
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['password_repeat', 'required'],
            ['password_repeat', 'string', 'min' => 6],
            
            ['password','compare'],
            
            ['birthdate','filter','filter'=>function()
        {
                    return $this->year."-".$this->month."-".$this->day;
            
        }   ],
            ['birthdate','date','format'=>"yyyy-MM-dd"],
            ['birthdate','required'],
             
            ['about','string','length'=>[3,300]],
            ['about','default','value'=>NULL],
            ['about','filter','filter'=>  function($text)
            {
                    return HtmlPurifier::process($text);
            }],
            
            ['sex','required'],
            ['sex','in','range'=>[0,1]],
            
            ['captcha','captcha','captchaAction'=>'site/captcha']
            
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->birthdate=  $this->birthdate;
            $user->sex=  $this->sex;
            $user->about=  $this->about;
            $user->rank=3;
            $user->save();
            return $user;
        }

        return null;
    }
}

