<?php

use yii\helpers\Html;
use daxslab\website\widgets\PageWidgetizer;

$this->title = $model->title;
$this->description = $model->abstract;
$this->image = $model->image;

$dataProvider->pagination->pageSize = 24;

$techs = array_unique(explode(', ', join(', ', \daxslab\website\models\Metadata::find()
    ->joinWith(['page', 'metadataDefinition'])
    ->andWhere("metadata_definition.name = 'tech'")
    ->andWhere("page.language = '{$model->language}'")
    ->andWhere("page.parent_id = '{$model->id}'")
    ->select('value')
    ->column())));
sort($techs);

?>

<article id="<?= $model->slug ?>" class="<?= $model->type->name ?>">
    <?= $this->render('_header', ['model' => $model]) ?>
    <div class="container">

        <?= \yii\bootstrap4\Breadcrumbs::widget([
            'links' => \daxslab\website\components\Lookup::getBreadcrumbsForPage($model, true),
        ]) ?>

        <?= PageWidgetizer::widget([
            'body' => $model->body
        ]) ?>

        <h2><?= Yii::t('app', 'Our Stack') ?></h2>
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

        <h2><?= Yii::t('app', 'Projects we have completed') ?></h2>
        <?php if ($dataProvider->query->exists()): ?>
            <?= \yii\widgets\ListView::widget([
                'layout' => "<div class='card-deck'>{items}</div>\n{pager}",
                'dataProvider' => $dataProvider,
                'itemView' => "_project",
                'itemOptions' => ['tag' => false],
            ]) ?>
        <?php endif; ?>

    </div>
</article>
