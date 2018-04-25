$(document).ready(function () {
	load_district();
	load_ward()
})


//load quan theo tinh thanh pho
function load_district() {
	$('select[name=city]').change(function () {
		var path = 'loadDistrict/' + $(this).val();
		console.log(path);
		$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			response.forEach(function (data) {
				lam += '<option value="' + data.id + '">' + data.district_name +'</option>';
			})
			$('#district').html(lam);
		})
	})
}

// load ward
function load_ward() {
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
		})
	})
}