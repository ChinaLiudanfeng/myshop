@extends('layout.index')
@section('title','微商城登录')
@section('content')
<!-- login -->
<div class="pages section">
	<div class="container">
		<div class="pages-head">
			<h3>登录</h3>
		</div>
		<div class="login">
			<div class="row">
				<form class="col s12" action="{{url('home/logindo')}}" method="post">
				@csrf
					<div class="input-field">
						<input type="text" name="name" class="validate" placeholder="账号" required>
					</div>
					<div class="input-field">
						<input type="password" name="pwd" class="validate" placeholder="密码" required>
					</div>
					<a href=""><h6>忘记密码 ?</h6></a>
					<button class="btn button-default">前往登录</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end login -->
@endsection