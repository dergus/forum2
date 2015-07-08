<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\SelectAsset;
use app\assets\AppAsset;
$forumsAmount=  json_encode($forumsAmount); 
$js="var forumsAmount=".$forumsAmount.";"."function fa(){return forumsAmount};";
$this->registerJs($js,\yii\web\View::POS_BEGIN);
SelectAsset::register($this);
AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Forum */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$pos=[];
if(!$model->isNewRecord){
    
}

?>
<div class="forum-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList($categories,['prompt'=>"Choose a Category"]) ?>

    <?= $form->field($model, 'position')->dropDownList(['choose category first'],  $model->isNewRecord?['disabled'=>TRUE]:[]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->field($model, 'locked')->dropDownList([0=>"locked",1=>"not locked"],['prompt'=>"choose"]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
