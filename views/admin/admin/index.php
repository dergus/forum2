<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['admin/category/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute'=>'title',
             'content'=>  function ($model){
                 return Html::a($model->title, ['admin/category/index','id'=>$model->id]);
             }
             ],
            'position',
            'created_at',
            [
              'header'=>'forums',
               'content'=>  function ($model){
                   return $model->countForums;
               }
            ],
            ['class' => 'yii\grid\ActionColumn',
             'header'=>"Actions" ,
             'controller'=>'admin/category' 
            ],
        ],
    ]); ?>

</div>
