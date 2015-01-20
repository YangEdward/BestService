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
        <form id="defaultForm" class="form-horizontal" method="post" action="{{URL::to("/admin/style/update", $model->id)}}">
            <div class="form-group">
                <label for="title" class="col-md-2 control-label">标题：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="title" name="title" placeholder="请输入您的姓名或者称呼"
                           value="{{ $model->title }}">
                </div>
            </div>
            <div class="form-group">
                <label for="components_id" class="col-md-2 control-label">所属类型：</label>
                <div class="col-md-6">
                    <select class="form-control" id="components_id" name="components_id">
                        <option value="Android">Android</option>
                        <option value="Ios">Ios</option>
                        <option value="Web">Web</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="min_api" class="col-md-2 control-label">Api限制：</label>
                <div class="col-md-6">
                    <select class="form-control" id="min_api" name="min_api">
                        @for($i= 8;$i<22;$i++)
                            <option value="{{{$i}}}">{{{$i}}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="col-md-2 control-label">价格：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="price" name="price" placeholder="请输入您的姓名或者称呼"
                           value="{{ $model->price }}">
                </div>
            </div>
            <div class="form-group">
                <label for="descriptions" class="col-md-2 control-label">描述：</label>
                <div class="col-md-6">
                    <textarea type="text" class="form-control" id="descriptions" name="descriptions" placeholder="简单介绍信息"
                              rows="6">{{ $model->descriptions }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="inputFile" class="col-md-2 control-label">样式文件上传：</label>
                <div class="col-md-6">
                    <input type="file" id="inputFile" name="inputFile">
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
                    title: {
                        validators: {
                            notEmpty: {
                                message: '标题不可为空哦'
                            },
                            stringLength: {
                                max: 100,
                                message: '地址信息过长哦，莫超过100个汉字或字符'
                            }
                        }
                    },
                    price: {
                        validators: {
                            integer: {
                                message: '需写入整数哦'
                            }
                        }
                    },
                    descriptions: {
                        validators: {
                            notEmpty: {
                                message: '描述不可为空哦'
                            },
                            stringLength: {
                                max: 300,
                                message: '描述限制300汉字哦'
                            }
                        }
                    },

                    inputFile: {
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