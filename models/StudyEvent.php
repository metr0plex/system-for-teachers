<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "study_event".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_student
 * @property string $type_of_competition
 * @property string $location
 * @property string $date
 * @property int $place
 *
 * @property Student $student
 * @property User $user
 */
class StudyEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'study_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_student', 'type_of_competition', 'location', 'date', 'place'], 'required'],
            [['id_user', 'id_student', 'place'], 'integer'],
            [['date'], 'safe'],
            [['type_of_competition', 'location'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_student'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['id_student' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Преподаватель',
            'id_student' => 'Ученик',
            'type_of_competition' => 'Тип выстпуления',
            'location' => 'Место выступления',
            'date' => 'Дата',
            'place' => 'Призовое место',
            'FioTeacher' => 'ФИО преподавателя',
            'FioStudent' => 'ФИО студента',

        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'id_student']);
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


    public function getFioStudent()
    {
        return $this->student->surname . '  ' . $this->student->name . '  ' . $this->student->patronymic;
    }

    public function getFioTeacher()
    {
        return $this->user->surname . '  ' . $this->user->name . ' ' . $this->user->patronymic;
    }
}
