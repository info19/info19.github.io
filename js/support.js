//Управление
var my_support = {
	ban: function(user_id){
		var content = '<div style="padding:30px">'+
		'<b>1. </b>Укажите период блокировки пользователя. <br> <br><br>'+
		'<div class="texta" style="width:300px;margin-left:-127px;">Количество дней блокировки:</div><input id="day_ban" class="inpst" type="text" style="width:407px;height:16px;margin-top: 10px;" maxlength="255"><br><br>'+
		
		'</div>';
		Box.Show('my_support', 460, lang_profile_ban, content, lang_box_canсel, lang_new_msg_send, 'my_support.sban('+user_id+'); return false');
		$('#msg').focus();
	},
	sban: function(ban) {
	var day_ban = $('#day_ban').val();
	var text_ban = $('#text_ban').val();
	$.post('/index.php?go=support&act=ban', {ban:ban, day_ban:day_ban, text_ban:text_ban}, function(){
    Page.Go(location.href);
	Box.Info('err', 'Хорошо', 'Пользователь в попал в бан', 250, 1500);
	});
	},
	delet: function(user_id){
		var content = '<div style="padding:20px">'+
		'Укажите причину удаления пользователя. Можно использовать индивидуальное написания текста или воспользоваться готовыми вариантами.<br><br>'+
		'<b>Пример:</b><br><br>'+
		'<b>1.</b> Ваш аккаунт был удален в связи c нарушением установленных правил социальной сети MixLife.<br><br>'+
		'<b>2.</b> Ваш аккаунт был удален в связи того, что данная страница пользователя использовалась как средство распространения рекламной информации и вредоносных ссылок.<br><br><br>'+
		'<div class="texta" style="width:200px;margin-left: -93px;margin-top: 20px;">Причина удаления:</div><textarea id="text_delet" class="inpst" style="width:406px;height:120px;margin-top:10px;"></textarea>'+
		'</div>';
		Box.Show('my_support', 460, lang_profile_delet, content, lang_box_canсel, lang_new_msg_send, 'my_support.sdelet('+user_id+'); return false');
		$('#msg').focus();
	},
	sdelet: function(delet) {
	var text_delet = $('#text_delet').val();
	$.post('/index.php?go=support&act=delets', {delet:delet, text_delet:text_delet}, function(){
    Page.Go(location.href);
	Box.Info('err', 'Хорошо', 'Пользователь был удачно удален', 250, 1500);
	});
	},
	ok: function(user_id){
		var content = '<div style="padding:20px">'+
		'Если Вы уверены в том, что аккаунт данного пользователя развивается и пользователь принимает активное участие в жизни и развитии социальной сети <b>MixLife</b> он может быть удостоен со стороны администрации награды в виде подтвержденного аккаунта, как постоянный и надежный.<br><br>'+
		'Для подтверждения аккаунта нажмите кнопку отправить.<br><br>'+
		'</div>';
		Box.Show('my_support', 460, lang_ok, content, lang_box_canсel, lang_new_msg_send, 'my_support.sok('+user_id+'); return false');
		$('#msg').focus();
	},
	sok: function(ok) {
	$.post('/index.php?go=support&act=ok', {ok:ok}, function(){
    Page.Go(location.href);
	Box.Info('err', 'Хорошо', 'Пользователь был подтвержден', 250, 1500);
	});
	},
	golos: function(user_id){
		var content = '<div style="padding:20px">'+
		'Вы в праве передать данному пользователю любое количество голосов.<br>'+
		'<div class="texta" style="width:300px;margin-left: -113px;margin-top: 20px;">Введите нужную сумму голосов:</div><input id="golos" class="inpst" type="text" style="width:406px;height:16px;margin-top: 10px;" maxlength="255"><br><br>'+
		'</div>';
		Box.Show('my_support', 460, lang_golos, content, lang_box_canсel, lang_new_msg_send, 'my_support.sgolos('+user_id+'); return false');
		$('#msg').focus();
	},
	sgolos: function(golosz) {
	var golos = $('#golos').val();
	$.post('/index.php?go=support&act=golos', {golosz:golosz, golos:golos}, function(){
    Page.Go(location.href);
	Box.Info('err', 'Хорошо', 'Начисление голосов пользователю прошло удачно', 350, 1500);
	});
	},
	subadmin: function(user_id){
		var content = '<div style="padding:20px">'+
		'Вы можете перевести данного пользователя в группу поддержки, что позволит ему принимать плотное участи в развитии и улучшении качества предоставляемых услуг социальной сети <b>MixLife</b>. При всем этом Вы должны полностью доверять данному человеку.<br><br>'+
		'<b>Перечень доступных функций, для нового агента:</b><br><br>'+
		'<b>Аккаунты:</b><br>'+
		'<b>1.</b> Блокировка пользователей / разблокировка, кроме рабочего персонала.<br>'+
		'<b>2.</b> Полное удаление аккаунта / восстановление любого пользователя.<br>'+
		'<b>3.</b> Подтверждение надежности аккаунтов отдельных пользователей.<br><br>'+
		'<b>Группы:</b><br>'+
		'<b>1.</b> Временная блокировка / разблокировка любой группы.<br>'+
		'<b>2.</b> Полное удаление / восстановление любой группы.<br><br>'+
		'<b>Раздел помощи:</b><br>'+
		'<b>1.</b> Отвечать на вопросы заданные со стороны пользователей <b>MixLife</b><br><br>'+
		'</div>';
		Box.Show('my_support', 460, lang_subadmin, content, lang_box_canсel, lang_new_msg_send, 'my_support.ssubadmin('+user_id+'); return false');
		$('#msg').focus();
	},
	ssubadmin: function(subadmin) {
	$.post('/index.php?go=support&act=subadmin', {subadmin:subadmin}, function(){
    Page.Go(location.href);
	Box.Info('err', 'Хорошо', 'Пользователь стал агентом поддержки', 250, 1500);
	});
	},
	subback: function(user_id){
		var content = '<div style="padding:20px">'+
        'Если суппорт не оправдал доверие в его сторону со стороны коллектива <b>MixLife</b> или того хуже нарушил внутренние правила распространяемые даже на обычного пользователя, так же превысил допустимые должностные обязанности и нарушил права наших дорогих пользователей<b>.,</b> Вывод один: Увольнение!<br><br>'+
		'<b>Произвести процесс увольнения агента поддержки?!</b><br><br>'+
		'</div>';
		Box.Show('my_support', 460, lang_subback, content, lang_box_canсel, lang_new_msg_send, 'my_support.ssubback('+user_id+'); return false');
		$('#msg').focus();
	},
	ssubback: function(subback) {
	$.post('/index.php?go=support&act=subback', {subback:subback}, function(){
    Page.Go(location.href);
	Box.Info('err', 'Хорошо', 'Агент поддержки был уволен', 250, 1500);
	});
	},
	groupban: function(group_id){
		var content = '<div style="padding:20px">'+
        'В отличии от блокировки пользователей прибегать к блокировки сообществ надо в том случае если группа не однократно нарушала правила социальной сети <b>MixLife</b>.<br><br>'+
		'<b>Заблокировать сообщество?</b><br><br>'+
		'</div>';
		Box.Show('my_support', 460, lang_group_ban, content, lang_box_canсel, lang_new_msg_send, 'my_support.sgroupban('+group_id+'); return false');
		$('#msg').focus();
	},
	sgroupban: function(groupban) {
	$.post('/index.php?go=support&act=groupban', {groupban:groupban}, function(){
    Page.Go(location.href);
	Box.Info('err', 'Хорошо', 'Сообщество было заблокировано', 250, 1500);
	});
	},
	groupdelet: function(group_id){
		var content = '<div style="padding:20px">'+
        'Если сообщество было создано с целью распространение рекламной информации, вредоносных ссылок, порнографических и экстремистских материалов, сообщество следует удалить.<br><br>'+
		'<b>Удалить сообщество?</b>'+
		'</div>';
		Box.Show('my_support', 460, lang_group_delet, content, lang_box_canсel, lang_new_msg_send, 'my_support.sgroupdelet('+group_id+'); return false');
		$('#msg').focus();
	},
	sgroupdelet: function(groupdelet) {
	$.post('/index.php?go=support&act=groupdelet', {groupdelet:groupdelet}, function(){
    Page.Go(location.href);
	Box.Info('err', 'Хорошо', 'Сообщество было удачно удалено', 250, 1500);
	});
	},
	report:function(){
		$.post('/index.php?go=jalobob',function(body){
			$('body').append('<div id="newbox_miniature"><div class="miniature_box"><div class="miniature_pos" style="width: 640px;padding:15px;"><div class="miniature_title fl_l">Поступившие жалобы</div><a class="cursor_pointer fl_r" onclick="Profile.miniatureClose()">'+lang_msg_close+'</a><div class="clear"></div>'+
			body+
			'</div></div></div>');
		});
	}
}

function del_fop(act, id, i){
	$('#loading').fadeIn('fast');
	$.post('/index.php?go=jalobob&mod=report&action=obj', {act_post: act, aid: id}, function(d){
		$('#loading').fadeOut('fast');
		$('#'+i).html('Удалено').attr('onClick', '');
	});
}
function del_rep(id){
	$('#loading').fadeIn('fast');
	$.post('/index.php?go=jalobob&mod=report&action=del', {id: id}, function(d){
		$('#loading').fadeOut('fast');
		$('#r'+id).html('Жалоба удалена');
	});
}
function del_all_rep(id){
	$('#loading').fadeIn('fast');
	$.get('/index.php?go=jalobob&action=del_user&id='+id, function(d){
	Profile.miniatureClose()
	});
}