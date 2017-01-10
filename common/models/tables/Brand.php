<?php

namespace common\models\tables;

use \common\models\tables\base\Brand as BaseBrand;

/**
 * This is the model class for table "brand".
 */
class Brand extends BaseBrand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'logo', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['describe'], 'string'],
            [['created_at', 'updated_at', 'status', 'sort', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['chinese_name', 'english_name', 'logo', 'home_link'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
