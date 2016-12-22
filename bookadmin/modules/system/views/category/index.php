<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/22/16
 * Time: 10:24 AM
 */
?>
<div class="system-category-show">
    <?=\kartik\tree\TreeView::widget([
        // single query fetch to render the tree
        // use the Product model you have in the previous step
        'query' => \bookadmin\models\Category::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Categories'],
        'fontAwesome' => false,     // optional
        'isAdmin' => false,         // optional (toggle to enable admin mode)
        'displayValue' => 1,        // initial display value
        'softDelete' => true,       // defaults to true
        'cacheSettings' => [
            'enableCache' => true   // defaults to true
        ]
    ]) ?>
</div>
