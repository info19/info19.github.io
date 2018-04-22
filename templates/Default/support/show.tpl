<div class="menuNews" style="    background: #fff;
    width: 102%;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
    height: 26px;
    margin-left: -16px;
    padding-left: 0px;
    margin-top: -12px;">
    <li onClick="Page.Go('/support')">[group=4]Вопросы от пользователей[/group][not-group=4]Мои вопросы[/not-group]</li>
    <li onClick="Page.Go('/support?act=show&qid={qid}')" class="activClass">Просмотр вопроса</li>
    <div class="clear"></div>
</div>

<div class="note_full_title">
 <span><a href="/support?act=show&qid={qid}" onClick="Page.Go(this.href); return false">{title}</a></span><br />
 <div id="status">{status}</div>
</div>
<div class="bgprof" style="    margin-top: 0px;
    width: 771px;
    margin-left: -16px;">
<div class="note_text">
<div class="ava_mini" style="float:width:60px"><a href="/u{uid}" onClick="Page.Go(this.href); return false"><img src="{ava}" alt="" title="" /></a></div>
<div class="wallauthor" style="padding-left:0px"><a href="/u{uid}" onClick="Page.Go(this.href); return false">{name}</a></div>
<div style="float:left;width:662px;margin-bottom:10px">
<div class="walltext">
 <div style="padding-left:2px">
  {question}
  <br /><span class="color777">{date} &nbsp;|&nbsp;</span> <a href="/" onClick="support.delquest('{qid}'); return false">Удалить вопрос</a>
 </div>
</div>
</div>
</div>
<div class="clear"></div></div>
<div id="answers" style="    width: 771px;
    margin-left: -16px;
    margin-top: 0px;
    background: #fff;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;">{answers}</div>
<div class="note_add_bg clear support_addform">
<div class="ava_mini">
 [group=4]<img src="{theme}/images/support.png" alt="" />[/group]
 [not-group=4]<a href="/u{uid}" onClick="Page.Go(this.href); return false"><img src="{ava}" alt="" /></a>[/not-group]
</div>
<textarea 
	class="videos_input wysiwyg_inpt fl_l" 
	id="answer" 
	style="width:687px;height:38px;color:#c1cad0"
	onblur="if(this.value==''){this.value='Комментировать..';this.style.color = '#c1cad0';}" 
	onfocus="if(this.value=='Комментировать..'){this.value='';this.style.color = '#000'}"
>Комментировать..</textarea>
<div class="clear"></div>
<div class="button_div fl_l" style="margin-left:60px"><button onClick="support.answer('{qid}', '{uid}'); return false" id="send">Отправить</button></div>
[group=4]<div class="button_div_nostl fl_r" id="close_but"><button onClick="support.close('{qid}'); return false" id="close">Закрыть вопрос</button></div>[/group]
<div class="clear"></div>
</div>

<style>
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 103px !important;
    word-wrap: break-word;
}
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: none !important;
    background: none !important;
}
.note_full_title {
    background: #e5ebf1;
    padding: 15px 20px 15px 20px;
    margin-left: -16px;
    margin-right: -15px;
    margin-top: 0px;
    color: #626D85;
    font-weight: normal;
    font-family: Arial,Helvetica,sans-serif;
    background: #fff;
    width: 771px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.note_add_bg {
    width: 771px;
    background: #fff;
    bottom: 5px;
    margin-left: -16px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
</style>