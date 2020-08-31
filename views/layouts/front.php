<?php
$bundleBaseUrl = $this->getAssetManager()->getBundle('\rabint\theme\coreui\ThemeAsset')->baseUrl;
$bundleBaseUrl .= '/dist/';
?>
<?php $this->beginContent('@vendor/rabint/theme-coreui/views/layouts/base.php'); ?>
    <div class="c-wrapper">
        <header class="c-header c-header-light c-header-fixed">
            <div>

                <!--                <ul class="c-header-nav d-md-down-none" style="display:none">-->
                <!--                    <li class="c-header-nav-item px-3">-->
                <!--                        <a class="c-header-nav-link" href="-->
                <? //= \rabint\helpers\uri::to('/user/admin/index') ?><!--">-->
                <!--                            --><? //= \Yii::t('app', 'کاربران'); ?>
                <!--                        </a>-->
                <!--                    </li>-->
                <!--                    <li class="c-header-nav-item px-3">-->
                <!--                        <a class="c-header-nav-link" href="-->
                <? //= \rabint\helpers\uri::to('/option/option/index') ?><!--">-->
                <!--                            --><? //= \Yii::t('app', 'اختیارات'); ?>
                <!--                        </a>-->
                <!--                    </li>-->
                <!--                </ul>-->
                <?php
                $items = include Yii::getAlias('@app/config/menus.php');
                $items = $items['dashboard'];
                if (\rabint\helpers\user::can('manager')) {
                    array_unshift($items, ['label' => \Yii::t('app', 'پنل مدیریت'), 'url' => ['/admin']]);
                }else{
                    array_unshift($items, ['label' => \Yii::t('app', 'پنل کاربری'), 'url' => ['/user/default/index']]);
                }
                array_unshift($items, ['label' => \Yii::t('app', 'نخست'), 'url' => ['/']]);
                array_push($items, ['label' => \Yii::t('app', 'رمز گشا'), 'url' => '#modalPush','data-toggle'=>'modal','data-target'=>'#modalPush']);
                echo \yii\bootstrap4\Nav::widget([
                    'items' => $items,
                    'options' => ['class' => 'c-header-nav d-md-down-none'],
                ])
                ?>
            </div>

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

            </ul>

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
        <?= $this->render('element/decryptModal');?>

    </div>

<?php $this->endContent(); ?>