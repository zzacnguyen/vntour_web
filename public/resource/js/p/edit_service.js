$(document).ready(function () {
	load_district();
	load_ward();
	// autoloadPlace();
	submitform();
})


//load quan theo tinh thanh pho
function load_district() {
	$('select[name=city]').change(function () {
		var path = 'loadDistrict/' + $(this).val();
		$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			// lam += '<option value="0">Chọn tỉnh quận huyện</option>';
			response.forEach(function (data) {
				lam += '<option value="' + data.id + '">' + data.district_name +'</option>';
			})
			$('#district').html(lam);
			load_ward();
		})
	})
}

// load ward
function load_ward() {
	var path = 'loadWard/' + $('select[name=districtt]').val();
	$.ajax({
		url: path,
		type: 'GET'
	})
	.done(function (response) {
		var lam = new String(); // khoi tao bien luu pha hien thi len view
		response.forEach(function (data) {
			lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
		})
		$('#ward').html(lam);
		autoloadPlace();
	});

	$('select[name=districtt]').change(function () {
		var path = 'loadWard/' + $(this).val();
		$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			response.forEach(function (data) {
				lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
			})
			$('#ward').html(lam);
			autoloadPlace();
		})
	})

}

function autoloadWar() {
	var path = 'loadWard/' + $('select[name=districtt]').val();
	console.log(path);
	$.ajax({
		url: path,
		type: 'GET'
	})
	.done(function (response) {
		var lam = new String(); // khoi tao bien luu pha hien thi len view
		response.forEach(function (data) {
			lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
		})
		$('#ward').html(lam);
	});
}

function autoloadPlace() {
	var path = 'load_place_ward/' + $('select[name=ward]').val();
	$.ajax({
		url: path,
		type: 'GET'
	})
	.done(function (response) {
		var lam = new String(); // khoi tao bien luu pha hien thi len view
		lam += '<option value="0">Chọn địa điểm</option>';
		response.forEach(function (data) {
			lam += '<option value="' + data.id + '">' + data.pl_name +'</option>';
		})
		$('#place').html(lam);
	})

	$('select[name=ward]').change(function () {
		var path = 'load_place_ward/' + $('select[name=ward]').val();
		$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			console.log(response);
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			// lam += '<option value="0">Chọn tỉnh quận huyện</option>';
			response.forEach(function (data) {
				lam += '<option value="' + data.id + '">' + data.pl_name +'</option>';
			})
			$('#place').html(lam);
		})
	})
}

function submitform() {
	var c = document.getElementsByClassName('item-img');
	$('#btnaddplace').click(function () {
		if (validateForm() == 1) 
		{
			var editorText = CKEDITOR.instances.ten.getData();

			var form = $('#formAdd')[0];

			// Create an FormData object 
	        var data = new FormData(form);

			// If you want to add an extra field for the FormData
	        data.append("mota", editorText);

			// disabled the submit button
	        $("#btnSubmit").prop("disabled", true);

			// console.log(data);
	        var id_sv = $('#id_sv').val();
	        var path = 'http://vntourweb/vntour_api/post-edit-service-user/' + id_sv;
	        // console.log(path);
	        $.ajax({
	            type: "POST",
	            enctype: 'multipart/form-data',
	            url: path,
	            data: data,
	            processData: false,
	            contentType: false,
	            cache: false,
	            timeout: 600000,
	            success: function (data) {
	            	console.log(data);
	            	if (parseInt(data) > 0) 
	            	{
	            		// anh(parseInt(data));
	            		location.href = "http://vntourweb/vntour_web/service-user";
	            	}
	            },
	            error: function (e) {

	                // $("#result").text(e.responseText);
	                console.log("ERROR : ", e);
	                // $("#btnSubmit").prop("disabled", false);

	            }
	        });
		}

	})
}

function anh(id) {
	var form = $('#formAdd')[0];

		// Create an FormData object 
        var data = new FormData(form);
		var path_uplad_img = 'http://vntourweb/vntour_api/upload-image/' + id;
		$.ajax({
			url: path_uplad_img, // Url to which the request is send
			type: "POST",  
			enctype: 'multipart/form-data',           // Type of request to be send, called as method
			data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				show_toast();
				setTimeout(function () {
					location.href = "http://vntourweb/vntour_web/service-user";
				},2000);
				
			}
		});
}


function validateForm() {
	var sv_name = $('input[name=sv_name]').val();
	var time_begin = $('input[name=time_begin]').val();
	var time_end = $('input[name=time_end]').val();
	var sv_lowest_price = parseInt($('input[name=sv_lowest_price]').val());
	var sv_highest_price = parseInt($('input[name=sv_highest_price]').val());
	var editorText = CKEDITOR.instances.ten.getData();
	var banner = document.getElementById("banner").files.length;
	var details1 = document.getElementById("details1").files.length;
	var details2 = document.getElementById("details2").files.length;


	// null name
	if (sv_name.length > 5) 
	{
		$('#null_name').css('display','none');
		if(true)
		{
			$('#null_city').css('display','none');
			if(true){
				$('#null_place').css('display','none');

				if (sv_lowest_price <= sv_highest_price) 
				{
					$('#price_error').css('display','none');

					if (editorText.length > 50) 
					{
						$('#null_chitiet').css('display','none');
						// if (banner > 0 && details1 > 0 && details2 > 0) 
						// {
						// 	return 1;
						// }
						// else{
						// 	$('#null_image').css('display','block');
						// 	scrolltop(850);
						// 	return -1;
						// }
						return 1;
					}
					else
					{
						$('#null_chitiet').css('display','block');
						scrolltop(490);
						return -1;
					}
				}
				else{
					$('#price_error').css('display','block');
					scrolltop(300);
					return -1;
				}
			}
			else
			{
				$('#null_place').css('display','block');
				scrolltop(0);
				return -1;
			}
		}
		else
		{
			$('#null_city').css('display','block');
			scrolltop(0);
			return -1;
		}
			
	}	
	else{
		$('#null_name').css('display','block');
		scrolltop(0);
		return -1;
	}
		
}


// xu ly 3 anh chi tiet

//-- banner
var banner = document.getElementById("banner");
banner.addEventListener("change",previewImagesBanner,false);

// preview image
function previewImagesBanner(){
  var fileList = this.files;
  console.log(fileList);
  
  var anyWindow = window.URL || window.webkitURL;

      for(var i = 0; i < fileList.length; i++){
        
        var name = fileList[i].name;
        var extension = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1) 
        {
          alert('Khong phai dinh dang anh');
        }
        else
        {
          	var objectUrl = anyWindow.createObjectURL(fileList[i]);
          	$('.preview-area2').html('<img src="' + objectUrl + '" />');
          	window.URL.revokeObjectURL(fileList[i]);
        } 
      }
}

//-- detail1
var details1 = document.getElementById("details1");
details1.addEventListener("change",previewImagesdetails1,false);

// preview image
function previewImagesdetails1(){
  var fileList = this.files;
  console.log(fileList);
  
  var anyWindow = window.URL || window.webkitURL;

      for(var i = 0; i < fileList.length; i++){
        
        var name = fileList[i].name;
        var extension = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1) 
        {
          alert('Khong phai dinh dang anh');
        }
        else
        {
          	var objectUrl = anyWindow.createObjectURL(fileList[i]);
          	$('.preview-area3').html('<img src="' + objectUrl + '" />');
          	window.URL.revokeObjectURL(fileList[i]);
        } 
      }
}

//-- detail2
var details2 = document.getElementById("details2");
details2.addEventListener("change",previewImagesdetails2,false);

// preview image
function previewImagesdetails2(){
  var fileList = this.files;
  console.log(fileList);
  
  var anyWindow = window.URL || window.webkitURL;

      for(var i = 0; i < fileList.length; i++){
        
        var name = fileList[i].name;
        var extension = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1) 
        {
          alert('Khong phai dinh dang anh');
        }
        else
        {
          	var objectUrl = anyWindow.createObjectURL(fileList[i]);
          	$('.preview-area4').html('<img src="' + objectUrl + '" />');
          	window.URL.revokeObjectURL(fileList[i]);
        } 
      }
}


function scrolltop(height) 
{
    jQuery('html, body').animate({scrollTop: height}, 500);
    return false;
}