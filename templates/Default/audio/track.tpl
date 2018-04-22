<div class="audio" onclick="playAudio('{aid}');" id="audio{aid}">
	<div class="play_but fl_l"></div>
	<div class="audio_info">
		<div class="fl_r audio_tools">
		[owner]
			<li class="edit" onclick="cancelEvent(event); audio.edit('{aid}')" onmouseover="myhtml.title('{aid}', 'Редактировать песню', 'etrack_', 4)" id="etrack_{aid}"></li>
			<li class="delete" onclick="cancelEvent(event); audio.del('{aid}')" onmouseover="myhtml.title('{aid}', 'Удалить песню', 'dtrack_', 4)" id="dtrack_{aid}"></li>
			[/owner]
			[not-owner]
			<li class="add" onclick="cancelEvent(event); audio.addMyList('{aid}')" onmouseover="myhtml.title('{aid}', 'Добавить в мои аудиозаписи', 'atrack_', 3)" id="atrack_{aid}"></li>
			[/not-owner]
			<div class="clear"></div>
		</div>
		<div class="audio_names">
			<b id="artis{aid}">{artist}</b> – <span id="name{aid}">{name}</span>
		</div>
		<div class="clear"></div>
	</div>
	<input type="hidden" value="{url}" id="audio_src{aid}">
	<div class="clear"></div>
</div>
