[record]<div class="onewallrec wallrecord" id="wall_record_{rec-id}">
<div class="head_record"><div class="ewllfs"><a href="/u{user-id}"><img src="{ava}" width="40" height="40" align="left" /></a></div>
<div class="wallwTEXT">
<a href="/u{user-id}"><b>{name} - <a class="color777" style="    text-decoration: none;">{date}</a></b>[owner] - <a href="/" class="size10 fl_r" id="wall_del_{rec-id}" onClick="wall.delet('{rec-id}'); return false" style="font-weight:normal">Удалить</a>[/owner]</a> {online}<br>[owner]<div style="margin-top:-18px"></div>[/owner]
</div></div>
<div class="clr"></div>
<div style="margin-top: 5px; color:#000">{text}</div>
<div class="clr"></div>
<br>
<div style="
    line-height: 19px;
    margin-left: -4px;
"> <div class="public_wall_like_no " id="wall_active_ic36" style="margin-right: 3px;"></div> Понравилось <b id="wall_like_cnt{rec-id}">{likes}</b> людям</div>
<div class="clr"></div>
<br>
<span class="{yes-like-color} wall_like fl_l" id="wall_like_link{rec-id}" onClick="{like-js-function}; return false"><div class="public_wall_like_no {yes-like-color} " id="wall_active_ic{rec-id}" style="    margin-top: -2px;"></div><span  class="wall_like_cnt"> Мне нравится</span></span>
[privacy-comment][comments-link]<div id="fast_form_{rec-id}"><textarea class="wall_fast_text inp" style="height:33px;color:#000;margin:0px;margin-top:10px;width:98%;margin-bottom:10px" id="fast_text_{rec-id}" placeholder="Комментировать.."></textarea>
<div class="clr"></div>
<button class="button" onClick="wall.fast_send('{rec-id}', '{author-id}', 2); return false">Отправить</button></div>[/privacy-comment][/comments-link]
</div>
<div class="clr"></div>
</div>[/record]
[all-comm]<div class="cursor_pointer" onClick="wall.all_comments('{rec-id}', '{author-id}'); return false" id="wall_all_but_link_{rec-id}"><div class="public_wall_all_comm" id="wall_all_comm_but_{rec-id}">Показать {gram-record-all-comm}</div></div>[/all-comm]
[comment]<div class="comm_form_wall"><div class="wall_fast_block" id="wall_fast_comment_{comm-id}">
<div class="wall_fast_ava"><a href="/u{user-id}" onClick="Page.Go(this.href); return false"><img src="{ava}" alt="" width="25" height="25" /></a></div>
<div class="wall_fast_pad">
<div><a href="/u{user-id}">{name}</a></div>
<div class="wall_fast_comment_text">{text}</div>
<div class="color777" style="font-size:11px">{date} [owner]- <a href="/" class="size10 fl_r" id="fast_del_{comm-id}" onClick="wall.fast_comm_del('{comm-id}'); return false" style="font-weight:normal;font-size:11px">Удалить</a>[/owner]</div>
<div class="clear"></div>
</div></div></div>
[/comment]
[comment-form]<div class="comm_form_wall"><div id="fast_form_{rec-id}"><textarea class="wall_fast_text inp" style="height:33px;color:#000;margin:0px;margin-top:11px;width:99%;margin-bottom:10px" id="fast_text_{rec-id}" placeholder="Комментировать.."></textarea>
<div class="clr"></div>
<button class="button" onClick="wall.fast_send('{rec-id}', '{author-id}', 2); return false" id="fast_buts_{rec-id}">Отправить</button></div>[/comment-form]