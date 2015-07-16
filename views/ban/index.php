<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bans');
$this->params['breadcrumbs'][]=['label'=>'Users','url'=>['admin/user/index']];
$this->params['breadcrumbs'][]=['label'=>$user->name,'url'=>['admin/user/view','id'=>$user->id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="ban-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Ban User'), ['create','user_id'=>Html::encode($user_id)], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'created_at',
            'duration',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
