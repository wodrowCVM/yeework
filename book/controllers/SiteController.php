<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/18/16
 * Time: 11:22 AM
 */

namespace book\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = \Yii::$app->name;
        return $this->render('index');
    }

    public function actionAbout()
    {
        $this->view->title = \Yii::$app->name;
        return $this->render('about');
    }
}