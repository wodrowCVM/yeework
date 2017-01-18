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
    $columns = require(__DIR__.'/_columns.php');
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
