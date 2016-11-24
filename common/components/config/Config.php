<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/24/16
 * Time: 4:09 PM
 */

namespace common\components\config;


use common\tools\Tools;
use yii\base\Component;

class Config extends Component
{
    public function get($k)
    {
        $config_key = null;
        $x = \common\models\tables\Config::findOne(['key'=>$k]);
        $y = $x['value'];
        $y = trim($y);
        $y = str_replace('\r', '', $y);
        $y = str_replace('\n', '', $y);
        $y = str_replace(' ', '', $y);
        $y = substr($y,1,strlen($y));
        $y = substr($y,0,-1);
        $y = '$config_key='.$y.";";
        $dir = \Yii::getAlias('@runtime').'/config';
        $path_and_file_name = $dir.'/'.$k.".php";
        Tools::createDir($dir);
        file_put_contents($path_and_file_name, "<?php\r".$y);
        require_once $path_and_file_name;
        return $config_key;
    }

    public function set($k, $v, $type)
    {
        echo 2;
    }
}