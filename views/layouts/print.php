<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

\rabint\theme\coreui\ThemeAsset::register($this);
$bodyClass = $bodyClass ?? '';
if (isset($_COOKIE['coreui_is_dark'])) {
    if ($_COOKIE['coreui_is_dark'] == 'yes') {
        $bodyClass .= ' c-dark-theme';
    }
} elseif ($this->context instanceof \rabint\controllers\AdminController) {
    $bodyClass .= ' c-dark-theme';
}
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" dir="<?= rabint\helpers\locality::langDir(Yii::$app->language); ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    $scheme = config('base_url.scheme', 'http');
    if ($scheme == 'https') {
        echo '<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">';
    }
    ?>

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

<?php \yii\bootstrap4\Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "",
    "size" => "modal-lg",
]) ?>
<?php \yii\bootstrap4\Modal::end(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
