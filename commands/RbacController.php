<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\rbac;

class RbacController extends Controller{
    
    public function actionInit(){
        
        $auth=  Yii::$app->authManager;
        $auth->removeAll();
        
        $canRule=new rbac\CanRule();
        $auth->add($canRule);
        $groupRule=new rbac\UserGroupRule();
        $auth->add($groupRule);
        $updateOwnProfileRule=new rbac\UpdateOwnProfileRule();
        $auth->add($updateOwnProfileRule);
        
        $administrate=$auth->createPermission("administrate");
        $auth->add($administrate);
        
        $updateUser=$auth->createPermission('updateUser');
        $updateUser->ruleName=$canRule->name;
        $auth->add($updateUser);
        
        $updateTheme=$auth->createPermission('updateTheme');
        $auth->add($updateTheme);
        
        $updateOwnProfile=$auth->createPermission('updateOwnProfile');
        $updateOwnProfile->ruleName=$updateOwnProfileRule->name;
        $auth->add($updateOwnProfile);
        
        $ban=$auth->createPermission('ban');
        $ban->ruleName=$canRule->name;
        $auth->add($ban);
        
        $updateMessage=$auth->createPermission('updateMessage');
        $auth->add($updateMessage);
        
        $user = $auth->createRole('user');
        $user->ruleName=$groupRule->name;
        $auth->add($user);
        $auth->addChild($user, $updateOwnProfile);
        
        $moderator= $auth->createRole('moderator');
        $moderator->ruleName=$groupRule->name;
        $auth->add($moderator);
        $auth->addChild($moderator, $user);
        $auth->addChild($moderator, $updateMessage);
        $auth->addChild($moderator, $updateTheme);
        $auth->addChild($moderator, $ban);
        
        $admin=$auth->createRole('admin');
        $admin->ruleName=$groupRule->name;
        $auth->add($admin);
        $auth->addChild($admin, $moderator);
        $auth->addChild($admin, $administrate);
        $auth->addChild($admin, $updateUser);
        
        
        
    }
    
    
    
}

