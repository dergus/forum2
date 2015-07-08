<?php
namespace app\rbac;

use yii\rbac\Rule;
use app\models\User;

class UserGroupRule extends Rule{
    
    
    public $name="UserGroupRule";


    public function execute($user, $item, $params) {
        
        if(!\Yii::$app->user->isGuest){
            
            $group=  User::findOne($user)->rank;
            
            if ($item->name=="admin") {
                return $group == 1 || $group == 2;
            }elseif ($item->name=="moderator") {
                return $group == 1 || $group == 2 || $group==3;
                
            }
            elseif ($item->name=="user") {
                return $group == 1 || $group == 2 || $group==3 || $group==4;
            
        }
            
        }
        return FALSE;
        
    }
}


