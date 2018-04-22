<?php

/**
	Author: Mario
	URL: http://test/
	Данный код защищен авторскими правами.
 */

if(!defined('MOZG'))
    die('Hacking attempt!');

    $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
    $user = json_decode($s, true);

    if(empty($user['first_name']) or empty($user['last_name']) or empty($user['identity'])) {
    
     die('Ошибка авторизации!');
    
    }else{
    
     $user_info = $db->super_query("SELECT * FROM `".PREFIX."_users` WHERE user_ulogin = '".$user['identity']."'"); // Проверяем зарегистрирован ли пользователь
    
     $password = md5(md5("abchefghjkmnpqrstuvwxyz0123456789"));
     $hid = $password.md5(md5($_IP));

     $first_name = iconv("utf-8", "utf-8", $user['first_name']);
     $last_name = iconv("utf-8", "utf-8", $user['last_name']);

        if($user_info){        
                        
        
            $db->query("UPDATE `".PREFIX."_users` SET user_hid = '".$hid."'  WHERE user_id = '".$user_info['user_id']."'");
			
//Вставляем лог в бд
				$db->query("INSERT INTO `".PREFIX."_log` SET uid = '".$user_info['user_id']."', browser = '{$_BROWSER}', ip = '{$_IP}'");
    
             $_SESSION['user_id'] = intval($user_info['user_id']);
 
            set_cookie("user_id", intval($user_info['user_id']), 365);
            set_cookie("password", $password, 365);
            set_cookie("hid", $hid, 365);
                
            header('Location: /u'.$user_info['user_id']);

        }else{
        
            $md5_pass = $password;
            
            $hid = $md5_pass.md5(md5($_IP));
            
            $db->query("INSERT INTO `".PREFIX."_users` ( user_ulogin, user_name, user_lastname, user_password, user_group, user_reg_date, user_lastdate, user_privacy, user_search_pref, user_balance, user_email) VALUES ('{$user['identity']}', '{$first_name}', '{$last_name}', '{$md5_pass}', '5', '{$server_time}', '{$server_time}', 'val_msg|1||val_wall1|1||val_wall2|1||val_wall3|1||val_info|1||val_group|1||val_gifts|1||val_audios|1||val_sub|1||val_guests1|1||val_guests2|1||', '{$first_name} {$last_name}', '5', '0')");

            $id = $db->insert_id();

			//Устанавливаем в сессию ИД юзера
				$_SESSION['user_id'] = intval($id);


            $_SESSION['user_id'] = intval($id);
    
            set_cookie("user_id", intval($id), 365);
            set_cookie("password", md5(md5($md5_pass)), 365);
            set_cookie("hid", $hid, 365);
                
            header('Location: /u'.$id);
			
			//Если юзер регался по реф ссылки, то начисляем рефералу 10 убм
				if($_SESSION['ref_id']){
					//Проверям на накрутку убм, что юзер не сам регистрирует анкеты
					$check_ref = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_log` WHERE ip = '{$_IP}'");
					if(!$check_ref['cnt']){
						$ref_id = intval($_SESSION['ref_id']);
						
						$db->query("INSERT INTO `".PREFIX."_gifts` SET uid = '{$ref_id}', gift = '1812621121', privacy = '1', gdate = '{$server_time}', from_uid = '1', status = 1");
                        $db->query("UPDATE `".PREFIX."_users` SET user_gifts = user_gifts+1 WHERE user_id = '{$ref_id}'");
						$db->query("UPDATE `".PREFIX."_users` SET user_rate = user_rate+5 WHERE user_id = '{$ref_id}'");
						$db->query("UPDATE `".PREFIX."_users` SET users_invite = users_invite+1 WHERE user_id = '{$ref_id}'");
						//Вставялем рефералу ид регистратора
						$db->query("INSERT INTO `".PREFIX."_invites` SET uid = '{$ref_id}', ruid = '{$id}'");
					}
				}
        }
        
    }
?>