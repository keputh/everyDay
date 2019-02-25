<?php
use yii\widgets\ActiveForm;
use \kartik\date\DatePicker;
use yii\helpers\Html;
?>
<!--Форма для создания задачи-->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Создать задачу
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($tasks, 'text') ?>
                <?= $form->field($tasks, 'statuses_id')->dropDownList([
                    '1' => 'Нормальный',
                    '2' => 'Высокий',
                    '3' => 'Срочный',
                ],
                [
                    'prompt' => 'Выберите один вариант'
                ]);?>

                <?= $form->field($tasks, 'date')->widget(DatePicker::classname(), [
                    'name' => 'date',
                    'value' => date("Y-m-d"),
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);?>
                </br>
                <div class="form-group">
                    <?= Html::submitButton('Добавить задачу', ['class' => 'btn btn-primary', 'name' => 'newTask-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
