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
                <?php foreach ($techs as $tech): ?>
                    <?= Html::img("@web/images/tech/$tech.png", [
                        'alt' => $tech,
                        'class' => 'stack-icon',
                        'title' => Yii::t('app', 'Daxslab uses {tech}', [
                            'tech' => $tech
                        ])
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

</article>

<?php $this->beginBlock('prefooter') ?>
<h2><?= Yii::t('app', 'did you liked it?') ?></h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias asperiores, autem consequatur delectus
    dolorem ex expedita iste magnam minima modi mollitia perspiciatis possimus repellat saepe temporibus totam velit
    voluptatibus!</p>
<p><?= Html::a(Yii::t('app', 'Get in touch'), '#', ['class' => 'btn btn-lg btn-secondary']) ?></p>
<?php $this->endBlock() ?>
