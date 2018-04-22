
[all-albums]
<div class="tmenuf">
 <div><a href="/albums/{user-id}">Все</a></div>
 <a href="/albums/comments/{user-id}">Комментарии</a>
 [not-owner]<a href="/u{user-id}">К странице {name}</a>[/not-owner]
 [new-photos]<a href="/albums/newphotos" >Новые фотографии со мной (<b>{num}</b>)</a>[/new-photos]
 [owner]

<a onClick="Albums.CreatAlbum(); return false;" >Создать</a>

[/owner]
</div>
<div class="clr"></div>
[/all-albums]
[view]
[owner]
<div id="upBar" class="no_display">
 <div class="video_show_bg ava_uploaded">
  <div class="upProcLotitle" id="status"></div>
  <div style="background:url('{theme}/images/progress_grad.gif?1');border:1px solid #45688e;height:18px;position:absolute" id="uploadproc"></div>
  <div style="background:#fff;border:1px solid #cccccc;width:200px;height:18px;margin-bottom:10px"></div>
  Не закрывайте эту вкладку, пока не завершится загрузка..
 </div>
</div>
<input type="hidden" id="all_p_num" value="{all_p_num}" />
<input type="hidden" id="aid" value="{aid}" />
<script type="text/javascript">
$(document).ready(function(){
	Xajax = new AjaxUpload('upload', {
		action: '/index.php?go=albums&act=upload&aid={aid}',
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
				location.href='/albums/view/{aid}';
			}
		}
	});
});
</script>
<script type="text/javascript" src="{theme}/js/swfupload.js"></script>

[/owner]
<input type="hidden" id="all_p_num" value="{all_p_num}" />
<input type="hidden" id="aid" value="{aid}" />
<div class="tmenuf">
 <a href="/albums/{user-id}">Все</a>
 <div><a href="/albums/view/{aid}">{album-name}</a></div>
 <a href="/albums/view/{aid}/comments/">Комментарии</a>
[owner]<a id="upload" name="uploadfile" href="">Загрузить фотографию</a>[/owner]
 [not-owner]<a href="/u{user-id}">К странице {name}</a>[/not-owner]
</div>
<div class="clr"></div>
[/view]
[comments]
<div class="tmenuf">
 <a href="/albums/{user-id}">Все</a>
 <div><a href="/albums/comments/{user-id}">Комментарии</a></div>
 [not-owner]<a href="/u{user-id}">К странице {name}</a>[/not-owner]
</div>
<div class="clr"></div>
[/comments]
[albums-comments]
<div class="tmenuf">
 <a href="/albums/{user-id}">Все</a>
 <a href="/albums/view/{aid}">{album-name}</a>
 <div><a href="/albums/view/{aid}/comments/">Комментарии</a></div>
 [not-owner]<a href="/u{user-id}">К странице {name}</a>[/not-owner]
</div>
<div class="clr"></div>
[/albums-comments]