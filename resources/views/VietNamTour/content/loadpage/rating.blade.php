<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="public/resource/css/bootstrap.css">
</head>

<style type="text/css">
	.lam{
		margin-top: 15%;
	    margin-left: 27%;
	    background-color: #00000042;
	    padding: 30px 10px;
	    width: 500px;
	}
</style>

<body style="background-image: url('public/resource/images/Vietnam_Banner.jpg'); background-repeat: no-repeat;background-size: cover;">
	<div class="container">
		<div class="text-center lam">
			<h1 class="text-center" style="color:white">Đăng ký thành công</h1>
			<a href="{{route('loginW')}}" style="color: red; font-weight: 500; padding: 5px;">Đăng nhập ngay</a>
			<a href="{{route('/')}}" style="color: red; font-weight: 500; padding: 5px;">Quay về trang chủ</a>
		</div>
	</div>
</body>
</html>