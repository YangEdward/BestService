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
    {{{ '用户管理->编辑' }}}
@stop
@section('styles')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ '用户管理->编辑' }}}
        </h3>
    </div>
    <div class="row">
        <form id="defaultForm" class="form-horizontal" method="post" action="{{URL::to("/admin/users/update", $model->id)}}">
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">姓名：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="请输入您的姓名或者称呼"
                           value="{{ $model->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-md-2 control-label">邮箱：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="email" name="email" placeholder="请输入您的邮箱"
                           value="{{ $model->email }}">
                </div>
            </div>
            <div class="form-group">
                <label for="telphone" class="col-md-2 control-label">联系方式：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="telphone" name="telphone" placeholder="请输入您的联系方式"
                           value="{{ $model->telphone }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tencent" class="col-md-2 control-label">QQ：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="tencent" name="tencent" placeholder="请输入您的社交QQ"
                           value="{{ $model->tencent }}">
                </div>
            </div>
            <div class="form-group">
                <label for="area" class="col-md-2 control-label">您住在哪里：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="area" name="area" placeholder="敢问阁下来自哪里？"
                           value="{{ $model->area }}">
                </div>
            </div>
            <div class="form-group">
                <label for="company" class="col-md-2 control-label">单位名称：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="company" name="company" placeholder="阁下任职于那个单位？"
                           value="{{ $model->company }}">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="col-md-offset-4 btn btn-success">点击这里更新</button>
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