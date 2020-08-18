<?php

use yii\helpers\Html;
use daxslab\website\widgets\PageWidgetizer;

$this->title = $model->title;
$this->description = $model->abstract;
$this->image = $model->image;

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

                <?php if ($model->getPages()->exists()): ?>
                    <?php foreach ($model->pages as $page): ?>
                        <article>
                            <header>
                                <h2><?= Html::encode($page->title) ?></h2>
                                <p class="lead"><?= Html::encode($page->abstract) ?></p>
                            </header>
                            <?= \yii\helpers\HtmlPurifier::process($page->body) ?>
                        </article>
                    <?php endforeach; ?>
                <?php endif ?>

            </div>
            <div class="col-md-6">
            </div>
        </div>

    </div>
</article>
