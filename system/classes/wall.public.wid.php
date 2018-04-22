<?php
/* 
	Appointment: Класс для стены Витжета сообществ
	File: wall.public.wid.php
	Author: Максим Телегин 
	Engine: Vii Engine
	Copyright: ...
	e-mail: m_telega@mail.ru
	URL: https://vk.com/viiprogrammer
	ICQ: 000-000-000
	Данный код защищен авторскими правами
*/

class wall_ {
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
  function wall_select($public_id, $user_id, $limit){// 1 1 0,5
        global $db;
	    $wall = $db->super_query("SELECT * FROM `".PREFIX."_communities_wall` WHERE `public_id` = '{$public_id}' AND `tell_uid` = '0' ORDER by `add_date` DESC  LIMIT $limit", 1);
	    foreach($wall as $row_wall){

			if($row_wall['attach']){
				$attach_arr = explode('||', $row_wall['attach']);
				$cnt_attach = 1;
				$cnt_attach_link = 1;
				$jid = 0;
				$attach_result = '';
				foreach($attach_arr as $attach_file){
					$attach_type = explode('|', $attach_file);
					
					//Фото со стены сообщества
					if($row_wall['tell_uid'])
						$globParId = $row_wall['tell_uid'];
					else
						$globParId = $row_wall['public_id'];
						
					if($attach_type[0] == 'photo' AND file_exists(ROOT_DIR."/uploads/groups/{$globParId}/photos/c_{$attach_type[1]}")){
						if($cnt_attach < 2)
							$attach_result .= "<div class=\"profile_wall_attach_photo cursor_pointer page_num{$row_wall['id']}\" onClick=\"send_open_photomess('/uploads/groups/{$globParId}/photos/{$attach_type[1]}')\"><img style=\"width:100%\" id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/groups/{$globParId}/photos/{$attach_type[1]}\" align=\"left\" /></div>";
						else
							$attach_result .= "<img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/groups/{$globParId}/photos/c_{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px\" align=\"left\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '{$globParId}', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row_wall['id']}\" />";
						
						$cnt_attach++;
						
						$resLinkTitle = '';
						
					//Фото со стены юзера
					} elseif($attach_type[0] == 'photo_u'){
						$attauthor_user_id = $row_wall['tell_uid'];

						if($attach_type[1] == 'attach' AND file_exists(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/c_{$attach_type[2]}")){
							if($cnt_attach < 2)
								$attach_result .= "<div class=\"profile_wall_attach_photo cursor_pointer page_num{$row_wall['id']}\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '{$attauthor_user_id}', '{$attach_type[1]}', '{$cnt_attach}', 'photo_u')\"><img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}\" align=\"left\" /></div>";
							else
								$attach_result .= "<img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/attach/{$attauthor_user_id}/c_{$attach_type[2]}\" style=\"margin-top:3px;margin-right:3px\" align=\"left\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row_wall['id']}\" />";
								
							$cnt_attach++;
						} elseif(file_exists(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/c_{$attach_type[1]}")){
							if($cnt_attach < 2)
								$attach_result .= "<div class=\"profile_wall_attach_photo cursor_pointer page_num{$row_wall['id']}\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '{$attauthor_user_id}', '{$attach_type[1]}', '{$cnt_attach}', 'photo_u')\"><img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/{$attach_type[1]}\" align=\"left\" /></div>";
							else
								$attach_result .= "<img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/c_{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px\" align=\"left\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '{$row_wall['tell_uid']}', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row_wall['id']}\" />";
								
							$cnt_attach++;
						}
						
						$resLinkTitle = '';
						
				     //Видео
					} elseif($attach_type[0] == 'video' AND file_exists(ROOT_DIR."/uploads/videos/{$attach_type[3]}/{$attach_type[1]}")){
					
						$for_cnt_attach_video = explode('video|', $row_wall['attach']);
						$cnt_attach_video = count($for_cnt_attach_video)-1;
				
				  							$video_id = intval($attach_type[2]);
							$row_video = $db->super_query("SELECT * FROM `".PREFIX."_videos` WHERE id = '{$video_id}'", false);
							preg_match_all("|src=\"(.*?)\"|is", $row_video['video'], $result);
							$ph = '/uploads/videos/'.$attach_type[3].'/'.$attach_type[1];
							$title = cut_str($row_video['title'], 40);
				
						if($cnt_attach_video == 1 AND preg_match('/(photo|photo_u)/i', $row_wall['attach']) == false){
							

						   $attach_result .= "<div id=\"youtube_v\"><div onclick=\"send_open_videomess('{$result[1][0]}')\"><div class=\"clear\"></div>
                                                      <div class=\"cursor_pointer clear\" id=\"\">
                                                      <img  src=\"/uploads/videos/{$attach_type[3]}/{$attach_type[1]}\"></div>
                                                      <div class=\"video_inline_vititle\"></div><a href=\"\" onclick=\"send_open_videomess('{$result[1][0]}')\"><b>{$title}</b></a>
													  </div></div>";
						

						} else {
							
							$attach_result .= "<div id=\"youtube_v\"><div onclick=\"send_open_videomess('{$result[1][0]}')\"><div class=\"clear\"></div>
                                                      <div class=\"cursor_pointer clear\" id=\"\">
                                                      <img  src=\"/uploads/videos/{$attach_type[3]}/{$attach_type[1]}\"></div>
                                                      <div class=\"video_inline_vititle\"></div><a href=\"\" onclick=\"send_open_videomess('{$result[1][0]}')\"><b>{$title}</b></a>
													  </div></div>";
							
						}


						$resLinkTitle = '';
						
					//Музыка
					} elseif($attach_type[0] == 'audio'){
						$audioId = intval($attach_type[1]);
						$audioInfo = $db->super_query("SELECT artist, name, url FROM `".PREFIX."_audio` WHERE aid = '".$audioId."'");
						if($audioInfo){
							$jid++;
							$attach_result .= "<div id=\"audio_player_$jid$audioId_{$row_wall['id']}\">
							                           <div id=\"pd_play\" style=\"margin-top: -3px;\" onclick=\"audio.play('$jid$audioId{$row_wall['id']}');\" class=\"fl_l player$jid$audioId{$row_wall['id']}\"></div>
													   <audio id=\"player$jid$audioId{$row_wall['id']}\" src=\"".$audioInfo['url']."\"></audio>
							                           
													   <span id=\"pd_performer\" style=\"font-weight: bold;color: #2B587A;\" class=\"performer\">".stripslashes($this->cut_str($audioInfo['artist'], 15))." </span> – <span id=\"pd_title\" style=\"color: #627A94;\" class=\"title\">".stripslashes($this->cut_str($audioInfo['name'], 15))."</span>
													   </div><br>";
													   
							
						}
						
						$resLinkTitle = '';
					//Смайлик
					} elseif($attach_type[0] == 'smile' AND file_exists(ROOT_DIR."/uploads/smiles/{$attach_type[1]}")){
						$attach_result .= '<img src="/uploads/smiles/'.$attach_type[1].'" style="margin-right:5px" />';
						
						$resLinkTitle = '';
						
					//Если документ
					} elseif($attach_type[0] == 'doc'){
					
						$doc_id = intval($attach_type[1]);
						
						$row_doc = $db->super_query("SELECT dname, dsize FROM `".PREFIX."_doc` WHERE did = '{$doc_id}'", false, "wall/doc{$doc_id}");
						
						if($row_doc){
							
							$attach_result .= '<div style="margin-top:5px;margin-bottom:5px" class="clear"><div class="doc_attach_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Файл <a href="/index.php?go=doc&act=download&did='.$doc_id.'" target="_blank" onMouseOver="myhtml.title(\''.$doc_id.$cnt_attach.$row_wall['id'].'\', \'<b>Размер файла: '.$row_doc['dsize'].'</b>\', \'doc_\')" id="doc_'.$doc_id.$cnt_attach.$row_wall['id'].'">'.$row_doc['dname'].'</a></div></div></div><div class="clear"></div>';
								
							$cnt_attach++;
						}
												
						
					//Если опрос
					} elseif($attach_type[0] == 'vote'){
					
						$vote_id = intval($attach_type[1]);
						
						$row_vote = $db->super_query("SELECT title, answers, answer_num FROM `".PREFIX."_votes` WHERE id = '{$vote_id}'", false, "votes/vote_{$vote_id}");
						
						if($vote_id){

							$checkMyVote = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_votes_result` WHERE user_id = '{$user_id}' AND vote_id = '{$vote_id}'");
							
							$row_vote['title'] = stripslashes($row_vote['title']);
							
							if(!$row_wall['text'])
								$row_wall['text'] = $row_vote['title'];

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

			}
			
			$resLinkTitle = '';
			
			if(date('Y-m-d', $row_wall['add_date']) == date('Y-m-d', $server_time))
				$dateTell = langdate('сегодня в H:i', $row_wall['add_date']);
			elseif(date('Y-m-d', $row_wall['add_date']) == date('Y-m-d', ($server_time-84600)))
				$dateTell = langdate('вчера в H:i', $row_wall['add_date']);
			else
				$dateTell = langdate('j F Y в H:i', $row_wall['add_date']);
				
			$records .= '<div class="community_post ">
                          <a class="community_post_date color2" href="/wallgroups'.$public_id.'_'.$row_wall['id'].'" target="_blank">'.$dateTell.'</a>
                          <div id="wpt-60400794_289">
                            <div class="wall_post_text">'.$row_wall['text'].'<br>'.$attach_result.'</div>
                          </div>
                         </div>';
           $attach_result = null;
		}
		 return $records;
			
  }
  function min_wall_id($public_id){
    global $db;
	$id_l = $db->super_query("SELECT MIN(id) FROM `".PREFIX."_communities_wall` WHERE `public_id` = '{$public_id}' AND `tell_uid` = '0' ORDER by `add_date` DESC");
	return $id_l['MIN(id)'];
  }
  function wall_select_doload($public_id, $user_id, $start){
        global $db;
	    $wall = $db->super_query("SELECT * FROM `".PREFIX."_communities_wall` WHERE `public_id` = '{$public_id}' AND `tell_uid` = '0' ORDER by `add_date` DESC  LIMIT $start,5", 1);
		$last_id = $this->min_wall_id($public_id);
	    foreach($wall as $row_wall){

			if($row_wall['attach']){
				$attach_arr = explode('||', $row_wall['attach']);
				$cnt_attach = 1;
				$cnt_attach_link = 1;
				$jid = 0;
				$attach_result = '';
				foreach($attach_arr as $attach_file){
					$attach_type = explode('|', $attach_file);
					
					// Фото со стены сообщества
					if($row_wall['tell_uid'])
						$globParId = $row_wall['tell_uid'];
					else
						$globParId = $row_wall['public_id'];
						
					if($attach_type[0] == 'photo' AND file_exists(ROOT_DIR."/uploads/groups/{$globParId}/photos/c_{$attach_type[1]}")){
						if($cnt_attach < 2)
							$attach_result .= "<div class=\"profile_wall_attach_photo cursor_pointer page_num{$row_wall['id']}\" onClick=\"send_open_photomess('/uploads/groups/{$globParId}/photos/{$attach_type[1]}')\"><img style=\"width:100%\" id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/groups/{$globParId}/photos/{$attach_type[1]}\" align=\"left\" /></div>";
						else
							$attach_result .= "<img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/groups/{$globParId}/photos/c_{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px\" align=\"left\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '{$globParId}', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row_wall['id']}\" />";
						
						$cnt_attach++;
						
						$resLinkTitle = '';
						
					// Фото со стены юзера
					} elseif($attach_type[0] == 'photo_u'){
						$attauthor_user_id = $row_wall['tell_uid'];

						if($attach_type[1] == 'attach' AND file_exists(ROOT_DIR."/uploads/attach/{$attauthor_user_id}/c_{$attach_type[2]}")){
							if($cnt_attach < 2)
								$attach_result .= "<div class=\"profile_wall_attach_photo cursor_pointer page_num{$row_wall['id']}\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '{$attauthor_user_id}', '{$attach_type[1]}', '{$cnt_attach}', 'photo_u')\"><img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/attach/{$attauthor_user_id}/{$attach_type[2]}\" align=\"left\" /></div>";
							else
								$attach_result .= "<img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/attach/{$attauthor_user_id}/c_{$attach_type[2]}\" style=\"margin-top:3px;margin-right:3px\" align=\"left\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row_wall['id']}\" />";
								
							$cnt_attach++;
						} elseif(file_exists(ROOT_DIR."/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/c_{$attach_type[1]}")){
							if($cnt_attach < 2)
								$attach_result .= "<div class=\"profile_wall_attach_photo cursor_pointer page_num{$row_wall['id']}\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '{$attauthor_user_id}', '{$attach_type[1]}', '{$cnt_attach}', 'photo_u')\"><img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/{$attach_type[1]}\" align=\"left\" /></div>";
							else
								$attach_result .= "<img id=\"photo_wall_{$row_wall['id']}_{$cnt_attach}\" src=\"/uploads/users/{$attauthor_user_id}/albums/{$attach_type[2]}/c_{$attach_type[1]}\" style=\"margin-top:3px;margin-right:3px\" align=\"left\" onClick=\"groups.wall_photo_view('{$row_wall['id']}', '{$row_wall['tell_uid']}', '{$attach_type[1]}', '{$cnt_attach}')\" class=\"cursor_pointer page_num{$row_wall['id']}\" />";
								
							$cnt_attach++;
						}
						
						$resLinkTitle = '';
						
				     // Видео
                     } elseif($attach_type[0] == 'video' AND file_exists(ROOT_DIR."/uploads/videos/{$attach_type[3]}/{$attach_type[1]}")){
					
						$for_cnt_attach_video = explode('video|', $row_wall['attach']);
						$cnt_attach_video = count($for_cnt_attach_video)-1;
				
				  							$video_id = intval($attach_type[2]);
							$row_video = $db->super_query("SELECT * FROM `".PREFIX."_videos` WHERE id = '{$video_id}'", false);
							preg_match_all("|src=\"(.*?)\"|is", $row_video['video'], $result);
							$ph = '/uploads/videos/'.$attach_type[3].'/'.$attach_type[1];
							$title = cut_str($row_video['title'], 40);
				
						if($cnt_attach_video == 1 AND preg_match('/(photo|photo_u)/i', $row_wall['attach']) == false){
							

						   $attach_result .= "<div id=\"youtube_v\"><div onclick=\"send_open_videomess('{$result[1][0]}')\"><div class=\"clear\"></div>
                                                      <div class=\"cursor_pointer clear\" id=\"\">
                                                      <img  src=\"/uploads/videos/{$attach_type[3]}/{$attach_type[1]}\"></div>
                                                      <div class=\"video_inline_vititle\"></div><a href=\"\" onclick=\"send_open_videomess('{$result[1][0]}')\"><b>{$title}</b></a>
													  </div></div>";
						

						} else {
							
							$attach_result .= "<div id=\"youtube_v\"><div onclick=\"send_open_videomess('{$result[1][0]}')\"><div class=\"clear\"></div>
                                                      <div class=\"cursor_pointer clear\" id=\"\">
                                                      <img  src=\"/uploads/videos/{$attach_type[3]}/{$attach_type[1]}\"></div>
                                                      <div class=\"video_inline_vititle\"></div><a href=\"\" onclick=\"send_open_videomess('{$result[1][0]}')\"><b>{$title}</b></a>
													  </div></div>";
							
						}


						$resLinkTitle = '';
					// Смайлик
					} elseif($attach_type[0] == 'smile' AND file_exists(ROOT_DIR."/uploads/smiles/{$attach_type[1]}")){
						$attach_result .= '<img src="/uploads/smiles/'.$attach_type[1].'" style="margin-right:5px" />';
						
						$resLinkTitle = '';
						
					// Если документ
					} elseif($attach_type[0] == 'doc'){
					
						$doc_id = intval($attach_type[1]);
						
						$row_doc = $db->super_query("SELECT dname, dsize FROM `".PREFIX."_doc` WHERE did = '{$doc_id}'", false, "wall/doc{$doc_id}");
						
						if($row_doc){
							
							$attach_result .= '<div style="margin-top:5px;margin-bottom:5px" class="clear"><div class="doc_attach_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Файл <a href="/index.php?go=doc&act=download&did='.$doc_id.'" target="_blank" onMouseOver="myhtml.title(\''.$doc_id.$cnt_attach.$row_wall['id'].'\', \'<b>Размер файла: '.$row_doc['dsize'].'</b>\', \'doc_\')" id="doc_'.$doc_id.$cnt_attach.$row_wall['id'].'">'.$row_doc['dname'].'</a></div></div></div><div class="clear"></div>';
								
							$cnt_attach++;
						}
						
						
					//Музыка
					} elseif($attach_type[0] == 'audio'){
						$audioId = intval($attach_type[1]);
						$audioInfo = $db->super_query("SELECT artist, name, url FROM `".PREFIX."_audio` WHERE aid = '".$audioId."'");
						if($audioInfo){
							$jid++;
							$attach_result .= "<div id=\"audio_player_$jid$audioId_{$row_wall['id']}\">
							                           <div id=\"pd_play\" style=\"margin-top: -3px;\" onclick=\"audio.play('$jid$audioId{$row_wall['id']}');\" class=\"fl_l player$jid$audioId{$row_wall['id']}\"></div>
													   <audio id=\"player$jid$audioId{$row_wall['id']}\" src=\"".$audioInfo['url']."\"></audio>
							                           
													   <span id=\"pd_performer\" style=\"font-weight: bold;color: #2B587A;\" class=\"performer\">".stripslashes($this->cut_str($audioInfo['artist'], 15))." </span> – <span id=\"pd_title\" style=\"color: #627A94;\" class=\"title\">".stripslashes($this->cut_str($audioInfo['name'], 15))."</span>
													   </div><br>";
													   
							
						}
						
						$resLinkTitle = '';
						
						
					// Если опрос
					} elseif($attach_type[0] == 'vote'){
					
						$vote_id = intval($attach_type[1]);
						
						$row_vote = $db->super_query("SELECT title, answers, answer_num FROM `".PREFIX."_votes` WHERE id = '{$vote_id}'", false, "votes/vote_{$vote_id}");
						
						if($vote_id){

							$checkMyVote = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_votes_result` WHERE user_id = '{$user_id}' AND vote_id = '{$vote_id}'");
							
							$row_vote['title'] = stripslashes($row_vote['title']);
							
							if(!$row_wall['text'])
								$row_wall['text'] = $row_vote['title'];

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

			}
			
			$resLinkTitle = '';
			
			if(date('Y-m-d', $row_wall['add_date']) == date('Y-m-d', $server_time))
				$dateTell = langdate('сегодня в H:i', $row_wall['add_date']);
			elseif(date('Y-m-d', $row_wall['add_date']) == date('Y-m-d', ($server_time-84600)))
				$dateTell = langdate('вчера в H:i', $row_wall['add_date']);
			else
				$dateTell = langdate('j F Y в H:i', $row_wall['add_date']);
				
			$records .= '<div class="community_post ">
                          <a class="community_post_date color2" href="/wallgroups'.$public_id.'_'.$row_wall['id'].'" target="_blank">'.$dateTell.'</a>
                          <div id="wpt-60400794_289">
                            <div class="wall_post_text">'.$row_wall['text'].'<br>'.$attach_result.'</div>
                          </div>
                         </div>';
						 $attach_result = null;

		}
		
		
		 end($wall);
		 $last_key = key($wall);
		 
		 if($wall[$last_key]['id'] == $last_id){
			 $last = 1;
		 } else $last = 0;
			 
		 
		 $records = json_encode(array('records' => $records, 'last' => $last));
		 return $records;
			
  }
}
?>