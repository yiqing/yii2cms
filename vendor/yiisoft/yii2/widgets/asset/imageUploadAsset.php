<?php


namespace yii\widgets\asset;

use yii\web\AssetBundle;

class imageUploadAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'ckfinder/ckfinder.js',
        'js/my.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
