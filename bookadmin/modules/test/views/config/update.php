<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model bookadmin\modules\test\models\Config */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Config',
]) . $model->key;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->key, 'url' => ['view', 'id' => $model->key]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="config-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
