<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 13:54
 */
?>
@extends('admin.layout.form')
@section('title')
    {{{ '用户管理->添加' }}}
@stop
@section('styles')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ '用户管理->添加' }}}
        </h3>
    </div>
    <div class="container row">
        <form id="defaultForm" class="form-horizontal" method="post" action="{{action("UserController@store")}}">
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">姓名：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="请输入您的姓名或者称呼"
                           value="{{ Input::old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-md-2 control-label">邮箱：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="email" name="email" placeholder="请输入您的邮箱"
                           value="{{ Input::old('email') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-2 control-label">密码：</label>
                <div class="col-md-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="请输入您的密码"
                           value="{{ Input::old('password') }}">
                </div>
                <div class="col-md-3">
                    <input type="password" class="form-control" id="conform_password" name="conform_password" placeholder="请确认密码">
                </div>
            </div>
            <div class="form-group">
                <label for="telphone" class="col-md-2 control-label">联系方式：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="telphone" name="telphone" placeholder="请输入您的联系方式"
                           value="{{ Input::old('telphone') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tencent" class="col-md-2 control-label">QQ：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="tencent" name="tencent" placeholder="请输入您的社交QQ"
                           value="{{ Input::old('tencent') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="area" class="col-md-2 control-label">您住在哪里：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="area" name="area" placeholder="敢问阁下来自哪里？"
                           value="{{ Input::old('area') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="company" class="col-md-2 control-label">单位名称：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="company" name="company" placeholder="阁下任职于那个单位？"
                           value="{{ Input::old('company') }}">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="col-md-offset-4 btn btn-success">点击这里提交</button>
            </div>
        </form>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // Generate a simple captcha

            $('#defaultForm').formValidation({
                framework: 'bootstrap',
                message: 'This value is not valid',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    area: {
                        validators: {
                            notEmpty: {
                                message: '请填写您的地址'
                            },
                            stringLength: {
                                max: 20,
                                message: '地址信息过长哦，莫超过20个汉字或字符'
                            }
                        }
                    },
                    password: {
                        //row: '.col-md-6',
                        validators: {
                            notEmpty: {
                                message: '密码不可为空'
                            },
                            stringLength: {
                                min: 6,
                                max: 20,
                                message: '密码长度要求6-20'
                            }
                        }
                    },
                    conform_password: {
                        //row: '.col-md-6',
                        validators: {
                            identical: {
                                field: 'password',
                                message: '确认密码与密码不一致'
                            }
                        }
                    },
                    name: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: '请填写您的称呼'
                            },
                            stringLength: {
                                max: 20,
                                message: '称呼过长哦'
                            }

                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: '请填写您的邮箱地址'
                            },
                            emailAddress: {
                                message: '请检查邮箱地址，格式是否正确。'
                            }
                        }
                    },

                    telphone: {
                        validators: {
                            notEmpty: {
                                message: '请填写您的联系方式'
                            },
                            regexp: {
                                regexp: /^[0-9\-]+$/,
                                message: '联系方式格式错误'
                            }
                        }
                    }
                }
            });
        });
    </script>
@stop