@include('VietNamTour.header-footer.header')


<script src="public/resource/js/toastr.min.js"></script>
<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">
<link rel="stylesheet" href="public/resource/css/bootstrap.css">
<link rel="stylesheet" href="public/resource/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="public/resource/css/toastr.min.css">
<link rel="stylesheet" href="public/resource/css/place.css">
	<style type="text/css">
		.table tbody tr:nth-child(2n+1) {
		    background-color: white;
		}

		.active-boloc{
			color: #fec107 !important;
		}

		body{
			background-color: #eee;
		}
		.box-title{
			padding: 15px 30px;
		    position: relative;
		    font-weight: 700;
		    font-size: 16px;
		    overflow: hidden;
		    border-bottom: 1px solid #ddd;
		}
		.left-box .box-body ul {
			list-style-type: none;
		    line-height: 18px;
		    font-size: 15px;
		    font-weight: 500;
		    padding: 14px 30px 10px 30px;
		}
		.left-box .box-body ul li{
		    margin-bottom: 10px;
    		padding-bottom: 10px;
    		border-bottom: 1px solid #eee;
		}

		.left-box .box-body ul li a{
		    color: #797986;
    		text-decoration: none;
		}
	</style>

	<section class="content-info">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="menu-lam col-md-3">
						<div class="left-box" style="background-color: white;">
							<div class="box-title">
								Bộ lọc
								<span></span>
							</div>
							<div class="box-body">
								<ul>
									@if($flag == 1)
										<li><a href="service-user" class="active-boloc">Tất cả</a></li>
										<li><a href="service-user/active">Đã kích hoạt</a></li>
										<li><a href="service-user/not-active">Chưa kích hoạt</a></li>
									@elseif($flag == 2)
										<li><a href="service-user">Tất cả</a></li>
										<li><a href="service-user/active" class="active-boloc">Đã kích hoạt</a></li>
										<li><a href="service-user/not-active">Chưa kích hoạt</a></li>
									@else
										<li><a href="service-user">Tất cả</a></li>
										<li><a href="service-user/active">Đã kích hoạt</a></li>
										<li><a href="service-user/not-active" class="active-boloc">Chưa kích hoạt</a></li>
									@endif
									
									
								</ul>
							</div>
						</div>

						<div class="left-box" style="background-color: white;">
							<div class="box-title">
								Thống kê
								<span></span>
							</div>
							<div class="box-body">
								<ul>
									<li><a href="">Top lượt xem</a></li>
									<li><a href="">Top like</a></li>
									<li><a href="">Top Rating</a></li>
								</ul>
							</div>
						</div>
					</div>	

					<div class="col-md-9">
						<div class="right-user" style="padding: 5px 15px;">
							<div class="col-md-12">
								<h4 style="padding:10px;" class="text-center"><b>Danh sách dịch vụ bạn đã thêm</b></h4>
							</div>
							<table class="table table-bordered table-hover" style="font-size: 12px;">
							  <thead>
							    <tr>
							      <th scope="col">Tên dịch vụ</th>
							      <th scope="col" class="text-center">Loại hình</th>
							      <th scope="col" class="text-center">Ngày tạo</th>
							      <th scope="col" class="text-center">Trạng thái</th>
							      <th scope="col" class="text-center" style="width: 166px;">
							      	<a class="btn btn-sm btn-primary" id="myBtn" href="{{route('serviceuser')}}">
							      		<i class="fas fa-plus"></i> Thêm mới
											</a>
							      </th>
							    </tr>
							  </thead>
							  <tbody>
									@foreach($data as $val)
							    <tr>
							      <td>{{$val->sv_name}}</td>
							      <td class="text-center">
												@if($val->sv_type == 1)
													Ăn uống
												@elseif($val->sv_type == 2)
													Khách sạn
												@elseif($val->sv_type == 3)
													Phương tiện
												@elseif($val->sv_type == 4)
													Tham quan
												@else
													Vui chơi
												@endif
										</td>
							      {{-- <td>{{substr($val->created_at,0,strpos($val->created_at,' '))}}</td> --}}
							      <td class="text-center">{{date('d-m-Y',strtotime($val->sv_created_at->date))}}</td>
							      {{-- <td>{{$val->sv_status==1? "Đã kích hoạt":"Chưa kích hoạt"}}</td> --}}
							      <td class="text-center">
							      		@if($val->sv_status != 1)
							      			<i class="fas fa-times"></i>
							      		@else
							      			<i class="fa fa-check"></i>
							      		@endif
							      </td>
							      <td class="text-center">
										<a href="{{route('edit_service_user',$val->sv_id)}}" class="btn btn-sm btn-info">
											<i class="far fa-edit"></i> Chi tiết
										</a>
							      	<button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Xóa</button>
							      </td>
								</tr>
									@endforeach
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
@if(Session::has('message'))
<script>
Command: toastr["success"]("{{Session::get('message')}}")

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
@endif
	
@include('VietNamTour.header-footer.footer')