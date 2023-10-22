<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TeacherPerformance */

$this->title = 'Редактирование достижения: ' . $model->topic;
$this->params['breadcrumbs'][] = ['label' => 'Достижения преподавателей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->topic, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="teacher-performance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
