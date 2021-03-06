<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ban */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ban',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bans'), 'url' => ['index','user_id'=>$model->id]];
$this->params['breadcrumbs'][]=['label'=>'Users','url'=>['admin/user/index']];
$this->params['breadcrumbs'][]=['label'=>$model->user->name,'url'=>['admin/user/view','id'=>$model->user->id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ban-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
