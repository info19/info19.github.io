function checkUsername() {
	var username = $('#username').val();
	$.ajax({
		url: global_base_url + "home/check_username",
		type: "get",
		data: {
			"username" : username
		},
		success: function(msg) {
			$('#username_check').html(msg);
		}
	});
}