<?php

use yii\helpers\Html;

$linkContent = $model->image
    ? Html::img(Yii::$app->thumbnailer->get($model->image, 683, 384, 85), [
        'class' => 'img-fluid card-img-top',
        'alt' => Yii::t('app', 'Image on project {name} developed by Daxslab', [
            'name' => $model->title,
        ])
    ])
    : $model->title;
?>

<article id="<?= $model->id ?>" class="card mb-4">
    <?= Html::a($linkContent, $model->url, ['title' => $model->title]) ?>
</article>

<?php if (($index + 1) % 2 == 0): ?>
    <div class="w-100"></div>
<?php endif; ?>

