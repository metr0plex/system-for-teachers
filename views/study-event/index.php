<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Достижения студентов';

?>
<div class="study-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $gridColumns = [
        'attribute'=>'FioTeacher','FioStudent' ,

        'type_of_competition',
        'location',
        'date',
        'place',
    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [


            'attribute'=>'FioTeacher','FioStudent' ,

            'type_of_competition',
            'location',
            'date',
            'place',

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
