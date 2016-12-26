<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model book\modules\shop\models\Brand */
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
            'created_user_id',
            'created_at',
            'updated_at',
            'status',
            'sort',
        ],
    ]) ?>

</div>
