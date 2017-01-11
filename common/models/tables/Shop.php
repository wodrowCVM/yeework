<?php

namespace common\models\tables;

use \common\models\tables\base\Shop as BaseShop;

/**
 * This is the model class for table "shop".
 */
class Shop extends BaseShop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'name', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['user_id', 'type', 'status', 'class', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255]
        ]);
    }
	
}
