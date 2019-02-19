<?php

use yii\db\Migration;
use yii\db\ColumnSchemaBuilder;

/**
 * Handles the creation of table `{{%tasks}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m190219_130928_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks}}', [
            'id'             => $this->primaryKey(),
            'tasks_types_id' => $this->integer()->defaultValue(1)->comment('тип задачи, по умолчанию стандартный'),
            'date_added'     => $this->dateTime()->notNull()->comment('дата создания задачи'),
            'date'           => $this->date()->comment('задача назначена на эту дату'),
            'user_id'        => $this->integer()->notNull()->comment('задача принадлежит пользователю с этим id'),
            'text'           => $this->text()->comment('текст задачи'),
            'statuses_id'    => $this->integer()->defaultValue(1)->comment('статус задачи, по умолчанию нормальный'),
            'elapsed_time'   => $this->date()->comment('???'),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-tasks-user_id}}',
            '{{%tasks}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-tasks-user_id}}',
            '{{%tasks}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-tasks-user_id}}',
            '{{%tasks}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-tasks-user_id}}',
            '{{%tasks}}'
        );

        $this->dropTable('{{%tasks}}');
    }
}
