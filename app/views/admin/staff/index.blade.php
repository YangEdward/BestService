@extends('admin.layout.form')
{{-- Web site Title --}}
@section('title')
    {{{ $title }}}
@stop
@section('styles')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ $title }}}

            <div class="pull-right">
                <a href="{{{ URL::to('admin/users/create') }}}" class="btn btn-small btn-info"><span class="glyphicon glyphicon-plus"></span> 添加用户</a>
            </div>
        </h3>
    </div>

        <div class="container-fluid table-responsive">
            <table id="users" class="table table-striped table-hover">
                {{--<thead>--}}
                <tr class="row">
                    <th class="col-md-1">{{{ Lang::get('admin/users.id') }}}</th>
                    <th class="col-md-1">{{{ Lang::get('admin/users.name') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/users.email') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/users.telphone') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/users.created_at') }}}</th>
                    <th class="col-md-4 text-center">{{{ Lang::get('table.actions') }}}</th>
                </tr>
                {{--</thead>
                <tbody>--}}
                @foreach($models as $model)
                    <tr class="row">
                        <td class="col-md-2">{{$model->id}}</td>
                        <td class="col-md-2">{{$model->name}}</td>
                        <td class="col-md-2">{{$model->email}}</td>
                        <td class="col-md-2">{{$model->telphone}}</td>
                        <td class="col-md-2">{{$model->created_at}}</td>
                        <td class="col-md-1 col-md-offset-1 text-center">
                            <a href="{{{ URL::to('admin/users/show',array('id'=>$model->id)) }}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                        </td>
                        <td class="col-md-1">
                            <a href="{{{ URL::to('admin/users/edit',$model->id) }}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td class="col-md-1">
                            <a href="{{{ URL::to('admin/users/destroy',$model->id) }}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                {{--</tbody>--}}
            </table>
            <div class="text-right">{{$models->links()}}</div>
        </div>
@stop
{{-- Scripts --}}
@section('scripts')

@stop