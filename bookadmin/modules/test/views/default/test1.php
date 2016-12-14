<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/29/16
 * Time: 5:23 PM
 */
use yii\authclient\widgets\AuthChoice;

?>

<div class="test-default-test1">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        <?php $authAuthChoice = AuthChoice::begin([
            'baseAuthUrl' => ['/test/default/auth'],
        ]) ?>
        <ul>
            <?php foreach ($authAuthChoice->getClients() as $client): ?>
                <li>
                    <?= $authAuthChoice->clientLink($client) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php AuthChoice::end(); ?>
    </p>
</div>
