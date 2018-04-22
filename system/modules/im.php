<?php
/* 
	Appointment: Диалоги
	File: im.php 
	Author: Andrew Tereshin 
	Engine: VK CMS Plus
	Copyright: ExcaliburONE (с) 2015
	e-mail: mego@xake.ru
	URL: http://vk.com/Excalibur_ONE
	ICQ: 525511
	Данный код защищен авторскими правами
*/
if(!defined('MOZG'))
	die('Hacking attempt!');

if($ajax == 'yes')
	NoAjaxQuery();

if($logged){
	$act = $_GET['act'];
	$user_id = $user_info['user_id'];

	switch($act){
		
		//################### Отправка сообщения ###################//
		case "send":
			NoAjaxQuery();
			
			
			
			$for_user_id = intval($_POST['for_user_id']);
			$msg = ajax_utf8(textFilter($_POST['msg']));
			$attach_files = ajax_utf8(textFilter($_POST['attach_files']));
			$my_ava = ajax_utf8(textFilter($_POST['my_ava'], false, true));
			$my_name = ajax_utf8(textFilter($_POST['my_name'], false, true));
			$attach_files = ajax_utf8(textFilter($_POST['attach_files'], false, true));
			
			$attach_files = str_replace('vote|', 'hack|', $attach_files);
			
			AntiSpam('identical', $msg.$attach_files);
			
			if(isset($msg) AND !empty($msg) OR isset($attach_files) OR !empty($attach_files)){
				
				//Проверка на существование получателя
				$row = $db->super_query("SELECT user_privacy FROM `".PREFIX."_users` WHERE user_id = '".$for_user_id."'");

				if($row){
					//Приватность
					$user_privacy = xfieldsdataload($row['user_privacy']);
					
					//ЧС
					$CheckBlackList = CheckBlackList($for_user_id);
				
					//Проверка естьли запрашиваемый юзер в друзьях у юзера который смотрит стр
					if($user_privacy['val_msg'] == 2)
						$check_friend = CheckFriends($for_user_id);
	
					if(!$CheckBlackList AND $user_privacy['val_msg'] == 1 OR $user_privacy['val_msg'] == 2 AND $check_friend)
						$xPrivasy = 1;
					else
						$xPrivasy = 0;
				
					if($xPrivasy AND $user_id != $for_user_id){
						
						AntiSpamLogInsert('identical', $msg.$attach_files);
						
						if(!CheckFriends($for_user_id)) AntiSpamLogInsert('messages');
						
						//Отправляем сообщение получателю
						$db->query("INSERT INTO `".PREFIX."_messages` SET theme = '...', text = '".$msg."', for_user_id = '".$for_user_id."', from_user_id = '".$user_id."', date = '".$server_time."', pm_read = 'no', folder = 'inbox', history_user_id = '".$user_id."', attach = '".$attach_files."'");
						$dbid2 = $db->insert_id();
						
						//Сохраняем сообщение в папку отправленные
						$db->query("INSERT INTO `".PREFIX."_messages` SET theme = '...', text = '".$msg."', for_user_id = '".$user_id."', from_user_id = '".$for_user_id."', date = '".$server_time."', pm_read = 'no', folder = 'outbox', history_user_id = '".$user_id."', attach = '".$attach_files."'");
						$dbid = $db->insert_id();

						//Обновляем кол-во новых сообщения у получателя
						$db->query("UPDATE `".PREFIX."_users` SET user_pm_num = user_pm_num+1 WHERE user_id = '".$for_user_id."'");
						
						//Проверка на наличии созданого диалога у себя
						$check_im = $db->super_query("SELECT iuser_id FROM `".PREFIX."_im` WHERE iuser_id = '".$user_id."' AND im_user_id = '".$for_user_id."'");
						if(!$check_im)
							$db->query("INSERT INTO ".PREFIX."_im SET iuser_id = '".$user_id."', im_user_id = '".$for_user_id."', idate = '".$server_time."', all_msg_num = 1");
						else
							$db->query("UPDATE ".PREFIX."_im  SET idate = '".$server_time."', all_msg_num = all_msg_num+1 WHERE iuser_id = '".$user_id."' AND im_user_id = '".$for_user_id."'");
							
						//Проверка на наличии созданого диалога у получателя, а если есть то просто обновляем кол-во новых сообщений в диалоге
						$check_im_2 = $db->super_query("SELECT iuser_id FROM ".PREFIX."_im WHERE iuser_id = '".$for_user_id."' AND im_user_id = '".$user_id."'");
						if(!$check_im_2)
							$db->query("INSERT INTO ".PREFIX."_im SET iuser_id = '".$for_user_id."', im_user_id = '".$user_id."', msg_num = 1, idate = '".$server_time."', all_msg_num = 1");
						else
							$db->query("UPDATE ".PREFIX."_im  SET idate = '".$server_time."', msg_num = msg_num+1, all_msg_num = all_msg_num+1 WHERE iuser_id = '".$for_user_id."' AND im_user_id = '".$user_id."'");
						
						//Вставляем событие в моментальные оповещания
						$check2 = $db->super_query("SELECT user_last_visit, user_msg_type FROM `".PREFIX."_users` WHERE user_id = '{$for_user_id}'");
						$update_time = $server_time - 70;
		
						if($check2['user_last_visit'] >= $update_time){
							
							if($check2['user_msg_type'])
								$msg_lnk = '/messages#'.$user_id;
							else
								$msg_lnk = '/messages/show/'.$dbid2;
							
							$db->query("INSERT INTO `".PREFIX."_updates` SET for_user_id = '{$for_user_id}', from_user_id = '{$user_id}', type = '8', date = '{$server_time}', text = '{$msg}', user_photo = '{$user_info['user_photo']}', user_search_pref = '{$user_info['user_search_pref']}', lnk = '{$msg_lnk}'");
										
							mozg_create_cache("user_{$for_user_id}/updates", 1);

						}

						//Ответ скрипта
						$tpl->load_template('im/msg.tpl');
						$tpl->set('{ava}', $my_ava);
						$tpl->set('{name}', $my_name);
						$tpl->set('{user-id}', $user_id);

						//Прикрипленные файлы
						if($attach_files){
							$attach_arr = explode('||', $attach_files);
							$cnt_attach = 1;
							$jid = 0;
							$attach_result = '';
							foreach($attach_arr as $attach_file){
								$attach_type = explode('|', $attach_file);
								
								//Фото
								if($attach_type[0] == 'photo_u'){
									$attauthor_user_id = $user_id;

									if($attach_type[1] == 'attach' AND file_exists(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/c_{$attach_type[2]}")){
									
										$size = getimagesize(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/c_{$attach_type[2]}");
										
										$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/attach/{$attauthor_user_id}/c_{$attach_type[2]}\" {$size[3]} style=\"margin-top:3px;margin-right:3px;margin-bottom:5px;margin-bottom: 10px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
											
										$cnt_attach++;
									} elseif(file_exists(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/c_{$attach_type[1]}")){
									
										$size = getimagesize(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/c_{$attach_type[1]}");
										
										$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/c_{$attach_type[1]}\" {$size[3]} style=\"margin-top:3px;margin-right:3px;margin-bottom:5px;margin-bottom: 10px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
											
										$cnt_attach++;
									}

								//Видео
								} elseif($attach_type[0] == 'video' AND file_exists(ROOT_DIR."/uploads/videos/{$attach_type[3]}/{$attach_type[1]}"))
									$attach_result .= "<div><a href=\"/video{$attach_type[3]}_{$attach_type[2]}\" onClick=\"videos.show({$attach_type[2]}, this.href, location.href); return false\"><img src=\"/uploads/videos/{$attach_type[3]}/{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px;margin-bottom:5px\" align=\"left\" /></a></div>";
									
								//Музыка
								elseif($attach_type[0] == 'audio'){
									$audioId = intval($attach_type[1]);
									$audioInfo = $db->super_query("SELECT artist, name, url FROM `".PREFIX."_audio` WHERE aid = '".$audioId."'");
									if($audioInfo){
										$jid++;
										$attach_result .= '<div class="audioForSize'.$row['id'].' player_mini_mbar_wall_all2" id="audioForSize" style="width:440px"><div class="audio_onetrack audio_wall_onemus" style="width:440px"><div class="audio_playic cursor_pointer fl_l" onClick="music.newStartPlay(\''.$jid.'\', '.$row['id'].')" id="icPlay_'.$row['id'].$jid.'"></div><div id="music_'.$row['id'].$jid.'" data="'.$audioInfo['url'].'" class="fl_l" style="margin-top:-1px"><a href="/?go=search&type=5&query='.$audioInfo['artist'].'" onClick="Page.Go(this.href); return false"><b>'.stripslashes($audioInfo['artist']).'</b></a> &ndash; '.stripslashes($audioInfo['name']).'</div><div id="play_time'.$row['id'].$jid.'" class="color777 fl_r no_display" style="margin-top:2px;margin-right:5px">00:00</div><div class="player_mini_mbar fl_l no_display player_mini_mbar_wall player_mini_mbar_wall_all2" id="ppbarPro'.$row['id'].$jid.'" style="width:442px"></div></div></div>';
									}

								//Смайлик
								} elseif($attach_type[0] == 'smile' AND file_exists(ROOT_DIR."/uploads/smiles/{$attach_type[1]}")){
									$attach_result .= '<img src=\"/uploads/smiles/'.$attach_type[1].'\" style="margin-right:5px" />';
									
								//Если документ
								} elseif($attach_type[0] == 'doc'){
								
									$doc_id = intval($attach_type[1]);
									
									$row_doc = $db->super_query("SELECT dname, dsize FROM `".PREFIX."_doc` WHERE did = '{$doc_id}'", false, "wall/doc{$doc_id}");
									
									if($row_doc){
										
										$attach_result .= '<div style="margin-top:5px;margin-bottom:5px" class="clear"><div class="doc_attach_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Файл <a href="/index.php?go=doc&act=download&did='.$doc_id.'" target="_blank" onMouseOver="myhtml.title(\''.$doc_id.$cnt_attach.$dbid.'\', \'<b>Размер файла: '.$row_doc['dsize'].'</b>\', \'doc_\')" id="doc_'.$doc_id.$cnt_attach.$dbid.'">'.$row_doc['dname'].'</a></div></div></div><div class="clear"></div>';
											
										$cnt_attach++;
									}
									
								} else
								
									$attach_result .= '';
							}
							if($attach_result)
								$msg = '<div style="width:442px;overflow:hidden">'.preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $msg).'<div class=\"mgclr\"></div>'.$attach_result.'</div><div class="clear"></div>';
						} else
							$msg = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $msg).'<div class=\"mgclr\"></div>'.$attach_result;
					
						$tpl->set('{text}', stripslashes($msg));
						
						$tpl->set('{msg-id}', $dbid);
						$tpl->set('{new}', 'im_class_new');
						$tpl->set('{date}', langdate('H:i:s', $server_time));
						$tpl->compile('content');
						
						//Читисм кеш обновлений
						mozg_clear_cache_file('user_'.$for_user_id.'/im');
						mozg_create_cache('user_'.$for_user_id.'/im_update', '1');
						mozg_create_cache("user_{$for_user_id}/typograf{$user_id}", "");
						
						AjaxTpl();
					} else
						echo 'err_privacy';
				} else
					echo 'no_user';
			} else
				echo 'max_strlen';
				
			die();
		break;
		
		//################### Смена типа сообщений ###################//
		case "settTypeMsg":
			NoAjaxQuery();
			
			if($user_info['user_msg_type'] == 0)
				$db->query("UPDATE `".PREFIX."_users` SET user_msg_type = 1 WHERE user_id = '".$user_info['user_id']."'");
					
			if($user_info['user_msg_type'] == 1)
				$db->query("UPDATE `".PREFIX."_users` SET user_msg_type = 0 WHERE user_id = '".$user_info['user_id']."'");

			die();
		break;
		
		//################### Прочтение сообщения ###################//
		case "read":
			NoAjaxQuery();
			$msg_id = intval($_POST['msg_id']);
			
			$check = $db->super_query("SELECT from_user_id FROM `".PREFIX."_messages` WHERE id = '".$msg_id."' AND folder = 'inbox' AND pm_read = 'no'");
			
			if($check){
				$db->query("UPDATE `".PREFIX."_messages` SET pm_read = 'yes' WHERE id = '".$msg_id."'");
				$db->query("UPDATE `".PREFIX."_messages` SET pm_read = 'yes' WHERE id = '".($msg_id+1)."'");
				$db->query("UPDATE `".PREFIX."_users` SET user_pm_num = user_pm_num-1 WHERE user_id = '".$user_id."'");
				$db->query("UPDATE `".PREFIX."_im` SET msg_num = msg_num-1 WHERE iuser_id = '".$user_id."' AND im_user_id = '".$check['from_user_id']."'");
				
				//Читисм кеш обновлений
				mozg_clear_cache_file('user_'.$check['from_user_id'].'/im');
			}
		
			die();
		break;
		
		//################### Отправка инф. что набираем сообщение ###################//
		case "typograf":
		
			NoAjaxQuery();
			
			$for_user_id = intval($_POST['for_user_id']);
			
			if($_GET['stop'] == 1)
			
				mozg_create_cache("user_{$for_user_id}/typograf{$user_id}", "");
			
			else
			
				mozg_create_cache("user_{$for_user_id}/typograf{$user_id}", 1);
			
			exit();
			
		break;

		//################### Обновление окна сообщений каждые 2 сек ###################//
		case "update":
			NoAjaxQuery();
			$for_user_id = intval($_POST['for_user_id']);
			$last_id = intval($_POST['last_id']);
			$sess_last_id = mozg_cache('user_'.$user_id.'/im');
			
			$typograf = mozg_cache("user_{$user_id}/typograf{$for_user_id}");
			if($typograf) echo "<script>$('#im_typograf').fadeIn()</script>";
			
			if($last_id == $sess_last_id){
				echo 'no_new';
				die();
			}

			$count = $db->super_query("SELECT msg_num, all_msg_num FROM `".PREFIX."_im` WHERE iuser_id = '".$user_id."' AND im_user_id = '".$for_user_id."'");
			if($count['all_msg_num'] > 20)
				$limit = $count['all_msg_num']-20;
			else
				$limit = 0;

			$sql_ = $db->super_query("SELECT tb1.id, text, date, pm_read, folder, history_user_id, from_user_id, attach, tell_uid, tell_date, public, tell_comm, tb2.user_name, user_photo FROM `".PREFIX."_messages` tb1, `".PREFIX."_users` tb2 WHERE tb1.for_user_id = '{$user_id}' AND tb1.from_user_id = '{$for_user_id}' AND tb1.history_user_id = tb2.user_id ORDER by `date` ASC LIMIT ".$limit.", 20", 1);
			
			mozg_create_cache('user_'.$user_id.'/im', $last_id);
			
			if($sql_){
				$tpl->load_template('im/msg.tpl');
				foreach($sql_ as $row){
					$tpl->set('{name}', $row['user_name']);
					$tpl->set('{folder}', $row['folder']);
					$tpl->set('{user-id}', $row['history_user_id']);
					$tpl->set('{msg-id}', $row['id']);
					if(date('Y-m-d', $row['date']) == date('Y-m-d', $server_time)) $tpl->set('{date}', langdate('H:i:s', $row['date']));
					else $tpl->set('{date}', langdate('d.m.y', $row['date']));
					if($row['user_photo']) $tpl->set('{ava}', '/uploads/users/'.$row['history_user_id'].'/50_'.$row['user_photo']);
					else $tpl->set('{ava}', '{theme}/images/no_ava_50.png');
					if($row['pm_read'] == 'no'){
						$tpl->set('{new}', 'im_class_new');
						$tpl->set('{read-js-func}', 'onMouseOver="im.read(\''.$row['id'].'\', '.$row['history_user_id'].', '.$user_id.')"');
					} else {
						$tpl->set('{new}', '');
						$tpl->set('{read-js-func}', '');
					}
					
					//Прикрипленные файлы
					if($row['attach']){
						$attach_arr = explode('||', $row['attach']);
						$cnt_attach = 1;
						$cnt_attach_link = 1;
						$jid = 0;
						$attach_result = '';
						foreach($attach_arr as $attach_file){
							$attach_type = explode('|', $attach_file);

							//Фото со стены сообщества
							if($attach_type[0] == 'photo' AND file_exists(ROOT_DIR."/uploads/groups/{$row['tell_uid']}/photos/{$attach_type[1]}")){
								
								$size = getimagesize(ROOT_DIR."/uploads/groups/{$row['tell_uid']}/photos/{$attach_type[1]}");
								
								$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/groups/{$row['tell_uid']}/photos/c_{$attach_type[1]}\"  style=\"margin-top:3px;margin-right:3px;margin-bottom:5px; max-width: 442px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '{$row['tell_uid']}', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
								
								$cnt_attach++;
								
								$resLinkTitle = '';
								
							//Фото со стены юзера
							} elseif($attach_type[0] == 'photo_u'){
								if($row['tell_uid']) $attauthor_user_id = $row['tell_uid'];
								elseif($row['history_user_id'] == $user_id) $attauthor_user_id = $user_id;
								else $attauthor_user_id = $row['from_user_id'];

								if($attach_type[1] == 'attach' AND file_exists(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}")){
									
									$size = getimagesize(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}");
									
									$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}\"  style=\"margin-top:3px;margin-right:3px;margin-bottom:5px;max-width: 442px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
										
									$cnt_attach++;
									
								} elseif(file_exists(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/{$attach_type[1]}")){

									$size = getimagesize(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}");
									
									$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px;margin-bottom:5px;max-width: 442px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
										
									$cnt_attach++;
								}

								$resLinkTitle = '';
								
							//Видео
							} elseif($attach_type[0] == 'video' AND file_exists(ROOT_DIR."/uploads/videos/{$attach_type[3]}/{$attach_type[1]}")){
							
								$size = getimagesize(ROOT_DIR."/uploads/videos/{$attach_type[3]}/{$attach_type[1]}");
								
								$attach_result .= "<div><a href=\"/video{$attach_type[3]}_{$attach_type[2]}\" onClick=\"videos.show({$attach_type[2]}, this.href, location.href); return false\"><img src=\"/uploads/videos/{$attach_type[3]}/{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px;margin-bottom:5px\" {$size[3]} align=\"left\" /></a></div>";
								
								$resLinkTitle = '';
								
							//Музыка
					} elseif($attach_type[0] == 'audio'){
						$audioId = intval($attach_type[1]);
						$audioInfo = $db->super_query("SELECT artist, name, url FROM `".PREFIX."_audio` WHERE aid = '".$audioId."'");
						if($audioInfo){
							if($_GET['uid']) $appClassWidth = 'player_mini_mbar_wall_all';
							$jid++;
							$attach_result .= '

<div class="audio page wall" id="audio'.$audioId.'_1" onclick="playAudio(\''.$audioId.'_1\')">
<div class="audio_page_wrap">
<div class="play_but fl_l"></div>
<div class="audio_info">
<div class="audio_page_time fl_r" id="audio_time'.$audioId.'_1" onclick="audio_player.setTimeDir(event);"></div>
<div class="audio_names">
<b id="artis'.$audioId.'_1">'.$audioInfo['artist'].'</b> – <span id="name'.$audioId.'_1">'.$audioInfo['name'].'</span>
</div>
<div class="clear"></div>
</div>
<input type="hidden" value="'.$audioInfo['url'].'" id="audio_src'.$audioId.'_1">
<div class="clear"></div>
<div class="page_player no_display" id="player'.$audioId.'_1">
<div class="fl_r page_player_progres_wr volume" onclick="audio_player.volumeClick.apply(this, [event])">
<div class="bg_line"></div>
<div class="volume_line"></div>
</div>
<div class="page_player_progres_wr" onclick="audio_player.progressClick.apply(this, [event])">
<div class="bg_line"></div>
<div class="load_line"></div>
<div class="play_line"></div>
</div>
<div class="clear"></div>
</div>
</div>
</div>';
	}
						
						$resLinkTitle = '';

							//Смайлик
							} elseif($attach_type[0] == 'smile' AND file_exists(ROOT_DIR."/uploads/smiles/{$attach_type[1]}")){
								$attach_result .= '<img src=\"/uploads/smiles/'.$attach_type[1].'\" style="margin-right:5px" />';
								
								$resLinkTitle = '';
							//Если ссылка
							} elseif($attach_type[0] == 'link' AND preg_match('/http:\/\/(.*?)+$/i', $attach_type[1]) AND $cnt_attach_link == 1 AND stripos(str_replace('http://www.', 'http://', $attach_type[1]), $config['home_url']) === false){
								$count_num = count($attach_type);
								$domain_url_name = explode('/', $attach_type[1]);
								$rdomain_url_name = str_replace('http://', '', $domain_url_name[2]);
								
								$attach_type[3] = stripslashes($attach_type[3]);
								$attach_type[3] = substr($attach_type[3], 0, 200);
									
								$attach_type[2] = stripslashes($attach_type[2]);
								$str_title = substr($attach_type[2], 0, 55);
								
								if(stripos($attach_type[4], '/uploads/attach/') === false){
									$attach_type[4] = '{theme}/images/no_ava_groups_100.gif';
									$no_img = false;
								} else
									$no_img = true;
								
								if(!$attach_type[3]) $attach_type[3] = '';
									
								if($no_img AND $attach_type[2]){

									$attach_result .= '<div style="margin-top:2px" class="clear"><div class="attach_link_block_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Ссылка: <a href="/away.php?url='.$attach_type[1].'" target="_blank">'.$rdomain_url_name.'</a></div></div><div class="clear"></div><div class="wall_show_block_link" style="border:0px"><a href="/away.php?url='.$attach_type[1].'" target="_blank"><div style="width:108px;height:80px;float:left;text-align:center"><img src="'.$attach_type[4].'" /></div></a><div class="attatch_link_title"><a href="/away.php?url='.$attach_type[1].'" target="_blank">'.$str_title.'</a></div><div style="max-height:50px;overflow:hidden">'.$attach_type[3].'</div></div></div>';

									$resLinkTitle = $attach_type[2];
									$resLinkUrl = $attach_type[1];
								} else if($attach_type[1] AND $attach_type[2]){
									$attach_result .= '<div style="margin-top:2px" class="clear"><div class="attach_link_block_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Ссылка: <a href="/away.php?url='.$attach_type[1].'" target="_blank">'.$rdomain_url_name.'</a></div></div></div><div class="clear"></div>';
									
									$resLinkTitle = $attach_type[2];
									$resLinkUrl = $attach_type[1];
								}
								
								$cnt_attach_link++;
								
							//Если документ
							} elseif($attach_type[0] == 'doc'){
							
								$doc_id = intval($attach_type[1]);
								
								$row_doc = $db->super_query("SELECT dname, dsize FROM `".PREFIX."_doc` WHERE did = '{$doc_id}'", false, "wall/doc{$doc_id}");
								
								if($row_doc){
									
									$attach_result .= '<div style="margin-top:5px;margin-bottom:5px" class="clear"><div class="doc_attach_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Файл <a href="/index.php?go=doc&act=download&did='.$doc_id.'" target="_blank" onMouseOver="myhtml.title(\''.$doc_id.$cnt_attach.$row['id'].'\', \'<b>Размер файла: '.$row_doc['dsize'].'</b>\', \'doc_\')" id="doc_'.$doc_id.$cnt_attach.$row['id'].'">'.$row_doc['dname'].'</a></div></div></div><div class="clear"></div>';
										
									$cnt_attach++;
								}
							
							//Если опрос
							} elseif($attach_type[0] == 'vote'){
							
								$vote_id = intval($attach_type[1]);
								
								$row_vote = $db->super_query("SELECT title, answers, answer_num FROM `".PREFIX."_votes` WHERE id = '{$vote_id}'", false, "votes/vote_{$vote_id}");
								
								if($vote_id){

									$checkMyVote = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_votes_result` WHERE user_id = '{$user_id}' AND vote_id = '{$vote_id}'", false, "votes/check{$user_id}_{$vote_id}");
									
									$row_vote['title'] = stripslashes($row_vote['title']);
									
									if(!$row['text'])
										$row['text'] = $row_vote['title'];

									$arr_answe_list = explode('|', stripslashes($row_vote['answers']));
									$max = $row_vote['answer_num'];
									
									$sql_answer = $db->super_query("SELECT answer, COUNT(*) AS cnt FROM `".PREFIX."_votes_result` WHERE vote_id = '{$vote_id}' GROUP BY answer", 1, "votes/vote_answer_cnt_{$vote_id}");
									$answer = array();
									foreach($sql_answer as $row_answer){
									
										$answer[$row_answer['answer']]['cnt'] = $row_answer['cnt'];
										
									}
									
									$attach_result .= "<div class=\"clear\" style=\"height:10px\"></div><div id=\"result_vote_block{$vote_id}\"><div class=\"wall_vote_title\">{$row_vote['title']}</div>";
									
									for($ai = 0; $ai < sizeof($arr_answe_list); $ai++){

										if(!$checkMyVote['cnt']){
										
											$attach_result .= "<div class=\"wall_vote_oneanswe\" onClick=\"Votes.Send({$ai}, {$vote_id})\" id=\"wall_vote_oneanswe{$ai}\"><input type=\"radio\" name=\"answer\" /><span id=\"answer_load{$ai}\">{$arr_answe_list[$ai]}</span></div>";
										
										} else {

											$num = $answer[$ai]['cnt'];

											if(!$num ) $num = 0;
											if($max != 0) $proc = (100 * $num) / $max;
											else $proc = 0;
											$proc = round($proc, 2);
											
											$attach_result .= "<div class=\"wall_vote_oneanswe cursor_default\">
											{$arr_answe_list[$ai]}<br />
											<div class=\"wall_vote_proc fl_l\"><div class=\"wall_vote_proc_bg\" style=\"width:".intval($proc)."%\"></div><div style=\"margin-top:-16px\">{$num}</div></div>
											<div class=\"fl_l\" style=\"margin-top:-1px\"><b>{$proc}%</b></div>
											</div><div class=\"clear\"></div>";
					
										}
									
									}
									
									if($row_vote['answer_num']) $answer_num_text = gram_record($row_vote['answer_num'], 'fave');
									else $answer_num_text = 'человек';
									
									if($row_vote['answer_num'] <= 1) $answer_text2 = 'Проголосовал';
									else $answer_text2 = 'Проголосовало';
										
									$attach_result .= "{$answer_text2} <b>{$row_vote['answer_num']}</b> {$answer_num_text}.<div class=\"clear\" style=\"margin-top:10px\"></div></div>";
									
								}

							} else
							
								$attach_result .= '';
						}
						
						if($resLinkTitle AND $row['text'] == $resLinkUrl OR !$row['text'])
							$row['text'] = $resLinkTitle.'<div class="clear"></div>'.$attach_result;
						else if($attach_result)
							$row['text'] = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $row['text']).'<div class=\"mgclr\"></div>'.$attach_result;
						else
							$row['text'] = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $row['text']);
							
					} else
						$row['text'] = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $row['text']);

					$resLinkTitle = '';
					
					//Если это запись с "рассказать друзьям"
					if($row['tell_uid']){
						if($row['public'])
							$rowUserTell = $db->super_query("SELECT title, photo FROM `".PREFIX."_communities` WHERE id = '{$row['tell_uid']}'", false, "wall/group{$row['tell_uid']}");
						else
							$rowUserTell = $db->super_query("SELECT user_search_pref, user_photo FROM `".PREFIX."_users` WHERE user_id = '{$row['tell_uid']}'");

						if(date('Y-m-d', $row['tell_date']) == date('Y-m-d', $server_time))
							$dateTell = langdate('сегодня в H:i', $row['tell_date']);
						elseif(date('Y-m-d', $row['tell_date']) == date('Y-m-d', ($server_time-84600)))
							$dateTell = langdate('вчера в H:i', $row['tell_date']);
						else
							$dateTell = langdate('j F Y в H:i', $row['tell_date']);
						
						if($row['public']){
							$rowUserTell['user_search_pref'] = stripslashes($rowUserTell['title']);
							$tell_link = 'public';
							if($rowUserTell['photo'])
								$avaTell = '/uploads/groups/'.$row['tell_uid'].'/50_'.$rowUserTell['photo'];
							else
								$avaTell = '{theme}/images/no_ava_50.png';
						} else {
							$tell_link = 'u';
							if($rowUserTell['user_photo'])
								$avaTell = '/uploads/users/'.$row['tell_uid'].'/50_'.$rowUserTell['user_photo'];
							else
								$avaTell = '{theme}/images/no_ava_50.png';
						}

						$row['text'] = <<<HTML
{$row['tell_comm']}
<div class="wall_repost_border">
<div class="wall_tell_info"><div class="wall_tell_ava"><a href="/{$tell_link}{$row['tell_uid']}" onClick="Page.Go(this.href); return false"><img src="{$avaTell}" width="30" /></a></div><div class="wall_tell_name"><a href="/{$tell_link}{$row['tell_uid']}" onClick="Page.Go(this.href); return false"><b>{$rowUserTell['user_search_pref']}</b></a></div><div class="wall_tell_date">{$dateTell}</div></div>{$row['text']}
<div class="clear"></div>
</div>
HTML;
					}
					
					$tpl->set('{text}', stripslashes($row['text']));
					
					$tpl->compile('content');
				}
				
				AjaxTpl();
				
			}
				
			die();
		break;
		
		//################### Просмотр истории сообещений с юзером ###################//
		case "history":
			NoAjaxQuery();
			$for_user_id = intval($_POST['for_user_id']);
			$first_id = intval($_POST['first_id']);
			$for_user_name = ajax_utf8(textFilter($_POST['for_user_name']));
			
			mozg_create_cache("user_{$for_user_id}/typograf{$user_id}", "");
			 
			//FOR MOBILE VERSION 1.0
			if($config['temp'] == 'mobile'){
				
				$sqlNEW = $db->super_query("SELECT id FROM `".PREFIX."_messages` WHERE history_user_id = '{$for_user_id}' AND for_user_id = '{$user_id}' AND pm_read = 'no'", 1);
				
				if($sqlNEW){
				
					$newMSGnum = 0;
					
					foreach($sqlNEW as $rowNEW){
					
						$newMSGnum++;
						
						//Обновляем кол-во сообщений
						$db->query("UPDATE `".PREFIX."_messages` SET pm_read = 'yes' WHERE id = '".$rowNEW['id']."'");
						$db->query("UPDATE `".PREFIX."_messages` SET pm_read = 'yes' WHERE id = '".($rowNEW['id']+1)."'");

					}
					
					$db->query("UPDATE `".PREFIX."_im` SET msg_num = msg_num-{$newMSGnum} WHERE iuser_id = '".$user_id."' AND im_user_id = '".$for_user_id."'");
					$db->query("UPDATE `".PREFIX."_users` SET user_pm_num = user_pm_num-{$newMSGnum} WHERE user_id = '".$user_id."'");
					
					//Читисм кеш обновлений
					mozg_clear_cache_file('user_'.$for_user_id.'/im');
				
				}
				
				$limit_msg = 5;
				
			} else
			
				$limit_msg = 20;
			
			if($first_id > 0){
				$count = $db->super_query("SELECT COUNT(*) AS all_msg_num FROM `".PREFIX."_messages` WHERE from_user_id = '".$for_user_id."' AND for_user_id = '".$user_id."' AND id < ".$first_id);
				$sql_sort = "AND id < ".$first_id;

				if($count['all_msg_num'] > $limit_msg)
					$limit = $count['all_msg_num']-$limit_msg;
				else
					$limit = 0;
			} else {
				$count = $db->super_query("SELECT all_msg_num FROM `".PREFIX."_im` WHERE iuser_id = '".$user_id."' AND im_user_id = '".$for_user_id."'");
				if($count['all_msg_num'] > $limit_msg)
					$limit = $count['all_msg_num']-$limit_msg;
				else
					$limit = 0;
			}
			
			$sql_ = $db->super_query("SELECT tb1.id, text, date, pm_read, folder, history_user_id, from_user_id, attach, tell_uid, tell_date, public, tell_comm, tb2.user_name, user_photo, user_search_pref FROM `".PREFIX."_messages` tb1, `".PREFIX."_users` tb2 WHERE tb1.for_user_id = '".$user_id."' AND tb1.from_user_id = '".$for_user_id."' AND tb1.history_user_id = tb2.user_id {$sql_sort} ORDER by `date` ASC LIMIT ".$limit.", ".$limit_msg, 1);
			$tpl->load_template('im/msg.tpl');
				
			if(!$first_id){
				$tpl->result['content'] .= '<div class="im_speedbar"><a href="/u'.$for_user_id.'" onclick="Page.Go(this.href); return false">'.$for_user_name.'</a></div><div class="im_scroll">';
				
				 
				// FOR MOBILE
				if($config['temp'] == 'mobile')
					$stylesMOB = 'width:100%;margin-bottom:10px';
				else
					$stylesMOB = 'width:520px';
				
				if($count['all_msg_num'] > $limit_msg)
					$tpl->result['content'] .= '<div class="cursor_pointer" onClick="im.page('.$for_user_id.'); return false" id="wall_all_records" style="'.$stylesMOB.'"><div class="public_wall_all_comm" id="load_wall_all_records" style="margin-left:0px">Показать предыдущие сообщения</div></div><div id="prevMsg"></div>';
					
				$tpl->result['content'] .= '<div id="im_scroll">';
				
				if(!$sql_)
					$tpl->result['content'] .= '<div class="info_center"><div style="padding-top:210px">Здесь будет выводиться история переписки.</div></div>';
			}
				
			if($sql_){
				foreach($sql_ as $row){
					$tpl->set('{name}', $row['user_name']);
					$tpl->set('{folder}', $row['folder']);
					$tpl->set('{user-id}', $row['history_user_id']);
					$tpl->set('{msg-id}', $row['id']);
					if(date('Y-m-d', $row['date']) == date('Y-m-d', $server_time)) $tpl->set('{date}', langdate('H:i:s', $row['date']));
					else $tpl->set('{date}', langdate('d.m.y', $row['date']));
					if($row['user_photo']) $tpl->set('{ava}', '/uploads/users/'.$row['history_user_id'].'/50_'.$row['user_photo']);
					else $tpl->set('{ava}', '{theme}/images/no_ava_50.png');
					if($row['pm_read'] == 'no'){
						$tpl->set('{new}', 'im_class_new');
						$tpl->set('{read-js-func}', 'onMouseOver="im.read(\''.$row['id'].'\', '.$row['history_user_id'].', '.$user_id.')"');
					} else {
						$tpl->set('{new}', '');
						$tpl->set('{read-js-func}', '');
					}
					
					//Прикрипленные файлы
					if($row['attach']){
						$attach_arr = explode('||', $row['attach']);
						$cnt_attach = 1;
						$cnt_attach_link = 1;
						$jid = 0;
						$attach_result = '';
						foreach($attach_arr as $attach_file){
							$attach_type = explode('|', $attach_file);
							
							//Фото со стены сообщества
							if($attach_type[0] == 'photo' AND file_exists(ROOT_DIR."/uploads/groups/{$row['tell_uid']}/photos/{$attach_type[1]}")){
							
								$size = getimagesize(ROOT_DIR."/uploads/groups/{$row['tell_uid']}/photos/{$attach_type[1]}");
								
								$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/groups/{$row['tell_uid']}/photos/{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px;margin-bottom:15px;max-width: 442px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '{$row['tell_uid']}', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
								
								$cnt_attach++;
								
								$resLinkTitle = '';
								
							//Фото со стены юзера
							} elseif($attach_type[0] == 'photo_u'){
								if($row['tell_uid']) $attauthor_user_id = $row['tell_uid'];
								elseif($row['history_user_id'] == $user_id) $attauthor_user_id = $user_id;
								else $attauthor_user_id = $row['from_user_id'];

								if($attach_type[1] == 'attach' AND file_exists(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}")){
									
									$size = getimagesize(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}");
									
									$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}\" style=\"margin-top:3px;margin-right:3px;margin-bottom:15px;max-width: 442px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
										
									$cnt_attach++;
									
								} elseif(file_exists(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/{$attach_type[1]}")){

									$size = getimagesize(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}");
									
									$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/{$attach_type[1]}\" {$size[3]} style=\"margin-top:3px;margin-right:3px;margin-bottom:15px;max-width: 442px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
										
									$cnt_attach++;
								}

								$resLinkTitle = '';
								
					//Видео
					} elseif($attach_type[0] == 'video' AND file_exists(ROOT_DIR."/uploads/videos/{$attach_type[3]}/{$attach_type[1]}")){
					
						$for_cnt_attach_video = explode('video|', $row_wall['attach']);
						$cnt_attach_video = count($for_cnt_attach_video)-1;
				
						if($cnt_attach_video == 1 AND preg_match('/(photo|photo_u)/i', $row_wall['attach']) == false){
							
							$video_id = intval($attach_type[2]);
							
							$row_video = $db->super_query("SELECT video, title FROM `".PREFIX."_videos` WHERE id = '{$video_id}'", false, "wall/video{$video_id}");
							$row_video['title'] = stripslashes($row_video['title']);
							$row_video['video'] = stripslashes($row_video['video']);
							$row_video['video'] = strtr($row_video['video'], array('width="770"' => 'width="390"', 'height="420"' => 'height="310"'));
							
							$attach_result .= "<div class=\"profile_album_block cursor_pointer clear\" id=\"no_video_frame{$video_id}\" onClick=\"videos.show({$attach_type[2]}, this.href, location.href); return false;\">
							<div class=\"icon-play-4\" style=\"margin-top: 4px;margin-left: 3px;\"></div><img src=\"/uploads/videos/{$attach_type[3]}/{$attach_type[1]}\" style=\"margin-top:3px\" width=\"175\" height=\"131\" /></div><div id=\"video_frame{$video_id}\" class=\"no_display\" style=\"padding-top:3px\">{$row_video['video']}</div><div class=\"video_inline_vititle\" style=\"display:none;\"></div><a href=\"/video{$attach_type[3]}_{$attach_type[2]}\" onClick=\"videos.show({$attach_type[2]}, this.href, location.href); return false\"></a>";
						
						} else {
							
							$attach_result .= "<div class=\"profile_album_block fl_l\" style=\"    height: 147px;\"><a href=\"/video{$attach_type[3]}_{$attach_type[2]}\" onClick=\"videos.show({$attach_type[2]}, this.href, location.href); return false\"><div class=\"icon-play-4\" style=\"    margin-top: 19px;margin-left: 7px;\"></div><img src=\"/uploads/videos/{$attach_type[3]}/{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px\" align=\"left\" /></a></div>";
							
						}

						$resLinkTitle = '';
								
							//Музыка
					} elseif($attach_type[0] == 'audio'){
						$audioId = intval($attach_type[1]);
						$audioInfo = $db->super_query("SELECT artist, name, url FROM `".PREFIX."_audio` WHERE aid = '".$audioId."'");
						if($audioInfo){
							if($_GET['uid']) $appClassWidth = 'player_mini_mbar_wall_all';
							$jid++;
							$attach_result .= '

<div class="audio page wall" id="audio'.$audioId.'_1" onclick="playAudio(\''.$audioId.'_1\')">
<div class="audio_page_wrap">
<div class="play_but fl_l"></div>
<div class="audio_info">
<div class="audio_page_time fl_r" id="audio_time'.$audioId.'_1" onclick="audio_player.setTimeDir(event);"></div>
<div class="audio_names">
<b id="artis'.$audioId.'_1">'.$audioInfo['artist'].'</b> – <span id="name'.$audioId.'_1">'.$audioInfo['name'].'</span>
</div>
<div class="clear"></div>
</div>
<input type="hidden" value="'.$audioInfo['url'].'" id="audio_src'.$audioId.'_1">
<div class="clear"></div>
<div class="page_player no_display" id="player'.$audioId.'_1">
<div class="fl_r page_player_progres_wr volume" onclick="audio_player.volumeClick.apply(this, [event])">
<div class="bg_line"></div>
<div class="volume_line"></div>
</div>
<div class="page_player_progres_wr" onclick="audio_player.progressClick.apply(this, [event])">
<div class="bg_line"></div>
<div class="load_line"></div>
<div class="play_line"></div>
</div>
<div class="clear"></div>
</div>
</div>
</div>';
	}
						
						$resLinkTitle = '';

							//Смайлик
							} elseif($attach_type[0] == 'smile' AND file_exists(ROOT_DIR."/uploads/smiles/{$attach_type[1]}")){
								$attach_result .= '<img src=\"/uploads/smiles/'.$attach_type[1].'\" style="margin-right:5px" />';
								
								$resLinkTitle = '';
							//Если ссылка
							} elseif($attach_type[0] == 'link' AND preg_match('/http:\/\/(.*?)+$/i', $attach_type[1]) AND $cnt_attach_link == 1 AND stripos(str_replace('http://www.', 'http://', $attach_type[1]), $config['home_url']) === false){
								$count_num = count($attach_type);
								$domain_url_name = explode('/', $attach_type[1]);
								$rdomain_url_name = str_replace('http://', '', $domain_url_name[2]);
								
								$attach_type[3] = stripslashes($attach_type[3]);
								$attach_type[3] = substr($attach_type[3], 0, 200);
									
								$attach_type[2] = stripslashes($attach_type[2]);
								$str_title = substr($attach_type[2], 0, 55);
								
								if(stripos($attach_type[4], '/uploads/attach/') === false){
									$attach_type[4] = '{theme}/images/no_ava_groups_100.gif';
									$no_img = false;
								} else
									$no_img = true;
								
								if(!$attach_type[3]) $attach_type[3] = '';
									
								if($no_img AND $attach_type[2]){

									$attach_result .= '<div style="margin-top:2px" class="clear"><div class="attach_link_block_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Ссылка: <a href="/away.php?url='.$attach_type[1].'" target="_blank">'.$rdomain_url_name.'</a></div></div><div class="clear"></div><div class="wall_show_block_link" style="border:0px"><a href="/away.php?url='.$attach_type[1].'" target="_blank"><div style="width:108px;height:80px;float:left;text-align:center"><img src="'.$attach_type[4].'" /></div></a><div class="attatch_link_title"><a href="/away.php?url='.$attach_type[1].'" target="_blank">'.$str_title.'</a></div><div style="max-height:50px;overflow:hidden">'.$attach_type[3].'</div></div></div>';

									$resLinkTitle = $attach_type[2];
									$resLinkUrl = $attach_type[1];
								} else if($attach_type[1] AND $attach_type[2]){
									$attach_result .= '<div style="margin-top:2px" class="clear"><div class="attach_link_block_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Ссылка: <a href="/away.php?url='.$attach_type[1].'" target="_blank">'.$rdomain_url_name.'</a></div></div></div><div class="clear"></div>';
									
									$resLinkTitle = $attach_type[2];
									$resLinkUrl = $attach_type[1];
								}
								
								$cnt_attach_link++;
								
							//Если документ
							} elseif($attach_type[0] == 'doc'){
							
								$doc_id = intval($attach_type[1]);
								
								$row_doc = $db->super_query("SELECT dname, dsize FROM `".PREFIX."_doc` WHERE did = '{$doc_id}'", false, "wall/doc{$doc_id}");
								
								if($row_doc){
									
									$attach_result .= '<div style="margin-top:5px;margin-bottom:5px" class="clear"><div class="doc_attach_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Файл <a href="/index.php?go=doc&act=download&did='.$doc_id.'" target="_blank" onMouseOver="myhtml.title(\''.$doc_id.$cnt_attach.$row['id'].'\', \'<b>Размер файла: '.$row_doc['dsize'].'</b>\', \'doc_\')" id="doc_'.$doc_id.$cnt_attach.$row['id'].'">'.$row_doc['dname'].'</a></div></div></div><div class="clear"></div>';
										
									$cnt_attach++;
								}
								
							//Если опрос
							} elseif($attach_type[0] == 'vote'){
							
								$vote_id = intval($attach_type[1]);
								
								$row_vote = $db->super_query("SELECT title, answers, answer_num FROM `".PREFIX."_votes` WHERE id = '{$vote_id}'", false, "votes/vote_{$vote_id}");
								
								if($vote_id){

									$checkMyVote = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_votes_result` WHERE user_id = '{$user_id}' AND vote_id = '{$vote_id}'", false, "votes/check{$user_id}_{$vote_id}");
									
									$row_vote['title'] = stripslashes($row_vote['title']);
									
									if(!$row['text'])
										$row['text'] = $row_vote['title'];

									$arr_answe_list = explode('|', stripslashes($row_vote['answers']));
									$max = $row_vote['answer_num'];
									
									$sql_answer = $db->super_query("SELECT answer, COUNT(*) AS cnt FROM `".PREFIX."_votes_result` WHERE vote_id = '{$vote_id}' GROUP BY answer", 1, "votes/vote_answer_cnt_{$vote_id}");
									$answer = array();
									foreach($sql_answer as $row_answer){
									
										$answer[$row_answer['answer']]['cnt'] = $row_answer['cnt'];
										
									}
									
									$attach_result .= "<div class=\"clear\" style=\"height:10px\"></div><div id=\"result_vote_block{$vote_id}\"><div class=\"wall_vote_title\">{$row_vote['title']}</div>";
									
									for($ai = 0; $ai < sizeof($arr_answe_list); $ai++){

										if(!$checkMyVote['cnt']){
										
											$attach_result .= "<div class=\"wall_vote_oneanswe\" onClick=\"Votes.Send({$ai}, {$vote_id})\" id=\"wall_vote_oneanswe{$ai}\"><input type=\"radio\" name=\"answer\" /><span id=\"answer_load{$ai}\">{$arr_answe_list[$ai]}</span></div>";
										
										} else {

											$num = $answer[$ai]['cnt'];

											if(!$num ) $num = 0;
											if($max != 0) $proc = (100 * $num) / $max;
											else $proc = 0;
											$proc = round($proc, 2);
											
											$attach_result .= "<div class=\"wall_vote_oneanswe cursor_default\">
											{$arr_answe_list[$ai]}<br />
											<div class=\"wall_vote_proc fl_l\"><div class=\"wall_vote_proc_bg\" style=\"width:".intval($proc)."%\"></div><div style=\"margin-top:-16px\">{$num}</div></div>
											<div class=\"fl_l\" style=\"margin-top:-1px\"><b>{$proc}%</b></div>
											</div><div class=\"clear\"></div>";
					
										}
									
									}
									
									if($row_vote['answer_num']) $answer_num_text = gram_record($row_vote['answer_num'], 'fave');
									else $answer_num_text = 'человек';
									
									if($row_vote['answer_num'] <= 1) $answer_text2 = 'Проголосовал';
									else $answer_text2 = 'Проголосовало';
										
									$attach_result .= "{$answer_text2} <b>{$row_vote['answer_num']}</b> {$answer_num_text}.<div class=\"clear\" style=\"margin-top:10px\"></div></div>";
									
								}
								
							} else
							
								$attach_result .= '';
						
						}
						
						if($resLinkTitle AND $row['text'] == $resLinkUrl OR !$row['text'])
							$row['text'] = $resLinkTitle.'<div class="clear"></div>'.$attach_result;
						else if($attach_result)
							$row['text'] = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $row['text']).'<div class=\"mgclr\"></div>'.$attach_result;
						else
							$row['text'] = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $row['text']);
							
					} else
						$row['text'] = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $row['text']);
					
					$resLinkTitle = '';
					
					//Если это запись с "рассказать друзьям"
					if($row['tell_uid']){
						if($row['public'])
							$rowUserTell = $db->super_query("SELECT title, photo FROM `".PREFIX."_communities` WHERE id = '{$row['tell_uid']}'", false, "wall/group{$row['tell_uid']}");
						else
							$rowUserTell = $db->super_query("SELECT user_search_pref, user_photo FROM `".PREFIX."_users` WHERE user_id = '{$row['tell_uid']}'");

						if(date('Y-m-d', $row['tell_date']) == date('Y-m-d', $server_time))
							$dateTell = langdate('сегодня в H:i', $row['tell_date']);
						elseif(date('Y-m-d', $row['tell_date']) == date('Y-m-d', ($server_time-84600)))
							$dateTell = langdate('вчера в H:i', $row['tell_date']);
						else
							$dateTell = langdate('j F Y в H:i', $row['tell_date']);
						
						if($row['public']){
							$rowUserTell['user_search_pref'] = stripslashes($rowUserTell['title']);
							$tell_link = 'public';
							if($rowUserTell['photo'])
								$avaTell = '/uploads/groups/'.$row['tell_uid'].'/50_'.$rowUserTell['photo'];
							else
								$avaTell = '{theme}/images/no_ava_50.png';
						} else {
							$tell_link = 'u';
							if($rowUserTell['user_photo'])
								$avaTell = '/uploads/users/'.$row['tell_uid'].'/50_'.$rowUserTell['user_photo'];
							else
								$avaTell = '{theme}/images/no_ava_50.png';
						}

						$row['text'] = <<<HTML
{$row['tell_comm']}
<div class="wall_repost_border">
<div class="wall_tell_info"><div class="wall_tell_ava"><a href="/{$tell_link}{$row['tell_uid']}" onClick="Page.Go(this.href); return false"><img src="{$avaTell}" width="30" /></a></div><div class="wall_tell_name"><a href="/{$tell_link}{$row['tell_uid']}" onClick="Page.Go(this.href); return false"><b>{$rowUserTell['user_search_pref']}</b></a></div><div class="wall_tell_date">{$dateTell}</div></div>{$row['text']}
<div class="clear"></div>
</div>
HTML;
					}
					
					$tpl->set('{text}', stripslashes($row['text']));
					
					$tpl->compile('content');
				}
			}
				
			if(!$first_id)
				$tpl->result['content'] .= '</div></div>';
				
			if(!$first_id){
				$tpl->load_template('im/form.tpl');
				$tpl->set('{for_user_id}', $for_user_id);
				//Выводим информцию о том кто смотрит страницу для себя
				$im_user_id = intval($_POST['im_user_id']);
				$rowxxx = $db->super_query("SELECT user_photo, user_name, user_last_visit FROM `".PREFIX."_users` WHERE user_id = '".$for_user_id."'");
				$myInfo = $db->super_query("SELECT user_name FROM `".PREFIX."_users` WHERE user_id = '".$user_id."'");
				$tpl->set('{myuser-id}', $user_id);
				$tpl->set('{my-name}', $myInfo['user_name']);
				if($user_info['user_photo'])
					$tpl->set('{my-ava}', '/uploads/users/'.$user_id.'/50_'.$user_info['user_photo']);
				else
					$tpl->set('{my-ava}', '{theme}/images/no_ava_50.png');
				if($rowxxx['user_photo'])
					$tpl->set('{for-ava}', '/uploads/users/'.$for_user_id.'/50_'.$rowxxx['user_photo']);
				else
					$tpl->set('{for-ava}', '{theme}/images/no_ava_50.png');
				if($rowxxx['user_last_visit'] >= $online_time) $tpl->set('{online}', '<span class="onnew" style="margin-left: 67px;margin-top: 37px;"></span>');
				else $tpl->set('{online}', '');
				$tpl->compile('content');
			}
			
			AjaxTpl();
			
			die();
		break;
		
		//################### Обновление диалогов ###################//
		case "upDialogs":
			NoAjaxQuery();
			$update = mozg_cache('user_'.$user_id.'/im_update');
			
			if($update){
				$sql_ = $db->super_query("SELECT tb1.msg_num, im_user_id FROM `".PREFIX."_im` tb1, `".PREFIX."_users` tb2 WHERE tb1.iuser_id = '".$user_id."' AND tb1.im_user_id = tb2.user_id AND msg_num > 0 ORDER by `idate` DESC LIMIT 0, 50", 1);
				foreach($sql_ as $row){
					$res .= '$("#upNewMsg'.$row['im_user_id'].'").html(\'<div class="im_new fl_l" id="msg_num'.$row['im_user_id'].'">'.$row['msg_num'].'</div>\').show();';
				}

				if($user_info['user_pm_num']){
					$user_pm_num_2 = "<div class=\"headm_newac\">{$user_info['user_pm_num']}</div>";
					$doc_title = 'document.title = \'('.$user_info['user_pm_num'].') Новые сообщения\';';
				} else {
					$doc_title = 'document.title = \'Диалоги\';';
					mozg_create_cache('user_'.$user_id.'/im_update', '0');
				}
		
				echo '<script type="text/javascript">
				'.$doc_title.'
				$(\'#new_msg\').html(\''.$user_pm_num_2.'\');
				(function(){
				        Tinycon.setBubble('.$user_info['user_pm_num'].');	
				})();		
				'.$res.'
				</script>';
			}
			die();
		break;
		
		//################### Удаление диалога ###################//
		case "del":
			
			$im_user_id = intval($_POST['im_user_id']);

			//Выводим информацию о диалоге
			$row = $db->super_query("SELECT msg_num, all_msg_num FROM `".PREFIX."_im` WHERE iuser_id = '{$user_id}' AND im_user_id = '{$im_user_id}'");
			
			if($row){
			
				//Удаляем сообщения
				if($row['all_msg_num']){
					
					$db->query("DELETE FROM `".PREFIX."_messages` WHERE for_user_id = '{$user_id}' AND from_user_id = '{$im_user_id}'");
				
				}
				
				//Если есть новые сообщения
				if($row['msg_num']){
					
					$db->query("UPDATE `".PREFIX."_users` SET user_pm_num = user_pm_num-{$row['msg_num']} WHERE user_id = '{$user_id}'");
					
				}
				
				//Удаляем сам диалог
				$db->query("DELETE FROM `".PREFIX."_im` WHERE iuser_id = '{$user_id}' AND im_user_id = '{$im_user_id}'");
				
			}
			
			exit;
			
		break;
		
		//################### Список друзей в диалогах ###################//
		case "new":
		$user_id = $user_info['user_id'];
		if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
		$gcount = 20;
		$limit_page = ($page-1)*$gcount;
		//Выводим кол-во друзей из таблицы юзеров
					$friends_sql = $db->super_query("SELECT user_name, user_friends_num FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			if($friends_sql['user_friends_num']){
			$sql_ = $db->super_query("SELECT tb1.friend_id, tb2.user_birthday, user_photo, user_search_pref, user_country_city_name, user_last_visit, user_logged_mobile FROM `".PREFIX."_friends` tb1, `".PREFIX."_users` tb2 WHERE tb1.user_id = '{$user_id}' AND tb1.friend_id = tb2.user_id AND tb1.subscriptions = 0 ORDER by `views` DESC LIMIT {$limit_page}, {$gcount}", 1);
if($sql_){
							$tpl->load_template('im/friend.tpl');
							foreach($sql_ as $row){
										
								$tpl->set('{user-id}', $row['friend_id']);
								$tpl->set('{name}', $row['user_search_pref']);
									
								// FOR MOBILE VERSION 1.0
								if($config['temp'] == 'mobile'){
									
									$avaPREFver = '50_';
									$noAvaPrf = 'no_ava_50.png';
									
								} else {
								
									$avaPREFver = '100_';
									$noAvaPrf = '100_no_ava.png';
								
								}
									
								if($row['user_photo'])
									$tpl->set('{ava}', $config['home_url'].'uploads/users/'.$row['friend_id'].'/'.$avaPREFver.$row['user_photo']);
								else
									$tpl->set('{ava}', "{theme}/images/{$noAvaPrf}");
								
								OnlineTpl($row['user_last_visit'], $row['user_logged_mobile']);


								$tpl->compile('content');
							}
							navigation($gcount, $friends_sql['user_friends_num'], $config['home_url'].'friends/'.$get_user_id.'/page/');
						} else
							msgbox('', $lang['no_requests'], 'info_2');
			} else {
			
			$tpl->result['info'] .= '<div class="info_center"><div style="padding-top:180px">У Вас нет друзей.<br>Вы можете написать кому нибудь из списка ниже или <a href="/?go=search&query=&type=1&user_photo=1" onclick="Page.Go(this.href); return false;">перейти к поиску »</a></div></div>';
			
									$rec_ = $db->super_query("SELECT user_id, user_name, user_lastname, user_photo, user_birthday, user_country_city_name, user_logged_mobile FROM `".PREFIX."_users` WHERE user_photo ORDER by rand() LIMIT 4", 1);
			
	if($rec_ AND $get_user_id = $user_info['user_id']){		
	
			$tpl->result['info'] .= '<div style="padding-right: 0px;width:517px;margin:auto;margin-top:20px;padding-right: 0px; width: 540px; margin: auto; margin-left: -5px; margin-top: 20px;">';
			$tpl->load_template('recommendations/people.tpl');
			foreach($rec_ as $row){
			
			$check_friend = CheckFriends($row['user_id']);
			
			if(!$check_friend){
				$tpl->set('{user-id}', $row['user_id']);
				$tpl->set('{full_name}', $row['user_name'].' '.$row['user_lastname']);
				$tpl->set('{name}', $row['user_name'].'<br>'.$row['user_lastname']);
				if($row['user_photo']) 
					$tpl->set('{ava}', $config['home_url'].'uploads/users/'.$row['user_id'].'/100_'.$row['user_photo']);
				else 
					$tpl->set('{ava}', '{theme}/images/100_no_ava.png');
				//Возраст юзера
				$user_birthday = explode('-', $row['user_birthday']);
				$tpl->set('{age}', user_age($user_birthday[0], $user_birthday[1], $user_birthday[2]));
				
				$user_country_city_name = explode('|', $row['user_country_city_name']);
				$tpl->set('{country}', $user_country_city_name[0]);
				if($user_country_city_name[1])
					$tpl->set('{city}', ', '.$user_country_city_name[1]);
				else
					$tpl->set('{city}', '');
					
				
				//Проверка естьли запрашиваемый юзер в друзьях у юзера который смотрит стр
				if($check_friend){
					$tpl->set('[yes-friends]', '');
					$tpl->set('[/yes-friends]', '');
					$tpl->set_block("'\\[no-friends\\](.*?)\\[/no-friends\\]'si","");
				} else 
					$tpl->set('[no-friends]', '');
					$tpl->set('[/no-friends]', '');
					$tpl->set_block("'\\[yes-friends\\](.*?)\\[/yes-friends\\]'si","");						
				
				if($row['user_id'] != $user_id){
					$tpl->set('[owner]', '');
					$tpl->set('[/owner]', '');
				} else
					$tpl->set_block("'\\[owner\\](.*?)\\[/owner\\]'si","");
				
				OnlineTpl($row['user_last_visit'], $row['user_logged_mobile']);

				}
				$tpl->compile('info');
				
				
			}
			$tpl->result['content'] .= '<div class="clear"></div></div>';
}

			}
		
					AjaxTpl();
			die();
		break;
		//################### Поиск сообщений в диалогах ###################//
		case "search":
				$user_id = $user_info['user_id'];
			$query = ajax_utf8(textFilter($_POST['query']));
				$limit_msg = 20;
			
			
				$count = $db->super_query("SELECT COUNT(*) AS all_msg_num FROM `".PREFIX."_messages` WHERE from_user_id = {$user_id} AND text LIKE '%{$query}%'");
				$sql_sort = " ";

				if($count['all_msg_num'] > $limit_msg)
					$limit = $count['all_msg_num']-$limit_msg;
				else
					$limit = 0;
			
			
			$sql_ = $db->super_query("SELECT tb1.id, text, date, pm_read, folder, history_user_id, from_user_id, attach, tell_uid, tell_date, public, tell_comm, tb2.user_id, user_name, user_photo, user_search_pref FROM `".PREFIX."_messages` tb1, `".PREFIX."_users` tb2 WHERE tb1.from_user_id = {$user_id} AND tb1.for_user_id = tb2.user_id AND tb1.text LIKE '%{$query}%' ORDER by `date` ASC LIMIT ".$limit.", ".$limit_msg, 1);
			$tpl->load_template('im/msg.tpl');
				
			
				$tpl->result['content'] .= '<div class="im_speedbar"><div class="allbar_title" style="border-bottom:0px;padding: 0px;margin-bottom: 0px;">Найдено '.$count['all_msg_num'].' сообщений</div></div><div class="im_scroll">';
				
				// FOR MOBILE
				if($config['temp'] == 'mobile')
					$stylesMOB = 'width:100%;margin-bottom:10px';
				else
					$stylesMOB = 'width:520px';
				
				if($count['all_msg_num'] > $limit_msg)
					$tpl->result['content'] .= '<div class="cursor_pointer" onClick="im.page('.$for_user_id.'); return false" id="wall_all_records" style="'.$stylesMOB.'"><div class="public_wall_all_comm" id="load_wall_all_records" style="margin-left:0px">Показать предыдущие сообщения</div></div><div id="prevMsg"></div>';
					
				$tpl->result['content'] .= '<div id="im_scroll">';
				
				if(!$sql_)
					$tpl->result['content'] .= '<div class="info_center"><div style="padding-top:210px">Ни одного сообщения не найдено.</div></div>';
			
				
			if($sql_){
				foreach($sql_ as $row){
					$tpl->set('{name}', $row['user_name']);
					$tpl->set('{folder}', $row['folder']);
					$tpl->set('{user-id}', $row['user_id']);
					$tpl->set('{msg-id}', $row['id']);
					if(date('Y-m-d', $row['date']) == date('Y-m-d', $server_time)) $tpl->set('{date}', langdate('H:i:s', $row['date']));
					else $tpl->set('{date}', langdate('d.m.y', $row['date']));
					if($row['user_photo']) $tpl->set('{ava}', '/uploads/users/'.$row['user_id'].'/50_'.$row['user_photo']);
					else $tpl->set('{ava}', '{theme}/images/no_ava_50.png');
					if($row['pm_read'] == 'no'){
						$tpl->set('{new}', 'im_class_new');
						$tpl->set('{read-js-func}', 'onMouseOver="im.read(\''.$row['id'].'\', '.$row['user_id'].', '.$user_id.')"');
					} else {
						$tpl->set('{new}', '');
						$tpl->set('{read-js-func}', '');
					}
					
					//Прикрипленные файлы
					if($row['attach']){
						$attach_arr = explode('||', $row['attach']);
						$cnt_attach = 1;
						$cnt_attach_link = 1;
						$jid = 0;
						$attach_result = '';
						foreach($attach_arr as $attach_file){
							$attach_type = explode('|', $attach_file);
							
							//Фото со стены сообщества
							if($attach_type[0] == 'photo' AND file_exists(ROOT_DIR."/uploads/groups/{$row['tell_uid']}/photos/{$attach_type[1]}")){
							
								$size = getimagesize(ROOT_DIR."/uploads/groups/{$row['tell_uid']}/photos/{$attach_type[1]}");
								
								$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/groups/{$row['tell_uid']}/photos/{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px;margin-bottom:15px;max-width: 442px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '{$row['tell_uid']}', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
								
								$cnt_attach++;
								
								$resLinkTitle = '';
								
							//Фото со стены юзера
							} elseif($attach_type[0] == 'photo_u'){
								if($row['tell_uid']) $attauthor_user_id = $row['tell_uid'];
								elseif($row['history_user_id'] == $user_id) $attauthor_user_id = $user_id;
								else $attauthor_user_id = $row['from_user_id'];

								if($attach_type[1] == 'attach' AND file_exists(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}")){
									
									$size = getimagesize(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}");
									
									$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}\" style=\"margin-top:3px;margin-right:3px;margin-bottom:15px;max-width: 442px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
										
									$cnt_attach++;
									
								} elseif(file_exists(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/{$attach_type[1]}")){

									$size = getimagesize(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}");
									
									$attach_result .= "<img id=\"photo_wall_{$row['id']}_{$cnt_attach}\" src=\"/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/{$attach_type[1]}\" {$size[3]} style=\"margin-top:3px;margin-right:3px;margin-bottom:15px;max-width: 442px;\" align=\"left\" onClick=\"groups.wall_photo_view('{$row['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row['id']}\" />";
										
									$cnt_attach++;
								}

								$resLinkTitle = '';
								
							//Видео
							} elseif($attach_type[0] == 'video' AND file_exists(ROOT_DIR."/uploads/videos/{$attach_type[3]}/{$attach_type[1]}")){
							
								$size = getimagesize(ROOT_DIR."/uploads/videos/{$attach_type[3]}/{$attach_type[1]}");
								
								$attach_result .= "<div><a href=\"/video{$attach_type[3]}_{$attach_type[2]}\" onClick=\"videos.show({$attach_type[2]}, this.href, location.href); return false\"><img src=\"/uploads/videos/{$attach_type[3]}/{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px;margin-bottom:5px\" {$size[3]} align=\"left\" /></a></div>";
								
								$resLinkTitle = '';
								
							//Музыка
					} elseif($attach_type[0] == 'audio'){
						$audioId = intval($attach_type[1]);
						$audioInfo = $db->super_query("SELECT artist, name, url FROM `".PREFIX."_audio` WHERE aid = '".$audioId."'");
						if($audioInfo){
							if($_GET['uid']) $appClassWidth = 'player_mini_mbar_wall_all';
							$jid++;
							$attach_result .= '

<div class="audio page wall" id="audio'.$audioId.'_1" onclick="playAudio(\''.$audioId.'_1\')">
<div class="audio_page_wrap">
<div class="play_but fl_l"></div>
<div class="audio_info">
<div class="audio_page_time fl_r" id="audio_time'.$audioId.'_1" onclick="audio_player.setTimeDir(event);"></div>
<div class="audio_names">
<b id="artis'.$audioId.'_1">'.$audioInfo['artist'].'</b> – <span id="name'.$audioId.'_1">'.$audioInfo['name'].'</span>
</div>
<div class="clear"></div>
</div>
<input type="hidden" value="'.$audioInfo['url'].'" id="audio_src'.$audioId.'_1">
<div class="clear"></div>
<div class="page_player no_display" id="player'.$audioId.'_1">
<div class="fl_r page_player_progres_wr volume" onclick="audio_player.volumeClick.apply(this, [event])">
<div class="bg_line"></div>
<div class="volume_line"></div>
</div>
<div class="page_player_progres_wr" onclick="audio_player.progressClick.apply(this, [event])">
<div class="bg_line"></div>
<div class="load_line"></div>
<div class="play_line"></div>
</div>
<div class="clear"></div>
</div>
</div>
</div>';
	}
						
						$resLinkTitle = '';

							//Смайлик
							} elseif($attach_type[0] == 'smile' AND file_exists(ROOT_DIR."/uploads/smiles/{$attach_type[1]}")){
								$attach_result .= '<img src=\"/uploads/smiles/'.$attach_type[1].'\" style="margin-right:5px" />';
								
								$resLinkTitle = '';
							//Если ссылка
							} elseif($attach_type[0] == 'link' AND preg_match('/http:\/\/(.*?)+$/i', $attach_type[1]) AND $cnt_attach_link == 1 AND stripos(str_replace('http://www.', 'http://', $attach_type[1]), $config['home_url']) === false){
								$count_num = count($attach_type);
								$domain_url_name = explode('/', $attach_type[1]);
								$rdomain_url_name = str_replace('http://', '', $domain_url_name[2]);
								
								$attach_type[3] = stripslashes($attach_type[3]);
								$attach_type[3] = substr($attach_type[3], 0, 200);
									
								$attach_type[2] = stripslashes($attach_type[2]);
								$str_title = substr($attach_type[2], 0, 55);
								
								if(stripos($attach_type[4], '/uploads/attach/') === false){
									$attach_type[4] = '{theme}/images/no_ava_groups_100.gif';
									$no_img = false;
								} else
									$no_img = true;
								
								if(!$attach_type[3]) $attach_type[3] = '';
									
								if($no_img AND $attach_type[2]){

									$attach_result .= '<div style="margin-top:2px" class="clear"><div class="attach_link_block_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Ссылка: <a href="/away.php?url='.$attach_type[1].'" target="_blank">'.$rdomain_url_name.'</a></div></div><div class="clear"></div><div class="wall_show_block_link" style="border:0px"><a href="/away.php?url='.$attach_type[1].'" target="_blank"><div style="width:108px;height:80px;float:left;text-align:center"><img src="'.$attach_type[4].'" /></div></a><div class="attatch_link_title"><a href="/away.php?url='.$attach_type[1].'" target="_blank">'.$str_title.'</a></div><div style="max-height:50px;overflow:hidden">'.$attach_type[3].'</div></div></div>';

									$resLinkTitle = $attach_type[2];
									$resLinkUrl = $attach_type[1];
								} else if($attach_type[1] AND $attach_type[2]){
									$attach_result .= '<div style="margin-top:2px" class="clear"><div class="attach_link_block_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Ссылка: <a href="/away.php?url='.$attach_type[1].'" target="_blank">'.$rdomain_url_name.'</a></div></div></div><div class="clear"></div>';
									
									$resLinkTitle = $attach_type[2];
									$resLinkUrl = $attach_type[1];
								}
								
								$cnt_attach_link++;
								
							//Если документ
							} elseif($attach_type[0] == 'doc'){
							
								$doc_id = intval($attach_type[1]);
								
								$row_doc = $db->super_query("SELECT dname, dsize FROM `".PREFIX."_doc` WHERE did = '{$doc_id}'", false, "wall/doc{$doc_id}");
								
								if($row_doc){
									
									$attach_result .= '<div style="margin-top:5px;margin-bottom:5px" class="clear"><div class="doc_attach_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Файл <a href="/index.php?go=doc&act=download&did='.$doc_id.'" target="_blank" onMouseOver="myhtml.title(\''.$doc_id.$cnt_attach.$row['id'].'\', \'<b>Размер файла: '.$row_doc['dsize'].'</b>\', \'doc_\')" id="doc_'.$doc_id.$cnt_attach.$row['id'].'">'.$row_doc['dname'].'</a></div></div></div><div class="clear"></div>';
										
									$cnt_attach++;
								}
								
							//Если опрос
							} elseif($attach_type[0] == 'vote'){
							
								$vote_id = intval($attach_type[1]);
								
								$row_vote = $db->super_query("SELECT title, answers, answer_num FROM `".PREFIX."_votes` WHERE id = '{$vote_id}'", false, "votes/vote_{$vote_id}");
								
								if($vote_id){

									$checkMyVote = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_votes_result` WHERE user_id = '{$user_id}' AND vote_id = '{$vote_id}'", false, "votes/check{$user_id}_{$vote_id}");
									
									$row_vote['title'] = stripslashes($row_vote['title']);
									
									if(!$row['text'])
										$row['text'] = $row_vote['title'];

									$arr_answe_list = explode('|', stripslashes($row_vote['answers']));
									$max = $row_vote['answer_num'];
									
									$sql_answer = $db->super_query("SELECT answer, COUNT(*) AS cnt FROM `".PREFIX."_votes_result` WHERE vote_id = '{$vote_id}' GROUP BY answer", 1, "votes/vote_answer_cnt_{$vote_id}");
									$answer = array();
									foreach($sql_answer as $row_answer){
									
										$answer[$row_answer['answer']]['cnt'] = $row_answer['cnt'];
										
									}
									
									$attach_result .= "<div class=\"clear\" style=\"height:10px\"></div><div id=\"result_vote_block{$vote_id}\"><div class=\"wall_vote_title\">{$row_vote['title']}</div>";
									
									for($ai = 0; $ai < sizeof($arr_answe_list); $ai++){

										if(!$checkMyVote['cnt']){
										
											$attach_result .= "<div class=\"wall_vote_oneanswe\" onClick=\"Votes.Send({$ai}, {$vote_id})\" id=\"wall_vote_oneanswe{$ai}\"><input type=\"radio\" name=\"answer\" /><span id=\"answer_load{$ai}\">{$arr_answe_list[$ai]}</span></div>";
										
										} else {

											$num = $answer[$ai]['cnt'];

											if(!$num ) $num = 0;
											if($max != 0) $proc = (100 * $num) / $max;
											else $proc = 0;
											$proc = round($proc, 2);
											
											$attach_result .= "<div class=\"wall_vote_oneanswe cursor_default\">
											{$arr_answe_list[$ai]}<br />
											<div class=\"wall_vote_proc fl_l\"><div class=\"wall_vote_proc_bg\" style=\"width:".intval($proc)."%\"></div><div style=\"margin-top:-16px\">{$num}</div></div>
											<div class=\"fl_l\" style=\"margin-top:-1px\"><b>{$proc}%</b></div>
											</div><div class=\"clear\"></div>";
					
										}
									
									}
									
									if($row_vote['answer_num']) $answer_num_text = gram_record($row_vote['answer_num'], 'fave');
									else $answer_num_text = 'человек';
									
									if($row_vote['answer_num'] <= 1) $answer_text2 = 'Проголосовал';
									else $answer_text2 = 'Проголосовало';
										
									$attach_result .= "{$answer_text2} <b>{$row_vote['answer_num']}</b> {$answer_num_text}.<div class=\"clear\" style=\"margin-top:10px\"></div></div>";
									
								}
								
							} else
							
								$attach_result .= '';
						
						}
						
						if($resLinkTitle AND $row['text'] == $resLinkUrl OR !$row['text'])
							$row['text'] = $resLinkTitle.'<div class="clear"></div>'.$attach_result;
						else if($attach_result)
							$row['text'] = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $row['text']).'<div class=\"mgclr\"></div>'.$attach_result;
						else
							$row['text'] = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $row['text']);
							
					} else
						$row['text'] = preg_replace('`(http(?:s)?://\w+[^\s\[\]\<]+)`i', '<a href="/away.php?url=$1" target="_blank">$1</a>', $row['text']);
					
					$resLinkTitle = '';
					
					//Если это запись с "рассказать друзьям"
					if($row['tell_uid']){
						if($row['public'])
							$rowUserTell = $db->super_query("SELECT title, photo FROM `".PREFIX."_communities` WHERE id = '{$row['tell_uid']}'", false, "wall/group{$row['tell_uid']}");
						else
							$rowUserTell = $db->super_query("SELECT user_search_pref, user_photo FROM `".PREFIX."_users` WHERE user_id = '{$row['tell_uid']}'");

						if(date('Y-m-d', $row['tell_date']) == date('Y-m-d', $server_time))
							$dateTell = langdate('сегодня в H:i', $row['tell_date']);
						elseif(date('Y-m-d', $row['tell_date']) == date('Y-m-d', ($server_time-84600)))
							$dateTell = langdate('вчера в H:i', $row['tell_date']);
						else
							$dateTell = langdate('j F Y в H:i', $row['tell_date']);
						
						if($row['public']){
							$rowUserTell['user_search_pref'] = stripslashes($rowUserTell['title']);
							$tell_link = 'public';
							if($rowUserTell['photo'])
								$avaTell = '/uploads/groups/'.$row['tell_uid'].'/50_'.$rowUserTell['photo'];
							else
								$avaTell = '{theme}/images/no_ava_50.png';
						} else {
							$tell_link = 'u';
							if($rowUserTell['user_photo'])
								$avaTell = '/uploads/users/'.$row['tell_uid'].'/50_'.$rowUserTell['user_photo'];
							else
								$avaTell = '{theme}/images/no_ava_50.png';
						}

						$row['text'] = <<<HTML
{$row['tell_comm']}
<div class="wall_repost_border">
<div class="wall_tell_info"><div class="wall_tell_ava"><a href="/{$tell_link}{$row['tell_uid']}" onClick="Page.Go(this.href); return false"><img src="{$avaTell}" width="30" /></a></div><div class="wall_tell_name"><a href="/{$tell_link}{$row['tell_uid']}" onClick="Page.Go(this.href); return false"><b>{$rowUserTell['user_search_pref']}</b></a></div><div class="wall_tell_date">{$dateTell}</div></div>{$row['text']}
<div class="clear"></div>
</div>
HTML;
					}
					
					$tpl->set('{text}', stripslashes($row['text']));
					
					$tpl->compile('content');
				}
			}
				
			if(!$first_id)
				$tpl->result['content'] .= '</div></div>';
				

			AjaxTpl();
			die();
		break;
		default:
		
			//################### Вывод всех диалогов ###################//
			$metatags['title'] = 'Диалоги';
			$mobile_speedbar = '<a href="/messages">Диалоги</a>';

			//Вывод диалогов
			$sql_ = $db->super_query("SELECT tb1.msg_num, im_user_id, tb2.user_search_pref, user_photo, user_logged_mobile, user_last_visit, tb3.text, pm_read, for_user_id, history_user_id FROM `".PREFIX."_im` tb1, `".PREFIX."_users` tb2, `".PREFIX."_messages` tb3 WHERE tb1.iuser_id = '".$user_id."' AND tb1.im_user_id = tb2.user_id AND tb3.for_user_id = '".$user_id."' AND tb3.from_user_id = tb1.im_user_id AND tb3.date = tb1.idate ORDER by `idate` DESC LIMIT 0, 50", 1);
			$tpl->load_template('im/dialog.tpl');
			
			foreach($sql_ as $row){
				$tpl->set('{name}', $row['user_search_pref']);
				$tpl->set('{uid}', $row['im_user_id']);
				
			    if($row['user_last_visit']>= $online_time)                                                                
                $tpl->set('{online2}', '<span class="onnew" style="margin-top: 38px;position: absolute;float: left;left: 52px;"></span>');                                          
                else{$tpl->set('{online2}','');}
				
				if($row['pm_read'] == 'no' AND $row['for_user_id'] == $row['history_user_id'])
					$tpl->set('{new}', 'im_unread1');
				else if($row['pm_read'] == 'no' AND $row['for_user_id'] != $row['history_user_id'])
					$tpl->set('{new}', 'im_unread');
					
				
				$tpl->set('{text}', iconv_substr(stripslashes(strip_tags($row['text'])), 0, 21, 'utf-8'));
				OnlineTpl($row['user_last_visit'], $row['user_logged_mobile']);
				
				if($row['user_photo'])
					$tpl->set('{ava}', '/uploads/users/'.$row['im_user_id'].'/50_'.$row['user_photo']);
				else
					$tpl->set('{ava}', '{theme}/images/no_ava_50.png');
				if($row['msg_num'])
					$tpl->set('{msg_num}', '<div class="im_new fl_l" id="msg_num'.$row['im_user_id'].'">'.$row['msg_num'].'</div>');
				else
					$tpl->set('{msg_num}', '');
					
				if($row['pm_read'] == 'yes') 
					$tpl->set('{new}', '');
					
				$tpl->compile('dialog');
			}
			
			//header сообщений
			$tpl->load_template('im/head.tpl');
		

			$tpl->set('{dialogs}', $tpl->result['dialog']);
			$tpl->set('[inbox]', '');
			$tpl->set('[/inbox]', '');
			$tpl->set_block("'\\[outbox\\](.*?)\\[/outbox\\]'si","");
			$tpl->set_block("'\\[review\\](.*?)\\[/review\\]'si","");
			$tpl->compile('info');

	}
	$tpl->clear();
	$db->free();
} else {
	$user_speedbar = $lang['no_infooo'];
	msgbox('', $lang['not_logged'], 'info');
}
?>