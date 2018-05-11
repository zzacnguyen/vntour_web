@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">
<link rel="stylesheet" href="public/resource/css/bootstrap.css">
<link rel="stylesheet" href="public/resource/css/dataTables.bootstrap.min.css">
	
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
										<li class="active">
											<label>Chưa có lịch trình</label> - 
											<a href="" style="color: red !important;width: auto;">Tạo ngay</a>
										</li>
									@else
										@foreach($danhsach->data as $d)
											<li class=""><a href=""> {{$d->trip_name}}</a></li>
										@endforeach
									@endif
								</ul>
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
									<h5 style="" class=""> <b></b></h5>
									<span>Ngày bắt đầu: <b></b></span>
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
							      <th scope="col">Tên địa điểm</th>
							      <th scope="col">Ảnh min họa</th>
							      	<a href="place-user/add/1" class="btn btn-sm btn-primary" id="myBtn">
							      		<i class="fas fa-plus"></i> Thêm mới
							      	</a>
							      </th>
							    </tr>
							  </thead>
							  <tbody>  
							    @if($chitiet == null)
							    @else
							    	@foreach($chitiet->data as $c)
										<tr>
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
									      <td>
									      	<img src="public/resource/thumbnails/{{$c->image_details_1}}" alt="">
									      </td>
									      <td>
									      	<a href="" class="btn btn-sm btn-danger">Xóa</a>
									      </td>
									    </tr>
							    	@endforeach
								@endif
							  </tbody>
							</table>


							<nav aria-label="Page navigation example">
							  <ul class="pagination">
							    <li class="page-item">
							      <a class="page-link" href="#" aria-label="Previous">
							        <span aria-hidden="true">&laquo;</span>
							        <span class="sr-only">Previous</span>
							      </a>
							    </li>
							    <li class="page-item active"><a class="page-link" href="#">1</a></li>
							    <li class="page-item"><a class="page-link" href="#">2</a></li>
							    <li class="page-item"><a class="page-link" href="#">3</a></li>
							    <li class="page-item">
							      <a class="page-link" href="#" aria-label="Next">
							        <span aria-hidden="true">&raquo;</span>
							        <span class="sr-only">Next</span>
							      </a>
							    </li>
							  </ul>
							</nav>
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

<script src="public/resource/js/p/addplace.js"></script>

	{{-- <script src="public/resource/js/menu-style.js"></script> --}}
	{{-- <script type="text/javascript" src="public/resource/js/jquery-3.3.1.min.js"></script> --}}
	<script type="text/javascript" src="public/resource/js/popper.js"></script>
	<script type="text/javascript" src="public/resource/js/bootstrap.js"></script>
	{{-- <script type="text/javascript" src="public/resource/js/dataTables.bootstrap.min.js"></script> --}}

	
@include('VietNamTour.header-footer.footer')