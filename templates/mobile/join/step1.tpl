<script type="text/javascript" src="/templates/Default/js/main.js"></script>
<script type="text/javascript" src="/templates/Default/js/profile.js"></script>
<script type="text/javascript" src="/templates/Default/js/profile_edit.js"></script>
<script type="text/javascript" src="/templates/Default/js/jquery.lib.js"></script>
<style>
.padcont {
display:none;
}
.content{
margin-left: -100px;
}
.leftmenu, .footer{display:none}
</style><div class="padcont">
<script>
$('.padcont').fadeIn('slow');
</script>
<div class="search_form_tab">
 <div class="buttonsprofile albumsbuttonsprofile buttonsprofileSecond" style="height:22px">

</div>
</div>
<div class="clear"></div>
<div style="
  width: 300px;
  margin: auto;
padding-top: 25px;
padding-bottom: 40px;
">
<div id="step4"><style type="text/css" media="all">
.pg1 {
margin: auto;
line-height: 25px;
text-align: center;
font-size: 12px;
color: #000;
position: relative;
}
.title{color:#ffffff;font-weight:bold;border-bottom:1px solid #F1F4F7;padding-bottom:5px;text-align:left;margin-bottom:10px}
.pg1 span{color:#21578b;}
.inp{font-size:11px;padding:5px;border:1px solid #ddd;width:150px}
.button{border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;font-size:11px;color:#fff;width:150px;text-align:center;background:#4b80b5;border:1px solid #2a5f94;text-shadow:0px 1px 0px #2a5f94;margin-top:15px;padding-top:3px;padding-bottom:3px;cursor:pointer}
.err_yellow{padding:10px;background:#f4f7fa;margin-bottom:10px;text-align:left;font-size:12px;display:none;line-height: 20px;}
.err_red{padding:10px;background:#faebeb;margin-bottom:10px;line-height:20px;text-align:left;font-size:12px;display:none}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('#phone').val('+7').focus();
});
function sendCode(){
	var number = $('#phone').val();
	$('#send').hide();
	$('#loading').show();
	$('#country, #phone').attr('disabled', 'disabled');
	$.post('/?go=smsactivate&act=send', {number: number}, function(d){
		if(d == 1){
			$('#okcode, .err_yellow').show();
			$('#send, .err_red').hide();
			$('#code').focus();
		} else if(d == 2) {
			$('.err_red').html('<b>Мобильный номер занят.</b><br />Номер <b>'+number+'</b> уже используется другим пользователем сайта.').show();
			$('#send').show();
			$('#country, #phone').attr('disabled', '');
		} else if(d == 5) {
			$('.err_red').html('<b>Лимит.</b><br />У Вас исчерпан лимит на получение подтверждающего кода.').show();
			$('#send').show();
			$('#country, #phone').attr('disabled', '');
		} else {
			$('.err_red').html('<b>Некорректный мобильный номер.</b><br />Необходимо корректно ввести номер в международном формате, например +79210000000.').show();
			$('#send').show();
			$('#country, #phone').attr('disabled', '');
		}
		$('#loading').hide();
	});
}
function sendCodeOk(){
var number = $('#phone').val();
	$('#send_code').hide();
	$('#loading').show();
	$.post('/?go=smsactivate&act=check', {number: number, code: $('#code').val()}, function(d){
		if(d != 0){
			window.location.href = d;
		} else {
			$('#send_code').show();
			$('#loading').hide();
			$('.err_red').html('<b>Неверный код.</b><br />Проверьте правильность ввода кода.').show();
		}
	});
}
</script>
<div class="pg1">
 <div class="err_red"></div>
 <div class="err_yellow"><b>Код отправлен.</b><br />На Ваш телефон в течение нескольких секунд придет <b>7</b>-значный код.<br />Пример кода: <b>7895846</b><br /><br />У Вас осталась <b>1</b> попытка.</div>
 <div class="msg_info" style="margin-top: 0px; margin-bottom: 0px;">Мы просим всех пользователей привязать к странице свой номер <br /><b>мобильного телефона</b>. Это защитит Вашу страницу от угроз и избавит от необходимости постоянно вводить коды.</div><br /><br />
 <div style="margin-left:-105px"><span><b>Страна</b></span></div>
 <div style="margin-top:10px">
 <select class="inp" id="country" onChange="$('#phone').val(this.value).focus()">
   <option value="+994">Азербайджан</option>
   <option value="+43">Австрия</option>
   <option value="+374">Армения</option>
   <option value="+375">Беларусь</option>
   <option value="+359">Болгария</option>
   <option value="+32">Бельгия</option>
   <option value="+44">Великобритания</option>
   <option value="+36">Венгрия</option>
   <option value="+49">Германия</option>
   <option value="+30">Греция</option>
   <option value="+45">Дания</option>
   <option value="+972">Израиль</option>
   <option value="+34">Испания</option>
   <option value="+39">Италия</option>
   <option value="+77">Казахстан</option>
   <option value="+996">Киргизстан</option>
   <option value="+357">Кипр</option>
   <option value="+371">Латвия</option>
   <option value="+370">Литва</option>
   <option value="+373">Молдова</option>
   <option value="+47">Норвегия</option>
   <option value="+971">ОАЭ</option>
   <option value="+48">Польша</option>
   <option value="+7" selected>Россия</option>
   <option value="+966">Саудовская Аравия</option>
   <option value="+1">США</option>
   <option value="+90">Турция</option>
   <option value="+380">Украина</option>
   <option value="+33">Франция</option>
   <option value="+420">Чехия</option>
   <option value="+41">Швейцария</option>
   <option value="+46">Швеция</option>
   <option value="+372">Эстония</option>
   <option value="+81">Япония</option>
  </select>

 </div>
 <div style="margin-left:-20px;margin-top:15px"><span><b>Мобильный телефон</b></span></div>
 <div style="margin-top:10px">
  <input type="text" class="inp" id="phone" style="width:135px" value="" />
 </div>
 <span id="okcode" style="display:none">
 <div style="margin-left:-13px;margin-top:15px"><span><b>Код подтверждения</b></span></div>
 <div style="margin-top:10px">
  <input type="text" class="inp" id="code" style="width:135px" value="" />
 </div>
<br>
  <div class="button_div big_btn" style="width: 155px;
margin-left: 136px;"><button class="button" onClick="sendCodeOk()" id="send_code">Отправить код</button></div>
 </span>

 <div class="button_div big_btn"  style="width: 147px;
margin-left: 75px;"><button class="button" class="button" onClick="sendCode()" id="send" >Получить код</button></div>
 <img src="/templates/Default/images/loading_mini.gif" id="loading" style="display:none;margin-top:18px" /></div>
</div></div>