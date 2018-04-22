<!-- CSS страницы -->
<link media="screen" href="{theme}/style/dev.css" type="text/css" rel="stylesheet" />
<!-- Файл функционала витжета -->
<script type="text/javascript" src="{theme}/js/widget.js"></script>
<!-- Kendo выбор цвета -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="{theme}/style/kendo/kendo.common.min.css">
<link rel="stylesheet" href="{theme}/style/kendo/kendo.rtl.min.css">
<link rel="stylesheet" href="{theme}/style/kendo/kendo.default.min.css">
<link rel="stylesheet" href="{theme}/style/kendo/kendo.mobile.all.min.css">
<script src="{theme}/js/kendo.all.min.js"></script>
<!-- JS создания витжета -->
<script type="text/javascript" src="{theme}/js/pubwcre.js"></script>
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
   .dev_colorbox_cont {
   display: inline-block;
   padding: 3px 4px;
   vertical-align: top;
   height: 19px;
   width: 19px;
   }
   .dev_colorbox {
   display: inline-block;
   width: 19px;
   border-radius: 10px;
   height: 19px;
   pointer-events: none;
   }
</style>
<div class="content">
   <div id="page" class="logged">
      <div class="dev_speedbar">Виджет для сообществ <a class="fl_r" style="font-weight:500;color: rgb(68, 98, 128);opacity: 0.6;text-decoration: none;">Beta-версия</a></div>
      <div class="widget_cont nobox">
         <div class="widget_awr">
            <div class="widget_descr" style="margin-top: 20px;">Виджет тесно свяжет сайт с группой или официальной страницей <b>Название соц сети</b>. Виджет позволяет подписаться на новости сообщества, не покидая страницы.</div>
            <div class="descr fl_l">Ссылка на страницу: </div>
            <input type="text" class="inp" value="1" id="urlp" onkeyup="Widgets.param_set('url', this.value);">
            <div class="clear"></div>
			
			<!-- Выбор режива витжет -->
            <div class="descr fl_l">Вид: </div>
            <br/>
            <input type="radio" name="mode" value="" onclick="Widgets.param_set('', '', 3);" checked>Участники<br/>
            <div class="descr fl_l">&nbsp;</div>
            <input onclick="Widgets.param_set('', '', 1);" type="radio" name="mode" value="1">Только название<br/>
            <div class="descr fl_l">&nbsp;</div>
            <input onclick="Widgets.param_set('', '', 2);" type="radio" name="mode" value="2">Новости<br/>
            <div class="clear"></div>
			
			<!-- Габаритные размеры витжета -->
            <div class="descr fl_l">Ширина: </div>
            <input type="text" class="inp size" value="220" onkeyup="Widgets.param_set('width', this.value);" id="widget_width"> px
            <div class="clear"></div>
			
            <div class="descr fl_l">Высота: </div>
            <input type="text" class="inp size" value="400"  onkeyup="Widgets.param_set('height', this.value);" id="widget_height"> px
            <div class="clear"></div>
			
			<!-- Раскраска витжета -->
            <div class="descr fl_l">Цвет фона: </div>
            <input type="text" class="inp size cl" onkeyup="Widgets.param_set('color1', this.value);" value="#FFFFFF"  id="color1">
            <div class="clear"></div>
			
            <div class="descr fl_l">Цвет текста: </div>
            <input type="text"  class="inp size cl" onkeyup="Widgets.param_set('color2', this.value);" value="#2B587A" id="color2">
            <div class="clear"></div>
			
            <div class="descr fl_l">Цвет кнопок: </div>
            <input type="text" class="inp size" value="#5B7FA6" onkeyup="Widgets.param_set('color3', this.value);" id="color3">
            <div class="clear"></div>
			
			
			<div class="descr fl_l">Генератор цветов: </div> <div id="flatpicker"></div>
			
			<br/><br/>
			
			
			<!-- Сгенерированный код -->
            <div class="descr fl_l">Код для вставки: </div>
            <textarea onclick="select(this);" id="code" readonly="true" style="width: 286px; height: 155px; margin: 0;"><script type="text/javascript" src="//{nohttpurl}/templates/Default/js/widget.js"></script>

<!-- CO Widget -->
<div id="co_group"></div>
<script type="text/javascript">
CO.public_widget('{"id":"1","color1":"FFFFFF","color2":"2B587A","color3":"5B7FA6","width":220,"height":400,"mode":""}', 'co_group');
</script></textarea>


<script>
  $("#flatpicker").kendoFlatColorPicker();
  var flatpicker = $("#flatpicker").data("kendoFlatColorPicker");
  flatpicker.value("#5B7FA6");
</script>
            <div class="clear"></div>
            <div class="clear"></div>
         </div>
      </div>
      <div class="widget_preview">
         <div class="preview_title">Результат</div>
         <center>
            <iframe style="overflow: hidden; height: 400px;" id="widget_preview_frame" scrolling="no" src="http://{nohttpurl}/index.php?go=pubwidget&public_id=1&color1=&color2=&color3=&width=220&height=400&mode=0" name="fXD85eb4" frameborder="0" height="270" width="220"></iframe>
         </center>
      </div>
   </div>
   <div class="clear"></div>
</div>

<style>
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: none !important;
    background: none !important;
}
</style>