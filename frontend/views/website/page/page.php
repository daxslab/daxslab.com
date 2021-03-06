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

    </div>
</article>
