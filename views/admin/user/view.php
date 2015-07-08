<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
            'username',
            'about:ntext',
            ['attribute'=>'sex',
             'value'=>   $model->getUserSex() 
             
                     
            ],
            ['attribute'=>'rank',
             'value'=> $model->getUserRank()
            ],
            'birthdate',
            'last_visit',
            [
               'attribute'=>'total_time',
               'value'=>$model->getTotalTime()
            ],
            'email:email',
            'created_at:datetime',
            'last_watch',
            'timezone',
            'updated_at:datetime',
            'status',
        ],
    ]) ?>

</div>
