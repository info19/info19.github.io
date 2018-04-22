<script type="text/javascript">
$(document).ready(function(){
	Xajax = new AjaxUpload('upload_2', {
		action: '/index.php?go=doc&act=upload',
		name: 'uploadfile',
		onSubmit: function (file, ext) {
			if(!(ext && /^(doc|docx|xls|xlsx|ppt|pptx|rtf|pdf|png|jpg|gif|psd|mp3|djvu|fb2|ps|jpeg|txt|exe|rar)$/.test(ext))) {
				addAllErr('Неверный формат файла', 3300);
				return false;
			}
			Page.Loading('start');
		},
		onComplete: function (file, row){
			if(row == 1)
				addAllErr('Превышен максимальный размер файла 10 МБ', 3300);
			else {
				row = row.split('"');
			Page.Go(location.href);
				
			}
			Page.Loading('stop');
		}
	});
});
langNumric('langNumric', '{doc-num}', 'документ', 'документа', 'документов', 'документ', 'документов');

var page_cnt = 1;
function docAddedLoadAjax(){
	$('#wall_l_href_doc').attr('onClick', '');
	textLoad('wall_l_href_doc_load');
	$.post('/index.php?go=doc', {page_cnt: page_cnt}, function(d){
		$('#docAddedLoadAjax').append(d);
		$('#wall_l_href_doc').attr('onClick', 'docAddedLoadAjax()');
		$('#wall_l_href_doc_load').html('Показать еще документы');
		if(!d) $('#wall_l_href_doc').hide();
		page_cnt++;
	});
}
</script>

<div class="cover_edit_title doc_full_pg_top"style="margin-top:-20px">
<div class="fl_l margin_top_5">У Вас {doc-num} <span id="langNumric"></span></div>
<div class="clear"></div>
</div>

<div id="upload_2">
<div class="upload">
		<span class="icon-doc" style="font-size: 45px;margin-top:10px;" id=""></span>
		<div>Загрузить новый документ</div>
	</div>
</div>
	

<div class="cover_edit_title doc_full_pg_top" style="margin-top:10px">
<div class="fl_l margin_top_5"> <table cellspacing="0" cellpadding="" width="993" style="text-align: left;height: 1px;"> 
<tbody><tr>
<td style="color:#5F5F62; font-weight: bold; font-size: 12px;">Название</td>
<td style="color: #5F5F62; font-weight: bold; font-size: 12px;width: 120px;">Дата</td>
<td style="color: #5F5F62; font-weight: bold; font-size: 12px;width: 201px;">Формат</td>
<td style="color: #5F5F62; font-weight: bold; font-size: 12px;width: 395px;">Размер</td>
</tr>

</tbody></table> </div>
<div class="clear"></div>
</div>

<div class="clear"></div>
<div id="loadedDocAjax"></div>