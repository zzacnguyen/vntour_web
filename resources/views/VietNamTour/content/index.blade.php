
@include('VietNamTour.header-footer.header')
	<link rel="stylesheet" href="public/resource/css/font-awesome.css">


	<style type="text/css">
		#btnprev{
			position: absolute;
			top: 42%;
			z-index: 1000;
			background-color: #ffffff80;
			height: 40px;
			width: 40px;
			cursor: pointer;
			padding: 5px;
			padding-left: 13px;
			padding-top: 8px;
		}
		#btnnext{
			position: absolute;
			top: 42%;
			right: 15px;
			z-index: 1000;
			background-color: #ffffff80;
			height: 40px;
			width: 40px;
			cursor: pointer;
			padding: 5px;
			padding-top: 8px;
			padding-left: 16px;
		}
		.giathap, .giacao{
			font-size: 12px
		}
	</style>

	<!-- ==================TINH TP============= -->
	<section class="tinhthanhpho">
		<div class="container" style="position: relative;">
			<div class="owl-carousel owl-theme" id="display-city">
				
				@foreach($placecount as $value)
					<div class="item">
				    	<div class="grid-item">
				    		<div class="grid-img-thumb">
				    			<div class="ribbon">
				    				<span>{{$value->num_service}}</span>
				    			</div>
					    		<a href="city/{{$value->id_city}}&type=all&page=1">
					    			<img src="http://localhost/vntour_api/public/thumbnails/{{$value->image}}" alt="" style="height: 214px;"></a>
					    	</div>
					    	<div class="grid-content">
					    		<div class="grid-price text-left">
					    			<span>{{$value->num_service}}</span>
					    			<i class="far fa-hand-peace"></i>
					    		</div>
					    		<div class="grid-text">
					    			<div class="place-name">{{$value->name_city}}</div>
					    			<span class="pull-right">
				    					<i class="fas fa-star"></i>
				    					<i class="fas fa-star"></i>
				    					<i class="fas fa-star"></i>
				    					<i class="fas fa-star"></i>
				    					<i class="fas fa-star"></i>
				    				</span>
					    		</div>
					    	</div>
				    	</div>    	
				    </div>
				@endforeach
			
			</div>
		<a class="prev-owl" id="btnprev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
		<a class="next-owl" id="btnnext"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
		</div>
	</section>
	<!-- ==================END TINH TP============= -->

	<!-- ================== POPULAR DESTINATION============= -->
	<section class="destination" style="background-image: url('public/resource/images/background/1.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Địa điểm tham quan nổi tiếng</h3>
						<div class="" style="border: 1px solid #304FFE; height: 1px; width: 100%;"></div>
						<p>Những địa điểm tham quan tuyệt vời</p>
					</div>
				</div>
					
			</div>
			<div class="row">

				@foreach($services_see as $see)

					<div class="col-md-3 col-sm-6 col-12 thumbnail-padding">
						<div class="destination-grid">
							<a href="detail/id={{$see->id_service}}&type={{$see->sv_type}}" class="click_view">
								<img src="http://localhost/vntour_api/public/thumbnails/{{$see->image}}" alt="">
							</a>
							<div class="destination-name" data-id="{{$see->id_service}}">
								<h4>{{$see->name}}</h4>
								<h5 style="position: relative;">
									{{-- <span class="badge badge-danger" style="color: white;">Top 1 <i class="fas fa-eye"></i></span> --}} 
									{{$see->name_city}}</h5>
								
							</div>
							<div class="destination-icon">	
								<a>{{$see->rating}} <i class="far fa-star"></i></a>
								<a><span class="chuyenso">{{$see->view}}</span> <i class="fas fa-eye"></i></a>
								<a><span class="chuyenso">{{$see->like}}</span> <i class="far fa-thumbs-up"></i></a>
								<a><span class="chuyenso">{{$see->point}}</span> <i class="fas fa-share-alt"></i></a>
							</div>
						</div>
					</div>

				@endforeach
				
				{{-- <div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div> --}}
			</div>
		</div>
	</section>
	<!-- ================== END POPULAR DESTINATION============= -->

	<!-- ================== EATTING ============= -->
	<section class="destination eatting">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Ăn uống</h3>
						<div class="" style="border: 1px solid #D32E2E; height: 1px; width: 100%;"></div>
						<p>Những địa điểm ăn uống hấp dẫn !</p>
					</div>
				</div>
					
			</div>
			<div class="row">

				@foreach($services_eat as $eat)

					<div class="col-md-3 col-sm-6 col-12 thumbnail-padding">
						<div class="destination-grid">
							<a href="detail/id={{$eat->id_service}}&type={{$eat->sv_type}}" class="click_view">
								<img src="http://localhost/vntour_api/public/thumbnails/{{$eat->image}}" alt="">
							</a>
							<div class="destination-name" data-id="{{$eat->id_service}}">
								<h4>{{$eat->name}}</h4>
								<h5>{{$eat->name_city}}</h5>
							</div>
							<div class="destination-icon">	
								<a>{{$eat->rating}} <i class="far fa-star"></i></a>	
								<a><span class="chuyenso">{{$eat->view}}</span> <i class="fas fa-eye"></i></a>
								<a><span class="chuyenso">{{$eat->like}}</span> <i class="far fa-thumbs-up"></i></a>
								<a><span class="chuyenso">{{$eat->point}}</span> <i class="fas fa-share-alt"></i></a>
							</div>
						</div>
					</div>

				@endforeach
					

				{{-- <div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div> --}}
			</div>

		</div>
	</section>
	<!-- ================== END EATTING ========= -->

	<!-- ================== HOTEL ============= -->
	<section class="hotel">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Khách sạn nổi tiếng</h3>
						<div class="" style="border: 1px solid #FF6E41; height: 1px; width: 100%;"></div>
						<p>Khách sạn đẳng cấp</p>
					</div>
				</div>	
			</div>
			<div class="row">

				@foreach($services_hotel as $hotel)

					<div class="col-md-6 col-sm-12 col-12">
						<div class="hotel-item">
							<div class="hotel-image">
								<div class="img">
									<img src="http://localhost/vntour_api/public/thumbnails/{{$hotel->image}}" alt="">
								</div>
							</div>
							<div class="hotel-body">
								<div class="ratting">
									@for($i=0; $i < $hotel->hotel_number_star;$i++)
										<i class="fas fa-star"></i>
									@endfor
								</div>
								<h4>{{$hotel->name}}</h4>
								<p class="">{{$hotel->description}}</p>
								<div class="free-service">
									<a>{{$hotel->rating}}  <i class="far fa-star"></i></a>	
									<a><span class="chuyenso">{{$hotel->view}}</span> <i class="fas fa-eye"></i></a>
									<a><span class="chuyenso">{{$hotel->like}}</span> <i class="far fa-thumbs-up"></i></a>
									<a><span class="chuyenso">{{$hotel->point}}</span> <i class="fas fa-share-alt"></i></a>
								</div>
							</div>
							<div class="hotel-right">
								<div class="price">
									<span class="giathap">{{$hotel->sv_lowest_price}}</span> - 
									<span class="giacao">{{$hotel->sv_highest_price}}</span>
								</div>
								<div class="btn">
									{{-- <a href="http://chinhlytailieu/doan3_canthotour/public/detail/id={{$hotel['id_service']}}" class="btn btn-warning">Details</a> --}}
									<a href="detail/id={{$hotel->id_service}}&type={{$hotel->sv_type}}" class="btn btn-warning click_view" style="border-radius: 0;background-color: #00a680;border: 1px solid #00a680;color: white;">
										Chi tiết
									</a>
								</div>
							</div>
						</div>
					</div>

				@endforeach
		
				{{-- <div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div> --}}
			</div>
		</div>
	</section>
	<!-- ================== END HOTEL ============= -->

	<!-- ================== ENTERTAIMENT ============= -->
	<section class="destination post" style="background-image: url('public/resource/images/background/2.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Những địa điểm vui chơi thú vị</h3>
						<div class="" style="border: 1px solid #4DC2F7; height: 1px; width: 100%;"></div>
						<p>Bạn không thể bỏ qua những điểm đến này</p>
					</div>
				</div>
					
			</div>
			<div class="row">

				@foreach($services_enter as $enter)
					<div class="col-md-3 col-sm-6 col-12 thumbnail-padding">
						<div class="destination-grid">
							<a href="detail/id={{$enter->id_service}}&type={{$enter->sv_type}}" class="click_view">
								<img src="http://localhost/vntour_api/public/thumbnails/{{$enter->image}}" alt="">
							</a>
							<div class="destination-name" data-id="{{$enter->id_service}}">
								<h4>{{$enter->name}}</h4>
								<h5>{{$enter->name_city}}</h5>
							</div>
							<div class="destination-icon">	
								<a>{{$enter->rating}} <i class="far fa-star"></i></a>	
								<a><span class="chuyenso">{{$enter->view}}</span> <i class="fas fa-eye"></i></a>
								<a><span class="chuyenso">{{$enter->like}}</span> <i class="far fa-thumbs-up"></i></a>
								<a><span class="chuyenso">{{$enter->point}}</span> <i class="fas fa-share-alt"></i></a>
							</div>
						</div>
					</div>
				@endforeach
					
				{{-- <div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div> --}}
			</div>
		</div>
	</section>
	<!-- ================== END ENTERTAIMENT ============= -->

	<!-- ================== TRANSPORT ============= -->
	<section class="destination post" style="">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Phương tiện</h3>
						<div class="" style="border: 1px solid #4DC2F7; height: 1px; width: 100%;"></div>
						<p>Tổng hợp những phương tiện di chuyển</p>
					</div>
				</div>
					
			</div>
			<div class="row">

				@foreach($services_tran as $stran)
					<div class="col-md-3 col-sm-6 col-12 thumbnail-padding">
						<div class="destination-grid">
							<a href="detail/id={{$stran->id_service}}&type={{$stran->sv_type}}" class="click_view">
								<img src="http://localhost/vntour_api/public/thumbnails/{{$stran->image}}" alt="">
							</a>
							<div class="destination-name" data-id="{{$stran->id_service}}">
								<h4>{{$stran->name}}</h4>
								<h5>{{$stran->name_city}}</h5>
							</div>
							<div class="destination-icon">	
								<a>{{$stran->rating}} <i class="far fa-star"></i></a>	
								<a><span class="chuyenso">{{$stran->view}}</span> <i class="fas fa-eye"></i></a>
								<a><span class="chuyenso">{{$stran->like}}</span> <i class="far fa-thumbs-up"></i></a>
								<a><span class="chuyenso">{{$stran->point}}</span> <i class="fas fa-share-alt"></i></a>
							</div>
						</div>
					</div>
				@endforeach

				{{-- <div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div> --}}
			</div>
		</div>
	</section>
	<!-- ================== END TRANSPORT ============= -->

<!-- script -->
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
		            items:1
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
	<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff"></script> --}}

<script src="public/resource/js/p/shareFun.js"></script>

@include('VietNamTour.header-footer.footer')