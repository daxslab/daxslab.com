<?php
use yii\helpers\Html;

?>

<section class="<?= "block block-{$view}"?>">
    <header>
        <div class="container">
            <h2><?= Html::encode($model->title) ?></h2>
            <p class="lead"><?= Html::encode($model->abstract) ?></p>
        </div>
    </header>
    <div class="container">

        <?php if ($dataProvider->count): ?>
            <?= \yii\widgets\ListView::widget([
                'layout' => '{items}{pager}',
                'dataProvider' => $dataProvider,
                'itemView' => "service-item",
                'itemOptions' => ['tag' => false],
                'viewParams' => ['columns' => isset($columns) ? $columns : 3],
            ]) ?>
        <?php endif; ?>

    </div>
</section>
