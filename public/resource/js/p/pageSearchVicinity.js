$(document).ready(function (argument) {
	console.log('hello');
	clickse();
	load_select_search_vicinity();
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

	function load_select_search_vicinity() {
		//search-vicinity-type/{lat}&{lon}&{radius}&{type}
		var lat = $('input[name=txtlat]').val();
		var lon = $('input[name=txtlon]').val();
		var radius = $('input[name=txtradius]').val();
	
		var path = 'search-vicinity-type/'+ lat +'&'+ lon +'&'+ radius +'&';

		$('#eat').click(function () {
			var path_city = path + 1;
			searchCon(path_city);
		});

		$('#hotel').click(function () {
			var path_city = path + 2;
			searchCon(path_city);
		});

		$('#tran').click(function () {
			var path_city = path + 3;
			searchCon(path_city);
		});

		$('#see').click(function () {
			var path_city = path + 4;
			searchCon(path_city);
		});

		$('#enter').click(function () {
			var path_city = path + 5;
			searchCon(path_city);
		});
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
						lam += '<h5>' + (data.distance/1000).toPrecision(2) + ' Km</h5>';
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