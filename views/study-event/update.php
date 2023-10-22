<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudyEvent */

$this->title = 'Редактирование достижения: ' . $model->type_of_competition;
$this->params['breadcrumbs'][] = ['label' => 'Достижения учеников', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_of_competition, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="study-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
