<?php

use yii\helpers\Html;

?>

<section class="<?= "block block-{$view}" ?>">
    <h2><?= Html::encode($model->title) ?></h2>
    <p class="lead"><?= Html::encode($model->abstract) ?></p>
    <p>
        <?= Html::a(Yii::t('app', 'Read more...'), $model->url) ?>
    </p>
</section>



