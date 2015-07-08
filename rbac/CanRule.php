<?php
namespace app\rbac;

use yii\rbac\Rule;
use app\models\User;

class CanRule extends Rule{
    
    public $name="CanRule";




    public function execute($user, $item, $params) {
        
        $subject= User::findOne($user)->rank;
        $object=  User::findOne(intval($params['object']))->rank;
        if($subject&&$object){
        return $subject<$object?TRUE:FALSE;}
      return FALSE;
        
    }
}

