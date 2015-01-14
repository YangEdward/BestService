@extends('layout.master')
@section('content')
    <div role="tabpanel">
        <ul class="nav nav-tabs row" role="tablist">
            <li class="col-md-3 col-md-offset-2 active" role="presentation">
                <a href="#Android" role="tab" data-toggle="tab" aria-controls="Android">
                    <h4><i class="fa fa-qq fa-lg"></i> Android</h4>
                </a>
            </li>
            <li class="col-md-3" role="presentation">
                <a href="#Ios" role="tab" data-toggle="tab" aria-controls="Ios">
                    <h4><i class="fa fa-apple fa-lg"></i> Ios</h4>
                </a>
            </li>
            <li class="col-md-3" role="presentation">
                <a href="#Web" role="tab" data-toggle="tab" aria-controls="Web">
                    <h4><i class="fa fa-cloud fa-lg"></i> Web应用</h4>
                </a>
            </li>
        </ul>
    </div>

    <div class="tab-content" style="margin-top: 16px">
        <div role="tabpanel" class="tab-pane fade in active" id="Android">
            @include('includes.android-tab')
        </div>
        <div role="tabpanel" class="tab-pane fade" id="Ios">
            @include('includes.ios-tab')
        </div>
        <div role="tabpanel" class="tab-pane fade" id="Web">
            @include('includes.web-tab')
        </div>
    </div>
@stop