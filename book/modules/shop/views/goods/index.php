<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/24/16
 * Time: 2:45 PM
 */
/* @var $this yii\web\View */
/* @var $searchModel \book\modules\shop\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Goods');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">

    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= \yii\helpers\Html::a(Yii::t('app', 'Create Goods'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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