<div class="cover_edit_title doc_full_pg_top">
<div class="fl_l margin_top_5" style="width:500px">
 <img src="{poster}" width="30" height="30" style="float:left;margin-right:10px" />
 <div>{title}</div>
 <div class="apps_start_traf">{traf}</div>
</div>
<div style="margin-top:7px">
 <div class="button_div fl_r margin_left"><button onClick="Page.Go('/apps')">Все игры</button></div>
 <div id="apps_rdel_txt"><div class="button_div_gray fl_r"><button onClick="apps.mydel('{app-id}')">Удалить игру</button></div></div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
<div class="apps_faslh_pos">
 <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="{width}" height="{height}">
 <param name="allowScriptAccess" value="sameDomain" />
 <param name="movie" value="{swf}" />
 <param name="quality" value="high" />
 <embed src="{swf}" quality="high" width="{width}" height="{height}" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
 </object>
</div>

<style>
.content {
    float: left;
    width: 827px !important;
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
.doc_full_pg_top {
    width: 780px;
    z-index: 99;
    margin: -15px;
    margin-top: -10px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
.apps_faslh_pos {
    text-align: center;
    margin: -12px;
    margin-bottom: -17px;
    margin-left: -15px;
    margin-top: 30px;
    background: #fff;
    width: 772px;
    padding: 14px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
}
</style>