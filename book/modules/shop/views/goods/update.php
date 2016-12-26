<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/24/16
 * Time: 2:48 PM
 */
/* @var $this yii\web\View */
/* @var $model book\models\tables\Goods */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Goods',
    ]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="goods-update">

    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>