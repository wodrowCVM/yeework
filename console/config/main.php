<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'backup' => [
            'class' => 'yiier\backup\controllers\BackupController',
        ]
    ],
    'modules' => [
        'backup' => [
            'class' => 'yiier\backup\Module',
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::className(), // or use 'yii\rbac\DbManager'
        ]
    ],
    'params' => $params,
];
