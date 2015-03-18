<?php
/**
 * Created by PhpStorm.
 * User: wm
 * Date: 2015/3/18
 * Time: 17:20
 */

namespace yii\widgets;

use yii;
use yii\base\Widget;

class Category extends Widget
{
    public function run(){

        $cache = Yii::$app->cache;
        $categorys = $cache['categorys'];
        return $this->render('category',['categorys'=>$categorys]);
    }
}