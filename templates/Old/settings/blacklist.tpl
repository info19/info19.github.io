<style>
.cont_border_right {
background:#FFF;
}
.cont_border_left {
    border-radius: 3px;
	background:none;
    margin-top: 26px;
}
</style>

<div class="menuNews">
    <li onClick="Page.Go('/settings')">Общее</li>
    <li onClick="Page.Go('/settings/privacy')" >Приватность</li>
    <li onClick="Page.Go('/settings/blacklist')" class="activClass">Черный список</li>
    <div class="clear"></div>
</div>
[yes-users]<div class="margin_top_10"></div><div class="allbar_title">В Вашем черном списке находится {cnt}</div>[/yes-users]