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

        <?php if ($model->body): ?>
            <?= PageWidgetizer::widget([
                'body' => $model->body
            ]) ?>
        <?php endif; ?>

        <?php if ($model->image): ?>
            <?= Html::img($model->image, [
                'class' => 'img-fluid',
                'alt' => Yii::t('app', 'Image on project {name}', [
                    'name' => $model->title,
                ]),
            ]) ?>
        <?php endif; ?>

        <?php if ($dataProvider->query->exists()): ?>
            <?= \yii\widgets\ListView::widget([
                'layout' => '{items}{pager}',
                'dataProvider' => $dataProvider,
                'options' => ['class' => 'card-deck'],
                'itemView' => "_{$model->type->name}-view",
                'itemOptions' => ['tag' => false],
            ]) ?>
        <?php endif; ?>

    </div>
</article>
