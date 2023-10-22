<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "teacher_performance".
 *
 * @property int $id
 * @property int $id_user
 * @property string $type
 * @property string $topic
 * @property string $date
 *
 * @property User $user
 */
class TeacherPerformance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher_performance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'type', 'topic', 'date'], 'required'],
            [['id_user'], 'integer'],
            [['date'], 'safe'],
            [['type', 'topic'], 'string', 'max' => 255],
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
            'id_user' => 'Преподаватель',
            'type' => 'Тип выступления',
            'topic' => 'Тема выступления',
            'date' => 'Дата',
            'Fio' =>'ФИО Преподавателя',
        ];
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

    public function getFio()
    {
        return $this->user->surname . '  ' . $this->user->name . ' ' . $this->user->patronymic;
    }





}
