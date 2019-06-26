@extends('layout.index')
@section('title','微商城首页')
@section('content')
<!-- slider -->
<div class="slider">
	
	<ul class="slides">
		<li>
			<img src="img/slide1.jpg" alt="">
			<div class="caption slider-content  center-align">
				<h2>欢迎来到微商城</h2>
				<h4>Lorem ipsum dolor sit amet.</h4>
				<a href="" class="btn button-default">SHOP NOW</a>
			</div>
		</li>
		<li>
			<img src="img/slide2.jpg" alt="">
			<div class="caption slider-content center-align">
				<h2>夹克业务</h2>
				<h4>Lorem ipsum dolor sit amet.</h4>
				<a href="" class="btn button-default">SHOP NOW</a>
			</div>
		</li>
		<li>
			<img src="img/slide3.jpg" alt="">
			<div class="caption slider-content center-align">
				<h2>时装店</h2>
				<h4>Lorem ipsum dolor sit amet.</h4>
				<a href="" class="btn button-default">SHOP NOW</a>
			</div>
		</li>
	</ul>

</div>
<!-- end slider -->

<!-- features -->
<div class="features section">
	<div class="container">
		<div class="row">
			<div class="col s6">
				<div class="content">
					<div class="icon">
						<i class="fa fa-car"></i>
					</div>
					<h6>免费送货</h6>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
			<div class="col s6">
				<div class="content">
					<div class="icon">
						<i class="fa fa-dollar"></i>
					</div>
					<h6>退款</h6>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
		</div>
		<div class="row margin-bottom-0">
			<div class="col s6">
				<div class="content">
					<div class="icon">
						<i class="fa fa-lock"></i>
					</div>
					<h6>安全付款</h6>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
			<div class="col s6">
				<div class="content">
					<div class="icon">
						<i class="fa fa-support"></i>
					</div>
					<h6>24/7 全天候支持</h6>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end features -->

<!-- product -->
<div class="section product">
	<div class="container">
		<div class="section-head">
			<h4>新产品</h4>
			<div class="divider-top"></div>
			<div class="divider-bottom"></div>
		</div>
		<div class="row">
			@foreach($before as $v)
			<div class="col s6">
				<div class="content">
					<img src="{{asset('storage').'/'.$v->img}}" alt="">
					<h6><a href="{{url('home/goodslist')}}?id={{$v->id}}">{{$v->name}}</a></h6>
					<div class="price">
						${{$v->price}} <span>$28</span>
					</div>
					<a class="btn button-default" href="{{url('home/goodscartadd')}}?id={{$v->id}}">添加到购物车</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- end product -->

<!-- promo -->
<div class="promo section">
	<div class="container">
		<div class="content">
			<h4>产品包</h4>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
			<button class="btn button-default">SHOP NOW</button>
		</div>
	</div>
</div>
<!-- end promo -->

<!-- product -->
<div class="section product">
	<div class="container">
		<div class="section-head">
			<h4>热卖/全部商品</h4>
			<div class="divider-top"></div>
			<div class="divider-bottom"></div>
		</div>
		<div class="row">
			@foreach($after as $a)
			<div class="col s6">
				<div class="content">
					<img src="{{asset('storage').'/'.$a->img}}" alt="">
					<h6><a href="{{url('home/goodslist')}}?id={{$a->id}}">{{$a->name}}</a></h6>
					<div class="price">
						${{$a->price}} <span>$28</span>
					</div>
					<a class="btn button-default" href="{{url('home/goodscartadd')}}?id={{$a->id}}">加入购物车</a>
				</div>
			</div>
			@endforeach
		</div>
		<div class="pagination-product">
			<ul>
				{{$after->appends(['sou' => $sou])->links()}}
			</ul>
		</div>
	</div>
</div>
<!-- end product -->

<!-- quote -->
<div class="section quote">
	<div class="container">
	<form action="">
		<h4><input type="text" name="sou" class="validate" placeholder="请输入您想搜索的内容" value="{{$sou}}"></h4>
		<p><button class="btn button-default" style="background-color:white">搜索</button>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet.Aliquid ducimus illo hic iure eveniet,Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet</p>
	</form>
	</div>
</div>
<!-- end quote -->

@endsection