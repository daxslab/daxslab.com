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
            <?= Html::img("@web/images/daxslab.png", [
                'alt' => $this->title,
                'class' => 'img-fluid',
            ]) ?>
        </h1>
    </div>
</header>

<?= PageWidgetizer::widget([
    'body' => $model->body
]) ?>
