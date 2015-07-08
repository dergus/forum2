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
            [['user_id','reason','duration'],'required','on'=>'create'],
            [['user_id', 'duration'], 'integer'],
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
}
