<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/24/16
 * Time: 5:22 PM
 */
$this->title = Yii::t('app', 'Create Brand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brand'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="goods-create-brand">

    <h3><?= \yii\helpers\Html::encode($this->title) ?><?=Yii::$app->request->get('shop_id'); ?></h3>

    <div class="goods-create-brand-div">

        <?php $form = \bootui\ActiveForm::begin([
            'id' => 'goods-create-brand-form',
        ]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'chinese_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'english_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'describe')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'home_link')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'home_link')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php \bootui\ActiveForm::end(); ?>

    </div>

</div>