<script type="text/javascript">
$(document).ready(function(){
	music.jPlayerInc();
	$('.fast_form_width').autoResize();
});
$(document).click(function(event){
	wall.event(event);
});
</script>
<style>.newcolor000{color:#000}</style>
<div class="buttonsprofile albumsbuttonsprofile" style="    background: #fff;
    margin-top: -9px;
    width: 777px;
    margin-left: -15px;
    height: 24px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">
 <div class="{activetab-}"><a href="/wall{uid}" onClick="Page.Go(this.href); return false;"><div>Все записи</div></a></div>
 <div class="{activetab-own}"><a href="/wall{uid}_sec=own" onClick="Page.Go(this.href); return false;"><div>Записи {name}</div></a></div>
 [record-tab]<div class="{activetab-record}"><a href="/wall{uid}_{rec-id}" onClick="Page.Go(this.href); return false;"><div>Запись на стене</div></a></div>[/record-tab]
 <a href="/u{uid}" onClick="Page.Go(this.href); return false;"><div>К странице {name}</div></a>
</div>
<div class="clear"></div><div style="margin-top:10px;"></div>
<div id="jquery_jplayer"></div>
<input type="hidden" id="teck_id" value="" />
<input type="hidden" id="teck_prefix" value="" />
<input type="hidden" id="typePlay" value="standart" />

<style>
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: none !important;
    background: none !important;
}
</style>