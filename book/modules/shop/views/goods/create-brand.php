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

    <h1><?= \yii\helpers\Html::encode($this->title) ?><?=Yii::$app->request->get('shop_id'); ?></h1>

    <div class="goods-form">

        <?php $form = \bootui\ActiveForm::begin([]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php \bootui\ActiveForm::end(); ?>

    </div>

</div>