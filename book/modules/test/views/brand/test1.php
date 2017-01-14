<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/14 0014
 * Time: 10:13
 */

$columns = [
    'id',
    'name',
];
?>

<div class="test1">
    <?=\kartik\grid\GridView::widget([
        'id' => 'test1',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'panel' => [
            'type' => 'primary',
        ],
    ]) ?>

    <?=\kartik\export\ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'fontAwesome' => true,
    ]) ?>
</div>
