<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ученики'

?>

<?php
$gridColumns = [
    'name',
    'surname',
    'patronymic',
    'age',

];
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
]);
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [


            'name',
            'surname',
            'patronymic',
            'age',
            ['class' => 'yii\grid\ActionColumn',]

        ],
    ]); ?>


</div>
