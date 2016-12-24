<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/24/16
 * Time: 2:51 PM
 */
/* @var $this yii\web\View */
/* @var $model \book\modules\shop\models\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search">

    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shop_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'brand_id') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'cover') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'attribute_ids_str') ?>

    <?php // echo $form->field($model, 'is_virtual') ?>

    <?php // echo $form->field($model, 'location_area') ?>

    <?php // echo $form->field($model, 'location_info') ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= \yii\helpers\Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php \yii\bootstrap\ActiveForm::end(); ?>

</div>