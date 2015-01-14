@extends('layout.master')
@section('content')
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
@stop