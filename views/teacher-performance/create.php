<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TeacherPerformance */

$this->title = 'Добавление достижения преподавателя';
$this->params['breadcrumbs'][] = ['label' => 'Достижения преподавателей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-performance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
