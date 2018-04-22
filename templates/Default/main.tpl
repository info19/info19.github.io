<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
{header}
<noscript><meta http-equiv="refresh" content="0; URL=/badbrowser.php"></noscript>
<link media="screen" href="/css/al/common.css" type="text/css" rel="stylesheet" />  
<link media="screen" href="/css/al/fontello.css" type="text/css" rel="stylesheet">
<link media="screen" href="/css/al/pad.css" type="text/css" rel="stylesheet" />
<link media="screen" href="/css/al/menust.css" type="text/css" rel="stylesheet" />
<link media="screen" href="/css/al/nano.css" type="text/css" rel="stylesheet" />
<link media="screen" href="/css/al/bugs.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/al/player.js"></script>
<script type="text/javascript" src="/js/al/pad.js"></script>
<script type="text/javascript" src="/js/al/mx.js"></script>
<script type="text/javascript" src="/js/al/payment.js"></script>
<script type="text/javascript" src="/js/al/common.js"></script>
<script type="text/javascript" src="/js/al/bugs.js"></script>
<script type="text/javascript" src="/js/al/main.js"></script>
<script type="text/javascript" src="/js/al/profile.js"></script>
{js}[not-logged]<script type="text/javascript" src="/js/al/reg.js"></script>[/not-logged]
<script>
function car_right () {
    x = document.getElementById("moto").offsetLeft;
    xn = x + 10;
    document.getElementById("moto").style.left = xn+"px"
};
</script>
</head>
<body onResize="onBodyResize()" class="no_display">
<div class="scroll_fix_bg no_display" onmousedown="myhtml.scrollTop()" style="display: none;">
<div class="icon-up-dir"></div>
<div class="scroll_fix_page_top">Наверх</div></div>
<div id="doLoad"></div>
[logged]<div class="head">
 <div class="autowr">[/logged]
 
[logged]<a href="/news" class="site_logo" onClick="Page.Go(this.href); return false;"></a>[/logged]

[logged]<div class="head_menu fl_l">
<li class="" onclick="openTopMenu(this);" onmouseout="hideTopMenu()" onmouseover="removeTimer('hidetopmenu')" id="topmenubut"></li>
<div class="cog_new_ident" id="cog_count"></div>
<div class="kj_head_menu" onmouseover="removeTimer('hidetopmenu')" onmouseout="hideTopMenu()" style="left: -999999px; top: 70px;">
<div class="kj_head_menu_arrow">
<div class="notify_box_head">{translate=title_ybedmain}</div>
<div class="explode"></div>
<div class="info_center" style="    margin-top: 8px;">{translate=title_ybedmain1}</div>
</div>
</div>
</div>
[/logged]



[logged]
				<div class="fl_r head_user">
                    <div class="head_user_num" id="head_user_num"></div>
                    <a href="{my-page-link}" onclick="Page.Go(this.href); return false;" class="head_mylink"></a>
                    {myphoto_header}
                    <div class="head_name">{name}</div>			
                    <div class="head_tools">
                        <a href="/editmypage" onclick="Page.Go(this.href); return false;"><li>{translate=strred}</li></a>
                        <a href="/settings" onclick="Page.Go(this.href); return false;"><li>{translate=lang_774}</li></a>
                        <a href="/support" onclick="Page.Go(this.href); return false;"><li>{translate=lang_775}</li></a>
                        <a href="/balance" onclick="Page.Go(this.href); return false;" id="ubm_link"><li>{translate=lang_776}</li></a>
                        <a href="/?act=logout"><li>{translate=lang_777}</li></a>
                    </div>
                </div>
				

<div class="head_nav fl_r">
                    <a class="item fl_l" href="/?go=search" onclick="Page.Go(this.href); return false;">{translate=lang_footerp}</a>
                    <a class="item fl_l" href="/?go=search&amp;type=4" onclick="Page.Go(this.href); return false;">{translate=communities}</a>
                    <a class="item fl_l" href="/?go=search&amp;type=5" onclick="Page.Go(this.href); return false;" id="head_audio_lnk">{translate=lang_769}</a>
                    <a class="item fl_l" href="/balance?act=invite" onclick="Page.Go(this.href); return false;">{translate=lang_362}</a>
                    <div class="clear"></div>
                </div>	

[/logged] 

[logged]
<div id="side_bar" class="fl_l " style="">
<div id="side_bar_inner" class="side_bar_inner">
<ol>
<li id="l_pr" class="">
<a href="{my-page-link}" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">
<span class="left_count_wrap fl_r left_void"><span class="inl_bl left_count_sign"></span></span>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Моя Страница</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><li id="l_nwsf" class="">
<a href="/news" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">
<span class="left_count_wrap fl_r left_void"><span class="inl_bl left_count_sign"></span></span>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Новости</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><li id="l_msg" class="">
<a href="/messages" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">

<div class="new fl_r" id="new_msg">{msg}</div>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Сообщения</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><li id="l_fr" class="">
<a href="/friends{requests-link}" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">

<div class="new fl_r" id="new_requests">{demands}</div>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Друзья</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><li id="l_gr" class="">
<a href="{groups-link}" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">
<div class="new fl_r" id="new_groups">{new_groups}</div>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Группы</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><li id="l_ph" class="">
<a href="/albums/{my-id}" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">
<span class="left_count_wrap fl_r left_void"><span class="inl_bl left_count_sign"></span></span>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Фотографии</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><li id="l_aud" class="">
<a href="/audio" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">
<span class="left_count_wrap fl_r left_void"><span class="inl_bl left_count_sign"></span></span>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Аудиозаписи</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><li id="l_vid" class="">
<a href="/videos" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">
<span class="left_count_wrap fl_r left_void"><span class="inl_bl left_count_sign"></span></span>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Видеозаписи</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><li id="l_ap" class="">
<a href="/apps" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">

<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Игры</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><div class="more_div l_main"></div><li id="l_fav" class="">
<a href="/fave" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">
<span class="left_count_wrap fl_r left_void"><span class="inl_bl left_count_sign"></span></span>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Закладки</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><li id="l_doc" class="">
<a href="/docs" onclick="Page.Go(this.href); return false;" class="left_row">
<span class="left_fixer">
<span class="left_count_wrap fl_r left_void"><span class="inl_bl left_count_sign"></span></span>
<span class="left_icon fl_l"></span>
<span class="left_label inl_bl">Документы</span>
</span>
</a>
<div class="left_settings">
<div class="left_settings_inner"></div>
</div>
</li><div class="more_div"></div>

</div>
</div>
[/logged]

[logged]
[/logged]
  [logged]<a href="{my-page-link}" class="site_logoimg" onclick="Page.Go(this.href); return false;"></a>[/logged] 
  [not-logged]<a href="/" class="udins"></a>[/not-logged]  
 
  
[logged]  
   <!--search-->
   <div class="search_tab no_display" id="search_tab">
    <input type="text" value="Поиск" class="fave_input search_input" 
		onBlur="if(this.value=='') this.value='Поиск';this.style.color = '#c1cad0';" 
		onFocus="if(this.value=='Поиск')this.value='';this.style.color = '#000'" 
		onKeyPress="if(event.keyCode == 13) gSearch.go();"
		onKeyUp="FSE.Txt()"
	id="query" maxlength="65" />
	<div id="search_types">
	 <input type="hidden" value="1" id="se_type" />
	 <div class="search_type" id="search_selected_text" onClick="gSearch.open_types('#sel_types'); return false">по людям</div>
	 <div class="search_alltype_sel no_display" id="sel_types">
	  <div id="1" onClick="gSearch.select_type(this.id, 'по людям'); FSE.GoSe($('#query').val()); return false" class="search_type_selected">по людям</div>
	  <div id="2" onClick="gSearch.select_type(this.id, 'по видеозаписям'); FSE.GoSe($('#query').val()); return false">по видеозаписям</div>
	  <div id="3" onClick="gSearch.select_type(this.id, 'по заметкам');  FSE.GoSe($('#query').val()); return false">по заметкам</div>
	  <div id="4" onClick="gSearch.select_type(this.id, 'по сообществам'); FSE.GoSe($('#query').val()); return false">по сообществам</div>
	  <div id="5" onClick="gSearch.select_type(this.id, 'по аудиозаписям');  FSE.GoSe($('#query').val()); return false">по аудиозаписям</div>
	 </div>
	</div>
	<div class="button_div fl_l margin_left"><button onClick="gSearch.go(); return false" id="se_but">Найти</button></div>
   </div>
   <div class="fast_search_bg no_display">
   <a href="/" style="padding:12px;background:#eef3f5" onClick="gSearch.go(); return false" onMouseOver="FSE.ClrHovered(this.id)" id="all_fast_res_clr1"><text>Искать</text> <b id="fast_search_txt"></b><div class="fl_r fast_search_ic"></div></a>
   <span id="reFastSearch"></span>
   </div>
   <!--/search-->

 [/logged]
   
   
 </div>
</div>
<div class="clear"></div>
<div style="margin-top:41px;"></div>
<div class="autowr">
 <div class="content" [logged]style="width:800px;margin-left:112px;"[/logged]>
  [logged]<div class="cont_border_left">[/logged]
   <div class="cont_border_right">
     [logged]<div class="speedbar no_display" id="">{speedbar}</div>[/logged]
    [logged]<div class="speedbar [speedbar]no_display[/speedbar]" id="speedbar">{speedbar}</div>[/logged] 
    <div class="padcont">
   <div id="audioPlayer"></div>
   <div id="page">{info}{content}</div>
   <div class="clear"></div>
  </div>
  </div>
</div>
  [logged]<div class="footer">
<a href="/?go=search&type=1" onClick="Page.Go(this.href); return false">{translate=lang_footerp}</a>
   <a href="/?go=search&type=4" onClick="Page.Go(this.href); return false">{translate=communities}</a>
   <a href="/about" onClick="Page.Go(this.href); return false">{translate=blog_terms}</a>
   <a href="/support?act=new" onClick="Page.Go(this.href); return false">{translate=support_title}</a>
  <a href="/bugs" onClick="Page.Go(this.href); return false">{translate=bugs}</a> 
  <a href="/blog" onClick="Page.Go(this.href); return false">{translate=blog_title}</a>
   <div class="copyright">
   Студентоси Ру &copy; 2016<a class="cursor_pointer" onClick="trsn.box()" onmouseover="showTooltip(this, {text: '{translate=lang_790}', shift: [5,5,0]});">{translate=fotlang}</a><br>
   <a href="/u1" onClick="Page.Go(this.href); return false;" class="creator">Pavel V.</a>
   </div>
</div>
   [/logged]
   </div>
  </div>
 </div>
</div>


[logged]
<div class="chat_tab friends minimized bottom" id="chat0">			
<div class="chat_tab_head" onClick="Page.Go('/messages')">				
<div class="chat_tab_title">	
<div class="icon-comment-7 fl_l"></div>				
<div class="fl_l">{translate=lang_dial412}</div>			
<div class="clear"></div></div></div>			
</div>
<div class="clear"></div>
</div></div></div></div>[/logged]


[logged]<script type="text/javascript" src="/js/al/push.js"></script>
<div class="no_display" id="noDisplayBL">><audio id="beep-three" controls preload="auto"><source src="/images/soundact.ogg"></source></audio></div>
<div id="updates"></div>[/logged]
<div class="clear"></div>
</body>
</html>