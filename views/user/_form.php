<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?php
    if($model->scenario === 'emailActivation'):
        ?>
        <i>*На указанный емайл будет отправлено письмо для активации аккаунта.</i>
    <?php
    endif;
    ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'button_green']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
