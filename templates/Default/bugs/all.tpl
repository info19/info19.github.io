<div class="bug_item">
				<a href="" onclick="bugs.view({id}); return false;"><img src="{ava}"></a>
				<div class="cont">
					<div class="title"><a href="#" onclick="bugs.view({id}); return false;">{title}</a></div>
					<div class="author">{sex} <a href="/u{uid}" onclick="Page.Go(this.href); return false;">{name}</a></div>
				</div>
				<div class="status_bug">
					<div class="state">Статус:{status}</div>
					<div class="adddate">обновлено {date}</div>
				</div>
				<div class="clear"></div>
			</div>
			
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