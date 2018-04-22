<script type="text/javascript">
$(document).ready(function(){
	if($('#query_full').val() == 'Начните вводить любое слово или имя')
		$('#query_full').val('');
});
</script>
<input type="text" value="{query}" class="inp" id="query_full"  style="width:40%;margin:5px 10px 0px 10px;color:#000;float:left;padding:3px;padding-bottom:4px" maxlength="65" />
<button class="button" onClick="gSearch.go(); return false" style="margin-top:5px;">Найти</button>
<div class="clr"></div>
<div class="tmenuf2" style="margin-top:0px">
 <div class="{activetab-1}"><a href="/?{query-people}">Люди</a></div>
 <div class="{activetab-4}"><a href="/?go=search{query-groups}">Сообщества</a></div>
</div>
<input type="hidden" value="{type}" id="se_type_full" />
<div class="clr"></div>
[yes]<div class="search_result_title">Найдено {count}</div>[/yes]