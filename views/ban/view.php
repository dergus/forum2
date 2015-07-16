<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ban */

$this->title = $model->id;
$this->params['breadcrumbs'][]=['label'=>'Users','url'=>['admin/user/index']];
$this->params['breadcrumbs'][]=['label'=>$model->user->name,'url'=>['admin/user/view','id'=>$model->user->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bans'), 'url' => ['index','user_id'=>$model->user_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ban-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'executor_id',
            'reason:ntext',
            'created_at',
            [
                'attribute'=>'duration',
                'value'=>$model->getDays()." days ".$model->getHours()." hours ".$model->getMinutes()." minutes"
                    
                
            ]
        ],
    ]) ?>

</div>
