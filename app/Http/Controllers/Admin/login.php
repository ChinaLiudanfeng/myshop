<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class login extends Controller
{
    //管理员登录
    public function login()
    {
        return view('admin/login');
    }
    //登录处理
    public function logindo(Request $request)
    {
        $data = $request->all();
        $res = DB::table('admin')->where('name',$data['name'])->where('pwd',md5($data['pwd']))->first();
        if(!empty($res)){
            session(['adminlogin'=>$data['name']]);
            return redirect('admin');
        }else{
            return redirect('admin/login');
        }
    }
    //登录退出
    public function loginout(Request $request)
    {
        $request->session()->forget('adminlogin');
        return redirect('admin/login');
    }

}
