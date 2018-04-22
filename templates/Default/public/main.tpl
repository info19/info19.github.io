<script type="text/javascript">
var startResizeCss = false;
$(document).ready(function(){
	[admin]ajaxUpload = new AjaxUpload('upload_cover', {
		action: '/index.php?go=groups&act=upload_cover&id={id}',
		name: 'uploadfile',
		onSubmit: function (file, ext) {
			if(!(ext && /^(jpg|png|jpeg|gif|jpe)$/.test(ext))) {
				addAllErr(lang_bad_format, 3300);
				return false;
			}
			$("#les10_ex2").draggable('destroy');
			$('.cover_loaddef_bg').css('cursor', 'default');
			$('.cover_loading').show();
			$('.cover_newpos, .cover_descring').hide();
			$('.cover_profile_bg').css('opacity', '0.4');
		},
		onComplete: function (file, row){
			if(row == 1 || row == 2) addAllErr('Максимальны размер 7 МБ.', 3300);
			else {
				$('.cover_loading').hide();
				$('.cover_loaddef_bg, .cover_hidded_but, .cover_loaddef_bg, .cover_descring').show();
				$('#upload_cover').text('Изменить фото');
				$('.cover_profile_bg').css('opacity', '1');
				$('.cover_loaddef_bg').css('cursor', 'move');
				$('.cover_newpos').css('position', 'absolute').css('z-index', '2').css('margin-left', '197px').show();
				row = row.split('|');
				rheihht = row[1];
				postop = (parseInt(rheihht/2)-100);
				if(rheihht <= 230) postop = 0;
				$('#les10_ex2').css('height', +rheihht+'px').css('top', '-'+postop+'px');
				cover.init('/uploads/groups/'+row[0], rheihht);
				$('.cover_addut_edit').attr('onClick', 'cover.startedit(\'/uploads/groups/'+row[0]+'\', '+rheihht+')');
			}
		}
	});[/admin]
	$('#wall_text, .fast_form_width').autoResize();
	myhtml.checked(['{settings-comments}', '{settings-discussion}']);
	music.jPlayerInc();
	$(window).scroll(function(){
		if($('#type_page').val() == 'public'){
			if($(document).height() - $(window).height() <= $(window).scrollTop()+($(document).height()/2-250)){
				groups.wall_page();
			}
			if($(window).scrollTop() < $('#fortoAutoSizeStyle').offset().top){
				startResizeCss = false;
				$('#addStyleClass').remove();
			}
			if($(window).scrollTop() > $('#fortoAutoSizeStyle').offset().top && !startResizeCss){
				startResizeCss = true;
				$('body').append('<div id="addStyleClass"><style type="text/css" media="all">.profile_wall_attach_photo img{max-width: 525px;    max-height: 525px;margin: 3px 10px 10px 0;} .public_wall{width:815px}.infowalltext_f{font-size:11px}.wall_inpst{width:517px !important}.public_likes_user_block{margin-left:438px}.wall_fast_opened_form{width:530px}.wall_fast_block{width:530px;margin-top:-5px}.public_wall_all_comm{width:522px;margin-top:-4px;margin-bottom:5px;margin-left:46px;}.player_mini_mbar_wall{width:710px;margin-bottom:0px}#audioForSize{min-width:700px}.wall_rec_autoresize{width:530px;}.wall_fast_ava img{width:50px}.wall_fast_ava{width:60px}.wall_fast_comment_text{margin-left:57px}.wall_fast_date{margin-left:57px;font-size:11px}.size10{font-size:11px}</style>');
			}
		}	
	});
	langNumric('langForum', '{forum-num}', 'обсуждение', 'обсуждения', 'обсуждений', 'обсуждение', 'Нет обсуждений');
	langNumric('langNumricAll', '{audio-num}', 'аудиозапись', 'аудиозаписи', 'аудиозаписей', 'аудиозапись', 'аудиозаписей');
});
$(document).click(function(event){
	wall.event(event);
});
</script>
<input type="hidden" id="type_page" value="public" />
<style>.newcolor000{color:#000} .wall_none {
    text-align: center;
    font-size: 13px;
    color: #999;
    margin-left: -18px;
    padding-top: 10px;
    margin-top: 11px;
    cursor: default;
	border-top: none;
}
.wall_upage {
    padding-bottom: 10px;
    border-top: none;
    margin-left: -14px;
}
.set_status_bg {
    background: #EEF2F3;
    padding: 10px;
    position: absolute;
    margin-left: -14px;
    margin-top: -14px;
    width: 514px;
}
</style>
<div id="jquery_jplayer"></div>
<div id="addStyleClass"></div>
<input type="hidden" id="teck_id" value="" />
<input type="hidden" id="teck_prefix" value="" />
<input type="hidden" id="typePlay" value="standart" />
<input type="hidden" id="public_id" value="{id}" />
<div class="speedbar1 [speedbar]no_display[/speedbar]" id="speedbar">{translate=public_spbar} <onClick="trsn.box()" onMouseover="pageVerifiedTip(this, {text: 'Выбор используемого языка на сайте', shift: [5,5,0]});"></div>
[not-admin][cover]<div class="cover_all_user"><img src="{cover}" width="800" id="cover_img" {cover-param-5} /></div>[/cover][/not-admin]

<div class="ava fl_r "style="margin-right:11px;" onMouseOver="groups.wall_like_users_five_hide()">
 [admin]<div class="cover_newava" style="    background: #fff;
    width: 100%;
    bottom: -3px;
    margin-left: -18px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;"><img src="{photo}" id="ava" /></div>[/admin]
 [not-admin][cover]<div class="cover_newava" {cover-param-7}>[/cover]<img src="{photo}" id="ava" style="    background: #fff;
    width: 100%;
    bottom: -3px;
    margin-left: -18px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;    margin-top: 2px;" />[cover]</div>[/cover][/not-admin]


[not-admin]<div class="smsgroup" style="    background: #fff;
    width: 100%;
    margin-left: -18px;
    margin-top: 20px;
    height: 34px;
    margin-bottom: -6px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">
<div class="button_div fl_l" style="margin-bottom:15px;line-height:15px"><button onclick="messages.pnew_('{real_admin}'); return false" style="width:200px">Написать сообщение</button></div>
</div>[/not-admin]
	
  [admin]<div class="menuleft" style="    background: #fff;
    width: 100%;
    margin-left: -18px;
    margin-top: 23px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;"><a href="/" onClick="groups.loadphoto('{id}'); return false"><div class="icon-camera-7" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div>Изменить фотографию</div></a>
  <span id="del_pho_but" class="{display-ava}"><a href="/" onClick="groups.delphoto('{id}'); return false;"><div class="icon-cancel-5" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div>Удалить фотографию</div></a></span>
</div>
  [/admin]


  <div class="publick_subscblock" style="background: #fff;
    width: 100%;
    margin-left: -18px;
    margin-top: -2px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">
   <div id="yes" class="{yes}">
	<div class="button_div fl_l" style="margin-bottom:15px;line-height:15px"><button onClick="groups.login('{id}'); return false" style="width:200px">Подписаться</button></div>
    <div id="num2">{num-2}</div>
   </div>
   <div id="no" class="{no}" style="text-align:left">

[admin]<a href="/" onClick="groups.editform(); return false"><div class="public_settings_but icon-cog-5" onmouseover="showTooltip(this, {text: 'Управление сообществом', shift:[2,5,0]});"></div></a>
 [/admin]

	Вы подписаны на новости. 
<div class="public_invite_but"><a href="/" onClick="groups.inviteBox('{id}'); return false">Пригласить друзей <span class="icon-user-add"></span></a></div>
    <div style="margin-top:7px"></div>
	<a href="/public{id}" onClick="groups.exit2('{id}', '{viewer-id}'); return false"><center> Отписаться </center></a>
   </div>
   <div class="clear"></div>
  </div>
 <div style="margin-top: 20px;
    background: #fff;
    margin-left: -18px;
    width: 100%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">
  <div class="{no-users}" id="users_block">
   <div class="public_vlock cursor_pointer" onClick="groups.all_people('{id}')">Подписчики</div>
   <div class="public_bg">
    <div class="color777 public_margbut">{num}</div>
	<div class="public_usersblockhidden">{users}</div>
    <div class="clear"></div>
   </div>
  </div>
 </div>
 
 [feedback]<div class="bgprof" style="    margin-top: 1px;
    margin-left: -18px;
    padding-top: 25px;
    padding-bottom: 1px;"><div class="public_vlock cursor_pointer" onClick="groups.allfeedbacklist('{id}')" style="margin-top: -17px;">Контакты [yes][admin]<a href="/public{id}" class="fl_r" onClick="groups.allfeedbacklist('{id}'); return false">ред.</a>[/admin][/yes]</div>
 <div class="public_bg" id="feddbackusers">
  [yes]<div class="color777 public_margbut">{num-feedback}</div>[/yes]
  {feedback-users}
  [no]
<div class="module_body clear_fix">
  <a class="page_module_upload" href="" onClick="groups.addcontact('{id}'); return false" style="padding-left: 25px;">
    <span class="page_contacts_upload_label">Добавить контакты</span>
  </a>
</div>
[/no]
 </div>
 </div>[/feedback]

 <div id="fortoAutoSizeStyle"></div>
</div>
<div class="profiewr">
<div class="bgprof" style="margin-left: -15px;    max-width: 506px;">
 <div id="public_editbg_container">
 <div class="public_editbg_container">
 <div class="fl_l" style="width:470px">
 [admin]<div class="set_status_bg no_display" id="set_status_bg">
  <input type="text" id="status_text" class="status_inp" value="{status-text}" style="width:505px;    height: 18px;" maxlength="255" onKeyPress="if(event.keyCode == 13)gStatus.set('', 1)" />
  <div class="fl_l status_text"><span class="no_status_text [status]no_display[/status]">Введите здесь текст статуса.</span><a href="/" class="yes_status_text [no-status]no_display[/no-status]" onClick="gStatus.set(1, 1); return false">Удалить статус</a></div>
  [status]<div class="button_div_gray fl_r status_but margin_left"><button>Отмена</button></div>[/status]
  <div class="button_div fl_r status_but"><button id="status_but" onClick="gStatus.set('', 1)">Сохранить</button></div>
 </div>[/admin]
 <div class="public_title" id="e_public_title">{title} <onClick="trsn.box()" onMouseover="pageVerifiedTip(this, {text: 'Выбор используемого языка на сайте', shift: [5,5,0]});">{verification}</div>
 <div class="status">
  <div>[admin]<a href="/" id="new_status" onClick="gStatus.open(); return false">[/admin]{status-text}[admin]</a>[/admin]</div>
  [admin]<span id="tellBlockPos"></span>
  <div class="status_tell_friends no_display" style="width:215px">
   <div class="status_str"></div>
   <div class="html_checkbox" id="tell_friends" onClick="myhtml.checkbox(this.id); gStatus.startTellPublic('{id}')">Рассказать подписчикам сообщества</div>
  </div>[/admin]
  [admin]<a href="#" onClick="gStatus.open(); return false" id="status_link" [status]class="no_display"[/status]>установить статус</a>[/admin]
 </div>
  <div class="{descr-css}" id="descr_display"><div class="flpodtext">Описание:</div> <div class="flpodinfo" id="e_descr">{descr}</div></div>
  <div class="flpodtext"> Дата создания:</div> <div class="flpodinfo">{date}</div>
 </div>
 [admin]<div class="public_editbg fl_l no_display" id="edittab1">
  <div class="public_title"></div>
  <div class="public_hr"></div>
  <div class="texta">Название:</div>
   <input type="text" id="title" class="inpst" maxlength="100"  style="width:260px;" value="{title}" />
  <div class="mgclr"></div>
  <div class="texta">Описание:</div>
   <textarea id="descr" class="inpst" style="width:260px;height:80px">{edit-descr}</textarea>
  <div class="mgclr"></div>
  <div class="texta">Адрес страницы:</div>
   <input type="hidden" id="prev_adres_page" class="inpst" maxlength="100"  style="width:260px;" value="{adres}" />
   <input type="text" id="adres_page" class="inpst" maxlength="100"  style="width:260px;" value="{adres}" />
  <div class="mgclr"></div>
  <div class="texta">&nbsp;</div>
   <div class="html_checkbox" id="comments" onClick="myhtml.checkbox(this.id)" style="margin-bottom:8px">Комментарии включены</div>
  <div class="mgclr clear"></div>
  <div class="texta">&nbsp;</div>
   <div class="html_checkbox" id="discussion" onClick="myhtml.checkbox(this.id)" style="margin-bottom:8px">Обсуждения включены</div>
  <div class="mgclr clear"></div>
  <div class="texta">&nbsp;</div>
   <a href="/public{id}" onClick="groups.edittab_admin(); return false">Назначить администраторов &raquo;</a>
  <div class="mgclr"></div>
  <div class="texta">&nbsp;</div>
   <div class="button_div fl_l"><button onClick="groups.saveinfo('{id}'); return false" id="pubInfoSave">Сохранить</button></div>
   <div class="button_div_gray fl_l margin_left"><button onClick="groups.editformClose(); return false">Отмена</button></div>
  <div class="mgclr"></div>
 </div>
 <div class="public_editbg fl_l no_display" id="edittab2">
  <div class="public_title"></div>
  <div class="public_hr"></div>
  <input 
	type="text" 
	placeholder="Введите ссылку на страницу или введите ID страницы пользователя и нажмите Enter" 
	class="videos_input" 
	style="width:512px;    margin-left: -60px;"
	onKeyPress="if(event.keyCode == 13)groups.addadmin('{id}')"
	id="new_admin_id"
   />
  <div class="clear"></div>
  <div style="width:600px" id="admins_tab">{admins}</div>
  <div class="clear"></div>
  <div class="button_div fl_l"><button onClick="groups.editform(); return false" style="    margin-left: -60px;">Назад</button></div>
 </div>[/admin]
 </div>
 </div>
 
 </div>
 
 [discussion]<div class="bgprof" style="margin-left: -15px;    max-width: 506px;"><a href="/forum{id}" onClick="Page.Go(this.href); return false" class="fl_l" style="text-decoration:none"><div class="albtitle" style="border-bottom:0px">{forum-num} <h id="langForum">Нет обсуждений</h></div></a>
[admin]<a href="/forum{id}?act=new" onClick="Page.Go(this.href); return false" class="fl_r {no}" style="color: #ddd;font-size: 13px;font-family: Tahoma, Verdana, Arial, sans-serif, Lucida Sans;font-weight: bold;margin-top: 5px;border-bottom: 0px;">Новая тема</a>[/admin]
 <div class="clear"></div> {thems}<div class="clear"></div> </div>[/discussion]

 
 
 <div class="albtitle" style="     margin-top: 15px;
    margin-left: -15px;
    width: 506px;
    background: #fff;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;"><i class="icon-feather profileicon"></i>{rec-num}</div>
 [admin]<div class="bgprof" style="    margin-top: 0px;
    width: 506px;
    padding-top: 5px;
    margin-left: -15px;"> <div class="newmes" id="wall_tab" style="border-bottom:0px;margin-bottom:-5px">
  <input type="hidden" value="Что у Вас нового?" id="wall_input_text" />
  <input type="text" class="wall_inpst" value="Что у Вас нового?" onMouseDown="wall.form_open(); return false" id="wall_input" style="width: 489px;border: none;padding-top: 11px;line-height: 19px;padding-bottom: 6px;margin-top: -2px;color: rgb(191, 192, 193);font-size: 14px;" />
  <div class="no_display" id="wall_textarea">
   <textarea id="wall_text" class="wall_inpst wall_fast_opened_texta" style="   border: none;border-bottom: 2px solid rgb(86, 124, 164);width:489px"
	onKeyUp="wall.CheckLinkText(this.value)"
	onBlur="wall.CheckLinkText(this.value, 1)"
	onKeyPress="if(event.keyCode == 10 || (event.ctrlKey && event.keyCode == 13)) groups.wall_send('{id}')"
   >
   </textarea>
   <div id="attach_files" class="margin_top_10 no_display"></div>
   <div id="attach_block_lnk" class="no_display clear">
   <div class="attach_link_bg">
    <div align="center" id="loading_att_lnk"><img src="{theme}/images/loading_mini.gif" style="margin-bottom:-2px" /></div>
    <img src="" align="left" id="attatch_link_img" class="no_display cursor_pointer" onClick="wall.UrlNextImg()" />
	<div id="attatch_link_title"></div>
	<div id="attatch_link_descr"></div>
	<div class="clear"></div>
   </div>
   <div class="attach_toolip_but"></div>
   <div class="attach_link_block_ic fl_l"></div><div class="attach_link_block_te"><div class="fl_l">Ссылка: <a href="/" id="attatch_link_url" target="_blank"></a></div><img class="fl_l cursor_pointer" style="margin-top:2px;margin-left:5px" src="{theme}/images/close_a.png" onMouseOver="myhtml.title('1', 'Не прикреплять', 'attach_lnk_')" id="attach_lnk_1" onClick="wall.RemoveAttachLnk()" /></div>
   <input type="hidden" id="attach_lnk_stared" />
   <input type="hidden" id="teck_link_attach" />
   <span id="urlParseImgs" class="no_display"></span>
   </div>
   <div class="clear"></div>
   <div id="attach_block_vote" class="no_display">
   <div class="attach_link_bg">
	<div class="texta">Тема опроса:</div><input type="text" id="vote_title" class="inpst" maxlength="80" value="" style="width:330px;margin-left:5px" 
		onKeyUp="$('#attatch_vote_title').text(this.value)"
	/><div class="mgclr"></div>
	<div class="texta">Варианты ответа:<br /><small><span id="addNewAnswer"><a class="cursor_pointer" onClick="Votes.AddInp()">добавить</a></span> | <span id="addDelAnswer">удалить</span></small></div><input type="text" id="vote_answer_1" class="inpst" maxlength="80" value="" style="width:330px;margin-left:5px" /><div class="mgclr"></div>
	<div class="texta">&nbsp;</div><input type="text" id="vote_answer_2" class="inpst" maxlength="80" value="" style="width:330px;margin-left:5px" /><div class="mgclr"></div>
	<div id="addAnswerInp"></div>
	<div class="clear"></div>
   </div>
   <div class="attach_toolip_but"></div>
   <div class="attach_link_block_ic fl_l"></div><div class="attach_link_block_te"><div class="fl_l">Опрос: <a id="attatch_vote_title" style="text-decoration:none;cursor:default"></a></div><img class="fl_l cursor_pointer" style="margin-top:2px;margin-left:5px" src="{theme}/images/close_a.png" onMouseOver="myhtml.title('1', 'Не прикреплять', 'attach_vote_')" id="attach_vote_1" onClick="Votes.RemoveForAttach()" /></div>
   <input type="hidden" id="answerNum" value="2" />
   </div>
   <div class="clear"></div>
   <input id="vaLattach_files" type="hidden" />
   <div class="clear"></div>
   <div class="button_div fl_r margin_top_10"><button onClick="groups.wall_send('{id}'); return false" id="wall_send">Отправить</button></div>


<div class="post_send_attach fl_l">
<li class="icon-picture-2" onmouseover="showTooltip(this, {text: 'Прикрепить фотографию', shift: [4,7,0]})" onClick="groups.wall_attach_addphoto(0, 0, '{id}')"></li>
<li class="icon-video-1" onmouseover="showTooltip(this, {text: 'Прикрепить видеозапись', shift: [4,7,0]})" onClick="wall.attach_addvideo()"></li>
<li class="icon-music-3" onmouseover="showTooltip(this, {text: 'Прикрепить аудиозапись', shift: [4,7,0]})" onClick="wall.attach_addaudio()"></li>
<li class="icon-doc-6" onmouseover="showTooltip(this, {text: 'Прикрепить документ', shift: [4,7,0]})" onClick="wall.attach_addDoc()"></li>
<li class="icon-chart-bar-3"  onmouseover="showTooltip(this, {text: 'Прикрепить опрос', shift: [4,7,0]})" onClick="$('#attach_block_vote').slideDown('fast');wall.attach_menu('close', 'wall_attach', 'wall_attach_menu');$('#vote_title').focus();$('#vaLattach_files').val($('#vaLattach_files').val()+'vote|start||')"></li>
<div class="clear"></div>
</div>

<div class="html_checkbox" id="podpis" onClick="myhtml.checkbox(this.id);" style="margin-top: 15px;margin-left: 15px;">подпись</div>    

</div>

  </div>
  <div class="clear"></div>
 </div>[/admin]
 <div id="public_wall_records">{records}</div>
 <div class="cursor_pointer {wall-page-display}" onClick="groups.wall_page('{id}'); return false" id="wall_all_records"><div class="public_wall_all_comm" id="load_wall_all_records" style="margin-left:0px">к предыдущим записям</div></div>
 <input type="hidden" id="page_cnt" value="1" />
</div>
<div class="clear"></div>


<style>
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 103px !important;
    word-wrap: break-word;
}
.speedbar {
    background: #FFF;
    padding: 13px;
    color: #567CA4;
    font-size: 13px !important;
    font-weight: 500 !important;
    border-radius: 0;
    background: #fff;
    width: 95%;
    line-height: 17px;
    height: 18px;
    display: none !important;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.speedbar1 {
    padding: 13px;
    margin-left: -14px;
    font-weight: 500 !important;
    color: rgba(96,115,135,0);
    margin-top: -50px;
    margin-top: -53px;
    font-size: 13px !important;
    border-radius: 5px 5px 0 0;
    height: 28px;
}
.status {
    border-bottom: 1px solid #f1f4f7;
    padding-bottom: 8px;
    margin-bottom: 5px;
    padding-top: 5px;
    padding-left: 1px;
    width: 505px;
    word-wrap: break-word;
}
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: none !important;
    background: none !important;
}
.wall_rec_autoresize {
    float: left;
    width: 444px;
    margin-left: 0px;
    background: #fff;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.public_likes_user_block {
    position: absolute;
    z-index: 99999;
    width: 225px;
    color: #FFF;
    cursor: pointer;
    background: rgba(0,0,0,0.7);
    font-weight: bold;
    font-size: 12px;
    font-weight: bold;
    padding: 8px 9px 9px 9px;
    text-shadow: 0 1px 1px rgba(0,0,0,.7);
    padding-right: 0px;
    box-shadow: 1px 0px 5px 0 rgba(0,0,0,.3);
    margin-top: -83px;
    font-family: tahoma,arial,verdana,sans-serif,Lucida Sans;
    margin-left: 348px;
    height: 56px;
    border-radius: 2px;
}
.wall_fast_block {
    margin-left: 46px;
    margin-bottom: 5px;
    border-top: 1px solid #f0f0f0;
    padding-top: 7px;
    width: 444px;
    margin-top: -5px;
    background: #fff;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.public_wall_all_comm {
    padding: 11px;
    text-align: center;
    margin-top: -4px;
    margin-bottom: 6px;
    width: 436px;
    margin-left: 46px;
    background: #f0f2f5;
    color: #21578b;
}
</style>