<style>
.edit_general_wrap{    margin-left: 0px;
    width: 798px;
    padding: 25px 0 40px;}
.padcont {
padding: 0px;
}
.menuNews {
margin-left:0px;
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
    margin-left: 103px !important;
    word-wrap: break-word;
}
.cont_border_right {
    background: none !important;
}
.allbar_title {
    padding-left: 0px;
    padding-top: 10px;
    margin-top: 17px;
    margin-left: 0px;
    font-weight: normal;
    color: #567ca4;
    border-bottom: 1px solid rgba(100,100,100,0.08) !important;
    font-size: 14px;
    background: #fff;
    width: 96%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
</style>

<div class="menuNews"  style="background: #fff;
    width: 98%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
    height: 27px;
    margin-left: -1px;
    margin-top: -25px;
    padding-top: 11px;
    padding-left: 0px;
    height: 26px;">
    <li onClick="Page.Go('/settings')">Общее</li>
    <li onClick="Page.Go('/settings/privacy')" >Приватность</li>
    <li onClick="Page.Go('/settings/blacklist')" class="activClass">Черный список</li>
    <div class="clear"></div>
</div>
[yes-users]<div class="margin_top_10"></div><div class="allbar_title">В Вашем черном списке находится {cnt}</div>[/yes-users]