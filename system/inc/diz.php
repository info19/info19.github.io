<?php
if(!defined('MOZG'))
	die('Хули надо тут?');
$mod = htmlspecialchars(strip_tags(stripslashes(trim(urldecode(mysql_escape_string($_GET['mod']))))));
check_xss();
$langdate = array (
'January'		=>	"января",
'February'		=>	"февраля",
'March'			=>	"марта",
'April'			=>	"апреля",
'May'			=>	"мая",
'June'			=>	"июня",
'July'			=>	"июля",
'August'		=>	"августа",
'September'		=>	"сентября",
'October'		=>	"октября",
'November'		=>	"ноября",
'December'		=>	"декабря",
'Jan'			=>	"янв",
'Feb'			=>	"фев",
'Mar'			=>	"мар",
'Apr'			=>	"апр",
'Jun'			=>	"июн",
'Jul'			=>	"июл",
'Aug'			=>	"авг",
'Sep'			=>	"сен",
'Oct'			=>	"окт",
'Nov'			=>	"ноя",
'Dec'			=>	"дек",

'Sunday'		=>	"Воскресенье",
'Monday'		=>	"Понедельник",
'Tuesday'		=>	"Вторник",
'Wednesday'		=>	"Среда",
'Thursday'		=>	"Четверг",
'Friday'		=>	"Пятница",
'Saturday'		=>	"Суббота",

'Sun'			=>	"Вс",
'Mon'			=>	"Пн",
'Tue'			=>	"Вт",
'Wed'			=>	"Ср",
'Thu'			=>	"Чт",
'Fri'			=>	"Пт",
'Sat'			=>	"Сб",
);
$server_time = intval($_SERVER['REQUEST_TIME']);
switch($mod){

//* Подарки *//

	case "tpl":
		include ADMIN_DIR.'/tpl.php';
	break;


	default:
	
		include ADMIN_DIR.'/main_moderator.php';
}
?>
