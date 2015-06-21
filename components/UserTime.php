<?php
namespace app\components;
use yii\base\Component;
use app\models\User;

class UserTime extends Component{
    
    public function update() {
        
        if(!\Yii::$app->user->isGuest){
            
            $user=User::find()->where(['id'=>  \Yii::$app->user->id])->one();
            $last_visit=new \DateTime($user->last_visit);
            $last_visit=$last_visit->getTimestamp();
            $now=new \DateTime(date("y-m-d H:i:s"));
            $now=$now->getTimestamp();
            $diff=$now-$last_visit;
            if($diff<600){
            $user->total_time+=$diff;
            
            }
            $user->last_visit=date("Y-m-d H:i:s");
            $user->save();
            
        }
        
        
    }
    
}
