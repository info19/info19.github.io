<?php
$host     = "localhost"; // Database Host
$database = "Имя базы"; // Database Name
$user     = "Имя пользователя"; // Database Username
$password = "Пароль пользователя"; // Database's user Password
$prefix   = "guard"; // Database Prefix for the script tables

$connect = mysqli_connect($host,$user,$password,$database);

// Checking Connection
if (mysqli_connect_errno())
{
  echo "Failed to connect with MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($connect, "utf8");

$site_url      = "http://вашсайт.ру"; //Ссылка на сайт
$phpguard_path = "http://вашсайт.ру/guardst";

$version = "3.2";
?>