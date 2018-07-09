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


	var path_cha = null;

	function load_select_search_vicinity() {
		//search-vicinity-type/{lat}&{lon}&{radius}&{type}
		//search-vicinity-type/{lat}&{lon}&{radius}&{type}&{page}&{limit}
		var lat = $('input[name=txtlat]').val();
		var lon = $('input[name=txtlon]').val();
		var radius = $('input[name=txtradius]').val();
	
		var path = 'search-vicinity-type/'+ lat +'&'+ lon +'&'+ radius +'&';

		$('#eat').click(function () {
			path_cha = path + 1;
			// var path = 'search-vicinity-type/'+ lat +'&'+ lon +'&'+ radius +'&1' + '';
			searchCon(path_cha,1,9);
			console.log(path_cha);
			// select_paginate(path_city,totalPages,limit);

		});

		$('#hotel').click(function () {
			path_cha = path + 2;
			// console.log(path_cha);
			searchCon(path_cha,1,9);
		});

		$('#tran').click(function () {
			path_cha = path + 3;
			// console.log(path_cha);
			searchCon(path_cha,1,9);
		});

		$('#see').click(function () {
			path_cha = path + 4;
			// console.log(path_cha);
			searchCon(path_cha,1,9);
		});

		$('#enter').click(function () {
			path_cha = path + 5;
			// console.log(path_cha);
			searchCon(path_cha,1,9);
		});
	}

	var currentpage = 1;
	var limit = 3;

	function searchCon(path, limit) {
		console.log(path);
		// alert(path);
		var path_pa = path + '&' + currentpage + '&' + limit;
		// console.log(path_pa);
		$.ajax({
				url: path + '&'+ currentpage +'&' + limit,
				type: 'GET'
			}).done(function(response){
				var lam = new String();
				// console.log(response);
				if (response.data.length == 0) {
					$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
				}
				else{
					response.data.forEach(function (data) {
						lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
						lam += '<div class="destination-grid">';
						lam += '<a href="detail-search/id=';
						lam += data.id_service;
						lam += '&type=' + data.sv_type +'">';
						lam += '<img src="http://localhost/vntour_api/public/thumbnails/' + data.image + '" alt="Error" style="height: 265px;">'
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
					})
					$('#content_place').html(lam);
					select_paginate(response.total_page,response.limit, function () {
						searchCon(path_cha,3);
					});

				}

				
			});
	}

	// function paginante(path, currentpage, limit) {
	// 	var path_pa = path + '&' + currentpage + '&' + limit;
	// 	console.log(path_pa);
	// 	searchCon(path_pa);
	// }

	function select_paginate(totalPages, limit, callback) {
		lamlam = int(totalPages);
		$('#pagination-demo').twbsPagination({
	        totalPages: lamlam,
	        visiblePages: limit,
	        onPageClick: function (event, page) {
	            currentpage = page;
	            var path = path_cha;
	            searchCon(path_cha,3);
	            // console.log(path_pa);
	        }
	    });
	}