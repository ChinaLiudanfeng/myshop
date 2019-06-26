@extends('layout.index')
@section('title','微商城订单详情')
@section('content')
	
	@foreach($data as $k=>$v)
	<h3 style="color:red">
			订单号:{{$v->oid}} &nbsp;&nbsp;&nbsp;
			订单状态:@if($v->status == 1)
						已支付
					 @elseif($v->status == 2)
					 <span class="f1">
					 	未支付<a href="{{url('home/pay')}}?oid={{$v->oid}}&sum={{$v->sum}}" class="btn button-default">前往支付</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 	<span class="times" oid="{{$v->oid}}" order-state="{{$v->status}}" end-time="{{date('Y/m/d H:i:s',$v->create_time+1200)}}"></span>
					 	后过期
					 </span>					 		
					 @else
						已过期
					 @endif
		
	</h3>
		<table border="2" bgcolor="lightblue">
				<tr>
					<th>ID</th>
					<th>商品名称</th>
					<th>购买数量</th>
					<th>商品小计</th>
					<th>商品图片</th>
					<th>添加时间</th>
				</tr>
		@foreach($v->detail as $value)
			
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->name}}</td>
					<td>{{$value->num}}</td>
					<td>{{$value->sum}}</td>
					<td>
						<img src="{{asset('storage').'/'.$value->img}}" width="50">
					</td>
					<td>{{date('y:m:d h:i:s',$value->create_time)}}</td>
				</tr>
			
		@endforeach
		</table>
	@endforeach	
	
@endsection
<script type="text/javascript" src="/jquery-3.3.1.js"></script>
<script type="text/javascript">

    $(function(){

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        getTime();//调用函数
		function getTime(){
			$(".times").each(function(){
			var _this = $(this);
			var end_time = _this.attr('end-time'); //结束时间
			var state = _this.attr('order-state'); //订单状态
			var oid = parseInt(_this.attr('oid'));//订单号

			var endDate = new Date(end_time);


	            endDate = endDate.getTime();//1970-截止时间  从1970年到截止时间有多少毫秒
	 
	            //获取一个现在的时间
	            var nowdate = new Date;
	            // alert(endDate)
	            nowdate = nowdate.getTime(); //现在时间-截止时间  从现在到截止时间有多少毫秒
	 
	            //获取时间差 把毫秒转换为秒
	            var diff = parseInt((endDate - nowdate) / 1000);


	            if(diff <= 0 ){
	            	//window.location.reload();
	            	
	            	// alert(oid)
	            	
	            	$.ajax({
	            			url:"{{url('home/orderdate')}}",
	            			type:"get",
	            			dataType:"json",
	            			data:{oid:oid},
	            			success:function(msg){
	            				// alert(msg);
	            			}


	            		});

	            	_this.parent('.f1').html('已过期');
	            }
	 
	            h = parseInt(diff / 3600);//获取还有小时
	            m = parseInt(diff / 60 % 60);//获取还有分钟
	            s = diff % 60;//获取多少秒数
	 
	            //将时分秒转化为双位数
	            h = setNum(h);
	            m = setNum(m);
	            s = setNum(s);
	            //输出时分秒
	            _this.html(m + "分" + s + "秒");
			});
			window.setTimeout(function() {
	    		getTime();
	  		}, 1000);
		}

	 //window.setTimeout(getTime, 1000);
        //设置函数 把小于10的数字转换为两位数
        function setNum(num) {
            if (num < 10) {
                num = "0" + num;
            }
            return num;
        }
  });
  </script>