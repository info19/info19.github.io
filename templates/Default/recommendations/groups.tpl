<div class="groups_rec">
 <a href="/public{public-id}" onClick="Page.Go(this.href); return false"><div class="friends_ava"><img src="{ava}" alt="" /></div></a>
<div style="margin-top:5px;height:15px;width: 120px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">
  <a href="/public{public-id}" onClick="Page.Go(this.href); return false"><b>{name}</b></a>
</div>
<div class="user_descr">
{traf}
</div>
[yes-group]
<div class="button_div_gray fl_l " id="yes_group{public-id}"><button onClick="groups.exit2('{public-id}', 1); return false" style="">Вы подписаны</button></div>
[/yes-group]

[no-group]
<div class="button_div fl_l" id="no_group{public-id}"><button onClick="groups.login('{public-id}'); return false" style="">Подписаться</button></div>
[/no-group]
 </div>