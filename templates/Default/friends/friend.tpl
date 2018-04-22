<div class="friends_onefriend width_100" id="friend_{user-id}">
 <a href="/u{user-id}" onClick="Page.Go(this.href); return false"><div class="friends_ava"><img src="{ava}" alt="" id="ava_{user-id}" /></div></a>
 <div class="fl_l" style="width:400px">
  <a href="/u{user-id}" onClick="Page.Go(this.href); return false">{name}</a>{verification}<div class="friends_clr"></div>
  {country}{city}<div class="friends_clr"></div>
  {age}<div class="friends_clr"></div>
  <span class="online">{online}</span><div class="friends_clr"></div>
 </div>
 <div class="menuleft fl_r friends_m">
  [viewer]<a href="/" onClick="messages.new_({user-id}); return false"><div>Написать сообщение</div></a>[/viewer]
  [owner]<a onMouseDown="friends.delet({user-id}, 0); return false"><div>Убрать из друзей</div></a>[/owner]
  <a href="/albums/{user-id}" onClick="Page.Go(this.href); return false"><div> Альбомы</div></a>
 </div>
</div>

<style>
.width_100 {
    width: 100%;
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
</style>