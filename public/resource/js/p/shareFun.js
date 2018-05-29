$(document).ready(function () {
	chuyen_so_view();
})


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

function chuyen_so_view() {
	var so = document.getElementsByClassName('chuyenso');
	for (var i = 0; i < so.length; i++) {
		var x = so[i].innerText;
		so[i].innerHTML = chuyenso(x);
	}

	var giathap = document.getElementsByClassName('giathap');
	var giacao = document.getElementsByClassName('giacao');
	for (var i = 0; i < giathap.length; i++) {
		giathap[i].innerHTML = chuyenso(giathap[i].innerText);
	}
	for (var i = 0; i < giacao.length; i++) {
		giacao[i].innerHTML = chuyenso(giacao[i].innerText);
	}
}