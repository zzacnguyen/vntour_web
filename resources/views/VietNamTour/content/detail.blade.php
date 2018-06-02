@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/font-awesome.min.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/chat.css">
<link rel="stylesheet" href="public/resource/JSsocial/jssocials.css">
<link rel="stylesheet" href="public/resource/JSsocial/jssocials-theme-flat.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<style type="text/css">
	.left-box {
	    background-color: #fff;
	    position: relative;
	    margin-bottom: 20px;
	    height: 500px;
    	overflow-y: auto;
    	overflow-x: hidden;
	}

	.left-box .box-title {
	    padding: 5px 30px;
	    position: relative;
	    font-weight: 700;
	    font-size: 16px;
	    overflow: hidden;
	    border-bottom: 1px solid #ddd;
	}

	.left-box .box-body ul {
	    padding: 0px;
	    list-style-type: none;
	    line-height: 18px;
	    font-size: 15px;
	    font-weight: 500;
	    padding: 14px 30px 10px 30px;
	}

	.left-box .box-body ul li {
	    margin-bottom: 10px;
	    padding-bottom: 10px;
	    border-bottom: 1px solid #eee;
	}

	.left-box .box-body ul li a {
	    color: #797986;
	    text-decoration: none;
	    display: block;
	}

	.left-box .box-body ul li a span {
	    float: right;
	    font-size: 14px;
	    color: black;
	}

	.lime-clam {
	    width: 100%;
	    height: 20px;
	    overflow: hidden;
	    display: block;
	    display: -webkit-box;
	    -webkit-line-clamp: 1;
	    -webkit-box-orient: vertical;
	    text-overflow: ellipsis;
	}

	#text-cham{
		overflow: hidden;
	    line-height: 23px;
	    height: 20px;
	    display: block;
	    display: -webkit-box;
	    -webkit-line-clamp: 1;
	    -webkit-box-orient: vertical;
	    text-overflow: ellipsis;
	}

	.grid-item .ribbon span {
	    font-size: 10px;
	    font-weight: 700;
	    color: #FFF;
	    text-transform: uppercase;
	    line-height: 20px;
	    transform: rotate(-45deg);
	    -webkit-transform: rotate(-45deg);
	    width: 100px;
	    display: block;
	    /* background: #f94141; */
	    background: linear-gradient(#f941416b 0,#f94141 100%);
	    text-shadow: 1px 1px 2px rgba(0,0,0,.25);
	    position: absolute;
	    top: 19px;
	    left: -21px;
	}

	.grid-item .grid-text .place-name {
	    display: inline-block;
	    padding: 0px 7px;
	    font-size: 14px;
	    font-weight: 500;
	    line-height: 10px;
	    background-color: #352f2f82;
	}

	.btn-modal{
		padding: 10px 20px;
    	border-radius: 0;
    	background-color: #7482b3;
	}
	.close-rating{
		position: absolute;
    	top: 0px;
    	right: 7px;
    	color: #cecece;
	}

	.close-rating:hover{
		color: red !important;
	}


	.close-rating2{
		position: absolute;
    	top: 0px;
    	right: 7px;
    	color: #cecece;
	}
	.close-rating2:hover{
		color: red !important;
	}

//=================
	body {
	  font-family:"Open Sans", Helvetica, Arial, sans-serif;
	  color:#555;
	  max-width:680px;
	  margin:0 auto;
	  padding:0 20px;
	}

	* {
	  -webkit-box-sizing:border-box;
	  -moz-box-sizing:border-box;
	  box-sizing:border-box;
	}

	*:before, *:after {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	}

	.clearfix {
	  clear:both;
	}

	.text-center {text-align:center;}

	a {
	  color: tomato;
	  text-decoration: none;
	}

	a:hover {
	  color: #2196f3;
	}

	pre {
	display: block;
	padding: 9.5px;
	margin: 0 0 10px;
	font-size: 13px;
	line-height: 1.42857143;
	color: #333;
	word-break: break-all;
	word-wrap: break-word;
	background-color: #F5F5F5;
	border: 1px solid #CCC;
	border-radius: 4px;
	}



	#a-footer {
	  margin: 20px 0;
	}

	.new-react-version {
	  padding: 20px 20px;
	  border: 1px solid #eee;
	  border-radius: 20px;
	  box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);
	  
	  text-align: center;
	  font-size: 14px;
	  line-height: 1.7;
	}

	.new-react-version .react-svg-logo {
	  text-align: center;
	  max-width: 60px;
	  margin: 20px auto;
	  margin-top: 0;
	}

	.success-box {
	  margin:50px 0;
	  padding:10px 10px;
	  border:1px solid #eee;
	  background:#f9f9f9;
	}

	.success-box img {
	  margin-right:10px;
	  display:inline-block;
	  vertical-align:top;
	}

	.success-box > div {
	  vertical-align:top;
	  display:inline-block;
	  color:#888;
	}


	/* Rating Star Widgets Style */
	.rating-stars ul {
	  list-style-type:none;
	  padding:0;
	  
	  -moz-user-select:none;
	  -webkit-user-select:none;
	}
	.rating-stars ul > li.star {
	  display:inline-block;
	  
	}

	/* Idle State of the stars */
	.rating-widget .rating-stars #stars li {
	  font-size:25px; /* Change the size of the stars */
	  color:#ccc; /* Color on idle state */
	}

	/* Hover state of the stars */
	.rating-stars ul > li.star.hover > i.fa {
	  color:#FFCC36;
	}

	/* Selected state of the stars */
	.rating-stars ul > li.star.selected > i.fa {
	  color:#FF912C !important;
	}

	.rating-widget .rating-stars #stars li.hover
	{
		cursor: pointer;
		color: yellow;
	}

	.rating-widget .rating-stars #stars li.selected
	{
		color: yellow;
	}
	
	#floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
  	}
	#floating-panel {
		margin-left: -52px;
	}

	.lam-la{
	  /*width:150px;*/
	  /*border: 1px solid;*/
	}
	.lam-la h4{
	  text-align: center;
	}
	.lam-la .lam-content{
	  display:inline-flex;
	}

	.lam-la .lam-left img{
	  height:50px;
	  width:70px;
	}

	.lam-la .lam-right{
	  padding-left:5px;
	  font-size:10px;
	}
	li.lan-can{
		padding: 5px 0px;
	}
	li.lan-can:hover{
		background-color: #ddd;
	}

</style>


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD4NgGvVNbWb_bMXOdeHLMWVhHm_HITw34&sensor=false"></script>

	{{-- <div id="latitude">{{$sv['pl_latitude']}}</div> --}}
	{{-- <div id="longitude">{{$sv['pl_longitude']}}</div> --}}

	<section class="content-detail">
		<div class="container">
			<div class="row">
				<div class="col-md-7" style="padding-right: 0;">
					<div class="hotel-detail-left">
						<div class="accordian">
							<ul>
								<li>
									<a>
										<img src="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_1}}"/>
										{{-- <img src="http://localhost/vntour_api/public/thumbnails/banner__2018_01_04_11_24_46.jpg"/> --}}
									</a>
								</li>
								<li>
									<a>
										<img src="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_2}}"/>
										<input type="hidden" value="{{$sv->image_details_1}}" id="img_sv">
									</a>
								</li>
								<li>
									<a>
										<img src="http://localhost/vntour_api/public/thumbnails/{{$sv->image_banner}}"/>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-5" style="padding-left: 0;">
					<div class="hotel-detail-right">
						<div class="title" style="text-align: left; margin-bottom: 5px;">
							<div id="latitude" data-lati="{{$sv->pl_latitude}}" data-lon="{{$sv->pl_longitude}}"></div>
							<input type="hidden" value="{{$sv->sv_id}}" id="id_sv">
							<p>
								<a>{{$sv->city_name}} <i class="fas fa-angle-double-right"></i></a> 
								<a>{{$sv->district_name}} <i class="fas fa-angle-double-right"></i></a> 
								<a>{{$sv->ward_name}}</a>
							</p>
							<h4 style="font-size: 20px;" id="sv_name">{{$sv->sv_name}}</h4> {{-- ten dich vu --}}
							<div class="star">
								@if($sv->sv_rating > 0)
									<span>{{$sv->sv_rating}}</span> <i class="fas fa-star"></i>
								@endif
									
								
								<span style="color: black" id="loaihinhdichvu">
									@if($sv->sv_types == "1")
										- Ăn uống
									@elseif($sv->sv_types == "2")
										- Khách sạn
									@elseif($sv->sv_types == "3")
										 Phương tiện
									@elseif($sv->sv_types == "4")
										- Tham quan
									@else
										- Vui chơi
									@endif
								</span> {{-- loai hinh dich vu --}}
							</div>
						</div>
						<div class="hotel-body">
							<p style="margin: 0;" id="mota-dichvu">{{$sv->sv_description}}</p>
							<div class="row" style="margin-top: 5px;">
								{{-- <div class="col-md-3">
									<a id="">
										<i class="far fa-bookmark"></i>
										{{$sv->sv_point}}
									</a>
								</div> --}}
								<div class="col-md-4 text-center">
									<a title="Lượt xem">
										<i class="fas fa-eye"></i>
										{{$sv->sv_view}}
									</a>
								</div>
								<div class="col-md-4 text-center">
									<a id="like01">
										<i id="color-like" class="fas fa-heart"></i>
										<span id="num_like">{{$sv->sv_like}}</span>
									</a>
								</div>
								<div class="col-md-4 text-center">
									<div id="fb-root"></div>
									<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=174049813400388&autoLogAppEvents=1';
									  fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));
									</script>

									<div class="fb-share-button" data-href="https://www.facebook.com/lam.themen" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Flam.themen&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
								</div>
							</div>
							<br>	
							<div class="service" style="margin-top: 5px;">
								<ul>
									{{-- <li>
										<div class="icon-f"><i class="fas fa-paper-plane"></i></div>
										   Lê Lợi, Lô E1, Cồn Cái Khế, P. Cái Khế, Q.Ninh Kiều, Quận Ninh Kiều
									</li> --}}
									<li>
										<div class="icon-f">
											<i class="fas fa-phone"></i>
										</div>
										<span id="phonenumber">{{$sv->sv_phone_number}}</span> {{-- sodienthoai --}}
									</li>

									<li>
										<div class="icon-f">
											<i class="far fa-clock"></i>
										</div>
										<span id="giomocua">{{$sv->sv_open}}</span> {{-- gio mo cua --}}
										-
										<span id="giodongcua">{{$sv->sv_close}}</span> {{-- gio mo cua --}}
									</li>

									<li>
										<div class="icon-f">
											<i class="fas fa-tag"></i>
										</div>
										@if($sv->sv_lowest_price == 0 || $sv->sv_highest_price == 0)
											<span id="giathapnhat">Đang cập nhật</span>
										@else
											<span id="giathapnhat">{{$sv->sv_lowest_price}}</span> {{-- gia thap nhat --}}
											<i class="fas fa-arrow-right"></i> 
											<span id="giacaonhat">{{$sv->sv_highest_price}}</span>  {{-- gia cao nhat --}}
										@endif
											
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="" style="margin-top: 15px;">
						<div class="tabbable-panel">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
									
									<li class="tab-lam active" style="width: 25%;">
										<a href="#tab_default_2" data-toggle="tab" style="text-align: center;">
										Album ảnh </a>
									</li>
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_1" data-toggle="tab" style="text-align: center;">
										Giới thiệu </a>
									</li>
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_3" data-toggle="tab" style="text-align: center;">
										Đánh giá </a>
									</li>
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_4" data-toggle="tab" style="text-align: center;">
										Bản đồ </a>
									</li>
								</ul>
								<div class="tab-content" style="min-height: 1000px;">
									<div class="tab-pane" id="tab_default_1">
										<h5 style="font-weight: 700;padding-left: 17px;">GIỚI THIỆU</h5>
										<div style="text-align: justify; padding: 10px 30px;" >
											{!! $sv->sv_content !!}
										</div>
									</div>

									<div class="tab-pane active" id="tab_default_2">
										<h5 style="font-weight: 700;padding-left: 17px;">Album ảnh</h5>
										<section class="demo" style="background-color: transparent;">
											<div class="gallery">
												<a style="background-color: transparent;" href="public/thumbnails/{{$sv->image_banner}}" title="" data-fluidbox class="col-12"><img src="http://localhost/vntour_api/public/thumbnails/{{$sv->image_banner}}" alt="" title="" /></a>

												<a href="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_1}}" title="" data-fluidbox class="col-6">
													<img src="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_1}}" alt="" title="" />
												</a>

												<a href="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_2}}" title="" data-fluidbox class="col-6">
													<img src="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_2}}" alt="" title="" />
												</a>

												<a href="http://localhost/vntour_api/public/thumbnails/{{$sv->image_banner}}" title="" data-fluidbox class="col-4"><img src="http://localhost/vntour_api/public/thumbnails/{{$sv->image_banner}}" alt="" title="" />
												</a>

												<a href="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_1}}" title="" data-fluidbox class="col-4"><img src="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_1}}" alt="" title="" />
												</a>

												<a href="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_2}}" title="" data-fluidbox class="col-4"><img src="http://localhost/vntour_api/public/thumbnails/{{$sv->image_details_2}}" alt="" title="" />
												</a>
											</div>
										</section>
									</div>

									<div class="tab-pane" id="tab_default_3">
										<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0;">
										    <div class="row">
										        <div class="col-lg-12">
										            <div  class="ibox float-e-margins" style="border-style: none;">
										                <div class="ibox-content">
										                    <h5 style="font-weight: 700;">ĐÁNH GIÁ DỊCH VỤ - {{$countRating}} đánh giá</h5>
										                </div>
										                @if($checklogin == "null")
										                	<div class="ibox-content">
										                		Bạn cần đăng nhập để đánh giá dịch vụ này - 
										                		<a class="btn  btn-sm btn-outline-primary" href="login_detail/{{$sv->sv_id}}&{{$sv->sv_types}}">Đăng nhập ngay</a>
										                	</div>
										                @else
										                	@if($checkUserRating == null)
										                		<div class="ibox-content">
												                	Bạn chưa đánh giá về địa điểm này - <button class="btn  btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">Đánh giá ngay</button>
												                </div>
																<!-- Modal -->
																<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
																  <div class="modal-dialog modal-dialog-centered" role="document">
																    <div class="modal-content" style="border-radius: 0;">
																      <div class="modal-header">
																        <h5 class="modal-title" id="exampleModalLongTitle">Đánh giá</h5>
																        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																          <span aria-hidden="true">&times;</span>
																        </button>
																      </div>
																      <div class="modal-body" style="height: 150px;">
																        <div class="form-group row" style="margin-bottom: 0px;">
																		    <label for="staticEmail" class="col-sm-3 col-form-label">Điểm</label>
																		    <div class="col-sm-9">
																		      {{-- <div class="input-group mb-3">
																				  <input type="number" class="form-control" placeholder="0" min="1" max="5" aria-label="Recipient's username" aria-describedby="basic-addon2" id="txtrating">

																				  <div class="input-group-append">
																				    <span class="input-group-text" id="basic-addon2" style="background-color: transparent;"><i style="color: yellow;" class="fas fa-star"></i></span>
																				  </div>
																				</div>
																				<span id="errorating" style="color: red; display: none;">Bạn chưa đánh giá kìa</span>
																				  <span id="erroratingPoint" style="color: red; display: none;">Điểm không được vượt quá 5</span> --}}
																				  <section class='rating-widget'>
  
																				  <!-- Rating Stars Box -->
																				  <div class='rating-stars text-center'>
																				    <ul id='stars'>
																				      <li class='star' title='Poor' data-value='1'>
																				        <i class='fa fa-star fa-fw'></i>
																				      </li>
																				      <li class='star' title='Fair' data-value='2'>
																				        <i class='fa fa-star fa-fw'></i>
																				      </li>
																				      <li class='star' title='' data-value='3'>
																				        <i class='fa fa-star fa-fw'></i>
																				      </li>
																				      <li class='star' title='' data-value='4'>
																				        <i class='fa fa-star fa-fw'></i>
																				      </li>
																				      <li class='star' title='WOW!!!' data-value='5'>
																				        <i class='fa fa-star fa-fw'></i>
																				      </li>
																				    </ul>
																				  </div>
																				  
																				  <input type="hidden" class="form-control" id="txtrating">
																				    
																				</section>
																		    </div>
																		  </div>

																		  <div class="form-group row">
																		    <label for="staticEmail" class="col-sm-3 col-form-label">Đánh giá</label>
																		    <div class="col-sm-9">
																		      <div class="input-group mb-3">
																				  <textarea class="form-control" style="width: 100%;" id="txtdetail"></textarea>
																				</div>
																				<span class="col-md-12" id="errordetail" style="color: red; display: none;">Vui lòng nhập nội dung đánh giá</span>
																		    </div>
																		    
																		    
																		  </div>
																      </div>
																      <div class="modal-footer" style="height: 50px;">
																        {{-- <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Thoát</button> --}}

																        <button id="btnsave" type="button" class="btn btn-primary btn-sm" style="padding: 10px 20px;border-radius: 0;background-color: #00a680; margin-bottom: 0;">Đánh giá</button>
																      </div>
																    </div>
																  </div>
																</div>
											               	@else
											               		@foreach($checkUserRating as $ra)
											               		<div id="listRating" class="chat-discussion" style="background-color: white; height: 100px; overflow: hidden;">
												               		<div class="chat-message left" style="position: relative;">
									                                    @if($ra->contact_avatar == null)
									                                    	<img class="message-avatar" src="public/resource/images/avatar2.jpg" alt="">
									                                    @else
									                                    	{{-- <img class="message-avatar" src="public/resource/images/{{$r->contact_avatar}}" alt="lam"> --}}
									                                    	<img class="message-avatar" src="public/resource/images/avatar/{{$ra->contact_avatar}}" alt="">
									                                    @endif
									                                    <div class="message">
									                                        <a class="message-author" style="color: #007bff"> {{$ra->username}} - 
									                                        	@for($i = 0; $i < $ra->vr_rating; $i++)
										                                        		<i style="color: yellow;" class="fas fa-star"></i>
										                                        @endfor  - <span style="color: red;">Đánh giá của bạn</span>
										                                        - <button class="btn  btn-sm btn-outline-primary" data-toggle="modal" data-target="#suadanhgia">Cập nhật đánh giá</button>
										                                    </a>
									                                        <span class="message-date"> {{$ra->created_at}} </span>
									                                        <span class="message-content">
									    										{{$ra->vr_ratings_details}}
								                                            </span>
									                                    </div>
									                                    <span class="close-rating2" data-id="{{$ra->id}}" style="cursor: pointer;" onclick="deleteRatingUser()">
									                                    	<i class="fas fa-times"></i>
									                                    </span>
									                                </div>
									                            </div>

									                            <div class="modal fade" id="suadanhgia" tabindex="-1" role="dialog" aria-labelledby="suadanhgia" aria-hidden="true" style="border-radius: 0;">
																  <div class="modal-dialog modal-dialog-centered" role="document">
																    <div class="modal-content" style="border-radius: 0;">
																      <div class="modal-header">
																        <h5 class="modal-title" id="exampleModalLongTitle">Đánh giá</h5>
																        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																          <span aria-hidden="true">&times;</span>
																        </button>
																      </div>
																      <div class="modal-body" style="height: 150px;">
																        <div class="form-group row" style="margin-bottom: 0px;">
																		    <label for="staticEmail" class="col-sm-3 col-form-label">Điểm</label>
																		    <div class="col-sm-9">
																		      {{-- <div class="input-group mb-3">
																				  <input type="number" class="form-control" placeholder="0" min="1" max="5" aria-label="Recipient's username" aria-describedby="basic-addon2" id="txtrating">

																				  <div class="input-group-append">
																				    <span class="input-group-text" id="basic-addon2" style="background-color: transparent;"><i style="color: yellow;" class="fas fa-star"></i></span>
																				  </div>
																				</div>
																				<span id="errorating" style="color: red; display: none;">Bạn chưa đánh giá kìa</span>
																				  <span id="erroratingPoint" style="color: red; display: none;">Điểm không được vượt quá 5</span> --}}
																				  <section class='rating-widget'>
  
																				  <!-- Rating Stars Box -->
																				  <div class='rating-stars text-center'>
																				    <ul id='stars'>
																		    		@if($ra->vr_rating == 1)
																	    				<li class='star selected' title='Poor' data-value='1'>
																				        	<i class='fa fa-star fa-fw'></i>
																				      	</li>
																						<li class='star' title='Fair' data-value='2'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star' title='' data-value='3'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star' title='' data-value='4'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star' title='WOW!!!' data-value='5'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																					@elseif($ra->vr_rating == 2)
																						<li class='star selected' title='Poor' data-value='1'>
																				        	<i class='fa fa-star fa-fw'></i>
																				      	</li>
																						<li class='star selected' title='Fair' data-value='2'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star' title='' data-value='3'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star' title='' data-value='4'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star' title='WOW!!!' data-value='5'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																					@elseif($ra->vr_rating == 3)
																						<li class='star selected' title='Poor' data-value='1'>
																				        	<i class='fa fa-star fa-fw'></i>
																				      	</li>
																						<li class='star selected' title='Fair' data-value='2'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star selected' title='' data-value='3'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star' title='' data-value='4'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star' title='WOW!!!' data-value='5'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																					@elseif($ra->vr_rating == 4)
																						<li class='star selected' title='Poor' data-value='1'>
																				        	<i class='fa fa-star fa-fw'></i>
																				      	</li>
																						<li class='star selected' title='Fair' data-value='2'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star selected' title='' data-value='3'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star selected' title='' data-value='4'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star' title='WOW!!!' data-value='5'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																					@elseif($ra->vr_rating == 5)
																						<li class='star selected' title='Poor' data-value='1'>
																				        	<i class='fa fa-star fa-fw'></i>
																				      	</li>
																						<li class='star selected' title='Fair' data-value='2'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star selected' title='' data-value='3'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star selected' title='' data-value='4'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																						<li class='star selected' title='WOW!!!' data-value='5'>
																							<i class='fa fa-star fa-fw'></i>
																						</li>
																		    		@endif
																					      
																				    </ul>
																				  </div>
																				  
																				  <input type="hidden" class="form-control" id="txtrating2" value="{{$ra->vr_rating}}">
																				    
																				</section>
																		    </div>
																		  </div>

																		  <div class="form-group row">
																		    <label for="staticEmail" class="col-sm-3 col-form-label">Đánh giá</label>
																		    <div class="col-sm-9">
																		      <div class="input-group mb-3">
																				  <textarea class="form-control" style="width: 100%;" id="txtdetail2">{{$ra->vr_ratings_details}}</textarea>
																				</div>
																				<span class="col-md-12" id="errordetail" style="color: red; display: none;">Vui lòng nhập nội dung đánh giá</span>
																		    </div>
																		    
																		    
																		  </div>
																      </div>
																      <div class="modal-footer" style="height:50px;">
																        {{-- <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Thoát</button> --}}

																        <button id="btnsave2" type="button" class="btn btn-primary btn-sm" style="padding: 10px 20px;border-radius: 0;background-color: #00a680; margin-bottom: 0;">Đánh giá
																        </button>
																      </div>
																    </div>
																  </div>
																</div>
																@endforeach
																
										                	@endif
										                	
										                @endif
										                
										            </div>
										        </div>
										    </div>
										    <div class="row">
										        <div class="col-lg-12">
										            <div class="ibox chat-view">
										                <div class="ibox-content">
										                    <div class="row">
										                        <div class="col-md-12">
										                            <div id="list-rating" class="chat-discussion" style="background-color: white; height: 900px;">
										                            @if($rating['data'] != null)
										                            	@foreach($rating['data'] as $r)
										                                <div class="chat-message left" style="position: relative;">
										                                    @if($r->contact_avatar == null)
										                                    	<img class="message-avatar" src="public/resource/images/avatar2.jpg" alt="">
										                                    @else
										                                    	{{-- <img class="message-avatar" src="public/resource/images/{{$r->contact_avatar}}" alt="lam"> --}}
										                                    	<img class="message-avatar" src="public/resource/images/avatar/{{$r->contact_avatar}}" alt="">
										                                    @endif
										                                    <div class="message">
										                                        <a class="message-author" style="color: #007bff"> {{$r->username}} - 
										                                        	@for($i = 0; $i < $r->vr_rating; $i++)
										                                        		<i style="color: yellow;" class="fas fa-star"></i>
										                                        	@endfor 
										                                        	 
										                                        </a>
										                                        <span class="message-date"> {{$r->created_at}} </span>
										                                        <span class="message-content">
										    										{{$r->vr_ratings_details}}
									                                            </span>
										                                    </div>
										                                    @if($quyen_u == 1 || $quyen_u == 2)
																				<span class="close-rating" data-id="{{$r->id}}" onclick="deleteRating({{$r->id}})">
											                                    	<i class="fas fa-times"></i>
											                                    </span>
										                                    @endif

										                                </div>
										                                @endforeach
										                            
										                            @endif
										                            </div>
										                        </div>
										                        <div class="col-md-12" style="padding: 20px;padding-bottom: 0">
										                        	<button id="btn-rating" style="width: 100%;padding: 10px;" class="btn btn-success">Xem thêm đánh giá</button>
										                        </div>
										                    </div>
										                </div>
										            </div>
										        </div>
										    </div>
										</div>
									</div>

									<div class="tab-pane" id="tab_default_4">
										<h5 style="font-weight: 700;padding-left: 17px;">THÔNG TIN BẢN ĐỒ</h5>
										<div class="col-md-12">
											<div id="floating-panel">
										      <button id="drop" onclick="drop()">Lân Cận</button>
										    </div>
											<div id="googleMap" style="width: 100%; height: 400px;">
												Google Map
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4" style="padding-left: 0;">
					@if($sv_lancan_hon != null)
					<div class="left-box" style="margin-top: 16px;">
						<div class="box-title text-center">
							<h4><b style="font-size: 20px;">Một số dịch vụ lân cận</b></h4>
						</div>
						
							<div class="box-body">
								<ul style="padding: 14px 15px 10px 15px;">
									@foreach($sv_lancan_hon as $top)
									<li class="lan-can">
										<a href="detail/id={{$top->id_service}}&type={{$top->sv_type}}">
											<img style="height: 50px;" src="public/thumbnails/{{$top->image}}" alt="null">
											<span class="" style="width: 247px;">
												<h6 class="lime-clam">{{$top->name}}</h6>

												<p style="color: #ddd; height: 15px;overflow: hidden;">{{number_format(round($top->distance/1000,2),2,',','.')}} Km</p>
											</span>
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						
					</div>
					@endif

					@if($sv_lancan != null)
					<div class="right-content">
						<div class="title-right-content">
							<h5 class="text-center">Địa điểm cùng khu vực</h5>
						</div>
						<div class="body-right-content" style="height: 600px;overflow-y: scroll;">
							
								@foreach($sv_lancan as $s)
									<div class="item-cafe">
										<ul>
											<li>
												<a href="detail/id={{$s->sv_id}}&type={{$s->sv_type}}">
													<img src="public/thumbnails/{{$s->image_banner}}" alt="loi" style="height: 100%;width: 110px;">
													<div class="text-item-cafe text-left">
														<h6 style="margin-bottom: 0;display: inline-block;text-overflow: ellipsis;">	<b style="font-weight: 600;">{{$s->sv_name}}</b>
														</h6>
														<p class="text-left" style="font-size: 13px;">
															@if($s->sv_type == 1)
																Ăn uống
															@elseif($s->sv_type == 2)
																Khách sạn
															@elseif($s->sv_type == 3)
																Phương tiện
															@elseif($s->sv_type == 4)
																Tham quan
															@elseif($s->sv_type == 5)
																Vui chơi
															@endif
														</p>
													</div>
												</a>
											</li>
										</ul>
									</div>
								@endforeach
						</div>
					</div>	
					@endif
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h5>Top dịch vụ có lượt xem nhiều nhất</h5>
				</div>
				
			</div>
			<div class="owl-carousel owl-theme">
				@if($sv_top_view != null)
					@foreach($sv_top_view as $s)
						<div class="item">
					    	<div class="grid-item">
					    		<div class="grid-img-thumb">
					    			<div class="ribbon">
					    				<span>{{$s->name_city}}</span>
					    			</div>
						    		<a href="detail/id={{$s->id_service}}&type={{$s->sv_type}}" title="{{$s->name}}">
						    			<img style="height: 214px" src="public/thumbnails/{{$s->image}}" alt="">
						    		</a>
						    	</div>
						    	<div class="grid-content">
						    		<div class="grid-price">
						    			{{-- <span>{{$s->rating}}</span> --}}
						    			<span class="pull-right">
						    				@if($s->rating == 0)
								    			@for($i=0; $i< 3; $i++)
								    				<i class="fas fa-star"></i>
								    			@endfor
								    		@else
								    			@for($i=0; $i < $s->rating; $i++)
								    				<i class="fas fa-star"></i>
								    			@endfor
								    		@endif
					    				</span>
						    		</div>
						    		<div class="grid-text">
						    			<div class="place-name" id="text-cham">{{$s->name}}</div>
						    			
						    		</div>
						    	</div>
					    	</div>    	
					    </div>
					@endforeach
				@endif
			</div>
		</div>
	</section>

	<section>
		<div style="" class="lam-la">
		  <h4>Lam dep trai</h4>
		  <div class="lam-content">
		    <div class="lam-left">
		      <img src="http://static.asiawebdirect.com/m/bangkok/portals/vietnam/homepage/ha-long-bay/attractions/pagePropertiesImage/halong-attractions.jpg.jpg" alt="">
		    </div>
		    <div class="lam-right" style="">
		      <i>3223</i><br>
		      <i>3223</i><br>
		      <i>3223</i><br>
		      <i>3223</i>
		    </div>
		  </div>
		</div>
	</section>
	

	<script type="text/javascript">
		var gmap = new google.maps.LatLng(10.765974,106.689422);
		var marker;
		var latitude = document.getElementById("latitude").getAttribute('data-lati');
		var longitude = document.getElementById("latitude").getAttribute('data-lon');
		var locations = [];
		// lay danh sach lan can
				function get_list_locations() {
					var locations = [];
					var path_list = 'http://localhost/vntour_api/get-location-service-vicinity/location='+ latitude +','+ longitude +'&radius=10000'
					$.ajax({
						url: path_list,
						type: 'GET'
					})
					.done(function (response) {
						console.log(response);
						response.forEach(function (data){
							var mang = {
								lat: parseFloat(data.lat), 
								lng:parseFloat(data.lng),
								name: data.name,
								img: data.image,
								rating: data.rating,
								type: data.sv_type,
								id: data.id_service,
								distance: (data.distance/1000).toFixed(2)
							};
							locations.push(mang);
						})
					});
					return locations;
				}

				locations = get_list_locations();
				
				var markers = [];
				var map;  
				  function drop() {
			        clearMarkers();

			        console.log(locations);
			        for (var i = 0; i < locations.length; i++) {
			          // addMarkerWithTimeout(locations[i], i * 200,i);
			          var marker = new google.maps.Marker({
				        position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
				        map: map
				      });
			          markers.push(marker);
		          	  var infowindow = new google.maps.InfoWindow();
			          google.maps.event.addListener(marker, 'click', (function(marker, i) {
				        return function() {
				          // var name = '<div>'+ locations[i]['name'] +'<div>';
				          var path_img = 'http://localhost/vntour_api/public/thumbnails/' + locations[i]['img'];
				          var path_detail = 'detail/id='+ locations[i]['id'] +'&type=' + locations[i]['type'];

				          //get rating
				          var rating_sv = 'Đánh giá: ';
				          if (parseFloat(locations[i]['rating']) > 0) 
				          {
				          	for (var j = 0; j < parseFloat(locations[i]['rating']); j++) {
				          		rating_sv += '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i>';
				          	}
				          }
				          else{
				          	rating_sv = 'Chưa đó đánh giá';
				          }
				          
				          var content = new String();
							content += '<div style="" class="lam-la">';
							content += '<h6>'+ locations[i]['name'] +'</h6>';
							content += '<div class="lam-content">';
							content += '<div class="lam-left">';
							content += '<img src="'+ path_img +'" alt="">';
							content += '</div>';
							content += '<div class="lam-right" style="">';
							content += rating_sv +'<br>';
							content += 'Khoảng cách: '+ locations[i]['distance'] +' Km<br><br>';

							content += '<a style="font-size:12px;" href="'+ path_detail +'" target="_blank">Chi tiết</a><br>';
							
							content += '</div>';
							content += '</div>';
							content += '</div>';
				          infowindow.setContent(content);
				          infowindow.open(map, marker);
				        }
				      })(marker, i));
			        }
			        // console.log(markers);
			      }

			      function addMarkerWithTimeout(position, timeout) {
			      	
			        window.setTimeout(function() {
			          markers.push(new google.maps.Marker({
			            position: position,
			            map: map,
			            animation: google.maps.Animation.DROP
			          }));

			          // add click
			          if (true) 
			          {
			          	for (var i = 1; i <= markers.length; i++) {
				          	var infowindow = new google.maps.InfoWindow({
					          content: '<div>'+ i +'<div>'
					        });
				          	markers[i].addListener('click', function() {
					          infowindow.open(map, this);
					        });
				          }
			          }
			        }, timeout);


			      }

			      function clearMarkers() {
			        for (var i = 0; i < markers.length; i++) {
			          markers[i].setMap(null);
			        }
			        markers = [];
			      }


		
		function initialize()
		{
		    var mapProp = {
		         center:new google.maps.LatLng(latitude,longitude),
		         zoom:16,
		        mapTypeId:google.maps.MapTypeId.ROADMAP
		    };
		 
		    map = new google.maps.Map(document.getElementById("googleMap")
		    ,mapProp);
		 
		  var styles = [
		    {
		      featureType: 'road.arterial',
		      elementType: 'all',
		      stylers: [
		        { hue: '#fff' },
		        { saturation: 100 },
		        { lightness: -48 },
		        { visibility: 'on' }
		      ]
		    },{
		      featureType: 'road',
		      elementType: 'all',
		      stylers: [
		 
		      ]
		    },
		    {
		        featureType: 'water',
		        elementType: 'geometry.fill',
		        stylers: [
		            { color: '#adc9b8' }
		        ]
		    },{
		        featureType: 'landscape.natural',
		        elementType: 'all',
		        stylers: [
		            { hue: '#809f80' },
		            { lightness: -35 }
		        ]
		    }
		  ];
		 
		  var styledMapType = new google.maps.StyledMapType(styles);
		  map.mapTypes.set('Styled', styledMapType);
		  	

		    // Add the markers and infowindows to the map

		    // if (locations.length > 0) 
		    // {
		    // 	for (var i = 0; i < locations.length; i++) {  
				  // var myLatLng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};
			   //    var marker = new google.maps.Marker({
			   //      position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
			   //      map: map
			       
			   //    });

			   //    markers.push(marker);

			   //    google.maps.event.addListener(marker, 'click', (function(marker, i) {
			   //      return function() {
			   //        infowindow.setContent(locations[i][0]);
			   //        infowindow.open(map, marker);
			   //      }
			   //    })(marker, i));
			   //  }
		    // }
			    
		 
		  var myLatLng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};
		  var contentString = '<div><h6>'+ $('#sv_name').text() +'</h6><p>Địa điểm đang xét</p></div>';
		  // var contentString = '<div style="" class="lam-la">';
				// 			contentString += '<h6>'+ $('#sv_name').text() +'</h6>';
				// 			contentString += '<div class="lam-content">';
				// 			contentString += '<div class="lam-left">';
				// 			var path_img_sv = 'http://localhost/vntour_api/public/thumbnails/' + $('#img_sv').val();
				// 			contentString += '<img src="'+ path_img_sv +'" alt="">';
				// 			contentString += '</div>';
				// 			contentString += '<div class="lam-right" style="">';
				// 			contentString += 'Địa điểm đang xem chi tiết';
				// 			// contentString += 'Khoảng cách: '+ locations[i]['distance'] +' Km<br><br>';

				// 			// contentString += '<a style="font-size:12px;" href="'+ path_detail +'" target="_blank">Chi tiết</a><br>';
							
				// 			contentString += '</div>';
				// 			contentString += '</div>';
				// 			contentString += '</div>';
		  var infowindow = new google.maps.InfoWindow({
	          content: contentString
	        });
		  marker = new google.maps.Marker({
		    map:map,
		    draggable:false,
		    animation: google.maps.Animation.DROP,
		    position: myLatLng,
		    icon: 'public/resource/images/icons/ic_place_blue_36dp.png'
		  });
		  google.maps.event.addListener(marker, 'click', function function_name() {
		  	infowindow.open(map, marker);
		  });
		}
		 
		function toggleBounce() {
		 
		  if (marker.getAnimation() !== null) {
		    marker.setAnimation(null);
		  } else {
		    marker.setAnimation(google.maps.Animation.BOUNCE);
		  }
		}
		 
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>




	<script src="public/resource/js/lightbox.min.js"></script>
	<script src="public/resource/js/detail-hotel.js"></script>
	<script src="public/resource/js/menu-style.js"></script>

	{{-- <script src="resource/js/menu-style.js"></script> --}}
	<script src="public/resource/lightbox/jquery.fluidbox.min.js"></script>

	<script>
		$(function () {			
			$('.demo a[data-fluidbox]').fluidbox();
		});
	</script>

	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded",function () {
		    var aTab = document.getElementsByClassName('tab-lam');
		    
		    for (var i = 0; i < aTab.length; i++) {
		        aTab[i].onclick = function(){
		        	// console.log(aTab[i]);
		            for (var i = 0; i < aTab.length; i++) {
		                aTab[i].classList.remove('active');
		            }
		            this.classList.add('active');
		        }
		    }
		    
		},false);
	</script>
	
	<script src="public/resource/js/p/detail.js"></script>
	<script src="public/resource/JSsocial/jssocials.js"></script>
	
	<script type="text/javascript" src="public/resource/js/owl.carousel.js"></script>
	<script type="text/javascript">
		$('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:false,
		    dots:false,
		    autoplay:true,
    		autoplayTimeout:2000,
    		autoplayHoverPause:true,
		    responsive:{
		        0:{
		            items:3
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:5
		        }
		    }
		});
		$('.owl-carousel').on('mousewheel', '.owl-stage', function (e) {
		    if (e.deltaY>0) {
		        $('.owl-carousel').trigger('next.owl');
		    } else {
		        $('.owl-carousel').trigger('prev.owl');
		    }
		    e.preventDefault();
		});

		$(".next-owl").on('click',function(){        
		   $('.owl-carousel').trigger('next.owl');
		})      
		$(".prev-owl").on('click',function(){        
		   $('.owl-carousel').trigger('prev.owl');
		})
	</script>
	
	<script type="text/javascript">
		$(document).ready(function(){
  
		  /* 1. Visualizing things on Hover - See next part for action on click */
		  $('#stars li').on('mouseover', function(){
		    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
		   
		    // Now highlight all the stars that's not after the current hovered star
		    $(this).parent().children('li.star').each(function(e){
		      if (e < onStar) {
		        $(this).addClass('hover');
		      }
		      else {
		        $(this).removeClass('hover');
		      }
		    });
		    
		  }).on('mouseout', function(){
		    $(this).parent().children('li.star').each(function(e){
		      $(this).removeClass('hover');
		    });
		  });
		  
		  
		  /* 2. Action to perform on click */
		  $('#stars li').on('click', function(){
		    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
		    var stars = $(this).parent().children('li.star');
		    
		    for (i = 0; i < stars.length; i++) {
		      $(stars[i]).removeClass('selected');
		    }
		    
		    for (i = 0; i < onStar; i++) {
		      $(stars[i]).addClass('selected');
		    }
		    
		    // JUST RESPONSE (Not needed)
		    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
		    var msg = "";
		    if (ratingValue > 1) {
		        $('#txtrating').val(ratingValue);
		        $('#txtrating2').val(ratingValue);
		    }
		    else {
		        $('#txtrating').val(0);
		        $('#txtrating2').val(0);
		    }
		    
		  });
		  
		  
		});

	</script>

	<script type="text/javascript">
		$("#share").jsSocials({
            shares: [{
		        share: "facebook",
		        logo: "http://js-socials.com/demos/fb-logo.png"
		    }],
            url: "https://www.facebook.com/lam.themen",
		    label: "Share",
		    logo: "fa-facebook-square",
		    showLabel: false,
		    showCount: false,
		    shareIn: "popup"
        });

	</script>

@include('VietNamTour.header-footer.footer')