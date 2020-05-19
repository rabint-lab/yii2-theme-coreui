<?php
$bundleBaseUrl = $this->getAssetManager()->getBundle('\rabint\theme\coreui\ThemeAsset')->baseUrl;
$bundleBaseUrl .= '/dist/';
?>
<?php $this->beginContent('@vendor/rabint/theme-coreui/views/layouts/base.php'); ?>
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-md-down-none">
            <h3 class="c-sidebar-brand-full">
                <i class="fas fa-chess-queen"></i>
                <?=config('app_name','داشبورد')?>
            </h3>
            <i class="fas fa-chess-queen c-sidebar-brand-minimized"></i>
<!--            <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">-->
<!--                <use xlink:href="--><?//= $bundleBaseUrl; ?><!--coreui-pro.svg#full"></use>-->
<!--            </svg>-->
<!--            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">-->
<!--                <use xlink:href="--><?//= $bundleBaseUrl; ?><!--coreui-pro.svg#signet"></use>-->
<!--            </svg>-->
        </div>
        <?= $this->render('element/_menu', ['this', $this]) ?>
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
            <a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="#">
                <svg width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="<?= $bundleBaseUrl; ?>coreui-pro.svg#full"></use>
                </svg>
            </a>
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
                    data-class="c-sidebar-lg-show" responsive="true">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-menu"></use>
                </svg>
            </button>

            <?php if (\rabint\helpers\user::can('administrator')) { ?>
                <ul class="c-header-nav d-md-down-none">
                    <li class="c-header-nav-item px-3">
                        <a class="c-header-nav-link" href="<?= \rabint\helpers\uri::to('/user/admin/index') ?>">
                            <?= \Yii::t('app', 'کاربران'); ?>
                        </a>
                    </li>
                    <li class="c-header-nav-item px-3">
                        <a class="c-header-nav-link" href="<?= \rabint\helpers\uri::to('/option/option/index') ?>">
                            <?= \Yii::t('app', 'اختیارات'); ?>
                        </a>
                    </li>
                </ul>
            <?php } ?>

            <ul class="c-header-nav mfs-auto">
                <li class="c-header-nav-item px-3 c-d-legacy-none">
                    <button class="c-class-toggler c-header-nav-btn" type="button" id="header-tooltip"
                            data-target="body"
                            data-class="c-dark-theme" data-toggle="c-tooltip" data-placement="bottom"
                            title="Toggle Light/Dark Mode">
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
                <li class="c-header-nav-item dropdown d-md-down-none mx-2"><a class="c-header-nav-link"
                                                                              data-toggle="dropdown" href="#"
                                                                              role="button"
                                                                              aria-haspopup="true"
                                                                              aria-expanded="false">
                        <svg class="c-icon">
                            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-bell"></use>
                        </svg>
                        <span class="badge badge-pill badge-danger">5</span></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                        <div class="dropdown-header bg-light"><strong>You have 5 notifications</strong></div>
                        <a class="dropdown-item" href="#">
                            <svg class="c-icon mfe-2 text-success">
                                <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-user-follow"></use>
                            </svg>
                            New user registered</a><a class="dropdown-item" href="#">
                            <svg class="c-icon mfe-2 text-danger">
                                <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-user-unfollow"></use>
                            </svg>
                            User deleted</a><a class="dropdown-item" href="#">
                            <svg class="c-icon mfe-2 text-info">
                                <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-chart"></use>
                            </svg>
                            Sales report is ready</a><a class="dropdown-item" href="#">
                            <svg class="c-icon mfe-2 text-success">
                                <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-basket"></use>
                            </svg>
                            New client</a><a class="dropdown-item" href="#">
                            <svg class="c-icon mfe-2 text-warning">
                                <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-speedometer"></use>
                            </svg>
                            Server overloaded</a>
                        <div class="dropdown-header bg-light"><strong>Server</strong></div>
                        <a class="dropdown-item d-block" href="#">
                            <div class="text-uppercase mb-1"><small><b>CPU Usage</b></small></div>
                            <span class="progress progress-xs">
<div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
     aria-valuemax="100"></div>
</span><small class="text-muted">348 Processes. 1/4 Cores.</small>
                        </a><a class="dropdown-item d-block" href="#">
                            <div class="text-uppercase mb-1"><small><b>Memory Usage</b></small></div>
                            <span class="progress progress-xs">
<div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0"
     aria-valuemax="100"></div>
</span><small class="text-muted">11444GB/16384MB</small>
                        </a><a class="dropdown-item d-block" href="#">
                            <div class="text-uppercase mb-1"><small><b>SSD 1 Usage</b></small></div>
                            <span class="progress progress-xs">
<div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0"
     aria-valuemax="100"></div>
</span><small class="text-muted">243GB/256GB</small>
                        </a>
                    </div>
                </li>
                <li class="c-header-nav-item dropdown d-md-down-none mx-2"><a class="c-header-nav-link"
                                                                              data-toggle="dropdown" href="#"
                                                                              role="button"
                                                                              aria-haspopup="true"
                                                                              aria-expanded="false">
                        <svg class="c-icon">
                            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-list-rich"></use>
                        </svg>
                        <span class="badge badge-pill badge-warning">15</span></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                        <div class="dropdown-header bg-light"><strong>You have 5 pending tasks</strong></div>
                        <a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">Upgrade NPM &amp; Bower<span
                                        class="float-right"><strong>0%</strong></span></div>
                            <span class="progress progress-xs">
<div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0"
     aria-valuemax="100"></div>
</span>
                        </a><a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">ReactJS Version<span class="float-right"><strong>25%</strong></span>
                            </div>
                            <span class="progress progress-xs">
<div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
     aria-valuemax="100"></div>
</span>
                        </a><a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">VueJS Version<span class="float-right"><strong>50%</strong></span>
                            </div>
                            <span class="progress progress-xs">
<div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
     aria-valuemax="100"></div>
</span>
                        </a><a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">Add new layouts<span class="float-right"><strong>75%</strong></span>
                            </div>
                            <span class="progress progress-xs">
<div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
     aria-valuemax="100"></div>
</span>
                        </a><a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">Angular 8 Version<span
                                        class="float-right"><strong>100%</strong></span>
                            </div>
                            <span class="progress progress-xs">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
     aria-valuemax="100"></div>
</span>
                        </a><a class="dropdown-item text-center border-top" href="#"><strong>View all tasks</strong></a>
                    </div>
                </li>
                <li class="c-header-nav-item dropdown d-md-down-none mx-2"><a class="c-header-nav-link"
                                                                              data-toggle="dropdown" href="#"
                                                                              role="button"
                                                                              aria-haspopup="true"
                                                                              aria-expanded="false">
                        <svg class="c-icon">
                            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-envelope-open"></use>
                        </svg>
                        <span class="badge badge-pill badge-info">7</span></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                        <div class="dropdown-header bg-light"><strong>You have 4 messages</strong></div>
                        <a class="dropdown-item" href="#">
                            <div class="message">
                                <div class="py-3 mfe-3 float-left">
                                    <div class="c-avatar"><img class="c-avatar-img" src="/img/example/7.jpg"
                                                               alt="user@email.com"><span
                                                class="c-avatar-status bg-success"></span></div>
                                </div>
                                <div><small class="text-muted">John Doe</small><small
                                            class="text-muted float-right mt-1">Just
                                        now</small></div>
                                <div class="text-truncate font-weight-bold"><span class="text-danger">!</span> Important
                                    message
                                </div>
                                <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt...
                                </div>
                            </div>
                        </a><a class="dropdown-item" href="#">
                            <div class="message">
                                <div class="py-3 mfe-3 float-left">
                                    <div class="c-avatar"><img class="c-avatar-img" src="/img/example/6.jpg"
                                                               alt="user@email.com"><span
                                                class="c-avatar-status bg-warning"></span></div>
                                </div>
                                <div><small class="text-muted">John Doe</small><small
                                            class="text-muted float-right mt-1">5
                                        minutes ago</small></div>
                                <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                                <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt...
                                </div>
                            </div>
                        </a><a class="dropdown-item" href="#">
                            <div class="message">
                                <div class="py-3 mfe-3 float-left">
                                    <div class="c-avatar"><img class="c-avatar-img" src="/img/example/5.jpg"
                                                               alt="user@email.com"><span
                                                class="c-avatar-status bg-danger"></span></div>
                                </div>
                                <div><small class="text-muted">John Doe</small><small
                                            class="text-muted float-right mt-1">1:52
                                        PM</small></div>
                                <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                                <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt...
                                </div>
                            </div>
                        </a><a class="dropdown-item" href="#">
                            <div class="message">
                                <div class="py-3 mfe-3 float-left">
                                    <div class="c-avatar"><img class="c-avatar-img" src="/img/example/4.jpg"
                                                               alt="user@email.com"><span
                                                class="c-avatar-status bg-info"></span></div>
                                </div>
                                <div><small class="text-muted">John Doe</small><small
                                            class="text-muted float-right mt-1">4:03
                                        PM</small></div>
                                <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                                <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt...
                                </div>
                            </div>
                        </a><a class="dropdown-item text-center border-top" href="#"><strong>View all messages</strong></a>
                    </div>
                </li>
                <?= $this->render('element/_userDropDown', ['this', $this]) ?>
                <button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside"
                        data-class="c-sidebar-show">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-applications-settings"></use>
                    </svg>
                </button>
            </ul>
            <div class="c-subheader justify-content-between px-3">

                <?php
                $items = isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [];
                array_unshift($items, ['label' => \Yii::t('app', 'پنل مدیریت'), 'url' => ['/admin']]);
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
                    <?php } ?>

                    <a class="c-subheader-nav-link" href="<?= \rabint\helpers\uri::to('/admin') ?>">
                        <svg class="c-icon">
                            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-graph"></use>
                        </svg> &nbsp;<?= \Yii::t('app', 'پنل کاربری'); ?></a>
                    <a class="c-subheader-nav-link" href="<?= \rabint\helpers\uri::to('/option/option/index') ?>">
                        <svg class="c-icon">
                            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-settings"></use>
                        </svg> &nbsp;<?= \Yii::t('app', 'اختیارات'); ?></a>
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
            <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
            <div class="mfs-auto">Powered by&nbsp;<a href="https://coreui.io/pro/">CoreUI Pro</a></div>
        </footer>
    </div>

<?php $this->endContent(); ?>