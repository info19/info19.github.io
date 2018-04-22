<div class="friends_onefriendd2">
<div class="audio page search" id="audio{aid}_s" onclick="playAudio('{aid}_s')">
	<div class="audio_page_wrap">
		<div class="play_but fl_l"></div>
		<div class="audio_info">
			<div class="audio_page_time fl_r" id="audio_time{aid}_s" onclick="audio_player.setTimeDir(event);"></div>
			<div class="fl_r audio_tools">
				<li class="add" onclick="cancelEvent(event); audio.addMyList('{aid}_s')" onmouseover="myhtml.title('{aid}_s', 'Добавить в мои аудиозаписи', 'atrack_', 3)" id="atrack_{aid}_s"></li>
				<li class="added no_display" id="atrackAddOk{aid}_s"></li>
				<div class="clear"></div>
			</div>
			<div class="audio_names">
				<b id="artis{aid}_s">{artist}</b> – <span id="name{aid}_s">{name}</span> <a href="/u{author-id}" onclick="cancelEvent(event); Page.Go(this.href);"><small>({author-n}. {author-f})</small></a>
			</div>
			<div class="clear"></div>
		</div>
		<input type="hidden" value="{url}" id="audio_src{aid}_s">
		<div class="clear"></div>
		<div class="page_player no_display" id="player{aid}_s">
			<div class="fl_r page_player_progres_wr volume" onclick="audio_player.volumeClick.apply(this, [event])">
				<div class="bg_line"></div>
				<div class="volume_line"></div>
			</div>
			<div class="page_player_progres_wr" onclick="audio_player.progressClick.apply(this, [event])">
				<div class="bg_line"></div>
				<div class="load_line"></div>
				<div class="play_line"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div></div>