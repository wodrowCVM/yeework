<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 4/6/17
 * Time: 3:03 PM
 */

$data = \common\models\tables\TestTree::find()->select(['id','parent_id AS parent', 'name'])->asArray()->all();
$tree = new \BlueM\Tree($data, ['rootId' => 0]);
?>

<?php
var_dump($tree->getNodeById(12));
?>
