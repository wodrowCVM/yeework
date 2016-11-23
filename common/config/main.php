<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::className(),
        ],
        'user' => [
            'class' => \common\models\tables\User::className(),
        ],
    ],
];
