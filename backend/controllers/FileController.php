<?php
/**
 * Created by PhpStorm.
 * User: wm
 * Date: 2015/3/14
 * Time: 19:51
 */

namespace backend\controllers;
use \Aliyun\OSS\OSSClient;
use yii\base\Controller;
use Yii;

class FileController extends Controller{

    public function actionUpload(){
        $post = Yii::$app->request->post('src');
        $ext = pathinfo($post)['extension'];
        $key = pathinfo($post)['basename'];
        require_once Yii::getAlias('@vendor/aliyun/aliyun.php');
        $client = OSSClient::factory(array(
            'AccessKeyId' => 'EKsdkziqEfwr4IBm',
            'AccessKeySecret' => 'QgZ4AILAZSXhO9qGwT0kVwScpBnJO8',
        ));
        $client->putObject(array(
            'Bucket' => 'yiipic',
            'Key'=>pathinfo($post)['basename'],
            'Content' => fopen('.'.$post, 'r'),
            'ContentLength'=> filesize('.'.$post),
            //'ContentType'=>'image/jpeg'
        ));
        return 'http://yiipic.xiuyun99.com/'.$key.'@100w_100h_90Q.'.$ext;
    }

}