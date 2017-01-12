<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/14/16
 * Time: 4:49 PM
 */
$this->title = "my-shops";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="my-shops">
    <h1><?//= \yii\helpers\Html::encode($this->title) ?></h1>
    <p>
        <?//= \yii\helpers\Html::a(Yii::t('app', 'Create Shop'), ['create-shop'], ['class' => 'btn btn-success']) ?>
    </p>
    <div>
        <?php \yii\widgets\Pjax::begin(); ?>
        <?= \kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => \kartik\grid\SerialColumn::className()],

//                'id',
//                'user_id',
                'name',
//                'description',
                'type',
                'status',
                'class',
//                'created_at:datetime',
//                'updated_at:datetime',

                [
                    'class' => \kartik\grid\ActionColumn::className(),
                    'header' => '操作',
                    'template' => '{view} {update} {delete}',//只需要展示删除和更新
                    'headerOptions' => [],
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                Yii::$app->urlManager->createUrl(['/shop/default/view', 'id' => $model->id, 'edit' => 't']),
                                ['title' => Yii::t('yii', 'View'),]
                            );
                        },
                        'update' => function ($url, $model, $key) {
                            return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                Yii::$app->urlManager->createUrl(['/shop/default/update', 'id' => $model->id, 'edit' => 't']),
                                ['title' => Yii::t('yii', 'Edit'),]
                            );
                        },
                        'delete' => function ($url, $model, $key) {
                            return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                Yii::$app->urlManager->createUrl(['/shop/default/delete', 'id' => $model->id, 'edit' => 't']),
                                ['title' => Yii::t('yii', 'Delete'), 'data-method'=>'post']
                            );
                        }
                    ],
                ],
            ],
            'responsive' => true,
            'hover' => true,
            'condensed' => true,
            'floatHeader' => true,
            'toolbar'=>false,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.\yii\bootstrap\Html::encode($this->title).' </h3>',
                'type' => 'info',
                'before' => \yii\bootstrap\Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create-shop'], ['class' => 'btn btn-success']),
                'after' => \yii\bootstrap\Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
                'showFooter' => false,
//                'footer' => false,
            ],
        ]); ?>
        <?php \yii\widgets\Pjax::end(); ?>
    </div>
</div>
