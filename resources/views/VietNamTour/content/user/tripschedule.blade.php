@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">
<link rel="stylesheet" href="public/resource/css/bootstrap.css">
<link rel="stylesheet" href="public/resource/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="public/resource/css/select2.min.css">
<link rel="stylesheet" href="public/resource/css/tripSchedule.css">
{{-- <link rel="stylesheet" href="public/resource/css/font-awesome.css"> --}}

	<style type="text/css">
		.table tbody tr:nth-child(2n+1) {
		    background-color: white;
		}

		ul.tabs {
			margin: 0;
			padding: 0;
			float: left;
			list-style: none;
			height: 32px;
			border-bottom: 1px solid #333;
			width: 100%;
		}

		ul.tabs li {
			float: left;
			margin: 0;
			cursor: pointer;
			padding: 0px 21px;
			height: 31px;
			line-height: 31px;
			border-top: 1px solid #333;
			border-left: 1px solid #333;
			/*border-bottom: 1px solid #333;
			background-color: #666;*/
			color: black;
			overflow: hidden;
			position: relative;
			width: 36%;
		}

		.tab_last { border-right: 1px solid #333; }

		ul.tabs li:hover {
			background-color: #ccc;
			color: #333;
		}

		ul.tabs li.active {
			background-color: #00a680;
			color: white;
			display: block;
		}

		.tab_container {
			/*border: 1px solid #ddd;*/
			border-top: none;
			clear: both;
			float: left;
			width: 100%;
			background: #fff;
			overflow: auto;
		}

		.tab_content {
			display: none;
		}

		.tab_drawer_heading { display: none; }

		@media screen and (max-width: 480px) {
			.tabs {
				display: none;
			}
			.tab_drawer_heading {
				background-color: #ccc;
				color: #fff;
				border-top: 1px solid #333;
				margin: 0;
				padding: 5px 20px;
				display: block;
				cursor: pointer;
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
			.d_active {
				background-color: #666;
				color: #fff;
			}
		}

		#list-detail{
			display: none;
		    min-height: 80px;
		    background-color: white;
		    border: 1px solid #ddd;
		    position: absolute;
		    top: 45px;
		    width: 92%;
		    z-index: 4;
		}

		input{
			border-radius: 0 !important;
		}
		
		a.btn{
			border-radius: 0 !important;
		}

		.btn-new:hover{
			/*font-weight: 600;*/
		}
		#edit-lichtrinh:hover{
			background-color: #00a680;
		}

		input[type=checkbox]
		{
		  /* Double-sized Checkboxes */
		  -ms-transform: scale(2); /* IE */
		  -moz-transform: scale(2); /* FF */
		  -webkit-transform: scale(2); /* Safari and Chrome */
		  -o-transform: scale(2); /* Opera */
		  padding: 10px;
		}
		.containers {
		  display: block;
		  position: relative;
		  padding-left: 35px;
		  margin-bottom: 12px;
		  cursor: pointer;
		  font-size: 22px;
		  -webkit-user-select: none;
		  -moz-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		}

		/* Hide the browser's default checkbox */
		.containers input {
		  position: absolute;
		  opacity: 0;
		  cursor: pointer;
		}

		/* Create a custom checkbox */
		.containers .checkmark {
		  position: absolute;
		  top: 0;
		  left: 0;
		  height: 25px;
		  width: 25px;
		  background-color: #eee;
		}

		/* On mouse-over, add a grey background color */
		.containers:hover input ~ .checkmark {
		  background-color: #ccc;
		}

		/* When the checkbox is checked, add a blue background */
		.containers input:checked ~ .checkmark {
		  background-color: #2196F3;
		}

		/* Create the checkmark/indicator (hidden when not checked) */
		.containers .checkmark:after {
		  content: "";
		  position: absolute;
		  display: none;
		}

		/* Show the checkmark when checked */
		.containers input:checked ~ .checkmark:after {
		  display: block;
		}

		/* Style the checkmark/indicator */
		.containers .checkmark:after {
		  left: 9px;
		  top: 5px;
		  width: 5px;
		  height: 10px;
		  border: solid white;
		  border-width: 0 3px 3px 0;
		  -webkit-transform: rotate(45deg);
		  -ms-transform: rotate(45deg);
		  transform: rotate(45deg);
		}
	</style>
<body>
	<section class="content-info">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-md-3 ">
						{{-- <div class="left-user">
							<div class="avatar">
								<h5 class="text-center">Danh sách lịch trình</h5>
							</div>
							<div class="options">
								<ul>
									@if($danhsach->data == null)
										<li class="">
											<a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> Thêm mới lịch trình</a>
										</li>
									@else
										<li class="">
											<a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> Thêm mới lịch trình</a>
										</li>
										@foreach($danhsach->data as $d)
											@if($d->id == $id_lichtrinh)
												<li class="active">
													<a  href="get_tripchudule_detail/{{$d->id}}"> {{$d->trip_name}}</a>
												</li>
											@else
												<li class="">
													<a href="get_tripchudule_detail/{{$d->id}}"> {{$d->trip_name}}</a>
												</li>
											@endif

										@endforeach
									@endif
								</ul>
							</div>
						</div>
						<br> --}}
						<div class="left-user" style="height: 546px;">
							<ul class="tabs" style="position: relative;">
								  <li class="active text-center" rel="tab1" title="Chưa hoàn thành">
								  	<i class="far fa-clone"></i>
								  </li>
								  <li class="text-center" rel="tab2" style="border-right: 1px solid black;" title="Đã hoàn thành">
								  	<i class="far fa-check-square"></i>
								  </li>
								  {{-- <li class="text-center"  style="background-color: white;border:none;" title="Thêm lịch trình">
								  		
								  </li> --}}
							</ul>
							<div class="themmoi" style="position: absolute;top:6px;right:21px;">
								<a href="" style="margin-bottom: 6px; padding-left: 16px;padding-right: 16px;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> 
						  			<i class="fas fa-plus"></i>
						  		</a>
							</div>
							<div class="tab_container">
							  	<h3 class="d_active tab_drawer_heading" rel="tab1">Tab 1</h3>
							  	<div id="tab1" class="tab_content">
								  	{{-- <h2>Tab 1 content</h2> --}}
								    <div class="options">
										<ul style="border-bottom: 1px solid #ddd;">
											@if($danhsach_CKT == null)
												{{-- <li class="">
													<a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> Thêm mới lịch trình</a>
												</li> --}}
											@else
												{{-- <li class="">
													<a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> Thêm mới lịch trình</a>
												</li> --}}
												@foreach($danhsach_CKT as $d)
													@if($d->id == $id_lichtrinh)
														<li class="active" style="position: relative;">
															<a  href="get_tripchudule_detail/{{$d->id}}"> {{$d->trip_name}}</a>
															<span data-id="{{$d->id}}"  class="xoa_lichtrinh"  onclick="xoa_lichtrinh()" style="position: absolute;top: 6px;right: 10px;color: #615a5a;cursor: pointer;">
																<i class="fas fa-times"></i>
															</span>
															{{-- <span class="lam-lich badge badge-success">Còn 3 ngày</span> --}}
														</li>
													@else
														<li class="">
															<a href="get_tripchudule_detail/{{$d->id}}"> {{$d->trip_name}}</a>
															<span data-id="{{$d->id}}" class="xoa_lichtrinh"  onclick="xoa_lichtrinh()" style="position: absolute;top: 6px;right: 10px;color: #615a5a;cursor: pointer;">
																<i class="fas fa-times"></i>
															</span>
															{{-- <span class="lam-lich badge badge-success">Còn 
																@foreach($lichtrinh as $l)
																	{{
																		date_format($l->trip_startdate,"Y-m-d H:i:s")
																		
																	}} 

																@endforeach
																	
															ngày</span> --}}
														</li>
													@endif

												@endforeach
											@endif
										</ul>
									</div>
							  	</div>
								  <!-- #tab1 -->

							  	<h3 class="tab_drawer_heading" rel="tab2">Tab 2</h3>
							  	<div id="tab2" class="tab_content">
								  {{-- <h2>Tab 2 content</h2> --}}
								    <div class="options">
										<ul>
											@if($danhsach_KT == null)
												{{-- <li class="">
													<a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> Thêm mới lịch trình</a>
												</li> --}}
											@else
												{{-- <li class="">
													<a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> Thêm mới lịch trình</a>
												</li> --}}
												@foreach($danhsach_KT as $d)
													@if($d->id == $id_lichtrinh)
														<li class="active">
															<a  href="get_tripchudule_detail/{{$d->id}}"> {{$d->trip_name}}</a>
															<span data-id="{{$d->id}}" class="xoa_lichtrinh" onclick="xoa_lichtrinh()" style="position: absolute;top: 6px;right: 10px;color: #615a5a;cursor: pointer;">
																<i class="fas fa-times"></i>
															</span>
														</li>
													@else
														<li class="">
															<a href="get_tripchudule_detail/{{$d->id}}"> {{$d->trip_name}}</a>
															<span data-id="{{$d->id}}" class="xoa_lichtrinh"  onclick="xoa_lichtrinh()" style="position: absolute;top: 6px;right: 10px;color: #615a5a;cursor: pointer;">
																<i class="fas fa-times"></i>
															</span>
														</li>
													@endif

												@endforeach
											@endif
										</ul>
									</div>
								  </div>
								  <!-- #tab2 -->
							</div>
								<!-- .tab_container -->
						</div>
					</div>			

						<div id="myModal" class="modal fade" role="dialog" style="margin-top: 100px;">
						  <div class="modal-dialog modal-lg">
						    <!-- Modal content-->
						    <div class="modal-content" style="border-radius: 0;">
					    	<form action="add_tripchudule" method="post">
						      <div class="modal-header">
						      	<h4 class="modal-title">Thêm mới lịch trình</h4>
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						      </div>
						      <div class="modal-body">

							      	<div class="row">
							      		<div class="col-md-6" style="border-right: 1px solid #ddd;">
							      			<div class="form-group">
											    <label class="">Tên lịch trình</label>
											    <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Tên lịch trình" required="required" name="trip_name">
										    	<span id="err_name" style="color:red;display:none;">Tên lịch trình ko được để trống</span>
										  	</div>
											  <div class="form-group">
											    <label >Ngày bắt đầu</label>
											    <input type="date" class="form-control" id="" placeholder="Ngày bắt đầu" required="required" name="trip_startdate">
											    <span id="err_star" style="color:red;display:none;">Ngày bắt đầu ko được để trống</span>
											    <span id="err_star_max" style="color:red;display:none;">Ngày bắt đầu phải lớn hơn ngày hiện tại</span>
											  </div>
											  <div class="form-group">
											    <label >Ngày kết thúc</label>
											    <input type="date" class="form-control datepicker" id="" placeholder="Ngày kết thúc" required="required" name="trip_enddate">
											    <span id="err_end" style="color:red;display:none;">Ngày kết thúc ko được để trống</span>
											    <span id="err_star_min" style="color:red;display:none;">Ngày kết thúc phải lớn hơn ngày bắt đầu</span>
											  </div>
							      		</div>
							      		<div class="col-md-6">
							      			<div class="form-group">
											    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nhập tên để chọn dịch vụ" required="required" id="search-schedule" style="position: relative;">
										    	
										  	</div>
										  	<div id="list-detail">
										  		<ul id="list-serach-sv">
										  			{{-- <li style="position: relative;" data-id="1" class="chon-sv">
										  				<img src="public/resource/images/avatar1.jpg" alt="" style="height: 50px;width: 50px;">
										  				<div class="text-lam">
										  					<span><b>Cafe Chat</b></span><br>
										  					<span class="text-con">Can Thơ</span>
										  				</div>
										  				<span class="type-sv badge badge-success">Ăn uống</span>
										  			</li>
										  			<li style="position: relative;" data-id="1" class="chon-sv">
										  				<img src="public/resource/images/avatar1.jpg" alt="" style="height: 50px;width: 50px;">
										  				<div class="text-lam">
										  					<span><b>Cafe Chat</b></span><br>
										  					<span class="text-con">Can Thơ</span>
										  				</div>
										  				<span class="type-sv badge badge-success">Ăn uống</span>
										  			</li> --}}
										  		</ul>
										  	</div>

										  	<div id="danh-sach">
										  		<ul id="myUL">
											  		{{-- <li style="position: relative; display: inline-flex;" data-id="1" class="">
										  				<img src="public/resource/images/avatar1.jpg" alt="" style="height: 50px;width: 50px;">
										  				<div class="text-lam">
										  					<span><b>Cafe Chat</b></span><br>
										  					<span class="text-con">Can Thơ</span>
										  				</div>
										  				<span style="position: absolute;" class="type-sv badge badge-success">Ăn uống</span>
										  				<span class="xoaxoa"><i class="fas fa-times"></i></span>
									  				</li> --}}
												</ul>
										  	</div>
							      		</div>
							      	</div>
									  
						      </div>
						      <div class="modal-footer">
						        <button type="button" style="margin-bottom: 0;background: #de5959;padding: 11px 12px !important;border-radius: 0px !important;border:1px solid #de5959; margin-right: 10px;" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
							        <button type="button" id="addLichtrinh" class="btn btn-primary" style="border:1px solid #00a680;background-color: #00a680 !important; border-radius: 0px;padding: 11px 40px;margin:0;">Thêm mới</button>
						      </div>
					      	</form>
						    </div>

						  </div>
						</div>

					<div class="col-md-9">
						<div class="right-user" style="padding: 5px 15px;">
							<div class="col-md-12">
								<h4 style="padding:10px;" class="text-center"><b>Chi tiết lịch trình</b></h4>
							</div>
							<div class="col-md-12" style="padding-left: 0;">
								@if($chitiet == null)
									<h5 style="" class=""> Tên lịch trình:<b></b></h5>
									<span>Ngày bắt đầu: <b></b></span><br>
									<span>Ngày kết thúc: <b></b></span>
								@else
									@foreach($lichtrinh as $l)
										<div class="" style="position: relative;">
											<input type="hidden" value="{{$l->id}}" name="id_lt">
											<h5 id="name-h" class="">Tên lịch trình: <b>{{$l->trip_name}}</b></h5>
											<div id="star-s">
												<span  style="display: block;width: 100%;">Ngày bắt đầu: 
													<b>{{date('d-m-Y',strtotime($l->trip_startdate))}}</b>
												</span>
												<span id="end-s" style="display: block;width: 100%;">Ngày kết thúc: 
													<b>{{date('d-m-Y',strtotime($l->trip_enddate))}}</b>
												</span>
											</div>
												
										</div>
										<div class=" float-left" style="display: inline-flex;">
											<label>Hoàn thành:</label>
											@if($l->trip_status == 0)
												<input type="checkbox" class="" style="width: 10px;margin-left: 16px;margin-top: 7px;"  id="check_schedule">
											@else
												<input type="checkbox" class="" style="width: 10px;margin-left: 16px;margin-top: 7px;" checked id="check_schedule">
											@endif
											
											{{-- <span class="containers">
											  <input type="checkbox" checked="checked">
											  <span class="checkmark"></span>
											</span> --}}
										</div>	
									@endforeach
										<div id="edit-lichtrinh" style="position:absolute;top:-8px;right:50%;display:none;">
											<span id="btn-capnhat" data-toggle="modal" data-target="#modal-edit" title="Chỉnh sửa lịch trình" class="edit-lichtrinh" style="cursor: pointer;padding: 5px 10px;background-color: #ddd;display: block">
												<i class="fas fa-pencil-alt"></i>
											</span>
											<div id="modal-edit" class="modal fade" role="dialog">
											  <div class="modal-dialog">

											    <!-- Modal content-->
											    <div class="modal-content" style="margin-top:100px; border-radius: 0;">
										    	<form action="">
											      <div class="modal-header">
											        <h4 class="modal-title">Chỉnh sửa lịch trình</h4>
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											      </div>
											      <div class="modal-body">
											      	@foreach($lichtrinh as $l)
													<div class="form-group">
													    <label class="">Tên lịch trình</label>
													    <input type="text" class="form-control" id="e_trip_name" aria-describedby="emailHelp" placeholder="Tên lịch trình" required="required" name="e_trip_name" value="{{$l->trip_name}}">
												    	<span id="e_err_name" style="color:red;display:none;">Tên lịch trình ko được để trống</span>
												  	</div>
												  	<div class="form-group">
													    <label >Ngày bắt đầu</label>
													    <input type="date" class="form-control" id="" placeholder="Ngày bắt đầu" required="required" name="e_trip_startdate" value="{{$l->trip_startdate}}">
													    <span id="err_star" style="color:red;display:none;">Ngày bắt đầu ko được để trống</span>
													    <span id="e_err_star_max" style="color:red;display:none;">Ngày bắt đầu phải lớn hơn ngày hiện tại</span>
													  </div>
													<div class="form-group">
													    <label >Ngày kết thúc</label>
													    <input type="date" class="form-control datepicker" id="" placeholder="Ngày kết thúc" required="required" name="e_trip_enddate" value="{{$l->trip_enddate}}">
													    <span id="e_err_end" style="color:red;display:none;">Ngày kết thúc ko được để trống</span>
													    <span id="e_err_star_min" style="color:red;display:none;">Ngày kết thúc phải lớn hơn ngày bắt đầu</span>
													  </div>
											        </div>
													@endforeach
											        
											      <div class="modal-footer">
											        <button type="button" style="margin-bottom: 0;background: #de5959;padding: 11px 12px !important;border-radius: 0px !important;border:1px solid #de5959; margin-right: 10px;" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
							        				<button type="button" id="editlichtrinh" class="btn btn-primary" style="border:1px solid #00a680;background-color: #00a680 !important; border-radius: 0px;padding: 11px 40px;margin:0;">Cập nhật</button>
											      </div>
										        </form>
											    </div>

											  </div>
											</div>
										</div>
										
											
								@endif
								
									
							</div>
							<br>
							<table class="table table-bordered" style="font-size: 12px;">
							  <thead>
							    <tr style="font-size: 15px;">
							      <th scope="col" class="text-center" style="width: 40%;">Tên địa điểm</th>
							      <th scope="col" class="text-center">Ảnh min họa</th>
							      <th scope="col" class="text-center" style="width: 10%;">
							      	<a href="place-user/add/1" class="btn btn-sm btn-primary btn-new" data-toggle="modal" data-target="#exampleModal" style="border-radius: 0px;background-color: #00a680;border: 1px solid #00a680;">
							      		<i class="fas fa-plus"></i> Thêm mới
							      	</a>
							      </th>
							    </tr>
							  </thead>
							  <tbody>  
							    @if($chitiet == null)
							    @else
							    	@foreach($chitiet->data as $c)
										<tr style="font-size: 14px;">
											@if($c->hotel_name !=null)
									      		<th >{{$c->hotel_name}}</th>
									      	@elseif($c->sightseeing_name !=null)
									      		<td>{{$c->sightseeing_name}}</td>
								      		@elseif($c->entertainments_name !=null)
									      		<td>{{$c->entertainments_name}}</td>
								      		@elseif($c->transport_name !=null)
									      		<td>{{$c->transport_name}}</td>
								      		@else
									      		<td>{{$c->eat_name}}</td>
									      	@endif
									      <td class="text-center">
									      	<img style="height: 50px;" src="public/thumbnails/{{$c->image_details_1}}" alt="">
									      </td>
									      <td class="text-center">
									      	<a href="schedule-delete/{{$c->id_detail}}" class="btn btn-sm btn-danger">Xóa</a>
									      </td>
									    </tr>
							    	@endforeach
								@endif
							  </tbody>
							</table>

							

							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content" style="border-radius: 0;">
						    	<form action="add_detailtripchudule/{{$id_lichtrinh}}" method="post">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Thêm chi tiết lịch trình</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							          <input type="hidden" value="{{$id_lichtrinh}}" id="id_lich_trinh">
							        </button>
							      </div>
							      <div class="modal-body">
							        <div class="form-group">
							        	@if($lichtrinh != null)
								        	@foreach($lichtrinh as $l)
												<label for=""><b>Tên lịch trình</b></label>
											    <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Tên lịch trình" readonly="readonly" name="" value="{{$l->trip_name}}">
											@endforeach
										@endif
										    
									  </div>
									  {{-- <div class="form-group">
									    <label for="exampleInputPassword1"><b>Dịch vụ</b></label>
									    <select class="js-example-basic-single col-md-4" name="service_id" style="width: 100%;">
							              	<option value="0">Chọn dịch vụ</option>
							              	@if($dv != null)
							              		@foreach($dv as $d)
							              			<option value="{{$d->id_service}}">{{$d->name_place}}</option>
							              		@endforeach
							              	@endif
										</select>
									  </div> --}}

									  <div class="col-md-12" id="themchitiet" style="padding: 0;">
							      			<div class="form-group">
											    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nhập tên để chọn dịch vụ" required="required" id="search-schedule2" style="position: relative;">
										    	
										  	</div>
										  	<div id="list-detail2">
										  		<ul id="list-serach-sv2" style="padding: 0">
										  			{{-- <li style="position: relative;" data-id="1" class="chon-sv">
										  				<img src="public/resource/images/avatar1.jpg" alt="" style="height: 50px;width: 50px;">
										  				<div class="text-lam">
										  					<span><b>Cafe Chat</b></span><br>
										  					<span class="text-con">Can Thơ</span>
										  				</div>
										  				<span class="type-sv badge badge-success">Ăn uống</span>
										  			</li>
										  			<li style="position: relative;" data-id="1" class="chon-sv">
										  				<img src="public/resource/images/avatar1.jpg" alt="" style="height: 50px;width: 50px;">
										  				<div class="text-lam">
										  					<span><b>Cafe Chat</b></span><br>
										  					<span class="text-con">Can Thơ</span>
										  				</div>
										  				<span class="type-sv badge badge-success">Ăn uống</span>
										  			</li> --}}
										  		</ul>
										  	</div>

										  	<div id="danh-sach2">
										  		<ul id="myUL2" style="list-style-type: none;padding: 0;">
											  		{{-- <li style="position: relative; display: inline-flex;" data-id="1" class="">
										  				<img src="public/resource/images/avatar1.jpg" alt="" style="height: 50px;width: 50px;">
										  				<div class="text-lam">
										  					<span><b>Cafe Chat</b></span><br>
										  					<span class="text-con">Can Thơ</span>
										  				</div>
										  				<span style="position: absolute;" class="type-sv badge badge-success">Ăn uống</span>
										  				<span class="xoaxoa"><i class="fas fa-times"></i></span>
									  				</li> --}}
												</ul>
										  	</div>
							      		</div>
							      </div>
							      <div class="modal-footer" style="height: 55px;">
							        <button type="button" style="margin-bottom: 0;background: #de5959;padding: 11px 12px !important;border-radius: 0px !important;border:1px solid #de5959; margin-right: 10px;" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
							        <button id="btnthemchitiet" type="button" class="btn btn-primary" style="border:1px solid #00a680;background-color: #00a680 !important; border-radius: 0px;padding: 11px 40px;margin:0;">Thêm
							        </button>
							      </div>
						      	</form>
							    </div>
							  </div>
							</div>
								
					</div>

					</div>
				</div>
			</div>
		</div>
	</section>


</body>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
</script>


<script src="public/resource/js/p/addplace.js"></script>
<script src="public/resource/js/select2.full.js"></script>

	{{-- <script src="public/resource/js/menu-style.js"></script> --}}
	{{-- <script type="text/javascript" src="public/resource/js/jquery-3.3.1.min.js"></script> --}}
	<script type="text/javascript" src="public/resource/js/popper.js"></script>
	<script type="text/javascript" src="public/resource/js/bootstrap.js"></script>
	<script type="text/javascript" src="public/resource/js/p/tripSchule.js"></script>
	{{-- <script type="text/javascript" src="public/resource/js/dataTables.bootstrap.min.js"></script> --}}
	
	<script type="text/javascript">
		 $(".tab_content").hide();
	    $(".tab_content:first").show();

	  /* if in tab mode */
	    $("ul.tabs li").click(function() {
			
	      $(".tab_content").hide();
	      var activeTab = $(this).attr("rel"); 
	      $("#"+activeTab).fadeIn();		
			
	      $("ul.tabs li").removeClass("active");
	      $(this).addClass("active");

		  $(".tab_drawer_heading").removeClass("d_active");
		  $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
		  
	    });
		/* if in drawer mode */
		$(".tab_drawer_heading").click(function() {
	      
	      $(".tab_content").hide();
	      var d_activeTab = $(this).attr("rel"); 
	      $("#"+d_activeTab).fadeIn();
		  
		  $(".tab_drawer_heading").removeClass("d_active");
	      $(this).addClass("d_active");
		  
		  $("ul.tabs li").removeClass("active");
		  $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
	    });
		
		
		/* Extra class "tab_last" 
		   to add border to right side
		   of last tab */
		$('ul.tabs li').last().addClass("tab_last");
	
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#name-h').hover(function () {
				$('#edit-lichtrinh').css('right','54%');
				$('#edit-lichtrinh').css('top','-8px');
				$('#edit-lichtrinh').css('display','block');
			},function () {
				$('#edit-lichtrinh').css('display','none');
			})
			$('#star-s').hover(function () {
				$('#edit-lichtrinh').css('right','70%');
				$('#edit-lichtrinh').css('top','38px');
				$('#edit-lichtrinh').css('display','block');
			},function () {
				$('#edit-lichtrinh').css('display','none');
				$('#edit-lichtrinh').hover(function () {
					$('#edit-lichtrinh').css('display','block');
				})
			})

			$('#edit-lichtrinh').hover(function () {
				$('#edit-lichtrinh').css('display','block');
				$('#edit-lichtrinh').css('background-color','#00a680 !important');
			})

			$('#btn-capnhat').click(function () {
				
			})
		})

		function function_name(argument) {
			// body...
		}
			
	</script>
	
@include('VietNamTour.header-footer.footer')