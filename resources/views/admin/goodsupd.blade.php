@extends('layout.admin')
@section('title','微商城-修改商品')
@section('content')
<!-- /. NAV SIDE  -->
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">微商城-商品修改</h1>
            <h1 class="page-subhead-line">商品名称 图片 价格的修改</h1>
        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="panel panel-info">
           <div class="panel-heading">
                   请填写下面表单
           </div>
                <div class="panel-body">
                    <form role="form" action="{{url('admin/goodsDoUpd')}}" method="post" enctype="multipart/form-data">
                    @csrf
                            <div class="form-group">
                                <label>商品名称</label>
                                <input class="form-control" type="text" name="name" value="{{$data->name}}">

                            </div>
                            <div class="form-group">
                                <label>商品库存</label>
                                <input class="form-control" type="text" name="num" value="{{$data->num}}">

                            </div>
                                <div class="form-group">
                                <label>商品价格</label>
                                <input class="form-control" type="text" name="price" value="{{$data->price}}">
                            </div>

                             <div class="form-group">
                                <label>商品图片</label>
                                <input type="file" name="file">
                            </div>

                            <input type="hidden" name="id" value="{{$data->id}}">
			     			<input type="hidden" name="file1" value="{{$data->img}}">

                            <button type="submit" class="btn btn-info">信息修改 </button>

                     </form>
                </div>
            </div>
            </div>
        </div>
</div>
@endsection
