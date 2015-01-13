<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/30
 * Time: 15:34
 */?>
@extends('layout.master')
@section('content')
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
@stop
