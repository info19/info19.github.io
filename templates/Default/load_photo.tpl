<div class="miniature_box">
<div class="box_bg" style="width: 647px;margin-top: 86px;"><div class="box_title">
<span id="btitle" dir="auto">Загрузить фотографию</span>
<a onclick="Box.Close(); return false;" class="dark_box_close fl_r">Закрыть</a></div>
<div class="box_conetnt">


<script type="text/javascript">
$(document).ready(function(){
	Xajax = new AjaxUpload('upload', {
		action: '/index.php?go=editprofile&act=upload',
		name: 'uploadfile',
		onSubmit: function (file, ext) {
		if (!(ext && /^(jpg|png|jpeg|gif|jpe)$/.test(ext))) {
			Box.Info('load_photo_er', lang_dd2f_no, lang_bad_format, 400);
				return false;
			}
			butloading('upload', '113', 'disabled', '');
		},
		onComplete: function (file, response) {
			if(response == 'bad_format')
				$('.err_red').show().text(lang_bad_format);
			else if(response == 'big_size')
				$('.err_red').show().html(lang_bad_size);
			else if(response == 'bad')
				$('.err_red').show().text(lang_bad_aaa);
			else {
				Box.Close('photo');
				$('#ava').html('<img src="'+response+'" alt="" />');
				$('body, html').animate({scrollTop: 0}, 250);
				$('#del_pho_but').show();
			}
		}
	});
});
</script>

<div dir="auto" id="upload_box_cont" style="position:relative">		
<div id="ava_no_drop"><div style="padding: 20px;background: #EEF0F2;font-size:13px;line-height:170%">Друзьям будет проще узнать Вас, если Вы загрузите свою настоящую фотографию.<br>Вы можете загрузить изображение в формате JPG, GIF или PNG.</div>
<div id="load_ava_cont" style="padding: 15px"><div class="load_photo_but" style="margin: 6px 27% 15px 36%;"><div class="button_div fl_l"><button id="upload" style="font-size:13px;">Выбрать фотографию</button></div></div><input type="file" style="visibility: hidden; position: absolute;" accept="image/*" id="ava_upload_input" onchange="profile.upload_ava(this.files[0])"></div>		<div style="padding:15px;font-size:13px;padding-top:5px;">Если у Вас возникают проблемы с загрузкой, попробуйте выбрать фотографию меньшего размера.</div></div></div></div></div>
