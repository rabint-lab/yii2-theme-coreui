<?php

$bundleBaseUrl = $this->getAssetManager()->getBundle('\rabint\theme\coreui\ThemeAsset')->baseUrl;
$bundleWebUrl = $bundleBaseUrl;
$bundleBaseUrl .= '/dist/';

if (\rabint\helpers\user::isGuest()) {
    $userAvatar = $bundleWebUrl . '/img/avatar.jpg';
    $userDisplayName = \Yii::t('app', 'کاربر میهمان');
} else {
    $userAvatar = Yii::$app->user->identity->userProfile->getAvatar( $bundleWebUrl . '/img/avatar.jpg');
    $userDisplayName = \rabint\helpers\user::name();
}
?>

<li class="c-header-nav-item dropdown">
    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
       aria-expanded="false">
        <div class="c-avatar">
            <img class="c-avatar-img" src="<?= $userAvatar; ?>" alt="<?= $userDisplayName; ?>">
        </div>
    </a>
    <?php
    if (!\rabint\helpers\user::isGuest()) {
        ?>
        <div class="dropdown-menu dropdown-menu-right pt-0">

            <div class="dropdown-header bg-light py-2"><strong><?= \Yii::t('app', 'حساب کاربری'); ?></strong></div>
            <a class="dropdown-item" href="<?= \rabint\helpers\uri::to(\rabint\helpers\uri::dashboardRoute()); ?>">
                <svg class="c-icon mfe-2">
                    <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-settings"></use>
                </svg>
                حساب کاربری
            </a>
            <a class="dropdown-item" href="<?= \rabint\helpers\uri::to([\rabint\user\Module::getConfig('profile_action')]); ?>">
                <svg class="c-icon mfe-2">
                    <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-user"></use>
                </svg>

                اطلاعات شخصی</a>

            <!--            <a class="dropdown-item" href="#">-->
            <!--                <svg class="c-icon mfe-2">-->
            <!--                    <use xlink:href="--><? //= $bundleBaseUrl; ?><!--free.svg#cil-credit-card"></use>-->
            <!--                </svg>-->
            <!--                Payments<span class="badge badge-secondary mfs-auto">42</span></a><a class="dropdown-item"-->
            <!--                                                                                     href="#">-->
            <!--                <svg class="c-icon mfe-2">-->
            <!--                    <use xlink:href="--><? //= $bundleBaseUrl; ?><!--free.svg#cil-file"></use>-->
            <!--                </svg>-->
            <!--                Projects<span class="badge badge-primary mfs-auto">42</span></a>-->
            <!--            <div class="dropdown-divider"></div>-->
            <!--            <a class="dropdown-item" href="#">-->
            <!--                <svg class="c-icon mfe-2">-->
            <!--                    <use xlink:href="--><? //= $bundleBaseUrl; ?><!--free.svg#cil-lock-locked"></use>-->
            <!--                </svg>-->
            <!--                Lock Account</a>-->
            <a class="dropdown-item" href="<?= \rabint\helpers\uri::to(['/user/sign-in/logout']); ?>">
                <svg class="c-icon mfe-2">
                    <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-account-logout"></use>
                </svg>
                <?= \Yii::t('app', 'خروج از حساب کاربری'); ?>
            </a>
<!--            <div class="dropdown-header bg-light py-2">-->
<!--                <strong>--><?//= \Yii::t('app', 'اطلاعیه ها'); ?><!--</strong>-->
<!--            </div>-->
<!--            <a class="dropdown-item" href="#">-->
<!--                <svg class="c-icon mfe-2">-->
<!--                    <use xlink:href="--><?//= $bundleBaseUrl; ?><!--free.svg#cil-bell"></use>-->
<!--                </svg>-->
<!--                Updates<span class="badge badge-info mfs-auto">42</span></a><a class="dropdown-item"-->
<!--                                                                               href="#">-->
<!--                <svg class="c-icon mfe-2">-->
<!--                    <use xlink:href="--><?//= $bundleBaseUrl; ?><!--free.svg#cil-envelope-open"></use>-->
<!--                </svg>-->
<!--                Messages<span class="badge badge-success mfs-auto">42</span></a><a class="dropdown-item"-->
<!--                                                                                   href="#">-->
<!--                <svg class="c-icon mfe-2">-->
<!--                    <use xlink:href="--><?//= $bundleBaseUrl; ?><!--free.svg#cil-task"></use>-->
<!--                </svg>-->
<!--                Tasks<span class="badge badge-danger mfs-auto">42</span></a><a class="dropdown-item"-->
<!--                                                                               href="#">-->
<!--                <svg class="c-icon mfe-2">-->
<!--                    <use xlink:href="--><?//= $bundleBaseUrl; ?><!--free.svg#cil-comment-square"></use>-->
<!--                </svg>-->
<!--                Comments<span class="badge badge-warning mfs-auto">42</span>-->
<!--            </a>-->
        </div>
    <?php } else { ?>
        <div class="dropdown-menu dropdown-menu-right pt-0">
            <a class="dropdown-item" href="<?= \rabint\helpers\uri::to(['/user/sign-in/login']); ?>">
                <svg class="c-icon mfe-2">
                    <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-lock-locked"></use>
                </svg>
                <?= \Yii::t('app', 'ورود به حساب کاربری'); ?>
            </a>
            <a class="dropdown-item" href="<?= \rabint\helpers\uri::to(['/user/sign-in/signup']); ?>">
                <svg class="c-icon mfe-2">
                    <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-account-logout"></use>
                </svg>
                <?= \Yii::t('app', 'ثبت نام'); ?>
            </a>
        </div>
        <?php
    }
    ?>
</li>
