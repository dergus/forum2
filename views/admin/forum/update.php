<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Forum */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Forum',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['admin/category/index']];
$this->params['breadcrumbs'][]=['label'=>$ctg->title,'url'=>['admin/forum/index','id'=>$ctg->id]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="forum-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories'=>$categories,
        'forumsAmount'=>$forumsAmount,
        'ctg'=>$ctg
    ]) ?>

</div>
