<?php

use yii\helpers\Html;

$textColumnClass = isset($model->image) ? 'col-md-8' : 'col-md-12';

?>

<li class="mb-4">
    <h2 class="card-title"><?= Html::a(Html::encode($model->title), $model->url) ?></h2>
    <p class="card-text"><?= Html::encode($model->abstract) ?></p>
</li>
