<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "private_message".
 *
 * @property string $message
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $send_time
 * @property integer $is_read
 */
class PrivateMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'private_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'required'],
            [['message'], 'string'],
            [['sender_id', 'receiver_id', 'is_read'], 'integer'],
            [['send_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message' => 'Message',
            'sender_id' => 'Sender ID',
            'receiver_id' => 'Receiver ID',
            'send_time' => 'Send Time',
            'is_read' => 'Is Read',
        ];
    }
}
