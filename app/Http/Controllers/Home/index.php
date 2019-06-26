<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class index extends Controller
{
    //首页
    public function index(Request $request)
    {
    	//搜索
    	$res = $request->all();
    	if(isset($res['sou'])){
    		$after = DB::table('goods')->where('name','like','%'.$res['sou'].'%')->paginate(4);
    	}else{
    		$res['sou'] = '';
    		$after = DB::table('goods')->paginate(4);
    	}
        $before = DB::table('goods')->limit(4)->get();

        //订单删除倒计时
        $data = DB::table('order')->orderBy('create_time','desc')->first();
        $oid = $data->oid;
        $start_time = $data->create_time;
        $end_time = $start_time+1200;
        $end = date('Y/m/d H:i:s',$end_time);
        //修改订单状态
 
    	return view('home/index',['before'=>$before],['after'=>$after,'sou'=>$res['sou'],'end'=>$end,'oid'=>$oid]);
    }
    //同步跳转
    public function url()
    {
        echo "支付成功!";
    }

}
