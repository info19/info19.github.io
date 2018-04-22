<script type="text/javascript">var page = 1;</script>
<div class="photo_descr clear"> Добавлена {date}</div>
<div class="pinfo">
<div class="photo_leftcol">
<br>
[comm]<div class="cursor_pointer" onClick="attach.page('{purl}'); return false" id="attach_comm_msg_lnk" style="
    margin-right: -160px;
    margin-left: 125px;margin-bottom: 20px;
"><div class="public_wall_all_comm" id="load_attach_comm_msg_lnk" style="margin-left:0px">Показать предыдущие комментарии</div></div>[/comm]
<div class="mgclr"></div>
<span id="attachcommPrev"></span>
<span id="pcomments">{comments}</span>
<textarea id="textcom{purl-js}" class="photo_comm inpst" placeholder="Комментировать.." style="width: 100% !important;
height: 40px;
margin-bottom: 10px;
margin-top: 13px;
border-radius: 2px;"></textarea>
<div class="clear"></div>
<div class="button_div fl_l" style="margin-left: 30%;"><button id="add_comm{purl-js}" onClick="attach.addcomm('{purl}', '{purl-js}'); return false">Отправить</button></div>
<div class="clear"></div>
</div>
<div class="photo_rightcol" style="margin-top:10px">
 Отправитель:<br />
 <div><a href="/u{uid}" onClick="Page.Go(this.href); return false">{author}</a></div><span style="color:#888">{author-info}</span><br />
</div></div>
<div class="clear"></div>