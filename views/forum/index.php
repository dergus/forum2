<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ForumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Themes');
$this->params['breadcrumbs'][] = ['label'=>$forum->category->title,'url'=>['category/index','id'=>$forum->category->id]];
$this->params['breadcrumbs'][] = $forum->title;
?>
<div class="forum-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Theme'), ['theme/create','id'=>$forum->id], ['class' => 'btn btn-success']) ?>
    </p>
<?php if($fixedThemes->totalCount!==0): ?>
<div class="row">
    <div class="col-xs-12">
    <table class="table">
        <tr style="background: #3aab81"> <th >Themes</th><th >Messages</th><th nowrap>Last Message</th></tr>
    <?= ListView::widget([
        'dataProvider' => $fixedThemes,
        'itemOptions' => ['class' => 'item'],
        'showOnEmpty' => [false],
        'itemView' => '_view.php'
    ]) ?>
    </table>
    </div>
</div>
<?php endif; ?>

<?php if($themes->totalCount!==0): ?>
<div class="row">
    <div class="col-xs-12">
    <table class="table">
        <tr style="background: #3aab81"> <th >Themes</th><th >Messages</th><th nowrap>Last Message</th></tr>
    
    <?= ListView::widget([
        'dataProvider' => $themes,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_view.php',
        'showOnEmpty' => [false],
    ]) ?> 

    </table>
    </div>
</div> 
<?php else: ?> 
<b>No themes yet.</b>
<?php endif;?> 

</div>
