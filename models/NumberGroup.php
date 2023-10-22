<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "number_group".
 *
 * @property int $id
 * @property int $number
 * @property int $id_user
 * @property int $status
 *
 * @property Student[] $students
 * @property User $user
 */
class NumberGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'number_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'id_user'], 'required'],
            [['number', 'id_user', 'status'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер группы',
            'id_user' => 'Преподавтель',
            'status' => 'Статус группы',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['id_number_group' => 'id']);
    }

  

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function getStatusGroup(){
        switch ($this->status){
            case 1: return 'Учится';
            case 2: return 'Выпускники';
        }
    }

    public function getFioTeacher()
    {
        return $this->user->surname . '  ' . $this->user->name . ' ' . $this->user->patronymic;
    }
}
