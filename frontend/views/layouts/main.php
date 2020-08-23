<?php

/* @var $this \yii\web\View */

/* @var $content string */

use kartik\icons\Icon;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$mainMenu = Yii::$app->website->getMenu('main');
$menuItems = isset($mainMenu)
    ? array_map(function ($item) {
        return [
            'label' => $item->label,
            'url' => $item->url,
        ];
    }, $mainMenu->getMenuItems(Yii::$app->language)->all())
    : [];

$yearString = Yii::$app->params['year'] != date('Y')
    ? Yii::$app->params['year'] . ' - ' . date('Y')
    : date('Y');

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
        'slogan' => Html::tag('span', Yii::t('app', ', software solutions'), [
            'class' => 'd-none d-md-inline',
        ]),
    ]),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-md navbar-light bg-white no-shadow fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();
?>

<?= $content ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mb-4"><?= Yii::t('app', 'Contact Us!') ?></h2>
                <address>
                    <strong><?= Yii::$app->params['contacts']['owner'] ?></strong><br>
                    <abbr title="Phone">P:</abbr> <?= Yii::$app->params['contacts']['mobile'] ?>
                </address>
            </div>
            <div class="col-md-6">
                <h3><?= Yii::t('app', 'Send a message') ?></h3>
                <p><?= Yii::t('app', 'If you are interesented in develop a new project or update and existing one, don\'t hesitate in contacting us.') ?></p>
                <?= Yii::$app->runAction('/contactForm/default/contact', ['renderPartial' => true]) ?>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?= $this->render('//site/social-links') ?>
                </div>
                <div class="col-md-6">
                    &copy; Daxslab (<?= $yearString ?>)
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
