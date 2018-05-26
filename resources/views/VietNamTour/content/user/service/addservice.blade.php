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
</style>




<section class="addplace">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 content">
					<h4>Thêm dịch vụ mới</h4>
					<h6 style="color: #bd1717;">Thông tin cơ bản</h6>
					<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
					<form action="" method="post" enctype='multipart/form-data' id="formAdd">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="input-text">
							<label>Tên dịch vụ</label>
							<input name="sv_name" type="text" value="{{old('sv_description')}}">
							<p class="text-danger">{{$errors->first('sv_description')}}</p>
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
						</div>

						<div class="col-md-12" style="margin-bottom: 10px;padding: 0;">
							<label class="col-md-2" style="width: 150px;font-size: 14px;font-weight: bold;padding: 0;">Khu vực</label>
							<select class="js-example-basic-single col-md-4" name="ward" id="ward" style="padding: 0; margin-left: 27px;">
							</select>

							
							<label class="col-md-2" style="margin-right: -10px;display: inline-block;">Địa điểm</label>
							<select class="js-example-basic-single col-md-3" name="diadiem" id="place" style="">
	          					<option value="1">Chọn tỉnh thành phố</option>
							</select>
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
						<br>
						{{-- //========================= CHI TIET =================== --}}
						<h6 style="color: #bd1717;">Mô tả chi tiết</h6>
						<div class="input-text" class="col-md-12" style="padding: 0">
							<label style="padding: 0;" class="col-md-2">Mô tả dịch vụ</label>
							<textarea name="mota" id="ten" class="col-md-9" style="margin-left: 27px;"></textarea>
      						<script>CKEDITOR.replace('ten');</script>
      						
						</div>
						<div class="input-text" class="col-md-12" style="padding: 0">
							{{-- <label style="padding: 0;" class="col-md-2">Ảnh mô tả</label>
							<input type="file" style="border:none; margin-left: 27px;" class="col-md-9" name="img1">
							<p class="text-danger">{{$errors->first('img1')}}</p>
							<label style="padding: 0;" class="col-md-2">Ảnh mô tả</label>
							<input type="file" style="border:none; margin-left: 27px;" class="col-md-9" name="img2">
							<p class="text-danger">{{$errors->first('img2')}}</p>
							<label style="padding: 0;" class="col-md-2">Ảnh mô tả</label>
							<input type="file" style="border:none; margin-left: 27px;" class="col-md-9" name="img3">
							<p class="text-danger">{{$errors->first('img3')}}</p> --}}
						


							<input type="file" class="dimmy" id="image-input" name="image-input" multiple />
						    <div>
						      <ul class="preview-area" id="list-img" style="display: none;"></ul>
						    </div>
							

							<input type="file" style="" class="col-md-9" name="img1" id="img1">
							<input type="file" style="" class="col-md-9" name="img2" id="img2">
							<input type="file" style="" class="col-md-9" name="img3" id="img3">
						</div>

						<button type="button" class="btn btn-success col-md-12" id="btnaddplace">Thêm dịch vụ</button>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
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
<script src="public/resource/js/p/addservice.js"></script>


<script type="text/javascript">

      
    </script>


@include('VietNamTour.header-footer.footer')
