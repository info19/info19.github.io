<div id="photo_view_{id}" class="photo_view" onClick="Photo.setEvent(event, '{close-link}')">
<div class="photo_close" onClick="Photo.Close('{close-link}'); return false;"></div>
 <div class="photo_bg">
  <div class="photo_com_title">[all]Фотография {jid} из {photo-num}[/all][wall]Просмотр фотографии[/wall]<div></div></div><div class="photo_descr clear"> <div id="photo_descr_{id}">{descr}</div>Добавлена {date}</div>
  [all]<a href="/photo{uid}_{prev-id}{section}" onClick="Photo.Show(this.href); return false"><div class="photo_prev_but"></div></a>
  <a href="/photo{uid}_{next-id}{section}" onClick="Photo.Show(this.href); return false"></a>[/all]
  [mark-block]<div class="mark_userid_bg" id="mark_userid_bg{id}">
   <div class="fl_l"><a href="/u{mark-user-id}" onClick="Page.Go(this.href); return false">{mark-user-name}</a> {mark-gram-text} Вас на этой фотографии.</a></div>
   <div class="button_div_gray margin_left fl_r" style="margin-top:-5px"><button onClick="{mark-del-link}; return false">Удалить отметку</button></div>
   <div class="button_div fl_r" style="margin-top:-5px"><button onClick="Distinguish.OkUser({id}); return false">Потвердить</button></div>
   <div class="clear"></div>
  </div>[/mark-block]
  <div class="big_like" style="z-index:99999" onClick="{like-js-function}" groups.wall_like_users_five('{rec-id}></div>
   <div id="distinguishSettings{id}" class="distinguishSettings" style="display:none" onMouseOver="Distinguish.HideTag({id})">
	<div style="position:absolute;border-right:3px solid #dbe6f0;cursor:default" id="distinguishSettingsBorder_left{id}"></div>
	<div style="position:absolute;border-bottom:3px solid #dbe6f0;cursor:default" id="distinguishSettingsBorder_top{id}"></div>
	<div style="position:absolute;border-left:3px solid #dbe6f0;cursor:default" id="distinguishSettingsBorder_right{id}"></div>
	<div style="position:absolute;border-top:3px solid #dbe6f0;cursor:default" id="distinguishSettingsBorder_bottom{id}"></div>
    <div style="position:absolute;cursor:default" class="imgareaselect-outer" id="distinguishSettings_left{id}"></div>
	<div style="position:absolute;cursor:default" class="imgareaselect-outer" id="distinguishSettings_top{id}"></div>
	<div style="position:absolute;cursor:default" class="imgareaselect-outer" id="distinguishSettings_right{id}"></div>
	<div style="position:absolute;cursor:default" class="imgareaselect-outer" id="distinguishSettings_bottom{id}"></div>
   </div>
   <a href="/photo{uid}_{next-id}{section}" onClick="[all]Photo.Show(this.href)[/all][wall]Photo.Close('{close-link}')[/wall]; return false" id="photo_href"><div class="photo_img_box"><img id="ladybug_ant{id}" class="ladybug_ant" src="{photo}" alt="" /><div id="frameedito{id}"></div></a></div>
  <div class="clear"></div>
  <div id="save_crop_text{id}" class="save_crop_text no_display">
   Укажите область, которая будет сохранена как фотография Вашей страницы.
   <div class="button_div_gray margin_left fl_r" style="margin-top:-5px"><button onClick="crop.close({id}); return false">Отмена</button></div>
   <div class="button_div fl_r" style="margin-top:-5px"><button onClick="crop.save({id}, {uid}); return false">Готово</button></div>
  </div>
<div style="
    background-color: rgb(34, 33, 33);
    height: 50px;
display:none;
    width: 742px;
"></div>
  <div id="pinfo_{id}" class="pinfo">
  <div class="photo_leftcol">

   <input type="hidden" id="i_left{id}" />
   <input type="hidden" id="i_top{id}" />
   <input type="hidden" id="i_width{id}" />
   <input type="hidden" id="i_height{id}" />
  

   <div class="peoples_on_this_photos" id="peoples_on_this_photos{id}">{mark-peoples}</div>
 
   [all-comm]
<div class="cursor_pointer" onClick="comments.all({id}, {num})" id="all_href_lnk_comm_{id}" style="
    margin-right: -150px;
    margin-left: 125px;margin-bottom: 20px;
"><div class="public_wall_all_comm" id="all_lnk_comm_{id}" style="margin-left:20px">Показать предыдущие {comm_num}</div></div>
<span id="all_comments_{id}"></span>
[/all-comm]

   <span id="comments_{id}">{comments}</span>
   [add-comm]
   <textarea id="textcom_{id}" class="photo_comm inpst" style="  width: 100% !important;height: 40px;margin-bottom: 10px;margin-top: 13px;border-radius: 2px;"></textarea>
   <div class="button_div fl_l" style="margin-left: 30%;"><button id="add_comm" onClick="comments.add({id}); return false">Отправить</button></div>[/add-comm]
   </div>
  <div class="photo_rightcol">
   Альбом:<br />
   <a href="/albums/view/{aid}" onClick="Page.Go(this.href); return false">{album-name}</a><br /><div class="mgclr"></div>
   Загрузил:<br />
   <div><a href="/u{uid}" onClick="Page.Go(this.href); return false">{author}</a></div><span style="color:#888">{author-info}</span><div class="mgclr"></div>
  
<a href="/" onClick="Distinguish.Start({id}); return false"><div>Отметить человека</div></a>
	 [owner]<a href="/" onClick="photoeditor.start('{photo}', '{id}', '{height}'); return false"><div>Корректировать</div></a>
   <a href="/" onClick="crop.start({id}); return false"><div>Поместить на мою страницу</div></a>
 <a href="/" onClick="Photo.EditBox({id}, 0); return false"><div>Редактировать</div></a>
<a href="/" onClick="Profile.DelPhoto({id}); return false"><div>Удалить</div></a>[/owner]
<a href="{photo}" target="_blank"><div>Показать оригинал</div></a>
   <a onClick="Report.Box('photo', '{id}')"><div>Пожаловаться</div></a>
   [owner]<div class="photos_gradus_pos">
    <div class="fl_l">Повернуть:</div>
	<div class="photos_gradus_left fl_l" onClick="Photo.Rotation('right', '{id}')"></div>
	<div class="photos_gradus_right fl_l" onClick="Photo.Rotation('left', '{id}')"></div>
	<div class="fl_l" style="margin-left:5px"><img src="{theme}/images/loading_mini.gif" id="loading_gradus{id}" class="no_display" /></div>
   </div>[/owner]
  </div>
 </div>
<div class="clear"></div>
</div>