<script type="text/javascript">
$(document).ready(function(){
	music.jPlayerInc();
	[search-tab]$('#page').css('min-height', '444px');
	$(window).scroll(function(){
		if($(window).scrollTop() > 103)
			$('.search_sotrt_tab').css('position', 'fixed').css('margin-top', '-119px');
		else
			$('.search_sotrt_tab').css('position', 'absolute').css('margin-top', '27px');
	});[/search-tab]
	myhtml.checked(['{checked-online}', '{checked-user-photo}']);	
	var query = $('#query_full').val();
	if(query == '{translate=search_51}')
		$('#query_full').css('color', '#c1cad0');
});
</script>

<style>
.cont_border_left {
    background-color: #fff;
    border-radius: 3px;
    margin-top: 26px;
    min-height: 568px;
}
</style>

<div class="search_form">
	<input type="text" value="" maxlength="65" placeholder="{translate=search_51}" onkeypress="if(event.keyCode == 13) gSearch.go();" id="query_full">
	<div class="button_div fl_r" style="position:absolute;top:9px;right:10px;"><button onclick="gSearch.go(); return false">{translate=lang_39}</button></div>	
	<div class="clear"></div>
</div>
<div class="search_form_tab" style="margin-top: 0px !important;background: #F7F7F7;padding-top: 10px;">
<div class="buttonsprofile albumsbuttonsprofile buttonsprofileSecond" style="height:22px">
<div class="{activetab-1}"><a href="/?go=search&amp;type=1&amp;query=" onclick="Page.Go(this.href); return false;"><div><b>{translate=search_47}</b></div></a></div>
 <div class="{activetab-4}"><a href="/?go=search&amp;type=4&amp;query=" onclick="Page.Go(this.href); return false;"><div><b>{translate=search_48}</b></div></a></div>
 <div class="{activetab-5}"><a href="/?go=search&amp;type=5&amp;query=" onclick="Page.Go(this.href); return false;"><div><b>{translate=search_49}</b></div></a></div>
 <div class="{activetab-2}"><a href="/?go=search&amp;type=2&amp;query=" onclick="Page.Go(this.href); return false;"><div><b>{translate=search_50}</b></div></a></div>
 <div class="clear"></div>
</div>
<input type="hidden" value="{type}" id="se_type_full" />
</div>

[search-tab]<div class="search_sotrt_tab">
   
 <b>{translate=lang_527}</b>
 <div class="search_clear"></div>
   
 <div class="padstylej"><select name="country" id="country" class="inpst search_sel" onChange="Profile.LoadCity(this.value); gSearch.go();"><option value="0">{translate=lang_528}</option>{country}</select><img src="{theme}/images/loading_mini.gif" alt="" class="load_mini" id="load_mini" /></div>
 <div class="search_clear"></div>

 <div class="padstylej"><select name="city" id="select_city" class="inpst search_sel" onChange="gSearch.go();"><option value="0">{translate=lang_529}</option>{city}</select></div>
 <div class="search_clear"></div>
 
 <div class="html_checkbox" id="online" onClick="myhtml.checkbox(this.id); gSearch.go();">{translate=lang_530}</div>
 <div class="html_checkbox" id="user_photo" onClick="myhtml.checkbox(this.id); gSearch.go();" style="margin-top:9px">{translate=lang_531}</div>
 <div class="search_clear" style="margin-top:26px"></div>
 
 <b>{translate=lang_532}</b>
 <div class="search_clear"></div>
  
 <div class="padstylej"><select name="sex" id="sex" class="inpst search_sel" onChange="gSearch.go();"><option value="0">{translate=lang_533}</option>{sex}</select></div>
 <div class="search_clear"></div>

 <b>{translate=lang_534}</b>
 <div class="search_clear"></div>
 
 <div class="padstylej"><select name="day" class="inpst search_sel" id="day" onChange="gSearch.go();"><option value="0">{translate=lang_535}</option>{day}</select>
 <div class="search_clear"></div>
  
 <select name="month" class="inpst search_sel" id="month" onChange="gSearch.go();"><option value="0">{translate=lang_536}</option>{month}</select>
 <div class="search_clear"></div>
  
 <select name="year" class="inpst search_sel" id="year" onChange="gSearch.go();"><option value="0">{translate=lang_537}</option>{year}</select></div>
 <div class="search_clear"></div>
  
</div>[/search-tab]

<div class="clear"></div>
[yes]<div class="margin_top_10"></div><div class="search_result_title">{translate=lang_538} {count}</div>[/yes]
<div id="jquery_jplayer"></div>
<input type="hidden" id="teck_id" value="0" />
<input type="hidden" id="typePlay" value="standart" />
<input type="hidden" id="teck_prefix" value="" />