<?php use yii\helpers\Html;?>
<div class="row">
    <div class="col-xs-12">
    <table class="table">
        <div class="row">
            <tr><td class="col-sm-10"><?=Html::a($model->title,['forum/index','id'=>$model->id]);?><div class="text-muted"><?= $model->description?></div></td><td class="col-sm-2"><?=$model->count?> Theme</td></tr>
        </div>
    </table>
    </div>
</div>

