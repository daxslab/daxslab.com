<?php

namespace frontend\controllers;

use daxslab\website\models\Metadata;
use Yii;
use yii\base\ErrorException;
use yii\i18n\PhpMessageSource;
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

    public function actionReviews()
    {
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
            'reviews' => $reviews,
        ]);
    }

    public function actionStack()
    {
        $techs = array_unique(explode(', ', join(', ', Metadata::find()
            ->joinWith(['page', 'metadataDefinition'])
            ->andWhere("metadata_definition.name = 'tech'")
            ->select('value')
            ->column())));
        sort($techs);
        return $this->renderPartial('stack', ['techs' => $techs]);
    }

    public function actionSocialLinks()
    {
        return $this->renderPartial('social-links');
    }

    public function actionGetQuote($service)
    {
        $app = Yii::$app;
        if (!isset($app->get('i18n')->translations['contact*'])) {
            $app->get('i18n')->translations['contact*'] = [
                'class' => PhpMessageSource::class,
                'basePath' => Yii::getAlias('@vendor/daxslab/yii2-contact-form/message'),
                'sourceLanguage' => 'en-US'
            ];
        }

        $model = new \frontend\models\QuoteForm([
            'service' => $service,
        ]);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Thanks for your message! Your request have been sent. We will answer as soon as possible.'));
            } else {
                throw new ErrorException(Yii::t('app', 'Error while sending email'));
            }
        }
        return $this->renderPartial('get-quote', [
            'model' => $model,
        ]);
    }

}
