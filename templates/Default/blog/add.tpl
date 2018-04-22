<script type="text/javascript" src="/js/al/upload.photo.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#title').focus();
	Xajax = new AjaxUpload('bb_photo_1', {
		action: '/index.php?go=blog&act=upload',
		name: 'uploadfile',
		onSubmit: function (file, ext) {
			if (!(ext && /^(jpg|png|jpeg|gif|jpe)$/.test(ext))) {
				addAllErr(lang_bad_format, 3300);
				return false;
			}
			Page.Loading('start');
		},
		onComplete: function (file, response){
			if(response == 'big_size'){
				addAllErr(lang_max_size, 3300);
				Page.Loading('stop');
			} else {
				bbcodes.tag('[img]', '[/img]', response);
				Page.Loading('stop');
			}
		}
	});
});
</script>
<style>.speedbar{    background: #fff;
    color: rgb(68,98,128);
    background: #fff;
    font-weight: 400 !important;
    border-radius: 0;
    height: 21px;
    font-size: 14px !important;
    line-height: 20px;
    width: 771px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;}</style>
<form method="POST" action="" name="entryform">
<div class="note_add_bg">
<div class="videos_text">Заголовок</div>
<input type="text" class="videos_input" style="width:757px" maxlength="65" id="title" />
<div class="input_hr"></div>
<div class="videos_text">Текст</div>
<div class="wysiwyg_bbpanel">
 <div onClick="bbcodes.tag('[b]', '[/b]')" class="wysiwyg_icbold cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Жирный', 'bb_bold_', '0')" id="bb_bold_1"></div>
 <div onClick="bbcodes.tag('[i]', '[/i]')" class="wysiwyg_ici cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Курсивный', 'bb_i_', '0')" id="bb_i_1"></div>
 <div onClick="bbcodes.tag('[u]', '[/u]')" class="wysiwyg_icunderline cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Подчеркнутый', 'bb_underline_', '0')" id="bb_underline_1"></div>
 <div onClick="bbcodes.tag('[left]', '[/left]')" class="wysiwyg_icpleft cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Выровнять по левому краю', 'bb_pleft_', '0')" id="bb_pleft_1"></div>
 <div onClick="bbcodes.tag('[center]', '[/center]')" class="wysiwyg_icpcenter cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Выровнять по центру', 'bb_pcenter_', '0')" id="bb_pcenter_1"></div>
 <div onClick="bbcodes.tag('[right]', '[/right]')" class="wysiwyg_icpright cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Выровнять по правому краю', 'bb_pright_', '0')" id="bb_pright_1"></div>
 <div onClick="bbcodes.tag('[quote]', '[/quote]')" class="wysiwyg_icquote cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Добавить цитату', 'bb_quote_', '0')" id="bb_quote_1"></div>
 <div class="wysiwyg_icphoto cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Добавить фотографию', 'bb_photo_', '0')" id="bb_photo_1"></div>
 <div class="wysiwyg_icvideo cursor_pointer border_radius_3" onClick="wall.attach_addvideo(false, false, 1)" onMouseOver="myhtml.title('1', 'Добавить видеозапись', 'bb_video_', '0')" id="bb_video_1"></div>
 <div class="wysiwyg_iclink cursor_pointer border_radius_3" onClick="wysiwyg.linkBox()" onMouseOver="myhtml.title('1', 'Добавить ссылку', 'bb_link_', '0')" id="bb_link_1"></div>
 <div class="clear"></div>
</div>
<textarea class="videos_input wysiwyg_inpt" id="text" name="text"></textarea>
<div class="clear"></div>
<div class="button_div fl_l"><button onClick="blog.add(); return false" id="notes_sending">Опубликовать</button></div>
<div class="clear"></div>
</div>
</form>

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
.blog_left {
    width: 576px;
    margin-top: 10px;
    background: #fff;
    width: 72%;
    margin-left: -15px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.blog_left_tab {
    background: #FFFFFF;
    position: static;
    width: 176px;
    border-top: 0px;
    margin-top: 10px;
    margin-left: 0px;
    padding: 10px;
    color: #555;
    margin-right: -14px;
    margin-bottom: -15px;
    background: #fff;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.blog_left_tab a {
    display: block;
    padding: 8px;
}
.note_add_bg {
    margin: -15px;
    margin-bottom: -15px;
    background: #fff;
    margin-top: 4px;
    width: 771px;
    border-top: none !important;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.wysiwyg_inpt {
    width: 757px;
    height: 350px;
    overflow: auto;
    outline: none;
}
.wysiwyg_bbpanel {
    background: #f0f2f5;
    border: 1px solid #c6d4dc;
    border-bottom: 0px;
    padding: 5px;
}
.videos_text {
    color: #4274a4;
    font-size: 14px;
    font-weight: normal;
    margin-bottom: 10px;
}
</style>