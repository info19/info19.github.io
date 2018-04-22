<style>
.padcont {
background: none;
border-radius: none;
/* padding: 10px; */
margin-bottom: none;
border: none;
min-width: none;
margin-left: none;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	videos.scroll();
});
</script>

 [not-owner]<a href="/u{user-id}" onClick="Page.Go(this.href); return false;" class="header_btn"><div></div>К странице {name}</a>[/not-owner]
<ul class="bg_block" id="rightmenu">


 [admin-video-add][owner]
<li class="">
<div></div>
<a onClick="videos.add(); return false;" >Создать видеоролик</a>
</li>
<div class="mgclr"></div>
<div class="more_div"></div>
[/owner][/admin-video-add]
<li class="activetabnews">
<div></div>
<a href="/videos/{user-id}" onclick="Page.Go(this.href); return false;">[owner]Все видеозаписи[/owner][not-owner]К видеозаписям {name}[/not-owner]</a></li>

</ul>

<div class="clear"></div>
<input type="hidden" value="{user-id}" id="user_id" />
<input type="hidden" id="set_last_id" />
<input type="hidden" id="videos_num" value="{videos_num}" />