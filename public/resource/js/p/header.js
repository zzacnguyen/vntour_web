var id_tinh = null;

$(document).ready(function () {
	clickSearch();

	// load select city
		$.ajax({
			url: 'http://localhost/vntour_api/count-city-service-all',
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			response.forEach(function (data) {
				lam += '<li class="selectItem" data-id="' + data.id_city + '" data-name="' + data.name_city +'">';
				lam += '<a class="selectItem-name">';
				lam += '<label>'+ data.name_city +'</label>';
				lam += '<span class="float-right">'+ data.num_service + '</span>';
				lam += '</a>';
				lam += '</li>';
				$('#content-tinhtp-id').html(lam);
			})
			gantentinh();
		})
		search();
		$('#text-search-top').click(function () {
			list_tim_kiem();
			list_top_search();
		})
		load_unseen_notification();

		// setInterval(function () {
		// 	load_unseen_notification();
		// },5000);
})

function gantentinh() {
	var select_Item = document.getElementsByClassName('selectItem');
	
	for (var i = 0; i < select_Item.length; i++) {
		select_Item[i].onclick = function () {
			var id = this.getAttribute('data-id');
			document.getElementById('a-tinhTP').innerHTML = this.getAttribute('data-name') + ' <i class="fas fa-angle-down float-right" style="margin-top:5px;"></i>';
			document.getElementById('a-tinhTP').setAttribute("data-id",id);
			document.getElementById('a-tinhTP').setAttribute("data-name",this.getAttribute('data-name'));
			id_tinh = $('#a-tinhTp').attr('data-idtinh');
			
			

		}
	}
}


//=================== SEARCH ================
function search() {
	$('#text-search-top').keyup(function () {
		var id_tinh = document.getElementById('a-tinhTP').getAttribute('data-id'); // id tinh thanh pho
		var ten_tinh = document.getElementById('a-tinhTP').getAttribute('data-name');
		
		var type = $('#a-danhmuc').attr('data-type'); // type dich vu
		var ten_type = $('#a-danhmuc').attr('data-name');
		
		var path = null;
		var keyword = $('#text-search-top').val();
		keyword_handle = keyword.replace(" ","+");

		// $('#thanSearch').html('');
		if (id_tinh == "all" && type == "all" && keyword.length > 0) 
		{
			path = 'http://localhost/vntour_api/search-services-all/keyword=' + keyword_handle;
			$.ajax({
				url: path,
				type: 'GET',
				dataType: 'json'
			}).done(function (response) {
		
				if (response.eat.length > 0) 
				{	
					if (document.getElementById('eatCha') != null) {
						document.getElementById('eatCha').style.display = 'block';
					}
					$('#tieudeSearchEat').html('Ăn uống');
					var eat = new String(); // khoi tao bien luu phan hien thi len view
					response.eat.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 1;

						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 1;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_eat').html(eat);
					$('#search_eat').css('display','block');
				}else{document.getElementById('eatCha').style.display = 'none';}

				if (response.hotel.length > 0) 
				{
					if (document.getElementById('hotelCha') != null) {
						document.getElementById('hotelCha').style.display = 'block';
					}
					$('#tieudeSearchHotel').html('Khách sạn');
					var eat = new String();
					response.hotel.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 2;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 2;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_hotel').html(eat);
					$('#search_hotel').css('display','block');
				}else{document.getElementById('hotelCha').style.display = 'none';}

				if (response.tran.length > 0) 
				{
					if (document.getElementById('tranCha') != null) {
						document.getElementById('tranCha').style.display = 'block';
					}
					$('#tieudeSearchTran').html('Phương tiện');
					var eat = new String();
					response.tran.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 3;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 3;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_tran').html(eat);
					$('#search_tran').css('display','block');
				}else{document.getElementById('tranCha').style.display = 'none';}

				if (response.see.length > 0) 
				{
					if (document.getElementById('seeCha') != null) {
						document.getElementById('seeCha').style.display = 'block';
					}
					$('#tieudeSearchSee').html('Tham quan');
					var eat = new String();
					response.see.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 4;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 4;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_see').html(eat);
					$('#search_see').css('display','block');
				}else{document.getElementById('seeCha').style.display = 'none';}

				if (response.enter.length > 0) 
				{
					if (document.getElementById('enterCha') != null) {
						document.getElementById('enterCha').style.display = 'block';
					}
					$('#tieudeSearchEnter').html('Vui chơi');
					var eat = new String();
					response.enter.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 5;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 5;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_enter').html(eat);
					$('#search_enter').css('display','block');
				}else{document.getElementById('enterCha').style.display = 'none';}

			}).fail(function (response) {
				// $('#thanSearch').html('');
			})
			
		}
		else if(id_tinh != "all" && type == "all" && keyword.length > 0)
		{
			path = 'http://localhost/vntour_api/search-service-city-all-type/idcity='+ id_tinh +'&keyword=' + keyword_handle;

			$.ajax({
				url: path,
				type: 'GET',
				dataType: 'json'
			}).done(function (response) {
		
				if (response.eat.length > 0) 
				{	
					if (document.getElementById('eatCha') != null) {
						document.getElementById('eatCha').style.display = 'block';
					}
					$('#tieudeSearchEat').html('Ăn uống');
					var eat = new String(); // khoi tao bien luu phan hien thi len view
					response.eat.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 1;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 1;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_eat').html(eat);
					$('#search_eat').css('display','block');
				}else{document.getElementById('eatCha').style.display = 'none';}

				if (response.hotel.length > 0) 
				{
					if (document.getElementById('hotelCha') != null) {
						document.getElementById('hotelCha').style.display = 'block';
					}
					$('#tieudeSearchHotel').html('Khách sạn');
					var eat = new String();
					response.hotel.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 2;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 2;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_hotel').html(eat);
					$('#search_hotel').css('display','block');
				}else{document.getElementById('hotelCha').style.display = 'none';}

				if (response.tran.length > 0) 
				{
					if (document.getElementById('tranCha') != null) {
						document.getElementById('tranCha').style.display = 'block';
					}
					$('#tieudeSearchTran').html('Phương tiện');
					var eat = new String();
					response.tran.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 3;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 3;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_tran').html(eat);
					$('#search_tran').css('display','block');
				}else{document.getElementById('tranCha').style.display = 'none';}

				if (response.see.length > 0) 
				{
					if (document.getElementById('seeCha') != null) {
						document.getElementById('seeCha').style.display = 'block';
					}
					$('#tieudeSearchSee').html('Tham quan');
					var eat = new String();
					response.see.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 4;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 4;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_see').html(eat);
					$('#search_see').css('display','block');
				}else{document.getElementById('seeCha').style.display = 'none';}

				if (response.enter.length > 0) 
				{
					if (document.getElementById('enterCha') != null) {
						document.getElementById('enterCha').style.display = 'block';
					}
					$('#tieudeSearchEnter').html('Vui chơi');
					var eat = new String();
					response.enter.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 5;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 5;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_enter').html(eat);
					$('#search_enter').css('display','block');
				}else{document.getElementById('enterCha').style.display = 'none';}

			}).fail(function (response) {
				
			})
			
		}
		else if(id_tinh != "all" && type != "all" && keyword.length > 0)
		{
			path = 'http://localhost/vntour_api/search-service-city-type/idcity='+ id_tinh +'&type='+ type +'&keyword=' + keyword_handle;
			var title = 'Bộ lọc: ' + ten_tinh + ' + ' + ten_type;

			$.ajax({
				url: path,
				type: 'GET',
				dataType: 'json'
			}).done(function (response) {
		
				if (response.length > 0) 
				{	
					if (document.getElementById('eatCha') != null) {
						document.getElementById('eatCha').style.display = 'block';
					}
					$('#tieudeSearchEat').html(title);
					var eat = new String(); // khoi tao bien luu phan hien thi len view
					response.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + type;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 1;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_eat').html(eat);
					$('#search_eat').css('display','block');
				}else{document.getElementById('eatCha').style.display = 'none';}

			}).fail(function (response) {
				
			})
			
		}
		else if(id_tinh == "all" && type != "all" && keyword.length > 0)
		{
			path = 'http://localhost/vntour_api/search-services-all-city-id-type/type='+ type +'&keyword=' + keyword_handle;
			var title = 'Bộ lọc: ' + ten_tinh + ' + ' + ten_type;

			$.ajax({
				url: path,
				type: 'GET',
				dataType: 'json'
			}).done(function (response) {
		
				if (response.length > 0) 
				{	
					if (document.getElementById('eatCha') != null) {
						document.getElementById('eatCha').style.display = 'block';
					}
					$('#tieudeSearchEat').html(title);
					var eat = new String(); // khoi tao bien luu phan hien thi len view
					response.forEach(function (data) {
						var url_detail = 'detail-search/id='+ data.sv_id +'&type=' + 1;
						// var url_detail = 'data-id='+ data.sv_id +' '+ 'data-type=' + 1;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_eat').html(eat);
					$('#search_eat').css('display','block');
				}else{document.getElementById('eatCha').style.display = 'none';}

			}).fail(function (response) {
				
			})
			
		}
		else{
			// $('#search_eat').html("");
			// $('#search_hotel').html("");
			// $('#search_tran').html("");
			// $('#search_see').html("");
			// $('#search_enter').html("");

			$('#search_eat').css('display','none');
			$('#search_hotel').css('display','none');
			$('#search_tran').css('display','none');
			$('#search_see').css('display','none');
			$('#search_enter').css('display','none');
		}
		
		// save_dichvu_searchCon();
	})
		
}

function search_type(url, image,name,description) { //
	var eat = new String();
	eat += 	'<div class="content-search">';
	eat +=	'<a href="' + url + '" class="searchdichvuCon" >';
	eat +=	'<div class="left-content-search">';
	eat +=	'<img src="public/thumbnails/'+ image +'" alt="">';
	eat +=	'</div>';
	eat +=	'<div class="right-content-search">';
	eat +=	'<p>'+ name +'</p>';
	eat +=	'<p style="font-size: 13px; color: #d2cece; font-weight: 400; max-height: 20px;max-width:321px;text-overflow: ellipsis;">Mô tả </p>';
	eat +=	'</div>';
	eat +=	'</a>';		
	eat +=	'</div>';
	return eat;
}

//========
function clickSearch() {

	$('#btnsearchNhe').click(function () {

		var keyword = $('#text-search-top').val();
		console.log(keyword.length);
		if (keyword.length > 0) 
		{
			var keyword_handle = keyword.replace(" ","+");

			$('input[name=city]').val($('#a-tinhTP').attr('data-id'));
			$('input[name=type]').val($('#a-danhmuc').attr('data-type'));
			console.log("hellose");

			$('form').submit(function () {
				
			})
		}
		else{
			alert('Bạn cần nhập nội dung để tìm kiếm!!!');
		}
	})
}

function save_dichvu_searchCon() {
	var lam = document.getElementsByClassName('searchdichvuCon');
	console.log(lam);
	for (var i = 0; i < lam.length; i++) {
		lam[i].onclick = function () {
			this.onclick = function () {
				var id = this.getAttribute('data-id');
				var type = this.getAttribute('data-type');
				alert('1');
				// $.ajax({
				// 	url: 'save_user_search/' + id,
				// 	type: 'GET'
				// })
				// .done(function (response) {
				// 	window.location.href = 'detail/id='+ id +'&type=' + type;
				// })
			}
		}
	}
}

function list_tim_kiem() {
	
	$.ajax({
			url: 'list-user-search',
			type: 'GET'
		})
		.done(function (response) {
			// console.log(response);
			// detail-search/200&type=1
			if (response.length > 0) 
			{
				var eat = new String();
				eat +=  '<div class="title-search">';
				eat +=	'<h5>Lịch sử tìm kiếm</h5>';
				eat +=	'</div>';
				response.forEach(function (data) {
					eat += 	'<div class="content-search">';
					eat +=	'<a href="detail-search/id='+ data.sv_id +'&type=' + data.sv_type + '" class="" >';
					eat +=	'<div class="left-content-search">';
					eat +=	'<img src="public/thumbnails/'+ data.sv_image +'" alt="">';
					eat +=	'</div>';
					eat +=	'<div class="right-content-search">';
					eat +=	'<p>'+ data.sv_name +'</p>';
					eat +=	'<p style="font-size: 13px; color: #d2cece; font-weight: 400; max-height: 20px;max-width:321px;text-overflow: ellipsis;">Mô tả</p>';
					eat +=	'</div>';
					eat +=	'</a>';		
					eat +=	'</div>';
				})
				$('#lichsusearch').html(eat);
			}
						
		})
}

function list_top_search() {
	
	$.ajax({
			url: 'get-service-top-search',
			type: 'GET'
		})
		.done(function (response) {
			// console.log(response);
			// detail-search/200&type=1
			var eat = new String();
			eat +=  '<div class="title-search">';
			eat +=	'<h5>Top dịch vụ được tìm kiếm nhiều nhất</h5>';
			eat +=	'</div>';
			response.forEach(function (data) {
				eat += 	'<div class="content-search">';
				eat +=	'<a href="detail-search/id='+ data.sv_id +'&type=' + data.sv_type + '" class="" >';
				eat +=	'<div class="left-content-search">';
				eat +=	'<img src="public/thumbnails/'+ data.sv_image +'" alt="">';
				eat +=	'</div>';
				eat +=	'<div class="right-content-search">';
				eat +=	'<p>'+ data.sv_name +'</p>';
				eat +=	'<p style="font-size: 13px; color: #d2cece; font-weight: 400; max-height: 20px;max-width:321px;text-overflow: ellipsis;">Mô tả</p>';
				eat +=	'</div>';
				eat +=	'</a>';		
				eat +=	'</div>';
			})
			$('#list-top-search').html(eat);		
		})
}

//=============== Notification ===============
function load_unseen_notification(view = '') {
	$.ajax({
		url: 'load-event-user',
		type: 'GET',
		dataType: 'Json',
		success: function (data) {
			console.log(data);
			var cuatui = new String();
			var dichvu = new String();
			if (parseInt(data.event_public) != 0 && data.event_public.length > 0) 
			{
				var dem = 0;
				for (var i = 0; i < data.event_public.length; i++) {
					cuatui += create_element_notification(data.event_public[i]);
					var status = parseInt(data.event_public[i].event_status);
					if (status == 1) 
					{

					}
					else if(status == 2)
					{

					}
					else if(status == 0)
					{

					}
				}
				$('#ul-cuatoi').html(cuatui);
			}
			else{
				$('#ul-cuatoi').html('');
				if (data.error == 'login') 
				{
					$('#ul-cuatoi').html('<li class="error-nofi">Đăng nhập ngay để nhận được thông báo<li>');
				}
				else{
					$('#ul-cuatoi').html('<li class="error-nofi">Chưa có thông báo<li>');
				}
			}

			if (parseInt(data.event_user) != 0 && data.event_user.length > 0) 
			{
				for (var i = 0; i < data.event_user.length; i++) {
					dichvu += create_element_notification(data.event_user[i]);
				}
				$('#ul-dichvu').html(dichvu);
				// $('#athongbao').addClass("bell");
			}
			else{
				$('#ul-dichvu').html('');
				if (data.error == 'login') 
				{
					$('#ul-dichvu').html('<li class="error-nofi">Đăng nhập ngay để nhận được thông báo<li>');
				}
				else{
					$('#ul-dichvu').html('<li class="error-nofi">Chưa có thông báo<li>');
				}
			}
		} 
	})
}


function create_element_notification(arr) {
	var image;
	if (arr.image_details_1 == null) {image = 'default.jpg';}
	else{image = arr.image_details_1;}
	var cuatui = new String();

	//check seen event
	if (arr.seen == null) { cuatui += '<li class="li-seen">'; }
	else{ cuatui += '<li>'; }

	// check
	if (parseInt(arr.type_id) == 1) 
	{
		cuatui += '<a onclick="seen_event_u('+ arr.id_event +','+ arr.sv_types+','+ arr.id_sv +')" class="a-content-nofi">';
	}
	else{
		cuatui += '<a class="a-content-nofi">';
	}
		


	cuatui += '<div class="anh-nofi">';
	// check type event display image
	if (parseInt(arr.type_id) == 2) 
	{
		cuatui += '<img src="http://localhost/vntour_web/public/resource/images/icons/active-user.png" alt="" class="img-icon-nofi">';
	}
	else{
		cuatui += '<img src="http://localhost/vntour_api/public/thumbnails/'+ image +'" alt="" class="img-icon-nofi">';
	}
		
	cuatui += '</div>';
	cuatui += '<p class="text-nofi">';
	cuatui += arr.event_name;
	cuatui += '</p>';
	cuatui += '</a>';
	cuatui += '</li>';
	return cuatui;
}


function seen_event_u(id_event,type,id_sv) {
	$.ajax({
		url: 'seen-event-user',
		type: 'POST',
		data: {id_events:id_event}
	})
	.done(function (data) {
		console.log(data);
		location.href = 'detail/id='+ id_sv +'&type=' + type;
	})
	.fail(function () {
		return 0;
	})
	.always(function() {
    	location.href = 'detail/id='+ id_sv +'&type=' + type;
  	});
}
