<?php

use yii\bootstrap4\Carousel;

/* @var $this \yii\web\View */
/* @var $reviews array */

?>

<?= Carousel::widget([
    'id' => 'reviews',
    'items' => array_map(function ($review) {
        return [
            'content' => $this->render('_review', [
                'model' => $review
            ]),
        ];
    }, $reviews)
]) ?>
