<div class="friends_onefriend width_100">
 <a href="/{adres}" onClick="Page.Go(this.href); return false"><div class="friends_ava"><img src="{ava}" /></div></a>
 <div class="fl_l" style="width:500px">
  <a href="/{adres}" onClick="Page.Go(this.href); return false"><b>{name}</b> </a> <a onClick="trsn.box()" onMouseover="pageVerifiedTip(this, {text: '', shift: [5,5,0]});"> {verification} </a> <div class="friends_clr"></div>
<span class="color777">{translate=lang_scrscrcsr}</span><div class="friends_clr"></div>
  <span class="color777">{traf}</span><div class="friends_clr"></div>



[yes-group]
<div class="button_div_gray fl_l " id="yes_group{public-id}" style="  margin-top: 7px;"><button onClick="groups.exit2('{public-id}', 1); return false" style="width:125px;padding-top:8px;">{translate=lang_vipodps}</button></div>
[/yes-group]

[no-group]
<div class="button_div fl_l" id="no_group{public-id}" style="  margin-top: 7px;"><button onClick="groups.login('{public-id}'); return false" style="width:125px;padding-top:8px;">{translate=lang_vinepodps}</button></div>
[/no-group] 

 </div>
</div>