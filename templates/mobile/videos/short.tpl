
<div id="video_{id}" class="video_row_cont">

<div class="video_row_inner_cont video_can_edit" onmouseover="document.getElementById('video_row_controls_{id}').style.opacity='1.0'" onmouseout="document.getElementById('video_row_controls_{id}').style.opacity='0'">

<div id="video_row_controls_{id}" class="video_row_controls" style="opacity: 0;padding:4px;z-index: 500;">

<div id="video_row_edit_{id}" class="video_row_icon_edit fl_l" onmouseover="document.getElementById('video_row_edit_{id}').style.opacity='1.0'" onmouseout="document.getElementById('video_row_edit_{id}').style.opacity='0.8'" style="opacity: 0.8;"><span href="/" onClick="videos.editbox({id}); return false"><div class="video_row_icon"></div></span></div>

<div id="video_row_delete_{id}" class="video_row_icon_delete fl_l" onmouseover="document.getElementById('video_row_delete_{id}').style.opacity='1.0'" onmouseout="document.getElementById('video_row_delete_{id}').style.opacity='0.8'" style="opacity: 0.8;"><span href="/" onClick="videos.delet({id}); return false"><div class="video_row_icon"></div></span></div>

<br class="clear" />

</div>

<a class="video_row_relative" href="/video{user-id}_{id}" onClick="videos.show({id}, this.href); return false">

<div class="video_row_info_line">

<div class="video_raw_info_name">{title}</div><div class="video_row_duration">{comm}</div>

</div>

<div class="video_row_info_play"></div>

<div class="video_image_div"><img src="{photo}" /></div>

</a>

<input type="hidden" value="{id}" id="onevideo" />

</div>

</div>
