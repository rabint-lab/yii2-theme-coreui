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
    <div>
        <div class="fade-in">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>