<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        // 'css/bootstrap.min.css',
        'css/index.css',
        'css/global.css',
        'css/blog.css',
        'css/cart.css',
        'css/checkout.css',
        'css/contact.css',
        'css/faq.css',
        // 'css/',
        // 'css/',
    ];
    public $js = [
        'js/bootstrap.bundle.min.js',
        'js/theme.min.js',
        // 'js/',
        // 'js/',
        // 'js/',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
