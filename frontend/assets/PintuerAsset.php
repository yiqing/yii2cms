<?php
/**
 * Created by PhpStorm.
 * User: wm
 * Date: 2015/3/18
 * Time: 7:57
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class PintuerAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'pintuer/css/pintuer.css',
    ];
    public $js = [
        'pintuer/js/pintuer.js',
        'pintuer/js/respond.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}