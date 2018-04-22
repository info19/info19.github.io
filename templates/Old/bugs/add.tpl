<style>

.feedback_warning {
    padding: 21px;
    line-height: 160%;
    background: #EEF0F2;
    margin-left: 0px;
    margin-top: -2px;
    width: 456px;
    margin-bottom: 0px;
    border-bottom: 1px solid #DCDCDC;
}
</style>

<script type="text/javascript" src="/system/inc/js/upload.photo.js"></script>
<script type="text/javascript">
var loading_photo_pins = false;
var loaded_pins_name = null;
$(document).ready(function(){
aj1 = new AjaxUpload('upload', {
action: '/index.php?go=bugs&act=load_img',
name: 'uploadfile',
data: {
add_act: 'upload'
},
accept: 'image/*',
onSubmit: function (file, ext) {
if(!(ext && /^(jpg|png|jpeg|gif|jpe)$/.test(ext))) {
Box.Info('err', 'Ошибка', 'Неверный формат файла');
return false;
}
$('#upload').hide();
$('#prog_poster').show();
},
onComplete: function (file, row){
var exp = row.split('|');
if(exp[0] == 'size'){
Box.Info('err', 'Ошибка', 'Файл превышает 5 МБ');
} else {
$('#r_poster').attr('src', '/uploads/bugs/'+exp[0]+'/'+exp[1]).show();
}
$('#upload').show();
$('#prog_poster, #size_small, #upload_butt').hide();
loading_photo_pins = true;
loaded_pins_name = exp[1];
}
});
});

</script>
<div id="box_bugs" class="box_pos" style="display: block">
<div class="box_bg" style="width: 500px; margin-top: 30px;">
<div class="box_title">
<span id="btitle" dir="auto">Сообщение о баге</span>
<i class="box_close icon-cancel-3" onClick="viiBox.clos('bugs', 1)"></i>
</div>
<div class="box_conetnt">



 <div class="feedback_tab no_display" id="fc_tab_bug" old_display="block" style="display: block;"> <div class="feedback_warning" dir="auto">Здесь Вы можете сообщить о любой технической проблеме <b>нашего сайта</b><br>  				<b>Внимание!</b> перед отправкой информации о проблеме ознакомьтесь со списком <a href="/bugs" onclick="nav.go(this.href); return false;">уже существующих</a>, возможно об этом уже написал другой пользователь</div> <div class="err_red no_display" id="fb_bug_error" dir="auto"></div>

<div class="bugs_create_bg">
<div class="title">Заголовок</div>
<input type="text" class="inp" id="title" placeholder="Введите заголовок бага">
<div class="title">Описание</div>
<textarea class="inp" id="text" placeholder="Пожалуйста, расскажите о баге чуть подробнее.."></textarea>


<img src=""  id="r_poster" style="display: none;" width="100" height="100">
<div class="mgclr"></div>

<div class="button_div fl_l"><button onclick="bugs.create();" id="saveShortLink">Отправить</button></div>

<div class="attach fl_r">
<li class="icon-picture" "onmouseover="showTooltip(this, {text: &#39;Прикрепить видеозапись&#39;, shift:[3,5,0]});" onclick="attach_all.videos(&#39;bugs_fb&#39;)" id="upload"></li>

</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
</div>
