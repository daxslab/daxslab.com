<?php

use yii\helpers\Html;

$title = Yii::t('app', "I'm interested in {service}", [
    'service' => $model->title,
]);

?>

<div class="card mb-4">
    <?php if ($model->image): ?>
        <?= Html::a(Html::img(Yii::$app->thumbnailer->get($model->image, 683, 384), ['class' => 'img-fluid']), $model->url) ?>
    <?php endif; ?>
    <div class="card-body">
        <h3 class="card-title"><?= Html::a(Html::encode($model->title), $model->url) ?></h3>
        <p class="card-text"><?= Html::encode($model->abstract) ?></p>
    </div>
    <div class="card-footer">
        <?= Html::a(Yii::t('app', 'Request service'), ['/contact/default/index',
            'subject' => $title,
        ], [
            'class' => 'btn btn-block btn-secondary',
            'title' => $title,
        ]) ?>
    </div>
</div>

<?php if (($index + 1) % $columns == 0): ?>
    <div class="w-100"></div>
<?php endif; ?>
