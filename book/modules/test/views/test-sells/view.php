<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model book\modules\test\models\TestSells */
?>
<div class="test-sells-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
