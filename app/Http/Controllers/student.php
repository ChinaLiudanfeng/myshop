<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class student extends Controller
{
    //添加
    public function add()
    {
    	return view('student/add');
    }
    //添加执行
    public function doadd(Request $request)
    {
    	$data = $request->all();
    	DB::table('student')->insert([
    			'name'=>$data['name'],
    		]);
    	return redirect('student/list');
    }
    //展示
    public function list(Request $request)
    {
    	$res = $request->all();
    	if(isset($res['sou'])){
    		$data = DB::table('student')->where('name','like','%'.$res['sou'].'%')->paginate(2);
    	}else{
    		$res['sou'] = '';
    		$data = DB::table('student')->paginate(2);
    	}
    	
    	return view('student/list',['data'=>$data],['sou'=>$res['sou']]);
    }
    //删除
    public function del(Request $request)
    {
    	$id = $request->all();
    	DB::table('student')->delete($id);
    	return redirect('student/list');
    }
    //修改
    public function upd(Request $request)
    {
    	$id = $request->all();
    	$data = DB::table('student')->where('id',$id)->first();
    	return view('student/upd',['data'=>$data]);
    }
    //
    public function doupd(Request $request)
    {
    	$res = $request->all();
    	DB::table('student')->where('id',$res['id'])->update([
    			'name'=>$res['name'],
    		]);
    	return redirect('student/list');
    }
}
