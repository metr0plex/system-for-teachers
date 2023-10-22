<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши группы';

?>
<?php
$gridColumns = [
    'number',
    'attribute'=>'status',

];
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
]);
?>
<div class="number-group-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,

        'columns' => [




            'number',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->getStatusGroup();
                },

            ],


            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{student/index}',
                'buttons'=>[
                        'student/index'=>function($url,$model,$key){
        return Html::a('Просмотр группы',$url);
                        }
                ]]


        ],


    ]); ?>


</div>
