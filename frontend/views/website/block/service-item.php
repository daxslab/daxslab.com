<?php

use daxslab\website\models\Page;
use yii\helpers\Html;

/* @var $index int */
/* @var $model  Page */

$title = Yii::t('app', "I'm interested in {service}", [
    'service' => $model->title,
]);

$even = ($index + 1) % 2 === 0;

?>

<div class="row service-item">
    <div class="col-md-4 <?= !$even ? 'order-2 order-md-1' : 'order-1 order-md-2' ?>">
        <?php if ($model->image): ?>
            <?= Html::a(Html::img(Yii::$app->thumbnailer->get($model->image, 683, 384), ['class' => 'img-fluid']), $model->url) ?>
        <?php endif; ?>
    </div>
    <div class="col-md-8 <?= $even ? 'order-2 order-md-1' : 'order-1 order-md-2'?>">
        <h3 class="card-title"><?= Html::a(Html::encode($model->title), $model->url) ?></h3>
        <p class="card-text"><?= Html::encode($model->abstract) ?></p>
        <p class="card-text">
            <?= Html::a(Yii::t('app', 'Request service'), ['/contact/default/index',
                'subject' => $title,
            ], [
                'class' => 'btn btn-lg btn-success',
                'title' => $title,
            ]) ?>
            <?= Html::a(Yii::t('app', 'Continue reading ->'), ['/contact/default/index',
                'subject' => $title,
            ], [
                'class' => 'btn btn-lg btn-info',
                'title' => $title,
            ]) ?>
        </p>
    </div>
</div>

