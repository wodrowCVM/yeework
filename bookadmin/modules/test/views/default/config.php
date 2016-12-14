<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/24/16
 * Time: 9:34 AM
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use common\assets\Datatables;

Datatables::register($this);
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <table class="table table-striped">
                <caption>条纹表格布局</caption>
                <thead>
                <tr>
                    <th>键</th>
                    <th>值</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>$v['key']</code></td>
                        <td><code>$v['value']</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin() ?>
            <?=Html::submitButton('submit', ['class'=>'btn btn-primary']) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
