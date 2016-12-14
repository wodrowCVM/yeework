<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/14/16
 * Time: 8:08 PM
 */
?>

<div class="create-shop">
    <h4><?= \yii\bootstrap\Html::encode($this->title) ?></h4>
    <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
