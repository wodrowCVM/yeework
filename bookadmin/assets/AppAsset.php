<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/18/16
 * Time: 1:57 PM
 */

namespace bookadmin\assets;


use common\assets\Semantic;
use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css',
    ];

    public $js = [
    ];

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->depends = [
            Bootstrap::className(),
            \common\assets\AdminLte::className(),
        ];
    }
}