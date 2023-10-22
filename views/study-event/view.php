<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StudyEvent */

$this->title = $model->type_of_competition;
$this->params['breadcrumbs'][] = ['label' => 'Достижения учеников', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="study-event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'Фамилия Имя Отчество Преподавателя',
                'value' => function ($data) {
                    return $data->getFioTeacher();
                },

            ],
            [
                'attribute' => 'Фамилия Имя Отчество Ученика',
                'value' => function ($data) {
                    return $data->getFioStudent();
                },

            ],
            'type_of_competition',
            'location',
            'date',
            'place',
        ],
    ]) ?>

</div>
