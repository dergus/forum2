<?php use yii\helpers\Html;?>

        <div class="row">
            <tr><td class="col-sm-10"><?=Html::a(Html::encode($model->title),['theme/index','id'=>$model->id],['style'=>"font-weight:bold"]);?>
            <div>>> <?= Html::a(Html::encode($model->author->name),['user/view','id'=>$model->author->id]); ?></div>
            </td><td class="col-sm-2" ><?=$model->count?></td><td ><div><?= Html::a(Html::encode($model->lastMessage->author->name),['user/view','id'=>$model->lastMessage->author->id]); ?></div><div> <?=$model->lastMessage->created_at?></div></td></tr>
        </div>
