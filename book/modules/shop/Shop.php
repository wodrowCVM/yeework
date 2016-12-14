<?php

namespace book\modules\shop;

/**
 * shop module definition class
 */
class Shop extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'book\modules\shop\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        \Yii::$app->layout = "main-shop";
        \Yii::$app->view->title = \Yii::$app->name."-我的店铺";
        // custom initialization code goes here
    }
}
