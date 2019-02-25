<?php
use yii\widgets\ActiveForm;
use \kartik\date\DatePicker;

/* @var $this yii\web\View */
$this->title = 'Планировщик задач';
?>

<div class="site-index">
    <div class="row">
        <div class="col-md-3">
            <div class="border border-secondary rounded p-1" style="width:100%" align="center">
            <?php
                $form = ActiveForm::begin();

                echo DatePicker::widget([
                'name' => 'dp_5',
                'type' => DatePicker::TYPE_INLINE,
                'value' => date("Y-m-d"),
                'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                ],
                'options' => [
                // you can hide the input by setting the following
                // 'style' => 'display:none'
                ]
                ]);

                ActiveForm::end();
            ?>
            </div>
        </div>
        <div class="col-md-9">
            <!--Выводим задачи из базы, за выбранную дату-->
            <?= $this->render('_load-tasks', [
                'viewTasks' => $viewTasks,
            ]) ?>

            <!--Форма для создания задачи-->
            <?= $this->render('_create-task', [
                'tasks' => $tasks,
            ]) ?>

        </div>
    </div>

</div>


