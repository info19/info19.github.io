<?php
if(!defined('MOZG'))
	die('Hacking attempt!');

if($ajax == 'yes')
	NoAjaxQuery();

if($logged){
	$act = $_GET['act'];
	
	$user_id = $user_info['user_id'];
	
	$metatags['title'] = "Виджет для сообществ";

	$tpl->load_template('getwidget.tpl');
	
	$tpl->set('{myurl}', $config['home_url']);
	
	$urlnohttp = parse_url($config['home_url']);
	
	$tpl->set('{nohttpurl}', $urlnohttp['host']);
	
	$tpl->compile('content');
	
	$tpl->clear();
	
	$db->free();
} else {
	$user_speedbar = $lang['no_infooo'];
	msgbox('', $lang['not_logged'], 'info');
}
?>