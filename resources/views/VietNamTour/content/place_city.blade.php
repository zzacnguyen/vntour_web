@include('VietNamTour.header-footer.header')
{{-- <link rel="stylesheet" href="resource/css/hotel.css"> --}}
<link rel="stylesheet" href="resource/css/hotel-detail.css">
<link rel="stylesheet" href="resource/css/lightbox.min.css">
<link rel="stylesheet" href="resource/css/place.css">

	<section class="place-inner" style="margin-top: 100px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" id="boloc">
					<div class="tools-ber">
						<div class="row">
							<div class="col-md-3 col-sm-3">
								<div class="input-group custom-search">
									<!-- <input type="text" class="form-control" placeholder="Search...">
									<span class="input-group-btn">
										<button class="btn place-search">
											<span><i class="fas fa-search"></i></span>
										</button>
									</span> -->
								</div>	
							</div>
							<div class="col-md-2 col-sm-3 col-6" style="padding-left: 2px;">
								<!-- filter select -->
								<div class="select-filter">
									<select name="" id="">
										<option value="">Mới nhất</option>
										<option selected>Xem nhiều nhất</option>
										<option>Điểm cao nhất</option>
									</select>
								</div>
							</div>
							<div class="col-md-2 col-sm-3 col-6">
								<div class="select-filter">
									<select name="" id="">
										<option value="">Quận ninh Kiều</option>
										<option selected>Quận Bình Thủy</option>
										<option>Quận Cái Răng</option>
									</select>
								</div>
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-1 text-right-filter"><span>Hiển thị</span></div>
							<div class="col-md-1 float-right">
								<div class="select-filter" style="width: 55px;">
									<select name="" id="">
										<option value="">9</option>
										<option selected>18</option>
										<option>27</option>
									</select>
								</div>
							</div>
						</div>
					</div><!-- end tools-ber -->
				</div>
				<!-- left -->
				<div class="col-md-3 .col-sm-4">
					<div class="left-box">
						<div class="box-title">
							{{$sum['name']}}
							<span>{{$sum['sum']}}</span>
						</div>
						<div class="box-body">
							<ul>
								<li id="see" style="cursor: pointer;">
									<a>Tham quan
										<span>{{$count_sv['see']}}</span>
									</a>
								</li>
								<li id="eat" style="cursor: pointer;">
									<a>Ăn uống
										<span>{{$count_sv['eat']}}</span>
									</a>
								</li>
								<li id="hotel" style="cursor: pointer;">
									<a>Khách sạn
										<span>{{$count_sv['hotel']}}</span>
									</a>
								</li>
								<li id="enter" style="cursor: pointer;">
									<a>Vui chơi
										<span>{{$count_sv['enter']}}</span>
								</a>
								</li>
								<li id="tran" style="cursor: pointer;">
									<a>Phương tiện
										<span>{{$count_sv['tran']}}</span>
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
							@foreach($all_place as $p)
							<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">
								<div class="destination-grid">
									<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id={{$p['sv_id']}}&type={{$p['sv_type']}}">
										<img src="thumbnails/{{$p['image']}}" alt="Error" style="min-height: 265px;">
									</a>
									<div class="destination-name">
										<h4>{{$p['name']}}</h4>
										{{-- <h5>Quang Ninh</h5> --}}
									</div>
									<div class="destination-icon">	
										<a>{{$p['rating']}} <i class="far fa-star"></i></a>	
										<a>{{$p['view']}} <i class="fas fa-eye"></i></a>
										<a>{{$p['like']}} <i class="far fa-thumbs-up"></i></a>
										<a>{{$p['point']}} <i class="far fa-bookmark"></i></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div><!-- end place-list-content -->
					<div class="pagination-inner">
						<div class="row">
							<div class="col-md-2 col-sm-2">
								<div class="prev">
									<a href=""><i class="fas fa-arrow-left"></i></a>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-12">
								<div class="float-center">
									<ul class="pagination">
										<li class="page-item activee"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">4</a></li>
										<li class="page-item"><a class="page-link" href="#">...</a></li>
										<li class="page-item"><a class="page-link" href="#">20</a></li>
									</ul>
								</div>
								
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="prev text-right float-right">
									<a href=""><i class="fas fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
						
					</div>
				</div><!-- end right -->
			</div> <!-- end row -->
		</div>
	</section>

	<script src="resource/js/lightbox.min.js"></script>
	<script src="resource/js/menu-style.js"></script>
	<script src="resource/js/p/place_city.js"></script>

@include('VietNamTour.header-footer.footer')