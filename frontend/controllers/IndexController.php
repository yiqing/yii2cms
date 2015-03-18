<?php
/**
 * Created by PhpStorm.
 * User: wm
 * Date: 2015/3/18
 * Time: 7:10
 */

namespace frontend\controllers;


use frontend\controllers\BaseController;

class IndexController extends BaseController{

    public function actionIndex()
    {
        return $this->render('index');
    }

}