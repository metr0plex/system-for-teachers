<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\web\IdentityInterface;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([

        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [

            ['label' => 'Достижения Преподавателей', 'url' => ['/teacher-performance/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Достижения Учеников', 'url' => ['/study-event/index'],'visible'=>!Yii::$app->user->isGuest],
//            ['label' => 'Личный кабинет', 'url' => ['/number-group/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Регистрация', 'url' => ['/user/create'],'visible'=>Yii::$app->user->isGuest ],
            ['label' => 'Ученики', 'url' => ['/admin/list'],'visible'=>!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin() ],
            ['label' => 'Пользователи', 'url' => ['/admin/panel'],'visible'=>!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin() ],
            Yii::$app->user->isGuest ? ('') : (Yii::$app->user->identity->isAdmin() ? (['label' => 'Группы', 'url' => ['/admin/index']]) : ( ['label' => 'Личный кабинет', 'url' => ['/number-group/index']])),
            Yii::$app->user->isGuest ? (
                ['label' => 'Авторизация', 'url' => ['/site/login']]

            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->surname . ' ' . Yii::$app->user->identity->name .' '. Yii::$app->user->identity->patronymic .')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
