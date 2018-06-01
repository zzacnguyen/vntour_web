@include('VietNamTour.header-footer.header')

<script src="public/resource/js/toastr.min.js"></script>
<link rel="stylesheet" href="public/resource/css/toastr.min.css">

<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">
<link rel="stylesheet" href="public/resource/css/bootstrap.css">
<link rel="stylesheet" href="public/resource/css/pagination.css">
<link rel="stylesheet" href="public/resource/css/dataTables.bootstrap.min.css">
	
	<style type="text/css">
		.table tbody tr:nth-child(2n+1) {
		    background-color: white;
		}
		body{
			background-color: #eee;
		}
		ul, li {
            list-style: none;
        }

        #wrapper {
            width: 900px;
            margin: 20px auto;
        }

        .data-container {
            margin-top: 20px;
        }

        .data-container ul {
            padding: 0;
            margin: 0;
        }

        .data-container li {
            margin-bottom: 5px;
            padding: 5px 10px;
            background: #eee;
            color: #666;
        }
	</style>

	<section class="content-info" style="min-height: 600px;">
		<div class="container">
			<div class="content">
				<div class="row">
					{{-- <div class="col-md-3 ">
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
					</div> --}}
					<div class="col-md-12">
						<div class="right-user" style="padding: 5px 15px;">
							<div class="col-md-12">
								<h4 style="padding:10px;" class="text-center"><b>Danh sách địa điểm</b></h4>
							</div>
							<table class="table table-bordered table-hover" style="font-size: 12px;">
							  <thead>
							    <tr>
							      <th scope="col" class="text-center">Tên địa điểm</th>
							      <th scope="col" class="text-center">Địa chỉ</th>
							      <th scope="col" class="text-center">Ngày tạo</th>
							      <th scope="col" class="text-center" style="width: 50px;">Đã duyệt</th>
							      <th scope="col" class="text-center" style="width: 166px;">
							      	<a href="{{route('addplaceuser')}}" class="btn btn-sm btn-primary" id="myBtn">
							      		<i class="fas fa-plus"></i> Thêm mới
							      	</a>
							      </th>
							    </tr>
							  </thead>
							  <tbody id="list-place">
								{{-- @foreach($data as $val)
								    <tr>
								      <td >{{$val->pl_name}}</td>
								      <td>{{$val->pl_address}}</td>
								      <td class="text-center">{{date('d-m-Y',strtotime($val->created_at))}}</td>
								      <td class="text-center">
								      		@if($val->pl_status != 1)
								      			<i class="fas fa-times"></i>
								      		@else
								      			<i class="fa fa-check"></i>
								      		@endif
								      </td>
								      <td class="text-center">
											<a class="btn btn-sm btn-info" href="{{route('edit_placeuser',$val->id)}}">
												<i class="far fa-edit"></i> Chi tiết
											</a>
								      		<button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Xóa</button>
								      </td>
									</tr>
								@endforeach --}}
							  </tbody>
							</table>


							<nav aria-label="Page navigation example">
							  <ul class="pagination" id="pagination">
							    {{-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
							    <li class="page-item"><a class="page-link" href="#">2</a></li>
							    <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
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

{{-- <script src="public/resource/js/p/addplace.js"></script> --}}

	
	<script type="text/javascript" src="public/resource/js/popper.js"></script>
	<script type="text/javascript" src="public/resource/js/bootstrap.js"></script>
	<script src="public/resource/js/jquery.twbsPagination.js"></script>
	<script src="public/resource/js/p/place_user.js"></script>
	<script src="public/resource/js/pagination.min.js"></script>

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

<script>
  
</script>



@include('VietNamTour.header-footer.footer')