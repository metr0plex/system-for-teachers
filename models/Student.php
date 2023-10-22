<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;
use yii\base\Model;
/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property int $age
 * @property int $id_number_group
 * @property int $image
 *

 * @property NumberGroup $numberGroup
 * @property StudyEvent[] $studyEvents
 */
class Student extends \yii\db\ActiveRecord
{
    public $imageFiles;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'age'], 'required'],
            [['age'], 'integer'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 255],
            [['id_number_group'], 'exist', 'skipOnError' => true, 'targetClass' => NumberGroup::className(), 'targetAttribute' => ['id_number_group' => 'id']],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя ',
            'surname' => 'Фамилия ',
            'patronymic' => 'Отчество ',
            'age' => 'Возраст',
            'id_number_group' => 'Номер группы',
            'image' => 'Грамоты ',
            'imageFile'=>'Достижения',
        ];
    }

    /**
     * Gets query for [[Document]].
     *
     * @return \yii\db\ActiveQuery
     */

    /**
     * Gets query for [[NumberGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNumberGroup()
    {
        return $this->hasOne(NumberGroup::className(), ['id' => 'id_number_group']);
    }


    /**
     * Gets query for [[StudyEvents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudyEvents()
    {
        return $this->hasMany(StudyEvent::className(), ['id_student' => 'id']);
    }

    /*public function upload()
    {
        $this->image = $this->imageFile->baseName . '.' . $this->imageFile->extension;
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->save(false);
            return true;
        } else {
            return false;
        }
    }*/
    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);

            }
            $file->save(false);
            return true;
        } else {
            return false;
        }
    }






}
