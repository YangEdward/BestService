@extends('admin.layout.form')
{{-- Web site Title --}}
@section('title')
    {{{ '用户管理->信息查看' }}}
@stop
@section('styles')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ '用户管理->信息查看' }}}
        </h3>
    </div>

    <div class="container-fluid row">
        <h4 class="text-primary"><strong>{{{ Lang::get('admin/users.id') }}} : </strong>{{$model->id}}</h4>
        <h4 class="text-primary"><strong>{{{ Lang::get('admin/users.name') }}} : </strong>{{$model->name}}</h4>
        <h4 class="text-primary"><strong>{{{ Lang::get('admin/users.email') }}} : </strong>{{$model->email}}</h4>
        <h4 class="text-primary"><strong>{{{ Lang::get('admin/users.tencent') }}} : </strong>{{$model->tencent}}</h4>
        <h4 class="text-primary"><strong>{{{ Lang::get('admin/users.telphone') }}} : </strong>{{$model->telphone}}</h4>
        <h4 class="text-primary"><strong>{{{ Lang::get('admin/users.area') }}} : </strong>{{$model->area}}</h4>
        <h4 class="text-primary"><strong>{{{ Lang::get('admin/users.company') }}} : </strong>{{$model->company}}</h4>
        <h4 class="text-primary"><strong>{{{ Lang::get('admin/users.created_at') }}} : </strong>{{$model->created_at}}</h4>
        <h4 class="text-primary"><strong>{{{ Lang::get('admin/users.updated_at') }}} : </strong>{{$model->updated_at}}</h4>
    </div>
@stop
{{-- Scripts --}}
@section('scripts')

@stop