<?php

use app\models\Student;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\StudyEvent */
/* @var $form yii\widgets\ActiveForm */

$items = ArrayHelper::map(

    User::find()->select(['surname','name','patronymic','id'])->all(),

    'id',

    function($data) {

        return $data['surname'].' '.$data['name'].' '.$data['patronymic'];

    }

);

$studyname = ArrayHelper::map(

    Student::find()->select(['surname','name','patronymic','id'])->all(),

    'id',

    function($data) {

        return $data['surname'].' '.$data['name'].' '.$data['patronymic'];

    }

);
?>

<div class="study-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите преподавателя'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_student')->widget(Select2::classname(), [
        'data' => $studyname,
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите ученика'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'type_of_competition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'place')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
