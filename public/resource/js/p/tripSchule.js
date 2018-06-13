$(document).ready(function () {
	// console.log("hello");
	timkiem();
	timkiem2();
	add_lichtrinh();
	add_chitiet_lichtrinh();
	edit_lichtrinh();
	check_schedule();
})


function timkiem() {
	$('#search-schedule').keyup(function () {
		var keyword = $('#search-schedule').val();
		var keyword_handle = keyword.replace(" ","+");

		if (keyword.length > 1) 
		{
			$('#list-detail').css('display','block');

			$.ajax({
				url: 'schedule-search-ervices/'+ keyword_handle,
				type: 'GET'
			})
			.done(function (response) {
				console.log(response);
				var lam = new String(); // khoi tao bien luu pha hien thi len view
				var type = null;
				response.forEach(function (data) {
					if(data.sv_types != 3){
						loai = parseInt(data.sv_types);
						lam += '<li style="position: relative;" data-id="'+ data.sv_id +'" data-name="'+ data.sv_name +'" data-type="'+ data.sv_types +'" data-img="'+ data.image_details_1 +'" data-city="'+ data.name_city +'" data-district="'+ data.name_district +'" data-ward="'+ data.name_ward +'" class="chon-sv" onclick="add()">';
						lam += '<img src="public/thumbnails/'+ data.image_details_1 +'" alt="" style="height: 50px;width: 50px;">';
						lam += '<div class="text-lam">';
						lam += '<span><b>'+ data.sv_name +'</b></span><br>';
						lam += '<span class="text-con" style="color:#ddd;">'+ data.name_city +'<i class="fas fa-angle-double-right"></i>'+ data.name_district +'<i class="fas fa-angle-double-right"></i>'+ data.name_ward +'</span>';
						lam += '</div>';
						if (loai == 1) {
							type = "Ăn uống";
						}
						else if(loai == 2){
							type = "Khách sạn";
						}
						else if(loai == 4){
							type = "Tham quan";
						}
						else if(loai == 5){
							type = "Vui chơi";
						}
						lam += '<span class="type-sv badge badge-success">'+ type +'</span>';
						lam += '</li>';
					}
						
				})
				$('#list-serach-sv').html(lam);
				
			})
		}
		else
		{
			$('#list-detail').css('display','none');
		}	
		add();
	})
	// add();
}




// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByClassName("item-sv");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}

function add() {
	var lamm = document.getElementsByClassName("chon-sv");
	// console.log(lamm);
	for (var i = 0; i < lamm.length; i++) {
		lamm[i].onclick = function () {
			var id = this.getAttribute("data-id");
			var name = this.getAttribute("data-name");
			var img = this.getAttribute("data-img");	
			var loai = parseInt(this.getAttribute("data-type"));	
			var city = this.getAttribute("data-city");
			var district = this.getAttribute("data-district");
			var ward = this.getAttribute("data-ward");
			// console.log(loai);
			var type = null;
			var lam = new String();

			lam += '<li style="position: relative;" data-id="'+ id +'" class="lamlam" onclick="add()">';
			lam += '<img src="public/thumbnails/'+ img +'" alt="" style="height: 50px;width: 50px;">';
			lam += '<div class="text-lam">';
			lam += '<span><b style="font-size=11px">'+ name +'</b></span><br>';
			lam += '<span class="text-con" style="color:#8c8787;">'+ city + ' <i class="fas fa-angle-double-right"></i> '+ district +' <i class="fas fa-angle-double-right"></i> '+ ward +'</span>';
			lam += '</div>';
			if (loai === 1) {
				type = "Ăn uống";
			}
			else if(loai == 2){
				type = "Khách sạn";
			}
			else if(loai == 4){
				type = "Tham quan";
			}
			else if(loai == 5){
				type = "Vui chơi";
			}
			lam += '<span class="type-sv badge badge-success">'+ type +'</span>';
			lam += '<span class="xoaxoa" onclick="close_sv()"><i class="fas fa-times"></i></span>';
			lam += '</li>';

			$('#myUL').append(lam);
			$('#list-detail').css('display','none');
		}
	}
	// close_sv();
}



function close_sv() {
	var close = document.getElementsByClassName("lamlam");
	var tab = [];
	var liIndex = 0;
	for (var i = 0; i < close.length; i++) {
		tab.push(close[i].innerHTML)
	}
	var i;
	for (i = 0; i < close.length; i++) {
	  close[i].onclick = function() {
	    liIndex = tab.indexOf(this.innerHTML);
	  }
	}
	close[liIndex].parentNode.removeChild(close[liIndex]);
}

// function add_lichtrinh() {
// 	$('#addLichtrinh').click(function () {

// 		var name = $('input[name=trip_name]').val();
// 		var start = $('input[name=trip_startdate]').val();
// 		var end = $('input[name=trip_enddate]').val();
// 		var lt = { trip_name: name, trip_startdate: start, trip_enddate: end};


// 		var lamm = document.getElementsByClassName("lamlam");
// 		// console.log(lamm);
// 		var sv = new Array();
// 		for (var i = 0; i < lamm.length; i++) {
// 			sv.push(lamm[i].getAttribute("data-id"));
// 		}


// 		console.log(sv);
// 		//save-trip-schedule-array
// 		$.ajax({
// 		   type: "GET",
// 		   data: {list:lt,listDeail:sv},
// 		   url: "save-trip-schedule-array"
// 		}).done(function (response) {
// 			console.log(response);
// 		})
// 	})
// }

function add_lichtrinh() {
	$('#addLichtrinh').click(function () {

		var name = $('input[name=trip_name]').val();
		var start = $('input[name=trip_startdate]').val();
		var end = $('input[name=trip_enddate]').val();
		if (name.length > 0) 
		{
			$('#err_name').css('display','none');
			if (start.length > 0) 
			{
				var date1 = new Date(start);
				var today = new Date();
				var dd = today.getDate();
				if (date1 < today) 
				{
					$('#err_star_max').css('display','block');
				}
				else{
					$('#err_end').css('display','none');
					if (end.length > 0) 
					{
						$('#err_end').css('display','none');

						// var endDate = parseDate(end).getTime();
						var date2 = new Date(end);
						if (date2 < date1) 
						{
							$('#err_star_min').css('display','block');
						}
						else
						{
							var lt = { trip_name: name, trip_startdate: start, trip_enddate: end};

							var lamm = document.getElementsByClassName("lamlam");
							// console.log(lamm);
							var sv = new Array();
							for (var i = 0; i < lamm.length; i++) {
								sv.push(lamm[i].getAttribute("data-id"));
							}

							console.log(sv);
							//save-trip-schedule-array
							$.ajax({
							   type: "GET",
							   data: {list:lt,listDeail:sv},
							   url: "save-trip-schedule-array"
							}).done(function (response) {
								console.log(response);
								if (parseInt(response) != 1) 
								{
									alert('Thêm thành công Lịch trình');
									location.href = response;
								}
								else
								{
									alert('Thêm thành công Lịch trình');
									location.reload();
								}
							})
						}	
					}
					else
					{
						$('#err_end').css('display','block');
					}		
				}	
			}
			else
			{
				$('#err_star').css('display','block');
			}
		}
		else
		{
			$('#err_name').css('display','block');
		}			
	})
}


// xoa lich trinh
function xoa_lichtrinh() {
	var lam = document.getElementsByClassName("xoa_lichtrinh");
	// console.log(lam);
	for (var i = 0; i < lam.length; i++) {
		lam[i].onclick = function () {
			//delete-schedule-detail/{id}
			var conf = confirm('Bạn có chắc chắn muốn xóa lịch trình vừa chọn?');
			if (conf) 
			{
				var id = this.getAttribute("data-id");
				$.ajax({
				   type: "GET",
				   url: 'delete-schedule-detail/' + id
				}).done(function (response) {
					console.log(response);
					if (parseInt(response) == 1) 
					{
						//get_tripchudule
						alert('Đã xóa lịch trình vừa chọn');
						location.href = 'get_tripchudule';
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


function timkiem2() {
	$('#search-schedule2').keyup(function () {
		var keyword = $('#search-schedule2').val();
		var keyword_handle = keyword.replace(" ","+");

		if (keyword.length > 1) 
		{
			$('#list-detail2').css('display','block');

			$.ajax({
				url: 'schedule-search-ervices/'+ keyword_handle,
				type: 'GET'
			})
			.done(function (response) {
				// console.log(response);
				var lam = new String(); // khoi tao bien luu pha hien thi len view
				var type = null;
				response.forEach(function (data) {
					if(data.sv_types != 3){
						loai = parseInt(data.sv_types);
						lam += '<li style="position: relative;" data-id="'+ data.sv_id +'" data-name="'+ data.sv_name +'" data-type="'+ data.sv_types +'" data-img="'+ data.image_details_1 +'" class="chon-sv2" onclick="add2()">';
						lam += '<img src="public/thumbnails/'+ data.image_details_1 +'" alt="" style="height: 50px;width: 50px;">';
						lam += '<div class="text-lam">';
						lam += '<span><b>'+ data.sv_name +'</b></span><br>';
						lam += '<span class="text-con"></span>';
						lam += '</div>';
						if (loai == 1) {
							type = "Ăn uống";
						}
						else if(loai == 2){
							type = "Khách sạn";
						}
						else if(loai == 4){
							type = "Tham quan";
						}
						else if(loai == 5){
							type = "Vui chơi";
						}
						lam += '<span class="type-sv badge badge-success">'+ type +'</span>';
						lam += '</li>';
					}
						
				})
				$('#list-serach-sv2').html(lam);
				
			})
		}
		else
		{
			$('#list-detail2').css('display','none');
		}	
		add();
	})
	// add();
}

function add2() {
	var lamm = document.getElementsByClassName("chon-sv2");
	// console.log(lamm);
	for (var i = 0; i < lamm.length; i++) {
		lamm[i].onclick = function () {
			var id = this.getAttribute("data-id");
			var name = this.getAttribute("data-name");
			var img = this.getAttribute("data-img");	
			var loai = parseInt(this.getAttribute("data-type"));	
			// console.log(loai);
			var type = null;
			var lam = new String();

			lam += '<li style="position: relative;display: inline-flex;width: 100%;" data-id="'+ id +'" class="lamlam2" onclick="add2()">';
			lam += '<img src="public/thumbnails/'+ img +'" alt="" style="height: 50px;width: 50px;">';
			lam += '<div class="text-lam">';
			lam += '<span><b style="font-size=11px">'+ name +'</b></span><br>';
			lam += '<span class="text-con"></span>';
			lam += '</div>';
			if (loai === 1) {
				type = "Ăn uống";
			}
			else if(loai == 2){
				type = "Khách sạn";
			}
			else if(loai == 4){
				type = "Tham quan";
			}
			else if(loai == 5){
				type = "Vui chơi";
			}
			lam += '<span class="type-sv badge badge-success">'+ type +'</span>';
			lam += '<span class="xoaxoa" onclick="close_sv2()"><i class="fas fa-times"></i></span>';
			lam += '</li>';

			$('#myUL2').append(lam);
			$('#list-detail2').css('display','none');
		}
	}
	// close_sv();
}

function close_sv2() {
	var close = document.getElementsByClassName("lamlam2");
	var tab = [];
	var liIndex = 0;
	for (var i = 0; i < close.length; i++) {
		tab.push(close[i].innerHTML)
	}
	var i;
	for (i = 0; i < close.length; i++) {
	  close[i].onclick = function() {
	    liIndex = tab.indexOf(this.innerHTML);
	  }
	}
	close[liIndex].parentNode.removeChild(close[liIndex]);
}

function add_chitiet_lichtrinh() {
	$('#btnthemchitiet').click(function () {

		var lamm2 = document.getElementsByClassName("lamlam2");
		var kq = 0;		var sv = new Array();
		for (var i = 0; i < lamm2.length; i++) {
			var id = $('#id_lich_trinh').val();
			var id_sv = lamm2[i].getAttribute("data-id");
			$.ajax({
			   type: 'POST',
			   data: {service_id:id_sv},
			   url: 'add_detailtripchudule/' + id
			}).done(function (response) {
				kq =  parseInt(response);
				// console.log(response)
			})
		}
		alert('Thêm thành công');
		location.reload();
	})
}

function edit_lichtrinh() {
	$('#editlichtrinh').click(function () {
		var id = $('input[name=id_lt]').val();
		var name = $('#e_trip_name').val();
		var start = $('input[name=e_trip_startdate]').val();
		var end = $('input[name=e_trip_enddate]').val();
		if (name.length > 0) 
		{
			$('#e_err_name').css('display','none');
			if (start.length > 0) 
			{
				var date1 = new Date(start);
				var today = new Date();
				var dd = today.getDate();
				if (date1 < today) 
				{
					$('#e_err_star_max').css('display','block');
				}
				else{
					$('#e_err_star_max').css('display','none');
					$('#e_err_end').css('display','none');
					if (end.length > 0) 
					{
						$('#e_err_end').css('display','none');

						// var endDate = parseDate(end).getTime();
						var date2 = new Date(end);
						if (date2 < date1) 
						{
							$('#e_err_star_min').css('display','block');
						}
						else
						{
							$.ajax({
								url:'http://localhost/vntour_api/edit-schedule',
								type: 'POST',
								data:{id:id,trip_name:name, trip_startdate:start, trip_enddate:end}
							})
							.done(function (data) {
								// console.log(data);
								if (parseInt(data) == 1) 
								{
									alert('Cập nhật thành công');
									location.reload();
								}else{
									alert('Lỗi không cập nhật được lịch trình');
								}
								
							})
							.fail(function () {
								alert('Lỗi không cập nhật được lịch trình');
							})
						}	
					}
					else
					{
						$('#e_err_end').css('display','block');
					}		
				}	
			}
			else
			{
				$('#e_err_star').css('display','block');
			}
		}
		else
		{
			$('#e_err_name').css('display','block');
		}		
							
	})	
		
}

function check_schedule() {
	$('#check_schedule').change(function () {
		var check = document.getElementById('check_schedule').checked;
		if (!check) 
		{
			var conf = confirm('Lịch trình này đã được hoàn thành trước đó, bạn có chắc chắn muốn thay đổi trạng thái lịch trình này?');
			post_checkSchedule(0);
		}
		else{
			var conf = confirm('Bạn có chắc chắn muốn đánh dấu hoàn thành lịch trình này?');
			if (conf) 
			{
				post_checkSchedule(1);
			}
		}
	})
}

function post_checkSchedule(status) {
	var id = $('input[name=id_lt]').val();
	$.ajax({
	   type: 'POST',
	   data: {id:id,status_lt:status},
	   url: 'success-schedule'
	}).done(function (data) {
		kq =  parseInt(data);
		if (kq == 1) 
		{
			alert('Cập nhật thành công trạng thái lịch trình');
		}
		else{
			alert('Lỗi không cập nhật được trạng thái lịch trình');
		}
	})
	.fail(function () {
		alert('Lỗi không cập nhật được trạng thái lịch trình');
	})
}


