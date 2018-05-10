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
							<div class="col-md-8 col-sm-3">
								<div class="input-group custom-search">
									{{-- <input type="text" class="form-control" placeholder="" value="Từ khóa tìm kiếm {{$keyword}}" readonly="readonly"> --}}
									<label style="margin-top: 5px;">Từ khóa tìm kiếm 
										<span style="color: red;">{{$keyword}}</span>
									</label>
									<label style="margin-top: 5px; margin-left: 10px;">Tổng số kết quả: 
										<span style="color: red;">{{$count}}</span>
									</label>
									<label style="margin-top: 5px; margin-left: 10px;">Mã Tỉnh thành phố:
										@if($id_city == "all") 
											<span style="color: red;">Tất cả</span>
										@else
											<span style="color: red;">{{$id_city}}</span>
										@endif
									</label>
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
						<div class="box-body">
							<ul style="padding: 14px 15px 10px 15px;">
								<li>
									<a href="">
										<img style="height: 50px;" src="public/resource/images/img-BaiViet/9.jpg" alt="">
										<span class="">
											<h6>lamtranduc</h6>
											<p style="color: #ddd;">đasadaddadadasdsd</p>
										</span>
									</a>
								</li>
								<li>
									<a href="">
										<img style="height: 50px;" src="public/resource/images/img-BaiViet/9.jpg" alt="">
										<span class="">
											<h6>lamtranduc</h6>
											<p style="color: #ddd;">đasadaddadadasdsd</p>
										</span>
									</a>
								</li>
							</ul>
						</div>
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
											<a href="detail/id={{$r->id_service}}&type={{$r->sv_type}}"><img style="height: 265px;" src="public/thumbnails/{{$r->image}}" alt=""></a>
											<div class="destination-name">
												<h4>{{$r->name}}</h4>
												<h5>{{$r->name_city}}</h5>
											</div>
											<div class="destination-icon">	
												<a>{{$r->rating}} <i class="far fa-star"></i></a>	
												<a>{{$r->view}} <i class="fas fa-eye"></i></a>
												<a>{{$r->like}} <i class="far fa-heart"></i></a>
												<a>{{$r->point}} <i class="far fa-bookmark"></i></a>
											</div>
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

	<!-- <script src="resource/js/lightbox.min.js"></script> -->
	<!-- <script src="resource/js/menu-style.js"></script> -->
	<script src="public/resource/js/p/place_city.js"></script>
	<script src="public/resource/js/p/pageSearch.js"></script>

@include('VietNamTour.header-footer.footer')
