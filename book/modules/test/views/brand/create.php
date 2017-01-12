<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var book\modules\test\models\Brand $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Brand',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
