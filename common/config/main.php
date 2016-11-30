<?php
$config = [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::className(),
        ],
        'config'=>[
            'class'=>\common\components\config\Config::className(),
        ],
    ],
    'modules' => [
        'user' => [
            'class' => \dektrium\user\Module::className(),
            'mailer' => [
                'sender'                => [
                    \common\config\ConfigDataLocal::$config['wodrow_qq_email'] => 'wodrow'
                ],
                'welcomeSubject'        => 'Welcome',
                'confirmationSubject'   => 'Confirmation',
                'reconfirmationSubject' => 'Email change',
                'recoverySubject'       => 'Recovery',
            ]
        ],
    ],
];

return $config;
