<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\assets\MessageAsset;

MessageAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ThemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'New Message'), ['message/create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="row">
<div class="col-xs-8 col-xs-offset-2"></div>
    <?= ListView::widget([
        'dataProvider' => $messages,
        'itemOptions' => ['class' => 'item'],
        'showOnEmpty' => [false],
        'itemView' => '_view.php'
    ]) ?>
</div>
</div>
</div>
