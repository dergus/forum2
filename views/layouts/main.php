<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        
        
        <?php 
        $nav_items=[
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']]:
                        ['label' => 'Logout (' . Yii::$app->user->identity->name . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ];
       
        if(Yii::$app->user->can("administrate")){
            
            array_unshift($nav_items, ['label' => 'Administrate', 'items'=>[

                    ['label'=>"Forum",'url'=>['admin/admin']],
                    ['label'=>"Users",'url'=>['admin/user']]


                ]]);
            
        }
        
        if(Yii::$app->user->isGuest){
            $nav_items[13]=['label' => 'Signup', 'url' => ['/site/signup']];
        }

        
        ?>
        <?php
            NavBar::begin([
                'brandLabel' => 'Forum',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right dropdown-toggle'],
                'items' => $nav_items,
            ]);
            NavBar::end();
        ?>
        
        
        <div class="container">
            
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
           
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Forum2 <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
