@extends('layout.index')
@section('title','微商城注册')
@section('content')
<!-- register -->
<div class="pages section">
	<div class="container">
		<div class="pages-head">
			<h3>注册</h3>
		</div>
		<div class="register">
			<div class="row">
				<form class="col s12" action="{{url('home/registerdo')}}" method="post">
				@csrf
					<div class="input-field">
						<input type="text" name="name" class="validate" placeholder="账号" required>
					</div>
					
					<div class="input-field">
						<input type="password" name="pwd" placeholder="密码" class="validate" required>
					</div>
					<button class="btn button-default">注册</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end register -->
@endsection