<?php
\common\assets\VideoJs::register($this);
?>

<div class="test-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
    <p>
        <code><?=$this->params['abc'] ?></code>
        <code><?=Yii::$app->cache->get('x') ?></code>
    </p>
    <p>
        <video id="really-cool-video" class="video-js vjs-default-skin" controls
               preload="auto" width="640" height="264" poster="http://7xsbq6.com1.z0.glb.clouddn.com/datas11050606281732.png"
               data-setup='{}'>
            <source src="http://7xsbq6.com1.z0.glb.clouddn.com/test1" type="video/mp4">
    </video>
    </p>
</div>
