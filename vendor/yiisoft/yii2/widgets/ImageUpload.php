<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2014/12/13
 * Time: 14:35
 */

namespace yii\widgets;
use yii\base\Widget;
use yii;

class ImageUpload extends Widget {
    public $attribute;
    public $model;

    public function run(){
        return $this->render('imageUpload',['name'=>$this->attribute,'model'=>$this->model]);
    }
} 