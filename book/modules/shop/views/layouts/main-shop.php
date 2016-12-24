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
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    店铺管理
                </h3>
            </div>
            <?php
            $items = [
                [
                    'label'=>'我的店铺',
                    'url'=>['/shop/default'],
                    'options' => [
                        'class' => 'list-group-item',
                    ],
                ],
                [
                    'label'=>'我的商品',
                    'url'=>['/shop/goods'],
                    'options' => [
                        'class' => 'list-group-item',
                    ],
                ],
            ];
            ?>
            <?=\bootui\Nav::widget([
                'items'=>$items,
                'encodeLabels' => false,
//                'isNavbar' => true,
                'options' => [
                    'class' => 'list-group',
                ],
            ]) ?>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9">
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?=$content ?>
    </div>
</div>
<?php $this->endContent(); ?>
