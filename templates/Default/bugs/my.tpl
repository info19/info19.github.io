<div class="menuNews" style="    background: #fff;
    width: 102%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
    height: 26px;
    padding-left: 0px;
    margin-left: -16px;
    margin-top: -12px;">
<li class="activClass" onclick="Page.Go('/?go=bugs'); return false;">Список багов</li>
<div class="clear"></div>
</div>
<br>
<div class="bugsPage">
	<div class="bugsContent">	
	{load}
	</div>
	<div class="bugsPanel">
		<li onclick="Page.Go('/bugs'); return false;">Все баги <div class="icon-plus-6" id="bugs_add_btn" onclick="bugs.box();"></div></li>
		<li onclick="Page.Go('/bugs?act=open'); return false;">Открытые</li>
		<li onclick="Page.Go('/bugs?act=complete');">Исправленные</li>
		<li onclick="Page.Go('/bugs?act=close');">Отклоненные</li>
		<li class="active" onclick="Page.Go('/bugs?act=my');">Мои баги</li>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>

<style>
.padcont {
    padding: 15px;
    padding-top: 10px;
    padding-bottom: 0px;
}
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 103px !important;
    word-wrap: break-word;
}
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: none !important;
    background: none !important;
}
.bugsPage {
    background: none !important;
    margin-left: 0px;
    margin-top: -12px;
    width: 785px;
    padding: 0px;
    line-height: 105%;
}
.bugsContent {
    padding: 10px;
    background: none !important;
    border-right: none !important;
    float: left;
    width: 585px;
    min-height: 200px;
}
.bug_item {
    padding: 10px 0;
    border-top: none !important;
    background: #fff;
    width: 100%;
    margin-left: -26px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
</style>