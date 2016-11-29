<?php

namespace book\modules\test\controllers;

use common\components\config\Config;
use yii\web\Controller;

/**
 * Default controller for the `test` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        var_dump(\Yii::$app->qiniu->getDisk('wodrow'));
        var_dump(\Yii::$app->config->get('k1'));
        \Yii::$app->cache->set('x', '123456789');
        $this->view->params['abc'] = 'abc';
        return $this->render('index',[
            'abcd' => 'abcd'
        ]);
    }

    public function actionNotice()
    {
        \Yii::error('123456');
    }

    public function actionConfig()
    {
        return $this->render('config');
    }
}
