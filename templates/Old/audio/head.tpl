<div class="audio_pad fixed">
	<div class="audio_pad_player">
		<div class="pad_player_ch_buts fl_l" style="margin-left: 10px;" id="pad_prev"></div>
		<div class="pad_player_plbut fl_l" id="pad_play"></div>
		<div class="pad_player_ch_butsnext fl_l" id="pad_next"></div>
		<div class="pad_player_info fl_l">
			<div>
				<div class="pad_player_time fl_r" id="pad_player_time"></div>
				<div class="pad_player_names" id="pad_track_name"></div>
				<div class="clear"></div>
			</div>
			<div class="pad_player_progress" id="pad_player_progress_wr">
				<div class="bg_line"></div>
				<div class="load_line" id="pad_load_line"></div>
				<div class="play_line" id="pad_play_line"></div>
			</div>
		</div>
		<div class="pad_player_progress volume fl_l" id="pad_volume_wrap">
			<div class="bg_line"></div>
			<div class="play_line" id="pad_volume_line"></div>
		</div>
		<div class="pad_player_tools fl_l">
			<li class="repeat" id="pad_repeat" onMouseOver="myhtml.title(\'pad_repeat\', \'Повторять этупесню\', \'\', 0)"></li>
			<li class="random" id="pad_rand" onMouseOver="myhtml.title(\'pad_rand\', \'Случайный порядок\', \'\', 0)"></li>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="pad_content_wrapnano" id="pad_nano_wr">
		<div class="nano-content">
			<div id="pad_result"></div>
		</div>
	</div>
	<div class="pad_bottom_wrap">
		<a href="/audio" onClick="Page.Go(this.href); returnfalse;" class="pad_my_list fl_l">Мои аудиозаписи</a>
		<div class="button_div fl_r">
			<buttononClick="Pad.close()">Закрыть</button>
		</div>
		<div class="clear"></div>
	</div>
</div>
