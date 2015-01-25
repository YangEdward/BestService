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
    {{{ '客户项目管理->编辑' }}}
@stop
@section('styles')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ '客户项目管理->编辑' }}}
        </h3>
    </div>
    <div class="row">
        <form id="defaultForm" method="post" class="form-horizontal" action="{{URL::to("/admin/customer/update", $model->id)}}">
            <div class="form-group">
                <label for="title" class="col-md-2 control-label">项目名称：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="title" name="title" placeholder="请输入项目名称"
                           value="{{ $model->title }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">项目类型：</label>
                <div class="col-md-2">
                    <label>
                        <input type="checkbox" name="belong1" value="android" /> Android应用
                    </label>
                </div>
                <div class="col-md-2">
                    <label>
                        <input type="checkbox" name="belong2" value="ios" /> Ios应用
                    </label>
                </div>
                <div class="col-md-2">
                    <label>
                        <input type="checkbox" name="belong3" value="web" /> Web应用
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="brief" class="col-md-2 control-label">项目概述：</label>
                <div class="col-md-6">
                    <textarea type="text" class="form-control" id="brief" name="brief"
                              placeholder="请输入项目概述" rows="6">{{ $model->brief }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="user_name" class="col-md-2 control-label">您的称呼：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="user_name" placeholder="请问您怎么称呼？"
                           value="{{ $model->user_name }}" name="user_name">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-2 control-label">邮箱：</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" id="email" placeholder="请输入您的邮箱地址"
                           value="{{ $model->email }}" name="email">
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-md-2 control-label">联系方式：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="phone" placeholder="请输入您的联系方式,最好是手机号码"
                           value="{{ $model->phone }}" name="phone">
                </div>
            </div>

            <div class="form-group">
                <label for="finished_times" class="col-md-2 control-label">项目计划完成时间：</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="finished_times" name="finished_times" value="{{$model->finished_times}}">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="col-md-offset-4 btn btn-success">点击这里提交</button>
            </div>
        </form>
    </div>
@stop

@section('foot_script')
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
                    title: {
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
                    brief: {
                        //row: '.col-md-6',
                        validators: {
                            stringLength: {
                                max: 300,
                                message: '项目描述内容不可超过300字'
                            }
                        }
                    },
                    user_name: {
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

                    phone: {
                        validators: {
                            notEmpty: {
                                message: '请填写您的联系方式'
                            },
                            regexp: {
                                regexp: /^[0-9\-]+$/,
                                message: '联系方式格式错误'
                            }
                        }
                    },
                    belong: {
                        validators: {
                            notEmpty: {
                                message: '请选择项目类型'
                            }
                        }
                    }
                }
            });
        });
    </script>
@stop