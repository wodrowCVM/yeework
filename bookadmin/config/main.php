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
    'id' => 2,
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'bookadmin\controllers',
    'params' => $params,
    'name' => 'bookadmin',
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
            'class' => \bookadmin\modules\test\Test::className(),
        ],
        'shop' => [
            'class' => \bookadmin\modules\shop\Shop::className(),
        ],
        'admin' => [
            'class' => \mdm\admin\Module::className()
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
                        'subject' => '来自 bookadmin 的新日志消息',
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
        'i18n' => [
            'translations' => [],
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::className(), // or use 'yii\rbac\DbManager'
        ],
        'user' => [
            'identityClass' => \bookadmin\models\User::className(),
            'loginUrl' => ['/site/login'],
        ]
    ],
//    'on eventName' => function(){},
//    'as behavior' => function(){},
    'as access' => [
        'class' => \mdm\admin\components\AccessControl::className(),
        'allowActions' => [
            '*',
//            'site/*',
//            'admin/*',
            // 'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
];

return $config;