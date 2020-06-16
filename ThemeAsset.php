<?php

namespace rabint\theme\coreui;

use rabint\assets\font\VazirAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/rabint/theme-coreui/web';
    public $css = [
        "css/site.css",
        "dist/css/coreui.css",
        'fonts/glyphicon/glyphicon.css',
    ];
    public $js = [
        "dist/popper.min.js",
        "dist/js/coreui.bundle.js",
        "js/app.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'rabint\assets\Bootstrap4RtlAsset',
        'rabint\assets\CommonAsset',
        'rabint\assets\FontAwesomeAsset',
        'rabint\assets\font\VazirAsset',
    ];
}
