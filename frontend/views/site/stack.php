<?php
use yii\web\View;
use yii\helpers\Html;

/* @var $this View */
/* @var $techs string[] */

?>

<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-right">
                <header class="border-bottom mb-4">
                    <h2><?= Yii::t('app', 'Our Stack') ?></h2>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis eos expedita iste nihil non quis rem vero voluptas voluptatum. Aliquam aliquid consequatur esse impedit, qui sapiente sed veniam. Reprehenderit.</p>
            </div>
            <div class="col-md-9">
                <?php foreach ($techs as $tech): ?>
                    <?= Html::a(Html::img("@web/images/tech/$tech.png", [
                        'alt' => $tech,
                        'style' => 'width: 160px',
                        'title' => Yii::t('app', 'Daxslab uses {tech}', [
                            'tech' => $tech
                        ])
                    ])) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
