<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;

$linkContent = $model->image
    ? Html::img(Yii::$app->thumbnailer->get($model->image, 683, 384, 85), [
        'class' => 'img-fluid card-img-top',
        'alt' => Yii::t('app', 'Image on project {name} developed by Daxslab', [
            'name' => $model->title,
        ])
    ])
    : $model->title;
?>

<article class="card card-portfolio bg-primary mb-4">
    <div class="row">
        <div class="col-md-6 <?= $index % 2 == 1 ? 'order-md-1' : 'order-md-2' ?>">
            <?= Html::a($linkContent, $model->url, ['title' => $model->title]) ?>
        </div>
        <div class="col-md-6 <?= $index % 2 == 1 ? 'order-md-2' : 'order-md-1' ?>">
            <div class="card-body">
                <h2 class="card-title"><?= Html::encode($model->title) ?></h2>
                <p class="card-text"><?= Html::encode(StringHelper::truncateWords($model->abstract, 30)) ?></p>
            </div>
        </div>
    </div>
</article>
