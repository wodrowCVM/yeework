<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/18 0018
 * Time: 11:12
 */
?>

<?php
\yii\bootstrap\NavBar::begin([
    'brandLabel' => Yii::t('app', 'My Company'),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
        ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
        ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
];

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
    $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => (Yii::$app->user->identity->userInformation->avatar?Html::img(Yii::$app->user->identity->userInformation->avatar, [
                'class'=>'img img-responsive img-circle user-avatar',
            ]):'').Yii::$app->user->identity->userInformation->nickname,
        'items' => [
            ['label' => '我的主页', 'url' => ['/user/default']],
            ['label' => '帐号设置', 'url' => ['/user/setting/index']],
            ['label' => '退出', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
        ],
    ];
}

echo \yii\bootstrap\Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
    'encodeLabels' => false,
]);
\yii\bootstrap\NavBar::end();
?>
