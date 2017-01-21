<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 1/21/17
 * Time: 2:56 PM
 */

namespace console\controllers;


use common\components\curl\Curl;
use yii\console\Controller;

class TestController extends Controller
{
    public function actionTest1()
    {
        $x = Curl::get("http://www.baidu.com/");
        var_dump($x);
    }
}