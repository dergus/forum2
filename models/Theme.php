<?php

namespace app\models;

use Yii;

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
     */
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
            [['forum_id', 'text', 'user_id'], 'required'],
            [['forum_id', 'user_id', 'locked', 'fixed'], 'integer'],
            [['text'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['title'], 'string', 'max' => 200]
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
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(Forum::className(), ['id' => 'forum_id']);
    }
}
