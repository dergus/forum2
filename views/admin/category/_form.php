<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?php 
        $items=[];
        if($model->isNewRecord){
        $model->position=$model->countCategories+1;
        $items=array_combine(range(1, $model->countCategories+1), range(1, $model->countCategories+1));
        }else{
            $items=array_combine(range(1, $model->countCategories), range(1, $model->countCategories));
        }
    
    ?>

    <?= $form->field($model, 'position')->dropDownList($items) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
