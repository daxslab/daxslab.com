<?php

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use frontend\assets\AppAsset;
use yii\web\View;

/* @var $this View */
/* @var $content string */

$mainMenu = Yii::$app->website->getMenu('main');
$menuItems = isset($mainMenu)
    ? array_map(function ($item) {
        return [
            'label' => $item->label,
            'url' => $item->url,
        ];
    }, $mainMenu->getMenuItems(Yii::$app->language)->all())
    : [];
$menuItems[] = [
    'label' => Yii::t('app', 'Contact'),
    'url' => ['/contact/default/index'],
];

$yearString = Yii::$app->params['year'] != date('Y')
    ? Yii::$app->params['year'] . ' - ' . date('Y')
    : date('Y');

$mainId = isset($this->params['mainId']) ? $this->params['mainId'] : 'none';
$mainClass = isset($this->params['mainClass']) ? $this->params['mainClass'] : '';

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

    <title><?= Html::encode($this->title) ?> | <?= Yii::$app->name ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
NavBar::begin([
    'id' => 'main-navbar',
    'brandLabel' => Yii::t('app', 'Daxslab{slogan}', [
        'slogan' => Html::tag('span', Yii::t('app', ' | software solutions'), [
            'class' => 'd-none d-md-inline navbar-brand-slogan',
        ]),
    ]),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-md navbar-dark bg-transparent no-shadow fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();
?>

<main id="<?= $mainId ?>" class="<?= $mainClass ?>">
    <?= $content ?>
</main>

<?php if (isset($this->blocks['prefooter'])): ?>
    <div class="pre-footer">
        <div class="container">
            <?= $this->blocks['prefooter'] ?>
        </div>
    </div>
<?php endif; ?>
<footer class="bg-primary">
    <div class="container text-center">

        <p>
            <?= Yii::t('app', 'If you are interested in develop a new project or update and existing one please, let us know:') ?>
            <br/>
            <a href="https://wa.me/5358074332" target="_blank">WhatsApp (+5358074332)</a>
            | <?= Html::a("Email us!", '#') ?>
        </p>

        <?= Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'nav nav-justified nav-social mb-4'],
            'items' => [
                ['label' => Html::tag('i', false, ['class' => 'fab fa-fw fa-facebook']), 'url' => Yii::$app->params['contacts']['facebook']],
                ['label' => Html::tag('i', false, ['class' => 'fab fa-fw fa-twitter']), 'url' => Yii::$app->params['contacts']['twitter']],
                ['label' => Html::tag('i', false, ['class' => 'fab fa-fw fa-telegram']), 'url' => Yii::$app->params['contacts']['telegram']],
                ['label' => Html::tag('i', false, ['class' => 'fab fa-fw fa-linkedin']), 'url' => Yii::$app->params['contacts']['linkedin']],
                ['label' => Html::tag('i', false, ['class' => 'fab fa-fw fa-github']), 'url' => Yii::$app->params['contacts']['github']],
                ['label' => Html::tag('i', false, ['class' => 'fa fa-fw fa-rss']), 'url' => ['/site/feed']],
            ]
        ]) ?>

        <?= Html::img('@web/images/daxslab-horizontal-white.svg', [
            'class' => 'img-fluid mb-4',
            'alt' => Yii::t('app', 'Contact Us!'),
        ]) ?>

        <p class="small mb-0">
            <?= Html::a(Yii::t('app', 'Terms of use')) ?> - Copyright &copy; (<?= $yearString ?>) Daxslab
            - <?= Yii::t('app', 'All right reserved') ?>
        </p>
    </div>
</footer>

<?php \yii\bootstrap4\Modal::begin([
    'id' => 'modal-quote',
    'title' => Yii::t('app', 'Get a free quote'),
]) ?>

<?= Yii::$app->runAction('/site/get-quote', ['service' => 'asdf']) ?>

<?php \yii\bootstrap4\Modal::end() ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
