<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 13:54
 */?>
@extends('layout.form')
@section('content')
    <h1>Pendientes por hacer:</h1>

    <div class="media">
        <div class="media-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    @foreach($fields_show as $field => $field_info)
                        <th>{{ $field_info['show'] }}</th>
                    @endforeach
                </tr>
                </thead>

                <tbody>
                @foreach ($models as $model)
                    <tr>
                        @foreach($fields_show as $field => $field_info)
                            <td>{{ $model->$field }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <a href="/user/create" class="btn btn-mini"> 添加用户</a>
@stop