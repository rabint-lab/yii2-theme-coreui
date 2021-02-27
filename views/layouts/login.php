<?php

/**
 * @var $this yii\web\View
 */
//$bundleImgUrl = $bundleBaseUrl . '/img/';
?>

<?php $this->beginContent('@vendor/rabint/theme-coreui/views/layouts/base.php', ['bodyClass' => 'flex-row align-items-center bg-form-login']); ?>

<div class="container-fluid">
    <div class="row justify-content-start">

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 pr-0">
            <div class="col-md-12">
                <?= $this->render('element/_flashes', ['this', $this]) ?>
            </div>
            <div class="card mx-4">
                <div class="card-header">
                <div class="logo-images">
                        <a href="https://www.um.ac.ir">
                            <img src="/img/sponsor.png" alt="">
                        </a>
                        <a href="https://">
                            <img src="" alt="">
                        </a>
                    </div>
                    <!-- <h4 class="text-center color-c mb-2">سامانه دانشجويان بین المللی</h4>
                    <h6 class="text-center mb-2 mt-2">(دانشگاه فردوسی مشهد)</h6> -->
                    <h6 class="text-center">
                        <?= $this->title; ?>
                    </h6>
                   
                </div>
                <div class="card-body p-4">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $this->endContent(); ?>