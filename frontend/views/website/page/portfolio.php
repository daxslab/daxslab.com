<?php

use yii\helpers\Html;
use daxslab\website\widgets\PageWidgetizer;

$this->title = $model->title;
$this->description = $model->abstract;
$this->image = $model->image;

$dataProvider->pagination->pageSize = 24;

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
<?php $this->beginBlock('prefooter') ?>
<h2><?= Yii::t('app', 'starting a new project?') ?></h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias asperiores, autem consequatur delectus
    dolorem ex expedita iste magnam minima modi mollitia perspiciatis possimus repellat saepe temporibus totam velit
    voluptatibus!</p>
<p><?= Html::a(Yii::t('app', 'Get in touch'), '#', ['class' => 'btn btn-lg btn-secondary']) ?></p>
<?php $this->endBlock() ?>

