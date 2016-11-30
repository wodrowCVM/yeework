<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/18/16
 * Time: 2:08 PM
 */
use book\assets\AppAsset;
use yii\bootstrap\Html;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
\yii\bootstrap\NavBar::begin();
echo \yii\bootstrap\Nav::widget([
    'items'=>[
        [
            'label'=>'HOME',
            'url'=>\yii\helpers\Url::home(),
        ],
        [
            'label'=>'LOGIN',
            'url'=>\yii\helpers\Url::to(['/user/security/login']),
        ],
        [
            'label'=>'JOIN',
            'url'=>\yii\helpers\Url::to(['/user/registration/register']),
        ],
    ],
]);
\yii\bootstrap\NavBar::end();
?>
<?=$content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
