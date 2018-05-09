$(document).ready(function () {
	console.log("hello");
	loadquyen()
})


function loadquyen() {
	$('#btnnangcap').click(function () {
		$.ajax({
			url: 'http://chinhlytailieu/vntour_api/',
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			response.forEach(function (data) {
				
				$('#content-tinhtp-id').html(lam);
			})
			gantentinh();
		})
		search();
	})
}

function savenangcap() {
	// body...
}