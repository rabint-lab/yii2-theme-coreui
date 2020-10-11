<?php

use rabint\themes\codebase\widgets\Menu;

$menusConf = include Yii::getAlias("@app/config/menus.php");

$premenusConf = [];//\rabint\helpers\collection::getValue($menusConf, 'preadmin', []);
$menusConf = \rabint\helpers\collection::getValue($menusConf, 'admin', []);


$ModuleMenu = [];
$modules = include(Yii::getAlias('@config/modules.php'));
foreach ((array)$modules as $item) {
    $moduleClass = $item['class'];

    if (method_exists($moduleClass, 'adminMenu')) {
        $menu = call_user_func([$moduleClass, 'adminMenu']);
        if(empty($menu)){
            continue;
        }
        if (isset($menu['label'])) {
            $ModuleMenu[] = $menu;
        } else {
            $ModuleMenu = array_merge($ModuleMenu, $menu);
        }
    }
}
/* =================================================================== */
$TopMenu = [
    [
        'label' => Yii::t('rabint', 'پیشخوان مدیریتی'),
        'icon' => '<i class="fas fa-tachometer-alt "></i>',
        'visible' => !\rabint\helpers\user::isGuest(),
        'url' => ['/admin/index'],
    ],
];

$optionItems = [];
$BottmMenu = [];

$AllItems = array_merge($premenusConf, $TopMenu, $menusConf, $ModuleMenu, $BottmMenu);

function echoCoreUiMenu($Items, $level = 0)
{
    foreach ($Items as $key => $aItem) {
        if (isset($aItem['visible']) && !$aItem['visible']) {
            continue;
        }
        $hasItem = isset($aItem['items']);

        $icon = $aItem['icon'] ?? '';
        $label = $aItem['label'] ?? 'no label';
        $badge = $aItem['badge'] ?? '';
        $url = $aItem['url'] ?? '';

        /**
         * inject icon class
         */
        $icon = str_replace('class="', 'class="c-sidebar-nav-icon ', $icon);

        if (!empty($url)) {
            $url = \rabint\helpers\uri::to($url, false);
        }

        /**
         * separator titles
         */
        if (!$hasItem && empty($url) && $level == 0) {
            if ($key > 0) {
                echo '<li class="c-sidebar-nav-divider"></li>';
            }
            echo '<li class="c-sidebar-nav-title">' . $icon . $label . $badge . '</li>';
            continue;
        }


        $liClass = $hasItem ? 'c-sidebar-nav-dropdown' : 'c-sidebar-nav-item';
        $aClass = $hasItem ? 'c-sidebar-nav-dropdown-toggle' : 'c-sidebar-nav-link';
        ?>

        <li class="<?= $liClass; ?>">
            <a class="<?= $aClass; ?>" href="<?= $url; ?>">
                <?= $icon; ?>
                <?= $label; ?>
                <?= $badge; ?>
            </a>
            <?php
            if ($hasItem) {
                echo '<ul class="c-sidebar-nav-dropdown-items">';
                echoCoreUiMenu($aItem['items'], $level + 1);
                echo '</ul>';
            }
            ?>
        </li>

        <?php


    }
}

?>
    <ul class="c-sidebar-nav">
        <?php
        echoCoreUiMenu($AllItems);
        if(\rabint\helpers\user::can('administrator')){
        ?>
            <li class="c-sidebar-nav-divider"></li>
            <li class="c-sidebar-nav-title">وضعیت سرویس</li>
            <li class="c-sidebar-nav-item px-3 c-d-compact-none c-d-minimized-none">
                <div class="text-uppercase mb-1"><small><b>CPU Usage</b></small></div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">348 Processes. 1/4 Cores.</small>
            </li>
            <li class="c-sidebar-nav-item px-3 c-d-compact-none c-d-minimized-none">
                <div class="text-uppercase mb-1"><small><b>Memory Usage</b></small></div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">11444GB/16384MB</small>
            </li>
            <li class="c-sidebar-nav-item px-3 mb-3 c-d-compact-none c-d-minimized-none">
                <div class="text-uppercase mb-1"><small><b>SSD 1 Usage</b></small></div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">243GB/256GB</small>
            </li>
        <?php }?>
    </ul>
<?php
/** */