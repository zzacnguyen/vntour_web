$(document).ready(function () {
	// console.log("hello");
	timkiem();
	add_lichtrinh();
	// close_sv();
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
				// console.log(response);
				var lam = new String(); // khoi tao bien luu pha hien thi len view
				var type = null;
				response.forEach(function (data) {
					if(data.sv_types != 3){
						loai = parseInt(data.sv_types);
						lam += '<li style="position: relative;" data-id="'+ data.sv_id +'" data-name="'+ data.sv_name +'" data-type="'+ data.sv_types +'" data-img="'+ data.image_details_1 +'" class="chon-sv" onclick="add()">';
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
			// console.log(loai);
			var type = null;
			var lam = new String();

			lam += '<li style="position: relative;" data-id="'+ id +'" class="lamlam" onclick="add()">';
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

function add_lichtrinh() {
	$('#addLichtrinh').click(function () {


		var name = $('input[name=trip_name]').val();
		var start = $('input[name=trip_startdate]').val();
		var end = $('input[name=trip_enddate]').val();
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
		})
	})
}