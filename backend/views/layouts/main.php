<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
];

$menuItems = array_merge($menuItems, Yii::$app->getModule('website')->menuItems);
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => Yii::$app->user->identity->name,
        'url' => '#',
        'items' => [
            [
                'label' => Yii::t('app', 'Profile'),
                'url' => ['/user/settings/profile'],
            ],
            [
                'label' => Yii::t('app', 'Account'),
                'url' => ['/user/settings/account'],
            ],
            '<div class="dropdown-divider"></div>',
            [
                'label' => Yii::t('app', 'Logout'),
                'url' => ['/user/security/logout'],
                'linkOptions' => [
                    'data-method' => 'post',
                ],
            ]
        ]

    ];
}

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#300a24">
    <meta name="theme-color" content="#ffffff">

    <title><?= Html::encode($this->title) ?> | <?= Yii::$app->name ?> (BACKEND)</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light bg-light fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="border-top mt-4 pt-2">
    <div class="container">
        <p>
            &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?><br/>
            <small class="text-muted"><?= Yii::powered() ?> & <?= Html::a(
                    'Yii2 Website Module',
                    'https://github.com/daxslab/yii2-website/module', [
                    'target' => '_blank'
                ]) ?></small>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
