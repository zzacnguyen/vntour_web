$(document).ready(function () {
	load_district();
	load_ward();
	autoloadPlace();
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
		// lam += '<option value="0">Chọn tỉnh quận huyện</option>';
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
		if ($('select[name=city]').val() == 0) 
		{
			alert('Vui lòng chọn Tỉnh thành cho dịch vụ');
		}
		else if(c.length < 3)
		{
			alert('Bạn phải chọn 3 ảnh cho dịch vụ!');
		}
		else{
			var fileList = document.getElementById("image-input").files;
			console.log(fileList);
			// $('#img1').val(c[0].getAttribute("data-img"));
			// $('#img2').val(c[1].getAttribute("data-img"));
			// $('#img3').val(c[2].getAttribute("data-img"));
			$('#formAdd').submit();
		}
	})
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
                  if (dem <= 3) 
                  {
                  	var objectUrl = anyWindow.createObjectURL(fileList[i]);
	                  $('#list-img').css('display','block');
	                  $('.preview-area').append('<li data-img="'+ name +'" class="item-img" style="position: relative;"><img src="' + objectUrl + '" />' + '<span class="close-img" onclick="close_img()">X</span></li>');
	                  window.URL.revokeObjectURL(fileList[i]);
                  }
                  else
                  {
                  	alert('Bạn chỉ được chọn tối đa 3 ảnh');
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
