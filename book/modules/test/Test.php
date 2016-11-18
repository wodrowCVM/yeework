<?php

namespace book\modules\test;

/**
 * test module definition class
 */
class Test extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'book\modules\test\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
