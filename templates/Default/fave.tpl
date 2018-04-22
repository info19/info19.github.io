<tr class="onefaveu" id="user_{user-id}"><td><div class="fave_del_ic" onMouseOver="myhtml.title('{user-id}', 'Удалить из закладок', 'fave_user_')" onClick="fave.del_box('{user-id}'); return false" id="fave_user_{user-id}"></div><a href="/u{user-id}" onClick="Page.Go(this.href); return false"><img src="{ava}" alt="" /><div class="fave_tpad">{name}</div></a><span class="online">{online}</span></td></tr>

<style>
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
    background: #fff;
}
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 103px !important;
    word-wrap: break-word;
}
</style>