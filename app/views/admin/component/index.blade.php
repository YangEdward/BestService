@extends('admin.layout.form')
{{-- Web site Title --}}
@section('title')
    {{{ '类型管理' }}}
@stop
@section('styles')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ '类型管理' }}}

            <div class="pull-right">
                <a href="{{{ URL::to('admin/main-class/create') }}}" class="btn btn-small btn-info"><span class="glyphicon glyphicon-plus"></span> 添加控件类型</a>
            </div>
        </h3>
    </div>

        <div class="container-fluid table-responsive">
            <table id="users" class="table table-striped table-hover">
                {{--<thead>--}}
                <tr class="row">
                    <th class="col-md-1">{{{ Lang::get('admin/component.id') }}}</th>
                    <th class="col-md-1">{{{ Lang::get('admin/component.chinese_name') }}}</th>
                    <th class="col-md-1">{{{ Lang::get('admin/component.belongs') }}}</th>
                    <th class="col-md-5">{{{ Lang::get('admin/component.descriptions') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/users.created_at') }}}</th>
                    <th class="col-md-2 text-center">{{{ Lang::get('table.actions') }}}</th>
                </tr>
                {{--</thead>
                <tbody>--}}
                @foreach($models as $model)
                    <tr class="row">
                        <td class="col-md-1">{{$model->id}}</td>
                        <td class="col-md-1"><i class="fa {{$model->icon}}"></i>  {{$model->chinese_name}}</td>
                        <td class="col-md-1">{{$model->belongs}}</td>
                        <td class="col-md-5">{{$model->descriptions}}</td>
                        <td class="col-md-2">{{$model->created_at}}</td>
                        <td class="col-md-1">
                            <a href="{{{ URL::to('admin/component/edit',$model->id) }}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td class="col-md-1">
                            <a href="{{{ URL::to('admin/component/destroy',$model->id) }}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                {{--</tbody>--}}
            </table>
        </div>
@stop
{{-- Scripts --}}
@section('scripts')

@stop