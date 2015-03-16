<?php
namespace yii\widgets;
use yii\base\Widget;
/**
* 
*/
class Ueditor extends Widget
{
	public $name;
	public $model;
	
	public function run()
	{
		
		return $this->render('ueditor',['name'=>$this->name,'model'=>$this->model]);
		//return $this->name2;
	}
}
?>