<?php
define('MOZG', true);
define('ROOT_DIR', dirname (__FILE__));
define('ENGINE_DIR', ROOT_DIR.'/system');
include ENGINE_DIR.'/classes/mysql.php';
include ENGINE_DIR.'/data/db.php';

$restricted_sql = $db->super_query("SELECT * FROM ".PREFIX."_restricted_sites;", 1);

foreach ($restricted_sql as $item) {
    $restricted[$item['domain']] = $item['text'];
}

function clean_url($url) {
	if( $url == '' ) return;

	$url = str_replace( "http://", "", strtolower( $url ) );
	$url = str_replace( "https://", "", $url );
	if( substr( $url, 0, 4 ) == 'www.' ) $url = substr( $url, 4 );
	$url = explode( '/', $url );
	$url = reset( $url );
	$url = explode( ':', $url );
	$url = reset( $url );

	return $url;
}

if (in_array(clean_url($_GET['url']), array_keys($restricted))) {
    $message = $restricted[clean_url($_GET['url'])];
} else {
    header("Location: {$_GET['url']}");
    die();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="robots" content="noindex">
        <title>Потенциально вредоносная ссылка</title>
		<link rel="stylesheet" type="text/css" href="/css_away/common.css">
        <link rel="shortcut icon" href="/templates/Default/images/uic.png" />
<style type="text/css">
body{background: #f0f2f5;font-size: 12px;line-height: 1.182;font-family: tahoma, arial, verdana, sans-serif, Lucida Sans;}
.cont_wrap{margin: 0 auto;width: 700px;margin-top: 30px;}
.big_info{font-weight: bold;font-size: 16px;color: rgb(57, 78, 99);margin-top: 15px;}
.system_message{margin-top: 20px;line-height: 22px;font-size: 14px;}
.back_to_site{float: right;margin-top: 10px;}
a{text-decoration: none;cursor: pointer;color: rgb(68, 98, 128);}
a:hover{text-decoration: underline;}
.admin_msg{margin-top: 20px;font-size:13px;}
.site_logo, .udins{float: left;color: #5780ab;font-weight: bold;font-size:30px;padding: 18px;margin-top:-20px;cursor:default;margin-left: -20px;}
.admin_msg:empty{display: none;}
</style>
</head>
 <body>
<div class="cont_wrap" dir="auto">
<div class="site_logo">Studentosi.Ru</div>
<div class="back_to_site">
<a href="/">вернуться на сайт</a>
</div>
    <div style="clear:both;"></div>
      <div class="big_info">Ссылка на подозрительный сайт!</div>
      <div class="system_message">Ссылка, по которой Вы попытались перейти, может вести на сайт, который был создан с целью обмана пользователей <b> Studentosi </b> и получения за счет этого прибыли.<br><div class="admin_msg"><b>Примечание:</b> <?php echo $message; ?> </div><div class="away_center"></div>
    </div>
  </div>
</body>
</html>