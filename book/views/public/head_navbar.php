<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/18 0018
 * Time: 09:37
 */
?>

<?php
\yii\bootstrap\NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'id' => 'head_navbar',
        'class' => 'navbar-fixed-top navbar-inverse',
    ],
]);
$items = [
    [
        'label' => 'Shop',
        'url' => ['/shop'],
    ],
    [
        'label' => 'About',
        'url' => ['/site/about'],
    ],
    [
        'label' => 'Test',
        'url' => ['/test'],
    ],
];
if (Yii::$app->user->isGuest){
    $_r_items = [
        [
            'label'=>Yii::t('app', 'Login'),
            'url'=>['/user/login'],
        ],
        [
            'label'=>Yii::t('app', 'Join'),
            'url'=>['/user/register'],
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
                    'url' => ['/user/account'],
                ],
                [
                    'label' => "我的订单",
                    'url' => ['/user/profile'],
                ],
                [
                    'label' => "我的店铺",
                    'url' => ['/shop'],
                ],
                [
                    'label' => "退出[".$show_name."]",
                    'url'=>['/user/logout'],
                    'linkOptions' => ['data-method' => 'post'],
                ],
            ],
            'options' => [
                'id' => 'navbar-avatar',
            ],
        ],
    ];
}
$_r_items = array_merge([
    [
        'label' => "后台",
        'url' => Yii::$app->params['backendUrl'],
        'visible' => YII_DEBUG,
        'linkOptions' => ['target'=>'_blank'],
    ],
], $_r_items);
echo \yii\bootstrap\Nav::widget([
    'items' => $items,
    'encodeLabels' => false,
    'options' => [
        'class' => 'navbar-nav navbar-left nav',
    ],
]);
echo \yii\bootstrap\Nav::widget([
    'items' => $_r_items,
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav navbar-right'],
]);
\yii\bootstrap\NavBar::end();
?>
