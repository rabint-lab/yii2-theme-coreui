<?php

namespace rabint\theme\coreui;

use rabint\assets\font\VazirAsset;
use rabint\cheatsheet\Time;
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
        //"dist/css/coreui.css",
        "dist/css/coreui-dark.css",
        'fonts/glyphicon/glyphicon.css',
    ];
    public $js = [
        "dist/popper.min.js",
        "dist/js/coreui.bundle.js",
        "js/app.js",
        'js/jquery.cookie.js',
        "js/custom.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'rabint\assets\Bootstrap4RtlAsset',
        'rabint\assets\CommonAsset',
        'rabint\assets\FontAwesomeAsset',
        'rabint\assets\font\VazirAsset',
        'rabint\assets\font\SahelAsset',
    ];
    public static  function getConfig($key){
        $defaultConfigs = [
            'copyright' => 'شرکت داده پردازی حنان توس', // [mobile,email,mobileEmail,username]
            'copyright_link' => 'http://hanantoos.ir', // [mobile,email,mobileEmail,username]

        ];
        return config('params.theme.' . $key, $defaultConfigs[$key]);
    }
}
