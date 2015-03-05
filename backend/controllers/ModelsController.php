<?php
/**
 * Created by PhpStorm.
 * User: wm
 * Date: 15-3-4
 * Time: 上午11:15
 */

namespace backend\controllers;


use yii\web\Controller;

class ModelsController extends BaseController {

    public function actionIndex(){
        return $this->render('index');

    }

}