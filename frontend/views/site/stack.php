<?php

use yii\web\View;
use yii\helpers\Html;

/* @var $this View */
/* @var $techs string[] */

?>

<section class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-2">
                <header class="mb-4">
                    <h2><?= Yii::t('app', 'Our Stack') ?></h2>
                </header>
                <p><?= Yii::t('app', 'These are the technologies our team is proficient at:')?></p>
            </div>
            <div class="col-md-7 order-md-1">
                <?php foreach ($techs as $tech): ?>
                    <?= Html::img("@web/images/tech/$tech.png", [
                        'alt' => $tech,
                        'class' => 'stack-icon',
                        'title' => Yii::t('app', 'Daxslab uses {tech}', [
                            'tech' => $tech
                        ])
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
