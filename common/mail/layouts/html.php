<?php

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        <?= file_get_contents(Yii::getAlias('@frontend/web/css/github-markdown.css')) ?>
        .detail-view th {
            width: 150px !important;
            text-align: left;
            vertical-align: top;
        }

        table.table {
            display: table;
            width: 100% !important;
        }

        footer {
            margin-top: 1em;
            padding-top: 1em;
            border-top: 1px solid #aaa;
        }
    </style>
</head>
<body class="markdown-body">
<?php $this->beginBody() ?>
<header>
    <?= Html::img(\yii\helpers\Url::to('/images/daxslab-horizontal-black.png', true), [
        'alt' => Yii::$app->name,
        'width' => '350px'
    ]) ?><br>
    <h1><?= $this->title ?></h1>
</header>
<?= $content ?>
<?php $this->endBody() ?>
<footer>
    <address>
        <strong>Daxslab</strong><br>
        Ave 56, #4924<br>
        Cienfuegos, Cienfuegos 55100<br>
        <abbr title="Phone">P:</abbr> +535807443<br/>
        <a href="http://www.daxslab.com">daxslab.com</a>
    </address>
</footer>
</body>
</html>
<?php $this->endPage() ?>
