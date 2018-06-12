$(document).ready(function () {
	checkLogin();
	check_rating();
	paginate_rating();
	deleteRating(); 
	load_event();
	// load_gallery();
	// check_url_image();
})


function checkLogin() {
	// kiem tra xem co dang nhap hay chua
	var path = window.location.pathname;
	var service_id = path.slice(path.lastIndexOf("/") + 4,path.search("&")); // lay id service tu url
	var dem = 0;
	$.ajax({
			url: 'check-login',
			type: 'GET',
			dataType: 'json'
		})
		.done(function (response) {
			if (response > 0) 
			{
				var pathCheckLike = 'http://localhost/vntour_api/checkLike/userid=' + response + '&svid=' + service_id;
				
				$.ajax({
						url: pathCheckLike,
						type: 'GET',
						dataType: 'json'
					})
					.done(function (response) {
						var l = parseInt(response);
						if (l == 1) 
						{
							$('#like01').css("color","red");
							$('#like01').click(function () {
								// console.log($('#num_like').innerHTML);
								if (dem % 2 == 0) 
								{
									var lam = document.getElementById('num_like').innerHTML;
									var l = parseInt(lam) - 1;
									document.getElementById('num_like').innerHTML = l;
									$('#like01').css("color","blue");
									dem++; 
								}
								else{	
									var lam = document.getElementById('num_like').innerHTML;
									var l = parseInt(lam) + 1;
									document.getElementById('num_like').innerHTML = l;
									dem++;
								}
								ThemVaCapNhat();
							});
							
						}
						else{
							$('#like01').click(function () {
								console.log("Them vao");
							if (dem % 2 == 0) 
							{
								var lam = document.getElementById('num_like').innerHTML;
								var l = parseInt(lam) + 1;
								document.getElementById('num_like').innerHTML = l;
								dem++; 
							}
							else{	
								var lam = document.getElementById('num_like').innerHTML;
								var l = parseInt(lam) - 1;
								document.getElementById('num_like').innerHTML = l;
								dem++;
							}
							ThemVaCapNhat();
					});
						}
					}).fail(function (response) {
							return -1;
					})

				
			}
			else{
				$('#like01').click(function () {
					var chon = confirm('Bạn cần đăng nhập để Like dịch vụ này');
					if (chon) 
					{
						$('#form-login').submit();
					}
				});
					   
			}
		}).fail(function (response) {
				return null;
		})
}

function kiemtradangnhap() {
	// body...
}

function check_rating() {

	$('#btnsave').click(function () {
		
		var rating = $('#txtrating').val();
        var detail = $('#txtdetail').val();
        if (rating == null || rating == 0) {
            $('#errorating').css('display','block');
        }
        else if(detail == ""){
        	$('#errorating').css('display','none');
            $('#errordetail').css('display','block');
        }
        else if(rating > 5){
        	$('#errorating').css('display','none');
            $('#errordetail').css('display','none');
            $('#erroratingPoint').css('display','block');
        }
        else{
        	var path = window.location.pathname;
			var service_id = path.slice(path.lastIndexOf("/") + 4,path.search("&")); // lay id service tu url
        	var path2 = 'save_rating/id='+ service_id +'&rating='+ rating +'&detail=' + detail;

        	$.ajax({
				url: path2,
				type: 'GET'
			})
			.done(function (response) {
				alert('Đánh giá thành công');
				location.reload();
			})
			
	    }
	})

	$('#btnsave2').click(function () {
		
		var rating = $('#txtrating2').val();
        var detail = $('#txtdetail2').val();
        // alert(detail);
        if (rating == null || rating == 0) {
            $('#errorating').css('display','block');
        }
        else if(detail == ""){
        	$('#errorating').css('display','none');
            $('#errordetail').css('display','block');
        }
        else if(rating > 5){
        	$('#errorating').css('display','none');
            $('#errordetail').css('display','none');
            $('#erroratingPoint').css('display','block');
        }
        else{
        	var path = window.location.pathname;
			var service_id = path.slice(path.lastIndexOf("/") + 4,path.search("&")); // lay id service tu url
        	var path2 = 'save_update_rating/id='+ service_id +'&rating='+ rating +'&detail=' + detail;

        	$.ajax({
				url: path2,
				type: 'GET'
			})
			.done(function (response) {
				alert('Cập nhật thành công đánh giá');
				location.reload();
			})
			
	    }
	})
}

function ThemVaCapNhat() {
	var path = window.location.pathname;
	var service_id = path.slice(path.lastIndexOf("/") + 4,path.search("&")); // lay id service tu url
	//ThemVaCapNhatLike/{idserivce}&user={id}
	var path2 = 'ThemVaCapNhatLike/' + service_id;
	$.ajax({
		url: path2,
		type: 'GET'
	})
	.done(function (response) {
		
	})
}

var current_page = 2;

function paginate_rating() {
	// paginate_rating/76&1&2
	var id_sv = $('#id_sv').val();
	
	$('#btn-rating').click(function () {
		var path = 'paginate_rating/'+ id_sv +'&'+ current_page +'&10';

		$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String();
		console.log(response);
			if (response.data.length > 0 && current_page <= response.total_page) 
			{
				response.data.forEach(function (data){

					lam += '<div class="chat-message left">';
					if(data.contact_avatar == null){
						lam += '<img class="message-avatar" src="public/resource/images/avatar2.jpg" alt="">';
					}
					else{
						lam += '<img class="message-avatar" src="public/resource/images/avatar/'+ data.contact_avatar +'" alt="">';
					}

					lam += '<div class="message">';
					lam += '<a class="message-author" style="color: #007bff"> '+ data.username +' - ';
					for(i = 0; i < data.vr_rating; i++){
						lam += '<i style="color: yellow;" class="fas fa-star"></i>';
					}

					lam += '</a>';
					lam += '<span class="message-date"> '+ data.created_at +' </span>';
					lam += '<span class="message-content">';
					lam += data.vr_ratings_details;
					lam += '</span>';
					lam += '</div>';
					lam += '</div>';
				});

				$('#list-rating').append(lam);
				current_page++;
			}
			// else{ $('#btn-rating').css('display','none'); }
				
		})
	})
}


function deleteRating() 
{		
	var lamm = document.getElementsByClassName("close-rating");
	for (var i = 0; i < lamm.length; i++) {
		lamm[i].onclick = function () {
			var id = this.getAttribute("data-id");
			var conf = confirm('Bạn có chắc chắn muốn xóa bình luận này?');
			if(conf)
			{
				$.ajax({
				   type: "GET",
				   url: 'delete-rating/' + id
				}).done(function (response) {
					console.log(response);
					if (parseInt(response) == 1) 
					{
						//get_tripchudule
						alert('Đã xóa lịch trình vừa chọn');
						
						location.reload();
					}
					else
					{
						alert('Lỗi không xóa được');
					}
				})
			}
			
		}
	}
}

function deleteRatingUser() {
	var lamm = document.getElementsByClassName("close-rating2");
	lamm[0].onclick = function () {
		var conf = confirm('Bạn có chắc chắn muốn xóa bình luận này?');
		if(conf)
		{
			var id = this.getAttribute("data-id");
			$.ajax({
			   type: "GET",
			   url: 'delete-rating/' + id
			}).done(function (response) {
				console.log(response);
				if (parseInt(response) == 1) 
				{
					//get_tripchudule
					alert('Đã xóa bình luận vừa chọn');
					location.reload();
				}
				else
				{
					alert('Lỗi không xóa được');
				}
			})
		}
	}
		
}

function load_event() {
	var id = $('#id_sv').val();
	$.ajax({
	   type: "GET",
	   url: 'http://localhost/vntour_api/load-event-sv/' + id,
	   dataType: 'Json'
	}).done(function (data) {
		// console.log(data);
		if (data.length > 0){
			var lam = new String();
			lam += '<div class="" style="position: relative;">';
			lam += '<img src="public/resource/images/icons/evenr.png" alt="" style="height: 92px;width: 165px;">';
			lam += '<div class="" style="position: absolute;top: 32px;right: 39px;color: white;transform: rotate(-5deg);font-size: 12px;width: 104px">';
			lam += '<h6 class="text-center" style="font-size: 12px;overflow: hidden;">'+ data[0].event_name +'</h6>';
			lam += '</div>';
			lam += '</div>';
			$('#event-id').html(lam);
		}
	})
}

function load_gallery() {
	var path = 'http://localhost/vntour_api/';
	var id_sv = $('#id_sv').val();
	$.ajax({
		url: path + 'get-gallery/' + id_sv,
		type: "GET",  
		success: function(response)   
		{
			console.log(response.data);
			var dem = 0;
			var sum = 0;
			var lam = new String();
			var lamBig = new String();
			if (response.data != null) 
			{
				for (var i = 0; i < response.data.length; i++) {
					console.log(response.data[i]);
					var p_img = response.data[i];
					var data_img = response.data[i].slice(p_img.lastIndexOf("/") + 1, p_img.length);
					var path_img = path + p_img;
					console.log(data_img);
					if (i < 6) 
					{
						lam += '<li class="box">';
						lam += '<a href="'+ path_img +'" class="glightbox">';
						lam += '<img src="'+ path_img +'">';
						lam += '</a>';
						lam += '</li>';
					}
					else if(i == 6){
						
						if (response.data.length > 6) 
						{
							sum = response.data.length - 6;
							lam += '<li class="box last-gallery">';
							lam += '<a data-num="+'+ sum +'" href="'+ path_img +'" class="glightbox a-last">';
							lam += '<img src="'+ path_img +'">';
							lam += '</a>';
							lam += '</li>';
						}
						else
						{
							lam += '<li class="box">';
							lam += '<a href="'+ path_img +'" class="glightbox">';
							lam += '<img src="'+ path_img +'">';
							lam += '</a>';
							lam += '</li>';
						}
					}
					else{
						lam += '<li class="box" style="display:none;">';
						lam += '<a href="'+ path_img +'" class="glightbox">';
						lam += '<img src="'+ path_img +'">';
						lam += '</a>';
						lam += '</li>';
					}
				}
					
				$('#box-gallery').append(lam);
				// if (sum > 0) {$('#num_gallery').addClass('a-last');}
				// $('#list-detail-gallery').html(lamBig);
			}
		}
	});

}

function check_url_image(img) {
	var image_url = lam.getAttribute('src');
	$.get(image_url)
    .done(function() { 

    }).fail(function() { 
       img.setAttribute('src','public/images/default.jpg')
    })
}