<div id="box_view" class="box_pos" cb-datas="" style="display: block">
<div class="box_bg" style="width: 500px; margin-top: 30px;">
<div class="box_title">
<span id="btitle" dir="auto">Просмотр бага</span>
<a onclick="Box.Close(); return false;" class="dark_box_close fl_r">Закрыть</a></div>
<div class="box_conetnt">
<div class="bug_head">
				<a href="/u{uid}" onclick="Page.Go(this.href); return false;"><img src="{ava}"></a>
				<div class="cont">
					<div class="title">{title}</div>
					<div class="date">Обновлено {date}</div>
					<div style="margin-left: 367px;margin-top: -17px;">{delete}</div>
					</div>
				<div class="clear"></div>
			</div>
			<div class="bug_content">
				<div class="form">{text}<div style="margin-top:10px;">
				<div style="margin-top:5px;width: 472px;">
				<div class="wall_photo" style="width: 355px;max-height: 400px;" onclick="Photos.openAll(this, 18922, 0, 0, 0)">
				<img src="{photo}" style="width: 65%; opacity: 1;" class="">
					</div>
				</div>
			<div class="clear">
		</div>
	</div>
</div>
				<span class="state">Статус: {status}</span>&nbsp;&nbsp;
				<span class="color777">{sex} {name}</span>
				
				<div class="bug_comment">
				<div class="adm"><a href="/u{uid}">{admin}</a> изменил статус на <b>{status}</b></div>
				<div class="comm">{admin_text}</div>	
				</div>
				
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>