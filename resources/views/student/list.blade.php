<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
<form action="">
	姓名:<input type="text" name="sou" value="{{$sou}}">
	<input type="submit" value="搜索">
</form>
	<table border=1>
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>操作</td>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>
				<a href="{{url('student/del')}}?id={{$v->id}}">删除</a>
				||
				<a href="{{url('student/upd')}}?id={{$v->id}}">修改</a>
			</td>
		</tr>
		@endforeach
	</table>
	{{$data->appends(['sou'=>$sou])->links()}}
</body>
</html>