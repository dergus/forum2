<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Theme */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['admin/category/index']];
$this->params['breadcrumbs'][] = ['label'=>$forum->category->title,'url'=>['admin/forum/index','id'=>$forum->category->id]];
$this->params['breadcrumbs'][] = ['label'=>$forum->title,'url'=>['admin/theme/index','id'=>$forum->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-view">

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
            'forum_id',
            'title',
            'user_id',
            'created_at',
            'updated_at',
            ['attribute'=>'locked',
             'value'=>$model->locked==0?'locked':'not locked'
            ],
            ['attribute'=>'fixed',
             'value'=>$model->fixed==0?'fixed':'not fixed'
            ]
        ],
    ]) ?>

</div>
