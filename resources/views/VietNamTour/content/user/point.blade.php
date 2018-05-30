@include('VietNamTour.header-footer.header')


<script src="public/resource/js/toastr.min.js"></script>
<link rel="stylesheet" href="public/resource/css/toastr.min.css">

<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">



<style type="text/css">
	button[type="button"] {
	    background-color: none;
	    border: none;
	    border-radius: 0;
	    color: white;
	    cursor: pointer;
	    line-height: 1rem;
	    padding: .75rem 2rem;
		margin-bottom: 0px;
	}
	table tbody tr:nth-child(odd) {
	    background-color: white;
	}
</style>


	<section class="addplace" style="margin-top:150px;">
		<div class="container">
			<div class="content">
				<div class="row justify-content-md-center">
					<div class="col-md-9" style="background-color: white;">
						<h5 style="color: #bd1717; margin-top: 10px;">Thông tin điểm thưởng</h5>
						<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
						<table class="table table-bordered">
						  <tbody>
						    <tr>
						      <td colspan="2"><b>Tài khoản điểm thưởng</b></td>
						    </tr>
						    <tr>
						      <td colspan="2"><label>Bạn đang có: </label><span > {{$data->point_now}}</span></td>
						    </tr>
						    <tr>
						      <td><label>Điểm thưởng khả dụng: </label><span class="float-right">{{$data->point_now}}</span></td>
						      <td class=""><label>Điểm đã quy đổi: </label><span class="float-right">{{$data->point_exchanged}}</span></td>
						    </tr>
						    <tr>
						      
						      <td colspan="2"><label>Tổng điểm thưởng: </label> <span class="float-right">{{$data->point_total}}</span></td>
						    </tr>
						    {{-- <tr>
						      <td colspan="2"><label><b>Chi tiết điểm thưởng</b></label></td>
						    </tr> --}}
						  </tbody>
						</table>
					</div>
				</div>
			</div> <!-- end content -->
		</div>
	</section>



	{{-- <script>
		$(document).ready(function(){
		    $("#myBtn").click(function(){
		        $("#myModal").modal();
		    });

		    
	</script> --}}

	<script src="public/resource/js/lightbox.min.js"></script>
	{{-- <script src="public/resource/js/detail-hotel.js"></script> --}}
	<script src="public/resource/js/menu-style.js"></script>
	<script src="public/resource/js/p/account.js"></script>

	@if(Session::has('message_edit'))
		
		<script>
			@if(Session::get('message_edit') == "Cập nhật thành công!")
				Command: toastr["success"]("{{Session::get('message_edit')}}")
			@else
				Command: toastr["error"]("{{Session::get('message_edit')}}")
			@endif
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
	
	@if(Session::has('message'))
		
		<script>
			@if(Session::get('message') == "Cập nhật mật khẩu thành công!")
				Command: toastr["success"]("{{Session::get('message')}}")
			@elseif(Session::get('message') == "Mật khẩu cũ không trùng khớp!")
				Command: toastr["warning"]("{{Session::get('message')}}")
			@else
				Command: toastr["error"]("{{Session::get('message')}}")
			@endif
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

	@if(Session::has('message_uplevel'))
		
		<script>
			@if(Session::get('message_uplevel') == "Đăng ký thành công!")
				Command: toastr["success"]("{{Session::get('message_uplevel')}}")
			@elseif(Session::get('message') == "Hiện tại bạn không thể đăng ký thêm quyền!")
				Command: toastr["warning"]("{{Session::get('message_uplevel')}}")
			@else
				Command: toastr["error"]("{{Session::get('message_uplevel')}}")
			@endif
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

	{{-- message_uplevel --}}


@include('VietNamTour.header-footer.footer')