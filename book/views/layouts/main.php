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
<?php
$items = [
    #
];
$_items = [
    #
];
$rightMenuItems = [
    #
];
if (Yii::$app->user->isGuest){
    $_rightMenuItems = [
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
    $_rightMenuItems = [
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
$items = \yii\helpers\ArrayHelper::merge($items, $_items);
$rightMenuItems = \yii\helpers\ArrayHelper::merge($rightMenuItems, $_rightMenuItems);
\yii\bootstrap\NavBar::begin(['brandLabel' => 'WODROW']);
echo \yii\bootstrap\Nav::widget([
    'items'=>$items,
//    'rightMenuItems'=>$rightMenuItems,
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav nav'],
]);
\yii\bootstrap\NavBar::end();
?>

<div class="container">
    <?=$content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
