<?php


namespace backend\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       // '/static/css/bootstrap.min.css',
        'static/css/font-awesome.min.css',
        'static/css/ionicons.min.css',
        'static/css/AdminLTE.css',
    ];
    public $js = [
        'static/js/AdminLTE/app.js',
        'static/js/AdminLTE/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
