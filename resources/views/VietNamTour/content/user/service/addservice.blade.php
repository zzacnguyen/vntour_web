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
</style>




<section class="addplace">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 content">
					<h4>Thêm dịch vụ mới</h4>
					<h6 style="color: #bd1717;">Thông tin cơ bản</h6>
					<input id="id_user" type="hidden" value="{{$user_id}}">
					<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
					<form action="" method="post" enctype='multipart/form-data' id="formAdd">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="input-text">
							<label>Tên dịch vụ</label>
							<input name="sv_name" type="text" value="{{old('sv_name')}}">
							<p class="text-danger" id="null_name" style="display: none;">Tên dịch vụ phải có độ dài tối thiểu 5 ký tự</p>
						</div>
						<div class="input-text col-md-12" style="padding: 0;margin-bottom: 5px;">
							<label class="col-md-2" style="padding: 0;">Loại hình</label>
							<select name="sv_types" id="" value="{{old('sv_types')}}" class="Tinh col-md-9" style="margin-left: 27px;width: 100%;">
								<option value="4">Tham quan</option>
								<option value="1">Ăn uống</option>
								<option value="2">Khách sạn</option>
								<option value="3">Phương tiện</option>
								<option value="5">Vui chơi</option>
							</select>
							
						</div>
						<div class="input-text col-md-12" style="margin-bottom: 10px; padding: 0">
							<label class="col-md-2" style="padding: 0;">Tỉnh thành</label>
							<select class="js-example-basic-single col-md-4" name="city" style="margin-left: 27px;">
	          					<option value="0">Chọn tỉnh thành phố</option>
								@foreach($data as $c)
								  <option value="{{$c->id}}">{{$c->province_city_name}}</option>
								@endforeach
							</select>

							<label class="col-md-2" style="margin-right: -10px;display: inline-block;font-weight: bold;font-size: 14px">Quận huyện</label>
							<select class="js-example-basic-single col-md-3" name="districtt" id="district">
	              				<option value="0">Chọn quận huyện</option>
							</select>
							<p class="text-danger" id="null_city" style="display: none;">Vui lòng chọn tỉnh thành cho dịch vụ</p>
						</div>

						<div class="col-md-12" style="margin-bottom: 10px;padding: 0;">
							<label class="col-md-2" style="width: 150px;font-size: 14px;font-weight: bold;padding: 0;">Khu vực</label>
							<select class="js-example-basic-single col-md-4" name="ward" id="ward" style="padding: 0; margin-left: 27px;">
								<option value="0">Chọn khu vực</option>
							</select>

							
							<label class="col-md-2" style="margin-right: -10px;display: inline-block;">Địa điểm</label>
							<select class="js-example-basic-single col-md-3" name="diadiem" id="place" style="">
	          					<option value="0">Chọn địa điểm</option>
							</select>
							<p class="text-danger" id="null_place" style="display: none;">Vui lòng chọn địa điểm cho dịch vụ</p>
						</div>

						<div class="input-text">
							<label>Số điện thoại</label>
							<input type="text" name="sv_phone_number" class="" value="{{old('sv_phone_number')}}">
							<label>Website</label>
							<input type="text" name="sv_website" class="" value="{{old('sv_website')}}">
						</div>
						
						<br>
						{{-- //========================= THOI GIAN ======================= --}}
						<h6 style="color: #bd1717;">Thời gian hoạt động</h6>
						<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
						<div class="input-text">
							<label>Giờ đóng cửa</label>
							<input type="time" name="time_begin">
							{{-- <select name="time_begin" id="" class="js-example-basic-single col-md-8" style="">
								@for($i=0;$i<24;$i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select> --}}
							
						</div>
						<div class="input-text">
							<label>Giờ mở cửa</label>
							<input type="time" name="time_end" >
							{{-- <select name="time_end" id="" class="js-example-basic-single col-md-8" style="">
								@for($i=0;$i<24;$i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select> --}}
						</div>
						<br>
						{{-- //========================= GIA ======================= --}}
						<h6 style="color: #bd1717;">Giá dịch vụ</h6>
						<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
						<div class="input-text">
							<label>Giá thấp nhất</label>
							<input name="sv_lowest_price" type="number" min="0" value="0">
						</div>
						<div class="input-text">
							<label>Giá cao nhất</label>
							<input name="sv_highest_price" type="number" min="0" value="0">
						</div>
						<div class="input-text">
							<p class="text-danger" id="price_error" style="display: none;">Gia thấp nhất không được lớn hơn giá cao nhất</p>
						</div>
						<br>
						{{-- //========================= CHI TIET =================== --}}
						<h6 style="color: #bd1717;">Mô tả chi tiết</h6>
						<div class="input-text" class="col-md-12" style="padding: 0">
							<label style="padding: 0;" class="col-md-2">Mô tả dịch vụ</label>
							<textarea name="mota" id="ten" class="col-md-9" style="margin-left: 27px;"></textarea>
      						<script>CKEDITOR.replace('ten');</script>
      						{{-- <textarea id="occho">dadsddadada</textarea> --}}
      						
						</div>
						<div class="input-text">
							<p class="text-danger" id="null_chitiet" style="display: none;">Tên dịch vụ phải có độ dài tối thiểu 50 ký tự</p>
						</div>
						<br>
						<div class="input-text" class="col-md-12" style="padding: 0">
							<label style="padding: 0;" class="col-md-12" style="width: 100%;">Ảnh mô tả chi tiết</label><br>
							{{-- <input type="file" style="border:none; margin-left: 27px;" class="col-md-9" name="img1">
							<p class="text-danger">{{$errors->first('img1')}}</p>
							<label style="padding: 0;" class="col-md-2">Ảnh mô tả</label>
							<input type="file" style="border:none; margin-left: 27px;" class="col-md-9" name="img2">
							<p class="text-danger">{{$errors->first('img2')}}</p>
							<label style="padding: 0;" class="col-md-2">Ảnh mô tả</label>
							<input type="file" style="border:none; margin-left: 27px;" class="col-md-9" name="img3">
							<p class="text-danger">{{$errors->first('img3')}}</p> --}}
							<p class="text-danger" id="null_image" style="display: none;">Bạn phải chọn 3 ảnh chi tiết</p>
							<div class="row">
								<div class="col-md-4">
									<input type="file" accept="image/*" style="width: 100%;" name="banner" id="banner">
									<div class="preview-area2" style="width: 223px;height: 149px;">
										{{-- <ul class=""></ul> --}}
									</div>
								</div>
								<div class="col-md-4">
									<input type="file" accept="image/*" style="width: 100%;" name="details1" id="details1">
									<div class="preview-area3" style="width: 223px;height: 149px;">
										{{-- <ul class=""></ul> --}}
									</div>
								</div>
								<div class="col-md-4">
									<input type="file" accept="image/*" style="width: 100%;" name="details2" id="details2">
									<div class="preview-area4" style="width: 223px;height: 149px;">
										{{-- <ul class=""></ul> --}}
									</div>
								</div>
							</div>
							<hr>
							
									
								

							<input type="file" class="dimmy" id="image-input" accept="image/*" name="image-input[]" multiple />
						    <div>
						      <ul class="preview-area" id="list-img" style="display: none;"></ul>
						    </div>
							

							
						</div>

						<button type="button" class="btn btn-success col-md-12" id="btnaddplace">Thêm dịch vụ</button>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</section>

	{{-- <button id="clicktoast" onclick="show_toast()">lamsmanas</button> --}}
	<div id="toast">
		Thêm thành công!
	</div>

{{-- <script src="public/resource/js/ckeditor.js"></script> --}}
<script src="public/resource/js/select2.full.js"></script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
</script>

{{-- <script src="public/resource/js/p/addplace.js"></script> --}}
<script src="public/resource/js/p/addservice.js"></script>


<script type="text/javascript">

      
    </script>


@include('VietNamTour.header-footer.footer')
