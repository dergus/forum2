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
        'filterPosition'=>  GridView::FILTER_POS_HEADER,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'about:ntext',
             'birthdate',
            ['attribute'=>'sex',
             'content'=>  function($model){
              return $model->sex==0?'female':'male';  
             },
                     
            ],
            [
                'attribute'=>'rank',
                'content'=>  function ($model){
                 if($model->rank==4){
                     return 'User';
                 }elseif ($model->rank==3) {
                     return 'Moderator'; 
                 }elseif ($model->rank==2) {
                     return 'Administrator';
                }elseif ($model->rank==1) {
                    return 'Creator';
                }
                 
                }
            ],
            // 'last_visit',
            // 'total_time',
             'email:email',
            // 'created_at',
            // 'updated_at',
            // 'auth_key',
            // 'password_reset_token',
            // 'status',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Actions'],
        ],
    ]); ?>

</div>
