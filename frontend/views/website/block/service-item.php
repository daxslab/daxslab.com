<?php

use daxslab\website\models\Page;
use yii\helpers\Html;

/* @var $index int */
/* @var $model  Page */

$title = Yii::t('app', "I'm interested in {service}", [
    'service' => $model->title,
]);

?>

<div class="card card-service-item with-counter">
    <h3 class="card-title"><?= Html::a(Html::encode($model->title), $model->url) ?></h3>
    <p class="lead card-text">
        <?= Html::encode($model->abstract) ?>
        <?= Html::a(Yii::t('app', 'Continue reading...'), $model->url, [
            'title' => $title,
        ]) ?>
    </p>
    <p class="card-text">
        <?= Html::a(Yii::t('app', 'Request service'), '#modal-quote', [
            'class' => 'btn btn-lg btn-outline-success',
            'title' => Yii::t('app', 'Get a quote for {service}', [
                'service' => $model->title,
            ]),
            'data-toggle' => 'modal',
            'data-url' => \yii\helpers\Url::toRoute(['/site/get-quote', 'service' => $model->title]),
        ]) ?>
    </p>
</div>

<?php if (($index + 1) % 2 === 0): ?>
    <div class="w-100"></div>
<?php endif; ?>
