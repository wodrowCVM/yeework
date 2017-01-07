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
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>
    <p>
        <?= \yii\helpers\Html::a(Yii::t('app', 'Create Shop'), ['create-shop'], ['class' => 'btn btn-success']) ?>
    </p>
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
