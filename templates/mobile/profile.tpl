<script type="text/javascript" src="/templates/mobile/js/profile.js"></script>
<div style="padding:10px;margin-top: -5px;  min-height: 75px;background: #f5f5f5;"><a href="/u{user-id}"><img src="{ava}" id="ava" align="left" width="75" height="75" style="margin-right:10px" />{name} {lastname} {verification}</b></a> {online}<br />
<div style="font-size:11px;margin-bottom:2px;margin-top:2px" id="new_status">{status-text}</div>
<div style="font-size:11px">{city}</div>

<div class="clr"></div>
<div class="clr"></div>
<center>
[not-owner][blacklist][privacy-msg]<button class="button" onClick="messages.new_({user-id}); return false" style="width:48%">Написать</button>[/privacy-msg][/blacklist]
[no-friends][blacklist]<button class="button" onClick="friends.add({user-id}); return false" style="width:48%;margin-top:10px">Добавить в друзья</button>[/blacklist][/no-friends]
[yes-friends]<button class="button" onClick="friends.goDelte({user-id}); return false" style="width:48%;margin-top:10px">Убрать из друзей</button>[/yes-friends][/not-owner]
</center></div>
[owner]<div class="profbloctitl">Статус</div>
<input type="text" class="inp" style="margin:10px 10px 0px 10px" id="status_text" placeholder="Введите здесь текст Вашего статуса.." />
<button id="status_but" style="margin:10px" class="button" onClick="gStatus.set()">Сохранить</button>
<a href="/" class="yes_status_text [no-status]no_display[/no-status]" onClick="gStatus.set(1); return false">Удалить</a>[/owner]

[privacy-info]<div class="profbloctitl">Информация</div>
<div style="padding-top: 10px;
  font-size: 12px;
  padding-left: 15px;">
[not-all-birthday]<div style="margin-bottom:10px">День рождения: {birth-day}</div>[/not-all-birthday]
[sp]<div style="margin-bottom:10px">Семейное положение: {sp}</div>[/sp]
[not-contact-phone]<div style="margin-bottom:10px">Моб. телефон: {phone}</div>[/not-contact-phone]
</div>[/privacy-info]
<div class="profbloctitl">Действия</div>
<div class="profii">
 [not-owner]<a href="/" onClick="gifts.box('{user-id}'); return false">Отправить подарок</a>
 [no-fave]<a href="/" onClick="fave.add({user-id}); return false" id="addfave_but"><b id="text_add_fave">Добавить в закладки</b></a>[/no-fave]
 [yes-fave]<a href="/" onClick="fave.delet({user-id}); return false" id="addfave_but"><b id="text_add_fave">Удалить из закладок</b></a>[/yes-fave]
 [no-subscription]<a href="/" onClick="subscriptions.add({user-id}); return false" id="lnk_unsubscription"><b id="text_add_subscription">Подписаться на обновления</b></a>[/no-subscription]
 [yes-subscription]<a href="/" onClick="subscriptions.del({user-id}); return false" id="lnk_unsubscription"><b id="text_add_subscription">Отписаться от обновлений</b></a>[/yes-subscription][/not-owner]
 [owner]<a href="/editmypage">Редактировать страницу</a>
<a onclick="Profile.LoadPhoto();">Загрузить фотографию</a>

 <a href="/" onClick="Profile.DelPhoto(); return false;" {display-ava}>Удалить фотографию</a>[/owner]
 <div class="profbloctitl" style="margin-top:-1px">Другое</div>
 [friends]<a href="/friends/{user-id}">Друзья <span>{friends-num}</span></a>[/friends]
 [online-friends]<a href="/friends/online/{user-id}">Друзья на сайте <span>{online-friends-num}</span></a>[/online-friends]
 [subscriptions]<a href="/" onClick="subscriptions.all({user-id}, '', {subscriptions-num}); return false">Интересные люди <span>{subscriptions-num}</span></a>[/subscriptions]
 [groups]<a href="/" onClick="groups.all_groups_user('{user-id}'); return false">Интересные страницы <span id="groups_num">{groups-num}</span></a>[/groups]
 [gifts]<a href="/gifts{user-id}">Подарки <span>{gifts-text}</span></a>[/gifts]
</div>
<div class="profbloctitl" style="margin-top:-1px">Стена <span id="wall_rec_num">{wall-rec-num}</span></div>
<div class="wallformbg">
<textarea id="wall_text" class="wall_fast_text inp" placeholder="[owner]Что у Вас нового?[/owner][not-owner]Написать сообщение...[/not-owner]"></textarea>
<button class="button" onClick="wall.send({user-id}); return false" id="wall_send">Отправить</button>
 <div id="attach_files" class="margin_top_10 no_display"></div>
  <input id="vaLattach_files" type="hidden" />
   <div class="clear"></div>
<div class="fl_r" style="
    margin-top: -42px;
">
<div class="wall_attach_icon_photo fl_l" id="wall_attach_link" onClick="wall.attach_addphoto()"></div>
    <div class="wall_attach_icon_doc fl_l" id="wall_attach_link" onClick="wall.attach_addDoc()"></div>
<div class="wall_attach_icon_video fl_l" id="wall_attach_link" onClick="wall.attach_addvideo()"></div>
  <div class="wall_attach_icon_audio fl_l" id="wall_attach_link" onClick="wall.attach_addaudio()"></div>
</div>
</div>
<div id="wall_records">{records}[no-records]<div class="wall_none" [privacy-wall]style="border-top:0px"[/privacy-wall]>На стене пока нет ни одной записи.</div>[/no-records]</div>
[wall-link]<span id="wall_all_record"></span><div onClick="wall.page('{user-id}'); return false" id="wall_l_href" class="cursor_pointer"><div class="photo_all_comm_bg wall_upgwi" id="wall_link">к предыдущим записям</div></div>[/wall-link]