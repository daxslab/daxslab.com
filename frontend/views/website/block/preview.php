<?php

use yii\helpers\Html;

?>

<section class="<?= "block block-{$view}" ?>">
    <header>
        <h2><?= Html::encode($model->title) ?></h2>
        <p class="lead"><?= Html::encode($model->abstract) ?></p>
    </header>
    <p>
        <?= Html::a(Yii::t('app', 'Read more...'), $model->url) ?>
    </p>
</section>



