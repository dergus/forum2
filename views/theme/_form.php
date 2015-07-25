<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Theme */
/* @var $form yii\widgets\ActiveForm */
if($model->isNewRecord){
$model->locked=1;
$model->fixed=1;
$model->forum_id=$forum->id;}

?>


<div class="theme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'forum_id')->hiddenInput()->label(FALSE) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php if($model->isNewRecord) echo $form->field($model, 'text')->textarea(['rows' => 6]); ?>

    <?php if(\Yii::$app->user->can('moderator')) echo $form->field($model, 'locked')->dropDownList([0=>'locked',1=>'not locked']);?>

    <?php if(\Yii::$app->user->can('moderator')) echo $form->field($model, 'fixed')->dropDownList([0=>'fixed',1=>'not fixed']);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
