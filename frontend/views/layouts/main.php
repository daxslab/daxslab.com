<?php

/* @var $this View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use frontend\assets\AppAsset;
use yii\web\View;

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
        'class' => 'navbar navbar-expand-md navbar-dark bg-dark no-shadow fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();
?>

<?= $content ?>


<?php if (isset($this->blocks['prefooter'])): ?>
    <div class="pre-footer">
        <div class="container">
            <?= $this->blocks['prefooter']?>
        </div>
    </div>
<?php endif; ?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <?= Html::img('@web/images/daxslab-horizontal-white.svg', [
                    'class' => 'img-fluid mb-4',
                    'alt' => Yii::t('app', 'Contact Us!'),
                ]) ?>
                <p>
                    <?= Yii::t('app', 'If you are interested in develop a new project or update and existing one please, let us know') ?>
                </p>
                <ul>
                    <li>+53 58 074 332</li>
                    <li>info@daxslab.com</li>
                </ul>
            </div>
            <div class="col-md-5">
                <h2 class="mb-1"><?= Yii::t('app', 'Navigate') ?></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis dignissimos distinctio, doloremque
                    dolores id quae temporibus veritatis! Blanditiis consequatur cum cupiditate dolores enim perferendis
                    provident quia, ratione velit voluptatem! Natus?</p>
            </div>
            <div class="col-md-2">
                <h2 class="mb-1"><?= Yii::t('app', 'Social') ?></h2>
                <?= $this->render('//site/social-links') ?>
            </div>
        </div>
        <p class="small">
            <?= Html::a(Yii::t('app', 'Terms of use')) ?> - Copyright &copy; (<?= $yearString ?>) Daxslab
            - <?= Yii::t('app', 'All right reserved') ?>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
