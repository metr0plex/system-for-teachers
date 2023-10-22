<?php

namespace app\controllers;

use app\models\NumberGroup;
use app\models\Student;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AdminController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'],
                'rules' => [
                    [
                        'actions' => ['index','panel','list'],
                        'allow' => true,
                        'roles'=>['@'],
                        'matchCallback' => function ($rule,$action){
                            return \Yii::$app->user->identity->isAdmin();
                        }
                    ],



                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => NumberGroup::find()

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPanel()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),

        ]);

        return $this->render('panel', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Student::find()
        ]);


        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
