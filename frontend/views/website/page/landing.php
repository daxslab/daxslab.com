<?php

use yii\helpers\Html;
use \daxslab\website\widgets\PageWidgetizer;

$this->title = $model->title;
$this->description = $model->abstract;
$this->image = $model->image;

?>

<header class="jumbotron">
    <div class="container">
        <h1 class="display-3">
            <picture>
                <!-- Use this image if the user's OS setting is light or unset -->
                <?= Html::tag('source', false, [
                    'srcset' => '/images/daxslab-color.png',
                    'media' => '(prefers-color-scheme: light) or (prefers-color-scheme: no-preference)',
                ]) ?>
                <!-- Use this image if the user's OS setting is dark -->
                <?= Html::tag('source', false, [
                    'srcset' => '/images/daxslab-white.png',
                    'media' => '(prefers-color-scheme: dark)',
                ]) ?>
                <!-- Use this image as fallback -->
                <?= Html::img("@web/images/daxslab-color.png", [
                    'alt' => $this->title,
                    'class' => 'img-fluid',
                ]) ?>
            </picture>
        </h1>
    </div>
</header>

<?= PageWidgetizer::widget([
    'body' => $model->body
]) ?>
