<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/17/16
 * Time: 6:03 PM
 */

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 1,
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'book\controllers',
    'params' => $params,
    'name' => 'book',
    'version' => '0.1',
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'timeZone' => 'Asia/Shanghai',
    'charset' => 'UTF-8',
    'defaultRoute' => '/site',
    'layout' => 'main',
    'layoutPath' => '@app/views/layouts',
    'runtimePath' => '@app/runtime',
    'viewPath' => '@app/views',
//    'vendorPath' => '@vendor',
//    'extensions' => [],
    'bootstrap' => [
        'log',
    ],
    'modules' => [
        'test' => [
            'class' => \book\modules\test\Test::className(),
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                'file' => [
                    'class' => \yii\log\FileTarget::className(),
                    'levels' => ['error'],
//                    'categories' => ['wodrow'],
                ],
                'email' => [
                    'class' => \yii\log\EmailTarget::className(),
//                    'levels' => ['error', 'warning'],
                    'categories' => ['wodrow'],
                    'message' => [
                        'to' => ['1173957281@qq.com', /*'developer@example.com'*/],
                        'subject' => '来自 book 的新日志消息',
                    ],
                ],
            ],
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::className(),
        ],
    ],
//    'on eventName' => function(){},
//    'as behavior' => function(){},
];

return $config;