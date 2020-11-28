<?php

use yii\helpers\Html;

?>

<section class="<?= "block block-{$view}" ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pt-4">
                <?php \kv4nt\owlcarousel\OwlCarouselWidget::begin([
                    'pluginOptions' => [
                        'autoplay' => true,
                        'autoplayTimeout' => 2000,
                        'items' => 1,
                        'loop' => true,
                    ]
                ]) ?>
                <?php foreach ($dataProvider->allModels as $item): ?>
                    <?php if ($item->image): ?>
                        <?= Html::a(Html::img(Yii::$app->thumbnailer->get($item->image, 683, 384, 85), [
                            'alt' => $model->title,
                        ]), $item->url, [
                            'title' => Yii::t('app', 'Continue reading about {title}', [
                                'title' => $item->title,
                            ])
                        ]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php \kv4nt\owlcarousel\OwlCarouselWidget::end() ?>
            </div>
            <div class="col-md-6">
                <header class="border-bottom mb-2">
                    <h2><?= Html::encode($model->title) ?></h2>
                </header>
                <p class="lead"><?= Html::encode($model->abstract) ?></p>
                <p>
                    <?= Html::a(Yii::t('app', 'Check all'), $model->url, [
                            'class' => 'btn btn-lg btn-secondary',
                            'title' => $model->url
                    ]) ?>
                </p>
            </div>
        </div>
    </div>
</section>
