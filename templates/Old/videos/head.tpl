<script type="text/javascript">
$(document).ready(function(){
	videos.scroll();
});
</script>
<div class="menuNews">
    <li  class="activClass">Все видеозаписи</li>
    <li onClick="videos.add(); return false;" style="float:right;">Добавить видеозапись</li>
	<li style="float:right;" id="video_count">У Вас {videos_num} видео</li>
 [not-owner]
<a href="/u{user-id}" onClick="Page.Go(this.href); return false;">К странице {name}</a>[/not-owner]
    <div class="clear"></div>
</div>
<div class="clear"></div>

<div class="clear"></div><div style="margin-top:10px;"></div>
<input type="hidden" value="{user-id}" id="user_id" />
<input type="hidden" id="set_last_id" />
<input type="hidden" id="videos_num" value="{videos_num}" />