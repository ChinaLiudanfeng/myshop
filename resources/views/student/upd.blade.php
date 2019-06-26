<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改</title>
</head>
<body>
	<form action="{{url('student/doupd')}}" method="post">
	@csrf
		姓名:<input type="text" name="name" value="{{$data->name}}">
		<input type="hidden" name="id" value="{{$data->id}}">
		<input type="submit" value="修改">
	</form>
</body>
</html>