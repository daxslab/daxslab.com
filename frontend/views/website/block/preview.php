<?php

use yii\helpers\Html;

?>

<section class="<?= "block block-{$view}" ?>">
    <div class="container">
        <header>
            <h2><?= Html::encode($model->title) ?></h2>
            <p class="lead"><?= Html::encode($model->abstract) ?></p>
        </header>
        <p>
            <?= Html::a(Yii::t('app', 'Continue reading ->'), $model->url, [
                'class' => 'btn btn-lg btn-outline-success',
                'title' => $model->title,
            ]) ?>
        </p>
    </div>
</section>



