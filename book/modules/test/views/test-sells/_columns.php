<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'id',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'order_count',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'order_total',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'order_amount',
        'filter' => \kartik\field\FieldRange::widget([
            'model' => $searchModel,
            'template' => '{widget}{error}',
            'name1'=>'order_amount',
            'name2'=>'order_amount',
        ]),
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'name',
        'value' => function($model){
            return implode(',', \yii\helpers\ArrayHelper::map($model->orders, 'id', 'price'));
        }
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],

];   