<?php
namespace yii\widgets\views;

use yii;
?>
<div class="form-group">
    <?= $model->getAttributeLabel($name)?>
    <script id="container" name="<?= ucfirst($model->tableName())?>[<?= $name?>]" type="text/plain">
	        <?= $model->$name;?>
    </script>
</div>
<!-- 配置文件 -->
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>