
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
<script type="text/javascript" src="{theme}/js/swfupload.js"></script>
<script type="text/javascript">
var cnt = 0;
var UploadedFiles = 0;

$(document).ready(function() {
    function uploadSuccess(file, serverData) {
		response = serverData;
		if(response == 'max_img'){
			Box.Info('load_photo_er2', lang_dd2f_no, lang_max_imgs, 340);
			return false
		}
		if(response == 'big_size'){
			Box.Info('load_photo_er2', lang_dd2f_no, lang_max_size, 250);
			return false
		}
				
		if(response == 'hacking'){
			return false
		} else {
			Profile.miniature();
				
		}
    }
    function uploadComplete(file) {
		UploadedFiles++;
		if(UploadedFiles == cnt){
			$('#status').html($('<p>Загружено ' + cnt + ' из ' + cnt + '</p>'));
			$('.uploadButton').css('width', '145px').css('height', '11px').css('overflow', 'inherit');
			$('#upBar, .uploadbuttbg').hide();
			$('#uploadproc').css('width', '0px');
		} else
			$('#status').html($('<p>Загружено ' + UploadedFiles + ' из ' + cnt + '</p>'));
    }
    function uploadStart(file) {
		$('.uploadButton').css('width', '0px').css('height', '0px').css('overflow', 'hidden');
		$('#upBar, .uploadbuttbg').show();
		if(cnt > 1)
			$('#status').html($('<p>Загружено ' + UploadedFiles + ' из ' + cnt + '</p>'));
		else
			$('#status').html('Фотография загружается..');
	
        return true;
    }
    function uploadProgress(file, bytesLoaded, bytesTotal) {
		pw = 200;
		var w = Math.ceil(pw * (UploadedFiles / cnt + (bytesLoaded / (file.size * cnt))));
        $('#uploadproc').css('width', w+'px');
    }
    function fileDialogComplete(numFilesSelected, numFilesQueued) {
		cnt = numFilesSelected;
		UploadedFiles = 0;
        this.startUpload(); 
    }
	function photos_fileQueueError(file, errorCode, message){
		try{
			switch(errorCode){
				case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
					$('.uploadButton').css('width', '0px').css('height', '0px').css('overflow', 'hidden');
					$('.uploadbuttbg').show();
					Box.Info('load_photo_er2', lang_dd2f_no, 'Пожалуйста, выберите одну фотографию.', 350, 3000);
					setTimeout(function(){
						$('.uploadButton').css('width', '145px').css('height', '11px').css('overflow', 'inherit');
						$('.uploadbuttbg').hide();
					}, 3000);
				break;
				case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
				case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
				case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
				case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
				break;
			}
		} catch(ex){
			//false 
		}
	}
    var swfu = new SWFUpload({
		upload_url: "/index.php?go=albums&act=ava",
		flash_url: "/templates/Default/js/swfupload.swf",
		file_post_name: "uploadfile",
		post_params: {"PHPSESSID" : "{PHPSESSID}"},
		file_size_limit: "25 MB",
		file_types: "*.jpg; *.png; *.jpeg; *.gif",
		file_types_description: "Images",
		file_upload_limit: "1",
		debug: false,
		button_placeholder_id: "uploadButton",
		button_image_url: "/templates/Default/images/select_file.png",
		button_width: 120,
		button_height: 26,
		button_cursor: SWFUpload.CURSOR.HAND,
		file_dialog_complete_handler: fileDialogComplete,
		upload_success_handler: uploadSuccess,
		upload_complete_handler: uploadComplete,
		upload_start_handler: uploadStart,
		upload_progress_handler: uploadProgress,
		file_queue_error_handler: photos_fileQueueError,
	}); 
});
</script>

<style>
.box_footer{display:none}
.box_conetnt {
border-bottom: 0px solid #d7d7d7;
}
</style>
<div class="load_photo_pad">
<div class="err_red" style="display:none;font-weight: normal;
width: 32.2%;
font-size: 13px;
position: absolute;"></div>
<div class="load_photo_quote">Вы можете загрузить сюда только собственную фотографию. Поддерживаются форматы JPG, PNG и GIF.</div>
<div class="load_photo_but" > <div class="uploadButton"> <div class="uploadbuttbg no_display"></div> <button id="upload" class="button">Загрузить фотографию</button></div>
</div>
</div>