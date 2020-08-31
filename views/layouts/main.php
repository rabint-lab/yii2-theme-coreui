<?php
/**
 * @var $this yii\web\View
 */
?>

<?php
    $this->beginContent('@vendor/rabint/theme-coreui/views/layouts/common.php');
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