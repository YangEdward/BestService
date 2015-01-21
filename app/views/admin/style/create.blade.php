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
    {{{ '样式管理->添加' }}}
@stop
@section('styles')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ '样式管理->添加' }}}
        </h3>
    </div>
    <div class="container row">
        <form id="defaultForm" class="form-horizontal" method="post" action="{{action("StyleController@store")}}">
            <div class="form-group">
                <label for="title" class="col-md-2 control-label">标题：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="title" name="title" placeholder="请输入您的姓名或者称呼"
                           value="{{ Input::old('title') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="components_id" class="col-md-2 control-label">所属类型：</label>
                <div class="col-md-6">
                    <select class="form-control" id="components_id" name="components_id">
                        <option value="1">Android</option>
                        <option value="2">Ios</option>
                        <option value="3">Web</option>
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
                           value="{{ Input::old('price') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="descriptions" class="col-md-2 control-label">描述：</label>
                <div class="col-md-6">
                    <textarea type="text" class="form-control" id="descriptions" name="descriptions" placeholder="简单介绍信息"
                              rows="6">{{ Input::old('descriptions') }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" id="pic_path" name="pic_path" value="">
            </div>

            <div class="form-group">
                <label for="inputFile" class="col-md-2 control-label">样式文件上传：</label>
                <div class="col-md-6">
                    @plupload()
                   {{-- <input type="file" id="inputFile" name="inputFile">--}}
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
                            notEmpty: {
                                message: '价格不可为空哦'
                            },
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
                                message: '上传样式展示效果文件'
                            }
                        }
                    }
                }
            });
        });
    </script>
@stop