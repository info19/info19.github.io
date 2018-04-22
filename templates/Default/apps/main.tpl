<script type="text/javascript">
var page_cnt_app = 1;
var page_cnt_app_old = 1;
var apphre = req_href.split('apps?i=');
if(apphre[1]) apps.view(apphre[1], req_href, '/apps');
$(window).scroll(function(){
	if($(document).height() - $(window).height() <= $(window).scrollTop()+($(document).height()/2-250)){
		apps.showMore();
	}
});
</script>
<div class="search_form" style="background: #fff;
    width: 789px;
    padding: 4px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;     border-bottom: none !important;">
<img src="{theme}/images/loading_mini.gif" class="fl_r no_display" id="apps_se_load" style="margin-left:730px;margin-top:8px;position:absolute" />
<input type="text" value="Поиск по играм" class="fave_input" id="query_games" 
	onBlur="if(this.value==''){this.value='Поиск по играм';this.style.color = '#c1cad0';}" 
	onFocus="if(this.value=='Поиск по играм'){this.value='';this.style.color = '#000'}" 
	onKeyPress="if(event.keyCode == 13)gSearch.go();"
	onKeyUp="apps.gSearch()"
	style="width:660px;margin:0px;color:#c1cad0" 
maxlength="65" />
</div>
<div class="clear" style="height:20px"></div>
<div id="apps_all">
<div class="apps_block" style="margin-right: 23px;
    min-height: 321px;
    margin-left: -14px;
    background: #fff;
    width: 45%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">
 <div class="apps_title" style="padding-bottom: 7px;    font-weight: 400;">Мои игры</div>
 <div id="apps_my_games">{my_games}</div>
</div>
<div class="apps_block" style="    background: #fff;
    width: 45%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">
 <div class="apps_title" style="padding-bottom: 7px;    font-weight: 400;">Активность друзей</div>
 <div id="apps_activity">{activity}</div>
</div>
<div class="clear" style="height:20px"></div>
[but-preload]<div class="public_wall_all_comm apps_but cursor_pointer no_display" onClick="apps.showMoreOld()" style="    border: 11px solid #fff;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
    margin-top: -19px;
    margin-left: -14px;
    width: 343px;"><span id="apps_text_load_old">Показать больше приложений</span></div>[/but-preload]
<div class="apps_block" style="    margin-right: 20px;
    margin-left: -14px;
    background: #fff;
    margin-top: 4px;
    width: 359px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">
 <div class="apps_top" style="    font-weight: 500;
    margin-top: -14px;
    border-bottom: 1px solid #d7d8db;
    width: 357px;
    background: #fff;
    margin-left: -14px;;">Популярные</div>
 <div id="apps_pop">{pop_games}</div>
</div>
<div class="apps_block" style="margin-right: 11px;
    margin-left: 1px;
    background: #fff;
    margin-top: 4px;
    width: 360px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;"> 
 <div class="apps_top" style="    font-weight: 500;
    margin-top: -14px;
    border-bottom: 1px solid #d7d8db;
    width: 358px;
    background: #fff;
    margin-left: -14px;;">Новые</div>
 <div id="apps_new">{new_games}</div>
</div>
<div class="clear" style="height:20px"></div>
[but-preload-2]<div class="public_wall_all_comm apps_but2 cursor_pointer" onClick="apps.showMore()"><span id="apps_text_load">Показать больше приложений</span></div>[/but-preload-2]
</div>
<div id="apps_search" class="no_display">
 <div class="apps_title">Найденные игры</div>
 <div id="apps_search_res"></div>
</div>

<style>
.content {
    float: left;
    width: 827px !important;
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