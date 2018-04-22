<link media="screen" href="{theme}/style/dev.css" type="text/css" rel="stylesheet" />  
<script type="text/javascript" src="/js/al/pubwcre.js"></script>
<style>
.widget_cont .inp.size {
    width: 55px;
}
.widget_cont .inp {
    padding: 8px;
    width: 190px;
}
.widget_cont input {
    margin-bottom: 10px;
}
input, textarea {
    outline: medium none;
    border: 1px solid #C3CBD4;
    background: #FFF none repeat scroll 0% 0%;
    color: #000;
    font-size: 11px;
    padding: 3px;
    font-family: tahoma,arial,verdana,sans-serif,Lucida Sans;
}
input, textarea, select {
    font-family: Tahoma;
    font-size: 11px;
    outline: medium none;
}
.button {
    padding: 7px 15px;
    white-space: nowrap;
    border-radius: 2px;
    border: 0px none;
    background: #6BA86B none repeat scroll 0% 0%;
    color: #FFF;
    font-size: 11px;
    font-family: tahoma,arial,verdana,sans-serif,Lucida Sans;
    outline: medium none;
    transition: background 200ms ease 0s;
    text-shadow: 0px 1px 0px #5E935E;
    cursor: pointer;
    box-sizing: border-box;
}
</style>

	<div class="content">
	<div id="ads_block"></div><div id="audioPad"></div>
	<div id="page" class="logged"><div class="dev_speedbar">Виджет для сообществ <b class="fl_r">Beta-версия</b></div><div class="widget_cont nobox">
	<div class="widget_awr">
		<div class="widget_descr" style="margin-top: 20px;">Виджет тесно свяжет сайт с группой или официальной страницей <b>MixLife</b>. Виджет позволяет подписаться на новости сообщества, не покидая страницы.</div>
		<div class="descr fl_l">Ссылка на страницу: </div>
		<input type="text" class="inp" value="1" id="urlp" onkeyup="Widgets.param_set('url', this.value);">
		<div class="clear"></div>

		<div class="descr fl_l">Вид: </div><br/>

		<input type="radio" name="mode" value="" onclick="Widgets.param_set('', '', 3);" checked>Участники<br/>
        <div class="descr fl_l">&nbsp;</div><input onclick="Widgets.param_set('', '', 1);" type="radio" name="mode" value="1">Только название<br/>
      
		<div class="clear"></div>
		
		<div class="descr fl_l">Ширина: </div>
		<input type="text" class="inp size" value="220" onkeyup="Widgets.param_set('width', this.value);" id="widget_width"> px
		<div class=""></div>
		<div class="clear"></div>

		<div class="descr fl_l">Высота: </div>
		<input type="text" class="inp size" value="400"  onkeyup="Widgets.param_set('height', this.value);" id="widget_height"> px
		<div class="clear"></div>

		<div class="descr fl_l">Цвет фона: </div>
		<input type="text" class="inp size cl" onkeyup="Widgets.param_set('color1', this.value);" value="FFFFFF"  id="color1">
		<div class="clear"></div>
		    
		
		<div class="descr fl_l">Цвет текста: </div>
		<input type="text"  class="inp size cl" onkeyup="Widgets.param_set('color2', this.value);" value="2B587A" id="color2">
		<div class="clear"></div>
	
		
		<div class="descr fl_l">Цвет кнопок: </div>
		<input type="text" class="inp size" value="5B7FA6" onkeyup="Widgets.param_set('color3', this.value);" id="color3">
		<div class="clear"></div>
		
		<div class="descr fl_l">Код для вставки: </div>
		<textarea onclick="select(this);" id="code" readonly="true" style="width: 286px; height: 155px; margin: 0;"><script type="text/javascript" src="//studentosi.ru/templates/Default/js/widget.js"></script>

<!-- CO Widget -->
<div id="co_group"></div>
<script type="text/javascript">
CO.public_widget('{"id":"1","color1":"FFFFFF","color2":"2B587A","color3":"5B7FA6","width":220,"height":400,"mode":""}', 'co_group');
</script></textarea>
		<div class="clear"></div>
		
		
		<div class="clear"></div>
		
		
		
		
	</div>
</div>
<div class="widget_preview">
	<div class="preview_title">Результат</div>
<center>
  <iframe style="overflow: hidden; height: 270px;" id="widget_preview_frame" scrolling="no" src="http://studentosi.ru/index.php?go=pubwidget&public_id=1&color1=&color2=&color3=&width=220&height=270&mode=0" name="fXD85eb4" frameborder="0" height="270" width="220"></iframe>
</center>
</div>
</div>
			<div class="clear"></div>
		</div>