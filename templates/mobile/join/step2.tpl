<script type="text/javascript" src="{theme}/js/profile_edit.js"></script>
<div class="allbar_title">Пожалуйста, укажите Вашу школу</div>
  <div  style="font-weight:100;font-size: 12px;">Здесь Вы можете указать учебное заведение, в которых Вы учились или учитесь.</div>
<div class="mgclr"></div><br>
<div class="texta" >Страна:</div>
 



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
		<div class="result_list_shadow" style="width: 165px; margin-top: 17px; " ><div class="shadow1"></div><div class="shadow2"></div></div></div>










<img src="{theme}/images/loading_mini.gif" alt="" class="load_mini" id="load_mini" /></div>
<div class="mgclr"></div>
<br>
<span id="city">
<div class="texta" >Город:</div>



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

<img src="{theme}/images/loading_mini.gif" alt="" class="load_mini" id="load_mini" />
</span>

<div class="mgclr"></div>

<div class="texta">Школа:</div><input type="text" id="shkola" class="inpst" maxlength="100" value="{shkola}" style="width:150px;" />
<div class="mgclr"></div>


<div class="texta">Год начала обучения:</div>
 <div class="padstylej" ><div id="container3" class="selector_container dropdown_container selector_focused fl_l editpr_fieldlist editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected resetvalue" readonly="true"  value="{nacalosr_name}" style="color: rgb(0, 0, 0); width: 131px; " id="container3" >
							<input type="hidden" name="nacalosr" id="nacalosr" value="{nacalosr_id}" class="resultField" >
						
					</td>
					<td id="container3" class="selector_dropdown" style="width: 17px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul>{nacalosr}</ul></div></div></div>
</div>
<div class="mgclr"></div>

<div class="texta">Год окончания обучения:</div>
 <div class="padstylej"><div id="container4" class="selector_container dropdown_container selector_focused fl_l editpr_fieldlist editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected resetvalue" readonly="true"  value="{konecsr_name}" style="color: rgb(0, 0, 0); width: 131px; " id="container4" >
							<input type="hidden" name="konecsr" id="konecsr" value="{konecsr_id}" class="resultField" >
						
					</td>
					<td id="container4" class="selector_dropdown" style="width: 17px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul>{konecsr}</ul></div></div></div>
</div>
<div class="mgclr"></div>
<div class="texta" >Дата выпуска:</div>
 <div class="padstylej">
<div id="container5" class="selector_container dropdown_container selector_focused fl_l editpr_fieldlist editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected resetvalue" readonly="true"  value="{datasr_name}" style="color: rgb(0, 0, 0); width: 131px; " id="container5" >
							<input type="hidden" name="datasr" id="datasr" value="{datasr_id}" class="resultField" >
						
					</td>
					<td id="container5" class="selector_dropdown" style="width: 17px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul>{datasr}</ul></div></div></div>
<div class="mgclr"></div>
<div class="texta" >Класс:</div>
 <div class="padstylej"><div id="container9" class="fl_l selector_container dropdown_container selector_focused editpr_fieldlist">
		<table cellspacing="0" cellpadding="0" class="selector_table">
			<tbody>
				<tr>
					<td class="selector">
						<span class="selected_items"></span>
							<input type="text" class="selector_input selected" readonly="true"  value="{klass_name}" style="color: rgb(0, 0, 0); width: 131px; " id="container9" >
							<input type="hidden"  name="klass" id="klass" value="{klass_id}" class="resultField" >
						
					</td>
					<td id="container9" class="selector_dropdown" style="width: 17px; ">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="results_container" style="display:none">
		<div class="result_list" style="opacity: 1; width: 165px; height: 218px; bottom: auto; visibility: visible;overflow-x: hidden; overflow-y: visible;"><ul onmousedown="sp.check()">{klass}</ul></div>
		<div class="result_list_shadow" style="width: 165px; margin-top: 217px; " ><div class="shadow1"></div><div class="shadow2"></div></div></div></div></div>
<div class="mgclr"></div>
<div class="texta">Специализация:</div><input type="text" id="spec" class="inpst" maxlength="100" value="{spec}" style="width:150px;" />
</div>
<div class="texta">&nbsp;</div><div class="button_div fl_l big_btn" style="
    width: 146px;
"><button name="save" class="button" id="saveform_education_reg">Далее</button></div>