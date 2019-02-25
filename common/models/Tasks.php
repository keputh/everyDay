<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $tasks_types_id тип задачи, по умолчанию стандартный
 * @property string $date_added дата создания задачи
 * @property string $date задача назначена на эту дату
 * @property int $user_id задача принадлежит пользователю с этим id
 * @property string $text текст задачи
 * @property int $statuses_id статус задачи, по умолчанию нормальный
 * @property string $elapsed_time ???
 *
 * @property User $user
 * @property TasksComments[] $tasksComments
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tasks_types_id', 'user_id', 'statuses_id'], 'integer'],
            [['text'],'required'],
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
            [['date_added', 'date', 'elapsed_time'], 'safe'],
            [['text'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tasks_types_id' => 'тип задачи',
            'date_added' => 'Создано',
            'date' => 'Дата',
            'user_id' => 'user ID',
            'text' => 'Описание задачи',
            'statuses_id' => 'Приоритет',
            'elapsed_time' => 'Elapsed Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasksComments()
    {
        return $this->hasMany(TasksComments::className(), ['tasks_id' => 'id']);
    }



    public function loadUserTasks($date)
    {
        return Tasks::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->where(['date'    => $date])
            ->all();
    }
}
