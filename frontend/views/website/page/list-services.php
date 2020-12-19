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
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card-deck">
            <?php if ($model->getPages()->exists()): ?>
                <?php foreach ($model->pages as $i => $page): ?>
                    <article id="<?= $page->id ?>" class="card card-service-item my-4 bg-primary">
                        <div class="card-body">
                            <h3 class="card-title"><?= Html::encode($page->title) ?></h3>
                            <p class="card-text"><?= Html::encode($page->abstract) ?></p>
                        </div>
                        <footer class="card-footer">
                            <?= Html::a(Yii::t('app', 'Request service'), '#modal-quote', [
                                'class' => 'btn btn-lg btn-block btn-outline-success',
                                'data-toggle' => 'modal',
                                'title' => $model->title,
                            ]) ?>
                        </footer>
                    </article>
                    <?php if (($i + 1) % 2 == 0): ?>
                        <div class="w-100"></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
    </div>
</article>

<?php $this->beginBlock('prefooter') ?>
<h2><?= Yii::t('app', 'can we help you?') ?></h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias asperiores, autem consequatur delectus
    dolorem ex expedita iste magnam minima modi mollitia perspiciatis possimus repellat saepe temporibus totam velit
    voluptatibus!</p>
<p><?= Html::a(Yii::t('app', 'Get in touch'), '#', ['class' => 'btn btn-lg btn-secondary']) ?></p>
<?php $this->endBlock() ?>
