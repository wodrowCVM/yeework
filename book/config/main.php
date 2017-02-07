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
    'name' => '易书网',
    'version' => '0.1',
    'language' => 'zh-CN',
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
    'controllerMap' => [
        // ...
    ],
    'modules' => [
        'test' => [
            'class' => \book\modules\test\Test::className(),
        ],
        'shop' => [
            'class' => \book\modules\shop\Shop::className(),
        ],
        'user' => [
            'class' => \book\modules\user\Module::className(),
            'requireUsername' => true,
            'loginDuration' => 10,
//            'loginExpireTime' => '1 minutes',
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
                    'categories' => ['email'],
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
        'formatter' => [
            'class' => \yii\i18n\Formatter::className(),
            'dateFormat' => 'php:Y-m-d',
            'datetimeFormat' => 'php:Y-m-d H:i:s',
            'timeFormat' => 'php:H:i:s',
        ],
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
        ],
        'assetManager' => [
            'converter' =>
                [
                    'class' => \singrana\assets\Converter::className(),
                ],
        ],
        'i18n' => [
            'translations' => [
                'user' => [
                    'class' => \yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@app/messages',
                ]
            ],
        ],
        'user' => [
            'class' => \book\modules\user\components\User::className(),
            'enableAutoLogin' => false,
//            'enableSession' => false,
        ],
    ],
//    'on eventName' => function(){},
//    'as behavior' => function(){},
];

return $config;