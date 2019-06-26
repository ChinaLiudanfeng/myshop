<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class goods extends Controller
{
	//商品详情
	public function goodslist(Request $request)
	{
		$id = $request->all();
		$data = DB::table('goods')->where('id',$id)->first();
		return view('home/goodslist',['data'=>$data]);
	}
	//添加购物车
	public function goodscartadd(Request $request)
	{
		$gid = $request->all();
		$uid = session('userid');
		$em = DB::table('cart')->where('uid',$uid)->where('gid',$gid)->first();
		$goods = DB::table('goods')->find($gid);
		if($request->session()->has('userid')){
			if(empty($em)){			
				$data['uid'] = $uid;
				$data['gid'] = $gid['id'];
				$data['img'] = $goods->img;
				$data['price'] = $goods->price;
				$data['gname'] = $goods->name;
				$data['buy_num'] = 1;
				$data['create_time'] = time();
				DB::table('cart')->insert($data);
			}else{
				$id = $em->cid;
				DB::table('cart')->where('cid',$id)->update([
						'buy_num'=>$em->buy_num+1,
						'create_time'=>time(),
						'price'=>$em->price+$goods->price,
					]);
			}			
			return redirect('home/goodscart');
		}else{
			return redirect('home/login');
		}	
	}
	//购物车
	public function goodscart()
	{
		$uid = session('userid');
		$data = DB::table('cart')->where('uid',$uid)->get();
		$price = DB::table('cart')->where('uid',$uid)->pluck('price')->toArray();
		$sum = array_sum($price);
		return view('home/goodscart',['data'=>$data],['sum'=>$sum]);
	}
	//确认订单
	public function order(Request $request)
	{

		$uid = session('userid');
		$sum = $request->all();
		$oid = time().mt_rand(1000,1111);  //订单编号
		//添加订单
		DB::table('order')->insert([
				'oid'=>$oid,
				'uid'=>$uid,
				'sum'=>$sum['sum'],
				'create_time'=>time(),
			]);

		//添加订单详情表
		$data = DB::table('cart')->where('uid',$uid)->get();

		foreach($data as $k=>$v){
			DB::table('order_detail')->insert([
					'name'=>$v->gname,
					'num'=>$v->buy_num,
					'sum'=>$sum['sum'],
					'img'=>$v->img,
					'create_time'=>time(),
					'oid'=>$oid,
					'uid'=>$uid
				]);
		}

		return view('home/order',['oid'=>$oid,'sum'=>$sum['sum'],'data'=>$data]);
	}
	//订单详情
	public function orderlist()
	{
		$uid = session('userid');

		//test
		$i = DB::table('order')->where('uid',$uid)->orderBy('create_time','desc')->get()->toArray();
		foreach($i as $k=>$v){
			$ii = DB::table('order_detail')->where('oid',$v->oid)->get();
			$i[$k]->detail = $ii;
		}
		
		return view('home/orderlist',['data'=>$i]);
	}
	//过期订单
	public function orderdate(Request $request)
	{
		$id = $request->all();
		
		DB::table('order')->where('oid',$id)->update([
				'status'=>3,
			]);
		return "订单已过期删除";
	}
}
