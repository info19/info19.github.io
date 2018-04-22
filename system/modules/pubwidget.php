<?php
  /* 
	Appointment: Витжет сообществ
	File: pubwidget.php
	Author: Максим Телегин 
	Engine: Vii Engine
	Copyright: ...
	e-mail: m_telega@mail.ru
	URL: https://vk.com/viiprogrammer
	ICQ: 000-000-000
	Данный код защищен авторскими правами
*/

  if(!defined('MOZG'))
	 die('Hacking attempt!');
    function valid_color($color, $def)
	{
      if(preg_match('/([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/', $color)){
        return $color;
	  }else{
         return $def;
      }
	}
	function cut_str($str, $len, $end = "...")
    {
        if (mb_strlen($str, "utf-8") <= $len)
            return $str;
        else{
            $str = mb_substr($str, 0, $len, "utf-8");
            $str = mb_substr($str, 0, mb_strrpos($str, " ", 0, "utf-8"), "utf-8");
            return $str.$end;    
        }
     }
    $public_id = intval($_GET['public_id']);
    $mode = intval($_GET['mode']);
	$width = intval($_GET['width']);
    $height = intval($_GET['height']);
    $color1w = $_GET['color1'] ? valid_color($_GET['color1'], "FFFFFF") : 'FFFFFF';
    $color2w = $_GET['color2'] ? valid_color($_GET['color2'], "2B587A") : '2B587A';
    $color3w = $_GET['color3'] ? valid_color($_GET['color3'], "5B7FA6") : '5B7FA6';
	$info = $db->super_query("SELECT * FROM `".PREFIX."_communities` WHERE `id` = '{$public_id}'");
    include ENGINE_DIR."/classes/wall.public.wid.php";
	$wall_object = new wall_;
	
	if($height AND $width){
       if($height <= 68){
		   $height = 68;
	   }
       if($width <= 64){
		   $width = 64;
	   }
       $nheight = intval($height/68);
       $nwidth = intval($width/68);
	   $all_num = $nwidth+$nheight;
	}else{
	   $all_num = 12;
	}
		
	if($_GET['wall_load']){
		$cnt = $_GET['cnt'] ? intval($_GET['cnt']) : 1;
		$start = $cnt * 5 - 5; 
		header('Content-Type: application/json; charset=utf-8');		
	    echo $wall_object->wall_select_doload($info['id'], $user_info['user_id'], $start); 
		die();
		
	}
	
    if(!$info){
	 echo '<center style="color:#666">Данная группа не существует :(</center>';
	} else {
      $tpl->load_template('public/widget.tpl');
	  if(!$info['adres']) $info['adres'] = 'public'.$info['id'];
	  if($mode == 0){
	   $sql_ = $db->super_query("SELECT tb1.user_id, tb2.user_name, user_lastname, user_photo FROM `".PREFIX."_friends` tb1, `".PREFIX."_users` tb2 WHERE tb1.friend_id = '{$public_id}' AND tb1.user_id = tb2.user_id AND tb1.user_id != '{$user_info['user_id']}' AND tb1.subscriptions = 2 ORDER by `friends_date`", 1);
	  }
	  if($info['photo']){
	   $info['photo'] = '50_'.$info['photo'];
	   $tpl->set('{photo}', "/uploads/groups/{$info['id']}/{$info['photo']}");
	  }else{
	   $tpl->set('{photo}', "{theme}/images/no_ava_50.png");
	  }
	  
	  if($mode == 0){
	  if($sql_ OR stripos($info['ulist'], "|{$user_info['user_id']}|") === false){
	
	  foreach($sql_ as $row){
		  if($all_num != $ne){
		  // Фото
	      if($row['user_photo'])
		     $ava = '/uploads/users/'.$row['user_id'].'/50_'.$row['user_photo'];
		  else
	         $ava = '/templates/Default/images/no_ava_50.png';
		  // Подписчики
		  $users .= '<!-- '.$row['user_name'].' -->
		  <div class="community_square_user">
             <div class="community_square_pic">
               <a href="/u'.$row['user_id'].'" target="_blank">
               <img width="50" height="50" src="'.$ava.'" /></a>
             </div>
             <a href="/u'.$row['user_id'].'" target="_blank" class="color2">'.$row['user_name'].'</a>
          </div>
		  ';
		  }
		  $ne++;
	  }		
	  
	  }else{
	  if($info['photo']){
	   $ava = "/uploads/groups/{$info['id']}/{$info['photo']}";
	  }else{
	   $ava = "{theme}/images/no_ava_50.png";
	  }
	  
	  	  if(stripos($info['ulist'], "|{$user_info['user_id']}|") === false AND !$sql_){
		   $users = '
		   <style>
		   #community_count_state1 {
			  display:none; 
		   } 
		   </style>
		   <div class="community_group_info community_only_info">
           <div class="community_square_pic fl_l">
             <a href="/'.$info['adres'].'" target="_blank"><img src="'.$ava.'" height="50" width="50"></a>
           </div>
           <div class="community_group_name" style="width: 135px;"><a href="/'.$info['adres'].'" target="_blank" class="color2">'.$info['title'].'</a>
           <br>
           <span style="font-weight: normal; color: #808080;" id="members_count">0 подписчиков</span>
           </div>
           <br class="clear">
           </div>';
		   
		  }
	  }
	  
	  
	  if($user_info['user_photo'])
		 $ava = '/uploads/users/'.$user_info['user_id'].'/50_'.$user_info['user_photo'];
	  else
	     $ava = '/templates/Default/images/no_ava_50.png';
	 if($logged){
	 if(stripos($info['ulist'], "|{$user_info['user_id']}|") === false){
			$this_css = 'style="margin-left: -99px;"';
	  }else{
		   $this_css = '';
	  }
	  $user_name_lastname_exp = explode(' ', $user_info['user_search_pref']);
	  $this_user = '        <!-- '.$user_name_lastname_exp[0].' -->
		  <div class="community_square_user" id="this_us" '.$this_css.'>
             <div class="community_square_pic">
               <a href="/u'.$user_info['user_id'].'" target="_blank">
               <img width="50" height="50" src="'.$ava.'" /></a>
             </div>
             <a href="/u'.$user_info['user_id'].'" target="_blank" class="color2">'.$user_name_lastname_exp[0].'</a>
          </div>
		  ';
	  }
	  }
	  $tpl->set('{title}', $info['title']);
	  if($mode == 0){
	   $tpl->set('{this_user}', $this_user);
	   
	  if(stripos($info['ulist'], "|{$user_info['user_id']}|") === false AND !$sql_){
	    $tpl->set('{users}', '<div id="no_subc"><center style="color: rgb(102, 102, 102); margin-top: 40px;">Подписчики отсутствуют</center></div>');
	  }else{
  	    $tpl->set('{users}', $users);
	  }
	  
	  }
	  if($mode == 2){
		$wall = $wall_object->wall_select($info['id'], $user_info['user_id'], "0,5");
		if($wall){
		 $tpl->set('{records}', $wall);
		}else  $tpl->set('{records}', '<center style="color: rgb(102, 102, 102); margin-top: 50%;">Записи отсутствуют :(</center><br/>');
		
	  }
	  	   
	  $tpl->set('{color1}', $color1w);
	  $tpl->set('{color2}', $color2w);
	  $tpl->set('{color3}', $color3w);
	  $tpl->set('{height}', $height-40);
	  $tpl->set('{width}', $width);
	  $tpl->set('{mode}', $mode);
	  $tpl->set('{id}', $info['id']);
	  
	  if(!$wall){
		 $tpl->set_block("'\\[more-wall\\](.*?)\\[/more-wall\\]'si","");
	  }else	$tpl->set('[more-wall]', ''); $tpl->set('[/more-wall]', '');
		  
	  
	  if($mode == 0){
		  	$tpl->set('[mode-0]', '');
			$tpl->set('[/mode-0]', '');
			$tpl->set_block("'\\[mode-1\\](.*?)\\[/mode-1\\]'si","");
			$tpl->set_block("'\\[mode-2\\](.*?)\\[/mode-2\\]'si","");
	  }elseif($mode == 1){
		    $tpl->set('[mode-1]', '');
			$tpl->set('[/mode-1]', '');
			$tpl->set_block("'\\[mode-0\\](.*?)\\[/mode-0\\]'si","");
			$tpl->set_block("'\\[mode-2\\](.*?)\\[/mode-2\\]'si","");
	  }elseif($mode == 2){
		    $tpl->set('[mode-2]', '');
			$tpl->set('[/mode-2]', '');
			$tpl->set_block("'\\[mode-1\\](.*?)\\[/mode-1\\]'si","");
			$tpl->set_block("'\\[mode-0\\](.*?)\\[/mode-0\\]'si","");
	  }
	  if(stripos($info['ulist'], "|{$user_info['user_id']}|") === false OR !$logged){
		   $tpl->set('[exit]', '');
		   $tpl->set('[/exit]', '');
           $tpl->set_block("'\\[logi\\](.*?)\\[/logi\\]'si","");
	  }else{
     	   $tpl->set('[logi]', '');
		   $tpl->set('[/logi]', '');
           $tpl->set_block("'\\[exit\\](.*?)\\[/exit\\]'si","");
	  }
      if($logged){
	     $tpl->set_block("'\\[not-logged\\](.*?)\\[/not-logged\\]'si","");
	     $tpl->set('[logged]','');
	     $tpl->set('[/logged]','');
      } else {
	     $tpl->set_block("'\\[logged\\](.*?)\\[/logged\\]'si","");
	     $tpl->set('[not-logged]','');
	     $tpl->set('[/not-logged]','');
      }
	  $tpl->set('{count}', $info['traf'].' '.gram_record($info['traf'], 'subscribers'));
	  $tpl->set('{adres}', $info['adres']);
      $tpl->compile('content');
   }
     AjaxTpl();
	 die();
    break;
	
?>