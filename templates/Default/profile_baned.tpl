<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<title>Страница заблокирована</title>
<noscript><meta http-equiv="refresh" content="0; URL=/badbrowser.php"></noscript>
<link media="screen" href="{theme}/style/banned.css" type="text/css" rel="stylesheet" /> 
<link rel="shortcut icon" href="{theme}/images/fav.png" />
</head>
<body onResize="onBodyResize()">
<div class="head">
 <div class="autowr">
<a href="/news" class="site_logo" onclick="Page.Go(this.href); return false;"></a>
<div class="head_nav fl_r">
                    <a class="item fl_l" href="/term.php" onclick="Page.Go(this.href); return false;">Правила</a>
                    <a class="item fl_l" href="/?act=logout">Выйти</a>
                    <div class="clear"></div>
                </div>
 </div>
</div>
<div class="clear"></div>
<div style="margin-top:49px;"></div>
<div class="autowr">
 <div class="content" style="width:800px;">
  <div class="cont_border_left">
   <div class="cont_border_right">
    <div class="speedbar" id="speedbar">Страница заблокирована</div>
    <div class="padcont">
	 <div class="info_center">Ваша страница была заблокирована администрацией.<br />Дата окончания блокировки: {date}</div>
	 <div class="clear"></div>
	</div>
   </div>
  </div>
  <div class="cont_border_bottom"></div>
 </div>
</div>
<div class="clear"></div>
</body>
</html>