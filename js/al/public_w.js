var w = {
	exit: function(){
		var str = $('#community_count_state1').val();
		$('.community_widget_bottom').html('<a id="join_community" onclick="w.login();" class="join_community  color3_bg clear_fix">Подписаться на новости</a>');
		$.post('/index.php?go=groups&act=exit', {id: config.id});
		$('#this_us').animate({'margin-left': -99}, 600);
	},
	login: function(){
		$('.community_widget_bottom').html('<a id="join_community" onclick="w.exit();" class="join_community  clear_fix color4_bg color2 community_checked">Отписаться от новостей</a>');
		$.post('/index.php?go=groups&act=login', {id: config.id});
		$('#this_us').animate({'margin-left': 0}, 600);
	},
	open_p: function(){
       window.open('http://'+location.hostname+'/public'+config.id, '_blank');
	},
}