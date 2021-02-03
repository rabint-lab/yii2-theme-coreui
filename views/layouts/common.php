<?php
$bundleBaseUrl = $this->getAssetManager()->getBundle('\rabint\theme\coreui\ThemeAsset')->baseUrl;
$bundleBaseUrl .= '/dist/';
?>
<?php $this->beginContent('@vendor/rabint/theme-coreui/views/layouts/base.php'); ?>


    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-md-down-none">
            <h3 class="c-sidebar-brand-full">
                <i class="fas fa-chess-queen"></i>
                <?= config('app_name', 'داشبورد') ?>
            </h3>
            <i class="fas fa-chess-queen c-sidebar-brand-minimized"></i>
            <!--            <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">-->
            <!--                <use xlink:href="--><? //= $bundleBaseUrl; ?><!--coreui-pro.svg#full"></use>-->
            <!--            </svg>-->
            <!--            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">-->
            <!--                <use xlink:href="--><? //= $bundleBaseUrl; ?><!--coreui-pro.svg#signet"></use>-->
            <!--            </svg>-->
        </div>
        <?php
        if ($this->context instanceof \rabint\controllers\AdminController) {
            echo $this->render('element/_menu_admin', ['this', $this]);
        } elseif ($this->context instanceof \rabint\controllers\PanelController) {
            echo $this->render('element/_menu_dashboard', ['this', $this]);
        } else {
            echo $this->render('element/_menu', ['this', $this]);
        }


        ?>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
                data-class="c-sidebar-unfoldable"></button>
    </div>
<?= $this->render('element/_left_bar', ['this', $this]) ?>
    <div class="c-wrapper">
        <header class="c-header c-header-light c-header-fixed">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                    data-class="c-sidebar-show">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-menu"></use>
                </svg>
            </button>
            <a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="#"></a>
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
                    data-class="c-sidebar-lg-show" responsive="true">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-menu"></use>
                </svg>
            </button>

            <ul class="c-header-nav d-md-down-none">
                <?php if (\rabint\helpers\user::can('administrator')) { ?>

                    <li class="c-header-nav-item px-3">
                        <a class="c-header-nav-link" href="<?= \rabint\helpers\uri::to('/user/admin/index') ?>">
                            <?= \Yii::t('app', 'کاربران'); ?>
                        </a>
                    </li>
                <?php } ?>
                <?php if (\rabint\helpers\user::can('administrator')) { ?>
                    <li class="c-header-nav-item px-3">
                        <a class="c-header-nav-link" href="<?= \rabint\helpers\uri::to('/option/option/index') ?>">
                            <?= \Yii::t('app', 'تنظیمات'); ?>
                        </a>
                    </li>
                <?php } ?>
                <?php if (false && \rabint\helpers\user::can('doEncrypt')) { ?>
                    <li class="c-header-nav-item px-3">
                        <a class="c-header-nav-link" data-toggle='modal' data-target='#modalPush' href="#modalPush">
                            <?= \Yii::t('app', 'رمز گشا'); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>

            <ul class="c-header-nav mfs-auto">
                <li class="c-header-nav-item px-3 c-d-legacy-none">
                    <button class="c-header-nav-btn setDarkTheme" type="button" id="header-tooltip"
                            data-toggle="c-tooltip" data-placement="bottom"
                            title="تغییر حالت شب و روز">
                        <svg class="c-icon c-d-dark-none">
                            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-moon"></use>
                        </svg>
                        <svg class="c-icon c-d-default-none">
                            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-sun"></use>
                        </svg>
                    </button>
                </li>
            </ul>
            <ul class="c-header-nav">
                <?= $this->render('element/notification', ['this', $this, 'bundleBaseUrl' => $bundleBaseUrl]) ?>
                <?= $this->render('element/messages', ['this', $this, 'bundleBaseUrl' => $bundleBaseUrl]) ?>

                <?= $this->render('element/_userDropDown', ['this', $this]) ?>
                <?php if (false) {

                    echo $this->render('element/task', ['this', $this, 'bundleBaseUrl' => $bundleBaseUrl]) ?>
                    <button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside"
                            data-class="c-sidebar-show">
                        <svg class="c-icon c-icon-lg">
                            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-applications-settings"></use>
                        </svg>
                    </button>
                <?php } ?>
            </ul>
            <div class="c-subheader justify-content-between px-3">
                <?php
                $items = isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [];
                if (\rabint\helpers\user::can('loginToBackend')) {
                    array_unshift($items, ['label' => \Yii::t('app', 'پنل مدیریت'), 'url' => ['/admin']]);
                } else {
                    array_unshift($items, ['label' => \Yii::t('app', 'پنل کاربری'), 'url' => ['/user/default/index']]);
                }
                echo \yii\bootstrap4\Breadcrumbs::widget([
                    'tag' => 'ol',
                    'options' => ['class' => 'breadcrumb border-0 m-0 px-0 px-md-3'],
                    'links' => $items,
                    'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
                    'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n",
                    'navOptions' => ['aria-label' => 'breadcrumb'],
                ])
                ?>
                <div class="c-subheader-nav d-md-down-none mfe-2">
                    <!--                    <a class="c-subheader-nav-link" href="#">-->
                    <!--                        <svg class="c-icon">-->
                    <!--                            <use xlink:href="-->
                    <? //= $bundleBaseUrl; ?><!--free.svg#cil-speech"></use>-->
                    <!--                        </svg>-->
                    <!--                    </a>-->

                    <?php if (\rabint\helpers\user::can('administrator')) { ?>
                        <ul class="c-header-nav d-md-down-none">
                            <li class="c-header-nav-item px-3">
                                <a class="c-header-nav-link" href="<?= \rabint\helpers\uri::to('/user/admin/index') ?>">

                                </a>
                            </li>
                            <li class="c-header-nav-item px-3">
                                <a class="c-header-nav-link" href="">

                                </a>
                            </li>
                        </ul>

                        <a class="c-subheader-nav-link" href="<?= \rabint\helpers\uri::to('/admin') ?>">
                            <svg class="c-icon">
                                <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-graph"></use>
                            </svg> &nbsp;<?= \Yii::t('app', 'پنل کاربری'); ?></a>
                        <a class="c-subheader-nav-link" href="<?= \rabint\helpers\uri::to('/option/option/index') ?>">
                            <svg class="c-icon">
                                <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-settings"></use>
                            </svg> &nbsp;<?= \Yii::t('app', 'تنظیمات'); ?></a>
                    <?php } ?>

                </div>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div id="ui-view">
                        <?= $this->render('element/_flashes', ['this', $this]) ?>
                        <?php echo $content ?>
                    </div>
                </div>
            </main>
        </div>

        <footer class="c-footer">
            <div><a href="<?= \rabint\helpers\uri::home(true) ?>"><?= config('app_name', 'داشبورد') ?></a> © 2020</div>
            <div class="mfs-auto"><?= \Yii::t('app', 'طراحی شده توسط'); ?> <a
                        href="#"><?= \Yii::t('app', 'شرکت داده پردازی حنان توس'); ?></a></div>
        </footer>
    </div>
<?= $this->render('element/decryptModal'); ?>

<?php $this->endContent(); ?>