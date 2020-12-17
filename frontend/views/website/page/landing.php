<?php

use yii\helpers\Html;
use \daxslab\website\widgets\PageWidgetizer;

$this->title = $model->title;
$this->description = $model->abstract;
$this->image = $model->image;

$this->params['mainId'] = $model->id;
$this->params['mainClass'] = $model->type->name;

?>

<header class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="display-3">
                    <?= Html::img('@web/images/daxslab-horizontal-white.svg', [
                        'alt' => $this->title,
                        'class' => 'img-fluid',
                    ]) ?>
                </h1>
                <p class="lead"><?= Html::encode($this->description) ?></p>
            </div>
            <div class="col-md-5">
                <?= Html::img('@web/images/graphic.png', ['class' => 'img-fluid']) ?>
            </div>
        </div>
    </div>
</header>

<?= PageWidgetizer::widget([
    'body' => $model->body
]) ?>

