<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%test_sells_order}}".
 *
 * @property string $id
 * @property integer $test_sells_id
 * @property string $price
 * @property string $total
 */
class TestSellsOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%test_sells_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_sells_id', 'price', 'total'], 'required'],
            [['test_sells_id', 'total'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'test_sells_id' => Yii::t('app', 'Test Sells ID'),
            'price' => Yii::t('app', 'Price'),
            'total' => Yii::t('app', 'Total'),
        ];
    }
}
