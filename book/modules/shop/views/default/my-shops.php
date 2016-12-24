<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/14/16
 * Time: 4:49 PM
 */
?>

<div class="my-shops">
    <h4>我的店铺列表 <span class="pull-right"><small><?=\yii\bootstrap\Html::a('创建店铺', ['create-shop']) ?></small></span></h4>
    <hr>
    <div>
        <?php \yii\widgets\Pjax::begin(); ?>    <?= \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
//                'user_id',
                'name',
//                'description',
                'type',
                'status',
                'class',
                'created_at:datetime',
                'updated_at:datetime',

                ['class' => \yii\grid\ActionColumn::className()],
            ],
        ]); ?>
        <?php \yii\widgets\Pjax::end(); ?>
    </div>
</div>
