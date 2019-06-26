<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Home\User;

class loginController extends Controller
{
//登录视图
    public function login()
    {
    	return view('home/login');
    }
//登录验证
    public function logindo(Request $request)
    {
    	$data = $request->all();
    	$res = User::where(['name'=>$data['name'],'pwd'=>md5($data['pwd'])])->first();
    	if(!empty($res)){
    		session(['username'=>$data['name'],'userid'=>$res['id']]);
    		return redirect('/');
    	}else{
    		return redirect('home/login');
    	}
    }
//登录退出
    public function loginout(Request $request)
    {
    	$request->session()->forget('userid','username');
        return redirect('/');
    }
//注册页面
    public function register()
    {
    	return view('home/register');
    }
//注册do
    public function registerdo(Request $request)
    {
        $data = $request->all();

        $res = User::insert([
                'name'=>$data['name'],
                'pwd'=>md5($data['pwd']),
            ]);
        if($res){
            return redirect('home/login');
        }
    }
}
