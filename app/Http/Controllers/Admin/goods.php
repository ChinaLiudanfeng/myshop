<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class goods extends Controller
{

//添加
    public function goodsadd()
    {
        return view('admin/goodsadd');
    }
//添加处理
    public function goodsdoadd(Request $request)
    {
        $data = $request->all();
        $path = $request->file('file')->store('goods');
        $res = DB::table('goods')->insert([
            'name'=>$data['name'],
            'num'=>$data['num'],
            'price'=>$data['price'],
            'img'=>$path,
            'create_time'=>time(),
        ]);
        if($res){
            return redirect('admin/goodsList');
        }
    }
//展示
    public function goodslist(Request $request)
    {

        // $redis = new \Redis();
        // $redis->connect('127.0.0.1','6379');
        // $num = $redis->incr(1);
        // echo "<center>网页点击量:".$num."</center>";

        $res = $request->all();
        if(isset($res['sou'])){
            $data = DB::table('goods')->where('name','like','%'.$res['sou'].'%')->orderBy('create_time','desc')->paginate(2);
        }else{
            $res['sou'] = '';
            $data = DB::table('goods')->orderBy('create_time','desc')->paginate(2);
        }

        return view('admin/goodslist',['data'=>$data],['sou'=>$res['sou']]);
    }
//修改
    public function goodsupd(Request $request)
    {
        $id = $request->all();
        $data = DB::table('goods')->where('id',$id)->first();
        return view('admin/goodsupd',['data'=>$data]);
    }
//删除
    public function goodsdel(Request $request)
    {
        $id = $request->all();
        DB::table('goods')->delete($id);
        return redirect('admin/goodsList');
    }
//修改执行页面
    public function goodsdoupd(Request $request)
    {
        $data = $request->all();
        $file = $request->file('file');
        if(isset($file)){
            $path = $request->file('file')->store('goods');
        }else{
            $path = $data['file1'];
        }
        $res = DB::table('goods')->where('id',$data['id'])->update([
            'name'=>$data['name'],
            'num'=>$data['num'],
            'price'=>$data['price'],
            'img'=>$path,
            'create_time'=>time(),
        ]);
        return redirect('admin/goodsList');
    }
}
