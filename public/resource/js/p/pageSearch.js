$(document).ready(function (argument) {
	loadSearch();
	clickse();
	// save_dichvu_search();
	$('#allser').click(function (argument) {
		window.location.reload();
	})
})

function clickse() {
	var chon = document.getElementsByClassName('selectcon');
	// console.log(chon);
	for (var i = 0; i < chon.length; i++) {
		chon[i].onclick = function () {
			for (var i = 0; i < chon.length; i++) {
				chon[i].classList.remove('active-type');
			}
			this.classList.add('active-type');
		}
	}
		
}

var path = window.location.pathname;

function loadSearch() {
	var city_id = $('#idcity').val();
	var keyword = $('#keywordd').val();
	var type = $('#idtype').val();
	// console.log(path);
	$('#eat').click(function () {
		//keyword=lam&city=all&type=all
		var path_city = 'conSearch/'+ city_id +'&type='+ type +'&keyword='+ keyword +'&selecttype=1';
		// console.log(path_city);
		searchCon(path_city);
	})
	// $.ajax({
	// 				url: path_city,
	// 				type: 'GET'
	// 			}).done(function(response){
	// 				var lam = new String();
	// 				console.log(response);
	// 				if (response.length == 0) {
	// 					$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
	// 				}
	// 				else{
	// 					response.forEach(function (data) {
	// 						lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
	// 						lam += '<div class="destination-grid">';
	// 						lam += '<a href="detail/id=';
	// 						lam += data.id_service;
	// 						lam += '&type=' + data.sv_type +'">';
	// 						lam += '<img src="public/thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
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

	$('#hotel').click(function () {
		var path_city = 'conSearch/'+ city_id +'&type='+ type +'&keyword='+ keyword +'&selecttype=2';
		
		searchCon(path_city);
	})

	$('#tran').click(function () {
		var path_city = 'conSearch/'+ city_id +'&type='+ type +'&keyword='+ keyword +'&selecttype=3';
		searchCon(path_city);
	})

	$('#see').click(function () {
		var path_city = 'conSearch/'+ city_id +'&type='+ type +'&keyword='+ keyword +'&selecttype=4';
		searchCon(path_city);
	})

	$('#enter').click(function () {
		var path_city = 'conSearch/'+ city_id +'&type='+ type +'&keyword='+ keyword +'&selecttype=5';
		searchCon(path_city);
	})
}

function searchCon(path_city) {
	$.ajax({
			url: path_city,
			type: 'GET'
		}).done(function(response){
			var lam = new String();
			// console.log(response);
			if (response.length == 0) {
				$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
			}
			else{
				response.forEach(function (data) {
					lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
					lam += '<div class="destination-grid">';
					lam += '<a href="detail-search/id=';
					lam += data.id_service;
					lam += '&type=' + data.sv_type +'">';
					lam += '<img src="public/thumbnails/' + data.image + '" alt="Error" style="height: 265px;">'
					lam += '</a>';
					lam += '<div class="destination-name">';
					lam += '<h4>' + data.name + '</h4>';
					lam += '</div>';
					lam += '<div class="destination-icon">';
					lam += '<a>' + data.rating + ' <i class="far fa-star"></i></a>';
					lam += '<a>' + data.view + ' <i class="fas fa-eye"></i></a>';
					lam += '<a>' + data.like +' <i class="far fa-thumbs-up"></i></a>';
					lam += '<a>' + data.point + ' <i class="far fa-bookmark"></i></a>';
					lam += '</div>';
					lam += '</div>';
					lam += '</div>';
					$('#content_place').html(lam);
				})
			}
		});
}



function save_dichvu_search() {
	var lam = document.getElementsByClassName('searchdichvu');
	for (var i = 0; i < lam.length; i++) {
		lam[i].onclick = function () {
			this.onclick = function () {
				var id = this.getAttribute('data-id');
				var type = this.getAttribute('data-type');
				$.ajax({
					url: 'save_user_search/' + id,
					type: 'GET'
				})
				.done(function (response) {
					window.location.href = 'detail/id='+ id +'&type=' + type;
				})
			}
		}
	}
}


function timquanhday() {
	$('#btntimquanhday').click(function () {
		var latitude = 10.044718399999999;
		var longitude = 105.7632514;
		return 1;
	})
}