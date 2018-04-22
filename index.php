<?php
/* 
	Appointment: Главная страница
	File: index.php
	Author: f0rt1 
	Engine: Vii Engine
	Copyright: NiceWeb Group (с) 2011
	e-mail: niceweb@i.ua
	URL: http://www.niceweb.in.ua/
	ICQ: 427-825-959
	Данный код защищен авторскими правами
*/
if(isset($_POST["PHPSESSID"])){
	session_id($_POST["PHPSESSID"]);
}
@session_start();
@ob_start();
@ob_implicit_flush(0);

@error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

define('MOZG', true);
define('ROOT_DIR', dirname (__FILE__));
define('ENGINE_DIR', ROOT_DIR.'/system');

header('Content-type: text/html; charset=utf-8');

//AJAX
$ajax = $_POST['ajax'];

$logged = false;
$user_info = false;

include ENGINE_DIR.'/init.php';
include ENGINE_DIR.'/guardst/security.php';
include ENGINE_DIR.'/anti_ddos/index.php';
include ENGINE_DIR.'/anti_ddos/anti_ddos.php';

//Если юзер перешел по реф ссылке, то добавляем ид реферала в сессию
if($_GET['reg']) $_SESSION['ref_id'] = intval($_GET['reg']);

//Имя в шапке
$tpl->set('{name}', $user_info['user_search_pref']);


//################### Загрузка самого профиля ###################//
		
	$tpl->load_template('profile.tpl');
			$row_params = $db->super_query("SELECT verification FROM `".PREFIX."_users` WHERE user_id = '{$id}'", false, "user_{$id}/params");
			$verification = '<img onMouseover="pageVerifiedTip(this)(\'verifi\', \' ' . $row['user_searh_pref'] . ' \', \'\');" id="verifi" style="background:url(\'{theme}/images/verifi.png\');width:13px;position: relative;    display: -webkit-inline-box;height:11px;margin-left:px;margin-top:-px" src="{theme}/images/spacer.gif" />';

			if($row_params['verification']){
				$tpl->set('{verification}', $verification);
			}else{
				$tpl->set('{verification}', '');
			} 

			$tpl->set('{user-id}', $row['user_id']);

//Аватар в шапке
    if($logged){
         if($user_info['user_photo'])
              $ava = $config['home_url'].'uploads/users/'.$user_info['user_id'].'/100_'.$user_info['user_photo'];
         else
              $ava = '{theme}/images/no_ava_50.png';
         $myphoto_header.='<img src="'.$ava.'" width="38" border-radius="100" />'."\n";
         $tpl->set('{myphoto_header}', $myphoto_header);
         $tpl->load_template('main.tpl');
}

//Опридиления браузера
if(stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0')) $xBrowser = 'ie6';
elseif(stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0')) $xBrowser = 'ie7';
elseif(stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0')) $xBrowser = 'ie8';
if($xBrowser == 'ie6' OR $xBrowser == 'ie7' OR $xBrowser == 'ie8')
	header("Location: /badbrowser.php");

//Загружаем кол-во новых новостей
$CacheNews = mozg_cache('user_'.$user_info['user_id'].'/new_news');
if($CacheNews){
	$new_news = "<div class=\"headm_newac\" style=\"margin-left:18px\">{$CacheNews}</div>";
	$news_link = '/notifications';
}

//Загружаем кол-во новых подарков
$CacheGift = mozg_cache("user_{$user_info['user_id']}/new_gift");
if($CacheGift){
	$new_ubm = "<div class=\"headm_newac\" style=\"margin-left:20px\">{$CacheGift}</div>";
	$gifts_link = "/gifts{$user_info['user_id']}?new=1";
} else
	$gifts_link = '/balance';

//Новые сообщения
$user_pm_num = $user_info['user_pm_num'];
if($user_pm_num)
	$user_pm_num = "<div class=\"headm_newac\" style=\"margin-left:0px\">{$user_pm_num}</div>";
else
	$user_pm_num = '';
	
//Новые друзья
$user_friends_demands = $user_info['user_friends_demands'];
if($user_friends_demands){
	$demands = "<div class=\"headm_newac\">{$user_friends_demands}</div>";
	$requests_link = '/requests';
} else
	$demands = '';
	
//ТП
$user_support = $user_info['user_support'];
if($user_support)
	$support = "<div class=\"headm_newac\" style=\"margin-left:26px\">{$user_support}</div>";
else
	$support = '';
	
//Отметки на фото
if($user_info['user_new_mark_photos']){
	$new_photos_link = 'newphotos';
	$new_photos = "<div class=\"headm_newac\" style=\"margin-left:22px\">".$user_info['user_new_mark_photos']."</div>";
} else {
	$new_photos = '';
	$new_photos_link = $user_info['user_id'];
}

//Приглашения в сообщества
if($user_info['invties_pub_num']){
	
	$new_groups = "<div class=\"headm_newac\" style=\"\">".$user_info['invties_pub_num']."</div>";
	$new_groups_lnk = '/groups?act=invites';

} else {
	
	$new_groups = '';
	$new_groups_lnk = '/groups';
	
}

//Если включен AJAX то загружаем стр.
if($ajax == 'yes'){

	//Если есть POST Запрос и значение AJAX, а $ajax не равняется "yes" то не пропускаем
	if($_SERVER['REQUEST_METHOD'] == 'POST' AND $ajax != 'yes')
		die('Неизвестная ошибка');

	if($spBar)
		$ajaxSpBar = "$('#speedbar').show().html('{$speedbar}')";
	else
		$ajaxSpBar = "$('#speedbar').hide()";

	$result_ajax = <<<HTML
<script type="text/javascript">
document.title = '{$metatags['title']}';
{$ajaxSpBar};
document.getElementById('new_msg').innerHTML = '{$user_pm_num}';
document.getElementById('new_news').innerHTML = '{$new_news}';
document.getElementById('new_ubm').innerHTML = '{$new_ubm}';
document.getElementById('ubm_link').setAttribute('href', '{$gifts_link}');
document.getElementById('new_support').innerHTML = '{$support}';
document.getElementById('news_link').setAttribute('href', '/news{$news_link}');
document.getElementById('new_requests').innerHTML = '{$demands}';
document.getElementById('new_photos').innerHTML = '{$new_photos}';
document.getElementById('requests_link_new_photos').setAttribute('href', '/albums/{$new_photos_link}');
document.getElementById('requests_link').setAttribute('href', '/friends{$requests_link}');
$('#new_groups').html('{$new_groups}');
$('#new_groups_lnk').attr('href', '{$new_groups_lnk}');
</script>
{$tpl->result['info']}{$tpl->result['content']}
HTML;
	echo str_replace('{theme}', '/templates/'.$config['temp'], $result_ajax);

	$tpl->global_clear();
	$db->close();

	if($config['gzip'] == 'yes')
		GzipOut();
		
	die();
} 

//Если обращение к модулю регистрации или главной и юзер не авторизован то показываем регистрацию
if($go == 'register' OR $go == 'main' AND !$logged)
	include ENGINE_DIR.'/modules/register_main.php';

$tpl->load_template('main.tpl');
$tpl->set('{banner-top}', '');
$tpl->set('{banner-bottom}', '');
$tpl->set('{banner-right-1}', '');
$tpl->set('{banner-right-2}', '');
$tpl->set('{banner-right-3}', '');
		
//Если юзер залогинен
if($logged){
	$tpl->set_block("'\\[not-logged\\](.*?)\\[/not-logged\\]'si","");
	$tpl->set('[logged]','');
	$tpl->set('[/logged]','');
   	$check_alias = $db->super_query("SELECT `alias` FROM `" . PREFIX . "_users` WHERE `user_id` = " . $user_info['user_id']);
	if ($check_alias['alias'] != null && $check_alias['alias'] != 'empty') {
		$tpl->set('{my-page-link}', '/'.$check_alias['alias']);
	} else {
		$tpl->set('{my-page-link}', '/u'.$user_info['user_id']);
	}
	$tpl->set('{my-id}', $user_info['user_id']); 
	
	//Заявки в друзья
	$user_friends_demands = $user_info['user_friends_demands'];
	if($user_friends_demands){
		$tpl->set('{demands}', $demands);
		$tpl->set('{requests-link}', $requests_link);
	} else {
		$tpl->set('{demands}', '');
		$tpl->set('{requests-link}', '');
	}
	
	//Новости
	if($CacheNews){
		$tpl->set('{new-news}', $new_news);
		$tpl->set('{news-link}', $news_link);
	} else {
		$tpl->set('{new-news}', '');
		$tpl->set('{news-link}', '');
	}
	
	//Сообщения
	if($user_pm_num)
		$tpl->set('{msg}', $user_pm_num);
	else 
		$tpl->set('{msg}', '');
	
	//Поддержка
	if($user_support)
		$tpl->set('{new-support}', $support);
	else 
		$tpl->set('{new-support}', '');
	
	//Отметки на фото
	if($user_info['user_new_mark_photos']){
		$tpl->set('{my-id}', 'newphotos');
		$tpl->set('{new_photos}', $new_photos);
	} else 
		$tpl->set('{new_photos}', '');

	//UBM
	if($CacheGift){
		$tpl->set('{new-ubm}', $new_ubm);
		$tpl->set('{ubm-link}', $gifts_link);
	} else {
		$tpl->set('{new-ubm}', '');
		$tpl->set('{ubm-link}', $gifts_link);
	}

	//Приглашения в сообщества
	if($user_info['invties_pub_num']){
		
		$tpl->set('{groups-link}', $new_groups_lnk);
		$tpl->set('{new_groups}', $new_groups);
		
	} else {
		
		$tpl->set('{groups-link}', $new_groups_lnk);
		$tpl->set('{new_groups}', '');
		
	}

} else {
	$tpl->set_block("'\\[logged\\](.*?)\\[/logged\\]'si","");
	$tpl->set('[not-logged]','');
	$tpl->set('[/not-logged]','');
	$tpl->set('{my-page-link}', '');
}

$tpl->set('{header}', $headers);
$tpl->set('{speedbar}', $speedbar);
$tpl->set('{mobile-speedbar}', $mobile_speedbar);
$tpl->set('{info}', $tpl->result['info']);




// FOR MOBILE VERSION 1.0
if($config['temp'] == 'mobile'){

	$tpl->result['content'] = str_replace('onClick="Page.Go(this.href); return false"', '', $tpl->result['content']);
	
	if($user_info['user_status'])
		$tpl->set('{status-mobile}', '<span style="font-size:11px;color:#FFF">'.$user_info['user_status'].'</span>');
	else
		$tpl->set('{status-mobile}', '<span style="font-size:11px;color:#999">установить статус</span>');
	
	$new_actions = $user_friends_demands+$user_support+$CacheNews+$CacheGift+$user_info['user_pm_num'];

	if($new_actions)
		$tpl->set('{new-actions}', "<div class=\"headm_newac\" style=\"margin-top:5px;margin-left:30px\">+{$new_actions}</div>");
	else
		$tpl->set('{new-actions}', "");
	
}

$tpl->set('{content}', $tpl->result['content']);
$tpl->set('{usernew}', $tpl->result['usernew']);

if($spBar)
	$tpl->set_block("'\\[speedbar\\](.*?)\\[/speedbar\\]'si","");
else {
	$tpl->set('[speedbar]','');
	$tpl->set('[/speedbar]','');
}

//BUILD JS
if($logged)
	$tpl->set('{js}', '<script type="text/javascript" src="/js/al/jquery.lib.js"></script>
<script type="text/javascript" src="/js/al/'.$checkLang.'/lang.js"></script>
<script type="text/javascript" src="/js/al/main.js"></script>
<script type="text/javascript" src="/js/al/profile.js"></script>');
else 
	$tpl->set('{js}', '<script type="text/javascript" src="/js/al/jquery.lib.js"></script>
<script type="text/javascript" src="/js/al/'.$checkLang.'/lang.js"></script>
<script type="text/javascript" src="/js/al/main.js"></script>');

// FOR MOBILE VERSION 1.0
if($user_info['user_photo']) $tpl->set('{my-ava}', "/uploads/users/{$user_info['user_id']}/50_{$user_info['user_photo']}");
else $tpl->set('{my-ava}', "{theme}/images/no_ava_50.png");
$tpl->set('{my-name}', $user_info['user_search_pref']);

if($check_smartphone) $tpl->set('{mobile-link}', '<a href="/index.php?act=change_mobile">мобильная версия</a>');
else $tpl->set('{mobile-link}', '');



//Баннеры
$tpl->set('{banner-top}', '');
$tpl->set('{banner-bottom}', '');
$tpl->set('{banner-right-1}', '');
$tpl->set('{banner-right-2}', '');
$tpl->set('{banner-right-3}', '');
		
if($logged){

if($user_info['banner_cat']){
	
	$banner_cat = "AND cat = '{$user_info['banner_cat']}'";
	
}

$sql_banners = $db->super_query("SELECT id, user_id, pos, img, title, descr, link FROM `".PREFIX."_users_banners` WHERE approve = '0' AND pos = 3 {$banner_cat} ORDER BY RAND() LIMIT 1");
if ($sql_banners != null) {

	$tpl->set('{banner-right-1}', '<div id="Xbanner13" data-id="'.$sql_banners['id'].'"><a href="'.$sql_banners['link'].'" target="_blank" onClick="recForBannerStat('.$sql_banners['id'].')" style="text-decoration:none">
	<div style="background:#fff;padding:10px" class="border_radius_5 margin_bottom_10">
	<b>'.$sql_banners['title'].'</b><br />
	<img src="http://studentosi.ru/uploads/mybanners/'.$sql_banners['user_id'].'/ok/'.$sql_banners['img'].'" width="65" height="90" style="margin-top:5px;margin-bottom:5px" /><br />
	<span style="color:#000;font-size:10px">'.$sql_banners['descr'].'</span><br />
	<a class="cursor_pointer" onClick="bannerHide(13)" style="color:#777;font-size:10px">Скрыть</a>
	</div>
	</a></div>');
}
$sql_banners = $db->super_query("SELECT id, user_id, pos, img, title, descr, link FROM `".PREFIX."_users_banners` WHERE approve = '0' AND pos = 4 {$banner_cat} ORDER BY RAND() LIMIT 1");
if ($sql_banners != null) {

	$tpl->set('{banner-right-2}', '<div id="Xbanner14" data-id="'.$sql_banners['id'].'"><a href="'.$sql_banners['link'].'" target="_blank" onClick="recForBannerStat('.$sql_banners['id'].')" style="text-decoration:none">
	<div style="background:#fff;padding:10px" class="border_radius_5 margin_bottom_10">
	<b>'.$sql_banners['title'].'</b><br />
	<img src="http://studentosi.ru/uploads/mybanners/'.$sql_banners['user_id'].'/ok/'.$sql_banners['img'].'" width="65" height="90" style="margin-top:5px;margin-bottom:5px" /><br />
	<span style="color:#000;font-size:10px">'.$sql_banners['descr'].'</span><br />
	<a class="cursor_pointer" onClick="bannerHide(14)" style="color:#777;font-size:10px">Скрыть</a>
	</div>
	</a></div>');
}
$sql_banners = $db->super_query("SELECT id, user_id, pos, img, title, descr, link FROM `".PREFIX."_users_banners` WHERE approve = '0' AND pos = 5 {$banner_cat} ORDER BY RAND() LIMIT 1");
if ($sql_banners != null) {

	$tpl->set('{banner-right-3}', '<div id="Xbanner15" data-id="'.$sql_banners['id'].'"><a href="'.$sql_banners['link'].'" target="_blank" onClick="recForBannerStat('.$sql_banners['id'].')" style="text-decoration:none">
	<div style="background:#fff;padding:10px" class="border_radius_5 margin_bottom_10">
	<b>'.$sql_banners['title'].'</b><br />
	<img src="http://studentosi.ru/uploads/mybanners/'.$sql_banners['user_id'].'/ok/'.$sql_banners['img'].'" width="65" height="90" style="margin-top:5px;margin-bottom:5px" /><br />
	<span style="color:#000;font-size:10px">'.$sql_banners['descr'].'</span><br />
	<a class="cursor_pointer" onClick="bannerHide(15)" style="color:#777;font-size:10px">Скрыть</a>
	</div>
	</a></div>');
}


$sql_banners = $db->super_query("SELECT id, user_id, pos, img, title, descr, link FROM `".PREFIX."_users_banners` WHERE approve = '0' AND pos != 3 AND pos != 4 AND pos != 5 {$banner_cat}", 1);

foreach($sql_banners as $rowB){

	$rowB['title'] = stripslashes($rowB['title']);
	$rowB['descr'] = stripslashes($rowB['descr']);
	
	if($rowB['pos'] == 1){
		
		$tpl->set('{banner-top}', '<a href="'.$rowB['link'].'" target="_blank" onClick="recForBannerStat('.$rowB['id'].')"><img src="http://studentosi.ru/uploads/mybanners/'.$rowB['user_id'].'/ok/'.$rowB['img'].'" width="880" height="150" title="'.$rowB['title'].' - '.$rowB['descr'].'" /></a>');
		
	} elseif($rowB['pos'] == 2){
		
		$tpl->set('{banner-bottom}', '<a href="'.$rowB['link'].'" target="_blank" onClick="recForBannerStat('.$rowB['id'].')"><img src="http://studentosi.ru/uploads/mybanners/'.$rowB['user_id'].'/ok/'.$rowB['img'].'" width="880" height="150" style="margin-left:18px" title="'.$rowB['title'].' - '.$rowB['descr'].'" /></a>');
		
	} elseif($rowB['pos'] == 3 AND !$_SESSION['banner13']){
		
		$tpl->set('{banner-right-1}', '<div id="Xbanner13"><a href="'.$rowB['link'].'" target="_blank" onClick="recForBannerStat('.$rowB['id'].')" style="text-decoration:none">
		<div style="background:#fff;padding:10px" class="border_radius_5 margin_bottom_10">
		<b>'.$rowB['title'].'</b><br />
		<img src="http://studentosi.ru/uploads/mybanners/'.$rowB['user_id'].'/ok/'.$rowB['img'].'" width="65" height="90" style="margin-top:5px;margin-bottom:5px" /><br />
		<span style="color:#000;font-size:10px">'.$rowB['descr'].'</span><br />
		<a class="cursor_pointer" onClick="bannerHide(13)" style="color:#777;font-size:10px">Скрыть</a>
		</div>
		</a></div>');
		
	} elseif($rowB['pos'] == 4 AND !$_SESSION['banner14']){
		
		$tpl->set('{banner-right-2}', '<div id="Xbanner14"><a href="'.$rowB['link'].'" target="_blank" onClick="recForBannerStat('.$rowB['id'].')" style="text-decoration:none">
		<div style="background:#fff;padding:10px" class="border_radius_5 margin_bottom_10">
		<b>'.$rowB['title'].'</b><br />
		<img src="http://studentosi.ru/uploads/mybanners/'.$rowB['user_id'].'/ok/'.$rowB['img'].'" width="65" height="90" style="margin-top:5px;margin-bottom:5px" /><br />
		<span style="color:#000;font-size:10px">'.$rowB['descr'].'</span><br />
		<a class="cursor_pointer" onClick="bannerHide(14)" style="color:#777;font-size:10px">Скрыть</a>
		</div>
		</a>
		</div>');
		
	} elseif($rowB['pos'] == 5 AND !$_SESSION['banner15']){
		
		$tpl->set('{banner-right-3}', '<div id="Xbanner15"><a href="'.$rowB['link'].'" target="_blank" onClick="recForBannerStat('.$rowB['id'].')" style="text-decoration:none">
		<div style="background:#fff;padding:10px" class="border_radius_5 margin_bottom_10">
		<b>'.$rowB['title'].'</b><br />
		<img src="http://studentosi.ru/uploads/mybanners/'.$rowB['user_id'].'/ok/'.$rowB['img'].'" width="65" height="90" style="margin-top:5px;margin-bottom:5px" /><br />
		<span style="color:#000;font-size:10px">'.$rowB['descr'].'</span><br />
		<a class="cursor_pointer" onClick="bannerHide(15)" style="color:#777;font-size:10px">Скрыть</a>
		</div>
		</a>
		</div>');
		
	}
	
}


}

$tpl->set('{lang}', $rMyLang);

$tpl->compile('main');

echo str_replace('{theme}', '/templates/'.$config['temp'], $tpl->result['main']);

$tpl->global_clear();
$db->close();

if($config['gzip'] == 'yes')
	GzipOut();
?>