<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "ban".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $executor_id
 * @property string $reason
 * @property string $created_at
 * @property string $duration
 * @property string $active
 *
 * @property User $executor
 * @property User $user
 */
class Ban extends \yii\db\ActiveRecord
{


    public $days;
    public $hours;
    public $minutes;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ban';
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
                'updatedAtAttribute' => false,
                'value' => function(){return date("Y-m-d H:i:s");},
            ],
        ];
    }

    public function rules()
    {
        return [
            [['user_id','reason'],'required'],
            [['user_id'], 'integer'],
            [['days', 'hours', 'minutes'],'integer', 'max'=>1000],
            [['reason'], 'string'],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'executor_id' => 'Executor ID',
            'reason' => 'Reason',
            'created_at' => 'Created At',
            'duration' => 'Duration',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(User::className(), ['id' => 'executor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getDays(){
        return floor($this->duration/(24*60));
    }

    public function getHours(){
        return floor(($this->duration-$this->getDays()*24*60)/60);
    }

    public function getMinutes(){
        return $this->duration-$this->getDays()*24*60-$this->getHours()*60;
    }

    public function beforeSave($insert) 
    {
        if (parent::beforeSave($insert)) {
            
            $this->duration=$this->days*24*60+$this->hours*60+$this->minutes;
            $this->executor_id=\Yii::$app->user->id;

            return true;
        } else {
            return TRUE;
    }
       
    }
}
