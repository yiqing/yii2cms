<?php

namespace backend\controllers;

use Yii;
use backend\models\Category;
use backend\models\CategorySearch;
use common\lib\tree;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $tree = new tree();
        $searchModel = new CategorySearch();
        $categoryList = $searchModel->categoryList();
        $tree->init($categoryList);

        $str=<<<Eof
        <tr>
            <td>\$id</td>
            <td> \$spacer\$cname</td>
            <td>
                <a href='/category/create?id=\$id'>添加子类</a> |
                <a href='/category/update?id=\$id'>更新</a> |
                <a href='/category/delete?id=\$id'>删除</a> | 
                <a href='/article/index?id=\$id'>内容管理</a>
            </td>
        </tr>
Eof;
        $categoryTree = $tree->get_tree(0,$str);
        return $this->render('index',[
            'categoryTree'=>$categoryTree
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new CategorySearch();
      //  $data = $searchModel->findcate();
        $getArticles = Category::findOne(Yii::$app->request->get('id'));
        return $this->render('view', [
            'model' => $this->findModel($id),
            'article' =>$getArticles->articles,
          //  'data'=> $data
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Category();
        $model->created_at = time();
        $model->updated_at = time();
        $model->parentid = $request->get('id');

        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
