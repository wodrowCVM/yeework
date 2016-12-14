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
    $items = [
        ['label' => 'About', 'url' => '/site/about'],
        ['label' => 'Contact', 'url' => '/site/contact'],
    ];
    if (Yii::$app->user->isGuest){
        $_r_items = [
            [
                'label'=>Yii::t('app', 'Login'),
                'url'=>\yii\helpers\Url::to(['/user/login']),
            ],
            [
                'label'=>Yii::t('app', 'Join'),
                'url'=>\yii\helpers\Url::to(['/user/register']),
            ],
        ];
    }else{
        $show_name = Yii::$app->user->identity->username?Yii::$app->user->identity->username:Yii::$app->user->identity->email;
        $_r_items = [
            [
//                'label'=>Html::img(Yii::$app->user->identity->profile->getAvatarUrl(40), ['class'=> 'img img-rounded']),
                'label'=>$show_name,
                'items' => [
                    [
                        'label' => "个人中心",
                        'url' => \yii\helpers\Url::to(['/user/account']),
                    ],
                    [
                        'label' => "我的订单",
                        'url' => \yii\helpers\Url::to(['/user/profile']),
                    ],
                    [
                        'label' => "我的店铺",
                        'url' => \yii\helpers\Url::to(['/shop']),
                    ],
                    [
                        'label' => "退出[".$show_name."]",
                        'url'=>\yii\helpers\Url::to(['/user/logout']),
                        'linkOptions' => ['data-method' => 'post'],
                    ],
                ],
                'options' => [
                    'id' => 'navbar-avatar',
                ],
            ],
        ];
    }
    bootui\NavBar::begin([
        'brandLabel' => '易书网',
        'brandUrl' => Yii::$app->homeUrl,
        'type' => bootui\NavBar::TYPE_DEFAULT,
        'class' => 'navbar-fixed-top',
    ]);
    echo bootui\Nav::widget([
        'items' => $items,
        'isNavbar' => true,
    ]);
    ?>
    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <?php
    echo bootui\Nav::widget([
        'items'=>$_r_items,
        'encodeLabels' => false,
        'options' => [
            'class' => 'navbar-nav navbar-right nav',
        ],
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
