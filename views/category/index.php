<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    

    <div class="row">
        <div class="col-xs-10  col-md-10 col-md-offset-1">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'layout'=>'{items}',
        'itemView' =>'_view'
        
    ]) ?>
        </div>
    </div>

</div>
