<script type="text/javascript">
var page_cnt_invite = 1;
</script>
<div class="miniature_box">
 <div class="miniature_pos" style="    padding-bottom: 0px;">
<div class="boxbginv" style="
    padding: 18px;
    font-size: 13px;
    font-weight: bold;
    color: #fff;
    background: #5780ab;
    z-index: 900;
    height: 18px;
    width: 650px;
    margin-top: -20px;
    margin-left: -21px;
">
  <div class="miniature_title fl_l" style="    color: #FFF;
    padding: 3px;
    font-size: 13px;
    font-weight: bold;">Приглашение в сообщество</div><i class="box_close icon-cancel-3" onClick="viiBox.clos('inviteBox', 1); return false;" style="    margin-top: 1px;"></i>
  </div>
  <div class="miniature_text clear">
  </div>
  <div style="margin-right:-20px" id="inviteUsers">{friends}</div>
  <div class="clear"></div>
  <input type="hidden" id="userInviteList" />
  [but]<div class="rate_alluser cursor_pointer" style="margin-top:0px" onClick="groups.inviteFriendsPage('{id}')" id="invite_prev_ubut"><div id="load_invite_prev_ubut" style="    margin-left: -20px;
    background: #E7EBF1;
    padding: 12px;
    text-align: center;
    width: 661px;
    line-height: 33px;
    color: #6287AE;
    font-size: 14px;
    height: 32px;">Показать больше друзей</div></div>[/but]
	
	<div class="box_bottom" style="    margin-top: 0px;
    height: 26px;
    margin-left: -20px;
    width: 655px;">			<div class="fl_l"><div id="box_loading" style="display:none;width: 682px;text-align:center;padding: 6px;"><img src="/images/loading_mini.gif"></div><div style="color: #666;margin-top: 6px;">Выберете друзей</div></div>			<div class="fl_r"><div class="button_div fl_l" style="margin-right: 8px;" id="buttomDiv"><button onClick="groups.inviteSend('{id}')" id="invSending">Отправить приглашения</button></div><div class="button_div_gray fl_l"><button onClick="viiBox.clos('inviteBox', 1);">Отмена</button></div></div>			<div class="clear"></div>			</div>
  <div class="clear"></div>
 </div>
</div>