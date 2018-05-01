$(document).ready(function () {
	var path = window.location.pathname;

	select_sapxep();
	select_hienthi();

	// $('#see').click(function () {
	// 	var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
	// 	var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=4";
	// 	$.ajax({
	// 				url: path_city,
	// 				type: 'GET'
	// 			}).done(function(response){
	// 				var lam = new String();
	//
	// 				if (response == "null") {
	// 					$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
	// 				}
	// 				else{
	// 					response.forEach(function (data) {
	// 						lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
	// 						lam += '<div class="destination-grid">';
	// 						lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
	// 						lam += data.sv_id;
	// 						lam += '&type=' + data.sv_type +'">';
	// 						lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
	// 						lam += '</a>';
	// 						lam += '<div class="destination-name">';
	// 						lam += '<h4>' + data.name + '</h4>';
	// 						lam += '</div>';
	// 						lam += '<div class="destination-icon">';
	// 						lam += '<a>' + data.rating + ' <i class="far fa-star"></i></a>';
	// 						lam += '<a>' + data.view + ' <i class="fas fa-eye"></i></a>';
	// 						lam += '<a>' + data.like +' <i class="far fa-thumbs-up"></i></a>';
	// 						lam += '<a>' + data.point + ' <i class="far fa-bookmark"></i></a>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						$('#content_place').html(lam);
	// 					})
	// 				}
	// 			});
	// })
	//
	// $('#eat').click(function () {
	// 	var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
	// 	var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=1";
	// 	$.ajax({
	// 				url: path_city,
	// 				type: 'GET'
	// 			}).done(function(response){
	// 				var lam = new String();
	//
	// 				if (response == "null") {
	// 					$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
	// 				}
	// 				else{
	// 					response.forEach(function (data) {
	// 						lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
	// 						lam += '<div class="destination-grid">';
	// 						lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
	// 						lam += data.sv_id;
	// 						lam += '&type=' + data.sv_type +'">';
	// 						lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
	// 						lam += '</a>';
	// 						lam += '<div class="destination-name">';
	// 						lam += '<h4>' + data.name + '</h4>';
	// 						lam += '</div>';
	// 						lam += '<div class="destination-icon">';
	// 						lam += '<a>' + data.rating + '<i class="far fa-star"></i></a>';
	// 						lam += '<a>' + data.view + '<i class="fas fa-eye"></i></a>';
	// 						lam += '<a>' + data.like +'<i class="far fa-thumbs-up"></i></a>';
	// 						lam += '<a>' + data.point + '<i class="far fa-bookmark"></i></a>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						$('#content_place').html(lam);
	// 					})
	// 				}
	// 			});
	// })
	//
	// $('#hotel').click(function () {
	// 	var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
	// 	var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=2";
	// 	$.ajax({
	// 				url: path_city,
	// 				type: 'GET'
	// 			}).done(function(response){
	// 				var lam = new String();
	//
	// 				if (response == "null") {
	// 					$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
	// 				}
	// 				else{
	// 					response.forEach(function (data) {
	// 						lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
	// 						lam += '<div class="destination-grid">';
	// 						lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
	// 						lam += data.sv_id;
	// 						lam += '&type=' + data.sv_type +'">';
	// 						lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
	// 						lam += '</a>';
	// 						lam += '<div class="destination-name">';
	// 						lam += '<h4>' + data.name + '</h4>';
	// 						lam += '</div>';
	// 						lam += '<div class="destination-icon">';
	// 						lam += '<a>' + data.rating + '<i class="far fa-star"></i></a>';
	// 						lam += '<a>' + data.view + '<i class="fas fa-eye"></i></a>';
	// 						lam += '<a>' + data.like +'<i class="far fa-thumbs-up"></i></a>';
	// 						lam += '<a>' + data.point + '<i class="far fa-bookmark"></i></a>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						$('#content_place').html(lam);
	// 					})
	// 				}
	// 			});
	// })
	//
	// $('#enter').click(function () {
	// 	var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
	// 	var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=5";
	// 	$.ajax({
	// 				url: path_city,
	// 				type: 'GET'
	// 			}).done(function(response){
	// 				var lam = new String();
	//
	// 				if (response == "null") {
	// 					$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
	// 				}
	// 				else{
	// 					response.forEach(function (data) {
	// 						lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
	// 						lam += '<div class="destination-grid">';
	// 						lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
	// 						lam += data.sv_id;
	// 						lam += '&type=' + data.sv_type +'">';
	// 						lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
	// 						lam += '</a>';
	// 						lam += '<div class="destination-name">';
	// 						lam += '<h4>' + data.name + '</h4>';
	// 						lam += '</div>';
	// 						lam += '<div class="destination-icon">';
	// 						lam += '<a>' + data.rating + '<i class="far fa-star"></i></a>';
	// 						lam += '<a>' + data.view + '<i class="fas fa-eye"></i></a>';
	// 						lam += '<a>' + data.like +'<i class="far fa-thumbs-up"></i></a>';
	// 						lam += '<a>' + data.point + '<i class="far fa-bookmark"></i></a>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						$('#content_place').html(lam);
	// 					})
	// 				}
	// 			});
	// })
	//
	// $('#tran').click(function () {
	// 	var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
	// 	var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=3";
	// 	$.ajax({
	// 				url: path_city,
	// 				type: 'GET'
	// 			}).done(function(response){
	// 				var lam = new String();
	//
	// 				if (response == "null") {
	// 					$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
	// 				}
	// 				else{
	// 					response.forEach(function (data) {
	// 						lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
	// 						lam += '<div class="destination-grid">';
	// 						lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
	// 						lam += data.sv_id;
	// 						lam += '&type=' + data.sv_type +'">';
	// 						lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
	// 						lam += '</a>';
	// 						lam += '<div class="destination-name">';
	// 						lam += '<h4>' + data.name + '</h4>';
	// 						lam += '</div>';
	// 						lam += '<div class="destination-icon">';
	// 						lam += '<a>' + data.rating + '<i class="far fa-star"></i></a>';
	// 						lam += '<a>' + data.view + '<i class="fas fa-eye"></i></a>';
	// 						lam += '<a>' + data.like +'<i class="far fa-thumbs-up"></i></a>';
	// 						lam += '<a>' + data.point + '<i class="far fa-bookmark"></i></a>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						lam += '</div>';
	// 						$('#content_place').html(lam);
	// 					})
	// 				}
	// 			});
	// })
})


function select_sapxep() {
	$('select[name=boloc_sapxep]').change(function () {
		var path = window.location.pathname;

		var id_city = path.slice(path.lastIndexOf('/') + 1,path.indexOf('&'));
		console.log(id_city);
		var type = $('select[name=boloc_sapxep]').val();
		if (type == 1) {
			//city/fillters/92&page=1&l=2&limit=18
			var path_boloc = 'city/fillter/' + id_city + '&page=1&l=1';
			window.location.href = path_boloc;
		}
		else{
			var path_boloc = 'city/fillter/' + id_city + '&page=1&l=2';
			window.location.href = path_boloc;
		}
	})
}

function select_hienthi() {
	$('select[name=hienthi]').change(function () {
		var num = $('select[name=hienthi]').val();
		var path = window.location.pathname;
		var path2 = path.slice(0,path.lastIndexOf('=') + 1);
		if (num == 1) {
			window.location.href(path2 + '9');
		}
		else if (num == 2) {
			$(location).attr('href', path2 + '18')
		}
	})
}
