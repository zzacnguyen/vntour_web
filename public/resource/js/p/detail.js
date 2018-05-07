$(document).ready(function () {
	checkLogin();
	check_rating();
})


function checkLogin() {
	// kiem tra xem co dang nhap hay chua
	var path = window.location.pathname;
	var service_id = path.slice(path.lastIndexOf("/") + 4,path.search("&")); // lay id service tu url
	var dem = 0;
	$.ajax({
			url: 'checkLogin',
			type: 'GET',
			dataType: 'json'
		})
		.done(function (response) {
			if (response.length > 0) 
			{
				var pathCheckLike = '/http://chinhlytailieu/vntour_api/checkLike/userid=' + response[0].user_id + '&svid=' + service_id;
				
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
							});
						}
						else{
							$('#like01').click(function () {
							// console.log($('#num_like').innerHTML);
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
						window.location.assign('loginW');
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
		console.log("hello");
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

        	console.log("ok");
        }
	})

	
}
