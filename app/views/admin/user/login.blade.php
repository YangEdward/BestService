@extends('admin.layout.form')

{{-- Web site Title --}}
@section('title')
{{{ '用户登录' }}}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>账户登录</h1>
</div>
<div class="container row">
	<form id="defaultForm" class="form-horizontal" method="post" action="{{URL::to('/user/post_login')}}">
		<div class="form-group">
			<label for="email" class="col-md-2 control-label">邮箱：</label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="email" name="email" placeholder="请输入您的邮箱"
					   value="{{ Input::old('email') }}">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-md-2 control-label">密码：</label>
			<div class="col-md-6">
				<input type="password" class="form-control" id="password" name="password" placeholder="请输入您的密码">
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="col-md-offset-4 btn btn-success">登录</button>
		</div>
	</form>
</div>
@stop

@section('foot_script')
	<script type="text/javascript">
		$(document).ready(function() {
			// Generate a simple captcha

			$('#defaultForm').formValidation({
				framework: 'bootstrap',
				message: 'This value is not valid',
				icon: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					password: {
						//row: '.col-md-6',
						validators: {
							notEmpty: {
								message: '密码不可为空'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: '请填写您的邮箱地址'
							},
							emailAddress: {
								message: '请检查邮箱地址，格式是否正确。'
							}
						}
					}
				}
			});
		});
	</script>
@stop
