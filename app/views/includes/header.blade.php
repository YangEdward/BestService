<script>
    $(function(){
        $('#bs-example-navbar-collapse-1 ul li a').click(function(){
            $(this).addClass('active');
        })
    })
</script>

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
                <li {{ (Request::is('product/show') ? ' class="active"' : '') }}><a href="/product/show">产品展示</a></li>
                <li {{ (Request::is('project/hire-post') ? ' class="active"' : '') }}><a href="/project/hire-post">雇佣我们</a></li>
                <li {{ (Request::is('about-us') ? ' class="active"' : '') }}><a href="/about-us">关于我们</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
