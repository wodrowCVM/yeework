<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/18/16
 * Time: 2:08 PM
 */
use book\assets\AppAsset;
use yii\bootstrap\Html;

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
    // dektrium/yii2-user
    /*$items = [
        #
    ];
    if (Yii::$app->user->isGuest){
        $_r_items = [
            [
                'label'=>'LOGIN',
                'url'=>\yii\helpers\Url::to(['/user/security/login']),
            ],
            [
                'label'=>'JOIN',
                'url'=>\yii\helpers\Url::to(['/user/registration/register']),
            ],
        ];
    }else{
        $_r_items = [
            [
                'label'=>Yii::$app->user->identity->username,
                'url'=>\yii\helpers\Url::to(['/user/settings/profile']),
            ],
            [
                'label'=>'LOGOUT',
                'url'=>\yii\helpers\Url::to(['/user/security/logout']),
                'linkOptions' => ['data-method' => 'post'],
            ],
        ];
    }
    \yii\bootstrap\NavBar::begin(['brandLabel' => 'WODROW']);
    echo \yii\bootstrap\Nav::widget([
        'items'=>$items,
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav nav'],
    ]);
    echo \yii\bootstrap\Nav::widget([
        'items'=>$_r_items,
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav navbar-right nav', 'style'=>'margin-right:-30px'],
    ]);
    \yii\bootstrap\NavBar::end();*/

    // amnah/yii2-user
    /*$items = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'User', 'url' => ['/user']],
        Yii::$app->user->isGuest ?
            ['label' => 'Login', 'url' => ['/user/login']] : // or ['/user/login-email']
            ['label' => 'Logout (' . Yii::$app->user->displayName . ')',
                'url' => ['/user/logout'],
                'linkOptions' => ['data-method' => 'post']],
    ];
    \yii\bootstrap\NavBar::begin(['brandLabel' => 'WODROW']);
    echo \yii\bootstrap\Nav::widget([
        'items'=>$items,
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav navbar-right nav', 'style'=>'margin-right:-30px'],
    ]);
    \yii\bootstrap\NavBar::end();*/

    $items = [
        #
    ];
    if (Yii::$app->user->isGuest){
        $_r_items = [
            [
                'label'=>'LOGIN',
                'url'=>\yii\helpers\Url::to(['/user/security/login']),
            ],
            [
                'label'=>'JOIN',
                'url'=>\yii\helpers\Url::to(['/user/registration/register']),
            ],
        ];
    }else{
        $_r_items = [
            [
                'label'=>Yii::$app->user->identity->username,
                'url'=>\yii\helpers\Url::to(['/user/settings/profile']),
            ],
            [
                'label'=>'LOGOUT',
                'url'=>\yii\helpers\Url::to(['/user/security/logout']),
                'linkOptions' => ['data-method' => 'post'],
            ],
        ];
    }

    bootui\NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'type' => bootui\NavBar::TYPE_DEFAULT,
        'class' => 'navbar-fixed-top',
    ]);
    echo bootui\Nav::widget([
        'items' => [
            ['label' => 'About', 'url' => '/site/about'],
            ['label' => 'Contact', 'url' => '/site/contact'],
            ['label' => 'Content', 'items' => [
                ['label' => 'News', 'url' => '#'],
                ['label' => 'Pages', 'url' => '#'],
                ['label' => 'Files', 'url' => '#'],
            ]],
        ],
        'isNavbar' => true,
    ]);

    echo bootui\Nav::widget([
        'items'=>$_r_items,
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav navbar-right nav', 'style'=>'margin-right:-30px'],
    ]);
    bootui\NavBar::end();
    ?>

    <div class="container">
        <?=$content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
