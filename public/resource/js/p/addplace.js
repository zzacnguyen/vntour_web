$(document).ready(function () {
	load_district();
	load_ward();
	submit_form();
	submit_form2();
})


//load quan theo tinh thanh pho
function load_district() {
	
	if ($('select[name=city]').val() > 0) 
	{
		var path = 'loadDistrict/' + $('select[name=city]').val();
		$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			// lam += '<option value="0">Chọn tỉnh quận huyện</option>';
			response.forEach(function (data) {
				if ($('input[name=id_district2]').val() == data.id) 
				{
					lam += '<option selected value="' + data.id + '">' + data.district_name +'</option>';
				}
				else{
					lam += '<option value="' + data.id + '">' + data.district_name +'</option>';
				}
				
			})
			$('#district').html(lam);
			load_ward();
		})
	}

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
		// lam += '<option value="0">Chọn khu vực cho địa điểm</option>';
		response.forEach(function (data) {
			if (parseFloat($('input[name=id_ward]').val()) == data.id) 
			{
				lam += '<option selected value="' + data.id + '">' + data.ward_name +'</option>';
			}
			else
			{
				lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
			}
				
		})
		$('#ward').html(lam);
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
				// if (parseFloat($('input[name=id_ward]').val()) == data.id) 
				// {
				// 	lam += '<option selected value="' + data.id + '">' + data.ward_name +'</option>';
				// }
				// else
				// {
				// 	lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
				// }
				lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
			})
			$('#ward').html(lam);
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


function validate_form() {
	var name = $('input[name=place_name]').val();
	var place_phone = $('input[name=place_phone]').val();
	var city = $('select[name=city]').val();
	var place_address = $('input[name=place_address]').val();
	var vido = $('input[name=vido]').val();
	var kinhdo = $('input[name=kinhdo]').val();
	var phone = $('input[name=place_phone]').val();
	// console.log(phone);

	if (name.length > 5) 
	{
		$('#null_name').css('display','none');

		if (city > 0) 
		{
			$('#null_location').css('display','none');
			if (vido.length > 0 && kinhdo.length > 0) 
			{
				if (!check_phone(phone) && phone.length != 0) 
				{
					$('#null_phone').css('display','block');
					scrolltop(0);
					return -1;
				}
				else{
					return 1;
				}
				
			}
			else
			{
				$('#null_location').css('display','block');
				scrolltop(300);
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
	else
	{
		$('#null_name').css('display','block');
		scrolltop(0);
		return -1;
	}
}


function submit_form() {

	$('#btnaddplace').click(function () {
		if (validate_form() == 1) 
		{
			var name = $('input[name=place_name]').val();
			var place_phone = $('input[name=place_phone]').val();
			var city = $('select[name=city]').val();
			var place_address = $('input[name=place_address]').val();
			var vido = $('input[name=vido]').val();
			var kinhdo = $('input[name=kinhdo]').val();
			var phone = $('input[name=place_phone]').val();
			// $('#formAddPlace').submit();
			var id = $('input[name=u_id]').val();
			$.ajax({
				url: 'http://localhost/vntour_api/post-add-place-user/' + id,
				type: 'POST',
				data: 
				{
					place_name: name,
					place_address: place_address,
					place_phone: place_phone,
					vido: vido,
					kinhdo: kinhdo,
					place_ward: $('select[name=ward]').val()
				}
			})
			.done(function (response) {
				var lam = new String(); // khoi tao bien luu pha hien thi len view
				// lam += '<option value="0">Chọn tỉnh quận huyện</option>';
				if (response == -1) 
				{
					$('#null_name').css('display','block');
					scrolltop(0);
				}
				else if(response == -2){
					$('#null_location').css('display','block');
					scrolltop(300);
				}
				else if(response == -3){
					$('#null_city').css('display','block');
					scrolltop(0);
				}
				else if(response == -4){
					alert('Lỗi tài khoản');
				}
				else if(response == 1){
					alert('Thêm thành công');
					location.href = "place-user";
				}
				else{
					alert('Lỗi không thêm được');
				}
				console.log(response);
			})
			.fail(function (data) {
				alert('Lỗi');
			})
		}
		else{
			
		}
	})
}

function submit_form2() {
	$('#btneditplace').click(function () {
		if (validate_form() == 1) 
		{
			$('#formAddPlace').submit();
		}
		else{
			
		}
	})
}

function scrolltop(height) 
{
    jQuery('html, body').animate({scrollTop: height}, 500);
    return false;
}

function phonenumber(inputtxt)
{
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if(inputtxt.value.match(phoneno))
     {
	   return true;
	 }
   else
     {
	   // alert("Not a valid Phone Number");
	   return false;
     }
}

function check_phone(argument) {
	if (isNaN(argument)) 
	{
		return false;
	}
	else if(argument.length < 10 && argument.length <=11){
		return false;
	}
	return true;
}