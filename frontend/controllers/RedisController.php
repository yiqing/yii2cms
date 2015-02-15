<?php
namespace frontend\controllers;

use Yii;

use yii\web\Controller;


/**
 * Site controller
 */
class RedisController extends Controller
{
	public function actionSet()
	{
		$redis = \yii::$app->redis;
		echo $redis->get('name').'<br>';
		echo $redis->get('sex').'<br>';
		echo $redis->get('age').'<br>';
		

	}
}