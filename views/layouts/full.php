<?php
/**
 * @var $this yii\web\View
 */
?>

<?php
if (\rabint\helpers\user::can('loginToBackend'))
    $this->beginContent('@vendor/rabint/theme-coreui/views/layouts/common.php');
else
    $this->beginContent('@vendor/rabint/theme-coreui/views/layouts/front.php');
?>
<?php echo $content ?>
<?php $this->endContent(); ?>