<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Группы';

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

<p>
    <?= Html::a('Создать группу', ['number-group/create'], ['class' => 'btn btn-success']) ?>
</p>
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
                'template'=>'{student/index} {number-group/view} {number-group/update}',
                'buttons'=>[
                    'student/index'=>function($url,$model,$key){
                        return Html::a('Просмотр группы',$url);
                    },
                     'number-group/update'=> function($url,$model) {
                        if (Yii::$app->user->identity->isAdmin()) {

                            return Html::a( 'Редактировать', $url);

                        }

                    },


                    'number-group/view'=>function($url,$model,$key) {


                        if (Yii::$app->user->identity->isAdmin()) {
                            return Html::a('Просмотр', $url);

                        }

                    },
                ]]


        ],


    ]); ?>


</div>
