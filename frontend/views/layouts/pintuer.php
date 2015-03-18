<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Category;
use frontend\assets\PintuerAsset;


use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

PintuerAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link type="image/x-icon" href="http://www.pintuer.com/favicon.ico" rel="shortcut icon" />
    <link href="http://www.pintuer.com/favicon.ico" rel="bookmark icon" />
    <style>
        .demo-nav.fixed.fixed-top{z-index:8;background:#32347F;width:100%;padding:0;border-bottom:solid 3px #000;-webkit-box-shadow:0 3px 6px rgba(0, 0, 0, .175);box-shadow:0 3px 6px rgba(0, 0, 0, .175);}
    </style>
</head>
<body style="background: #ECE5D8;">
<?php $this->beginBody() ?>
<div class="demo-nav layout bg-black bg-inverse hidden-l fixed">
    <div class="container-layout height-big">
        <span class="float-right">
          <a href="#">注册</a>
          <span class="text-little text-gray">|</span>
          <a href="#">登录</a>
          <span class="text-little text-gray">|</span>
          <a href="#">联系</a>
        </span>
        欢迎使用拼图前端框架
    </div>
</div>

<div class="demo-nav container-layout padding-big-top padding-big-bottom bg-main bg-inverse fixed">

    <div class="line">

        <div class="xl12 xs2 xm2 xb1">
            <button class="button icon-navicon float-right bg-white" data-target="#header-demo4"></button>
            <a href="#"><img src="/log.png"></a>
        </div>

        <div class=" xl12 xs10 xm10 xb11 padding-top nav-navicon" id="header-demo4">

            <div class="xs8 xm8 xb6">
                <ul class="nav nav-menu nav-inline nav-pills">
                    <?= Category::widget()?>
                    <li><a href="#">首页</a></li>
                    <li><a href="#">CSS</a></li>
                    <li class="active"><a href="#">元件<span class="arrow"></span></a>
                        <ul class="drop-menu">
                            <li><a href="#">概述</a></li>
                            <li><a href="#">网格系统<span class="arrow"></span></a>
                                <ul><li><a href="#">响应式布局</a></li><li><a href="#">非响应式布局</a></li></ul>
                            </li>
                            <li><a href="#">图标</a></li>
                        </ul>
                    </li>
                    <li><a href="#">更多<span class="arrow"></span></a>
                        <ul class="drop-menu">
                            <li><a href="#">组件</a></li>
                            <li><a href="#">模块<span class="arrow"></span></a>
                                <ul><li><a href="#">头部</a></li><li><a href="#">导航</a></li><li><a href="#">底部</a></li></ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="xs4 xm4 xb3">
                <form>
                    <div class="input-group padding-little-top">
                        <input type="text" class="input" name="keywords" size="30" placeholder="关键词" />
                        <span class="addbtn"><button type="button" class="button bg">搜!</button></span>
                    </div>
                </form>
            </div>
            <div class="hidden-s hidden-m xb2 xb1-move">
                <div class="xl6 xb12 text-red">400-123-4567</div>
                <div class="xl6 xb12 text-small"><a href="#" class="win-homepage">设为首页</a> | <a href="#" class="win-favorite">加入收藏</a></div>
            </div>
        </div>
    </div>
</div>

<?= $content?>

<div class="container-layout bg-gray bg-inverse padding-big-top padding-big-bottom" >
    <div class="text-center">本网站由秀云CMS内容管理系统开发 作者QQ17763768 飞歌 沪ICP备14021484号</div>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endPage()?>
</html>
