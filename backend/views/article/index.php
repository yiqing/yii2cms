<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Article'), ['create?category_id='.Yii::$app->request->get('id')], ['class' => 'btn btn-success']) ?>
    </p>



</div>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
       <th><a href="" data-sort="id">ID</a></th><th><a href="" data-sort="pid">Pid</a></th><th><a href="" data-sort="cname">title</a></th><th><a href="" data-sort="status">Status</a></th><th><a href="" data-sort="created_at">Created At</a></th><th>&nbsp;</th>
    </tr>

    </thead>
    <tbody>


<?php foreach($article as $v):?>
    <tr>
        <td><?= $v['id']?></td><td><?= $v['category_id']?></td><td><?= $v['title']?></td><td><?= $v['id']?></td><td><?= $v['created_at']?></td>
        <td>
            <a href="/article/view?id=<?= $v['id']?>" >查看</a> |
            <a href="/article/update?id=<?= $v['id']?>" >更新</a> |
            <a href="/article/delete">删除</a>
        </td>
    </tr>
<?php endforeach;?>
    </tbody>
</table>

