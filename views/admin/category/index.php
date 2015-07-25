<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Forums');
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['admin/admin',]];
$this->params['breadcrumbs'][] = $ctg->title;
?>
<div class="forum-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Forum'), ['admin/forum/create','id'=>$ctg->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            ['attribute'=>'title',
             'content'=>  function ($model){
                 return Html::a($model->title, ['admin/forum/index','id'=>$model->id]);
             }
             ],
            'position',
            'description',
             ['attribute'=>'locked',
             'value'=>  function ($model){
                 return $model->locked==0?"locked":"not locked";
             }
                
                
            ],

            ['class' => 'yii\grid\ActionColumn',
             'header'=>"Actions" ,
             'controller'=>'admin/forum' 
            ],
        ],
    ]); ?>

</div>
