<script type="text/javascript" src="{theme}/js/profile_edit.js"></script>
[general]
<div class="tmenuf">
 <div><a href="/editmypage">Основное</a></div>
 <a href="/editmypage/contact">Контакты</a>
 <a href="/editmypage/interests">Интересы</a>
</div>
<div class="clr"></div>
<div class="err_yellow" id="info_save" style="display:none;font-weight:normal;"></div>
<div class="clear"></div>
<div style="
margin-left: 15px;
  margin-right: 15px;
  margin-top: -15px;
  width: 280px;
">
<div class="texta">Пол:</div>



<div id="container1" class="selector_container dropdown_container fl_l selector_focused editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected" readonly="true"  value="{sex_name}" style="color: rgb(0, 0, 0); width: 122px; " id="container1" >
							<input type="hidden"  name="sex" id="sex" value="{sex_id}" class="resultField" >
						
					</td>
					<td id="container1" class="selector_dropdown" style="width: 25px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul onmousedown="sp.check()">{sex}</ul></div>
		<div class="result_list_shadow" style="width: 165px; margin-top: 217px; " ><div class="shadow1"></div><div class="shadow2"></div></div></div></div>


<div class="[sp-all]no_display[/sp-all]" id="sp_block"><div class="mgclr"></div><div class="texta">Семейное положение:</div>
 <div class="padstylej">
 <div class="[user-m]no_display[/user-m]" id="sp_sel_m">


<div id="container6" class="selector_container dropdown_container fl_l selector_focused editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected" readonly="true"  value="{sp_name}" style="color: rgb(0, 0, 0); width: 122px; " id="container6" >
							<input type="hidden"  name="sex" id="sp" value="{sp_id}" class="resultField" >
						
					</td>
					<td id="container6" class="selector_dropdown" style="width: 25px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 161px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul onmousedown="sp.openfriends()">
<li onmousemove="Select.itemMouseMove(6, 0)"  val="0" class="">- Не выбрано -</li>
<li onmousemove="Select.itemMouseMove(6, 1)"  val="1" class="">Не женат</li>
<li onmousemove="Select.itemMouseMove(6, 2)"  val="2" class="">Есть подруга</li>
<li onmousemove="Select.itemMouseMove(6, 3)"  val="3" class="">Помовлен</li>
<li onmousemove="Select.itemMouseMove(6, 4)"  val="4" class="">Женат</li>
<li onmousemove="Select.itemMouseMove(6, 5)"  val="5" class="">Влюблён</li>
<li onmousemove="Select.itemMouseMove(6, 6)"  val="6" class="">Всё сложно</li>
<li onmousemove="Select.itemMouseMove(6, 7)"  val="7" class="">В активном поиске</li>
</ul></div>
		<div class="result_list_shadow" style="width: 165px; margin-top: 161px; " ><div class="shadow1"></div><div class="shadow2"></div></div></div></div>






</div>
 <div class="[user-w]no_display[/user-w]" id="sp_sel_w">


<div id="container7" class="selector_container dropdown_container fl_l selector_focused editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected" readonly="true"  value="{sp_name}" style="color: rgb(0, 0, 0); width: 122px; " id="container7" >
							<input type="hidden"  name="sex" id="sp_w" value="{sp_id}" class="resultField" >
						
					</td>
					<td id="container7" class="selector_dropdown" style="width: 25px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul onmousedown="sp.openfriends()">
<li onmousemove="Select.itemMouseMove(7, 0)"  val="0" class="">- Не выбрано -</li>
<li onmousemove="Select.itemMouseMove(7, 1)"  val="1" class="">Не замужем</li>
<li onmousemove="Select.itemMouseMove(7, 2)"  val="2" class="">Есть друг</li>
<li onmousemove="Select.itemMouseMove(7, 3)"  val="3" class="">Помовлена</li>
<li onmousemove="Select.itemMouseMove(7, 4)"  val="4" class="">Замужем</li>
<li onmousemove="Select.itemMouseMove(7, 5)"  val="5" class="">Влюблена</li>
<li onmousemove="Select.itemMouseMove(7, 6)"  val="6" class="">Всё сложно</li>
<li onmousemove="Select.itemMouseMove(7, 7)"  val="7" class="">В активном поиске</li>
</ul></div>
		<div class="result_list_shadow" style="width: 165px; margin-top: 217px; " ><div class="shadow1"></div><div class="shadow2"></div></div></div></div>




</div>
 </div>
</div>
<div class="[sp]no_display[/sp]" style="font-size: 10px; margin-left: 342px; margin-top:-13px;padding-top:0px;position:absolute" id="sp_type">
<div class="texta2" id="sp_text">{sp-text}</div>
 <div class="padstylej fl_l"><div style="margin-top:3px;margin-bottom:10px;padding-left:1px;float:left"><a href="/" id="sp_name" onClick="sp.openfriends(); return false">{sp-name}</a></div><img src="{theme}/images/close_a_wall.png" width=7 class="sp_del" onClick="sp.del()" /></div>
<input type="hidden" id="sp_val" />
<div class="mgclr"></div>
</div>
<div class="mgclr"></div>
<div class="texta">Дата рождения:</div>
 <div class="padstylej">




  <div id="day_block" class="fl_l editpr_fieldlist_data">
  <div id="container5" class="selector_container dropdown_container selector_focused fl_l" style="width: 88px;">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected" readonly="true" value="{day_name}" style="color: rgb(0, 0, 0); width: 51px; " id="container5">
							<input type="hidden" name="day" id="day" value="{day_id}" class="resultField">
							<input type="hidden" name="public_category_custom" id="public_category_custom" value="" class="customField">
					</td>
					<td id="container5" class="selector_dropdown" style="width: 19px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 88px; height: 250px; visibility: visible; overflow-x: hidden; overflow-y: visible;"><ul id="day_list">{day}</ul></div>
		<div class="result_list_shadow" style="width: 82px; margin-top: 250px; "><div class="shadow1"></div><div class="shadow2"></div></div></div></div>

  <div class="fl_l" style="padding:1px 4px;"></div>
  <div id="container4" class="selector_container dropdown_container selector_focused fl_l" style="width: 95px;">
		<table cellspacing="0" cellpadding="0" class="selector_table" >
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected" readonly="true" value="{month_name}" style="color: rgb(0, 0, 0); width: 58px; " id="container4">
							<input type="hidden" name="month" id="month" value="{month_id}" class="resultField">
							<input type="hidden" name="public_category_custom" id="public_category_custom" value="" class="customField">
					</td>
					<td id="container4" class="selector_dropdown" style="width: 19px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 95px; height: 235px; visibility: visible; overflow-x: hidden; overflow-y: visible;"><ul>{month}</ul></div>
		<div class="result_list_shadow" style="width: 89px; margin-top: 235px; "><div class="shadow1"></div><div class="shadow2"></div></div></div></div>
  <div class="fl_l" style="padding:1px 4px;"></div>
  <div id="container3" class="selector_container dropdown_container selector_focused fl_l" style="width: 79px;">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected" readonly="true" value="{years_name}" style="color: rgb(0, 0, 0); width: 42px; " id="container3">
							<input type="hidden" name="year" id="year" value="{years_id}" class="resultField">
							<input type="hidden" name="public_category_custom" id="public_category_custom" value="" class="customField">
					</td>
					<td id="container3" class="selector_dropdown" style="width: 25px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 79px; height: 250px; visibility: visible; overflow-x: hidden; overflow-y: visible;"><ul>{years}</ul></div>
		<div class="result_list_shadow" style="width: 73px; margin-top: 250px; "><div class="shadow1"></div><div class="shadow2"></div></div></div></div>
  </div>

  </div>
<div class="mgclr"></div>
<div class="texta">Родной город:</div>
<div class="padstylej" ><input type="text" id="rg" class="inpst" maxlength="100" value="{rg}" style="width:150px;margin-bottom:-16px;"></div>

<div class="texta" >Политические взгляды:</div>
 <div class="padstylej"><div id="container8" class="selector_container fl_l dropdown_container selector_focused editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected" readonly="true"  value="{pred_name}" style="color: rgb(0, 0, 0); width: 122px; " id="container8" >
							<input type="hidden"  name="pred" id="pred" value="{pred_id}" class="resultField" >
						
					</td>
					<td id="container8" class="selector_dropdown" style="width: 25px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 203px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul onmousedown="sp.check()">{pred}</ul></div>
		<div class="result_list_shadow" style="width: 165px; margin-top: 201px; " ><div class="shadow1"></div><div class="shadow2"></div></div></div></div>
</div>
<div class="mgclr"></div>
 <div class="texta">Религиозные взгляды:</div>
<input type="text" list="list"  id="miro" value="{miro}" class="inpst" maxlength="100"  style="width:150px;" />

<div class="mgclr"></div>

<button id="saveform" class="button" style="margin-top:10px">Сохранить</button>
</div>[/general]

[contact]
<div class="tmenuf">
 <a href="/editmypage">Основное</a>
 <div><a href="/editmypage/contact">Контакты</a></div>
 <a href="/editmypage/interests">Интересы</a>
</div>
<div class="clr"></div>
<div class="infobl" id="info_save" style="display:none;font-weight:normal;"></div>
<div class="clear"></div>
<div style="margin:0px 10px 10px 10px;">
<div class="texta" style="margin-top:0px">Мобильный телефон:</div><input type="text" id="phone" class="inp" maxlength="50" value="{phone}"  /><span id="validPhone"></span><div class="mgclr"></div>
<div class="texta">В контакте:</div><input type="text" id="vk" class="inp" maxlength="100" value="{vk}" /><span id="validVk"></span><div class="mgclr"></div>
<div class="texta">Одноклассники:</div><input type="text" id="od" class="inp" maxlength="100" value="{od}" /><span id="validOd"></span><div class="mgclr"></div>
<div class="texta">FaceBook:</div><input type="text" id="fb" class="inp" maxlength="100" value="{fb}" /><span id="validFb"></span><div class="mgclr"></div>
<div class="texta">Skype:</div><input type="text" id="skype" class="inp" maxlength="100" value="{skype}" /><span id="validSkype"></span><div class="mgclr"></div>
<div class="texta">ICQ:</div><input type="text" id="icq" class="inp" maxlength="9" value="{icq}" /><span id="validIcq"></span><div class="mgclr"></div>
<div class="texta">Личный сайт:</div><input type="text" id="site" class="inp" maxlength="100" value="{site}" /><span id="validSite"></span><div class="mgclr"></div>
<div class="texta" style="margin-top:-10px">&nbsp;</div><div class="button_div fl_l"><button name="save" id="saveform_contact" class="button">Сохранить</button></div><div class="mgclr"></div>
</div>[/contact]
[interests]
<div class="tmenuf">
 <a href="/editmypage">Основное</a>
 <a href="/editmypage/contact">Контакты</a>
 <div><a href="/editmypage/interests">Интересы</a></div>
</div>
<div class="clr"></div>
<div class="infobl" id="info_save" style="display:none;font-weight:normal;"></div>
<div class="clear"></div>
<div style="margin:0px 10px 10px 10px;">
<div class="texta" style="margin-top:0px">Деятельность:</div><textarea id="activity" class="inp" style="overflow:hidden;">{activity}</textarea><div class="mgclr"></div>
<div class="texta">Интересы:</div><textarea id="interests" class="inp" style="">{interests}</textarea><div class="mgclr"></div>
<div class="texta">Любимая музыка:</div><textarea id="music" class="inp" style="">{music}</textarea><div class="mgclr"></div>
<div class="texta">Любимые фильмы:</div><textarea id="kino" class="inp" style="">{kino}</textarea><div class="mgclr"></div>
<div class="texta">Любимые книги:</div><textarea id="books" class="inp" style="">{books}</textarea><div class="mgclr"></div>
<div class="texta">Любимые игры:</div><textarea id="games" class="inp" style="">{games}</textarea><div class="mgclr"></div>
<div class="texta">Любимые цитаты:</div><textarea id="quote" class="inp" style="">{quote}</textarea><div class="mgclr"></div>
<div class="texta">О себе:</div><textarea id="myinfo" class="inp" style="">{myinfo}</textarea><div class="mgclr"></div>
<div class="texta" style="margin-top:-10px">&nbsp;</div><div class="button_div fl_l"><button name="save" id="saveform_interests" class="button">Сохранить</button></div><div class="mgclr"></div>
</div>[/interests]