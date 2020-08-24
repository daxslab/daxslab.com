<?php

namespace frontend\controllers;

use daxslab\website\models\Page;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionReviews(){
        $reviews = [
            [
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid atque blanditiis commodi cumque et eveniet fugit id laudantium molestiae nam nesciunt odit quos reprehenderit similique sint veritatis vero, vitae?',
                'author' => 'Dainery Sánchez. CEO, Bellísima Studio',
            ],
            [
                'text' => 'De DAXSLAB es necesario destacar el servicio personalizado, la capacidad para interpretar la idea del cliente y darle forma con sus métodos. En segundo lugar, el tiempo que le dedican a cada cliente: el trabajo solo termina cuando el cliente está satisfecho. Estamos muy contentos con ellos y su trabajo',
                'author' => 'Alain González. Fundador, Albor Arquitectos',
            ],
            [
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid atque blanditiis commodi cumque et eveniet fugit id laudantium molestiae nam nesciunt odit quos reprehenderit similique sint veritatis vero, vitae?',
                'author' => 'Santiago Hermes. Artista plástico',
            ],
        ];

        return $this->renderPartial('reviews', [
            'reviews' =>$reviews,
        ]);
    }

    public function actionSocialLinks(){
        return $this->renderPartial('social-links');
    }

}
