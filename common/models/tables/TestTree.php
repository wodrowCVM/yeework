<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 4/6/17
 * Time: 3:05 PM
 */

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%test_tree}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 */
class TestTree extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%test_tree}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['parent_id'], 'integer'],
			[['name'], 'required'],
			[['name'], 'string', 'max' => 20],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'parent_id' => 'Parent ID',
			'name' => 'Name',
		];
	}
}