<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscription".
 *
 * @property integer $user_id
 * @property integer $subscription_id
 * @property string $adddate
 */
class Subscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'subscription_id'], 'integer'],
            [['adddate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'subscription_id' => 'Subscription ID',
            'adddate' => 'Adddate',
        ];
    }
}
