<?php

	
	
# API (beta)
# Column methods = 12;

# Error:
# 1 - Not found (users), 2


$method = $_GET['method'];
//if($logged){
switch($method){
	case "users.get":
		header("Content-Type: application/json; encoding=utf-8"); 
		$userid = intval($_GET['userid']);
		$row = $db->super_query("SELECT user_id, user_name, user_lastname FROM `".PREFIX."_users` WHERE user_id = '".$userid."'");
		if($row){
		$uid = json_decode(iconv("windows-1251","utf-8",$row['user_id']));
		$name = iconv('utf-8', 'utf-8', $row['user_name']);
		$lastname = iconv('utf-8', 'utf-8', $row['user_lastname']);
			$response['response'] = array([ 
				'uid' => $uid, 
				'first_name' => $name,
				'last_name' => $lastname
			]); 
		} else {
			$response['response'] = array( 
				'error' => 1, 
				'errormsg' => 'Пользователь не найден.',
				'critical' => true
			); 
		}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "users.get.xml":
		header('Content-type: text/xml encoding=utf-8'); 
		$userid = intval($_GET['userid']);
		$row = $db->super_query("SELECT user_id, user_name, user_lastname FROM `".PREFIX."_users` WHERE user_id = '".$userid."'");
		if($row){
		$uid = $row['user_id'];
		$first_name = iconv('utf-8', 'utf-8', $row['user_name']);
		$last_name = iconv('utf-8', 'utf-8', $row['user_lastname']);
		echo '<?xml version="1.0" encoding="utf-8"?>
			<response list="true">
				<user>
					<uid>'.$uid.'</uid>
					<first_name>'.$first_name.'</first_name>
					<last_name>'.$last_name.'</last_name>
				</user>
			</response>
			'; 
		} else {
		echo '<?xml version="1.0" encoding="utf-8"?>
			<response list="true">
				<user>
					<uid>Not found</uid>
					<first_name>Not found</first_name>
					<last_name>Not found</last_name>
				</user>
			</response>
			'; 
		}	
	break;
	
	case "wall.post":
		header("Content-Type: application/json; encoding=utf-8"); 
		$owner_id = intval($_GET['owner_id']);
		$app_id = intval($_GET['app_id']);
		$message = $_GET['message'];
		$app_secret = $_GET['app_secret'];
		$str_date = time();
		$message = ajax_utf8(textFilter($message));
		
		# Connect app
		$row = $db->super_query("SELECT id,url,cols,title,img,width,height,secret,user_id,status,type,flash,igames FROM `".PREFIX."_apps` WHERE id='{$app_id}'");
		if($row){
			if($app_secret == $row['secret']){
		$check = $db->super_query("SELECT user_privacy, user_last_visit FROM `users` WHERE user_id = '{$owner_id}'");
		if($check){
			$user_privacy = xfieldsdataload($check['user_privacy']);
				if($user_privacy['val_wall2'] == 2 OR $user_privacy['val_wall1'] == 2 OR $user_privacy['val_wall3'] == 2 AND $user_info['user_id'] != $owner_id)
				$check_friend = CheckFriends($owner_id);

				if(!$fast_comm_id){
					if($user_privacy['val_wall2'] == 1 OR $user_privacy['val_wall2'] == 2 AND $check_friend OR $user_info['user_id'] == $owner_id)
						$xPrivasy = 1;
					else
						$xPrivasy = 0;
				} else {
					if($user_privacy['val_wall3'] == 1 OR $user_privacy['val_wall3'] == 2 AND $check_friend OR $user_info['user_id'] == $owner_id)
						$xPrivasy = 1;
					else
						$xPrivasy = 0;
				}
					
				if($user_privacy['val_wall1'] == 1 OR $user_privacy['val_wall1'] == 2 AND $check_friend OR $user_info['user_id'] == $owner_id)
					$xPrivasyX = 1;
				else
					$xPrivasyX = 0;

				//ЧС
				$CheckBlackList = CheckBlackList($owner_id);
				if(!$CheckBlackList){
					if($xPrivasy){
						$db->query("INSERT INTO `".PREFIX."_wall` SET author_user_id = '{$owner_id}', for_user_id = '{$owner_id}', text = '{$message}', add_date = '{$str_date}', app = '{$app_id}'");
						$dbid = $db->insert_id();
							
						//Если пользователь пишет сам у себя на стене, то вносим это в "Мои Новости"
						if($user_info['user_id'] == $owner_id){
							$db->query("INSERT INTO `news` SET ac_user_id = '{$owner_id}', action_type = 1, action_text = '{$message}', obj_id = '{$dbid}', action_time = '{$str_date}'");
						}
						
						$db->query("UPDATE `users` SET user_wall_num = user_wall_num+1 WHERE user_id = '{$owner_id}'");
						
						$response['response'] = array([ 
							'post_id' => $dbid
						]); 
					} else {
						$response['response'] = array( 
							'error' => 15, 
							'errormsg' => 'Доступ запрещён.',
							'critical' => true
						); 
					}
			}	
		}
		} else {
			$response['response'] = array( 
				'error' => 15, 
				'errormsg' => 'Доступ запрещён.',
				'critical' => true
			); 
		}
		} else {
			$response['response'] = array( 
				'error' => 1, 
				'errormsg' => 'Not found app.',
				'critical' => true
			); 
		}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "utils.getServerTime":
		header("Content-Type: application/json; encoding=utf-8"); 
		$str_date = time();
		$response = array( 
			'response' => $str_date
		); 
		
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "status.get":
		header("Content-Type: application/json; encoding=utf-8"); 
		$user_id = intval($_GET['userid']);
		$row = $db->super_query("SELECT user_status FROM `".PREFIX."_users` WHERE user_id = '".$user_id."'");
		$status = iconv('utf-8', 'utf-8', $row['user_status']);
		$response = array( 
			'response' => $status
		); 
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "status.set":
		header("Content-Type: application/json; encoding=utf-8");
		$text = $_GET['text'];
		if($logged){
		$db->query("UPDATE `".PREFIX."_users` SET user_status = '{$text}' WHERE user_id = '{$user_info['user_id']}'");
			$response = array( 
				'response' => 1
			); 
		} else {
			$response['response'] = array( 
				'error' => 100, 
				'errormsg' => 'Вы не авторизованы',
				'critical' => true
			); 
		}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "likes.isLiked":
		header("Content-Type: application/json; encoding=utf-8"); 
		$userid = intval($_GET['userid']);
		$type = $_GET['type'];
		$item_id = intval($_GET['item_id']);
		
		if($type == 'post'){
			$row = $db->super_query("SELECT id, likes_users FROM `".PREFIX."_wall` WHERE id = '{$item_id}'");
			if($row){
				$likes_users = explode('|', str_replace('u', '', $row['likes_users']));
				if(in_array($userid, $likes_users)){
					$response['response'] = array( 
						'liked' => 1 
						//'copied' => 0
					);
				} else {
					$response['response'] = array( 
						'liked' => 0 
						//'copied' => 0
					);
				}
			} else {
				$response['response'] = array( 
					'error' => 1, 
					'errormsg' => 'Not found post',
					'critical' => true
				);
			}
		} else {
			$response['response'] = array( 
				'error' => 35, 
				'errormsg' => 'Not found type',
				'critical' => true
			);
		}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "likes.add":
		header("Content-Type: application/json; encoding=utf-8"); 
		$type = $_GET['type'];
		$owner_id = intval($_GET['owner_id']);
		$item_id = intval($_GET['item_id']);
		
		if($type == 'post'){
			$row = $db->super_query("SELECT id, likes_users, author_user_id FROM `".PREFIX."_wall` WHERE id = '{$item_id}'");
			if($row and $owner_id == $user_info['user_id']){
				$likes_users = explode('|', str_replace('u', '', $row['likes_users']));
					if(!in_array($owner_id, $likes_users)){
						$db->query("INSERT INTO `".PREFIX."_wall_like` SET rec_id = '{$item_id}', user_id = '{$owner_id}', date = '{$server_time}'");
						
						$db->query("UPDATE `".PREFIX."_wall` SET likes_num = likes_num+1, likes_users = '|u{$owner_id}|{$row['likes_users']}' WHERE id = '{$item_id}'");
						
						if($owner_id != $row['author_user_id']){
							$generateLastTime = $server_time-10800;
							$row_news = $db->super_query("SELECT ac_id, action_text, action_time FROM `".PREFIX."_news` WHERE action_time > '{$generateLastTime}' AND action_type = 7 AND obj_id = '{$item_id}'");
							if($row_news)
								$db->query("UPDATE `".PREFIX."_news` SET action_text = '|u{$owner_id}|{$row_news['action_text']}', action_time = '{$server_time}' WHERE obj_id = '{$item_id}' AND action_type = 7 AND action_time = '{$row_news['action_time']}'");
							else
								$db->query("INSERT INTO `".PREFIX."_news` SET ac_user_id = '{$owner_id}', action_type = 7, action_text = '|u{$owner_id}|', obj_id = '{$item_id}', for_user_id = '{$row['author_user_id']}', action_time = '{$server_time}'");
						}
					}
				$likes_num = $db->super_query("SELECT likes_num FROM `".PREFIX."_wall` WHERE id = '{$item_id}'");
				$likes_num = intval($likes_num['likes_num']);
				$response = array( 
					'likes' => $likes_num
				);
			} else {
				$response['response'] = array( 
					'error' => 1, 
					'errormsg' => 'Not found post',
					'critical' => true
				);
			}
		} else {
			$response['response'] = array( 
				'error' => 35, 
				'errormsg' => 'Not found type',
				'critical' => true
			);
		}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "likes.delete":
		header("Content-Type: application/json; encoding=utf-8"); 
		$type = $_GET['type'];
		$owner_id = intval($_GET['owner_id']);
		$item_id = intval($_GET['item_id']);
		
		if($type == 'post'){
			$row = $db->super_query("SELECT id, likes_users FROM `".PREFIX."_wall` WHERE id = '{$item_id}'");
			if($row and $owner_id == $user_info['user_id']){
				$likes_users = explode('|', str_replace('u', '', $row['likes_users']));
				if(in_array($owner_id, $likes_users)){
					$db->query("DELETE FROM `wall_like` WHERE rec_id = '{$item_id}' AND user_id = '{$owner_id}'");
					$newListLikesUsers = strtr($row['likes_users'], array('|u'.$owner_id.'|' => ''));
					$db->query("UPDATE `wall` SET likes_num = likes_num-1, likes_users = '{$newListLikesUsers}' WHERE id = '{$item_id}'");
					
					//удаляем из ленты новостей
					$row_news = $db->super_query("SELECT ac_id, action_text FROM `news` WHERE action_type = 7 AND obj_id = '{$item_id}'");
					$row_news['action_text'] = strtr($row_news['action_text'], array('|u'.$owner_id.'|' => ''));
					if($row_news['action_text'])
						$db->query("UPDATE `news` SET action_text = '{$row_news['action_text']}' WHERE obj_id = '{$item_id}' AND action_type = 7");
					else
						$db->query("DELETE FROM `news` WHERE obj_id = '{$item_id}' AND action_type = 7");
				}
				$likes_num = $db->super_query("SELECT likes_num FROM `wall` WHERE id = '{$item_id}'");
				$likes_num = intval($likes_num['likes_num']);
				$response = array( 
					'likes' => $likes_num
				);
			} else {
				$response['response'] = array( 
					'error' => 1, 
					'errormsg' => 'Not found post',
					'critical' => true
				);
			}
		} else {
			$response['response'] = array( 
				'error' => 35, 
				'errormsg' => 'Not found type',
				'critical' => true
			);
		}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "account.banUser":
		header("Content-Type: application/json; encoding=utf-8"); 
		$userid = intval($_GET['userid']);
		$myid = $user_info['user_id'];
		$row = $db->super_query("SELECT COUNT(*) AS cnt FROM `users` WHERE user_id = '{$userid}'");
			$myRow = $db->super_query("SELECT user_blacklist FROM `users` WHERE user_id = '{$myid}'");
			$array_blacklist = explode('|', $myRow['user_blacklist']);
			
			if($row['cnt'] AND !in_array($userid, $array_blacklist) AND $myid != $userid){
				$db->query("UPDATE `".PREFIX."_users` SET user_blacklist_num = user_blacklist_num+1, user_blacklist = '{$myRow['user_blacklist']}|{$userid}|' WHERE user_id = '{$myid}'");
				
				if(CheckFriends($userid)){
					//Удаляем друга из таблицы друзей
					$db->query("DELETE FROM `".PREFIX."_friends` WHERE user_id = '{$myid}' AND friend_id = '{$userid}' AND subscriptions = 0");
					
					//Удаляем у друга из таблицы
					$db->query("DELETE FROM `".PREFIX."_friends` WHERE user_id = '{$userid}' AND friend_id = '{$myid}' AND subscriptions = 0");
					
					//Обновляем кол-друзей у юзера
					$db->query("UPDATE `".PREFIX."_users` SET user_friends_num = user_friends_num-1 WHERE user_id = '{$myid}'");
					
					//Обновляем у друга которого удаляем кол-во друзей
					$db->query("UPDATE `users` SET user_friends_num = user_friends_num-1 WHERE user_id = '{$userid}'");
					
					//Чистим кеш владельцу стр и тому кого удаляем из др.
					mozg_clear_cache_file('user_'.$myid.'/profile_'.$myid);
					mozg_clear_cache_file('user_'.$userid.'/profile_'.$userid);
					
					//Удаляем пользователя из кеш файл друзей
					$openMyList = mozg_cache("user_{$myid}/friends");
					mozg_create_cache("user_{$myid}/friends", str_replace("u{$userid}|", "", $openMyList));
					
					$openTakeList = mozg_cache("user_{$userid}/friends");
					mozg_create_cache("user_{$userid}/friends", str_replace("u{$myid}|", "", $openTakeList));
				}
				
				$openMyList = mozg_cache("user_{$myid}/blacklist");
				mozg_create_cache("user_{$myid}/blacklist", $openMyList."|{$userid}|");
				
				$response = array( 
					'response' => 1
				);
			} else {
				$response['response'] = array( 
					'error' => 15, 
					'errormsg' => 'Access denied: cannot blacklist yourself',
					'critical' => true
				);
			}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "account.unbanUser":
		header("Content-Type: application/json; encoding=utf-8"); 
		$userid = intval($_GET['userid']);
		$myid = $user_info['user_id'];
		
		$row = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_users` WHERE user_id = '{$userid}'");
		
			$myRow = $db->super_query("SELECT user_blacklist FROM `users` WHERE user_id = '{$myid}'");
			$array_blacklist = explode('|', $myRow['user_blacklist']);

			if($row['cnt'] AND in_array($userid, $array_blacklist) AND $myid != $userid){
				$myRow['user_blacklist'] = str_replace("|{$userid}|", "", $myRow['user_blacklist']);
				$db->query("UPDATE `".PREFIX."_users` SET user_blacklist_num = user_blacklist_num-1, user_blacklist = '{$myRow['user_blacklist']}' WHERE user_id = '{$myid}'");
				
				$openMyList = mozg_cache("user_{$myid}/blacklist");
				mozg_create_cache("user_{$myid}/blacklist", str_replace("|{$userid}|", "", $openMyList));
				
				$response = array( 
					'response' => 1
				);
			} else {
				$response['response'] = array( 
					'error' => 15, 
					'errormsg' => 'Access denied: user not blacklisted',
					'critical' => true
				);
			}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	case "account.getProfileInfo":
		header("Content-Type: application/json; encoding=utf-8"); 
		$row = $db->super_query("SELECT user_id, user_name, user_lastname, user_birthday, user_sex, user_sp FROM `".PREFIX."_users` WHERE user_id = '".$user_info['user_id']."'");
		$name = iconv('utf-8', 'utf-8', $row['user_name']);
		$lastname = iconv('utf-8', 'utf-8', $row['user_lastname']);
		$user_sp = explode('|', $row['user_sp']);
		$relation = $user_sp[0];
		$relation_partner = $user_sp[1];
		$user_birthday = explode('-', $row['user_birthday']);
			$bdate_visibility = $user_birthday[3];
			$row['user_day'] = $user_birthday[2];
			$row['user_month'] = $user_birthday[1];
			$row['user_year'] = $user_birthday[0];
			$bdate = $row['user_day'].'.'.$row['user_month'].'.'.$row['user_year'];
		$response['response'] = array( 
			'first_name' => $name,
			'last_name' => $lastname,
			'screen_name' => $row['user_id'],
			'sex' => $row['user_sex'],
			'relation' => $relation,
			'relation_partner' => $relation_partner,
			'bdate' => $bdate
		);
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	break;
	
	
}

/*} else {
	header("Content-Type: application/json; encoding=utf-8"); 
	$response['response'] = array( 
		'error' => 100, 
		'errormsg' => 'Вы не авторизованы',
		'critical' => true
	); 
	echo json_encode($response, JSON_UNESCAPED_UNICODE);
}*/
die();
AjaxTpl();

?>