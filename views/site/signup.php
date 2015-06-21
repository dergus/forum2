<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-xs-3 col-xs-offset-1">
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['site/auth'],
                'popupMode' => false,
            ]) ?>
        </div>
        <div class="col-xs-2">
            <h2>OR</h2>
        </div>
        <div class="col-xs-5">
            <h2>fill out the following form</h2>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username')?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'password_repeat')->passwordInput() ?>
            <label class="control-label" for="signupform-day">Birthdate</label>
            <div class="row">
                
                <div class="col-xs-4"><?= $form->field($model, 'day')->dropDownList(interval(1, 31),['prompt'=>'day'])->label(FALSE) ?></div>
                <div class="col-xs-4"><?= $form->field($model, 'month')->dropDownList(interval(1, 12),['prompt'=>'month'])->label(FALSE)?></div>
                <div class="col-xs-4"><?= $form->field($model, 'year')->dropDownList(interval(date('Y'),1910 ),['prompt'=>'year'])->label(FALSE)?></div>
                
                </div>
                
                <?= $form->field($model, 'sex')->inline()->radioList([1=>"Male",0=>"Female"]) ?>
                <?= $form->field($model, 'about')->textarea(); ?>
                
                
                <?=Captcha::widget([
                                'model' => $model,
                                'attribute' => 'captcha',
                                'template'=>"<b>Enter code</b>{image}{input}"
]);             ?>
            <p></p>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
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