$(document).ready(function() {
	$.ajax({
		url: global_base_url + "home/get_tweets/",
		type: "GET",
		data: {
		},
		beforeSend: function() {
		     $('#loader').show();
		  },
		  complete: function(){
		     $('#loader').hide();
		  },
		success: function(msg) {
			$('#tweets').html(msg);
		}
	});
});