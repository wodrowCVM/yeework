<?php

namespace common\models\tables;

use \common\models\tables\base\Goods as BaseGoods;

/**
 * This is the model class for table "goods".
 */
class Goods extends BaseGoods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['shop_id', 'name', 'code', 'created_at', 'updated_at', 'location_area', 'location_info', 'created_by', 'updated_by'], 'required'],
            [['shop_id', 'brand_id', 'created_at', 'updated_at', 'status', 'is_virtual', 'location_area', 'created_by', 'updated_by'], 'integer'],
            [['name', 'title', 'code', 'cover', 'attribute_ids_str', 'location_info'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
