<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/','Home\index@index');//微商城首页
Route::get('home/register','Home\loginController@register');//注册页面
Route::post('home/registerdo','Home\loginController@registerdo');//注册执行
Route::get('home/login','Home\loginController@login');//登录视图
Route::post('home/logindo','Home\loginController@logindo');//登录验证
Route::get('home/loginout','Home\loginController@loginout');//登录退出
Route::middleware(['checkLogin'])->group(function () {
	Route::get('home/pay','alipay@pay');//支付
	Route::get('home/orderlist','Home\goods@orderlist');//订单展示
});
Route::get('home/goodslist','Home\goods@goodslist');//商品详情
Route::get('home/goodscartadd','Home\goods@goodscartadd');//商品购物车添加
Route::get('home/order','Home\goods@order');//确认订单
Route::get('home/goodscart','Home\goods@goodscart');//商品购物车
Route::get('home/url','alipay@aliReturn');//同步跳转
Route::get('home/orderdate','Home\goods@orderdate');//过期修改



Route::get('admin/goodsAdd','Admin\goods@goodsadd');//后台商品添加页面
Route::get('admin/goodsList','Admin\goods@goodslist');//商品展示页面
Route::get('admin/goodsUpd','Admin\goods@goodsupd');//商品修改展示页面
Route::post('admin/goodsDoAdd','Admin\goods@goodsdoadd');//商品添加执行页面
Route::get('admin/goodsDel','Admin\goods@goodsdel');//商品删除页面
Route::middleware(['checkTime'])->group(function () {
	Route::get('admin/goodsUpd','Admin\goods@goodsupd');//商品修改展示页面
    Route::post('admin/goodsDoUpd','Admin\goods@goodsdoupd');//商品修改执行页面
});

Route::post('admin/logindo','Admin\login@logindo');//后台管理员登录处理页面
Route::get('admin/login','Admin\login@login');//后台管理员登录页面
Route::get('admin/loginout','Admin\login@loginout');//后台管理员退出
Route::middleware(['checkAdmin'])->group(function () {
    Route::get('admin','Admin\index@index');//微商城后台首页
});

Route::get('student/add','student@add');
Route::post('student/doadd','student@doadd');
Route::get('student/list','student@list');
Route::get('student/del','student@del');
Route::get('student/upd','student@upd');
Route::post('student/doupd','student@doupd');