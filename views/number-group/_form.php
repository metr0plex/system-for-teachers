<?php

use app\models\User;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NumberGroup */
/* @var $form yii\widgets\ActiveForm */
$items = ArrayHelper::map(

    User::find()->select(['surname','name','patronymic','id'])->all(),

    'id',

    function($data) {

        return $data['surname'].' '.$data['name'].' '.$data['patronymic'];

    }

);
?>

<div class="number-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'id_user')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите преподавателя'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Учатся',
        '2' => 'Выпускники',
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
