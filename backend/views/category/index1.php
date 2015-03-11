<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pid',
            'cname',
            'status',
            'created_at',

            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {create} {article}',
                'buttons'=>[
                    'create' => function ($url, $model, $key) {
                                 return  Html::a('添加子类', $url);
                             },
                    'view' => function ($url, $model, $key) {
                                  return  Html::a('查看', $url);
                              },
                    'update' => function ($url, $model, $key) {
                                  return  Html::a('更新', $url);
                              },
                    'delete' => function ($url, $model, $key) {
                        return  Html::a('删除', $url);
                    },
                    'article' => function ($url, $model, $key) {
                        return  Html::a('文章管理', '/article/index?id='.$key);
                    }
                ],


            ],
        ],
    ]); */?>
    <table class="table table-bordered">
        <tr><td>id</td><td>名称</td><td>操作</td></tr>
        <?php
        echo $categoryTree;
        ?>
    </table>


</div>

