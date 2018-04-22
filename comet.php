<?php
/* 
*	Appointment: Моментальные оповещания
*	File: comet.php 
*	Author: Andrey Ajax 
*	Engine: Vii Engine
*	e-mail: fast-engine@bk.ru
*	Внимание запрещается присваевать авторство!
*/

set_time_limit(0);

session_start();
$user_id = intval($_SESSION['user_id']);
session_write_close();

header('Content-Type: application/json');

define('MOZG', true);
define('ROOT_DIR', __DIR__);
define('ENGINE_DIR', ROOT_DIR.'/system');

if($user_id):
	$cache =  ENGINE_DIR.'/cache/user_'.$user_id.'/updates.tmp';
	$Last_time = isset($_POST['last_time']) ? (int) $_POST['last_time'] : null;
	$data = array();
	if(file_exists($cache)):
		while(true):
			clearstatcache();
			$file_time = filemtime($cache);
			if($Last_time == null):
					$data['err'] = 1;
					$data['data'] = null;
					$data['last_time'] = $file_time;
					$data['user_id'] = $user_id;
				break;	
			elseif($file_time > $Last_time):
					$server_time = intval($_SERVER['REQUEST_TIME']);
					$update_time = $server_time-70;
					include ENGINE_DIR .'/classes/mysql.php';
					include ENGINE_DIR .'/data/db.php';
					$row = $db->super_query("SELECT id, type, from_user_id, text, lnk, user_search_pref, user_photo FROM `".PREFIX."_updates` WHERE for_user_id = '{$user_id}' AND date > '{$update_time}' ORDER by `date` ASC");
					if($row):
						$row['text'] = str_replace("|", "&#124;", $row['text']);
						$res = array(
							'type' => $row['type'],
							'name' => $row['user_search_pref'],
							'from_id' => $row['from_user_id'],
							'text' => stripslashes($row['text']),
							'time' => $server_time,
							'photo' => $row['user_photo'] ? "/uploads/users/{$row['from_user_id']}/50_{$row['user_photo']}" : "/templates/Default/images/no_ava_50.png",
							'link' => $row['lnk']
						);
						$data['data'] = $res;
						$db->query("DELETE FROM `".PREFIX."_updates` WHERE id = '{$row['id']}'");
					endif;
					$data['err'] = 0;
					$data['last_time'] = $file_time;
					$data['user_id'] = $user_id;
				break;
			else:
				sleep(2);
				continue;
				break;
			endif;
		endwhile;
	else:
		file_put_contents($cache, '');
		$file_time = filemtime($cache);
		$data['err'] = 2;
		$data['data'] = null;
		$data['last_time'] = $file_time;
		$data['user_id'] = $user_id;
	endif;
else:
	$data['err'] = 3;
	$data['user_id'] = $user_id;
endif;
	echo json_encode($data);
die();
?>