<?php
/* 
	Appointment: Рекомендации
	File: recommendations.php 
	Author: Andrew Tereshin 
	Engine: VK CMS Plus
	Copyright: ExcaliburONE (с) 2015
	e-mail: mego@xaker.ru
	URL: http://vk.com/Excalibur_ONE
	ICQ: 525511
	Данный код защищен авторскими правами
*/
if(!defined('MOZG'))
	die('Hacking attempt!');

if($ajax == 'yes')
	NoAjaxQuery();

if($logged){
	$user_id = $user_info['user_id'];
	$act = $_GET['act'];

	switch($act){
	
			//################### Рекоммендуемые друзья ###################//
		case "friends":
			
			$sql_ = $db->super_query("SELECT user_id, user_search_pref, user_photo, user_birthday, user_country_city_name, user_logged_mobile FROM `".PREFIX."_users` WHERE user_photo ORDER by rand() LIMIT 6", 1);
			
			
			
	if($sql_ ){		
			
			$tpl->load_template('recommendations/people.tpl');
			foreach($sql_ as $row){
			
			$check_friend = CheckFriends($row['user_id']);
			
			if(!$check_friend){
				$tpl->set('{user-id}', $row['user_id']);
				$tpl->set('{name}', $row['user_search_pref']);
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

					$tpl->set_block("'\\[no-friends\\](.*?)\\[/no-friends\\]'si","");
				} else 
					$tpl->set('[no-friends]', '');
					$tpl->set('[/no-friends]', '');
						
				
				if($row['user_id'] != $user_id){
					$tpl->set('[owner]', '');
					$tpl->set('[/owner]', '');
				} else
					$tpl->set_block("'\\[owner\\](.*?)\\[/owner\\]'si","");
				
				OnlineTpl($row['user_last_visit'], $row['user_logged_mobile']);

				}
				$tpl->compile('content');
				
			}
}
		AjaxTpl();
		
			die();
		break;
		
		}
		
		}