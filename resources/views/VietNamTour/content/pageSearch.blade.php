@include('VietNamTour.header-footer.header')


<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/place.css">

<style media="screen">
	.active-type{
		color: #fec107 !important;
	}
</style>

<section class="place-inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" id="boloc" style="margin-top: 100px;">
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
					<div class="left-box">
						<div class="box-title">
							Cần Thơ
							<span>210</span>
						</div>
						<div class="box-body">
							<ul>
								<li><a href=""><i class="fas fa-camera-retro" style="color: #00a680;"></i> Tham quan<span>20</span></a>
								</li>
								<li>
									<a href="">
										<i class="fas fa-utensils" style="color: #00a680;"></i>          
										Ăn uống
										<span>50</span>
									</a>
								</li>
								<li><a href=""><i class="fas fa-bed" style="color: #00a680;"></i> Khách sạn<span>20</span></a></li>
								<li><a href=""><i class="fas fa-puzzle-piece"></i> Vui chơi<span>20</span></a></li>
								<li><a href=""><i class="fas fa-bus" style="color: #4dadf7"></i> Phương tiện<span>100</span></a></li>
							</ul>
						</div>
					</div>
				</div><!-- end left -->
				<!-- right -->
				<div class="col-md-9 .col-sm-8">
					<div class="place-list-content">
						<div class="row">
							<div class="col-md-4 col-sm-6 col-12 thumbnail-padding">
								<div class="destination-grid">
									<a href=""><img src="public/resource/images/img-BaiViet/9.jpg" alt=""></a>
									<div class="destination-name">
										<h4>Ha Long</h4>
										<h5>Quang Ninh</h5>
									</div>
									<div class="destination-icon">	
										<a>8.5 <i class="far fa-star"></i></a>	
										<a>123 <i class="fas fa-eye"></i></a>
										<a>123 <i class="far fa-comment"></i></a>
										<a>800 <i class="far fa-bookmark"></i></a>
									</div>
								</div>
							</div>
							
							
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

	<!-- <script src="resource/js/lightbox.min.js"></script> -->
	<!-- <script src="resource/js/menu-style.js"></script> -->
	<script src="public/resource/js/p/place_city.js"></script>

@include('VietNamTour.header-footer.footer')
