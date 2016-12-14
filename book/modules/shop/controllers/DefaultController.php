<?php

namespace book\modules\shop\controllers;

use book\modules\shop\models\Shop;
use book\modules\shop\models\ShopSearch;
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
        $searchModel = new ShopSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('my-shops', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreateShop()
    {
        $model = new Shop();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create-shop', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Shop::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
