<?php

use rabint\themes\codebase\widgets\Menu;

$menusConf = [];
$menuFile = Yii::getAlias("@app/config/menus.php");
if (file_exists($menuFile)) {
    $menusConf = include Yii::getAlias("@app/config/menus.php");
}

$premenusConf = [];//\rabint\helpers\collection::getValue($menusConf, 'preadmin', []);
$menusConf = \rabint\helpers\collection::getValue($menusConf, 'dashboard', []);


$ModuleMenu = [];
$modules = include(Yii::getAlias('@config/modules.php'));
foreach ((array)$modules as $item) {
    $moduleClass = $item['class']??'';

    if (method_exists($moduleClass, 'dashboardMenu')) {
        $menu = call_user_func([$moduleClass, 'dashboardMenu']);
        if (empty($menu)) {
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
        'label' => Yii::t('rabint', 'پیشخوان کاربری'),
        'icon' => '<i class="fas fa-tachometer-alt "></i>',
        'visible' => !\rabint\helpers\user::isGuest(),
        'url' => config('dashboardRoute',['/user/default/index']),
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
        ?>
    </ul>
<?php
/** */