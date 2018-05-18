@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/chat.css">



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
										<img src="public/thumbnails/{{$sv->image_details_1}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="public/thumbnails/{{$sv->image_details_2}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="public/thumbnails/{{$sv->image_banner}}"/>
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
								<span>{{$sv->sv_rating}}</span> <i class="fas fa-star"></i>
								
								<span style="color: black" id="loaihinhdichvu">
									@if($sv->sv_types == "1")
										- Ăn uống
									@elseif($sv->sv_types == "2")
										- Khách sạn
									@elseif($sv->sv_types == "3")
										- Phương tiện
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
								<div class="col-md-6 text-center">
									<a title="Lượt xem">
										<i class="fas fa-eye"></i>
										{{$sv->sv_view}}
									</a>
								</div>
								<div class="col-md-6 text-center">
									<a id="like01">
										<i id="color-like" class="fas fa-heart"></i>
										<span id="num_like">{{$sv->sv_like}}</span>
									</a>
								</div>
								{{-- <div class="col-md-3 text-center">
									<a id="">
										<i class="fas fa-share"></i>
									</a>
								</div> --}}
							</div>
							<br>	
							<div class="service">
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
										<span id="giomocua">{{$sv->sv_close}}</span> {{-- gio mo cua --}}
										<i class="fas fa-arrow-right"></i> 
										<span id="giodongcua">{{$sv->sv_open}}</span> {{-- gio mo cua --}}
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
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_1" data-toggle="tab" style="text-align: center;">
										Giới thiệu </a>
									</li>
									<li class="tab-lam active" style="width: 25%;">
										<a href="#tab_default_2" data-toggle="tab" style="text-align: center;">
										Album ảnh </a>
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
											{!! $sv->sv_description !!}
										</div>
									</div>

									<div class="tab-pane active" id="tab_default_2">
										<h5 style="font-weight: 700;padding-left: 17px;">Album ảnh</h5>
										<section class="demo" style="background-color: transparent;">
											<div class="gallery">
												<a style="background-color: transparent;" href="public/thumbnails/{{$sv->image_banner}}" title="" data-fluidbox class="col-12"><img src="public/thumbnails/{{$sv->image_banner}}" alt="" title="" /></a>

												<a href="public/thumbnails/{{$sv->image_details_1}}" title="" data-fluidbox class="col-6">
													<img src="public/thumbnails/{{$sv->image_details_1}}" alt="" title="" />
												</a>

												<a href="public/thumbnails/{{$sv->image_details_2}}" title="" data-fluidbox class="col-6">
													<img src="public/thumbnails/{{$sv->image_details_2}}" alt="" title="" />
												</a>

												<a href="public/thumbnails/{{$sv->image_banner}}" title="" data-fluidbox class="col-4"><img src="public/thumbnails/{{$sv->image_banner}}" alt="" title="" />
												</a>

												<a href="public/thumbnails/{{$sv->image_details_1}}" title="" data-fluidbox class="col-4"><img src="public/thumbnails/{{$sv->image_details_1}}" alt="" title="" />
												</a>

												<a href="public/thumbnails/{{$sv->image_details_2}}" title="" data-fluidbox class="col-4"><img src="public/thumbnails/{{$sv->image_details_2}}" alt="" title="" />
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
										                		<a class="btn  btn-sm btn-outline-primary" href="{{route('loginW')}}">Đăng nhập ngay</a>
										                	</div>
										                @else
										                	@if($checkUserRating == null)
										                		<div class="ibox-content">
												                	Bạn chưa đánh giá về địa điểm này - <button class="btn  btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">Đánh giá ngay</button>
												                </div>
																<!-- Modal -->
																<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
																  <div class="modal-dialog modal-dialog-centered" role="document">
																    <div class="modal-content">
																      <div class="modal-header">
																        <h5 class="modal-title" id="exampleModalLongTitle">Đánh giá</h5>
																        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																          <span aria-hidden="true">&times;</span>
																        </button>
																      </div>
																      <div class="modal-body" style="height: 150px;">
																        <div class="form-group row" style="margin-bottom: 0px;">
																		    <label for="staticEmail" class="col-sm-2 col-form-label">Điểm</label>
																		    <div class="col-sm-10">
																		      <div class="input-group mb-3">
																				  <input type="number" class="form-control" placeholder="0" min="1" max="5" aria-label="Recipient's username" aria-describedby="basic-addon2" id="txtrating">

																				  <div class="input-group-append">
																				    <span class="input-group-text" id="basic-addon2" style="background-color: transparent;"><i style="color: yellow;" class="fas fa-star"></i></span>
																				  </div>
																				</div>
																				<span id="errorating" style="color: red; display: none;">Bạn chưa đánh giá kìa</span>
																				  <span id="erroratingPoint" style="color: red; display: none;">Điểm không được vượt quá 5</span>
																		    </div>
																		  </div>

																		  <div class="form-group row">
																		    <label for="staticEmail" class="col-sm-2 col-form-label">Đánh giá</label>
																		    <div class="col-sm-10">
																		      <div class="input-group mb-3">
																				  <textarea class="form-control" style="width: 100%;" id="txtdetail"></textarea>
																				</div>
																				<span class="col-md-12" id="errordetail" style="color: red; display: none;">Vui lòng nhập nội dung đánh giá</span>
																		    </div>
																		    
																		    
																		  </div>
																      </div>
																      <div class="modal-footer">
																        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Thoát</button>

																        <button id="btnsave" type="button" class="btn btn-primary btn-sm">Đánh giá</button>
																      </div>
																    </div>
																  </div>
																</div>
											               	@else
											               		@foreach($checkUserRating as $ra)
											               		<div id="listRating" class="chat-discussion" style="background-color: white; height: 100px; overflow: hidden;">
												               		<div class="chat-message left">
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
									                                </div>
									                            </div>

									                            <div class="modal fade" id="suadanhgia" tabindex="-1" role="dialog" aria-labelledby="suadanhgia" aria-hidden="true">
																  <div class="modal-dialog modal-dialog-centered" role="document">
																    <div class="modal-content">
																      <div class="modal-header">
																        <h5 class="modal-title" id="exampleModalLongTitle">Đánh giá</h5>
																        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																          <span aria-hidden="true">&times;</span>
																        </button>
																      </div>
																      <div class="modal-body" style="height: 150px;">
																        <div class="form-group row" style="margin-bottom: 0px;">
																		    <label for="staticEmail" class="col-sm-2 col-form-label">Điểm</label>
																		    <div class="col-sm-10">
																		      <div class="input-group mb-3">
																				  <input type="number" class="form-control" placeholder="0" min="1" max="5" aria-label="Recipient's username" aria-describedby="basic-addon2" id="txtrating2" value="{{$ra->vr_rating}}">

																				  <div class="input-group-append">
																				    <span class="input-group-text" id="basic-addon2" style="background-color: transparent;"><i style="color: yellow;" class="fas fa-star"></i></span>
																				  </div>
																				</div>
																				<span id="errorating" style="color: red; display: none;">Bạn chưa đánh giá kìa</span>
																				  <span id="erroratingPoint" style="color: red; display: none;">Điểm không được vượt quá 5</span>
																		    </div>
																		  </div>

																		  <div class="form-group row">
																		    <label for="staticEmail" class="col-sm-2 col-form-label">Đánh giá</label>
																		    <div class="col-sm-10">
																		      <div class="input-group mb-3">
																				  <textarea class="form-control" style="width: 100%;" id="txtdetail2">{{$ra->vr_ratings_details}}</textarea>
																				</div>
																				<span class="col-md-12" id="errordetail" style="color: red; display: none;">Vui lòng nhập nội dung đánh giá</span>
																		    </div>
																		    
																		    
																		  </div>
																      </div>
																      <div class="modal-footer">
																        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Thoát</button>

																        <button id="btnsave2" type="button" class="btn btn-primary btn-sm">Đánh giá</button>
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
										                                <div class="chat-message left">
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
										                                </div>
										                                @endforeach
										                            @else
										                            	<h5>Chưa có đánh giá về dịch vụ này</h5>
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
									<li>
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
	

	<script type="text/javascript">
		var gmap = new google.maps.LatLng(10.765974,106.689422);
		var marker;
		var latitude = document.getElementById("latitude").getAttribute('data-lati');
		var longitude = document.getElementById("latitude").getAttribute('data-lon');
		function initialize()
		{
		    var mapProp = {
		         center:new google.maps.LatLng(latitude,longitude),
		         zoom:16,
		        mapTypeId:google.maps.MapTypeId.ROADMAP
		    };
		 
		    var map=new google.maps.Map(document.getElementById("googleMap")
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
		 
		  marker = new google.maps.Marker({
		    map:map,
		    draggable:true,
		    animation: google.maps.Animation.DROP,
		    position: gmap
		  });
		  google.maps.event.addListener(marker, 'click', toggleBounce);
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


@include('VietNamTour.header-footer.footer')