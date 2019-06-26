@extends('layout.index')
@section('title','微商城购物车')
@section('content')
<!-- cart -->
<div class="cart section">
	<div class="container">
		<div class="pages-head">
			<h3>购物车</h3>
		</div>
		<div class="content">
		@foreach($data as $k=>$v)
			<div class="cart-1">
				<div class="row">
					<div class="col s5">
						<h5>图片</h5>
					</div>
					<div class="col s7">
						<img src="{{asset('storage').'/'.$v->img}}" alt="">
					</div>
				</div>
				<div class="row">
					<div class="col s5">
						<h5>商品名称</h5>
					</div>
					<div class="col s7">
						<h5><a href="">{{$v->gname}}</a></h5>
					</div>
				</div>
				<div class="row">
					<div class="col s5">
						<h5>购买数量</h5>
					</div>
					<div class="col s7">
						<h5>{{$v->buy_num}}</h5>
					</div>
				</div>
				<div class="row">
					<div class="col s5">
						<h5>商品价格</h5>
					</div>
					<div class="col s7">
						<h5>${{$v->price}}</h5>
					</div>
				</div>
				<div class="row">
					<div class="col s5">
						<h5>操作</h5>
					</div>
					<div class="col s7">
						<h5><i class="fa fa-trash"></i></h5>
					</div>
				</div>
			</div>
			<div class="divider"></div>
		@endforeach
		</div>
		<div class="total">
			<div class="row">
				<div class="col s7">
					<h6>商品总价</h6>
				</div>
				<div class="col s5">
					<h6>${{$sum}}</h6>
				</div>
			</div>
		</div>
		<a class="btn button-default" href="{{url('home/order')}}?sum={{$sum}}">前往下单</a>
	</div>
</div>
<!-- end cart -->
@endsection