<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 2017/3/22
 * Time: 11:09
 */

namespace book\modules\test\controllers;


use common\tools\Tools;
use yii\web\Controller;

class Test1Controller extends Controller
{
    public function actionIndex()
    {
        Tools::test1(12);
    }
}