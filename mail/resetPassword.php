<?php
/**

 * @var $user \app\models\User
 */
use yii\helpers\Html;

echo 'Привет '.Html::encode($user->email).'. ';
echo Html::a('Для смены пароля перейдите по этой ссылке.',
    Yii::$app->urlManager->createAbsoluteUrl(
        [
            '/site/reset-password',
            'key' => $user->secret_key
        ]
    ));