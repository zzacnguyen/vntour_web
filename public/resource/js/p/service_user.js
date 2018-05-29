$(document).ready(function () {
	thong_ke();
})

function thong_ke() {
	$('#id_view').click(function () {
		var path = 'top-service-view';
		load_thong_ke(path,1);

		var path2 = 'get-service-user-max-view';
		load_user_thongke(path2);
	})

	$('#id_rating').click(function () {
		var path = 'top-service-rating-like/rating';
		load_thong_ke(path,3);

		var path2 = 'get-service-user-max-ating-like/rating';
		load_user_thongke(path2);
	})

	$('#id_like').click(function () {
		var path = 'top-service-rating-like/like';
		load_thong_ke(path,2);

		var path2 = 'get-service-user-max-ating-like/like';
		load_user_thongke(path2);
	})
}

function load_thong_ke(path,type) {
	var l = null;
	if (type == 1) {l = '<i class="fas fa-eye"></i>';}
	else if(type == 2){l = '<i class="fas fa-thumbs-up"></i>';}
	else{l = '<i class="fas fa-star"></i>';}
	$.ajax({
		url: path,
		type: 'GET'
	})
	.done(function (response) {
		var lam = new String(); // khoi tao bien luu pha hien thi len view
		var i = 1;
		response.forEach(function (data) {
			// console.log(data);
			lam += '<li style="margin-bottom: 5px;border-bottom: 1px solid #ddd">';
			lam += '<a href="detail/id='+ data.sv_id +'&type='+ data.sv_type +'" style="text-decoration: none; color: black; display: inline-flex;width: 100%; padding: 5px 0px">';
			lam += '<img src="public/thumbnails/'+ data.sv_image +'" alt="" style="width: 50px; height: 50px;">';
			lam += '<div style="height: 50px;padding-left: 10px;overflow: hidden;width: 250px">';
			lam += '<h6 style="margin-bottom: 0;">'+ data.sv_name +'</h6>';
			lam += '<span style="color: #ddd;font-size: 12px;">Mô tả </span>';
			lam += '</div>';
			lam += '<div style="margin-right: 5px;width:103px;">';
			lam += '<span style="font-size:10px;margin-right:6px;"><i class="far fa-thumbs-up"></i> '+ chuyenso(data.like) +'</i></span>';
			lam += '<span style="font-size:10px;margin-right:6px;"><i class="fas fa-eye"></i> ' + chuyenso(data.view) + '</span>';
			lam += '<span style="font-size:10px;"><i class="fas fa-star"></i> '+ chuyenso(data.rating) +'</span>';
			lam += '</div>';
			lam += '<div>';
			if (i <= 3) 
			{
				lam += '<span class="badge badge-danger">Top '+ i +' ' + l +'</span>';
			}
			else{
				lam += '<span class="badge badge-warning">Top '+ i + ' ' + l +'</span>';
			}
				
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
		console.log(response);
		if (String(response) != "0") 
		{
			if (String(response) != "-2") 
			{
				if(String(response) != "-1"){
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
						lam += '<span class="badge badge-warning"></span>';
						lam += '</div>';
						lam += '</a>';
					})

					$('#service_user').html(lam);
				}else{ $('#service_user').html("Bạn chưa có dịch vụ"); }
			}else{ $('#service_user').html("Chưa có đánh giá về dịch vụ"); }
					
		}
		else{ $('#service_user').html("Bạn chưa có dịch vụ"); }
			
	})
}

function chuyenso(x) {
	var mau = parseInt(x);
	if(!Number.isInteger(mau)) result = 0;
	var result = 0;

	// 1.000.000.000.000 => T 
	// 1.000.000.000 => B 
	// 1.000.000 => M 
	// 1.000 => K
	if (mau > 1000000000000) return (mau/1000000000000).toFixed(1).toString() + 'T';
	else if((mau > 1000000000)) return (mau/1000000000).toFixed(1).toString() + 'B';
	else if((mau > 1000000)) return (mau/1000000).toFixed(1).toString() + 'M';
	else if((mau > 1000)) return (mau/1000).toFixed(1).toString() + 'K';
	else return mau;
}