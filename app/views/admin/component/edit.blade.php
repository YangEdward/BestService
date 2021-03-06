@extends('admin.layout.form')
@section('title')
    {{{ '类型管理->编辑' }}}
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ '类型管理->编辑' }}}
        </h3>
    </div>
    <div class="row">
        <form id="defaultForm" class="form-horizontal" method="post" action="{{action('ComponentController@update', $model->id)}}">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="chinese_name" class="col-md-2 control-label">中文名称：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="chinese_name" name="chinese_name"
                           value="{{ $model->chinese_name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="english_name" class="col-md-2 control-label">英文名称：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="english_name" name="english_name"
                           value="{{ $model->english_name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="belongs" class="col-md-2 control-label">属于：</label>
                <div class="col-md-6">
                    <select class="form-control" id="belongs" name="belongs">
                        <option value="Android">Android</option>
                        <option value="Ios">Ios</option>
                        <option value="Web">Web</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="icon" class="col-md-2 control-label fa {{ $model->icon }}">  图标名称：</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="icon" name="icon"
                           value="{{ $model->icon }}">
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
                <button type="submit" class="col-md-offset-4 btn btn-success">点击这里更新</button>
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
                    chinese_name: {
                        //row: '.col-md-6',
                        validators: {
                            notEmpty: {
                                message: '名称不可为空哦'
                            },
                            stringLength: {
                                max: 36,
                                message: '长度限制36哦'
                            }
                        }
                    },
                    english_name: {
                        //row: '.col-md-6',
                        validators: {
                            notEmpty: {
                                message: '名称不可为空哦'
                            },
                            stringLength: {
                                max: 36,
                                message: '长度限制36哦'
                            }
                        }
                    },
                    icon: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: '图标名称不可为空哦'
                            },
                            stringLength: {
                                max: 36,
                                message: '长度限制36哦'
                            }
                        }
                    },
                    descriptions: {
                        validators: {
                            notEmpty: {
                                message: '描述不可为空'
                            },
                            stringLength: {
                                max: 300,
                                message: '长度限制300哦'
                            }
                        }
                    }
                }
            });
        });
    </script>
@stop