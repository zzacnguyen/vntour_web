$(document).ready(function () {
	thong_ke();
})

function thong_ke() {
	$('#id_view').click(function () {
		var path = 'top-service-view';
		load_thong_ke(path);

		var path2 = 'get-service-user-max-view';
		load_user_thongke(path2);
	})

	$('#id_rating').click(function () {
		var path = 'top-service-rating-like/rating';
		load_thong_ke(path);

		var path2 = 'get-service-user-max-ating-like/like';
		load_user_thongke(path2);
	})

	$('#id_like').click(function () {
		var path = 'top-service-rating-like/like';
		load_thong_ke(path);

		var path2 = 'get-service-user-max-ating-like/rating';
		load_user_thongke(path2);
	})
}

function load_thong_ke(path) {
	$.ajax({
		url: path,
		type: 'GET'
	})
	.done(function (response) {
		var lam = new String(); // khoi tao bien luu pha hien thi len view
		var i = 1;
		response.forEach(function (data) {
			console.log(data);
			lam += '<li style="margin-bottom: 5px;border-bottom: 1px solid #ddd">';
			lam += '<a href="detail/id='+ data.sv_id +'&type='+ data.sv_type +'" style="text-decoration: none; color: black; display: inline-flex;width: 100%; padding: 5px 0px">';
			lam += '<img src="public/thumbnails/'+ data.sv_image +'" alt="" style="width: 50px; height: 50px;">';
			lam += '<div style="height: 50px;padding-left: 10px;overflow: hidden;width: 250px">';
			lam += '<h6 style="margin-bottom: 0;">'+ data.sv_name +'</h6>';
			lam += '<span style="color: #ddd;font-size: 12px;">Mô tả </span>';
			lam += '</div>';
			lam += '<div style="margin-right: 5px;width:103px;">';
			lam += '<span style="font-size:10px;margin-right:6px;"><i class="far fa-thumbs-up"></i> '+ data.like +'</i></span>';
			lam += '<span style="font-size:10px;margin-right:6px;"><i class="fas fa-eye"></i> ' + data.view + '</span>';
			lam += '<span style="font-size:10px;"><i class="fas fa-star"></i> '+ data.rating +'</span>';
			lam += '</div>';
			lam += '<div>';
			lam += '<span class="badge badge-warning">Top '+ i +'</span>';
			lam += '</div>';
			lam += '</a>';
			lam += '</li>';
			i++;
		})

		$('#list_thongke').html(lam);
	})
}

function load_user_thongke(path) {
	$.ajax({
		url: path,
		type: 'GET'
	})
	.done(function (response) {
		var lam = new String(); // khoi tao bien luu pha hien thi len view
		response.forEach(function (data) {
			console.log(data);
			
			lam += '<a href="detail/id='+ data.sv_id +'&type='+ data.sv_type +'" style="text-decoration: none; color: black; display: inline-flex;width: 100%; padding: 5px 0px">';
			lam += '<img src="public/thumbnails/'+ data.sv_image +'" alt="" style="width: 50px; height: 50px;">';
			lam += '<div style="height: 50px;padding-left: 10px;overflow: hidden;width: 250px">';
			lam += '<h6 style="margin-bottom: 0;">'+ data.sv_name +'</h6>';
			lam += '<span style="color: #ddd;font-size: 12px;">Mô tả </span>';
			lam += '</div>';
			lam += '<div style="margin-right: 5px;width:103px;">';
			lam += '<span style="font-size:10px;margin-right:6px;"><i class="far fa-thumbs-up"></i> '+ data.like +'</i></span>';
			lam += '<span style="font-size:10px;margin-right:6px;"><i class="fas fa-eye"></i> ' + data.view + '</span>';
			lam += '<span style="font-size:10px;"><i class="fas fa-star"></i> '+ data.rating +'</span>';
			lam += '</div>';
			lam += '<div>';
			lam += '<span class="badge badge-warning">Top 11</span>';
			lam += '</div>';
			lam += '</a>';
		})

		$('#service_user').html(lam);
	})
}