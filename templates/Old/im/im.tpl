<div class="remove icon-cancel-3" onMouseOver="myhtml.title({uid}, 'Удалить диалог', 'deia');"><div class="remove icon-cancel-3" onClick="im.box_del('{uid}'); return false" onmouseout="im.onviewim('{uid}')" onMouseOver="im.viewim('{uid}')" id="deia{uid}" style="display:none"></div></div>
<div class="dialogs_row dialogs_msg" onClick="Page.Go('/im&sel={uid}'); "  onmouseover="im.viewim('{uid}')" onmouseout="im.onviewim('{uid}')" id="im_dialog{uid}" style="{css_new_f}">
  <table cellpadding="0" cellspacing="0" class="dialogs_row_t">
    <tbody><tr>
      <td class="dialogs_photo">
        <a href="/i{uid}" target="_blank"><img src="{ava}" width="50" height="50"></a>
      </td>
      <td class="dialogs_info">
        <div class="dialogs_user wrapped"><a href="/i{uid}" target="_blank">{name}</a></div>
        
        <div class="dialogs_date">{date}</div>
      </td>
      <td class="dialogs_msg_contents">
        <div class="dialogs_msg_body {css_new} clear_fix">
          [author]<img class="dialogs_inline_author fl_l" src="{ava-author}" width="32" height="32">[/author]
          <div class="dialogs_msg_text wrapped fl_l"><div>{text}&nbsp;</div><div>{attach}</div></div>
        </div>
      </td>
    </tr>
</tbody></table>
</div>