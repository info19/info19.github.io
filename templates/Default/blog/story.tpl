<script type="text/javascript">
$(document).ready(function(){
	$('.blog_left_tab').css('min-height', ($('.blog_left_tab').height()+10)+'px').css('height', ($('.blog_left').height()+10)+'px');
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
<div class="blogthr"></div>
<div class="blog_left fl_l">
<div class="notes_ava"><img src="{theme}/images/support2.png" alt="" /></div>
<div class="one_note" style="width: 472px;background: #f0f2f5;color: #21578b;font-weight: normal !important;border-top: none;height: 30px;font-family: Open Sans,Helvetica Neue,sans-serif;">
 <span><a href="/blog?id={id}" onClick="Page.Go(this.href); return false">{title}</a></span><br />
 <div>{date}</div>
</div>
<div class="note_text clear">{story}</div>
</div>
<div class="blog_left_tab fl_r">
 {last-news}
 [group=1]<br />
 <a href="?act=add" onClick="Page.Go(this.href); return false">Добавить новость</a>
 <a href="" onClick="blog.del('{id}'); return false">Удалить новость</a>
 <a href="?act=edit&id={id}" onClick="Page.Go(this.href); return false">Редактировать новость</a>
 [/group]
</div>

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
    border-left: none !important;
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
</style>