@include('VietNamTour.header-footer.header')

<link rel="stylesheet" href="public/resource/css/select2.min.css">
<link rel="stylesheet" href="public/resource/css/addplace.css">
<link rel="stylesheet" href="public/resource/css/gallery.css">

<!-- Fine Uploader New/Modern CSS file
====================================================================== -->
<link href="public/resource/fine-uploader/fine-uploader-new.css" rel="stylesheet">

<!-- Fine Uploader jQuery JS file
====================================================================== -->
<script src="public/resource/fine-uploader/jquery.fine-uploader.js"></script>

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

	.qq-uploader {
	    position: relative;
	    min-height: 200px;
	    max-height: 490px;
	    overflow-y: hidden;
	    width: inherit;
	    border-radius: 0px;
	    background-color: #FDFDFD;
	    border: 1px dashed #CCCCCC;
	    padding: 7px;
	    overflow-x: hidden;
	}

	#trigger-upload {
	    color: white;
	    background-color: #00a680 !important;
	    font-size: 14px;
	    padding: 9px 23px;
	    background-image: none;
	    border-radius: 0px !important;
	    margin: 0 !important;
	    border: 1.3px solid #00a680;
	}
	.qq-upload-button {
	    border-radius: 0px !important;
	    box-shadow: none;
	}
	.button-them-event{
		height: 36px !important;
	    width: 150px !important;
	    padding: 0 !important;
	    border-radius: 0px !important;
	    border:none !important;
	    background-color: #007bff !important;
	    margin-bottom: 0 !important;
	}

	#btn-add-type-event:hover{
		background-color: #00a680;
		font-size: 20px;
		font-weight: bold;
	}

	.content-add-type{
		background-color: white;
	    top: 0;
	    left: 54px;
	    z-index: 10000;
	    width: 300px;
	    padding: 20px;
	}

	.content-add-type::before{
		content: "";
	    position: absolute;
	    display: block;
	    top: 7px;
	    left: -18px;
	    height: 0;
	    width: 0;
	    border-top: 12px solid transparent;
	    border-bottom: 12px solid transparent;
	    border-right: 18px solid #757575;
	}

	.content-add-type::after{
		content: "";
	}

	button{
		border-radius: 0 !important;
	}
</style>

<section class="addplace">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<div class="" style="padding: 5px;padding-top: 0;position: fixed;top: 100px;">
						<div class="" style="background-color: white;padding: 5px;">
							<h6 class="text-center">Sự kiện đang diễn ra</h6>
							{{-- <div class="div" style="height: 1px; width: 96%; background-color: red; margin-bottom: 10px;margin: 3px;padding-left: 3px;padding-right: 3px;"> --}}
							<div class="content-event">
								<ul style="padding: 0;list-style-type: none;" id="list-sv">
									<li style="color: red;"><marquee class="text"><i>Sinh nhật cafe Chất</i></marquee></li>
								</ul>
							</div>
						</div>
						<br>
						<div class="" style="background-color: white;padding: 5px;">
							<h6 class="text-center">Thêm sự kiện</h6>
							<div class="content-event">
								<button class="btn btn-primary" style="border-radius:0;" data-toggle="modal" data-target="#eventModal">Thêm sự kiện mới
								</button>
								{{-- <div class="">
									<h6>Dịch vụ của bạn chưa được duyệt</h6>
								</div> --}}
							</div>
						</div>
					</div>
						
					<!-- Modal -->
					<div id="eventModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content" style="margin-top: 100px;border-radius: 0;">
					    	<form method="post" id="form-event">
					    		<div class="modal-header">
							        <h5 class="modal-title">Thêm sự kiện</h5>
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
						      	</div>

								<div class="modal-body">
									<div class="form-group row">
										@if($data->sv_status != 1)
											<label class="col-md-12" style="color: red;">Dịch vụ của bạn chưa được DUYỆT không thể thêm sự kiện</label>
											<label class="col-md-12" style="color: red;">Dịch vụ của bạn sẽ được xét duyệt sớm nhất có thể</label>
										@endif
									</div>
									<div class="form-group row">
									    <label style="font-size: 13px;padding-right: 0;" class="col-sm-3 col-form-label"><b>Tên sự kiện</b></label>
									    <div class="col-sm-9">
									      <input type="text" class="form-control" name="event_name" style="border-radius: 0;">
									    </div>
									    <p class="text-danger col-sm-12" id="null_eventname" style="display: none;">Sự kiện phải có độ dài từ 5-100 ký tự</p>
								  	</div>

								  	<div class="form-group row">
									    <label style="font-size: 13px;padding-right: 0;" class="col-sm-3 col-form-label"><b>Loại hình sự kiện</b></label>
									    <div class="col-sm-9">
									        <div class="input-group">
											  <select class="custom-select" id="" name="type_event" style="border-radius: 0;">
											    <option selected value="0">Chọn loại hình sự kiện</option>
											    @if($type_event != null)
											    	@foreach($type_event as $e)
											    		<option value="{{$e->id}}">{{$e->type_name}}</option>
											    	@endforeach
											    @endif
											  </select>
											  <div class="input-group-append" style="position: relative;">
											  	@if($data->sv_status == 1)
											  		<button class="btn btn-outline-secondary" type="button" style="border-radius: 0;font-size: 14px;font-weight: 500;" id="btn-add-type-event">+</button>
											  	@else
											  		<button disabled class="btn btn-outline-secondary" type="button" style="border-radius: 0;font-size: 14px;font-weight: 500;" id="btn-add-type-event">+</button>
											  	@endif
											    

											    <div class="content-add-type" id="content-add-type" style="position: absolute;display: none;">
											    	<form id="form-add-type">
											    		<div class="form-group row" style="margin: 0;padding: 0">
											    			<h6><b>Thêm mới loại hình sự kiện</b></h6>
											    		</div>
											    		<div class="form-group row">
														    <label style="font-size: 13px;padding-right: 0;" class="col-sm-12 col-form-label"><b>Tên loại hình</b></label>
														    <div class="col-sm-12">
														      <input type="text" class="form-control" name="type_name" style="border-radius: 0;width: 100%;">
														    </div>
														    <p class="text-danger col-sm-12" id="null_type_name" style="display: none;">Sự kiện phải có độ dài từ 5-50 ký tự</p>
													  	</div>
													  	<button class="btn btn-primary float-right" id="btn-add-type" type="button">
													  		Thêm mới
													  	</button>
											    	</form>
											    </div>
											  </div>
											</div>
									    </div>
									    <p class="text-danger col-sm-12" id="null_type" style="display: none;">Vui lòng chọn loại hình sự kiện</p>
								  	</div>

								  	<div class="form-group row">
									    <label style="font-size: 13px;" class="col-sm-3 col-form-label"><b>Ngày bắt đầu</b></label>
									    <div class="col-sm-9">
									      <input type="date" class="form-control" name="event_start" style="border-radius: 0;">
									    </div>
									    <p class="text-danger col-sm-12" id="null_eventstart" style="display: none;">Vui lòng chọn ngày bắt đầu</p>
									    <p class="text-danger col-sm-12" id="min_eventstart" style="display: none;">Ngày bắt đầu phải lớn hơn ngày hiện tại</p>
								  	</div>

								  	<div class="form-group row">
									    <label style="font-size: 13px;" class="col-sm-3 col-form-label"><b>Ngày kết thúc</b></label>
									    <div class="col-sm-9">
									      <input type="date" class="form-control" name="event_end" style="border-radius: 0;">
									    </div>
									    <p class="text-danger col-sm-12" id="event_end" style="display: none;">Ngày bắt kết thúc phải lớn hợn ngày bắt đầu</p>
								  	</div>
									
								</div>

					      		<div class="modal-footer" style="height:53px">
					      			@if($data->sv_status == 1)
					      				<button type="button" id="btn-event" class="btn btn-primary button-them-event" style="background-color: #00a680">Thêm sự kiện</button>
					      			@else
										<button disabled type="button" id="btn-event" class="btn btn-primary button-them-event" style="background-color: #00a680">Thêm sự kiện</button>
					      			@endif
				      			</div>
					    	</form>
						      
					    </div>

					  </div>
					</div>

				</div>
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
							<label>Giờ mở cửa</label>
							<input type="time" name="time_begin" value="{{$data->sv_open}}" >
							
						</div>
						<div class="input-text">
							<label>Giờ đóng cửa</label>
							
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
						<h6 style="color: #bd1717 !important;">Mô tả chi tiết</h6>
						<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
						<div class="input-text" class="col-md-12" style="padding: 0">
							{{-- <label style="padding: 0;" class="col-md-2">Mô tả dịch vụ</label> --}}
							<textarea name="mota" id="ten" class="col-md-9" style="margin-left: 27px;">{!!$data->sv_content!!}</textarea>
      						<script>CKEDITOR.replace('ten');</script>
      						
						</div>
						<div class="input-text">
							<p class="text-danger" id="null_chitiet" style="display: none;">Tên dịch vụ phải có độ dài tối thiểu 50 ký tự</p>
						</div><br>
			
						<h6 style="color: #bd1717 !important;">Ảnh mô tả</h6>
						<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: -15px;"></div>

						<div class="input-text" class="col-md-12" style="padding: 0"><br>
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

						<div class="input-text row">
							<div class="col-md-12" style="font-weight: bold;font-size: 14px;margin-bottom: 5px;">Thêm nhiều ảnh hơn</div>
							<div class="col-md-4">
								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-upload" style="border-radius: 0px;background-color: cornflowerblue;font-size: 14px;padding: 5px 20px;" id="btn-modal-upload-image">
									<i class="fa fa-upload" aria-hidden="true"></i> Thêm ảnh
								</button>
							</div>
							<div class="col-md-8" style="padding-left: 0px;">
								@if($data->sv_status == 1)
									<label style="width: 100%;padding-left: 0; font-size: 12px;">Dịch vụ của bạn đã được duyệt. Có thể thêm nhiều ảnh hơn cho dịch vụ</label>
								@else
									<label style="width: 100%;padding-left: 0; font-size: 12px;color: red">Dịch vụ chưa được duyệt - không thể thực hiện chức năng này</label>
								@endif
								
							</div>

							@if($data->sv_status == 1)
							<div id="modal-upload" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-lg-gallery">

							    <!-- Modal content-->
							    <div class="modal-content" style="margin-top:100px;border-radius: 0px;">
							      <div class="modal-header" style="padding: 6px 1rem;">
							        <h5 class="modal-title">Tải ảnh lên</h5>
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							      </div>
							      <div class="modal-body row" style="">
							      	{{-- <div class="col-md-12">
							      		<button type="button" class="close" data-dismiss="modal">&times;</button>
							      	</div> --}}
							        <div class="col-md-6">
										<!-- Fine Uploader DOM Element
									    ====================================================================== -->
									    <div id="fine-uploader-manual-trigger"></div>

									    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
									    ====================================================================== -->
									    <script>
									        $('#fine-uploader-manual-trigger').fineUploader({
									            template: 'qq-template-manual-trigger',
									            request: {
									                // endpoint: 'http://localhost/vntour_api/test-mul'
									                endpoint: 'http://localhost/vntour_api/test_mul'
									            },
									            thumbnails: {
									                placeholders: {
									                    waitingPath: 'public/resource/fine-uploader/placeholders/waiting-generic.png',
									                    notAvailablePath: 'public/resource/fine-uploader/placeholders/not_available-generic.png'
									                }
									            },
									            autoUpload: false
									        });

									        $('#trigger-upload').click(function() {
									            $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
									        });
								    	</script>
									</div>
									<div class="col-md-6" style="padding-left: 0">
										<div class="list-image-sv">
											<h6><b>Ảnh đã tải lên</b></h6>
											<ul id="list-detail-gallery" class="list-detail-gallery">
												<li>
													<div class="item-gallery">
														<img src="http://vntourweb/vntour_api/public/thumbnails/gallery/1/2_zing.jpg" alt="" class="img-img">
														<span class="delete-img-gallery">X</span>
													</div>
												</li>
											</ul>
										</div>
											
									</div>
							      </div>
							      {{-- <div class="modal-footer" style="height: 50px;">
							        <button style="height: 36px;width: 100px;padding: 0;border-radius: 0px !important;background-color: #e84545;margin-bottom: 0;" type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
							      </div> --}}
							    </div>

							  </div>
							</div>

							<div class="list-gallery col-md-12">
								<ul id="list-gallery">
									{{-- <li class="nho">
										<img src="http://vntourweb/vntour_api/public/thumbnails/gallery/1/2_zing.jpg" alt="">
									</li>

									<li class="nho">
										<img src="http://vntourweb/vntour_api/public/thumbnails/gallery/1/2_zing.jpg" alt="">
									</li>

									<li class="nho">
										<img src="http://vntourweb/vntour_api/public/thumbnails/gallery/1/2_zing.jpg" alt="">
									</li>

									<li class="nho">
										<img src="http://vntourweb/vntour_api/public/thumbnails/gallery/1/2_zing.jpg" alt="">
									</li>

									<li class="end-gallery nho nho-cuoi">
										<img src="http://vntourweb/vntour_api/public/thumbnails/gallery/1/2_zing.jpg" alt="">
										<div class="con-end-gallery">
											<div class="con-end-gallery-num">+80</div>
										</div>
									</li> --}}
								</ul>
								
							</div>

							<script type="text/template" id="qq-template-manual-trigger">
						        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Kéo ảnh vào đây">
						            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
						                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
						            </div>
						            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
						                <span class="qq-upload-drop-area-text-selector"></span>
						            </div>
						            <div class="buttons" style="width: auto;">
						                <div class="qq-upload-button-selector qq-upload-button">
						                    <div style="font-size: 14px;">Chọn ảnh</div>
						                </div>
						                <button type="button" id="trigger-upload" class="btn btn-primary">
						                    <i class="icon-upload icon-white"></i> Tải lên
						                </button>
						            </div>
						            <span class="qq-drop-processing-selector qq-drop-processing">
						                <span>Processing dropped files...</span>
						                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
						            </span>
						            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
						                <li>
						                    <div class="qq-progress-bar-container-selector">
						                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
						                    </div>
						                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
						                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
						                    <span class="qq-upload-file-selector qq-upload-file"></span>
						                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
						                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
						                    <span class="qq-upload-size-selector qq-upload-size"></span>
						                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel" title="Xóa ảnh">
						                    	<i class="fa fa-trash" aria-hidden="true"></i>
						                    </button>
						                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Thủ lại</button>
						                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
						                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
						                </li>
						            </ul>

						            <dialog class="qq-alert-dialog-selector">
						                <div class="qq-dialog-message-selector"></div>
						                <div class="qq-dialog-buttons">
						                    <button type="button" class="qq-cancel-button-selector">Đóng</button>
						                </div>
						            </dialog>

						            <dialog class="qq-confirm-dialog-selector">
						                <div class="qq-dialog-message-selector"></div>
						                <div class="qq-dialog-buttons">
						                    <button type="button" class="qq-cancel-button-selector">No</button>
						                    <button type="button" class="qq-ok-button-selector">Yes</button>
						                </div>
						            </dialog>

						            <dialog class="qq-prompt-dialog-selector">
						                <div class="qq-dialog-message-selector"></div>
						                <input type="text">
						                <div class="qq-dialog-buttons">
						                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
						                    <button type="button" class="qq-ok-button-selector">Ok</button>
						                </div>
						            </dialog>
						        </div>
						    </script>
							@endif
							
							
						</div><br>


						<button style="background-color: #00a680" type="button" class="btn btn-success col-md-12" id="btnaddplace">
							Cập nhật dịch vụ
						</button>
					</form>
				</div>
				<div class="col-md-2" style="position: fixed;top:100px;right: 78px;">
					<div class="" style="background-color: transparent;">
						@if($data->sv_status == 1)
							<img src="public/resource/images/icons/active-user.png" alt="" style="height: 50px;width: 50px;cursor: pointer;" title="Đã duyệt">
						@elseif($data->sv_status == -1)
							<img src="public/resource/images/icons/spam.png" alt="" style="height: 50px;width: 50px;cursor: pointer;" title="Bị đánh dấu spam">
						@else
							<img src="public/resource/images/icons/unactive.png" alt="" style="height: 50px;width: 50px;cursor: pointer;" title="Chưa duyệt">
						@endif
						
					</div>
				</div>
			</div>
		</div>
	</section>

	{{--  ====================================================================== > --}}
	<script type="text/javascript">
		function load_gallery() {
			var path = 'http://localhost/vntour_api/';
			var id_sv = $('#id_sv').val();
			$.ajax({
				url: path + 'get-gallery/' + id_sv,
				type: "GET",  
				success: function(response)   
				{
					// console.log(response.data);
					var dem = 0;
					var lam = new String();
					var lamBig = new String();
					if (response.data != null) 
					{
						for (var i = 0; i < response.data.length; i++) {
							// console.log(response.data[i]);
							var p_img = response.data[i];
							var data_img = response.data[i].slice(p_img.lastIndexOf("/") + 1, p_img.length);
							// console.log(data_img);
							if (i < 4) 
							{
								lam += '<li class="nho" data-toggle="modal" data-target="#modal-upload" style="cursor: pointer;">';
								lam += '<img src="'+ path + response.data[i] +'" alt="">';
								lam += '</li>';
							}
							else if(i == 4){
								var sum = 0;
								if (response.data.length >= 5) 
								{
									sum = response.data.length - 5;
									lam += '<li class="end-gallery nho nho-cuoi" data-toggle="modal" data-target="#modal-upload">';
									lam += '<img src="'+ path + response.data[i] +'" alt="">';
									lam += '<div class="con-end-gallery">';
									lam += '<div class="con-end-gallery-num">+' + sum +'</div>';
									lam += '</div>';
									lam += '</li>';
								}
								else
								{
									lam += '<li class="nho">';
									lam += '<img src="'+ path + response.data[i] +'" alt="">';
									lam += '</li>';
								}
							}
							lamBig += '<li class="li-img">';
							lamBig += '<div class="item-gallery">';
							lamBig += '<img src="'+ path + response.data[i] +'" alt="">';
							lamBig += '<span data-num="'+ i +'" data-img="'+ data_img +'" class="delete-img-gallery" onclick="deletephoto()">X</span>';
							lamBig += '</div>';
							lamBig += '</li>';
						}
						// response.data.forEach(function (data) {
							
								
						// })
							
						$('#list-gallery').html(lam);
						$('#list-detail-gallery').html(lamBig);
					}
				}
			});

		}
		$(document).ready(function () {
			load_gallery();
		});

		function click_upload() {
			$('#trigger-upload').click(function() {
				setTimeout(function () {
					load_gallery();
				},2000);
	        });
		}


		function deletephoto() {
			var id_sv = $('#id_sv').val();
			var data_del = document.getElementsByClassName('delete-img-gallery');
			var img = document.getElementsByClassName("li-img");
			// console.log(img);
			for (var i = 0; i < data_del.length; i++) {
				data_del[i].onclick = function () {
					var num = this.getAttribute("data-num");
					var conf = confirm('Bạn có chắc chắn muốn xóa ảnh vừa chọn');
					if (conf) 
					{
						// console.log(this.getAttribute("data-img"));
						var name = this.getAttribute("data-img");
						$.ajax({
							type:"DELETE",
							url:'http://localhost/vntour_api/delete-gallery-image/' + id_sv,
							data:{
								"_method":"DELETE",
								"name": name
							},
							dataType: 'Json'
						}).done(function (response) {
							// console.log(response.success);
							if (response.success == true) 
							{
								img[num].style.display = "none";
								load_gallery();
							}
							else{console.log(response);}
						})
					}
						
				}
			}
		}
		// $('.delete-img-gallery').on('click',function (e) {
		// 	console.log('lam');
		// 	e.preventDefault();
			
		// 	var conf = confirm('Bạn có chắc chắn muốn xóa ảnh vừa chọn');
		// 	if (conf) 
		// 	{
		// 		$(this).parent("#list-detail-gallery").fadeOut("slow",function () {
		// 			console.log("Xoa");
		// 		})
		// 	}
		// });
			
	</script>
    

    <style>
        #trigger-upload {
            color: white;
            background-color: #00ABC7;
            font-size: 14px;
            background-image: none;
        }

        #fine-uploader-manual-trigger .qq-upload-button {
            margin-right: 15px;
        }

        #fine-uploader-manual-trigger .buttons {
            width: 36%;
        }

        #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
            width: 60%;
        }
    </style>


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


	<section>
		<!-- Fine Uploader DOM Element
	    ====================================================================== -->
	    <div id="fine-uploader-manual-trigger"></div>

	    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
	    ====================================================================== -->
	    <script>
	    	var id_sv = $('#id_sv').val();
	        $('#fine-uploader-manual-trigger').fineUploader({
	            template: 'qq-template-manual-trigger',
	            request: {
	                // endpoint: 'http://localhost/vntour_api/test-mul'
	                endpoint: 'http://localhost/vntour_api/multiple-upload-image/' + id_sv
	            },
	            thumbnails: {
	                placeholders: {
	                    waitingPath: 'public/resource/fine-uploader/placeholders/waiting-generic.png',
	                    notAvailablePath: 'public/resource/fine-uploader/placeholders/not_available-generic.png'
	                }
	            },
	            autoUpload: false
	        });

	        $('#trigger-upload').click(function() {
	            $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
	            setTimeout(function () {
	            	load_gallery();
	            },3000);
	        });
    	</script>
	</section>

{{-- <script src="public/resource/js/ckeditor.js"></script> --}}


<script src="public/resource/js/select2.full.js"></script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	    $('#btn-add-type-event').click(function () {
			$('#content-add-type').toggle("slow");
		})
	});

		
</script>

{{-- <script src="public/resource/js/p/addplace.js"></script> --}}
<script src="public/resource/js/p/edit_service.js"></script>





@include('VietNamTour.header-footer.footer')
