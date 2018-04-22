<?xml version="1.0" encoding="windows-1251"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
<meta name="MobileOptimized" content="176" />
{header}
<link media="screen" href="{theme}/style/style.css" type="text/css" rel="stylesheet" />  
<script type="text/javascript" src="/templates/mobile/js/main.js"></script>
<script type="text/javascript" src="/templates/mobile/js/jquery.lib.js"></script>
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>

[logged][not-aviable=main]<div class="head">
<div class="udins2" onclick="menu.show();"></div>
<div class="speedb"><b id="text_mob_bar">{mobile-speedbar} {verification}</b><b id="modalmobbar"></b></div>
</div>
<div class="prTab">
[logged]<a href="/u{my-id}" style="text-decoration:none">[/logged][logged]<div style="padding: 10px;margin-bottom:15px;"><img src="{my-ava}" align="left" style="margin-right:10px;    border-radius: 100px;" width="50" height="50" /><b style="color: #FFF;font-size: 17px;line-height: 27px;">{my-name} {verification}</b><br /><span style="color:#ffF !important">{status-mobile}</span>[/logged]
</div>[logged]</a><div class="clr" style="border-bottom: 1px solid #4F5965;width: 90%;margin-left: 14px;"></div>[/logged]

<div class="main"><a href="/news{news-link}"><div class="ico icNews"></div><span>Новости {new-news}</span></a></div>
<div class="main"><a href="/messages"><div class="ico icMsg"></div><span>Диалоги {msg}</span></a></div>
<div class="main"><a href="/albums/{my-id}"><div class="ico icPhotos"></div><span>Фотографии</span></a></div>
<div class="main"><a href="/friends{requests-link}"><div class="ico icFriends"></div><span>Друзья {demands}</span></a></div>
<div class="main"><a href="/videos"><div class="ico ic_Videos"></div><span>Видео</span></a></div>
<div class="main"><a href="/groups"><div class="ico icGroups"></div><span>Группы</span></a></div>
<div class="main"><a href="/fave"><div class="ico icFave"></div><span>Закладки</span></a></div>
<div class="main"><a href="/?go=search&online=1"><div class="ico icSe"></div><span>Поиск</span></a></div>

<div class="main"><a href="/settings"><div class="ico ic_Settings"></div><span>Настройки профиля</span></a></div>
<div class="main"><a href="/support"><div class="ico icSupp"></div><span>Помощь {new-support}</span></a></div>
<div class="main"><a href="/index.php?act=change_fullver"><div class="ico ic_Pc"></div><span>Версия для ПК</span></a></div>
<div class="main"><a href="/?act=logout"><div class="ico ic_Logout"></div><span>Выход</span></a></div>


</div>
[/not-aviable][/logged]
[aviable=main]</div>[/aviable][aviable=main][logged]</a>[/logged][/aviable]</div>
<div class="pageBg">[not-logged]<center><br><div class="main_logo" style="background-size: 130%;margin-left:-10px;"></div><br></center><form method="POST" id="login" action="" class="note_add_bg support_bg" style="padding-top:5px;display:block">
 <input type="text"  name="email" class="inp" maxlength="50" style="width:98%;    background: rgb(68, 111, 159) !important;    border-radius: 5px;" id="title" placeholder="E-mail:" />
 <input type="password" name="password" class="inp" style="width:98%;    background: rgb(68, 111, 159) !important;    border-radius: 5px;" maxlength="50 id="title" placeholder="Пароль:" />
 <button name="log_in" class="button" style="display:block; margin:0 auto;margin-top:10px;color: #537FB0;width: 100%;background: #FFF;font-size: 14px;font-weight: bold;">Войти</button>
 
 <div class="ili">----- или -----</div>
 
 
</form>[/not-logged][logged][aviable=main]<div class="head">
<div class="udins2" onclick="menu.show();"></div>
<div class="speedb"><b id="text_mob_bar">{mobile-speedbar}</b><b id="modalmobbar"></b></div>
</div>
<div class="prTab" style="display:block; max-width:100%; width:100%">
[logged]<a href="/u{my-id}" style="text-decoration:none">[/logged][logged]<div style="padding: 10px;margin-bottom:15px;"><img src="{my-ava}" align="left" style="margin-right:10px" width="50" height="50" /><b style="color: #FFF;font-size: 17px;line-height: 27px;">{my-name} {verification}</b><br />{status-mobile}[/logged]
</div>[logged]</a><div class="clr" style="border-bottom: 1px solid #4F5965;width: 94%;margin-left: 14px;"></div>

<div class="main"><a href="/news{news-link}"><div class="ico icNews"></div><span>Новости {new-news}</span></a></div>
<div class="main"><a href="/messages"><div class="ico icMsg"></div><span>Диалоги {msg}</span></a></div>
<div class="main"><a href="/albums/{my-id}"><div class="ico icPhotos"></div><span>Фотографии</span></a></div>
<div class="main"><a href="/friends{requests-link}"><div class="ico icFriends"></div><span>Друзья {demands}</span></a></div>
<div class="main"><a href="/videos"><div class="ico ic_Videos"></div><span>Видео</span></a></div>
<div class="main"><a href="/groups"><div class="ico icGroups"></div><span>Группы</span></a></div>
<div class="main"><a href="/fave"><div class="ico icFave"></div><span>Закладки</span></a></div>
<div class="main"><a href="/?go=search&online=1"><div class="ico icSe"></div><span>Поиск</span></a></div>

<div class="main"><a href="/settings"><div class="ico ic_Settings"></div><span>Настройки профиля</span></a></div>
<div class="main"><a href="/support"><div class="ico icSupp"></div><span>Помощь {new-support}</span></a></div>
<div class="main"><a href="/index.php?act=change_fullver"><div class="ico ic_Pc"></div><span>Версия для ПК</span></a></div>
<div class="main"><a href="/?act=logout"><div class="ico ic_Logout"></div><span>Выход</span></a></div>


</div>[/aviable][/logged]
<div id="page" style="margin-top: 46px;padding-top: 5px;"><div class="infobl"></div><div class="body_shadow no_display"></div>{info}{content}</div>
<div id="modalbox"></div>
<div class="clr"></div>
</div>
</body>
</html>