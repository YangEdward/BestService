@extends('layout.form')
@section('content')
    <h3 class="text-center"><strong>项目信息提交</strong></h3>
    <p>请将您要提交的项目信息填写完整，便于优服科技给您提供更加优质的项目开发和管理服务。</p>
    <div class="row">
        <form id="defaultForm" method="post" class="form-horizontal" action="/">
            <div class="form-group">
                <label for="title" class="col-md-2 control-label">项目名称：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="title" name="title" placeholder="请输入项目名称"
                           value="{{ Input::old('title') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">项目类型：</label>
                    <div class="col-md-2">
                        <label>
                            <input type="checkbox" name="belong" value="android" /> Android应用
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label>
                            <input type="checkbox" name="belong" value="ios" /> Ios应用
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label>
                            <input type="checkbox" name="belong" value="web" /> Web应用
                        </label>
                    </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">项目概述：</label>
                <div class="col-md-6">
                    <textarea type="text" class="form-control" id="description" name="description"
                      placeholder="请输入项目概述" rows="6" value="{{ Input::old('description') }}"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-md-2 control-label">您的称呼：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="name" placeholder="请问您怎么称呼？"
                           value="{{ Input::old('name') }}" name="name">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-2 control-label">邮箱：</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" id="email" placeholder="请输入您的邮箱地址"
                           value="{{ Input::old('email') }}" name="email">
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-md-2 control-label">联系方式：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="phone" placeholder="请输入您的联系方式,最好是手机号码"
                           value="{{ Input::old('phone') }}" name="phone">
                </div>
            </div>

            <div class="form-group">
                <label for="finishTime" class="col-md-2 control-label">项目计划完成时间：</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="finishTime">
                </div>
            </div>

            <div class="form-group">
                <label for="inputFile" class="col-md-2 control-label">项目需求文件上传：</label>
                <div class="col-md-6">
                    <input type="file" id="inputFile" name="inputFile">
                    @if ($errors->has('inputFile'))
                        <p class="help-block">{{ $errors->first('inputFile') }}</p>
                    @else <p class="help-block">需求请尽可能详细，</p>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="agree" value="agree" />同意我公司合作协议。
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                    <button type="submit" class="col-md-offset-4 btn btn-success">点击这里提交</button>
            </div>
        </form>
    </div>
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
                    description: {
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
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: '请同意我们的合作协议'
                            }
                        }
                    }
                }
            });
        });
    </script>
@stop