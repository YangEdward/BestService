@extends('admin.layout.form')
{{-- Web site Title --}}
@section('title')
    {{{ '样式管理' }}}
@stop
@section('styles')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ '样式管理' }}}

            <div class="pull-right">
                <a href="{{{ URL::to('admin/style/create') }}}" class="btn btn-small btn-info"><span class="glyphicon glyphicon-plus"></span> 添加样式</a>
            </div>
        </h3>
    </div>

        <div class="container-fluid table-responsive">
            <table id="users" class="table table-striped table-hover">
                {{--<thead>--}}
                <tr class="row">
                    <th class="col-md-1">{{{ Lang::get('admin/style.id') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/style.base_infor') }}}</th>
                    <th class="col-md-7">{{{ Lang::get('admin/style.detail_infor') }}}</th>
                    <th class="col-md-2 text-center">{{{ Lang::get('table.actions') }}}</th>
                </tr>
                {{--</thead>
                <tbody>--}}
                @foreach($models as $model)
                    <tr class="row">
                        <td class="col-md-1">{{$model->id}}</td>
                        <td class="col-md-2">
                            <p>{{{ Lang::get('admin/style.components_name').' : '.$model->Component->name}}}</p>
                            <p>{{{ Lang::get('admin/style.min_api').' : '.$model->min_api }}}</p>
                            <p>{{{ Lang::get('admin/style.price').' : '.$model->price }}}</p>
                            <p>{{{ Lang::get('admin/style.use_times').' : '.$model->use_times }}}</p>
                        </td>
                        <td class="col-md-7">
                            <p>{{{ Lang::get('admin/style.title').' : '.$model->title }}}</p>
                            <p>{{{ Lang::get('admin/style.descriptions').' : '.$model->descriptions }}}</p></td>
                        <td class="col-md-1 col-md-offset-1 text-center">
                            <a href="{{{ URL::to('admin/style/edit',$model->id) }}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td class="col-md-1">
                            <a href="{{{ URL::to('admin/style/destroy',$model->id) }}}" class="btn btn-link">
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