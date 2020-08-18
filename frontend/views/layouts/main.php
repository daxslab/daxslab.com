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
        'brandLabel' => Yii::t('app', 'Daxslab{slogan}', [
            'slogan' => Html::tag('span', Yii::t('app', ', software solutions'), [
                'class' => 'd-none d-md-inline',
            ]),
        ]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light bg-white fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <?= $content ?>

<footer class="footer py-4">
    <div class="container">
        <h2 class="mb-4"><?= Yii::t('app', 'Do you have a software project idea? Contact Us!') ?></h2>
        <?= Yii::$app->runAction('/contactForm/default/contact', ['renderPartial' => true]) ?>

        <ul class="list-inline fa-2x pt-2">
            <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-facebook fa-fw']), Yii::$app->params['contacts']['facebook']) ?></li>
            <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-twitter fa-fw']), Yii::$app->params['contacts']['twitter']) ?></li>
            <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-instagram fa-fw']), Yii::$app->params['contacts']['instagram']) ?></li>
            <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-linkedin fa-fw']), Yii::$app->params['contacts']['linkedin']) ?></li>
            <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-telegram fa-fw']), Yii::$app->params['contacts']['telegram']) ?></li>
        </ul>

        <p class="pt-2 mb-0">
            <small class="text-muted">
                &copy; <?= Yii::t('app', 'Developed by {vendor}', [
                    'vendor' => Html::a('Daxslab', 'https://www.daxslab.com', ['target' => '_blank']),
                ]) ?> (<?= $yearString ?>)
            </small>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
