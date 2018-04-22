<script type="text/javascript">[after-reg]Profile.LoadPhoto();[/after-reg]
var startResizeCss = false;
var user_id = '{user-id}';
$(document).ready(function(){
	$(window).scroll(function(){
		if($('#type_page').val() == 'profile'){
			if($(document).height() - $(window).height() <= $(window).scrollTop()+($(document).height()/2-250)){
				wall.page(user_id);
			}
			if($(window).scrollTop() < $('#fortoAutoSizeStyleProfile').offset().top){
				startResizeCss = false;
				$('#addStyleClass').remove();
			}
			if($(window).scrollTop() > $('#fortoAutoSizeStyleProfile').offset().top && !startResizeCss){
				startResizeCss = true;
				$('body').append('<div id="addStyleClass"><style type="text/css" media="all">.profile_wall_attach_photo img {     max-width: 525px;   max-height: 525px;    margin: 3px 10px 10px 0;}.wallrecord{width:655px;margin-left:-61px}.infowalltext_f{font-size:11px}.wall_inpst{width:673px !important}.public_likes_user_block{margin-left:607px}.wall_fast_opened_form{width:688px !important;margin-left:-157px}.wall_fast_block{width:688px;margin-top:-4px;margin-left:-157px}.public_wall_all_comm{width:695px;margin-top:0px;margin-bottom:7px}.player_mini_mbar_wall{width:710px;margin-bottom:0px}#audioForSize{min-width:700px}.wall_rec_autoresize{width:530px}.wall_fast_ava img{width:50px}.wall_fast_ava{width:60px}.wall_fast_comment_text{margin-left:57px}.wall_fast_date{margin-left:57px;font-size:11px}.public_wall_all_comm{margin-left:-158px}.size10{font-size:11px}</style></div>');
			}
		}
	});
	music.jPlayerInc();
	$('#wall_text, .fast_form_width').autoResize();
	[owner]if($('.profile_onefriend_happy').size() > 4) $('#happyAllLnk').show();
	ajaxUpload = new AjaxUpload('upload_cover', {
		action: '/index.php?go=editprofile&act=upload_cover',
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
				cover.init('/uploads/users/'+row[0], rheihht);
				$('.cover_addut_edit').attr('onClick', 'cover.startedit(\'/uploads/users/'+row[0]+'\', '+rheihht+')');
			}
		}
	});[/owner]
});
$(document).click(function(event){
	wall.event(event);
});
</script>

<input type="hidden" id="type_page" value="profile" />
<input id="fid" value="{user-id}" type="hidden" />
<style>.newcolor000{color:#000}</style>
<div id="jquery_jplayer"></div>
<input type="hidden" id="teck_id" value="" />
<input type="hidden" id="teck_prefix" value="" />
<input type="hidden" id="typePlay" value="standart" />
<div class="speedbar1 [speedbar]no_display[/speedbar]" id="speedbar">{name} {lastname} {verification}</div>
[not-owner][cover]<div class="cover_all_user"><img src="{cover}" width="800" id="cover_img" {cover-param-5} /></div>[/cover][/not-owner]
<div class="ava" >
   
    <div class="bgprof" style="    margin-left: -31px;
    margin-top: 3px;">
    <div id="owner_photo_wrap">
   [owner] <div id="owner_photo_top_bubble_wrap">
  <div id="owner_photo_top_bubble">
    <div class="owner_photo_bubble_delete_wrap"onClick="Profile.DelPhoto(); $('.profileMenu').hide(); return false;" id="del_pho_but" {display-ava}>
	 <div class="owner_photo_bubble_delete"></div>
    </div>
  </div>
</div><div class="cover_newava" {cover-param-7}>[/owner][not-owner]<div class="[cover]cover_newava[/cover]" [cover]{cover-param-7}[/cover]>[/not-owner]
  <div id="page_avatar"><a id="profile_photo_link"> <a href=""onclick="Photo.Profile('{user-id}','{user-ph}');return false;"><span id="ava"><img src="{ava}" alt="" title="" id="ava_{user-id}" /></span></a></div>


</div></div>


<div class="menuleft" style="margin-top:5px">
[owner]
<a href="/docs" onClick="Page.Go(this.href); return false;"><div class="icon icon-cloud-7" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div>{translate=lang_835}</div></a>
<a href="/editmypage" onClick="Page.Go(this.href); return false;"><div class="icon icon-edit" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div>{translate=strred}</div></a>
<a href="/" onClick="Profile.LoadPhoto(); return false;"><div class="icon-camera-7" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div>{translate=lang_837}</div></a>
<a href="/" onClick="Profile.DelPhoto(); return false;" id="del_pho_but" {display-ava}><div class="icon-cancel-5" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div>{translate=lang_839}</div></a>[/owner]
[not-owner][blacklist][privacy-msg]<a href="/" onClick="messages.new_({user-id}); return false"><div class="icon icon-mail-6" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div>{translate=lang_840}</div></a>[/privacy-msg][/blacklist]
[no-friends][blacklist]<a href="/" onClick="friends.add({user-id}); return false"><div class="icon icon-user-add profile_friend_but" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div>{translate=lang_841}</div></a>[/blacklist][/no-friends]
[yes-friends]<a href="/" onClick="friends.delet({user-id}, 1); return false"><div class="icon icon-cancel-3" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div>{translate=lang_842}</div></a>[/yes-friends]
[blacklist][no-subscription]<a href="/" onClick="subscriptions.add({user-id}); return false" id="lnk_unsubscription"><div class="icon icon-ok-circled" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div><span id="text_add_subscription">{translate=lang_843}</span> <img src="/templates/Default/images/loading_mini.gif" alt="" id="addsubscription_load" class="no_display" style="margin-right:-13px" /></div></a>[/no-subscription][/blacklist]
[yes-subscription]<a href="/" onClick="subscriptions.del({user-id}); return false" id="lnk_unsubscription"><div class="icon icon-cancel-circled" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div><span id="text_add_subscription">{translate=lang_844}</span> <img src="/templates/Default/images/loading_mini.gif" alt="" id="addsubscription_load" class="no_display" style="margin-right:-13px" /></div></a>[/yes-subscription]
<a href="/" onClick="gifts.box('{user-id}'); return false"><div class="icon icon-gift-1" style="font-size: 19px;padding-left: 6px;width: 23px;float: left;margin-left: -7px;margin-top: -3px;color: #507098;"></div><div>{translate=lang_845}</div></a>
[no-fave]<a href="/" onClick="fave.add({user-id}); return false" id="addfave_but"><div class="icon icon-star" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div><span id="text_add_fave">{translate=lang_846}</span> <img src="/templates/Default/images/loading_mini.gif" alt="" id="addfave_load" class="no_display" /></div></a>[/no-fave]
[yes-fave]<a href="/" onClick="fave.delet({user-id}); return false" id="addfave_but"><div class="icon icon-star-empty" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div><span id="text_add_fave">{translate=lang_847}</span> <img src="/templates/Default/images/loading_mini.gif" alt="" id="addfave_load" class="no_display" /></div></a>[/yes-fave]
[no-blacklist]<a href="/" onClick="settings.addblacklist({user-id}); return false" id="addblacklist_but"><div class="icon icon-roadblock" style="font-size: 19px;padding-left: 6px;width: 25px;float: left;margin-left: -7px;margin-top: -3px;color: #607387;"></div><div><span id="text_add_blacklist">{translate=lang_848}</span> <img src="/templates/Default/images/loading_mini.gif" alt="" id="addblacklist_load" class="no_display" /></div></a>[/no-blacklist]
[yes-blacklist]<a href="/" onClick="settings.delblacklist({user-id}, 1); return false" id="addblacklist_but"><div class="icon icon-ok-circle-1" style="font-size: 19px;padding-left: 6px;width: 23px;float: left;margin-left: -7px;margin-top: -3px;color: #507098;"></div><div><span id="text_add_blacklist">{translate=lang_849}</span> <img src="/templates/Default/images/loading_mini.gif" alt="" id="addblacklist_load" class="no_display" /></div></a>[/yes-blacklist]
[/not-owner]
</div>




[owner]
[all-rate]
<div style="margin-top:12px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:0px;">
<tr>
<td style="background-color: #F1F1F1;height: 26px;cursor: pointer;" valign="middle" align="left">
<div style="position:absolute; float:right; overflow:visible;color: #8BA1BC; width:200px;cursor: pointer !important;text-align:center;line-height: 15px;margin-top: 6px;cursor: default;">{rates}%</div>
<table width="{rates}%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td style="background-color: #DEE5EB; color: #8BA1BC; font-weight:bold;height: 26px;" valign="middle" align="right"></td>
</tr>
</table>
 </td>
</tr>
<tr><td height=7px></td></tr>
</table>
</div>

[all-foto]<div class="menuleft"><a onclick="Profile.LoadPhoto(); $('.profileMenu').hide(); return false;" class="cursor_pointer">{translate=menuleftpr1} <div style="float:right;color: #8BA1BC;margin-top: -1px;font-size: 11px;">+40%</div></a></div>[/all-foto]

[all-country2]<div class="menuleft"><a href="/editmypage" onclick="Page.Go(this.href); return false;" class="cursor_pointer">{translate=menuleftpr2} <div style="float:right;color: #8BA1BC;margin-top: -1px;font-size: 11px;">+15%</div></a></div>[/all-country2]

[all-city2]<div class="menuleft"><a href="/editmypage" onclick="Page.Go(this.href); return false;" class="cursor_pointer">{translate=menuleftpr3} <div style="float:right;color: #8BA1BC;margin-top: -1px;font-size: 11px;">+15%</div></a></div>[/all-city2]

[all-contact]<div class="menuleft"><a href="/editmypage/contact" onclick="Page.Go(this.href); return false;" class="cursor_pointer">{translate=menuleftpr4} <div style="float:right;color: #8BA1BC;margin-top: -1px;font-size: 11px;">+10%</div></a></div>[/all-contact]

[all-interes]<div class="menuleft"><a href="/editmypage/interests" onclick="Page.Go(this.href); return false;" class="cursor_pointer">{translate=menuleftpr5} <div style="float:right;color: #8BA1BC;margin-top: -1px;font-size: 11px;">+20%</div></a></div>[/all-interes]
<div class="clear"></div>
[/all-rate]
[/owner]

</div>



[blacklist]<div class="leftcbor">
 [owner][happy-friends]<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><div id="happyBLockSess"><div class="albtitle">{translate=lang_850} <span>{happy-friends-num}</span><div class="profile_happy_hide"><img src="{theme}/images/hide_lef.gif" onMouseOver="myhtml.title('1', 'Скрыть', 'happy_block_')" id="happy_block_1" onClick="HappyFr.HideSess(); return false" /></div></div>
 <div class="newmesnobg profile_block_happy_friends" style="padding:0px;padding-top:10px;">{happy-friends}<div class="clear"></div></div>
 <div class="cursor_pointer no_display" onMouseDown="HappyFr.Show(); return false" id="happyAllLnk"><div class="public_wall_all_comm profile_block_happy_friends_lnk">Показать все</div></div></div>
 </div>[/happy-friends][/owner]


 [friends]<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><a href="#" style="text-decoration:none"><div class="albtitle"><g onClick="Page.Go('/friends/{user-id}'); return false">{translate=lang_854} <span>{friends-num}</span></g> [online-friends]<g class="fl_r" onClick="Page.Go('/friends/online/{user-id}'); return false" style="margin-top:0px; margin-right:5px;">{translate=lang_vsetionl} <span>{online-friends-num}</span></g> [/online-friends]</div></a>
 <div class="newmesnobg" style="padding:0px;padding-top:10px;margin-left: -2px;">{friends}<div class="mgclr"></div>
 </div></div>[/friends]


[owner]

[friends_pod]
<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><a href="/?go=search&query=&type=1" onClick="Page.Go(this.href); return false" style="text-decoration:none"><div class="albtitle">{translate=lang_854} </div></a> 
<br>	
<a href="/?go=search&query=&type=1" onclick="Page.Go(this.href); return false;" class="no_line"><div class="block_not_cont"><i class="icon-users-1"></i> <br>Добавьте друзей <br> и просматривайте их обновления.</div></a>
</div>[/friends_pod]
[/owner]

 [subscriptions]<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><a href="/" onClick="subscriptions.all({user-id}, '', {subscriptions-num}); return false" style="text-decoration:none"><div class="albtitle">{translate=lang_846interes} <span>{subscriptions-num}</span></div></a>
 <div class="newmesnobg" style="padding-right:0px;padding-bottom:0px;">{subscriptions}<div class="clear"></div>
 </div></div>[/subscriptions]

 [groups]<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><div class="albtitle cursor_pointer" onClick="groups.all_groups_user('{user-id}')">{translate=lang_857} <span id="groups_num">{groups-num}</span></div>
 <div class="newmesnobg" style="padding-right:0px;padding-bottom:0px;">{groups}<div class="clear"></div>
 </div></div>[/groups]

[owner][public_pod]
<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><a href="/?go=search&type=4&query=" onClick="Page.Go(this.href); return false" style="text-decoration:none"><div class="albtitle" style="margin-top:5px">{translate=lang_857} <div></div></div></a>
<br>
<a href="/?go=search&type=4&query=" onclick="Page.Go(this.href); return false;" class="no_line"><div class="block_not_cont"><i class="icon-users-2"></i> <br>Подписывайтесь на интересные сообщества.</div></a>
</div>[/public_pod][/owner]

 [albums]<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><br><a href="/albums/{user-id}" onClick="Page.Go(this.href); return false" style="text-decoration:none"><div class="albtitle" style="margin-top:-13px">{translate=lang_890} <span>{albums-num}</span><div></div></div>{albums}</a><div class="clear"></div><br></div>[/albums]

 [videos]<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><a href="/videos/{user-id}" onClick="Page.Go(this.href); return false" style="text-decoration:none"><div class="albtitle">{translate=lang_858} <span>{videos-num}</span></div></a>
 <div class="newmesnobg" style="padding-right:0px;padding-bottom:0px;">{videos}<div class="clear"></div>
 </div></div>[/videos]


[owner][videos_pod]	
<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><a href="/videos/{user-id}" onClick="Page.Go(this.href); return false" style="text-decoration:none"><div class="albtitle" style="margin-top: 8px;">{translate=lang_858} </div></a> 
<br>	
<a href="/videos" onclick="Page.Go(this.href); return false;" class="no_line"><div class="block_not_cont"><i class="icon-video-1"></i> <br>Добавляйте интересные <br> Вам видеозаписи.</div></a>
</div>[/videos_pod][/owner] 



 [notes]<div class="bgprof" style="    margin-left: -31px;
    padding-top: 8px;
    margin-top: 17px;"><a href="/notes/{user-id}" onClick="Page.Go(this.href); return false" style="text-decoration:none"><div class="albtitle">Заметки <span>{notes-num}</span></div></a>
 <div class="newmesnobg" style="padding-right:0px;padding-left:5px">{notes}<div class="clear"></div>
 </div></div>[/notes]
<div class="clear"></div>
<span id="fortoAutoSizeStyleProfile"></span>
</div>[/blacklist]
</div>
<div class="profiewr">
 [owner]<div class="set_status_bg no_display" id="set_status_bg">
  <input type="text" id="status_text" class="status_inp" value="{status-text}" style="width:529px;    height: 17px;" maxlength="255" onKeyPress="if(event.keyCode == 13)gStatus.set()" />
  <div class="fl_l status_text"><span class="no_status_text [status]no_display[/status]">Введите здесь текст Вашего статуса.</span><a href="/" class="yes_status_text [no-status]no_display[/no-status]" onClick="gStatus.set(1); return false" style="    position: initial;
    line-height: 26px;
    font-size: 13px;
    margin-left: 3px;">Удалить статус</a></div>
  [status]<div class="button_div_gray fl_r status_but margin_left"><button>Отмена</button></div>[/status]
  <div class="button_div fl_r status_but"><button id="status_but" onClick="gStatus.set()">Сохранить</button></div>
 </div>[/owner]

 <div class="bgprof">
<div class="titleu" style="    font-size: 13px;
    font-weight: bold;
    color: #567ca4;"> {name} {lastname} {verification}<div class="online_time" style="    margin-top: -10pxpx;    margin-right: -3px;">{online}</div></div>
 <div class="status">
  <div>[owner]<a href="/" id="new_status" onClick="gStatus.open(); return false">[/owner][blacklist]{status-text}[/blacklist][owner]</a>[/owner]</div>
  [owner]<span id="tellBlockPos"></span>
  <div class="status_tell_friends no_display">
   <div class="status_str"></div>
   <div class="html_checkbox" id="tell_friends" onClick="myhtml.checkbox(this.id); gStatus.startTell()">Рассказать друзьям</div>
  </div>[/owner]
  [owner]<a href="#" onClick="gStatus.open(); return false" id="status_link" [status]class="no_display"[/status]>установить статус</a>[/owner]
 </div>
 [not-all-country]<div class="flpodtext"> {translate=lang_868}</div> <div class="flpodinfo"><a href="/?go=search&country={country-id}" onClick="Page.Go(this.href); return false">{country}</a></div>[/not-all-country]
 [not-all-city]<div class="flpodtext"> {translate=lang_869}</div> <div class="flpodinfo"><a href="/?go=search&country={country-id}&city={city-id}" onClick="Page.Go(this.href); return false">{city}</a></div>[/not-all-city]
 [blacklist][not-all-birthday]<div class="flpodtext"> {translate=lang_870}</div> <div class="flpodinfo">{birth-day}</div>[/not-all-birthday]
 [privacy-info][sp]<div class="flpodtext"> {translate=lang_871}</div> <div class="flpodinfo">{sp}</div>[/sp][/privacy-info]
[privacy-info]<div class="cursor_pointer" onClick="Profile.MoreInfo(); return false" id="moreInfoLnk"><div class="public_wall_all_comm profile_hide_opne" id="moreInfoText">{translate=lang_872}</div></div>[/privacy-info]

 <div id="moreInfo" class="no_display">
 [privacy-info][not-block-contact] <br><div class="profile_inf_title"><div class="w2_a" [owner]style="width:230px;"[/owner]>{translate=lang_873} [owner]<span><a href="/editmypage/contact" onClick="Page.Go(this.href); return false;"><div class="redprof" style="color: #607387;float: right;width: 30px;border-left: 1px solid #8da3bd;margin-top: 0px;padding-left: 8px;height: 17px;margin-right: 35px;font-size: 15px;">ред.</div></a></span>[/owner]</div></div>
 [not-contact-phone]<div class="flpodtext"> {translate=lang_875}</div> <div class="flpodinfo">{phone}</div>[/not-contact-phone]
 [not-contact-vk]<div class="flpodtext"> {translate=lang_876}</div> <div class="flpodinfo">{vk}</div>[/not-contact-vk]
 [not-contact-od]<div class="flpodtext"> {translate=lang_877}</div> <div class="flpodinfo">{od}</div>[/not-contact-od]
 [not-contact-fb]<div class="flpodtext"> Facebook:</div> <div class="flpodinfo">{fb}</div>[/not-contact-fb]
[not-contact-icq]<div class="flpodtext"> icq:</div> <div class="flpodinfo"><a href="/?go=search&mesto=1" onClick="Page.Go(this.href); return false">{icq}</a></div>[/not-contact-icq]
 [not-contact-skype]<div class="flpodtext"> Skype:</div> <div class="flpodinfo"><a href="skype:{skype}">{skype}</a></div>[/not-contact-skype]
 [not-contact-site]<div class="flpodtext"> {translate=lang_879}</div> <div class="flpodinfo">{site}</div>[/not-contact-site][/not-block-contact]
 <br><div class="profile_inf_title"><div class="w2_" [owner]style="width:200px;"[/owner]>{translate=lang_880} [owner]<span><a href="/editmypage/interests" onClick="Page.Go(this.href); return false;"><div class="redprof" style="color: #607387;float: right;width: 30px;border-left: 1px solid #8da3bd;margin-top: 0px;padding-left: 8px;height: 17px;margin-right: 29px;font-size: 15px;">ред.</div></a></span>[/owner]</div></div>{not-block-info}

 [not-info-activity]<div class="flpodtext"> {translate=lang_882}</div> <div class="flpodinfo">{activity}</div>[/not-info-activity]
 [not-info-interests]<div class="flpodtext"> {translate=lang_883}</div> <div class="flpodinfo">{interests}</div>[/not-info-interests]
 [not-info-music]<div class="flpodtext"> {translate=lang_884}</div> <div class="flpodinfo">{music}</div>[/not-info-music]
 [not-info-kino]<div class="flpodtext"> {translate=lang_885}</div> <div class="flpodinfo">{kino}</div>[/not-info-kino]
 [not-info-books]<div class="flpodtext"> {translate=lang_886}</div> <div class="flpodinfo">{books}</div>[/not-info-books]
 [not-info-games]<div class="flpodtext"> {translate=lang_887}</div> <div class="flpodinfo">{games}</div>[/not-info-games]
 [not-info-quote]<div class="flpodtext"> {translate=lang_888}</div> <div class="flpodinfo">{quote}</div>[/not-info-quote]
 [not-info-myinfo]<div class="flpodtext"> {translate=lang_889}</div> <div class="flpodinfo">{myinfo}</div>[/not-info-myinfo][/privacy-info]
</div>
</div>

<br>
 [gifts]<div class="bgprof" style="padding-top: 2px;"><a href="/gifts{user-id}" onClick="gifts.browse({user-id}); return false" style="text-decoration:none"><div class="albtitle" style="margin-top:5px;font-size: 14px;      color: #525559;"><i class="icon-gift profileicon"></i>&nbsp; {gifts-text}<div></div></div><center>{gifts}</center><div class="clear"></div></a></div>[/gifts]
[audios] <div class="bgprof" style="padding-top: 2px;margin-top: 0px;"><div id="jquery_jplayer"></div><input type="hidden" id="teck_id" value="1" /><a href="/audio{user-id}" onClick="Page.Go(this.href); return false" style="text-decoration:none"><div class="albtitle" style="margin-top:5px;font-size: 14px;      color: #525559;"><i class="icon-music-3 profileicon"></i>&nbsp; {audios-num}<div></div></div></a>{audios}<div class="clear"></div></div>[/audios]
<a href="/wall{user-id}" onClick="Page.Go(this.href); return false" style="text-decoration:none"><div class="albtitle" style="border-bottom: none;background: #fff;width: 100%;margin-top: 18px;padding: 14px;box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;"><i class="icon-feather profileicon"></i>&nbsp; {translate=lang_892} <span id="wall_rec_num">{wall-rec-num}</span></div></a>
 [privacy-wall] <div class="bgprof" style="    padding-top: 5px;
    margin-top: 1px;"><div class="newmes" id="wall_tab" style="border-bottom:0px;margin-bottom:-5px">
  <input type="hidden" value="[owner]{translate=lang_893}[/owner][not-owner]{translate=lang_894}[/not-owner]" id="wall_input_text" />
  <input type="text" class="wall_inpst" value="[owner]{translate=lang_893}[/owner][not-owner]{translate=lang_894}[/not-owner]" onMouseDown="wall.form_open(); return false" id="wall_input" style="width: 503px; border: none; padding-top: 11px; line-height: 19px; padding-bottom: 6px; margin-top: -2px; color: rgb(191, 192, 193); font-size: 14px;" />
  <div class="no_display" id="wall_textarea">
   <textarea id="wall_text" class="wall_inpst wall_fast_opened_texta" [not-owner]placeholder="Написать сообщение..."[/not-owner] [owner]placeholder="Что у Вас нового?"[/owner] style="    border: none;border-bottom: 2px solid rgb(86, 124, 164);width:503px"
	onKeyUp="wall.CheckLinkText(this.value)"
	onBlur="wall.CheckLinkText(this.value, 1)"
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
   <div class="button_div fl_r margin_top_10"><button onClick="wall.send(); return false" id="wall_send">Опубликовать</button></div>



<div class="post_send_attach fl_l">
<li class="icon-picture-2" onmouseover="showTooltip(this, {text: 'Прикрепить фотографию', shift: [4,7,0]})" onclick="wall.attach_addphoto()"></li>
<li class="icon-video-1" onmouseover="showTooltip(this, {text: 'Прикрепить видеозапись', shift: [4,7,0]})" onClick="wall.attach_addvideo()"></li>
<li class="icon-music-3" onmouseover="showTooltip(this, {text: 'Прикрепить аудиозапись', shift: [4,7,0]})" onClick="wall.attach_addaudio()"></li>
<li class="icon-doc-6" onmouseover="showTooltip(this, {text: 'Прикрепить документ', shift: [4,7,0]})" onClick="wall.attach_addDoc()"></li>
<li class="icon-chart-bar-3" onmouseover="showTooltip(this, {text: 'Прикрепить опрос', shift: [4,7,0]})" onClick="$('#attach_block_vote').slideDown('fast');wall.attach_menu('close', 'wall_attach', 'wall_attach_menu');$('#vote_title').focus();$('#vaLattach_files').val($('#vaLattach_files').val()+'vote|start||')"></li>
<div class="clear"></div>
</div>


  </div>
  <div class="clear"></div>
 </div> </div>[/privacy-wall]
 <div id="wall_records">{records}[no-records]<div class="wall_none" [privacy-wall]style="border-top:0px"[/privacy-wall]>На стене пока нет ни одной записи.</div>[/no-records]</div>
 [wall-link]<span id="wall_all_record"></span><div onClick="wall.page('{user-id}'); return false" id="wall_l_href" class="cursor_pointer"><div class="photo_all_comm_bg wall_upgwi" id="wall_link">к предыдущим записям</div></div>[/wall-link][/blacklist]
 [not-blacklist]<div class="err_yellow" style="font-weight:normal;margin-top:5px">{name} ограничила доступ к своей странице.</div>[/not-blacklist]
</div>
<div class="clear"></div>

<style>
.speedbar{    background: #FFF;
    padding: 13px;
    margin-left: 190px;
    color: #567CA4;
    display: none !important;
    background: none;
    font-size: 13px !important;
    border-radius: 0px !important;
    font-weight: 500 !important;
    width: 791px;
    padding: 14px;
    box-shadow: none;
}
.wall_upgwi {
    color: #21578b;
    width: 540px;
    display: none;
    border-top: 1px solid #e0eaef;
}
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: none !important;
    background: none !important;
}
.err_yellow {
    padding: 10px;
    background: rgba(203, 80, 71, 0.18);
    margin-bottom: -4px;
    color: #45688e;
    line-height: 160%;
	border: none !important;
}
</style>