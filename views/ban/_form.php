<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ban */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

	if($model->isNewRecord){
		$model->user_id=$user_id;
	}
	
	if(!$model->isNewRecord){
		$model->days=floor($model->duration/(24*60));
		$model->hours=floor(($model->duration-$model->days*24*60)/60);
		$model->minutes=$model->duration-$model->days*24*60-$model->hours*60;
	}

?>
<div class="ban-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-xs-12">
    <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>
    <label class="control-label" for="banform-days">Duration</label>
    <div class="row">
	    <div class='col-xs-4'><?= $form->field($model, 'days')->textInput(['maxlength' => true,'placeholder'=>'hours'])->label(false) ?></div>

	    <div class='col-xs-4'><?= $form->field($model, 'hours')->textInput(['maxlength' => true,'placeholder'=>'hours'])->label(false) ?></div>

	    <div class='col-xs-4'><?= $form->field($model, 'minutes')->textInput(['maxlength' => true,'placeholder'=>'minutes'])->label(false) ?></div>
    </div>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
