<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var book\modules\test\models\Brand $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="brand-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Name...', 'maxlength' => 50]],

            'logo' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Logo...', 'maxlength' => 255]],

            'created_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 创建日期...', 'maxlength' => 11]],

            'updated_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 修改日期...', 'maxlength' => 11]],

            'created_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Created By...', 'maxlength' => 11]],

            'updated_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Updated By...', 'maxlength' => 11]],

            'describe' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Enter Describe...','rows' => 6]],

            'status' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 状态...', 'maxlength' => 11]],

            'sort' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Sort...']],

            'chinese_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Chinese Name...', 'maxlength' => 255]],

            'english_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter English Name...', 'maxlength' => 255]],

            'home_link' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Home Link...', 'maxlength' => 255]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
