<script type="text/javascript" src="{theme}/js/profile_edit.js"></script>
<div class="allbar_title">Пожалуйста, укажите Ваш ВУЗ</div>
<div style="font-weight:100;font-size: 12px;">Здесь Вы можете указать основное и дополнительные высшие образования.</div>
<div class="mgclr"></div>
<br>
<div class="texta" >Страна:</div>
  <div class="padstylej">



<div id="container1" class="selector_container dropdown_container selector_focused fl_l editpr_fieldlist editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected" readonly="true"  value="{country_name}" style="color: rgb(0, 0, 0); width: 131px; " id="container1" >
							<input type="hidden" onChange="Profile.LoadCity(this.value);" name="country" id="country" value="{country_id}" class="resultField" >
						
					</td>
					<td id="container1" class="selector_dropdown" style="width: 17px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container results_container1" style="display:none">
		<div class="result_list result_list1" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul onmousedown="Profile.LoadCity(this.value); return false;" value ="{country_id}" id="resultField1">{country}</ul></div>
		<div class="result_list_shadow" style="width: 165px; margin-top: 17px; " ><div class="shadow1"></div><div class="shadow2"></div></div></div></div>


<img src="{theme}/images/loading_mini.gif" alt="" class="load_mini" id="load_mini" /></div>

<span id="city">
<div class="mgclr"></div>
<br>
<div class="texta">Город:</div>

 <div>

<div id="container2" class="selector_container dropdown_container selector_focused fl_l editpr_fieldlist editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected resetvalue" readonly="true"  value="{city_name}" style="color: rgb(0, 0, 0); width: 131px; " id="container2" >
							<input type="hidden" onChange="gSearch.go();" name="city" id="select_city" value="{city_id}" class="resultField" >
						
					</td>
					<td id="container2" class="selector_dropdown" style="width: 17px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul id="select_city1">{city}</ul></div>
		<div class="result_list_shadow" style="width: 165px; margin-top: 217px; " ><div class="shadow1"></div><div class="shadow2"></div></div></div></div>

<img src="{theme}/images/loading_mini.gif" alt="" class="load_mini" id="load_mini" /></div>
</span>
<div class="mgclr"></div>
<div class="texta">ВУЗ:</div>
<input type="text" id="vuz" class="inpst" maxlength="100" value="{vuz}" style="width:150px;" />
<div class="mgclr"></div>
<div class="texta">Факультет:</div>
<input type="text" id="fac" class="inpst" maxlength="100" value="{fac}" style="width:150px;" />
<div class="mgclr"></div>

<div class="texta" >Форма обучения:</div>
 <div class="padstylej"><div id="container10" class="selector_container dropdown_container selector_focused fl_l editpr_fieldlist editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected resetvalue" readonly="true"  value="{form_name}" style="color: rgb(0, 0, 0); width: 131px; " id="container10" >
							<input type="hidden" name="form" id="form" value="{form_id}" class="resultField" >
						
					</td>
					<td id="container10" class="selector_dropdown" style="width: 17px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul>{form}</ul></div></div></div></div>
<div class="mgclr"></div>
<div class="texta">Статус:</div>
 <div class="padstylej"><div id="container11" class="selector_container dropdown_container selector_focused fl_l editpr_fieldlist editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected resetvalue" readonly="true"  value="{statusvi_name}" style="color: rgb(0, 0, 0); width: 131px; " id="container11" >
							<input type="hidden" name="statusvi" id="statusvi" value="{statusvi_id}" class="resultField" >
						
					</td>
					<td id="container11" class="selector_dropdown" style="width: 17px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul>{statusvi}</ul></div></div></div></div>
<div class="mgclr"></div>
<div class="texta">Дата выпуска:</div>
 <div class="padstylej"><div id="container3" class="selector_container dropdown_container selector_focused fl_l editpr_fieldlist editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected resetvalue" readonly="true"  value="{datavi_name}" style="color: rgb(0, 0, 0); width: 131px; " id="container3" >
							<input type="hidden" name="datavi" id="datavi" value="{datavi_id}" class="resultField" >
						
					</td>
					<td id="container3" class="selector_dropdown" style="width: 17px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul>{datavi}</ul></div></div></div>

</div><div class="mgclr"></div>
<div class="texta">&nbsp;</div><div class="button_div fl_l big_btn" style="
    width: 146px;
    margin-top: 10px;
"><button name="save" class="button" id="saveform_higher_education_reg">Далее</button></div>