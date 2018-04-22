<script type="text/javascript">
$(document).ready(function(){
	$('#title_n').focus();
});
</script>
<div class="search_form_tab" style="margin-top:-9px;background:#fff">
 <div class="buttonsprofile albumsbuttonsprofile buttonsprofileSecond" style="height:31px">
  <a href="/public{id}" onClick="Page.Go(this.href); return false;"><div><b>К сообществу</b></div></a>
  <a href="/forum{id}" onClick="Page.Go(this.href); return false;"><div><b>Обсуждения</b></div></a>
  <div class="buttonsprofileSec"><a href="/forum{id}?act=new" onClick="Page.Go(this.href); return false;"><div><b>Новая тема</b></div></a></div>
 </div>
</div>
<div class="clear"></div>
<div class="note_add_bg">
<div class="videos_text">Заголовок</div>
<input type="text" class="videos_input" style="width:616px" maxlength="65" id="title_n" />
<div class="input_hr"></div>
<div class="videos_text">Текст</div>
<textarea class="videos_input wysiwyg_inpt" id="text" style="height:200px"></textarea>
<div class="clear"></div>
<div id="attach_files" class="no_display"></div>
<input id="vaLattach_files" type="hidden" />
<div class="clear"></div>
<div class="button_div fl_l margin_top_10"><button onClick="Forum.New('{id}'); return false" id="forum_sending">Создать тему</button></div>


<div class="post_send_attach fl_r">
<li class="icon-picture-2" onmouseover="showTooltip(this, {text: 'Прикрепить фотографию', shift: [4,7,0]})" onClick="wall.attach_addphoto()"></li>
<li class="icon-video-1" onmouseover="showTooltip(this, {text: 'Прикрепить видеозапись', shift: [4,7,0]})" onClick="wall.attach_addvideo()"></li>
<li class="icon-music-3" onmouseover="showTooltip(this, {text: 'Прикрепить аудиозапись', shift: [4,7,0]})" onClick="wall.attach_addaudio()"></li>
<li class="icon-doc-6" onmouseover="showTooltip(this, {text: 'Прикрепить документ', shift: [4,7,0]})" onClick="wall.attach_addDoc()"></li>

<div class="clear"></div>
</div>

<div class="clear"></div>
</div>