<div style="margin-top: 2px;"></div>
<div class="audio page" id="audio{id}" onclick="playAudio('{id}')">
	<div class="audio_page_wrap">
		<div class="play_but fl_l"></div>
		<div class="audio_info">
			<div class="audio_page_time fl_r" id="audio_time{id}" onclick="audio_player.setTimeDir(event);"></div>
			<div class="audio_names">
				<b id="artis{id}">{artist}</b> – <span id="name{id}">{name}</span>
			</div>
			<div class="clear"></div>
		</div>
		<input type="hidden" value="{url}" id="audio_src{id}">
		<div class="clear"></div>
		<div class="page_player no_display" id="player{id}">
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
</div>