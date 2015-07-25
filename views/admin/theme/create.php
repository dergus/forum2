<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Theme */

$this->title = Yii::t('app', 'Create Theme');
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['admin/admin/index']];
$this->params['breadcrumbs'][] = ['label'=>$forum->category->title,'url'=>['admin/category/index','id'=>$forum->category->id]];
$this->params['breadcrumbs'][] = ['label'=>$forum->title,'url'=>['admin/forum/index','id'=>$forum->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'forum'=>$forum
    ]) ?>

</div>
