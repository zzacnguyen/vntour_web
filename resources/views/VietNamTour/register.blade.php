<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="public/resource/css/bootstrap.css">
	<link rel="stylesheet" href="public/resource/css/login.css">
	<title>Login</title>
</head>
<body>
	<section class="content" style="background-image: url({{asset('public/resource/images/background/4.jpg')}});">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>	
				<div class="col-md-4 form-login tada">
					<div class="title">
						<h3 class="text-center">Đăng ký</h3>
					</div>
					<div class="body">
						<form action="{{route('registerWpost')}}" method="post">
							<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
							<div class="login">
								@if(Session::has('userexist'))
									<small style="color: red;">Tài khoản này đã được sử dụng trước đó</small>
								@elseif(Session::has('validate'))
				                  	<small class="float-left" style="color: red;">Tài khoản và mật khẩu có độ dài từ 4-20 ký tự</small>
					            @elseif(Session::has('password'))
					            	<small style="color: red;">Mật khẩu không trùng khớp</small>
					            @elseif(Session::has('validate'))
					            	<small style="color: red;">Tài khoản mật khẩu có độ dài lớn hơn 4 ký tự</small>
								@endif
								
								@if(Session::has('userexist') || Session::has('password') || Session::has('validate'))
									<input type="text" placeholder="Tài khoản" name="username" required="required" value="{{Session::get('username')}}">
								@else
									<input type="text" placeholder="Tài khoản" name="username" required="required" value="">
								@endif
								
								<input type="password" placeholder="Mật khẩu" name="password" required="required">
								<input type="password" placeholder="Xác nhận mật khẩu" name="passwordC">
								<button class="btn btn-info float-right btnlogin" type="submit" name="btnregister">Đăng ký</button>
							</div>
							<div class="register text-center" style="border: none;">
								<h5 class="text-center">Bạn đã có tài khoản</h5>
								<a href="{{route('loginW')}}" class="btn btn-success btnregister">Đăng nhập</a>
							</div>
						</form>
					</div>
				</div>	
				<div class="col-md-4"></div>	
			</div>
		</div>
	</section>

	<script type="text/javascript" src="public/resource/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="public/resource/js/bootstrap.js"></script>
	<script src="public/resource/js/fontawesome-all.min.js" type="text/javascript"></script>
</body>
</html>