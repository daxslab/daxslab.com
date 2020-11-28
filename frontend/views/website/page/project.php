<?php

use yii\helpers\Html;
use daxslab\website\widgets\PageWidgetizer;

$techs = explode(', ', $model->getMetadata('tech'));
sort($techs);

?>

<article id="<?= $model->slug ?>" class="<?= $model->type->name ?>">
    <?= $this->render('_header', ['model' => $model]) ?>
    <div class="container">

        <?= \yii\bootstrap4\Breadcrumbs::widget([
            'links' => \daxslab\website\components\Lookup::getBreadcrumbsForPage($model, true),
        ]) ?>

        <?php if ($model->image): ?>
            <?= Html::img($model->image, [
                'class' => 'img-fluid mb-4',
                'alt' => Yii::t('app', 'Image on project {name} developed by Daxslab', [
                    'name' => $model->title,
                ]),
            ]) ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <?php if ($model->body): ?>
                    <?= PageWidgetizer::widget([
                        'body' => $model->body
                    ]) ?>
                <?php endif; ?>
                <?= \yii\widgets\DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'label' => Yii::t('app', 'URL'),
                            'value' => $model->getMetadata('url'),
                            'format' => 'url',
                            'visible' => $model->getMetadata('url') != null,
                        ],
                    ]
                ]) ?>
            </div>
            <div class="col-md-6">
                <h2 class="h5"><?= Yii::t('app', 'Tech involved') ?></h2>
                <ul class="list-inline">
                    <?php foreach ($techs as $tech): ?>
                        <li class="list-inline-item">
                            <?= Html::img("@web/images/tech/{$tech}.png", [
                                'width' => '100px',
                                'alt' => Yii::t('app', 'Daxslab uses {tech} for their projects', [
                                    'tech' => $tech
                                ])
                            ]) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>

</article>
