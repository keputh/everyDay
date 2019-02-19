<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks_comments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tasks}}`
 */
class m190219_122740_create_tasks_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks_comments}}', [
            'id'         => $this->primaryKey(),
            'tasks_id'   => $this->integer()->notNull()->comment('коментарий принадлежит задаче с этим id'),
            'comment'    => $this->text()->comment('текст комментария'),
            'date_added' => $this->dateTime()->comment('Дата добавления комментария'),
        ]);

        // creates index for column `tasks_id`
        $this->createIndex(
            '{{%idx-tasks_comments-tasks_id}}',
            '{{%tasks_comments}}',
            'tasks_id'
        );

        // add foreign key for table `{{%tasks}}`
        $this->addForeignKey(
            '{{%fk-tasks_comments-tasks_id}}',
            '{{%tasks_comments}}',
            'tasks_id',
            '{{%tasks}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%tasks}}`
        $this->dropForeignKey(
            '{{%fk-tasks_comments-tasks_id}}',
            '{{%tasks_comments}}'
        );

        // drops index for column `tasks_id`
        $this->dropIndex(
            '{{%idx-tasks_comments-tasks_id}}',
            '{{%tasks_comments}}'
        );

        $this->dropTable('{{%tasks_comments}}');
    }
}
