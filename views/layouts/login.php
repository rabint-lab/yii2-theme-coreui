<?php
/**
 * @var $this yii\web\View
 */
?>

<?php $this->beginContent('@vendor/rabint/theme-coreui/views/layouts/base.php', ['bodyClass' => 'flex-row align-items-center']); ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-header">
                        <h1 class="text-center">
                            <?= $this->title; ?></h1>
                    </div>
                    <div class="card-body p-4">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>