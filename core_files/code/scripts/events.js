function close_event(id) {
	$.ajax({
		url: global_base_url + "home/delete_event",
		type: "GET",
		data: {
			id : id
		},
		success: function(msg) {
			$('#messages-event-'+id).html(msg);
		}
	});
}