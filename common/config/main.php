<?php
return [
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
        ],
    ],
];
