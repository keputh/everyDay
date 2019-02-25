<?php
use yii\helpers\Html;
?>
<!--Выводим задачи из базы, за выбранную дату-->
<table class="table table-bordered">
    <tr>
       <td>text</td>
    </tr>
    <?php foreach ($viewTasks as $task):?>
    <tr>
        <td><?=Html::encode($task->text)?></td>
    </tr>
    <? endforeach;?>
</table>