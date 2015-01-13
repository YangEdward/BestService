<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/30
 * Time: 15:34
 */?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/my-web.css') }}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>欢迎登录</title>

</head>
<body>

<div>

    <div class="input-group margin-bottom-sm login-edittext">
        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
        <input class="form-control" type="text" placeholder="Email address">
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
        <input class="form-control" type="password" placeholder="Password">
    </div>

    <div>
        <button class="btn-default">注册</button>
        <button class="btn-success">登录</button>
    </div>
</div>

{{ HTML::script('js/jquery-2.1.3.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>