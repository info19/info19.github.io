<?php
/* 
	Appointment: Система отключения сайта
	File: antiddos.php
	Author: alexivanov / alexanderlugas
*/
if(!defined('MOZG'))
	die('Hacking attempt!');

session_start();
if (function_exists('memory_get_usage'));
//Реализуем отключение сайта при превышении лимита используемой ОЗУ
if (round(memory_get_usage()/1024/1024) > 512){
	//Выводим сообщение об ошибке
die("<center><br><p>Сервер сайта был автоматически отключён вследствие большой нагрузки на сайт.</p></br>");
}
