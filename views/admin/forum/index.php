<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Themes');
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['admin/admin/index']];
$this->params['breadcrumbs'][] = ['label'=>$forum->category->title,'url'=>['admin/category/index','id'=>$forum->category->id]];
$this->params['breadcrumbs'][] = $forum->title;
?>
<div class="theme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Theme'), ['admin/theme/create','id'=>$forum->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'forum_id',
            'title',
            'user_id',
            ['attribute'=>'locked',
             'value'=>function($model){ return $model->locked==0?'locked':'not locked';}
            ],
            ['attribute'=>'fixed',
             'value'=>function($model){  return $model->fixed==0? 'fixed': 'not fixed';}
            ],

            ['class' => 'yii\grid\ActionColumn',
             'header'=>"Actions" ,
             'controller'=>'admin/theme' 
            ],
        ],
    ]); ?>

</div>
