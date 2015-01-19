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
@section('content')
    <div class="page-header">
        <h3>
            {{{ '用户管理->编辑' }}}
        </h3>
    </div>
    <div class="row">
        <form id="defaultForm" class="form-horizontal" method="post" action="{{action("UserController@update", $model->id)}}">
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">姓名：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="请输入您的姓名或者称呼"
                           value="{{ Input::old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-md-2 control-label">姓名：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="email" name="email" placeholder="请输入您的邮箱"
                           value="{{ Input::old('email') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="telphone" class="col-md-2 control-label">姓名：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="telphone" name="telphone" placeholder="请输入您的联系方式"
                           value="{{ Input::old('telphone') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tencent" class="col-md-2 control-label">姓名：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="tencent" name="tencent" placeholder="请输入您的社交QQ"
                           value="{{ Input::old('tencent') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="area" class="col-md-2 control-label">姓名：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="area" name="area" placeholder="敢问阁下来自哪里？"
                           value="{{ Input::old('area') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="company" class="col-md-2 control-label">姓名：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="company" name="company" placeholder="阁下任职于那个单位？"
                           value="{{ Input::old('company') }}">
                </div>
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
                                message: '项目标题至少需要6个汉字'
                            },
                            stringLength: {
                                min: 6,
                                message: '项目标题至少需要6个汉字'
                            }
                        }
                    },
                    password: {
                        //row: '.col-md-6',
                        validators: {
                            stringLength: {
                                max: 300,
                                message: '项目描述内容不可超过300字'
                            }
                        }
                    },
                    conform_password: {
                        //row: '.col-md-6',
                        validators: {
                            stringLength: {
                                max: 300,
                                message: '项目描述内容不可超过300字'
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