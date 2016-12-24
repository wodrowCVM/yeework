<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/24/16
 * Time: 2:53 PM
 */
/* @var $this yii\web\View */
/* @var $model book\models\tables\Goods */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-view">

    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <p>
        <?= \yii\helpers\Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= \yii\helpers\Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= \Zelenin\yii\SemanticUI\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'shop_id',
            'name',
            'brand_id',
            'title',
            'code',
            'cover',
            'created_at',
            'updated_at',
            'status',
            'attribute_ids_str',
            'is_virtual',
            'location_area',
            'location_info',
        ],
    ]) ?>

</div>