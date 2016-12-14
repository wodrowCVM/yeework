<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/14/16
 * Time: 4:02 PM
 */
?>

<?php $this->beginContent('@book/views/layouts/main.php'); ?>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">123</div>
    <div class="col-lg-9 col-md-9 col-sm-9">
        <?= $content ?>
    </div>
</div>
<?php $this->endContent(); ?>
