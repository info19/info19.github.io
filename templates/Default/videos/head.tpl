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

<style>
.padcont {
    padding: 15px;
    padding-top: 10px;
    background: #fff;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 103px !important;
    word-wrap: break-word;
}
.speedbar {
    background: #FFF;
    padding: 13px;
    margin-left: 200px;
    color: #567CA4;
    display: none !important;
    font-size: 13px !important;
    font-weight: 500 !important;
    border-radius: 5px 5px 0 0;
}
</style>