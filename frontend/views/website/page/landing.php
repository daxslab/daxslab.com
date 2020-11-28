<?php

use yii\helpers\Html;
use \daxslab\website\widgets\PageWidgetizer;

$this->title = $model->title;
$this->description = $model->abstract;
$this->image = $model->image;

?>

<main id="<?= $model->slug ?>" class="<?= $model->type->name ?>">

    <header class="jumbotron text-center">
        <div class="container">
            <h1 class="display-3">
                <?= Html::img('@web/images/daxslab-white.png', [
                    'alt' => $this->title,
                    'class' => 'img-fluid',
                ]) ?>
            </h1>
            <p class="lead"><?= Html::encode($this->description)?></p>
        </div>
    </header>

    <div style="background-image: url(/images/gradient.png); height:10px"></div>

    <?= PageWidgetizer::widget([
        'body' => $model->body
    ]) ?>

</main>
