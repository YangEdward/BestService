@extends('admin.layout.form')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>账户登录</h1>
</div>
{{ Confide::makeLoginForm()->render() }}
@stop
