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
</style>