<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Достижения преподавателей';

?>

<?php
$gridColumns = [
    'attribute'=>'Fio',
    'type',
    'topic',
    'date',
];
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
]);
?>
<div class="teacher-performance-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [


            'attribute'=>'Fio',
            'type',
            'topic',
            'date',
            [
                'class'=>'yii\grid\ActionColumn',

                'template'=> '{view} {update}  ',

                'buttons'=> [
                    'update'=> function($url,$model) {
                        if (Yii::$app->user->identity->isAdmin()) {

                            return Html::a( 'Редактировать', $url);

                        }

                    },

                    'view'=>function($url,$model,$key) {


                        if (Yii::$app->user->identity->isAdmin()) {
                            return Html::a('Просмотр', $url);

                        }

                    },

                ],

            ],



        ],
    ]); ?>


</div>
