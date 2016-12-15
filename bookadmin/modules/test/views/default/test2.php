<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/29/16
 * Time: 5:23 PM
 */
\kartik\icons\Icon::map($this);
\common\assets\Lodash::register($this);
?>

<?=\kartik\icons\Icon::show('user') ?>

<?=\kartik\tree\TreeView::widget([
    // single query fetch to render the tree
    'query'             => \bookadmin\models\tables\Tree::find()->addOrderBy('root, lft'),
    'headingOptions'    => ['label' => 'Categories'],
    'isAdmin'           => false,                       // optional (toggle to enable admin mode)
    'displayValue'      => 1,                           // initial display value
    //'softDelete'      => true,                        // normally not needed to change
    //'cacheSettings'   => ['enableCache' => true]      // normally not needed to change
]) ?>


<?php \common\components\jsblock\JsBlock::begin() ?>
<script>
    $(function (e) {
        var x = _.assign({ 'a': 1 }, { 'b': 2 }, { 'c': 3 });
    })
</script>
<?php \common\components\jsblock\JsBlock::end() ?>
