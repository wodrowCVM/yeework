<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/22/16
 * Time: 10:22 AM
 */

namespace bookadmin\modules\system\controllers;


use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}