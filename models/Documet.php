<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documet".
 *
 * @property int $id
 * @property string $img
 *
 * @property Student[] $students
 */
class Documet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img'], 'required'],
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['id_document' => 'id']);
    }
}
