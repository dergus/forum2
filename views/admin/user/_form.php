<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    
    <label class="control-label" for="signupform-day">Birthdate</label>
<div class="row">
<?php
        $model->day=$model->getDayVal();
        $model->month=$model->getMonthVal();
        $model->year=$model->getYearVal();


?>
    <div class="col-xs-4"><?= $form->field($model, 'day')->dropDownList(interval(1, 31))->label(FALSE) ?></div>
    <div class="col-xs-4"><?= $form->field($model, 'month')->dropDownList(interval(1, 12))->label(FALSE)?></div>
    <div class="col-xs-4"><?= $form->field($model, 'year')->dropDownList(interval(date('Y'),1910 ))->label(FALSE)?></div>

    </div>

    <?= $form->field($model, 'sex')->inline()->radioList([1=>"Male",0=>"Female"]) ?>
    <?= $form->field($model, 'about')->textarea(); ?>
    
    <?= $form->field($model, 'rank')->dropDownList($model->getRankLabels()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php function interval($start,$end){
      $rg=  range($start, $end);
      $arrayInterval=[];
      foreach ($rg as $r){
         $arrayInterval[$r]=$r;
          
          
      }
      return $arrayInterval;
      }
          
      
     ?>