<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/16 0016
 * Time: 16:39
 */

namespace book\modules\test\models;


class TestSells extends \common\models\tables\TestSells
{
    public function getOrders()
    {
        return $this->hasMany(TestSellsOrder::className(), ['test_sells_id' => 'id']);
    }
}