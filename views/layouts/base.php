<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

\rabint\theme\coreui\ThemeAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" dir="<?= rabint\helpers\locality::langDir(Yii::$app->language); ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <!--    <link rel="shortcut icon" href="/favicon.png">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | <?= Yii::$app->name ?></title>
    <?php $this->head() ?>

    <!-- JS custom internationalization -->
    <script>
        i18n = {
            'Search': '<?=Yii::t('app', 'جستجو')?>',
            'Choose': '<?=Yii::t('app', 'انتخاب')?>',
        };
    </script>
</head>
<body class="c-app <?= $bodyClass ?? '' ?>"><!--c-dark-theme-->

<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>