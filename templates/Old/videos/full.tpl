<div id="video_show_{vid}" class="video_view" onClick="videos.setEvent(event, {owner-id}, '{close-link}')">
<div class="photo_close" onClick="videos.close({owner-id}, '{close-link}'); return false"></div>
 <div class="video_show_bg">
  <div class="video_show_object">

   <div id="video_object">{video}</div>
  </div>
  <div class="video_show_panel" id="video_del_info">
   <div class="photo_leftcol video_show_left_col">
    <div class="video_show_descr" id="video_full_descr_{vid}" style="    margin-left: 130px;
    min-width: 400px;">{descr}</div>
    <div class="video_show_date" style="    margin-left: 130px;">Добавлена {date}</div><br />
	[all-comm]<a href="/" onClick="videos.allcomment({vid}, {comm-num}, {owner-id}); return false" id="all_href_lnk_comm"><div class="photo_all_comm_bg" id="all_lnk_comm">Показать {prev-text-comm}</div></a><span id="all_comments"></span>[/all-comm]
	[admin-comments]<span id="comments">{comments}</span>
    <textarea id="comment" class="inpst" placeholder="Комментировать.." style="width: 389px;height:35px;resize: none;margin-bottom:10px;margin: 13px 0px 10px 130.203px;border: 1px solid rgba(195, 203, 212, 0.49);"></textarea>
    <div class="button_div fl_l" style="    margin-left: 130px;"><button onClick="videos.addcomment({vid}); return false" id="add_comm">Отправить</button></div>[/admin-comments]    [not-owner]<div id="addok" style="    margin-top: 7px;
    float: right;
    margin-right: 37px;"><a href="/" onClick="videos.addmylist('{vid}'); return false">Добавить в Мои Видеозаписи</a></div>[/not-owner]
   </div>
   <div class="photo_rightcol" style="    margin-left: -45px;">
    Отправитель:<br /><a href="/u{uid}" onClick="Page.Go(this.href); return false">{author}</a><br /><br />
	[public]
     [owner]<a href="/" onClick="videos.editbox({vid}); return false"><div>Редактировать</div></a> 
	 <a href="/" onClick="videos.delet({vid}, 1); return false"><div>Удалить</div></a>[/owner]
	 <a onClick="Report.Box('video', '{vid}')"><div>Пожаловаться</div></a>
    </div>[/public]
   
  <div class="clear"></div>
  </div>
 </div>
</div>