@include('VietNamTour.header-footer.header')


<script src="public/resource/js/toastr.min.js"></script>
<link rel="stylesheet" href="public/resource/css/toastr.min.css">

<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">



<style type="text/css">
	button[type="button"] {
	    background-color: none;
	    border: none;
	    border-radius: 0;
	    color: white;
	    cursor: pointer;
	    line-height: 1rem;
	    padding: .75rem 2rem;
		margin-bottom: 0px;
	}
	body{
		width: auto;
		height: auto;
	}
	.content .left-user .avatar {
	    position: relative;
	}
	.upload-image {
	    position: absolute;
	    bottom: 20px;
	    right: 0;
	}
	.inputfile {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}
</style>

<script>
	//        $(document).ready( function() {
 //    	$(document).on('change', '.btn-file :file', function() {
	// 	var input = $(this),
	// 		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	// 	input.trigger('fileselect', [label]);
	// 	});

	// 	$('.btn-file :file').on('fileselect', function(event, label) {
		    
	// 	    var input = $(this).parents('.input-group').find(':text'),
	// 	        log = label;
		    
	// 	    if( input.length ) {
	// 	        input.val(log);
	// 	    } else {
	// 	        if( log ) alert(log);
	// 	    }
	    
	// 	});
	// 	function readURL(input) {
	// 	    if (input.files && input.files[0]) {
	// 	        var reader = new FileReader();
		        
	// 	        reader.onload = function (e) {
	// 	            $('#img-upload').attr('src', e.target.result);
	// 	        }
		        
	// 	        reader.readAsDataURL(input.files[0]);
	// 	    }
	// 	}

	// 	$("#imgInp").change(function(){
	// 	    readURL(this);
	// 	}); 	
	// });
</script>
	<section class="content-info" style="height: 478px;">
		<div class="container">
			<div class="content">
				<div class="row">
				
					<div class="col-md-3 ">
						<div class="left-user">
							<div class="avatar">
								@if($info->contact_avatar == null)
									<img id='img-upload' src="{{asset('public/resource/images/avatar/avatar2.jpg')}}" alt="">
								@else
									<img id='img-upload' src="{{asset('public/resource/images/avatar/'.$info->contact_avatar)}}" alt="">
								@endif
								
								{{-- <div class="upload-image">
									<input type="file" id="imgInp" name="image" value="" class="inputfile">
								</div> --}}
							</div>
							
							<div class="options">
								<ul>
									<li class="active">
										<a href=""><i class="far fa-edit"></i> Thông tin tài khoản</a>
									</li>
									<li class="">
										<a id="btnnangcap" data-toggle="modal" data-target="#myModal"><i class="fas fa-user-secret"></i> Nâng cấp cai trò</a>
									</li>
									<li>
										<a href="" data-toggle="modal" data-target="#exampleModal">
											<i class="fas fa-lock"></i> Đổi mật khẩu
										</a>
									</li>
									{{-- <li>
										<a href=""><i class="fas fa-lock"></i> Điểm thưởng</a>
									</li> --}}
									<li style="border-bottom: 1px solid #ddd;">
										<a href="{{route('logoutW')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
									</li>
								</ul>
							</div>
						</div>	
					</div>


					<div class="col-md-9">
						<div class="right-user">
							<div class="info-account">
								<h4 class="text-center" style="margin-top: 10px;"><b>THÔNG TIN TÀI KHOẢN</b></h4>
								<form class="form-info" action="" method="post" enctype='multipart/form-data'>
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Họ và tên</label>
											<input name="name" type="text" class="form-control" id="" placeholder="Họ tên" value="{{$info->contact_name}}">
											<p class="text-danger">{{$errors->first('name')}}</p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Email</label>
											<input name="email" type="email" class="form-control" id="" placeholder="Email" value="{{$info->contact_email_address}}">
											<p class="text-danger">{{$errors->first('email')}}</p>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="">Số điện thoại</label>
											<input name="phone" type="number" class="form-control" id="" placeholder="Điện thoại" value="{{$info->contact_phone}}">
											<p class="text-danger">{{$errors->first('phone')}}</p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Website</label>
											<input name="website" type="text" class="form-control" id="" placeholder="Website" value="{{$info->contact_website}}">
											<p class="text-danger">{{$errors->first('website')}}</p>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="">Ảnh đại điện</label>
											<input type="file" id="imgInp" name="image" value="" class="form-control">
											{{-- <div class="input-group">
												<span class="input-group-btn">
													Chọn tệp… 
												</span>
												<input type="text" class="form-control" value="" readonly>
											
												
											</div> --}}
											<p class="text-danger">{{ $errors->first('image') }}</p>
										</div>	
									
								
									
										<div class="form-group col-md-6">
											<label for="inputState">Ngôn ngữ</label>
											<select name="lang" id="inputState" class="form-control">
												<option value="Việt Nam" selected>Việt Nam</option>
												<option value="Nước ngoài">Nước ngoài</option>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-primary" style="background-color: #00a680;border-radius: 0;border: 1px solid #00a680;">Lưu thay đổi</button>
								</form>
							</div>
						</div>
					</div>
					
					{{-- // modal nang cap tai khoan --}}
					<div id="myModal" class="modal fade" role="dialog" style="margin-top: 110px;">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content" style="border-radius: 0;">
					      <div class="modal-header">
					        <h5 class="modal-title">Nâng cấp vai trò</h5>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>
					      <div class="modal-body">
					      	<form action="{{route('register-uplevel-user')}}" method="post">
					        <div class="form-group col-md-12 row">
							    <label class="col-md-4" for="exampleInputEmail1">Vai trò hiện tại</label>
							    <label style="color: red;" class="col-md-8" for="">
							    	@if($quyen_hientai != null)
							    		@foreach($quyen_hientai as $quyen)
							    			@if($quyen->active == 1)
												{{$quyen->quyen}}
											@endif
							    		@endforeach
										
										
										@if($quyen_hientai[0]->active == 0 && $quyen_hientai[1]->active == 0 && $quyen_hientai[2]->active == 0 && $quyen_hientai[3]->active == 0 && $quyen_hientai[4]->active == 0)
											Người dùng thường
							    		@endif
							    	@endif
							    </label>
							</div>


							<div class="form-group col-md-12 row">
							    <label class="col-md-4" for="exampleInputEmail1">Vai trò đang xét</label>
							    <label style="color: red;" class="col-md-8" for="">
							    	@if($quyen_dangxet != null)
										@for($i = 0; $i < count($quyen_dangxet); $i++)
											@if($quyen_dangxet[$i] == 2)
												- Moderator
											@endif
											@if($quyen_dangxet[$i] == 3)
												- Cộng tác viên
											@endif
											@if($quyen_dangxet[$i] == 4)
												- Doanh nghiệp
											@endif
											@if($quyen_dangxet[$i] == 5)
												- Hướng dẫn viên du lịch
											@endif
						    			@endfor
							    	@endif
							    </label>
							</div>

							<div class="form-group col-md-12 row" style="float: left;">
							    <label class="col-md-4" for="">Nâng cấp</label>
							    <div class="col-md-8">
							    	<select class="form-control col-md-12" id="" name="selectnangcap">

							    	@foreach($quyen2 as $q)
						    			@if($q->quyen == 0)
											<option selected="selected">Bạn không thể đăng ký thêm vai trò</option>
										@else
											@if($q->quyen == 3)
												<option value="3">Cộng tác viên</option>
											@endif
											@if($q->quyen == 1)
												<option value="1">Doanh nghiệp</option>
											@endif
											@if($q->quyen == 2)
												<option value="2">Hướng dẫn viên du lịch</option>
											@endif
										@endif
						    		@endforeach
							    	</select>
							    </div>
							</div>
							<div class="form-group col-md-12 row" style="float: left;">
							    <label class="col-md-4" for="">Lưu ý</label>
							    <div class="col-md-8">
							    	<small id="emailHelp" class="form-text text-muted">Tài khoản muốn nâng cấp cần sự xét duyệt của admin</small>
							    </div>
							</div>
							
					      </div>

					      <div class="modal-footer" style="height: 55px;">
					        <button style="border:none; background-color: #de5959 !important;padding: 11px 18px;" type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
					        {{-- @if($quyen_hientai == [])
					        	@for($i = 0; $i < count($quyen_hientai); $i++)
					    			@if($quyen_hientai[$i] == 5 || $quyen_hientai[$i] == 4)
										<button style="background-color: #444fce !important; border-radius: 0px;padding: 7px 30px;" type="submit" class="btn btn-primary" data-dismiss="modal" disabled="disabled">Nâng cấp</button>
									@else
										<button style="background-color: #444fce !important; border-radius: 0px;padding: 7px 30px;" type="submit" class="btn btn-primary" >Nâng cấp</button>
									@endif
					    		@endfor
					    	@else
					    		<button type="submit" style="background-color: #444fce !important; border-radius: 0px;padding: 7px 30px;" class="btn btn-primary" id="savenangcap">Nâng cấp</button>
					        @endif --}}
				    		
							@if($quyen_hientai[3]->active == 1 || $quyen_hientai[4]->active == 1)
								<button style="border:1px solid #00a680;background-color: #00a680 !important; border-radius: 0px;padding: 6px 30px;" type="submit" class="btn btn-primary" data-dismiss="modal" disabled="disabled">Nâng cấp</button>
							@else
								<button style="border:1px solid #00a680;background-color: #00a680 !important; border-radius: 0px;padding: 6px 30px;" type="submit" class="btn btn-primary" >Nâng cấp</button>
				    		@endif
					        
					      </div>
					     </form>
					    </div>

					  </div>
					</div>


					{{-- // modal doi mat khau --}}
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content" style="border-radius: 0!important;">
				    	<form action="change-pass" method="post" id="changepass">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        
						 	<div class="form-group row">
					        	<label class="col-sm-4">Mật khẩu cũ</label>
					        	<div class="col-sm-8">
					        		<input type="password" class="form-control"  aria-describedby="emailHelp" name="password_old" value="" id="pass_old" required="required" style="border-radius: 0;">
					        	</div>
						  	</div>
						  	<div class="form-group row">
					        	<label class="col-sm-4">Mật khẩu mới</label>
					        	<div class="col-sm-8">
					        		<input type="password" class="form-control"  aria-describedby="emailHelp" name="password_new" id="pass_new" required="required" style="border-radius: 0;">
					        	</div>
						  	</div>
						  	<div class="form-group row">
					        	<label class="col-sm-4">Xác nhận mật khẩu</label>
					        	<div class="col-sm-8">
					        		<input type="password" class="form-control" aria-describedby="emailHelp" placeholder="" name="password_new2" id="pass_new2" required="required" style="border-radius: 0;">
					        	</div>
						  	</div>
					      </div>
					      <div class="modal-footer" style="height: 55px;">
					        <button type="button" style="margin-bottom: 0;background: #de5959;padding: 10px 12px !important;border-radius: 0px !important;" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
					        {{-- <inpu class="btn btn-primary" style="margin-bottom: 0;padding: 6px 41px !important;border-radius: 0px !important;margin-left: 9px;" id="btncapnhat">Cập nhật mật khẩu</a> --}}
					        	<input type="button" class="btn btn-primary" style="margin-bottom: 0;padding: 6px 41px !important;border-radius: 0px !important;margin-left: 9px; background-color: #00a680;border:none;" id="btncapnhat" value="Cập nhật mật khẩu">
					      </div>
				      	</form>
					    </div>
					  </div>
					</div>

				</div>
			</div>
		</div>
	</section>


	<script>
		$(document).ready(function(){
		    $("#myBtn").click(function(){
		        $("#myModal").modal();
		    });
		});
		    
	</script>

	<script src="public/resource/js/lightbox.min.js"></script>
	{{-- <script src="public/resource/js/detail-hotel.js"></script> --}}
	<script src="public/resource/js/menu-style.js"></script>
	<script src="public/resource/js/p/account.js"></script>

	@if(Session::has('message_edit'))
		
		<script>
			@if(Session::get('message_edit') == "Cập nhật thành công!")
				Command: toastr["success"]("{{Session::get('message_edit')}}")
			@else
				Command: toastr["error"]("{{Session::get('message_edit')}}")
			@endif
			toastr.options = {
			  "closeButton": false,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}
		</script>
	@endif
	
	@if(Session::has('message'))
		
		<script>
			@if(Session::get('message') == "Cập nhật mật khẩu thành công!")
				Command: toastr["success"]("{{Session::get('message')}}")
			@elseif(Session::get('message') == "Mật khẩu cũ không trùng khớp!")
				Command: toastr["warning"]("{{Session::get('message')}}")
			@else
				Command: toastr["error"]("{{Session::get('message')}}")
			@endif
			toastr.options = {
			  "closeButton": false,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}
		</script>
	@endif

	@if(Session::has('message_uplevel'))
		
		<script>
			@if(Session::get('message_uplevel') == "Đăng ký thành công!")
				Command: toastr["success"]("{{Session::get('message_uplevel')}}")
			@elseif(Session::get('message') == "Hiện tại bạn không thể đăng ký thêm quyền!")
				Command: toastr["warning"]("{{Session::get('message_uplevel')}}")
			@else
				Command: toastr["error"]("{{Session::get('message_uplevel')}}")
			@endif
			toastr.options = {
			  "closeButton": false,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}
		</script>
	@endif

	{{-- message_uplevel --}}


@include('VietNamTour.header-footer.footer')