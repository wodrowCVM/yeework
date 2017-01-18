<?php

namespace book\modules\shop\controllers;

use book\modules\shop\models\Brand;
use book\modules\shop\models\BrandSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BrandController implements the CRUD actions for Brand model.
 */
class BrandController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
//                        'actions' => ['*'],
                        'allow' => true,
                        'roles' => ['@',],
                    ],
                ],
            ],
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
//                    'create' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Brand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BrandSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brand model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Brand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Brand();
        $model->status = $model::STATUS_IN_REVIEW;
        $model->created_user_id = \Yii::$app->user->identity->getId();
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Brand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
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

    /**
     * Deletes an existing Brand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Brand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Brand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTest()
    {
        /*for ($i = 4; $i<10000; $i++){
            $arr[] = ['name' => 'test'.$i, 'created_user_id'=>Yii::$app->user->identity->getId(), 'logo' => 'http://www.baidu.com', 'created_at' => time(), 'updated_at' => time(), 'status' => Brand::STATUS_ACTIVE, 'sort' => \book\models\Brand::SORT_DEFAULT];
        }
        Yii::$app->db->createCommand()->batchInsert(\book\models\Brand::tableName(), ['name','created_user_id','logo', 'created_at', 'updated_at', 'status', 'sort'], $arr)->execute();*/
    }

    public function actionAjaxSearchBrandForSelect2()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $q = \Yii::$app->request->get('name');
        $out = ['results' => ['id' => '', 'name' => '']];
        $x = $data = \book\models\Brand::find()
            ->select('id, name');
        if ($q) {
            $x = $x->andFilterWhere(['like', 'name', $q]);
        }

        $data = $x->andFilterWhere(['like', 'name', $q])
            ->limit(10)
            ->asArray()
            ->all();

        $out['results'] = array_values($data);

        return $out;
    }
}
