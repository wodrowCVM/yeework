<?php

namespace common\models\tables;

use \common\models\tables\base\Attribute as BaseAttribute;

/**
 * This is the model class for table "attribute".
 */
class Attribute extends BaseAttribute
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['created_at', 'updated_at', 'status', 'show_type', 'created_by', 'updated_by'], 'integer'],
            [['name', 'title'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
