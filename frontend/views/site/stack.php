<?php
use yii\web\View;
use yii\helpers\Html;

/* @var $this View */
/* @var $techs string[] */

?>

<section class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php foreach ($techs as $tech): ?>
                    <?= Html::a(Html::img("@web/images/tech/$tech.png", [
                        'alt' => $tech,
                        'style' => 'width: 100px; height: 100px; margin-bottom: .25em; background: white; border-radius: 100%;',
                        'title' => Yii::t('app', 'Daxslab uses {tech}', [
                            'tech' => $tech
                        ])
                    ])) ?>
                <?php endforeach; ?>
            </div>
            <div class="col-md-5 text-right">
                <header class="mb-4">
                    <h2><?= Yii::t('app', 'Our Stack') ?></h2>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, architecto assumenda deleniti dolorem exercitationem ipsam obcaecati odio possimus quis sequi temporibus vero vitae. Aliquam at, culpa dolores laboriosam molestias tenetur.</p>
            </div>
        </div>
    </div>
</section>
