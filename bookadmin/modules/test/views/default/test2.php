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


<?php \mootensai\components\JsBlock::begin() ?>
<script>
    $(function (e) {
        var x = _.assign({ 'a': 1 }, { 'b': 2 }, { 'c': 3 });
    })
</script>
<?php \mootensai\components\JsBlock::end() ?>
