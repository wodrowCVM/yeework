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

return [
    'id' => 'book',
    'basePath' => dirname(__DIR__),
    'params' => $params,
];