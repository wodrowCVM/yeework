<?php

use mdm\admin\components\MenuHelper;
use mdm\admin\components\Helper;
use mdm\admin\models\Menu;
use common\models\tables\User;

//$is_admin_super = Yii::$app->user->identity->is_admin==User::IS_ADMIN_SUPER ?1:0;
$is_admin_super = 1;

$items = [
    ['label' => Yii::t('app', 'Operate Menus'), 'options' => ['class' => 'header']],
    ['label' => 'Gii', 'icon'=>'fa fa-cog', 'url' => ['/gii'], 'visible'=>$is_admin_super],
    ['label' => 'RBAC', 'icon'=>'fa fa-cog', 'url' => ['/admin'], 'visible'=>$is_admin_super],
    ['label' => 'Packaii', 'icon'=>'fa fa-cog', 'url' => ['/packaii'], 'visible'=>$is_admin_super],
    ['label' => 'Meter', 'icon'=>'fa fa-dashboard', 'url' => ['/meter'],],
];

$menus = MenuHelper::getAssignedMenu(Yii::$app->user->id);
$menus = Helper::filter($menus);
foreach ($menus as $k => $v){
    $x = Menu::find()->where(['name'=>$v['label']])->one();
    $menus[$k]['icon'] = $x['icon'];
}

$items = array_merge($items,$menus);

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $items,
            ]
        ) ?>

    </section>

</aside>
