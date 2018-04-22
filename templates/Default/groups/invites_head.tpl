<div class="bgprof" style="
    height: 27px;
    margin-left: -23px;
    margin-top: -12px;
">
<div class="menuNews">
    <li onClick="Page.Go('/groups')" >Сообщества</li>
    <li onClick="Page.Go('/groups?act=admin')" >Управление сообществами</li>
	<li onclick="groups.createbox(); return false;" >Создать сообщество</li>
	<li href="/groups?act=invites" onClick="Page.Go(this.href); return false;" class="activClass">Приглашения</li>	
    <div class="clear"></div>
</div>
</div>
<div class="margin_top_10"></div><div class="allbar_title" [yes]style="margin-bottom:0px;border-bottom:0px"[/yes]>[yes]У Вас {num}[/yes][no]Нет приглашений[/no]</div>
[no]<div class="info_center"><br /><br />У Вас нет приглашений в сообщества.<br /><br /><br /></div>[/no]

<style>
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
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 110px !important;
    word-wrap: break-word;
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
</style>