<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks_types}}`.
 */
class m190219_124109_create_tasks_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks_types}}', [
            'id'          => $this->primaryKey(),
            'title'       => $this->string(12)->comment('Оглавление Типа'),
            'description' => $this->text()->comment('Описание типа'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tasks_types}}');
    }
}
