<div id="staticpl_panel{jid}">
<div class="staticpl_addmylisy" onClick="audio.addMyList('{aid}', '{jid}')" onMouseOver="myhtml.title('{jid}', 'Добавить в мои аудиозаписи', 'atrack_', 5)" id="atrack_{jid}"></div>
 <div class="staticpl_addmylisok no_display fl_r" id="atrackAddOk{jid}"></div>
 </div>
<div class="staticpl_audio" onClick="player.play('{jid}')" data="{url}" id="xPlayer{jid}">
 <div class="staticpl_ic" id="xPlayerPlay{jid}"></div><div class="staticpl_ic_pause" id="xPlayerPause{jid}"></div>
 <div class="staticpl_autit" id="xPlayerTitle{jid}"><a class="cursor_pointer" onClick="player.doPast('{jid}')" id="jQpauido"><b id="artis{aid}">{artist}</b></a> &ndash; <span id="name{aid}">{name}</span></div>
 <div class="clear"></div>
</div>