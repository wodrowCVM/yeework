<?php
$config = [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::className(),
        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => \kartik\grid\Module::className(),
            // see settings on http://demos.krajee.com/grid#module
        ],
        'datecontrol' => [
            'class' => \kartik\datecontrol\Module::className(),
            // see settings on http://demos.krajee.com/datecontrol#module
        ],
        // If you use tree table
        'treemanager' =>  [
            'class' => \kartik\tree\Module::className(),
            // see settings on http://demos.krajee.com/tree-manager#module
        ],
    ],
];

return $config;
