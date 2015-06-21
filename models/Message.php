<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property integer $theme_id
 * @property string $create_time
 * @property integer $author_id
 * @property integer $to_user
 * @property string $text
 *
 * @property Theme $theme
 * @property User $author
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['theme_id', 'author_id', 'text'], 'required'],
            [['theme_id', 'author_id', 'to_user'], 'integer'],
            [['create_time'], 'safe'],
            [['text'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'theme_id' => 'Theme ID',
            'create_time' => 'Create Time',
            'author_id' => 'Author ID',
            'to_user' => 'To User',
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheme()
    {
        return $this->hasOne(Theme::className(), ['id' => 'theme_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
}
