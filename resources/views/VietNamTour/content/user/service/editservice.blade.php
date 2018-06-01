@include('VietNamTour.header-footer.header')

<link rel="stylesheet" href="public/resource/css/select2.min.css">
<link rel="stylesheet" href="public/resource/css/addplace.css">

<script src="{{asset('public/resource/js/ckeditor/ckeditor.js')}}"></script>


<style>
    .preview-area img{
      	height: 200px;
    	width: 227px;
    	padding: 5px;
    	margin-left: 5px;
    	border: 1px solid #ddd;
    }
    .preview-area2 img {
		width: 223px;
		height: 149px;
    }

    .preview-area3 img {
		width: 223px;
		height: 149px;
    }

    .preview-area4 img {
		width: 223px;
		height: 149px;
    }
    .close-img{
      	position: absolute;
    	top: 4px;
    	right: 4px;
	    color: white;
	    font-weight: 700;
	    border-radius: 50%;
	    background-color: #000000b8;
	    height: 24px;
	    width: 24px;
	    padding-left: 7px;
	    cursor: pointer;
    }
    .close-img:hover{
      	color: red;
    }
    .preview-area{
		list-style-type: none;
		height: 210px;
		padding: 5px;
		border: 1px solid #ddd;
    }
    .preview-area li{
      	float: left;
    }

    #toast{
    	display: inline-table;
    	padding: 20px 90px;
    	background-color: #5da954;
    	position: fixed;
    	top: 100px;
    	right: 37%;
    	z-index: 100;
    	font-size: 20px;
    	font-weight: 700;
    	color: white;
    	border-radius: 3px;
    	box-shadow: 0 0 20px rgba(0,0,3,0.5);
    	visibility: hidden;
    	/*transition: 0.5s;*/
    	/*animation: fadeInOut 3s;*/
    }
    .toast-show{
    	visibility: visible !important;
    	transition: 1s;
    }

    //
	section#loader{
	    position: fixed;
	    top: 0;
	    left: 0;
	    background-color: #00000066;
	    height: 100%;
	    width: 100%;
    }
    #loader .lam11{
    	height: 50px;
    	width: 50px;
    	background-color: black;
    	display: none;
    }
    #loader .lds-facebook {
	    position: absolute;
		display: inline-block;
		position: relative;
		width: 64px;
		height: 64px;
		top: 50%;
		left: 50%;
	}
	#loader .lds-facebook div {
	  display: inline-block;
	  position: absolute;
	  left: 6px;
	  width: 13px;
	  background: #00a680;
	  animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
	}
	#loader .lds-facebook div:nth-child(1) {
	  left: 6px;
	  animation-delay: -0.24s;
	}
	#loader .lds-facebook div:nth-child(2) {
	  left: 26px;
	  animation-delay: -0.12s;
	}
	#loader .lds-facebook div:nth-child(3) {
	  left: 45px;
	  animation-delay: 0;
	}
	@keyframes lds-facebook {
	  0% {
	    top: 6px;
	    height: 51px;
	  }
	  50%, 100% {
	    top: 19px;
	    height: 26px;
	  }
	}
</style>

<section class="addplace">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 content">
					<h4>Cập nhật dịch vụ</h4>
					<h6 style="color: #bd1717;">Thông tin cơ bản</h6>
					<input id="id_user" type="hidden" value="{{$user_id}}">
					<input id="id_sv" type="hidden" value="{{$data->sv_id}}">
					<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
					<form method="post" enctype='multipart/form-data' id="formAdd">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="input-text">
							<label>Tên dịch vụ</label>
							<input type="hidden" name="status" value="{{$data->sv_status}}">
							<input name="sv_name" type="text" value="{{$data->sv_name}}">
							<p class="text-danger" id="null_name" style="display: none;">Tên dịch vụ phải có độ dài tối thiểu 5 ký tự</p>
						</div>

						<div class="input-text">
							<label>Mô tả ngắn:</label>
							<input type="hidden" name="sv_status" value="{{$data->sv_status}}">
							<input name="sv_description" type="text" value="{{$data->sv_description}}">
							<p class="text-danger">{{$errors->first('sv_description')}}</p>
						</div>

						<div class="input-text col-md-12" style="padding: 0;margin-bottom: 5px;">
							<label class="col-md-2" style="padding: 0;">Loại hình</label>
							<select name="sv_types" id="" class="Tinh col-md-9" style="margin-left: 27px;width: 100%;" >
								@if($data->sv_type==4)
									<option selected  value="4">Tham quan</option>
								@elseif($data->sv_type==1)
									<option selected  value="1">Ăn uống</option>
								@elseif($data->sv_type == 2)
									<option  selected  value="2">Khách sạn</option>
								@elseif($data->sv_type ==3)
									<option  selected  value="3">Phương tiện</option>
								@else
									<option  selected  value="5">Vui chơi</option>
								@endif
							
					
								
							
							</select>
						</div>
						<div class="input-text row" style="margin-bottom: 10px; padding: 0;padding-left: 14px;">
							<label class="col-md-2" style="padding: 0;width: 150px; margin-right: 15px;">Tỉnh thành</label>
							{{-- <select class="js-example-basic-single col-md-4" name="city" style="margin-left: 27px;" >
	          					<option value="0">Chọn tỉnh thành phố</option>
								@foreach($data->city as $c)
								  <option value="{{$c->id}}">{{$c->province_city_name}}</option>
								@endforeach
							</select> --}}
							<div class="col-md-3">
								<input disabled="disabled" type="text" name="city_name" value="{{$city->name_city}}" style="width: 100%;">
								<input type="hidden" name="city" value="{{$city->id_city}}">
							</div>
								

							<label class="col-md-2" style="margin-right: -10px;display: inline-block;font-weight: bold;font-size: 14px">Quận huyện</label>
							{{-- <select class="js-example-basic-single col-md-3" name="districtt" id="district">
	              				<option value="0">Chọn quận huyện</option>
							</select> --}}
							<div class="col-md-4">
								<input disabled="disabled" type="text" name="districtt_name" value="{{$city->name_district}}">
								<input type="hidden" name="districtt" value="{{$city->id_district}}">
							</div>
								
						</div>

						<div class="input-text row" style="margin-bottom: 10px;padding: 0; padding-left: 14px;">
							{{-- <label class="col-md-2" style="width: 150px;font-size: 14px;font-weight: bold;padding: 0;">Khu vực</label> --}}
							<label class="col-md-2" style="padding: 0;width: 150px; margin-right: 15px;">Khu vực</label>
							{{-- <select class="js-example-basic-single col-md-4" name="ward" id="ward" style="padding: 0; margin-left: 27px;">
							</select> --}}
							<div class="col-md-3">
								<input disabled="disabled" type="text" name="ward_name" value="{{$city->name_ward}}" style="width: 100%;">
								<input type="hidden" name="ward" value="{{$city->id_ward}}">
							</div>
								
							
							<label class="col-md-2" style="margin-right: -10px;display: inline-block;">Địa điểm</label>
							{{-- <select class="js-example-basic-single col-md-3" name="diadiem" style="">
                                <option value="{{$data->place[0]->tourist_places_id}}">{{$data->place[0]->pl_name}}</option>
						
							</select> --}}
							<div class="col-md-4">
								<input disabled="disabled" type="text" name="diadiem_name" value="{{$city->name_place}}">
								<input type="hidden" name="diadiem" value="{{$city->id_place}}">
							</div>
						</div>

						<div class="input-text">
							<label>Số điện thoại</label>
							<input type="text" name="sv_phone_number" class="" value="{{$data->sv_phone_number}}">
							<label>Website</label>
							<input type="text" name="sv_website" class="" value="{{$data->sv_website}}">
						</div>
						
						<br>
						{{-- //========================= THOI GIAN ======================= --}}
						<h6 style="color: #bd1717;">Thời gian hoạt động</h6>
						<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
						<div class="input-text">
							<label>Giờ đóng cửa</label>
							<input type="time" name="time_begin" value="{{$data->sv_open}}" >
							
						</div>
						<div class="input-text">
							<label>Giờ mở cửa</label>
							
							<input name="time_end" type="time" value="{{$data->sv_close}}">
						</div>
						<br>
						{{-- //========================= GIA ======================= --}}
						<h6 style="color: #bd1717;">Giá dịch vụ</h6>
						<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
						<div class="input-text">
							<label>Giá thấp nhất</label>
							<input name="sv_lowest_price" type="text" value="{{$data->sv_lowest_price}}">
						</div>
						<div class="input-text">
							<label>Giá cao nhất</label>
							<input name="sv_highest_price" type="text" value="{{$data->sv_highest_price}}">
						</div>
						<div class="input-text">
							<p class="text-danger" id="price_error" style="display: none;">Gia thấp nhất không được lớn hơn giá cao nhất</p>
						</div>
						<br>
						{{-- //========================= CHI TIET =================== --}}
						<h6 style="color: #bd1717;">Mô tả chi tiết</h6>
						<div class="input-text" class="col-md-12" style="padding: 0">
							{{-- <label style="padding: 0;" class="col-md-2">Mô tả dịch vụ</label> --}}
							<textarea name="mota" id="ten" class="col-md-9" style="margin-left: 27px;">{!!$data->sv_content!!}</textarea>
      						<script>CKEDITOR.replace('ten');</script>
      						
						</div>
						<div class="input-text">
							<p class="text-danger" id="null_chitiet" style="display: none;">Tên dịch vụ phải có độ dài tối thiểu 50 ký tự</p>
						</div>
						<div class="input-text" class="col-md-12" style="padding: 0">
							<label style="padding: 0;" class="col-md-2">Ảnh mô tả</label>
							{{-- <input type="file" style="border:none; margin-left: 27px;" class="col-md-9" name="img1">
							<p class="text-danger">{{$errors->first('img1')}}</p>
							<label style="padding: 0;" class="col-md-2">Ảnh mô tả</label>
							<input type="file" style="border:none; margin-left: 27px;" class="col-md-9" name="img2">
							<p class="text-danger">{{$errors->first('img2')}}</p>
							<label style="padding: 0;" class="col-md-2">Ảnh mô tả</label>
							<input type="file" style="border:none; margin-left: 27px;" class="col-md-9" name="img3">
							<p class="text-danger">{{$errors->first('img3')}}</p> --}}

							<div class="row">
								<div class="col-md-4">
									<input type="file" accept="image/*" style="width: 100%;" name="banner" id="banner">
									<div class="preview-area2" style="width: 223px;height: 149px;">
										<img src="http://vntourweb/vntour_api/public/thumbnails/{{$data->sv_image}}" alt="">
									</div>
								</div>
								<div class="col-md-4">
									<input type="file" accept="image/*" style="width: 100%;" name="details1" id="details1">
									<div class="preview-area3" style="width: 223px;height: 149px;">
										<img src="http://vntourweb/vntour_api/public/thumbnails/{{$data->image_banner}}" alt="">
									</div>
								</div>
								<div class="col-md-4">
									<input type="file" accept="image/*" style="width: 100%;" name="details2" id="details2">
									<div class="preview-area4" style="width: 223px;height: 149px;">
										<img src="http://vntourweb/vntour_api/public/thumbnails/{{$data->image_details_2}}" alt="">
									</div>
								</div>
							</div>
							<br>

						</div>

						<button type="button" class="btn btn-success col-md-12" id="btnaddplace">Cập nhật dịch vụ</button>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</section>
	<section id="loader" style="display: none; position: fixed;top: 0;left: 0;
	    background-color: #00000066;
	    height: 100%;
	    width: 100%;">
		<div class="lam11"></div>
		<div class="lds-facebook" id="lds-facebook"><div></div><div></div><div></div></div>
		<div id="thanhcong" style="display: none;position: absolute;top: 40%;text-align: center;padding: 10px;color: white;width: 100%;">
			<h3 class="text-center" style="width: 100%">Cập nhật thành công</h3>
		</div>
	</section>

{{-- <script src="public/resource/js/ckeditor.js"></script> --}}
<script src="public/resource/js/select2.full.js"></script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
</script>

{{-- <script src="public/resource/js/p/addplace.js"></script> --}}
<script src="public/resource/js/p/edit_service.js"></script>





@include('VietNamTour.header-footer.footer')
