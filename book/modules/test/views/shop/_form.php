<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var book\modules\test\models\Shop $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="shop-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'user_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter User ID...']],

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 店铺名...', 'maxlength' => 255]],

            'type' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 店铺类型...', 'maxlength' => 11]],

            'status' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 状态...', 'maxlength' => 11]],

            'class' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 等级...', 'maxlength' => 11]],

            'created_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 创建日期...', 'maxlength' => 11]],

            'updated_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 修改日期...', 'maxlength' => 11]],

            'created_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Created By...', 'maxlength' => 11]],

            'updated_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Updated By...', 'maxlength' => 11]],

            'description' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Description...', 'maxlength' => 255]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
