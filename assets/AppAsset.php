<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/animate.min.css',
        'css/font-awesome.min.css',
        'css/timeline.css',
        'css/fonts.css',
        'css/perfil.css',

    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/custom.js',
        'js/main.js',
     
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
