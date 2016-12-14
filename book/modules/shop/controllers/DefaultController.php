<?php

namespace book\modules\shop\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `shop` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
//                        'actions' => ['*'],
                        'allow' => true,
                        'roles' => ['@',],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
//        return $this->render('index');
        $this->redirect(['my-shops']);
    }

    public function actionMyShops()
    {
        return $this->render('my-shops');
    }
}
