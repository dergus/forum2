<?php use yii\helpers\Html;?>
<div class="row">
    <div class="col-xs-12">
    <table class="table">
        <tr style="background: #3aab81"> <th colspan="3"><?=Html::a($model->title,['category/index','id'=>$model->id],['style'=>"color:black"]);?></th></tr>
        <div class="row">
        <?php foreach ($model->forums as $forum):?>
        
            <tr><td class="col-sm-10"><?=Html::a($forum->title,['forum/view','id'=>$forum->id]);?><div class="text-muted"><?= $forum->description?></div></td><td class="col-sm-2"><?=$forum->count?> Theme</td></tr>
        <?php endforeach;?>
        </div>
    </table>
    </div>
</div>

