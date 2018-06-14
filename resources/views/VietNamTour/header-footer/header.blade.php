<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VietNamTravel</title>
	<base href="{{asset('')}}">

	<script type="text/javascript" src="public/resource/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="public/resource/js/popper.js"></script>
	<script type="text/javascript" src="public/resource/js/bootstrap.js"></script>
	<script type="text/javascript" src="public/resource/js/fontawesome-all.min.js"></script>
	<script type="text/javascript" src="public/resource/js/fa-regular.js"></script>
	

	<link rel="stylesheet" href="public/resource/css/bootstrap.css">
	<link rel="stylesheet" href="public/resource/css/owl.carousel.min.css">
	<link rel="stylesheet" href="public/resource/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="public/resource/css/place.css">
	<link rel="stylesheet" href="public/resource/css/style.index.css">
	<link rel="stylesheet" href="public/resource/css/menu-style2.css">
	<link rel="stylesheet" href="public/resource/css/select2.min.css">
	<link rel="stylesheet" href="public/resource/css/font-awesome.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
	<style>
		h4{
			border-bottom: none !important;
		}
		.btn-thongbao{
			display: table-cell;
			width: 49%;
			border: none;
			background-color: #ddd;
			padding: 5px 10px;
			cursor: pointer;
			font-size: 14px;
		}
		.btn-thongbao:hover{
			background-color: white;
			color: #00a680;
			border: 1px solid #ddd;
		}
		.active-nofi{
			background-color: #00a680 !important;
			border: 1px solid #00a680; 
		}
		.active-nofi:hover{
			color: white;
		}
		.notification .content-nofi ul {
		    max-height: 200px;
		    min-height: 70px;
		}

		.li-seen{
			background-color: #ddd !important;
			border: 1px solid snow !important;
		}
		.error-nofi{
			font-size: 14px;
			text-align: center;
			display: table-cell;
			vertical-align: middle;
			padding-top: 17px !important;
			color: #f63434;
		}
		.header #id-con ul.left-menu-lam li a.bell{
		  -webkit-animation: ring 4s .7s ease-in-out infinite !important;
		  -webkit-transform-origin: 50% 4px !important;
		  -moz-animation: ring 4s .7s ease-in-out infinite !important;
		  -moz-transform-origin: 50% 4px !important;
		  animation: ring 4s .7s ease-in-out infinite !important;
		  transform-origin: 50% 4px !important;
		  margin: 0 !important;
		  color: red !important;
		}
	</style>
</head>
<body>
	
	<!-- ========== icon =========== -->
	{{-- <div class="icon-bar">
		<ul>
			<li class="search">
				<a href="###">
					<div class="icon"><i class="fas fa-mobile-alt"></i></div>
					<div class="slider">
						<p>Search</p>
					</div>
				</a>
			</li>
			<li class="facebook">
				<a href="#">
					<div class="icon"><i class="fab fa-facebook-f"></i></div>
					<div class="slider">
						<p>Facebook</p>
					</div>
				</a>
			</li>
			<li class="google">
				<a href="#">
					<div class="icon"><i class="fab fa-google-plus-g"></i></div>
					<div class="slider">
						<p>Google</p>
					</div>
				</a>
			</li>
		</ul>
	</div> --}}
	<div class="icon-scroll-top" id="id-icon-scroll-top"><a><i class="fas fa-arrow-up"></i></a></div>
	<!-- ========== end icon =========== -->

	<!-- ================== header ============= -->
	<input type="hidden">
	<section class="header">
		<div class="img-carolsel">
			<ul>
				<li class="active-img">
					<div class="img-item">
						<div class="img-content" style="background-image: url('public/resource/images/slide-carousel/viet-nam-travel.jpg');"></div>
					</div>
				</li>
				<li>
					<div class="img-item">
						<div class="img-content" style="background-image: url('public/resource/images/slide-carousel/vietnam-travel-tips.jpg');"></div>
					</div>
				</li>
				<li >
					<div class="img-item">
						<div class="img-content" style="background-image: url('public/resource/images/slide-carousel/Hoa-Lu.jpg');"></div>
					</div>
				</li>
			</ul>
			<div class="noidung-text">
				
			</div>	
		</div> <!-- end img-carolsel -->
		<div class="container">
			<div class="layer-top" id="id-layer-top">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light menuTop" id="id-menu-Top">
						<a class="navbar-brand" href="{{route('/')}}" style="color: #304FFE !important;"><!-- VietNamTour -->
							{{-- <img src="https://static.tacdn.com/img2/langs/vi/branding/rebrand/TA_logo_primary_v2.svg" alt="" style="height: 50px; width: 160px;"> --}}
							<img src="public/resource/images/logo-vnt-2.png" alt="" style="height: 50px; width: 160px;padding-top: 7px;padding-bottom: 4px;">
						</a>
						<!-- <button class="btn btn-success navbar-toggler" id="btnsearch-xs"><i class="fas fa-search"></i></button> -->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color: white; background-color: white;">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto col-md-9 col-12" style="padding: 0;">
								<li class="nav-item btn-select" >
									<a id="a-tinhTP" class="nav-link a-select" data-hienthi="tinhTP" data-id="all" data-name="Tất cả">Tất cả 
										<i class="fas fa-angle-down float-right" style="margin-top: 5px;"></i>
									</a>

									<div class="select-content" id="tinhTP">
										<div class="caption-h5">
						  					<h5><i class="fas fa-globe"></i> Tỉnh thành phố</h5>
						  				</div>

						  				<ul id="content-tinhtp-id">
						  					
						  				</ul>
									</div>
									
									

								</li> <!-- end btn-select -->
								<li class="nav-item btn-select">
									<a id="a-danhmuc" class="nav-link a-select" data-hienthi="danhmuc" title="" data-type="all" data-name="Tất cả">
										Tất cả 
										<i class="fas fa-angle-down float-right" style="margin-top: 5px;"></i>
									</a>
									<div class="select-content" id="danhmuc" style="height: 158px;">
										<div class="caption-h5">
						  					<h5><i class="fas fa-globe"></i> Danh mục</h5>
						  				</div>

						  				<ul style="height: 125px;">
						  					<li class="selectItem2" data-name="Tất cả" data-type="all">
						  						<a class="selectItem-name2">
						  							<label>Tất cả</label>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Tham quan" data-type="4">
						  						<a class="selectItem-name2">
						  							<label>Tham quan</label>
						  							
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Ăn uống" data-type="1">
						  						<a class="selectItem-name2">
						  							<label>Ăn uống</label>
						  							
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Khách sạn" data-type="2">
						  						<a class="selectItem-name2">
						  							<label>Khách sạn</label>
						  							
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Vui chơi" data-type="5">
						  						<a class="selectItem-name2">
						  							<label>Vui chơi</label>
						  							
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Phương tiện" data-type="3">
						  						<a class="selectItem-name2">
						  							<label>Phương tiện</label>
						  							
						  						</a>
						  					</li>
						  				</ul>
									</div>
								</li><!-- end btn-select -->

								<li class="nav-item" style="position: relative;">
									<form class="form-inline form-search" action="{{route('search')}}">
										<label class="boloc"><i class="fas fa-search"></i></label>
										<input id="text-search-top" class="form-control input-search" type="search" placeholder="Nhập tên dịch vụ để tìm kiếm..." aria-label="Search" onekeyup="search()" name="keyword" required>
										<button class="btn btn-outline-success btn-search" id="btnsearchNhe" style="background-color: #00a680;">Tìm kiếm</button>
										<input type="text" hidden="hidden" value="all" name="city">
										<input type="text" hidden="hidden" value="all" name="type">
									</form>
									<div class="body-search" id="thanSearch" style="border: 1px solid #ddd;">
										<div class="item-search" id="IDitem-search">
											<div id="eatCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchEat"></h5>
												</div>
												<div id="search_eat">
													{{-- hotel --}}
												</div>
											</div>	

											<div id="hotelCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchHotel"></h5>
												</div>
												<div id="search_hotel">
													{{-- hotel --}}
												</div>
											</div>	
											
											<div id="tranCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchTran"></h5>
												</div>
												<div id="search_tran">
													{{-- hotel --}}
												</div>
											</div>	

											<div id="seeCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchSee"></h5>
												</div>
												<div id="search_see">
													{{-- hotel --}}
												</div>
											</div>	

											<div id="enterCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchEnter"></h5>
												</div>
												<div id="search_enter">
													{{-- hotel --}}
												</div>
											</div>
											
										</div>
										
										
										<div id="lichsusearch">
											
											{{-- <div class="item-search">
												<div class="title-search">
													<h5>Lịch sử tìm kiếm</h5>
												</div>
												@foreach($litSearch as $lis)
													<div class="content-search">
														<a href="detail/id={{$lis->sv_id}}&type={{$lis->sv_type}}">
															<div class="left-content-search">
																<img src="public/thumbnails/{{$lis->sv_image}}" alt="">
															</div>
															<div class="right-content-search">
																<p>{{$lis->sv_name}}</p>
																<p style="font-size: 13px; color: #d2cece; font-weight: 400;height: 24px;overflow: hidden;">{{$lis->sv_description}} </p>
															</div>
														</a>		
													</div>
												@endforeach
											</div> --}}
										</div>

										<div id="list-top-search">
											
											{{-- <div class="item-search">
												<div class="title-search">
													<h5>Lịch sử tìm kiếm</h5>
												</div>
												@foreach($litSearch as $lis)
													<div class="content-search">
														<a href="detail/id={{$lis->sv_id}}&type={{$lis->sv_type}}">
															<div class="left-content-search">
																<img src="public/thumbnails/{{$lis->sv_image}}" alt="">
															</div>
															<div class="right-content-search">
																<p>{{$lis->sv_name}}</p>
																<p style="font-size: 13px; color: #d2cece; font-weight: 400;height: 24px;overflow: hidden;">{{$lis->sv_description}} </p>
															</div>
														</a>		
													</div>
												@endforeach
											</div> --}}
										</div>
										
											
									</div>
								</li>
							</ul>
							<div class="form-inline my-2 my-lg-0" id="dangnhap-dangky">
								<ul class="navbar-nav mr-auto col-md-12 col-12" style="padding: 0;">
									@if(Session::has('login') && Session::get('login') == true)
									<li class="nav-item" style="position: relative; margin-right: 2px;">
											<!-- hien thi khi dang nhap thanh cong -->
											<a class="nav-link btn-login" style="padding: 0; border: none !important;" id="id-user-form">
												@if(Session::get('user_info')->avatar == null)
													<img src="public/resource/images/avatar2.jpg" style="height: 33px; width: 33px;">
												@else
													<img src="public/resource/images/avatar/{{Session::get('user_info')->avatar}}" style="height: 33px; width: 33px;">
												@endif
												<span style="max-width: 100px;overflow: hidden;display: inline-flex;">{{Session::get('user_info')->username}}</span>
												 <i class="fas fa-caret-down"></i>
											</a>
											<div class="user-form" id="user-form">
												<ul>
													<li><a href="{{route('info')}}"><i class="fas fa-info-circle"></i> Thông tin tài khoản</a></li>
													
													<li><a href="{{route('logoutW')}}"><i class="fas fa-power-off"></i> Đăng xuất</a></li>
												</ul>
											</div> <!-- end hien thi khi dang nhap thanh cong -->
											
									</li>
									@else
										<li class="nav-item">
											<a href="{{route('loginW')}}" class="nav-link btn-login" id="btn-dangnhap">Đăng nhập</a>
										</li>
										<li class="nav-item">
											<a href="{{route('registerW')}}" class="nav-link btn-login" id="btn-dangky">Đăng ký</a>
										</li>
									@endif
								</ul>
							</div>
						</div>
					</nav>
					<div class="con" id="id-con">
						<div class="row">
							<div class="col-md-10 col-6">
								<div class="right-menu-lam">
									<ul class="float-left ul-right-menu-lam">
										<li class="">
											<a href="" style="color: #00a680 !important;"><i class="fas fa-home"></i></a>
										</li>
										<li class="hover-menu hidden-xs">
											<a href="{{route('gioi-thieu')}}">Giới thiệu</a>
										</li>
									
										@if(Session::has('login') && Session::get('login') == true)
											@for($i=0;$i<count(Session::get('user_info')->level);$i++)
												@if(Session::get('user_info')->level[$i] == 1 || Session::get('user_info')->level[$i] == 2)
													<li class="hover-menu hidden-xs">
														<a href="{{route('placeuser')}}">
															Địa điểm	
														</a>
													</li>
													<li class="hover-menu hidden-xs">
														<a href="service-user" class="a-content-nofi">
															Dịch vụ	
														</a>
													</li>
													<li class="hover-menu hidden-xs">
														<a href="{{route('get_tripchudule')}}" class="a-content-nofi">
															Lịch trình	
														</a>
													</li>
												@endif

												@if(Session::get('user_info')->level[$i] == 3 || Session::get('user_info')->level[$i] == 4)
													<li class="hover-menu hidden-xs">
														<a href="{{route('placeuser')}}" class="a-content-nofi">
															Địa điểm
														</a>
													</li>
													<li class="hover-menu hidden-xs">
														<a href="service-user" class="a-content-nofi">
															Dịch vụ	
														</a>
													</li>
												@endif

												@if(Session::get('user_info')->level[$i] == 5)
													<li class="hover-menu hidden-xs">	
													<a href="{{route('get_tripchudule')}}" class="a-content-nofi">
														Lịch trình
													</a>
												</li>
												@endif
											@endfor
											<li class="hover-menu hidden-xs">
												<a href="{{route('point-for-user')}}">Điểm thưởng</a>
											</li>
										@endif	

									</ul>
										
								</div>
							</div>
							<div class="col-md-5 d-none">
								<div class="ssearch" id="hidden-formSearch" style="position: relative; display: none; transition: 0.5s; margin-top: -2px;">
									
								</div>
							</div>
							<div class="col-md-2 col-6">
								<ul class="float-right left-menu-lam">
									<li class="cha-notification">
										<a id="athongbao" class="bell a-notification" data-id-hienthi="id-thongBao">
											<!-- <i class="fas fa-bell"></i> -->
											<i class="far fa-bell"></i>
											<!-- <img src="images/bell.svg" alt="" style="width: 14px;height: 16px;"> -->
											{{-- <span class="badge" id="num-thongbao">9</span> --}}
										</a>
										<div class="notification" id="id-thongBao">
											<!-- Tab links -->
												
											<div class="content-nofi" id="noidungthongbao">
												<div class="tab" style="padding: 5px;border-bottom: 1px solid #ddd;">
												  <button class="btn-thongbao tablinks active active-nofi" onclick="openCity(event, 'cuatoi')">Dịch vụ
												  </button>
												  <button id="btn-dichvu" class="btn-thongbao tablinks" onclick="openCity(event, 'dichvu')">Của tôi
												  </button>
												</div>

												<!-- Tab content -->
												<div id="cuatoi" class="tabcontent" style="display: block">
												  	<ul class="body-nofi" id="ul-cuatoi">
														<li>
															<a href="" class="a-content-nofi">
																<div class="anh-nofi">
																	<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
																</div>
																<p class="text-nofi">
																	Get code suggestions while writing code directly to your Java IDE.
																</p>	
															</a>
														</li>
													</ul>
												</div>

												<div id="dichvu" class="tabcontent" style="display: none;">
												  	<ul class="body-nofi" id="ul-dichvu">
														{{-- <li>
															<a href="" class="a-content-nofi">
																<div class="anh-nofi">
																	<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
																</div>
																<p class="text-nofi">
																	xdsffsfdfd
																</p>	
															</a>
														</li> --}}
													</ul>
													<div id="detail_event_Modal" class="modal fade" role="dialog">
													  <div class="modal-dialog">

													    <!-- Modal content-->
													    <div class="modal-content" style="margin-top: 100px;border-radius: 0;">

													      {{-- <div class="modal-header">
													        <button type="button" class="close" data-dismiss="modal">&times;</button>
													        <h4 class="modal-title">Modal Header</h4>
													      </div> --}}

													      <div class="modal-body" style="min-height: 300px;">
													        <div class="text-center header-detail-event">
													        	<i class="far fa-check-circle"></i>
													        	<h5>Vai trò doanh nghiệp đã được duyệt</h5>
													        </div><br>
													        <div class="content-event col-md-12 push-md-3">
													        	<div class="">
													        		<h6 style="text-align: left;">Chức năng mới</h6>
													        	</div>
													        	<ul>
													        		<li>Quản lý địa điểm</li>
													        		<li>Quản lý dịch vụ</li>
													        	</ul>
													        	<div class="text-center btn-nofi">
													        		<a href="">Đăng nhập lại để trải nghiệm ngay</a>
													        	</div>
													        </div>
													      </div>

													      {{-- <div class="modal-footer">
													        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													      </div> --}}
													    </div>

													  </div>
													</div>
												</div>
													
											</div>
											{{-- <div class="xem text-center" style="background-color: #ddd;">
												<a href="" style="color: black !important; font-size: 13px; padding: 5px; font-weight: 500; display: inline-block;">
													Xem tất cả
												</a>
											</div> --}}
										</div>
									</li>
									{{-- <li class="cha-notification">
										<a class="a-notification" data-id-hienthi="id-tuychinh"><i class="fas fa-plus"></i></a>
										<div class="notification" id="id-tuychinh" style="width: 200px;">
											
											<div class="content-nofi">
												<ul id="body-nofi" style="width: 200px;">
													@if(Session::has('login') && Session::get('login') == true)
														@for($i=0;$i<count(Session::get('user_info')->level);$i++)
															@if(Session::get('user_info')->level[$i] == 1 || Session::get('user_info')->level[$i] == 2)
																<li style="height: 27px;">
																	<a href="{{route('placeuser')}}" class="a-content-nofi">
																			<p class="text-nofi" style="height: auto;width: auto;">
																				<i class="fas fa-map-marker"></i> 
																				Danh sách địa điểm
																			</p>	
																		</a>
																</li>
																<li style="height: 27px;">
																	<a href="service-user" class="a-content-nofi">
																		<p class="text-nofi" style="height: auto;width: auto;">
																			<i class="fas fa-archive"></i> 
																			Danh sách dịch vụ
																		</p>	
																	</a>
																</li>
																<li style="height: 27px;">
																	<a href="{{route('get_tripchudule')}}" class="a-content-nofi">
																		<p class="text-nofi" style="height: auto;width: auto;">
																			<i class="fas fa-archive"></i> 
																			Lịch trình
																		</p>	
																	</a>
																</li>
															@endif

															@if(Session::get('user_info')->level[$i] == 3 || Session::get('user_info')->level[$i] == 4)
																<li style="height: 27px;">
																	<a href="{{route('placeuser')}}" class="a-content-nofi">
																		<p class="text-nofi" style="height: auto;width: auto;">
																			<i class="fas fa-map-marker"></i> 
																			Danh sách địa điểm
																		</p>	
																	</a>
																</li>
																<li style="height: 27px;">
																	<a href="service-user" class="a-content-nofi">
																		<p class="text-nofi" style="height: auto;width: auto;">
																			<i class="fas fa-archive"></i> 
																			Danh sách dịch vụ
																		</p>	
																	</a>
																</li>
															@endif

															@if(Session::get('user_info')->level[$i] == 5)
																<li style="height: 27px;">	
																<a href="{{route('get_tripchudule')}}" class="a-content-nofi">
																	<p class="text-nofi" style="height: auto;width: auto;">
																		<i class="fas fa-list-ul"></i>
																		Lịch trình
																	</p>	
																</a>
															</li>
															@endif
														@endfor
													@endif	
													
												</ul>
											</div>
										</div>
									</li> --}}
									{{-- <li id="id-language">
										<span href="" id="language" class="bell">
											<img src="public/resource/images/icons/vn.png" alt="" style="width: 20px; height: 20px;">
										</span>
										  <div class="" id="content-language">
										    <a class="" href="####">
										    	<img src="public/resource/images/icons/us.png" alt="" style="width: 20px; height: 20px;">
										    </a>
										  </div>
									</li> --}}
								</ul>
							</div>
						</div>
							
					</div>
				</div>	
			</div> <!-- end layer-top -->
		</div>
	</section>
	<!-- ================== end header ============= -->

<script src="public/resource/js/select2.full.js"></script>
<script type="text/javascript">
	$('#id-user-form').click(function () {
		$('#user-form').toggle();
	});
		
	function openCity(evt, cityName) {
	    // Declare all variables
	    var i, tabcontent, tablinks;

	    // Get all elements with class="tabcontent" and hide them
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }

	    // Get all elements with class="tablinks" and remove the class "active"
	    tablinks = document.getElementsByClassName("tablinks");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].className = tablinks[i].className.replace(" active", "");
	        tablinks[i].className = tablinks[i].className.replace(" active-nofi", "");
	    }

	    // Show the current tab, and add an "active" class to the button that opened the tab
	    document.getElementById(cityName).style.display = "block";
	    evt.currentTarget.className += " active";
	    evt.currentTarget.className += " active-nofi";
	}
</script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
	$('#athongbao').click(function () {
		$('#athongbao').removeClass("bell");
	})
</script>
