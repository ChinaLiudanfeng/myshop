<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
	<form action="{{url('student/doadd')}}" method="post">
	@csrf
		姓名:<input type="text" name="name">
		<input type="submit" value="添加">
	</form>
</body>
</html>