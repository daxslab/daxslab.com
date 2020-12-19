<?php


use frontend\models\QuoteForm;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

/* @var $this View */
/* @var $model QuoteForm */

?>

<?php \yii\widgets\Pjax::begin([
        'enablePushState' => false,
]) ?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?= \yii\bootstrap4\Alert::widget([
        'body' => Yii::$app->session->getFlash('success'),
        'options' => ['class' => 'alert-success'],
        'closeButton' => false,
    ]) ?>
<?php else: ?>
    <?php $form = ActiveForm::begin([
        'action' => ['/site/get-quote', 'service' => $model->service],
        'options' => [
            'data-pjax' => 1,
        ]
    ]) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'service') ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'body')->textarea([
                'rows' => 4
            ])->label(Yii::t('app', 'What do you need?')) ?>
        </div>
    </div>
    <div class="form-group">
        <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Send message'), [
            'class' => 'btn btn-lg btn-outline-success',
        ]) ?>
    </div>

    <?php ActiveForm::end() ?>
<?php endif; ?>
<?php \yii\widgets\Pjax::end() ?>
