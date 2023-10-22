<?php

use app\models\NumberGroup;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$items = NumberGroup::find()
    ->select(['number'])
    ->indexBy('id')
    ->column();
/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'id_number_group')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите группу'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
