<?php

namespace common\models\tables;

use \common\models\tables\base\Sku as BaseSku;

/**
 * This is the model class for table "sku".
 */
class Sku extends BaseSku
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['goods_id', 'created_at', 'updated_at', 'code', 'created_by', 'updated_by'], 'required'],
            [['goods_id', 'stock', 'created_at', 'updated_at', 'status', 'created_by', 'updated_by'], 'integer'],
            [['price'], 'number'],
            [['parameter'], 'string'],
            [['name', 'art_no'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 40],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
