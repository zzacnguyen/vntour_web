$(document).ready(function () {
	savenangcap();
})


function savenangcap() {
	$('#btncapnhat').click(function () {
		var pass_old = $('#pass_old').val();
		var pass_new = $('#pass_new').val();
		var pass_new2 = $('#pass_new2').val();
		console.log(pass_old);
		console.log(pass_new);
		if (pass_old.length == 0 || pass_new.length == 0) 
		{
			alert('Vui lòng điền đầy đủ thông tin');
		}
		else
		{
			if(pass_new != pass_new2)
			{
				alert('Mật khẩu cũ không trùng khớp');
			}
			else{
				if(pass_old == pass_new){
					alert('Mật khẩu cũ và mật khẩu mới không được trùng khớp với nhau');
				}
				else{
					$('#changepass').submit();
					// console.log('vl');
				}
			}
		}
			
	});
}