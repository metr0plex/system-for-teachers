<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudyEvent */

$this->title = 'Create Study Event';
$this->params['breadcrumbs'][] = ['label' => 'Study Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="study-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
