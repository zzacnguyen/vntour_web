$(document).ready(function () {
	load_district();
	load_ward();
	// load_gallery();
	add_hotel();
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
		var sv_name = $('input[name=sv_name]').val();
		var time_begin = $('input[name=time_begin]').val();
		var time_end = $('input[name=time_end]').val();
		var sv_lowest_price = parseInt($('input[name=sv_lowest_price]').val());
		var sv_highest_price = parseInt($('input[name=sv_highest_price]').val());
		var editorText = CKEDITOR.instances.ten.getData();

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
	        var id_user = $('#id_user').val();
	        var path = 'http://localhost/vntour_api/post-add-service-user/' + id_user;
	        console.log(path);
	        $.ajax({
	            type: "POST",
	            url: path,
	            data: 
	            {
        			sv_name:sv_name,
        			sv_description : $('input[name=sv_mota]').val(),
        			mota: editorText,
        			time_begin: time_begin,
        			time_end: time_end,
        			sv_lowest_price: sv_lowest_price,
        			sv_highest_price: sv_highest_price, 
        			sv_website: $('input[name=sv_phone_number]').val(),
        			sv_phone_number: $('input[name=sv_website]').val(),
        			sv_types: $('select[name=sv_types]').val(),
        			diadiem: $('select[name=diadiem]').val(),
        			type_hotel: $('input[name=typehotel]').val()
        		},
        		beforeSend:function () {
	            	$('#loader').css('display','block');
	            }
	        })
	        .done(function (data) {
	        	console.log(data);
	        	if (parseInt(data) > 0) 
            	{
            		anh(parseInt(data));
            		$('#loader').css('display','none');
            	}
            	else{
            		$('#loader').css('display','none');
            		alert(data);
            	}
	        })
	        .fail(function () {
	        	$('#loader').css('display','none');
	        	alert('Lỗi không thêm được!');
	        })
		}

	})
}



// upload anh
function anh(id) {
	var form = $('#formAdd')[0];

		// Create an FormData object 
        var data = new FormData(form);
		var path_uplad_img = 'http://localhost/vntour_api/upload-image/' + id;
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
				console.log(data)
				show_toast();
				setTimeout(function () {
					location.href = "service-user";
				},2000);
				
			},
			error: function (e) {

	                // $("#result").text(e.responseText);
	                console.log("ERROR : ", e);
	                console.log('loi anh');
	                // $("#btnSubmit").prop("disabled", false);

	            }
		});
}


//xu ly anh

	var inputLocalFont = document.getElementById("image-input");
      inputLocalFont.addEventListener("change",previewImages,false);
      var dem = 0;
      function previewImages(){
          var fileList = this.files;
          console.log(fileList);
          
          var anyWindow = window.URL || window.webkitURL;

              for(var i = 0; i < fileList.length; i++){
                
                var name = fileList[i].name;
                // console.log(name);
                var extension = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1) 
                {
                  alert('Khong phai dinh dang anh');
                }
                else
                {
                  dem++;
                  console.log(dem);
                  if (dem <= 5) 
                  {
                  	var objectUrl = anyWindow.createObjectURL(fileList[i]);
	                  $('#list-img').css('display','block');
	                  $('.preview-area').append('<li data-img="'+ name +'" class="item-img" style="position: relative;"><img src="' + objectUrl + '" />' + '<span class="close-img" onclick="close_img()">X</span></li>');
	                  window.URL.revokeObjectURL(fileList[i]);
                  }
                  else
                  {
                  	
                  }
                } 
              }
      }


      function close_img() 
      {
	        var c = document.getElementsByClassName('item-img');
			var tab = [];
			var liIndex = 0;
			for (var i = 0; i < c.length; i++) {
				tab.push(c[i].innerHTML)
			}
			
			var i;
			for (i = 0; i < c.length; i++) {
			  c[i].onclick = function() {
			    liIndex = tab.indexOf(this.innerHTML);
			  }
			}
			c[liIndex].parentNode.removeChild(c[liIndex]);
			dem = c.length;
      }



// show toast
function show_toast() {
	var t = document.getElementById('toast');
	t.classList.add('toast-show');
	// setTimeout(function () {
	// 	t.classList.remove('toast-show');
	// },1000);
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
		if($('select[name=city]').val() > 0)
		{
			$('#null_city').css('display','none');
			if($('select[name=diadiem]').val() > 0){
				$('#null_place').css('display','none');

				if (sv_lowest_price <= sv_highest_price) 
				{
					$('#price_error').css('display','none');

					if (editorText.length > 50) 
					{
						$('#null_chitiet').css('display','none');
						var size1 = 0;
						var size2 = 0;
						var size3 = 0;
						if (banner > 0 && details1 > 0 && details2 > 0) 
						{
							
							return 1;
						}
						else{
							$('#null_image').css('display','block');
							scrolltop(850);
							return -1;
						}
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
        	if (fileList[i].size > 2097152) 
        	{
        		alert('Kích thước ảnh không lớn hơn 2MB');
        		var $el = $('#banner');
			   	$el.wrap('<form>').closest('form').get(0).reset();
			   	$el.unwrap();
        	}
        	else{
        		var objectUrl = anyWindow.createObjectURL(fileList[i]);
	          	$('.preview-area2').html('<img src="' + objectUrl + '" />');
	          	window.URL.revokeObjectURL(fileList[i]);
        	}
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
        	if (fileList[i].size > 2097152) 
        	{
        		alert('Kích thước ảnh không lớn hơn 2MB');
        		var $el = $('#details1');
			   	$el.wrap('<form>').closest('form').get(0).reset();
			   	$el.unwrap();
        	}
        	else{
        		var objectUrl = anyWindow.createObjectURL(fileList[i]);
	          	$('.preview-area3').html('<img src="' + objectUrl + '" />');
	          	window.URL.revokeObjectURL(fileList[i]);
        	}	
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
        	if (fileList[i].size > 2097152) 
        	{
        		alert('Kích thước ảnh không lớn hơn 2MB');
        		var $el = $('#details2');
			   	$el.wrap('<form>').closest('form').get(0).reset();
			   	$el.unwrap();
        	}
        	else{
        		var objectUrl = anyWindow.createObjectURL(fileList[i]);
	          	$('.preview-area4').html('<img src="' + objectUrl + '" />');
	          	window.URL.revokeObjectURL(fileList[i]);
        	}	
        } 
      }
}


function scrolltop(height) 
{
    jQuery('html, body').animate({scrollTop: height}, 500);
    return false;
}

function add_hotel() {
	$('select[name=sv_types]').change(function () {
		if ($('select[name=sv_types]').val() == 2) 
		{
			var lam = '';
			lam += '<label>Loại khách sạn</label>';
			lam += '<input type="number" name="typehotel" min="1" max="5">';
			$('#type_hotel').html(lam);
		}
		else{
			$('#type_hotel').html('');
		}
			
	})
}

function formatBytes(bytes,decimals) {
   if(bytes == 0) return 0;
   var k = 1024,
       dm = decimals || 2,i = Math.floor(Math.log(bytes) / Math.log(k));
   return parseFloat((bytes / Math.pow(k, i)));
}


