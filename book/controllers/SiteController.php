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
        return $this->render('index');
    }
}