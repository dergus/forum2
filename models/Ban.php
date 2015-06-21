<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ban".
 *
 * @property integer $user_id
 * @property integer $executor_id
 * @property string $ban_time
 * @property integer $is_read
 * @property string $reason
 */
class Ban extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['user_id', 'executor_id', 'is_read'], 'integer'],
            [['ban_time'], 'safe'],
            [['reason'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'executor_id' => 'Executor ID',
            'ban_time' => 'Ban Time',
            'is_read' => 'Is Read',
            'reason' => 'Reason',
        ];
    }
}
