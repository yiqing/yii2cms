<?php

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

?>
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="/static/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="/static/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/static/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="/yxsss/js_css/yu.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    <div class="header">后台入口</div>

        <?php $form = ActiveForm::begin(['id' => 'myForm']); ?>

        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="LoginForm[username]" class="form-control" placeholder="username"/>
            </div>
            <div class="form-group">
                <input type="password" name="LoginForm[password]" class="form-control" placeholder="Password"/>
            </div>
            <div class="form-group">
                <input type="checkbox" name="LoginForm[remember_me]"/> Remember me
            </div>
        </div>
        <div class="footer">
           <!-- <button type="submit" class="btn bg-olive btn-block">Sign me in</button>-->
            <button class="btn bg-olive btn-block"onclick="save()">
                <span class="button-content" >登陆</span>
            </button>

            <p><a href="#">I forgot my password</a></p>

            <a href="register.html" class="text-center">Register a new membership</a>
        </div>
    </form>

    <div class="margin text-center">
        <span>Sign in using social networks</span>
        <br/>
        <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
        <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
        <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

    </div>
</div>


<!-- jQuery 2.0.2 -->
<script src="/js/jquery.js"></script>
<!-- Bootstrap -->
<script src="/static/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/jquery.form.js" type="text/javascript"></script>

<script src="/yxsss/js_css/yu.js" type="text/javascript"></script>
<script type="text/javascript">
    function save() {
        $('#myForm').ajaxForm(function(data){
            if(data.status==1){
                ui.error(data.msg,1000);
            }
            else{
                ui.success(data.msg,1000);
               window.location.href = '<?= Url::toRoute('sys/dashboard')?>'
            }
        })
    }
</script>

</body>
</html>