<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/18 0018
 * Time: 14:31
 */

$columns = [
    [
        'class' => \kartik\grid\CheckboxColumn::className(),
    ],
    [
        'class' => \kartik\grid\RadioColumn::className(),
        'vAlign' => 'middle',
        'width' => '36px',
        'headerOptions' => [
            'class' => 'kartik-sheet-style',
            'style' => 'float:none !important;clear:both !important;',
        ],
    ],
    [
        'class' => \kartik\grid\SerialColumn::className(),
    ],
    [
        'label' => 'logo',
//        'attribute'=>'logo',
        /*'value'=>function($model, $key, $index, $column){
            return \kartik\helpers\Html::a($model->logo,[
                'view','id'=>$model->id,
            ],[
                'target'=>'_blank',
                'data-pjax'=>0,
            ]);
        },*/
        'value' => function ($model, $key, $index, $column) {
            return \kartik\helpers\Html::img($model->logo . \common\tools\Qiniu::STYLE_YII2_GRIDVIEW, []);
        },
        'format' => 'raw',
        'mergeHeader' => true,
    ],
    [
        'class' => \kartik\grid\ExpandRowColumn::className(),
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return \kartik\grid\GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('view', ['model' => $model, 'id' => $key]);
        },
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true,
        'pageSummary' => '总计',//可以是字符串，当为true时，自动合计
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'id',
//            'pageSummary' => true,
        'footer' => true,
        'vAlign' => 'middle',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(), //由于是默认类型，可以省略
        'attribute' => 'name',
//            'visible'=>true,//不显示，代码也没有
//            'hidden'=>true,//隐藏，代码还有，导出csv等时还存在
        'hiddenFromExport' => true,//虽然显示，但导出csv时忽略掉
//            'mergeHeader'=>true,//合并标题和检索栏
        /*'value' => function ($model) {
            return $model->name;
        },*/
        'vAlign' => 'middle',
    ],
    /*[
//                'label'=>'更新日期',
        'value' => function($model){
            return "123456".$model->id;
        },
    ],*/
    /*[
        'label' => 'cu',
        'value' => function ($model) {
            return $model->createdUser->username;
        },
//            'mergeHeader'=>true,
    ],*/
    /*[
        'attribute'=>'name',
        'vAlign'=>'middle',
        'width'=>'180px',
        'value'=>function ($model, $key, $index, $widget) {
            return \kartik\helpers\Html::a($model->name,
                '#',
                ['title'=>'View name', 'onclick'=>'alert("This will open the name page.\n\nDisabled for this demo!")']);
        },
        'filterType'=>\kartik\grid\GridView::FILTER_SELECT2,
        'filter'=>\yii\helpers\ArrayHelper::map(\book\models\Brand::find()->orderBy('name')->limit(10)->asArray()->all(), 'id', 'name'),
        'filterWidgetOptions'=>[
            'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Any name'],
        'format'=>'raw'
    ],*/
//            'chinese_name',
//            'english_name',
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'describe',
        'format' => 'ntext',
        'vAlign' => 'middle',
    ],
//            'home_link',
    [
        'attribute' => 'created_at',
        'value' => function ($model) {
            return date("Y-m-d", $model['created_at']);
        },
        'filterType' => \kartik\grid\GridView::FILTER_DATE_RANGE,
        'filterWidgetOptions' => [
            'model' => $searchModel,
            'attribute'=>'created_at',
            'presetDropdown' => TRUE,
            'convertFormat' => true,
            'pluginOptions' => [
                'format' => 'Y-m-d',
                'opens' => 'left',
            ]
        ],
    ],
//            'updated_at',
    [
        'class' => \common\components\grid\EnumColumn::className(),
        'attribute' => 'status',
        'enum' => \common\models\Brand::getStatus(),
        'vAlign' => 'middle',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'sort',
        'pageSummary' => true,
        'vAlign' => 'middle',
    ],
//            'created_by',
//            'updated_by',
    [
        'class' => \kartik\grid\ActionColumn::className(),
        'header' => '操作',
        'template' => '{view} {update} {delete}',//只需要展示删除和更新
//            'headerOptions' => [],
        'buttons' => [
            'update' => function ($url, $model, $key) {
                return \kartik\helpers\Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                    Yii::$app->urlManager->createUrl(['test/brand/view', 'id' => $model->id, 'edit' => 't']),
                    ['title' => Yii::t('yii', 'Edit'),]
                );
            },
            'delete' => function ($url, $model, $key) {
                return \kartik\helpers\Html::a('<span class="glyphicon glyphicon-trash"></span>',
                    ['delete', 'id' => $key],
                    [
//                                'class' => 'btn btn-default btn-xs',
                        'data' => [
                            'confirm' => '你确定要删除吗？',
                        ],
                        'data-method' => 'post',
                    ]
                );
            },
        ],
    ],
];
/*$columns = [
    'id',
    'name',
];*/
return $columns;