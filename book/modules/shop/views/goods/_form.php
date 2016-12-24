<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/24/16
 * Time: 2:40 PM
 */

/* @var $this yii\web\View */
/* @var $model book\models\tables\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <?php $form = \bootui\ActiveForm::begin([]); ?>

    <?= $form->field($model, 'shop_id')->dropDownList(\book\models\Shop::getUserSelectShop(), ['style'=>'width:400px;',]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_id')->widget(\bootui\select2\Select2::className(), [
        'items' => \book\models\Brand::getBrandSelect(),
        'options' => ['class' => 'form-control'],
        'addon' => ['prepend' => 'Select'],
    ])->label('品牌 (<small>若没有找到请先'.\yii\helpers\Html::a('创建品牌','#', [
            'id' => 'create-brand-a',
            'data-toggle' => 'modal',
            'data-target' => '#create-brand-modal',
            'class'=>'btn btn-xs btn-default',
        ]).',通过审核后即可上架产品</small>)', ['encodeLabels' => false]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cover')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'attribute_ids_str')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_virtual')->textInput() ?>

    <?= $form->field($model, 'location_area')->textInput() ?>

    <?= $form->field($model, 'location_info')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php \bootui\ActiveForm::end(); ?>

</div>

<?php
\yii\bootstrap\Modal::begin([
    'id' => 'create-brand-modal',
    'header' => '<h4 class="modal-title">创建</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
]);
\yii\bootstrap\Modal::end();
?>
<?php \common\components\jsblock\JsBlock::begin() ?>
    <script>
        $(function (e) {
            $.get({
                url:"<?=\yii\helpers\Url::toRoute('create-brand') ?>",
                data:{},
                success:function (data) {
                    $('.modal-body').html(data);
                }
            });
        })
    </script>
<?php \common\components\jsblock\JsBlock::end() ?>