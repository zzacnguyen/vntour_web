@include('VietNamTour.header-footer.header')


<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/place.css">

<style media="screen">
	.active-type{
		color: #fec107 !important;
	}
	.conlam{
		cursor: pointer;
	}

	.lime-clam{
	    width: 100%;
	    height: 20px;
	    overflow: hidden;
	    display: block;
	    display: -webkit-box;
	    -webkit-line-clamp: 1;
	    -webkit-box-orient: vertical;
	    text-overflow: ellipsis;
	}
</style>

<section class="place-inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" id="boloc" style="margin-top: 100px;">
					<div class="tools-ber">
						<div class="row">
							{{-- <div class="col-md-3 col-sm-3">
								<div class="input-group custom-search">
									<input type="text" class="form-control" placeholder="" value="Từ khóa tìm kiếm {{$keyword}}" readonly="readonly">
									<span class="input-group-btn">
										<button class="btn place-search">
											<span><i class="fas fa-search"></i></span>
										</button>
									</span>
								</div>	
							</div> --}}
							<div class="col-md-12 col-sm-3">
								<div class="input-group custom-search">
									{{-- <input type="text" class="form-control" placeholder="" value="Từ khóa tìm kiếm {{$keyword}}" readonly="readonly"> --}}
									<label style="margin-top: 5px;">Từ khóa tìm kiếm 
										<span style="color: red;">{{$keyword}}</span>
									</label>
									<label style="margin-top: 5px; margin-left: 10px;">Tổng số kết quả: 
										<span style="color: red;">{{$count}}</span>
									</label>
									{{-- <label style="margin-top: 5px; margin-left: 10px;">Mã Tỉnh thành phố:
										@if($id_city == "all") 
											<span style="color: red;">Tất cả</span>
										@else
											<span style="color: red;">{{$id_city}}</span>
										@endif
									</label> --}}
									<label style="margin-top: 5px; margin-left: 10px;">Loại hình:
										@if($id_type == 1) 
											<span style="color: red;">Ăn uống</span>
										@elseif($id_type == 2)
											<span style="color: red;">Khách sạn</span>
										@elseif($id_type == 3)
											<span style="color: red;">Phương tiện</span>
										@elseif($id_type == 4)
											<span style="color: red;">Tham quan</span>
										@elseif($id_type == 5)
											<span style="color: red;">Tham quan</span>
										@else
											<span style="color: red;">Tất cả</span>
										@endif
									</label>
									<button class="btn btn-primary float-right" style="margin-left: 20px;border-radius: 0;background-color: #00a680;border: 1px solid #00a680" id="btntimquanhday" data-toggle="modal" data-target="#myModal">
										Tìm quanh đây
									</button>
									<div id="myModal" class="modal fade" role="dialog" style="margin-top: 100px;">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
								    	<form action="{{route('search-vicinity')}}" method="post" name="formtimquanhday" id="timquanhday_id">
									      <div class="modal-header">
									      	<h4 class="modal-title">Tọa độ của bạn</h4>
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									      </div>

									      <div class="modal-body">
									      	<div class="form-group col-md-12 row">
									      		<small class="col-md-12" style="color: red;">Chúng tôi cần biết vị trí của bạn để thục hiện chức năng này</small>
											    
										  	</div>
										  	<div class="form-group col-md-12 row">
											    <label class="col-md-3" for="exampleInputEmail1">Vĩ độ</label>
											    <div class="col-md-9">
											    	<input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Kinh độ" required="required" name="txtlat" readonly>
											    </div>
										  	</div>
										  	<div class="form-group col-md-12 row">
											    <label class="col-md-3" for="exampleInputEmail1">Kinh độ</label>
											    <div class="col-md-9">
											    	<input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Vĩ độ" required="required" name="txtlon" readonly>
											    </div>
										  	</div>
										  	<div class="form-group col-md-12 row">
											    <label class="col-md-3" for="exampleInputEmail1">Khoảng cách</label>
											    <div class="col-md-9">
											    	<input type="number" class="form-control" id="" aria-describedby="emailHelp" placeholder="Kinh độ" required="required" name="txtradius" value="1000">
											    </div>
										  	</div>
									      </div>

									      <div class="modal-footer">
									        <button type="button" style="margin-bottom: 0;background: #de5959;padding: 6px 12px !important;border-radius: 0px !important;border:1px solid #de5959" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
							        		<button type="button" class="btn btn-primary" style="margin-bottom: 0;padding: 6px 41px !important;border-radius: 0px !important;margin-left: 9px;border: 1px solid #00a680;background-color: #00a680;" id="btn-timquanhday-sub">Tìm kiếm
							        		</button>
									      </div>
										</form>
									    </div>

									  </div>
									</div>
								</div>	
							</div>
							
							<div class="col-md-1"></div>
							
							
						</div>
					</div><!-- end tools-ber -->
				</div>
				<!-- left -->
				<div class="col-md-3 col-sm-4">
					@if($flag == 1)
						@if($flag_con == 0)
							<div class="left-box">
								<div class="box-title">
									Kết quả tìm kiếm
									{{-- <span>210</span> --}}
									<input type="hidden" value="{{$id_type}}" id="idtype">
									<input type="hidden" value="{{$id_city}}" id="idcity">
									<input type="hidden" value="{{$keyword}}" id="keywordd">
								</div>
								<div class="box-body">
									<ul>
										<li><a class="active-type selectcon conlam" id="allser">Tất cả<span></span></a>
										</li>
										<li><a id="see" class="selectcon conlam">Tham quan<span>{{$count_type['see']}}</span></a>
										</li>
										<li>
											<a id="eat" class="selectcon conlam">Ăn uống <span>{{$count_type['eat']}}</span></a>
										</li>
										<li><a id="hotel" class="selectcon conlam"> Khách sạn<span>{{$count_type['hotel']}}</span></a></li>
										<li><a id="enter" class="selectcon conlam"> Vui chơi<span>{{$count_type['enter']}}</span></a></li>
										<li><a id="tran" class="selectcon conlam"> Phương tiện<span>{{$count_type['tran']}}</span></a></li>
									</ul>
								</div>
							</div>
						@else
							<div class="left-box">
								<div class="box-title">
									Kết quả tìm kiếm
									{{-- <span>210</span> --}}
								</div>
								<div class="box-body">
									<ul>
										<li><a href="" class="active-type">Tất cả<span></span></a>
										</li>
										<li><a href="">Tham quan<span>{{$count_type['see']}}</span></a>
										</li>
										<li>
											<a href="">Ăn uống <span>{{$count_type['eat']}}</span></a>
										</li>
										<li><a href=""> Khách sạn<span>{{$count_type['hotel']}}</span></a></li>
										<li><a href=""> Vui chơi<span>{{$count_type['enter']}}</span></a></li>
										<li><a href=""> Phương tiện<span>{{$count_type['tran']}}</span></a></li>
									</ul>
								</div>
							</div>
						@endif	
					@endif
					

					<div class="left-box">
						<div class="box-title text-center">
							Những dịch vụ được tìm kiếm nhiều nhất
							{{-- <span></span> --}}
						</div>
						@if($top_search != null)
							
							<div class="box-body">
								<ul style="padding: 14px 15px 10px 15px;">
									@foreach($top_search as $top)
									<li>
										<a href="detail/id={{$top->sv_id}}&type={{$top->sv_type}}">
											<img style="height: 50px;" src="public/thumbnails/{{$top->sv_image}}" alt="null">
											<span class="" style="width: 137px;">
												<h6 class="lime-clam">{{$top->sv_name}}</h6>
												<p style="color: #ddd; height: 15px;overflow: hidden;">{{$top->sv_description}}</p>
											</span>
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						@endif
					</div>
				</div><!-- end left -->
				<!-- right -->
				<div class="col-md-9 .col-sm-8">
					<div class="place-list-content">
						<div class="row" id="content_place">
						@if($flag == 1)
							@if($result_all == null)
								<h4>Không tìm thấy</h4>
							@else
								@foreach($result_all as $r)
									<div class="col-md-4 col-sm-6 col-12 thumbnail-padding">
										<div class="destination-grid">
											{{-- detail-search/id=53&type=3 --}}
											<a class="searchdichvu" href="detail-search/id={{$r->id_service}}&type={{$r->sv_type}}" data-id="{{$r->id_service}}" data-type="{{$r->sv_type}}"><img style="height: 265px; cursor: pointer;" src="public/thumbnails/{{$r->image}}" alt="" ></a>
											<div class="destination-name">
												<h4>{{$r->name}}</h4>
												<h5>{{$r->name_city}}</h5>
											</div>
											<div class="destination-icon">	
												<a>{{$r->rating}} <i class="far fa-star"></i></a>	
												<a>{{$r->view}} <i class="fas fa-eye"></i></a>
												<a>{{$r->like}} <i class="far fa-heart"></i></a>
												<a>{{$r->point}} <i class="fas fa-share-alt"></i></a>
											</div>
											{{-- <input type="hidden" value="{{$r->id_service}}" id="id_service"> --}}
										</div>
									</div>	
								@endforeach
							@endif
						
						@elseif($flag == 3)
							@if($mangghe == null)
								<h4>Không tìm thấy</h4>
							@else
								@foreach($mangghe as $rr)
									<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" >
										<div class="destination-grid">
											<a href=""><img style="height: 265px;" src="public/thumbnails/{{$rr['image']}}" alt=""></a>
											<div class="destination-name">
												<h4>{{$rr['name']}}</h4>
												<h5>{{$rr['name']}}</h5>
											</div>
											<div class="destination-icon">	
												<a>{{$rr['rating']}} <i class="far fa-star"></i></a>	
												<a>{{$rr['view']}} <i class="fas fa-eye"></i></a>
												<a>{{$rr['like']}} <i class="far fa-heart"></i></a>
												<a>{{$rr['point']}} <i class="far fa-bookmark"></i></a>
											</div>
										</div>
									</div>	
								@endforeach
							@endif
						@endif
						
							
							
						</div>
					</div><!-- end place-list-content -->
				</div><!-- end right -->
			</div> <!-- end row -->
		</div>
</section>

<div class="container">
	<script>
		var apiGeolocationSuccess = function(position) {
            // alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
            $('input[name=txtlat').val('sdcccc');
            $('input[name=txtlon').val(position.coords.longitude);
        };

        var tryAPIGeolocation = function() {
            jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
                apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
          })
          .fail(function(err) {
            alert("API Geolocation error! \n\n"+err);
          });
        };

        var browserGeolocationSuccess = function(position) {
            // alert("Browser geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
            $('input[name=txtlat').val(position.coords.latitude);
            $('input[name=txtlon').val(position.coords.longitude);
        };

        var browserGeolocationFail = function(error) {
          switch (error.code) {
            case error.TIMEOUT:
              alert("Browser geolocation error !\n\nTimeout.");
              break;
            case error.PERMISSION_DENIED:
              if(error.message.indexOf("Only secure origins are allowed") == 0) {
                tryAPIGeolocation();
              }
              break;
            case error.POSITION_UNAVAILABLE:
              alert("Browser geolocation error !\n\nPosition unavailable.");
              break;
          }
        };

        var tryGeolocation = function() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                browserGeolocationSuccess,
              browserGeolocationFail,
              {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
          }
        };


// tryGeolocation();
	</script>
</div>

	<!-- <script src="resource/js/lightbox.min.js"></script> -->
	<!-- <script src="resource/js/menu-style.js"></script> -->
	<script src="public/resource/js/p/place_city.js"></script>
	<script src="public/resource/js/p/pageSearch.js"></script>

@include('VietNamTour.header-footer.footer')
