<?php

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var book\modules\test\models\BrandSearch $searchModel
 */

$this->title = Yii::t('app', 'Brands');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">
    <div class="page-header">
        <?=\kartik\helpers\Html::a('test1', ['test1'], []) ?>
    </div>

    <?php \yii\widgets\Pjax::begin();
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
            'value' => function($model, $key, $index, $column){
                return \kartik\helpers\Html::img($model->logo.\common\tools\Qiniu::STYLE_YII2_GRIDVIEW, []);
            },
            'format' => 'raw',
            'mergeHeader'=>true,
        ],
        [
            'class' => \kartik\grid\ExpandRowColumn::className(),
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return \kartik\grid\GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('view', ['model'=>$model, 'id'=>$key]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true,
            'pageSummary'=>'总计',//可以是字符串，当为true时，自动合计
        ],
        [
            'class' => \kartik\grid\DataColumn::className(),
            'attribute' => 'id',
//            'pageSummary' => true,
            'footer'=>true,
            'vAlign' => 'middle',
        ],
        [
            'class' => \kartik\grid\DataColumn::className(), //由于是默认类型，可以省略
            'attribute' => 'name',
//            'visible'=>true,//不显示，代码也没有
//            'hidden'=>true,//隐藏，代码还有，导出csv等时还存在
            'hiddenFromExport'=>true,//虽然显示，但导出csv时忽略掉
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
            'attribute'=>'created_at',
            'format' => ['date', 'php:Y-m-d H:i:s'],
            'filterType' => \kartik\grid\GridView::FILTER_DATE_RANGE,
            'filterWidgetOptions' =>[
                'model'=>$searchModel,
                'attribute'=>'created_at',
                'presetDropdown'=>TRUE,
                'convertFormat'=>true,
                'pluginOptions'=>[
                    'format'=>'Y-m-d',
                    'opens'=>'left',
                    'locale' => [
                        'cancelLabel' => 'Clear',
                        'format' => 'Y-m-d',
                    ],
                ]
            ],
        ],
        [
            'attribute'=>'updated_at',
            'format' => ['date', 'php:Y-m-d H:i:s'],
            'filterType' => \kartik\grid\GridView::FILTER_DATE_RANGE,
            'filterWidgetOptions' =>[
                'model'=>$searchModel,
                'attribute'=>'updated_at',
                'presetDropdown'=>TRUE,
                'convertFormat'=>true,
                'pluginOptions'=>[
                    'format'=>'Y-m-d',
                    'opens'=>'left',
                    'locale' => [
                        'cancelLabel' => 'Clear',
                        'format' => 'Y-m-d',
                    ],
                ]
            ],
        ],
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
    echo \kartik\grid\GridView::widget([
        'id' => 'test',
        'pjax'=>true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
//        'responsive'=>true,//自适应，默认为true
//        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
//        'hover'=>true,//鼠标移动上去时，颜色变色，默认为false
        'floatHeader'=>true,//向下滚动时，标题栏可以fixed，默认为false
        'showPageSummary'=>true,//显示统计栏，默认为false
        'condensed' => true,
        'bordered'=>true,
        'striped'=>true,
        'persistResize'=>true,
        'toolbar' => false,
        /*'toolbar' => [
            '{toggleData}',
            '{export}',
        ],*/
        /*'toggleDataOptions'=>[
            'maxCount' => 1000,//当超过1000条时，此按钮隐藏，以免数据太多造成加载问题
            'minCount' => 20,//当超过20条,点击时才会下面的提示
            'confirmMsg' => '总共'. number_format($dataProvider->getTotalCount()).'条数据，确定要显示全部？',//点击时的确认
        ],*/
//        'autoXlFormat'=>true,
//        'export'=>$export,
//        'exportConfig' => $exportConfig,
        'panel' => [
            'type' => 'primary',
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . \kartik\helpers\Html::encode($this->title) . ' </h3>',
            'before' => \kartik\helpers\Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => \kartik\helpers\Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']). " ". \kartik\export\ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $columns,
                    'columnSelectorOptions'=>[
                        'label' => 'Columns',
                        'class' => 'btn btn-danger'
                    ],
                    'fontAwesome' => true,
                    'dropdownOptions' => [
                        'label' => 'Export All',
                        'class' => 'btn btn-success'
                    ],
                ]).
                '<div class="clearfix"></div>',
//            'showFooter' => true,
//            'footer' => false,
        ],
        'pager' => [
//            'options'=>['class'=>'hidden'], //关闭分页
            'firstPageLabel' => "|<<",
            'prevPageLabel' => '<',
            'nextPageLabel' => '>',
            'lastPageLabel' => '>>|',
        ],
    ]);
    \yii\widgets\Pjax::end(); ?>

</div>
