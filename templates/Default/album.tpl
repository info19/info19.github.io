<link media="screen" href="/css/al/album.css" type="text/css" rel="stylesheet" />
<div class="album_block "> <div class="album_item" onmousedown="albums.drag(1407, event)" id="album_1407" onclick="if(!cur.dragstart &amp;&amp; $(event.target).filter('.edit, .del').length == 0) Page.Go('/albums/view/{aid}')" style="left: 511px; top: 5px;"> <div style="position: relative"> <div class="album_settings"> 
[owner]<div class="del icon-cancel-3" onClick="Albums.Delete({aid}, '{hash}'); return false"></div> 
<div class="edit icon-pencil-7" onClick="Albums.EditBox({aid}); return false"></div> [/owner]
</div> 
<div class="dark_bg"></div> 
<div class="description">{name}</div> </div> <img src="{cover}" class="" style="opacity: 1;"> </div></div>

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
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
    background: #fff;
}
</style>