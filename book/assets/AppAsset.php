<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/18/16
 * Time: 1:57 PM
 */

namespace book\assets;


use common\assets\Semantic;
use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    ];

    public $js = [
    ];

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->depends = [
            Bootstrap::className(),
        ];
        /*\Yii::$container->set(\yii\grid\GridView::className(), \Zelenin\yii\SemanticUI\widgets\GridView::className());
        \Yii::$container->set(\yii\widgets\ActiveForm::className(), \Zelenin\yii\SemanticUI\widgets\ActiveForm::className());
        \Yii::$container->set(\yii\bootstrap\ActiveForm::className(), \Zelenin\yii\SemanticUI\widgets\ActiveForm::className());
        \Yii::$container->set(\yii\widgets\Breadcrumbs::className(), \Zelenin\yii\SemanticUI\collections\Breadcrumb::className());
        \Yii::$container->set(\yii\grid\CheckboxColumn::className(), \Zelenin\yii\SemanticUI\widgets\CheckboxColumn::className());*/
    }
}