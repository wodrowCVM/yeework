<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/18 0018
 * Time: 09:37
 */
?>

<?php
$items = [
    [
        'label' => 'Shop',
        'url' => ['/shop'],
    ],
    [
        'label' => 'About',
        'url' => ['/site/about'],
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
\bootui\NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'type' => \bootui\NavBar::TYPE_DEFAULT,
    'class' => 'navbar-fixed-top',
]);
echo \bootui\Nav::widget([
    'items' => $items,
    'encodeLabels' => false,
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
echo \bootui\Nav::widget([
    'items'=>$_r_items,
    'encodeLabels' => false,
    'isNavbar' => true,
    'options' => [
        'class' => 'navbar-nav navbar-right nav',
    ],
]);
\bootui\NavBar::end();
?>
