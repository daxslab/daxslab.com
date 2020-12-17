<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;

$linkContent = $model->image
    ? Html::img(Yii::$app->thumbnailer->get($model->image, 683, 384, 85), [
        'class' => 'img-fluid card-img-top',
        'alt' => Yii::t('app', 'Image on project {name} developed by Daxslab', [
            'name' => $model->title,
        ])
    ])
    : $model->title;
?>

<article id="<?= $model->id ?>" class="card card-portfolio mb-4">
    <?= Html::a($linkContent, $model->url, ['title' => $model->title]) ?>
    <div class="card-body">
        <h2 class="card-title"><?= Html::encode($model->title) ?></h2>
        <p class="card-text"><?= Html::encode(StringHelper::truncateWords($model->abstract, 30)) ?></p>
    </div>
</article>

<?php if (($index + 1) % 3 == 0): ?>
    <div class="w-100"></div>
<?php endif; ?>

