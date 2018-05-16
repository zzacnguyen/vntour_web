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
								<img src="public/resource/images/avatar1.jpg" alt="">
								<h5 class="text-center">Lam The Men</h5>
							</div>
							<div class="options">
								<ul>
									<li class="active"><a href=""><i class="far fa-edit"></i> Thông tin tài khoản</a></li>
									<li><a href=""><i class="fas fa-lock"></i> Đổi mật khẩu</a></li>
									<li style="border-bottom: 1px solid #ddd;"><a href=""><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
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