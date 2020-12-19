<?php

use frontend\models\QuoteForm;
use yii\widgets\DetailView;

/** @var $model QuoteForm */

$this->title = Yii::t('app', 'Free Quote Requested');

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',
        'email:email',
        'service',
        'body:ntext'
    ]
]) ?>

