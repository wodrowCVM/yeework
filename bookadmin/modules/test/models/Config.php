<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/24/16
 * Time: 4:42 PM
 */

namespace bookadmin\modules\test\models;


class Config extends \common\models\tables\Config
{
    public function afterFind()
    {
        parent::afterFind(); // TODO: Change the autogenerated stub
        if ($this->type == self::TYPE_ARRAY){
            $this->value = json_decode($this->value);
        }
    }

    public function beforeSave($insert)
    {
        $x = parent::beforeSave($insert); // TODO: Change the autogenerated stub
        if ($x){
            if ($this->type == self::TYPE_ARRAY){
                $this->value = json_encode($this->value);
            }
            return true;
        }else{
            return false;
        }
    }
}