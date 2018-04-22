<style>
.edit_general_wrap{margin-left:0px;width:800px;background: #F7F7F7;padding: 25px 0 40px;}
.padcont {
padding: 0px;
}
.menuNews {
margin-left:0px;
}
</style>
<br>
<div class="menuNews">
    <li onClick="Page.Go('/settings')" class="activClass">Общее</li>
    <li onClick="Page.Go('/settings/privacy')">Приватность</li>
    <li onClick="Page.Go('/settings/blacklist')">Черный список</li>
    <div class="clear"></div>
</div>
<div class="edit_general_wrap"> 
<div style="width:600px;margin: -8px auto 0px;">
<div style="color: rgb(57, 78, 99);font-weight: bold;margin: 0 0 15px 19px;">Изменить пароль</div>
<div class="err_red no_display pass_errors" id="err_pass_1" style="font-weight:normal;">Пароль не изменён, так как прежний пароль введён неправильно.</div>
<div class="err_red no_display pass_errors" id="err_pass_2" style="font-weight:normal;">Пароль не изменён, так как новый пароль повторен неправильно.</div>
<div class="err_yellow no_display pass_errors" id="ok_pass" style="font-weight:normal;">Пароль успешно изменён.</div>
<div class="texta">Старый пароль:</div><input type="password" id="old_pass" class="inpst" maxlength="100" style="width:242px;" /><span id="validOldpass"></span><div class="mgclr"></div>
<div class="texta">Новый пароль:</div><input type="password" id="new_pass"  onfocus="$('#jp_check').fadeIn('normal');info.show(this.id, 'Придумайте пароль доступа к вашей странице <br><br>Длина пароля должна быть не менее <b>6 символов</b>')" onblur="$('#jp_check').fadeOut('normal');info.hide(this.id);" class="inpst" maxlength="100" style="width:242px;"><span id="validNewpass"></span>
<div class="mgclr"></div>
<div class="texta">Повторите пароль:</div><input type="password" id="new_pass2" onfocus="$('#jp_check').fadeIn('normal');info.show(this.id, 'Придумайте пароль доступа к вашей странице <br><br>Длина пароля должна быть не менее <b>6 символов</b>')" onblur="$('#jp_check').fadeOut('normal');info.hide(this.id);" class="inpst" maxlength="100" style="width:242px;"/><span id="validNewpass2"></span><div class="mgclr"></div>
<div class="texta">&nbsp;</div><div class="button_div fl_l"><button onClick="settings.saveNewPwd(); return false" id="saveNewPwd">Изменить пароль</button></div><div class="mgclr"></div></div>
<div style="width:600px;margin: 15px auto 0px;">

<div style="color: rgb(57, 78, 99);font-weight: bold;margin: 0 0 15px 19px;">Изменить имя</div>
<div class="err_red no_display name_errors" id="err_name_1" style="font-weight:normal;">Специальные символы и пробелы запрещены.</div>
<div class="err_yellow no_display name_errors" id="ok_name" style="font-weight:normal;">Изменения успешно сохранены.</div>
<div class="texta">Ваше имя:</div><input type="text" id="name" onfocus="$('#jp_check').fadeIn('normal');info.show(this.id, 'Мы просим использовать <b>настоящее имя</b> в полной форме, написанное русскими буквами.<br><br>Например: Анна Петрова, Ян Иванов.')" onblur="$('#jp_check').fadeOut('normal');info.hide(this.id);" class="inpst" maxlength="15"  style="width:242px;" value="{name}" /><span id="validName"></span><div class="mgclr"></div>
<div class="texta">Ваша фамилия:</div><input type="text" id="lastname" onfocus="$('#jp_check').fadeIn('normal');info.show(this.id, 'Мы просим использовать <b>настоящее имя</b> в полной форме, написанное русскими буквами.<br><br>Например: Анна Петрова, Ян Иванов.')" onblur="$('#jp_check').fadeOut('normal');info.hide(this.id);" class="inpst" maxlength="15"  style="width:242px;" value="{lastname}" /><span id="validLastname"></span><div class="mgclr"></div>
<div class="texta">&nbsp;</div><div class="button_div fl_l"><button onClick="settings.saveNewName(); return false" id="saveNewName">Изменить имя</button></div><div class="mgclr"></div></div>


<div style="width:600px;margin: 15px auto 0px;">
<div style="color: rgb(57, 78, 99);font-weight: bold;margin: 0 0 15px 19px;">Адрес персональной страницы</div>
        <div class="err_yellow no_display name_errors" id="ok_alias" style="font-weight:normal;">Адрес персональной страницы был успешно установлен.</div>
        <div class="err_red no_display name_errors" id="err_alias_str" style="font-weight:normal;">Неправильный адрес.</div>
        <div class="err_red no_display name_errors" id="err_alias_name" style="font-weight:normal;">Адрес уже занят.</div>
<div class="texta">Номер страницы:</div><div style="color:#555;margin-top:-3px;margin-bottom:0px">{id}</div><div class="mgclr"></div>
<div style="position:relative;"><div class="edit_link_mx">http://studentosi.ru/</div></div>
<div class="texta">Адрес страницы:</div><font style="color:#555"></font>
<input type="text" id="alias" onfocus="$('#jp_check').fadeIn('normal');info.show(this.id, 'Вы можете установить удобный для вас адрес персональной страницы. Адрес должен быть не менее 5 символов, свободен и состоять из букв латинского алфавита.')" onblur="$('#jp_check').fadeOut('normal');info.hide(this.id);" class="inpst" maxlength="30" style="width: 146px;padding-left: 103px;left: 4px;" value="{alias}" /><div class="mgclr"></div>
  <div class="texta">&nbsp;</div><div class="button_div fl_l"><button onClick="settings.savealias(); return false" id="saveAlias">Сохранить</button></div>
</div>
<div class="mgclr"></div>

<div style="    height: 140px;width:600px;margin: 15px auto 0px;">
<div style="color: rgb(57, 78, 99);font-weight: bold;margin: 0 0 15px 19px;">Адрес Вашей электронной почты</div>
<div class="err_yellow name_errors no_display" id="ok_email" style="font-weight:normal;">На <b>оба</b> почтовых ящика придут письма с подтверждением.</div>
<div class="err_red no_display name_errors" id="err_email" style="font-weight:normal;">Неправильный email адрес</div>
<div class="texta" style="margin-top:-0px;">Текущий адрес:</div><div style="color:#555;margin-top:13px;margin-bottom:0px">{email}</div><div class="mgclr"></div>
<div class="texta">Новый адрес:</div><input type="text" id="email" onfocus="$('#jp_check').fadeIn('normal');info.show(this.id, 'На указанный адрес будет отправлено письмо со ссылкой для потверждения.')" onblur="$('#jp_check').fadeOut('normal');info.hide(this.id);" placeholder="Введите новый e-mail" class="inpst" maxlength="100" style="width:242px;" /><span id="validName"/></span><div class="mgclr"><div class="texta">&nbsp;</div><div class="button_div fl_l" style="    margin-left: 160px;    margin-top: -20px;"><button onClick="settings.savenewmail(); return false" id="saveNewEmail">Сохранить адрес</button> <div class="stariidiz" style="padding: 10px;margin-bottom: 10px;line-height: 160%;text-align: center;font-weight:normal;margin-top: 10px;color: #65686c;margin-left: -139px;border: 1px solid #e7eaf0 !important;width: 480px;border-radius: 6px;border: none;background: #f2f4f7;">Доступная новая версия сайта: <a href="/?act=change_skin" style="text-decoration: underline;">Использовать новую версию сайта</a></div> </div><div class="clear"></div></div></div></div>