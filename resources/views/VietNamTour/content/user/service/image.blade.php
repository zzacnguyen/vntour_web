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
					<form method="post" enctype='multipart/form-data' id="formAdd">
						
						<div class="input-text" class="col-md-12" style="padding: 0">
							
							<input type="file" accept="image/*" style="" class="col-md-9" name="banner" id="banner">
							
							<input type="file" accept="image/*" style="" class="col-md-9" name="details1" id="">
							<input type="file" accept="image/*" style="" class="col-md-9" name="details2" id="">

							{{-- <input type="file" class="dimmy" id="image-input" accept="image/*" name="image-input[]" multiple />
						    <div>
						      <ul class="preview-area" id="list-img" style="display: none;"></ul>
						    </div> --}}
							
						</div>

						<button type="submit" class="btn btn-success col-md-12" id="btnaddplace">Thêm dịch vụ</button>
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
{{-- <script src="public/resource/js/p/addservice.js"></script> --}}
<script type="text/javascript">
	$(document).ready(function (e) {
		$("#formAdd").on('submit',(function(e) {
			e.preventDefault();
			$("#message").empty();
			$('#loading').show();
				$.ajax({
					url: "http://vntourweb/vntour_api/upload-image/235", // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						console.log(data);
					}
				});
		}))
		})
	
</script>

<script type="text/javascript">

      
    </script>


@include('VietNamTour.header-footer.footer')
