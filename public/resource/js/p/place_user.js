var current_page = 1;
// var path = 'place-user-list/'+ current_page +'&2';
var tong = 0;


$(document).ready(function (argument) {
	loadData(1);
	// phantrang();
	// get_data();
})


function loadData(current_page) {
	var path = 'place-user-list/'+ current_page +'&9';
	console.log(path);
	$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			// console.log(response);
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			tong = response.total_page;
			if(response.data.length != 0)
			{
				response.data.forEach(function (data) {

					lam += '';
					lam += '<tr>';
				    lam += '<td >' + data.pl_name + '</td>';
				    lam += '<td>' + data.pl_address + '</td>';
				    lam += '<td class="text-center">'+ data.created_at.slice(0,data.created_at.indexOf(" ")) +'</td>';
				    lam += '<td class="text-center">';

				    if (data.pl_status == 1) 
				    {lam += '<i class="fa fa-check"></i>';}
					else 
					{lam += '<i class="fas fa-times"></i>';}
				    
				    lam += '</td>';
				    lam += '<td class="text-center">';
					lam += '<a class="btn btn-sm btn-info" href="edit-place-user/'+ data.id +' "><i class="far fa-edit"></i> Chi tiết</a>';
				    // lam += '<button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Xóa</button>';
				    lam += '</td>';
					lam += '</tr>';
				})
				$('#list-place').html(lam);
				paginate(tong,response.current_page);
			}	
		})
}

function get_data() {
	// console.log(1);
	$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			// console.log(response.data);
			if(response.data.length != 0)
			{
				
				return response.data;
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
	if (total > 1) 
	{
		var lam = new String();
		for (var i = 1; i <= total; i++) {
			if (parseInt(current_page) == i) 
			{
				lam += '<li class="page-item active"><a class="page-link" onclick="loadData('+ i +')">'+ i +'</a></li>'
			}	
			else{
				lam += '<li class="page-item"><a class="page-link" onclick="loadData('+ i +')">'+ i +'</a></li>'
			}
		}
		$('#pagination').html(lam);
	}
		
}

function lamsas() {
	console.log('hello');
}

// function phantrang() {
// 	$(function() {
//     (function(name) {
//       var container = $('#pagination-' + name);
//       // var sources = function () {
//       //   var result = [];

//       //   for (var i = 1; i < 196; i++) {
//       //     result.push(i);
//       //   }

//       //   return result;
//       // }();

//       var options = {
//         dataSource: function () {
//         	$.ajax({
// 		        type: 'GET',
// 		        url: path,
// 		        success: function(response) {
// 		        	console.log(response.data);
// 		            return response.data;
// 		        }
// 		    });
//         },
//         callback: function (response, pagination) {
//           window.console && console.log(response, pagination);

//           var dataHtml = '<ul>';

//           $.each(response, function (index, item) {
//             dataHtml += '<li>' + item + '</li>';
//           });

//           dataHtml += '</ul>';

//           container.prev().html(dataHtml);
//         }
//       };

//       //$.pagination(container, options);

//       container.addHook('beforeInit', function () {
//         window.console && console.log('beforeInit...');
//       });
//       container.pagination(options);

//       container.addHook('beforePageOnClick', function () {
//         window.console && console.log('beforePageOnClick...');
//         //return false
//       });
//     })('demo1');
//   })
// }