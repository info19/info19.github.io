<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
      <link rel="shortcut icon" href="/images/faviconnew.ico?3" />
      <meta http-equiv="content-type" content="text/html; charset=windows-1251" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="robots" content="noindex, nofollow" />
      <title>Соц сеть | Community Widget</title>
      <noscript>
         <meta http-equiv="refresh" content="0; URL=/badbrowser.php">
      </noscript>
      <link rel="stylesheet" type="text/css" href="https://vk.com/css/al/lite.css?37" />
      <link type="text/css" rel="stylesheet" href="https://vk.com/css/al/widget_community.css?63"/>
      <script type="text/javascript" src="{theme}/js/jquery.lib.js"></script>
      <script type="text/javascript" src="{theme}/js/public_functions_.js"></script>
      <base target="_blank"/>
      <script type="text/javascript">
         var config = {
          id: '{id}',
		  cnt_sb: parseInt('{count}'),
		  mode: '{mode}',
         }
          function send_open_photomess(url){
               var send_json_func = {func: "open_photo", url: url};
         parent.postMessage(JSON.stringify(send_json_func), '*');
          }
          function send_open_videomess(url){
               var send_json_func = {func: "open_video", url: url};
         parent.postMessage(JSON.stringify(send_json_func), '*');
          }
      </script>
   </head>
   <body class="is_rtl VK1  widget_body">
      <div id="system_msg" class="fixed"></div>
      <div id="utils"></div>
      <div id="box_layer_bg" class="fixed"></div>
      <div id="box_layer_wrap" class="scroll_fix_wrap fixed">
         <div id="box_layer">
            <div id="box_loader">
               <div class="loader"></div>
               <div class="back"></div>
            </div>
         </div>
      </div>
      <div id="stl_left"></div>
      <div id="stl_side"></div>
      <div class="scroll_fix_wrap" id="page_wrap">
         <style>
		    #pd .title {color: #627A94;}
		    #pd .performer {font-weight: bold;color: #2B587A;}
		    #pd_play {background: transparent url("https://vk.com/images/icons/audio_icons.png?6") no-repeat scroll 0px -25px;margin: 0px 4px 0px 2px;padding: 0px;width: 22px;height: 22px;cursor: pointer;}
			#pd_play.playing {background-position: -72px -25px;}
            .video_inline_vititle {background: transparent url("{theme}/images/icons/index2.png") no-repeat scroll 0px -276px;float: left;width: 16px;height: 13px;margin-top: 1px;margin-right: 3px;}
            .wall_vote_title{font-weight:bold;color:#21578b;border-bottom:1px solid #eef3f8}
            .wall_vote_oneanswe{margin-top:7px;margin-bottom:7px;cursor:pointer}
            .wall_vote_oneanswe input{margin-right:5px}
            .wall_vote_proc{height:15px;background:#f7f7f7;color:#8BA1BC;text-align:center;width: 80%;margin-right:5px} /* DAE1E8 */
            .wall_vote_proc_bg{background:#DAE1E8;height:15px;text-align:center}
            .community_post {padding-top: 8px;border-top: 1px solid #DAE1E8;padding-bottom: 10px;}
            .video_inline_icon {background: transparent url("{theme}/images/inline_video_play.png") no-repeat scroll 0% 0%;width: 46px;height: 46px;position: absolute;margin-left: 90px;margin-top: 37px;}
            #community_groups_main .wall_post_text {width: auto;}
            .community_post .wall_post_text {padding: 2px 0px;}
            .wall_post_text {width: 320px;overflow: hidden;word-wrap: break-word;}
            .wall_post_text, .wall_reply_text {padding-top: 2px;padding-bottom: 1px;line-height: 140%;}
            .community_square_user {width: 73px;padding: 3px 0px;}
            .color4_bg {background-color: #ebeff4;}
            .community_checked:hover {background-color: #e1e7ee;}
            .color3 {color: #{color3};}
            .color3_bg {background-color: #{color3};}
            .color2 {color: #{color2};}
            .color2_bg {background-color: #{color2};}
            .color1 {color: #{color1};}
            .color1_bg {background-color: #{color1};}
            .attach_link_block_te {color: #555;}
            .noselect {-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;}
         </style>
         <div id="audioPlayer"></div>
         <div id="autosize_helpers" style="position: absolute; margin-left: -10000px; margin-left: -10000px"></div>
         <div id="main" class="color1_bg color2">
            <div id="community_groups_main" class="community_groups_main clear_fix" style="height: 100%" />
               <a href="/{adres}" target="_blank" class="community_head color3_bg">
                  [mode-0]<span class="wcommuinty_logo fl_r" href="/" target="_blank" style="margin: 0 0px -2px 0;"></span>[/mode-0]
                  [mode-2]<span class="wcommuinty_logo fl_r" href="/" target="_blank" style="margin: 0 0px -2px 0;"></span>[/mode-2]
                  <img width="22" height="22" src="[mode-0]{photo}[/mode-0][mode-2]{photo}[/mode-2][mode-1]https://vk.com/images/icons/w_logo.png[/mode-1]" />
                  <div id="wcommunity_name_cont" style="width: 148px;">
                     <span id="wcommunity_name_anim" class="wcommunity_name">{title}</span>
                  </div>
               </a>
               [mode-0]    
               <div class="community_soft_head">
                  <a id="members_count" class="color2">{count}</a>
               </div>
               [/mode-0]
               <div class="community_content" id="community_content" style="">
                  <div class="anim_row" style="width:100%;">
                     <div id="body_page_cont" style="width:100%; margin-left: -0px;">
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
                        </div>
                        [/mode-1]
                        [mode-2]
                        <div id="page_wall_posts" style="overflow-x: auto; height: 300px; word-wrap: break-word;" class="wall_module scroll-pane">
                           {records}
                           [more-wall]<a style="display: block; text-align: center; padding: 5px 6px 7px; background: rgb(227, 233, 239) none repeat scroll 0% 0%; color: rgb(106, 120, 138);" id="more_wall" class="noselect" onclick="wall.load();"><span>Показать следующие</span></a>[/more-wall]
                        </div>
                        [more-wall] <input id="wall_load_c" type="hidden" value="2">
						<input id="play_o" type="hidden" value="">[/more-wall]
                        [/mode-2]
                     </div>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
         </div>
         <div id="community_like" class="community_widget_bottom">
            [logi]<a id="join_community"  onclick="[not-logged]w.open_p();[/not-logged][logged]w.exit();[/logged] return false;" class="join_community  clear_fix color4_bg color2 community_checked">Отписаться от новостей</a>[/logi]
            [exit]<a id="join_community"  onclick="[not-logged]w.open_p();[/not-logged][logged]w.login();[/logged] return false;" class="join_community  color3_bg clear_fix">Подписаться на новости</a>[/exit]
         </div>
      </div>
   </body>
</html>