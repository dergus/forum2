<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Forum */

$this->title = Yii::t('app', 'Create Forum');
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['admin/category/index']];
$this->params['breadcrumbs'][]=['label'=>$ctg->title,'url'=>['admin/forum/index','id'=>$ctg->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ctg'=>$ctg
    ]) ?>

</div>
