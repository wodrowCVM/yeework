<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/24/16
 * Time: 2:43 PM
 */
$this->title = Yii::t('app', 'Create Goods');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="goods-create">

    <h3><?= \yii\helpers\Html::encode($this->title) ?><?=Yii::$app->request->get('shop_id'); ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>