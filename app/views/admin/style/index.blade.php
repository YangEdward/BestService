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
                <a href="{{{ action('StyleController@create') }}}" class="btn btn-small btn-info"><span class="glyphicon glyphicon-plus"></span> 添加样式</a>
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
                            <p>{{ Lang::get('admin/style.components_name').' : '.$model->chineseName()}}</p>
                            <p>{{{ Lang::get('admin/style.min_api').' : '.$model->min_api }}}</p>
                            <p>{{{ Lang::get('admin/style.price').' : '.$model->price }}}</p>
                            <p>{{{ Lang::get('admin/style.use_times').' : '.$model->use_times }}}</p>
                        </td>
                        <td class="col-md-7">
                            <p>{{{ Lang::get('admin/style.title').' : '}}}<a href="/uploads/{{{$model->pic_path}}}" >{{{$model->title }}}</a></p>
                            <p>{{{ Lang::get('admin/style.descriptions').' : '.$model->descriptions }}}</p></td>
                        <td class="col-md-1 col-md-offset-1 text-center">
                            <a href="{{{ action('StyleController@edit',$model->id) }}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td class="col-md-1">
                            {{ Form::open(array('url' => action('StyleController@destroy', $model->id)))}}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span></button>
                            {{ Form::close() }}
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