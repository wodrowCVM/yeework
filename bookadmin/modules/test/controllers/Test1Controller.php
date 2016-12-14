<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/14/16
 * Time: 3:31 PM
 */

namespace bookadmin\modules\test\controllers;


use yii\web\Controller;

class Test1Controller extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}