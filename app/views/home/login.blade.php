<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/30
 * Time: 15:34
 */?>
@extends('layout.master')
@section('content')
    @include('includes.carousel')
    <div style="margin-top: 16px">
        <div class="alert alert-warning" role="alert" id="first">
            <h3 class="text-primary" data-toggle="tooltip" data-placement="right"
                    title="运营模式">运营模式</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>全权委托代理</h4>
                    </div>
                    <div class="panel-body">
                        <p>您的App由我司全权管理协议。您只需要提供App需求，在协议规定的时间范围内，我司负责软件开发，发布，维护升级。</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>半代理</h4>
                    </div>
                    <div class="panel-body">
                        <p>您与我司签订App半代理协议。您提供App需求，我司根据需求进行软件开发设计，设计完成客户满意后，
                            本次合作结束。后续如需维护改进，则算作为App二次开发。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="alert alert-warning" role="alert">
            <h3 class="text-primary">核心业务</h3>
        </div>
    </div>
    @include('includes.collapse')
@stop
