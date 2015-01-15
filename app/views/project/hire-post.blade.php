@extends('layout.master')
@section('content')
    {{ HTML::script('/dist/js/formValidation.min.js') }}
    {{ HTML::script('/dist/js/framework/bootstrap.min.js') }}


    <h3 class="text-center"><strong>项目信息提交</strong></h3>
    <p>请将您要提交的项目信息填写完整，便于优服科技给您提供更加优质的项目开发和管理服务。</p>
    <form class="form-horizontal" method="post" action="/" novalidate>
        <div class="form-group @if ($errors->has('title')) has-error @endif">
            <label for="title" class="col-md-2 control-label">项目名称：</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="title" name="title" placeholder="请输入项目名称"
                       value="{{ Input::old('title') }}">
                @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
            </div>
        </div>
        <div class="form-group">
            <label for="belong" class="col-md-2 control-label">项目概述：</label>
            <div class="col-md-6">
                <textarea type="text" class="form-control" id="description"
                          placeholder="请输入项目概述" rows="6"></textarea>
            </div>
        </div>
        <div class="form-group @if ($errors->has('name')) has-error @endif">
            <label for="name" class="col-md-2 control-label">您的称呼：</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="name" placeholder="请问您怎么称呼？"
                       value="{{ Input::old('name') }}" name="name">
                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>
        </div>

        <div class="form-group @if ($errors->has('inputEmail')) has-error @endif">
            <label for="inputEmail" class="col-md-2 control-label">邮箱：</label>
            <div class="col-md-6">
                <input type="email" class="form-control" id="inputEmail" placeholder="请输入您的邮箱地址"
                       value="{{ Input::old('inputEmail') }}" name="name">
                @if ($errors->has('inputEmail')) <p class="help-block">{{ $errors->first('inputEmail') }}</p> @endif
            </div>
        </div>
        <div class="form-group @if ($errors->has('phone')) has-error @endif">
            <label for="phone" class="col-md-2 control-label">联系方式：</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="phone" placeholder="请输入您的联系方式,最好是手机号码"
                value="{{ Input::old('phone') }}" name="name">
                @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
            </div>
        </div>
        <div class="form-group">
            <label for="finishTime" class="col-md-2 control-label">项目计划完成时间：</label>
            <div class="col-md-6">
                <input type="date" class="form-control" id="finishTime">
            </div>
        </div>
        <div class="form-group @if ($errors->has('inputFile')) has-error @endif">
            <label for="inputFile" class="col-md-2 control-label">项目需求文件上传：</label>
            <div class="col-md-6">
                <input type="file" id="inputFile" name="inputFile">
                @if ($errors->has('inputFile'))
                    <p class="help-block">{{ $errors->first('inputFile') }}</p>
                @else <p class="help-block">需求请尽可能详细，</p>
                @endif
            </div>
        </div>
        <button type="submit" class="col-md-offset-2 btn btn-success">点击这里提交</button>
    </form>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="page-header">
                    <h2>Bootstrap Form</h2>
                </div>

                <form id="defaultForm" method="post" class="form-horizontal" action="target.php">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Full name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="firstName" placeholder="First name" />
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lastName" placeholder="Last name" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="username" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email address</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" value="male" /> Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" value="female" /> Female
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" value="other" /> Other
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" id="captchaOperation"></label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="captcha" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="agree" value="agree" /> Agree with the terms and conditions
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // Generate a simple captcha
            function randomNumber(min, max) {
                return Math.floor(Math.random() * (max - min + 1) + min);
            };
            $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

            $('#defaultForm').formValidation({
                message: 'This value is not valid',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    firstName: {
                        row: '.col-sm-4',
                        validators: {
                            notEmpty: {
                                message: 'The first name is required'
                            }
                        }
                    },
                    lastName: {
                        row: '.col-sm-4',
                        validators: {
                            notEmpty: {
                                message: 'The last name is required'
                            }
                        }
                    },
                    username: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The username is required'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: 'The username must be more than 6 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: 'The username can only consist of alphabetical, number, dot and underscore'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required'
                            },
                            emailAddress: {
                                message: 'The input is not a valid email address'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            },
                            different: {
                                field: 'username',
                                message: 'The password cannot be the same as username'
                            }
                        }
                    },
                    gender: {
                        validators: {
                            notEmpty: {
                                message: 'The gender is required'
                            }
                        }
                    },
                    captcha: {
                        validators: {
                            callback: {
                                message: 'Wrong answer',
                                callback: function(value, validator, $field) {
                                    var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                                    return value == sum;
                                }
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'You must agree with the terms and conditions'
                            }
                        }
                    }
                }
            });
        });
    </script>
@stop