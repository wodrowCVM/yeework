<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/14/16
 * Time: 4:49 PM
 */
?>

<div class="my-shops">
    <?php
    $items = [
        [
            'label'=>'我的店铺',
            'url'=>['/shop/default/my-shops'],
        ],
        [
            'label'=>'店铺grid',
            'url'=>['/shop/shop']
        ],
    ];
    ?>
    <?=\bootui\Nav::widget([
        'items'=>$items,
        'encodeLabels' => false,
//                'isNavbar' => true,
        'options' => [
//                    'class' => 'list-group',
        ],
    ]) ?>
</div>
