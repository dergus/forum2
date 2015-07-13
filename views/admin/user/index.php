<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'filterPosition'=>  GridView::FILTER_POS_HEADER,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'about:ntext',
             'birthdate',
            ['attribute'=>'sex',
             'content'=>  function($model){
              return $model->getUserSex();  
             },
                     
            ],
            [
                'attribute'=>'rank',
                'content'=>  function ($model){
                 return $model->getUserRank();
                 
                }
            ],
             'last_visit:datetime',
             [
               'attribute'=>'total_time',
               'content'=>  function ($model){
                return $model->getTotalTime();
               }
               ],
             'email:email',
             'created_at:datetime',
            // 'status',

            ['class' => 'yii\grid\ActionColumn',
             'header'=>'Actions'],
        ],
    ]); ?>

</div>
