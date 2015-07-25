<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Theme */

$this->title = Yii::t('app', 'Create Theme');
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = ['label'=>$forum->category->title,'url'=>['category/index','id'=>$forum->category->id]];
$this->params['breadcrumbs'][] = ['label'=>$forum->title,'url'=>['forum/index','id'=>$forum->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'forum'=>$forum
    ]) ?>

</div>
