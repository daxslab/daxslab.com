<?php

namespace common\models;

use daxslab\website\models\Page;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @inheritDoc
 */
class User extends \Da\User\Model\User
{
    public function getName()
    {
        return $this->profile->name != ''
            ? $this->profile->name
            : $this->username;
    }

    public function getUpdatedPages()
    {
        return $this->hasMany(Page::class, ['created_by' => 'id']);
    }

}
