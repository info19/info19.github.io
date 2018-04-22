<div class="wallformbg" style="margin-top:5px;margin-bottom:5px;border-bottom:1px solid #EFEFEF">
<textarea id="msg_text" class="wall_fast_text inp"></textarea>
<button class="button" onClick="im.send('{for_user_id}', '{my-name}', '{my-ava}')">Отправить</button> <a class="fl_r" style="font-size:12px;margin-top:6px" href="/messages" onClick="im.open('{for_user_id}'); return false">Обновить переписку</a>
</div>
<div style="margin:10px"></div>
<input type="hidden" id="for_user_id" value="{for_user_id}" />