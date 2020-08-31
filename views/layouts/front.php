<?php
$bundleBaseUrl = $this->getAssetManager()->getBundle('\rabint\theme\coreui\ThemeAsset')->baseUrl;
$bundleBaseUrl .= '/dist/';
?>
<?php $this->beginContent('@vendor/rabint/theme-coreui/views/layouts/common.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>