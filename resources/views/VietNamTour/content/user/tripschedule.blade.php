@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">
<link rel="stylesheet" href="public/resource/css/bootstrap.css">
<link rel="stylesheet" href="public/resource/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="public/resource/css/select2.min.css">
	
	<style type="text/css">
		.table tbody tr:nth-child(2n+1) {
		    background-color: white;
		}
	</style>

	<section class="content-info">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-md-3 ">
						<div class="left-user">
							<div class="avatar">
								<h5 class="text-center">Danh sách lịch trình</h5>
							</div>
							<div class="options">
								<ul>
									@if($danhsach->data == null)
										{{-- <li class="active">
											<label>Chưa có lịch trình</label> - 
											<a href="" style="color: red !important;width: auto;">Tạo ngay</a>
										</li> --}}
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

						<div id="myModal" class="modal fade" role="dialog" style="margin-top: 100px;">
						  <div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
					    	<form action="add_tripchudule" method="post">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Thêm mới lịch trình</h4>
						      </div>
						      <div class="modal-body">
									  <div class="form-group">
									    <label for="exampleInputEmail1">Tên lịch trình</label>
									    <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Tên lịch trình" required="required" name="trip_name">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputPassword1">Ngày bắt đầu</label>
									    <input type="date" class="form-control" id="" placeholder="Ngày bắt đầu" required="required" name="trip_startdate">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputPassword1">Ngày kết thúc</label>
									    <input type="date" class="form-control" id="" placeholder="Ngày kết thúc" required="required" name="trip_enddate">
									  </div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" style="margin-bottom: 0;background: #de5959;padding: 10px 12px !important;border-radius: 0px !important;" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
							        <button type="submit" class="btn btn-primary" style="margin-bottom: 0;padding: 6px 41px !important;border-radius: 0px !important;margin-left: 9px;">Thêm</button>
						      </div>
					      	</form>
						    </div>

						  </div>
						</div>


					</div>
					<div class="col-md-9">
						<div class="right-user" style="padding: 5px 15px;">
							<div class="col-md-12">
								<h4 style="padding:10px;" class="text-center"><b>Danh sách địa điểm</b></h4>
							</div>
							<div class="col-md-12" style="padding-left: 0;">
								@if($chitiet == null)
									<h5 style="" class=""> Tên lịch trình:<b></b></h5>
									<span>Ngày bắt đầu: <b></b></span><br>
									<span>Ngày kết thúc: <b></b></span>
								@else
									@foreach($lichtrinh as $l)
										<h5 style="" class="">Tên lịch trình: <b>{{$l->trip_name}}</b></h5>
										<span>Ngày bắt đầu: <b>{{$l->trip_startdate}}</b></span><br>
										<span>Ngày kết thúc: <b>{{$l->trip_enddate}}</b></span>
									@endforeach
										
								@endif

									
							</div>
							<br>
							<table class="table table-bordered" style="font-size: 12px;">
							  <thead>
							    <tr>
							      <th scope="col" class="text-center" style="width: 40%;">Tên địa điểm</th>
							      <th scope="col" class="text-center">Ảnh min họa</th>
							      <th scope="col" class="text-center" style="width: 10%;">
							      	<a href="place-user/add/1" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
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
							    <div class="modal-content">
						    	<form action="add_detailtripchudule/{{$id_lichtrinh}}" method="post">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Thêm chi tiết lich trình</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
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
									  <div class="form-group">
									    <label for="exampleInputPassword1"><b>Dịch vụ</b></label>
									    <select class="js-example-basic-single col-md-4" name="service_id" style="width: 100%;">
							              	<option value="0">Chọn dịch vụ</option>
							              	@if($dv != null)
							              		@foreach($dv as $d)
							              			<option value="{{$d->id_service}}">{{$d->name_place}}</option>
							              		@endforeach
							              	@endif
										</select>
									  </div>
							      </div>
							      <div class="modal-footer" style="height: 55px;">
							        <button type="button" style="margin-bottom: 0;background: #de5959;padding: 10px 12px !important;border-radius: 0px !important;" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
							        <button type="submit" class="btn btn-primary" style="margin-bottom: 0;padding: 6px 41px !important;border-radius: 0px !important;margin-left: 9px;">Thêm</button>
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
	{{-- <script type="text/javascript" src="public/resource/js/dataTables.bootstrap.min.js"></script> --}}

	
@include('VietNamTour.header-footer.footer')