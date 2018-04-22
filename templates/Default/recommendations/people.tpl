<div class="friends_rec">
 <a href="/u{user-id}" onClick="Page.Go(this.href); return false"><div class="friends_ava"><img src="{ava}" alt="" /></div></a>
<div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
  <a href="/u{user-id}" onClick="Page.Go(this.href); return false"><b>{full_name}</b></a>
</div>
<div class="user_descr">
  {age}{city}
</div>
[no-friends]
<div class="button_div fl_l" id="no_friends{user-id}">
<button onclick="friends.add({user-id}, '{full_name}'); return false" class="fl_l">Добавить в друзья</button>
</div>
[/no-friends]
[yes-friends]
<div class="button_div big_btn done_btn fl_l" id="yes_friends{user-id}"><button onclick="friends.delet({user-id}, '{full_name}'); return false" style="width:125px">Удалить из друзей</button></div>
[/yes-friends]
 </div>