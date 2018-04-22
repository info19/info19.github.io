<div class="menuNews">
    <li onClick="Page.Go('/groups')" class="activClass">Сообщества</li>
    <li onClick="Page.Go('/groups?act=admin')" >Управление сообществами</li>
	<li onclick="groups.createbox(); return false;">Создать сообщество</li>
    <div class="clear"></div>
</div>

<div class="search_form_tab groupds_stab" style="    display: none;">
<div class="groups_sinp_bl">
<input type="text" class="fave_input1 serch_groups_inp" id="query_groups" onkeyup="all_groups.keyUp(this.value);" maxlength="65">
</div>

<div class="button_div fl_r "><button onclick="groups.createbox(); return false" style="margin-top: 6px;">Создать сообщество</button></div>

<div class="clear"></div>
</div>

<div class="margin_top_10"></div><div class="allbar_title" [yes]style="margin-bottom:0px;border-bottom:0px"[/yes]>[yes]Вы состоите в {num}[/yes][no]Вы не состоите ни в одном сообществе.[/no]</div>
[no]<div class="info_center1"><br />
Вы пока не состоите ни в одном сообществе. 

<div class="allbar_title1" style="width: 763px;text-align: left;margin-left: 0px;">Рекомендуемые сообщества</div>
{rec}

</div>[/no]