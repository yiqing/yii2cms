<?php

namespace backend\controllers;

use Yii;
use backend\models\Category;
use backend\models\Article;
use common\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \Aliyun\OSS\OSSClient;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {

        $categoryObject = Category::findOne(Yii::$app->request->get('id'));
        return $this->render('index', [

            'article' =>$categoryObject->articles,

        ]);
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //require_once Yii::getAlias('@vendor/johnlui/aliyun-oss/oss/aliyun.php');
        require_once Yii::getAlias('@vendor/aliyun/aliyun.php');
        $client = OSSClient::factory(array(
            'AccessKeyId' => 'EKsdkziqEfwr4IBm',
            'AccessKeySecret' => 'QgZ4AILAZSXhO9qGwT0kVwScpBnJO8',
        ));
        $objectListing = $client->listObjects(array(
            'Bucket' => 'yiipic',
        ));
        $pics='';
        foreach ($objectListing->getObjectSummarys() as $objectSummary) {
            $pics.= "<img src='http://yiipic.xiuyun99.com/".$objectSummary->getKey()."@100w_100h_90Q.png' />";
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'pics'=>$pics
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $model->category_id = Yii::$app->request->get('category_id');
        $model->created_at = date('Y-m-d H:i:s');
        $model->updated_at = date('Y-m-d H:i:s');
        $model->user_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
