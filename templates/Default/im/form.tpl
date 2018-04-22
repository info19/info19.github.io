<script type="text/javascript">
$(document).ready(function(){
	vii_interval_im = setInterval('im.update()', 2000);
	music.jPlayerInc();
	$('.im_scroll').scroll(function(){
		if($('.im_scroll').scrollTop() <= ($('.im_scroll').height()/2)+250)
			im.page('{for_user_id}');
	});
});
</script>
<div id="jquery_jplayer"></div>
<input type="hidden" id="teck_id" value="" />
<input type="hidden" id="typePlay" value="standart" />
<input type="hidden" id="teck_prefix" value="" />
<div class="note_add_bg clear support_addform im_addform" style="    position: absolute;
    bottom: 15px;
    left: 14px;">
<div class="ava_mini im_ava_mini">
 <a href="/u{myuser-id}" onClick="Page.Go(this.href); return false"><img src="{my-ava}" alt="" /></a>
</div>
<form id="message_tab_frm">
<div class="reply_from_wr">
<div class="reply_from_area_bl">
<div class="reply_arrow_out"></div>
<div class="reply_arrow"></div>

<textarea 
	class="videos_input wysiwyg_inpt fl_l im_msg_texta" 
	placeholder="{translate=lang_vashecmc}"
	id="msg_text" 
	style="height:43px;    width: 381px;"
	onKeyPress="
	 if(((event.keyCode == 13) || (event.keyCode == 10)) && (event.ctrlKey == false)) im.send('{for_user_id}', '{my-name}', '{my-ava}')
	 if(((event.keyCode == 13) || (event.keyCode == 10)) && (event.ctrlKey == true)) func('\r\n')
	"
	onKeyUp="im.typograf()"
></textarea>
</form>

<div class="im_smile_but_bl emoji_open_but" id="wall_attach_link_smile" onClick="im.smile_show()"><div class="icon icon-emo-happy"></div></div>

<input id="vaLattach_files" type="hidden" />
<div class="im_smiles no_display" id="im_smile">
<div class="strelka"></div>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/1.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/2.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/3.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/4.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/5.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/6.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/7.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/8.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/9.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/10.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/11.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/12.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/13.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/14.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/15.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/16.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/29.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/17.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/18.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/19.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/20.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/21.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/22.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/23.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/24.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/25.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/26.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/27.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/30.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/31.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/32.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/33.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/34.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/35.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/36.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/37.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/38.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/39.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/40.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/41.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/42.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/43.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/44.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/45.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/46.png"></img>
<img class="wall_attach_smile" onclick="wall.attach_insert('smile', this.src)" src="/uploads/smiles/47.png"></img>
</div>

<div class="ava_mini im_ava_mini" style="margin-bottom: 3px;width: 41px;float:right;">
 <a href="/u{for_user_id}" onClick="Page.Go(this.href); return false"><img src="{for-ava}" alt="" /></a>
</div>
<div style="margin-left: 42px;">{online}</div>
</div></div>
<div class="clear"></div>
<div id="attach_files" class="no_display" style="margin-left:60px"></div>
<input id="vaLattach_files" type="hidden" />
<div class="clear"></div>
<div class="button_div fl_l" style="margin-left:60px"><button onClick="im.send('{for_user_id}', '{my-name}', '{my-ava}')" id="sending" style="margin-top:4px;">{translate=lang_263}</button></div>


<div class="post_send_attach fl_r" style="margin-right: 73px;    margin-top: 1px;">
<li class="icon-picture-2" onmouseover="showTooltip(this, {text: '{translate=lang_266}', shift: [4,7,0]})" onClick="wall.attach_addphoto()"></li>
<li class="icon-video-1" onmouseover="showTooltip(this, {text: '{translate=lang_267}', shift: [4,7,0]})" onClick="wall.attach_addvideo()"></li>
<li class="icon-music-3" onmouseover="showTooltip(this, {text: '{translate=lang_268}', shift: [4,7,0]})" onClick="wall.attach_addaudio()"></li>
<li class="icon-doc-6" onmouseover="showTooltip(this, {text: '{translate=lang_269}', shift: [4,7,0]})" onClick="wall.attach_addDoc()"></li>
<div class="clear"></div>
</div>
<div class="clear" style="margin-top:10px"></div>
<div class="clear"></div>
</div>
<input type="hidden" id="status_sending" value="1" />
<input type="hidden" id="for_user_id" value="{for_user_id}" />