<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Theme */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Theme',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['admin/category/index']];
$this->params['breadcrumbs'][] = ['label'=>$forum->category->title,'url'=>['admin/forum/index','id'=>$forum->category->id]];
$this->params['breadcrumbs'][] = ['label'=>$forum->title,'url'=>['admin/theme/index','id'=>$forum->id]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="theme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
