<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model book\modules\shop\models\Shop */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-view">
    <div class="row">
        <div class="col-lg-12">
            <p>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?php
                /*echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) */
                ?>
                <?= Html::a(Yii::t('app', 'Create Goods'), \yii\helpers\Url::to(['goods/create', 'shop_id'=>Yii::$app->request->get('id')]), ['class' => 'btn btn-success']) ?>
            </p>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
//            'id',
//            'user_id',
                    'name',
                    'description',
                    'type',
                    'status',
                    'class',
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]) ?>
        </div>
        <div class="col-lg-12">
            <?= \yii\grid\GridView::widget([
                'dataProvider' => $goodsDataProvider,
                'filterModel' => $goodsSearchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'shop_id',
                    'name',
                    'brand_id',
                    'title',
                    // 'code',
                    // 'cover',
                    // 'created_at',
                    // 'updated_at',
                    // 'status',
                    // 'attribute_ids_str',
                    // 'is_virtual',
                    // 'location_area',
                    // 'location_info',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
