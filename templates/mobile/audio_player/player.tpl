<script type="text/javascript">
var jQpage_cnt = 1;
$(document).ready(function(){
  player.jPlayerInc();
  $('.staticpl_audios').scroll(function(){
	if($('#jQaudios').height() - $('.staticpl_audios').height() <= $('.staticpl_audios').scrollTop() + ($('.staticpl_audios').height() / 2 + 100 ))
		player.page();
  });
});
</script>


<div id="Xjquery_jplayer"></div>
 <div class="staticpl_seadisb"></div>
 <div class="staticPlbgTitle">
  <div class="staticpl_play fl_l" onClick="player.onePlay()"></div>
  <div class="staticpl_pause fl_l" onClick="player.pause()"></div>
  <div class="staticpl_prev fl_r" onClick="player.prev()"></div>
  <div class="staticpl_next fl_r" onClick="player.next()"></div>

  <div class="staticpl_trackname"><div class="staticpl_rtitle"><div><b id="XjArtis">&nbsp;</b> – <span id="XjTitle">&nbsp;</div></span></div><small id="play_time">00:00</small></div>
  <div class="staticpl_progress_bar">
   <div id="player_progress_load_bar_2">
    <div id="player_progress_play_bar_2"></div>
   </div>
  </div>
  <div class="staticpl_progress_bar_voice" id="player_volume_bar_2">
   <div id="player_volume_bar_value_2"></div>
  </div>
  <div class="staticpl_repeat" onClick="player.refresh()" onMouseOver="myhtml.title('1', 'Повторять эту песню', 'xPlayerVolrefresh')" id="xPlayerVolrefresh1"></div>
  <div class="staticpl_rand" onClick="player.rand()" onMouseOver="myhtml.title('1', 'Случайный порядок', 'xPlayerRand')" id="xPlayerRand1"></div>
  <div class="staticpl_translate" onClick="player.translate()" onMouseOver="myhtml.title('1', 'Транслировать на мою страницу', 'xPlayerTranslate')" id="xPlayerTranslate1"></div>
  <div class="clear"></div>
 </div>
<div class="clear staticpl_shadow" style="margin: 0px;"></div>
 <div class="staticpl_seachbg">
  <img src="{theme}/images/loading_mini.gif" class="fl_r no_display" id="jQpLoad" style="margin-left:400px;margin-top:12px;position:absolute" />
  <input type="text" value="Поиск" class="fave_input" 
	onBlur="if(this.value==''){this.value='Поиск';this.style.color = '#c1cad0'}" 
	onFocus="if(this.value=='Поиск'){this.value='';this.style.color = '#fff'}" 
	onKeyUp="player.gSearch()"
	id="jQpSeachVal"
	maxlength="70" />
	<div id="jQpaddbutpos"></div>
	<div class="clear"></div>
 </div>
 <div class="staticpl_audios fl_l">
   <div id="jQaudios" class="load_list">{audios}</div>
   <div class="staticpl_albut {jQbut}" onClick="player.page()"><span id="jQp_page_but">Показать больше аудиозаписей</span></div>
 </div>
 <div  class="staticpl_friends fl_r">
<div class="staticpl_menu">
   <span class="select cursor_pointer" id="my_list" onClick="player.xSearch({user-id}); return false">Мои аудиозаписи</span>
</div>
[friends]
<div class="clear"></div>
<div style="margin-top:23px"></div>
<div class="more_div"></div>
<div class="mgclr"></div>
{friends}
[/friends]
<div class="clear"></div>
 </div>
<div class="clear"></div>
 <div class="staticpl_bottom">
  <div class="fl_l staticpl_mtp">
   <a href="/" onClick="player.change_list(0); return false">Перейти к списку аудиозаписей</a>
  </div>
  <div class="button_div fl_r"><button onClick="player.close()">Закрыть</button></div>
  <div class="clear"></div>
 </div>