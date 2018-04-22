<script type="text/javascript">
var page_cnt_doload = 1;
function textLoad(i){
	$('#'+i).html('<img src="{theme}/images/loading_mini.gif" alt="" />').attr('onClick', '').attr('href', '#');
}
function doloadPage(){
  if($('#doload_search_but').text() == 'Показать еще'){
    textLoad('doload_search_but');
    $.post(location.href, {page_cnt: page_cnt_doload}, function(d){
      page_cnt_doload++;
      $('#doload_search').append(d);
      $('#doload_search_but').text('Показать еще');
      if(!d) $('#reviews_but').remove();
    });
  }
}
$(document).ready(function(){
	$(window).scroll(function(){
		if($(document).height() - $(window).height() <= $(window).scrollTop()+($(document).height()/2-250)){
			doloadPage();
		}
	});
});
</script>
<div id="doload_search"></div>
<div class="clear"></div>
<div class="rate_alluser cursor_pointer" style="margin:12px -12px -15px -12px" onClick="doloadPage()" id="reviews_but"><div id="doload_search_but">Показать еще</div></div>