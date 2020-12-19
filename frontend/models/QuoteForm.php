<?php

namespace frontend\models;

use daxslab\contactform\models\ContactForm;
use Yii;

class QuoteForm extends ContactForm
{
    public $service;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['service'], 'string']
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'service' => Yii::t('app', 'Service'),
        ]);
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target and source email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose('quote-form', ['model' => $this])
            ->setTo($email)
            ->setFrom([$email => Yii::$app->name])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject ?: Yii::t('contact', '{name} in {website}', [
                'name' => $this->name,
                'website' => Yii::$app->name
            ]))
            ->send();
    }
}