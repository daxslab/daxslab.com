<?php

use yii\helpers\Html;

$this->title = Html::encode($model->title);
$this->description = Html::encode($model->abstract);
$this->image = $model->image;

?>

<header class="jumbotron">
    <div class="container">
        <h1><?= $this->title ?></h1>
    </div>
</header>
