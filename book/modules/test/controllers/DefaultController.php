<?php

namespace book\modules\test\controllers;

use common\components\config\Config;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'auth' => [
                'class' => \yii\authclient\AuthAction::className(),
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }

    /**
     * Success Callback
     * @param QqAuth|WeiboAuth $client
     * @see http://wiki.connect.qq.com/get_user_info
     * @see http://stuff.cebe.cc/yii2docs/yii-authclient-authaction.html
     */
    public function successCallback($client) {
        $id = $client->getId(); // qq | sina | weixin
        $attributes = $client->getUserAttributes(); // basic info
        $openid = $client->getOpenid(); //user openid
        $userInfo = $client->getUserInfo(); // user extend info
        var_dump($id, $attributes, $openid, $userInfo);
    }

    public function actionIndex()
    {
        \Yii::$app->cache->set('x', '654');
        $this->view->params['abc'] = 'abc';
        return $this->render('index',[
            'abcd' => 'abcd'
        ]);
    }

    public function actionTest1()
    {
        return $this->render('test1',[]);
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
