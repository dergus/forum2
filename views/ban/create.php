<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ban */

$this->title = Yii::t('app', 'Create Ban');
$this->params['breadcrumbs'][]=['label'=>'Users','url'=>['admin/user/index']];
$this->params['breadcrumbs'][]=['label'=>$model->user->name,'url'=>['admin/user/view','id'=>$model->user->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ban-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user_id'=>$user_id
    ]) ?>

</div>
