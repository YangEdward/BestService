<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Logo</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="/">首页 <span class="sr-only">(current)</span></a></li>
                <li {{ (Request::is('admin') ? ' class="active"' : '') }}><a href="/admin">登录</a></li>
                <li {{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="/admin/users">用户管理</a></li>
                <li {{ (Request::is('admin/main-class*') ? ' class="active"' : '') }}{{ (Request::is('admin/component*') ? ' class="active"' : '') }}   ><a href="/admin/main-class">类型管理</a></li>
                <li {{ (Request::is('admin/style*') ? ' class="active"' : '') }}><a href="/admin/style">样式管理</a></li>
                <li {{ (Request::is('admin/customer*') ? ' class="active"' : '') }}><a href="/admin/customer">客户项目管理</a></li>
                <li {{ (Request::is('admin/staff*') ? ' class="active"' : '') }}><a href="/admin/staff">合伙项目管理</a></li>
                <li {{ (Request::is('admin/process*') ? ' class="active"' : '') }}><a href="/admin/process">项目进程管理</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>