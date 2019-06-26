@extends('layout.index')
@section('title','微商城商品详情')
@section('content')
<!-- wishlist -->
<div class="wishlist section">
	<div class="container">
		<div class="pages-head">
			<h3>商品详情</h3>
		</div>
		<div class="content">
			<div class="cart-1">
			
				<div class="row">
					<div class="col s5">
						<h5>图片</h5>
					</div>
					<div class="col s7">
						<img src="{{asset('storage').'/'.$data->img}}" alt="">
					</div>
				</div>
				<div class="row">
					<div class="col s5">
						<h5>商品名称</h5>
					</div>
					<div class="col s7">
						<h5><a href="">{{$data->name}}</a></h5>
					</div>
				</div>
				<div class="row">
					<div class="col s5">
						<h5>库存状态</h5>
					</div>
					<div class="col s7">
						<h5>In Stack</h5>
					</div>
				</div>
				<div class="row">
					<div class="col s5">
						<h5>商品价格</h5>
					</div>
					<div class="col s7">
						<h5>${{$data->price}}</h5>
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
				<div class="row">
					<div class="col 12">
						<a class="btn button-default" href="{{url('home/goodscartadd')}}?id={{$data->id}}">添加购物车</a>
					</div>
				</div>
			
			</div>		
		</div>
	</div>
</div>
<!-- end wishlist -->
@endsection