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
	.selectcon{
		cursor: pointer;
	}
	
</style>



	<section class="place-inner" style="margin-top: 100px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" id="boloc">
					<div class="tools-ber">
						<div class="row">
							<div class="col-md-4 col-sm-3 col-6">
								<label>Tổng số kết quả</label>
								<label class="btn place-search" style="background-color: white;border: 1px solid #ddd;border-radius: 0;">
									<span style="color: red;">{{$count_result}}</span>
								</label>
							</div>
							<div class="col-md-8 float-right">
								<form action="{{route('search-vicinity')}}" method="post" style="width: 100%" class="row">
									<div class="col-md-5 col-sm-3">
											<input type="hidden" value="{{$lat}}" name="txtlat">
											<input type="hidden" value="{{$lon}}" name="txtlon">
											<div class="input-group custom-search">
												<label style="margin-top: 6px;margin-right: 10px;">Khoảng cách </label>
												<input type="number" class="form-control" placeholder="Khoảng cách" min="1000" max="10000" value="{{$radius}}" name="txtradius">
											</div>
									</div>
									<div class="col-md-1 col-sm-3 col-6" style="padding-left: 0;">
										<!-- filter select -->
										<button type="submit" class="btn place-search" style="background-color: white;border: 1px solid #ddd;border-radius: 0;">
											<span><i class="fas fa-search"></i></span>
										</button>
									</div>
								</form>
							</div>

						</div>
					</div><!-- end tools-ber -->
				</div>
				<!-- left -->
				<div class="col-md-3 .col-sm-4">
					<div class="left-box">
						<div class="box-title">
							Kết quả tìm kiếm
							{{-- <span>210</span> --}}
						</div>
						<div class="box-body">
							<ul>
								<li>
									<a id="see" class="selectcon">Tham quan<span>{{$count_type['see']}}</span></a>
								</li>

								<li>
									<a id="eat" class="selectcon">Ăn uống<span>{{$count_type['eat']}}</span></a>
								</li>

								<li>
									<a id="hotel" class="selectcon">Khách sạn<span>{{$count_type['hotel']}}</span></a>
								</li>

								<li>
									<a id="enter" class="selectcon">Vui chơi<span>{{$count_type['enter']}}</span></a>
								</li>

								<li>
									<a id="tran" class="selectcon">Phương tiện<span>{{$count_type['tran']}}</span></a>
								</li>
							</ul>
						</div>
					</div>
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
							@if($result == null)
								<h4>Rất tiếc hiện tại không có dịch vụ nào gần bạn</h4>
							@else
								@foreach($result as $s)
									<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">
										<div class="destination-grid">
											<a href="detail-search/id={{$s->id_service}}&type={{$s->sv_type}}" title="{{$s->name}}">
												<img id="image345" style="height:265px;" src="public/thumbnails/{{$s->image}}" alt="null">
											</a>
											<div class="destination-name">
												<h4>{{$s->name}}</h4>
												<h5>{{number_format(round($s->distance/1000,2),2,',','.')}} Km</h5>
											</div>
											<div class="destination-icon">	
												<a>{{$s->rating}} <i class="far fa-star"></i></a>	
												<a>{{$s->view}} <i class="fas fa-eye"></i></a>
												<a>{{$s->like}} <i class="far fa-comment"></i></a>
												<a>{{$s->point}} <i class="far fa-bookmark"></i></a>
											</div>
										</div>
									</div>
								@endforeach
									
							@endif
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

	{{-- <script src="resource/js/lightbox.min.js"></script> --}}
	<script src="public/resource/js/menu-style.js"></script>
	<script src="public/resource/js/p/pageSearchVicinity.js"></script>


@include('VietNamTour.header-footer.footer')