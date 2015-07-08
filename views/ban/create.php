<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ban */

$this->title = Yii::t('app', 'Create Ban');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ban-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
