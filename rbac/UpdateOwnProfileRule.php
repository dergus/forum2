<?php
namespace app\rbac;

use yii\rbac\Rule;
use app\models\User;

class UpdateOwnProfileRule extends Rule{
    
    public $name="UpdateOwnProfileRule";




    public function execute($user, $item, $params) {
        
        return $user==$params['id'] ? TRUE : FALSE;
        
    }
}