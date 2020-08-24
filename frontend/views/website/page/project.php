<?php

use yii\helpers\Html;
use daxslab\website\widgets\PageWidgetizer;

?>

<article id="<?= $model->slug ?>" class="<?= $model->type->name ?>">
    <?= $this->render('_header', ['model' => $model]) ?>
    <div class="container">

        <?= \yii\bootstrap4\Breadcrumbs::widget([
            'links' => \daxslab\website\components\Lookup::getBreadcrumbsForPage($model, true),
        ]) ?>

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
                        [
                            'label' => Yii::t('app', 'Tech'),
                            'value' => $model->getMetadata('tech'),
                        ],
                    ]
                ]) ?>
            </div>
            <div class="col-md-6">
                <?php if ($model->image): ?>
                    <?= Html::img($model->image, [
                        'class' => 'img-fluid',
                        'alt' => Yii::t('app', 'Image on project {name}', [
                            'name' => $model->title,
                        ]),
                    ]) ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</article>
