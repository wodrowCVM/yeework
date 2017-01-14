<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/18/16
 * Time: 2:08 PM
 */
\book\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= \kartik\helpers\Html::csrfMetaTags() ?>
    <title><?= \kartik\helpers\Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php \yii\bootstrap\NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'class' => 'navbar-fixed-top',
    ]) ?>
    <?=\yii\bootstrap\Nav::widget([
        'items' => [
            [
                'label' => 'Shop',
                'url' => ['/shop'],
            ],
            [
                'label' => 'About',
                'url' => ['/site/about'],
            ],
        ],
        'encodeLabels' => false,
    ]) ?>
    <?php \yii\bootstrap\NavBar::end() ?>
    <div class="container">
        <?=$content ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
<script>
    $(function(e){
        // 高亮显示相关li
        $("ul.nav li").find("a").each(function () {
            if (window.location.href.indexOf($(this).attr('href'))>0){
                $(this).parent('li').addClass('active');
            }
        })
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
