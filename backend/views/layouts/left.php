<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/static/img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, Jane</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>系统</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" <?php if(Yii::$app->requestedAction->controller->id=='sys'):?>style="display: block;"<?php endif;?>>
                    <li <?php if(Yii::$app->requestedAction->id=='dashboard'):?> class="active" <?php endif;?> ><a href="/sys/dashboard"><i class="fa fa-angle-double-right"></i> 系统</a></li>
                    <li <?php if(Yii::$app->requestedAction->id=='set'):?> class="active" <?php endif;?> ><a href="/sys/set"><i class="fa fa-angle-double-right"></i> 设置</a></li>

                </ul>
            </li>
            <li class="active">
                <a href="/models/index">
                    <i class="fa fa-dashboard"></i> <span>模型</span>
                </a>
            </li>

            <li>
                <a href="/category/index">
                    <i class="fa fa-th"></i> <span>分类</span> <small class="badge pull-right bg-green">new</small>
                </a>
            </li>
            <li>
                <a href="/article/index">
                    <i class="fa fa-th"></i> <span>文章</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>