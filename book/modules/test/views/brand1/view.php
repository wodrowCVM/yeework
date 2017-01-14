<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model book\modules\test\models\Brand */
?>
<div class="brand-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'chinese_name',
            'english_name',
            'logo',
            'describe:ntext',
            'home_link',
            'created_at',
            'updated_at',
            'status',
            'sort',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
