var current_page = 1;
var path = 'place-user-list/'+ current_page +'&9';
var tong = 0;


$(document).ready(function (argument) {
	loadData();
})


function loadData() {
	console.log(path);
	$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			tong = response.total_page;
			if(response.data.length != 0)
			{
				response.data.forEach(function (data) {
					lam += '';
					lam += '<tr>';
				    lam += '<td >' + data.pl_name + '</td>';
				    lam += '<td>' + data.pl_address + '</td>';
				    lam += '<td>'+ data.created_at.slice(0,data.created_at.indexOf(" ")) +'</td>';
				    lam += '<td class="text-center">';

				    if (data.pl_status != 1) 
				    {lam += '<i class="fa fa-check"></i>';}
					else 
					{lam += '<i class="fas fa-times"></i>';}
				    
				    lam += '</td>';
				    lam += '<td class="text-center">';
					lam += '<a class="btn btn-sm btn-info" href="{{route("edit_placeuser",'+ data.id +')}}"><i class="far fa-edit"></i> Chi tiết</a>';
				    lam += '<button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Xóa</button>';
				    lam += '</td>';
					lam += '</tr>';
				})
				$('#list-place').html(lam);
				// console.log(response.total_page);
			}	
		})
}

function paginate_place() {
	$('#pagination-demo').twbsPagination({
        totalPages: tong,
        visiblePages: 3,
        onPageClick: function (event, page) {
            current_page = page;
            path = 'place-user-list/'+ current_page +'&3';
            loadData();
        }
    });
}

function paginate(total,current_page) {
	for (var i = 0; i < total; i++) {
		
	}
}

function lamsas() {
	console.log('hello');
}