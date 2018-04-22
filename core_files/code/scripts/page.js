function vote_page(vote, pageid, tok) {
	$.ajax({
		url: global_base_url + "pages/vote/",
		type: "GET",
		data: {
			vote: vote,
			pageid: pageid,
			tok : tok
		},
		success: function(msg) {
			$('#page-votes').html(msg);
		}
	});
}