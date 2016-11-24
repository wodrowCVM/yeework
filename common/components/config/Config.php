<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/24/16
 * Time: 4:09 PM
 */

namespace common\components\config;


use yii\base\Component;

class Config extends Component
{
    public function get($k)
    {
        return $k;
    }

    public function set($k, $v, $type)
    {
        echo 2;
    }
}