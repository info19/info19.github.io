<div class="bgprof" style="
    height: 27px;
    margin-left: -23px;
    margin-top: -12px;
">
<div class="menuNews">
    <li onClick="Page.Go('/groups')" class="activClass">Сообщества</li>
    <li onClick="Page.Go('/groups?act=admin')" >Управление сообществами</li>
	<li onclick="groups.createbox(); return false;">Создать сообщество</li>
    <div class="clear"></div>
</div>
</div>

<div class="search_form_tab groupds_stab" style="    display: none;">
<div class="groups_sinp_bl">
<input type="text" class="fave_input1 serch_groups_inp" id="query_groups" onkeyup="all_groups.keyUp(this.value);" maxlength="65">
</div>

<div class="button_div fl_r "><button onclick="groups.createbox(); return false" style="margin-top: 6px;">Создать сообщество</button></div>

<div class="clear"></div>
</div>

<div class="margin_top_10"></div><div class="allbar_title" [yes]style="margin-bottom:0px;border-bottom:0px"[/yes]>[yes]Вы состоите в {num}[/yes][no]<div class="no0" style="text-align: center;
    margin-top: -30px;
    line-height: 40px;
    margin-bottom: -15px;
    margin-left: -14px;
    height: 41px;
    font-size: 14px;
    background: #fff;
    width: 100%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">Вы не состоите ни в одном сообществе.</div>[/no]</div>
[no]<div class="info_center1"><br />

<div class="allbar_title1" style="width: 763px;text-align: left;margin-left: 0px;">Рекомендуемые сообщества</div>
{rec}

</div>[/no]

<style>
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 110px !important;
    word-wrap: break-word;
}
.friends_onefriend {
    float: left;
    width: 50%;
    overflow: hidden;
    margin-left: -22px;
    height: 100px;
    border-bottom: 1px solid rgba(100,100,100,0.08);
    border-top: none !important;
    padding-top: 10px;
    padding-bottom: 10px;
    margin-top: 17px;
    margin-bottom: -18px;
    background: #fff;
    width: 100%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: none !important;
    background: none !important;
}
.allbar_title {
    padding-left: 0px;
    padding-top: 10px;
    margin-top: 17px;
    margin-left: -23px;
    font-weight: normal;
    color: #567ca4;
    border-bottom: 1px solid rgba(100,100,100,0.08) !important;
    font-size: 14px;
    background: #fff;
    width: 100%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.allbar_title1 {
    padding-left: 0px;
    padding-top: 10px;
    line-height: 13px;
    height: 13px;
    margin-top: -26px;
    margin-left: -23px !important;
    font-weight: normal;
    color: #567ca4;
    border-bottom: 1px solid rgba(100,100,100,0.08) !important;
    font-size: 14px;
    text-align: none !important;
    background: #fff;
    width: 100% !important;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
</style>