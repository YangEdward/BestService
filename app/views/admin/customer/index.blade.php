@extends('admin.layout.form')
{{-- Web site Title --}}
@section('title')
    {{{ '客户项目管理->预览' }}}
@stop
@section('styles')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="page-header">
        <h3>
            {{{ '客户项目管理->预览' }}}
        </h3>
    </div>

        <div class="container-fluid table-responsive">
            <table id="users" class="table table-striped table-hover">
                <tr class="row">
                    <th class="col-md-1">{{{ Lang::get('admin/customer.id') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/customer.customer_info') }}}</th>
                    <th class="col-md-4">{{{ Lang::get('admin/customer.base_info') }}}</th>
                    <th class="col-md-3">{{{ Lang::get('admin/customer.detail_info') }}}</th>
                    <th class="col-md-2 text-center">{{{ Lang::get('table.actions') }}}</th>
                </tr>

                @foreach($models as $model)
                    <tr class="row">
                        <td class="col-md-1">{{$model->id}}</td>
                        <td class="col-md-2">
                            <p>{{ Lang::get('admin/customer.user_name').' : '.$model->user_name}}</p>
                            <p>{{{ Lang::get('admin/customer.email').' : '.$model->email }}}</p>
                            <p>{{{ Lang::get('admin/customer.phone').' : '.$model->phone }}}</p>
                        </td>
                        <td class="col-md-2">
                            <p>{{ Lang::get('admin/customer.price').' : '.$model->price}}</p>
                            <p>{{{ Lang::get('admin/customer.price_time').' : '.$model->price_time }}}</p>
                            <p>{{{ Lang::get('admin/customer.belong').' : '.$model->belong }}}</p>
                            <p>{{{ Lang::get('admin/customer.created_at').' : '.$model->created_at }}}</p>
                        </td>
                        <td class="col-md-2">
                            <p>{{ Lang::get('admin/customer.status').' : '.$model->status}}</p>
                            <p>{{{ Lang::get('admin/customer.back_times').' : '.$model->back_times }}}</p>
                            <p>{{{ Lang::get('admin/customer.finished_times').' : '.$model->finished_times }}}</p>
                        </td>
                        <td class="col-md-3">
                            <p>{{{ Lang::get('admin/customer.title').' : '}}}<a href="/customerFiles/{{{$model->file_path}}}" >{{{$model->title }}}</a></p>
                            <p>{{{ Lang::get('admin/customer.brief').' : '.$model->brief }}}</p></td>
                        <td class="col-md-1 col-md-offset-1 text-center">
                            <a href="{{{ action('CustomerProjectController@edit',$model->id) }}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td class="col-md-1">
                            {{ Form::open(array('url' => action('CustomerProjectController@destroy', $model->id)))}}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span></button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="text-right">{{$models->links()}}</div>
        </div>
@stop
{{-- Scripts --}}
@section('scripts')

@stop