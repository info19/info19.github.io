<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="shortcut icon" href="/images/faviconnew.ico?3" />
<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="robots" content="noindex, nofollow" />
<title>Соц сеть | Community Widget</title>
<noscript><meta http-equiv="refresh" content="0; URL=/badbrowser.php"></noscript>
<link rel="stylesheet" type="text/css" href="https://vk.com/css/al/lite.css?37" />
<link type="text/css" rel="stylesheet" href="https://vk.com/css/al/widget_community.css?63"/>
<script type="text/javascript" src="/js/al/jquery.lib.js"></script>
<script type="text/javascript" src="/js/al/public_w.js"></script>
<base target="_blank"/>
<script type="text/javascript">
  var config = {
	id: '{id}',
  }
</script>
</head>

<body class="is_rtl VK1  widget_body">
  <div id="system_msg" class="fixed"></div>
  <div id="utils"></div>
  <div id="box_layer_bg" class="fixed"></div><div id="box_layer_wrap" class="scroll_fix_wrap fixed"><div id="box_layer"><div id="box_loader"><div class="loader"></div><div class="back"></div></div></div></div>
  <div id="stl_left"></div>
  <div id="stl_side"></div>
  <div class="scroll_fix_wrap" id="page_wrap">
  <style>
  .community_post {
      padding-top: 8px;
      border-top: 1px solid #DAE1E8;
      padding-bottom: 10px;
  }
  #community_groups_main .wall_post_text {
      width: auto;
  }
  .community_post .wall_post_text {
      padding: 2px 0px;
  }
  .wall_post_text {
      width: 320px;
      overflow: hidden;
      word-wrap: break-word;
  }
  .wall_post_text, .wall_reply_text {
      padding-top: 2px;
      padding-bottom: 1px;
      line-height: 140%;
  }
  
  .community_square_user {
    width: 73px;
    padding: 3px 0px;
  }
  .color4_bg {
    background-color: #ebeff4;
  }
  .community_checked:hover {
    background-color: #e1e7ee;
  }
  .color3 {
    color: #{color3};
  }
  .color3_bg {
    background-color: #{color3};
  }
  .color2 {
    color: #{color2};
  }
  .color2_bg {
    background-color: #{color2};
  }
  .color1 {
    color: #{color1};
  }
  .color1_bg {
    background-color: #{color1};
  }
  </style>
  <div id="autosize_helpers" style="position: absolute; margin-left: -10000px; margin-left: -10000px"></div>
  <div id="main" class="color1_bg color2">
  <div id="community_groups_main" class="community_groups_main clear_fix" style="height: 100%" />
  <a href="/{adres}" target="_blank" class="community_head color3_bg" onmouseover="Community.headerOver(event);" onmouseout="Community.headerOut(event);">
  [mode-0]<span class="wcommuinty_logo fl_r" href="/" target="_blank" style="margin: 0 0px -2px 0;" title="ВКонтакте"></span>[/mode-0]
  [mode-2]<span class="wcommuinty_logo fl_r" href="/" target="_blank" style="margin: 0 0px -2px 0;" title="ВКонтакте"></span>[/mode-2]
  <img width="22" height="22" src="[mode-0]{photo}[/mode-0][mode-2]{photo}[/mode-2][mode-1]https://vk.com/images/icons/w_logo.png[/mode-1]" /><div id="wcommunity_name_cont" style="width: 148px;">
  <span id="wcommunity_name_anim" class="wcommunity_name">{title}</span>
  </div>
  </a>
[mode-0]    <div class="community_soft_head">
   <a id="community_count_state1" onmousedown="return cancelEvent(event);" onclick="" id="members_count" class="color2">{count}</a>
   </div> [/mode-0]
   <div class="community_content" id="community_content" style="">
  <div id="page_wall_posts" class="wall_module">
  <div class="anim_row" style="width:204px;">
  <div id="anim_row" style="width:293px; margin-left: -0px;">
  [mode-0]{this_user}{users}[/mode-0]
[mode-1]
<div class="community_group_info community_only_info">
<div class="community_square_pic fl_l">
  <a href="/{adres}" target="_blank"><img src="{photo}" height="50" width="50"></a>
</div>
<div class="community_group_name" style="width: 135px;"><a href="/{adres}" target="_blank" class="color2">{title}</a>
<br>
<span style="font-weight: normal; color: #808080;" id="members_count">{count}</span>
</div>
<br class="clear">
</div>[/mode-1]

[mode-2]
<div style="color: #D8000C;border: 1px solid;margin: 10px 0px;width: 50%;padding:15px 10px 15px 50px;background-color: #FFBABA;">Данный режим временно не доступен</div>
[/mode-2]
        </div>
       </div>
      <div class="clear"></div>
     </div>
    </div>
    <div id="stat_info" class="clear_fix" style="display: none; padding: 10px;">
    <center>
      <img id="wcomments_progress" src="/images/upload.gif" style="margin: 50px auto;"/>
    </center>
     </div>
    </div>
     <div id="community_like" class="community_widget_bottom">
       [logi]<a id="join_community"  onclick="[not-logged]w.open_p();[/not-logged][logged]w.exit();[/logged] return false;" class="join_community  clear_fix color4_bg color2 community_checked">Отписаться от новостей</a>[/logi]
       [exit]<a id="join_community"  onclick="[not-logged]w.open_p();[/not-logged][logged]w.login();[/logged] return false;" class="join_community  color3_bg clear_fix">Подписаться на новости</a>[/exit]
    </div>
   </div>
  </div>
  <div class="progress" id="global_prg"></div>
 </body>
</html>