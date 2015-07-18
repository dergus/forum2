<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "theme".
 *
 * @property integer $id
 * @property integer $forum_id
 * @property string $title
 * @property string $text
 * @property integer $user_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $locked
 * @property integer $fixed
 *
 * @property Message[] $messages
 * @property Forum $forum
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     * 
     */
    public $text;
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['forum_id'], 'required'],
            ['forum_id','exist','targetClass'=>'app\models\Forum','targetAttribute'=>'id'],
            ['text','required','on'=>'create'],
            [['forum_id', 'locked', 'fixed'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 200]
        ];
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => function(){return date("Y-m-d H:i:s");},
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'forum_id' => 'Forum ID',
            'title' => 'Title',
            'text' => 'Text',
            'user_id' => 'User ID',
            'created_at' => 'Create Time',
            'updated_at' => 'Update Time',
            'locked' => 'Locked',
            'fixed' => 'Fixed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['theme_id' => 'id']);
    }

    public function getLastMessage()
    {
        return $this->hasOne(Message::className(), ['theme_id' => 'id'])->orderBy('created_at DESC');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(Forum::className(), ['id' => 'forum_id']);
    }

    public function getCount(){

        return $this->hasMany(Message::className(), ['theme_id' => 'id'])->count();

    }

    public function getAuthor(){

        return $this->hasOne(User::className(), ['id' => 'user_id']);

    }
    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            
            $this->user_id=\Yii::$app->user->id;
            return true;
        } else {
            return TRUE;
        }
       
    }
    
    
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if($insert){
            $msg=new Message();
            $msg->theme_id=  $this->id;
            $msg->author_id=\Yii::$app->user->id;
            $msg->text=  $this->text;
            $msg->save();
            
        }
        
    }
}
