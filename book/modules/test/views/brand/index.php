<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

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
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?php /* echo Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Brand',
]), ['create'], ['class' => 'btn btn-success'])*/ ?>
    </p>

    <?php Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => \kartik\grid\CheckboxColumn::className(),
            ],
            'id',
            [
                'class' => \yii\grid\DataColumn::className(), //由于是默认类型，可以省略
                'attribute' => 'name',
                /*'value' => function ($model) {
                    return $model->name;
                },*/
            ],
            /*[
//                'label'=>'更新日期',
                'value' => function($model){
                    return "123456".$model->id;
                },
            ],*/
//            'chinese_name',
//            'english_name',
//            'logo',
            'describe:ntext',
//            'home_link',
//            'created_at',
//            'updated_at',
            [
                'class' => \common\components\grid\EnumColumn::className(),
                'attribute' => 'status',
                'enum' => \common\models\Brand::getStatus(),
            ],
            'sort',
//            'created_by',
//            'updated_by',
            [
                'class' => \kartik\grid\ActionColumn::className(),
                'header' => '操作',
                'template' => '{view} {update} {delete}',//只需要展示删除和更新
                'headerOptions' => [],
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        Yii::trace($model, 'wodrow');
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['test/brand/view', 'id' => $model->id, 'edit' => 't']),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    },
                    'delete' => function($url, $model, $key){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
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
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,
        'toolbar' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
            'type' => 'info',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false,
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
    Pjax::end(); ?>

</div>
