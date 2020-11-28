<?php

use yii\bootstrap4\Html;

/* @var $this \yii\web\View */

?>

<ul class="list-inline list-social">
    <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-facebook fa-fw']), Yii::$app->params['contacts']['facebook']) ?></li>
    <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-twitter fa-fw']), Yii::$app->params['contacts']['twitter']) ?></li>
    <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-linkedin fa-fw']), Yii::$app->params['contacts']['linkedin']) ?></li>
    <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-telegram fa-fw']), Yii::$app->params['contacts']['telegram']) ?></li>
    <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fab fa-github fa-fw']), Yii::$app->params['contacts']['github']) ?></li>
    <li class="list-inline-item"><?= Html::a(Html::tag('i', false, ['class' => 'fa fa-rss fa-fw']), '#') ?></li>
</ul>
