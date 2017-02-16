<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/24/16
 * Time: 2:40 PM
 */

/* @var $this yii\web\View */
/* @var $model book\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">
    <?php
    $get_brand_ajax_url = \yii\helpers\Url::to(['/shop/brand/ajax-search-brand-for-select2']);
    $_brand = new stdClass();
    if (isset($model->brand->id)){
        $_brand->id = $model->brand->id;
        $_brand->name = $model->brand->name;
    }
    $init_brand_json = \GuzzleHttp\json_encode($_brand);
    $get_attribute_ajax_url = \yii\helpers\Url::to(['/shop/attribute/ajax-search-attribute-for-select2']);
    $form = \kartik\widgets\ActiveForm::begin();
    ?>

    <?= $form->field($model, 'shop_id')->dropDownList(\book\models\Shop::getUserSelectShop()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_id')->widget(\kartik\select2\Select2::className(), [
        'options' => ['placeholder' => '请输入标题名称 ...'],
        'pluginOptions' => [
            'placeholder' => 'search ...',
            'allowClear' => true,
            'language' => [
                'errorLoading' => new \yii\web\JsExpression("function () { return 'Waiting...'; }"),
            ],
            'ajax' => [
                'url' => $get_brand_ajax_url,
                'dataType' => 'json',
//                'data' => new \yii\web\JsExpression('function(params) { return {name:params.term}; }'),
                'data' => new \yii\web\JsExpression('function(term,page) { return {search:term}; }'),
                'results' => new \yii\web\JsExpression('function(data,page) { return {results:data.results}; }'),
            ],
            'escapeMarkup' => new \yii\web\JsExpression('function (markup) { return markup; }'),
            'templateResult' => new \yii\web\JsExpression('function(res) { return res.name; }'),
            'templateSelection' => new \yii\web\JsExpression('function (res) { return res.name; }'),
            'initSelection' => isset($model->brand->id)?new \yii\web\JsExpression(
                <<< SCRIPT
                function (element, callback) {
                    callback($init_brand_json);
                }
SCRIPT
            ):null,
        ],
    ])->label('品牌 (<small>若没有找到请先' . \yii\helpers\Html::a('创建品牌', ['brand/create'], [
            'id' => 'create-brand-a',
            'class' => 'btn btn-xs btn-default',
            'target' => '_blank',
        ]) . ',通过审核后即可上架产品</small>)', ['encodeLabels' => false]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cover')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(\book\models\Goods::getStatusSelect()) ?>

    <?php echo $form->field($model, 'is_virtual')->dropDownList(\book\models\Goods::getIsVirtualSelect()) ?>

    <?= $form->field($model, 'location_area')->textInput() ?>

    <?= $form->field($model, 'location_info')->textarea() ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php \kartik\widgets\ActiveForm::end(); ?>

</div>