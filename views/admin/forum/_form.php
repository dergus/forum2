<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\SelectAsset;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Forum */
/* @var $form yii\widgets\ActiveForm */

        $items=[];
        if($model->isNewRecord){
        $model->category_id=$ctg->id;
        $model->position=$ctg->getCountForums()+1;
        $items=array_combine(range(1, $ctg->getCountForums()+1), range(1, $ctg->getCountForums()+1));
        }else{
            $fa=  json_encode($forumsAmount); 
            $js="var forumsAmount=".$fa.";";
            $this->registerJs($js,\yii\web\View::POS_BEGIN);
            $items=array_combine(range(1, $ctg->getCountForums()), range(1, $ctg->getCountForums()));

            SelectAsset::register($this);
            AppAsset::register($this);
            
            

        }
    
    ?>
<div class="forum-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if($model->isNewRecord):?>

    <?= $form->field($model, 'category_id')->hiddenInput()->label(FALSE) ?>

    <?= $form->field($model, 'position')->dropDownList($items) ?>

    <?php else:?>
    <?= $form->field($model, 'category_id')->dropDownList($categories) ?>

    <?= $form->field($model, 'position')->dropDownList($items) ?>
    

    <?php endif;?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->field($model, 'locked')->dropDownList([0=>"locked",1=>"not locked"],['prompt'=>"choose"]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
