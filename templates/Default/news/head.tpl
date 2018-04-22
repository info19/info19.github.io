[news]<script type="text/javascript">
var page_cnt = 1;
$(document).ready(function(){
	music.jPlayerInc();
	$('#wall_text, .fast_form_width').autoResize();
	$(window).scroll(function(){
		if($(document).height() - $(window).height() <= $(window).scrollTop()+($(document).height()/2-250)){
			news.page();
		}
	});
});
$(document).click(function(event){
	wall.event(event);
});
</script>
<style>.newcolor000{color:#000}</style>
<div id="jquery_jplayer"></div>
<input type="hidden" id="teck_id" value="" />
<input type="hidden" id="teck_prefix" value="" />
<input type="hidden" id="typePlay" value="standart" />
<input type="hidden" id="type" value="{type}" />
<div class="buttonsprofile albumsbuttonsprofile" style="    background: #fff;
    margin-top: -9px;
    width: 777px;
    margin-left: -15px;
    height: 24px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">
 <div class="{activetab-}"><a href="/news" onClick="Page.Go(this.href); return false;"><div>Новости</div></a></div>
 <div class="{activetab-notifications}"><a href="/news/notifications" onClick="Page.Go(this.href); return false;"><div>Ответы</div></a></div>
 <div class="{activetab-photos}"><a href="/news/photos" onClick="Page.Go(this.href); return false;"><div>Фотографии</div></a></div>
 <div class="{activetab-videos}"><a href="/news/videos" onClick="Page.Go(this.href); return false;"><div>Видеозаписи</div></a></div>
 <div class="{activetab-updates}"><a href="/news/updates" onClick="Page.Go(this.href); return false;"><div>Обновления</div></a></div>
</div>



<div class="clear"></div><div style="margin-top:10px;"></div>[/news]
[bottom]<span id="news"></span>
[bottom]<span id="news"></span>
<div onClick="news.page()" id="wall_l_href_news" class="cursor_pointer"><div class="photo_all_comm_bg wall_upgwi" id="loading_news" style="width:750px">Показать предыдущие новости</div></div>[/bottom]

<style>
.speedbar {
    background: #FFF;
    padding: 13px;
    color: #567CA4;
    font-size: 13px !important;
    font-weight: 500 !important;
    border-radius: 0;
    background: #fff;
    width: 777px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 103px !important;
    word-wrap: break-word;
}
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: none !important;
    background: none !important;
}
</style>